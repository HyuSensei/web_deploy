<?php
session_start();
require './data/connnect.php';
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($connect, $_GET['id']);
    $ship = 2;
    $query = "UPDATE orders SET order_status=$ship WHERE id=$id";
    $query_run = mysqli_query($connect, $query);
    if ($query_run) {
        $_SESSION['message'] = "Đơn hàng đã được vận chuyển!";
        header("Location: tableOrder.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Lỗi";
        header("Location: tableOrder.php");
        exit(0);
    }
} else {
    $_SESSION['message'] = "Trống dữ liệu";
    header("Location: tableOrder.php");
    exit(0);
}
