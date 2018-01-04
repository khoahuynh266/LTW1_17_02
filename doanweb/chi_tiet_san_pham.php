<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Chi tiết sản phẩm</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    </head>
  <body>
		<?php 
			$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
			$id=$_GET['id'];
			$pdo = new PDO('mysql:host=localhost;dbname=data', 'root', '',$options);
			$statement = $pdo->query("select * from san_pham where id='$id'");
			While($row = $statement->fetch(PDO::FETCH_ASSOC))
			{
				$link_anh=$row['image'];
				echo "<table>";
					echo "<tr>";
					echo "<br>";
						echo "<td width='550px' align='center' >";
							echo "<img src='$link_anh' width='550px' >";
						echo "</td>";
						echo "<td valign='top' >";?>
						<?php echo "<br>";?>
							<h2> Tên sản phẩm: <?php echo $row['tensp']; ?> </h2>   
							<?php echo "<br>";?>
							<h2> Giá bán: <?php echo $row['gia'];?>  VND</h2> 
							<?php echo "<br>";?>
							<h2> Thông tin sản phẩm:</h2>  
							<?php echo $row['mota'];?>
							<?php echo "<br>";?>
							
							<button class="btn btn-lg btn-bd-primary mb-3 mb-md-0 mr-md-3">
								<a href="add.php?id=<?php echo $row['id']?>">Mua
							</button>  
						<?php echo "</td>";
					echo "</tr>";
				echo "</table>";
			}
		?>
  </body>
</html>
		

