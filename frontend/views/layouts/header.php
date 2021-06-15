<?php
/**
 * Created by PhpStorm.
 * User: doanh ad
 * Date: 6/7/2021
 * Time: 11:19 PM
 */
?>
<!--  NAV MOBILE -->
<div class="nav-mobile">
    <div class="container">
        <div class="menu-mb-wrap">
            <div class="row">
                <a href="">
                    <div class="logo">
                        odbo
                    </div>
                </a>
                <div class="menu-mb">
                    <i class="fas fa-bars"></i>
                    <span>MENU</span>
                </div>
            </div>
            <div class="menu-mb-content">
                <div class="item-top">
                    <a href="#" >
                        <div class="login">
                            <i class="fas fa-unlock"></i>
                            LOGIN
                        </div>
                    </a>
                    <!-- <div style="margin-left: 15px;">
                        <div class="dropdown show">
                              <a class="btn btn-secondary dropdown-toggle"  role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Doanhad123
                              </a>

                              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#">Tai Khoan</a>
                                <a class="dropdown-item" href="#">LOGOUT</a>
                              </div>
                        </div>
                    </div> -->
                    <a href="#">
                        <div class="cart" >
                            <i class="fas fa-cart-plus"></i>
                            CART
                        </div>
                    </a>
                </div>
                <div class="menu-item">
                    <input type="text" name="search" placeholder="search"/>
                    <button class="btn" name="btn-search">Search</button>
                </div>
                <a href="index.php">
                    <div class="menu-item">
                        HOME
                    </div>
                </a>
                <a href="index.php?controller=category&action=index">
                    <div class="menu-item">
                        PRODUCTS
                    </div>
                </a>
                <a href="products.html">
                    <div class="menu-item">
                        PROMOTIONS
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- END NAV MOBILE -->

<!-- TOP NAV -->
<div class="nav">
    <div class="container">
        <div class="menu-wrap">
            <div class="menu">
                <a href="index.php">
                    <div class="menu-item">
                        HOME
                    </div>
                </a>
                <a href="index.php?controller=category&action=index">
                    <div class="menu-item">
                        PRODUCTS
                    </div>
                </a>
                <a href="promotions.html">
                    <div class="menu-item">
                        PROMOTIONS
                    </div>
                </a>
                <a href="#">
                    <div class="menu-item cart" >
                        <i class="fas fa-cart-plus"></i>
                        CART
                    </div>
                </a>
            </div>
            <a href="#" >
                <div class="logo" >
                    odbo
                </div>
            </a>
            <div class="right-menu">
                <div class="search">
                    <input type="text" name="search" placeholder="search"/>
                    <i class="fas fa-search"></i>
                </div>
                <?php
                if(!isset($_SESSION['user'])):
                ?>
                <a href="index.php?controller=user&action=login" >
                    <div class="login">
                        <i class="fas fa-unlock"></i>
                        LOGIN
                    </div>
                </a>
                <?php
                endif;
                ?>
                <?php
                if(isset($_SESSION['user'])):
                ?>
                     <div style="margin-left: 15px;">
                        <div class="dropdown show">
                              <a class="btn btn-secondary dropdown-toggle"  role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <?php
                                  echo $_SESSION['user']['username'];
                                  ?>
                              </a>

                              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#">Tai Khoan</a>
                                <a class="dropdown-item" href="index.php?controller=user&action=logout">LOGOUT</a>
                              </div>
                        </div>
                    </div>
                <?php
                endif;
                ?>
            </div>
        </div>
    </div>
</div>
<!-- END TOP NAV -->
