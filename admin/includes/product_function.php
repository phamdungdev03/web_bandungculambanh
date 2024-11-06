<?php
include(__DIR__ . '/../../config/database.php');

function getAllProducts()
{
    $conn = getConnection();
    $sql = "SELECT p.product_id, p.product_name, p.quantity, p.price, p.category_id, c.category_name, p.image_url FROM products p LEFT JOIN categories c ON p.category_id = c.category_id";
    $result = $conn->query($sql);
    return $result;
}

function getProductById($productId)
{
    $conn = getConnection();
    $sql = "SELECT * FROM products WHERE product_id = ?";
    $st = $conn->prepare($sql);
    $st->bind_param("s", $productId);
    $st->execute();
    $result = $st->get_result();
    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
        return $product;
    }
}

function addProduct($productName, $description, $price, $quantity, $salePrice, $imageUrl, $categoryId)
{
    $conn = getConnection();
    $sql = "INSERT INTO products(product_name,description,price, quantity, sale_price, image_url, category_id) VALUES(?,?,?,?,?,?,?)";
    $st = $conn->prepare($sql);
    $st->bind_param("ssdidsi", $productName, $description, $price, $quantity, $salePrice, $imageUrl, $categoryId);
    if ($st->execute()) {
        return true;
    } else {
        return false;
    }
    $conn->close();
    $st->closse();
}

function editProduct($productId, $productName, $description, $price, $quantity, $salePrice, $imageUrl, $categoryId)
{
    $conn = getConnection();
    $sql = "UPDATE products SET product_name = ?,description = ?, price = ?, quantity = ?, sale_price = ?, image_url = ?, category_id = ? WHERE product_id = ?";
    $st = $conn->prepare($sql);
    $st->bind_param("ssdidsis", $productName, $description, $price, $quantity, $salePrice, $imageUrl, $categoryId, $productId);
    if ($st->execute()) {
        return true;
    } else {
        return false;
    }
    $conn->close();
    $st->closse();
}

function deleteProduct($productId)
{
    $conn = getConnection();
    $sql = "DELETE FROM products WHERE product_id = ?";
    $st = $conn->prepare($sql);
    $st->bind_param("s", $productId);

    if ($st->execute()) {
        return true;
    } else {
        return false;
    }

    $st->close();
    $conn->close();
}

function updateProductQuantity($productId, $quantity)
{
    $conn = getConnection();
    $currentProdct = getProductById($productId);
    $quantityCurent = $currentProdct['quantity'];
    $newQuantity = $quantityCurent - $quantity;
    $newQuantity = max(0, $newQuantity);
    $sql = "UPDATE products SET quantity = ? WHERE product_id = ?";
    $st = $conn->prepare($sql);
    $st->bind_param("is", $newQuantity, $productId);
    if ($st->execute()) {
        return true;
    } else {
        return false;
    }
    $conn->close();
    $st->closse();
}
