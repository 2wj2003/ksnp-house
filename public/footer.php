<footer class="bg-gray-900 text-gray-300 py-16">
    <div class="container mx-auto px-8">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">

            <div class="lg:col-span-2">
                <h3 class="font-kanit font-bold text-xl text-white mb-6 relative 
                           after:content-[''] after:absolute after:left-0 after:bottom-[-8px] 
                           after:h-0.5 after:w-16 after:bg-primary">
                    Moro Thailand
                </h3>
                <p class="text-sm mb-4">Manufacture Overhaul Rapid and Optimal Co., Ltd.<br>บริษัท แมนูแฟคเจอร์ โอเวอร์ฮอล ราพิด แอนด์ ออพติมอล จำกัด</p>
                <p class="flex items-start mb-2 text-sm"><i class="fas fa-map-marker-alt text-light mt-1 mr-3 w-4"></i> 100/7 ซอยราษฎร์พัฒนา 14 แขวงราษฎร์พัฒนา เขตสะพานสูง กรุงเทพมหานคร 10240</p>
                <p class="flex items-center mb-2 text-sm"><i class="fas fa-phone text-light mr-3 w-4"></i> 02 115 8838</p>
                <p class="flex items-center mb-2 text-sm"><i class="fas fa-envelope text-light mr-3 w-4"></i> info@moro.co.th</p>
                <p class="flex items-center mb-2 text-sm"><i class="fab fa-line text-light mr-3 w-4"></i> @morothai</p>
                <p class="flex items-center mb-2 text-sm"><i class="fas fa-clock text-light mr-3 w-4"></i> 09:00 - 17:30 น.</p>
                <p class="mt-4 text-sm">Tax ID: 0105557170081 (สำนักงานใหญ่)</p>
            </div>

            <div>
                <h3 class="font-kanit font-bold text-xl text-white mb-6 relative 
                           after:content-[''] after:absolute after:left-0 after:bottom-[-8px] 
                           after:h-0.5 after:w-16 after:bg-primary">
                    เชื่อมต่อกับเรา
                </h3>
                <div class="flex gap-4 mt-4">
                    <a href="https://www.facebook.com/morothaiofficial/?locale=th_TH" target="_blank" aria-label="Facebook"
                        class="w-10 h-10 rounded-full bg-gray-700 hover:bg-primary text-white flex items-center justify-center transition-colors">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://line.me/ti/p/~@morothai" target="_blank" aria-label="Line"
                        class="w-10 h-10 rounded-full bg-gray-700 hover:bg-success text-white flex items-center justify-center transition-colors">
                        <i class="fab fa-line"></i>
                    </a>
                    <a href="https://maps.app.goo.gl/mcEKTsz4W89bWPrJ6" target="_blank" aria-label="Line"
                        class="w-10 h-10 rounded-full bg-gray-700 hover:bg-warning text-white flex items-center justify-center transition-colors">
                        <i class="fa-solid fa-location-dot"></i>
                    </a>
                </div>
            </div>

            <div>
                <h3 class="font-kanit font-bold text-xl text-white mb-6 relative 
                           after:content-[''] after:absolute after:left-0 after:bottom-[-8px] 
                           after:h-0.5 after:w-16 after:bg-primary">
                    แผนที่
                </h3>
                <div class="aspect-video rounded-lg overflow-hidden shadow-lg">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3875.077669336838!2d100.70095147365173!3d13.774189586619999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x311d5fdf93df6ffd%3A0xd56cab08055ccfad!2sManufacture%20Overhaul%20Rapid%20and%20Optimal%20Co.%2C%20Ltd.!5e0!3m2!1sen!2sth!4v1762266995799!5m2!1sen!2sth"
                        width="100%"
                        height="100%"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>

        </div>

        <div class_img="container mx-auto px-4 text-center border-t border-gray-700 pt-8 mt-12 text-sm text-gray-500">
            <p>© <?php echo date("Y"); ?> Manufacture Overhaul Rapid and Optimal Co., Ltd. All rights reserved.</p>
        </div>
    </div>
</footer>

<div id="back-to-top-btn"
    class="fixed bottom-6 right-6 z-50 cursor-pointer 
            w-14 h-14 bg-primary rounded-full shadow-lg
            flex items-center justify-center
            opacity-0 invisible transition-all duration-300 transform translate-y-5
            hover:bg-primary-dark hover:-translate-y-1">

    <i id="btt-icon" class="fa-solid fa-hand-point-up text-white text-2xl transition-transform duration-500"></i>

</div>


<?php
    // 1. SweetAlert2 JS (จาก CDN)
    echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>';

    // 2. โหลด Google reCAPTCHA v3
    echo '<script src="https://www.google.com/recaptcha/api.js?render=' . $_ENV['RECAPTCHA_SITE_KEY'] . '"></script>';

    // 3. [สำคัญ] ส่ง Site Key ไปให้ JavaScript
    // (สร้างตัวแปร global ชื่อ recaptchaSiteKey)
    echo "<script>var recaptchaSiteKey = '" . htmlspecialchars($_ENV['RECAPTCHA_SITE_KEY']) . "';</script>";

    // 4. ไฟล์ JS หลักของเรา (ที่รวมโค้ดเมนู, อนิเมชั่น, ฯลฯ)
    echo '<script src="/js/main.js"></script>';
?>



</body>

</html>