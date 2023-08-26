<?php
session_start();
if (!isset($_SESSION['level'])) {
    header('location:../index.php');
}
require('./data/connnect.php');
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title></title>
</head>

<body>

    <div class="container mt-5">
        <?php include('message_product.php'); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Thông tin sản phẩm sửa
                            <a href="tableProduct.php" class="btn btn-danger float-end">Quay lại</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($_GET['id'])) {
                            $id = mysqli_real_escape_string($connect, $_GET['id']);
                            $query = "SELECT * FROM products WHERE id='$id' ";
                            $query_run = mysqli_query($connect, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                $value = mysqli_fetch_array($query_run);
                        ?>
                        <form action="code_product.php" method="POST">
                            <input type="hidden" name="id" value="<?= $value['id']; ?>">

                            <div class="mb-3">
                                <label>Tên sản phẩm</label>
                                <input type="text" name="product_name" class="form-control"
                                    value="<?= $value['product_name']; ?>" data-rule-required="true"
                                    data-rule-minlength="6" data-msg-required="Please enter ten san pham.">
                            </div>
                            <div class="mb-3">
                                <label>Mô tả</label>
                                <input type="text" name="describe" class="form-control"
                                    value="<?= $value['describe']; ?>" data-rule-required="true"
                                    data-msg-required="Please enter mo ta.">
                            </div>
                            <div class="mb-3">
                                <input type="text" hidden name="img_main" value="<?= $value['img_main'] ?>">
                                <img src="<?= $value['img_main'] ?>" width="200px" alt="">
                            </div>
                            <div class="mb-3">
                                <label>Ảnh sản phẩm mới</label>
                                <input type="file" name="img_main_new" class="form-control" data-rule-required="true"
                                    data-msg-required="Please enter anh.">
                            </div>
                            <div class="mb-3">
                                <label>Giá</label>
                                <input type="text" name="price" class="form-control" value="<?= $value['price']; ?>"
                                    data-rule-required="true" data-rule-minlength="5"
                                    data-msg-required="Please enter gia.">
                            </div>
                            <div class="mb-3">
                                <label>Loại</label>
                                <input type="text" name="type" class="form-control" value="<?= $value['type']; ?>"
                                    data-rule-required="true" data-rule-minlength="5"
                                    data-msg-required="Please enter khuyen mai.">
                            </div>

                            <div class="mb-3">
                                <label>Danh mục</label>
                                <input type="text" name="category" class="form-control"
                                    value="<?= $value['category']; ?>" data-rule-required="true" data-rule-minlength="3"
                                    data-msg-required="Please enter danh muc.">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="update" class="btn btn-primary">
                                    Sửa sản phẩm
                                </button>
                            </div>
                        </form>
                        <?php
                            } else {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
