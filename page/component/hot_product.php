<section>
    <div>
        <h2>Sản phẩm HOT</h2>
        <p>Siêu Thị Ngành Bánh Nhất Hương, hay còn biết đến với tên gọi Bakers’ Mart Nhất Hương. Đây là một nơi mua sắm lý tưởng về những nguyên – phụ liệu và dụng cụ làm bánh được rất nhiều khách hàng yêu thích. Các sản phẩm hot, nổi bật trên thị trường tất cả đều có sẵn. Nhấn vào danh mục dưới đây để xem và khám phá ngay.</p>
        <button>Xem tất cả ></button>
    </div>

    <div>
        <?php
        include("./config/database.php");
        $sql = "SELECT * FROM products ORDER BY product_id DESC LIMIT 4";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $product_id = $row["product_id"];
            $product_name = $row["product_name"];
            $image_url = $row["image_url"];
            $price = $row["price"];
        } else {
        }
        ?>
    </div>
</section>