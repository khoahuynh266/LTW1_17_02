<?php require_once 'init.php' ?>
<?php if ($currentUser) : ?>
<?php

    $success = true;
    if(isset($_GET["id"]))
	{	$id_sp = $_GET['id'];
		$resultSet=findSanPhamById($id_sp);
        if(!empty($_POST['tensp']) && !empty($_POST['gia']) && !empty($_POST['mota']) && !empty($_POST['xuatsu']) && !empty($_POST['loai']) && !empty($_POST['id_nsx']) && !empty($_POST['soluong']))
        {
            $tensp = $_POST['tensp'];
            $gia = $_POST['gia'];
            $mota = $_POST['mota'];
            $xuatsu = $_POST['xuatsu'];
            $loai = $_POST['loai'];
            $id_nsx = $_POST['id_nsx'];
			$soluong = $_POST['soluong'];
			$sql="UPDATE `san_pham` SET `tensp`='$tensp',`loai`=$loai,`id_nsx`=$id_nsx,`gia`=$gia,`soluong`=$soluong,`mota`='$mota',`xuatsu`='$xuatsu' WHERE id = $id_sp";;
			$exe=$db->prepare($sql);
            $exe->execute();
        }
        else {$success = false;}
    }

    ?>
    <?php include"header.php" ?>
   <div id="main">		
		<div class="p-2 bg-dark text-white">
			<div class="col-sm-9">		
				<h4>Update Sản Phẩm</h4>
			</div>
		</div>	
    <?php foreach($resultSet as $row): ?>
    <form method="POST" enctype="multipart/form-data">
	<div class="p-2 bg-light text-dark">
        <div class="form-group">
			<h6><label for="tensp"> Tên Sản Phẩm:</label></h6>
			<input type="tensp" class="form-control" id="tensp" name="tensp" value="<?php echo $row['tensp'] ?>">
        </div>
        <div class="form-group">
			<h6><label for="gia"> Giá Tiền:</label></h6>
			<input type="gia" class="form-control" id="gia" name="gia" value="<?php echo $row['gia'] ?>">
        </div>        
		<div class="form-group">
			<h6><label for="id_nsx">Nhà Sản Xuất:</label></h6>
			<input type="id_nsx" class="form-control" id="id_nsx" name="id_nsx" value="<?php echo $row['id_nsx'] ?>">
        </div>
		  <div class="form-group">
			<h6><label for="loai">Loại Sản Phẩm:</label></h6>
			<input type="loai" class="form-control" id="loai" name="loai" value="<?php echo $row['loai'] ?>">
        </div>
        <div class="form-group">
			<h6><label for="xuatsu">Xuất Xứ Sản Phẩm:</label></h6>
			<input type="xuatsu" class="form-control" id="xuatsu" name="xuatsu" value="<?php echo $row['xuatsu'] ?>">
        </div>
		<div class="form-group">
			<h6><label for="mota">Mô Tả Sản Phẩm:</label></h6>
			<input type="mota" class="form-control" id="mota" name="mota" value="<?php echo $row['mota'] ?>">
        </div>
		<div class="form-group">
			<h6><label for="soluong">Số Lượng Bán:</label></h6>
			<input type="soluong" class="form-control" id="soluong" name="soluong" value="<?php echo $row['soluong'] ?>">
        </div>
        <button type="submit" class="btn btn-primary">Sửa</button>
		</div>
    </form>
	<?php endforeach; ?>
    </div>
    <?php include"footer.php" ?>
<?php endif; ?>
	