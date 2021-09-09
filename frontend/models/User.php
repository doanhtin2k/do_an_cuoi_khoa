<?php
/**
 * Created by PhpStorm.
 * User: doanh ad
 * Date: 6/7/2021
 * Time: 11:12 PM
 */
?>
<?php
class User extends Model{
    public $username;
    public $password;
    public $first_name;
    public $last_name;
    public $phone;
    public $address;
    public $email;
    public $facebook;
    public $avatar;
    public function register()
    {
        $sql ="INSERT INTO users(username,password,email ) 
              VALUES(:username,:password,:email)";
        $obj_insert = $this->connection->prepare($sql);
        $arr =[
            ':username'=>$this->username,
            ':password'=>$this->password,
            ':email'=>$this->email
        ];
        $is_insert = $obj_insert->execute($arr);
        return $is_insert;
    }
    public function getUsernameExist($username)
    {
        $sql ="SELECT * FROM users WHERE username=:username";
        $obj_select = $this->connection->prepare($sql);
        $arr=[
            ':username'=>$username
        ];
        $obj_select->execute($arr);
        $user = $obj_select->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
    public function updateUser($id)
    {
        $sql = "UPDATE users SET first_name=:first_name,last_name=:last_name,phone=:phone ,address=:address,email=:email,avatar=:avatar,facebook=:facebook  WHERE id=:id";
        $obj_update = $this->connection->prepare($sql);
        $arr=[
            ':first_name'=> $this->first_name,
            ':last_name'=>  $this->last_name,
            ':phone'=> $this->phone,
            ':address'=> $this->address,
            ':email'=> $this->email,
            ':avatar'=> $this->avatar,
            ':facebook'=> $this->facebook,
            ':id'=>$id,
        ];
        $is_update = $obj_update->execute($arr);
        return $is_update;
    }
    public function byId($id)
    {
        $sql ="SELECT * FROM users WHERE id=:id";
        $obj_select = $this->connection->prepare($sql);
        $arr=[
            ':id'=>$id
        ];
        $obj_select->execute($arr);
        $user = $obj_select->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
}

?>
