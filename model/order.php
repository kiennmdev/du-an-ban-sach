<?php
function add_to_order($idtk,$hoten,$email,$sodienthoai,$diachinhan,$tongtien,$pttt,$ghichu){
    $sql = "INSERT INTO donhang(manguoidung,hoten,email,sodienthoai,diachinhan,tongtien,cachthanhtoan,ghichu) value (?,?,?,?,?,?,?,?)";
    return pdo_execute_returnID($sql,$idtk,$hoten,$email,$sodienthoai,$diachinhan,$tongtien,$pttt,$ghichu);
}

function add_to_order_detail($madon,$masach,$soluong,$dongia,$thanhtien){
    $sql = "INSERT INTO chitietdonhang(madon,masach,soluong,dongia,thanhtien) value(?,?,?,?,?)";
    pdo_execute($sql,$madon,$masach,$soluong,$dongia,$thanhtien);
}
