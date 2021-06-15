<?php
/**
 * Created by PhpStorm.
 * User: doanh ad
 * Date: 6/2/2021
 * Time: 3:37 PM
 */
?>
<?php
//views/users/register.php
?>
<form action="" method="post" class="container">
    <h2>Form dang ky tai khoan</h2>
    <div class="form-group">
        <label for="username">Nhap username:</label>
        <input type="text" name="username" id="username"
               class="form-control" value=""/>
    </div>
    <div class="form-group">
        <label for="password">Nhap password:</label>
        <input type="password" name="password" id="password"
               class="form-control" value="" />
    </div>
    <div class="form-group">
        <label for="password_confirm">Nhap lai password:</label>
        <input type="password" name="password_confirm" id="password_confirm"
               class="form-control" value="" />
    </div>
    <div class="form-group">
        <input type="submit" name="submit" class="btn btn-primary"
               class="form-control" value="Dang Ky" />
        <p>
            Neu da co tai khoan , dang nhao tai <a href="index.php?controller=user&action=login">day</a>
        </p>
    </div>
</form>

