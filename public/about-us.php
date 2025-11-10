<?php
// public/about-us.php

// 1. (สำคัญ) เรียกใช้ DB และ .env
require_once __DIR__ . '/../config/db_connect.php'; //

// 2. (สำคัญ) ดึง Meta Tags "ทองคำ" จากโค้ดเก่าของคุณ
$page_title = "เกี่ยวกับเรา | Moro Thai";
$page_description = "Moro Thai ผู้เชี่ยวชาญด้านเครื่องจักรอุตสาหกรรมและระบบออโตเมชันจากประสบการณ์กว่า 47 ปีจากญี่ปุ่น สู่โซลูชันครบวงจรในประเทศไทย";
$og_url = "https://www.morothai.com/about-us.php"; // (ผมแก้เป็น about-us.php นะครับ)
$og_image = "https://www.morothai.com/images/moro-thai-share-image.jpg"; // (URL นี้จะใช้เมื่อเว็บออนไลน์จริง)

// 3. เรียกส่วนหัว (Head)
// (เดี๋ยวเราจะไปอัปเกรด head.php ให้ใช้ $page_description นี้ด้วย)
include 'head.php'; //

// 4. เรียกส่วนเมนู (Nav)
include 'nav.php'; //
?>

<main>

    <section class="relative bg-gray-800 text-white"
        style="background-image: url('/images/aboutusthumb.png'); background-size: cover; background-position: center;">

        <div class="absolute inset-0 bg-black/60"></div>

        <div id="about-hero-content"
            class="relative container mx-auto px-4 py-32 text-center
                    opacity-0 translate-y-5 transition-all duration-700 ease-out">

            <h1 class="font-kanit font-bold text-5xl">เกี่ยวกับเรา</h1>
            <hr class="w-24 mx-auto mt-6 border-t-4 border-primary">
            <p class="font-kanit text-xl mt-4">Manufacture Overhaul Rapid and Optimal Co., Ltd.</p>
        </div>
    </section>

    <section class="bg-light py-16 sm:py-24 overflow-hidden">
        <div class="container mx-auto px-4 max-w-4xl">
            <div id="about-intro" class="text-center space-y-4 text-lg text-text-secondary leading-relaxed
                                        opacity-0 translate-y-5 transition-all duration-700 ease-out delay-100">
                <h2 class="font-kanit font-bold text-3xl sm:text-4xl text-primary">
                    ประสบการณ์กว่า 47 ปีจากญี่ปุ่น <br> สู่โซลูชันเครื่องจักรครบวงจรในประเทศไทย
                </h2>
                <hr class="w-32 mx-auto my-6 border-t-2 border-gray-300">
                <p>
                    บริษัท แมนูแฟคเจอร์ โอเวอร์ฮอล ราพิด แอนด์ ออพติมอล จำกัด ก่อตั้งขึ้นที่ประเทศญี่ปุ่นในนาม <strong>บริษัท โมโร แมนูแฟคเจอริ่ง จำกัด จ.ยามานาชิ</strong> ตั้งแต่ปี ค.ศ. 1966 (พ.ศ. 2509)
                </p>
                <p>
                    เราคือผู้เชี่ยวชาญด้านการออกแบบและผลิตอุปกรณ์จับยึด ไปจนถึงระบบออโตเมชันสำหรับอุตสาหกรรมชั้นนำ...
                </p>
                <p class="text-xl text-text-main font-semibold mt-4">
                    ก้าวสู่ปีที่ 10 ในไทย เราพร้อมขับเคลื่อนทุกสายการผลิตให้ปลอดภัย รวดเร็ว และมีประสิทธิภาพยิ่งกว่าเดิม ด้วยบริการครบวงจร
                </p>
            </div>

            <div id="about-mission" class="mt-16
                                          opacity-0 translate-y-5 transition-all duration-700 ease-out delay-200">
                <h3 class="font-kanit font-bold text-3xl text-primary mb-6">พันธกิจของเรา</h3>
                <div class="space-y-6 text-text-secondary leading-relaxed bg-white p-8 rounded-lg shadow-lg">
                    <div>
                        <h4 class="font-kanit font-semibold text-xl text-text-main mb-2">พันธกิจต่อตัวเอง (To Ourselves)</h4>
                        <p>เราเป็นองค์กรญี่ปุ่นที่มุ่งมั่นในการสนับสนุนการพัฒนาอุตสาหกรรมไทยอย่างยั่งยืน...</p>
                    </div>
                    <div>
                        <h4 class="font-kanit font-semibold text-xl text-text-main mb-2">พันธกิจต่อลูกค้า (To Customers)</h4>
                        <p>เรามุ่งมั่นที่จะให้บริการที่เหมาะสม ตรงกับความต้องการของลูกค้าอย่างแท้จริง...</p>
                    </div>
                    <div>
                        <h4 class="font-kanit font-semibold text-xl text-text-main mb-2">พันธกิจต่อพันธมิตรทางธุรกิจ (To Partners)</h4>
                        <p>เรายึดมั่นในความซื่อสัตย์และความไว้วางใจซึ่งกันและกัน...</p>
                    </div>
                    <div>
                        <h4 class="font-kanit font-semibold text-xl text-text-main mb-2">พันธกิจสังคมและการพัฒนาบุคลากร (To Society & Future Talents)</h4>
                        <p>เรามุ่งมั่นในการสร้างโอกาสให้กับคนรุ่นใหม่ทั้งในไทยและญี่ปุ่น...</p>
                    </div>
                </div>
            </div>

            <div id="about-offices" class="mt-16
                                          opacity-0 translate-y-5 transition-all duration-700 ease-out delay-300">
                <h2 class="font-kanit font-bold text-3xl text-primary text-center mb-8">สำนักงานของเรา</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                    <div class="bg-white p-6 rounded-lg shadow-lg border-l-4 border-gray-300">
                        <h4 class="font-kanit font-bold text-xl text-text-main mb-3"><i class="fas fa-building mr-2"></i> สำนักงานใหญ่ญี่ปุ่น (บริษัทแม่)</h4>
                        <p class="text-text-secondary">3169 Komai, Fujii-cho, Nirasaki-shi, Yamanashi-ken 407-0001, Japan</p>
                        <p class="text-text-secondary mt-2"><i class="fas fa-globe mr-2"></i> เว็บไซต์: <a href="https://moross.co.jp/" target="_blank" class="text-primary hover:underline">moross.co.jp</a></p>
                    </div>

                    <div class="bg-white p-6 rounded-lg shadow-lg border-l-4 border-primary">
                        <h4 class="font-kanit font-bold text-xl text-primary mb-3"><i class="fas fa-headset mr-2"></i> สำนักงานใหญ่ประเทศไทย</h4>
                        <p class="text-text-secondary"><i class="fas fa-map-marker-alt mr-2 w-4"></i> ที่อยู่: 100/7 ซอยราษฎร์พัฒนา 14 แขวงราษฎร์พัฒนา...</p>
                        <p class="text-text-secondary mt-2"><i class="fas fa-phone mr-2 w-4"></i> โทร: 02-115-8838</p>
                        <p class="text-text-secondary mt-2"><i class="fas fa-envelope mr-2 w-4"></i> อีเมล: info@moro.co.th</p>
                        <p class="text-text-secondary mt-2"><i class="fab fa-line mr-2 w-4"></i> Line OA: @morothai</p>
                    </div>
                </div>
            </div>

            <div id="about-slogan" class="mt-16 text-center text-xl text-primary font-semibold
                                        opacity-0 translate-y-5 transition-all duration-700 ease-out delay-400">
                <p>พร้อมเป็นพลังขับเคลื่อนอุตสาหกรรมไทยสู่อนาคต<br>เลือกเรา แล้วคุณจะมั่นใจว่า “งานหนักแค่ไหน ก็ปลอดภัยและเสร็จทันเวลา”</p>
            </div>

        </div>
    </section>

</main>

<?php
// 6. เรียกส่วนท้าย (Footer)
// (ไฟล์นี้จะโหลด js/main.js ซึ่งเราจะไปเพิ่มโค้ด Animation กัน)
include 'footer.php'; //
?>