<?php
// require_once "pdo.php";

function load_all_sach()
{
    $sql = "SELECT sach.*, danhmuc.tendanhmuc FROM sach JOIN danhmuc ON sach.madanhmuc=danhmuc.madanhmuc ORDER BY masach DESC";
    return pdo_query($sql);
}

function load_all_sach_madanhmuc($madanhmuc)
{
    $sql = "SELECT sach.*, danhmuc.tendanhmuc FROM sach JOIN danhmuc ON sach.madanhmuc=danhmuc.madanhmuc where sach.madanhmuc = $madanhmuc ORDER BY masach DESC";
    return pdo_query($sql);
}


function load_one_sach($ma_sach)
{
    $sql = "SELECT *, madanhmuc AS iddm  FROM sach WHERE masach=?";
    return pdo_query_one($sql, $ma_sach);
}
function insert_sach($tensach, $hinh, $nhaxuatban, $soluong, $gia, $mota, $ngayxuatban, $madanhmuc, $trangthai)
{
    $sql = "INSERT INTO sach(tensach, hinh, nhaxuatban, soluong, gia, mota, ngayxuatban, madanhmuc, trangthai) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";
    pdo_execute($sql, $tensach, $hinh, $nhaxuatban, $soluong, $gia, $mota, $ngayxuatban, $madanhmuc, $trangthai);
}
function update_sach($masach, $tensach, $hinh, $nhaxuatban, $soluong, $gia, $mota, $ngayxuatban, $madanhmuc, $trangthai)
{
    $sql = "UPDATE sach SET tensach=?, hinh=?, nhaxuatban=?, soluong=?, gia=?, mota=?, ngayxuatban=?, madanhmuc=?, trangthai=? WHERE masach=?";
    pdo_execute($sql, $tensach, $hinh, $nhaxuatban, $soluong, $gia, $mota, $ngayxuatban, $madanhmuc, $trangthai, $masach);
}
//Xóa cứng
function delete_sach($masach)
{
    $sql = "DELETE FROM sach WHERE masach=?";
    pdo_execute($sql, $masach);
}

function delete_multi_item_sach($masach){
    $ma_sach = "";
    foreach ($masach as $item) {
        $ma_sach .= $item . ", ";
    }
    $ma_sach = rtrim($ma_sach,", ");
    $sql = "DELETE FROM sach where masach in ($ma_sach)";
    pdo_execute($sql);
}

//Xóa mềm
function delete_sach_mem($masach)
{
    $sql = "UPDATE sach SET trangthai=0 WHERE masach=?";
    pdo_execute($sql, $masach);
}
// $sql = "SELECT sach.*, ten_danh_muc FROM sach JOIN danhmuc ON sach.ma_danh_muc=danhmuc.ma_danh_muc WHERE trang_thai = 1 ORDER BY id DESC";
