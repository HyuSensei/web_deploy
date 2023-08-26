<?php
if (isset($_GET['confirm'])) {
    if (isset($_GET['id'])) {
        $id = mysqli_real_escape_string($connect, $_GET['id']);
        $confirm = $_GET['confirm'];
        $query = "UPDATE orders SET order_status=$confirm WHERE id=$id";
        $query_run = mysqli_query($connect, $query);
        if ($query_run) {
            $_SESSION['message'] = "Duyệt đơn hàng thành công!";
            header("Location: tableOrder.php");
            exit(0);
        } else {
            $_SESSION['message'] = "Lỗi duyệt đơn";
            header("Location: tableOrder.php");
            exit(0);
        }
    }
} else {
    $_SESSION['message'] = "Trống dữ liệu duyệt đơn";
    header("Location: tableOrder.php");
    exit(0);
}
