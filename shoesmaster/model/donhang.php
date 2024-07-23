<?php 
function bill_insert_id($maHD, $iduser, $hoten, $email, $dienthoai, $diachi, $total, $ship, $voucher, $tongthanhtoan, $pttt) {
    $sql = "INSERT INTO bill(maHD, iduser, nguoidat_ten, nguoidat_email, nguoidat_tel, nguoidat_diachi, total, ship, voucher, tongthanhtoan, pttt) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    return pdo_execute_id($sql, $maHD, $iduser, $hoten, $email, $dienthoai, $diachi, $total, $ship, $voucher, $tongthanhtoan, $pttt);
}

function get_bill($kyw=""){
    $sql="SELECT * FROM bill WHERE 1 ";
    if($kyw!=""){
       $sql.=" AND name like '%".$kyw."%'";
    }
    $sql.="ORDER BY maHD ";
    return pdo_query($sql);
 }
 function delete_bill($id){
    //ktra id có khóa ngoại 
    $sql = "DELETE FROM bill WHERE id=".$id;
    return pdo_query($sql);
 }
 function get_bill_detail($id){
   $sql="SELECT * FROM bill WHERE id=".$id;
   return pdo_query_one($sql);
}
function update_bill($id,$tinhtrang){
   $sql="UPDATE bill SET tinhtrang='$tinhtrang' WHERE id=".$id;
   update($sql);
}
?>