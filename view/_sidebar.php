<aside>
                    <div class="box">
                        <div class="box-list">
                            <div class="box-title">
                                <h3>Danh Mục</h3>
                            </div>
                            <!-- <a href="#"><strong>Nổi bật</strong></a> -->
                            <?php foreach($dsdm as $dm):
                                extract($dm); 
                            ?>
                            <a href="?act=danhsach&iddm=<?=$id?>"><?= $tendanhmuc ?></a>
                            <?php endforeach ?>
                        </div>
                    </div>
                    <div class="box">
                        <div class="box-list">
                            <div class="box-title">
                                <h3>Tác Giả</h3>
                            </div>
                            <?php foreach($top5tacgia as $author):
                                extract($author); 
                            ?>
                            <a href="?act=danhsach&tacgia=<?=$tacgia?>"><?= $tacgia ?></a>
                            <?php endforeach ?>
                        </div>
                        
                    </div>
                    <div class="box">
                        <div class="box-list">
                            <div class="box-title">
                                <h3>Nhà Xuất Bản</h3>
                            </div>
                            <?php foreach($top5nxb as $nxb):
                                extract($nxb); 
                            ?>
                            <a href="?act=danhsach&nxb=<?=$nhaxuatban?>"><?= $nhaxuatban ?></a>
                            <?php endforeach ?>
                        </div>
                    </div>
                    
                </aside>