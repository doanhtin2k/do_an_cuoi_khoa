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
<form action="" method="POST" class="container">
    <h2>Form dang nhap</h2>
    <div class="form-group">
        <label for="username">Nhap username</label>
        <input type="text" name="username" id="username" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="password">Nhap password</label>
        <input type="password" name="password" id="password" class="form-control"/>
    </div>
    <div class="form-group">
        <input type="submit" name="submit" value="Dang Nhap" class="btn btn-primary"/>
    </div>
    <p>
        Neu chua co tai khoan dang ky <a href="index.php?controller=user&action=register">day</a>
    </p>
</form>

