<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i>DANH SÁCH THỂ LOẠI</h3>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="indexadmin.php">Home</a></li>
            <li><i class="fa fa-laptop"></i>Danh Sách Thể Loại</li>
        </ol>
    </div>
</div>

<?php
include './includes/category_function.php';
$result = getAllCategories();
?>

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                DANH SÁCH THỂ LOẠI
            </header>

            <table class="table table-striped table-advance table-hover">
                <thead>
                    <tr>
                        <th>Mã thể loại</th>
                        <th>Tên thể loại</th>
                        <th><i class="icon_cogs"></i> Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>{$row['category_id']}</td>
                                    <td>{$row['category_name']}</td>
                                    <td>
                                        <div class='btn-group'>
                                            <a class='btn btn-primary' href='indexadmin.php?id=3&category_id={$row['category_id']}'><i class='icon_pens_alt'></i></a>
                                            <a class='btn btn-danger' href='./actions/category_action.php?category_id={$row['category_id']}' onclick=\"confirmDelete(event, this.href);\"><i class='icon_close_alt2'></i></a>
                                        </div>
                                    </td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>Không có dữ liệu</td></tr>";
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
        if (confirm("Bạn có chắc chắn muốn xóa thể loại này không?")) {
            window.location.href = url;
        }
    }
</script>