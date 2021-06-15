<?php
/**
 * Created by PhpStorm.
 * User: doanh ad
 * Date: 6/14/2021
 * Time: 7:31 PM
 */
?>

    <div class="container">
        <?php
        foreach ($categories AS $value):
        ?>
        <div class="category-item">
            <a href="index.php?controller=product&action=index&category_name=<?php echo $value['name'];?>" class="category-item-main row">
                <div class="content col-lg-4 col-md-6 col-sm-6 col-12">
                    <p>
                        <?php
                        echo $value['description'];
                        ?>
                    </p>
                </div>
                <img src="../backend/assets/uploads/<?php echo $value['avatar']; ?>"
                     class="image-content col-lg-8 col-md-6 col-sm-6 col-12"/>
            </a>
        </div>
        <?php
        endforeach;
        ?>
    </div>
