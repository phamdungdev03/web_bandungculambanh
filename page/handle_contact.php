<?php
include("../config/database.php");
session_start();

if (!isset($_SESSION['user_id'])) {
    echo "<script>
            alert('Bạn cần đăng nhập trước');
            window.location.href = 'login.php'; // Chuyển hướng đến trang đăng nhập
          </script>";
    exit();
}

if (isset($_POST['btn_submit'])) {
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    $user_id = $_SESSION['user_id'];
    $user_name = $_SESSION['username'];

    $conn = getConnection();

    $sql = "INSERT INTO contact (user_id, user_name, email, phone_number, message) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issss", $user_id, $user_name, $email, $phone, $message);

    if ($stmt->execute()) {
        echo "<script>
                alert('Thông tin của bạn đã được gửi thành công!');
                window.location.href = 'http://localhost/web_dungculambanh/index.php'; 
              </script>";
    } else {
        echo "Lỗi gửi: " . $stmt->error;
    }

    // Đóng kết nối
    $stmt->close();
    $conn->close();
}
