<?php
/**
 * Created by PhpStorm.
 * User: doanh ad
 * Date: 7/1/2021
 * Time: 12:56 AM
 */
require_once "models/Product.php";
?>
<?php
class CartController extends Controller{
    public function add()
    {
        $product_id = $_GET["product_id"];
        $model = new Product();
        $product = $model->getId($product_id);

        $cart =[
            'name'=>$product['title'],
            'price'=>$product['price'],
            'avatar'=>$product['avatar'],
            'quantity'=>1,
            'promotions'=>$product['promotions']
        ];
        if(!isset($_SESSION['cart']))
        {
            $_SESSION['cart'][$product_id] = $cart;
        }else{
            $is = array_key_exists($product_id,$_SESSION['cart']);
            if($is)
            {
                $_SESSION['cart'][$product_id]['quantity']++;
            }else{
                $_SESSION['cart'][$product_id] = $cart;
            }
        }
    }
    public function index(){

        if (isset($_POST['submit'])) {
            foreach ($_POST AS $product_id => $quantity) {
                if (is_numeric($quantity) && $quantity < 0 || empty($quantity)) {
                    $_SESSION['error'] = 'Số lượng phải lớn hơn 0';
                    header('Location: index.php?controller=cart&action=index');
                    exit();
                }
            }
            foreach ($_SESSION['cart'] AS $product_id => $cart) {
                $_SESSION['cart'][$product_id]['quantity'] = $_POST[$product_id];
            }

            $_SESSION['success'] = 'Cập nhật giỏ thành công';
        }
        $this->page_title ="Giỏ hàng của bạn";
        $this->content = $this->render("views/carts/index.php");
        require_once "views/layouts/main.php";
    }
    public function delete(){

        $id = $_GET['id'];
        unset($_SESSION['cart'][$id]);
        if(empty($_SESSION['cart']))
        {
            unset($_SESSION['cart']);
        }
        // session success
        //$url_redirect = $_SERVER['SCRIPT_NAME']."/gio-hang-cua-ban.html";
        header("location: index.php?controller=cart&action=index");
        exit();
    }
}

?>
