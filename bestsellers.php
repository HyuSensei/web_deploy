<?php
require_once("db/config.php");
$sql = "SELECT * FROM products WHERE category=N'Chăm sóc da'";
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    echo '
        <li class="scrollbar-item">
              <div class="shop-card">

                <div class="card-banner img-holder" style="--width: 540; ">
                  <img src="' . $row['img_main'] . '" style="width:100%; height:auto;" loading="lazy"
                    alt="Coffee Bean Caffeine Eye Cream" class="img-cover">

                  <span class="badge" aria-label="20% off">-20%</span>

                  <div class="card-actions">

                    <button id="add_to_cart" data-id="' . $row['id'] . '" class="action-btn" aria-label="add to cart">
                      <ion-icon name="bag-handle-outline" aria-hidden="true"></ion-icon>
                    </button>

                    <button class="action-btn" aria-label="add to whishlist">
                      <ion-icon name="star-outline" aria-hidden="true"></ion-icon>
                    </button>

                    <button class="action-btn" aria-label="compare">
                      <ion-icon name="repeat-outline" aria-hidden="true"></ion-icon>
                    </button>

                  </div>
                </div>

                <div class="card-content">

                  <div class="price">
                    <del class="del">' . $row['price'] . '-10000</del>

                    <span class="span">' . $row['price'] . '</span>
                  </div>

                  <p>
                    <a href="product-details.php?id=' . $row['id'] . '"
                    style="display: -webkit-box;
                    max-height: 3.2rem;
                   -webkit-box-orient: vertical;
                    overflow: hidden;
                    text-overflow: ellipsis;
                    white-space: normal;
                    -webkit-line-clamp: 1;
                    line-height: 1.6rem;
                    margin-top: 10px; class="card-title">' . $row['product_name'] . '</a>
                  </p>

                  <div class="card-rating">

                    <div class="rating-wrapper" aria-label="5 start rating">
                      <ion-icon name="star" aria-hidden="true"></ion-icon>
                      <ion-icon name="star" aria-hidden="true"></ion-icon>
                      <ion-icon name="star" aria-hidden="true"></ion-icon>
                      <ion-icon name="star" aria-hidden="true"></ion-icon>
                      <ion-icon name="star" aria-hidden="true"></ion-icon>
                    </div>

                    <p class="rating-text">5170 reviews</p>

                  </div>

                </div>

              </div>
            </li>
   ';
  }
} else {
  echo 'Không có dữ liệu';
}
