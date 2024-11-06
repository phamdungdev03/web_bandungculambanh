<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i>DANH SÁCH LIÊN HỆ</h3>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="indexadmin.php">Home</a></li>
            <li><i class="fa fa-laptop"></i>Danh Sách Liên Hệ</li>
        </ol>
    </div>
</div>

<?php
include './includes/contact_function.php';
$result = getAllContacts();
?>

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                DANH SÁCH LIÊN HỆ
            </header>

            <table class="table table-striped table-advance table-hover">
                <thead>
                    <tr>
                        <th>Mã liên hệ</th>
                        <th>Tên người dùng</th>
                        <th>Email</th>
                        <th>Số Điện Thoại</th>
                        <th>Nội Dung</th>
                        <th>Ngày Gửi</th>
                        <th><i class="icon_cogs"></i> Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>{$row['contact_id']}</td>
                                    <td>{$row['full_name']}</td>
                                    <td>{$row['email']}</td>
                                    <td>{$row['phone_number']}</td>
                                    <td>{$row['message']}</td>
                                    <td>{$row['created_at']}</td>
                                    <td>
                                        <div class='btn-group'>
                                            <a class='btn btn-danger' href='./actions/contact_action.php?contact_id={$row['contact_id']}' onclick=\"confirmDelete(event, this.href);\"><i class='icon_close_alt2'></i></a>
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
        if (confirm("Bạn có chắc chắn muốn xóa liên hệ này không này không?")) {
            window.location.href = url;
        }
    }
</script>