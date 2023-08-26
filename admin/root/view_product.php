<?php
require_once('./data/connnect.php');
//$sql = "select * from products";
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
$prev = $page - 1;
$next = $page + 1;

$product_page = 5;
$total_pages_sql = "SELECT COUNT(*)  FROM products";
$result = mysqli_query($connect, $total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $product_page);

$offset = ($page - 1) * $product_page;
$sql = "SELECT * FROM products LIMIT $offset, $product_page";
$result = mysqli_query($connect, $sql);
?>

<a href="create_product.php" style="float: right; background-color: e28585;" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Thêm sản phẩm</a>

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên sản phẩm</th>
                <th>Mô tả</th>
                <th>Ảnh</th>
                <th>Giá</th>
                <th>Danh mục</th>
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
                            margin-top: 10px;"><?php echo $value['product_name'] ?></p>
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
                            margin-top: 10px;"><?php echo $value['describe'] ?></p>
                    </td>
                    <td><img src="<?php echo $value['img_main'] ?>" alt="" style="width: 100px;"></td>
                    <td>
                        <p style="color: #820813;"><?php echo $value['price'] ?>đ</p>
                    </td>
                    <td>
                        <p><?php echo $value['category'] ?></p>
                    </td>
                    <td>
                        <a style="text-decoration: none;" href="edit_product.php?id=<?php echo $value['id'] ?>" class="btn btn-info btn-sm">Sửa</a>
                    </td>
                    <td>
                        <form action="code_product.php" method="POST" class="d-inline">
                            <button type="submit" name="delete" value="<?php echo $value['id'] ?>" class="btn btn-danger btn-sm">Xóa</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <div class="container">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item <?php if ($page <= 1) {
                                            echo 'disabled';
                                        } ?>"><a class="page-link" href="<?php if ($page <= 1) {
                                                                                echo '#';
                                                                            } else {
                                                                                echo "?page=" . $prev;
                                                                            } ?>">
                        <<< /a>
                </li>
                <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                    <li class="page-item <?php if ($page == $i) {
                                                echo 'active';
                                            } ?>">
                        <a class="page-link" href="?page=<?= $i; ?>"> <?= $i; ?> </a>
                    </li>
                <?php endfor; ?>
                <li class="page-item <?php if ($page >= $total_pages) {
                                            echo 'disabled';
                                        } ?>"><a class="page-link" href="<?php if ($page >= $total_pages) {
                                                                                echo '#';
                                                                            } else {
                                                                                echo "?page=" . $next;
                                                                            } ?>">>></a></li>
            </ul>
        </nav>
    </div>
</div>
>
