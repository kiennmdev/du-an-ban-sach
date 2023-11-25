<?php
function insert_binhluan($noidung, $manguoidung, $masach)
{
    $sql = "insert into binhluan(noidung,manguoidung,masach) values(?,?,?)";
    pdo_execute($sql, $noidung, $manguoidung, $masach);
}
function load_all_binhluan_sanpham(){
    $sql = "SELECT sach.id as id, sach.tensach as tensach, MIN(binhluan.thoigian) as cunhat, MAX(binhluan.thoigian) as moinhat, COUNT(binhluan.noidung) as tongsobl from binhluan inner join sach on binhluan.masach = sach.id group by masach order by id desc";
    $listbl = pdo_query($sql);
    return $listbl;
}
function load_all_binhluan_chitiet($masach)
{
    $sql = "SELECT binhluan.*,nguoidung.hoten as hoten,sach.tensach as tensach from binhluan inner join nguoidung on binhluan.manguoidung = nguoidung.id inner join sach on binhluan.masach = sach.id where masach='$masach' order by id desc";
    $listbl = pdo_query($sql);
    return $listbl;
}

function load_all_binhluan_chitiet_theosp($masach)
{
    $sql = "SELECT binhluan.*,nguoidung.hoten as hoten,sach.tensach as tensach from binhluan inner join nguoidung on binhluan.manguoidung = nguoidung.id inner join sach on binhluan.masach = sach.id where masach='$masach' order by id desc";
    $listbl = pdo_query($sql);
    return $listbl;
}

function deletet_binhluan($id)
{
    $sql = "delete from binhluan where id=" . $id;
    pdo_execute($sql);
}
 // $id là tham số chứa mảng mã danh mục
 function delete_binhluan_multi_item($id) {
    $mabl = '';
    foreach ($id as $item) {
        $mabl .= $item . ", ";
    }
    //Xóa dấu thừa (,) ở bên phải
    $mabl = rtrim($mabl, ", ");
    $sql = "DELETE FROM binhluan WHERE id IN ($mabl)";
    pdo_execute($sql);
}