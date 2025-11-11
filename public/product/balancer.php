<?php
// public/product/balancer.php

// 1. (สำคัญ) เรียกใช้ DB และ .env ก่อนเสมอ
require_once __DIR__ . '/../../config/db_connect.php';

// 2. (สำคัญ) ตั้งค่า Meta Tags (ดึงจากโค้ดเก่า)
$page_title = "Balancer by Toyokoken | Moro Thai";
$page_description = "Moro Thai ตัวแทนจำหน่าย Balancer by Toyokoken จากญี่ปุ่น เครื่องช่วยยกของหนักที่ใช้งานง่าย เพิ่มความปลอดภัยและประสิทธิภาพในการทำงาน";
$og_url = "https://www.morothai.com/product/balancer.php";
$og_image = "https://www.morothai.com/images/balancer1.jpg"; // (ใช้รูปสินค้าหลัก)

// 3. เรียกส่วนหัว (Head)
include __DIR__ . '/../head.php';

// 4. เรียกส่วนเมนู (Nav)
include __DIR__ . '/../nav.php';
?>

<main>

    <section id="page-hero" class="relative bg-gray-900 text-white overflow-hidden 
                                  min-h-[calc(100vh-5rem)]">
        <img src="/images/balancer1.jpg"
            class="absolute inset-0 w-full h-full object-cover opacity-30"
            alt="Balancer by Toyokoken">
        <div class="absolute inset-0 bg-black/60"></div>

        <div id="page-hero-content"
            class="relative container mx-auto px-4 py-32 text-center h-full 
                   flex flex-col justify-center items-center 
                   opacity-0 translate-y-5 transition-all duration-700 ease-out">

            <h1 class="font-kanit font-bold text-4xl sm:text-5xl text-shadow-lg">
                Balancer by Toyokoken
            </h1>
            <hr class="w-24 mx-auto mt-6 border-t-4 border-primary">
            <p class="font-kanit text-xl mt-4 max-w-2xl mx-auto text-shadow">
                เครื่องช่วยยกของหนักที่ใช้งานง่าย เพิ่มความปลอดภัยและประสิทธิภาพ
            </p>
        </div>
    </section>

    <section class="bg-light py-16 sm:py-24 overflow-hidden">
        <div class="container mx-auto px-4 max-w-6xl">

            <nav class="font-kanit text-sm mb-8 opacity-0" id="breadcrumb"
                aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="/" class="text-text-secondary hover:text-primary">
                            <i class="fas fa-home mr-1"></i> หน้าแรก
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <i class="fas fa-angle-right text-gray-400"></i>
                            <a href="/product.php" class="ml-1 text-text-secondary hover:text-primary md:ml-2">สินค้า</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-angle-right text-gray-400"></i>
                            <span class="ml-1 font-medium text-text-main md:ml-2">Balancer</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12">

                <aside id="product-gallery-column"
                    class="opacity-0 translate-y-5 transition-all duration-700 ease-out delay-100">

                    <?php
                    $gallery_images = [
                        ['img' => '/images/balancer1.jpg', 'alt' => 'Balancer by Toyokoken'],
                        ['img' => '/images/balancer2.jpg', 'alt' => 'Balancer Example 2'],
                        ['img' => '/images/balancer3.jpg', 'alt' => 'Balancer Example 3'],
                        ['img' => '/images/balancer4.jpg', 'alt' => 'Balancer Example 4'],
                    ];
                    ?>

                    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
                        <?php foreach ($gallery_images as $image): ?>
                            <div class="rounded-lg shadow-md overflow-hidden group aspect-square">
                                <img src="<?php echo htmlspecialchars($image['img']); ?>"
                                    alt="<?php echo htmlspecialchars($image['alt']); ?>"
                                    class="w-full h-full object-cover transition-transform duration-300
                                            group-hover:scale-110">
                            </div>
                        <?php endforeach; ?>
                    </div>
                </aside>

                <div id="product-content-column"
                    class="opacity-0 translate-y-5 transition-all duration-700 ease-out delay-200">

                    <div>
                        <span class="font-kanit text-warning font-semibold text-base">TOYOKOKEN ERGO-HAND</span>
                        <h2 class="font-kanit font-bold text-2xl sm:text-3xl text-primary mt-2 mb-6">
                            Balancer 'Balaman' (Ergo-Hand)
                        </h2>
                        <p class="text-base text-text-secondary leading-relaxed mb-8">
                            เครื่องช่วยยกของหนักที่ใช้งานง่าย...
                        </p>
                    </div>

                    <div class="mt-8">
                        <h3 class="font-kanit font-bold text-xl text-primary mb-6">
                            คุณสมบัติ
                        </h3>
                        <ul class="space-y-4">
                            <li class="flex items-start">
                                <div class="flex-shrink-0 w-8 h-8 flex items-center justify-center bg-blue-100 rounded-full mr-4">
                                    <i class="fas fa-feather-alt text-primary"></i>
                                </div>
                                <span class="text-base text-text-secondary"><strong>เหมือนไร้น้ำหนัก:</strong> เคลื่อนย้ายวัตถุหนักได้ง่ายดายเหมือนไร้น้ำหนัก</span>
                            </li>
                            <li class="flex items-start">
                                <div class="flex-shrink-0 w-8 h-8 flex items-center justify-center bg-blue-100 rounded-full mr-4">
                                    <i class="fas fa-grip-vertical text-primary"></i>
                                </div>
                                <span class="text-base text-text-secondary"><strong>หัวจับหลากหลาย:</strong> รองรับ Attachment ทั้งแบบดูด (Vacuum), หนีบ (Clamp), หรือแม่เหล็ก (Magnet)</span>
                            </li>
                            <li class="flex items-start">
                                <div class="flex-shrink-0 w-8 h-8 flex items-center justify-center bg-blue-100 rounded-full mr-4">
                                    <i class="fas fa-shield-alt text-primary"></i>
                                </div>
                                <span class="text-base text-text-secondary"><strong>ปลอดภัยสูงสุด:</strong> มีระบบ Safety Device ป้องกันการตกของชิ้นงานแม้ไฟดับหรือลมตัด</span>
                            </li>
                        </ul>
                    </div>

                    <div class="mt-10">
                        <h3 class="font-kanit font-bold text-xl text-primary mb-6">
                            ทำไมต้องเลือกเรา
                        </h3>
                        <ul class="space-y-4">
                            <li class="flex items-start">
                                <div class="flex-shrink-0 w-8 h-8 flex items-center justify-center bg-green-100 rounded-full mr-4">
                                    <i class="fas fa-check-circle text-success"></i>
                                </div>
                                <span class="text-base text-text-secondary"><strong>ผู้เชี่ยวชาญตัวจริง:</strong> ประสบการณ์สูงด้าน Balancer รายเดียวในไทยที่ติดต่อพาร์ทเนอร์ญี่ปุ่นโดยตรง</span>
                            </li>
                            <li class="flex items-start">
                                <div class="flex-shrink-0 w-8 h-8 flex items-center justify-center bg-green-100 rounded-full mr-4">
                                    <i class="fas fa-check-circle text-success"></i>
                                </div>
                                <span class="text-base text-text-secondary"><strong>บริการครบวงจร:</strong> ตั้งแต่ประเมินหน้างาน, ติดตั้ง, บำรุงรักษา (PM), และจัดหาอะไหล่แท้</span>
                            </li>
                            <li class="flex items-start">
                                <div class="flex-shrink-0 w-8 h-8 flex items-center justify-center bg-green-100 rounded-full mr-4">
                                    <i class="fas fa-check-circle text-success"></i>
                                </div>
                                <span class="text-base text-text-secondary"><strong>ทดลองใช้งานจริง:</strong> สามารถเข้ามาสาธิตการใช้งานเครื่องจริงได้ที่ออฟฟิศของเรา</span>
                            </li>
                        </ul>
                    </div>

                    <div class="mt-12 flex flex-wrap gap-4">
                        <a href="/images/balancer_catalog.pdf" target="_blank"
                            class="inline-flex items-center justify-center bg-warning hover:bg-yellow-500 text-text-main font-kanit font-bold 
                                  px-6 py-3 rounded-lg text-base shadow-lg
                                  transition duration-300 transform hover:-translate-y-1">
                            <i class="fas fa-download mr-2"></i> ดาวน์โหลดแคตตาล็อค
                        </a>
                        <a href="https://line.me/ti/p/~@morothai" target="_blank"
                            class="inline-flex items-center justify-center bg-success hover:bg-green-700 text-white font-kanit font-bold 
                                  px-6 py-3 rounded-lg text-base shadow-lg
                                  transition duration-300 transform hover:-translate-y-1">
                            <i class="fab fa-line mr-2"></i> ติดต่อเราทันที
                        </a>
                    </div>

                </div> </div> </div> </section>

    <?php
    // 5.3 เรียก CTA Banner (มาตรฐานของเว็บเรา)
    include __DIR__ . '/../final-cta-banner.php';
    ?>

