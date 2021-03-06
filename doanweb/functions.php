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
  $stmt = $db->prepare("SELECT * from san_pham  group by id, tensp, loai, id_nsx, gia, soluong, mota, image, xuatsu, created_at, luotxem, DaBan order by created_at desc limit 12");
  $stmt->execute();
  $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $posts;
}
function select10SanPhamMoi()
{	
  global $db;
  $stmt = $db->prepare("SELECT * from san_pham  group by id, tensp, loai, id_nsx, gia, soluong, mota, image, xuatsu, created_at, luotxem, DaBan order by created_at desc limit 12");
  $stmt->execute();
  $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $posts;
}

function select10SanPhamBanChay()
{	
  global $db;
  $stmt = $db->prepare("SELECT * from san_pham  group by id, tensp, loai, id_nsx, gia, soluong, mota, image, xuatsu, created_at, luotxem, DaBan order by DaBan desc limit 12");
  $stmt->execute();
  $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $posts;
}
function select10SanPhamXemNhieu()
{	
  global $db;
  $stmt = $db->prepare("SELECT * from san_pham  group by id, tensp, loai, id_nsx, gia, soluong, mota, image, xuatsu, created_at, luotxem, DaBan order by luotxem desc limit 12");
  $stmt->execute();
  $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $posts;
}
function selectLoaiSanPham()
{	
  global $db;
  $stmt = $db->prepare("SELECT * FROM loai_san_pham ORDER BY loai_san_pham.ten_loai ASC");
  $stmt->execute();
  $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $posts;
}
function selectNhaSanXuat()
{	
  global $db;
  $stmt = $db->prepare("SELECT * FROM nha_san_xuat ORDER BY nha_san_xuat.ten_nsx ASC");
  $stmt->execute();
  $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $posts;
}
function selectTheoLoai($id)
{	
  global $db;
  $stmt = $db->prepare("SELECT * FROM san_pham  WHERE loai = $id");
  $stmt->execute(array($id));
  $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $posts;
}
function selectTheoLoaiLimit($id,$offset,$limit)
{
	global $db;
	$stmt = $db->prepare("SELECT * from san_pham WHERE loai =  $id LIMIT $offset,$limit");
	$stmt->execute(array($id,$offset,$limit));
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
function selectTheoNSXLimit($id,$offset,$limit)
{	
  	global $db;
	$stmt = $db->prepare("SELECT * from san_pham WHERE id_nsx =  $id LIMIT $offset,$limit");
	$stmt->execute(array($id,$offset,$limit));
	$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $posts;
}
function ChiTietSanPham($id)
{	
  global $db;
  $stmt = $db->prepare("SELECT sp.id, sp.tensp, sp.loai, sp.id_nsx, sp.gia, sp.soluong, sp.mota, sp.image, sp.xuatsu, sp.created_at, sp.luotxem, sp.DaBan,nsx.ten_nsx,lsp.ten_loai FROM san_pham as  sp,loai_san_pham as lsp,nha_san_xuat as nsx WHERE sp.loai = lsp.id and sp.id_nsx = nsx.id AND sp.id = ?");
  $stmt->execute(array($id));
  $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $posts;
}
function select5SanPhamCungLoai($id)
{	
  global $db;
  $stmt = $db->prepare("SELECT * FROM san_pham WHERE san_pham.loai= ?  order by san_pham.luotxem desc limit 5");
  $stmt->execute(array($id));
  $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $posts;
}
function select5SanPhamCungNSX($id)
{	
  global $db;
  $stmt = $db->prepare("SELECT * FROM san_pham WHERE san_pham.id_nsx= ?  order by san_pham.luotxem desc limit 5");
  $stmt->execute(array($id));
  $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $posts;
}
function Search($id){
  global $db;
  $stmt = $db->prepare("SELECT * from san_pham  WHERE tensp like '%$id%'");
  $stmt->execute(array($id));
  $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $posts;
}
function SearchLimit($id,$offset,$limit){
  global $db;
  $stmt = $db->prepare("SELECT * from san_pham  WHERE tensp like '%$id%' LIMIT $offset,$limit");
  $stmt->execute(array($id,$offset,$limit));
  $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $posts;
}
function createGioHang($id_nguoidung, $id_sanpham, $soluong) {
  global $db;
  $stmt = $db->prepare("INSERT INTO gio_hang (id_nguoidung, id_sanpham, soluong) VALUE (?, ?, ?)");
  $stmt->execute(array($id_nguoidung, $id_sanpham, $soluong));
  return $db;
}
function selectGioHangTheoID($id){
  global $db;
  $stmt = $db->prepare("SELECT san_pham.id,san_pham.tensp,san_pham.gia,san_pham.image, gio_hang.soluong FROM gio_hang, san_pham WHERE gio_hang.id_sanpham=san_pham.id AND gio_hang.id_nguoidung= ? AND gio_hang.tinhtrang= 0");
  $stmt->execute(array($id));
  $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $posts;
}
function deleteSanPham($id_sanphamxoa,$id_nguoidung) {
  global $db;
  $stmt = $db->prepare("DELETE FROM gio_hang WHERE gio_hang.id_sanpham= ? and gio_hang.id_nguoidung = ?");
  $stmt->execute(array($id_sanphamxoa,$id_nguoidung));
  return $db;
}

function selectAllSanPhamMoi()
{	
  global $db;
  $stmt = $db->prepare("SELECT * from san_pham  group by id, tensp, loai, id_nsx, gia, soluong, mota, image, xuatsu, created_at, luotxem, DaBan order by created_at desc limit 100");
  $stmt->execute();
  $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $posts;
}
function selectAllSanPhamBanChay()
{	
  global $db;
  $stmt = $db->prepare("SELECT * from san_pham  group by id, tensp, loai, id_nsx, gia, soluong, mota, image, xuatsu, created_at, luotxem, DaBan order by DaBan desc limit 100");
  $stmt->execute();
  $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $posts;
}
function selectAllSanPhamXemNhieu()
{	
  global $db;
  $stmt = $db->prepare("SELECT * from san_pham  group by id, tensp, loai, id_nsx, gia, soluong, mota, image, xuatsu, created_at, luotxem, DaBan order by luotxem desc limit 100");
  $stmt->execute();
  $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $posts;
}
function selectLichSuGioHangTheoID($id){
  global $db;
  $stmt = $db->prepare("SELECT san_pham.id,san_pham.tensp,san_pham.gia,san_pham.image, gio_hang.soluong ,gio_hang.tinhtrangdonhang FROM gio_hang, san_pham WHERE gio_hang.id_sanpham=san_pham.id AND gio_hang.id_nguoidung= ? AND gio_hang.tinhtrang= 1");
  $stmt->execute(array($id));
  $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $posts;
}

function oderGioHang($id_nguoidung) {
  global $db;
  $stmt = $db->prepare("UPDATE gio_hang SET tinhtrang=1 WHERE id_nguoidung = ?");
  $stmt->execute(array($id_nguoidung));
  return $db;
}

//phần của addmin
function deleteUser($id)
{	
  global $db;
	$stmt = $db->prepare("DELETE from users where id = $id");
	$stmt->execute(array($id));
  return $db;
}
function selectAllUser()
{	
  global $db;
  $stmt = $db->prepare("SELECT * from users");
  $stmt->execute();
  $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $posts;
}
function xoaDonHangUser($id)
{	
  global $db;
	$stmt = $db->prepare("DELETE from don_hang where id_nguoidung = $id");
	$stmt->execute(array($id));
  return $db;
}
function xoaSanPham($id)
{	
  global $db;
	$stmt = $db->prepare("DELETE from san_pham where id = $id");
	$stmt->execute(array($id));
  return $db;
}
function selectDonHangGanDay()
{
	global $db;
	$stmt = $db->prepare("SELECT * from gio_hang where tinhtrang = 1 order by created_at desc");
	$stmt->execute();
	$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $posts;
}

function selectChiTietDonHang()
{
	global $db;
	$stmt = $db->prepare("SELECT * from don_hang ");
	$stmt->execute();
	$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $posts;
}

function findSanPhamById($id_sp)
{
	global $db;
	$stmt = $db->prepare("SELECT * from san_pham where id = $id_sp");
	$stmt->execute(array($id_sp));
	$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $posts;
}
function selectAllSanPham()
{
	global $db;
	$stmt = $db->prepare("SELECT * from san_pham");
	$stmt->execute();
	$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $posts;
}
function selectSanPhamLimit($offset,$limit)
{
	global $db;
	$stmt = $db->prepare("SELECT * from san_pham LIMIT $offset,$limit");
	$stmt->execute(array($offset,$limit));
	$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $posts;
}
function findDonHangById($id_donhang)
{
	global $db;
	$stmt = $db->prepare("SELECT * from gio_hang where id = $id_donhang");
	$stmt->execute(array($id_donhang));
	$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $posts;
}
