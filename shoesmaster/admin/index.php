<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('location: login.php');
} else {
    $user_admin = $_SESSION['user'];
    $email_admin = $_SESSION['email'];
}


require_once('../model/pdo.php');
require_once('../model/danhmuc.php');
require_once('../model/sanpham.php');
require_once('../model/global.php');
require_once('../model/donhang.php');
require_once('../model/giohang.php');
require_once('../model/user.php');

require_once('public/head.php');
require_once('public/nav.php');

if (isset($_GET['page'])) {
    switch ($_GET['page']) {
        case 'home':
            
            require_once('public/home.php');
            break;
            
        case 'categories':
           // load danh mục từ db
           $cataloglist= get_catalog();
           $tb="";
            require_once('public/categories.php');
            break;
            case 'addcatalog':
                if(isset($_POST['btnadd'])){
                    $name=$_POST['name'];
                    insert_catalog($name);
                }
                // load danh mục từ db
                $cataloglist= get_catalog();
                $tb="";
                 require_once('public/categories.php');
                 break;
                 case 'search':
                    // lấy id , name về từ form
                    if(isset($_POST['btnsearch'])){
                        $kyw=$_POST['kyw'];
                       
                    }
                    
                    // update
                    // load lại catagorries
                    $tb="";
                    $cataloglist= get_catalog($kyw);
                    require_once('public/categories.php');
                    break;
                case 'updatedmform':
                    // lấy danh mục 
                    if(isset($_GET['id'])&&($_GET['id']>0)){
                        $id=$_GET['id'];
                        $detail=get_catalog_detail($id);
                    }
                    require_once('public/updatedmform.php');
                    break;

                 case 'update_catalog':
                    // lấy id , name về từ form
                    if(isset($_POST['btnupdate'])){
                        $id=$_POST['id'];
                        $name=$_POST['name'];
                        update_catalog($id,$name);
                    }
                    
                    // update
                    // load lại catagorries
                    $tb="";
                    $cataloglist= get_catalog();
                    require_once('public/categories.php');
                    break;
                   

         case 'deletedm':
            // lấy id về 
            
            if(isset($_GET['id'])&&($_GET['id']>0)){
                $id=$_GET['id'];
                $tb=delete_dm($id);

            }
            else{
                $tb="";
            }
            // delete
            // load lại catagorries
            $cataloglist= get_catalog();
            require_once('public/categories.php');
            break;
      
        // case 'updateproduct':
            // load dữ liệu : ds danh mục - danh sách sản phẩm 
            
            // require_once('public/products.php');
            // break;
            
        case 'updatespform':
            //load data
          
            if(isset($_GET['id'])&&($_GET['id']>0)){
                $id=$_GET['id'];
                $detail= get_sp_detail($id);
            }
            
          
            require_once('public/updatespform.php');
            break;
            case 'updatesp':
                if(isset($_POST['btnupdatesp'])){
                    $id=$_POST['id'];
                    $iddm=$_POST['iddm'];
                    $name=$_POST['name'];
                    $price=$_POST['price'];
                    $price2=$_POST['price2'];
                   
                
                    update_product($id,$iddm,$name,$price,$price2);
                    
                }
                
                // if có cập nhật hình

               
             // load dữ liệu : ds danh mục - danh sách sản phẩm 
            $prolist=getnewproduct();
            require_once('public/products.php');
              
                break;
            case 'deletesp':
                // lấy id về 
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    $id=$_GET['id'];
                    // xóa hình trước khi record của 
                   $ten_file_hinh=get_img_product($id);
                   $hinh="../".PATH_IMG_PRODUCT.$ten_file_hinh;
                   if(file_exists($hinh)){
                    unlink($hinh);
                   }
                    // delete db
                    delete_product($id);
                }
               
                
                // load lại catagorries
                // load dữ liệu : ds danh mục - danh sách sản phẩm 
                $cataloglist=get_catalog1();
                $prolist=getnewproduct();
                require_once('public/products.php');
            break;
                
        case 'delproduct':

            require_once('public/products.php');
            break;
        case 'products':
            $cataloglist=get_catalog1();
             // load dữ liệu : ds danh mục - danh sách sản phẩm 
            $prolist=getnewproduct();
            require_once('public/products.php');
            break;
            case 'addsp':
                // lấy dữ liệu từ form
                if(isset($_POST['btnaddsp'])){
                    $iddm=$_POST['iddm'];
                    $name=$_POST['name'];
                    $price=$_POST['price'];
                    $price2=$_POST['price2'];
                    $img=$_FILES['img']['name'];
                    if($img!=""){
                    $hinh="../".PATH_IMG_PRODUCT.$img;
                    move_uploaded_file($_FILES["img"]["tmp_name"],$hinh);
                    }

                }
                //add dữ liệu db
                add_sp($iddm, $name, $price, $price2, $img);
                $cataloglist=get_catalog1();
              
                $prolist=getnewproduct();
                require_once('public/products.php');
                break;
        case 'users':
                // load danh mục từ db
                $tb="";
            $cataloglist= get_user1($kyw="");
            require_once('public/users.php');
            break;
            case 'adduser':
                // lấy dữ liệu từ form
                if(isset($_POST['btnadduser'])){
                    $username=$_POST['username'];
                    $password=$_POST['password'];
                    $email=$_POST['email'];
                    insert_user($username,$password,$email);
                  
                }
                //add dữ liệu db
               
                $cataloglist= get_user();
                $tb="";
                require_once('public/users.php');
                break;
            case 'deleteuser':
                // lấy id về 
                
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    $id=$_GET['id'];
                    $tb=delete_user($id);
                }
                else{
                    $tb="";
                }
                // delete
                // load lại catagorries
                $cataloglist= get_user();
                require_once('public/users.php');
                break;
                case 'bill':
                    $cataloglist= get_bill();
                    require_once('public/bill.php');
                break;
                case 'deletebill':
                    // lấy id về 
                    
                    if(isset($_GET['id'])&&($_GET['id']>0)){
                        $id=$_GET['id'];
                        delete_bill($id);
                    }
                   
                    // delete
                    // load lại catagorries
                    $cataloglist= get_bill();
                    require_once('public/bill.php');
                    break;
                    case 'updatebillform':
                    // lấy danh mục 
                    if(isset($_GET['id'])&&($_GET['id']>0)){
                        $id=$_GET['id'];
                        $detail=get_bill_detail($id);
                    }
                    require_once('public/updatebillforn.php');
                    break;

                 case 'update_bill':
                    // lấy id , name về từ form
                    if(isset($_POST['btnupdatebill'])){
                        $id=$_POST['id'];
                        $tinhtrang=$_POST['tinhtrang'];
                        update_bill($id,$tinhtrang);
                    }
                    
                    // update
                    // load lại catagorries
                    $tb="";
                    $cataloglist= get_bill();
                    require_once('public/bill.php');
                    break;
        default:
            require_once('public/404.php');
    }
} else {
    require_once('public/home.php');
}

require_once('public/footer.php');
?>