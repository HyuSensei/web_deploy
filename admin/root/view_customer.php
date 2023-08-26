<?php
require_once('./data/connnect.php');
$sql = "select * from custumers";
$result = mysqli_query($connect, $sql);
?>

<a href="create.php" style="float: right; background-color: e28585;" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Thêm khách hàng</a>

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Tên khách hàng</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <th>Mật khẩu</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>
            <?php if (is_array($result) || is_object($result)) foreach ($result as $value) : ?>
                <tr>
                    <td>
                        <p><?php echo $value['id'] ?></p>
                    </td>
                    <td>
                        <p style="display: -webkit-box;
                            max-height: 3.2rem;
                           -webkit-box-orient: vertical;
                            overflow: hidden;
                            text-overflow: ellipsis;
                            white-space: normal;
                            -webkit-line-clamp: 2;
                            line-height: 1.6rem;
                            margin-top: 10px;"><?php echo $value['name'] ?></p>
                    </td>
                    <td>
                        <p style="display: -webkit-box;
                            max-height: 3.2rem;
                           -webkit-box-orient: vertical;
                            overflow: hidden;
                            text-overflow: ellipsis;
                            white-space: normal;
                            -webkit-line-clamp: 2;
                            line-height: 1.6rem;
                            margin-top: 10px;"><?php echo $value['email'] ?></p>
                    </td>
                    <td>
                        <p><?php echo $value['phone_number'] ?></p>
                    </td>
                    <td>
                        <p><?php echo $value['address'] ?></p>
                    </td>
                    <td>
                        <p><?php echo $value['password'] ?></p>
                    </td>
                    <td>
                        <a href="edit_customer.php?id=<?php echo $value['id'] ?>" class="btn btn-info btn-sm">Sửa</a>
                    </td>
                    <td>
                        <form action="code_customer.php" method="POST" class="d-inline">
                            <button type="submit" name="delete" value="<?php echo $value['id'] ?>" class="btn btn-danger btn-sm">Xóa</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
