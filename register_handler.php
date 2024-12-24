<!-- register_handler.php -->
<?php
// Chỉ xử lý khi có dữ liệu POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "demo_shoping";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    // Kiểm tra xem các trường dữ liệu đã tồn tại chưa
    if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm_password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        if ($password !== $confirm_password) {
            die("Mật khẩu xác nhận không khớp!");
        }

        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        $sql_check = "SELECT * FROM customer WHERE email = ?";
        $stmt = $conn->prepare($sql_check);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            die("Email đã được sử dụng!");
        }

        $sql_insert = "INSERT INTO customer (email, password) VALUES (?, ?)";
        $stmt = $conn->prepare($sql_insert);
        $stmt->bind_param("ss", $email, $hashed_password);

        if ($stmt->execute()) {
            // Đăng ký thành công, chuyển hướng đến trang đăng nhập
            header("Location: sign-in.php");
            exit();
        } else {
            echo "Đã xảy ra lỗi khi đăng ký: " . $conn->error;
        }

        $stmt->close();
    } else {
        echo "Dữ liệu chưa đầy đủ.";
    }

    $conn->close();
} else {
    echo "Phương thức không hợp lệ.";
}