<style>
    .container__hot-product {
        margin: 0 auto;
        max-width: 1450px;
        display: flex;
    }

    .hot_product-title {
        flex-basis: 25%;
        padding: 20px;
        border-right: 1px dashed #4F2227;
    }

    .hot_product-title h2 {
        color: #333;
        font-size: 30px;
        font-weight: 700;
        line-height: 30px;
        margin-bottom: 10px;
        text-transform: uppercase;
    }

    .container__hot-product p {
        margin-bottom: 30px;
        color: #666;
        font-size: 20px;
        line-height: 1.55;
        text-align: left;
    }

    .hot_product-items {
        flex-basis: 75%;
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-start;
        padding: 0 20px;
    }

    .product-item {
        background-color: #ffffff;
        border: 1px solid #ddd;
        border-radius: 12px;
        padding: 20px;
        text-align: center;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        width: calc(25% - 20px);
        margin: 10px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .product-item a {
        text-decoration: none;
        color: #000;
    }

    .product-item:hover {
        transform: translateY(-8px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .product-item img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
        margin-bottom: 15px;
        transition: transform 0.3s ease;
    }

    .product-item:hover img {
        transform: scale(1.05);
    }

    .product-title {
        font-size: 18px;
        font-weight: 700;
        color: #333;
        margin: 15px 0 8px;
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        height: 44px;
        text-overflow: ellipsis;
    }


    .product-price {
        color: #e53935;
        font-size: 16px;
        font-weight: 600;
        text-align: center;
    }

    button {
        margin-top: 15px;
        background-color: #4F2227;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 8px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s, transform 0.2s;
    }

    button:hover {
        background-color: #A95B3E;
        transform: scale(1.05);
    }
</style>

<section class="container__hot-product">
    <div class="hot_product-title">
        <h2>Sản phẩm HOT</h2>
        <p>Siêu Thị Ngành Bánh Nhất Hương, hay còn biết đến với tên gọi Bakers’ Mart Nhất Hương. Đây là một nơi mua sắm lý tưởng về những nguyên – phụ liệu và dụng cụ làm bánh được rất nhiều khách hàng yêu thích. Các sản phẩm hot, nổi bật trên thị trường tất cả đều có sẵn. Nhấn vào danh mục dưới đây để xem và khám phá ngay.</p>
        <button>Xem tất cả ></button>
    </div>

    <div class="hot_product-items">
        <?php
        include('config/database.php');
        include('config/url_config.php');
        $sql = "SELECT * FROM products ORDER BY product_id DESC LIMIT 4";
        $conn = getConnection();
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $product_id = $row["product_id"];
                $product_name = $row["product_name"];
                $image_url = $row["image_url"];
                $price = $row["price"];
                $format_price = number_format($price, 0, ",", ".");
        ?>
                <div class="product-item">
                    <a href="<?php echo $base_url; ?>/page/detail_product.php?product_id=<?php echo $product_id; ?>">
                        <img src="public/uploads/<?php echo $image_url; ?>" alt="product_img">
                    </a>
                    <a href="<?php echo $base_url; ?>/page/detail_product.php?product_id=<?php echo $product_id; ?>">
                        <h2 class="product-title"><?php echo htmlspecialchars($product_name); ?></h2>
                    </a>
                    <p class="product-price"><?php echo $format_price; ?>₫</p>
                </div>
        <?php
            }
        } else {
            echo "<p>Không có sản phẩm nào.</p>";
        }

        mysqli_close($conn);
        ?>
    </div>
</section>