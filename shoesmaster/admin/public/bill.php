<style>


/* CSS */
.button-1 {
  background-color: #EA4C89;
  border-radius: 8px;
  border-style: none;
  box-sizing: border-box;
  color: #FFFFFF;
  cursor: pointer;
  display: inline-block;
  font-family: "Haas Grot Text R Web", "Helvetica Neue", Helvetica, Arial, sans-serif;
  font-size: 14px;
  font-weight: 500;
  height: 40px;
  line-height: 20px;
  list-style: none;
  margin: 0;
  outline: none;
  padding: 1px 3px;
  position: relative;
  text-align: center;
  text-decoration: none;
  transition: color 100ms;
  vertical-align: baseline;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}

.button-1:hover,
.button-1:focus {
  background-color: #F082AC;
}
.styled-text {
    color: #008000; /* xanh lá */
        font-family: Arial, sans-serif; /* Font chữ */
        font-size: 20px; /* Kích thước chữ */
        font-weight: bold; /* Độ đậm của chữ */
       
    }
    .styled-tex-confirm {
    color: #ffd700; /* Đỏ */
    font-family: Arial, sans-serif;
    font-size: 20px;
    font-weight: bold;
}
</style>

<?php
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
        if ($tinhtrang== "") {
            $tt = 'đang xác nhận đơn hàng';
        }
        elseif ($tinhtrang == "đơn hàng đã được xác nhận") {
            $tt = '<p class="styled-tex-confirm">';
        }
        elseif ($tinhtrang == "đang xác nhận đơn hàng") {
            $tt = '';
        }
        else {
           
            $tt = '<p class="styled-text">';
        }
        
        $linkdel='<a href="index.php?page=deletebill&id='.$id.'"><button class="button-1" role="button" >xóa</button></a>';
        $linkedit='<a href="index.php?page=updatebillform&id='.$id.'"><button class="button-1" role="button" >sửa</button></a>';
        // $linkdel='<a href="index.php?page=deletebill&id='.$id.'">Xóa</a>';
        $catalog_html.='<tr>
                            <td>'.$i.'</td>
                            <td>'.$maHD.'</td>
                            <td>'.$nguoidat_ten.'</td>
                            <td>'.$nguoidat_email.'</td>
                            <td>'.$nguoidat_tel.'</td>
                            <td>'.$nguoidat_diachi.'</td>
                            <td>'.$thanhtoan.'</td>
                            <td> '.$tt.' '.$tinhtrang.'  </p>  </td>
                            <td>'.$tongthanhtoan.'</td>
                            <td> '.$linkedit.' '.$linkdel.'</td>
                        </tr>';
        $i++;
    }
 
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Đơn hàng</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">quản lý đặt hàng </li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- <div class="card-header">
                            <h3 class="card-title ">Danh sách chủ đề</h3>
                        </div> -->
                        <!-- /.card-header -->
                        <div class="card-body">
                      
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">mã đơn hàng  </th>
                                        <th scope="col">tên người đặt  </th>
                                        <th scope="col"> gmail</th>
                                        <th scope="col"> sô điện thoại </th>
                                        <th scope="col">địa chỉ   </th>
                                        <th scope="col"> phương thức thanh toán</th>
                                        <th scope="col"> tính trạng </th>
                                        <th scope="col"> tổng đơn hàng </th>
                                        <th scope="col">hành động  </th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?=$catalog_html?>
                                </tbody>
                                <!-- <tfoot>

                                <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Tên chủ đề</th>
                                        <th scope="col">Chế độ</th>
                                        <th scope="col">Số lượng câu hỏi</th>
                                        <th scope="col">Thao tác</th>
                                    </tr>
                                </tfoot> -->
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

