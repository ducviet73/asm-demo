<?php
session_start();
include "../model/pdo.php";
include "../model/binhluan.php";
if (isset($_GET['idpro'])) {
    $idpro=$_GET['idpro'];
} 
if(isset($_POST['guibinhluan'])) {
$idpro=$_POST['idpro'];
$noidung=$_POST['noidung'];
$ngaybl=date(' H:i:s d/m/Y');
$iduser=$_SESSION['user']['id'];
$hoten=$_SESSION['user']['hoten'];
binhluan_insert($idpro, $iduser,$hoten, $noidung, $ngaybl);
}
$dsbl=binhluan_select_all();
$html_bl="";
foreach($dsbl as $bl){
  extract($bl);
    
  $html_bl.='
  <p>'.$noidung.'
        <br>
        '.$hoten.' - ('.$ngaybl.')
    </p>
  ';
}
?>
<h1>BÌNH LUẬN</h1>
<?php
// Kiểm tra xem người dùng đã đăng nhập chưa
if (isset($_SESSION['user'])&&(count($_SESSION['user'])>0)) {
    // Người dùng chưa đăng nhập, chuyển hướng về trang đăng nhập
   


    ?>


    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <input type="hidden" name="idpro" value="idpro">
        <textarea name="noidung" id="" cols="100%" rows="5"></textarea><br>
        <button type="submit" name="guibinhluan">Gửi bình luận</button>
    </form>
<?php
} else {
    $_SESSION['trang']="sanphamchitiet";
    $_SESSION['idpro']=$_GET['idpro'];
    echo "<a href='../index.php?pg=login' target='_parent' >Bạn phải đăng nhập mới có thể bình luận?</a><br>";
}
?>
<div class="dsbl">
    <?=$html_bl?>
</div>
