<!-- Content Wrapper. Contains page content -->
<?php
extract($detail);

$tensp=$name;
$image="";
if($img!=""){
    $file_hinhanh="../".PATH_IMG_PRODUCT.$img;
    if(file_exists($file_hinhanh)){
        $image='<img src="'.$file_hinhanh.'" width="120">';
    }else{
        $image='sản phẩm chưa có hình';
    }
}





?>
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
            <form action="index.php?page=updatesp" method="POST" >
            <input type="hidden" name="id" value="<?=$id?>">   
            <div class="modal-body">
                    
                <div class="mb-3">
                        <div class="form-group">
                            <label for="level" class="col-form-label">Chọn danh mục:</label>
                          
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="name" value="<?=$name?>" placeholder="Tên sản phẩm">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="price" value="<?=$price?>" placeholder="Giá sản phẩm">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="price2" value="<?=$price2?>" placeholder="Giá củ sản phẩm">
                    </div>
                    <div class="mb-3">
                        <label for="topic-name" class="col-form-label">Hình ảnh</label>
                        <input type="file" name="img" class="col-form-label" id="">
                        <br><?=$image?>

                    </div>
                    <div class="mb-3">
                        <label for="topic-name" class="col-form-label">Sản phẩm New</label>
                        <input type="checkbox" name="chknew" id="">
                    </div>
                    <div class="mb-3">
                        <label for="topic-name" class="col-form-label">Sản phẩm Hot</label>
                        <input type="checkbox" name="chkhot" id="">
                    </div>
                    <div class="mb-3">
                        <label for="topic-name" class="col-form-label">Mô tả</label>
                        <textarea name="mota" id="" cols="30" rows="5" style="width:100%; border:1px #CCC solid" class="col-form-label"></textarea>                        
                    </div>
                    
                </div>
                <div class="modal-footer justify-content-between">
                    <input type="hidden" name="iddm" value="<?=$iddm?>">
                    <input type="hidden" name="idmm" value="<?=$img?>">
                    
                    <button type="submit" name="btnupdatesp" class="btn btn-primary"> cập nhật </button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
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

