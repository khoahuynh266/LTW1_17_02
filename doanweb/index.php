<?php 
require_once 'init.php';
  $resultSet = selectSanPhamMoi();
  $resultSetBC = SanPhamBanChay();
  $resultSetXN = SanPhamXemNhieu();
?>
<?php include 'header.php' ?>
<h1>Trang chủ</h1>
<?php if ($currentUser) : ?>
<p>Chào mừng <?php echo $currentUser['fullname'] ?> !</p>
<?php endif ?>
<h3 class="title">Sản Phẩm Mới </h3>
<?php echo "<br>" ?>
    <ul id="new">
		<li>
			<div class="row">
				<?php foreach($resultSet as $row): ?>
				<div class="col-sm-4">
					<blink><FONT color=red  size=5><B><I>Hot</blink></b></i></font>
					<div class="products"  align='center'>					
						<div class="thumbnail">
							<a href="chitiet.php?id=<?php echo $row['id']?>"><img src="<?php echo $row['image'] ?>" alt="TenSanPham"></a>
						</div>						
						<div class="tensanpham"><?php echo $row['tensp'] ?></div>
						<h4 class="gia"><?php echo $row['gia'] ?> VND</h4>
						<div class="btn-group-vertical">
							<button class="button add-cart" type="button">
								<?php if (!$currentUser) : ?>
									<li class="nav-item <?php echo ($page == 'login') ? 'active' : '' ?>">
									<a href="login.php">Đăng Nhập Để Mua Hàng</a>
									</li>
								<?php else: ?>
									<a href="add.php?id=<?php echo $row['id']?>">Mua
							</button>
							<?php endif ?>
							<button class="button detail" type="button">
								<a href="chitiet.php?id=<?php echo $row['id'] ?>">Xem Chi Tiết</a>
							</button> <br><br><br><br>
						</div>						
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</li>
	</ul>
	
	<h3 class="title">Sản Phẩm Bán Chạy Nhất</h3>
	<?php echo "<br>" ?>
    <ul id="new">
		<li>
			<div class="row">
				<?php foreach($resultSetBC as $row): ?>
				<div class="col-sm-4">
					<div class="products"  align='center'>					
						<div class="thumbnail">
							<a href="chitiet.php?id=<?php echo $row['id']?>"><img src="<?php echo $row['image'] ?>" alt="TenSanPham"></a>
						</div>						
						<div class="tensanpham"><?php echo $row['tensp'] ?></div>
						<h4 class="gia"><?php echo $row['gia'] ?> VND</h4>
						<div class="btn-group-vertical">
							<button class="button add-cart" type="button">
								<?php if (!$currentUser) : ?>
									<li class="nav-item <?php echo ($page == 'login') ? 'active' : '' ?>">
									<a href="login.php">Đăng Nhập Để Mua Hàng</a>
									</li>
								<?php else: ?>
									<a href="add.php?id=<?php echo $row['id']?>">Mua
							</button>
							<?php endif ?>
							<button class="button detail" type="button">
								<a href="chitiet.php?id=<?php echo $row['id'] ?>">Xem Chi Tiết</a>
							</button> <br><br><br><br>
						</div>						
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</li>
	</ul>
	
	<h3 class="title">Sản Phẩm Xem Nhiều Nhất</h3>
	<?php echo "<br>" ?>
    <ul id="new">
		<li>
			<div class="row">
				<?php foreach($resultSetXN as $row): ?>
				<div class="col-sm-4">
					<div class="products"  align='center'>					
						<div class="thumbnail">
							<a href="chitiet.php?id=<?php echo $row['id']?>"><img src="<?php echo $row['image'] ?>" alt="TenSanPham"></a>
						</div>						
						<div class="tensanpham"><?php echo $row['tensp'] ?></div>
						<h4 class="gia"><?php echo $row['gia'] ?> VND</h4>
						<div class="btn-group-vertical">
							<button class="button add-cart" type="button">
								<?php if (!$currentUser) : ?>
									<li class="nav-item <?php echo ($page == 'login') ? 'active' : '' ?>">
									<a href="login.php">Đăng Nhập Để Mua Hàng</a>
									</li>
								<?php else: ?>
									<a href="add.php?id=<?php echo $row['id']?>">Mua
							</button>
							<?php endif ?>
							<button class="button detail" type="button">
								<a href="chitiet.php?id=<?php echo $row['id'] ?>">Xem Chi Tiết</a>
							</button> <br><br><br><br>
						</div>						
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</li>
	</ul>      

<?php include 'footer.php' ?>