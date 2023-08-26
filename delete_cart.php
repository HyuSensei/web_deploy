<?php
try {
    session_start();
    $id="";
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        echo $id;
    }
    unset($_SESSION['cart'][$id]);
    header('location:shop-cart.php');
    //echo 1;
} catch (Throwable $e) {
    //echo $e;
}
