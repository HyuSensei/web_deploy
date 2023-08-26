<?php

session_start();
unset($_SESSION['id']);
unset($_SESSION['name']);
unset($_SESSION['email']);
unset($_SESSION['phone_number']);
unset($_SESSION['address']);
unset($_SESSION['status']);
unset($_SESSION['cart']);
// setcookie('email', '', time() - 3600, '/');
// setcookie('password', '', time() - 3600, '/');
header('location:index.php');
