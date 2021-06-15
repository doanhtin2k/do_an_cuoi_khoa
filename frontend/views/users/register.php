<?php
/**
 * Created by PhpStorm.
 * User: doanh ad
 * Date: 6/7/2021
 * Time: 11:11 PM
 */
?>
    <div class="container">
        <div class="position">
            <p>
                <a href="index.html">Home</a>
                &nbsp;>&nbsp;  Sign in
            </p>
        </div>
        <div class="boxtext">
            <fieldset>
                <legend>MEMBER REGISTER</legend>
            </fieldset>
        </div>
        <div class="form-register">
            <form action="" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1"><b>Email address</b>
                    </label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value=""/>
                    <small  class="form-text text-muted color-red" >
                        <?php
                         if(!empty($error_email))
                         {
                             echo $error_email;
                         }
                        ?>
                    </small>
                </div>
                <div class="form-group">
                    <label for="username"><b>Username</b>
                    </label>
                    <input type="text" name='username' class="form-control" id="username" placeholder="Username" value=""/>
                    <small  class="form-text text-muted color-red" >
                        <?php
                        if(!empty($error_username))
                        {
                            echo $error_username;
                        }
                        ?>
                    </small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1"><b>Password</b>
                    </label>
                    <input type="password" name='password' class="form-control" id="exampleInputPassword1" placeholder="Password">
                    <small class="form-text text-muted color-red">
                        <?php
                        if(!empty($error_password))
                        {
                            echo $error_password;
                        }
                        ?>
                    </small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword2"><b>Confirm Password</b></label>
                    <input type="password" name='confirm_password' class="form-control" id="exampleInputPassword2" placeholder="Password">
                    <small class="form-text text-muted color-red">
                        <?php
                        if(!empty($error_cofirm_password))
                        {
                            echo $error_cofirm_password;
                        }
                        ?>
                    </small>
                </div>
                <div class="form-group btn-register-group">
                    <button type="submit" name="submit" class="submit-register btn btn-primary">Submit</button>
                    <input type="reset"  class ='btn btn-primary' name="reset" value="Reset"/>
                </div>
            </form>
        </div>
    </div>
