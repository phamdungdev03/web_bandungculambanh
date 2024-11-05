<?php
include('../includes/order_function.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST['action'];
    switch ($action) {
        case 'editOrder':
            $orderId = $_POST['order_id'];
            $status = $_POST['status'];
            if (editOrder($orderId, $status)) {
                echo "Cập nhật đơn hàng thành công!";
                header("Location: ../indexadmin.php?id=10");
                exit();
            } else {
                echo "Lỗi khi cập nhật đơn hàng";
            }

            break;
        default:
            break;
    }
}