<!-- Content Wrapper. Contains page content -->
<head>
    <meta charset="utf-8" />
    <title>Robotech - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta content="Tailwind Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="" name="Mannatthemes" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />

    <!-- Css -->
    <!-- Main Css -->
    <link rel="stylesheet" href="../assets/libs/icofont/icofont.min.css" />
    <link href="../assets/libs/flatpickr/flatpickr.min.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/css/tailwind.min.css" />
</head>
<?php
$connect = new PDO('mysql:host=localhost;dbname=shopgiay', 'root','');
function rowCount($connect,$query){
  $stmt = $connect->prepare($query);
  $stmt->execute();
  return $stmt->rowCount();
}


?>
<div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Đã đến kênh quản trị  - <a href="logout.php">Thoát</a></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3> <?php echo rowCount($connect, "SELECT * FROM sanpham"); ?> </h3>

                  <p>  sản phẩm / <?php echo rowCount($connect, "SELECT * FROM danhmuc"); ?> danh mục  </p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="index.php?page=products" class="small-box-footer">xem chi tiết  <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3><?php echo rowCount($connect, "SELECT * FROM bill"); ?> </sup></h3>

                  <p>  đơn hàng </p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="index.php?page=bill" class="small-box-footer">xem chi tiết  <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3><?php echo rowCount($connect, "SELECT * FROM user"); ?></h3>

                  <p> <?php echo rowCount($connect, "SELECT * FROM user WHERE role='0'");?> người dùng  / <?php echo rowCount($connect, "SELECT * FROM user WHERE role='1'");?> admin </p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="index.php?page=users" class="small-box-footer">xem chi tiết  <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3><?php 
                  $connect = new PDO('mysql:host=localhost;dbname=shopgiay', 'root', '');

                  function getSumTotal($connect, $query)
                  {
                      $stmt = $connect->prepare($query);
                      $stmt->execute();
                      $result = $stmt->fetch(PDO::FETCH_ASSOC);
                      return $result['total'];
                  }
                  
                  $query = "SELECT SUM(tongthanhtoan) AS total FROM bill";
                  $total = getSumTotal($connect, $query);
                  
                  echo  $total;
                  ?> đ </h3>

                  <p>Danh Thu trong tháng </p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="index.php?page=bill" class="small-box-footer">xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
          </div>
          <!-- /.row -->
          
        </div>
        <!-- /.container-fluid -->
      </section>

      <?php
      $prolist=getnewproduct();
 $product_html='';
 $i=1;

 foreach ($prolist as $item) {
     extract($item);
     if($img!=""){
        // xác đinhj hình đang ở đâu 
        $file_hinh="../".PATH_IMG_PRODUCT.$img;
        if(file_exists($file_hinh)){
            $hinh="<img src='".$file_hinh."' width='60' height='40'> " ;
        }
        else{
            $hinh="hình không tồn tại trên host! ";
         }
     }else{
        $hinh="chưa cập nhật ";
     }
     $product_html.='<tr  class="bg-white border-b border-dashed dark:bg-gray-900 dark:border-gray-700/40">
                         <td  class="p-3 text-base text-gray-600 whitespace-nowrap dark:text-gray-400" >'.$i.'</td>
                         <td  class="p-3 text-base text-gray-500 whitespace-nowrap dark:text-gray-400">'.$hinh.'</td>
                         <td class="p-3 text-base text-gray-500 whitespace-nowrap dark:text-gray-400"> '.$name.'</td>
                         <td  class="p-3 text-base text-gray-700 whitespace-nowrap dark:text-gray-400> <span class="font-semibold">'.$price.' đ </span></td>
                     </tr>';
     $i++;
 }

