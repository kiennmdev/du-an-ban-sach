<?php
// require_once "pdo.php";
function load_all_danhmuc(){
    $sql = "SELECT * FROM danhmuc";
    return pdo_query($sql);
}

function load_one_danhmuc($madanhmuc){
    $sql = "SELECT * FROM danhmuc where id=?";
    return pdo_query_one($sql,$madanhmuc);
}

function insert_danhmuc($tendanhmuc,$trangthai){
    $sql = "INSERT INTO danhmuc(tendanhmuc,trangthai) values(?,?)";
    pdo_execute($sql,$tendanhmuc,$trangthai);
}

function update_danhmuc($madanhmuc, $tendanhmuc, $trangthai){
    $sql = "UPDATE danhmuc SET tendanhmuc=?, trangthai=? where id=?";
    pdo_execute($sql, $tendanhmuc, $trangthai, $madanhmuc);
}

function delete_danhmuc($madanhmuc){
    $sql ="DELETE FROM danhmuc WHERE id=?";
    pdo_execute($sql, $madanhmuc);
}

function delete_multi_danhmuc($madanhmuc){
    $madm = "";
    foreach ($madanhmuc as $item) {
        $madm .= $item . ", ";
    }
    //Xóa dấu (,) thừa ở bên phải
    $madm = rtrim($madm, ", ");
    $sql = "DELETE FROM danhmuc where id in ($madm)";
    pdo_execute($sql);
}

function timkiem_danhmuc($tendanhmuc){
    $sql = "SELECT * FROM danhmuc where tendanhmuc like '%$tendanhmuc%' ";
    return pdo_query($sql);
}

