<?php

function load_all_sach()
{
    $sql = "SELECT sach.*, danhmuc.tendanhmuc FROM sach JOIN danhmuc ON sach.madanhmuc=danhmuc.id ORDER BY id DESC";
    return pdo_query($sql);
}

function load_top5_sach_same_author($tacgia){
    $sql = "SELECT * from sach where tacgia = '$tacgia' limit 0,5";
    return pdo_query($sql);
}

function load_top5_sach_same_danhmuc($iddanhmuc,$idsp){
    $sql = "SELECT * from sach where madanhmuc = $iddanhmuc and id <> $idsp limit 0,5";
    return pdo_query($sql);
}

function load_5_sach_moi()
{
    $sql = "SELECT sach.*, danhmuc.tendanhmuc FROM sach JOIN danhmuc ON sach.madanhmuc=danhmuc.id ORDER BY ngayxuatban DESC LIMIT 0,5";
    return pdo_query($sql);
}

function load_all_sach_moi()
{
    $sql = "SELECT sach.*, danhmuc.tendanhmuc FROM sach JOIN danhmuc ON sach.madanhmuc=danhmuc.id ORDER BY ngayxuatban DESC";
    return pdo_query($sql);
}

function load_5_sach_banchay()
{
    $sql = "SELECT sach.*, danhmuc.tendanhmuc FROM sach JOIN danhmuc ON sach.madanhmuc=danhmuc.id ORDER BY luotban DESC LIMIT 0,5";
    return pdo_query($sql);
}
function load_all_sach_banchay()
{
    $sql = "SELECT sach.*, danhmuc.tendanhmuc FROM sach JOIN danhmuc ON sach.madanhmuc=danhmuc.id ORDER BY luotban DESC";
    return pdo_query($sql);
}
function load_all_sach_rand()
{
    $sql = "SELECT sach.*, danhmuc.tendanhmuc FROM sach JOIN danhmuc ON sach.madanhmuc=danhmuc.id ORDER BY rand() DESC LIMIT 0,5";
    return pdo_query($sql);
}

function load_all_sach_madanhmuc($madanhmuc)
{
    $sql = "SELECT sach.*, danhmuc.tendanhmuc FROM sach JOIN danhmuc ON sach.madanhmuc=danhmuc.id where sach.madanhmuc = $madanhmuc ORDER BY id DESC";
    return pdo_query($sql);
}
function load_all_sach_tacgia($tacgia)
{
    $sql = "SELECT * FROM sach  where tacgia = ? ORDER BY id DESC";
    return pdo_query($sql,$tacgia);
}
function load_all_sach_nhaxuatban($nhaxuatban)
{
    $sql = "SELECT * FROM sach  where nhaxuatban = ? ORDER BY id DESC";
    return pdo_query($sql,$nhaxuatban);
}
function load_all_sach_timkiem($tukhoa){
    
    if ($tukhoa!="") {
        $sql = "SELECT * FROM sach where tensach like '%$tukhoa%' ORDER BY id DESC";
        return pdo_query($sql);
    }
    else {
        $err=[];
        return $err;
    }
}


function load_one_sach($ma_sach)
{
    $sql = "SELECT sach.*, tendanhmuc as danhmucsach FROM sach join danhmuc on sach.madanhmuc=danhmuc.id WHERE sach.id=?";
    return pdo_query_one($sql, $ma_sach);
}
function insert_sach($tensach, $tacgia, $hinh, $nhaxuatban, $soluong, $gia,$giamgia, $mota, $ngayxuatban, $madanhmuc, $trangthai)
{
    $sql = "INSERT INTO sach(tensach, tacgia, hinh, nhaxuatban, soluong, gia, giamgia, mota, ngayxuatban, madanhmuc, trangthai) VALUES(?,?, ?, ?, ?,?, ?, ?, ?, ?, ?)";
    pdo_execute($sql, $tensach, $tacgia, $hinh, $nhaxuatban, $soluong, $gia,$giamgia, $mota, $ngayxuatban, $madanhmuc, $trangthai);
}
function update_sach($masach, $tensach, $tacgia, $hinh, $nhaxuatban, $soluong, $gia,$giamgia, $mota, $ngayxuatban, $madanhmuc, $trangthai)
{
    $sql = "UPDATE sach SET tensach=?, tacgia=?, hinh=?, nhaxuatban=?, soluong=?, gia=?,giamgia=?, mota=?, ngayxuatban=?, madanhmuc=?, trangthai=? WHERE id=?";
    pdo_execute($sql, $tensach, $tacgia, $hinh, $nhaxuatban, $soluong, $gia,$giamgia, $mota, $ngayxuatban, $madanhmuc, $trangthai, $masach);
}
//Xóa cứng
function delete_sach($masach)
{
    $sql = "DELETE FROM sach WHERE id=?";
    pdo_execute($sql, $masach);
}

