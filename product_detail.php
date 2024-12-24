<?php
include 'header.php';
include 'search.php';

// Kiểm tra nếu có id sản phẩm trong URL
if (isset($_GET['id'])) {
    $product_id = (int) $_GET['id']; // Chuyển đổi id thành số nguyên để bảo mật

    // Truy vấn thông tin chi tiết sản phẩm
    $product_query = mysqli_query($conn, "SELECT * FROM product WHERE id = $product_id AND status = 1");

    // Kiểm tra nếu sản phẩm tồn tại
    if (mysqli_num_rows($product_query) > 0) {
        $product = mysqli_fetch_assoc($product_query);
    } else {
        echo "<p>Sản phẩm không tồn tại hoặc đã bị xóa.</p>";
        exit;
    }
} else {
    echo "<p>Không có sản phẩm được chọn.</p>";
    exit;
}
?>

<div class="product-detail my-5">
    <div class="container">
        <h2>Chi tiết sản phẩm</h2>
        <hr>
        <div class="row">
            <div class="col-lg-6">
                <!-- Hiển thị hình ảnh sản phẩm -->
                <img src="uploads/<?= $product['image'] ? $product['image'] : 'default.jpg'; ?>" class="img-fluid" alt="Sản phẩm <?= htmlspecialchars($product['name']); ?>">
            </div>
            <div class="col-lg-6">
                <h3><?= htmlspecialchars($product['name']); ?></h3>
                <p><b>Giá: <?= number_format($product['price']); ?> đ</b></p>
                <p><b>Mô tả:</b> <?= nl2br(htmlspecialchars($product['content'])); ?></p>

                <!-- Form để chọn số lượng và thêm vào giỏ hàng -->
                <form action="cart-process.php" method="GET">
                    <input type="hidden" name="id" value="<?= $product['id']; ?>">

                    <div class="form-group">
                        <label for="quantity">Số lượng:</label>
                        <input type="number" id="quantity" name="quantity" class="form-control" value="1" min="1" required>
                    </div>

                    <p><b>Đơn giá: <?= number_format($product['price']); ?> đ</b></p>
                    <p><b>Tổng giá: <span id="total-price"><?= number_format($product['price']); ?> đ</span></b></p>

                    <!-- Thêm giỏ hàng -->
                    <button type="submit" name="action" value="add" class="btn btn-success">Thêm vào giỏ hàng</button>

                    <!-- Mua ngay -->
                    <button type="submit" name="action" value="buy_now" class="btn btn-danger">Mua ngay</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>

<script>
    // JavaScript để tính tổng giá khi thay đổi số lượng
    document.getElementById('quantity').addEventListener('input', function() {
        var price = <?= $product['price']; ?>;
        var quantity = this.value;
        var totalPrice = price * quantity;
        document.getElementById('total-price').textContent = totalPrice.toLocaleString() + " đ";
    });
</script>
