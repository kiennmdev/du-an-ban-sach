<?php
function insert_binhluan($noidung, $manguoidung, $masach)
{
    $sql = "INSERT INTO binhluan(noidung,manguoidung,masach) values(?,?,?)";
    pdo_execute($sql, $noidung, $manguoidung, $masach);
}
function load_all_binhluan_sanpham(){
    $sql = "SELECT sach.id as id, sach.tensach as tensach, MIN(binhluan.thoigian) as cunhat, MAX(binhluan.thoigian) as moinhat, COUNT(binhluan.noidung) as tongsobl from binhluan 
    inner join sach on binhluan.masach = sach.id group by masach order by id desc";
    $listbl = pdo_query($sql);
    return $listbl;
}

function timkiem_binhluan_sanpham($tensach){
    $sql = "SELECT sach.id as id, sach.tensach as tensach, MIN(binhluan.thoigian) as cunhat, MAX(binhluan.thoigian) as moinhat, COUNT(binhluan.noidung) as tongsobl from binhluan 
    inner join sach on binhluan.masach = sach.id where sach.tensach like '%$tensach%' group by masach";
    $listbl = pdo_query($sql);
    return $listbl;
}

function load_all_binhluan_chitiet($masach)
{
    $sql = "SELECT binhluan.*,nguoidung.hoten as hoten,sach.tensach as tensach from binhluan inner join nguoidung on binhluan.manguoidung = nguoidung.id 
    inner join sach on binhluan.masach = sach.id where masach='$masach' order by id desc";
    $listbl = pdo_query($sql);
    return $listbl;
}

function load_all_binhluan_chitiet_theosp($masach)
{
    $sql = "SELECT binhluan.*,nguoidung.hoten,nguoidung.hinh as avatar from binhluan 
    inner join nguoidung on binhluan.manguoidung = nguoidung.id 
    inner join sach on binhluan.masach = sach.id where masach=$masach and binhluan.trangthai=1";
    $listbl = pdo_query($sql);
    return $listbl;
}

function deletet_binhluan($id)
{
    $sql = "delete from binhluan where id=" . $id;
    pdo_execute($sql);
}

function an_binhluan($id)
{
    $sql = "UPDATE binhluan set trangthai = 0 where id=" . $id;
    pdo_execute($sql);
}
 // $id là tham số chứa mảng mã danh mục
 function an_binhluan_multi_item($id) {
    $mabl = '';
    foreach ($id as $item) {
        $mabl .= $item . ", ";
    }
    //Xóa dấu thừa (,) ở bên phải
    $mabl = rtrim($mabl, ", ");
    $sql = "UPDATE binhluan set trangthai = 0 WHERE id IN ($mabl)";
    pdo_execute($sql);
}

function hien_binhluan($id)
{
    $sql = "UPDATE binhluan set trangthai = 1 where id=" . $id;
    pdo_execute($sql);
}