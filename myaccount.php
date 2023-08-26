<?php
session_start();
if(empty($_SESSION['id'])){
    header('location: index.php');
}
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='copyright' content=''>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title Tag  -->
    <title>SkinLeLe</title>
    <?php include('css.php') ?>
</head>
<style>
    .container a p:hover {
        color: #8f212b;
        font-weight: bold;
    }
</style>

<body class="js" >
    <?php include 'header.php'; ?>
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.php"><i class="fa fa-home"></i> Trang Chủ</a>
                        <span>Thông Tin</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid" style="height: 85%;margin-top: 100px;">
        <div class="row" style="height: 100%;">
            <div style="background-color: white;" class="col-sm-3">
                <div class="container">
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-sm-2">
                            <i style="font-size: 50px;" class="fa-solid fa-user"></i>
                        </div>
                        <div class="col-sm-10">
                            <?php if (isset($_SESSION['id'])) {  ?>
                                <div class="container">
                                    <p><?php echo $_SESSION['name'] ?></p>
                                    <p><?php echo $_SESSION['email'] ?></p>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="container" style="margin-top: 20px;border-top: 2px;">
                    <a href="user.php">
                        <p style="font-weight: bold;"><i class="fa-solid fa-user"></i> Thông Tin</p>
                    </a>
                    <br>
                    <a href="order_history.php">
                        <p><i class="fa-sharp fa-solid fa-bag-shopping"></i> Quản Lý Đơn Hàng</p>
                    </a>
                    <br>
                    <a href="shop-cart.php">
                        <p><i class="fa-solid fa-cart-shopping"></i> Giỏ Hàng</p>
                    </a>
                    <br>
                    <a href="includes/logout.php">
                        <p><i class="fa-solid fa-right-from-bracket"></i> Đăng Xuất</p>
                    </a>
                </div>
            </div>
            <div style="background-color: white;" class="col-sm-9">
                <div style="margin-left: 100px;">
                    <p style="margin-top: 20px;font-size:20px;color: black;font-weight: bold;">Thông tin tài khoản</p>
                    <?php if (isset($_SESSION['id'])) {  ?>
                        <div class="row">
                            <div class="col-sm-2">
                                <p>Họ và tên:</p>
                            </div>
                            <div class="col-sm-10">
                                <p><?php echo $_SESSION['name'] ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <p>Email:</p>
                            </div>
                            <div class="col-sm-10">
                                <p><?php echo $_SESSION['email'] ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <p>Số điện thoại:</p>
                            </div>
                            <div class="col-sm-10">
                                <p><?php echo $_SESSION['phone_number'] ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <p>Địa chỉ:</p>
                            </div>
                            <div class="col-sm-10">
                                <p><?php echo $_SESSION['address'] ?></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <?php include('footer.php') ?>
    <!-- /End Footer Area -->
    <?php include('js.php') ?>
</body>

</html>
