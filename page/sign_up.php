<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng kí tài khoản</title>
    <link rel="stylesheet" href="./css/sign_up.css">
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="image-section"></div>

            <div class="form-section">
                <h3>Create an Account!</h3>
                <form action="handle_sign-up.php" method="POST">
                    <div class="input-group">
                        <div class="form-group">
                            <label for="fullname">Tên tài khoản</label>
                            <input type="text" name="fullname" id="fullname" placeholder="Full Name" required>
                        </div>
                        <div class="form-group">
                            <label for="username">Tên đăng nhập</label>
                            <input type="text" id="username" name="username" placeholder="User Name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Địa chỉ</label>
                        <input type="text" name="address" id="address" placeholder="Address" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Số điện thoại</label>
                        <input type="number" name="phone" id="phone" placeholder="012345678" required>
                    </div>
                    <div class="input-group">
                        <div class="form-group">
                            <label for="password">Mật khẩu</label>
                            <input type="password" name="password" id="password" placeholder="******" required>
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Nhập lại mật khẩu</label>
                            <input type="password" name="confirm_password" id="confirm_password" placeholder="******" required>
                        </div>
                    </div>
                    <input type="submit" class="button" name="btn_submit" value="Đăng ký" />
                    <a href="./login.php" class="link">Bạn đã có tài khoản? Đăng nhập</a>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            const fullname = document.getElementById('fullname');
            const username = document.getElementById('username');
            const email = document.getElementById('email');
            const address = document.getElementById('address');
            const phone = document.getElementById('phone');
            const password = document.getElementById('password');
            const confirmPassword = document.getElementById('confirm_password');

            form.addEventListener('submit', function(event) {
                if (!fullname.value.trim() || !username.value.trim() || !email.value.trim() ||
                    !address.value.trim() || !phone.value.trim() || !password.value.trim() ||
                    !confirmPassword.value.trim()) {
                    alert("Vui lòng điền đầy đủ thông tin.");
                    event.preventDefault();
                    return;
                }

                const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailPattern.test(email.value)) {
                    alert("Email không hợp lệ.");
                    event.preventDefault();
                    return;
                }

                if (!/^\d{10}$/.test(phone.value)) {
                    alert("Số điện thoại phải là 10 chữ số.");
                    event.preventDefault();
                    return;
                }

                if (password.value.length < 8) {
                    alert("Mật khẩu phải có ít nhất 8 ký tự.");
                    event.preventDefault();
                    return;
                }

                if (password.value !== confirmPassword.value) {
                    alert("Mật khẩu và nhập lại mật khẩu không khớp.");
                    event.preventDefault();
                    return;
                }
            });
        });
    </script>


</body>

</html>