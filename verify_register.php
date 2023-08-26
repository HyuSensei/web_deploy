<?php
require_once('db/config.php');

    session_start();

    if(isset($_GET['verify_token'])){
        $verify_token=$_GET['verify_token'];
        $sql_verify_token="SELECT verify_token,verify_status FROM custumers WHERE verify_token='$verify_token' LIMIT 1";
        $query_verify_token=mysqli_query($connect,$sql_verify_token);
        if(mysqli_num_rows($query_verify_token)>0){
            while($row=mysqli_fetch_assoc($query_verify_token)){
                if($row['verify_status']=='0'){
                    $click_token=$row['verify_token'];
                    $update_status="UPDATE custumers SET verify_status='1' WHERE verify_token='$click_token'";
                    $query_update_status=mysqli_query($connect,$update_status);
                    if($query_update_status){
                        $_SESSION['status']="Tài khoản của bạn đã được xác thực";
                        header('location:login.php');
                        exit(0);
                    }else{
                        $_SESSION['status']="Xác minh thất bại!";
                        header('location:login.php');
                        exit(0);
                    }
                }
            };
        }else{
            $_SESSION['status']="This token does not  Exits";
            header('location:login.php');
            exit(0);
        }
    }else{
        $_SESSION['status']="Không xác minh gmail";
        header('location:login.php');
    }
