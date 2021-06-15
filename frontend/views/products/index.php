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
                    <p class="card-price">
                        <?php
                        echo number_format($product['price']).'đ';
                        ?>
                    </p>
                    <p class="card-title">
                        <?php
                        echo $product['title'];
                        ?>
                    </p>
                </div>
                <div class="card-footer">
                    <a class="buy" href="#">Mua ngay</a>
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
