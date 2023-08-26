<?php
require_once('./data/connnect.php');
$sql = "select * from order_detail";
$result = mysqli_query($connect, $sql);
?>

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>ID Sản Phẩm</th>
                <th>ID Đặt Hàng</th>
                <th>Số Lượng</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>
            <?php if (is_array($result) || is_object($result)) foreach ($result as $value) : ?>
            <tr>
                <td>
                    <p><?php echo $value['id'] ?></p>
                </td>
                <td><?php echo $value['id_product'] ?></p>
                </td>
                <td>
                    <p><?php echo $value['id_order'] ?></p>
                </td>
                <td>
                    <p><?php echo $value['quantity_order'] ?></p>
                </td>
                <td>
                    <form action="code_orderdetail.php" method="POST" class="d-inline">
                        <button type="submit" name="delete" value="<?php echo $value['id_order'] ?>"
                            class="btn btn-danger btn-sm">Xóa</button>
                    </form>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
