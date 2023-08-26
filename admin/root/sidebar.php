<div class="dlabnav">
    <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="dropdown header-profile">
                <a class="nav-link" href="./index.php" role="button" data-bs-toggle="dropdown">
                    <img src="images/ion/man (1).png" width="20" alt="" />
                    <div class="header-info ms-3">
                        <span class="font-w600 ">Hi,<b><?php echo $_SESSION['name'] ?></b></span>
                        <!-- <small class="text-end font-w400"><?php echo $_SESSION['id'] ?></small> -->
                    </div>
                </a>
            </li>
            <li><a href="./index.php" aria-expanded="false">
                    <i class="flaticon-025-dashboard"></i>
                    <span class="nav-text">Trang Chủ</span>
                </a>
            </li>
            <li><a href="./tableProduct.php" aria-expanded="true">
                    <i class="flaticon-050-info"></i>
                    <span class="nav-text">Sản Phẩm</span>
                </a>
            </li>
            <li><a href="./tableCustomer.php" aria-expanded="false">
                    <i class="fas fa-user"></i>
                    <span class="nav-text">Khách Hàng</span>
                </a>
            </li>
            <li><a href="./tableOrder.php" aria-expanded="false">
                    <i class="flaticon-022-copy"></i>
                    <span class="nav-text">Đặt Hàng</span>
                </a>
            </li>
            <li><a href="./tableVnpay.php" aria-expanded="false">
                    <i class="flaticon-045-heart"></i>
                    <span class="nav-text">Thanh Toán</span>
                </a>
            </li>
            <li><a href="./tableOrderDetail.php" aria-expanded="false">
                    <i class="flaticon-022-copy"></i>
                    <span class="nav-text">Chi Tiết Đặt Hàng</span>
                </a>
            </li>
            <li><a href="./tableRating.php" aria-expanded="false">
                    <i class="flaticon-086-star"></i>
                    <span class="nav-text">Đánh Giá</span>
                </a>
            </li>
            <li><a href="./statistical.php" aria-expanded="false">
                    <i class="flaticon-072-printer"></i>
                    <span class="nav-text">Thống Kê</span>
                </a>
            </li>
            <li><a href="../logout.php" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-013-checkmark"></i>
                    <span class="nav-text">Đăng Xuất</span>
                </a>
            </li>

        </ul>
    </div>
</div>
