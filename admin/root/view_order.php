<?php
require_once('./data/connnect.php');
$sql = "select * from orders";
$result = mysqli_query($connect, $sql);
?>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>ID Khách Hàng</th>
                <th>Mã Đơn Hàng</th>
                <th>Trạng Thái</th>
                <th>Ngày Đặt</th>
                <th>Phương Thức</th>
                <th>Địa Chỉ</th>
                <th>Số Điện Thoại</th>
                <th>Tổng Tiền</th>
                <th>Duyệt Đơn</th>
                <th>Vận Chuyển</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody style="text-align: center;">
            <?php if (is_array($result) || is_object($result)) foreach ($result as $value) : ?>
            <tr>
                <td>
                    <p><?php echo $value['id'] ?></p>
                </td>
                <td>
                    <p><?php echo $value['id_customer'] ?></p>
                </td>
                <td>
                    <p><?php echo $value['code_order'] ?></p>
                </td>
                <td>
                    <?php if ($value['order_status'] == 0) {
                            echo ' <p>Đang chờ xác nhận</p>';
                        } ?>
                    <?php if ($value['order_status'] == 1) {
                            echo ' <p>Vận chuyển</p>';
                        } ?>
                    <?php if ($value['order_status'] == 2) {
                            echo ' <p>Giao hàng thành công</p>';
                        } ?>
                </td>
                <td>
                    <p style="color: #820813;"><?php echo $value['date'] ?></p>
                </td>
                <td>
                    <p><?php echo $value['payment'] ?></p>
                </td>
                <td>
                    <p><?php echo $value['customer_address'] ?></p>
                </td>
                <td>
                    <p><?php echo $value['phone_customer'] ?></p>
                </td>
                <td>
                    <p><?php echo $value['total_price'] ?></p>
                </td>
                <td>
                    <a class="btn btn-warning btn-sm" href="confirm.php?confirm=1&id=<?php echo $value['id'] ?>"><span
                            class="material-icons" style="color: white;">Duyệt</span></a>
                </td>
                <td>
                    <a class="btn btn-success btn-sm" href="ship.php?id=<?php echo $value['id'] ?>"><span
                            class="material-icons" style="color: white;">Vận Chuyển</span></a>
                </td>
                <td>
                    <form action="code_orders.php" method="POST" class="d-inline">
                        <button type="submit" name="delete" value="<?php echo $value['id'] ?>"
                            class="btn btn-danger btn-sm">Xóa</button>
                    </form>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
