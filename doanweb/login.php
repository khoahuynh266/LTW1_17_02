<?php 
require_once 'init.php';
$success = true;
if (!empty($_POST['email']) && !empty($_POST['password'])) {  
  $user = findUserByEmail($_POST['email']);
  if ($user) {
    if (password_verify($_POST['password'], $user['password'])) {
      $success = true;
      $_SESSION['userId'] = $user['id'];
	  if($user['type']== 1){
	  header('Location: admin.php'); }
	  else{
	  header('Location: index.php');}
      exit();
    } else {
      $success = false;
    }      
  } else {
    $success = false;
  }
}
?>
<?php include 'header.php' ?>
<div id="main">
<h6 style=" color: #FFF; background: #1154a4; margin-left: 0px; text-indent: 10px;  height: 32px; line-height: 35px;margin-top: 37px;">Đăng nhập</h6>
    <?php if (!$success) : ?>
      <div class="alert alert-danger" role="alert">
        Email và mật khẩu không hợp lệ vui lòng đăng nhập lại!
      </div>
      <?php endif; ?>
    <form method="POST">
      <div class="form-group">
        <label for="email">Địa chỉ email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Điền email vào đây" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>">
      </div>
      <div class="form-group">
        <label for="password">Mật khẩu</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Điền mật khẩu vào đây">
      </div>
      <button type="submit" class="btn btn-primary">Đăng nhập</button>
    </form>
    <?php include 'footer.php' ?>
</div>