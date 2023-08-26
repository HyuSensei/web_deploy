<?php

session_start();

require_once('db/config.php');
$id = "";
if (isset($_GET['id']) && $_GET['id'] != "") {
    $id = $_GET['id'];
    $sql = "SELECT*FROM products WHERE id=$id";
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    }
    $sql_count_review = "SELECT id_product, COUNT(*) AS count_review
    FROM rating
    WHERE id_product=$id
    GROUP BY id_product";
    $query_count = mysqli_query($connect, $sql_count_review);
    if (mysqli_num_rows($query_count) > 0) {
        $row_count = mysqli_fetch_assoc($query_count);
        $count_review = $row_count['count_review'];
    } else {
        $count_review = 0;
    }
    $sql_rate = "SELECT* FROM rating WHERE id_product=$id";
    $query_rate = mysqli_query($connect, $sql_rate);
    function get_rate($rate_star, $id)
    {
        global $connect;
        $sql = "SELECT COUNT(*) AS count FROM rating WHERE id_product =$id AND rate = $rate_star";
        $query = mysqli_query($connect, $sql);
        $row = mysqli_fetch_assoc($query);
        return $row;
    }
    $get_rate_5 = get_rate(5, $id);
    $rate_5 = $get_rate_5['count'];
    $get_rate_4 = get_rate(4, $id);
    $rate_4 = $get_rate_4['count'];
    $get_rate_3 = get_rate(3, $id);
    $rate_3 = $get_rate_3['count'];
    $get_rate_2 = get_rate(2, $id);
    $rate_2 = $get_rate_2['count'];
    $get_rate_1 = get_rate(1, $id);
    $rate_1 = $get_rate_1['count'];
} else {
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
                        <a href="#">Chi Tiết Sản Phẩm </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__left product__thumb nice-scroll">
                            <a class="pt active" href="">
                                <img src="<?php echo $row['img_main'] ?>" alt="">
                            </a>
                            <a class="pt" href="#product-2">
                                <img src="<?php echo $row['img_extra'] ?>" alt="">
                            </a>
                            <a class="pt" href="#product-3">
                                <img src="<?php echo $row['img_extra1'] ?>" alt="">
                            </a>
                            <a class="pt" href="#product-4">
                                <img src="<?php echo $row['img_extra2'] ?>" alt="">
                            </a>
                        </div>
                        <div class="product__details__slider__content">
                            <div class="product__details__pic__slider owl-carousel">
                                <img data-hash="product-1" class="product__big__img" src="<?php echo $row['img_main'] ?>" alt="">
                                <img data-hash="product-2" class="product__big__img" src="<?php echo $row['img_extra'] ?>" alt="">
                                <img data-hash="product-3" class="product__big__img" src="<?php echo $row['img_extra1'] ?>" alt="">
                                <img data-hash="product-4" class="product__big__img" src="<?php echo $row['img_extra2'] ?>" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product__details__text">
                        <h5><?php echo $row['product_name'] ?></h5>
                        <div class="product__details__price"><?php
                                                                $formatted_amount = number_format($row['price'], 0, '.', ',');
                                                                echo $formatted_amount;
                                                                ?> đ</div>
                        <p><?php echo $row['describe'] ?></p>
                        <div class="product__details__button">
                            <a href="add_to_cart.php?id=<?php echo $row['id']  ?>" class="cart-btn"> Thêm giỏ
                                hàng</a>
                        </div>
                        <div style="margin-left: 10px;" class="row">
                            <div class=".col-md-4">
                                <p style="font-size: 18px;">(<?php echo $count_review  ?> đánh giá)</p>
                            </div>
                            <div style="margin-left: 50px;" class=".col-md-8">
                                <div class="rating">
                                    <i style="margin: 5px;font-size: 20px" class="fa fa-star"></i>
                                    <i style="margin: 5px;font-size: 20px" class="fa fa-star"></i>
                                    <i style="margin: 5px;font-size: 20px" class="fa fa-star"></i>
                                    <i style="margin: 5px;font-size: 20px" class="fa fa-star"></i>
                                    <i style="margin: 5px;font-size: 20px" class="fa fa-star"></i>
                                    <?php echo $rate_5 ?>
                                </div>
                                <div class="rating">
                                    <i style="margin: 5px;font-size: 20px" class="fa fa-star"></i>
                                    <i style="margin: 5px;font-size: 20px" class="fa fa-star"></i>
                                    <i style="margin: 5px;font-size: 20px" class="fa fa-star"></i>
                                    <i style="margin: 5px;font-size: 20px" class="fa fa-star"></i>
                                    <?php echo $rate_4 ?>
                                </div>
                                <div class="rating">
                                    <i style="margin: 5px;font-size: 20px" class="fa fa-star"></i>
                                    <i style="margin: 5px;font-size: 20px" class="fa fa-star"></i>
                                    <i style="margin: 5px;font-size: 20px" class="fa fa-star"></i>
                                    <?php echo $rate_3 ?>
                                </div>
                                <div class="rating">
                                    <i style="margin: 5px;font-size: 20px" class="fa fa-star"></i>
                                    <i style="margin: 5px;font-size: 20px" class="fa fa-star"></i>
                                    <?php echo $rate_2 ?>
                                </div>
                                <div class="rating">
                                    <i style="margin: 5px;font-size: 20px" class="fa fa-star"></i>
                                    <?php echo $rate_1 ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="margin-top: 100px;border-radius: 20px;" class="container">
            <div style="font-size: 18px;padding-top: 20px;" class="container">ĐÁNH GIÁ SẢN PHẨM</div>
            <div style="margin-top: 20px;">
                <?php if (mysqli_num_rows($query_rate) > 0) {
                    foreach ($query_rate as $value) {
                        $name = $value['name'];
                        $date = $value['date'];
                        $comment = $value['comment'];
                        $rate_start = $value['rate'];
                ?>
                        <div class="row">
                            <div style="margin-left: 15px;" class=".col-md-2">
                                <i style="font-size: 30px;padding-left: 25px;padding-top: 10px;" class="fa-solid fa-user"></i>
                            </div>
                            <div class=".col-md-10">
                                <p style="padding-top: 10px;margin-left: 10px;"><?php echo $name ?></p>
                            </div>
                        </div>
                        <div style="margin-left: 25px;">
                            <p><?php echo $date ?></p>
                            <?php
                            switch ($rate_start) {
                                case 1:
                                    echo '<div class="rating">
                                            <i style="margin: 5px;font-size: 20px;color: #e3c01c;" class="fa fa-star"></i>
                                        </div>';
                                    break;
                                case 2:
                                    echo '<div class="rating">
                                            <i style="margin: 5px;font-size: 20px;color: #e3c01c;" class="fa fa-star"></i>
                                            <i style="margin: 5px;font-size: 20px;color: #e3c01c;" class="fa fa-star"></i>
                                        </div>';
                                    break;
                                case 3:
                                    echo '<div class="rating">
                                            <i style="margin: 5px;font-size: 20px;color: #e3c01c;" class="fa fa-star"></i>
                                            <i style="margin: 5px;font-size: 20px;color: #e3c01c;" class="fa fa-star"></i>
                                            <i style="margin: 5px;font-size: 20px;color: #e3c01c;" class="fa fa-star"></i>
                                        </div>';
                                    break;
                                case 4:
                                    echo '<div class="rating">
                                            <i style="margin: 5px;font-size: 20px;color: #e3c01c;" class="fa fa-star"></i>
                                            <i style="margin: 5px;font-size: 20px;color: #e3c01c;" class="fa fa-star"></i>
                                            <i style="margin: 5px;font-size: 20px;color: #e3c01c;" class="fa fa-star"></i>
                                            <i style="margin: 5px;font-size: 20px;color: #e3c01c;" class="fa fa-star"></i>
                                        </div>';
                                    break;
                                case 5:
                                    echo '<div class="rating">
                                            <i style="margin: 5px;font-size: 20px;color: #e3c01c;" class="fa fa-star"></i>
                                            <i style="margin: 5px;font-size: 20px;color: #e3c01c;" class="fa fa-star"></i>
                                            <i style="margin: 5px;font-size: 20px;color: #e3c01c;" class="fa fa-star"></i>
                                            <i style="margin: 5px;font-size: 20px;color: #e3c01c;" class="fa fa-star"></i>
                                            <i style="margin: 5px;font-size: 20px;color: #e3c01c;" class="fa fa-star"></i>
                                        </div>';
                                    break;
                                default:
                                    break;
                            }
                            ?>
                            <p><?php echo $comment ?></p>
                        </div>
                        <hr>
                    <?php } ?>
                <?php } else { ?>
                    <?php echo '<p style="padding-left:30px">Chưa có đánh giá nào !</p>'; ?>
                <?php } ?>
            </div>
        </div>
    </section>
    <?php include('footer.php') ?>

    <?php include('js.php') ?>
</body>

</html>
