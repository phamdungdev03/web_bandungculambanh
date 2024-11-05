<?php
include('../includes/user_function.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST['action'];
    switch ($action) {
        case 'addUser':
            $userName = $_POST['user_name'];
            $password = $_POST['password'];
            $fullName = $_POST['full_name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $roleName = $_POST['role_name'];
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            if (isUsernameExists($userName)) {
                echo "<script>
                        alert('Tên đăng nhập đã tồn tại!');
                        window.location.href = 'javascript:history.back()';
                      </script>";
                exit();
            } else {
                if (addUser($userName, $email, $phone, $address, $hashed_password, $roleName, $fullName)) {
                    echo "Thêm người dùng thành công!";
                    header("Location: ../indexadmin.php?id=7");
                    exit();
                } else {
                    echo "Lỗi khi thêm người dùng";
                }
            }
            break;
        case 'editUser':
            $userId = $_POST['user_id'];
            $fullName = $_POST['full_name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $roleName = $_POST['role_name'];
            if (editUser($userId, $fullName, $email, $phone, $address, $roleName)) {
                echo "Cập nhật người dùng thành công!";
                header("Location: ../indexadmin.php?id=7");
                exit();
            } else {
                echo "Lỗi khi cập nhật người dùng";
            }

            break;
        default:
            break;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['user_id'])) {
        $userId = $_GET['user_id'];
        if (deleteUser($userId)) {
            header("Location: ../indexadmin.php?id=7");
            exit();
        } else {
            echo "<script>
                        alert('Lỗi khi xóa người dùng!');
                        window.location.href = '../indexadmin.php?id=7';
                      </script>";
            exit();
        }
    }
}
