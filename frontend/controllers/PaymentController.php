<?php
/**
 * Created by PhpStorm.
 * User: doanh ad
 * Date: 7/3/2021
 * Time: 3:38 PM
 */
require_once "models/Order.php";
require_once "models/OrderDetails.php";
?>
<?php
class PaymentController extends Controller{
    public function index()
    {
        $check_cart =0;
        if(isset($_SESSION['cart']))
        {
            if(!empty($_SESSION['cart']))
            {
                $check_cart=1;
            }
        }
        if(!$check_cart)
        {
            $_SESSION['success'] ="Gio hang trong";
            header('Location: index.php');
            exit();
        }
        if(isset($_POST['submit']))
        {
//            echo "<pre>";
//            print_r($_POST);
//            echo "</pre>";
            $user_id=NULL;
            $fullName = $_POST['fullname'];
            $address = $_POST['address'];
            $mobile = $_POST['mobile'];
            $email = $_POST['email'];
            $note = $_POST['note'];
            // 0 truc tuyen , 1 cod;
            $method = $_POST['method'];
            // validate......

            if(empty($this->error))
            {
                // luu vao bang oders
                $model_Order = new Order();
                $model_Order->user_id = $user_id;
                $model_Order->fullname = $fullName;
                $model_Order->address = $address;
                $model_Order->mobile = $mobile;
                $model_Order->email = $email;
                $model_Order->note = $note;
                $model_Order->payment_status = 0;
                $total=0;
                foreach ($_SESSION['cart'] AS $item)
                {
                    $total+= $item['price']*(100-$item['promotions'])/100*$item['quantity'];
                }
                $model_Order->price_total = $total;

                $order_id = $model_Order->insert();

                //var_dump($order_id);
                // luu vao bang oder_details
                foreach ($_SESSION['cart'] AS $key => $VALUE)
                {
                    $model_Order_details = new OrderDetails();
                    $model_Order_details->order_id =$order_id;
                    $model_Order_details->product_name = $VALUE['name'];
                    $model_Order_details->product_price = $VALUE['price']*(100-$VALUE['promotions'])/100;
                    $model_Order_details->quantity = $VALUE['quantity'];
                    $model_Order_details->insert();
                }

            }

        }
        $this->page_title ="Thanh Toan";
        $this->content = $this->render("views/payments/index.php");
        require_once "views/layouts/main.php";
    }

}
?>
