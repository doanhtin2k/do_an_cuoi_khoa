<?php
/**
 * Created by PhpStorm.
 * User: doanh ad
 * Date: 6/12/2021
 * Time: 11:24 PM
 */
?>
<?php
class Category extends Model{
    public $id;
    public $name;
    public $title;
    public $avatar;
    public $description;
    public $status;
    public $created_at;
    public $updated_at;

    public function getAll()
    {
        $sql = "SELECT * FROM categories";
        $obj = $this->connection->prepare($sql);
        $obj->execute();
        $categories = $obj->fetchAll(PDO::FETCH_ASSOC);
        return $categories;
    }
}


?>
