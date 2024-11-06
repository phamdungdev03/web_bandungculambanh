<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <title>Chi tiết đơn hàng</title>
    <link rel="stylesheet" href="./css/order_detail.css">
</head>

<body>
    <?php
    session_start();
    include './component/header.php';
    ?>

    <section>
        <div class="order">
            <h2>Chi tiết đơn hàng</h2>
            <?php
            include '../config/database.php';
            $conn = getConnection();

            $sql = "SELECT * FROM `order_items` where order_id = " . $_GET['iddh'] . "";
            $result = mysqli_query($conn, $sql);
            ?>
            <table class="bangchinh" border="1" align="center" cellspacing="0" width="100%">
                <tr>
                    <th>STT</th>
                    <th>MÃ ĐƠN HÀNG</th>
                    <th>TÊN SẢN PHẨM</th>
                    <th>HÌNH ẢNH</th>
                    <th>GIÁ SẢN PHẨM</th>
                    <th>SỐ LƯỢNG</th>
                    <th>THÀNH TIỀN</th>
                </tr>
                <?php
                $tongs = 0;
                $index = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $product_id = $row['product_id'];
                    $resultProduct =  mysqli_query($conn, "SELECT * from products where product_id = $product_id");
                    $rowItem = mysqli_fetch_assoc($resultProduct);
                    $index++;
                    $ma = $row['order_id'];
                    $ten = $rowItem['product_name'];
                    $gia = $row['price'];
                    $soluong = $row['quantity'];
                    $image_url = $rowItem['image_url'];
                    $tong = $row['quantity'] * $row['price'];
                    $tongs += $row['quantity'] * $row['price'];
                ?>
                    <tr>
                        <td>
                            <?php
                            echo  $index;
                            ?>
                        </td>
                        <td>
                            <?php
                            echo    $ma;
                            ?>
                        </td>

                        <td>

                            <?php
                            echo   $ten;
                            ?>

                        </td>
                        <td class="image-order">
                            <img src="../public/uploads/<?php echo $image_url ?>" alt="">
                        </td>
                        <td>

                            <?php
                            echo  number_format($gia, 0, ",", ",");
                            ?>

                        </td>
                        <td>
                            <?php
                            echo   $soluong
                            ?>

                        </td>
                        <td>
                            <?php
                            echo   number_format($tong, 0, ",", ",")
                            ?>
                        </td>
                    </tr>
                <?php
                }
                ?>
                <tr>
                    <td colspan="6" style="text-align: center">Tổng giá trị: <?php echo  number_format($tongs, 0, ",", ",") ?></td>
                </tr>
                <?php
                mysqli_close($conn);
                ?>

            </table>
            <br><br>
            <a style=" text-decoration: none;" href="javascript:history.back()">&#8592; Quay lại</a>
        </div>
    </section>

</body>

</html>