<?php
include 'header.php';
include 'search.php';

// Truy vấn sản phẩm nổi bật
$products = mysqli_query($conn, "SELECT * FROM product WHERE status = 1 ORDER BY id desc");
?>

<!-- Carousel -->
<div id="carouselId" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://img.lovepik.com/background/20211022/medium/lovepik-hand-drawn-flower-background-promotion-banner-image_605007232.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="https://img.lovepik.com/background/20211022/medium/lovepik-hand-drawn-flower-background-promotion-banner-image_605007232.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="https://img.lovepik.com/background/20211022/medium/lovepik-hand-drawn-flower-background-promotion-banner-image_605007232.jpg" class="d-block w-100" alt="...">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<!-- Sản phẩm nổi bật -->
<div class="top-product my-5">
    <div class="container">
        <h2>Sản phẩm nổi bật</h2>
        <hr>
        <div class="row">
            <?php if (mysqli_num_rows($products) > 0) : ?>
                <?php while ($product = mysqli_fetch_assoc($products)) : ?>
                    <div class="col-lg-3">
                        <div class="card text-left">
                            <img class="card-img-top" src="uploads/<?= $product['image'] ? $product['image'] : 'default.jpg'; ?>" alt="">
                            <div class="card-body text-center">
                                <h4 class="card-title"><?= $product['name']; ?></h4>
                                <p class="card-text">
                                    <b>Price: <?= number_format($product['price']); ?> đ</b>
                                </p>
                                <!-- Liên kết đến trang chi tiết sản phẩm -->
                                <a href="product_detail.php?id=<?= $product['id']; ?>" class="btn btn-sm btn-primary">Xem chi tiết</a>
                                <a href="cart-process.php?id=<?= $product['id']; ?>" class="btn btn-sm btn-success">Thêm giỏ hàng</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else : ?>
                <p>Không có sản phẩm nào.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Banner -->
<div class="benner">
    <img src="https://img.lovepik.com/background/20211022/medium/lovepik-hand-drawn-flower-background-promotion-banner-image_605007232.jpg" alt="">
</div>

<hr>

<!-- Sản phẩm khuyến mãi -->
<div class="container">
    <h2>Sản phẩm khuyến mãi</h2>
    <hr>
    <div class="row">
        <?php foreach ($products as $key => $pro) :
            if ($key > 3) break; ?>
            <div class="col-lg-3">
                <div class="card text-left">
                    <img class="card-img-top" src="uploads/<?= $pro['image']; ?>" alt="">
                    <div class="card-body text-center">
                        <h4 class="card-title"><?= $pro['name']; ?></h4>
                        <p class="card-text">
                            <b>Price: <?= number_format($pro['price']); ?> đ</b>
                        </p>
                        <!-- Liên kết đến trang chi tiết sản phẩm -->
                        <a href="product_detail.php?id=<?= $pro['id']; ?>" class="btn btn-sm btn-primary">Xem chi tiết</a>
                        <a href="cart-process.php?id=<?= $pro['id']; ?>" class="btn btn-sm btn-success">Thêm giỏ hàng</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include 'footer.php'; ?>
