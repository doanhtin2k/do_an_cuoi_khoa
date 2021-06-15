<?php
/**
 * Created by PhpStorm.
 * User: doanh ad
 * Date: 6/14/2021
 * Time: 7:34 PM
 */
require_once "models/Category.php";
?>
<?php
class CategoryController extends Controller
{
    public function index()
    {
        $model_category = new Category();
        $categories = $model_category->getAll();


        $this->content = $this->render("views/categories/index.php",[
            'categories'=>$categories
        ]);
        require_once "views/layouts/main.php";
    }
}

?>