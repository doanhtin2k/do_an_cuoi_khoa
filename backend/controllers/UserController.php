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
                        if($user['role']==1)
                        {
                        $_SESSION['admin'] = $user;
                        $_SESSION['success'] ='Dang nhap thanh cong';
                        header("Location: index.php?controller=category&action=index");
                        exit();
                        }else{
                            $this->error ="Tai khoan nay chua uoc cap quyen su dung chuc nang backend";
                        }
                    }else{
                        $this->error ="Sai tai khoan hoac mat khau";
                    }
                }
            }
        }
        $this->content = $this->render("views/users/login.php",[
            'error'=> $this->error,
        ]);
        // goi layout
        require_once "views/layouts/main_login.php";
    }
    public  function logout()
    {
        // xoa cac session lien quan den user chuyen huong ve trang login
        unset($_SESSION['admin']);
        $_SESSION['success'] ="Dang xuat thanh cong";
        header("Location: index.php?controller=user&action=login");
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
                //validate khi c?? file upload l??n th?? b???t bu???c ph???i l?? ???nh v?? dung l?????ng kh??ng qu?? 2 Mb
                $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
                $extension = strtolower($extension);
                $arr_extension = ['jpg', 'jpeg', 'png', 'gif'];

                $file_size_mb = $_FILES['avatar']['size'] / 1024 / 1024;
                //l??m tr??n theo ????n v??? th???p ph??n
                $file_size_mb = round($file_size_mb, 2);

                if (!in_array($extension, $arr_extension)) {
                    $this->error = 'C???n upload file ?????nh d???ng ???nh';
                } else if ($file_size_mb > 2) {
                    $this->error = 'File upload kh??ng ???????c qu?? 2MB';
                }
            }

            //n???u ko c?? l???i th?? ti???n h??nh save d??? li???u
            if (empty($this->error)) {
                $filename = $_SESSION['admin']['avatar'];
                //x??? l?? upload file n???u c??
                if ($_FILES['avatar']['error'] == 0) {
                    $dir_uploads = 'assets/uploads';
                    if (!file_exists($dir_uploads)) {
                        mkdir($dir_uploads);
                    }
                    //t???o t??n file theo 1 chu???i ng???u nhi??n ????? tr??nh upload file tr??ng l???p
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
                $is_update = $user->updateUser($_SESSION['admin']['id']);
                if ($is_update) {
                    $_SESSION['success'] = 'Update th??ng tin c?? nh??n th??nh c??ng';
                } else {
                    $_SESSION['error'] = 'Update th??ng tin c?? nh??n th??nh c??ng';
                }
            }
            $user_new = new User();
            $_SESSION['admin'] = $user_new->byId($_SESSION['admin']['id']);
        }
        $this->content = $this->render("views/users/profile.php");
        require_once "views/layouts/main.php";
    }

}
?>
