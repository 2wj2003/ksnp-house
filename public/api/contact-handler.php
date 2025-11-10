<?php
// public/api/contact-handler.php
// [เวอร์ชันสมบูรณ์: PHPMailer + reCAPTCHA]

// 1. เรียกใช้ Composer Autoloader
require_once __DIR__ . '/../../vendor/autoload.php';

// 2. เรียกใช้ Namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// 3. โหลด .env
try {
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
    $dotenv->load();
} catch (\Dotenv\Exception\InvalidPathException $e) {
    error_log("Could not find .env file: " . $e->getMessage());
    die(json_encode(['success' => false, 'message' => 'Server configuration error.']));
}

header('Content-Type: application/json');

// --- (A) ตรวจสอบ Method และ Spam ---
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
    exit;
}
if (!empty($_POST['honeypot'])) {
    echo json_encode(['success' => true, 'message' => 'Spam detected.']);
    exit;
}

// --- (B) [ใหม่] ตรวจสอบ Google reCAPTCHA ---
$recaptchaSecret = $_ENV['RECAPTCHA_SECRET_KEY'];
$recaptchaToken = $_POST['recaptcha-token'] ?? '';

if (empty($recaptchaSecret) || empty($recaptchaToken)) {
    echo json_encode(['success' => false, 'message' => 'reCAPTCHA ไม่ได้ตั้งค่าอย่างถูกต้อง']);
    exit;
}

// (ส่ง Token ไปให้ Google ตรวจสอบ)
$verifyURL = 'https://www.google.com/recaptcha/api/siteverify';
$verifyData = [
    'secret'   => $recaptchaSecret,
    'response' => $recaptchaToken,
    'remoteip' => $_SERVER['REMOTE_ADDR']
];

$options = [
    'http' => [
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($verifyData),
    ],
];
$context  = stream_context_create($options);
$response = file_get_contents($verifyURL, false, $context);
$responseData = json_decode($response);

if (!$responseData || !$responseData->success || $responseData->score < 0.5) {
    // (ถ้า Google บอกว่าเป็นบอท หรือ Score ต่ำไป)
    echo json_encode(['success' => false, 'message' => 'การตรวจสอบล้มเหลว (สงสัยว่าเป็นบอท)']);
    exit;
}

// --- (C) กรองข้อมูล (Validation & Sanitization) ---
// (ถ้าผ่าน reCAPTCHA แล้ว ค่อยมากรองข้อมูล)
$name = filter_var(trim($_POST['name'] ?? ''), FILTER_SANITIZE_STRING);
$phone = filter_var(trim($_POST['phone'] ?? ''), FILTER_SANITIZE_STRING);
$email = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
$message = filter_var(trim($_POST['message'] ?? ''), FILTER_SANITIZE_STRING);

if (empty($name) || empty($phone) || empty($message)) {
    echo json_encode(['success' => false, 'message' => 'กรุณากรอกข้อมูลที่จำเป็นให้ครบถ้วน']);
    exit;
}
if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['success' => false, 'message' => 'รูปแบบอีเมลไม่ถูกต้อง']);
    exit;
}

// --- (D) ส่งอีเมลด้วย PHPMailer ---

$mail = new PHPMailer(true);

try {
    // 1. ตั้งค่า Server (ดึงจาก .env)
    $mail->isSMTP();
    $mail->Host       = $_ENV['MAIL_HOST'];
    $mail->SMTPAuth   = true;
    $mail->Username   = $_ENV['MAIL_USERNAME'];
    $mail->Password   = $_ENV['MAIL_PASSWORD'];
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = $_ENV['MAIL_PORT'];
    $mail->CharSet    = 'UTF-8';

    // 2. ตั้งค่าผู้รับ-ผู้ส่ง
    $mail->setFrom($_ENV['MAIL_USERNAME'], $_ENV['MAIL_FROM_NAME']);
    $mail->addAddress('info@moro.co.th'); // ผู้รับ (อีเมลบริษัท)
    if (!empty($email)) {
        $mail->addReplyTo($email, $name);
    }

    // 3. ตั้งค่าเนื้อหา
    $mail->isHTML(true);
    $mail->Subject = "ข้อความใหม่จากฟอร์มติดต่อด่วน (MORO Website) - จาก: " . $name;
    $mail->Body    = "<p>คุณได้รับข้อความใหม่จากฟอร์มติดต่อด่วน:</p>"
        . "<ul>"
        . "<li><strong>ชื่อ:</strong> " . htmlspecialchars($name) . "</li>"
        . "<li><strong>เบอร์โทร:</strong> " . htmlspecialchars($phone) . "</li>"
        . "<li><strong>อีเมล:</strong> " . htmlspecialchars($email) . "</li>"
        . "</ul>"
        . "<h3>ข้อความ:</h3>"
        . "<p style='padding: 10px; border: 1px solid #ddd; background: #f9f9f9;'>"
        . nl2br(htmlspecialchars($message))
        . "</p>";
    $mail->AltBody = "ข้อความใหม่:\n\nชื่อ: $name\nเบอร์โทร: $phone\nอีเมล: $email\n\nข้อความ:\n$message";

    // 4. ส่ง!
    $mail->send();

    // 5. ตอบกลับไปหา JavaScript (ว่าสำเร็จ)
    echo json_encode(['success' => true, 'message' => 'Message sent successfully.']);
} catch (Exception $e) {
    // 6. ถ้า PHPMailer พัง
    error_log("PHPMailer Error: " . $mail->ErrorInfo);
    echo json_encode(['success' => false, 'message' => 'ไม่สามารถส่งข้อความได้ กรุณาลองใหม่']);
}

exit;
