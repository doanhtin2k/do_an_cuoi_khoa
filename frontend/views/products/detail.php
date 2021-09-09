<?php
/**
 * Created by PhpStorm.
 * User: doanh ad
 * Date: 6/16/2021
 * Time: 3:39 PM
 */
?>
<?php
//echo "<pre>";
//print_r($product);
//echo "</pre>";

?>

<div class="container">
    <div class="position ps-detail">
        <p>
            <a href="index.php">Home</a>
            &nbsp;>&nbsp;
            <a href="index.php?controller=category&action=index">Product</a>
            &nbsp;>&nbsp;
            <?php
            echo $product['title'];
            ?>
        </p>
    </div>
    <div class="wrap-product-detail">
        <div class="row product-detail">
            <div class="product-detail-image col-lg-5 col-md-6 col-sm-6 col-12">
                <img src="../backend/assets/uploads/<?php echo $product['avatar']; ?>" />
                <!--                <div class="group-img">-->
                <!--							<span>-->
                <!--								<img src="images/giay-the-thao-nike-jordan-1-mid-signal-blue-mau-xanh-602ddcca4ed14-18022021101938.jpg">-->
                <!--							</span>-->
                <!--                    <span>-->
                <!--								<img src="images/giay-the-thao-nike-jordan-1-mid-signal-blue-mau-xanh-602ddcca4ed14-18022021101938.jpg">-->
                <!--							</span>-->
                <!--                    <span>-->
                <!--								<img src="images/giay-the-thao-nike-jordan-1-mid-signal-blue-mau-xanh-602ddcca412ba-18022021101938.jpg">-->
                <!--							</span>-->
                <!--                </div>-->

            </div>
            <form class="product-detail-content col-lg-7 col-md-6 col-sm-6 col-12">
                <div>
                    <div class="product-info">
                        <h2 class="category">
                            <a href="index.php?controller=product&action=index&category_name=<?php echo $product['category_name']; ?>">
                                <?php echo strtoupper($product['category_name']); ?>
                            </a>
                        </h2>
                        <p class="name">
                            <?php
                            echo $product['title'];
                            ?>
                        </p>
                        <p class="last-price">
                            <?php
                            $price = $product['price']- $product['price']*$product['promotions']/100;
                            echo number_format($price)." đ";
                            ?>
                        </p>
                        <?php
                        if($product['promotions']!=0):
                        ?>
                            <p class="price">
                                <del style="color:#AAAAAA;font-family: Dancing Script;">
                                    <?php
                                    echo number_format($product['price'])." đ";
                                    ?>
                                </del>
                                <span style="padding: 10px;font-family: Dancing Script; color: red;">
                                    &nbsp;&nbsp;giảm
                                    <?php
                                    echo $product['promotions']."%";
                                    ?>
                                </span>
                            </p>

                        <?php
                        endif;
                        ?>

                        <p class="designs">
                            <span style="display:inline-block;width: 100px;">Kiểu dáng:</span>
                            <b>
                                <?php
                                echo $product['Designs'];
                                ?>
                            </b>
                        </p>
                        <p class="sex">
                            <span style="display:inline-block; ;width: 100px;">Giới tính:</span>
                            <b>
                                <?php
                                echo $product['sex'];
                                ?>
                            </b>
                        </p>
                        <div style="display: flex;">
                            <span style="display:inline-block; ;width: 100px;">Size:</span>
                            <div class="input-size">
                                <?php
                                foreach ($size AS $value):
                                ?>
                                <input id="<?php echo $value ?>" type="radio" name="radio-size" value="<?php echo $value ?>">
                                <label class="btn"for="<?php echo $value ?>">size <?php echo $value ?></label>
<!--                                input-size-active-->
                                <?php
                                    endforeach;
                                ?>
                            </div>
                        </div>
                        <a href="#product_summary">Xem thông tin chi tiêt</a>
                    </div>
                    <div class="order-cart">
                        <input type="submit" name="order" class="order"
                               value="Mua ngay">
                        <input type="submit" name="cart" class="cart"
                               value="Thêm vào giỏ">
                    </div>
                </div>
            </form>
        </div>
        <section class="product_summary" id="product_summary">
            <h2 style="	color: red;">Thông tin về sản phẩm</h2>
            <p class="summary">
                <b>
                    <?php
                    echo $product['title'];
                    ?>
                </b>
                <span>
                     <?php
                     echo $product['summary'];
                     ?>
                </span>
            </p>
            <div>
                <img src="../backend/assets/uploads/<?php echo $product['avatar']; ?>">
            </div>
        </section>
    </div>

</div>
