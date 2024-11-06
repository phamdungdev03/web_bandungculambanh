<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/cart.css">
</head>

<body>
    <?php
    session_start();
    include("./component/header.php");
    ?>
    <?php
    include '../config/database.php';
    if (isset($_SESSION['username'])) {
        $error = false;
        $success = false;
        if (isset($_GET['action'])) {
            function addToCart($customer_id, $product_id, $quantity)
            {
                if (!isset($customer_id) || !isset($product_id) || !isset($quantity)) {
                    echo "Error: One of the required parameters is missing.";
                    return;
                }

                $conn = getConnection();
                $sql1 = "SELECT cart_id FROM cart WHERE user_id = $customer_id";
                $result1 = $conn->query($sql1);

                if ($result1->num_rows > 0) {
                    $row = $result1->fetch_assoc();
                    $cart_id = $row['cart_id'];
                } else {
                    $sql2 = "INSERT INTO cart (user_id) VALUES ($customer_id)";
                    if ($conn->query($sql2) === TRUE) {
                        $cart_id = $conn->insert_id;
                    } else {
                        echo "Error: " . $sql2 . "<br>" . $conn->error;
                        return;
                    }
                }

                $sql3 = "SELECT quantity FROM cart_items WHERE cart_id = $cart_id AND product_id = $product_id";
                $result3 = $conn->query($sql3);

                $sql7 = "SELECT * from products where product_id = $product_id";
                $resultProduct = $conn->query($sql7);

                if ($resultProduct->num_rows > 0) {
                    $product = $resultProduct->fetch_assoc();
                    $price = $product['price'];
                }

                if ($result3->num_rows > 0) {

                    $row = $result3->fetch_assoc();
                    $new_quantity = $row['quantity'] + $quantity;
                    $sql4 = "UPDATE cart_items SET quantity = $new_quantity WHERE cart_id = $cart_id AND product_id = $product_id";
                    $conn->query($sql4);
                } else {
                    $sql5 = "INSERT INTO cart_items (cart_id, product_id, quantity) VALUES ($cart_id, $product_id, $quantity)";
                    $conn->query($sql5);
                }
            }

            function updateCart($cart_item_id, $product_id, $quantity)
            {
                $conn = getConnection();
                if ($quantity > 0) {
                    $sql = "UPDATE cart_items SET quantity = $quantity Where cart_item_id = $cart_item_id and product_id = $product_id";
                    $conn->query($sql);
                }
            }

            function deleteCart($cart_id, $cart_item_id)
            {
                $conn = getConnection();
                $sql = "DELETE FROM cart_items WHERE cart_item_id = $cart_item_id";
                $conn->query($sql);

                $sql_check = "SELECT COUNT(*) as total FROM cart_items WHERE cart_id = $cart_id";
                $result = $conn->query($sql_check);
                if ($result) {
                    $row = $result->fetch_assoc();
                    $total = $row['total'];
                    if ($total == 0) {
                        $sql_delete = "DELETE FROM cart where cart_id = $cart_id";
                        $conn->query($sql_delete);
                    }
                }
            }

            function deleteCartWhenByProduct($customerId, $conn)
            {
                $sql1 = "SELECT cart_id FROM cart WHERE user_id = $customerId";
                $result1 = $conn->query($sql1);

                if ($result1->num_rows > 0) {
                    $row = $result1->fetch_assoc();
                    $cart_id = $row['cart_id'];
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        if (isset($_POST['sendIds'])) {
                            $selectedIds = json_decode($_POST['sendIds'], true);
                            if (json_last_error() === JSON_ERROR_NONE) {
                                foreach ($selectedIds as $id) {
                                    $sql2 = "SELECT cart_item_id FROM cart_items WHERE cart_item_id = $id";
                                    $result2 = $conn->query($sql2);
                                    if ($result2->num_rows > 0) {
                                        while ($itemRow = $result2->fetch_assoc()) {
                                            $cart_item_id = $itemRow['cart_item_id'];
                                            deleteCart($cart_id, $cart_item_id);
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }

            switch ($_GET['action']) {
                case "add";
                    $customer_id = $_SESSION['user_id'];
                    if (isset($_POST['quantity'])) {
                        foreach ($_POST['quantity'] as $productID => $quantity) {
                            addToCart($customer_id, $productID, $quantity);
                        }
                    }
                    // header("location:giohang.php");
                    break;
                case "delete":
                    if (isset($_GET['id']) && isset($_GET['cart_id'])) {
                        $cart_item_id = intval($_GET['id']);
                        $cart_id = intval($_GET['cart_id']);
                        deleteCart($cart_id, $cart_item_id);
                    }
                    // header("location:giohang.php");
                    break;
                case "edit":
                    $cart_item_id = intval($_POST['cart_item_id']);
                    $quantity = intval($_POST['quantity']);
                    $product_id = intval($_POST['product_id']);
                    updateCart($cart_item_id, $product_id, $quantity);
                    // header("location:giohang.php");
                    break;
                case "submit":
                    if (empty($_POST['ten'])) {
                        $error = "Bạn chưa nhập tên của người nhận";
                    } else if (empty($_POST['sdt'])) {
                        $error = "Bạn chưa nhập số điện thoại";
                    } else if (empty($_POST['diachicuthe'])) {
                        $error = "Bạn chưa chưa nhập địa chỉ cụ thể";
                    } else if (empty($_POST['email'])) {
                        $error = "Bạn chưa chưa nhập email";
                    } else if (empty($_POST['quantity'])) {
                        $error = "Giỏ hàng rỗng";
                    }
                    if ($error == false) {
                        $conn = getConnection();
                        $customer_id = $_SESSION['user_id'];

                        $sql = "SELECT cart_id FROM cart WHERE user_id = $customer_id";
                        $resultCartItem = $conn->query($sql);
                        if ($resultCartItem->num_rows > 0) {
                            $row = $resultCartItem->fetch_assoc();
                            $cart_id = $row['cart_id'];
                        }

                        $total_amount = 0;
                        $resultUser = $conn->query("SELECT * from users where user_id = $customer_id");


                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            if (isset($_POST['sendIds'])) {
                                $selectedIds = json_decode($_POST['sendIds'], true);
                                if (json_last_error() === JSON_ERROR_NONE) {
                                    foreach ($selectedIds as $id) {
                                        $sql2 = "SELECT ci.quantity, p.price 
                                                  FROM cart_items ci
                                                  JOIN products p ON ci.product_id = p.product_id
                                                  WHERE ci.cart_item_id = $id";
                                        $result2 = $conn->query($sql2);

                                        if ($result2 && $result2->num_rows > 0) {
                                            while ($itemRow = $result2->fetch_assoc()) {
                                                $total = $itemRow["quantity"] * $itemRow["price"];
                                                $total_amount += $total;
                                            }
                                        }
                                    }
                                }
                            }
                        }


                        $userRow = $resultUser->fetch_assoc();
                        $user_id = $_SESSION['user_id'];
                        $customer_name = $_POST['ten'];
                        $customer_address = $_POST['diachicuthe'];
                        $customer_email = $_POST['email'];
                        $customer_phone = $_POST['sdt'];

                        date_default_timezone_set('Asia/Ho_Chi_Minh');
                        $currentTime = time();
                        $sql2 = "INSERT INTO `orders`( `user_id`,`order_date`, `total_amount`, `status`)
                VALUES ('$user_id', '$currentTime', '$total_amount', 'Pending')";
                        $inserntOrder = mysqli_query($conn, $sql2);
                        $last_id = mysqli_insert_id($conn);

                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            if (isset($_POST['sendIds'])) {
                                $selectedIds = json_decode($_POST['sendIds'], true);
                                if (json_last_error() === JSON_ERROR_NONE) {
                                    foreach ($selectedIds as $id) {
                                        // Sử dụng JOIN để lấy thông tin giá từ bảng products
                                        $sql4 = "SELECT ci.quantity, p.price, ci.product_id 
                                                  FROM cart_items ci 
                                                  JOIN products p ON ci.product_id = p.product_id 
                                                  WHERE ci.cart_item_id = $id";
                                        $result4 = $conn->query($sql4);

                                        if ($result4 && $result4->num_rows > 0) {
                                            while ($itemRow = $result4->fetch_assoc()) {
                                                $price = $itemRow['price'];
                                                $quantity = $itemRow['quantity'];
                                                $product_id = $itemRow['product_id'];

                                                // Chèn thông tin vào bảng order_items
                                                $sql3 = "INSERT INTO `order_items`(`order_id`, `price`, `quantity`, `product_id`) 
                                                          VALUES ('$last_id', '$price', '$quantity', '$product_id')";
                                                $insertOrder = mysqli_query($conn, $sql3);

                                                // Kiểm tra lỗi khi chèn dữ liệu
                                                if (!$insertOrder) {
                                                    echo "Lỗi khi chèn đơn hàng: " . mysqli_error($conn);
                                                }
                                            }
                                        }
                                    }
                                    $success = "Đặt hàng thành công";
                                    echo "
                                    <script>
                                        localStorage.removeItem('selectedCartIds');
                                    </script>
                                    ";
                                    deleteCartWhenByProduct($customer_id, $conn);
                                }
                            }
                        }
                    }
                    break;
            }
        }
        $conn = getConnection();
        $customer_id = $_SESSION['user_id'];
        $sql = "SELECT products.product_name, products.image_url,cart.cart_id,cart_items.cart_item_id,
         products.price, cart_items.quantity, cart_items.product_id 
        FROM cart 
        JOIN cart_items ON cart.cart_id = cart_items.cart_id 
        JOIN products ON cart_items.product_id = products.product_id
        WHERE cart.user_id = $customer_id";
        $result = mysqli_query($conn, $sql);
    ?>
        <br>
        <br>
        <?php if (!empty($error)) { ?>
            <div style=" margin-left: 245px;" id="notify-msg">

                <?= $error ?>. <a href="javascript:history.back()">Quay lại</a>

            </div>
        <?php } else if (!empty($success)) { ?>
            <div style=" margin-left: 245px;" id="notify-msg">

                <?= $success ?>. <a href="donhang.php">Tiếp tục vào trang đơn hàng</a>

            </div>
        <?php
        } else { ?>
            <div id="cart" class="container">
                <div class="cart-head">
                    <p>GIỎ HÀNG</p>(
                    <span>
                        <?php
                        if ($result && mysqli_num_rows($result) > 0) {
                            $totalProducts = mysqli_num_rows($result);
                            echo "<strong>$totalProducts</strong> sản phẩm";
                        }
                        ?>
                    </span>
                    )
                </div>
                <form id="sendIdsForm" action="cart.php?action=submit" method="POST">
                    <div class="cart-left">
                        <div class="cart-title">
                            <div class="cart-title-title">
                                <input type="checkbox" class="checkbox-all">
                                <span>Chọn tất cả
                                    <?php
                                    if ($result && mysqli_num_rows($result) > 0) {
                                        $totalProducts = mysqli_num_rows($result);
                                        echo "($totalProducts sản phẩm)";
                                    }
                                    ?>
                                </span>
                            </div>
                            <div class="cart-title-content">
                                <p>Số lượng</p>
                                <p>Thành tiền</p>
                            </div>
                        </div>
                        <div class="cart-content">
                            <?php
                            if ($result && mysqli_num_rows($result) > 0) {
                                $total = 0;
                                while ($row = mysqli_fetch_array($result)) {   ?>
                                    <div class="cart-item">
                                        <div class="cart-item-left">
                                            <input type="checkbox" class="cart-checkbox" data-cart-id="<?= $row["cart_item_id"] ?>">
                                            <img src="../public/uploads/<?= $row["image_url"] ?>" alt="image">
                                            <p><?= $row["product_name"] ?></p>
                                        </div>
                                        <div class="cart-item-center">
                                            <div class="cart-item-center__quantity">
                                                <span id="prev" data-product_id="<?= $row["product_id"] ?>" data-cart-id="<?= $row["cart_item_id"] ?>">-</span>
                                                <input id="quantity" name="quantity" type="number" min="1" value="<?= $row["quantity"] ?>" data-product_id="<?= $row["product_id"] ?>" data-cart-id="<?= $row["cart_item_id"] ?>">
                                                <span id="add" data-product_id="<?= $row["product_id"] ?>" data-cart-id="<?= $row["cart_item_id"] ?>">+</span>
                                            </div>
                                            <span class="cart-item-center__total"><?= number_format($row["quantity"] * $row["price"], 0, ",", ","); ?>₫</span>
                                        </div>
                                        <a class="cart-remove" href="cart.php?action=delete&id=<?= $row["cart_item_id"] ?>&cart_id=<?= $row["cart_id"] ?>" style="text-decoration: none;">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </div>
                                <?php
                                }
                                ?>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="cart-center">
                        <div class="cart-shipping">
                            <p>Thông tin nhận hàng</p>
                            <div class="cart-shipping-input">
                                <input type="text" name="ten" placeholder="Người nhận" />
                                <input type="text" name="sdt" placeholder="Số điện thoại" />
                                <input type="text" name="diachicuthe" placeholder="Địa chỉ cụ thể" />
                                <input type="email" name="email" placeholder="Email" />
                            </div>
                        </div>
                        <?php
                        $hasValidId = false;
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            if (isset($_POST['selectedIds'])) {
                                $selectedIds = json_decode($_POST['selectedIds'], true);
                                foreach ($selectedIds as $id) {
                                    $hasValidId = true;
                                    $conn = getConnection();
                                    $sql1 = "SELECT ci.*, p.price AS product_price FROM cart_items ci
                                              JOIN products p ON ci.product_id = p.product_id
                                              WHERE ci.cart_item_id = $id";
                                    $result = mysqli_query($conn, $sql1);

                                    if ($row = $result->fetch_assoc()) {
                                        $total += $row['product_price'] * $row['quantity'];
                                    }
                                }

                        ?>
                                <div class="cart-detail">
                                    <div class="cart-detail-price">
                                        <p>Thành tiền</p>
                                        <span><?php echo number_format($total, 0, ',', '.'); ?>đ</span>
                                    </div>
                                    <div class="cart-detail-total">
                                        <p>Tổng số tiền (gồm VAT)</p>
                                        <span><?php echo number_format($total, 0, ',', '.'); ?>đ</span>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>
                        <input type="hidden" name="sendIds" id="sendIdsInput">
                        <input class="checkout <?php echo !$hasValidId ? 'disabled-btn' : ''; ?>" value="THANH TOÁN" onclick="buyProduct()">
                    </div>
            </div>
            </form>
            <form id="updateCartForm" action="cart.php?action=edit" method="POST" style="display:none;">
                <input type="hidden" name="cart_item_id" id="hiddenCartId">
                <input type="hidden" name="product_id" id="hiddenProductId">
                <input type="hidden" name="quantity" id="hiddenQuantity">
            </form>
            <form id="myForm" method="POST" action="cart.php">
                <input type="hidden" name="selectedIds" id="selectedIds">
            </form>
            <form id="cart-list-form" action="cart.php?action=select" method="POST">
                <input type="hidden" name="cartIds" id="cartIds">
            </form>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
            <script>
                function addToT() {
                    <?php

                    echo "window.location.href='index.php';";
                    ?>
                }
            </script>
    <?php
        }
    } else {
        echo " <div class='popup' id='popup'>
        <div class='popup-content'>
            <p>Bạn không thể thêm hoặc vào giỏ hàng vì chưa đăng nhập. Vui lòng đăng nhập tại đây.<a href='login.php'> Đăng nhập</a>.</p>
        </div>
    </div>";
    }
    ?>

    <?php
    include("./component/footer.php");
    ?>
    <script>
        let selectedCartIds = JSON.parse(localStorage.getItem('selectedCartIds')) || [];
        const selectAllCheckbox = document.querySelector('.checkbox-all');
        const checkboxes = document.querySelectorAll('.cart-checkbox');

        document.querySelectorAll('.cart-item-center__quantity').forEach(countdown => {
            const prev = countdown.querySelector('#prev');
            const add = countdown.querySelector('#add');
            const quantityInput = countdown.querySelector('#quantity');

            prev.onclick = () => {
                var currentValue = parseInt(quantityInput.value);
                if (currentValue > 1) {
                    quantityInput.value = currentValue - 1;
                    updateHidden(prev, quantityInput.value);
                }
            }

            add.onclick = () => {
                var currentValue = parseInt(quantityInput.value);
                quantityInput.value = currentValue + 1;
                updateHidden(add, quantityInput.value);
            }
        });

        function updateHidden(element, quantity) {
            const cartId = element.dataset.cartId;
            const productId = element.dataset.product_id;
            document.getElementById('hiddenCartId').value = cartId;
            document.getElementById('hiddenProductId').value = productId;
            document.getElementById('hiddenQuantity').value = quantity;
            document.getElementById('updateCartForm').submit();
        }

        checkboxes.forEach(checkbox => {
            const cartId = checkbox.getAttribute('data-cart-id');
            if (selectedCartIds.includes(cartId)) {
                checkbox.checked = true;
            }
        });

        if (checkboxes.length === selectedCartIds.length) {
            selectAllCheckbox.checked = true;
        }

        selectAllCheckbox.addEventListener('change', (event) => {
            const isChecked = event.target.checked;
            checkboxes.forEach(checkbox => {
                checkbox.checked = isChecked;
                const cartId = checkbox.getAttribute('data-cart-id');
                if (isChecked) {
                    if (!selectedCartIds.includes(cartId)) {
                        selectedCartIds.push(cartId);
                    }
                } else {
                    selectedCartIds = [];
                }
            });
            localStorage.setItem('selectedCartIds', JSON.stringify(selectedCartIds));
            sendCartIds();
        });

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', (event) => {
                const cartId = event.target.getAttribute('data-cart-id');
                if (event.target.checked) {
                    if (!selectedCartIds.includes(cartId)) {
                        selectedCartIds.push(cartId);
                    }
                } else {
                    selectedCartIds = selectedCartIds.filter(id => id !== cartId);
                    selectAllCheckbox.checked = false;
                }

                if (checkboxes.length === selectedCartIds.length) {
                    selectAllCheckbox.checked = true;
                }
                localStorage.setItem('selectedCartIds', JSON.stringify(selectedCartIds));
                sendCartIds();
            });
        });

        function buyProduct() {
            document.getElementById('sendIdsInput').value = JSON.stringify(selectedCartIds);
            document.getElementById('sendIdsForm').submit();
        }

        function sendCartIds() {
            document.getElementById('selectedIds').value = JSON.stringify(selectedCartIds);
            document.getElementById('myForm').submit();
        }
        window.addEventListener('load', () => {
            if (!localStorage.getItem('selectedCartIds')) {
                selectedCartIds = [];
                selectAllCheckbox.checked = false;
                checkboxes.forEach(checkbox => {
                    checkbox.checked = false;
                });
            }
        })
    </script>
</body>


</html>