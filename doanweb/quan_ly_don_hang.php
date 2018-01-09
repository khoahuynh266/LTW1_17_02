<?php require_once 'init.php' ?>
<?php if ($currentUser) : ?>
<?php $resultSet = selectDonHangGanDay();
?>
<?php include"header.php" ?>
	<div id="main">		
		<div class="p-2 bg-dark text-white">
			<div class="col-sm-9">		
				<h6 href="">Quản lý đơn hàng</h6>
			</div>	
			</div>	
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Mã Sản Phẩm</th>
            <th>Mã Khách Hàng</th>
            <th>Ngày Lập</th>
			<th>Giá Bán</th>
			<th>Số lượng</th>
			<th>Tổng tiền</th>
            <th>Trạng Thái</th>
          </tr>
        </thead>
        <?php foreach($resultSet as $row): ?>
        <tbody>
          <tr>
            <td>
                <?php echo $row['id'] ?>
            </td>
            <td>
                <?php  $resultSet2 = findSanPhamByID($row['id_sanpham']) ?>
				<?php foreach($resultSet2 as $row2): 
				 echo $row2['tensp'] ;
				 endforeach;
				 ?>
				 
				
            </td>
            <td>
                <?php echo $row['id_nguoidung'] ?>
            </td>
            <td>
                <?php echo $row['created_at'] ?>
            </td>
			<td>
                <?php echo $row['giaban'] ?>
            </td>
				<td>
                <?php echo $row['soluong'] ?>
            </td>
			<td>
                <?php echo $row['giatien'] ?>
            </td>
            <td>
                <?php if($row['trangthai'] ==0): ?>
                <a href="update_donhang.php?id=<?php echo $row['id'] ?>" class="btn btn-danger" role="button">Chưa Giao</a>
                <?php endif; ?>
                <?php if($row['trangthai'] == 1): ?>
                <a href="update_donhang.php?id=<?php echo $row['id'] ?>" class="btn btn-warning" role="button">Đang giao</a>
                <?php endif; ?>
                <?php if($row['trangthai'] == 2): ?>
                <a href="update_donhang.php?id=<?php echo $row['id'] ?>" class="btn btn-success" role="button">Đã giao</a>
                <?php endif; ?>
            </td>
          </tr>
        </tbody>
        <?php endforeach; ?>
      </table>
    </div>
	</div>
	
	
	
    <?php include"footer.php" ?>
<?php endif; ?>