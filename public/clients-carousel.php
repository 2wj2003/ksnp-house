<?php
// clients-carousel.php
// ส่วนลูกค้าของเรา (Logo Marquee - Auto Generate from Folder)

// --- 1. PHP Logic: สแกนโฟลเดอร์ ---

$logoDir = 'logo-client/'; // << ตำแหน่งโฟลเดอร์โลโก้
$logos = []; // สร้าง array ว่างๆ ไว้เก็บชื่อไฟล์

// ตรวจสอบว่ามีโฟลเดอร์นี้จริง
if (is_dir($logoDir)) {
    // สแกนไฟล์ทั้งหมดในโฟลเดอร์
    $files = scandir($logoDir);
    
    foreach ($files as $file) {
        // กรองเอาแค่ไฟล์รูปภาพ (ไม่เอา . และ .. และไฟล์อื่นๆ)
        if ($file !== '.' && $file !== '..' && 
            (str_ends_with($file, '.png') || str_ends_with($file, '.jpg') || str_ends_with($file, '.jpeg') || str_ends_with($file, '.svg'))) 
        {
            $logos[] = $file; // เพิ่มชื่อไฟล์ลงใน array
        }
    }
}

// แบ่งโลโก้ 30 เจ้า ออกเป็น 2 แถว (แถวละ 15)
// array_chunk จะแบ่ง $logos ออกเป็นก้อนๆ ก้อนละ 15
$logoRows = array_chunk($logos, 15);

$logosRow1 = $logoRows[0] ?? []; // แถวที่ 1 (โลโก้ 1-15)
$logosRow2 = $logoRows[1] ?? []; // แถวที่ 2 (โลโก้ 16-30)

// --- 2. PHP Function: สร้างแถบ Marquee ---
// (ฟังก์ชันนี้จะสร้าง HTML + ชุดสำเนา ให้อัตโนมัติ)
function render_logo_track($logos, $scrollClass, $logoDir) {
    if (empty($logos)) {
        return; // ถ้าไม่มีโลโก้ ก็ไม่ต้องแสดงผล
    }

    // เริ่มสร้างแถบ
    echo '<div class="logo-track ' . $scrollClass . ' flex items-center space-x-12">';

    // ชุดที่ 1: "ต้นฉบับ"
    foreach ($logos as $logoFile) {
        // สร้าง <img> tag
        echo '<img src="' . $logoDir . $logoFile . '" alt="' . pathinfo($logoFile, PATHINFO_FILENAME) . '" class="logo-item h-12">';
    }

    // ชุดที่ 2: "สำเนา" (สำหรับวนลูปไร้รอยต่อ)
    foreach ($logos as $logoFile) {
        // สร้าง <img> tag
        echo '<img src="' . $logoDir . $logoFile . '" alt="' . pathinfo($logoFile, PATHINFO_FILENAME) . '" class="logo-item h-12">';
    }

    // ปิดแถบ
    echo '</div>';
}

?>

<section id="clients-section" class="bg-white py-16 sm:py-24 overflow-hidden">
    <div class="container mx-auto px-4">

        <div id="clients-title" 
             class="text-center mb-12
                    opacity-0 translate-y-5 transition-all duration-700 ease-out">
            <h2 class="font-kanit font-bold text-3xl sm:text-4xl text-primary">
                ลูกค้าที่ไว้วางใจเรา
            </h2>
            <p class="font-kanit text-xl text-text-secondary mt-4 max-w-2xl mx-auto">
                หลายบริษัทชั้นนำในอุตสาหกรรมไทย เลือกใช้บริการจาก MORO
            </p>
        </div>

        <div class="relative overflow-hidden space-y-8">

            <?php
                // VVVV เรียกใช้ฟังก์ชัน VVVV
                
                // แถวที่ 1 (ไหลไปซ้าย)
                render_logo_track($logosRow1, 'scroll-left', $logoDir);
                
                // แถวที่ 2 (ไหลไปขวา)
                render_logo_track($logosRow2, 'scroll-right', $logoDir);
            ?>

        </div> </div> </section>