
                <div class="main-content">
                    <div class="main-title">
                        <h2><?= $title ?></h2>
                    </div>
                    <div class="content">
                        <div class="content-sort">
                            <div class="view">
                                <!-- <span><a href=""><i class="fa-solid fa-table-cells-large"></i></a></i></span>
                                <span><a href=""><i class="fa-solid fa-list"></i></a></span> -->
                            </div>
                            <div class="sort">
                            <form action="" method="post">
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
                                </select>
                                <!-- <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button> -->
                               </form>
                            </div>
                        </div>
                        <div class="blockcontent">
                            <?php foreach($dssp as $sp) :
                                extract($sp);
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