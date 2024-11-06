<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Chi tiết sản phẩm</title>
    <link rel="stylesheet" href="./chitietsanpham.css">
    <link rel="shortcut icon" href="./hinh_anh/logo.png" />
    <link rel="stylesheet" href="./css/detail_product.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>

<body>
    <?php
    session_start();
    include("./component/header.php");
    ?>

    <?php
    include("../config/database.php");
    $product_id = $_GET["product_id"];
    $sql = "SELECT * From `products` where product_id = $product_id";
    $conn = getConnection();
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $product_id = $row["product_id"];
        $product_name = $row["product_name"];
        $image_url = $row["image_url"];
        $gia = $row["price"];
        $mota = $row["description"];
        $parsed_gia = number_format($gia, 0, ",", ",");
        $category_id = $row['category_id'];
    }
    if ($category_id) {
        $sql1 = "SELECT * From categories where category_id = $category_id";
        $result1 = mysqli_query($conn, $sql1);
        while ($row = mysqli_fetch_assoc($result1)) {
            $category_name = $row['category_name'];
        }
    }

    ?>
    <div class="detail container">
        <div class="detail-info">
            <img src="../public/uploads/<?php echo $image_url ?>" alt="image">
            <div class="detail-info-detail">
                <p class="detail-info-title"><?php echo $product_name ?></p>
                <div class="detail-info-price">
                    <p class="new-price"><?php echo $parsed_gia ?> VNĐ</p>
                </div>
                <div class="detail-info-category">
                    <span>Danh mục:
                        <a href="./danhmucsanpham.php?category_id=<?php echo $category_id ?>"><?php echo $category_name ?></a>
                    </span>
                </div>
                <div class="detail-info-quantity">
                    <form action="cart.php?action=add" method="POST">
                        <div class="detail-info-quantity__number">
                            <div class="detail-info-quantity__number-option">
                                <span id="prev">-</span>
                                <input type="number" id="quantity" value="1" name="quantity[<?php echo $product_id ?>]">
                                <span id="add">+</span>
                            </div>
                        </div>
                        <div class="detail-btn">
                            <input type="submit" name="" id="" onclick="addToCart()" value="Thêm Giỏ Hàng">
                            <input type="submit" id="add-to-cart-btn" onclick="addToCart()" value="Thanh Toán Ngay">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="detail-description">
            <div class="detail-description-title">
                <span>MÔ TẢ</span>
                <div class="line-description"></div>
            </div>
            <hr>
            <div class="detail-description-content">
                <p><?php echo $mota ?></p>
            </div>
        </div>
    </div>

    <div class="product-same container">
        <div class="product-same">
            <h1>CÁC SẢN PHẨM KHÁC</h1>
            <div class="line-productsame"></div>
        </div>
        <hr>
        <div style="margin-top: 30px;" class="products">
            <?php
            $conn = getConnection();
            $sql = "SELECT * From products WHERE category_id = $category_id AND product_id != $product_id";
            require('./component/related_products.php')
            ?>
        </div>
    </div>
    </main>

    </div>
    </div>
    <?php include './component/footer.php'; ?>
</body>

</html>
<script>
    function addToCart() {
        <?php
        if (isset($_SESSION['username'])) {
            echo "alert('Thêm vào giỏ hàng thành công!');";
        } else {
            echo "alert('Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng!');";
        }
        ?>
    }
    var prev = document.getElementById("prev");
    var add = document.getElementById("add");
    var quantity = document.getElementById("quantity");

    prev.onclick = () => {
        var currentValue = parseInt(quantity.value);
        if (currentValue > 1) {
            quantity.value = currentValue - 1;
        }
    }

    add.onclick = () => {
        var currentValue = parseInt(quantity.value);
        quantity.value = currentValue + 1;
    }
</script>