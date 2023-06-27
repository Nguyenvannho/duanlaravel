<!DOCTYPE html>
<html>
<head>
    <title>Trang Đăng Nhập</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
        }

        section {
            position: relative;
            width: 100%;
            height: 100vh;
            display: flex;
        }

        section .img-bg {
            position: relative;
            width: 50%;
            height: 100%;
        }

        section .img-bg img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        section .noi-dung {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 50%;
            height: 100%;
        }

        section .noi-dung .form {
            width: 50%;
        }

        section .noi-dung .form h2 {
            color: #607d8b;
            font-weight: 500;
            font-size: 1.5em;
            text-transform: uppercase;
            margin-bottom: 20px;
            border-bottom: 4px solid #6694e9;
            display: inline-block;
            letter-spacing: 1px;
        }

        section .noi-dung .form .input-form {
            margin-bottom: 20px;
        }

        section .noi-dung .form .input-form span {
            font-size: 16px;
            margin-bottom: 5px;
            display: inline-block;
            color: #607db8;
            letter-spacing: 1px;
        }

        section .noi-dung .form .input-form input {
            width: 100%;
            padding: 10px 20px;
            outline: none;
            border: 1px solid #607d8b;
            font-size: 16px;
            letter-spacing: 1px;
            color: #607d8b;
            background: wheat;
            border-radius: 30px;
        }

        section .noi-dung .form .input-form input[type="submit"] {
            background: red;
            color: #fff;
            outline: none;
            border: none;
            font-weight: 500;
            cursor: pointer;
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.12),
                        0 2px 2px rgba(0, 0, 0, 0.12),
                        0 4px 4px rgba(0, 0, 0, 0.12),
                        0 8px 8px rgba(0, 0, 0, 0.12),
                        0 16px 16px rgba(0, 0, 0, 0.12);
        }

        section .noi-dung .form .input-form input[type="submit"]:hover {
            background: #6694e9;
        }

        section .noi-dung .form .nho-dang-nhap {
            margin-bottom: 10px;
            color: #607d8b;
            font-size: 14px;
        }

        section .noi-dung .form .input-form p {
           
            section .noi-dung .form .input-form p {
            color: #607d8b;
        }

        section .noi-dung .form .input-form p a {
            color: #ffb3b3;
        }

        section .noi-dung .form h3 {
            color: #607d8b;
            text-align: center;
            margin: 80px 0 10px;
            font-weight: 500;
        }

        section .noi-dung .form .icon-dang-nhap {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        section .noi-dung .form .icon-dang-nhap li {
            list-style: none;
            cursor: pointer;
            width: 50px;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        section .noi-dung .form .icon-dang-nhap li:nth-child(1) {
            color: #3b5999;
        }

        section .noi-dung .form .icon-dang-nhap li:nth-child(2) {
            color: #dd4b39;
        }

        section .noi-dung .form .icon-dang-nhap li:nth-child(3) {
            color: #55acee;
        }

        section .noi-dung .form .icon-dang-nhap li i {
            font-size: 24px;
        }

        @media (max-width: 768px) {
            section .img-bg {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
            }

            section .noi-dung {
                display: flex;
                justify-content: center;
                align-items: center;
                width: 100%;
                height: 100%;
                z-index: 1;
            }

            section .noi-dung .form {
                width: 100%;
                padding: 40px;
                background: rgba(255 255 255 / 0.9);
                margin: 50px;
            }

            section .noi-dung .form h3 {
                color: #607d8b;
                text-align: center;
                margin: 30px 0 10px;
                font-weight: 500;
            }
        }
    </style>
</head>
<body>
    <section>
        <!-- Phần Hình Ảnh -->
        <div class="img-bg">
            <img src="https://scontent.fhan2-4.fna.fbcdn.net/v/t1.6435-9/96521437_2751254875003425_2156156398151401472_n.jpg?stp=dst-jpg_p843x403&_nc_cat=105&ccb=1-7&_nc_sid=e3f864&_nc_ohc=y9gUFyoLNvkAX_0Drvh&_nc_ht=scontent.fhan2-4.fna&oh=00_AfAhhc9h8_fi9HnQX0n0KP737b457tDkcqGnDVof1GlmZg&oe=640C4888">
        </div>

        <!-- Phần Nội Dung -->
        <div class="
        noi-dung">
        <div class="form">
            <h2>Đăng nhập</h2>
            <form id="login-form" action="#" method="post">
                <div class="input-form">
                    <span>Tên đăng nhập:</span>
                    <input type="text" name="username" required>
                </div>
                <div class="input-form">
                    <span>Mật khẩu:</span>
                    <input type="password" name="password" required>
                </div>
                <div class="input-form">
                    <input type="submit" value="Đăng nhập">
                </div>
                <div class="nho-dang-nhap">
                    <input type="checkbox" id="remember-me">
                    <label for="remember-me">Ghi nhớ đăng nhập</label>
                </div>
                <p>Bạn chưa có tài khoản? <a href="#">Đăng ký</a></p>
            </form>
            <h3>Hoặc đăng nhập bằng:</h3>
            <ul class="icon-dang-nhap">
                <li><i class="fab fa-facebook-f"></i></li>
                <li><i class="fab fa-google"></i></li>
                <li><i class="fab fa-twitter"></i></li>
            </ul>
        </div>
    </div>
</section>
</body>
</html>
<!-- Đoạn mã HTML và CSS của bạn -->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('login-form').addEventListener('submit', function(event) {
            event.preventDefault(); // Ngăn chặn việc gửi form đi

            // Kiểm tra tên đăng nhập và mật khẩu
            var username = document.getElementsByName('username')[0].value;
            var password = document.getElementsByName('password')[0].value;

            // Kiểm tra thông tin đăng nhập
            if (username === 'cun2004@gmail.com' && password === '123456') {
                Swal.fire({
                    title: 'Đăng nhập thành công!',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 2000 // Thời gian hiển thị thông báo (2 giây)
                });
            } else {
                Swal.fire({
                    title: 'Tên đăng nhập hoặc mật khẩu không đúng!',
                    icon: 'error',
                    showConfirmButton: false,
                    timer: 2000 // Thời gian hiển thị thông báo (2 giây)
                });
            }
        });
    });
</script>
