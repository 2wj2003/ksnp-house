<?php
// 1. [ใหม่] เรียกใช้ "ตัวโหลด" (Autoloader) ของ Composer
// __DIR__ . '/../' หมายถึงการถอยกลับไปที่ Root Project
require_once __DIR__ . '/../vendor/autoload.php';

// 2. [ใหม่] สั่งให้ Library (Dotenv) อ่านไฟล์ .env
// __DIR__ . '/../' คือที่อยู่ของไฟล์ .env (ที่ Root Project)
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

// --- 3. (ณ จุดนี้ PHP รู้จัก $_ENV แล้ว!) ---
// (โค้ดที่เหลือของคุณเหมือนเดิม แต่เปลี่ยนตัวแปร)

$db_host = $_ENV['DB_HOST'];
$db_user = $_ENV['DB_USER'];
$db_pass = $_ENV['DB_PASS']; // (จะปลอดภัย ไม่มีรหัสผ่านในไฟล์นี้)
$db_name = $_ENV['DB_NAME'];

$dsn = 'mysql:host=' . $db_host . ';dbname=' . $db_name . ';charset=utf8mb4';

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

// ... (โค้ดเชื่อมต่อ DB)
try {
    $pdo = new PDO($dsn, $db_user, $db_pass, $options);

} catch (PDOException $e) {
    // 1. บันทึก Error จริงไว้ดูเอง (ปลอดภัย)
    error_log("Database Connection Error: " . $e->getMessage());
    
    // 2. แสดงข้อความทั่วไปให้ผู้ใช้ (ปลอดภัย)
    die("ระบบขัดข้องชั่วคราว กรุณาลองใหม่ในภายหลัง");
}
// (ไม่มี } ปิดเกินตรงนี้แล้ว)
?>