?>
      <div
            class="grid grid-cols-12 sm:grid-cols-12 md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4 mb-4"
          >
      <div
              class="col-span-12 sm:col-span-12 md:col-span-12 lg:col-span-6 xl:col-span-6"
            >
              <div
                class="bg-white shadow-sm dark:shadow-slate-700/10 dark:bg-gray-900 rounded-md w-full relative"
              >
                <div
                  class="border-b border-dashed border-slate-200 dark:border-slate-700 py-4 px-4 dark:text-slate-300/70"
                >
                  <h4
                    class="font-medium flex-1 self-center mb-2 md:mb-0 text-xxl"
                  >
                    Sản Phẩm
                  </h4>
                  <p class="text-sm text-slate-400">
                    tổng sản phẩm 
                    <span
                      class="focus:outline-none text-[11px] bg-brand-500/10 text-brand-500 dark:text-brand-300 rounded font-medium py-[2px] px-2"
                      > <?php echo rowCount($connect, "SELECT * FROM sanpham"); ?> </span
                    >
                  </p>
                </div>
                <!--end header-title-->
                <div class="grid grid-cols-1 p-4">
                  <div class="sm:-mx-6 lg:-mx-8">
                    <div
                      class="relative overflow-x-auto block w-full sm:px-6 lg:px-8"
                    >
                      <table class="w-full">
                        <thead class="bg-brand-400/10 dark:bg-slate-700/20">
                          <tr>
                            <th
                              scope="col"
                              class="p-3 text-base font-medium tracking-wider text-start text-gray-700 uppercase dark:text-gray-400"
                            >
                             sản phẩm 
                            </th>
                            <th
                              scope="col"
                              class="p-3 text-base font-medium tracking-wider text-start text-gray-700 uppercase dark:text-gray-400"
                            >
                             hình ảnh 
                            </th>
                            <th
                              scope="col"
                              class="p-3 text-base font-medium tracking-wider text-start text-gray-700 uppercase dark:text-gray-400"
                            >
                              tên 
                            </th>
                            <th
                              scope="col"
                              class="p-3 text-base font-medium tracking-wider text-start text-gray-700 uppercase dark:text-gray-400"
                            >
                              giá 
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          <!-- 1 -->
                          <?=$product_html?>
                          <!-- 2 -->
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <!--end card-body-->
              </div>
              <!--end card-->
            </div>









      <?php
    $cataloglist= get_bill();
    // cataloglist
    $catalog_html='';
    $i=1;
    foreach ($cataloglist as $item) {
        extract($item);
        if($pttt==1){
          $thanhtoan='thanh toán tiền mặt  ';
        }else{
          $thanhtoan= 'thanh toán ví điện tử ';
        }
        if($tinhtrang== ""){
         
          $tt='<td  class="p-3 text-base text-gray-500 whitespace-nowrap dark:text-gray-400"> đang xác nhận đơn hàng   ';
        }
        elseif ($tinhtrang == "đơn hàng đã được xác nhận") {
          $tt = '<td style="background-color: #ffffcc;" class="p-3 text-base text-gray-500 whitespace-nowrap dark:text-gray-400">';
      }
      elseif ($tinhtrang == "đang xác nhận đơn hàng") {
        $tt='<td  class="p-3 text-base text-gray-500 whitespace-nowrap dark:text-gray-400">';
    }
        else{
          $tt=' <td  class="focus:outline-none text-[12px] bg-green-600/10 text-green-700 dark:text-green-600 rounded font-medium py-1 px-2"> ';
        }
        
     
        // $linkdel='<a href="index.php?page=deletebill&id='.$id.'">Xóa</a>';
        $catalog_html.='<tr class="bg-white border-b border-dashed dark:bg-gray-900 dark:border-gray-700/40">
                            <td>'.$i.'</td>
                            <td  class="me-2 h-10 inline-block" >'.$maHD.'</td>
                            <td class="p-3 text-base text-gray-500 whitespace-nowrap dark:text-gray-400">'.$nguoidat_ten.'</td>
                           
                          
                            '.$tt.' '. $tinhtrang.'   </td> 
                            <td class="p-3 text-base text-gray-500 whitespace-nowrap dark:text-gray-400">'.$tongthanhtoan.' đ </td>
                           
                        </tr>';
        $i++;
    }
 
?>

    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <div class="col-span-12 sm:col-span-12 md:col-span-12 lg:col-span-6 xl:col-span-6">
    <div class="bg-white shadow-sm dark:shadow-slate-700/10 dark:bg-gray-900 rounded-md w-full relative">
        <div class="border-b border-dashed border-slate-200 dark:border-slate-700 py-4 px-4 dark:text-slate-300/70">
            <h4 class="font-medium flex-1 self-center mb-2 md:mb-0 text-xxl">
                hóa đơn 
            </h4>
            <p class="text-sm text-slate-400">
               hóa đơn trong tháng 
                <span class="focus:outline-none text-[11px] bg-brand-500/10 text-brand-500 dark:text-brand-300 rounded font-medium py-[2px] px-2"><?php echo rowCount($connect, "SELECT * FROM bill"); ?></span
                    >
                  </p>
                </div>
                <!--end header-title-->
                <div class="grid grid-cols-1 p-4">
                  <div class="sm:-mx-6 lg:-mx-8">
                    <div
                      class="relative overflow-x-auto block w-full sm:px-6 lg:px-8"
                    >
                      <table class="w-full">
                        <thead class="bg-brand-400/10 dark:bg-slate-700/20">
                          <tr>
                            <th
                              scope="col"
                              class="p-3 text-base font-medium tracking-wider text-start text-gray-700 uppercase dark:text-gray-400"
                            >
                           đơn đặt hàng 
                            </th>
                            <th
                              scope="col"
                              class="p-3 text-base font-medium tracking-wider text-start text-gray-700 uppercase dark:text-gray-400"
                            >
                             MÃ hóa đơn 
                            </th>
                            <th
                              scope="col"
                              class="p-3 text-base font-medium tracking-wider text-start text-gray-700 uppercase dark:text-gray-400"
                            >
                              tên ngươi đặt 
                            </th>
                            <th
                              scope="col"
                              class="p-3 text-base font-medium tracking-wider text-start text-gray-700 uppercase dark:text-gray-400"
                            >
                             tình trạng 
                            </th>
                            <th
                              scope="col"
                              class="p-3 text-base font-medium tracking-wider text-start text-gray-700 uppercase dark:text-gray-400"
                            >
                              giá 
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          <!-- 1 -->
                       
                           
                          
                        <?=$catalog_html?>
                        
                        </tbody>
                      </table></div></div></div></div></div>
                      </div>  
  </div>