<?php
function get_catalog($kyw=""){
      $sql="SELECT * FROM danhmuc WHERE 1 ";
      if($kyw!=""){
         $sql.=" AND name like '%".$kyw."%'";
      }
      $sql.="ORDER BY name ";
      return get_all($sql);
   }
function get_catalog_detail($id){
      $sql="SELECT * FROM danhmuc WHERE id=".$id;
      return get_one($sql);
   }

  
function get_catalog1(){
   $sql = "SELECT * FROM danhmuc ORDER BY id DESC ";
   return get_all($sql);
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

?>