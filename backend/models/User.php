<?php
/**
 * Created by PhpStorm.
 * User: doanh ad
 * Date: 6/2/2021
 * Time: 3:12 PM
 */
?>
<?php
class User extends Model {
    public $username;
    public $password;
    public function register()
    {
        $sql ="INSERT INTO admins(username,password ) 
              VALUES(:username,:password)";
        $obj_insert = $this->connection->prepare($sql);
        $arr =[
            ':username'=>$this->username,
            ':password'=>$this->password
        ];
        $is_insert = $obj_insert->execute($arr);
        return $is_insert;
    }
    public function getUsernameExist($username)
    {
        $sql ="SELECT * FROM admins WHERE username=:username";
        $obj_select = $this->connection->prepare($sql);
        $arr=[
            ':username'=>$username
        ];
        $obj_select->execute($arr);
        $user = $obj_select->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
}