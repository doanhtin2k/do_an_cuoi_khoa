<?php
/**
 * Created by PhpStorm.
 * User: doanh ad
 * Date: 6/12/2021
 * Time: 11:25 PM
 */
?>
<?php
class Product extends Model{


    public function getAll()
    {
        $sql = "SELECT products.*, categories.name AS category_name FROM products 
                        INNER JOIN categories ON categories.id = products.category_id
                        ORDER BY products.created_at DESC";
        $obj = $this->connection->prepare($sql);
        $obj->execute();
        $products = $obj->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }
    // lay san pham co cung danh muc
    public function getCategoryName($category_name)
    {
        $sql = "SELECT products.*, categories.name AS category_name FROM products 
                        INNER JOIN categories ON categories.id = products.category_id
                        WHERE categories.name = :category_name 
                        ORDER BY products.created_at DESC";
        $obj = $this->connection->prepare($sql);
        $arr =[
            ":category_name"=>$category_name
        ];
        $obj->execute($arr);
        $products = $obj->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }
}

?>
