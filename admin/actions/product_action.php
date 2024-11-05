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
            $timestamp = time();
            $imageName = $timestamp . '_' . basename($image['name']);
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
            $productId = $_POST['product_id'];
            $productName = $_POST['product_name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $salePrice = $_POST['sale_price'];
            $quantity = $_POST['quantity'];
            $categoryId = $_POST['category_id'];

            $image = $_FILES['image'];
            $existingImage = $_POST['existing_image'];

            $targetDir = '../../public/uploads/';
            $newImageName = "";
            if ($image && !empty($image['name'])) {
                $timestamp = time();
                $imageName = $timestamp . '_' . basename($image['name']);
                $targetFilePath = $targetDir . $imageName;

                if (!file_exists($targetDir)) {
                    mkdir($targetDir, 0755, true);
                }

                if (!empty($existingImage) && file_exists($targetDir . $existingImage)) {
                    unlink($targetDir . $existingImage);
                }

                if (move_uploaded_file($image['tmp_name'], $targetFilePath)) {
                    $newImageName = $imageName;
                }
            } else {
                $newImageName = $existingImage;
            }

            if (editProduct($productId, $productName, $description, $price, $quantity, $salePrice, $newImageName, $categoryId)) {
                echo "Cập nhật sản phẩm thành công!";
                header("Location: ../indexadmin.php?id=4");
                exit();
            } else {
                echo "Lỗi khi cập nhật sản phẩm";
            }

            break;
        default:
            break;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['product_id'])) {
        $productId = $_GET['product_id'];
        $product = getProductById($productId);
        if ($product) {
            $imageName = $product['image_url'];
            if (deleteProduct($productId)) {
                $targetFilePath = '../../public/uploads/' . $imageName;
                if (file_exists($targetFilePath)) {
                    unlink($targetFilePath);
                }
                header("Location: ../indexadmin.php?id=4");
                exit();
            } else {
                echo "<script>
                        alert('Lỗi khi xóa sản phẩm!');
                        window.location.href = '../indexadmin.php?id=4';
                      </script>";
                exit();
            }
        }
    }
}
