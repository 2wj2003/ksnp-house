<?php
// public/service.php

// 1. (สำคัญ) เรียกใช้ DB และ .env ก่อนเสมอ
require_once __DIR__ . '/../config/db_connect.php';

// 2. (สำคัญ) ตั้งค่า Meta Tags สำหรับหน้านี้ (ดีต่อ SEO)
$page_title = "บริการของเรา | Moro Thai";
$page_description = "บริการครบวงจรด้านเครื่องจักรอุตสาหกรรม ซ่อมบำรุง PM, ออกแบบไลน์ผลิต Automation, ติดตั้ง Solar Cell โดยทีมวิศวกรมาตรฐานญี่ปุ่น";
$og_url = "https://www.morothai.com/service.php";
$og_image = "https://www.morothai.com/images/rm_thumbnail.jpg"; 

// 3. เรียกส่วนหัว (Head)
include 'head.php';

// 4. เรียกส่วนเมนู (Nav)
include 'nav.php';
?>

<main>

    <section id="page-hero" class="relative bg-gray-900 lg:min-h-[calc(100vh-5rem)] text-white overflow-hidden">
        <img src="/images/rm_thumbnail.jpg" 
             class="absolute inset-0 w-full h-full object-cover opacity-30" 
             alt="Moro Thailand Service Team">
        <div class="absolute inset-0 bg-black/60"></div>

        <div id="page-hero-content" 
             class="relative container mx-auto px-4 py-32 text-center
                    opacity-0 translate-y-5 transition-all duration-700 ease-out">
            
            <h1 class="font-kanit font-bold text-5xl sm:text-5xl text-shadow-lg">
                บริการของเรา
            </h1>
            <hr class="w-24 mx-auto mt-6 border-t-4 border-primary">
            <p class="font-kanit text-xl mt-4 max-w-2xl mx-auto text-shadow">
                โซลูชันครบวงจรสำหรับอุตสาหกรรม ด้วยมาตรฐานวิศวกรญี่ปุ่น
            </p>
        </div>
    </section>

    <section id="service-details-list" class="bg-light py-16 sm:py-24 overflow-hidden">
        
        <div class="container mx-auto px-4">

            <div id="service-grid-title" 
                 class="text-center mb-12
                        opacity-0 translate-y-5 transition-all duration-700 ease-out">
                <h2 class="font-kanit font-bold text-3xl sm:text-4xl text-primary">
                    บริการครบวงจรของเรา
                </h2>
                <p class="font-kanit text-lg text-text-secondary mt-3 max-w-2xl mx-auto">
                    เราเชี่ยวชาญในการแก้ปัญหาและยกระดับโรงงานอุตสาหกรรม
                </p>
            </div>

            <?php
            // (Array ข้อมูล services ยังอยู่เหมือนเดิม)
            $services = [
                [
                    'title' => 'ซ่อมบำรุงเครื่องจักร (PM)',
                    'desc' => 'บริการ ซ่อมบำรุงเครื่องจักรอุตสาหกรรม (Preventive Maintenance) โดยทีมช่างเทคนิคที่เชี่ยวชาญ รักษาประสิทธิภาพและยืดอายุการใช้งาน',
                    'icon' => 'fas fa-wrench',
                    'img' => '/images/Photo_Urgent-Machine-Maintenance-PM.jpg',
                    'link' => './showcase/rm.php'
                ],
                [
                    'title' => 'ออกแบบ และผลิตเครื่องจักร',
                    'desc' => 'ออกแบบและผลิตเครื่องจักรใหม่ตามสเปกงานลูกค้าโดยเฉพาะ (Custom-made) เพื่อตอบโจทย์กระบวนการผลิตที่ซับซ้อน',
                    'icon' => 'fas fa-cogs',
                    'img' => '/images/Photo_Design-and-Production-Automation-System_02.jpg',
                    'link' => './showcase/dpmm.php'
                ],
                [
                    'title' => 'ออกแบบ และผลิตอุปกรณ์จับยึด',
                    'desc' => 'บริการออกแบบ Jig และ Fixture สำหรับใช้ในไลน์ผลิตอัตโนมัติ หรืองานตรวจสอบคุณภาพ (QC) มั่นใจได้ในความแม่นยำสูง',
                    'icon' => 'fas fa-drafting-compass',
                    'img' => '/images/Photo_Production-JIG-Fixture-and-Parts.jpg',
                    'link' => './showcase/dpjf.php'
                ],
                [
                    'title' => 'บริการจัดหาเครื่องจักร',
                    'desc' => 'รับจัดหา เครื่องจักรโรงงาน และอุปกรณ์เฉพาะทาง ทั้งเครื่องใหม่และรีฟอร์ม (Refurbished) คุณภาพสูงจากญี่ปุ่น',
                    'icon' => 'fas fa-search-plus',
                    'img' => '/images/showcase-thumbnail.jpg',
                    'link' => './showcase/pfmn.php'
                ],
                [
                    'title' => 'รับติดตั้งระบบโซล่าเซลล์',
                    'desc' => 'บริการ ติดตั้งโซลาร์เซลล์สำหรับโรงงานอุตสาหกรรม แบบครบวงจร ช่วยลดต้นทุนค่าไฟในระยะยาว คืนทุนไว',
                    'icon' => 'fas fa-solar-panel',
                    'img' => '/images/mn4.png',
                    'link' => './showcase/scsi.php'
                ],
                [
                    'title' => 'ออกแบบระบบไลน์ผลิต',
                    'desc' => 'ออกแบบ ระบบไลน์ผลิตอัตโนมัติ (Automation Line) ช่วยลดการพึ่งพาแรงงานคน เพิ่ม Productivity และความแม่นยำในการผลิต',
                    'icon' => 'fas fa-robot',
                    'img' => '/images/design3-thumb.png',
                    'link' => './showcase/dpas.php'
                ]
            ];
            ?>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-8">

                <?php
                // (วนลูป PHP เพื่อสร้าง "การ์ด" บริการ)
                foreach ($services as $index => $service):
                ?>
                
                <div id="service-item-<?php echo $index; ?>" 
                     class="service-detail-item flex flex-col bg-white rounded-lg shadow-lg overflow-hidden
                            transition-all duration-300 hover:shadow-xl hover:-translate-y-2
                            opacity-0 translate-y-5">
                    
                    <div class="aspect-[4/3] overflow-hidden group">
                        <img src="<?php echo htmlspecialchars($service['img']); ?>" 
                             alt="<?php echo htmlspecialchars($service['title']); ?>"
                             class="w-64 h-64 object-cover transition-transform duration-500 group-hover:scale-110">
                    </div>
                    
                    <div class="p-6 flex-grow flex flex-col">
                        <div class="inline-flex items-center justify-center w-12 h-12 bg-primary rounded-full mb-4">
                            <i class="<?php echo $service['icon']; ?> text-xl text-warning"></i>
                        </div>
                        <h3 class="font-kanit font-bold text-xl text-primary mb-3">
                            <?php echo htmlspecialchars($service['title']); ?>
                        </h3>
                        <p class="text-text-secondary text-base leading-relaxed flex-grow mb-6">
                            <?php echo htmlspecialchars($service['desc']); ?>
                        </p>
                        <a href="<?php echo htmlspecialchars($service['link']); ?>" 
                           class="inline-block bg-primary hover:bg-primary-dark text-white font-kanit font-medium 
                                  px-6 py-2.5 rounded-md text-center text-sm
                                  transition duration-300 transform hover:-translate-y-0.5 mt-auto">
                            <i class="fas fa-arrow-right mr-2"></i> ดูผลงาน
                        </a>
                    </div>

                </div> <?php endforeach; ?>

            </div> </div> </section>

    <?php
    // 5.3 เรียก CTA Banner (มาตรฐานของเว็บเรา)
    include 'final-cta-banner.php';
    ?>

</main>

<?php
// 6. เรียกส่วนท้าย (Footer)
include 'footer.php';
?>