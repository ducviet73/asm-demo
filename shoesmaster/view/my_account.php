<?php

    if(isset($_SESSION['user'])&&($_SESSION['user']!="")){
      extract($_SESSION['user']);
      $userinfo=get_user($id);
      $_SESSION['user']=$userinfo;
      extract($userinfo);
      $html_my_account='
      <!-- Form Group (username)-->
      <div class="mb-3">
          <label class="small mb-1" for="inputUsername">Họ và tên </label>
          <input name="user" class="form-control" id="inputUsername" type="text" placeholder="Enter your username" value="'.$username.'">
      </div>
      <!-- Form Row-->

       <!-- Form Group (password)-->
       <div class="mb-3">
          <label class="small mb-1" for="inputUsername">Mật khẩu </label>
          <input name="pass" class="form-control" id="inputUsername" type="password" placeholder="Enter your username" value="'.$password.'">
      </div>
      <!-- Form Row-->
      
      <!-- Form Row        -->
      <div class="row gx-3 mb-3">
          <!-- Form Group (phone)-->
          <div class="col-md-6">
              <label class="small mb-1" for="inputPhone">Số điện thoại</label>
              <input name="dienthoai" class="form-control" id="inputPhone" type="tel" placeholder="Enter your phone number" value="'.$dienthoai.'">
          </div>
          <!-- Form Group (location)-->
          <div class="col-md-6">
              <label class="small mb-1" for="inputLocation">Địa chỉ</label>
              <input name="diachi" class="form-control" id="inputLocation" type="text" placeholder="Enter your location" value="'.$diachi.'">
          </div>
      </div>
      <!-- Form Group (email address)-->
      <div class="mb-3">
          <label class="small mb-1" for="inputEmailAddress">Email</label>
          <input name="email" class="form-control" id="inputEmailAddress" type="email" placeholder="Enter your email address" value="'.$email.'">
      </div>
      <!-- Form Row-->
      ';

  }else{
      $html_my_account='';
    }
?>
<div class="container-xl px-4 mt-4">
    <!-- Account page navigation-->
    <!-- <nav class="nav nav-borders">
        <a class="nav-link active ms-0" href="https://www.bootdey.com/snippets/view/bs5-edit-profile-account-details" target="__blank">Profile</a>
        <a class="nav-link" href="https://www.bootdey.com/snippets/view/bs5-profile-billing-page" target="__blank">Billing</a>
        <a class="nav-link" href="https://www.bootdey.com/snippets/view/bs5-profile-security-page" target="__blank">Security</a>
        <a class="nav-link" href="https://www.bootdey.com/snippets/view/bs5-edit-notifications-page"  target="__blank">Notifications</a>
    </nav> -->
    <hr class="mt-0 mb-4">
    <div class="row">
       
        <div class="col-xl-8">
        <nav class="nav flex-column">
  
  <a class="nav-link" href="index.php?pg=lichsumuahang">lịch sử mua hàng</a>
  <a class="nav-link" href="index.php?pg=logout">Thoát hệ thống</a>
 
</nav>
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Thông tin cá nhân</div>
                <div class="card-body">
                    <form action="index.php?pg=userupdate" method="post">
                        <!-- Form Group (username)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputUsername">Tên đăng nhập</label>
                            <input name="user" class="form-control" id="inputUsername" type="text" placeholder="Enter your username" value="<?=$username?>">
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1" for="inputHoten">Họ và tên </label>
                            <input name="hoten" class="form-control" id="inputHoten" type="text" placeholder="Enter your username" value="<?=$hoten?>">
                        </div>
                        <!-- Form Row-->

                         <!-- Form Group (password)-->
                         <div class="mb-3">
                            <label class="small mb-1" for="inputUsername">Mật khẩu </label>
                            <input name="pass" class="form-control" id="inputUsername" type="password" placeholder="Enter your username" value="<?=$password?>">
                        </div>
                        <!-- Form Row-->
                        
                        <!-- Form Row        -->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (phone)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputPhone">Số điện thoại</label>
                                <input name="dienthoai" class="form-control" id="inputPhone" type="tel" placeholder="Enter your phone number" value="<?=$dienthoai?>">
                            </div>
                            <!-- Form Group (location)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLocation">Địa chỉ</label>
                                <input name="diachi" class="form-control" id="inputLocation" type="text" placeholder="Enter your location" value="<?=$diachi?>">
                            </div>
                        </div>
                        <!-- Form Group (email address)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputEmailAddress">Email</label>
                            <input name="email" class="form-control" id="inputEmailAddress" type="email" placeholder="Enter your email address" value="<?=$email?>">
                        </div>
                        <!-- Form Row-->
                      
                        <!-- Save changes button-->
                        <input type="hidden" name="id" value="<?=$id?>">
                        <button class="btn btn-primary" type="submit" name="btnuserupdate" >Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
  
    </div>
</div>