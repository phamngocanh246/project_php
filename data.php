<?php
include 'connect.php';
// Lấy danh mục được chọn từ tham số URL
$categoryId = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Hàm để lấy sản phẩm theo danh mục
function getProductByCate($categoryId, $conn) {
    $query = "SELECT * FROM product WHERE category_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $categoryId);
    $stmt->execute();
    $result = $stmt->get_result();
    $products = [];

    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }

    return $products;
}

// Lấy sản phẩm theo danh mục đã chọn
$products = getProductByCate($categoryId, $conn);
?>

