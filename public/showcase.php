<?php
// showcase.php (เวอร์ชันอัปเกรด "Floating Card" + "Gallery Layout")
?>

<section id="showcase-section" class="overflow-hidden py-16 sm:py-24">

    <div class="container mx-auto 
                bg-white rounded-2xl shadow-xl 
                px-6 py-12 lg:px-12 lg:py-16">

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-16 items-center">

            <div
                id="showcase-image-wrapper"
                class="lg:col-span-5
                       opacity-0 translate-y-5 transition-all duration-700 ease-out delay-300">

                <div class="relative rounded-lg shadow-lg overflow-hidden group aspect-square">

                    <img
                        src="/images/best-seller-logo.png" alt="Best Seller Badge"
                        class="absolute top-0 right-0 w-24 sm:w-32 h-auto z-10 
                               -mt-4 -mr-4 sm:-mt-6 sm:-mr-6">

                    <img
                        src="/images/home-balancer.png" alt="Balancer By Toyokoken"
                        class="w-full h-full object-cover 
                               transition-transform duration-500 ease-in-out
                               group-hover:scale-105">
                </div>

                <div class="grid grid-cols-2 gap-4 mt-4">

                    <div class="rounded-lg shadow-md overflow-hidden group aspect-square">
                        <img
                            src="/images/recom-a.jpg" alt="Recommended Image 1"
                            class="w-full h-full object-cover 
                                   transition-transform duration-300
                                   group-hover:scale-110">
                    </div>

                    <div class="rounded-lg shadow-md overflow-hidden group aspect-square">
                        <img
                            src="/images/recom-b.jpg" alt="Recommended Image 2"
                            class="w-full h-full object-cover 
                                   transition-transform duration-300
                                   group-hover:scale-110">
                    </div>
                </div>

            </div>

            <div
                id="showcase-content"
                class="lg:col-span-7
                       opacity-0 translate-y-5 transition-all duration-700 ease-out delay-500">

                <h2 class="font-kanit font-bold text-3xl sm:text-4xl text-primary">
                    Balancer By Toyokoken
                </h2>

                <div class="flex flex-wrap gap-2 mt-4">
                    <span class="bg-gray-200 text-gray-700 font-kanit px-4 py-1 rounded-full text-sm font-medium">
                        #ทำไมต้อง Balancer?
                    </span>
                    <span class="bg-blue-100 text-blue-800 font-kanit px-4 py-1 rounded-full text-sm font-medium">
                        <i class="fas fa-microchip mr-1"></i> เทคโนโลยีญี่ปุ่น
                    </span>
                    <span class="bg-green-100 text-green-800 font-kanit px-4 py-1 rounded-full text-sm font-medium">
                        <i class="fas fa-check-circle mr-1"></i> บริการครบวงจร
                    </span>
                </div>

                <ul class="mt-6 space-y-3">
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-success mt-1 mr-3"></i>
                        <span class="text-lg text-text-main">
                            ลดอุบัติเหตุ <span class="font-medium">ยกของง่าย</span> ออกแรงน้อย
                        </span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-success mt-1 mr-3"></i>
                        <span class="text-lg text-text-main">
                            <span class="font-medium">ปลอดภัยกว่า</span> ลดการบาดเจ็บจากการยก
                        </span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-success mt-1 mr-3"></i>
                        <span class="text-lg text-text-main">
                            ตอบโจทย์โรงงานที่เน้น <span class="font-medium">Productivity</span>
                        </span>
                    </li>
                </ul>

                <div class="mt-8 flex flex-wrap gap-4">
                    <a
                        href="/product.php"
                        class="bg-primary hover:bg-primary-dark text-white font-kanit font-medium px-6 py-3 rounded-lg text-base shadow-lg hover:shadow-xl transition duration-300 transform hover:-translate-y-1">
                        <i class="fas fa-boxes-stacked mr-2"></i>
                        ดูสินค้าทั้งหมด
                    </a>

                    <a
                        href="https://line.me/ti/p/~@morothai" target="_blank"
                        class="bg-success hover:bg-green-700 text-white font-kanit font-medium px-6 py-3 rounded-lg text-base shadow-lg hover:shadow-xl transition duration-300 transform hover:-translate-y-1">
                        <i class="fab fa-line mr-2"></i>
                        ปรึกษาฟรีผ่าน LINE
                    </a>

                    <a
                        href="/images/balancer_catalog.pdf"
                        class="bg-warning hover:bg-warning-800 font-kanit font-medium px-6 py-3 rounded-lg text-base shadow-lg hover:shadow-xl transition duration-300 transform hover:-translate-y-1">
                        <i class="fa-solid fa-download"></i>
                        ดาวน์โหลดแคตตาล็อค
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>