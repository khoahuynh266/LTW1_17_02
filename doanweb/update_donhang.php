<?php require_once 'init.php' ?>
<?php if ($currentUser) : ?>
<?php
$success = true;
        if($_GET['id'])
		{
			$id_donghang=$_GET['id'];
            $resultSet = findDonHangByID($id_donghang);
        }
	if(isset($_POST['tinhtrangdonhang'])){
		$tinhtrangdonhang = $_POST['tinhtrangdonhang'];
		if(isset($_GET["id"]))
		{
			$id=$_GET['id'];
            $exe=$db->prepare("UPDATE gio_hang SET tinhtrangdonhang = '$tinhtrangdonhang' where id = $id");
            $exe->execute();
		}
		else
		{$success = false;}
	}
	else
	{$success = false;}
	if($success ==true)
	{
	header('Location: quan_ly_don_hang.php');
	}
    ?>
<?php include"header.php" ?>
  <div id="main">		
		<div class="p-2 bg-dark text-white">
			<div class="col-sm-9">	
      <center><h4>Thay Đổi Trạng Thái Đơn Hàng</h4></center>
		</div>
	 </div>
    <?php foreach($resultSet as $row): ?>
    <center><form method="POST">
        <div class="form-group">
		<label for="tinhtrangdonhang">Trạng Thái Đơn Hàng:</label>
		<?php if($row['tinhtrangdonhang'] == 1): ?>
        <input type="tinhtrangdonhang" class="form-control bg-warning" id="tinhtrangdonhang" name="tinhtrangdonhang" value="<?php echo $row['tinhtrangdonhang'] ?>">
		<?php endif;?>
		<?php if($row['tinhtrangdonhang'] == 2): ?>
        <input type="tinhtrangdonhang" class="form-control bg-success" id="tinhtrangdonhang" name="tinhtrangdonhang" value="<?php echo $row['tinhtrangdonhang'] ?>">
		<?php endif;?>
		<?php if($row['tinhtrangdonhang'] == 0): ?>
        <input type="tinhtrangdonhang" class="form-control bg-danger" id="tinhtrangdonhang" name="tinhtrangdonhang" value="<?php echo $row['tinhtrangdonhang'] ?>">
		<?php endif;?>
	   </div>
        <button type="submit" class="btn btn-primary">Xác Nhận</button>
    </form></center>
    <?php endforeach; ?>
    </div>
    <?php include"footer.php" ?>
<?php endif; ?>