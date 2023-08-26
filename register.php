<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('css.php') ?>
    <title>SkinLeLe</title>
</head>

<body>
    <?php
    include 'header.php'
    ?>
    <div class="container" style="margin-top: 100px;margin-bottom: 100px;">
        <div class="row">
            <div class="col-sm-6">
                <?php if (isset($_SESSION['status'])) { ?>
                <div>
                    <p
                        style="width: 80%;padding-top: 10px;background-color: #d4edda;color:#447342;margin-bottom: 20px;height: 40px;border-radius: 10px;padding-left: 10px;">
                        <?php
                            echo $_SESSION['status'];
                            unset($_SESSION['status']);
                            ?>
                    </p>
                </div>
                <?php   } ?>
                <h2 style="font-size: 20px;margin-bottom: 20px;font-weight: bold;width: 80%;text-align: center;">ĐĂNG KÝ
                </h2>
                <form class="form" method="POST" action="process_register.php">

                    <div class="form-group">
                        <label style="font-size: 15px;margin-bottom: 20px;">Họ và tên:</label>
                        <input style="height: 40px;width: 80%;font-size: 14px;" type="text" class="form-control"
                            name="name" placeholder="Nhập họ và tên...">
                    </div>
                    <div class="form-group">
                        <label style="font-size: 15px;margin-bottom: 20px;">Địa chỉ:</label>
                        <input style="height: 40px;width: 80%;font-size: 14px;" type="text" class="form-control"
                            name="address" placeholder="Nhập địa chỉ...">
                    </div>
                    <div class="form-group">
                        <label style="font-size: 15px;margin-bottom: 20px;">Số điện thoại:</label>
                        <input style="height: 40px;width: 80%;font-size: 14px;" type="number" class="form-control"
                            name="phone_number" placeholder="Nhập số điện thoại...">
                    </div>
                    <div class="form-group">
                        <label style="font-size: 15px;margin-bottom: 20px;">Email:</label>
                        <input style="height: 40px;width: 80%;font-size: 14px;" type="email" class="form-control"
                            name="email" placeholder="Nhập email...">
                    </div>
                    <div class="form-group">
                        <label style="font-size: 15px;margin-bottom: 20px;" for="pwd">Mật khẩu:</label>
                        <input style="height: 40px;width: 80%;font-size: 14px;" type="password" class="form-control"
                            name="password" placeholder="Nhập mật khẩu...">
                    </div>
                    <input id="register" name="register" style="width: 80%;
                            background-color: #820813;
                            height: 45px;
                            color: white;
                            border-radius: 5px;
                            margin-top: 20px;" type="submit" value="Đăng Ký">
                </form>
            </div>
            <div class="col-sm-6"><img
                    src="https://templates.g5plus.net/glowing-bootstrap-5/assets/images/banner/banner-32.jpg" alt=""
                    width="90%"></div>
        </div>
    </div>

    <?php include('footer.php') ?>
    <?php
    include 'js.php'
    ?>
</body>

</html>
