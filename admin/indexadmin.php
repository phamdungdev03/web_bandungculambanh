<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Quản Trị</title>
</head>

<?php
include('./components/head.php');
?>

<body>
    <?php
    $defaultPage = 'dashboard.php';
    $pages = [
        "1" => "./categories/listCategory.php",
        "2" => "./categories/addCategory.php",
        "3" => "./categories/editCategory.php",
        "4" => "./products/listProduct.php",
        "5" => "./products/addProduct.php",
        "6" => "./products/editProduct.php",
        "7" => "./users/listUser.php",
        "8" => "./users/addUser.php",
        "9" => "./users/editUser.php",
        "10" => "./orders/listOrder.php",
        "11" => "./orders/editOrder.php"
    ];
    $id = $_GET["id"] ?? null;
    $trang = $pages[$id] ?? 'dashboard.php';
    ?>
    <section>
        <?php include './components/header.php' ?>
        <?php include './components/sidebar.php' ?>
        <section id="main-content">
            <section class="wrapper">
                <?php include "$trang" ?>
            </section>
            <?php include './components/footer.php'; ?>
        </section>
        <?php include './components/script.php'; ?>
    </section>
</body>

</html>