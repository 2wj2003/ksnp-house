<?php
// public/head.php (เวอร์ชันสมบูรณ์ "Final Version")

// (ตั้งค่า Default เผื่อหน้านั้นๆ ไม่ได้ตั้งค่ามา)
$page_title = $page_title ?? 'MORO Thailand';
$page_description = $page_description ?? 'Moro Thai ผู้เชี่ยวชาญด้านเครื่องจักรอุตสาหกรรมและระบบออโตเมชัน';
$og_url = $og_url ?? 'https://www.morothai.com';
$og_image = $og_image ?? 'https://www.morothai.com/images/moro-thai-share-image.jpg'; 
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($page_title); ?></title>

    <meta name="description" content="<?php echo htmlspecialchars($page_description); ?>">
    
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo htmlspecialchars($og_url); ?>">
    <meta property="og:title" content="<?php echo htmlspecialchars($page_title); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($page_description); ?>">
    <meta property="og:image" content="<?php echo htmlspecialchars($og_image); ?>">
    
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?php echo htmlspecialchars($og_url); ?>">
    <meta property="twitter:title" content="<?php echo htmlspecialchars($page_title); ?>">
    <meta property="twitter:description" content="<?php echo htmlspecialchars($page_description); ?>">
    <meta property="twitter:image" content="<?php echo htmlspecialchars($og_image); ?>">

    <link rel="icon" type="image/png" href="/images/logo.png" sizes="32x32"> <link rel="icon" type="image/png" href="/images/logo.png" sizes="16x16"> <link rel="apple-touch-icon" href="/images/logo.png"> <link rel="icon" type="image/png" href="/images/logo.png" sizes="192x192"> <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;700&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <link rel="stylesheet" href="/css/setting.css"> </head>
<body class="font-sans bg-light"></body>