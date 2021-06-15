<?php
/**
 * Created by PhpStorm.
 * User: doanh ad
 * Date: 6/2/2021
 * Time: 2:56 PM
 */
require_once 'models/User.php';
?>
<?php
class UserController extends Controller {
    public function register()
    {
//        echo "<pre>";
//        print_r($_POST);
//        echo "</pre>";
        if(isset($_POST['submit']))
        {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $password_confirm = $_POST['password_confirm'];
            // validate form:
            // ko duoc de trong va password va password_confirm giong nhau
            if(empty($username) || empty($password) || empty($password_confirm))
            {
                $this->error = "Khong duoc de trong";
            }else if($password_confirm != $password){
                $this->error ="Password confirm chua dung";
            }

            if(empty($this->error))
            {
                $user_model = new User();
                //Xu ly user name chua ton tai thi moi dang ky
                $user = $user_model->getUsernameExist($username);
                if(!empty($user))
                {
                    $this->error ="Username da ton tai k the dang ky tai khoan";
                }else{
                    $user_model->username = $username;
                    //$user_model->password = $password;
                    // dung ham password_hash de ma hoa password do bao mat cao
                    // voi md5: cung 1 gtri password -> ma hoa thanh 1 chuoi giong nhau
                    $user_model->password = password_hash($password,PASSWORD_BCRYPT);


                    $is_register = $user_model->register();
                    //var_dump($is_register);
                    header("Location: index.php?controller=user&action=login");
                    exit();
                }


            }
        }
        // goi view , can tao 1 cai layout khac de hien thi
        // copy layout chinh , giu nguyen nhung file css , js, chi thay doi
        // phan body

        $this->content = $this->render("views/users/register.php");
        require_once "views/layouts/main_login.php";
    }
    public function login()
    {
        // xu ly submit form
//        echo "<pre>";
//        print_r($_POST);
//        echo "</pre>";
        if(isset($_POST['submit']))
        {
            $username= $_POST['username'];
            $password= $_POST['password'];
            // validate form:k duoc de trong
            if(empty($username) || empty($password))
            {
                $this->error ="Phai nhap cac truong";
            }
            // xu ly logic chi khi k co loi xay ra
            if(empty($this->error))
            {
                // xu ly dang nhap khi password duoc ma hoa bang ham password_hash
                // lay ra password trong csdl dua vao username
                // Su dung ham password_verify cua php de ktra cai password
                // da ma hoa nay tu password nhap tu form
                // lay mang user dua vao username
                $user_model = new User();
                $user = $user_model->getUsernameExist($username);
//                echo "<pre>";
//                print_r($user);
//                echo "</pre>";
                if(empty($user))
                {
                    $this->error = "Username k ton tai";
                }else{
                    $password_encrypt = $user['password'];
                    $is_verify_password = password_verify($password,$password_encrypt);
                    //              var_dump($is_verify_password);
                    if($is_verify_password)
                    {
                        $_SESSION['user'] = $user;
                        $_SESSION['success'] ='Dang nhap thanh cong';
                        header("Location: index.php?controller=category&action=index");
                        exit();
                    }else{
                        $this->error ="Sai tai khoan hoac mat khau";
                    }
                }
            }
        }
        $this->content = $this->render("views/users/login.php");
        // goi layout
        require_once "views/layouts/main_login.php";
    }
    public  function logout()
    {
        // xoa cac session lien quan den user chuyen huong ve trang login
        unset($_SESSION['user']);
        $_SESSION['success'] ="Dang xuat thanh cong";
        header("Location: index.php?controller=user&action=login");
        exit();
    }
}
?>
