
              <div class="main-content">
                <div class="product-view-contener">
                    <div class="image-pvc">
                        <img src="<?=$img_path . $hinh?>" alt=" ">
                    </div>
                    <div class="showinfo-pvc">
                        <h4><?= $tensach ?></h4>
    
                        <div class="author-contener">
                            Tác Giả: <span>Mạc Thần Hoàn</span> <br>
                            NXB: <span><?= $nhaxuatban ?></span>
                        </div>
                        <div class="quantity">
                            Số lượng: <span><?= $soluong?></span>
                        </div>
                        <div class="price-contener">
                            <span class="rootprice"><del><?= number_format($gia,0,',','.') ?></del> <sup>đ</sup></span>
                            <span class="price">149.000 <sup>đ</sup></span>
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
                            <button type="button" class="btn btn-danger">Mua Ngay</button>
                            <button type="button" class="btn btn-warning">Thêm Vào Giỏ Hàng</button>
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
                                <td>Lastname</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Nhà xuất bản</td>
                                <td>Doe</td>
                            </tr>
                            <tr>
                                <td>Lượt xem</td>
                                <td>6</td>
                            </tr>
                            <tr>
                                <td>Ngày xuất bản</td>
                                <td>Dooley</td>
                            </tr>
                            <tr>
                                <td>Danh mục</td>
                                <td>Dooley</td>
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
                        <div class="comment">
                            <div class="avatar-cmt">
                                <img src="assets/image/Capture.PNG" alt="">
                            </div>
                            <div class="info-cmt">
                                <div class="name-user">Binladen </div>
                                <div class="content-cmt">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati sapiente quo ducimus
                                    quas, quae earum voluptatibus ad iusto voluptates placeat?
                                </div>
                                <div class="footcmt">
                                    <span class="like"><i class="fa-regular fa-thumbs-up"></i> Thích</span>
                                    <span class="time">20/12/2023</span>
                                </div>
                            </div>
                        </div>
                        <div class="comment">
                            <div class="avatar-cmt">
                                <img src="assets/image/Capture.PNG" alt="">
                            </div>
                            <div class="info-cmt">
                                <div class="name-user">Binladen <sup>20/11/2023</sup></div>
                                <div class="content-cmt">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati sapiente quo ducimus
                                    quas, quae earum voluptatibus ad iusto voluptates placeat?
                                </div>
                                <div class="footcmt">
                                    <span class="like"><i class="fa-regular fa-thumbs-up"></i> Thích</span>
                                    <span class="time">20/12/2023</span>
                                </div>
                            </div>
    
                        </div>
                        
                    </div>
                    <div class="submit-comment">
                        <form action="">
                            <div class="mb-3 mt-3">
                                <textarea class="form-control" rows="5" id="comment" name="text"
                                    placeholder="Bình Luận Tại Đây"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
                <div class="module-sameauthor">
                    <h4 class="fontsize20">Sách Cùng Tác Giả</h4>
                    <hr>
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
                <div class="module-alsobought">
                    <h4 class="fontsize20">
                        Có Thể Bạn Quan Tâm
                    </h4>
                    <hr>
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
        </main>
    </div>