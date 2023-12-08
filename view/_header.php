<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="fontawesome-free-6.4.2-web/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <header>
        <div class="container header">
            <div class="logo">
                <h2><a href="?act=home">FakeBook<i class="fa-solid fa-book"></i></a></h2>
            </div>
            <div class="form-search">
                <form action="?act=danhsach" method="POST">
                    <div class="form-input">
                        <input type="text" name="search" placeholder="Tìm kiếm sách..." id="">
                    </div>
                    <div class="form-button">
                        <button><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </form>
            </div>
            <div class="cart-login-regis">
                <?php if(isset($_SESSION['idtk'])): ?>
                <div class="avatar">
                    <img src="<?= $img_path.$nd['hinh'] ?>" alt="" width="20px" height="20px" style="border-radius: 50%;">
                    <a href="?act=managebill"><?= $hoten ?></a>
                </div>
                <?php else: ?>
                    <div class="login-regis">
                        <a href="?act=dangnhap">Đăng nhập</a> |
                        <a href="?act=dangky">Đăng ký</a>
                    </div>
                <?php endif ?>
                <div class="cart">
                    <a href="?act=giohang"><i class="fa-solid fa-cart-shopping"></i></a>
                </div>
            </div>
    </header>
    <nav>
        <div class="container nav">
        <div class="menu">
                <div class="title-menu">
                <a href="?act=danhsach" id="danhmuc"><i class="fa-solid fa-bars"></i>&nbsp;&nbsp;Danh Mục sản phẩm&nbsp;&nbsp;<i class="fa-solid fa-chevron-down"></i></a>
                </div>
                <div class="category">
                    <!-- <a href="#"><strong>Nổi bật</strong></a> -->
                    <?php foreach($dsdm as $dm):
                        extract($dm);
                        ?>
                    <a href="?act=danhsach&iddm=<?=$id?>"><?=$tendanhmuc?></a>
                    <?php endforeach ?>
                </div>
            </div>

            <div class="contact">
                <span>
                    <a href="?act=tracuudonhang" class="maincolor"><i class="fa-solid fa-truck-fast"></i>&nbsp;Kiểm tra đơn hàng</a> |
                    <i class="fa-solid fa-phone maincolor"></i>
                    <strong>Hotline:</strong> <strong class="maincolor">1900 1508</strong> 
                </span>
            </div>
        </div>
    </nav>
    <div class="container">
        <main>