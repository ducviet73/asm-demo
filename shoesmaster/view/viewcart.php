
<?php
$html_cart= viewcart();

?>

    <!-- breadcrumb area start -->
    <div class="page-layout" data-background="./view/assets/img/slider/shop.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="breadcrumb-area text-center">
                        <h2 class="page-title">Cart</h2>
                        <div class="breadcrumb-menu">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item"><a href="index.php?">cart</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <div class="f_cart_area pt-110 mb-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-12">
                    <div class="cart_table">
                        <table>
                            <tr>
                                <td>Product</td>
                                <td></td>
                                <td>price</td>
                                <td>Quantity</td>
                                <td>Total</td>

                            </tr>
                            <tbody>
                               
<?=$html_cart?>


                            </tbody>
                            <tfoot>
                                <form action="index.php?viewcart&voucher=1" method="post">
                                <tr class="design-footer">
                                    <input type="hidden" name="tongdonhang" value="<?=$tongdonhang?>" >
                                    <td>
                                        <input type="text" name="mavoucher" placeholder="Coupon Code">
                                    </td>
                                    <td><button type="submit" name="mavoucher">Apply Coupon</button></td>
                                    <td  colspan="3"><a  href="#" onclick="updateCart()">update cart</a></td>
                                </tr>
                                </form>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-12">
                    <div class="cart__acount">
                        <h5>Cart totals</h5>
                        <table>
                            <tr class="first-child">
                                <td>Subtotal</td>
                                <td><?=$tongdonhang?></td>
                            </tr>
                            <tr class="first-child lastchild">
                                <td>Shipping</td>
                                <td>Enter your address to view shipping options <br> Calculate shipping</td>
                            </tr>
                            <tr class="first-child">
                                <td>Total</td>
                                <td><?=$thanhtoan?></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <a href="index.php?pg=donhangsubmit"><input type="submit" value="procced to checkout"></a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
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
                            <p>Anlor sit amet, consectetur adipiscing elit. Fusce condimentum est lacus, non pretium risus lacinia vel. Fusce eget turpis orci.</p>
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
    <script>
    function updateCart() {
        // Get the quantities of each product
        var quantities = document.querySelectorAll('.quantity-input');

        // Get the prices of each product
        var prices = document.querySelectorAll('.product-price');

        var subtotal = 0;

        // Calculate the subtotal and update the quantities and totals
        for (var i = 0; i < quantities.length; i++) {
            var quantity = parseInt(quantities[i].value);
            var price = parseFloat(prices[i].innerText.replace('$', ''));
            var total = quantity * price;

            subtotal += total;

            // Update the total for each product
            var productTotalElement = document.querySelector('.product-total-' + i);
            productTotalElement.innerText = '$' + total.toFixed(2);
        }

        // Update the subtotal
        var subtotalElement = document.getElementById('subtotal');
        subtotalElement.innerText = '$' + subtotal.toFixed(2);

        // Update the total
        var totalElement = document.getElementById('total');
        totalElement.innerText = '$' + subtotal.toFixed(2);
    }
</script>