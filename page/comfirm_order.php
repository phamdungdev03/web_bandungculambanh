<?php
include '../config/database.php';

$conn = getConnection();
$sql = "UPDATE `orders` SET `status`='Confirm' WHERE `order_id`=' " . $_GET['iddh'] . "'";
if (mysqli_query($conn, $sql)) {
    header('location:order.php');
} else {
    $result = "Lỗi thêm mới" . mysqli_error($conn);
}
