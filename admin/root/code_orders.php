<?php
session_start();
require './data/connnect.php';


if (isset($_POST['delete'])) {
    $id = mysqli_real_escape_string($connect, $_POST['delete']);
    $query_check = "SELECT *FROM order_detail WHERE id_order=$id";
    if (mysqli_num_rows(mysqli_query($connect, $query_check)) > 0) {
        $_SESSION['message'] = "Không thể xóa thông tin đặt hàng, hãy thử với chi tiết đặt hàng";
        header("Location: tableOrder.php");
        exit(0);
    } else {
        $query = "DELETE FROM orders WHERE id='$id'";
        $query_run = mysqli_query($connect, $query);
        if ($query_run) {
            $_SESSION['message'] = "Xóa đặt hàng thành công";
            header("Location: tableOrder.php");
            exit(0);
        } else {
            $_SESSION['message'] = "Có lỗi khi xóa";
            header("Location: tableOrder.php");
            exit(0);
        }
    }
}
