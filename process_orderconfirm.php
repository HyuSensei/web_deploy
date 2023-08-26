<?php
require_once('db/config.php');
        if(isset($_SESSION['id'])){
            $id=$_SESSION['id'];
            $sql="SELECT products.*,order_detail.*,orders.*
            FROM order_detail,products,orders
            WHERE products.id=order_detail.id_product
            AND orders.id=order_detail.id_order
            AND id_customer='$id'
            AND order_status='0'";
            $result=mysqli_query($connect,$sql);
            if(mysqli_num_rows($result)>0) {

                $check_id_product=0;
                $status_order="";
                    while ($row = mysqli_fetch_assoc($result)){
                        $id_order = $row['id_order'];
                        echo '
                             <div style="margin-bottom: 30px" class="row">
                                <div class="col-3">
                                <img src="' . $row['img_main'] . '" alt="" width="140px">
                            </div>
                            <div class="col-9">
                                <p>' . $row['product_name'] . '</p>
                                <p>x' . $row['quantity_order'] . '</p>
                                <p style="color: #820813 ">' .  number_format($row['price'] , 0, '.', ',') . ' đ</p>
                            </div>
                        </div>';
                        $check_id_product = $row['id_product'];

                                if ($check_id_product ==  mysqli_fetch_assoc(mysqli_query($connect, "SELECT id_product FROM order_detail WHERE id_order = '$id_order' ORDER BY id DESC LIMIT 1"))['id_product']){
                                    if($row['order_status']=='0'){
                                        $status_order="Đang chờ xác nhận";
                                    }elseif($row['order_status']=='1'){
                                        $status_order="Đã xác nhận đưa vào vận chuyển";
                                    }elseif($row['order_status']=='2'){
                                         $status_order="Giao hàng thành công";
                                    }
                                    echo '
                            <div style="margin-top: 20px;margin-bottom: 30px" class="container-fluid">
                            <div class="row">
                                <div class="col-5">
                                    <div style="font-size: 13px;color:#65bebc">'.$status_order.'</div>
                                    <div style="font-size: 13px;color:#ee4d2d">Hình thức thanh toán: '.$row['payment'].'</div>
                                    <div style="font-size: 11px;">Vui lòng bấm đã nhận hàng khi sản phẩm được giao tới và sản phẩm không vấn đề gì.</div>
                                </div>
                                <div class="col-2">
                                    <p style="color:#820813; ">
                                         Thành tiền: '. number_format($row['total_price'] , 0, '.', ',').' đ
                                    </p>
                                </div>
                                <div class="col-5">

                                    <button style="font-size: 15px;margin-left: 10px;background-color: white;color: gray" type="button" class="btn btn-info">Liên Hệ</button>
                                </div>
                            </div>
                        </div>
                        <hr>
                ';
                                }
                            }
                }else{
                    echo '<div class="container"><p style="font-size: 20px;font-weight: bold;">Chưa có đơn hàng nào chờ xác nhận</p></div>';
                }

}
