<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
/**
 * Created by PhpStorm.
 * User: doanh ad
 * Date: 6/2/2021
 * Time: 2:21 PM
 */
require_once "controllers/Controller.php";
require_once "configs/Database.php";
require_once "models/Model.php";
?>
<?php
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'category';
$action =isset($_GET['action']) ? $_GET['action'] : 'index';

$controller = ucfirst($controller)."Controller";
$path_controller = "controllers/".$controller.".php";
if(!file_exists($path_controller))
{
    die("Trang bạn tìm không tồn tại");
}
require_once $path_controller;

$object = new $controller();
if(!method_exists($object,$action))
{
    die("Không tồn tại phương thức $action của class $controller");
}
$object->$action();

?>

