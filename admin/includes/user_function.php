<?php
include(__DIR__ . '/../../config/database.php');

function getAllUsers($userId)
{
    $conn = getConnection();
    $sql = "SELECT * FROM users where user_id != $userId";
    $result = $conn->query($sql);
    return $result;
}

function getUserById($userId)
{
    $conn = getConnection();
    $sql = "SELECT * FROM users WHERE user_id = ?";
    $st = $conn->prepare($sql);
    $st->bind_param("s", $userId);
    $st->execute();
    $result = $st->get_result();
    if ($result->num_rows > 0) {
        $category = $result->fetch_assoc();
        return $category;
    }
}

function addUser($userName, $email, $phone, $address, $password, $roleName, $fullName)
{
    $conn = getConnection();
    $sql = "INSERT INTO users(username,email,phone_number, address, password, role_name, full_name) VALUES(?,?,?,?,?,?,?)";
    $st = $conn->prepare($sql);
    $st->bind_param("sssssss", $userName, $email, $phone, $address, $password, $roleName, $fullName);
    if ($st->execute()) {
        return true;
    } else {
        return false;
    }
    $conn->close();
    $st->closse();
}

function editUser($userId, $fullName, $email, $phone, $address, $roleName)
{
    $conn = getConnection();
    $sql = "UPDATE users SET full_name=?,email=?, phone_number=?, address=?, role_name = ? WHERE user_id = ?";
    $st = $conn->prepare($sql);
    $st->bind_param("ssssss", $fullName, $email, $phone, $address, $roleName, $userId);
    if ($st->execute()) {
        return true;
    } else {
        return false;
    }
    $conn->close();
    $st->closse();
}

function deleteUser($userId)
{
    $conn = getConnection();
    $sql = "DELETE FROM users WHERE user_id = ?";
    $st = $conn->prepare($sql);
    $st->bind_param("s", $userId);

    if ($st->execute()) {
        return true;
    } else {
        return false;
    }

    $st->close();
    $conn->close();
}

function isUsernameExists($userName)
{
    $conn = getConnection();
    $stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE username = ?");
    $stmt->bind_param("s", $userName);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();
    $conn->close();
    return $count > 0;
}
