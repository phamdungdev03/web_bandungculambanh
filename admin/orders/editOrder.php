<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Cập Nhật Đơn Hàng</h3>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="indexadmin.php">Home</a></li>
            <li><i class="fa fa-laptop"></i>Trang Chủ</li>
            <li><i class="fa fa-plus"></i>Cập Nhật Đơn Hàng</li>
        </ol>
    </div>
</div>

<?php
include './includes/order_function.php';

if (isset($_GET['order_id'])) {
    $orderId = $_GET['order_id'];
    $order = getOrderByOderId($orderId);
    $orderItems = getAllOrderItemByOrderId($orderId);
}
?>

<div class="row">
    <div class="col-lg-6">
        <section class="panel">
            <header class="panel-heading">
                Cập Nhật Đơn Hàng
            </header>
            <div class="panel-body">
                <form action="./actions/order_action.php" method="post">
                    <input type="hidden" name="action" value="editOrder">
                    <div class="form-group">
                        <label for="order_id">Mã Đơn Hàng</label>
                        <input type="text" class="form-control" id="order_id" name="order_id" value="<?php echo $order['order_id'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="full_name">Người Đặt Hàng</label>
                        <input type="text" class="form-control" id="full_name" name="full_name" value="<?php echo $order['full_name'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="total_amount">Tổng Tiền</label>
                        <input type="text" class="form-control" id="total_amount" name="total_amount" value="<?php echo $order['total_amount'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="order_date">Ngày Đặt</label>
                        <input type="text" class="form-control" id="order_date" name="order_date" value="<?php echo $order['order_date'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="status">Trạng Thái Giao Hàng</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="pending" <?php echo ($order['status'] == 'pending') ? 'selected' : ''; ?>>Đang Xử Lý</option>
                            <option value="processed" <?php echo ($order['status'] == 'processed') ? 'selected' : ''; ?>>Đã Xử Lý</option>
                            <option value="shipping" <?php echo ($order['status'] == 'shipping') ? 'selected' : ''; ?>>Đang Vận Chuyển</option>
                            <option value="completed" <?php echo ($order['status'] == 'completed') ? 'selected' : ''; ?>>Hoàn Thành</option>
                            <option value="cancelled" <?php echo ($order['status'] == 'cancelled') ? 'selected' : ''; ?>>Đã Hủy</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Cập Nhật Đơn Hàng</button>
                </form>
            </div>
        </section>
    </div>
    <div class="col-lg-6">
        <div class="panel-body">
            <header class="panel-heading">
                DANH SÁCH SẢN PHẨM
            </header>
            <table class="table table-striped table-advance table-hover">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Hình Ảnh</th>
                        <th>Số Lượng</th>
                        <th>Giá</th>
                        <th>Tổng Tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($orderItems->num_rows > 0) {
                        $index = 1;
                        $total = 0;
                        while ($row = $orderItems->fetch_assoc()) {
                            $total = $row['quantity'] * $row['price'];
                            $imageUrl = '../public/uploads/' . htmlspecialchars($row['image_url']);
                            echo "<tr>
                                    <td>{$index}</td>
                                    <td>{$row['product_name']}</td>
                                    <td><img src=\"{$imageUrl}\" alt=\"Product Image\" style=\"width: 50px; height: 50px; border-radius: 20px;\" /></td>
                                    <td>{$row['quantity']}</td>
                                    <td>{$row['price']}</td>
                                    <td>{$total}</td>
                                  </tr>";
                            $index++;
                        }
                    } else {
                        echo "<tr><td colspan='6'>Không có dữ liệu</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>