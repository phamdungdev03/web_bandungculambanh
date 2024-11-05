<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i>DANH SÁCH NGƯỜI DÙNG</h3>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="indexadmin.php">Home</a></li>
            <li><i class="fa fa-laptop"></i>Danh Sách Người Dùng</li>
        </ol>
    </div>
</div>

<?php
include './includes/user_function.php';
$userIdCurrent = $_SESSION['user_id'];

$result = getAllUsers($userIdCurrent);
?>

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                DANH SÁCH NGƯỜI DÙNG
            </header>

            <table class="table table-striped table-advance table-hover">
                <thead>
                    <tr>
                        <th>Mã người dùng</th>
                        <th>Tên người dùng</th>
                        <th>Email</th>
                        <th>Số Điện Thoại</th>
                        <th>Quyền</th>
                        <th>Địa Chỉ</th>
                        <th><i class="icon_cogs"></i> Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>{$row['user_id']}</td>
                                    <td>{$row['full_name']}</td>
                                    <td>{$row['email']}</td>
                                    <td>{$row['phone_number']}</td>
                                    <td>{$row['role_name']}</td>
                                    <td>{$row['address']}</td>
                                    <td>
                                        <div class='btn-group'>
                                            <a class='btn btn-primary' href='indexadmin.php?id=9&user_id={$row['user_id']}'><i class='icon_plus_alt2'></i></a>
                                            <a class='btn btn-danger' href='./actions/user_action.php?user_id={$row['user_id']}' onclick=\"confirmDelete(event, this.href);\"><i class='icon_close_alt2'></i></a>
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
        if (confirm("Bạn có chắc chắn muốn xóa người dùng này không này không?")) {
            window.location.href = url;
        }
    }
</script>