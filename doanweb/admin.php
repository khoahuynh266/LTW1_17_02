<?php require_once 'init.php';?>

<?php if ($currentUser) : ?>
<?php
        if(!empty($_POST['id']))
        {
            $id = $_POST['id'];
           deleteUser($id);
			deleteDonHangUser($id);
        }
		$resultSet=selectAllUser();
    ?>
<?php include 'header.php' ?>
   <br><br><br> <div id="main">
		
			<div class="block">
				<div class="block_sidebar">
					<div class="col-sm-9">
						<div class="well">
						  <h4>Danh Sách Tài Khoản Thành Viên</h4>
						</div>
						  <table class="table table-bordered">
							<thead>
							  <tr>
								<th>ID</th>
								<th>Email</th>
								<th>PassWord</th>
								<th>Họ Và Tên</th>
							  </tr>
							</thead>
							<?php foreach($resultSet as $row): ?>
							<tbody>
							  <tr>
								<td>
									<?php echo $row['id'] ?>
								</td>
								<td>
									<?php echo $row['email'] ?>
								</td>
								<td>
									<?php echo $row['password'] ?>
								</td>
								<td>
									<?php echo $row['fullname'] ?>
								</td>
							  </tr>
							</tbody>
							<?php endforeach; ?>
						  </table>
						  <form method="POST">
						<div class="form-group">
						<label for="id">Xóa Tài Khoản</label>
						<input type="id" class="form-control" id="id" name="id" placeholder="Nhập ID Vào Đây...">
						</div>
						<button type="submit" class="btn btn-primary">Xác Nhận</button>
						</form>
					</div>
				</div>
			</div>
		
	</div>
	
	
    <?php include"footer.php" ?>
<?php endif; ?>