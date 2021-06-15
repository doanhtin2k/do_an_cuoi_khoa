<?php
/**
 * Created by PhpStorm.
 * User: doanh ad
 * Date: 6/11/2021
 * Time: 10:18 PM
 */
require_once "models/Category.php";
require_once  "models/Product.php";
?>
<?php
class HomeController extends Controller
{
    public function index()
    {
        $model_category = new Category();
        // danh muc
        $categories = $model_category->getAll();
//        echo "<pre>";
//        print_r($categories);
//        echo "</pre>";

        $model_product = new Product();
        $products = $model_product->getAll();

        $this->content = $this->render('views/homes/index.php',[
            'categories'=>$categories,
            'products'=>$products
        ]);
        require_once "views/layouts/main.php";
    }
}

?>
