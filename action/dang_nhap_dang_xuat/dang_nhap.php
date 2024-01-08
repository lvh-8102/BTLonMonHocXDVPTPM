<?php
    include("../../database/db.php");
    include("../../function/function.php");
    session_start();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $tenTaiKhoan = $_POST['tenDangNhap'];
        $taiKhoan = mysqli_query($conn, "Select * From taikhoan Where TenTaiKhoan='$tenTaiKhoan'");
        if($taiKhoan->num_rows<1){
            echo 'Tài khoản không tồn tại, vui lòng kiểm tra lại!';
        }else{
            while($row = $taiKhoan->fetch_assoc())
                $matKhau = $row['MatKhau'];
            if($matKhau != $_POST['matKhau'])
                echo 'Sai mật khẩu, vui lòng kiểm tra lại!';
            else{
                echo('Đăng nhập thành công!');
                $_SESSION['ten-dang-nhap'] = $_POST['tenDangNhap'];
            }

        }
    }
?>