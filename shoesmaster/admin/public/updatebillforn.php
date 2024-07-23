<?php
    extract($detail);
    
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Chuyên mục</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Chuyên mục</li>
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
                            <form action="index.php?page=update_bill" method="POST">
                                <input type="hidden" name="id" value="<?=$id?>">
                                <div class="modal-body">
                                    <div class="mb-3">
                                      
                                        <select name="tinhtrang">
    <option class="form-control select2"  value="">-- Chọn tình trạng --</option>
    <?php
   $tinhtrangOptions = array("đang xác nhận đơn hàng", "đơn hàng đã được xác nhận", "bạn đã nhận được hàng");
   $colors = array("#000000", "#ffd700", "#008000"); // Màu tương ứng với mỗi tùy chọn
   
   foreach ($tinhtrangOptions as $key => $option) {
       $color = $colors[$key];
       echo "<option value=\"$option\" style=\"color: $color;\">$option</option>";
   }
    ?>
</select>
                                    </div>
                                
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="submit" name="btnupdatebill" class="btn btn-primary">Cập nhật</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    
                                </div>
                            </form>
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

