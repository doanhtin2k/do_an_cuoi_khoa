<?php
/**
 * Created by PhpStorm.
 * User: doanh ad
 * Date: 7/5/2021
 * Time: 6:05 PM
 */
?>
<?php
class Order extends Model{
    public $fullname;
    public $email;
    public $user_id;
    public $address;
    public $mobile;
    public $note;
    public $price_total;
    public $payment_status;

    public function insert()
    {
        $sql = "INSERT INTO orders(user_id,fullname,address,mobile,email,note,price_total,payment_status)
VALUES(:user_id,:fullname,:address,:mobile,:email,:note,:price_total,:payment_status) ";
        $obj = $this->connection->prepare($sql);
        $arr=[
            ':user_id'=>$this->user_id,
            ':fullname'=>$this->fullname,
            ':address'=>$this->address,
            ':mobile'=>$this->mobile,
            ':email'=>$this->email,
            ':note'=>$this->note,
            ':price_total'=>$this->price_total,
            ':payment_status'=>$this->payment_status
        ];
        $obj->execute($arr);
        return $this->connection->lastInsertId();
        //return $is;
    }

}

?>
