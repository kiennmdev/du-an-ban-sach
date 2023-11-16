<div class="main">
            <div class="title">
                Tổng hợp bình luận
            </div>
            <div class="listhanghoa">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Hàng hóa</th>
                            <th>Số BL</th>
                            <th>Mới nhất</th>
                            <th>Cũ nhất</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dsCmtOfPro as $cmtOfPro):
                            extract($cmtOfPro);
                        ?>
                        <tr>
                            <td><?= $name ?></td>
                            <td><?= $totalcmt ?></td>
                            <td><?= $somnhat ?></td>
                            <td><?= $cunhat ?></td>
                            <td>
                                <a href="?act=chitietbl&idsp=<?=  $id ?>"><button type="button" class="btn btn-secondary">Chi tiết</button></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>