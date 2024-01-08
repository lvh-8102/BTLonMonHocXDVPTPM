<?php
    $redirect = "../";
	require "../inc/head.php";
?>

<link rel="stylesheet" type="text/css" href="../css/quan-ly-tai-khoan.css">
<script src="../js/quan-ly-tai-khoan.js"></script>

<?php
	require "../inc/header.php";
	require "../inc/quan-ly-tai-khoan/header.php";
?>
		
		<div class="padding-10-2 back-color-white quan-ly-tai-khoan-right float-left">
			<div>
				<div class="flex-between border-bottom-1">
					<h3>Tin đăng</h3>
					<a href="dang-tin.php"><button class="button back-color-main-2 color-white"><span class="material-symbols-outlined">add</span></button></a>
				</div>
				<table class="table" style="overflow: auto;">
					<tr>
						<th>
							Tiêu đề
						</th>
						<th>
							Thời gian đăng
						</th>
						<th>
							Kiểm duyệt
						</th>
						<th></th>
						<th></th>
						<th></th>
					</tr>

					<?php
						$tinDangQuery = mysqli_query($conn, "Select * From tindang Where TenTaiKhoan='".$_SESSION['ten-dang-nhap']."'");
						if($tinDangQuery->num_rows>0){
							while($dsTinDang = $tinDangQuery->fetch_assoc()){
					?>

					<tr>
						<td class="cursor"><?php echo $dsTinDang['TieuDeTinDang'] ?></td>
						<td class="cursor"><?php echo $dsTinDang['ThoiGianDang'] ?></td>
						<td class="cursor"><?php echo $dsTinDang['KiemDuyet'] ?></td>
						<td>
							<button class="button back-color-main-2 color-white"><span class="material-symbols-outlined">visibility</span></button>
						</td>
						<td>
							<button class="button back-color-main-1 color-white"><span class="material-symbols-outlined" onclick="dieuHuong('sua-tin.php?id=<?php echo $dsTinDang['MaTinDang'] ?>')">edit_square</span></button>
						</td>
						<td>
							<button class="button back-color-delete color-white"><span class="material-symbols-outlined" onclick="xoaTinDang('<?php echo $dsTinDang['MaTinDang'] ?>')">backspace</span></button>
						</td>
					</tr>

					<?php
							}
						}
					?>
				</table>
			</div>
		</div>
		
	</div>
</div>
<?php
	require "../inc/footer.php";
?>