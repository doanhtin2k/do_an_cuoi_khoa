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
                $this->error = "Khong duoc de trong Username hoac Password";
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
        $this->page_title ="Đăng nhập";
        $this->content = $this->render('views/users/login.php',[
            "error"=>$this->error
        ]);
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
        $this->page_title ="Đăng ký";
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
        unset( $_SESSION['cart']);

        header('Location: index.php?controller=home&action=index');
        exit();
    }
    public function profile()
    {

        if (isset($_POST['submit'])) {
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $email = $_POST['email'];
            $facebook = $_POST['facebook'];
            if ($_FILES['avatar']['error'] == 0) {
                //validate khi có file upload lên thì bắt buộc phải là ảnh và dung lượng không quá 2 Mb
                $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
                $extension = strtolower($extension);
                $arr_extension = ['jpg', 'jpeg', 'png', 'gif'];

                $file_size_mb = $_FILES['avatar']['size'] / 1024 / 1024;
                //làm tròn theo đơn vị thập phân
                $file_size_mb = round($file_size_mb, 2);

                if (!in_array($extension, $arr_extension)) {
                    $this->error = 'Cần upload file định dạng ảnh';
                } else if ($file_size_mb > 2) {
                    $this->error = 'File upload không được quá 2MB';
                }
            }

            //nếu ko có lỗi thì tiến hành save dữ liệu
            if (empty($this->error)) {
                $filename = $_SESSION['user']['avatar'];
                //xử lý upload file nếu có
                if ($_FILES['avatar']['error'] == 0) {
                    $dir_uploads = '../backend/assets/uploads';
                    if (!file_exists($dir_uploads)) {
                        mkdir($dir_uploads);
                    }
                    //tạo tên file theo 1 chuỗi ngẫu nhiên để tránh upload file trùng lặp
                    $filename = time() . '-product-' . $_FILES['avatar']['name'];
                    move_uploaded_file($_FILES['avatar']['tmp_name'], $dir_uploads . '/' . $filename);
                }
                $user = new User();
                //var_dump($user);
                $user->first_name = $first_name;
                $user->last_name = $last_name;
                $user->phone = $phone;
                $user->email = $email;
                $user->facebook = $facebook;
                $user->address = $address;
                $user->avatar = $filename;
                $is_update = $user->updateUser($_SESSION['user']['id']);
                if ($is_update) {
                    $_SESSION['success'] = 'Update thông tin cá nhân thành công';
                } else {
                    $_SESSION['error'] = 'Update thông tin cá nhân thành công';
                }
            }
            $user_new = new User();
            $_SESSION['user'] = $user_new->byId($_SESSION['user']['id']);
        }
        $this->content = $this->render("views/users/profile.php");
        require_once "views/layouts/main.php";
    }
}


?>
