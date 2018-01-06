<?php 
	$pdo = new PDO('mysql:host=localhost;dbname=ban_hang', 'root', '');
	$statement = $pdo->query("select * from menu_doc order by id");
	echo "<div class='menu_doc' >";
	While($row = $statement->fetch(PDO::FETCH_ASSOC))
	{	
		$link="?thamso=xuat_san_pham&id=".$row['id'];
        echo "<a href='$link'>";
            echo $row['ten'];
        echo "</a>";
		
		echo '&nbsp';
		echo '&nbsp';
		echo '&nbsp';
		echo '&nbsp';
		echo '&nbsp';
	}
	echo "</div>";
?>