<?php
session_start();
if (!isset($_SESSION['level'])) {
    header('location:../index.php');
}
require_once('../root/data/connnect.php');
$sql  = "SELECT code_order FROM orders;";
$result = mysqli_query($connect, $sql);
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
                <div class="row invoice-card-row">
                    <h1>Bảng thống kê doanh thu</h1>
                    <div class="container-fluid pt-4 px-4" style="background-color: #e8eaec;">
                        <div class="row g-4">
                            <div class="col-12">
                                <div class="rounded h-100 p-4" style="background-color: #e8eaec;box-shadow:-2px -13px 50px 6px grey;">
                                    <?php
                                    $ngay = array('Thang1', 'Thang2', 'Thang3', 'Thang4', 'Thang5', 'Thang6', 'Thang7', 'Thang8', 'Thang9', 'Thang10', 'Thang11', 'Thang12');
                                    $giaTri = array();
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $codeOrder = $row['code_order'];
                                        $giaTri[] = $codeOrder;
                                    }
                                    ?>
                                    <canvas id="lineChart" width="800" height="400"></canvas>
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
