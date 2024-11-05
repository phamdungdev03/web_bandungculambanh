<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Cập Nhật Người Dùng</h3>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="indexadmin.php">Home</a></li>
            <li><i class="fa fa-laptop"></i>Trang Chủ</li>
            <li><i class="fa fa-plus"></i>Cập Nhật Người Dùng</li>
        </ol>
    </div>
</div>

<?php
include './includes/user_function.php';

if (isset($_GET['user_id'])) {
    $userId = $_GET['user_id'];
    $user = getUserById($userId);
}

?>

<div class="row">
    <div class="col-lg-6">
        <section class="panel">
            <header class="panel-heading">
                Cập Nhật Người Dùng
            </header>
            <div class="panel-body">
                <form action="./actions/user_action.php" method="post">
                    <input type="hidden" name="action" value="editUser">
                    <div class="form-group">
                        <label for="user_id">Mã Người Dùng</label>
                        <input type="text" class="form-control" id="user_id" name="user_id" value="<?php echo $user['user_id'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="user_name">Tên Đăng Nhập</label>
                        <input type="text" class="form-control" id="user_name" name="user_name" value="<?php echo $user['username'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="full_name">Họ Và Tên</label>
                        <input type="text" class="form-control" id="full_name" name="full_name" value="<?php echo $user['full_name'] ?>" placeholder="Nhập họ và tên" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['email'] ?>" placeholder="Nhập email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Số Điện Thoại</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $user['phone_number'] ?>" max="10" placeholder="Nhập số điện thoại" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Địa Chỉ</label>
                        <input type="text" class="form-control" id="address" name="address" value="<?php echo $user['address'] ?>" placeholder="Nhập địa chỉ" required>
                    </div>
                    <div class="form-group">
                        <label for="role">Thể Loại</label>
                        <select class="form-control" id="role" name="role_name" required>
                            <option value="user" <?php echo ($user['role_name'] == 'user') ? 'selected' : ''; ?>>User</option>
                            <option value="admin" <?php echo ($user['role_name'] == 'admin') ? 'selected' : ''; ?>>Admin</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Cập Nhật Người Dùng</button>
                </form>
            </div>
        </section>
    </div>
</div>