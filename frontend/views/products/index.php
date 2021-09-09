<?php
/**
 * Created by PhpStorm.
 * User: doanh ad
 * Date: 6/15/2021
 * Time: 4:48 PM
 */

//echo $category_name;
//echo "<pre>";
//print_r($products);
//echo "</pre>";
?>
<div class="container">
    <div class="position">
        <p>
            <a href="index.php">Home</a>
            &nbsp;>&nbsp;
            <a href="index.php?controller=category&action=index">Products</a>
            &nbsp;>&nbsp;
            <?php
             echo $category_name;
            ?>
        </p>
    </div>
    <div class="boxtext">
        <fieldset>
            <legend>
                <?php
                echo strtoupper($category_name);
                ?>
            </legend>
        </fieldset>
    </div>

    <!-- PRODUCT CATEGORY -->
    <div class="product card-group">
        <?php
        foreach ($products AS $key=>$product):
            ?>
            <div class="card col-lg-3 col-md-4 col-sm-4 col-6">
                <img class="card-img-top"
                     src="../backend/assets/uploads/<?php echo $product['avatar']?>"
                     alt="Card image cap">
                <div class="card-body">
                    <div class="sale-and-new">
                        <?php
                        if($product['promotions']!=0):
                            ?>
                            <img src="assets/images/icon-sale.png" class="sale"/>
                        <?php
                        endif;
                        ?>
                    </div>
                    <p class="card-last-price">
                        <?php
                        $last_price = $product['price']*(100-$product['promotions'])/100;
                        echo number_format($last_price).'đ';
                        ?>
                    </p>
                    <?php
                    if($product['promotions']!=0):
                        ?>
                        <p class="card-price">
                            <del style="color:#AAAAAA;">
                                <?php
                                echo number_format($product['price']).'đ';
                                ?>
                            </del>
                            <span style="padding:10px;color:red">
                                <?php
                                echo "giảm ".$product['promotions'].'%';
                                ?>
                            </span>
                        </p>
                    <?php
                    endif;
                    ?>
                    <p class="card-title">
                        <?php
                        echo $product['title'];
                        ?>
                    </p>
                </div>
                <div class="card-footer">
                    <a class="detail-product" href="index.php?controller=product&action=detail&product_id=<?php echo $product['id'];?>">Xem chi tiết </a>
                    <div class="add-to-cart" data-id="<?php echo $product['id']; ?>">thêm vào giỏ hàng</div>
                </div>
            </div>
        <?php
        endforeach;
        ?>
    </div>
    <!-- END PRODUCT CATEGORY -->

    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav>
</div>
