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
<div class="p-2 bg-dark text-white">
<div class="col-sm-9">	
	<h4>Danh Sách Tài Khoản </h4>
</div>
</div>						
	<table class="table table-bordered">
		<thead>
			<tr>							
				<th>ID</th>
				<th>Họ Và Tên</th>
				<th>Email</th>
				<th>Password</th>
				</tr>
				</thead>
				<?php foreach($resultSet as $row): ?>
				<tbody>
				  <tr>
					<td>
						<?php echo $row['id'] ?>
					</td>
					<td>
						<?php echo $row['fullname'] ?>
					</td>
					<td>
						<?php echo $row['email'] ?>
					</td>
					<td>
						<?php echo $row['password'] ?>
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
	
<?php include"footer.php" ?>
<?php endif; ?>