<?php 
	require_once 'init.php';
	$resultSet = SelectNhaSanXuat();
?>
<?php include 'header.php' ?> <br>
<h3 class="title">Danh Sách Hãng Sản Xuất</h3>
    <ul id="new">
		<li>
			<div class="row">
				<?php foreach($resultSet as $row): ?>
				<div class="col-sm-4">
					<div class="products"  align='center'>					
						<div class="thumbnail">
							<a href="chitietnhasanxuat.php?id=<?php echo $row['id']?>">
							<img src="<?php echo $row['images']  ?>" width="120px" height="120px " alt="TenSanPham" >
							<div class="tensanpham"><?php echo $row['ten'] ?></div></a>
						</div>
							
						<div class="btn-group-vertical">
							
							<button class="button detail" type="button">
								<a href="xemdienthoaitheohang.php?id=<?php echo $row['id'] ?>">Xem sản phẩm </a>
							</button> <br><br><br><br>
						</div>						
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</li>
	</ul>      

<?php include 'footer.php' ?>