<?php
session_start();
if (isset($_SESSION['order_history'])) {
    $order_history = $_SESSION['order_history'];
}
$action = isset($_GET['action']) ? $_GET['action'] : '';
if (empty($_SESSION['id'])) {
    header('location:index.php');
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

<body class="js">
    <?php include 'header.php'; ?>
    <main>
        <article>
            <div class="breadcrumb-option">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="breadcrumb__links">
                                <a href="./index.php"><i class="fa fa-home"></i> Trang Chủ</a>
                                <span>Quản Lý Đơn Hàng</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid" style="height: 90%;margin-top: 30px;margin-bottom: 200px;">
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
                            <a href="myaccount.php">
                                <p><i class="fa-solid fa-user"></i> Thông Tin</p>
                            </a>
                            <br>
                            <a href="">
                                <p style="font-weight: bold;"><i class="fa-sharp fa-solid fa-bag-shopping"></i> Quản Lý
                                    Đơn Hàng</p>
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
                        <div style="margin-left: 100px;margin-top: 20px">
                            <div class="container-fluid">
                                <div class="row">

                                    <div class="col-2">
                                        <?php if ($action == "order_confirm") { ?>
                                            <a style="font-weight: bold;" href="order_history.php?action=<?php echo 'order_confirm' ?>">Chờ xác
                                                nhận</a>
                                        <?php } else { ?>
                                            <a href="order_history.php?action=<?php echo 'order_confirm' ?>">Chờ xác
                                                nhận</a>
                                        <?php } ?>
                                    </div>

                                    <div class="col-2">
                                        <?php if ($action == "order_ship") { ?>
                                            <a style="font-weight: bold;" href="order_history.php?action=<?php echo 'order_ship' ?>">Vận chuyển</a>
                                        <?php } else { ?>
                                            <a href="order_history.php?action=<?php echo 'order_ship' ?>">Vận chuyển</a>
                                        <?php } ?>
                                    </div>

                                    <div class="col-2">
                                        <?php if ($action == "order_complete") { ?>
                                            <a style="font-weight: bold;" href="order_history.php?action=<?php echo 'order_complete' ?>">Hoàn
                                                thành</a>
                                        <?php } else { ?>
                                            <a href="order_history.php?action=<?php echo 'order_complete' ?>">Hoàn thành</a>
                                        <?php } ?>
                                    </div>

                                </div>
                            </div>

                            <div style="margin-top: 50px" class="container-fluid">
                                <?php
                                switch ($action) {
                                    case 'order_confirm':
                                        include('process_orderconfirm.php');
                                        break;
                                    case 'order_ship':
                                        include('process_ordership.php');
                                        break;
                                    case 'order_complete':
                                        include('process_ordercomplete.php');
                                        break;
                                    default:
                                        include('process_orderconfirm.php');
                                        break;
                                }

                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </main>
    <?php include('footer.php') ?>
    <a href="#top" class="back-top-btn" aria-label="back to top" data-back-top-btn>
        <ion-icon name="arrow-up" aria-hidden="true"></ion-icon>
    </a>
    <!-- /End Footer Area -->
    <?php include('js.php') ?>
</body>

</html>
