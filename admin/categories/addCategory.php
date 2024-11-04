<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Thêm Thể Loại</h3>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="indexadmin.php">Home</a></li>
            <li><i class="fa fa-laptop"></i>Trang Chủ</li>
            <li><i class="fa fa-plus"></i>Thêm Thể Loại</li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <section class="panel">
            <header class="panel-heading">
                Thêm Thể Loại
            </header>
            <div class="panel-body">
                <form action="./actions/category_action.php" method="post">
                    <input type="hidden" name="action" value="addCategory">
                    <div class="form-group">
                        <label for="category_name">Tên Thể Loại</label>
                        <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Nhập tên thể loại">
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm Thể Loại</button>
                </form>
            </div>
        </section>
    </div>
</div>