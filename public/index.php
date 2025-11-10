<?php
// public/index.php

// 1. [สำคัญ] เรียกใช้ DB และ .env ก่อนทำอะไรทั้งหมด
// (ถ้าบรรทัดนี้พัง Error 500 จะเกิดจากตรงนี้)
require_once __DIR__ . '/../config/db_connect.php';

// 2. (สำคัญ) ตั้งค่าตัวแปรสำหรับหน้านี้
$page_title = "หน้าแรก - MORO Thailand";
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php include './head.php'; ?> 
    
    <title><?php echo $page_title; ?></title>
</head>
<body class="font-sans bg-light"> <?php include 'nav.php'; ?>
    
    <main>
        <?php include 'hero-section.php' ?>
        <?php include 'showcase.php' ?>
        <?php include 'services-highlight.php'; ?>
        <?php include 'why-us-summary.php'; ?>
        <?php include 'clients-carousel.php'; ?>
        <?php include 'final-cta-banner.php'; ?>
    </main>

    <?php 
        include 'footer.php'; 
    ?>
</body>
</html>