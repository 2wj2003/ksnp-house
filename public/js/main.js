/**
 * js/main.js
 * โค้ด JavaScript หลักสำหรับเว็บไซต์ MORO Thailand
 * * สารบัญ:
 * 1. initMobileMenu()      - ควบคุมเมนูมือถือ (Hamburger)
 * 2. initBackToTop()       - ควบคุมปุ่มกลับขึ้นบน
 * 3. initClientCarousel()  - ควบคุม Carousel โลโก้ (Pause on Hover)
 * 4. initContactModal()    - ควบคุม Modal ฟอร์มติดต่อด่วน (SweetAlert2)
 * 5. initPageAnimations()  - ควบคุมอนิเมชั่น Fade-in ทั้งหมด (Observer)
 */

// -------------------------------------------------------------------
// (จุดเริ่มต้นหลัก)
// รอให้หน้าเว็บโหลดเสร็จ (DOMContentLoaded) เพียง "ครั้งเดียว"
// แล้วค่อยเรียกใช้ฟังก์ชันทั้งหมด
// -------------------------------------------------------------------
document.addEventListener("DOMContentLoaded", function () {
  // เรียกใช้ฟังก์ชันหลักทั้งหมด
  initMobileMenu();
  initBackToTop();
  initClientCarousel();
  initContactModal();
  initPageAnimations();
});

// -------------------------------------------------------------------
// 1. ควบคุมเมนูมือถือ (Hamburger Menu)
// -------------------------------------------------------------------
function initMobileMenu() {
  const menuButton = document.getElementById("mobile-menu-button");
  const mobileMenu = document.getElementById("mobile-menu");

  if (menuButton && mobileMenu) {
    menuButton.addEventListener("click", function () {
      mobileMenu.classList.toggle("hidden");
    });
  }
}

// -------------------------------------------------------------------
// 2. ควบคุมปุ่มกลับขึ้นบน (Back to Top) - [เวอร์ชันอัปเดต]
// -------------------------------------------------------------------
function initBackToTop() {
  const backToTopBtn = document.getElementById("back-to-top-btn");
  const bttIcon = document.getElementById("btt-icon"); // [ใหม่] หาไอคอนฟันเฟือง

  if (backToTopBtn && bttIcon) {
    // [ใหม่] เช็กว่ามีไอคอนด้วย

    // ฟังก์ชันแสดง/ซ่อนปุ่ม (อันนี้เหมือนเดิม)
    function toggleBackToTopButton() {
      if (window.pageYOffset > 300) {
        backToTopBtn.classList.add("opacity-100", "visible", "translate-y-0");
        backToTopBtn.classList.remove(
          "opacity-0",
          "invisible",
          "translate-y-5"
        );
      } else {
        backToTopBtn.classList.add("opacity-0", "invisible", "translate-y-5");
        backToTopBtn.classList.remove(
          "opacity-100",
          "visible",
          "translate-y-0"
        );
      }
    }

    window.addEventListener("scroll", toggleBackToTopButton);
    toggleBackToTopButton();

    // เมื่อคลิกปุ่ม
    backToTopBtn.addEventListener("click", function () {
      // 1. สั่งให้เลื่อนขึ้น (เหมือนเดิม)
      window.scrollTo({
        top: 0,
        behavior: "smooth",
      });

      // 2. [ใหม่] สั่งให้ไอคอนหมุน!
      bttIcon.classList.add("is-spinning");

      // 3. [ใหม่] ลบคลาสหมุนออกหลังจาก 1 วินาที (เพื่อให้กดหมุนซ้ำได้)
      setTimeout(() => {
        bttIcon.classList.remove("is-spinning");
      }, 1000); // 1000ms = 1 วินาที
    });
  }
}

// -------------------------------------------------------------------
// 3. ควบคุม Carousel โลโก้ลูกค้า (2 แถว)
// (นี่คือโค้ดสำหรับ 2 แถวที่คุณต้องการครับ)
// -------------------------------------------------------------------
function initClientCarousel() {
  const clientsTitle = document.getElementById("clients-title");
  const logoTracks = document.querySelectorAll(".logo-track");

  // 3.1 อนิเมชั่นสำหรับ "หัวข้อ"
  if (clientsTitle) {
    const clientsTitleObserver = new IntersectionObserver(
      (entries) => {
        if (entries[0].isIntersecting) {
          entries[0].target.classList.remove("opacity-0", "translate-y-5");
          clientsTitleObserver.unobserve(entries[0].target);
        }
      },
      { threshold: 0.1 }
    );

    clientsTitleObserver.observe(clientsTitle);
  }

  // 3.2 [ลูกเล่น] หยุดเมื่อชี้ (Pause on Hover)
  if (logoTracks.length > 0) {
    logoTracks.forEach((track) => {
      track.addEventListener("mouseenter", () => {
        track.classList.add("paused");
      });
      track.addEventListener("mouseleave", () => {
        track.classList.remove("paused");
      });
    });
  }
}

