<div class="main">
<div class="bang1 mb">
<div class="title">
        Thống kê sản phẩm trong danh mục
    </div>
    <div class="listdanhmuc">
        <table class="table">
            <thead>
                <tr>
                    <th>Mã loại hàng</th>
                    <th>Tên loại hàng</th>
                    <th>Số lượng</th>
                    <th>Giá nhỏ nhất</th>
                    <th>Giá lớn nhất</th>
                    <th>Giá trung bình</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($dsthongke1 as $thongke1): 
                    extract($thongke1);
                ?>
                    <tr>
                        <td><?= $id ?></td>
                        <td><?= $name ?></td>
                        <td><?=$soluong?></td>
                        <td>$<?=$gia_min?></td>
                        <td>$<?=$gia_max?></td>
                        <td>$<?=$gia_avg?></td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
        <div class="chucnang">
                <a href="?act=bieudo&chart=sanpham"><button type="button" class="btn btn-primary" >Xem biểu đồ</button></a>
        </div>
    </div>
</div>
<div class="bang2">
<div class="title">
        Thống kê bình luận trong sản phẩm
    </div>
    <div class="listdanhmuc">
        <table class="table">
            <thead>
                <tr>
                    <th>Mã hàng hóa</th>
                    <th>Tên hàng hóa</th>
                    <th>Tổng số bình luận</th>
                    <th>Ngày mới nhất</th>
                    <th>Ngày cũ nhất</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($dsthongke2 as $thongke2): 
                    extract($thongke2);
                ?>
                    <tr>
                        <td><?= $id ?></td>
                        <td><?= $name ?></td>
                        <td><?=$tongsobl?></td>
                        <td>$<?=$ngaymoinhat?></td>
                        <td>$<?=$ngaycunhat ?></td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
        <div class="chucnang">
                <a href="?act=bieudo&chart=binhluan"><button type="button" class="btn btn-primary" >Xem biểu đồ</button></a>
        </div>
    </div>
</div>
</div>