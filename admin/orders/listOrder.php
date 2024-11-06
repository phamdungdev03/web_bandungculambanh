<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i>DANH SÁCH ĐƠN HÀNG</h3>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="indexadmin.php">Home</a></li>
            <li><i class="fa fa-laptop"></i>Danh Sách ĐƠN HÀNG</li>
        </ol>
    </div>
</div>

<?php
include './includes/order_function.php';
$result = getAllOrders();
?>

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                DANH SÁCH ĐƠN HÀNG
            </header>

            <table class="table table-striped table-advance table-hover">
                <thead>
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th>Người đặt hàng</th>
                        <th>Tổng tiền</th>
                        <th>Ngày đặt</th>
                        <th>Trạng thái</th>
                        <th><i class="icon_cogs"></i> Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            switch ($row['status']) {
                                case 'pending':
                                    $statusDisplay = 'Chờ Xác Nhận';
                                    break;
                                case 'processed':
                                    $statusDisplay = 'Đã Xác Nhận';
                                    break;
                                case 'shipping':
                                    $statusDisplay = 'Đang Vận Chuyển';
                                    break;
                                case 'completed':
                                    $statusDisplay = 'Hoàn Thành';
                                    break;
                                case 'cancelled':
                                    $statusDisplay = 'Đã Hủy';
                                    break;
                                default:
                                    $statusDisplay = 'Không xác định';
                            }
                            echo "<tr>
                                    <td>{$row['order_id']}</td>
                                    <td>{$row['full_name']}</td>
                                    <td>{$row['total_amount']}</td>
                                    <td>{$row['order_date']}</td>
                                    <td>{$statusDisplay}</td>
                                    <td>
                                        <div class='btn-group'>
                                            <a class='btn btn-primary' href='indexadmin.php?id=11&order_id={$row['order_id']}'><i class='icon_pens_alt'></i></a>
                                        </div>
                                    </td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>Không có dữ liệu</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </div>
</div>