// -------------------------------------------------------------------
// 4. ควบคุม Modal ฟอร์มติดต่อด่วน (SweetAlert2) - [เวอร์ชันอัปเดต reCAPTCHA]
// -------------------------------------------------------------------
function initContactModal() {
  const openModalBtn = document.getElementById("open-contact-modal-btn");
  const siteKey = "<?php echo $_ENV['RECAPTCHA_SITE_KEY']; ?>"; // (ดึง Site Key จาก PHP)

  if (openModalBtn && typeof grecaptcha !== "undefined" && siteKey) {
    // (ส่วน HTML Form เหมือนเดิม)
    const contactFormHtml = `
            <form id="modal-contact-form" class="text-left p-4">
                <input type="text" name="honeypot" style="display:none;">
                
                <input type="hidden" id="recaptcha-token" name="recaptcha-token">

                <div class="mb-4">
                    <label for="modal-name" class="block text-sm font-medium text-gray-700 mb-1">ชื่อ-นามสกุล</label>
                    <input type="text" id="modal-name" name="name" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary" 
                           required>
                </div>
                
                <div class="mb-4">
                    <label for="modal-phone" class="block text-sm font-medium text-gray-700 mb-1">เบอร์โทรศัพท์</label>
                    <input type="tel" id="modal-phone" name="phone" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary" 
                           required>
                </div>
                
                <div class="mb-4">
                    <label for="modal-email" class="block text-sm font-medium text-gray-700 mb-1">อีเมล</label>
                    <input type="email" id="modal-email" name="email" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary">
                </div>
                
                <div class="mb-4">
                    <label for="modal-message" class="block text-sm font-medium text-gray-700 mb-1">ข้อความ</label>
                    <textarea id="modal-message" name="message" rows="4" 
                              class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary" 
                              required></textarea>
                </div>
                
                <div class="mt-6">
                    <button type="submit" id="modal-submit-btn" 
                            class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-lg font-medium text-white bg-primary hover:bg-primary-dark 
                                   focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                        <i class="fas fa-paper-plane mr-2 mt-1"></i> ส่งข้อความ
                    </button>
                </div>
                <p class="text-xs text-gray-500 text-center mt-4">
                    This site is protected by reCAPTCHA and the Google
                    <a href="https://policies.google.com/privacy" class="hover:underline">Privacy Policy</a> and
                    <a href="https://policies.google.com/terms" class="hover:underline">Terms of Service</a> apply.
                </p>
            </form>
        `;

    // 2. เมื่อคลิกปุ่ม "ส่งข้อความด่วน"
    openModalBtn.addEventListener("click", function () {
      Swal.fire({
        title: "ติดต่อเรา (แบบฟอร์มด่วน)",
        html: contactFormHtml,
        showCloseButton: true,
        showConfirmButton: false,
        width: "550px",

        // 3. เมื่อ Modal เปิด
        didOpen: () => {
          const form = document.getElementById("modal-contact-form");
          const submitBtn = document.getElementById("modal-submit-btn");
          const tokenInput = document.getElementById("recaptcha-token");

          // 4. เมื่อฟอร์มถูก Submit
          form.addEventListener("submit", function (event) {
            event.preventDefault();

            // แสดงสถานะ Loading
            submitBtn.innerHTML =
              '<i class="fas fa-spinner fa-spin mr-2"></i> กำลังตรวจสอบ...';
            submitBtn.disabled = true;

            // 5. [ใหม่] เรียก reCAPTCHA เพื่อเอา "Token"
            grecaptcha.ready(function () {
              grecaptcha
                .execute(siteKey, { action: "submit" })
                .then(function (token) {
                  // 6. [ใหม่] เอา Token ใส่ในฟอร์ม
                  tokenInput.value = token;
                  submitBtn.innerHTML =
                    '<i class="fas fa-spinner fa-spin mr-2"></i> กำลังส่ง...';

                  // 7. ส่งข้อมูล (พร้อม Token) ไปยัง Backend
                  const formData = new FormData(form);

                  fetch("api/contact-handler.php", {
                    method: "POST",
                    body: formData,
                  })
                    .then((response) => response.json())
                    .then((data) => {
                      if (data.success) {
                        Swal.fire({
                          icon: "success",
                          title: "ส่งข้อความสำเร็จ!",
                          text: "เราได้รับข้อความของคุณแล้ว จะติดต่อกลับโดยเร็วที่สุดครับ",
                        });
                      } else {
                        // (เช่น reCAPTCHA ล้มเหลว หรือกรอกไม่ครบ)
                        throw new Error(
                          data.message || "เกิดข้อผิดพลาดบางอย่าง"
                        );
                      }
                    })
                    .catch((error) => {
                      Swal.fire({
                        icon: "error",
                        title: "เกิดข้อผิดพลาด!",
                        text: error.message || "ไม่สามารถส่งข้อความได้ในขณะนี้",
                      });
                      submitBtn.innerHTML =
                        '<i class="fas fa-paper-plane mr-2 mt-1"></i> ส่งข้อความ';
                      submitBtn.disabled = false;
                    });
                });
            });
          });
        },
      });
    });
  }
}

