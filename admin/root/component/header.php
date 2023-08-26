<div class="header">
    <div class="header-content">
        <nav class="navbar navbar-expand">
            <div class="collapse navbar-collapse justify-content-between">
                <div class="header-left">
                    <div class="dashboard_bar">
                        Quản lý
                    </div>
                </div>
                <ul class="navbar-nav header-right">
                    <li class="nav-item">
                        <div class="input-group search-area">
                            <form class="d-none d-md-flex ms-4" action="../root/searchProduct.php" method="GET">
                                <input type="search" name="search" class="form-control" placeholder="Nhập..." required value="<?php if (isset($_GET['search'])) {
                                                                                                                                    echo $_GET['search'];
                                                                                                                                } ?>" placeholder="Search">
                                <span class="input-group-text"><a style="text-decoration: none;" href="javascript:void(0)"><i class="flaticon-381-search-2"></i></a></span>
                        </div>
                        </form>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
