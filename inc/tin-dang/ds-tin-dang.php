<div class="tin-dang margin flex-between hover-box-shadow padding-10-2 cursor">
	<div class="flex" onclick="dieuHuong('chi-tiet-tin-dang.php?id=<?php echo $row['MaTinDang'] ?>')">
	<!-- Thumbnail -->
		<div class="">
			<img src="img/tin-dang/<?php if($row['Img1'] != '') echo $row['Img1']; else echo 'thumbnail-icon.png'; ?>" width="200px" height="200px">
		</div>

	<!-- Noi dung -->
		<div class="padding-10-2">
			<h5><b><?php echo $row['TieuDeTinDang'] ?></b></h5>
			<div class="flex">
				<h6><?php echo $row['DienTich'] ?> m2</h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<h6><?php echo $row['TenQuan'] ?></h6>
			</div>

			<div class="flex">
				<span class="material-symbols-outlined">apartment</span>&nbsp;
				<?php
					$dsKhuVucTinDangQuery = mysqli_query($conn, "Select TenKhuVuc From khuvuctindang inner join khuvuc on khuvuctindang.MaKhuVuc=khuvuc.MaKhuVuc Where MaTinDang='".$row['MaTinDang']."'");
					if($dsKhuVucTinDangQuery->num_rows>0){
						while($dsKhuVucTinDang = $dsKhuVucTinDangQuery->fetch_assoc()){
							echo '
					<h6>Gần '.$dsKhuVucTinDang['TenKhuVuc'].'</h6>
							';
						}
					}
				?>
			</div>

			<h5 class="color-main-1"><b><?php echo $row['GiaThue'] ?> triệu/tháng</b></h5>

			<div class="flex">
				<div class="flex">
					<span class="material-symbols-outlined">schedule</span>&nbsp;
					<h6><?php echo $row['ThoiGianDang'] ?></h6>
				</div>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<div class="flex">
					<span class="material-symbols-outlined">account_circle</span>
					&nbsp;
					<h6><?php echo $row['TenTaiKhoan'] ?></h6>
				</div>
			</div>
		</div>
	</div>

	<?php
		if(!isset($_SESSION['ten-dang-nhap'])){
	?>
	<a href="dang-nhap.php" class="color-delete" title="Lưu lại" style="font-size: 20px;"><i class="far fa-heart"></i></a>
	<?php
		}else{
			$daLuu = mysqli_query($conn, "Select * From tindangdaluu Where MaTinDang = '".$row['MaTinDang']."' and TenTaiKhoan='".$_SESSION['ten-dang-nhap']."'");
			if($daLuu->num_rows>0){
	?>
	<span class="color-delete" id="<?php echo $row['MaTinDang'] ?>" title="Bỏ lưu" onclick="luuTinDang('<?php echo $row['MaTinDang'] ?>','Bỏ lưu', '')" style="font-size: 20px;"><i class="fas fa-heart"></i></span>
	<?php
			}else{
	?>
	<span class="color-delete" id="<?php echo $row['MaTinDang'] ?>" title="Lưu lại" onclick="luuTinDang('<?php echo $row['MaTinDang'] ?>','Lưu', '')" style="font-size: 20px;"><i class="far fa-heart"></i></span>
	<?php
			}
		}
	?>
</div>
<hr>