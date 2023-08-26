<?php
include('db/config.php');
if (isset($_GET['id_product']) && isset($_GET['id_custumer']) && isset($_GET['rating']) && isset($_GET['id_order'])) {
    if (isset($_GET['text'])) {
        $comment = $_GET['text'];
    } else {
        $comment = "Không có ghi chú đánh giá";
    }
    $id_customer = $_GET['id_custumer'];
    $id_product = $_GET['id_product'];
    $rate = $_GET['rating'];
    $id_order = $_GET['id_order'];
    $sql_name = "SELECT * FROM custumers WHERE id=$id_customer";
    $query_name = mysqli_query($connect, $sql_name);
    if (mysqli_num_rows($query_name) > 0) {
        $row_name = mysqli_fetch_assoc($query_name);
        $name_custumer = $row_name['name'];
        $sql = "INSERT INTO rating(id_product, id_custumer, rate, comment, name,id_order) VALUES ('$id_product','$id_customer','$rate','$comment','$name_custumer','$id_order')";
        $query = mysqli_query($connect, $sql);
        if ($query) {
            echo '<script>alert("Đánh giá sản phẩm thành công!");</script>';
            echo '<script>window.location.href = "rate.php?id=' . $id_order . '";</script>';
            // $sql_status="UPDATE orders SET order_status=3 WHERE id=$id_order";
            // $query_status=mysqli_query($connect,$sql_status);
            // if($query_status){
            //     echo '<script>alert("Đánh giá sản phẩm thành công!");</script>';
            //     echo '<script>window.location.href = "rate.php?id='.$id_order.'";</script>';
            //     }
        } else {
            echo "Vui lòng thử lại";
        }
    } else {
        echo "Chưa có dữ liệu";
    }
}

mysqli_close($connect);
