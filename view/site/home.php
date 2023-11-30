<div class="main-content">
    <div class="main-banner">
        <!-- Carousel -->
<!-- <div id="demo" class="carousel slide" data-bs-ride="carousel">


<div class="carousel-indicators">
  <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
  <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
  <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
</div>


<div class="carousel-inner">
  <div class="carousel-item active">
    <img src="<?= $img_path ?>banner.jpg" alt="Los Angeles" class="d-block" style="width:100%">
    <div class="carousel-caption">
      <h3>Los Angeles</h3>
      <p>We had such a great time in LA!</p>
    </div>
  </div>
  <div class="carousel-item">
    <img src="<?= $img_path ?>slide4.jpg" alt="Chicago" class="d-block" style="width:100%">
    <div class="carousel-caption">
      <h3>Chicago</h3>
      <p>Thank you, Chicago!</p>
    </div> 
  </div>
</div>


<button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
  <span class="carousel-control-prev-icon"></span>
</button>
<button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
  <span class="carousel-control-next-icon"></span>
</button>
</div> -->
    </div>
    <div class="list">
        <div class="head-list">
            <div class="title-list">
                <div class="text">
                    <a href="?act=danhsach&sachmoi=1">Sách Mới</a>
                </div>
                <canvas></canvas>
            </div>
            <div class="view-all">
                <a href="?act=danhsach&sachmoi=1">Xem tất cả</a>
            </div>
        </div>
        <div class="main-list">
            
                <div class="blockcontent">
                <?php foreach ($sachmoi as $sach) :
                extract($sach);
            ?>
                    <div class="product-contener">
                        <div class="product">
                            <div class="image">
                                <a href="?act=chitietsach&idsp=<?= $id ?>"><img src="<?= $img_path . $hinh ?>" alt=""></a>
                                <?php if ($giamgia != 0) : ?>
                                    <span class="saleprice">-<?= $giamgia ?>%</span>
                                <?php endif ?>
                            </div>
                            <div class="d-pro-content">
                                <div class="productname book_name">
                                    <a href="?act=chitietsach&idsp=<?= $id ?>"><?= $tensach ?></a>
                                </div>
                                <div class="fields author">
                                    <span><a href="?act=danhsach&tacgia=<?= $tacgia ?>"><?= $tacgia ?></a></span>
                                </div>
                                <div class="d_price_group">
                                    <?php if ($giamgia != 0) :
                                        $giamoi = $gia - $gia * $giamgia / 100;
                                    ?>
                                        <div class="prices"><?= number_format($giamoi, 0, ',', '.') ?><sup> đ</sup></div>
                                        <div class="rootprice"><del><?= number_format($gia, 0, ',', '.') ?></del> <sup> đ</sup></div>
                                    <?php else : ?>
                                        <div class="prices"><?= number_format($gia, 0, ',', '.') ?><sup> đ</sup></div>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>

                    </div>
                    <?php endforeach ?>
                </div>
            
        </div>
        <div class="list">
            <div class="head-list">
                <div class="title-list">
                    <div class="text">
                        <a href="?act=danhsach">Sách Bán Chạy</a>
                    </div>
                    <canvas></canvas>
                </div>
                <div class="view-all">
                    <a href="?act=danhsach">Xem tất cả</a>
                </div>
            </div>
            <div class="main-list">
                 <div class="blockcontent">
                 <?php foreach ($sachbanchay as $sbc) :
                        extract($sbc);
                    ?>
                    <div class="product-contener">
                        <div class="product">
                            <div class="image">
                                <a href="?act=chitietsach&idsp=<?= $id ?>"><img src="<?= $img_path . $hinh ?>" alt=""></a>
                                <?php if ($giamgia != 0) : ?>
                                    <span class="saleprice">-<?= $giamgia ?>%</span>
                                <?php endif ?>
                            </div>
                            <div class="d-pro-content">
                                <div class="productname book_name">
                                    <a href="?act=chitietsach&idsp=<?= $id ?>"><?= $tensach ?></a>
                                </div>
                                <div class="fields author">
                                    <span><a href="?act=danhsach&tacgia=<?= $tacgia ?>"><?= $tacgia ?></a></span>
                                </div>
                                <div class="d_price_group">
                                    <?php if ($giamgia != 0) :
                                        $giamoi = $gia - $gia * $giamgia / 100;
                                    ?>
                                        <div class="prices"><?= number_format($giamoi, 0, ',', '.') ?><sup> đ</sup></div>
                                        <div class="rootprice"><del><?= number_format($gia, 0, ',', '.') ?></del> <sup> đ</sup></div>
                                    <?php else : ?>
                                        <div class="prices"><?= number_format($gia, 0, ',', '.') ?><sup> đ</sup></div>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>

                    </div>
                    <?php endforeach ?>
            </div>
        
        </div>
        <div class="list">
            <div class="head-list">
                <div class="title-list">
                    <div class="text">
                        <a href="?act=danhsach">Đề xuất cho bạn</a>
                    </div>
                    <canvas></canvas>
                </div>
                <div class="view-all">
                    <a href="?act=danhsach">Xem tất cả</a>
                </div>
            </div>
            <div class="main-list">
             <div class="blockcontent">
             <?php foreach ($sachrand as $srd) :
                        extract($srd);
                    ?>
                    <div class="product-contener">
                        <div class="product">
                            <div class="image">
                                <a href="?act=chitietsach&idsp=<?= $id ?>"><img src="<?= $img_path . $hinh ?>" alt=""></a>
                                <?php if ($giamgia != 0) : ?>
                                    <span class="saleprice">-<?= $giamgia ?>%</span>
                                <?php endif ?>
                            </div>
                            <div class="d-pro-content">
                                <div class="productname book_name">
                                    <a href="?act=chitietsach&idsp=<?= $id ?>"><?= $tensach ?></a>
                                </div>
                                <div class="fields author">
                                    <span><a href="?act=danhsach&tacgia=<?= $tacgia ?>"><?= $tacgia ?></a></span>
                                </div>
                                <div class="d_price_group">
                                    <?php if ($giamgia != 0) :
                                        $giamoi = $gia - $gia * $giamgia / 100;
                                    ?>
                                        <div class="prices"><?= number_format($giamoi, 0, ',', '.') ?><sup> đ</sup></div>
                                        <div class="rootprice"><del><?= number_format($gia, 0, ',', '.') ?></del> <sup> đ</sup></div>
                                    <?php else : ?>
                                        <div class="prices"><?= number_format($gia, 0, ',', '.') ?><sup> đ</sup></div>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>

                    </div>
                    <?php endforeach ?>
            </div>
        
            </div>
        </div>
    </div>
</div>
</main>
</div>