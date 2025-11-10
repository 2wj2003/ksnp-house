/**
 * js/main.js
 * โค้ด JavaScript หลักสำหรับเว็บไซต์ MORO Thailand
 * สารบัญ:
 * 1. initMobileMenu()      - ควบคุมเมนูมือถือ (Hamburger)
 * 2. initBackToTop()       - ควบคุมปุ่มกลับขึ้นบน
 * 3. initClientCarousel()  - ควบคุม Carousel โลโก้ (Pause on Hover)
 * 4. initContactModal()    - ควบคุม Modal (ปุ่มลอย)
 * 5. initContactPageForm() - ควบคุมฟอร์มเต็ม (หน้า Contact)
 * 6. initPageAnimations()  - ควบคุมอนิเมชั่น Fade-in ทั้งหมด
 */

// -------------------------------------------------------------------
// (จุดเริ่มต้นหลัก)
// -------------------------------------------------------------------
document.addEventListener("DOMContentLoaded", function () {
    initMobileMenu();
    initBackToTop();
    initClientCarousel();
    initContactModal(); // (สำหรับปุ่ม CTA ลอย)
    initContactPageForm(); // (สำหรับหน้า Contact)
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
        window.scrollTo({ top: 0, behavior: "smooth" });
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
  
    if (
      !openModalBtn ||
      typeof grecaptcha === "undefined" ||
      typeof recaptchaSiteKey === "undefined"
    ) {
      if (openModalBtn) {
        // ถ้าปุ่มมี แต่ reCAPTCHA ไม่มี
        console.warn("reCAPTCHA Site Key not found. Contact Modal is disabled.");
      }
      return; // ถ้าไม่มีปุ่ม (เช่นอยู่หน้า Contact) หรือ reCAPTCHA ไม่พร้อม ก็ไม่ต้องทำงาน
    }
  
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
                  This site is protected by reCAPTCHA...
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
                .execute(siteKey, { action: "submit_modal" }) // ใช้นามแฝง 'submit_modal'
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
                        throw new Error(data.message || "เกิดข้อผิดพลาด");
                      }
                    })
                    .catch((error) => {
                      Swal.fire({
                        icon: "error",
                        title: "เกิดข้อผิดพลาด!",
                        text: error.message || "ไม่สามารถส่งข้อความได้",
                      });
                      submitBtn.innerHTML =
                        '<i class="fas fa-paper-plane mr-2 mt-1"></i> ส่งข้อความ';
                      submitBtn.disabled = false;
                    });
                });
            });
          }); // <-- [แก้ไข] ปิด form.addEventListener
        }, // <-- [แก้ไข] ปิด didOpen
      }); // <-- [แก้ไข] ปิด Swal.fire
    }); // <-- [แก้ไข] ปิด openModalBtn.addEventListener
  } // <-- [แก้ไข] ปิดฟังก์ชัน initContactModal()
  
  // -------------------------------------------------------------------
  // 5. ควบคุมฟอร์มเต็ม (หน้า Contact)
  // -------------------------------------------------------------------
  function initContactPageForm() {
    const form = document.getElementById("contact-page-form");
    const submitBtn = document.getElementById("contact-submit-btn");
    const tokenInput = document.getElementById("recaptcha-token");
  
    // (ถ้าไม่เจอ = ไม่ได้อยู่หน้า Contact ก็ไม่ต้องทำงาน)
    if (
      !form ||
      !submitBtn ||
      !tokenInput ||
      typeof grecaptcha === "undefined" ||
      typeof recaptchaSiteKey === "undefined"
    ) {
      if (form) {
        // ถ้าฟอร์มมี แต่ reCAPTCHA ไม่มี
        console.warn("reCAPTCHA Site Key not found. Contact Page Form is disabled.");
      }
      return;
    }
  
    const siteKey = recaptchaSiteKey;
    const originalBtnHtml = submitBtn.innerHTML; // (เก็บ HTML ปุ่มเดิมไว้)
  
    form.addEventListener("submit", function (event) {
      event.preventDefault();
      submitBtn.innerHTML =
        '<i class="fas fa-spinner fa-spin mr-2"></i> กำลังตรวจสอบ...';
      submitBtn.disabled = true;
  
      grecaptcha.ready(function () {
        grecaptcha
          .execute(siteKey, { action: "submit_contact_page" }) // ใช้นามแฝง 'submit_contact_page'
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
                  form.reset(); // (รีเซ็ตฟอร์มเมื่อส่งสำเร็จ)
                } else {
                  throw new Error(data.message || "เกิดข้อผิดพลาด");
                }
              })
              .catch((error) => {
                Swal.fire({
                  icon: "error",
                  title: "เกิดข้อผิดพลาด!",
                  text: error.message || "ไม่สามารถส่งข้อความได้",
                });
              })
              .finally(() => {
                // (คืนค่าปุ่มให้กดได้อีกครั้ง ไม่ว่าจะสำเร็จหรือล้มเหลว)
                submitBtn.innerHTML = originalBtnHtml;
                submitBtn.disabled = false;
              });
          });
      });
    });
  }
  
  // -------------------------------------------------------------------
  // 6. ควบคุมอนิเมชั่น Fade-in ทั้งหมด (Intersection Observer)
  // -------------------------------------------------------------------
  function initPageAnimations() {
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
        section.style.transitionDelay = `${index * 100}ms`;
        staggeredObserver.observe(section);
      });
    }
  
    // --- (หน้า Product) ---
    const productPageHero = document.querySelector("#page-hero-content");
    if (productPageHero && aboutSections.length === 0) {
      singleFadeInObserver.observe(productPageHero);
    }
    const productGridTitle = document.querySelector("#product-grid-title");
    if (productGridTitle) {
      singleFadeInObserver.observe(productGridTitle);
    }
    document.querySelectorAll(".product-card").forEach((card, index) => {
      if (card) {
        card.style.transitionDelay = `${(index % 4) * 100}ms`;
        staggeredObserver.observe(card);
      }
    });
  
    // --- (หน้า Service) ---
    document.querySelectorAll(".service-detail-item").forEach((item, index) => {
      if (item) {
        item.style.transitionDelay = `${index * 150}ms`;
        staggeredObserver.observe(item);
      }
    });
  
    // --- (หน้า Recruit) ---
    const recruitIntro = document.querySelector("#recruit-intro");
    if (recruitIntro) {
      recruitIntro.style.transitionDelay = "100ms";
      staggeredObserver.observe(recruitIntro);
    }
  
    // --- (หน้า Contact) ---
    const contactInfo = document.querySelector("#contact-info");
    if (contactInfo) {
      contactInfo.style.transitionDelay = "100ms";
      staggeredObserver.observe(contactInfo);
    }
    const contactForm = document.querySelector("#contact-form-wrapper");
    if (contactForm) {
      contactForm.style.transitionDelay = "200ms";
      staggeredObserver.observe(contactForm);
    }
  } // --- สิ้นสุดฟังก์ชัน initPageAnimations ---