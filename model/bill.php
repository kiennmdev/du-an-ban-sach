<?php
function load_all_bill(){
    $sql = "SELECT * FROM donhang order by trangthai";
    return pdo_query($sql);
}

function load_one_bill($idbill){
    $sql = "SELECT * FROM donhang where id = $idbill";
    return pdo_query_one($sql);
}

function load_detail_bill($iddh){
    $sql = "SELECT chitietdonhang.*, sach.hinh, sach.tensach FROM chitietdonhang join sach on chitietdonhang.masach  = sach.id where madon = $iddh";
    return pdo_query($sql);
}

function update_status_bill($madon,$trangthai){
    $md = "";
    foreach ($madon as $item) {
        $md .= $item . ", ";
    }
    //Xóa dấu (,) thừa ở bên phải
    $md = rtrim($md, ", ");
    $sql = "UPDATE donhang SET trangthai=$trangthai WHERE id IN ($md);";
    pdo_execute($sql);
}

function load_all_bill_user($idtk){
    $sql = "SELECT * FROM donhang where manguoidung = $idtk order by trangthai";
    return pdo_query($sql);
}
function load_all_bill_user_status0($idtk){
    $sql = "SELECT * FROM donhang where manguoidung = $idtk and trangthai = 0";
    return pdo_query($sql);
}
function load_all_bill_user_status1($idtk){
    $sql = "SELECT * FROM donhang where manguoidung = $idtk and trangthai = 1";
    return pdo_query($sql);
}
function load_all_bill_user_status2($idtk){
    $sql = "SELECT * FROM donhang where manguoidung = $idtk and trangthai = 2";
    return pdo_query($sql);
}
function load_all_bill_user_status3($idtk){
    $sql = "SELECT * FROM donhang where manguoidung = $idtk and trangthai = 3";
    return pdo_query($sql);
}
function load_all_bill_user_status4($idtk){
    $sql = "SELECT * FROM donhang where manguoidung = $idtk and trangthai = 4";
    return pdo_query($sql);
}

function bill_cancel($mabill){
    $sql = "UPDATE donhang set trangthai=4 where id = $mabill";
    pdo_execute($sql);
}

