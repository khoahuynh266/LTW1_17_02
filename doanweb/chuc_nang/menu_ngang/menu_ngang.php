<?php 
	$pdo = new PDO('mysql:host=localhost;dbname=ban_hang', 'root', '');
	$statement = $pdo->query("select id,loai_menu,ten from menu_ngang order by id");
	echo "<div class='menu_ngang' >";
	While($row = $statement->fetch(PDO::FETCH_ASSOC))
	{
		if($row['loai_menu']== "")
		{
			$link_menu = "?thamso = xuat_mot_tin&id=".$row['id'];
		}
        if($row['loai_menu']=="san_pham")
		{
			$link_menu="?thamso = xuat_san_pham_2";
		}
        echo "<a href='$link_menu'>";
		echo ($row['ten']);
		echo "</a>";
		
		echo '&nbsp';
		echo '&nbsp';
		echo '&nbsp';
		echo '&nbsp';
		echo '&nbsp';
	}
	echo "</div>";
?>