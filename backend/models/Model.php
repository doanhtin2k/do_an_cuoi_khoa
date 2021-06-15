<?php
/**
 * Created by PhpStorm.
 * User: doanh ad
 * Date: 6/2/2021
 * Time: 2:58 PM
 */
?>
<?php
class Model extends Database
{
    public $connection;
    public function __construct()
    {
        $this->connection = $this->getConnection();
    }
    public function getConnection()
    {
        try{
        $connection = new PDO(Database::DB_DNS,Database::DB_USERNAME,Database::DB_PASSWORD);
        }catch(PDOException $e)
        {
            die("Kết nối CSDL theo PDO thất bại: \" . $e->getMessage()");
        }
        return $connection;
    }
}
?>
