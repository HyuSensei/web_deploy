<?php
session_start();
    $id=$type="";
    if(isset($_GET['id'])&&isset($_GET['type'])){
        $id=$_GET['id'];
        $type=$_GET['type'];
        echo $id." ".$type;
    if($type=="decrease"){
        if($_SESSION['cart'][$id]['quantity']>1){
            $_SESSION['cart'][$id]['quantity']--;
        }else{
            unset($_SESSION['cart'][$id]);
        }
    }
    if($type=="increase"){
        $_SESSION['cart'][$id]['quantity']++;
    }
    header('location:shop-cart.php');
    }else{
        echo "khong co du lieu";
    }
