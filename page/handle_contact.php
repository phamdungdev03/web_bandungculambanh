<?php
include("../config/database.php");
session_start();

if (!isset($_SESSION['user_id'])) {
    echo "<script>
            alert('Bạn cần đăng nhập trước');
            window.location.href = 'login.php';
          </script>";
    exit();
}

$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$host = $_SERVER['HTTP_HOST'];
$scriptName = $_SERVER['SCRIPT_NAME'];
$path = str_replace(basename($scriptName), '', $scriptName);

$base_url = $protocol . $host . $path;
$base_url = rtrim($base_url, '/page');

if (isset($_POST['btn_submit'])) {
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    $user_id = $_SESSION['user_id'];

    $conn = getConnection();

    $sql = "INSERT INTO contact (user_id, email, phone_number, message) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isss", $user_id, $email, $phone, $message);

    if ($stmt->execute()) {
        echo "<script>
                alert('Thông tin của bạn đã được gửi thành công!');
                window.location.href = '$base_url/index.php'; 
              </script>";
    } else {
        echo "Lỗi gửi: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
