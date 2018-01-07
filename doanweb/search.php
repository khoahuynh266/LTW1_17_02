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
							<a href="chi_tiet_san_pham.php?id=<?php echo $row['id'] ?>" target="_blank"><img src="<?php echo $row['image'] ?>" alt="TenSanPham" /></a>
							<h5><?php echo $row['tensp'] ?></h5>
							<p><?php echo  number_format($row['gia']).' VNĐ<br>' ?></p>
								<?php if (!$currentUser) : ?>
										<button href="login.php">THÊM VÀO GIỎ HÀNG</button>
								<?php else: ?>
										<a href="add.php?id=<?php echo $row['id']?>">Mua
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
							<h5><a href="danh_sach_theo_loai.php?id=<?php echo $row['id'] ?>"><?php echo $row['ten'] ?></a></h5>
						</li>
					</ul>
				<?php endforeach; ?>
			</div>
		</div>
<?php include 'footer.php' ?>