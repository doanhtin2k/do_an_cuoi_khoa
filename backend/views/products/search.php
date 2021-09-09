<?php
/**
 * Created by PhpStorm.
 * User: doanh ad
 * Date: 9/8/2021
 * Time: 10:37 PM
 */
?>
<?php
require_once 'helpers/Helper.php';
?>
<h1>Tìm kiếm</h1>
<form action="" method="post">
    <div class="form-group">
        <label>Nhập tên sản phẩm</label>
        <input type="text" name="name" value="<?php echo isset($_POST['name'])?$_POST['name']:""  ?>"
               class="form-control"/>
    </div>
    <div class="form-group">
        <input type="submit" name="submit" value="Tìm kiếm" class="btn btn-success"/>
    </div>
</form>
<?php
if(!empty($products))
{
?>
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Avatar</th>
            <th>Price</th>
            <th>Amount</th>
            <th>Status</th>
            <th>Created_at</th>
            <th></th>
        </tr>
        <?php if (!empty($products)): ?>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?php echo $product['id'] ?></td>
                    <td><?php echo $product['title'] ?></td>
                    <td>
                        <?php if (!empty($product['avatar'])): ?>
                            <img height="80" src="assets/uploads/<?php echo $product['avatar'] ?>"/>
                        <?php endif; ?>
                    </td>
                    <td><?php echo number_format($product['price']) ?></td>
                    <td><?php echo $product['amount'] ?></td>
                    <td><?php echo Helper::getStatusText($product['status']) ?></td>
                    <td><?php echo date('d-m-Y H:i:s', strtotime($product['created_at'])) ?></td>
                    <td>
                        <?php
                        $url_detail = "index.php?controller=product&action=detail&id=" . $product['id'];
                        $url_update = "index.php?controller=product&action=update&id=" . $product['id'];
                        $url_delete = "index.php?controller=product&action=delete&id=" . $product['id'];
                        ?>
                        <a title="Chi tiết" href="<?php echo $url_detail ?>"><i class="fa fa-eye"></i></a> &nbsp;&nbsp;
                        <a title="Update" href="<?php echo $url_update ?>"><i class="fa fa-pencil-alt"></i></a> &nbsp;&nbsp;
                        <a title="Xóa" href="<?php echo $url_delete ?>" onclick="return confirm('Are you sure delete?')"><i
                                class="fa fa-trash"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>

        <?php else: ?>
            <tr>
                <td colspan="9">No data found</td>
            </tr>
        <?php endif; ?>
    </table>


 <?php
}
?>
