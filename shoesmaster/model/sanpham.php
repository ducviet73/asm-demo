<?php
require_once 'pdo.php';

// function hang_hoa_insert($ten_hh, $don_gia, $giam_gia, $hinh, $ma_loai, $dac_biet, $so_luot_xem, $ngay_nhap, $mo_ta){
//     $sql = "INSERT INTO hang_hoa(ten_hh, don_gia, giam_gia, hinh, ma_loai, dac_biet, so_luot_xem, ngay_nhap, mo_ta) VALUES (?,?,?,?,?,?,?,?,?)";
//     pdo_execute($sql, $ten_hh, $don_gia, $giam_gia, $hinh, $ma_loai, $dac_biet==1, $so_luot_xem, $ngay_nhap, $mo_ta);
// }

// function hang_hoa_update($ma_hh, $ten_hh, $don_gia, $giam_gia, $hinh, $ma_loai, $dac_biet, $so_luot_xem, $ngay_nhap, $mo_ta){
//     $sql = "UPDATE hang_hoa SET ten_hh=?,don_gia=?,giam_gia=?,hinh=?,ma_loai=?,dac_biet=?,so_luot_xem=?,ngay_nhap=?,mo_ta=? WHERE ma_hh=?";
//     pdo_execute($sql, $ten_hh, $don_gia, $giam_gia, $hinh, $ma_loai, $dac_biet==1, $so_luot_xem, $ngay_nhap, $mo_ta, $ma_hh);
// }

// function hang_hoa_delete($ma_hh){
//     $sql = "DELETE FROM hang_hoa WHERE  ma_hh=?";
//     if(is_array($ma_hh)){
//         foreach ($ma_hh as $ma) {
//             pdo_execute($sql, $ma);
//         }
//     }
//     else{
//         pdo_execute($sql, $ma_hh);
//     }
// }
function get_all(){
    $sql = "SELECT * FROM sanpham ORDER BY id DESC ";
    return pdo_query($sql);
}
function getmaleproduct(){   
    $sql= "SELECT * FROM sanpham WHERE gioitinh = 1 ORDER BY gioitinh DESC";
    return  pdo_query($sql);
}
function getfemaleproduct(){
    
    $sql= "SELECT * FROM sanpham WHERE gioitinh = 0 ORDER BY gioitinh  DESC";
    return  pdo_query($sql);
}
function get_related_product($iddm,$id,$limi){
    $sql= "SELECT * FROM sanpham WHERE iddm = ? AND id<>? ORDER BY id DESC limit ".$limi;
    // $conn = pdo_get_connection();
    //     $stmt = $conn->prepare($sql);
    //     $stmt->execute();
    //     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    //     $arrproduct = $stmt->fetch();
    //     $conn = null;
    //     return $arrproduct;
    return pdo_query($sql,$iddm,$id);
}
// function get_dssp_new($limi){
//     $sql = "SELECT * FROM sanpham ORDER BY id DESC limit ".$limi;
//     return pdo_query($sql);
// }
// function get_dssp_best($limi){
//     $sql = "SELECT * FROM sanpham WHERE bestseller=1 ORDER BY id DESC limit ".$limi;
//     return pdo_query($sql);
// }
function get_dssp_view($limi){
    $sql = "SELECT * FROM sanpham ORDER BY view DESC limit ".$limi;
    return pdo_query($sql);
}

// function get_dssp_lienquan($iddm,$id,$limi){
//     $sql = "SELECT * FROM sanpham WHERE iddm=? AND id<>? ORDER BY view DESC limit ".$limi;
//     return pdo_query($sql,$iddm,$id);
// }

function get_dssp($kyw,$iddm,$limi){
    $sql = "SELECT * FROM sanpham WHERE 1";
    if($iddm>0){
        $sql .=" AND iddm=".$iddm;
    }
    if($kyw!=""){
        $sql .=" AND name like '%".$kyw."%'";
    }
    $sql .= " ORDER BY id DESC limit ".$limi;
    return pdo_query($sql);
}

function get_sp_by_id($id){
    $sql = "SELECT * FROM sanpham WHERE id=?";
    return pdo_query_one($sql, $id);
}


// get all
function getnewproduct($iddm=0,$kyw=""){
    $sql="SELECT * FROM sanpham WHERE 1";
    if($iddm>0){
       $sql.=" AND iddm=".$iddm;
    }
    
    return pdo_query($sql);
 }
 function getsaleproduct(){
    $sql="SELECT * FROM sanpham WHERE promotion>0 ORDER BY promotion DESC";
    return pdo_query($sql);
 }
 function getviewproduct(){
    $sql="SELECT * FROM sanpham WHERE view>0 ORDER BY view DESC";
    return pdo_query($sql);
 }
 function getfeatureproduct(){
    $sql="SELECT * FROM sanpham WHERE new=1 ORDER BY id DESC";
    return pdo_query($sql);
 }

 function get_iddm($id){
   $sql = "SELECT iddm FROM sanpham WHERE id=?";
   return pdo_query_value($sql,$id);
 }
//  function get_related_product($iddm,$idproduct){
//     $sql="SELECT * FROM sanpham WHERE iddm=".$iddm." AND id<>".$idproduct." ORDER BY id DESC";
//     return get_all($sql);
//  }
 // get one record
