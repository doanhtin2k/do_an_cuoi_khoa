<?php
/**
 * Created by PhpStorm.
 * User: doanh ad
 * Date: 6/7/2021
 * Time: 11:01 PM
 */
?>
<?php
class Controller{
    public $content;
    public $error;
    public $page_title;

//    public function __construct()
//    {
//        // de xu ly logic chan truy cap khi
//        // user chua dang nhap vao he thong, loai tru 2 chuc nang
//        // ma k can login van truy cap duoc la dang ky va dang nhap
//        if(!isset($_SESSION['user']) && $_GET['controller'] !='user'&& !in_array($_GET['action'],['register','login'])) {
//            $_SESSION['error'] = "Ban chua dang nhap";
//            header("Location: index.php?controller=user&action=login");
//            exit();
//
//        }
//    }
    public function render($file,$variables = [])
    {
        extract($variables);
        ob_start();
        require $file;
        $render_view = ob_get_clean();
        return $render_view;
    }
}

?>
