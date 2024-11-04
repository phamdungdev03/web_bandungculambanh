<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng kí tài khoản</title>
    <link rel="stylesheet" href="./public/css/sign_up.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="image-section"></div>
            
            <div class="form-section">
                <h3>Create an Account!</h3>
                <form>
                    <div class="input-group">
                        <div class="form-group">
                            <label for="firstName">Tên tài khoản</label>
                            <input type="text" id="firstName" placeholder="First Name" required>
                        </div>
                        <div class="form-group">
                            <label for="lastName">Tên đăng nhập</label>
                            <input type="text" id="lastName" placeholder="Last Name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Địa chỉ</label>
                        <input type="text" id="address" placeholder="Address" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Số điện thoại</label>
                        <input type="number" id="phone" placeholder="012345678" required>
                    </div>
                    <div class="input-group">
                        <div class="form-group">
                            <label for="password">Mật khẩu</label>
                            <input type="password" id="password" placeholder="******************" required>
                            <!-- <p style="color: #e53e3e; font-size: 0.75rem;">Please choose a password.</p> -->
                        </div>
                        <div class="form-group">
                            <label for="c_password">Nhập lại mật khẩu</label>
                            <input type="password" id="c_password" placeholder="******************" required>
                        </div>
                    </div>
                    <input type="submit" class="button" value="Đăng ký"/>
                    <a href="./login.php" class="link">Bạn đã có tài khoản? Đăng nhập</a>
                </form>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.querySelector('form');
        const firstName = document.getElementById('firstName');
        const lastName = document.getElementById('lastName');
        const email = document.getElementById('email');
        const address = document.getElementById('address');
        const phone = document.getElementById('phone');
        const password = document.getElementById('password');
        const confirmPassword = document.getElementById('c_password');

        form.addEventListener('submit', function (event) {
            event.preventDefault();

            if (!firstName.value.trim() || !lastName.value.trim() || !email.value.trim() || 
                !address.value.trim() || !phone.value.trim() || !password.value.trim() || 
                !confirmPassword.value.trim()) {
                alert("Vui lòng điền đầy đủ thông tin.");
                return;
            }

            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email.value)) {
                alert("Email không hợp lệ.");
                return;
            }

            if (!/^\d{10}$/.test(phone.value)) {
                alert("Số điện thoại phải là 10 chữ số.");
                return;
            }

            if (password.value.length < 8) {
                alert("Mật khẩu phải có ít nhất 8 ký tự.");
                return;
            }

            if (password.value !== confirmPassword.value) {
                alert("Mật khẩu và nhập lại mật khẩu không khớp.");
                return;
            }

            alert("Đăng ký thành công!");
            form.submit();
            });
        });
    </script>

</body>
</html>