//  function get_product_detail($idproduct){
//     $sql="SELECT * FROM sanpham WHERE id=".$idproduct;
//     return pdo_query_one($sql);
//  }
 function getsp_chitiet($id){
    $sql="SELECT * FROM sanpham WHERE id=".$id;
    return pdo_query_one($sql);
 }
 
 // get value
//  function get_idcatalog($idproduct){
//     $sql="SELECT iddm FROM sanpham WHERE id=".$idproduct;
//     $getone=get_one($sql);
//     extract($getone);
//     return $iddm;
//  }
 function get_img_product($idproduct){
    $sql="SELECT img FROM sanpham WHERE id=".$idproduct;
    $getone=pdo_query_one($sql);
    extract($getone);
    return $img;
 }
 // check khóa ngoại
 function check_catalog($iddm){
    $sql="SELECT * FROM sanpham WHERE iddm=".$iddm;
    $prolist=pdo_query($sql);
    return count( $prolist);
 }
 function delete_product($id){
    $sql = "DELETE FROM sanpham WHERE id=".$id;
   delete($sql);
    // use exec() because no results are returned
    
 }
 function get_sp_detail($id){
    $sql="SELECT * FROM sanpham WHERE id=".$id;
    return get_one($sql);
 }
 function  add_sp($iddm, $name, $price, $price2, $img){
    $sql ="INSERT INTO sanpham(iddm, name, img, price, price2) VALUES ('$iddm', '$name' , '$img' , '$price', '$price2' ) ";
    delete($sql);
 }
 function update_product($id,$iddm,$name,$price,$price2){
    $sql="UPDATE sanpham SET iddm='$iddm', name='$name' , price='$price' ,price2='$price2' WHERE id=".$id;
    update($sql);
 } 
// function showsp($dssp){
//     $html_dssp='';
//     foreach ($dssp as $sp) {
//         extract($sp);
//         if($bestseller==1){
//             $best='<div class="best"></div>';
//         }else{
//             $best='';
//         }
//         $link="index.php?pg=sanphamchitiet&idpro=".$id;
//         $html_dssp.='<div class="box25 mr15">
//                             '.$best.'
                            
//                             <a href="'.$link.'">
//                             <img src="layout/images/'.$img.'" alt="">
//                             </a>
//                             <span class="price">'.$name.' </span>
//                             <form action="index.php?pg=addcart" method="post">
//                                 <input type="hidden" name="name" value="'.$name.'">
//                                 <input type="hidden" name="img" value="'.$img.'">
//                                 <input type="hidden" name="price" value="'.$price.'">
//                                 <input type="hidden" name="soluong" value="1">
//                                 <button type="submit" name="addcart">Đặt hàng</button>
//                             </form>
                          
//                         </div>';
//     }
//     return $html_dssp;
// }
// function hang_hoa_exist($ma_hh){
//     $sql = "SELECT count(*) FROM hang_hoa WHERE ma_hh=?";
//     return pdo_query_value($sql, $ma_hh) > 0;
// }

// function hang_hoa_tang_so_luot_xem($ma_hh){
//     $sql = "UPDATE hang_hoa SET so_luot_xem = so_luot_xem + 1 WHERE ma_hh=?";
//     pdo_execute($sql, $ma_hh);
// }

// function hang_hoa_select_top10(){
//     $sql = "SELECT * FROM hang_hoa WHERE so_luot_xem > 0 ORDER BY so_luot_xem DESC LIMIT 0, 10";
//     return pdo_query($sql);
// }

// function hang_hoa_select_dac_biet(){
//     $sql = "SELECT * FROM hang_hoa WHERE dac_biet=1";
//     return pdo_query($sql);
// }

// function hang_hoa_select_by_loai($ma_loai){
//     $sql = "SELECT * FROM hang_hoa WHERE ma_loai=?";
//     return pdo_query($sql, $ma_loai);
// }

// function hang_hoa_select_keyword($keyword){
//     $sql = "SELECT * FROM hang_hoa hh "
//             . " JOIN loai lo ON lo.ma_loai=hh.ma_loai "
//             . " WHERE ten_hh LIKE ? OR ten_loai LIKE ?";
//     return pdo_query($sql, '%'.$keyword.'%', '%'.$keyword.'%');
// }

// function hang_hoa_select_page(){
//     if(!isset($_SESSION['page_no'])){
//         $_SESSION['page_no'] = 0;
//     }
//     if(!isset($_SESSION['page_count'])){
//         $row_count = pdo_query_value("SELECT count(*) FROM hang_hoa");
//         $_SESSION['page_count'] = ceil($row_count/10.0);
//     }
//     if(exist_param("page_no")){
//         $_SESSION['page_no'] = $_REQUEST['page_no'];
//     }
//     if($_SESSION['page_no'] < 0){
//         $_SESSION['page_no'] = $_SESSION['page_count'] - 1;
//     }
//     if($_SESSION['page_no'] >= $_SESSION['page_count']){
//         $_SESSION['page_no'] = 0;
//     }
//     $sql = "SELECT * FROM hang_hoa ORDER BY ma_hh LIMIT ".$_SESSION['page_no'].", 10";
//     return pdo_query($sql);
// }