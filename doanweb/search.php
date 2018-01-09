<?php 
	require_once 'init.php';
	$id=$_GET['text_search'];
	$all = Search($id);
	$resultSet3 = selectLoaiSanPham();
	$resultSet4 = selectNhaSanXuat();
	// BƯỚC 2: TÌM TỔNG SỐ RECORDS
	$total_records = count($all);
	
	// BƯỚC 3: TÌM LIMIT VÀ CURRENT_page
	$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
	$limit = 4;
	 
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
	$resultSet = SearchLimit($id,$offset,$limit);
?>
<?php include 'header.php' ?> <br>

<div id="main" style=" margin-top: 3px; ">
		<div id="left">
			<div class="block">
				<div class="block_sidebar">
					<h6 href="">Danh sách sản phẩm</h6>
				</div>
				<?php foreach($resultSet as $row): ?>
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
				<div class="container">	
			<nav aria-label="Page navigation example">
				<ul class="pagination">

				   <?php 
					// nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
					if ($current_page > 1 && $total_page > 1){
						echo '<li class="page-item"><a class="page-link" href="search.php?text_search='.$id.'&page='.($current_page-1).'">Prev</a></li>';
					}
		 
					// Lặp khoảng giữa
					for ($i = 1; $i <= $total_page; $i++){
						// Nếu là trang hiện tại thì hiển thị thẻ span
						// ngược lại hiển thị thẻ a
						if ($i == $current_page){
							echo '   <li class="page-item disabled">
										<a class="page-link" href="search.php?text_search='.$id.'&page='.$i.'">'.$i.'</a></li>';
						}
						else{
							echo '<li class="page-item"><a class="page-link" href="search.php?text_search='.$id.'&page='.$i.'">'.$i.'</a></li>';
						}
					}
					// nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
					if ($current_page < $total_page && $total_page > 1){
						echo '<li class="page-item"><a class="page-link" href="search.php?text_search='.$id.'&page='.($current_page+1).'">Next</a></li>';
					}
				   ?>
					</ul>
			</nav>
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
						 		<h5><a href="search.php?id=<?php echo $row['id'] ?>"><?php echo $row['ten_nsx'] ?></a></h5>
						</li>
					</ul>
				<?php endforeach; ?>
			</div>
		</div>
<?php include 'footer.php' ?>