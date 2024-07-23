<?php
// require_once 'pdo.php';

function user_insert($username, $password,$dienthoai, $email, $diachi){
    $sql = "INSERT INTO user(username, password,diachi, email,dienthoai) VALUES ( ?, ?,?,?,?)";
    pdo_execute($sql, $username, $password,$dienthoai, $email, $diachi);
}
function user_insert_id($username, $password,$hoten,$diachi, $email,$dienthoai){
    $sql = "INSERT INTO user(username, password,hoten,diachi, email,dienthoai) VALUES (?,?, ?, ?,?,?)";
    pdo_execute_id($sql, $username, $password,$hoten,$diachi, $email,$dienthoai);
}
// function check_admin($username, $password){
//     $sql = "SELECT * FROM nguoi_quan_li WHERE username = '".$username."' AND password = '".$password."'";
//     return pdo_query_one($sql);
// }
function checkuser($username, $password){
    $sql = "SELECT * FROM user WHERE username = '".$username."' AND password = '". $password."'";
    return pdo_query_one($sql);
}
    // $userone=pdo_query_one($sql);
    // if(is_array($kq)&&(count($kq))){
    //     return $kq["id"];
    // }else{
    //     return 0;
    // }
  


// function user_insert($ho_ten,$mat_khau,$email,$dia_chi,$sdt){
//     $sql = "INSERT INTO tai_khoan (ho_ten, mat_khau, email, dia_chi, sdt) VALUES (?, ?, ?, ?, ?) ";
//     pdo_execute($sql, $ho_ten, $mat_khau, $email, $dia_chi, $sdt);    
// }

function user_update($username, $password, $hoten, $diachi, $email, $dienthoai, $id) {
    $sql = "UPDATE user SET username=?, password=?, hoten=?, diachi=?, email=?, dienthoai=? WHERE id=?";

    pdo_execute($sql,$username, $password, $hoten, $diachi, $email, $dienthoai, $id);
}
function get_user($id){
    $sql="Select * from user where id=? ";
    return pdo_query_one($sql, $id);
}
function get_user1($kyw=""){
    $sql="SELECT * FROM user WHERE 1 ";
    if($kyw!=""){
       $sql.=" AND name like '%".$kyw."%'";
    }
    $sql.="ORDER BY username ";
    return pdo_query($sql);
 }

// function khach_hang_update($ma_kh, $mat_khau, $ho_ten, $email, $hinh, $kich_hoat, $vai_tro){
//     $sql = "UPDATE khach_hang SET mat_khau=?,ho_ten=?,email=?,hinh=?,kich_hoat=?,vai_tro=? WHERE ma_kh=?";
//     pdo_execute($sql, $mat_khau, $ho_ten, $email, $hinh, $kich_hoat==1, $vai_tro==1, $ma_kh);
// }

// function khach_hang_delete($ma_kh){
//     $sql = "DELETE FROM khach_hang  WHERE ma_kh=?";
//     if(is_array($ma_kh)){
//         foreach ($ma_kh as $ma) {
//             pdo_execute($sql, $ma);
//         }
//     }
//     else{
//         pdo_execute($sql, $ma_kh);
//     }
// }

// function khach_hang_select_all(){
//     $sql = "SELECT * FROM khach_hang";
//     return pdo_query($sql);
// }

// function khach_hang_select_by_id($ma_kh){
//     $sql = "SELECT * FROM khach_hang WHERE ma_kh=?";
//     return pdo_query_one($sql, $ma_kh);
// }

// function khach_hang_exist($ma_kh){
//     $sql = "SELECT count(*) FROM khach_hang WHERE $ma_kh=?";
//     return pdo_query_value($sql, $ma_kh) > 0;
// }

// function khach_hang_select_by_role($vai_tro){
//     $sql = "SELECT * FROM khach_hang WHERE vai_tro=?";
//     return pdo_query($sql, $vai_tro);
// }

// function khach_hang_change_password($ma_kh, $mat_khau_moi){
//     $sql = "UPDATE khach_hang SET mat_khau=? WHERE ma_kh=?";
//     pdo_execute($sql, $mat_khau_moi, $ma_kh);
// }