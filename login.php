<?php
require_once('db/config.php');
session_start();
if (isset($_SESSION['id'])) {
    header('location:./index.php');
}
if (isset($_COOKIE['email']) && isset($_COOKIE['password'])) {
    $email = $_COOKIE['email'];
    $password = $_COOKIE['password'];
} else {
    $email = $password = "";
}
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
                        <p style="color: #c4908f;font-size: 15px;width: 80%;font-weight: bold;padding-top: 10px;background-color: #f3e0df;height: 40px;border-radius: 10px;padding-left: 10px;">
                            <?php
                            echo $_SESSION['status'];
                            unset($_SESSION['status']);
                            ?>
                        </p>
                    </div>
                <?php   } ?>
                <h2 style="font-size: 20px;font-family: 'Montserrat', sans-serif;margin-bottom: 20px;font-weight: bold;text-align: center;width: 80%;">
                    ĐĂNG NHẬP</h2>
                <form class="form" method="POST" action="process_login.php">
                    <div class="form-group">
                        <label style="font-size: 18px;font-family: 'Montserrat', sans-serif;margin-bottom: 20px;">Tên
                            đăng nhập:</label>
                        <input style="height: 40px;width: 80%;font-size: 14px" type="email" class="form-control" name="email" placeholder="Nhập email..." value="<?php echo $email ?>">
                    </div>
                    <div class="form-group">
                        <label style="font-size: 18px;font-family: 'Montserrat', sans-serif;margin-bottom: 20px;">Mật
                            khẩu:</label>
                        <input style="height: 40px;width: 80%;font-size: 14px" type="password" class="form-control" name="password" placeholder="Nhập mật khẩu..." value="<?php echo $password ?>">
                    </div>
                    <div style="display: flex;margin-top: 20px;" class="form-group">
                        <input style="width: 15px;height: 25px;" name="remember" type="checkbox">
                        <div style="margin-left:7px ;font-size: 14px;">Ghi nhớ đăng nhập</div>
                    </div>
                    <br>
                    <div class="form-group">

                        <input name='login' style="width: 80%;
                            background-color: #820813;
                            height: 45px;
                            color: white;
                            border-radius: 5px;" type="submit" value="Đăng Nhập">
                    </div>
                </form>
                <div style="width: 80%;height: 150px;background-color: #f5f6f9;">
                    <div style="text-align: center;font-weight: bold;padding-top: 20px;margin-bottom: 10px;">TẠO TÀI
                        KHOẢN NGAY</div>
                    <button style="height: 50px;width: 95%;margin: auto;border: 2px solid;border-radius: 5px;font-weight: bold;"><a href="register.php">Đăng Ký</a></button>
                </div>
            </div>
            <div class="col-sm-6"><img src="https://templates.g5plus.net/glowing-bootstrap-5/assets/images/hero-slider/hero-slider-white-14.jpg" alt="" width="100%"></div>
        </div>
    </div>
    <?php include('footer.php') ?>
    <?php
    include 'js.php'
    ?>
</body>

</html>
