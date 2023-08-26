<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkinLeLe</title>
    <?php include('css.php') ?>
</head>

<body id="top">
    <?php include('header.php') ?>
    <main>
        <article>

            <!--
        - #HERO
      -->

            <section class="section hero" id="home" aria-label="hero" data-section>
                <div class="container">

                    <ul class="has-scrollbar">

                        <li class="scrollbar-item">
                            <div class="hero-card has-bg-image"
                                style="background-image: url('./assets/images/hero-banner-1.jpg')">

                                <div class="card-content">

                                    <h1 class="h1 hero-title">
                                        Reveal The <br>
                                        Beauty of Skin
                                    </h1>

                                    <p class="hero-text">
                                        Được làm bằng nguyên liệu sạch, không độc hại, sản phẩm của chúng tôi được thiết
                                        kế dành cho tất cả mọi người.
                                    </p>

                                    <p class="price">Chỉ với 199k</p>

                                    <a href="#" class="btn btn-primary">Mua Ngay</a>

                                </div>

                            </div>
                        </li>

                        <li class="scrollbar-item">
                            <div class="hero-card has-bg-image"
                                style="background-image: url('./assets/images/hero-banner-2.jpg')">

                                <div class="card-content">

                                    <h1 class="h1 hero-title">
                                        Reveal The <br>
                                        Beauty of Skin
                                    </h1>

                                    <p class="hero-text">
                                        Được làm bằng nguyên liệu sạch, không độc hại, sản phẩm của chúng tôi được thiết
                                        kế dành cho tất cả mọi người.
                                    </p>

                                    <p class="price">Chỉ với 199k</p>

                                    <a href="#" class="btn btn-primary">Mua Ngay</a>

                                </div>

                            </div>
                        </li>

                        <li class="scrollbar-item">
                            <div class="hero-card has-bg-image"
                                style="background-image: url('./assets/images/hero-banner-3.jpg')">

                                <div class="card-content">

                                    <h1 class="h1 hero-title">
                                        Reveal The <br>
                                        Beauty of Skin
                                    </h1>

                                    <p class="hero-text">
                                        Được làm bằng nguyên liệu sạch, không độc hại, sản phẩm của chúng tôi được thiết
                                        kế dành cho tất cả mọi người.
                                    </p>

                                    <p class="price">Chỉ với 199k</p>

                                    <a href="#" class="btn btn-primary">Mua Ngay</a>

                                </div>

                            </div>
                        </li>

                    </ul>

                </div>
            </section>





            <!--
        - #COLLECTION
      -->

            <section class="section collection" id="collection" aria-label="collection" data-section>
                <div class="container">

                    <ul class="collection-list">

                        <li>
                            <div class="collection-card has-before hover:shine">

                                <h2 class="h2 card-title">Summer Collection</h2>

                                <p class="card-text">Chỉ với 99k</p>

                                <a href="#" class="btn-link">
                                    <span class="span">Mua Ngay</span>

                                    <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
                                </a>

                                <div class="has-bg-image"
                                    style="background-image: url('./assets/images/collection-1.jpg')"></div>

                            </div>
                        </li>

                        <li>
                            <div class="collection-card has-before hover:shine">

                                <h2 class="h2 card-title">What’s New?</h2>

                                <p class="card-text">Get the glow</p>

                                <a href="#" class="btn-link">
                                    <span class="span">Khám Phá Ngay</span>

                                    <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
                                </a>

                                <div class="has-bg-image"
                                    style="background-image: url('./assets/images/collection-2.jpg')"></div>

                            </div>
                        </li>

                        <li>
                            <div class="collection-card has-before hover:shine">

                                <h2 class="h2 card-title">Buy 1 Get 1</h2>

                                <p class="card-text">Chỉ với 99k</p>

                                <a href="#" class="btn-link">
                                    <span class="span">Khám Phá Ngay</span>

                                    <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
                                </a>

                                <div class="has-bg-image"
                                    style="background-image: url('./assets/images/collection-3.jpg')"></div>

                            </div>
                        </li>

                    </ul>

                </div>
            </section>





            <!--
        - #SHOP
      -->

            <!-- <section class="section shop" id="shop" aria-label="shop" data-section>
        <div class="container">

          <div class="title-wrapper">
            <h2 class="h2 section-title">Sản Phẩm Bán Chạy</h2>

            <a href="#" class="btn-link">
              <span class="span">Tất cả sản phẩm</span>

              <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
            </a>
          </div>

          <ul class="has-scrollbar">



          </ul>

        </div>
      </section> -->

            <!-- Product Section Begin -->
            <section class="product-details spad">
                <div class="container" style="font-size: 25px;margin-bottom: 40px;">SẢN PHẨM MỚI</div>
                <div class="container">
                    <div class="row" id="show_product">
                        <?php include('new_product.php') ?>
                    </div>
                </div>
            </section>
            <section class="product-details spad">
                <div class="container" style="font-size: 25px;margin-bottom: 40px;">SẢN PHẨM GIẢM GIÁ</div>
                <div class="container">
                    <div class="row" id="show_product">
                        <?php include('sale_product.php') ?>
                    </div>
                </div>
            </section>

            <!--
        - #BANNER
      -->

            <section class="section banner" aria-label="banner" data-section>
                <div class="container">

                    <ul class="banner-list">

                        <li>
                            <div class="banner-card banner-card-1 has-before hover:shine">

                                <p class="card-subtitle">Bộ Sưu Tập Mới</p>

                                <h2 class="h2 card-title">Khám Phá Sản Phẩm Chăm Sóc Da Vào Mùa Thu</h2>

                                <a href="#" class="btn btn-secondary">Xem Thêm</a>

                                <div class="has-bg-image" style="background-image: url('./assets/images/banner-1.jpg')">
                                </div>

                            </div>
                        </li>

                        <li>
                            <div class="banner-card banner-card-2 has-before hover:shine">

                                <h2 class="h2 card-title">25% Sale</h2>

                                <p class="card-text">
                                    Trang điểm với nhiều loại khác nhau
                                </p>

                                <a href="#" class="btn btn-secondary">Shop Sale</a>

                                <div class="has-bg-image" style="background-image: url('./assets/images/banner-2.jpg')">
                                </div>

                            </div>
                        </li>

                    </ul>

                </div>
            </section>


            <!--
        - #FEATURE
      -->

            <section class="section feature" aria-label="feature" data-section>
                <div class="container">

                    <h2 class="h2-large section-title">Tại Sao Nên Mua Sắm Với SKINLELE</h2>

                    <ul class="flex-list">

                        <li class="flex-item">
                            <div class="feature-card">

                                <img src="./assets/images/feature-1.jpg" width="204" height="236" loading="lazy"
                                    alt="Guaranteed PURE" class="card-icon">

                                <h3 class="h3 card-title">Đảm Bảo Tính Khiết</h3>

                                <p class="card-text">
                                    Tất cả các công thức của Grace đều tuân thủ các tiêu chuẩn nghiêm ngặt về độ tinh
                                    khiết và sẽ không bao giờ chứa các thành phần khắc nghiệt hoặc độc hại
                                </p>

                            </div>
                        </li>

                        <li class="flex-item">
                            <div class="feature-card">

                                <img src="./assets/images/feature-2.jpg" width="204" height="236" loading="lazy"
                                    alt="Completely Cruelty-Free" class="card-icon">

                                <h3 class="h3 card-title">Hiệu quả</h3>

                                <p class="card-text">
                                    Tất cả các công thức của Grace đều tuân thủ các tiêu chuẩn nghiêm ngặt về độ tinh
                                    khiết và sẽ không bao giờ chứa các thành phần khắc nghiệt hoặc độc hại
                                </p>

                            </div>
                        </li>

                        <li class="flex-item">
                            <div class="feature-card">

                                <img src="./assets/images/feature-3.jpg" width="204" height="236" loading="lazy"
                                    alt="Ingredient Sourcing" class="card-icon">

                                <h3 class="h3 card-title">Tìm nguồn cung ứng nguyên liệu</h3>

                                <p class="card-text">
                                    Tất cả các công thức của Grace đều tuân thủ các tiêu chuẩn nghiêm ngặt về độ tinh
                                    khiết và sẽ không bao giờ chứa các thành phần khắc nghiệt hoặc độc hại
                                </p>

                            </div>
                        </li>

                    </ul>

                </div>
            </section>





            <!--
        - #OFFER
      -->

            <section class="section offer" id="offer" aria-label="offer" data-section>
                <div class="container">

                    <figure class="offer-banner">
                        <img src="./assets/images/offer-banner-1.jpg" width="305" height="408" loading="lazy"
                            alt="offer products" class="w-100">

                        <img src="./assets/images/offer-banner-2.jpg" width="450" height="625" loading="lazy"
                            alt="offer products" class="w-100">
                    </figure>

                    <div class="offer-content">

                        <p class="offer-subtitle">
                            <span class="span">Đặc Biệt</span>

                            <span class="badge" aria-label="20% off">-20%</span>
                        </p>

                        <h2 class="h2-large section-title">Dầu tắm</h2>

                        <p class="section-text">
                            Dầu tắm thông núi Được làm bằng nguyên liệu sạch, không độc hại, sản phẩm của chúng tôi được
                            thiết kế cho tất cả mọi người
                        </p>

                        <div class="countdown">

                            <span class="time" aria-label="days">15</span>
                            <span class="time" aria-label="hours">21</span>
                            <span class="time" aria-label="minutes">46</span>
                            <span class="time" aria-label="seconds">08</span>

                        </div>

                        <a href="#" class="btn btn-primary">Chỉ với 299k</a>

                    </div>

                </div>
            </section>

        </article>
    </main>


    <?php include('footer.php') ?>



    <a href="#top" class="back-top-btn" aria-label="back to top" data-back-top-btn>
        <ion-icon name="arrow-up" aria-hidden="true"></ion-icon>
    </a>

    <?php include('js.php') ?>
</body>

</html>
