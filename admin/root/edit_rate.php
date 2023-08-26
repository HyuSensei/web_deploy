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
        <?php include('message_rate.php'); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Nhập thông tin sửa đánh giá
                            <a href="tableRating.php" class="btn btn-danger float-end">Quay lại</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($_GET['id'])) {
                            $id = mysqli_real_escape_string($connect, $_GET['id']);
                            $query = "SELECT * FROM rating WHERE id='$id' ";
                            $query_run = mysqli_query($connect, $query);
                            if (mysqli_num_rows($query_run) > 0) {
                                $value = mysqli_fetch_array($query_run);
                        ?>
                                <form class="form" action="code_rate.php" method="POST">
                                    <input type="text" name="id" value="<?= $value['id'] ?>" hidden>
                                    <div class="mb-3">
                                        <label>Đánh giá</label>
                                        <input type="number" name="rate" class="form-control" data-rule-required="true" data-rule-minlength="6" data-msg-required="Please enter name." value="<?= $value['rate'] ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label>Ghi chú</label>
                                        <input type="text" name="comment" class="form-control" data-rule-required="true" data-rule-minlength="10" data-msg-required="Please enter phone." value="<?= $value['comment'] ?>">
                                    </div>
                                    <div class="mb-3">
                                        <input type="submit" name="update" class="btn btn-primary" value="Sửa đánh giá">
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