function delete_multi_item_sach($masach){
    $ma_sach = "";
    foreach ($masach as $item) {
        $ma_sach .= $item . ", ";
    }
    $ma_sach = rtrim($ma_sach,", ");
    $sql = "DELETE FROM sach where id in ($ma_sach)";
    pdo_execute($sql);
}

//Xóa mềm
function delete_sach_mem($masach)
{
    $sql = "UPDATE sach SET trangthai=0 WHERE id=?";
    pdo_execute($sql, $masach);
}
// $sql = "SELECT sach.*, ten_danh_muc FROM sach JOIN danhmuc ON sach.ma_danh_muc=danhmuc.ma_danh_muc WHERE trang_thai = 1 ORDER BY id DESC";

function load_top5_author(){
    $sql = "SELECT tacgia, COUNT(tacgia) AS soluongsach FROM `sach` GROUP BY tacgia ORDER BY soluongsach DESC LIMIT 0,5";
    return pdo_query($sql);
}

function load_top5_nxb(){
    $sql = "SELECT nhaxuatban, COUNT(nhaxuatban) FROM `sach` GROUP BY nhaxuatban ORDER BY COUNT(nhaxuatban) DESC LIMIT 0,5";
    return pdo_query($sql);
}

function tang_luot_xem($idsach){
    $sach = load_one_sach($idsach);
    $luotxem = $sach['luotxem'] + 1;
    $sql = "UPDATE sach set luotxem=$luotxem where id = $idsach";
    pdo_execute($sql);
}
function timkiem_sach($tensach){
    $sql = "SELECT sach.* , danhmuc.tendanhmuc FROM sach JOIN danhmuc ON sach.madanhmuc=danhmuc.id where tensach like '%$tensach%'";
    return pdo_query($sql);
}

function load_all_table_sach(){
    $sql = "SELECT id from sach order by id";
    return pdo_query($sql);
}

function update_luong_sach_duoc_mua(){
    $sql = "SELECT chitietdonhang.masach, COUNT(chitietdonhang.soluong) AS soluongduocban FROM `chitietdonhang` JOIN donhang ON chitietdonhang.madon = donhang.id WHERE donhang.trangthai = 3 GROUP BY chitietdonhang.masach";
    $soluong_dssach_daban = pdo_query($sql);
    $dsidsach = load_all_table_sach();
    foreach($soluong_dssach_daban as $sachdaban){
        extract($sachdaban);
        foreach($dsidsach as $idsach){
            extract($idsach);
            if ($sachdaban['masach'] == $idsach['id']) {
                $sql_update_luotban = "UPDATE sach set luotban = $soluongduocban where id = $id";
                pdo_execute($sql_update_luotban);
            }
        }
    }
    $sql_update_sl_sach_hientai = "UPDATE sach set soluonghientai = soluong - luotban";
    pdo_execute($sql_update_sl_sach_hientai);
}

function load_top5_sach_banchay()
{
    $sql = "SELECT sach.*, danhmuc.tendanhmuc FROM sach JOIN danhmuc ON sach.madanhmuc=danhmuc.id where luotban>0 ORDER BY luotban DESC LIMIT 0,5";
    return pdo_query($sql);
}

function load_top5_sach_tonkho()
{
    $sql = "SELECT sach.*, danhmuc.tendanhmuc FROM sach JOIN danhmuc ON sach.madanhmuc=danhmuc.id where luotban=0 ORDER BY luotban asc LIMIT 0,5";
    return pdo_query($sql);
}