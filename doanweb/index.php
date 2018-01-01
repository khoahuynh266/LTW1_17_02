<?php
    include("ket_noi.php");
?> 
<html>
    <head>
        <meta charset="UTF-8">
        <title>Web bán hàng</title>
        <style type="text/css" >           
            div.menu_ngang a 
            {
                color:blue;
                margin-left: 10px;
                margin-right: 10px;
                text-decoration: none;
                font-size:20px;
            }
            div.menu_ngang a:hover
            {
                color:red
            }
            div.menu_doc a 
            {
                color:blue;
                text-decoration: none;
                display:block;
            }
            div.menu_doc a:hover
            {
                color:red
            }
        </style>
    </head>
    <body>
        <center>
            <table width="990px">
                <tr>
                    <td colspan="3"><img src="hinh_anh/AnhBia.JPG" ></td>
                </tr>
                <tr>
                    <td colspan="3" height="50px" >
                        <?php
                            include("chuc_nang/menu_ngang/menu_ngang.php");
                        ?> 
                    </td>
                </tr>
                <tr>
                    <td width="170px" valign="top" >
                    <?php 
                        include("chuc_nang/menu_doc/menu_doc.php");
                    ?>
                    </td>
                    <td width="650px" valign="top" >
                        <?php 
                            include("chuc_nang/dieu_huong.php");
                        ?>
                    </td>
                    <td width="170px" valign="top" >Cột phải</td>
                </tr>
                <tr>
                    <td colspan="3">Footer</td>
                </tr>
            </table>
        </center>
    </body>
</html>
