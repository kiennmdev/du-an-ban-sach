<?php
function add_to_order($madon,$idtk,$hoten,$email,$sodienthoai,$diachinhan,$tongtien,$pttt,$pay_status,$ghichu){
    $sql = "INSERT INTO donhang(id,manguoidung,hoten,email,sodienthoai,diachinhan,tongtien,cachthanhtoan,pay_status,ghichu) value (?,?,?,?,?,?,?,?,?,?)";
    return pdo_execute($sql,$madon,$idtk,$hoten,$email,$sodienthoai,$diachinhan,$tongtien,$pttt,$pay_status,$ghichu);
}

function add_to_order_detail($madon,$masach,$soluong,$dongia,$thanhtien){
    $sql = "INSERT INTO chitietdonhang(madon,masach,soluong,dongia,thanhtien) value(?,?,?,?,?)";
    pdo_execute($sql,$madon,$masach,$soluong,$dongia,$thanhtien);
}

function insert_momo($partnerCode,$orderId,$amount,$orderInfo,$orderType,$transId,$payType,$madon){
    $sql = "INSERT INTO tbl_momo(partner_code,order_id,amount,order_info,order_type,trans_id,pay_type,ma_don) value(?,?,?,?,?,?,?,?)";
    pdo_execute($sql,$partnerCode,$orderId,$amount,$orderInfo,$orderType,$transId,$payType,$madon);
}