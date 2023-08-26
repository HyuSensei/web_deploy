<?php
session_start();
include('db/config.php');
if (isset($_SESSION['id'])) {
    if (empty($_POST['name']) || empty($_POST['mail']) || empty($_POST['mess'])) {
        echo '<script>alert("Vui lòng điền đầy đủ thông tin!");</script>';
        echo '<script>window.location.href = "contact.php";</script>';
    } else {
        $name = $_POST['name'];
        $email = $_POST['mail'];
        $mess = $_POST['mess'];
        $id_custumer = $_SESSION['id'];
        $sql = "INSERT INTO contacts(id_custumer, email, name, message) VALUES ('$id_custumer','$email','$name','$mess')";
        $query = mysqli_query($connect, $sql);
        if ($query) {
            echo '<script>alert("Gửi thông tin liên hệ thành công");</script>';
            echo '<script>window.location.href = "contact.php";</script>';
        } else {
            echo "Lỗi";
        }
    }
} else {
    echo '<script>alert("Vui lòng đăng nhập để gửi thông tin liên hệ!");</script>';
    echo '<script>window.location.href = "login.php";</script>';
}
mysqli_close($connect);
