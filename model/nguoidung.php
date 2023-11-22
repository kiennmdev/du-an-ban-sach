<?php
function insert_nguoidung($email, $matkhau, $hoten, $sodienthoai, $diachi)
{
    $sql = "insert into nguoidung(email,matkhau,hoten,sodienthoai,diachi) values(?,?,?,?,?)";
    pdo_execute($sql,$email, $matkhau, $hoten, $sodienthoai, $diachi);
}
function insert_nguoidung_admin($email, $matkhau, $hoten, $sodienthoai, $diachi,$hinh,$gioitinh,$capbac,$trangthai)
{
    $sql = "insert into nguoidung(email,matkhau,hoten,sodienthoai,diachi,hinh,gioitinh,capbac,trangthai) values(?,?,?,?,?,?,?,?,?)";
    pdo_execute($sql,$email, $matkhau, $hoten, $sodienthoai, $diachi,$hinh,$gioitinh,$capbac,$trangthai);
}

function check_nguoidung($email, $matkhau)
{
    $sql = "select * from nguoidung where email=? and matkhau=?";
    $sp = pdo_query_one($sql,$email, $matkhau);
    return $sp;
}

function update_nguoidung($id,$email,$matkhau,$hoten,$sodienthoai,$diachi,$hinh,$gioitinh,$capbac,$trangthai)
{

    $sql = "update nguoidung set email=?,matkhau=?,hoten=?,sodienthoai=?,diachi=?,hinh=?,gioitinh=?,capbac=?,trangthai=? where id=?";

    pdo_execute($sql,$email,$matkhau,$hoten,$sodienthoai,$diachi,$hinh,$gioitinh,$capbac,$trangthai,$id);
}
function update_nguoidung_user($id,$hoten,$sodienthoai,$diachi,$hinh)
{

    $sql = "update nguoidung set hoten=?,sodienthoai=?,diachi=?,hinh=? where id=?";

    pdo_execute($sql,$hoten,$sodienthoai,$diachi,$hinh,$id);
}
function load_all_nguoidung()
{
    $sql = "select * from nguoidung order by id asc";
    $listnd = pdo_query($sql);
    return $listnd;
}
function delete_nguoidung($id)
{

    $sql = "delete from nguoidung where id=?";

    pdo_execute($sql, $id);
}
function load_one_nguoidung($id)
{
    $sql = 'SELECT * from nguoidung where id=?';
    $nd = pdo_query_one($sql,$id);
    return $nd;
}
// function update_nguoidung_admn($id,$hoten,$email,$matkhau){
//     if ($filename!='') {
//         $sql = "update nguoidung set iddm='$iddm', name ='$tensp', gia='$giasp', giamgia='$giamgiasp', mota='$motasp', img='$filename' where id='$id'";
//     } else {
//         $sql = "update nguoidung set iddm='$iddm', name ='$tensp', gia='$giasp', giamgia='$giamgiasp', mota='$motasp' where id='$id'";
//     }
    
//     pdo_execute($sql);
// }
function delete_nguoidung_multi_item($id) {
    $mand = '';
    foreach ($id as $item) {
        $mand .= $item . ", ";
    }
    //Xóa dấu thừa (,) ở bên phải
    $mand = rtrim($mand, ", ");
    $sql = "DELETE FROM nguoidung WHERE id IN ($mand)";
    pdo_execute($sql);
}
