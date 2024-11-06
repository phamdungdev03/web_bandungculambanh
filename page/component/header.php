<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .container_header-top {
        background-color: #4F2227;
    }

    .header-top {
        max-width: 1450px;
        margin: 0 auto;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 20px;
    }

    .header-top h2 {
        font-size: 18px;
        color: #fff;
        text-transform: uppercase;
    }

    .top-menu {
        display: flex;
        list-style: none;
        padding: 0;
        margin: 0;
        gap: 15px;
    }

    .top-menu li {
        display: inline-block;
    }

    .top-menu li a {
        text-decoration: none;
        color: #fff;
        font-size: 14px;
    }

    .social-icons a {
        font-size: 18px;
        color: #fff;
        margin-left: 10px;
        transition: color 0.3s;
    }

    .social-icons a:hover {
        color: #555;
    }

    /* Header Content Styles */
    .header-content {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 20px;
        background-color: #fff;
        max-width: 1450px;
        margin: 0 auto;
        border-bottom: 1px solid #ddd;
    }

    .logo img {
        width: 166px;
        height: auto;
    }

    .search-bar {
        flex-grow: 1;
        display: flex;
        align-items: center;
        max-width: 50%;
        margin: 0 20px;
    }

    .search-bar input {
        width: 100%;
        padding: 8px 12px;
        border: 1px solid #ddd;
        border-radius: 5px 0 0 5px;
        font-size: 14px;
    }

    .search-bar button {
        padding: 8px 30px;
        border: none;
        background-color: #333;
        color: #fff;
        border-radius: 0 5px 5px 0;
        cursor: pointer;
        margin: 0;
    }

    .user-actions {
        display: flex;
        align-items: center;
        gap: 20px;
        /* Khoảng cách giữa các phần tử */
    }

    .user-actions a {
        display: flex;
        align-items: center;
        color: #333;
        text-decoration: none;
        font-size: 16px;
        transition: color 0.3s;
        gap: 6px;
    }

    .user-actions a:hover {
        color: #B17010;
    }

    .cart {
        position: relative;
        color: #333;
        font-size: 20px;
        /* Kích thước biểu tượng giỏ hàng */
    }

    .cart-count {
        position: absolute;
        top: -5px;
        right: -10px;
        background-color: red;
        color: white;
        font-size: 12px;
        padding: 2px 5px;
        border-radius: 50%;
        font-weight: bold;
    }

    .login-btn {
        font-size: 16px;
        color: #fff;
        padding: 8px 12px;
        /* Padding cho nút */
        border: 1px solid #fff;
        /* Đường viền trắng */
        border-radius: 5px;
        background-color: transparent;
        transition: background-color 0.3s, color 0.3s;
        border: 1px solid #333;
    }

    .login-btn:hover {
        background-color: #333;
        color: #fff;
    }

    .name_user {
        text-transform: uppercase;
    }

    /* CSS cho phần header bottom */
    .container_header-bottom {
        background-color: #4F2227;
    }

    .header-bottom {
        margin: 0 auto;
        max-width: 1450px;
        padding: 10px 20px;
    }

    .header-bottom ul {
        list-style: none;
        display: flex;
        padding: 0;
        gap: 24px;
        margin: 0;
    }

    .header-bottom li {
        font-size: 20px;
        cursor: pointer;
        transition: color 0.3s;
        text-transform: uppercase;
    }

    .header-bottom li a {
        text-decoration: none;
        color: #fff;
    }

    .header-bottom li:hover {
        color: #B17010;
    }
</style>

<header class="header">
    <div class="container_header-top">
        <div class="header-top">
            <h2>Chào mừng quý khách</h2>
            <ul class="top-menu">
                <li><a href="#">Tin Tức</a></li>
                <li><a href="#">Công Thức Làm Bánh</a></li>
                <li><a href="#">Đại Lý</a></li>
                <li class="social-icons">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                </li>
            </ul>
        </div>
    </div>
    <?php
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $host = $_SERVER['HTTP_HOST'];
    $projectRoot = '/php/web_bandungculambanh';
    $base_url = $protocol . $host . $projectRoot;
    ?>
    <!-- Content Section -->
    <div class="header-content">
        <div class="logo">
            <img src="<?php echo $base_url; ?>/public/images/logo_shop.png" alt="Logo">
        </div>

        <div class="search-bar">
            <input type="text" placeholder="Tìm kiếm sản phẩm...">
            <button type="submit"><i class="fas fa-search"></i></button>
        </div>

        <div class="user-actions">
            <?php
            if (isset($_SESSION['username'])) {
                echo "
                            <a href='$base_url/page/order.php' class='header__nav-item'>
                                <i class='fa-solid fa-table-list'></i>
                                <p>Đơn hàng</p>
                            </a>
                            <a href='$base_url/page/cart.php' class='header__nav-item'>
                                <i class='fa-solid fa-cart-shopping'></i>
                                <p>Giỏ hàng</p>
                            </a>
                        
                            <a  href='$base_url/page/component/logout.php' class='header__nav-item'>
                                <i class='fa-solid fa-right-from-bracket'></i>
                                <p class='name_user'>" . $_SESSION['username'] . "</p>
                            </a>
                        ";
            } else {
                echo " 
                            <a href='$base_url/page/cart.php' class='cart'>
                                <i class='fa-solid fa-cart-shopping'></i>
                            </a>
                            <a href='$base_url/page/login.php' class='login-btn'>Đăng Nhập</a>
                        ";
            }
            ?>
        </div>
    </div>
    <div class="container_header-bottom">
        <div class="header-bottom">
            <ul>
                <li><a href="<?php echo $base_url; ?>/index.php">trang chủ</a></li>
                <li><a href="<?php echo $base_url; ?>/page/products.php">sản phẩm</a></li>
                <li><a href="<?php echo $base_url; ?>/page/contact.php">liên hệ</a></li>
            </ul>
        </div>
    </div>
</header>