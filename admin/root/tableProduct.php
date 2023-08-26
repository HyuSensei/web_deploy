<?php
session_start();
if (!isset($_SESSION['level'])) {
    header('location:../index.php');
}
include('./data/config.php')
?>
<!DOCTYPE html>
<html lang="en">

<?php include('./component/head.php') ?>

<body>
    <div id="main-wrapper">
        <div class="nav-header">
            <a href="index.php" class="brand-logo">
                <svg class="logo-abbr" width="53" height="53" viewBox="0 0 53 53">
                </svg>
                <p class="brand-title" width="124px" height="33px" style="font-size: 30px;">Admin</p>
            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <?php include('./component/header.php') ?>
        <?php include('./sidebar.php') ?>
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                <!-- Table Start -->
                <div class="container-fluid pt-4 px-4" style="background-color: #e8eaec;">
                    <div class="row g-4">
                        <div class="col-12">
                            <div class="rounded h-100 p-4" style="background-color: #e8eaec;box-shadow:-2px -13px 50px 6px grey;">
                                <h2>Quản lý sản phẩm</h2>
                                <?php include('message_product.php') ?>
                                <button class='btn'>Bảng sản phẩm</button>
                                <?php include('view_product.php') ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php include('./jquery.php') ?>
</body>

</html>
