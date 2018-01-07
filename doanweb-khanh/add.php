<?php 
    require_once 'init.php';
    
    if (!empty($_GET['id_nguoidung']) && !empty($_GET['id_sanpham']) && !empty($_GET['sl_sanpham'])) {
        $id_nguoidung=$_GET['id_nguoidung'];
        $id_sanpham=$_GET['id_sanpham'];
        $sl_sanpham=$_GET['sl_sanpham'];
        createGioHang($id_nguoidung, $id_sanpham, $sl_sanpham);
        $resultSet3 = selectGioHangTheoID($id_nguoidung);
    }else if(!empty($_GET['id_sanphamxoa']) && !empty($_GET['id_nguoidung'])){
        $id_nguoidung=$_GET['id_nguoidung'];
        $id_sanphamxoa=$_GET['id_sanphamxoa'];
        deleteSanPham($id_sanphamxoa,$id_nguoidung);
        $resultSet3 = selectGioHangTheoID($id_nguoidung);
    }
    else{
        header('Location: index.php');
    }
?>
<?php include 'header.php' ?>

<div id="main">
		<div id="left" style="width: 700px">
			<div class="block" style="width: 695px">
				<div class="block_sidebar" style="width: 695px">
					<h6 href="">Thông tin giỏ hàng</h6>
				</div>
                <div>
                    <?php foreach($resultSet3 as $row): ?>
                        <ul>
                            <li>
                                <a><img src="<?php echo $row['image'] ?>" alt="TenSanPham" /></a>
                                <h5><?php echo $row['tensp'] ?></h5>
                                <p><?php echo  number_format($row['gia']).' VNĐ<br>' ?></p>
                                <a href="add.php?id_sanphamxoa=<?php echo $row['id'] ?>&id_nguoidung=<?php echo $currentUser["id"] ?>"><button>Xoá sản phẩm</button></a>
                            </li>
                        </ul>
                    <?php endforeach; ?>
                </div>
			</div>
		</div>
        <div id="right" style="width: 248px">
			<div class="block" style="width: 248px">
				<div class="block_sidebar" style="width: 248px">
					<h6 href="">Thanh toán</h6>
				</div>
                <div>
                    
                     <?php
                        $Tong_tien = 0;
                        foreach($resultSet3 as $row): ?>
                            <?php $Tong_tien = $Tong_tien + $row['gia'] ?>
                    <?php endforeach; ?>
                    <p>Tổng tiền: <?php echo  number_format($Tong_tien).' VNĐ<br>' ?></p>
                </div>
			</div>
		</div>
</div>




