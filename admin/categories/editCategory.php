<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Cập Nhật Thể Loại</h3>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="indexadmin.php">Home</a></li>
            <li><i class="fa fa-laptop"></i>Danh Sách Thể Loại</li>
            <li><i class="fa fa-plus"></i>Cập Nhật Thể Loại</li>
        </ol>
    </div>
</div>

<?php
include './includes/category_function.php';
if (isset($_GET['category_id'])) {
    $categoryId = $_GET['category_id'];
    $category = getCategoryById($categoryId);
}
?>

<div class="row">
    <div class="col-lg-6">
        <section class="panel">
            <header class="panel-heading">
                Cập Nhật Thể Loại
            </header>
            <div class="panel-body">
                <form action="./actions/category_action.php" method="post">
                    <input type="hidden" name="action" value="editCategory">
                    <div class="form-group">
                        <label for="category_id">Mã Thể Loại</label>
                        <input type="text" class="form-control" id="category_id" name="category_id" value="<?php echo $category['category_id'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="category_name">Tên Thể Loại</label>
                        <input type="text" class="form-control" id="category_name" value="<?php echo $category['category_name'] ?>" name="category_name" placeholder="Nhập tên thể loại">
                    </div>
                    <button type="submit" class="btn btn-primary">Cập Nhật Thể Loại</button>
                </form>
            </div>
        </section>
    </div>
</div>