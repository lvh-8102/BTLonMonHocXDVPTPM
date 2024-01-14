<!DOCTYPE html>
<?php
	$redirect = '../';
	require "../inc/head.php";
    if(!isset($_SESSION['ten-dang-nhap']))
        header("Location: " . $redirect . "dang-nhap.php");
?>
</head>
<body>
    <button onclick="dangXuat('<?php echo $redirect ?>')">Đăng xuất</button>
</body>
</html>