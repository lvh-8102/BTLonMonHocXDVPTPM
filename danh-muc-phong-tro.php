<?php
    $redirect = '';
	require "inc/head.php";
?>

<link rel="stylesheet" type="text/css" href="css/index.css">

<?php
	require "inc/header.php";

    $danhMuc = null;
    $tuKhoa = null;
    $trangSo = null;
    if(isset($_GET['danh-muc']))
        $danhMuc = $_GET['danh-muc'];
    if(isset($_GET['tu-khoa']))
        $tuKhoa = $_GET['tu-khoa'];
?>

<script type="text/javascript">
    <?php
        if($danhMuc == null || $danhMuc == ''){
    ?>

    window.location = 'index.php';

    <?php
        }
    ?>
</script>

<div class="content padding-1">
	<h3>Phòng trọ khu vực <?php echo $_GET['danh-muc'] ?></h3>
<!-- Danh muc phong tro -->
    <?php
		require "inc/danh-muc.php";
	?>

<!-- Phong tro -->
    <div>
    <!-- Loc tin dang -->
        <div class="right float-right">
            <?php
                require "inc/tin-dang/loc-tin-dang.php";
            ?>
        </div>

    <!-- Tin dang -->
        <div class="width-70 padding-1 back-color-white float-left ds-tin-dang">
        <!-- Sap xep -->
            <div class="flex-between padding-10-0 border-bottom-1 font-size-20">
                <select class="select-loc-sapxep" id="sap-xep" onchange="locTinDang('')">
                    <option value="Mới hơn">Mới hơn</option>
                    <option value="Cũ hơn">Cũ hơn</option>
                    <option value="Giá thấp hơn">Giá thấp hơn</option>
                    <option value="Giá cao hơn">Giá cao hơn</option>
                </select>
            </div>

        <!-- DS tin dang -->
            <div class="margin-1" id="ds-tin-dang">
                <?php
                    $sqlTinDang = "Select * From tindang inner join khuvucquan on tindang.MaQuan=khuvucquan.MaQuan inner join taikhoan on tindang.TenTaiKhoan=taikhoan.TenTaiKhoan Where khuvucquan.TenQuan='".$_GET['danh-muc']."'";
                    if(isset($_GET['tu-khoa'])){
                ?>

                <div class="flex">
                    <h4 class="padding-0-10">Kết quả tìm kiếm cho '<?php echo $_GET['tu-khoa'] ?>'</h4>
                    <a class="a" href="danh-muc-phong-tro.php?danh-muc=<?php echo $_GET['danh-muc'] ?>"><h4>Quay lại</h4></a>
                </div>

                <?php
                        $sqlTinDang .= " and TieuDeTinDang Like '%".$_GET['tu-khoa']."%'";
                    }

                    $demTinDang = mysqli_query($conn, $sqlTinDang);
                    $soTinDang = mysqli_num_rows($demTinDang);
                    $soTrang = ceil($soTinDang / 2);

                    $sqlTinDang .= " Order By ThoiGianDang DESC Limit 0,2";
                    getData($conn, $sqlTinDang, "inc/tin-dang/ds-tin-dang.php");
                ?>

            <!-- Phan trang -->
                <div class="phan-trang flex">
                    <button class="back-color-white border">
                        <span class="material-symbols-outlined">chevron_left</span>
                    </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <?php
                            for ($i=1; $i <= $soTrang; $i++) { 
                        ?>
                    <button class="font-size-20 back-color-white border" onclick="locTinDang('<?php echo $danhMuc ?>', '<?php echo $tuKhoa ?>', '<?php echo $i ?>')"><?php echo $i ?>
                    </button>

                        <?php
                            }
                        ?>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <button class="back-color-white border">
                        <span class="material-symbols-outlined">chevron_right</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
	require "inc/footer.php";
?>