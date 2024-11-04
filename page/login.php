<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./css/login.css">
</head>

<body>
    <div class="container">
        <div class="form-container">
            <form id="loginForm" action="handle_login.php" method="POST">
                <h1>Đăng nhập</h1>
                <input type="text" id="username" name="username" class="input-field" placeholder="Tên đăng nhập" required>
                <input type="password" id="password" name="password" class="input-field" placeholder="Mật khẩu" required>
                <input type="submit" class="submit-button" name="btn_submit" value="Đăng nhập" />
                <a href="sign_up.php" class="sign-up-link">Bạn chưa có tài khoản? Đăng ký</a>
            </form>
        </div>
        <div class="image-container">
            <img src="https://img.freepik.com/premium-vector/vector-abstract-seamless-pattern-with-stars-blue-background_117177-1008.jpg" alt="Pattern Background">
        </div>
    </div>

    <script>
        document.getElementById('loginForm').addEventListener('submit', function(event) {
            const username = document.getElementById('username').value.trim();
            const password = document.getElementById('password').value.trim();

            if (username === "") {
                alert("Vui lòng nhập tên đăng nhập.");
                event.preventDefault();
                return;
            }

            if (password === "") {
                alert("Vui lòng nhập mật khẩu.");
                event.preventDefault();
                return;
            }

        });
    </script>
</body>

</html>