<?php
session_start();
require './data/connnect.php';

if (isset($_POST['delete'])) {
    $id = mysqli_real_escape_string($connect, $_POST['delete']);
    $query_check = "SELECT * FROM order_detail WHERE id_product=$id";
    if (mysqli_num_rows(mysqli_query($connect, $query_check)) > 0) {
        $_SESSION['message'] = "Chưa thể xóa sản phẩm, sản phẩm có liên quan đến thông tin đặt hàng";
        header("Location: tableProduct.php");
        exit(0);
    } else {
        $query = "DELETE FROM products WHERE id='$id' ";
        $query_run = mysqli_query($connect, $query);

        if ($query_run) {
            $_SESSION['message'] = "Xóa sản phẩm thành công!";
            header("Location: tableProduct.php");
            exit(0);
        } else {
            $_SESSION['message'] = "Có lỗi khi xóa sản phẩm";
            header("Location: tableProduct.php");
            exit(0);
        }
    }
}

if (isset($_POST['update'])) {
    $id = mysqli_real_escape_string($connect, $_POST['id']);
    $product_name = mysqli_real_escape_string($connect, $_POST['product_name']);
    $describe = mysqli_real_escape_string($connect, $_POST['describe']);
    $price = mysqli_real_escape_string($connect, $_POST['price']);
    $type = mysqli_real_escape_string($connect, $_POST['type']);
    $category = mysqli_real_escape_string($connect, $_POST['category']);
    if (isset($_FILES['img_main_new'])) {
        $img_main = "images/" . $_FILES['img_main_new'];
    } else {
        $img_main = mysqli_real_escape_string($connect, $_POST['img_main']);
    }
    $query = "UPDATE `products` SET `product_name`='$product_name',`img_main`='$img_main',`price`=$price,`describe`='$describe',`category`='$category' WHERE `id`=$id";
    $query_run = mysqli_query($connect, $query);

    if ($query_run) {
        $_SESSION['message'] = "Sửa sản phẩm thành công";
        header("Location: tableProduct.php");
        exit(0);
        //var_dump($query);
    } else {
        var_dump($query);
        // $_SESSION['message'] = "value Not Updated";
        // header("Location: tableProduct.php");
        // exit(0);
        // var_dump($query);
    }
}



if (isset($_POST['save'])) {
    if (empty($_POST['product_name']) || empty($_POST['describe']) || empty($_FILES['img_main']['name']) || empty($_POST['price']) || empty($_POST['category']) || empty($_POST['type'])) {
        $_SESSION['message'] = "Vui lòng điền đủ thông tin!";
        header("Location: create.php");
        exit(0);
    } else {
        $product_name = mysqli_real_escape_string($connect, $_POST['product_name']);
        $describe = mysqli_real_escape_string($connect, $_POST['describe']);
        $img_main = mysqli_real_escape_string($connect, $_FILES['img_main']['name']);
        $price = mysqli_real_escape_string($connect, $_POST['price']);
        $type = mysqli_real_escape_string($connect, $_POST['type']);
        $category = mysqli_real_escape_string($connect, $_POST['category']);
        $picture = "images/" . $_FILES['img_main']['name'];
        $target_dir = "../images/";
        $target_file = $target_dir . basename($_FILES["img_main"]["name"]);
        var_dump($product_name);
        $query = "INSERT INTO `products`(`product_name`, `img_main`,`price`, `type`, `describe`, `category`) VALUES ('$product_name','$picture','$price','$type','$describe','$category')";
        if (move_uploaded_file($_FILES["img_main"]["tmp_name"], $target_file)) {
            $query_run = mysqli_query($connect, $query);
            if ($query_run) {
                $_SESSION['message'] = "Thêm sản phẩm thành công!";
                header("Location: create_product.php");
                exit(0);
            } else {
                // $_SESSION['message'] = "Lỗi khi thêm";
                // header("Location: create.php");
                // exit(0);
                var_dump($query);
            }
        } else {
            echo "không thể upload file";
        }
    }
}
