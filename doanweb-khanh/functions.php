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
function selectSanPhamMoi()
{	
  global $db;
  $stmt = $db->prepare("SELECT * from san_pham  group by id, tensp, loai, id_nsx, gia, soluong, mota, image, xuatsu, created_at, luotxem, DaBan order by created_at desc limit 9");
  $stmt->execute();
  $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $posts;
}
function select10SanPhamMoi()
{	
  global $db;
  $stmt = $db->prepare("SELECT * from san_pham  group by id, tensp, loai, id_nsx, gia, soluong, mota, image, xuatsu, created_at, luotxem, DaBan order by created_at desc limit 10");
  $stmt->execute();
  $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $posts;
}
function select10SanPhamBanChay()
{	
  global $db;
  $stmt = $db->prepare("SELECT * from san_pham  group by id, tensp, loai, id_nsx, gia, soluong, mota, image, xuatsu, created_at, luotxem, DaBan order by DaBan desc limit 10");
  $stmt->execute();
  $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $posts;
}
function select10SanPhamXemNhieu()
{	
  global $db;
  $stmt = $db->prepare("SELECT * from san_pham  group by id, tensp, loai, id_nsx, gia, soluong, mota, image, xuatsu, created_at, luotxem, DaBan order by luotxem desc limit 10");
  $stmt->execute();
  $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $posts;
}
function selectLoaiSanPham()
{	
  global $db;
  $stmt = $db->prepare("SELECT * FROM loai_san_pham ORDER BY loai_san_pham.ten ASC");
  $stmt->execute();
  $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $posts;
}
function selectNhaSanXuat()
{	
  global $db;
  $stmt = $db->prepare("SELECT * FROM nha_san_xuat ORDER BY nha_san_xuat.ten ASC");
  $stmt->execute();
  $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $posts;
}
function selectTheoLoai($id)
{	
  global $db;
  $stmt = $db->prepare("SELECT * FROM san_pham  WHERE loai = ?");
  $stmt->execute(array($id));
  $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $posts;
}
function selectTheoNSX($id)
{	
  global $db;
  $stmt = $db->prepare("SELECT * FROM san_pham  WHERE id_nsx = ?");
  $stmt->execute(array($id));
  $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $posts;
}
function ChiTietSanPham($id)
{	
  global $db;
  $stmt = $db->prepare("SELECT * from san_pham where id = ?");
  $stmt->execute(array($id));
  $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $posts;
}