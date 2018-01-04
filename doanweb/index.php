<?php 
require_once 'init.php';
  $resultSet = selectSanPhamMoi();

?>
<?php include 'header.php' ?>
<?php if ($currentUser) : ?>
<p>Chào mừng <?php echo $currentUser['fullname'] ?> đã trở lại.</p>
<?php endif ?>
	<div id="main">
		<div id="left">
			<div class="block">
				<div class="block_sidebar">
					<h3 href="">Sản phẩm phổ biến nhất</h3>
					<a href="" class="readmore">Xem tất cả</a>
				</div>
				<?php foreach($resultSet as $row): ?>
					<ul>
						<li>
							<img src="<?php echo $row['image'] ?>" alt="TenSanPham">
							<h3><?php echo $row['tensp'] ?></h3>
							<p><?php echo $row['gia'] ?> VND</p>
								<?php if (!$currentUser) : ?>
									<form action="">
									<button>Đăng nhập để mua hàng</button>
									</form>
								<?php else: ?>
										<a href="add.php?id=<?php echo $row['id']?>">Mua
							<?php endif ?>
								<form>
									<button>
										<a href="chi_tiet_san_pham.php?id=<?php echo $row['id'] ?>">Xem Thông Tin </a>
									</button>
								</form>
						</li>
					</ul>
				<?php endforeach; ?>
			</div>
		</div>
		<div id="right">
		</div>
	</div>
</div>

<?php include 'footer.php' ?>