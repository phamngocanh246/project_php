<!-- login_handler.php -->
<?php
session_start();

// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root"; // Thay đổi nếu cần
$password = ""; // Thay đổi nếu cần
$dbname = "demo_shoping"; // Thay đổi nếu cần

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Nhận dữ liệu từ form
$email = $_POST['email'];
$password = $_POST['password'];

// Kiểm tra xem email có trong cơ sở dữ liệu không
$sql = "SELECT * FROM customer WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    // Lấy dữ liệu người dùng
    $user = $result->fetch_assoc();
    
    // Kiểm tra mật khẩu
    if (password_verify($password, $user['password'])) {
        // Đăng nhập thành công
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        
        header("Location: index.php");
        exit();
    } else {
        echo "Sai mật khẩu!";
    }
} else {
    echo "Tài khoản không tồn tại!";
}

$stmt->close();
$conn->close();
?>
