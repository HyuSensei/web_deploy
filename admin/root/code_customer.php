<?php
session_start();
require './data/connnect.php';

if (isset($_POST['delete'])) {
    $id = mysqli_real_escape_string($connect, $_POST['delete']);
    $query_check = "SELECT * FROM orders WHERE id_customer=$id";
    if (mysqli_num_rows(mysqli_query($connect, $query_check)) > 0) {
        $_SESSION['message'] = "Thông tin khách hàng này có liên quan đến đặt hàng chưa thể xóa!";
        header("Location: tableCustomer.php");
        exit(0);
    } else {
        $query = "DELETE FROM custumers WHERE id='$id' ";
        $query_run = mysqli_query($connect, $query);
        if ($query_run) {
            $_SESSION['message'] = "Xóa khách hàng thành công";
            header("Location: tableCustomer.php");
            exit(0);
        } else {
            $_SESSION['message'] = "Có lỗi khi xóa khách hàng";
            header("Location: tableCustomer.php");
            exit(0);
        }
    }
}

if (isset($_POST['update'])) {
    if (empty($_POST['name']) || empty($_POST['phone_number']) || empty($_POST['address']) || empty($_POST['status']) || empty($_POST['id'])) {
        $_SESSION['message'] = "Vui lòng điền đầy đủ thông tin khách hàng";
        header("Location: edit_custumer.php");
        exit(0);
    } else {
        $id = mysqli_real_escape_string($connect, $_POST['id']);
        $name = mysqli_real_escape_string($connect, $_POST['name']);
        $phone_number = mysqli_real_escape_string($connect, $_POST['phone_number']);
        $address = mysqli_real_escape_string($connect, $_POST['address']);
        $status = mysqli_real_escape_string($connect, $_POST['status']);
        $query = "UPDATE custumers SET name='$name',phone_number='$phone_number', address='$address', verify_status='$status' WHERE id='$id' ";
        $query_run = mysqli_query($connect, $query);
        if ($query_run) {
            $_SESSION['message'] = "Sửa thông tin khách hàng thành công";
            header("Location: edit_custumer.php");
            exit(0);
        } else {
            $_SESSION['message'] = "Có lỗi khi sửa khách hàng!";
            header("Location: edit_custumer.php");
            exit(0);
            // var_dump($query);
        }
    }
}


if (isset($_POST['save'])) {
    if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['phone_number']) || empty($_POST['address']) || empty($_POST['password'])) {
        $_SESSION['message'] = "Vui lòng điền đầy đủ thông tin khách hàng";
        header("Location: create_customer.php");
        exit(0);
    } else {
        $name = mysqli_real_escape_string($connect, $_POST['name']);
        $email = mysqli_real_escape_string($connect, $_POST['email']);
        $phone_number = mysqli_real_escape_string($connect, $_POST['phone_number']);
        $address = mysqli_real_escape_string($connect, $_POST['address']);
        $password = mysqli_real_escape_string($connect, $_POST['password']);
        $status = 1;
        $query = "INSERT INTO custumers (name,email,phone_number,address,password,verify_status) VALUES ('$name','$email','$phone_number','$address','$password','$status')";
        $query_run = mysqli_query($connect, $query);
        if ($query_run) {
            $_SESSION['message'] = "Thêm thông tin khách hàng thành công";
            header("Location: create_customer.php");
            exit(0);
        } else {
            $_SESSION['message'] = "Có lỗi khi thêm khách hàng khách hàng!";
            header("Location: create_customer.php");
            exit(0);
            // var_dump($query);
        }
    }
}
