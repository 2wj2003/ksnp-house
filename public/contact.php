<?php
// public/contact.php

// 1. (สำคัญ) เรียกใช้ DB และ .env ก่อนเสมอ
require_once __DIR__ . '/../config/db_connect.php';

// 2. (สำคัญ) ตั้งค่า Meta Tags สำหรับหน้านี้ (ดีต่อ SEO)
$page_title = "ติดต่อเรา | Moro Thai";
$page_description = "ติดต่อ Moro Thai บริษัท แมนูแฟคเจอร์ โอเวอร์ฮอล ราพิด แอนด์ ออพติมอล จำกัด สำหรับบริการเครื่องจักรอุตสาหกรรม, ซ่อมบำรุง, และระบบออโตเมชัน";
$og_url = "https://www.morothai.com/contact.php";
$og_image = "https://www.morothai.com/images/showcase-thumbnail.jpg"; 

// 3. เรียกส่วนหัว (Head)
include 'head.php';

// 4. เรียกส่วนเมนู (Nav)
include 'nav.php';
?>

<main>

    <section id="page-hero" class="relative bg-gray-800 text-white overflow-hidden">
        <img src="/images/showcase-thumbnail.jpg" 
             class="absolute inset-0 w-full h-full object-cover opacity-30" 
             alt="Moro Thailand Contact">
        <div class="absolute inset-0 bg-black/60"></div>

        <div id="page-hero-content" 
             class="relative container mx-auto px-4 py-32 text-center
                    opacity-0 translate-y-5 transition-all duration-700 ease-out">
            
            <h1 class="font-kanit font-bold text-4xl sm:text-5xl text-shadow-lg">
                ติดต่อเรา (Contact Us)
            </h1>
            <hr class="w-24 mx-auto mt-6 border-t-4 border-primary">
            <p class="font-kanit text-xl mt-4 max-w-2xl mx-auto text-shadow">
                เราพร้อมให้คำปรึกษาและนำเสนอโซลูชันที่เหมาะสมที่สุดสำหรับคุณ
            </p>
        </div>
    </section>

    <section id="contact-page" class="bg-white py-16 sm:py-24 overflow-hidden">
        
        <div class="container mx-auto px-4 max-w-6xl">

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16">

                <div id="contact-info" 
                     class="opacity-0 translate-y-5 transition-all duration-700 ease-out delay-100">
                    
                    <h2 class="font-kanit font-bold text-3xl sm:text-4xl text-primary mb-6">
                        ข้อมูลติดต่อ
                    </h2>
                    
                    <div class="space-y-4 text-lg text-text-secondary">
                        <p class="flex items-start">
                            <i class="fas fa-map-marker-alt text-primary mt-1.5 mr-4 w-5 text-center"></i>
                            <span>100/7 ซอยราษฎร์พัฒนา 14 แขวงราษฎร์พัฒนา เขตสะพานสูง กรุงเทพมหานคร 10240</span>
                        </p>
                        <p class="flex items-center">
                            <i class="fas fa-phone text-primary mr-4 w-5 text-center"></i>
                            <a href="tel:021158838" class="hover:text-primary">02 115 8838</a>
                        </p>
                        <p class="flex items-center">
                            <i class="fas fa-envelope text-primary mr-4 w-5 text-center"></i>
                            <a href="mailto:info@moro.co.th" class="hover:text-primary">info@moro.co.th</a>
                        </p>
                        <p class="flex items-center">
                            <i class="fab fa-line text-primary mr-4 w-5 text-center"></i>
                            <a href="https://line.me/ti/p/~@morothai" target="_blank" class="hover:text-primary">@morothai</a>
                        </p>
                        <p class="flex items-center">
                            <i class="fas fa-clock text-primary mr-4 w-5 text-center"></i>
                            <span>จันทร์ - ศุกร์ (09:00 - 17:30 น.)</span>
                        </p>
                        <p class="flex items-center">
                            <i class="fas fa-file-invoice text-primary mr-4 w-5 text-center"></i>
                            <span>Tax ID: 0105557170081 (สำนักงานใหญ่)</span>
                        </p>
                    </div>

                    <hr class="my-8 border-gray-200">

                    <h3 class="font-kanit font-bold text-2xl text-primary mb-4">
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

                <div id="contact-form-wrapper" 
                     class="bg-light p-6 sm:p-8 rounded-lg shadow-lg
                            opacity-0 translate-y-5 transition-all duration-700 ease-out delay-200">
                    
                    <h2 class="font-kanit font-bold text-3xl text-primary mb-6">
                        ส่งข้อความถึงเรา
                    </h2>
                    
                    <form id="contact-page-form" class="space-y-4">
                        
                        <input type="text" name="honeypot" style="display:none;">
                        <input type="hidden" id="recaptcha-token" name="recaptcha-token">

                        <div>
                            <label for="contact-name" class="block text-sm font-medium text-text-main mb-1">ชื่อ-นามสกุล <span class="text-red-500">*</span></label>
                            <input type="text" id="contact-name" name="name" 
                                   class="w-full px-4 py-2.5 border border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary" 
                                   required>
                        </div>
                        
                        <div>
                            <label for="contact-phone" class="block text-sm font-medium text-text-main mb-1">เบอร์โทรศัพท์ <span class="text-red-500">*</span></label>
                            <input type="tel" id="contact-phone" name="phone" 
                                   class="w-full px-4 py-2.5 border border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary" 
                                   required>
                        </div>
                        
                        <div>
                            <label for="contact-email" class="block text-sm font-medium text-text-main mb-1">อีเมล (ถ้ามี)</label>
                            <input type="email" id="contact-email" name="email" 
                                   class="w-full px-4 py-2.5 border border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary">
                        </div>
                        
                        <div>
                            <label for="contact-message" class="block text-sm font-medium text-text-main mb-1">ข้อความ <span class="text-red-500">*</span></label>
                            <textarea id="contact-message" name="message" rows="5" 
                                      class="w-full px-4 py-2.5 border border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary" 
                                      required></textarea>
                        </div>
                        
                        <div class="pt-4">
                            <button type="submit" id="contact-submit-btn" 
                                    class="w-full flex justify-center py-3.5 px-4 border border-transparent rounded-lg shadow-lg text-lg font-kanit font-bold text-white bg-primary hover:bg-primary-dark 
                                           focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary
                                           transition duration-300 transform hover:-translate-y-1">
                                <i class="fas fa-paper-plane mr-2"></i> ส่งข้อความ
                            </button>
                        </div>
                        
                        <p class="text-xs text-gray-500 text-center pt-2">
                            This site is protected by reCAPTCHA and the Google
                            <a href="https://policies.google.com/privacy" class="hover:underline">Privacy Policy</a> and
                            <a href="https://policies.google.com/terms" class="hover:underline">Terms of Service</a> apply.
                        </p>
                    </form>
                </div>

            </div> </div> </section>

    </main>

<?php
// 6. เรียกส่วนท้าย (Footer)
// (ไฟล์นี้จะโหลด SweetAlert2 และ main.js ให้อัตโนมัติ)
include 'footer.php';
?>