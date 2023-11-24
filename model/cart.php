<?php
function tong_thanh_tien(){
    $sum = 0;
    $carts = $_SESSION['giohang'];
    foreach($carts as $cart){
        extract($cart);
        $sum += $soluongmua * ($gia - $gia*$giamgia/100);
    }
    return $sum;
}
function add_to_cart($masach,$tensach,$hinh,$gia,$giamgia,$soluongmua,$soluongsach){
    $sach = [
        'masach' => $masach,
        'tensach' => $tensach,
        'hinh' => $hinh,
        'gia' => $gia,
        'giamgia' => $giamgia,
        'soluongmua' => $soluongmua,
        'soluongsach' => $soluongsach
    ];
    if (!isset($_SESSION['giohang'][$masach])) {
        $_SESSION['giohang'][$masach]= $sach;
    }
    else {
        $_SESSION['giohang'][$masach]['soluongmua'] += 1;
    }
}