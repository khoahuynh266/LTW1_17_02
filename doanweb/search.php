<?php 
	require_once 'init.php';
	$id=$_GET['text_search'];
	$resultSet = Search($id);
	$resultSet3 = selectLoaiSanPham();
	$resultSet4 = selectNhaSanXuat();
?>
<?php include 'header.php' ?> <br>

<div id="main">
		<div id="left">
			<div class="block">
				<div class="block_sidebar">
					<h6 href="">Danh sách sản phẩm</h6>
				</div>
				<?php foreach($resultSet as $row): ?>
					<ul>
						<li>
						<a href="chi_tiet_san_pham.php?id=<?php echo $row['id'] ?>&loai=<?php echo $row['loai']?>&nsx=<?php echo $row['id_nsx']?>" target="_blank"><img src="<?php echo $row['image'] ?>" alt="TenSanPham" /></a>
							<h5><?php echo $row['tensp'] ?></h5>
							<p><?php echo  number_format($row['gia']).' VNĐ<br>' ?></p>
								<?php if (!$currentUser) : ?>
									<a href="login.php"><button>Đăng nhập</button></a>
								<?php else: ?>
										<a href="add.php?id_nguoidung=<?php echo $currentUser["id"]?>&id_sanpham=<?php echo $row['id']?>&sl_sanpham=1"><button>Mua hàng</button></a>
							<?php endif ?>
						</li>
					</ul>
				<?php endforeach; ?>
			</div>
		</div>
		<div id="right">
			<div class="block">
				<div class="block_sidebar">
					<h6 href="">Loại sản phẩm</h6>
				</div>
				<?php foreach($resultSet3 as $row): ?>
					<ul>
						<li>
							<h5><a href="danh_sach_theo_loai.php?id=<?php echo $row['id'] ?>"><?php echo $row['ten'] ?></a></h5>
						</li>
					</ul>
				<?php endforeach; ?>

				<div class="block_sidebar">
					<h6 href="">Nhà sản xuất</h6>
				</div>
				<?php foreach($resultSet4 as $row): ?>
					<ul>
						<li>
						 		<h5><a href="danh_sach_theo_nsx.php?id=<?php echo $row['id'] ?>"><?php echo $row['ten'] ?></a></h5>
						</li>
					</ul>
				<?php endforeach; ?>
			</div>
		</div>
<?php include 'footer.php' ?>