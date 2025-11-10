<?php
// public/recruit.php

// 1. (สำคัญ) เรียกใช้ DB และ .env ก่อนเสมอ
require_once __DIR__ . '/../config/db_connect.php';

// 2. (สำคัญ) ตั้งค่า Meta Tags สำหรับหน้านี้ (ดีต่อ SEO)
$page_title = "ร่วมงานกับเรา | Moro Thai";
$page_description = "Moro Thai เปิดรับสมัครงาน และนักศึกษาฝึกงาน มาร่วมเป็นส่วนหนึ่งของทีมวิศวกรมาตรฐานญี่ปุ่น ขับเคลื่อนอุตสาหกรรมไทยไปด้วยกัน";
$og_url = "https://www.morothai.com/recruit.php";
$og_image = "https://www.morothai.com/images/internship.jpg"; // (ใช้รูปประกาศเป็นรูปแชร์)

// 3. เรียกส่วนหัว (Head)
include 'head.php';

// 4. เรียกส่วนเมนู (Nav)
include 'nav.php';
?>

<main>

    <section id="page-hero" class="relative bg-gray-900 text-white overflow-hidden">
        <img src="/images/showcase-thumbnail.jpg" 
             class="absolute inset-0 w-full h-full object-cover opacity-30" 
             alt="Moro Thailand Team">
        <div class="absolute inset-0 bg-black/60"></div>

        <div id="page-hero-content" 
             class="relative container mx-auto px-4 py-32 text-center
                    opacity-0 translate-y-5 transition-all duration-700 ease-out">
            
            <h1 class="font-kanit font-bold text-5xl sm:text-5xl text-shadow-lg">
                ร่วมงานกับเรา (Recruit)
            </h1>
            <hr class="w-24 mx-auto mt-6 border-t-4 border-primary">
            <p class="font-kanit text-xl mt-4 max-w-2xl mx-auto text-shadow">
                มาร่วมเป็นพลังขับเคลื่อนอุตสาหกรรมไทยสู่อนาคต
            </p>
        </div>
    </section>

    <section id="recruit-content" class="bg-white py-16 sm:py-24 overflow-hidden">
        
        <div class="container mx-auto px-4 max-w-4xl">

            <div id="recruit-intro" 
                 class="opacity-0 translate-y-5 transition-all duration-700 ease-out delay-100">
                
                <h2 class="font-kanit font-bold text-3xl sm:text-4xl text-primary mb-6">
                    มาร่วมเป็นส่วนหนึ่งกับเรา
                </h2>
                
                <div class="text-lg text-text-secondary leading-relaxed space-y-4">
                    <p>
                        ที่ MORO Thailand เราคือบริษัทพาร์ทเนอร์จากญี่ปุ่นโดยตรง เรามุ่งมั่นในการสร้างสภาพแวดล้อมการทำงานที่ "ปราณีต" และ "เป็นมืออาชีพ" ตามมาตรฐานญี่ปุ่น
                    </p>
                    <p>
                        เราเชื่อมั่นในพลังของคนรุ่นใหม่ และพร้อมเปิดโอกาสให้ทุกคนได้เรียนรู้ พัฒนาทักษะ และเติบโตไปพร้อมกับเรา เพื่อยกระดับอุตสาหกรรมไทย
                    </p>
                </div>

                <hr class="my-8 border-gray-200">

                <h3 class="font-kanit font-bold text-2xl text-primary mb-4">
                    ตำแหน่งที่เปิดรับ
                </h3>
                
                <div class="bg-light p-6 sm:p-8 rounded-lg shadow-inner">
                    <h4 class="font-kanit font-semibold text-xl text-text-main mb-2">
                        นักศึกษาฝึกงาน (Internship)
                    </h4>
                    <p class="text-text-secondary mb-6">
                        ขณะนี้เรากำลังเปิดรับนักศึกษาฝึกงานในตำแหน่ง UX/UI Designer (WFH 100%)
                        <br>
                        คุณสามารถดูรายละเอียดประกาศได้จาก Pop-up หรือกดปุ่มเพื่อดูอีกครั้ง
                    </p>
                    
                    <div class="flex flex-wrap gap-4">
                        <button id="open-intern-poster"
                           class="inline-block bg-warning hover:bg-yellow-500 text-text-main font-kanit font-bold 
                                  px-6 py-2.5 rounded-md text-sm
                                  transition duration-300 transform hover:-translate-y-0.5">
                           <i class="fas fa-search-plus mr-2"></i> ดูประกาศ (Pop-up)
                        </button>

                        <a href="mailto:asst.ideatrade@gmail.com"
                           class="inline-block bg-primary hover:bg-primary-dark text-white font-kanit font-medium 
                                  px-6 py-2.5 rounded-md text-sm
                                  transition duration-300 transform hover:-translate-y-0.5">
                           <i class="fas fa-paper-plane mr-2"></i> ส่ง CV (E-mail)
                        </a>
                    </div>
                </div>

            </div>

            </div> </section>


    <?php
    // 5.3 เรียก CTA Banner (มาตรฐานของเว็บเรา)
    include 'final-cta-banner.php';
    ?>

</main>

<script>
    // ฟังก์ชันสำหรับแสดง Modal
    function showInternshipModal() {
        Swal.fire({
            title: 'ประกาศรับนักศึกษาฝึกงาน',
            imageUrl: '/images/internship.jpg',
            imageWidth: '100%', // ให้ภาพเต็มความกว้างของ Modal
            imageAlt: 'ประกาศรับสมัครนักศึกษาฝึกงาน UX/UI',
            maxWidth: '500px', // กำหนดความกว้างสูงสุดของ Modal
            confirmButtonText: '<i class="fas fa-times"></i> ปิด',
            confirmButtonColor: '#0D47A1' // สี Primary
        });
    }

    // 1. รอให้หน้าเว็บโหลดเสร็จ
    document.addEventListener('DOMContentLoaded', function() {
        
        // 2. หน่วงเวลา 1.5 วินาที แล้วค่อยแสดง Pop-up
        setTimeout(showInternshipModal, 1500); // 1500ms = 1.5 วินาที

        // 3. ผูก Event Click ให้ปุ่ม "ดูประกาศ"
        const openBtn = document.getElementById('open-intern-poster');
        if (openBtn) {
            openBtn.addEventListener('click', showInternshipModal);
        }
    });
</script>


<?php
// 7. เรียกส่วนท้าย (Footer)
// (ไฟล์นี้จะโหลด SweetAlert2 JS ให้อัตโนมัติ)
include 'footer.php';
?>