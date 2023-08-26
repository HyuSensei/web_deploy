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
                        <span>Liên Hệ</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="contact__content">
                        <div class="contact__address">
                            <h5>Thông Tin Liên Hệ</h5>
                            <ul>
                                <li>
                                    <h6><i class="fa fa-map-marker"></i> Địa Chỉ</h6>
                                    <p>126A-27A-Đan Phượng- Hà Nội</p>
                                </li>
                                <li>
                                    <h6><i class="fa fa-phone"></i> Phone</h6>
                                    <p><span>0986538387</span><span>0375164533</span></p>
                                </li>
                                <li>
                                    <h6><i class="fa fa-headphones"></i> Hỗ trợ</h6>
                                    <p>skinlele02@gmail.com</p>
                                </li>
                            </ul>
                        </div>
                        <div class="contact__form">
                            <h5>Gửi Mail</h5>
                            <form action="process_contact.php" method="POST">
                                <input name="name" type="text" placeholder="Họ và tên...">
                                <input name="mail" type="text" placeholder="Email...">
                                <textarea name="mess" placeholder="Message..."></textarea>
                                <button type="submit" class="site-btn">GỬI</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="contact__map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d7838.684254869503!2d106.70676642475235!3d10.785086936675276!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1547181657956"
                            height="780" style="border:0" allowfullscreen="">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include('footer.php') ?>
    <?php include('js.php') ?>
</body>

</html>
