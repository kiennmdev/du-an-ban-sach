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
                            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
                                <div class="mb-3 mt-3">
                                    <textarea class="form-control" rows="5" id="comment" name="noidung"
                                        placeholder="Bình Luận Tại Đây"></textarea>
                                </div>
                                <input type="hidden" name="masach" value="<?= $idsp?>">
                                <!-- <input type="hidden" name="manguoidung" value="<?= $_SESSION['idtk']?>"> -->
                                <button type="submit" name="addbl" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    <?php } else { ?>
                        <p><a href="?act=dangnhap">Đăng nhập</a> hoặc <a href="?act=dangky">Đăng ký</a> để có thể gửi bình luận.</p>
                        <hr>
                    <?php }?>
                </div>
                <?php 
                
                if (isset($_POST['addbl'])&& $_POST['addbl']) {
                    $noidung = $_POST['noidung'];
                    $masach = $_POST['masach'];
                    $manguoidung = $_SESSION['idtk'];
                    $thoigian = date("Y/m/d h:i:sa");
                    print_r($thoigian) ;
                    insert_binhluan($noidung,$thoigian, $manguoidung, $masach);
                    header('Location: '. $_SERVER['HTTP_REFERER']);
                }
                ?>