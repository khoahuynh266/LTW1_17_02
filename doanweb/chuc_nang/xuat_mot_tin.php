<?php 
    $id=$_GET['id'];
	$pdo = new PDO('mysql:host=localhost;dbname=ban_hang', 'root', '');
	$statement = $pdo->query("select * from menu_ngang where id='$id'");
	While($row = $statement->fetch(PDO::FETCH_ASSOC))
	{
		echo "<h1>";
		echo $row['ten'];
		echo "</h1>";
		echo $row['noi_dung'];
	}
?>