// -------------------------------------------------------------------
// 5. ควบคุมอนิเมชั่น Fade-in ทั้งหมด (Intersection Observer)
// (ผมรวม Observer ทั้งหมดของคุณมาไว้ในฟังก์ชันนี้ครับ)
// -------------------------------------------------------------------
function initPageAnimations() {
  // --- 5.1 Hero Section ---
  const heroSection = document.getElementById("hero-section");
  if (heroSection) {
    const heroObserver = new IntersectionObserver(
      (entries) => {
        if (entries[0].isIntersecting) {
          document
            .getElementById("hero-title")
            ?.classList.remove("opacity-0", "translate-y-5");
          document
            .getElementById("hero-subtitle")
            ?.classList.remove("opacity-0", "translate-y-5");
          document
            .getElementById("hero-cta")
            ?.classList.remove("opacity-0", "translate-y-5");
          heroObserver.unobserve(heroSection);
        }
      },
      { threshold: 0.1 }
    );
    heroObserver.observe(heroSection);
  }

  // --- 5.2 Showcase Section ---
  const showcaseSection = document.getElementById("showcase-section");
  if (showcaseSection) {
    const showcaseObserver = new IntersectionObserver(
      (entries) => {
        if (entries[0].isIntersecting) {
          document
            .getElementById("showcase-image-wrapper")
            ?.classList.remove("opacity-0", "translate-y-5");
          document
            .getElementById("showcase-content")
            ?.classList.remove("opacity-0", "translate-y-5");
          showcaseObserver.unobserve(showcaseSection);
        }
      },
      { threshold: 0.1 }
    );
    showcaseObserver.observe(showcaseSection);
  }

  // --- 5.3 Services Section (Staggered) ---
  const serviceTitle = document.getElementById("service-title");
  const serviceCards = document.querySelectorAll(".service-card");

  if (serviceTitle) {
    const serviceTitleObserver = new IntersectionObserver(
      (entries) => {
        if (entries[0].isIntersecting) {
          entries[0].target.classList.remove("opacity-0", "translate-y-5");
          serviceTitleObserver.unobserve(entries[0].target);
        }
      },
      { threshold: 0.1 }
    );
    serviceTitleObserver.observe(serviceTitle);
  }

  if (serviceCards.length > 0) {
    const serviceCardObserver = new IntersectionObserver(
      (entries, observer) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.remove("opacity-0", "translate-y-5");
            observer.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.1 }
    );

    serviceCards.forEach((card, index) => {
      card.style.transitionDelay = `${index * 100}ms`; // หน่วงเวลา
      serviceCardObserver.observe(card);
    });
  }

  // --- 5.4 Why Us Section (Staggered) ---
  const whyUsTitle = document.getElementById("why-us-title");
  const whyUsCards = document.querySelectorAll(".why-us-card");

  if (whyUsTitle) {
    const whyUsTitleObserver = new IntersectionObserver(
      (entries) => {
        if (entries[0].isIntersecting) {
          entries[0].target.classList.remove("opacity-0", "translate-y-5");
          whyUsTitleObserver.unobserve(entries[0].target);
        }
      },
      { threshold: 0.1 }
    );
    whyUsTitleObserver.observe(whyUsTitle);
  }

  if (whyUsCards.length > 0) {
    const whyUsCardObserver = new IntersectionObserver(
      (entries, observer) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.remove("opacity-0", "translate-y-5");
            observer.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.1 }
    );

    whyUsCards.forEach((card, index) => {
      card.style.transitionDelay = `${index * 150}ms`; // หน่วงเวลา
      whyUsCardObserver.observe(card);
    });
  }

  // --- 5.5 Final CTA Section ---
  const finalCtaContent = document.getElementById("final-cta-content");
  if (finalCtaContent) {
    const finalCtaObserver = new IntersectionObserver(
      (entries) => {
        if (entries[0].isIntersecting) {
          entries[0].target.classList.remove("opacity-0", "translate-y-5");
          finalCtaObserver.unobserve(entries[0].target);
        }
      },
      { threshold: 0.1 }
    );
    finalCtaObserver.observe(finalCtaContent);
  }
}

// --- 6 [เพิ่มส่วนนี้เข้าไป] About Us Page ---
  // (เลือกทุกชิ้นส่วนในหน้า about-us ที่เราต้องการ animate)
  const aboutSections = document.querySelectorAll(
    "#about-hero-content, #about-intro, #about-mission, #about-offices, #about-slogan"
  );

  if (aboutSections.length > 0) {
    const aboutObserver = new IntersectionObserver(
      (entries, observer) => {
        entries.forEach((entry, index) => {
          if (entry.isIntersecting) {
            // หน่วงเวลาเล็กน้อยสำหรับแต่ละชิ้นส่วน
            entry.target.style.transitionDelay = `${index * 100}ms`; 
            entry.target.classList.remove("opacity-0", "translate-y-5");
            observer.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.1 }
    );

    aboutSections.forEach((section) => {
      aboutObserver.observe(section);
    });
  }
// --- จบไฟล์ main.js ---