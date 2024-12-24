<?php 
include 'header.php';

// Lấy giỏ hàng từ session
$carts = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
$total = 0;
?>

<div class="container py-5">
    <div class="row">
        <div class="col-md-8">
            <h4>GIỎ HÀNG CỦA QUÝ KHÁCH</h4>
            <table class="table">
                <thead class="thead-inverse">
                    <tr>
                        <th>Ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Tổng tiền</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($carts)): ?>
                        <?php foreach ($carts as $item): 
                            $quantity = isset($item['quantity']) ? (int)$item['quantity'] : 0;
                            $price = isset($item['price']) ? (int)$item['price'] : 0;
                            $subtotal = $price * $quantity;
                            $total += $subtotal;
                        ?>
                        <tr>
                            <td>
                                <img src="uploads/<?= htmlspecialchars($item['image'] ?? 'default.jpg'); ?>" alt="Sản phẩm" style="width:60px">
                            </td>
                            <td><?= htmlspecialchars($item['name'] ?? 'Không có tên'); ?></td>
                            <td><?= number_format($price); ?> đ</td>
                            <td>
                                <form action="cart-process.php" method="get">
                                    <input type="hidden" name="id" value="<?= htmlspecialchars($item['id'] ?? 0); ?>">
                                    <input type="hidden" name="action" value="update">
                                    <input type="number" name="quantity" value="<?= $quantity; ?>" class="form-control" style="width:80px; text-align:center" min="1">
                                    <button type="submit" class="btn btn-sm btn-primary mt-1">Cập nhật</button>
                                </form>
                            </td>
                            <td><?= number_format($subtotal); ?> đ</td>
                            <td>
                                <a onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')" href="cart-process.php?id=<?= htmlspecialchars($item['id'] ?? 0); ?>&action=delete" class="btn btn-sm btn-danger">&times;</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center">Giỏ hàng trống.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="col-md-4">
            <h4>Thành tiền</h4>
            <table class="table">
                <tbody>
                    <tr>
                        <td>Chi tiết</td>
                        <td class="text-right"><?= number_format($total); ?> đ</td>
                    </tr>
                </tbody>
            </table>

            <div class="text-center">
                <a href="index.php" class="btn btn-primary">Tiếp tục mua hàng</a>
                <a href="cart-process.php?action=clear" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa toàn bộ giỏ hàng?')">Xóa hết</a>
                <a href="checkout.php" class="btn btn-success">Đặt hàng</a>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
