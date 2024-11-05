<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên hệ</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .container {
            max-width: 600px;
            margin: 80px auto 0 auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin: 10px 0 5px;
            color: #333;
        }

        input[type="email"],
        input[type="tel"],
        textarea {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            margin-bottom: 15px;
        }

        input[type="submit"] {
            padding: 10px;
            border: none;
            border-radius: 4px;
            background-color: #4F2227;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #B17010;
        }

        @media (max-width: 600px) {
            .container {
                padding: 15px;
            }
        }
    </style>
</head>

<body>
    <?php
    session_start();
    include("./component/header.php");
    ?>
    <div class="container">
        <h1>Liên hệ với chúng tôi</h1>
        <form action="handle_contact.php" method="POST">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required placeholder="Nhập email của bạn">

            <label for="phone">Số điện thoại:</label>
            <input type="tel" id="phone" name="phone" required placeholder="Nhập số điện thoại của bạn">

            <label for="message">Tin nhắn:</label>
            <textarea id="message" name="message" rows="5" required placeholder="Nhập tin nhắn của bạn"></textarea>

            <input type="submit" name="btn_submit" value="Gửi">
        </form>
    </div>

    <?php
    include("./component/footer.php");
    ?>
</body>

</html>