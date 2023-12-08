<?php
function insert_nguoidung($email, $matkhau, $hoten, $sodienthoai, $diachi,$hinh)
{
    $sql = "insert into nguoidung(email,matkhau,hoten,sodienthoai,diachi,hinh) values(?,?,?,?,?,?)";
    pdo_execute($sql,$email, $matkhau, $hoten, $sodienthoai, $diachi,$hinh);
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
function update_nguoidung_user($id,$hoten,$diachi,$gioitinh,$hinh)
{

    $sql = "update nguoidung set hoten=?,diachi=?,gioitinh=?,hinh=? where id=?";

    pdo_execute($sql,$hoten,$diachi,$gioitinh,$hinh,$id);
}
function load_all_nguoidung_mo()
{
    $sql = "select * from nguoidung where trangthai = 1";
    $listnd = pdo_query($sql);
    return $listnd;
}
function load_all_nguoidung_khoa()
{
    $sql = "select * from nguoidung where trangthai = 0";
    $listnd = pdo_query($sql);
    return $listnd;
}
function delete_nguoidung($id)
{

    $sql = "delete from nguoidung where id=?";

    pdo_execute($sql, $id);
}

function delete_nguoidung_mem($id)
{
    $sql = "UPDATE nguoidung SET trangthai=0 WHERE id=?";
    pdo_execute($sql, $id);
}

function delete_nguoidung_mem_multi_item($id) {
    $mand = '';
    foreach ($id as $item) {
        $mand .= $item . ", ";
    }
    //Xóa dấu thừa (,) ở bên phải
    $mand = rtrim($mand, ", ");
    $sql = "UPDATE nguoidung SET trangthai=0 WHERE id IN ($mand)";
    pdo_execute($sql);
}

function mo_khoa_nguoidung($id)
{
    $sql = "UPDATE nguoidung SET trangthai=1 WHERE id=?";
    pdo_execute($sql, $id);
}

function mo_khoa_nguoidung_multi_item($id) {
    $mand = '';
    foreach ($id as $item) {
        $mand .= $item . ", ";
    }
    //Xóa dấu thừa (,) ở bên phải
    $mand = rtrim($mand, ", ");
    $sql = "UPDATE nguoidung SET trangthai=1 WHERE id IN ($mand)";
    pdo_execute($sql);
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

function change_password($idtk,$newpass){
    $sql = "UPDATE nguoidung set matkhau = ? where id = $idtk";
    pdo_execute($sql,$newpass);
}

function timkiem_nguoidung($tennguoidung){
    $sql = "SELECT * from nguoidung where hoten like '%$tennguoidung%'";
    return pdo_query($sql);
}

function sendMail($email) {
    $sql = "SELECT * FROM nguoidung where email = '$email'";
    $taikhoan = pdo_query_one($sql);
    if ($taikhoan != false) {
        sendMailPass($email,$taikhoan['hoten'],$taikhoan['matkhau']);
        return 'Gửi email thành công, vui lòng kiểm tra email của bạn';
    }
    else {
        return 'Email của bạn không có trong hệ thống';
    }
}
function sendMailPass($email,$username,$password) {
    require 'PHPMailer-master/src/Exception.php';
    require 'PHPMailer-master/src/PHPMailer.php';
    require 'PHPMailer-master/src/SMTP.php';
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = PHPMailer\PHPMailer\SMTP::DEBUG_OFF;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'sandbox.smtp.mailtrap.io';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'd07ffdeaeaab29';                     //SMTP username
        $mail->Password   = 'a0191f74cef635';                               //SMTP password
        $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('duanmau@example.com', 'FakeBook');
        $mail->addAddress($email, $username);     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'User forgot password';
        $mail->Body    = 'Your password is: '.$password;
  

        $mail->send();
        // echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
