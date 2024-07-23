<?php
require_once 'pdo.php';

// /**
//  * Thêm loại mới
//  * @param String $ten_danhmuc là tên loại
//  * @throws PDOException lỗi thêm mới
//  */
// function danhmuc_insert($ten_danhmuc){
//     $sql = "INSERT INTO danhmuc(ten_danhmuc) VALUES(?)";
//     pdo_execute($sql, $ten_danhmuc);
// }
// /**
//  * Cập nhật tên loại
//  * @param int $ma_danhmuc là mã loại cần cập nhật
//  * @param String $ten_danhmuc là tên loại mới
//  * @throws PDOException lỗi cập nhật
//  */
// function danhmuc_update($ma_danhmuc, $ten_danhmuc){
//     $sql = "UPDATE danhmuc SET ten_danhmuc=? WHERE ma_danhmuc=?";
//     pdo_execute($sql, $ten_danhmuc, $ma_danhmuc);
// }
// /**
//  * Xóa một hoặc nhiều loại
//  * @param mix $ma_danhmuc là mã loại hoặc mảng mã loại
//  * @throws PDOException lỗi xóa
//  */
// function danhmuc_delete($ma_danhmuc){
//     $sql = "DELETE FROM danhmuc WHERE ma_danhmuc=?";
//     if(is_array($ma_danhmuc)){
//         foreach ($ma_danhmuc as $ma) {
//             pdo_execute($sql, $ma);
//         }
//     }
//     else{
//         pdo_execute($sql, $ma_danhmuc);
//     }
// }
/**
 * Truy vấn tất cả các loại
 * @return array mảng loại truy vấn được
 * @throws PDOException lỗi truy vấn
 */
function danhmuc_all(){
    $sql = "SELECT * FROM danhmuc ORDER BY id DESC";
    return pdo_query($sql);
}

// function showdm($dsdm){
//     $html_dm='';
//     foreach ($dsdm as $dm) {
//         extract($dm);
//         $link='index.php?pg=sanpham&iddm='.$id;
//         $html_dm.='<a href="'.$link.'">'.$name.'</a>';
//     }
//     return $html_dm;
// }
function get_name_dm($id){
    $sql = "SELECT name FROM danhmuc WHERE id=?";
    $kq = pdo_query_one($sql,$id);

    if ($kq && isset($kq['name'])) {
        return $kq['name'];
    } else {
        return ''; // or handle the case when the name is not found
    }
}

function get_catalog($kyw=""){
    $sql="SELECT * FROM danhmuc WHERE 1 ";
    if($kyw!=""){
       $sql.=" AND name like '%".$kyw."%'";
    }
    $sql.="ORDER BY name ";
    return  pdo_query($sql);
 }
function get_catalog_detail($id){
    $sql="SELECT * FROM danhmuc WHERE id=".$id;
    return pdo_query_one($sql);
 }


function get_catalog1(){
 $sql = "SELECT * FROM danhmuc ORDER BY id DESC ";
 return  pdo_query($sql);
}

function delete_dm($id){
//ktra id có khóa ngoại 
$checkcatalog=check_catalog($id);

if($checkcatalog>0){
$tb ="danh mục có sản phẩm không được xóa!";
}
else{
   
$sql = "DELETE FROM danhmuc WHERE id=".$id;

delete($sql);
$tb="xóa thành công ";
 }
 return $tb;

}
function insert_catalog($name){
    $sql = "INSERT INTO danhmuc (name) VALUES ('$name')";
    insert($sql);
 }

function update_catalog($id,$name){
    $sql="UPDATE danhmuc SET name='$name' WHERE id=".$id;
    update($sql);
}
function thongke(){
    $sql="  SELECT COUNT(name) AS name FROM sanpham";
    return  pdo_query($sql);
}

// /**
//  * Truy vấn một loại theo mã
//  * @param int $ma_danhmuc là mã loại cần truy vấn
//  * @return array mảng chứa thông tin của một loại
//  * @throws PDOException lỗi truy vấn
//  */
// function danhmuc_select_by_id($ma_danhmuc){
//     $sql = "SELECT * FROM danhmuc WHERE ma_danhmuc=?";
//     return pdo_query_one($sql, $ma_danhmuc);
// }
// /**
//  * Kiểm tra sự tồn tại của một loại
//  * @param int $ma_danhmuc là mã loại cần kiểm tra
//  * @return boolean có tồn tại hay không
//  * @throws PDOException lỗi truy vấn
//  */
// function danhmuc_exist($ma_danhmuc){
//     $sql = "SELECT count(*) FROM danhmuc WHERE ma_danhmuc=?";
//     return pdo_query_value($sql, $ma_danhmuc) > 0;
// }?>