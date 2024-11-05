<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Thêm Người Dùng</h3>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="indexadmin.php">Home</a></li>
            <li><i class="fa fa-laptop"></i>Trang Chủ</li>
            <li><i class="fa fa-plus"></i>Thêm Người Dùng</li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <section class="panel">
            <header class="panel-heading">
                Thêm Người Dùng
            </header>
            <div class="panel-body">
                <form action="./actions/user_action.php" method="post">
                    <input type="hidden" name="action" value="addUser">
                    <div class="form-group">
                        <label for="user_name">Tên Đăng Nhập</label>
                        <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Nhập tên đăng nhập" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Mật Khẩu</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu" required>
                    </div>
                    <div class="form-group">
                        <label for="full_name">Họ Và Tên</label>
                        <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Nhập họ và tên" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Nhập email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Số Điện Thoại</label>
                        <input type="text" class="form-control" id="phone" name="phone" max="10" placeholder="Nhập số điện thoại" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Địa Chỉ</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Nhập địa chỉ" required>
                    </div>
                    <div class="form-group">
                        <label for="role">Thể Loại</label>
                        <select class="form-control" id="role" name="role_name" required>
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm Người Dùng</button>
                </form>
            </div>
        </section>
    </div>
</div>