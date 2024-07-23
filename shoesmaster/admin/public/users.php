<?php
    // cataloglist
    $catalog_html='';
    $i=1;
    foreach ($cataloglist as $item) {
        extract($item);
        if($role==1){
          $vaitro='admin';
        }else{
          $vaitro= 'người dùng';
        }
        $linkdel='<a href="index.php?page=deleteuser&id='.$id.'">Xóa</a>';
        $catalog_html.='<tr>
                            <td>'.$i.'</td>
                            <td>'.$username.'</td>
                            <td>'.$password.'</td>
                            <td>'.$email.'</td>
                            <td>'.$vaitro.'</td>
                            <td>'.$linkdel.' </td>
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
                    <h1>Thành viên</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Thành viên</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="d-flex justify-content-end">
                
            </div>
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
                                        <th scope="col">Tên tài khoản </th>
                                        <th scope="col">mật khẩu </th>
                                        <th scope="col"> gmail</th>
                                        <th scope="col"> vai trò</th>
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

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Thêm thành viên mới</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="topic-name" class="col-form-label">Username:</label>
                        <input type="text" class="form-control" name="username" placeholder="Tên tài khoản">
                    </div>
                    <div class="mb-3">
                        <label for="topic-name" class="col-form-label">Password:</label>
                        <input  type="text" class="form-control" name="password" placeholder="Mật khẩu">
                    </div>
                    <div class="mb-3">
                        <label for="topic-name" class="col-form-label">Gmail</label>
                        <input  type="text" class="form-control" name="email" placeholder="Mật khẩu">
                    </div>
                    
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button  type="submit" name="btnadduser" class="btn btn-primary">thêm tài khoản </button>
                </div>
            </form>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>