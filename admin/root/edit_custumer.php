<?php
session_start();
require('./data/connnect.php');
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
        <?php include('message.php'); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            <a href="tableCustomer.php" class="btn btn-danger float-end">Quay lại</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($_GET['id'])) {
                            $id = mysqli_real_escape_string($connect, $_GET['id']);
                            $query = "SELECT * FROM custumers WHERE id='$id' ";
                            $query_run = mysqli_query($connect, $query);
                            if (mysqli_num_rows($query_run) > 0) {
                                $value = mysqli_fetch_array($query_run);
                        ?>
                                <form class="form" action="code_customer.php" method="POST">
                                    <input type="text" name="id" value="<?= $value['id'] ?>" hidden>
                                    <div class="mb-3">
                                        <label>Tên khách hàng</label>
                                        <input type="text" name="name" class="form-control" data-rule-required="true" data-rule-minlength="6" data-msg-required="Please enter name." value="<?= $value['name'] ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label>Số điện thoại</label>
                                        <input type="text" name="phone_number" class="form-control" data-rule-required="true" data-rule-minlength="10" data-msg-required="Please enter phone." value="<?= $value['phone_number'] ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label>Địa chỉ</label>
                                        <input type="text" name="address" class="form-control" data-rule-required="true" data-rule-minlength="6" data-msg-required="Please enter address." value="<?= $value['address'] ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label>Status</label>
                                        <input type="text" name="status" class="form-control" value="<?= $value['verify_status'] ?>">
                                    </div>
                                    <div class="mb-3">
                                        <input type="submit" name="update" class="btn btn-primary" value="Sửa thông tin khách hàng">
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
</body>

</html>
