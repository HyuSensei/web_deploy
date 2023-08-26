<?php

session_start();
if(empty($_GET['search'])&&$_GET['search']==""){
    header('location: index.php');
}
 ?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SkinLeLe</title>
    <?php include('css.php') ?>

</head>

<body>
    <?php include('header.php') ?>
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.php"><i class="fa fa-home"></i> Trang Chủ</a>
                        <a href="#">Tìm Kiếm </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="product-details spad">
        <div class="container" style="font-size: 25px;margin-bottom: 40px;">SẢN PHẨM CẦN TÌM</div>
        <div class="container">
            <div class="row" id="show_product">
                <?php
                require_once('process_search.php');
            ?>
            </div>
        </div>
    </section>
    <?php include('footer.php') ?>

    <?php include('js.php') ?>
</body>

</html>
