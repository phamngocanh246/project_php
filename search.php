<?php
include 'connect.php';

// Lấy từ khóa tìm kiếm từ tham số GET
$searchQuery = !empty($_GET['query']) ? trim($_GET['query']) : '';

// Truy vấn tìm kiếm sản phẩm theo tên (không phân biệt chữ hoa/chữ thường)
$productQuery = "SELECT * FROM product WHERE LOWER(name) LIKE LOWER(?)";
$stmt = $conn->prepare($productQuery);
$searchPattern = '%' . $searchQuery . '%';
$stmt->bind_param('s', $searchPattern);
$stmt->execute();

$result = $stmt->get_result();
?>