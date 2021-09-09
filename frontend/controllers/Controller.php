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

    public function __construct()
    {
        if(isset($_GET['action'])&&isset($_GET['controller']))
        {
            if($this->checkLogin()==false && in_array($_GET['action'],['profile'])) {
                $_SESSION['error'] = "Ban chua dang nhap";
                header("Location: index.php?controller=user&action=login");
                exit();

            }
            // chua logout thi k vao duoc 2 trang login va register
            if( $this->checkLogout()==false && $_GET['controller'] =='user'&& in_array($_GET['action'],['register','login']))
            {
                header("Location: index.php?controller=home&action=index");
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
        if(isset($_SESSION['user']))
        {
            return true;
        }
        return false;
    }
    public function  checkLogout()
    {
        if(isset($_SESSION['user']))
        {
            return false;
        }
        return true;
    }
}

?>
