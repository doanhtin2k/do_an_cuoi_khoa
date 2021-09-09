<?php
/**
 * Created by PhpStorm.
 * User: doanh ad
 * Date: 6/11/2021
 * Time: 10:22 PM
 */
?>
<?php
//echo "<pre>";
//print_r($products);
//echo "</pre>";
//foreach ($categories AS $key=>$value):
//echo $value['avatar'] ;
//endforeach;
?>
    <div class="container">

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <?php
                foreach ($categories AS $key=>$value):
                ?>
                <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $key; ?>" class="
                <?php
                if($key==0){
                    echo "active";
                }else{
                    echo "";
                }
                ?>
                ">
                </li>
                <?php
                endforeach;
                ?>
            </ol>
            <div class="carousel-inner">
                <?php
                foreach ($categories AS $key=>$category):
                ?>
                <div class="carousel-item <?php if($key==0){echo 'active';} ?>">
                    <a href="index.php?controller=product&action=index&category_name=<?php echo $category['name'];?>">
                        <img class="d-block w-100 home-carousel-img"
                             src="../backend/assets/uploads/<?php echo $category['avatar']?>"
                             alt="First slide"
                                >
                    </a>
                </div>
                <?php
                endforeach;
                ?>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <!-- boxtext -->
        <div class="boxtext">
            <fieldset>
                <legend>NEW PRODUCT</legend>
            </fieldset>
        </div>
        <!-- END boxtext -->

        <!-- PRODUCT CATEGORY -->
        <div class="product card-group">
            <?php
            foreach ($products AS $key=>$product):
                if($key>10)
                {
                    break;
                }
                ?>
                <div class="card col-lg-3 col-md-4 col-sm-4 col-6">
                    <img class="card-img-top"
                         src="../backend/assets/uploads/<?php echo $product['avatar']?>"
                         alt="Card image cap">
                    <div class="card-body">
                        <div class="sale-and-new">
                            <img src="assets/images/new.png" class="card-new"/>
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

        <!-- MEMEBER -->
        <div class="member">
            <div class=" bg-img"
                 style="background-image: url('assets/images/bg_member.jpg')" >
                <div class="member-content" >
                    <h3>MEMBER</h3>
                    <p class="content">
                        Hãy để mọi phong cách sống của bạn trở nên đặc biệt với nhiều ưu đãi từ chúng tôi. Sẵn sàng phục vụ mọi nhu cầu với các đặc quyền và giảm giá đặc biệt
                        điều đó tiếp cận lối sống của bạn Vẻ đẹp và giá trị đang chờ bạn. Chỉ dành cho Thành viên.
                    </p>
                    <div class="content-bottom">
                        <a class="sign-in-now" href="index.php?controller=user&action=register">
                            Sign in Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MEMEBER -->
    </div>
