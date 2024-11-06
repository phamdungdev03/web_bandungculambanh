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

    .search-container input {
        width: 100%;
        padding: 8px 12px;
        border: 1px solid #ddd;
        border-radius: 5px 0 0 5px;
        font-size: 14px;
    }

    .search-container button {
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

    /* css search */
    .header__search-bar {
        position: relative;
        max-width: 600px;
        margin: 0 auto;
        padding: 10px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .search-container {
        display: flex;
        align-items: center;
        width: 600px;
    }

    .search-input:focus {
        border-color: #007bff;
    }

    .search-button {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        background-color: #007bff;
        border: none;
        border-radius: 50%;
        cursor: pointer;
        margin-left: 8px;
        transition: background-color 0.3s;
    }

    .search-button:hover {
        background-color: #0056b3;
    }

    .search-icon {
        width: 20px;
        height: 20px;
        color: #fff;
    }

    .modal-search {
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background-color: #fff;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        z-index: 10;
        border-radius: 8px;
        overflow: hidden;
        max-height: 400px;
        overflow-y: auto;
        display: none;
    }

    .search-background {
        display: none;
        position: fixed;
        inset: 0;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 9;
    }

    .modal-search-container {
        padding: 15px;
    }

    .modal-search-title {
        font-size: 18px;
        font-weight: 600;
        color: #333;
        margin-bottom: 12px;
    }

    .modal-search-list {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .search-item {
        display: flex;
        align-items: center;
        padding: 8px;
        gap: 10px;
        text-decoration: none;
        color: #333;
        border-bottom: 1px solid #f0f0f0;
        transition: background-color 0.3s;
    }

    .search-item:hover {
        background-color: #f9f9f9;
    }

    .search-item img {
        width: 50px;
        height: 50px;
        object-fit: cover;
        border-radius: 5px;
    }

    .search-item-info {
        display: flex;
        flex-direction: column;
    }

    .search-item-info__name {
        font-size: 16px;
        font-weight: 500;
        color: #333;
        margin: 0;
        line-height: 1.2;
    }

    .search-item-info__price {
        font-size: 14px;
        font-weight: 400;
        color: #007bff;
    }

    .search-no-product {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 20px;
        color: #888;
        text-align: center;
    }

    .search-no-product img {
        width: 100px;
        margin-bottom: 12px;
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
    $scriptName = $_SERVER['SCRIPT_NAME'];
    $path = str_replace(basename($scriptName), '', $scriptName);

    $base_url = $protocol . $host . $path;
    $base_url = rtrim($base_url, '/page');
    ?>

    <!-- Content Section -->
    <div class="header-content">
        <div class="logo">
            <img src="<?php echo $base_url; ?>/public/images/logo_shop.png" alt="Logo">
        </div>

        <div class="header__search-bar">
            <?php
            include(__DIR__ . '/../../config/database.php');
            $conn = getConnection();

            if (isset($_GET["s1"]) && !empty($_GET["s1"])) {
                $key = mysqli_real_escape_string($conn, trim($_GET["s1"]));
                $sql = "SELECT product_id, product_name, image_url, price 
                    FROM products 
                    WHERE (product_id LIKE '%$key%') 
                        OR (product_name LIKE '%$key%') 
                        OR (image_url LIKE '%$key%') 
                        OR (price LIKE '%$key%');";

                $result = mysqli_query($conn, $sql);
            } else {
                $sql = "SELECT * FROM products ORDER BY price DESC LIMIT 4;";
                $result = mysqli_query($conn, $sql);
            }
            ?>
            <div id="modal-search" class='modal-search'>
                <div id="background-close" class='search-background'></div>
                <div class='modal-search-container'>
                    <div class='search-container-wrapper'>
                        <div class='modal-search-title'>
                            <span>Sản phẩm gợi ý</span>
                        </div>
                        <div class='modal-search-list'>
                            <?php
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $product_id = $row['product_id'];
                                    $product_name = $row['product_name'];
                                    $product_image = $row['image_url'];
                                    $price = number_format($row['price'], 0, ',', '.') . 'đ';
                                    echo "<a href='$base_url/page/detail_product.php?product_id=$product_id' class='search-item'>
                                    <img src='$base_url/public/uploads/$product_image' alt='$product_name' />
                                    <div class='search-item-info'>
                                        <p class='search-item-info__name'>$product_name</p>
                                        <div class='search-item-info__price'>
                                            <p class='search-item-price__new'>$price</p>
                                        </div>
                                    </div>
                                </a>";
                                }
                            } else {
                                echo "<div class='search-no-product'>
                                        <img src='https://deo.shopeemobile.com/shopee/shopee-pcmall-live-sg/search/a60759ad1dabe909c46a.png' alt='' />
                                        <p>Chưa có kết quả tìm kiếm nào.</p>
                                        <span>Vui lòng sử dụng những từ khóa chung.</span>
                                      </div>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <form id="searchForm" method="get" class="search-container">
                <input id="s1" type="text" name="s1" placeholder="Bạn cần tìm gì ..." value="<?php if (isset($_GET["s1"])) {
                                                                                                    echo trim($_GET["s1"]);
                                                                                                }
                                                                                                ?>" />
                <button type="submit"><i class="fas fa-search"></i></button>
            </form>
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

<script>
    var search = document.getElementById('s1');
    var modal = document.getElementById('modal-search');
    var background = document.getElementById('background-close');

    search.addEventListener('click', function(event) {
        event.stopPropagation();
        modal.style.display = 'block';
    });

    background.addEventListener('click', function() {
        modal.style.display = 'none';
    });

    document.addEventListener('click', function(event) {
        if (!modal.contains(event.target) && event.target !== search) {
            modal.style.display = 'none';
        }
    });

    window.addEventListener('load', () => {
        const currentPath = window.location.pathname;
        const currentUrl = window.location.href;
        const isCartPage = currentPath.includes('/page/cart.php');
        const isEditAction = currentUrl.includes('action=edit');
        if (!(isCartPage && !isEditAction)) {
            localStorage.removeItem('selectedCartIds');
        }
    });
</script>