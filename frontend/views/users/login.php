<?php
/**
 * Created by PhpStorm.
 * User: doanh ad
 * Date: 6/7/2021
 * Time: 11:10 PM
 */
?>
    <div class="container">
        <div class="position">
            <p>
                <a href="index.php">Home</a>
                &nbsp;>&nbsp;  Sign in
            </p>
        </div>
        <div class="main-bottom">
            <div class="row">
                <div class="form-login col-md-6 col-sm-6 col-12">
                    <div class="form-login-content">
                        <h3>WELCOME</h3>
                        <p>Vui lòng điền thông tin đăng nhập.</p>
                        <form action="" method="post">

                            <div class="form-group">
                                <input type="text" class="form-control" id="exampleInputUsername"
                                       aria-describedby="emailHelp" placeholder="Enter username"
                                       name="username"
                                        value="<?php
                                        if(isset($_POST['username']))
                                        {
                                            echo $_POST['username'];
                                        }
                                        ?>">
                            </div>
                            <div class="form-group">
                                <input type="password" name='password' class="form-control" id="exampleInputPassword" placeholder="Password">
                            </div>
<!--                            <div class="form-check">-->
<!--                                <input type="checkbox" name="ghi-nho" class="form-check-input" id="exampleCheck1">-->
<!--                                <label class="form-check-label" for="exampleCheck1">Ghi nhớ mật khẩu-->
<!--                                </label>-->
<!--                            </div>-->
<!-- hien thi loi-->
                            <p style="color: white">
                                <?php
                                if(!empty($error))
                                {
                                    echo "*".$error;
                                }
                                ?>
                            </p>
                            <div class="row submit">
                                <button class="btn-submit" type="submit"
                                        name="submit">
                                    Đăng nhập
                                </button>
                                <a class="forget-pasword" href="#">Quên mật khẩu</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="bg-img login-facebook col-md-6 col-sm-6 col-12"
                     style="background-image: url('assets/images/background_login.jpg')">
                    <div class="bg-opacity">
                        <div class="login-facebook-content">
                            <h3>SIGN IN WITH</h3>
                            <p>Login with</p>
                            <div class='row login-facebook-or-resgister-wb'>
                                <a  class="btn-facebook" href="#">
                                    <i class="fab fa-facebook-f" style="font-size: 23px; margin-right: 5px"></i>
                                    <b>FACEBOOK</b>
                                </a>
                                <a  class = "btn-register" href="index.php?controller=user&action=register">
                                    <!-- icon cay bút -->
                                    Đăng ký qua trang web
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
