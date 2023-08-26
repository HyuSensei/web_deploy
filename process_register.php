<?php
session_start();
require_once('db/config.php');
require_once('mail.php');

if (isset($_POST['register'])) {
    if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['email']) || empty($_POST['phone_number']) || empty($_POST['address']) || empty($_POST['password'])) {
        $_SESSION['status'] = "Vui lòng điền đầy đủ thông tin đăng ký";
        header('location:register.php');
    } else {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];
        $address = $_POST['address'];
        $password = $_POST['password'];
        $verify_token = md5(rand());
        $title = "Xác minh đăng ký tài khoản với Skinlele";
        $content = "<h2>Bạn đã đăng ký tài khoản với Skinlele</h2>
                       <h5>Xác minh tài khoản của bạn</h5>
                       </br>
                       <a href='http://localhost/do_an_web-main/verify_register.php?verify_token=$verify_token'>Click me</a>";

        $sql_check_mail = "SELECT * FROM custumers WHERE email='$email' LIMIT 1";
        $query_check_mail = mysqli_query($connect, $sql_check_mail);
        if (mysqli_num_rows($query_check_mail) > 0) {
            $_SESSION['status'] = "Email đã được đăng ký!";
        } else {
            $sql_register = "INSERT INTO custumers (name,email,phone_number,address,password,verify_token)
        VALUES('$name','$email','$phone_number','$address','$password','$verify_token')";
            $query_register = mysqli_query($connect, $sql_register);
            if ($query_register) {
                send_register($email, $name, $title, $content, $verify_token);
                $_SESSION['status'] = "Đăng ký thành công. ! Hãy đến mail của bạn để xác minh.";
                header('location:register.php');
            } else {
                $_SESSION['status'] = "Đăng ký không thành công";
                header('location:register.php');
            }
        }
    }
}

mysqli_close($connect);
