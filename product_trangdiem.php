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
                        <a href="#">Trang Điểm </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="product-details spad">
        <div class="container" style="font-size: 25px;margin-bottom: 40px;">DANH MỤC TRANG ĐIỂM</div>
        <div class="container">
            <div class="row" id="show_product">
                <?php
                require_once('process_trangdiem.php');
            ?>
            </div>
        </div>
        <div class="container">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item <?php if($page <= 1){ echo 'disabled'; } ?>"><a class="page-link"
                            href="<?php if($page <= 1){ echo '#'; } else { echo "?page=" . $prev; } ?>">
                            <<< /a>
                    </li>
                    <?php for($i = 1; $i <= $total_pages; $i++ ): ?>
                    <li class="page-item <?php if($page == $i) {echo 'active'; } ?>">
                        <a class="page-link" href="?page=<?= $i; ?>"> <?= $i; ?> </a>
                    </li>
                    <?php endfor; ?>
                    <li class="page-item <?php if($page >= $total_pages) { echo 'disabled'; } ?>"><a class="page-link"
                            href="<?php if($page >= $total_pages){ echo '#'; } else {echo "?page=". $next; } ?>">>></a>
                    </li>
                </ul>
            </nav>
        </div>
    </section>
    <?php include('footer.php') ?>

    <?php include('js.php') ?>
</body>

</html>
