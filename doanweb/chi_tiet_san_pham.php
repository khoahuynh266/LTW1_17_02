<?php 
	require_once 'init.php';
	if (!empty($_GET['id']) && !empty($_GET['loai']) && !empty($_GET['nsx'])) {
		$id=$_GET['id'];
		$loai=$_GET['loai'];
		$nsx=$_GET['nsx'];
		$resultSet = ChiTietSanPham($id);
		$resultSet3 = selectLoaiSanPham();
		$resultSet4 = selectNhaSanXuat();
		$resultSet5 = select5SanPhamCungLoai($loai);
		$resultSet6 = select5SanPhamCungNSX($nsx);
	}
	else{
		header('Location: index.php');
	}


	
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
								<a>Loai sản phẩm: <?php echo  ($row['ten_loai']).'<br>' ?></a>
								<a>Nhà sản xuất: <?php echo  ($row['ten_nsx']).'<br>' ?></a>
						</ul>
					<ul>
						<?php if (!$currentUser) : ?>
								<a href="login.php"><button>Đăng nhập</button></a>
						<?php else: ?>
								<a href="add.php?id_nguoidung=<?php echo $currentUser["id"]?>&id_sanpham=<?php echo $row['id']?>&sl_sanpham=1"><button>Mua hàng</button></a>
					<?php endif ?>
					</ul>
				</div>
			</div>
			<div class="block">
				<?php foreach($resultSet5 as $row): ?>
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
				<?php foreach($resultSet6 as $row): ?>
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
							<h5><a href="danh_sach_theo_loai.php?id=<?php echo $row['id'] ?>"><?php echo $row['ten_loai'] ?></a></h5>
						</li>
					</ul>
				<?php endforeach; ?>

				<div class="block_sidebar">
					<h6 href="">Nhà sản xuất</h6>
				</div>
				<?php foreach($resultSet4 as $row): ?>
					<ul>
						<li>
							<h5><a href="danh_sach_theo_nsx.php?id=<?php echo $row['id'] ?>"><?php echo $row['ten_nsx'] ?></a></h5>
						</li>
					</ul>
				<?php endforeach; ?>
			</div>
		</div>
</div>




