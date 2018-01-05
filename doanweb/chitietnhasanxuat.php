<?php 
	require_once 'init.php';
	$resultSet = ChiTietNhaSanXuat();
?>
<?php include 'header.php' ?> <br>

<h3 class="title">Chi Tiết Nhà Sản Xuất</h3>
    <ul id="new">
		<li>
			<div class="row">
				<?php foreach($resultSet as $row): ?>
				<div class="col-sm-4">
					<div class="products"  align='center'>					
						<div class="thumbnail">
							<a href="xemdienthoaitheohang.php?id=<?php echo $row['id']?>">
								<img src="<?php echo $row['images'] ?>" width="300px" height="300px" alt="TenNhaSanXuat">
							</a><br>
						</div>
					</div>
				</div>
				<div class="thumbnail"  align='right'>
					<div align = 'left'>
						<div>Tên nhà sản xuất:  <?php echo $row['ten'] ?></div><br>
						<div>Địa chỉ:				<?php echo $row['diachi'] ?></div><br>
						<div>Email:               <?php echo $row['email'] ?> </div><br>
						<div>Điện thoại:             <?php echo $row['phone'] ?></div><br>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</li>
	</ul>      

<?php include 'footer.php' ?>