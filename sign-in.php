
<!Doctype HTML>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewpoint" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" >
    <script src="https://kit.fontawesome.com/41e46c9144.js" crossorigin="anonymous"></script>
    <title>Đăng nhập</title>
    <link rel='stylesheet' href="/BTLWEB/css/home.css"/>
    <link rel='stylesheet' href="/BTLWEB/css/style.css"/>
</head>
<body>
    <!-- ============================================== HEADER ============================================== -->
    <?php
        require "header.php";
    ?>
    <!-- ============================================== HEADER END ============================================== -->
    <div class="wrapper" style ="margin-left: 550px">
        <span class="icon-close">
            <ion-icon name="close-outline"></icon-icon>
        </span>

        <div class="form-box login">
            <h2>Đăng nhập</h2>
            <form action="login_handler.php" method="post">
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
                        <input  style = " padding:0px" type="email" name="email" required>
                        <label>Email</label>

                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                        <input type="password" name= "password" required>
                        <label>Mật khẩu</label>
                </div>
                <div class="remember-forgot">
                    <label><input type="checkbox">
                    Lưu mật khẩu</label>
                    <a href="#">Quên mật khẩu?</a>
                </div>
                <button type="submit" name="dangnhap" class="btn" value ="dangnhap"style = "margin-left: 0px;">Đăng nhập</button>
            
                <div class="login-register">
                    <p>Bạn chưa có tài khoản?><a href='sign-up.php' class="register-link">Đăng kí</a></p>
                </div>
            </form>
        </div>
    </div>
    <!--===================FOOTER==================-->
    <?php
        require "footer.php";
    ?>
    <!-- <script src="script.js"></script> -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>