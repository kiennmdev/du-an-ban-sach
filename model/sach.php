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
    $sql = "SELECT * from sach where madanhmuc = '$iddanhmuc' and id <> $idsp limit 0,5";
    return pdo_query($sql);
}

function load_all_sach_moi()
{
    $sql = "SELECT sach.*, danhmuc.tendanhmuc FROM sach JOIN danhmuc ON sach.madanhmuc=danhmuc.id ORDER BY ngayxuatban DESC LIMIT 0,5";
    return pdo_query($sql);
}
function load_all_sach_banchay()
{
    $sql = "SELECT sach.*, danhmuc.tendanhmuc FROM sach JOIN danhmuc ON sach.madanhmuc=danhmuc.id ORDER BY luotban DESC LIMIT 0,5";
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


function load_one_sach($ma_sach)
{
    $sql = "SELECT * FROM sach WHERE id=?";
    return pdo_query_one($sql, $ma_sach);
}
function insert_sach($tensach, $tacgia, $hinh, $nhaxuatban, $soluong, $gia, $mota, $ngayxuatban, $madanhmuc, $trangthai)
{
    $sql = "INSERT INTO sach(tensach, tacgia, hinh, nhaxuatban, soluong, gia, mota, ngayxuatban, madanhmuc, trangthai) VALUES(?,?, ?, ?, ?, ?, ?, ?, ?, ?)";
    pdo_execute($sql, $tensach, $tacgia, $hinh, $nhaxuatban, $soluong, $gia, $mota, $ngayxuatban, $madanhmuc, $trangthai);
}
function update_sach($masach, $tensach, $tacgia, $hinh, $nhaxuatban, $soluong, $gia, $mota, $ngayxuatban, $madanhmuc, $trangthai)
{
    $sql = "UPDATE sach SET tensach=?, tacgia=?, hinh=?, nhaxuatban=?, soluong=?, gia=?, mota=?, ngayxuatban=?, madanhmuc=?, trangthai=? WHERE id=?";
    pdo_execute($sql, $tensach, $tacgia, $hinh, $nhaxuatban, $soluong, $gia, $mota, $ngayxuatban, $madanhmuc, $trangthai, $masach);
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