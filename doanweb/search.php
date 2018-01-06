<?php 
	require_once 'init.php';
	$resultSet = Search();
?>
<?php include 'header.php' ?> <br>

<h3 class="title">Danh Sách Sản Phẩm</h3>
	<ul id="new">
		<li>
			<div class="row">
				<?php foreach($resultSet as $row): ?>
				<div class="col-sm-4">
					<div class="products"  align='center'>					
						<div class="thumbnail">
							<a href="chitiet.php?id=<?php echo $row['tensp']?>"><img src="<?php echo $row['image'] ?>" alt="TenSanPham"></a>
						</div>						
						<div class="tensanpham"><?php echo $row['tensp'] ?></div>
						<div class="btn-group-vertical">
							<button class="button add-cart" type="button">
								<?php if (!$currentUser) : ?>
										<li class="nav-item <?php echo ($page == 'login') ? 'active' : '' ?>">
										<a  href="login.php">Đăng Nhập Để Mua Hàng</a>
										</li>
								<?php else: ?>
										<a href="add.php?id=<?php echo $row['id']?>">Mua
							</button>
									<?php endif ?>
							<button class="button detail" type="button">
								<a href="chitiet.php?id=<?php echo $row['id'] ?>">Xem Thông Tin</a>
							</button> <br><br><br><br>
						</div>						
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</li>
	</ul>      

<?php include 'footer.php' ?>