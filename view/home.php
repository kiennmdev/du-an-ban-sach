<div class="main-content">
    <div class="main-banner">

    </div>
    <div class="list">
        <div class="head-list">
            <div class="title-list">
                <div class="text">
                    <a href="#">Sách Mới</a>
                </div>
                <canvas></canvas>
            </div>
            <div class="view-all">
                <a href="#">Xem tất cả</a>
            </div>
        </div>
        <div class="main-list">
            <?php foreach ($sachmoi as $sach) :
                extract($sach);
            ?>
                <div class="blockcontent">
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
                                    <span><a href=""><?= $tacgia ?></a></span>
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
                </div>
            <?php endforeach ?>
        </div>
        <div class="list">
            <div class="head-list">
                <div class="title-list">
                    <div class="text">
                        <a href="#">Sách Bán Chạy</a>
                    </div>
                    <canvas></canvas>
                </div>
                <div class="view-all">
                    <a href="#">Xem tất cả</a>
                </div>
            </div>
            <div class="main-list">
                <div class="blockcontent">
                    <div class="product-contener">
                        <div class="product">
                            <div class="image">
                                <a href="#"><img src="assets/image/anh1.jpg" alt=""></a>
                                <span class="saleprice">-10%</span>
                            </div>
                            <div class="d-pro-content">
                                <div class="productname">
                                    <a href="">Địa Cầu Online, tập 1</a>
                                </div>
                                <div class="fields">
                                    <span><a href="">Mạc Thần Hoàn</a></span>
                                </div>
                                <div class="d_price_group">
                                    <div class="prices">148.500 <sup>đ</sup></div>

                                    <div class="rootprice"><del>165.000</del> <sup>đ</sup></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="list">
                <div class="head-list">
                    <div class="title-list">
                        <div class="text">
                            <a href="#">Sắp Phát Hành</a>
                        </div>
                        <canvas></canvas>
                    </div>
                    <div class="view-all">
                        <a href="#">Xem tất cả</a>
                    </div>
                </div>
                <div class="main-list">
                    <div class="blockcontent">
                        <div class="product-contener">
                            <div class="product">
                                <div class="image">
                                    <a href="#"><img src="assets/image/anh1.jpg" alt=""></a>
                                    <span class="saleprice">-10%</span>
                                </div>
                                <div class="d-pro-content">
                                    <div class="productname">
                                        <a href="">Địa Cầu Online, tập 1</a>
                                    </div>
                                    <div class="fields">
                                        <span><a href="">Mạc Thần Hoàn</a></span>
                                    </div>
                                    <div class="d_price_group">
                                        <div class="prices">148.500 <sup>đ</sup></div>

                                        <div class="rootprice"><del>165.000</del> <sup>đ</sup></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </main>
</div>