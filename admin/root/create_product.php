<?php
session_start();
if (!isset($_SESSION['level'])) {
    header('location:../index.php');
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
                        <h4>Thông tin thêm sản phẩm
                            <a href="tableProduct.php" class="btn btn-danger float-end">Quay lại</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form class="form" action="code_product.php" method="POST" enctype="multipart/form-data">

                            <div class="mb-3">
                                <label>Tên sản phẩm</label>
                                <input type="text" name="product_name" class="form-control" data-rule-required="true" data-rule-minlength="6" data-msg-required="Please enter ten san pham.">
                            </div>
                            <div class="mb-3">
                                <label>Mô tả</label>
                                <input type="text" name="describe" class="form-control" data-rule-required="true" data-msg-required="Please enter mo ta.">
                            </div>
                            <!-- <div class="mb-3">
                                <label>Ảnh</label>
                                <input type="text" name="img_main" class="form-control" data-rule-required="true" data-msg-required="Please enter anh.">
                            </div> -->
                            <div class="mb-3">
                                <label>Ảnh</label>
                                <input type="file" name="img_main" class="form-control" data-rule-required="true" data-msg-required="Please enter anh.">
                            </div>
                            <div class="mb-3">
                                <label>Giá</label>
                                <input type="text" name="price" class="form-control" data-rule-required="true" data-rule-minlength="5" data-msg-required="Please enter gia.">
                            </div>
                            <div class="mb-3">
                                <label>Loại</label>
                                <input type="text" name="type" class="form-control" data-rule-required="true" data-rule-minlength="5" data-msg-required="Please enter khuyen mai.">
                            </div>
                            <div class="mb-3">
                                <label>Danh mục</label>
                                <input type="text" name="category" class="form-control" data-rule-required="true" data-rule-minlength="3" data-msg-required="Please enter danh muc.">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="save" class="btn btn-primary">Thêm sản phẩm</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
