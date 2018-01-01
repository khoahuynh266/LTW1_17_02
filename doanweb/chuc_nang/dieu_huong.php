<?php 
    if(isset($_GET['thamso']))
	{
		$tham_so=$_GET['thamso'];
	}
	else
	{
		$tham_so="";
	}
    switch($tham_so)
    {
        case "xuat_san_pham":
            include("chuc_nang/san_pham/xuat.php");
        break;
        case "chi_tiet_san_pham":
            include("chuc_nang/san_pham/chi_tiet_san_pham.php");
        break;
        case "xuat_san_pham_2":
            include("chuc_nang/san_pham/xuat_toan_bo_san_pham.php");
        break;
        case "xuat_mot_tin":
            include("chuc_nang/xuat_mot_tin.php");
        break;
        default:
            echo "Trang Chủ";
    }
?>