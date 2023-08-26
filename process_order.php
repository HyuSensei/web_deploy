<?php
session_start();
require_once('db/config.php');
require_once('mail.php');
if (isset($_SESSION['order_success'])) {
    header('location:shop-cart.php');
    exit();
}
if (isset($_SESSION['email']) && isset($_SESSION['name'])) {
    $acc_mail = $_SESSION['email'];
    $name_customer = $_SESSION['name'];
}
$title = "Thông báo của Skinlele";
try {
    if (isset($_SESSION['id'])) {
        if (isset($_SESSION['cart'])) {
            if (isset($_POST['name']) && isset($_POST['phone_number']) && isset($_POST['address']) && isset($_POST['method'])) {
                $name = $_POST['name'];
                $phone_number = $_POST['phone_number'];
                $address = $_POST['address'];
                $id_customer = $_SESSION['id'];
                $method = $_POST['method'];
                if ($method == "orderoff") {

                    $cart = $_SESSION['cart'];
                    $total_price = 0;
                    foreach ($cart as $each) {
                        $total_price +=  $each['price'] * $each['quantity'];
                    }
                    $content = "<h2>Bạn vừa đặt 1 đơn hàng từ Skinlele</h2>
                            <h5>$total_price đ</h5>";
                    $order_status = 0;
                    $payment = 'Thanh toán khi nhận hàng';
                    $code_order = rand(100000, 999999);
                    $sql = "INSERT INTO orders(id_customer, code_order, phone_customer, order_status, payment, customer_address,total_price)
                    values ('$id_customer', '$code_order', '$phone_number', '$order_status', '$payment','$address','$total_price')";
                    $order_query = mysqli_query($connect, $sql);
                    if ($order_query) {
                        $sql = "SELECT max(id) FROM orders WHERE id_customer = '$id_customer'";
                        $result = mysqli_query($connect, $sql);
                        $order_id = mysqli_fetch_assoc($result)['max(id)'];
                        foreach ($cart as $product_id => $each) {
                            $quantity = $each['quantity'];
                            $sql = "INSERT INTO order_detail(id_product,id_order,quantity_order)
                        values('$product_id','$order_id','$quantity')";
                            mysqli_query($connect, $sql);
                        }
                        //echo "Đặt hàng thành công!";
                        sendmail($acc_mail, $name, $title, $content);
                        unset($_SESSION['cart']);
                        $_SESSION['order_success'] = true;
                        header('location:shop-cart.php');
                        exit();
                    }
                } elseif ($method == 'ordervnpay') {

                    date_default_timezone_set('Asia/Ho_Chi_Minh');

                    $vnp_TmnCode = "CGXZLS0Z";
                    $vnp_HashSecret = "XNBCJFAKAZQSGTARRLGCHVZWCIOIGSHN";
                    $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
                    $vnp_Returnurl = "https://skinlele.azurewebsites.net/vnpay_return.php";
                    $vnp_apiUrl = "http://sandbox.vnpayment.vn/merchant_webapi/merchant.html";
                    $apiUrl = "https://sandbox.vnpayment.vn/merchant_webapi/api/transaction";

                    $startTime = date("YmdHis");
                    $expire = date('YmdHis', strtotime('+15 minutes', strtotime($startTime)));

                    error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $cart = $_SESSION['cart'];
                    $total_price = 0;
                    foreach ($cart as $each) {
                        $total_price += $each['price'] * $each['quantity'];
                    }
                    $vnp_TxnRef = rand(1, 10000);
                    $vnp_Amount = $total_price;
                    $vnp_BankCode = "";
                    $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

                    $inputData = array(
                        "vnp_Version" => "2.1.0",
                        "vnp_TmnCode" => $vnp_TmnCode,
                        "vnp_Amount" => $vnp_Amount * 100,
                        "vnp_Command" => "pay",
                        "vnp_CreateDate" => date('YmdHis'),
                        "vnp_CurrCode" => "VND",
                        "vnp_IpAddr" => $vnp_IpAddr,
                        "vnp_Locale" => "vn",
                        "vnp_OrderInfo" =>  $vnp_TxnRef,
                        "vnp_OrderType" => "other",
                        "vnp_ReturnUrl" => $vnp_Returnurl,
                        "vnp_TxnRef" => $vnp_TxnRef,
                        "vnp_ExpireDate" => $expire
                    );
                    if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                        $inputData['vnp_BankCode'] = $vnp_BankCode;
                    }

                    ksort($inputData);
                    $query = "";
                    $i = 0;
                    $hashdata = "";
                    foreach ($inputData as $key => $value) {
                        if ($i == 1) {
                            $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                        } else {
                            $hashdata .= urlencode($key) . "=" . urlencode($value);
                            $i = 1;
                        }
                        $query .= urlencode($key) . "=" . urlencode($value) . '&';
                    }

                    $vnp_Url = $vnp_Url . "?" . $query;
                    if (isset($vnp_HashSecret)) {
                        $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
                        $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
                    }
                    if (isset($_POST['redirect'])) {
                        $_SESSION['total'] = $total_price;
                        $order_status = 0;
                        $payment = 'Thanh toán vnpay';
                        $_SESSION['code_cart'] = $vnp_TxnRef;
                        $sql = "INSERT INTO orders(id_customer, code_order, phone_customer, order_status, payment, customer_address,total_price)
                        values ('$id_customer', '$vnp_TxnRef', '$phone_number', '$order_status', '$payment','$address','$total_price')";
                        $order_query = mysqli_query($connect, $sql);
                        if ($order_query) {
                            $sql = "SELECT max(id) FROM orders WHERE id_customer = '$id_customer'";
                            $result = mysqli_query($connect, $sql);
                            $order_id = mysqli_fetch_assoc($result)['max(id)'];
                            foreach ($cart as $product_id => $each) {
                                $quantity = $each['quantity'];
                                $sql = "INSERT INTO order_detail(id_product,id_order,quantity_order)
                                values('$product_id','$order_id','$quantity')";
                                mysqli_query($connect, $sql);
                            }
                        }
                    }
                    header('Location: ' . $vnp_Url);
                    die();
                }
            } else {
                echo '<script>alert("Vui lòng chọn đầy đủ thông tin đặt hàng");</script>';
                echo '<script>window.location.href = "shop-cart.php";</script>';
            }
        } else {
            echo '<script>alert("Giỏ hàng đang trống không thể đặt hàng");</script>';
            echo '<script>window.location.href = "shop-cart.php";</script>';
        }
    } else {
        echo '<script>alert("Vui lòng đăng nhập để đặt hàng!");</script>';
        echo '<script>window.location.href = "login.php";</script>';
    }
} catch (Throwable $e) {
    echo $e->getMessage();
}
mysqli_close($connect);
