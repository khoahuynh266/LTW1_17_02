<?php require_once 'init.php' ?>
<?php if ($currentUser) : ?>
<?php
    $success = true;
    if(isset($_FILES['image'])) {
        $fileName = $_FILES['image']['name'];
        $fileSize = $_FILES['image']['size'];
        $fileTmp = $_FILES['image']['tmp_name'];
        $result = move_uploaded_file($fileTmp, 'images/' . $fileName);
        if(!empty($_POST['tensp']) && !empty($_POST['gia']) && !empty($_POST['mota']) && !empty($_POST['xuatsu']) && !empty($_POST['loai']) && !empty($_POST['id_nsx']) && !empty($_POST['soluong']))
        {
            $tensp = $_POST['tensp'];
            $gia = $_POST['gia'];
            $mota = $_POST['mota'];
            $xuatsu = $_POST['xuatsu'];
            $loai = $_POST['loai'];
            $id_nsx = $_POST['id_nsx'];
			$soluong = $_POST['soluong'];
			$sql="INSERT INTO `san_pham`(`tensp`, `loai`, `id_nsx`, `gia`, `soluong`, `mota`, `image`, `xuatsu`, `created_at`, `luotxem`, `daban`) VALUES ('$tensp',$loai,$id_nsx,$gia,$soluong,'$mota','images/$fileName', '$xuatsu', CURRENT_TIME(),0,0)";
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
				<h4>Thêm Sản Phẩm Mới</h4>
			</div>
		</div>	
    <?php if (!$success) : ?>
    <div class="alert alert-danger" role="alert">
    Vui lòng  đầy đủ thông tin!
    </div>
    <?php endif; ?>
    
    <form method="POST" enctype="multipart/form-data">
	<div class="p-2 bg-light text-dark">
        <div class="form-group">
			<h6><label for="tensp"> Tên Sản Phẩm:</label></h6>
			<input type="tensp" class="form-control" id="tensp" name="tensp" placeholder=" Nhập vào tên sản phảm">
        </div>
        <div class="form-group">
			<h6><label for="gia"> Giá Tiền:</label></h6>
			<input type="gia" class="form-control" id="gia" name="gia" placeholder=" Nhập vào giá tiền">
        </div>        
		<div class="form-group">
			<h6><label for="id_nsx">Nhà Sản Xuất:</label></h6>
			<input type="id_nsx" class="form-control" id="id_nsx" name="id_nsx" placeholder="Nhập vào id nhà sản xuất">
        </div>
		  <div class="form-group">
			<h6><label for="loai">Loại Sản Phẩm:</label></h6>
			<input type="loai" class="form-control" id="loai" name="loai" placeholder="Nhập vào loại sản phẩm (id) 1:Điên thoại, 2:Laptop 3: Máy tính bảng)">
        </div>
        <div class="form-group">
			<h6><label for="xuatsu">Xuất Xứ Sản Phẩm:</label></h6>
			<input type="xuatsu" class="form-control" id="xuatsu" name="xuatsu" placeholder="Nhập vào xuất sứ">
        </div>
		<div class="form-group">
			<h6><label for="mota">Mô Tả Sản Phẩm:</label></h6>
			<input type="mota" class="form-control" id="mota" name="mota" placeholder="Nhập vào mô tả sản phẩm">
        </div>
		<div class="form-group">
			<h6><label for="soluong">Số Lượng Bán</label></h6>
			<input type="soluong" class="form-control" id="soluong" name="soluong" placeholder="Nhập vào số lượng sản phẩm">
        </div>
			<div class="form-group">
			<h6><label for="image">Hình Ảnh</label></h6>
        <input type="file" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
		</div>
    </form>
    </div>
    <?php include"footer.php" ?>
<?php endif; ?>