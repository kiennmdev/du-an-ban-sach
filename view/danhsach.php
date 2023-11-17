
                <div class="main-content">
                    <div class="main-title">
                        <h2><?= $tendanhmuc ?></h2>
                    </div>
                    <div class="content">
                        <div class="content-sort">
                            <div class="view">
                                <span><a href=""><i class="fa-solid fa-table-cells-large"></i></a></i></span>
                                <span><a href=""><i class="fa-solid fa-list"></i></a></span>
                            </div>
                            <div class="sort">
                                <span>Xem theo:</span>&nbsp;&nbsp;&nbsp;
                                <select name="" id="">
                                    <option value="0">Mới trước
                                        cũ sau
                                    </option>
                                    <option value="1">Cũ trước
                                        mới sau
                                    </option>
                                    <option value="2">Giá thấp
                                        đến cao
                                    </option>
                                    <option value="3" selected="">Giá cao
                                        đến thấp
                                    </option>
                                    <option value="4">Bán chạy
                                        nhất
                                    </option>
                                    <option value="5">Xem
                                        nhiều
                                    </option>
                                    <option value="6">Ngày xuất
                                        bản
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="blockcontent">
                            <?php foreach($dssp as $sp) :
                                extract($sp);
                            ?>
                            <div class="product-contener">
                                <div class="product">
                                    <div class="image">
                                        <a href="?act=chitietsach&idsp=<?= $masach ?>"><img src="<?= $img_path . $hinh ?>" alt=""></a>
                                        <span class="saleprice">-10%</span>
                                    </div>
                                    <div class="d-pro-content">
                                        <div class="productname">
                                            <a href="?act=chitietsach&idsp=<?= $masach ?>"><?= $tensach ?></a>
                                        </div>
                                        <div class="fields">
                                            <span><a href="">Mạc Thần Hoàn</a></span>
                                        </div>
                                        <div class="d_price_group">
                                            <div class="prices">148.500 <sup>đ</sup></div>
    
                                            <div class="rootprice"><del><?= number_format($gia,0,',','.') ?></del> <sup>đ</sup></div>
                                        </div>
                                    </div>
                                </div>
    
                            </div>
                            <?php endforeach ?>
                            <!-- <div class="product-contener">
                                <div class="product">
                                    <div class="image">
                                        <a href="#"><img src="assets/image/anh1.jpg" alt=""></a>
                                        <span class="discount"></span>
                                    </div>
                                    <div class="d-pro-content">
                                        <div class="productname">
                                            <a href="">Địa Cầu Online, tập 1</a>
                                        </div>
                                        <div class="fields">
                                            <a href="">Mạc Thần Hoàn</a>
                                        </div>
                                        <div class="d_price_group">
                                            <div class="prices">148.500 <sup>đ</sup></div>
    
                                            <div class="rootprice"><del>165.000</del> <sup>đ</sup></div>
                                        </div>
                                    </div>
                                </div>
    
                            </div>
                            <div class="product-contener">
                                <div class="product">
                                    <div class="image">
                                        <a href="#"><img src="assets/image/anh1.jpg" alt=""></a>
                                        <span class="discount"></span>
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
                            <div class="product-contener">
                                <div class="product">
                                    <div class="image">
                                        <a href="#"><img src="assets/image/anh1.jpg" alt=""></a>
                                        <span class="discount"></span>
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
                            <div class="product-contener">
                                <div class="product">
                                    <div class="image">
                                        <a href="#"><img src="assets/image/anh1.jpg" alt=""></a>
                                        <span class="discount"></span>
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
                            <div class="product-contener">
                                <div class="product">
                                    <div class="image">
                                        <a href="#"><img src="assets/image/anh1.jpg" alt=""></a>
                                        <span class="discount"></span>
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
    
                            </div> -->
                        </div>
                        <div class="footcontent">
                            <ul>
                                <li><a href="">1</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>