<?php
function add_to_order($idtk,$hoten,$sodienthoai,$diachinhan,$tongtien,$ngaydathang,$ghichu){
    $sql = "INSERT INTO donhang(manguoidung,hoten,sodienthoai,diachinhan,tongtien,ngaydathang,ghichu) value (?,?,?,?,?,?,?)";
    pdo_execute($sql,$idtk,$hoten,$sodienthoai,$diachinhan,$tongtien,$ngaydathang,$ghichu);
}

function add_to_order_session($idtk,$hoten,$sodienthoai,$diachinhan){
    $_SESSION['bill']['order'] = [

    ] ;
}