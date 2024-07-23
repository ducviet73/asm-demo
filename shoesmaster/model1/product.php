<?php
// get all
function getnewproduct($iddm=0,$kyw=""){
   $sql="SELECT * FROM sanpham WHERE 1";
   if($iddm>0){
      $sql.=" AND iddm=".$iddm;
   }
   
   return get_all($sql);
}
function getsaleproduct(){
   $sql="SELECT * FROM sanpham WHERE promotion>0 ORDER BY promotion DESC";
   return get_all($sql);
}
function getviewproduct(){
   $sql="SELECT * FROM sanpham WHERE view>0 ORDER BY view DESC";
   return get_all($sql);
}
function getfeatureproduct(){
   $sql="SELECT * FROM sanpham WHERE new=1 ORDER BY id DESC";
   return get_all($sql);
}
function get_related_product($iddm,$idproduct){
   $sql="SELECT * FROM sanpham WHERE iddm=".$iddm." AND id<>".$idproduct." ORDER BY id DESC";
   return get_all($sql);
}
// get one record
function get_product_detail($idproduct){
   $sql="SELECT * FROM sanpham WHERE id=".$idproduct;
   return get_one($sql);
}
function getsp_chitiet($iddm){
   $sql="SELECT * FROM sanpham WHERE id".$iddm;
   return get_one($sql);
}

// get value
function get_idcatalog($idproduct){
   $sql="SELECT iddm FROM sanpham WHERE id=".$idproduct;
   $getone=get_one($sql);
   extract($getone);
   return $iddm;
}
function get_img_product($idproduct){
   $sql="SELECT img FROM sanpham WHERE id=".$idproduct;
   $getone=get_one($sql);
   extract($getone);
   return $img;
}
// check khóa ngoại
function check_catalog($iddm){
   $sql="SELECT * FROM sanpham WHERE iddm=".$iddm;
   $prolist=get_all($sql);
   return count( $prolist);
}
function delete_product($id){
   $sql = "DELETE FROM sanpham WHERE id=".$id;
  delete($sql);
   // use exec() because no results are returned
   
}
function  add_sp($iddm, $name, $price, $price2, $img){
   $sql ="INSERT INTO sanpham(iddm, name, img, price, price2) VALUES ('$iddm', '$name' , '$img' , '$price', '$price2' ) ";
   delete($sql);
}

?>