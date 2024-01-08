<?php
	include("../../database/db.php");
	include("../../function/function.php");

	$danhMuc = null;
    $tuKhoa = null;
	$sql = "Select * From tindang inner join khuvucquan on tindang.MaQuan=khuvucquan.MaQuan inner join taikhoan on tindang.TenTaiKhoan=taikhoan.TenTaiKhoan Where MaTinDang Like '%%'";

// Loc
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		if($_POST['locTheoGia'] != "loc-theo-gia-tat-ca"){
			$locTheoGia = getSingleData($conn, "Select CongThucLocTheoGia From loctheogia Where MaLocTheoGia='".$_POST['locTheoGia']."'", "CongThucLocTheoGia");
			$sql .= $locTheoGia;
		}
		if($_POST['locTheoDienTich'] != "loc-theo-dien-tich-tat-ca"){
			$locTheoDienTich = getSingleData($conn, "Select CongThucLocTheoDienTich From loctheodientich Where MaLocTheoDienTich='".$_POST['locTheoDienTich']."'", "CongThucLocTheoDienTich");
			$sql .= $locTheoDienTich;
		}

		if($_POST['danhMuc'] != '')
			$sql .= " and khuvucquan.TenQuan='".$_POST['danhMuc']."'";

		// Tim kiem
		if($_POST['tuKhoa'] != ''){
?>

		<div class="flex">
            <h4 class="padding-0-10">Kết quả tìm kiếm cho '<?php echo $_POST['tuKhoa'] ?>'</h4>
            <a class="a" href="<?php if($_POST['danhMuc'] != '') echo 'danh-muc-phong-tro.php?danh-muc='.$_POST['danhMuc']; else echo 'index.php' ?>"><h4>Quay lại</h4></a>
        </div>

<?php
			$sql .= " and TieuDeTinDang Like '%".$_POST['tuKhoa']."%'";
		}

	// Sap xep
		if($_POST['sapXep'] == "Mới hơn")
			$sql .= " Order By ThoiGianDang DESC";
		else if($_POST['sapXep'] == "Cũ hơn")
			$sql .= " Order By ThoiGianDang ASC";
		else if($_POST['sapXep'] == "Giá thấp hơn")
			$sql .= " Order By GiaThue2 ASC";
		else
			$sql .= " Order By GiaThue2 DESC";

		$demTinDang = mysqli_query($conn, $sql);
	    $soTinDang = mysqli_num_rows($demTinDang);
	    $soTrang = ceil($soTinDang / 2);

	    if($_POST['trangSo'] == '' || $_POST['trangSo'] == 1)
			$sql .= ' Limit 0,2';
		else
			$sql .= ' Limit ' . (($_POST['trangSo']-1)*2) . ',2';

		getData($conn, $sql, "../../inc/tin-dang/ds-tin-dang.php");
	}
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