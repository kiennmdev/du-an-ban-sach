
              <div class="main-content">
                <div class="product-view-contener">
                    <div class="image-pvc">
                        <img src="<?=$img_path . $hinh?>" alt=" ">
                    </div>
                    <div class="showinfo-pvc">
                        <h4><?= $tensach ?></h4>
    
                        <div class="author-contener">
                            Tác Giả: <span><?= $tacgia ?></span> <br>
                            NXB: <span><?= $nhaxuatban ?></span>
                        </div>
                        <div class="quantity">
                            Số lượng: <span><?= $soluong?></span>
                        </div>
                        <div class="price-contener">
                            <?php if($giamgia != 0): 
                                $giamoi = $gia - $gia*$giamgia/100;
                            ?>
                                <span class="rootprice"><del><?= number_format($gia,0,',','.') ?></del> <sup>đ</sup></span>
                                <span class="price"><?= number_format($giamoi,0,',','.') ?><sup>đ</sup></span>
                            <?php else: ?>
                                <span class="price"><?= number_format($gia,0,',','.') ?><sup>đ</sup></span>
                            <?php endif ?>
                            
                        </div>
                        <div class="module-productdetail">
                            <h4 class="fontsize20">
                                Mô Tả:
                            </h4>
                            <p>
                              <?= $mota ?>
                            </p>
                        </div>
                        <div class="button-buy">
                            <form action="?act=giohang" method="post">
                                <!-- <input type="hidden" name="masach" value="<?= $idsp ?>">
                                <input type="hidden" name="tensach" value="<?= $tensach ?>">
                                <input type="hidden" name="hinh" value="<?=$hinh?>">
                                <input type="hidden" name="soluongmua" value="1">
                                <input type="hidden" name="soluongban" value="<?= $soluong ?>">
                                <input type="hidden" name="gia" value="<?= $giamgia != 0 ? $giamoi = $gia - $gia*$giamgia/100 : $gia ?>"> -->

                                <a href="?act=giohang&idsp=<?= $idsp ?>"><button type="button" class="btn btn-danger">Mua Ngay</button></a>
                                <a href="?act=giohang&idsp=<?= $idsp ?>"><button type="button" class="btn btn-warning">Thêm Vào Giỏ Hàng</button></a>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="module-productfeids">
                    <h4 class="fontsize20">
                        Thông Tin Chi Tiết
                    </h4>
                    <hr>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td>Tác giả</td>
                                <td><?= $tacgia ?></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Nhà xuất bản</td>
                                <td><?= $nhaxuatban ?></td>
                            </tr>
                            <tr>
                                <td>Lượt xem</td>
                                <td><?= $luotxem ?></td>
                            </tr>
                            <tr>
                                <td>Ngày xuất bản</td>
                                <td><?= $ngayxuatban ?></td>
                            </tr>
                            <tr>
                                <td>Danh mục</td>
                                <td><?= $danhmucsach ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="box-comment">
                    <h4 class="fontsize20">
                        Bình Luận
                    </h4>
                    <hr>
                    <div class="view-comment">
                        <?php foreach($listbinhluan as $bl): 
                            extract($bl);
                            ?>
                        <div class="comment">
                            <div class="avatar-cmt">
                                <img src="<?= $img_path . $hinh ?>" alt=" ">
                            </div>
                            <div class="info-cmt">
                                <div class="name-user"><?= $hoten ?> </div>
                                <div class="content-cmt">
                                    <?= $noidung ?>
                                </div>
                                <div class="footcmt">
                                    <span class="like"><i class="fa-regular fa-thumbs-up"></i> Thích</span>
                                    <span class="time"><?= $thoigian ?></span>
                                </div>
                            </div>
                        </div>
                        <?php endforeach ?>
                        
                    </div>
                    <?php
                    if (isset($_SESSION['idtk'])) {
                        ?>
                        <div class="submit-comment">
                            <form action="">
                                <div class="mb-3 mt-3">
                                    <textarea class="form-control" rows="5" id="comment" name="text"
                                        placeholder="Bình Luận Tại Đây"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    <?php } else { ?>
                        <p><a href="?act=dangnhap">Đăng nhập</a> hoặc <a href="?act=dangky">Đăng ký</a> để có thể gửi bình luận.</p>
                        <hr>
                    <?php }?>
                </div>
                <div class="module-sameauthor">
                    <h4 class="fontsize20">Sách Cùng Tác Giả</h4>
                    <hr>
                   
                    <div class="blockcontent">
                    <?php foreach($spsameauthor as $sach): 
                        extract($sach);
                        ?>
                    <div class="product">
                                    <div class="image">
                                        <a href="?act=chitietsach&idsp=<?= $id ?>"><img src="<?= $img_path . $hinh ?>" alt=""></a>
                                        <?php if($giamgia != 0): ?>
                                        <span class="saleprice">-<?=$giamgia?>%</span>
                                        <?php endif ?>
                                    </div>
                                    <div class="d-pro-content">
                                        <div class="productname">
                                            <a href="?act=chitietsach&idsp=<?= $id ?>"><?= $tensach ?></a>
                                        </div>
                                        <div class="fields">
                                            <span><a href=""><?= $tacgia ?></a></span>
                                        </div>
                                        <div class="d_price_group">
                                        <?php if($giamgia != 0): 
                                            $giamoi = $gia - $gia*$giamgia/100;
                                        ?>
                                            <div class="prices"><?= number_format($giamoi,0,',','.')?><sup>đ</sup></div>
                                            <div class="rootprice"><del><?= number_format($gia,0,',','.') ?></del> <sup>đ</sup></div>
                                        <?php else: ?>
                                            <div class="prices"><?=number_format($gia,0,',','.')?><sup>đ</sup></div>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach ?>
                    </div>
                   
                </div>
                <div class="module-alsobought">
                    <h4 class="fontsize20">
                        Có Thể Bạn Quan Tâm
                    </h4>
                    <hr>
                    <div class="blockcontent">
                    <?php foreach($spsamedanhmuc as $sach): 
                        extract($sach);
                        ?>
                    <div class="product">
                                    <div class="image">
                                        <a href="?act=chitietsach&idsp=<?= $id ?>"><img src="<?= $img_path . $hinh ?>" alt=""></a>
                                        <?php if($giamgia != 0): ?>
                                        <span class="saleprice">-<?=$giamgia?>%</span>
                                        <?php endif ?>
                                    </div>
                                    <div class="d-pro-content">
                                        <div class="productname">
                                            <a href="?act=chitietsach&idsp=<?= $id ?>"><?= $tensach ?></a>
                                        </div>
                                        <div class="fields">
                                            <span><a href=""><?= $tacgia ?></a></span>
                                        </div>
                                        <div class="d_price_group">
                                        <?php if($giamgia != 0): 
                                            $giamoi = $gia - $gia*$giamgia/100;
                                        ?>
                                            <div class="prices"><?= number_format($giamoi,0,',','.')?><sup>đ</sup></div>
                                            <div class="rootprice"><del><?= number_format($gia,0,',','.') ?></del> <sup>đ</sup></div>
                                        <?php else: ?>
                                            <div class="prices"><?=number_format($gia,0,',','.')?><sup>đ</sup></div>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach ?>
                    </div>
                </div>
    
              </div>
            </div>
        </main>
    </div>