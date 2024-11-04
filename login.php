<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./public/css/login.css">
</head>
<body>
    <div class="container">
        <div class="form-container">
            <form id="loginForm">
                <h1>Đăng nhập</h1>
                <input type="text" id="email" class="input-field" placeholder="Email" required>
                <input type="password" id="password" class="input-field" placeholder="Password" required>
                <input type="submit" class="submit-button" value="Đăng nhập"/>
                <a href="sign_up.php" class="sign-up-link">Bạn chưa có tài khoản? Đăng ký</a>
            </form>
        </div>
        <div class="image-container">
            <img src="https://img.freepik.com/premium-vector/vector-abstract-seamless-pattern-with-stars-blue-background_117177-1008.jpg" alt="Pattern Background">
        </div>
    </div>

    <script>
        document.getElementById('loginForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const email = document.getElementById('email').value.trim();
            const password = document.getElementById('password').value.trim();
            
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                alert("Vui lòng nhập email hợp lệ.");
                return;
            }
            
            if (password === "") {
                alert("Vui lòng nhập mật khẩu.");
                return;
            }

            alert("Đăng nhập thành công!");
            this.submit();
        });
    </script>
</body>
</html>
