<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh mục sản phẩm</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/products.css">

</head>

<body>
    <?php
    session_start();
    include("./component/header.php");
    ?>
    <?php
    include '../config/database.php';
    $conn = getConnection();
    ?>
    <div class="container">
        <?php
        if (isset($_GET['category_id'])) {
            $category_id = $_GET['category_id'];
        } else {
            $sql = "SELECT * FROM categories LIMIT 1";
            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {
                $first_category = $result->fetch_assoc();
                $category_id = $first_category['category_id'];
            }
        }
        if ($category_id === null) {
            header("Location: index.php");
            exit();
        } else {
            $sql1 = "SELECT COUNT(*) as total_products FROM products WHERE category_id = $category_id";
            $result1 = mysqli_query($conn, $sql1);
            if ($result1) {
                $row = mysqli_fetch_assoc($result1);
                $total_products = $row['total_products'];
            }
        }

        ?>
        <div class="content">
            <div class="content-left">
                <div class="content-left-title">
                    <p>DANH MỤC</p>
                </div>
                <?php include './component/category.php' ?>
            </div>
            <div class="content-center">
                <img src="./hinh_anh/userreadbook.jpg" alt="">
                <div class="center-sort">
                    <span>Hiển thị: <strong><?php echo $total_products ?></strong> sản phẩm</span>
                </div>
                <div class="products">
                    <?php
                    $sql = "SELECT * FROM products WHERE category_id = $category_id";
                    require("./component/category_product.php");
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php include './component/footer.php' ?>
</body>

</html>