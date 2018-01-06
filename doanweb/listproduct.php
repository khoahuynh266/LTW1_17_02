<?php 
	require_once 'init.php';
	$all = selectAllSanPham();
	// BƯỚC 2: TÌM TỔNG SỐ RECORDS
	$total_records = count($all);
	
	// BƯỚC 3: TÌM LIMIT VÀ CURRENT_page
	$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
	echo $current_page;
	$limit = 9;
	 
	// BƯỚC 4: TÍNH TOÁN TOTAL_page VÀ offset
	// tổng số trang
	$total_page = (int)$total_records/$limit;
	 
	// Giới hạn current_page trong khoảng 1 đến total_page
	if ($current_page > $total_page){
		$current_page = $total_page;
	}
	else if ($current_page < 1){
		$current_page = 1;
	}
	// Tìm offset
	$offset = ($current_page - 1) * $limit;
	 
	// BƯỚC 5: TRUY VẤN LẤY DANH SÁCH
	// Có limit và offset rồi thì truy vấn CSDL lấy danh sách
	$resultSet = SelectSanPham($offset,$limit);
?>
<?php include 'header.php' ?> <br>
<h3 class="title">Danh Sách Sản Phẩm</h3>
<div class="Seach"  align='right'>
	<form action="Search.php" method="get"> 
		Search: <input type="text" name="term" /><br /> 
		<input type="submit" value="Tìm Kiếm" /> 
	</form> 
</div>
	<ul id="new">
		<li>
			<div class="row">
				<?php foreach($resultSet as $row): ?>
				<div class="col-sm-4">
					<div class="products"  align='center'>					
						<div class="thumbnail">
							<a href="chitiet.php?id=<?php echo $row['id']?>"><img src="<?php echo $row['image'] ?>" alt="TenSanPham"></a>
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
<div class="container">	
	<nav aria-label="Page navigation example">
		<ul class="pagination">

           <?php 
            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
            if ($current_page > 1 && $total_page > 1){
                echo '<li class="page-item"><a class="page-link" href="listproduct.php?page='.($current_page-1).'">Prev</a></li>';
            }
 
            // Lặp khoảng giữa
            for ($i = 1; $i <= $total_page; $i++){
                // Nếu là trang hiện tại thì hiển thị thẻ span
                // ngược lại hiển thị thẻ a
                if ($i == $current_page){
                    echo '   <li class="page-item disabled">
								<a class="page-link" href="listproduct.php?page='.$i.'">'.$i.'</a></li>';
                }
                else{
                    echo '<li class="page-item"><a class="page-link" href="listproduct.php?page='.$i.'">'.$i.'</a></li>';
                }
            }
            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
            if ($current_page < $total_page && $total_page > 1){
                echo '<li class="page-item"><a class="page-link" href="listproduct.php?page='.($current_page+1).'">Next</a></li>';
            }
           ?>
			</ul>
		</nav>
     </div>  	 
<?php include 'footer.php' ?>