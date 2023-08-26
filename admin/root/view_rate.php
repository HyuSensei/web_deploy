<?php
require_once('./data/connnect.php');
$sql = "select * from rating";
$result = mysqli_query($connect, $sql);
?>

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>ID Sản Phẩm</th>
                <th>ID Khách Hàng</th>
                <th>ID Đơn Hàng</th>
                <th>Đánh Giá</th>
                <th>Ghi Chú</th>
                <th>Ngày</th>
                <th>Tên Khách Hàng</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>
            <?php if (is_array($result) || is_object($result)) foreach ($result as $value) : ?>
                <tr>
                    <td>
                        <p><?php echo $value['id'] ?></p>
                    </td>
                    <td>
                        <p><?php echo $value['id_product'] ?></p>
                    </td>
                    <td>
                        <p><?php echo $value['id_custumer'] ?></p>
                    </td>
                    <td>
                        <p><?php echo $value['id_order'] ?></p>
                    </td>
                    <td>
                        <p><?php echo $value['rate'] ?> sao</p>
                    </td>
                    <td>
                        <p><?php echo $value['comment'] ?></p>
                    </td>
                    <td>
                        <p><?php echo $value['date'] ?></p>
                    </td>
                    <td>
                        <p><?php echo $value['name'] ?></p>
                    </td>

                    <td>
                        <a href="edit_rate.php?id=<?php echo $value['id'] ?>" class="btn btn-info btn-sm">Sửa</a>
                    </td>
                    <td>
                        <form action="code_rate.php" method="POST" class="d-inline">
                            <button type="submit" name="delete" value="<?php echo $value['id'] ?>" class="btn btn-danger btn-sm">Xóa</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
