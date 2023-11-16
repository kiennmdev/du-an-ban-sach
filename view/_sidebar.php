<aside>
                    <div class="box">
                        <div class="box-list">
                            <div class="box-title">
                                <h3>Danh Mục</h3>
                            </div>
                            <a href="#"><strong>Nổi bật</strong></a>
                            <?php foreach($dsdm as $dm):
                                extract($dm); 
                            ?>
                            <a href="?act=danhsach&iddm=<?=$madanhmuc?>"><?= $tendanhmuc ?></a>
                            <?php endforeach ?>
                        </div>
                    </div>
                    <div class="box">
                        <div class="box-list">
                            <div class="box-title">
                                <h3>Tác Giả</h3>
                            </div>
                        </div>
                    </div>
                    <div class="box">
                        <div class="box-list">
                            <div class="box-title">
                                <h3>Nhà Xuất Bản</h3>
                            </div>
                        </div>
                    </div>
                    
                </aside>