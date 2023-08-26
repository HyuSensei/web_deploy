<?php
require_once('db/config.php');
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $sql = "SELECT products.*,order_detail.*,orders.*
            FROM order_detail,products,orders
            WHERE products.id=order_detail.id_product
            AND orders.id=order_detail.id_order
            AND id_customer='$id'
            AND order_status='2'";
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) > 0) {

        $check_id_product = 0;
        $status_order = "";
        while ($row = mysqli_fetch_assoc($result)) {
            $id_order = $row['id_order'];
            echo '
                             <div style="margin-bottom: 30px" class="row">
                                <div class="col-3">
                                <img src="' . $row['img_main'] . '" alt="" width="140px">
                            </div>
                            <div class="col-9">
                                <p>' . $row['product_name'] . '</p>
                                <p>x' . $row['quantity_order'] . '</p>
                                <p style="color: #820813 ">' .  number_format($row['price'], 0, '.', ',') . ' đ</p>
                            </div>
                        </div>';
            $check_id_product = $row['id_product'];
            if ($check_id_product ==  mysqli_fetch_assoc(mysqli_query($connect, "SELECT id_product FROM order_detail WHERE id_order = '$id_order' ORDER BY id DESC LIMIT 1"))['id_product']) {
                if ($row['order_status'] == '0') {
                    $status_order = "Đang chờ xác nhận";
                } elseif ($row['order_status'] == '1') {
                    $status_order = "Đã xác nhận đưa vào vận chuyển";
                } elseif ($row['order_status'] == '2') {
                    $status_order = "Giao hàng thành công";
                }
                $id_order = $row['id_order'];
                $sql_check_rate = "SELECT id_order, COUNT(DISTINCT id_product) AS count_rate FROM rating WHERE id_order=$id_order GROUP BY id_order";
                $sql_check_order_detail = "SELECT id_order, COUNT(DISTINCT id_product) AS count_order FROM order_detail WHERE id_order=$id_order GROUP BY id_order";
                if (mysqli_num_rows(mysqli_query($connect, $sql_check_rate)) > 0) {
                    if (mysqli_num_rows(mysqli_query($connect, $sql_check_order_detail)) > 0) {
                        $row_rate = mysqli_fetch_assoc(mysqli_query($connect, $sql_check_rate));
                        $row_order = mysqli_fetch_assoc(mysqli_query($connect, $sql_check_order_detail));
                        $count_rate = $row_rate['count_rate'];
                        $count_order = $row_order['count_order'];
                        if ($count_rate == $count_order) {
                            echo '
                                                <div style="margin-top: 20px;margin-bottom: 30px" class="container-fluid">
                                                <div class="row">
                                                    <div class="col-5">
                                                        <div style="font-size: 13px;color:#65bebc">' . $status_order . '</div>
                                                    </div>
                                                    <div class="col-8">
                                                        <p style="color:#820813; ">
                                                             Đã đánh giá đơn hàng
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                    ';
                        }
                    }
                } else {
                    echo '
                                            <div style="margin-top: 20px;margin-bottom: 30px" class="container-fluid">
                                                <div class="row">
                                                    <div class="col-5">
                                                        <div style="font-size: 13px;color:#65bebc">' . $status_order . '</div>
                                                    </div>
                                                    <div class="col-2">
                                                        <p style="color:#820813; ">
                                                             Thành tiền: ' . number_format($row['total_price'], 0, '.', ',') . ' đ
                                                        </p>
                                                    </div>
                                                    <div class="col-5">
                                                            <div style="margin-left: -70px;" class="col-6">
                                                                <a href="rate.php?id=' . $row['id_order'] . '"><button style="font-size: 15px;margin-left: 10px;background-color: white;color: gray" type="button" class="btn btn-info">Đánh giá</button></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                    ';
                }
            }
        }
    } else {
        echo '<div class="container"><p style="font-size: 20px;font-weight: bold;">Chưa có đơn hàng hoàn thành</p></div>';
    }
}

mysqli_close($connect);
