<?php
/**
 * Created by PhpStorm.
 * User: doanh ad
 * Date: 7/1/2021
 * Time: 1:45 AM
 */
?>
<?php
//echo "<pre>";
//print_r($_SESSION['cart']);
//echo "</pre>";
    $check= 0;
    if(isset($_SESSION['cart']))
    {
        if(!empty($_SESSION['cart']))
        {
            $check=1;
        }
    }
if($check):
?>
<div class="timeline-items container">
    <h2 style="text-align: center;margin-bottom: 20px;color:#EE4D2D;" >Giỏ hàng của bạn</h2>
    <div style="color: red;padding: 20px 0;">
        <?php
        if(isset($_SESSION['error']))
        {
            echo $_SESSION['error'];
            unset($_SESSION['error']);
        }
        ?>
    </div>
    <form action="" method="post">
        <table class="table table-bordered">
            <tbody>
            <tr>
                <th width="40%">Tên sản phẩm</th>
                <th width="12%">Số lượng</th>
                <th>Giá</th>
                <th>Thành tiền</th>
                <th></th>
            </tr>

            <?php
            // Khai báo tổng giá trị đơn hàng
            $total_cart = 0;
            foreach ($_SESSION['cart']
                     AS $product_id => $cart): ?>
                <tr>
                    <td>
                        <img class="product-avatar img-responsive"
                             src="../backend/assets/uploads/<?php echo $cart['avatar'] ?>"
                             width="80">
                        <div class="content-product">
                            <a href="chi-tiet-san-pham/samsung-s9/<?php echo $product_id?>"
                               class="content-product-a">
                                <?php echo $cart['name']; ?>
                            </a>
                        </div>
                    </td>
                    <td>
                        <!--  cần khéo léo đặt name cho input số lượng,
                         để khi xử lý submit form update giỏ hàng sẽ đơn giản hơn    -->
                        <input type="number" min="0"
                               name="<?php echo $product_id; ?>"
                               class="product-amount form-control"
                               value="<?php echo $cart['quantity']; ?>">
                    </td>
                    <td>
                        <?php
                        if($cart['promotions']!=0):;
                        ?>
                            <p style="text-decoration: line-through;"><?php echo number_format($cart['price'])?>đ</p>
                        <?php
                        endif;
                        ?>
                        <p style="color:#EE4D2D;"><?php echo number_format($cart['price']*(100-$cart['promotions'])/100)?>đ</p>

                    </td>
                    <td>
                        <?php
                        $total_item = $cart['price'] * $cart['quantity']*(100-$cart['promotions'])/100;
                        // Cộng dồn để lấy ra tổng giá trị đơn hàng
                        $total_cart += $total_item;
                        echo "<h4 style='color:#EE4D2D;'>".number_format($total_item)."đ</h4>";
                        ?>
                    </td>
                    <td>
                        <a class="content-product-a"
                           href="index.php?controller=cart&action=delete&id=<?php echo $product_id; ?>"
                            onclick="return confirm('Ban chac chan muon xoa san pham khoi gio hang?')">
                            Xóa
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>

            <tr>
                <td colspan="5" style="text-align: right">
                    Tổng giá trị đơn hàng:
                    <span class="product-price">
                        <b style="color:#EE4D2D;"><?php echo number_format($total_cart); ?> vnđ</b>
                    </span>
                </td>
            </tr>
            <tr>
                <td colspan="5" class="product-payment">
                    <input type="submit" name="submit" value="Cập nhật lại giá" class="btn btn-primary">
                    <a href="index.php?controller=payment&action=index" class="btn btn-success">Đến trang thanh toán</a>
                </td>
            </tr>
            </tbody>
        </table>
    </form>
</div>
<?php
endif;
?>
<?php
if(!$check):
?>

    <div class="pcmall-cart_2BtoMa pcmall-cart_9VYWtL" style="text-align: center; height: 55vh;">
        <div>

            <img style="width: 104px; height: 98px; text-align: center" src="assets/images/cart_empty.png">

        </div>
        <div style="color: #939393; padding: 10px 0px">Giỏ hàng của bạn còn trống</div>
        <a class="pcmall-cart_22E-lm" href="index.php">
            <button class="btn" style="background: #EE4D2D;color: white;">
                <span>MUA NGAY</span>
            </button>
        </a>
    </div>

<?php
endif;
?>
