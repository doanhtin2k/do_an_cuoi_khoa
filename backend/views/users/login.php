<?php
/**
 * Created by PhpStorm.
 * User: doanh ad
 * Date: 6/2/2021
 * Time: 3:36 PM
 */
?>
<?php
//views/users/login.php
?>
<div class="container">
    <div class="card card-container">
        <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
        <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
        <p id="profile-name" class="profile-name-card"></p>
        <p style="color:red">
            <?php
                if(isset($_SESSION['error']))
                {
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                }
            ?>
        </p>
        <p class="message" style="color:red">
            <?php
                 echo $error;
            ?>
        </p>
        <form class="form-signin" method="post" >
            <input type="text" name="username" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
            <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="submit">Sign in</button>
        </form><!-- /form -->
        <p>
            Neu chua co tai khoan dang ky <a href="index.php?controller=user&action=register">day</a>
        </p>
    </div><!-- /card-container -->
</div><!-- /container -->