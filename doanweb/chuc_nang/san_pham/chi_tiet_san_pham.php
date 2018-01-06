<?php 
	$id=$_GET['id'];
	$pdo = new PDO('mysql:host=localhost;dbname=ban_hang', 'root', '');
	$statement = $pdo->query("select * from san_pham where id='$id'");
	While($row = $statement->fetch(PDO::FETCH_ASSOC))
	{
		$link_anh="hinh_anh/san_pham/".$row['hinh_anh'];
		echo "<table>";
			echo "<tr>";
				echo "<td width='250px' align='center' >";
					echo "<img src='$link_anh' width='150px' >";
				echo "</td>";
				echo "<td valign='top' >";
					echo "<a href='#'>";
						echo $row['ten'];
					echo "</a>";
					echo "<br>";
					echo "<br>";
					echo $row['gia'];
				echo "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td colspan='2' >";
					echo "<br>";
					echo "<br>";
					echo $row['noi_dung'];
				echo "</td>";
			echo "</tr>";
		echo "</table>";
	}
?>