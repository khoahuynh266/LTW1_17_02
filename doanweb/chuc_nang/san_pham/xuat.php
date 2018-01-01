<?php
	$pdo = new PDO('mysql:host=localhost;dbname=ban_hang', 'root', '');
    $id=$_GET['id'];
    $statement = $pdo->query("select id,ten,gia,hinh_anh,thuoc_menu from san_pham where thuoc_menu='$id' order by id desc ");
    echo "<div class='menu_doc' >";
	While($row = $statement->fetch(PDO::FETCH_ASSOC))
    {
        echo "<tr>";
            for($i=1;$i<=3;$i++)
            {
                echo "<td align='center' width='415px' >";
                    if($row!=false)
                    {
                       $link_anh="hinh_anh/san_pham/".$row['hinh_anh'];
						$link_chi_tiet="?thamso=chi_tiet_san_pham&id=".$row['id'];

						echo "<a href='$link_chi_tiet' >";
						echo "<img src='$link_anh' width='150px' >";
						echo "</a>";
						echo "<br>";
						echo "<a href='$link_chi_tiet' >";
						echo $row['ten'];
						echo "</a>";
						echo "<br>";
						echo $row['gia'];echo "<br>";echo "<br>";
                    }
                    else 
                    {
                        echo "&nbsp;";
                    }
                echo "</td>";
                if($i!=3)
                {
                    $row = $statement->fetch(PDO::FETCH_ASSOC);
                }
            }
        echo "</tr>";
    }
    echo "</table>";
?>