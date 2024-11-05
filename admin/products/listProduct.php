<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i>DANH SÁCH SẢN PHẨM</h3>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="indexadmin.php">Home</a></li>
            <li><i class="fa fa-laptop"></i>Danh Sách Sản Phẩm</li>
        </ol>
    </div>
</div>

<?php
include './includes/product_function.php';
$result = getAllProducts();
?>

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                DANH SÁCH SẢN PHẨM
            </header>

            <table class="table table-striped table-advance table-hover">
                <thead>
                    <tr>
                        <th>Mã sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Số Lượng</th>
                        <th>Giá</th>
                        <th>Thể Loại</th>
                        <th>Hình Ảnh</th>
                        <th><i class="icon_cogs"></i> Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $imageUrl = '../public/uploads/' . htmlspecialchars($row['image_url']);
                            echo "<tr>
                                    <td>{$row['product_id']}</td>
                                    <td>{$row['product_name']}</td>
                                    <td>{$row['quantity']}</td>
                                    <td>{$row['price']}</td>
                                    <td>{$row['category_name']}</td>
                                    <td><img src=\"{$imageUrl}\" alt=\"Product Image\" style=\"width: 70px; height: 70px; border-radius: 20px;\" /></td>
                                    <td>
                                        <div class='btn-group'>
                                            <a class='btn btn-primary' href='indexadmin.php?id=6&product_id={$row['product_id']}'><i class='icon_pens_alt'></i></a>
                                            <a class='btn btn-danger' href='./actions/product_action.php?product_id={$row['product_id']}' onclick=\"confirmDelete(event, this.href);\"><i class='icon_close_alt2'></i></a>
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

<script>
    function confirmDelete(event, url) {
        event.preventDefault();
        if (confirm("Bạn có chắc chắn muốn xóa sản phẩm này không?")) {
            window.location.href = url;
        }
    }
</script>