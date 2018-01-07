<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Web Ban Hang</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  </head>
  <body>
    <div id="header">
      <div id="header_margin">
      <div id="logo">
          <img src="images/logo.png" alt="Logo">
      </div>
      <div id="from_search">
          <form action="Search.php" method="get">
              <input type="text" name="text_search" id="text_search"  placeholder="     Tìm kiếm"  value=""/>
              <button  type="submit"></button>
          </form>
      </div>
      </div>
    </div>
    <div id="slider_menu">
        <div id ="slider_menu_margin" >
          <div id="menu">
              <ul>
              
                <li><a href="index.php" title="">Trang chủ</a></li>
                <?php if (!$currentUser) : ?>
                            <li> <a href="register.php">Đăng ký</a></li>
                <?php endif; ?>
                <?php if (!$currentUser) : ?>
                            <li> <a href="login.php">Đăng nhập</a></li>
                <?php endif; ?>
                <?php if ($currentUser) : ?>
                <li class="nav-item">
				  <a class="nav-link <?php echo ($page == 'profile') ? 'active' : '' ?>" href="profile.php">
					<?php echo $currentUser['fullname'] ?>
				  </a>
				</li>
				<li class="nav-item <?php echo ($page == 'change-password') ? 'active' : '' ?>">
				  <a class="nav-link" href="change-password.php">
					Đổi mật khẩu
				  </a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="logout.php">Đăng xuất</a>
				</li>
				<?php else : ?>
				<li class="nav-item">
				  <a class="nav-link disabled" href="#">
					Khách
				  </a>
				</li>
				<?php endif; ?>
			</ul>
          </div>
          <div id="slider">
          </div>
        </div>
    </div>
  </body>