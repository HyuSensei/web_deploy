<?php
require_once('./data/connnect.php');
$sql = "select * from vn_pay";
$result = mysqli_query($connect, $sql);
?>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Id_vnpay</th>
                <th>code_cart</th>
                <th>vnp_amount</th>
                <th>vnp_bankcode</th>
                <th>vnp_banktranno</th>
                <th>vnp_cardtype</th>
                <th>vnp_orderinfo</th>
                <th>vnp_paydate</th>
                <th>vnp_tmncode</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>
            <?php if (is_array($result) || is_object($result)) foreach ($result as $value) : ?>
            <tr>
                <td>
                    <p><?php echo $value['id_vnpay'] ?></p>
                </td>
                <td>
                    <p><?php echo $value['code_cart'] ?></p>
                </td>
                <td>
                    <p><?php echo $value['vnp_amount'] ?> đ</p>
                </td>
                <td>
                    <p><?php echo $value['vnp_bankcode'] ?></p>
                </td>
                <td>
                    <p><?php echo $value['vnp_banktranno'] ?></p>
                </td>
                <td>
                    <p><?php echo $value['vnp_cardtype'] ?></p>
                </td>
                <td>
                    <p><?php echo $value['vnp_orderinfo'] ?></p>
                </td>
                <td>
                    <p><?php echo $value['vnp_paydate'] ?></p>
                </td>
                <td>
                    <p><?php echo $value['vnp_tmncode'] ?></p>
                </td>
                <td>
                    <form action="code_vnpay.php" method="POST" class="d-inline">
                        <button type="submit" name="delete" value="<?php echo $value['id_vnpay'] ?>"
                            class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>

            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
