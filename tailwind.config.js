module.exports = {
    content: [
      // (สำคัญ) บอก Tailwind ให้สแกนไฟล์ทั้งหมดใน public/
      "./public/**/*.{php,html,js}" 
    ],
    theme: {
      extend: {
        /* 1. ส่วน Font ที่เราทำไว้ */
        fontFamily: {
          'sans': ['Roboto', 'Kanit', 'sans-serif'],
          'kanit': ['Kanit', 'sans-serif'],
          'roboto': ['Roboto', 'sans-serif']
        },
  
        /* 2. บอกให้ Tailwind รู้จักสีของเรา */
        // ...
        colors: {
          'primary': '#0D47A1', // <-- ใส่ค่าสีจริง (เช่น สีน้ำเงินเข้ม)
          'primary-dark': '#002171', // <-- ใส่ค่าสีจริง
          'primary-light': '#5472d3', // <-- ใส่ค่าสีจริง
          
          'text-main': '#333333', // <-- ใส่ค่าสีจริง
          'text-secondary': '#555555', // <-- ใส่ค่าสีจริง
          
          'bg-light': '#F4F6F8', // <-- ใส่ค่าสีจริง
  
          'success': '#28a745', // <-- ใส่ค่าสีจริง (เช่น สีเขียว)
          'warning': '#ffc107'  // <-- ใส่ค่าสีจริง (เช่น สีเหลือง)
        }
// ...
      },
    },
    plugins: [],
  }