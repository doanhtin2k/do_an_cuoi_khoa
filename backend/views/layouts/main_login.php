<?php
/**
 * Created by PhpStorm.
 * User: doanh ad
 * Date: 6/2/2021
 * Time: 3:32 PM
 */
?>
<?php
/**
 * Created by PhpStorm.
 * User: doanh ad
 * Date: 6/1/2021
 * Time: 7:26 PM
 * File layout danh cho cac doi tuong chua dang nhap vao he thong
 */

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php $this->page_title; ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/AdminLTE.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="assets/css/_all-skins.min.css">
    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">

<section class="content">
    <!--    Hien thi loi-->
    <h3 style="color:red"><?php echo $this->error; ?></h3>
    <h3 style="color:green">
        <?
        if(isset($_SESSION['success']))
        {
            echo $_SESSION['success'];
            unset($_SESSION['success']);
        }
        ?>
    </h3>
    <!--            Nội dung hiển thị ở đây-->
    <?php echo $this->content; ?>
</section>

<!-- jQuery 3 -->
<script src="assets/js/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="assets/js/jquery-ui.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/js/adminlte.min.js"></script>
<!--CKEditor -->
<script src="assets/ckeditor/ckeditor.js"></script>
<!--My SCRIPT-->
<script src="assets/js/script.js"></script>
</body>
</html>


