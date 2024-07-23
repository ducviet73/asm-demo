
<?php 
if (!isset($_SESSION['user'])) {
    // Người dùng chưa đăng nhập, chuyển hướng đến trang đăng nhập
    header("Location: index.php?pg=login");
    exit(); // Kết thúc kịch bản để ngăn mã tiếp tục thực thi
}
if(isset($_SESSION['user'])&&($_SESSION['user']!="")){
    extract($_SESSION['user']);
    $userinfo=get_user($id);
    $_SESSION['user']=$userinfo;
    extract($userinfo);
}

// Hiển thị thông báo
// echo '<div class="notification__message">
//         <p><i class="fal fa-window-maximize"></i>Returning customer? Click here to <a href="index.php?pg=login">login</a></p>
//         <p><i class="fal fa-window-maximize"></i>Have a coupon? Click here to enter your code</p>
//       </div>';
?>
<div class="checkout_area pt-80">
    <div class="container">
       
        <div class="row justify-content-center" >
            <form action="index.php?pg=donhangsubmit" method="post" enctype="multipart/form-data">
                <div class="col-xl-7 col-lg-7 col-md-12">
                    <div class="checkout_form mb-100">

                        <div class="row mb-30">

                            <div class="checkout__wrap">
                                <label>Họ và tên <span>*</span></label>
                                <input type="text" name="hoten" id="hoten" value="<?=$hoten?>">
                            </div>


                        </div>
                        <!-- <div class="checkout__wrap">
                                <label>Tên công ty  (nếu có) <span></span></label>
                                <input type="text" name="cname">
                            </div> -->
                        <div class="checkout__wrap">
                            <label>Địa chỉ <span>*</span></label>
                            <input type="text" name="diachi" id="diachi" value="<?=$diachi?>">
                        </div>
                        <div class="checkout__wrap">
                            <label>Phone <span>*</span></label>
                            <input type="text" name="dienthoai" id="dienthoai" value="<?=$dienthoai?>">
                        </div>
                        <div class="checkout__wrap">
                            <label>Email address <span>*</span></label>
                            <input type="email" name="email" id="email" value="<?=$email?>">
                        </div>
                        <!-- <div class="checkout__wrap-2 pt-20">
                                <input type="checkbox" name="check1">
                                <span>Create an account?</span>
                            </div>
                            <div class="checkout__wrap-2 pt-20">
                                <input type="checkbox" name="check2">
                                <span>Ship to a different address?</span>
                            </div> -->
                        <!-- <div class="checkout__wrap">
                                <label>Order notes (optional) <span></span></label>
                                <textarea name="ordernote" placeholder="Note about your order, e.g special note for delivery"></textarea>
                            </div> -->

                    </div>
                </div>
                <div class="col-xl-5 col-lg-5 col-md-12">
                    <div class="cart__acount ml-50">
                        <h5>Your order</h5>
                        <table>
                            <?php
                            echo viewcart(); // Display the cart items
                            ?>
                            <tr class="first-child-2">
                                <td>Subtotal</td>
                                <td class="lightbluee">
                                    <?php echo get_tongdonhang(); ?>
                                </td>
                            </tr>
                            <tr class="first-child lastchild">
                                <td>Shipping</td>
                                <td>Enter your address to view shipping options.</td>
                            </tr>
                            <tr class="first-child-2">
                                <td>Total</td>
                                <td class="lightbluee">
                                    <?php echo get_tongdonhang(); ?>
                                </td>
                            </tr>
                        </table>
                        <div class="checkout__accordion mt-30">
                            <div class="accordion" id="accordionExample">
                                <h3>Phương thức thanh toán</h3>
                                <input type="radio" name="pttt" value="1" checked> Thanh toán khi nhận hàng <br>
                                <input type="radio" name="pttt" value="2"> Ví điện tử <br>
                                <input type="radio" name="pttt" value="3"> Thanh toán online
                            </div>
                        </div>
                        <div class="order-button">
                        <div class="datepicker">
               
                <input type="hidden" name="ngaymua" id="datepicker" value='' class="datepicker__input">
            </div>
            <script>
                // Lấy ngày tháng năm hiện tại
                var currentDate = new Date();
                var day = currentDate.getDate();
                var month = currentDate.getMonth() + 1; // Lưu ý: Tháng trong JavaScript bắt đầu từ 0
                var year = currentDate.getFullYear();

                // Định dạng ngày tháng năm
                var formattedDate = (day < 10 ? '0' + day : day) + '/' + (month < 10 ? '0' + month : month) + '/' + year;

                // Gán giá trị cho trường input
                document.getElementById('datepicker').value = formattedDate;
            </script>

                            <button type="submit" name="donhangsubmit">Đặt hàng</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- popup area start -->
<div class="overlay"></div>
<div class="product-popup">
    <div class="view-background">
        <div class="row">
            <div class="col-xl-5 col-lg-5 col-md-5">
                <div class="quickview">
                    <div class="quickview__thumb">
                        <img src="./view/assets/img/quick_view/25.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="col-xl-7 col-lg-7 col-md-7">
                <div class="viewcontent">
                    <div class="viewcontent__header">
                        <h2>Brown Leather Bags</h2>
                        <a class="view_close product-p-close" href="javascript:void(0)"><i
                                class="fal fa-times-circle"></i></a>
                    </div>
                    <div class="viewcontent__rating">
                        <i class="fal fa-star ratingcolor"></i>
                        <i class="fal fa-star ratingcolor"></i>
                        <i class="fal fa-star ratingcolor"></i>
                        <i class="fal fa-star"></i>
                    </div>
                    <div class="viewcontent__price">
                        <h4><span>$</span>99.00</h4>
                    </div>
                    <div class="viewcontent__stock">
                        <h4>Available :<span> In stock</span></h4>
                    </div>
                    <div class="viewcontent__details">
                        <p>Anlor sit amet, consectetur adipiscing elit. Fusce condimentum est lacus, non pretium risus
                            lacinia vel. Fusce eget turpis orci.</p>
                    </div>
                    <div class="viewcontent__action">
                        <span>Qty</span>
                        <span><input type="number" placeholder="1"></span>
                        <span><a href="#">add to cart</a></span>
                        <span><i class="fal fa-heart"></i></span>
                        <span><i class="fal fa-info-circle"></i></span>
                    </div>
                    <div class="viewcontent__footer">
                        <ul>
                            <li>Category:</li>
                            <li>SKU:</li>
                            <li>Brand:</li>
                        </ul>
                        <ul>
                            <li>Watches</li>
                            <li>2584-MK63</li>
                            <li>Brenda</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- popup area end -->