<?php
/**
 * Created by PhpStorm.
 * User: doanh ad
 * Date: 6/7/2021
 * Time: 11:13 PM
 */
require_once "models/User.php";
?>
<?php
class UserController extends Controller
{
    public function login()
    {
        if(isset($_POST['submit']))
        {
            $username = $_POST['username'];
            $password = $_POST['password'];
            if(empty($username) || empty($password))
            {
                $this->error = "Khong duoc de trong cac truong";
            }

            if(empty($this->error))
            {
                $model_user = new User();
                $user = $model_user->getUsernameExist($username);
                if(empty($user))
                {
                    $this->error = "Username k ton tai";
                }else{
                   $password_encrypt = $user['password'];
                   $is_verify_password = password_verify($password,$password_encrypt);

                   if($is_verify_password)
                   {
                       $_SESSION['user'] = $user;
                       $_SESSION['success'] = "Dang nhap thanh cong";
                       header('Location: index.php?controller=home&action=index');
                       exit();
                   }else{
                       $this->error = "Sai tai khoan hoac mat khau";
                   }
                }
            }

        }
        $this->page_title ="login";
        $this->content = $this->render('views/users/login.php');
        require_once "views/layouts/main.php";
    }

    public function register()
    {
//        echo "<pre>";
//        print_r($_POST);
//        echo "</pre>";
        $error_email ='';
        $error_username ='';
        $error_password ='';
        $error_cofirm_password ='';
        if(isset($_POST['submit']))
        {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $email = $_POST['email'];
            if(empty($username))
            {
                $this->error ="Khong duoc de trong";
                $error_username ="Khong duoc de trong";
            }else if(empty($email))
            {
                $this->error ="Khong duoc de trong";
                $error_email ="Khong duoc de trong";
            }else if(empty($password))
            {
                $this->error ="Khong duoc de trong";
                $error_password ="Khong duoc de trong";
            }elseif(empty($confirm_password))
            {
                $this->error ="Khong duoc de trong";
                $error_cofirm_password ="Khong duoc de trong";
            }elseif($confirm_password !=$password)
            {
                $this->error ="Password confirm chua dung";
                $error_cofirm_password ="Password confirm chua dung";
            }


            if(empty($this->error))
            {
                $model_user = new User();
                $user = $model_user->getUsernameExist($username);
                if(!empty($user))
                {
                    $this->error = "User da ton tai trong he thong";
                    $error_username = "User da ton tai trong he thong";
                }else{
                    $model_user->username = $username;
                    $model_user->password = password_hash($password,PASSWORD_BCRYPT);
                    $is_register = $model_user->register();
                    if($is_register)
                    {
                        //$_SESSION['success'] = "Dang ky thanh cong";
                        header("Location: index.php?controller=user&action=login");
                        exit();
                    }

                }
            }
        }
        $this->page_title ="register";
        $this->content = $this->render('views/users/register.php',[
            'error_email'=>$error_email,
            'error_password'=>$error_password,
            'error_cofirm_password'=>$error_cofirm_password,
            'error_username'=>$error_username

        ]);
        require_once "views/layouts/main.php";
    }

    public function logout()
    {
        unset($_SESSION['user']);
        header('Location: index.php?controller=home&action=index');
        exit();
    }
}


?>
