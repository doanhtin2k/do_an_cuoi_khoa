<?php
/**
 * Created by PhpStorm.
 * User: doanh ad
 * Date: 6/2/2021
 * Time: 2:47 PM
 */

?>
<?php
class Controller{
    public $content;
    public $error;
    public $page_title;

    public function __construct()
    {
        // de xu ly logic chan truy cap khi
        // user chua dang nhap vao he thong, loai tru 2 chuc nang
        // ma k can login van truy cap duoc la dang ky va dang nhap
        if(isset($_GET['action'])&&isset($_GET['controller'])){
             if($this->checkLogin()==false && !in_array($_GET['action'],['register','login'])) {
                if(isset($_GET['action'])&&isset($_GET['controller'])) {

                }

                $_SESSION['error'] = "Ban chua dang nhap";
                header("Location: index.php?controller=user&action=login");
                exit();

            }
            // chua logout thi k vao duoc 2 trang login va register
            if( $this->checkLogout()==false && $_GET['controller'] =='user'&& in_array($_GET['action'],['register','login']))
            {
                header("Location: index.php?controller=category&action=index");
                exit();
            }

        }else{
            if($this->checkLogin()==false)
            {
                $_SESSION['error'] = "Ban chua dang nhap";
                header("Location: index.php?controller=user&action=login");
                exit();
            }
        }
    }
    public function render($file,$variables = [])
    {
        extract($variables);
        ob_start();
        require $file;
        $render_view = ob_get_clean();
        return $render_view;
    }
    public function  checkLogin()
    {
        if(isset($_SESSION['admin']))
        {
            return true;
        }
        return false;
    }
    public function  checkLogout()
    {
        if(isset($_SESSION['admin']))
        {
            return false;
        }
        return true;
    }
}

?>
