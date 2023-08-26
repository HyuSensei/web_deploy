<?php
session_start();
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
    <style>
    fieldset,
    label {
        margin: 0;
        padding: 0;
    }

    h1 {
        font-size: 1.5em;
        margin: 10px;
    }


    .rating {
        border: none;
        float: left;
    }

    .rating>input {
        display: none;
    }

    .rating>label:before {
        margin: 5px;
        font-size: 1.25em;
        font-family: FontAwesome;
        display: inline-block;
        content: "\f005";
    }

    .rating>.half:before {
        content: "\f089";
        position: absolute;
    }

    .rating>label {
        color: #ddd;
        float: right;
    }

    .rating>input:checked~label,
    .rating:not(:checked)>label:hover,
    .rating:not(:checked)>label:hover~label {
        color: #FFD700;
    }

    .rating>input:checked+label:hover,
    .rating>input:checked~label:hover,
    .rating>label:hover~input:checked~label,
    .rating>input:checked~label:hover~label {
        color: #FFED85;
    }
    </style>
</head>

<body>
    <?php include('header.php') ?>
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="order_history.php"><i class="fa fa-home"></i> Quản Lý Đơn Hàng</a>
                        <a href="">Đánh Giá </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="product-details spad">
        <div class="container" style="font-size: 25px;margin-bottom: 40px;">ĐÁNH GIÁ SẢN PHẨM</div>
        <div class="container">
            <?php include('rate_product.php') ?>
        </div>
    </section>
    <?php include('footer.php') ?>

    <?php include('js.php') ?>
</body>

</html>
