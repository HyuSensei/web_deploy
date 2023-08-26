<?php
session_start();
require './data/connnect.php';

if (isset($_POST['delete'])) {
    $id = mysqli_real_escape_string($connect, $_POST['delete']);

    $query = "DELETE FROM rating WHERE id='$id' ";
    $query_run = mysqli_query($connect, $query);

    if ($query_run) {
        $_SESSION['message'] = "Xóa đánh giá thành công";
        header("Location: tableRating.php");
        exit(0);
    } else {
        $_SESSION['message'] = "value Not Deleted";
        header("Location: tableRating.php");
        exit(0);
    }
}

if (isset($_POST['update'])) {
    if (empty($_POST['rate']) || empty($_POST['comment'])) {
        $_SESSION['message'] = "Vui lòng điền đầy đủ thông tin khách hàng";
        header("Location: edit_rate.php");
        exit(0);
    } else {
        $id = mysqli_real_escape_string($connect, $_POST['id']);
        $rate = mysqli_real_escape_string($connect, $_POST['rate']);
        $comment = mysqli_real_escape_string($connect, $_POST['comment']);
        $query = "UPDATE rating SET rate='$rate',comment='$comment' WHERE id='$id' ";
        $query_run = mysqli_query($connect, $query);
        if ($query_run) {
            $_SESSION['message'] = "Sửa đánh thành công";
            header("Location: edit_rate.php");
            exit(0);
        } else {
            $_SESSION['message'] = "Có lỗi khi sửa đánh giá!";
            header("Location: edit_rate.php");
            exit(0);
            // var_dump($query);
        }
    }
}
