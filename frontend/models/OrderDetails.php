<?php
/**
 * Created by PhpStorm.
 * User: doanh ad
 * Date: 7/5/2021
 * Time: 6:07 PM
 */
?>
<?php
class OrderDetails extends Model{
    public $order_id ;
    public $product_name;
    public $product_price;
    public $quantity;
    public function insert()
    {
        $sql = "INSERT INTO order_details(order_id,product_name,product_price,quantity)
VALUES(:order_id,:product_name,:product_price,:quantity)";
        $model = $this->connection->prepare($sql);
        $arr =[
            ':order_id'=>$this->order_id,
            ':product_name'=>$this->product_name,
            ':product_price'=>$this->product_price,
            ':quantity'=>$this->quantity
        ];
        $is = $model->execute($arr);
        return $is;
    }



}
?>
