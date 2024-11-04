<style>
    footer {
        background: #777;
        color: #FFF;
        padding: 40px 20px;
        margin-top: 80px;
    }

    .footer_container {
        max-width: 1450px;
        margin: 0 auto;
        display: flex;
        justify-content: space-between;
        gap: 20px;
    }

    .footer_column h3 {
        font-size: 18px;
        margin-bottom: 15px;
        color: #FFF;
        text-transform: uppercase;
        font-weight: bold;
    }

    .footer_column ul {
        list-style: none;
        padding: 0;
        line-height: 1.8;
    }

    .footer_column ul li a {
        color: #B0BEC5;
        text-decoration: none;
        display: block;
        transition: color 0.3s ease;
    }

    .footer_column ul li a:hover {
        color: #4FC3F7;
    }

    /* Styling for social icons */
    .footer_social-icons {
        display: flex;
        gap: 10px;
        margin-top: 10px;
    }

    .footer_social-icons a {
        color: #B0BEC5;
        font-size: 20px;
        transition: color 0.3s ease;
    }

    .footer_social-icons a:hover {
        color: #4FC3F7;
    }

    /* Copyright Section */
    .footer_bottom {
        text-align: center;
        padding-top: 20px;
        color: #B0BEC5;
        font-size: 14px;
        border-top: 1px solid #5b5b5b;
        margin-top: 30px;
    }
</style>

<footer>
    <section class="footer_container">
        <div class="footer_column">
            <h3>Thông tin thành viên</h3>
            <ul>
                <li><a href="#">Giới thiệu</a></li>
                <li><a href="#">Đội ngũ</a></li>
                <li><a href="#">Sự nghiệp</a></li>
            </ul>
        </div>
        <div class="footer_column">
            <h3>Hỗ trợ</h3>
            <ul>
                <li><a href="#">Hướng dẫn đặt hàng</a></li>
                <li><a href="#">Chính sách đổi trả - hoàn tiền</a></li>
                <li><a href="#">Chính sách vận chuyển</a></li>
                <li><a href="#">Chính sách thanh toán</a></li>
                <li><a href="#">Chính sách khách hàng</a></li>
            </ul>
        </div>
        <div class="footer_column">
            <h3>Kết nối mạng xã hội</h3>
            <ul>
                <li><a href="#">Email Us</a></li>
                <li><a href="#">Find Us</a></li>
                <li><a href="#">Call: (123) 456-7890</a></li>
            </ul>
            <div class="footer_social-icons">
                <a href="#"><i class="fa-brands fa-facebook"></i></a>
                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                <a href="#"><i class="fa-brands fa-linkedin"></i></a>
            </div>
        </div>
        <!-- Cột thông tin mới -->
        <div class="footer_column">
            <h3>Thông tin liên hệ</h3>
            <ul>
                <li><a href="#">123 Đường ABC, Thành phố XYZ</a></li>
                <li><a href="#">info@example.com</a></li>
                <li><a href="#">(123) 456-7890</a></li>
            </ul>
        </div>
    </section>
    <div class="footer_bottom">
        © 2024 Quản lý bán dụng cụ làm bánh.
    </div>
</footer>