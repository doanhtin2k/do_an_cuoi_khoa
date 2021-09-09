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
    public $product_id;

    public function index()
    {
        if(isset($_GET['category_name']))
        {
            $this->category_name = $_GET['category_name'];

        }else{
            die("Trang bạn tìm không tồn tại");
        }
        $model_product = new Product();
        $products = $model_product->getCategoryName("$this->category_name");
        $this->page_title= $this->category_name;
        $this->content = $this->render("views/products/index.php",[
            'products'=>$products,
            "category_name"=>$this->category_name
        ]);
        require_once "views/layouts/main.php";
    }
    public function detail()
    {
        if(isset($_GET['product_id']))
        {
            $this->product_id = $_GET['product_id'];
        }else{
            die("Trang bạn tìm không tồn tại");
        }
        $model_product = new Product();
        $product = $model_product->getId($this->product_id);
        $size = explode(',',$product['size']);
        $this->page_title = $product['title'];
        $this->content = $this->render("views/products/detail.php",[
            "product"=>$product,
            "size"=>$size
        ]);

        require_once "views/layouts/main.php";
    }
    public function promotions()
    {
        $model_product = new Product();
        $products = $model_product->getPromotion();
        $this->page_title = "Khuyến mãi";
        $this->content = $this->render("views/products/promotions.php",[
            "products"=>$products,
        ]);

        require_once "views/layouts/main.php";
    }
    public function search()
    {
//        echo "<pre>";
//        print_r($_GET);
//        echo "</pre>";

        $search = $_GET['search'];
        $model = new Product();
        $products = $model->getProductSearch($search);
//        echo "<pre>";
//        print_r($products);
//        echo "</pre>";
        $this->content = $this->render("views/products/search.php",[
            "products"=>$products
        ]);
        require_once "views/layouts/main.php";
    }
}
?>
