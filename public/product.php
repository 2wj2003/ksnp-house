<?php
// public/product.php

// 1. (สำคัญ) เรียกใช้ DB และ .env ก่อนเสมอ
require_once __DIR__ . '/../config/db_connect.php';

// 2. (สำคัญ) ตั้งค่า Meta Tags สำหรับหน้านี้
$page_title = "สินค้าของเรา | Moro Thai";
$page_description = "สินค้าและผลิตภัณฑ์จาก Moro Thai: เครื่องยก Balancer จาก Toyokoken, เครื่องจักรอัตโนมัติ, อุปกรณ์จับยึด (JIG & FIXTURE) และอื่นๆ";
$og_url = "https://www.morothai.com/product.php";
$og_image = "https://www.morothai.com/images/moro-thai-share-image.jpg"; // (สมมติ URL นี้)

// 3. เรียกส่วนหัว (Head)
include 'head.php'; //

// 4. เรียกส่วนเมนู (Nav)
include 'nav.php'; //
?>

<main>

    <section id="page-hero" class="relative bg-gray-900 lg:min-h-[calc(100vh-5rem)] text-white overflow-hidden">
        <img src="/images/showcase-thumbnail.jpg"
            class="absolute inset-0 w-full h-full object-cover opacity-30"
            alt="Moro Thailand Products">
        <div class="absolute inset-0 bg-black/60"></div>

        <div id="page-hero-content"
            class="relative container mx-auto px-4 py-32 text-center
                    opacity-0 translate-y-5 transition-all duration-700 ease-out">

            <h1 class="font-kanit font-bold text-5xl sm:text-5xl text-shadow-lg">
                สินค้าและผลิตภัณฑ์
            </h1>
            <hr class="w-24 mx-auto mt-6 border-t-4 border-primary">
            <p class="font-kanit text-2xl mt-4 max-w-2xl mx-auto text-shadow">
                เราคัดสรรและพัฒนาผลิตภัณฑ์คุณภาพสูง <br class="hidden sm:block"> เพื่อตอบสนองทุกความต้องการในอุตสาหกรรม
            </p>
        </div>
    </section>

    <section id="product-list" class="bg-light py-16 sm:py-24 overflow-hidden">
        <div class="container mx-auto px-4">

            <div id="product-grid-title"
                class="text-center mb-12
                        opacity-0 translate-y-5 transition-all duration-700 ease-out">
                <h2 class="font-kanit font-bold text-3xl sm:text-4xl text-primary">
                    หมวดหมู่สินค้าของเรา
                </h2>
                <p class="font-kanit text-lg text-text-secondary mt-3 max-w-2xl mx-auto">
                    คลิกเพื่อดูรายละเอียดสินค้าแต่ละประเภท
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">

                <?php
                // (Array ข้อมูลสินค้ายังเหมือนเดิม)
                $products = [
                    [
                        'img' => '/images/balancer1.jpg',
                        'alt' => 'Balancer by Toyokoken',
                        'title' => 'Balancer',
                        'link' => './product/balancer.php'
                    ],
                    [
                        'img' => '/images/babyhoist.jpg',
                        'alt' => 'BABY HOIST',
                        'title' => 'BABY HOIST',
                        'link' => './product/babyhoist.php'
                    ],
                    [
                        'img' => '/images/Safety Simulator.jpg',
                        'alt' => 'Safety Simulator',
                        'title' => 'Safety Simulator',
                        'link' => './product/safety.php'
                    ],
                    [
                        'img' => '/images/Bender and Shearing Machine.jpg',
                        'alt' => 'Bender and Shearing Machine',
                        'title' => 'Bender & Shearing Machine',
                        'link' => './product/bender.php'
                    ],
                    [
                        'img' => '/images/Electrolyte.jpg',
                        'alt' => 'Electrolyzed Water Generator',
                        'title' => 'Electrolyzed Water Generator',
                        'link' => './product/electrolyzed.php'
                    ],
                    [
                        'img' => '/images/Sterilizer.jpg',
                        'alt' => 'Sterilizer',
                        'title' => 'Sterilizer',
                        'link' => './product/sterilizer.php'
                    ],
                    [
                        'img' => '/images/Deburring Blusher.jpg',
                        'alt' => 'Deburring Blusher',
                        'title' => 'Deburring Blusher',
                        'link' => './product/deburring.php'
                    ],
                    [
                        'img' => '/images/ Leak Test System.jpg',
                        'alt' => 'Leak Test System',
                        'title' => 'Leak Test System',
                        'link' => './product/leak.php'
                    ]
                ];

                // (วนลูป PHP เพื่อสร้างการ์ดสินค้า)
                foreach ($products as $index => $product):
                ?>

                    <div class="product-card flex flex-col bg-white rounded-lg shadow-lg overflow-hidden
                            transition-all duration-300 hover:shadow-xl hover:-translate-y-2
                            opacity-0 translate-y-5">

                        <div class="aspect-[4/3] overflow-hidden group">
                            <img src="<?php echo htmlspecialchars($product['img']); ?>"
                                alt="<?php echo htmlspecialchars($product['alt']); ?>"
                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        </div>

                        <div class="p-6 flex-grow flex flex-col justify-between">
                            <h3 class="font-kanit font-bold text-xl text-primary mb-4">
                                <?php echo htmlspecialchars($product['title']); ?>
                            </h3>
                            <a href="<?php echo htmlspecialchars($product['link']); ?>"
                                class="inline-block bg-primary hover:bg-primary-dark text-white font-kanit font-medium 
                                  px-6 py-2.5 rounded-md text-center text-sm
                                  transition duration-300 transform hover:-translate-y-0.5">
                                ดูรายละเอียด
                            </a>
                        </div>
                    </div>

                <?php endforeach; ?>

            </div>
        </div>
    </section>

    <?php
    // 5.3 เรียก CTA Banner (มาตรฐานของเว็บเรา)
    include 'final-cta-banner.php';
    ?>

</main>

<?php
// 6. เรียกส่วนท้าย (Footer)
include 'footer.php';
?>