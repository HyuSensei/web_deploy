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
        <?php include('./component/headers.php') ?>
        <?php include('./sidebar.php') ?>
        <div class="content-body">
            <div class="container-fluid">
                <div class="container-fluid pt-4 px-4" style="background-color: #e8eaec;">
                    <div class="row g-4">
                        <div class="col-12">
                            <div class="rounded h-100 p-4" style="background-color: #e8eaec;box-shadow:-2px -13px 50px 6px grey;">
                                <?php include('message_rate.php') ?>
                                <h6 class="mb-4" style="color: #e28585;">Bảng Đánh Giá</h6>
                                <div class="row"> <?php include('view_rate.php') ?></div>
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
