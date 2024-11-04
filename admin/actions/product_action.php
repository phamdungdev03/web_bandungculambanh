<?php
include('../includes/product_function.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST['action'];
    switch ($action) {
        case 'addProduct':
            $productName = $_POST['product_name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $salePrice = $_POST['sale_price'];
            $quantity = $_POST['quantity'];
            $categoryId = $_POST['category_id'];

            $image = $_FILES['image'];
            $targetDir = '../../public/uploads/';
            $imageName = basename($image['name']);
            $targetFilePath = $targetDir . $imageName;

            if (!file_exists($targetDir)) {
                mkdir($targetDir, 0755, true);
            }

            if (!move_uploaded_file($image['tmp_name'], $targetFilePath)) {
                echo "Lỗi khi tải lên ảnh.";
            }

            if (addProduct($productName, $description, $price, $quantity, $salePrice, $imageName, $categoryId)) {
                echo "Thêm sản phẩm thành công!";
                header("Location: ../indexadmin.php?id=4");
                exit();
            } else {
                echo "Lỗi khi thêm sản phẩm";
            }

            break;
        case 'editProduct':
            $categoryId = $_POST['category_id'];
            $categoryName = $_POST['category_name'];
            if (editCategory($categoryId, $categoryName)) {
                echo "Cập nhật danh mục thành công!";
                header("location: ../indexadmin.php?id=4");
            } else {
                echo "Lỗi khi cập nhật";
            }
            break;
        default:
            break;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['product_id'])) {
        $categoryId = $_GET['product_id'];
        if (deleteProduct($categoryId)) {
            header("Location: ../indexadmin.php?id=4");
        } else {
            header("Location: ../indexadmin.php?id=4");
        }
    }
}
