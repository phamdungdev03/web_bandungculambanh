<?php
include("../config/database.php");

if (isset($_POST["btn_submit"]) && ($_POST["password"] == $_POST["confirm_password"])) {
    $username = $_POST["username"];
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $conn = getConnection();
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "Tên đăng nhập đã tồn tại! <a href='javascript:history.back()'>Quay lại</a>";
    } else {
        $fullname = $_POST["fullname"];
        $email = $_POST["email"];
        $address = $_POST["address"];
        $phone_number = $_POST["phone"];
        $password = $_POST["password"];
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $role = "user";
        $sql2 = "INSERT INTO `users` (`full_name`, `username`, `email`, `phone_number`, `address`, `password`, `role_name`)
                 VALUES ('$fullname', '$username', '$email', '$phone_number', '$address', '$hashed_password', '$role')";

        if (mysqli_query($conn, $sql2)) {
            echo "<script>alert('Đăng ký thành công!');
                  window.location.href = 'login.php';
                  </script>";
        } else {
            echo "Lỗi thêm mới: " . mysqli_error($conn);
        }
    }
}
