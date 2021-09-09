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
                <a href="index.php">
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
                                <a class="dropdown-item" href="index.php?controller=user&action=profile">Tai Khoan</a>
                                <a class="dropdown-item" href="index.php?controller=user&action=logout">LOGOUT</a>
                              </div>
                        </div>
                    </div>

                    <?php
                        endif;
                    ?>
                    <a href="index.php?controller=cart&action=index">
                        <div class="cart" >
                            <i class="fas fa-cart-plus"></i>
                            CART
                        </div>
                    </a>
                </div>
                <form action="" method="get" class="menu-item">
                    <input type="text" name="search" placeholder="search"/>
                    <input type="hidden" name="controller" value="product"/>
                    <input type="hidden" name="action" value="search"/>
                    <button type="submit" class="btn" name="btn-search">Search</button>
                </form>
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
                <a href="index.php?controller=product&action=promotions">
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
                <a href="index.php?controller=product&action=promotions">
                    <div class="menu-item">
                        PROMOTIONS
                    </div>
                </a>
                <a href="index.php?controller=cart&action=index">
                    <div class="menu-item cart" >
                        <i class="fas fa-cart-plus"></i>
                        CART
                    </div>
                </a>
            </div>
            <a href="index.php" >
                <div class="logo" >
                    odbo
                </div>
            </a>
            <div class="right-menu">
                <form action="" method="get" class="search">
                    <input type="text" name="search" placeholder="search"/>
                    <i class="fas fa-search"></i>
                    <input type="hidden" name="controller" value="product"/>
                    <input type="hidden" name="action" value="search"/>
                </form>
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
                                <a class="dropdown-item" href="index.php?controller=user&action=profile">Tai Khoan</a>
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
<div class="alert alert-secondary" role="alert">
    <i class="fas fa-check-circle"
       style="display: block; font-size: 51px;margin-bottom: 10px;color: white "></i>
    <div class="alert-secondary-content">

    </div>
</div>
