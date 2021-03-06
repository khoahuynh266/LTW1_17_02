<?php
require_once 'init.php';
if (!$currentUser) {
  header('Location: index.php');
  exit();
}
$fullname = $currentUser['fullname'];
$phone = $currentUser['phone'];
$success = true;
// Kiểm tra người dùng có nhập tên
if (isset($_POST['fullname'])) {
  if (strlen($_POST['fullname']) > 0) {
    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $currentUser['fullname'] = $fullname;
    $currentUser['phone'] = $phone;
    updateUser($currentUser);
  } else {
    $success = false;
  }
}
?>
<?php include 'header.php' ?>
<div id="main">
<h6 style=" color: #FFF; background: #1154a4; margin-left: 0px; text-indent: 10px;  height: 32px; line-height: 35px;margin-top: 37px">Quản lý thông tin cá nhân</h6>
        <div>
            <?php if (!$success) : ?>
                <div class="alert alert-danger" role="alert">
                  Vui lòng nhập đầy đủ thông tin!
                </div>
            <?php endif; ?>
              <form method="POST">
                <div class="form-group">
                    <label for="fullname">Họ và tên</label>
                    <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Điền họ và tên vào đây" value="<?php echo $fullname ?>">
                </div>
                <div class="form-group">
                    <label for="phone">Số điện thoại</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Điền số điện thoại vào đây" value="<?php echo $phone ?>">
                </div>
                      <button type="submit" class="btn btn-primary">Cập nhật</button>
              </form>
        </div>
</div>