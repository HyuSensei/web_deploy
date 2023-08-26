<!DOCTYPE html>
<html lang="en">

<?php
session_start();
if (!isset($_SESSION['level'])) {
    header('location:../index.php');
}
include('./component/head.php') ?>

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
            <div class="container-fluid">
                <div class="container-fluid pt-4 px-4">
                    <div class="text-center rounded p-4" style="background-color: #e8eaec;color:black;box-shadow:-2px -13px 50px 6px grey;">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <h6 class="mb-0">Recent Salse</h6>
                            <a href="">Show All</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table text-start align-middle table-bordered table-hover mb-0">
                                <thead>
                                    <tr class="text-dark">
                                        <th scope="col">id</th>
                                        <th scope="col">product_name</th>
                                        <th scope="col">describe</th>
                                        <th scope="col">img_main</th>
                                        <th scope="col">price</th>
                                        <th scope="col">category</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require_once "./data/config.php";
                                    if (isset($_GET['search'])) {
                                        $filtervalues = $_GET['search'];
                                        $query = "SELECT * FROM products WHERE CONCAT(id,product_name) LIKE '%$filtervalues%' ";
                                        $query_run = mysqli_query($link, $query);
                                        if (mysqli_num_rows($query_run) > 0) {
                                            foreach ($query_run as $items) {
                                    ?>
                                                <tr>
                                                    <td><?= $items['id']; ?></td>
                                                    <td><?= $items['product_name']; ?></td>
                                                    <td><?= $items['describe']; ?></td>
                                                    <td><img src="<?= $items['img_main']; ?>" alt="" style="width: 100px;"></td>
                                                    <td><?= $items['price']; ?></td>
                                                    <td><?= $items['category']; ?></td>
                                                </tr>
                                            <?php
                                            }
                                        } else {
                                            ?>
                                            <tr>
                                                <td colspan="6">No Record Found</td>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include('./jquery.php') ?>

</body>

</html>
