<?php
require_once('db/config.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "UPDATE orders SET order_status=2 WHERE id='$id'";
    $query = mysqli_query($connect, $sql);
    if ($query) {
        echo '<script>alert("Xác nhận đã nhận hàng thành công!");</script>';
        echo '<script>window.location.href = "order_history.php";</script>';
    }
} else {
    echo "không tìm thấy id đơn hàng";
}
mysqli_close($connect);
