<?php
// require "pdo.php";
// require "sach.php";
// function load_donhang_hoanthanh(){
//     $sql = "SELECT chitietdonhang.masach, SUM(chitietdonhang.soluong) AS soluongmua FROM `chitietdonhang` JOIN donhang ON chitietdonhang.madon = donhang.id where donhang.trangthai=3 GROUP BY chitietdonhang.masach;";
//     return pdo_query($sql);
// }
// function tang_luot_ban_sach(){
//     $sachhoanthanhs = load_donhang_hoanthanh();
//     $dssach = load_all_sach();
//     foreach($sachhoanthanhs as $sachhoanthanh){
//         extract($sachhoanthanh);
//         foreach($dssach as $sach){
//             if ($masach == $sach['id']) {
//                 $sql = "UPDATE sach set luotban = luotban + $soluongmua where id = $masach";
//                 pdo_execute($sql);
//             }
//         }
//     }
    
// }

function thong_ke_sanpham_danhmuc(){
    $sql = "SELECT sach.madanhmuc, danhmuc.tendanhmuc, COUNT(sach.madanhmuc) as tongsoluong, max(sach.gia) as datnhat, min(sach.gia) as renhat, avg(sach.gia) AS giatrungbinh FROM `sach` 
    JOIN danhmuc ON sach.madanhmuc = danhmuc.id GROUP BY sach.madanhmuc";
    return pdo_query($sql);
}

function thong_ke_binhluan_sanpham(){
    $sql = "SELECT sach.id, sach.tensach, MIN(binhluan.thoigian) as cunhat, MAX(binhluan.thoigian) as moinhat, COUNT(binhluan.noidung) as tongsobl from binhluan 
    inner join sach on binhluan.masach = sach.id group by masach";
    return pdo_query($sql);
}

// function thong_ke_soluong_sanpham_ban_trong_ngay($date){
//     $sql = "SELECT date(donhang.ngaydathang) as ngaydathang,SUM(chitietdonhang.soluong) as soluongban FROM `donhang` 
//     JOIN chitietdonhang ON donhang.id = chitietdonhang.madon 
//     WHERE date(donhang.ngaydathang) = '$date' AND donhang.trangthai = 3;";
//     return pdo_query_one($sql);
// }
function thong_ke_sanpham_banduoc_theo_date($date1,$date2){
    $sql = "SELECT date(donhang.ngaydathang) AS ngaydathang, SUM(chitietdonhang.soluong) as tongsoluong FROM `donhang` JOIN chitietdonhang ON donhang.id = chitietdonhang.madon 
    WHERE date(donhang.ngaydathang) >= '$date1' AND date(donhang.ngaydathang) <= '$date2' AND donhang.trangthai = 3 GROUP BY date(donhang.ngaydathang)";
    return pdo_query($sql);
}
//SELECT date(donhang.ngaydathang) AS ngaydathang, SUM(chitietdonhang.soluong) FROM `donhang` JOIN chitietdonhang ON donhang.id = chitietdonhang.madon WHERE date(donhang.ngaydathang) >= '2023-11-25' AND date(donhang.ngaydathang) <= '2023-11-29' AND donhang.trangthai = 3 GROUP BY date(donhang.ngaydathang);
//SELECT donhang.id,donhang.trangthai, SUM(chitietdonhang.soluong),donhang.ngaydathang FROM `chitietdonhang` JOIN donhang ON donhang.id = chitietdonhang.madon WHERE date(donhang.ngaydathang) >= '2023-11-25' AND date(donhang.ngaydathang) <= '2023-11-29' AND donhang.trangthai = 3 GROUP BY donhang.id;
function thong_ke_thu_nhap_theo_khoang_thoigian($date1,$date2){
    $sql = "SELECT date(ngaydathang) AS ngaydathang, SUM(tongtien) AS thunhaptrongngay FROM `donhang` WHERE date(ngaydathang) >= '$date1' AND date(ngaydathang) <= '$date2' AND trangthai = 3 GROUP BY date(ngaydathang)";
    // $sql = "SELECT date(MAX(ngaydathang)) AS tungay, date(MIN(ngaydathang)) AS denngay ,SUM(tongtien) FROM `donhang` 
    // WHERE date(ngaydathang) >= '$date1' and date(ngaydathang) <= '$date2' and trangthai = 3";
    return pdo_query($sql);
}


