<?php require_once 'init.php' ?>
<?php if ($currentUser) : ?>
<?php
        if(isset($_GET["id"]))
		{
			$id = $_GET["id"];
			xoaSanPham($id);		
		}
     
	$all = selectAllSanPham();
	// BƯỚC 2: TÌM TỔNG SỐ RECORDS
	$total_records = count($all);
	
	// BƯỚC 3: TÌM LIMIT VÀ CURRENT_page
	$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
	$limit = 10;
	 
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
	$resultSet = SelectSanPhamLimit($offset,$limit);
?>
	<?php include"header.php" ?>
	<div id="main">
		<div id="left">
			<div class="block">
				<div class="p-2 bg-dark text-white">
					<div class="col-sm-9">
						<h6 href="">Quản lý sản phẩm</h6>
					</div>	
				</div>
					  <table class="table table-bordered">
						<thead>
						  <tr>
							<th>ID</th>
							<th>Tên Sản Phẩm</th>
							<th>Giá Tiền</th>
							<th>Loại</th>
							<th>Nhà Sản Xuất</th>
							<th>Số Lượng</th>
							<th>Xuất Xứ</th>
							<th>Hình Ảnh</th>
							<th>Xóa Sản Phẩm</th>
							<th>Sửa Sản Phẩm</th>							
						  </tr>
						</thead>
						<?php foreach($resultSet as $row): ?>
						<tbody>
						  <tr>
							<td>
								<?php echo $row['id'] ?>
							</td>
							<td>
								<?php echo $row['tensp'] ?>
							</td>
							<td>
								<?php echo $row['gia'] ?>
							</td>
							<td>
								<?php echo $row['loai'] ?>
							</td>
							<td>
								<?php echo $row['id_nsx'] ?>
							</td>
							 <td>
								<?php echo $row['soluong'] ?>
							</td>
							 <td>
								<?php echo $row['xuatsu'] ?>
							</td>
							<td>
							  <img src="<?php echo $row['image'] ?>" width = "120px" > 
							</td>
							<td>
								<a href="xoa_san_pham.php?id=<?php echo $row['id'] ?>" class="btn btn-danger" role="button">Xóa Sản Phẩm</a>
							</td>
							<td>
								<a href="sua_san_pham.php?id=<?php echo $row['id'] ?>" class="btn btn-info" role="button">Sửa Sản Phẩm</a>
							</td>
						  </tr>
						</tbody>
						<?php endforeach; ?>
					  </table>
					</div>

	<div class="container">	
	<nav aria-label="Page navigation example">
		<ul class="pagination">

           <?php 
            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
            if ($current_page > 1 && $total_page > 1){
                echo '<li class="page-item"><a class="page-link" href="xoa_san_pham.php?page='.($current_page-1).'">Prev</a></li>';
            }
 
            // Lặp khoảng giữa
            for ($i = 1; $i <= $total_page; $i++){
                // Nếu là trang hiện tại thì hiển thị thẻ span
                // ngược lại hiển thị thẻ a
                if ($i == $current_page){
                    echo '   <li class="page-item disabled">
								<a class="page-link" href="xoa_san_pham.php?page='.$i.'">'.$i.'</a></li>';
                }
                else{
                    echo '<li class="page-item"><a class="page-link" href="xoa_san_pham.php?page='.$i.'">'.$i.'</a></li>';
                }
            }
            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
            if ($current_page < $total_page && $total_page > 1){
                echo '<li class="page-item"><a class="page-link" href="xoa_san_pham.php?page='.($current_page+1).'">Next</a></li>';
            }
           ?>
			</ul>
		</nav>
     </div>  
</div>	 
	<div id="right">
			<div class="block">
				<div class="block_sidebar">					
					<ul>
						<li>
							<h6><a href="them_san_pham.php" type="button" class="btn btn-primary">Thêm Sản Phẩm</a></h6>
						</li>
					</ul>
				</div>
				<div class="block_sidebar">			
					<ul>
						<li>
							<h6><a href="xoa_san_pham.php?id=0" type="button" class="btn btn-primary">Xóa Sản Phẩm</a></h6>
						</li>
					</ul>
				</div>
				<div class="block_sidebar">
					<ul>
						<li>
							<h6><a href="sua_san_pham.php" type="button" class="btn btn-primary">Sửa Sản Phẩm</a></h6>
						</li>
					</ul>
					
				</div>
			</div>
	</div>	
</div>	

    <?php include"footer.php" ?>
<?php endif; ?>