</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    
    // --- 6.1 ส่วนของ Animation (ย้ายมาจาก main.js) ---
    const observer = new IntersectionObserver(
        (entries, obs) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.remove("opacity-0", "translate-y-5");
                    obs.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.1 } // (ให้เริ่มทำงานเมื่อเห็น 10%)
    );

    // (เลือก Element เฉพาะในหน้านี้)
    const pageHero = document.querySelector("#page-hero-content");
    const breadcrumb = document.querySelector("#breadcrumb");
    const galleryCol = document.querySelector("#product-gallery-column");
    const contentCol = document.querySelector("#product-content-column");

    // (สั่ง Animate Hero)
    if (pageHero) {
        observer.observe(pageHero);
    }
    
    // (Animate Breadcrumb - ให้ขึ้นเลย)
    if (breadcrumb) {
        breadcrumb.classList.remove("opacity-0");
    }

    // (Animate 2 คอลัมน์แบบหน่วงเวลา)
    if (galleryCol) {
        // (เราตั้ง delay 100ms ไว้ใน HTML แล้ว)
        observer.observe(galleryCol);
    }
    if (contentCol) {
        // (เราตั้ง delay 200ms ไว้ใน HTML แล้ว)
        observer.observe(contentCol);
    }
});
</script>


<?php
// 7. เรียกส่วนท้าย (Footer)
include __DIR__ . '/../footer.php';
?>