<?php
session_start();
require './data/connnect.php';


if (isset($_POST['delete'])) {
    $id_vnpay = mysqli_real_escape_string($connect, $_POST['delete']);

    $query = "DELETE FROM vn_pay WHERE id_vnpay='$id_vnpay' ";
    $query_run = mysqli_query($connect, $query);

    if ($query_run) {
        $_SESSION['message'] = "value Deleted Successfully";
        header("Location: tableVnpay.php");
        exit(0);
    } else {
        $_SESSION['message'] = "value Not Deleted";
        header("Location: tableVnpay.php");
        exit(0);
    }
}
