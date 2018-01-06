<?php 
	require_once 'init.php';
	$resultSet = ChiTietSanPham();
?>
<?php include 'header.php' ?> <br>

<h3 class="title">Đơn Hàng</h3>
    <ul id="new">
		<li>
			<div class="row">
				<?php foreach($resultSet as $row): ?>
				<div class="col-sm-4">
					<div class="products"  align='center'>					
						<div class="thumbnail">
							<a href="chitiet.php?id=<?php echo $row['id']?>"><img src="<?php echo $row['image'] ?>" alt="TenSanPham"></a><br>
							<br>
						</div>
						<div class="btn-group-vertical">
							<button class="button add-cart" type="button">
								<?php if (!$currentUser) : ?>
									<li class="nav-item <?php echo ($page == 'login') ? 'active' : '' ?>">
									<a  href="login.php">Đăng Nhập Để Mua Hàng</a>
									</li>
									<?php else: ?>
									<a href="add.php?id=<?php echo $row['id']?>">Thanh Toán</a>
							</button>
							<?php endif ?>
						</div>
					</div>
				</div>
				<div class="thumbnail"  align='right'>
					<div align = 'left'>
						<div>Tên Sản Phẩm:      <?php echo $row['tensp'] ?></div><br>
						<div>Loại:				<?php echo $row['loai'] ?></div><br>
						<div>Giá:               <?php echo $row['gia'] ?> VND</div><br>
						<div>Mô Tả:             <?php echo $row['mota'] ?></div><br>
						<div>Số Lượng Bán:			<?php echo $row['soluongban'] ?> Sản Phẩm</div><br>
						<div>Xuất Sứ:   		<?php echo $row['xuatsu'] ?></div><br>
						<div>Lượt Xem:   		<?php echo $row['luotxem']?> View</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</li>
	</ul>      

<?php include 'footer.php' ?>