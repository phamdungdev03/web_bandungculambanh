<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .conatainer_header-top {
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
        width: 100px;
        height: auto;
    }

    .search-bar {
        flex-grow: 1;
        display: flex;
        align-items: center;
        max-width: 400px;
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
        padding: 8px 12px;
        border: none;
        background-color: #333;
        color: #fff;
        border-radius: 0 5px 5px 0;
        cursor: pointer;
    }

    .user-actions {
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .cart {
        position: relative;
        color: #333;
        font-size: 20px;
        text-decoration: none;
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
    }

    .login-btn {
        font-size: 16px;
        color: #333;
        text-decoration: none;
        padding: 5px 10px;
        border: 1px solid #333;
        border-radius: 5px;
        transition: background-color 0.3s, color 0.3s;
    }

    .login-btn:hover {
        background-color: #333;
        color: #fff;
    }

    /* css header bottom */
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
        color: #fff;
        cursor: pointer;
        transition: color 0.3s;
        text-transform: uppercase;
    }

    .header-bottom li:hover {
        color: #B17010;
    }
</style>

<header class="header">
    <div class="conatainer_header-top">
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

    <!-- Content Section -->
    <div class="header-content">
        <!-- Logo -->
        <div class="logo">
            <img src="../../public/images/logo_shop.png" alt="Logo">
        </div>

        <!-- Search Bar -->
        <div class="search-bar">
            <input type="text" placeholder="Tìm kiếm sản phẩm...">
            <button type="submit"><i class="fas fa-search"></i></button>
        </div>

        <!-- Cart and Login -->
        <div class="user-actions">
            <a href="#" class="cart">
                <i class="fas fa-shopping-cart"></i>
                <span class="cart-count">0</span>
            </a>
            <a href="./page/login.php" class="login-btn">Đăng Nhập</a>
        </div>
    </div>
    <div class="container_header-bottom">
        <div class="header-bottom">
            <ul>
                <li>trang chủ</li>
                <li>sản phẩm</li>
                <li>liên hệ</li>
            </ul>
        </div>
    </div>
</header>