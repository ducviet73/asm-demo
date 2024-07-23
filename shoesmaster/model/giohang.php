<?php
//insert vào table cart
function cart_insert($idbill, $price, $name, $idpro, $img, $thanhtien, $soluong){
    $sql = "INSERT INTO cart(idbill, price, name, idpro, img, ThanhTien, soluong) VALUES (?, ?, ?, ?, ?, ?, ?)";
    pdo_execute($sql, $idbill, $price, $name, $idpro, $img, $thanhtien, $soluong);
}

function viewcart(){
    $html_cart = '';
    $i = 0;
    foreach($_SESSION['giohang'] as $sp){
        extract($sp);        
        
        $thanhtien = (int)$price * (int)$soluong;
        $linkdel = "index.php?pg=delcart&ind=".$i;
        $html_cart .= '
        <tr class="max-width-set">
            <td>
                <img src="./view/assets/img/'.$img.'" alt="">
            </td>
            <td>'.$name.'</td>
            <td>'.$price.'</td>
            <td>
                <div class="viewcontent__action single_action pt-30">
                    <span><input type="number" value="'.$soluong.'"></span>
                </div>
            </td>
            <td>'.$thanhtien.'</td>
            <td class="width-set">
                <a href="'.$linkdel.'"><i class="fal fa-times-circle"></i></a>
            </td>
        </tr>';
        $i++;
    }
    return $html_cart;
}

function get_tongdonhang(){
    $tong = 0;
    foreach($_SESSION['giohang'] as $sp){
        extract($sp);
        $price = isset($price) ? $price : 0;
        $soluong = isset($soluong) ? $soluong : 0;
        $tt = (int)$price * (int)$soluong;
        $tong += $tt;
    }
    return $tong;
}
?>