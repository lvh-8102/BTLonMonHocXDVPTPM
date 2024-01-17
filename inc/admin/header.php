<?php
    $redirect = '../';
    include($redirect."database/db.php");
	include($redirect."function/function.php");
    session_start();
    if(!isset($_SESSION['ten-dang-nhap']))
        header("Location: " . $redirect . "dang-nhap.php");
    if($_SESSION['loai-tai-khoan'] == 'user')
        header("Location: " . $redirect . "index.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="shortcut icon" type="image/png" href="../asset/images/logofita.png" />
    <!-- SLick -->

    <!-- Boostrap -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- Fonawesome -->
    <script src="https://kit.fontawesome.com/9163bded0f.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

    <script src="../js/main.js"></script>
    <script src="../js/admin.js"></script>
</head>
<body>
    <section id="menu-left">
        <nav class="navbar-primary">
            <a href="#" class="btn-expand-collapse"><i class="fa-solid fa-circle-xmark"></i></a>
            <ul class="navbar-primary-menu nav nav-pills">
                <li>
                    <a href="#"><img src="../asset/images/logofita.png" alt=""><span class="nav-label">Fita - Vnua</span></a>
                </li>
                <li class="focused-item">
                    <a href="index.php" data-toggle="tab" class="tab-link"><i class="fa-solid fa-calendar-days"></i><span class="nav-label">Quản lý tài khoản</span></a>
                </li>
                <li>
                    <a href="quan-ly-tin-dang.php" data-toggle="tab" class="tab-link"><i class="fa-solid fa-calendar-day"></i><span class="nav-label">Quản lý bài đăng</span></a>
                </li>
                <li><button onclick="dangXuat('<?php echo $redirect ?>')">Đăng xuất</button></li>
            </ul>
        </nav>
