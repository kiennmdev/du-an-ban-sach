<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $tittle ??'' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <!-- header -->
        <div class="dauheader text-primary my-2">
            <h1>ADMIN</h1>
        </div>
        <!-- nav -->
        <nav class="navbar navbar-expand-sm bg-success navbar-success">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Trang chủ</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Danh mục</a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="#">Thêm danh mục</a></li>
                        </ul>
                      </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Sách</a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Thêm sách</a></li>
                      <li><a class="dropdown-item" href="#">Another link</a></li>
                      <li><a class="dropdown-item" href="#">A third link</a></li>
                    </ul>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Tài khoản</a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Thêm tài khoản</a></li>
                      <li><a class="dropdown-item" href="#">Another link</a></li>
                      <li><a class="dropdown-item" href="#">A third link</a></li>
                    </ul>
                  </li>  
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Đơn hàng</a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Link</a></li>
                      <li><a class="dropdown-item" href="#">Another link</a></li>
                      <li><a class="dropdown-item" href="#">A third link</a></li>
                    </ul>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Thông kê</a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Link</a></li>
                      <li><a class="dropdown-item" href="#">Another link</a></li>
                      <li><a class="dropdown-item" href="#">A third link</a></li>
                    </ul>
                  </li>
                </ul>
                <button class="btn ms-auto">Đăng nhập</button>
              </div>
            </div>
          </nav>
          <!-- end nav -->