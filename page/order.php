<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đơn hàng</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/order.css">
</head>

<body>
    <?php
    session_start();
    include("./component/header.php");
    ?>

    <section>
        <div class="order">
            <h2>Thông tin đơn hàng</h2>

            <?php

            include '../config/database.php';
            $conn = getConnection();
            $username = $_SESSION['username'];
            $query = "SELECT user_id FROM users WHERE username = '$username'";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);
            $customer_id = $row['user_id'];
            $sql = "SELECT order_id FROM orders WHERE user_id = $customer_id";
            $result = mysqli_query($conn, $sql);
            $order_ids = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $order_ids[] = $row['order_id'];
            }
            if (count($order_ids) > 0) {
                $sql2 = "
                    SELECT orders.order_id, orders.order_date, orders.status AS order_status, orders.total_amount, 
                        users.full_name AS customer_name, users.address AS customer_address, users.email AS customer_email, 
                        users.phone_number AS customer_phone 
                    FROM orders 
                    JOIN users ON orders.user_id = users.user_id 
                    WHERE orders.order_id IN (" . implode(',', $order_ids) . ")
                ";
                $result2 = mysqli_query($conn, $sql2);
            } else {
                echo "<script>alert('Đơn hàng rỗng.! Bạn chưa mua đơn hàng nào');
						window.location.href = 'index.php';
						</script>";
            }

            ?>
            <table class="bangchinh" border="1" align="center" cellspacing="0" width="100%">
                <tr>
                    <th>STT</th>
                    <th>Tên người nhận</th>
                    <th>Địa chỉ</th>
                    <th>Điện thoại</th>
                    <th>Email</th>
                    <th>Thời gian đặt</th>
                    <th>Thời gian giao</th>
                    <th>Trạng Thái</th>
                    <th>Xem đơn hàng</th>
                    <th>Cập nhật Trạng thái</th>
                </tr>
                <?php
                $index = 0;
                while ($row = mysqli_fetch_assoc($result2)) {
                    $index++;
                    $ma = $row['order_id'];
                    $ten = $row['customer_name'];
                    $diachi = $row['customer_address'];
                    $email = $row['customer_email'];
                    $phone = $row['customer_phone'];
                    $Ngaytao = $row['order_date'];
                    $mattcu = $row['order_status'];
                ?>
                    <tr>
                        <td>
                            <?php
                            echo   $index;
                            ?>
                        </td>
                        <td>
                            <?php
                            echo   $ten
                            ?>
                        </td>

                        <td>

                            <?php
                            echo    $diachi
                            ?>
                        </td>
                        <td>
                            <?php
                            echo  $phone
                            ?>

                        </td>
                        <td>
                            <?php
                            echo  $email
                            ?>
                        </td>

                        <td>
                            <?php
                            $timestamp = strtotime($Ngaytao . ' +5 hour 0 minutes');
                            echo date('d/m/Y H:i', $timestamp);
                            ?>
                        </td>

                        <td>Dự kiến 10 ngày sau khi đơn hàng đã được xử lý</td>
                        <td>
                            <?php
                            echo $mattcu
                            ?>
                        </td>
                        <td>
                            <a href="order_detail.php">Xem chi tiết</a>
                        </td>
                        <td>
                            <?php if ($mattcu == 5) { ?>
                            <?php echo "Hủy thành công";
                            } else if ($mattcu == 4) {
                                echo "Đã hoàn thành";
                            } else {
                            ?>
                                <div class="box_btn">
                                    <a href="./comfirm_order.php?iddh=<?php echo  $ma ?>">
                                        <button class="btn_comfirm"> <i class="fa-solid fa-check"></i></button>
                                    </a>
                                    <a href="./remove_order.php?iddh=<?php echo  $ma ?>">
                                        <button class="btn_remove"><i class="fa-solid fa-trash"></i></button>
                                    </a>
                                </div>
                            <?php
                            } ?>
                        </td>
                    </tr>
                <?php
                }
                ?>
                <?php
                mysqli_close($conn);
                ?>

            </table>
        </div>
    </section>
    <?php include("./component/footer.php") ?>
</body>

</html>