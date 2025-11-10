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
// -------------------------------------------------------------------
document.addEventListener("DOMContentLoaded", function () {
  initMobileMenu();
  initBackToTop();
  initClientCarousel();
  initContactModal();
  initPageAnimations(); // (ฟังก์ชันนี้จะจัดการทุกหน้า)
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
// 2. ควบคุมปุ่มกลับขึ้นบน (Back to Top)
// -------------------------------------------------------------------
function initBackToTop() {
  const backToTopBtn = document.getElementById("back-to-top-btn");
  const bttIcon = document.getElementById("btt-icon");

  if (backToTopBtn && bttIcon) {
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

    backToTopBtn.addEventListener("click", function () {
      window.scrollTo({
        top: 0,
        behavior: "smooth",
      });
      bttIcon.classList.add("is-spinning");
      setTimeout(() => {
        bttIcon.classList.remove("is-spinning");
      }, 1000);
    });
  }
}

// -------------------------------------------------------------------
// 3. ควบคุม Carousel โลโก้ลูกค้า (2 แถว)
// -------------------------------------------------------------------
function initClientCarousel() {
  const clientsTitle = document.getElementById("clients-title");
  const logoTracks = document.querySelectorAll(".logo-track");

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
// 4. ควบคุม Modal ฟอร์มติดต่อด่วน (SweetAlert2)
// -------------------------------------------------------------------
function initContactModal() {
  const openModalBtn = document.getElementById("open-contact-modal-btn");

  // เช็กตัวแปร global ที่ส่งมาจาก footer.php
  if (
    openModalBtn &&
    typeof grecaptcha !== "undefined" &&
    typeof recaptchaSiteKey !== "undefined"
  ) {
    const siteKey = recaptchaSiteKey;

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

    openModalBtn.addEventListener("click", function () {
      Swal.fire({
        title: "ติดต่อเรา (แบบฟอร์มด่วน)",
        html: contactFormHtml,
        showCloseButton: true,
        showConfirmButton: false,
        width: "550px",
        didOpen: () => {
          const form = document.getElementById("modal-contact-form");
          const submitBtn = document.getElementById("modal-submit-btn");
          const tokenInput = document.getElementById("recaptcha-token");

          form.addEventListener("submit", function (event) {
            event.preventDefault();
            submitBtn.innerHTML =
              '<i class="fas fa-spinner fa-spin mr-2"></i> กำลังตรวจสอบ...';
            submitBtn.disabled = true;

            grecaptcha.ready(function () {
              grecaptcha
                .execute(siteKey, { action: "submit" })
                .then(function (token) {
                  tokenInput.value = token;
                  submitBtn.innerHTML =
                    '<i class="fas fa-spinner fa-spin mr-2"></i> กำลังส่ง...';

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
  } else {
    console.warn(
      "reCAPTCHA Site Key or Modal Button not found. Contact Modal is disabled."
    );
  }
}

// -------------------------------------------------------------------
// 5. ควบคุมอนิเมชั่น Fade-in ทั้งหมด (Intersection Observer)
// [TECH CONSULTANT NOTE: ผมได้รวมโค้ดที่กระจัดกระจายมารวมไว้ในฟังก์ชันนี้ที่เดียว]
// -------------------------------------------------------------------
function initPageAnimations() {
  // 5.1 Observer แบบ "Fade-in ครั้งเดียว" (สำหรับหัวข้อ)
  const singleFadeInObserver = new IntersectionObserver(
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

  // 5.2 Observer แบบ "Fade-in หลายชิ้น" (Staggered)
  const staggeredObserver = new IntersectionObserver(
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

  // --- (หน้า Home) ---
  const homeElements = [
    "#hero-title",
    "#hero-subtitle",
    "#hero-cta",
    "#showcase-image-wrapper",
    "#showcase-content",
    "#service-title",
    "#why-us-title",
    "#final-cta-content",
  ];
  document.querySelectorAll(homeElements.join(", ")).forEach((el) => {
    if (el) singleFadeInObserver.observe(el);
  });

  document.querySelectorAll(".service-card").forEach((card, index) => {
    if (card) {
      card.style.transitionDelay = `${index * 100}ms`;
      staggeredObserver.observe(card);
    }
  });

  document.querySelectorAll(".why-us-card").forEach((card, index) => {
    if (card) {
      card.style.transitionDelay = `${index * 150}ms`;
      staggeredObserver.observe(card);
    }
  });

  // --- (หน้า About Us) ---
  const aboutSections = document.querySelectorAll(
    "#about-hero-content, #about-intro, #about-mission, #about-offices, #about-slogan"
  );
  if (aboutSections.length > 0) {
    aboutSections.forEach((section, index) => {
      // หน่วงเวลาเล็กน้อยสำหรับแต่ละชิ้นส่วน
      section.style.transitionDelay = `${index * 100}ms`;
      staggeredObserver.observe(section);
    });
  }

  // --- (หน้า Product) ---
  // (เลือก Hero content ของหน้า Product - สังเกตว่า ID นี้ใช้ซ้ำกับหน้า About Us)
  const productPageHero = document.querySelector("#page-hero-content");
  if (productPageHero) {
    singleFadeInObserver.observe(productPageHero);
  }

  // (เลือกหัวข้อ Grid สินค้า)
  const productGridTitle = document.querySelector("#product-grid-title");
  if (productGridTitle) {
    singleFadeInObserver.observe(productGridTitle);
  }

  // (เลือกการ์ดสินค้าทุกใบ)
  document.querySelectorAll(".product-card").forEach((card, index) => {
    if (card) {
      // หน่วงเวลาทีละ 100ms แต่เริ่มนับใหม่ทุก 4 ชิ้น (เพื่อให้แถวเดียวกันขึ้นพร้อมกัน)
      card.style.transitionDelay = `${(index % 4) * 100}ms`;
      staggeredObserver.observe(card);
    }
  });
}
// --- จบไฟล์ main.js ---
