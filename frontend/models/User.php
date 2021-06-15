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
    public $email;
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


}

?>
