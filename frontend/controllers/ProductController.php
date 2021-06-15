<?php
/**
 * Created by PhpStorm.
 * User: doanh ad
 * Date: 6/15/2021
 * Time: 4:46 PM
 */
require_once "models/Product.php";
?>
<?php
class  ProductController extends Controller{
    public $category_name;
    public $product_detail;
    public function getUrl()
    {
        if(isset($_GET['category_name']))
        {
            $this->category_name = $_GET['category_name'];

        }else if(isset($_GET['product_detail']))
        {
            $this->product_detail = $_GET['product_detail'];
        }else{
            die("Trang bạn tìm không tồn tại");
        }

    }

    public function index()
    {
        $this->getUrl();
        $model_product = new Product();
        $products = $model_product->getCategoryName("$this->category_name");
        $this->page_title= $this->category_name;
        $this->content = $this->render("views/products/index.php",[
            'products'=>$products,
            "category_name"=>$this->category_name
        ]);
        require_once "views/layouts/main.php";
    }
}
?>
