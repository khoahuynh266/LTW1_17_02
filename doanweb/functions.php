<?php 
function findUserByEmail($email) {
  global $db;
  $stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
  $stmt->execute(array(strtolower($email)));
  $user = $stmt->fetch(PDO::FETCH_ASSOC);
  return $user;
}
function findUserById($id) {
  global $db;
  $stmt = $db->prepare("SELECT * FROM users WHERE id = ?");
  $stmt->execute(array($id));
  $user = $stmt->fetch(PDO::FETCH_ASSOC);
  return $user;
}
function createUser($fullname, $email, $password) {
  global $db;
  $stmt = $db->prepare("INSERT INTO users (email, password, fullname) VALUE (?, ?, ?)");
  $stmt->execute(array($email, $password, $fullname));
  return $db->lastInsertId();
}
function updateUser($user) {
  global $db;
  $stmt = $db->prepare("UPDATE users SET fullname = ?, phone = ? WHERE id = ?");
  $stmt->execute(array($user['fullname'], $user['phone'], $user['id']));
  return $user;
}
function updateUserPassword($userId, $hashPassword) {
  global $db;
  $stmt = $db->prepare("UPDATE users SET password = ? WHERE id = ?");
  $stmt->execute(array($hashPassword, $userId));
}
function selectSanPhamMoi(){	
  global $db;
  $stmt = $db->prepare("SELECT * from san_pham  group by id, tensp, loai, id_nsx, gia, soluongban, mota, image, xuatsu, created_at, luotxem order by created_at desc limit 10");
  $stmt->execute();
  $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $posts;
}

function SanPhamBanChay(){	
  global $db;
  $stmt = $db->prepare("SELECT * from san_pham  order by soluongban desc limit 10");
  $stmt->execute();
  $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $posts;
}

function SanPhamXemNhieu(){	
  global $db;
  $stmt = $db->prepare("SELECT * from san_pham order by luotxem DESC limit 10");
  $stmt->execute();
  $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $posts;
}

function SelectNhaSanXuat(){
	global $db;
	$stmt = $db->prepare ("Select * from nha_san_xuat");
	$stmt->execute();
	$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $posts;
}

function SelectAllSanPham(){	
  global $db;
  $stmt = $db->prepare("SELECT * from san_pham  group by id, tensp, loai, id_nsx, gia, soluong, mota, image, xuatsu, created_at, luotxem order by created_at");
  $stmt->execute();
  $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $posts;
}
function SelectSanPham($offset,$limit){	
  global $db;
  $current_page=$_GET['page'];
  $stmt = $db->prepare("SELECT * from san_pham  group by id, tensp, loai, id_nsx, gia, soluong, mota, image, xuatsu, created_at, luotxem order by created_at desc LIMIT $offset, $limit");
  $stmt->execute(array($offset, $limit));
  $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $posts;
}

function countTotalRecord(){
  global $db;
  $stmt = $db->prepare("SELECT COUNT(id)  from san_pham");
  $stmt->execute();
  $total_records = $stmt->fetch(PDO::FETCH_ASSOC);
  return $total_records;
}  

function Search(){
  global $db;
  $id=$_GET['term'];
  $stmt = $db->prepare("SELECT * from san_pham  WHERE tensp like '%$id%'");
  $stmt->execute();
  $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $posts;
}

function ChiTietSanPham(){
  global $db;
  $id=$_GET['id'];
  $stmt = $db->prepare("SELECT * from san_pham  WHERE id = $id");
  $stmt->execute();
  $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $posts;
}

function DSDienThoaiTheoHang(){
  global $db;
  $id=$_GET['id'];
  $stmt = $db->prepare("SELECT * from san_pham  WHERE id_nsx = $id");
  $stmt->execute();
  $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $posts;
}
function ChiTietNhaSanXuat(){
  global $db;
  $id=$_GET['id'];
  $stmt = $db->prepare("SELECT * from nha_san_xuat  WHERE id = $id");
  $stmt->execute();
  $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $posts;
}

function SanPhamCungNhaSanXuat(){
  global $db;
  $id=$_GET['id'];
  $stmt = $db->prepare("SELECT * from san_pham  WHERE loai = (Select loai from san_pham WHERE id = $id) and id != $id limit 5");
  $stmt->execute();
  $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $posts;
}