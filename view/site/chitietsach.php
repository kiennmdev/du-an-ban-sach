
              <div class="main-content">
                <div class="product-view-contener">
                    <div class="image-pvc">
                        <img src="<?=$img_path . $hinh?>" alt=" ">
                    </div>
                    <div class="showinfo-pvc">
                        <h4 class="mt-3"><?= $tensach ?></h4>
    
                        <div class="author-contener mt-2">
                            Tác Giả: <span><?= $tacgia ?></span> <br>
                            NXB: <span><?= $nhaxuatban ?></span>
                        </div>
                        <div class="quantity mt-2">
                            Số lượng: <span><?= $soluong?></span>
                        </div> 
                        <div class="price-contener mt-2">
                            Giá bán:
                            <?php if($giamgia != 0): 
                                $giamoi = $gia - $gia*$giamgia/100;
                            ?>
                                <span class="rootprice"><del><?= number_format($gia,0,',','.') ?></del> <sup>đ</sup></span>
                                <span class="price"><?= number_format($giamoi,0,',','.') ?><sup>đ</sup></span>
                            <?php else: ?>
                                <span class="price"><?= number_format($gia,0,',','.') ?><sup>đ</sup></span>
                            <?php endif ?>
                            
                        </div>
                        
                        <div class="button-buy mt-2">
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
                <div class="module-productdetail">
                            <h4 class="fontsize20">
                                Giới Thiệu Sách
                            </h4>
                            <hr>
                            <p>
                              <?= $mota ?>
                            </p>
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
                                <img src="<?= $img_path . $avatar ?>" alt=" ">
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
                    <?php if (isset($_SESSION['idtk'])) {?>
                        <div class="submit-comment">
                            <form action="?act=chitietsach&idsp=<?=$_GET['idsp']?>" method="POST">
                                <div class="mb-3 mt-3">
                                    <textarea class="form-control" rows="5" id="comment" name="noidung"
                                        placeholder="Bình Luận Tại Đây"></textarea>
                                </div>
                                <input type="hidden" name="masach" value="<?= $idsp?>">
                                <button type="submit" name="addbl" class="btn btn-primary">Submit</button>
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
                    <div class="product-contener">
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
                                            <span><a href="?act=danhsach&tacgia=<?= $tacgia ?>"><?= $tacgia ?></a></span>
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
                    <div class="product-contener">
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
                                            <span><a href="?act=danhsach&tacgia=<?= $tacgia ?>"><?= $tacgia ?></a></span>
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
                    </div>
                                <?php endforeach ?>
                    </div>
                </div>
    
              </div>
            </div>
        </main>
    </div>