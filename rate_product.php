<?php
require_once('db/config.php');
if (isset($_SESSION['id']) && isset($_GET['id'])) {
    $id = $_SESSION['id'];
    $order_id = $_GET['id'];
    $sql = "SELECT products.*,order_detail.*,orders.*
            FROM order_detail,products,orders
            WHERE products.id=order_detail.id_product
            AND orders.id=order_detail.id_order
            AND id_customer='$id'
            AND order_status='2'
            AND orders.id=$order_id";
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $id_product = $row['id_product'];
            $id_order = $row['id_order'];
            $sql_product_rate = "SELECT * FROM rating WHERE id_product=$id_product AND id_order=$id_order";
            $query_check = mysqli_query($connect, $sql_product_rate);
            if (mysqli_num_rows($query_check) == 0) {
                echo '
                            <div style="margin-bottom: 30px" class="row">
                               <div class="col-2">
                               <img src="' . $row['img_main'] . '" alt="" width="140px">
                           </div>
                           <div class="col-10">
                               <p>' . $row['product_name'] . '</p>
                                   <form action="process_rate.php" methed="GET">
                                   <input type="text" name="id_product" value="' . $row['id_product'] . '" hidden>
                                   <input type="text" name="id_custumer" value="' . $id . '" hidden>
                                   <input type="text" name="id_order" value="' . $row['id_order'] . '" hidden>
                                   <div class="rating">
                                       <input type="radio" id="star5" name="rating" value="5" /><label class="full" for="star5" title="Awesome - 5 stars"></label>
                                       <input type="radio" id="star4" name="rating" value="4" /><label class="full" for="star4" title="Pretty good - 4 stars"></label>
                                       <input type="radio" id="star3" name="rating" value="3" /><label class="full" for="star3" title="Meh - 3 stars"></label>
                                       <input type="radio" id="star2" name="rating" value="2" /><label class="full" for="star2" title="Kinda bad - 2 stars"></label>
                                       <input type="radio" id="star1" name="rating" value="1" /><label class="full" for="star1" title="Sucks big time - 1 star"></label>
                                   </div>
                                   <div class="form-group">
                                       <textarea style="font-size:14px"  class="form-control" rows="7" id="comment" name="text" placeholder="Nhập ghi chú đánh giá..."></textarea>
                                   </div>
                                   <br>
                                   <button style="font-size:14px" class="btn btn-secondary">Đánh giá</button>
                                   <hr>
                               </form>
                           </div>
                       </div>';
            }
            //$id_order=$row['id_order'];
            $sql_check_rate = "SELECT id_order, COUNT(DISTINCT id_product) AS count_rate FROM rating WHERE id_order=$id_order GROUP BY id_order";
            $sql_check_order_detail = "SELECT id_order, COUNT(DISTINCT id_product) AS count_order FROM order_detail WHERE id_order=$id_order GROUP BY id_order";
            if (mysqli_num_rows(mysqli_query($connect, $sql_check_rate)) > 0) {
                if (mysqli_num_rows(mysqli_query($connect, $sql_check_order_detail)) > 0) {
                    $row_rate = mysqli_fetch_assoc(mysqli_query($connect, $sql_check_rate));
                    $row_order = mysqli_fetch_assoc(mysqli_query($connect, $sql_check_order_detail));
                    $count_rate = $row_rate['count_rate'];
                    $count_order = $row_order['count_order'];
                    if ($count_rate == $count_order) {
                        echo '<div class="container"><p style="font-size: 20px;font-weight: bold;">Đơn hàng đã đánh giá cảm ơn quý khách <i style="color:red;" class="fa-solid fa-heart"></i></p></div>';
                    }
                }
            }
        }
    }
} else {
    echo '<div class="container"><p style="font-size: 20px;font-weight: bold;">Chưa có đơn hàng hoàn thành</p></div>';
}

mysqli_close($connect);
