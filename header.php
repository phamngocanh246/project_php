<?php
session_start();
include 'connect.php';
include 'data.php';
include 'search.php';

$sql_cate = "SELECT * FROM category ORDER BY name ASC";
$categories = mysqli_query($conn, $sql_cate);

?>
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownId">
                            <?php foreach ($categories as $cat) : ?>
                                <a class="dropdown-item" href="category.php?id=<?= $cat['id']; ?>"><?= $cat['name']; ?></a>
                            <?php endforeach; ?>
                        </div>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <form method="GET" action="search.php">
                        <input class="form-control mr-sm-2" type="text" name="query" placeholder="Tìm kiếm sản phẩm..." required>
                        <button type="submit">Tìm kiếm</button>
                    </form>
                    <a class="btn btn-outline-danger my-2 my-sm-0" href="cart.php">Giỏ hàng</a>
                </form>
                <div class="dropdown">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQxUa0EfSvrcIoBKTmSsrsEot91R7QsXeY36Ox1-g838A&s" style="width: 20px;" alt="">
                    </a>

                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="sign-up.php">Đăng ký</a>
                        <a class="dropdown-item" href="sign-in.php">Đăng nhập</a>
                        <a class="dropdown-item" href="#">Đăng xuất</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>