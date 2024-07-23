<?php
session_start();
ob_start();
if (!isset($_SESSION["giohang"])) {
    $_SESSION["giohang"] = [];
}
// nhúng kết nối csdl
include "model/pdo.php";
include "model/danhmuc.php";
include "model/user.php";
include "model/sanpham.php";
include "model/giohang.php";
include "model/donhang.php";

include "view/header.php";

//data dành cho trang chủ
$kyw = "";
$titlepage = "";

if (!isset($_GET['iddm'])) {
    $iddm = 0;

} else {
    $iddm = $_GET['iddm'];
    $titlepage = get_name_dm($iddm);
}

// kiểm tra có phải from search không ?
if (isset($_POST["timkiem"]) && ($_POST["timkiem"])) {
    $kyw = $_POST["kyw"];
    $titlepage = " kết quả tiềm kiếm từ khóa: <span> " . $kyw . "</span>";
}
$dssp = get_dssp($kyw, $iddm, 12);
$womenproduct = getfemaleproduct();
$menproduct = getmaleproduct();
// $dssp_new=get_dssp_new(4);
// $dssp_best=get_dssp_best(2);
$dssp_view = get_dssp_view(4);


if (!isset($_GET['pg'])) {

    include "view/home.php";
} else {
    switch ($_GET['pg']) {
        case 'sanpham':
            $dsdm = danhmuc_all();
            $kyw = "";
            $titlepage = "";

            if (!isset($_GET['iddm'])) {
                $iddm = 0;

            } else {
                $iddm = $_GET['iddm'];
                $titlepage = get_name_dm($iddm);
            }

            // kiểm tra có phải from search không ?
            if (isset($_POST["timkiem"]) && ($_POST["timkiem"])) {
                $kyw = $_POST["kyw"];
                $titlepage = " kết quả tiềm kiếm từ khóa: <span> " . $kyw . "</span>";
            }
            $dssp = get_dssp($kyw, $iddm, 12);

            include "view/shop.php";
            break;
        case 'addcart':
            if (isset($_POST["addcart"])) {
                $idpro = $_POST["idpro"];
                $name = $_POST["name"];
                $img = $_POST["img"];
                $price = $_POST["price"];
                $soluong = $_POST["soluong"];
                $thanhtien = (int) $soluong * (int) $price;
                $sp = array("idpro" => $idpro, "name" => $name, "img" => $img, "price" => $price, "soluong" => $soluong);
                array_push($_SESSION["giohang"], $sp);
                // echo var_dump($_SESSION["giohang"]);
                header('location:index.php?pg=viewcart');
            }
            break;
        case 'viewcart':
            if (isset($_GET['del']) && ($_GET['del'] == 1)) {
                unset($_SESSION["giohang"]);
                // $_SESSION["giohang"]=[];
                header('location:index.php');
            } else {
                if (isset($_SESSION["giohang"])) {
                    $tongdonhang = get_tongdonhang();
                }
                $giatrivoucher = 0;
                if (isset($_GET['voucher']) && ($_GET['voucher'] == 1)) {
                    $tongdonhang = $_POST['tongdonhang'];
                    $mavoucher = $_POST['mavoucher'];
                    $giatrivoucher = 10;
                    $_SESSION['mavoucher'] = $mavoucher;
                    $_SESSION['giatrivoucher'] = $giatrivoucher;
                }
                $thanhtoan = $tongdonhang - $giatrivoucher;
                include "view/viewcart.php";
            }

            break;
        // case 'adduser':
        //     if(isset($_POST["dangky"])&&($_POST["dangky"])){
        //         $username=$_POST["username"];
        //         $password=$_POST["password"];
        //         $email=$_POST["email"];
        //         user_insert($username, $password, $email);
        //     }
        //     include "view/dangnhap.php";
        //     break;

        // case 'dangky':
        //     include "view/dangky.php";
        //     break;

        case 'gioithieu':
            include "view/gioithieu.php";
            break;
        case 'delcart':
            if (isset($_GET['ind']) && ($_GET['ind']) >= 0) {
                array_splice($_SESSION['giohang'], $_GET['ind'], 1);
                header('Location: index.php?pg=viewcart');
            }
            break;
        case 'sanphamchitiet':

            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $spchitiet = getsp_chitiet($id);
                $dsdm = danhmuc_all();
                $iddm = get_iddm($id);
                $splienquan = get_related_product($iddm, $id, 4);
                include "view/product_detail.php";
            } else {
                include "view/home.php";
            }

            break;
        case 'donhangsubmit':
            if (isset($_POST['donhangsubmit'])) {
                $hoten = $_POST['hoten'];
                $diachi = $_POST['diachi'];
                $dienthoai = $_POST['dienthoai'];
                $email = $_POST['email'];
                $pttt = $_POST['pttt'];
                $ngaymua=$_POST['ngaymua'];

                // $dh=array("hoten" => $hoten, "diachi" => $diachi, "dienthoai" => $dienthoai, "email" => $email, "pttt" => $pttt);
                // array_push($_SESSION["donhangsubmit"], $dh);
                // echo var_dump($_SESSION["donhangsubmit"]);
                //insert user mới
                $username = "guest" . rand(1, 999);
                $password = "123";
                $iduser = user_insert_id($username, $password, $hoten, $diachi, $email, $dienthoai);
                //tạo đơn hàng
                $ngaymua=date("Y-m-d H:i:s");
                $maHD = "Zhope" . $iduser . "-" . date("His-dmy");
                $total = get_tongdonhang();
                $ship = 0;
                if (isset($_SESSION['giatrivoucher'])) {

                    $voucher = $_SESSION['giatrivoucher'];
                } else {
                    $voucher = 0;
                }

                $tongthanhtoan = ($total - $voucher) + $ship;
                $idbill = bill_insert_id($maHD, $iduser, $hoten, $email, $dienthoai, $diachi, $total, $ship, $voucher, $tongthanhtoan, $pttt,$ngaymua);
                //insert giỏ hàng từ session vào table cart
                foreach ($_SESSION['giohang'] as $sp) {
                    extract($sp);
                    $thanhtien = (int) $soluong * (int) $price;
                    cart_insert($idbill, $price, $name, $idpro, $img, $thanhtien, $soluong);
                }
                include_once "view/checkout_configm.php";
            }
            include_once "view/checkout.php";
            break;
        case 'dangnhap_dangki':
            include_once "view/login_register.php";
            break;

        case 'login':
            if (isset($_POST['btnlogin'])) {
                $username = $_POST['user'];
                $password = $_POST['pass'];
                $isuser = checkuser($username, $password);
                $_SESSION['user'] = $isuser;
                // echo var_dump($isuser);
                if ($isuser) {

                    $_SESSION['hoten'] = $isuser['hoten'];
                    $_SESSION['idnd'] = $isuser['idnd'];
                    $_SESSION['email'] = $isuser['email'];
                    $_SESSION['role'] = $isuser['role'];

                    if ($isuser['role'] == 0) {
                        header('Location:index.php');
                        exit();
                    } else if ($_SESSION['trang'] == "sanphamchitiet") {
                        header('location: index.php?pg=sanphamchitiet&id=' . $_SESSION['idpro'] . '#binhluan');
                    } else {

                        header('Location: index.php');
                        exit();
                    }

                } else {
                    header('Location:index.php?pg=login');
                    exit();
                }
            }
            include_once "view/login_register.php";
            break;
        case 'dangki':
            if (isset($_POST['dangki'])) {

                $username = $_POST['user'];

                $password = $_POST["pass"];
                $dienthoai = $_POST['dienthoai'];
                $email = $_POST['email'];
                $diachi = $_POST['diachi'];

                //updata thông tin
                user_insert($username, $password, $dienthoai, $email, $diachi);
                header("Location:index.php");
            }
            include_once "view/login_register.php";
            break;

        case 'my_account':
            if (isset($_SESSION['user']) && (count($_SESSION['user']) > 0)) {

                include "view/my_account.php";
            }

            break;
        case 'logout':
            if (isset($_SESSION['user']) && ($_SESSION['user'] != "")) {
                unset($_SESSION['user']);
            }
            header('location: index.php');
            break;
        case 'userupdate':
            if (isset($_POST['btnuserupdate'])) {
                $id = $_POST['id'];
                $username = $_POST['user'];
                $hoten = $_POST['hoten'];
                $password = $_POST["pass"];
                $dienthoai = $_POST['dienthoai'];
                $email = $_POST['email'];
                $diachi = $_POST['diachi'];

                //updata thông tin
                user_update($username, $password, $hoten, $diachi, $email, $dienthoai, $id);
                //chuyển trang
                header("Location:index.php");
            }
            include "view/my_account.php";
            break;
        case 'lichsumuahang':

           $billdetail= get_bill();
            include "view/lichsumuahang.php";
            break;

        default:

            include "view/home.php";
            break;
    }
}


include "view/footer.php";

?>