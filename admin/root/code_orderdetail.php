<?php
session_start();
require './data/connnect.php';

if (isset($_POST['delete'])) {
    $id = mysqli_real_escape_string($connect, $_POST['delete']);

    $query = "DELETE FROM order_detail WHERE id_order='$id' ";
    $query_run = mysqli_query($connect, $query);

    if ($query_run) {
        $_SESSION['message'] = "Xóa chi tiết đặt hàng thành công!";
        header("Location: tableOrderDetail.php");
        exit(0);
    } else {
        $_SESSION['message'] = "value Not Deleted";
        header("Location: tableOrderDetail.php");
        exit(0);
    }
}
