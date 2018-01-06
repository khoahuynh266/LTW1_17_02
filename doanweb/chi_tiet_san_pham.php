<?php 
	require_once 'init.php';
	$id=$_GET['id'];
	$resultSet = ChiTietSanPham($id);
	$resultSet3 = selectLoaiSanPham();
	$resultSet4 = selectNhaSanXuat();
?>
<?php include 'header.php' ?>

<div id="main">
		<div id="left">
			<div class="block">
				<div class="block_sidebar">
					<h6 href="">Thông tin sản phẩm</h6>
				</div>
				<div>
					<ul id="left_info">
						<?php foreach($resultSet as $row): ?>
							<a><img src="<?php echo $row['image'] ?>" alt="TenSanPham" /></a>
						<?php endforeach; ?>
					</ul>
					<ul id="right_info">
							<h5><?php echo $row['tensp'] ?></h5>
							<p><?php echo  number_format($row['gia']).' VNĐ<br>' ?></p>
							<a>Số lượt xem: <?php echo  number_format($row['luotxem']).' lượt xem<br>' ?></a>
							<a>Số lượng bán: <?php echo  number_format($row['DaBan']).' lượt mua<br>' ?></a>
							<a>Mô tả: <?php echo  ($row['mota']).'<br>' ?></a>
							<a>Xuất xứ: <?php echo  ($row['xuatsu']).'<br>' ?></a>
					</ul>
					<ul>
							<?php if (!$currentUser) : ?>
									<form method="POST">
										<button type="submit">THÊM VÀO GIỎ HÀNG</button>
									</form>
								<?php else: ?>
										<a href="add.php?id=<?php echo $row['id']?>">Mua
							<?php endif ?>
					</ul>
				</div>
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
</div>




