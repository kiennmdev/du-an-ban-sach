<?php
session_start();
require_once '../model/pdo.php';
require_once '../_global.php';
require_once '../model/danhmuc.php';
require_once '../model/sach.php';
require_once '../model/nguoidung.php';
require_once '../model/binhluan.php';
require_once '../model/bill.php';
require_once '../model/thongke.php';
$dsdm = load_all_danhmuc();
$dssp = load_all_sach();
$nguoidung = load_all_nguoidung();
$thongke1 = thong_ke_sanpham_danhmuc();
$thongke2 = thong_ke_binhluan_sanpham();
$thongke3 = [];
$thongke4 = [];
if (isset($_POST['loginAdmin'])) {
    $err = [];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    if (empty($email)) {
        $err['email'] = "Bạn chưa nhập email";
    }
    if (empty($pass)) {
         $err['pass'] = "Bạn chưa nhập mật khẩu";
    }
    if (!$err) {
        $tk = check_nguoidung($email,$pass);
        if ($tk && $tk['capbac'] == 0) {
            $_SESSION['idtk'] = $tk['id'];
            header('location: ?act=home');
        }
        else{
            $err['tk'] = "Tài khoản không tồn tại hoặc không phải tài khoản Admin";
        }
    }
}
if (isset($_SESSION['idtk'])) {
    $nd = load_one_nguoidung($_SESSION['idtk']);
$act = $_GET['act'] ?? '';
$check = true;
switch ($act) {
    case 'home':
        $fromdate = '2023-11-01';
        $todate = date("Y-m-d");
        $err = [];
        if (isset($_POST['chart1'])) {
            if ($_POST['todate'] <  $_POST['fromdate']) {
                $err['chart1'] = "Thời gian bắt đầu lớn hơn thời gian kết thúc.";
            } else{
                $fromdate = $_POST['fromdate'];
                $todate = $_POST['todate'];
            }
            
        }
        $fromdate1 = '2023-11-01';
        $todate1 = date("Y-m-d");
        if (isset($_POST['chart2'])) {
            if ($_POST['todate1'] <  $_POST['fromdate1']) {
                $err['chart2'] = "Thời gian bắt đầu lớn hơn thời gian kết thúc.";
            } else{
                $fromdate1 = $_POST['fromdate1'];
                $todate1 = $_POST['todate1'];
            }
            
        }
        $thongke4 = thong_ke_thu_nhap_theo_khoang_thoigian($fromdate1,$todate1);
        // var_dump($thongke4);
        // die;
        $thongke3 = thong_ke_sanpham_banduoc_theo_date($fromdate,$todate);
        $VIEW = "home.php";
        break;

    case 'danhmuc':
        if (isset($_GET['iddm'])) {
            $iddm = $_GET['iddm'];
            delete_danhmuc($iddm);
            header('location: ?act=danhmuc');
        }
        if (isset($_POST['deleteall'])) {
            $madanhmuc = $_POST['id']; //đây là 1 mảng
            delete_multi_danhmuc($madanhmuc);
            header('location: ?act=danhmuc');
        }
        if (isset($_POST['search'])) {
            $dsdm = timkiem_danhmuc($_POST['key']);
        }
        $VIEW = "danhmuc/list.php";
        break;
    case 'adddanhmuc':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tendanhmuc = $_POST['tendanhmuc'];
            $trangthai = $_POST['trangthai'];
            $err = [];
            if (empty($tendanhmuc)) {
                $err['tendanhmuc'] = 'Bạn chưa nhập tên loại hàng';
            }
            if (!$err) {
                insert_danhmuc($tendanhmuc, $trangthai);
                header('location: ?act=danhmuc');
            }
            
        }
        $VIEW = "danhmuc/add.php";
        break;
    case 'editdanhmuc':
        if (isset($_GET['iddm']) && $_GET['iddm'] > 0) {
            $iddm = $_GET['iddm'];
            $dm = load_one_danhmuc($iddm);
            extract($dm);
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // $madanhmuc = $_POST['madanhmuc'];
                $tendanhmuc = $_POST['tendanhmuc'];
                $trangthai = $_POST['trangthai'];

                if (empty($tendanhmuc)) {
                    $err['tenloaihang'] = 'Bạn chưa nhập tên loại hàng';
                }
                if (!$err) {
                    update_danhmuc($iddm, $tendanhmuc, $trangthai);
                    header('location: ?act=danhmuc');
                }
                
            }
            $VIEW = "danhmuc/edit.php";
        }
        break;
    
    //SẢN PHẨM
    case 'sanpham':
        if (isset($_GET['idsp']) && $_GET['idsp'] > 0) {
            $idsp = $_GET['idsp'];
            delete_sach($idsp);
            header('location: ?act=sanpham');
        }
        if (isset($_POST['deleteall'])) {
            $masach = $_POST['id']; 
            delete_multi_item_sach($masach);
            header('location: ?act=sanpham');
        }
        if (isset($_POST['search'])) {
            $dssp = timkiem_sach($_POST['key']);
        }
        $VIEW = "sanpham/list.php";
        break;
    case 'addsanpham':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tensach = $_POST['tensach'];
            $tacgia = $_POST['tacgia'];
            $img = $_FILES['hinh'];
            $nhaxuatban = $_POST['nxb'];
            $soluong = $_POST['soluong'];
            $gia = $_POST['gia'];
            $giamgia = $_POST['giamgia'];
            $mota = $_POST['mota'];
            $ngayxuatban = $_POST['timexb'];
            $madanhmuc = $_POST['loaisach'];
            $trangthai = $_POST['trangthai'];
            // $hinh = null;

            $err = [];
            if (empty($tensach)) {
                $err['tensach'] = 'Bạn chưa nhập tên sách';
            }
            if (empty($tacgia)) {
                $err['tacgia'] = 'Bạn chưa nhập tên tác giả';
            }
            if (empty($img['name'])) {
                $err['img'] = 'Bạn chưa đăng ảnh bìa';
            }
            if (empty($nhaxuatban)) {
                $err['nxb'] = 'Bạn chưa nhập tên nhà xuất bản';
            }
            if (empty($soluong)) {
                $err['soluong'] = 'Bạn chưa nhập số lượng';
            }
            if (empty($gia)) {
                $err['gia'] = 'Bạn chưa nhập giá';
            }
            if (empty($mota)) {
                $err['mota'] = 'Bạn chưa nhập mô tả';
            }
            if (empty($ngayxuatban)) {
                $err['timexb'] = 'Bạn chưa nhập ngày xuất bản';
            }

            if (!$err) {
                if ($img['name'] != "") {
                    $hinh = time() . "_" . $img['name'];
                    move_uploaded_file($img['tmp_name'], "../" . $img_path . $hinh);
                }
                insert_sach($tensach, $tacgia, $hinh, $nhaxuatban, $soluong, $gia,$giamgia, $mota, $ngayxuatban, $madanhmuc, $trangthai);
                header("location: ?act=sanpham");
            }
        }
        $VIEW = "sanpham/add.php";
        break;
    case 'editsanpham':
        if (isset($_GET['idsp']) && $_GET['idsp'] > 0) {
            $idsp = $_GET['idsp'];
            $sp = load_one_sach($idsp);
            extract($sp);
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $tensach = $_POST['tensach'];
                $tacgia = $_POST['tacgia'];
                $img = $_FILES['hinh'];
                $nhaxuatban = $_POST['nxb'];
                $soluong = $_POST['soluong'];
                $gia = $_POST['gia'];
                $giamgia = $_POST['giamgia'];
                $mota = $_POST['mota'];
                $ngayxuatban = $_POST['timexb'];
                $madanhmuc = $_POST['loaisach'];
                $trangthai = $_POST['trangthai'];

                $err = [];
                if (empty($tensach)) {
                    $err['tensach'] = 'Bạn chưa nhập tên sách';
                }
                if (empty($tacgia)) {
                    $err['tacgia'] = 'Bạn chưa nhập tên tác giả';
                }
                if (empty($nhaxuatban)) {
                    $err['nxb'] = 'Bạn chưa nhập tên nhà xuất bản';
                }
                if (empty($soluong)) {
                    $err['soluong'] = 'Bạn chưa nhập số lượng';
                }
                if (empty($gia)) {
                    $err['gia'] = 'Bạn chưa nhập giá';
                }
                if (empty($mota)) {
                    $err['mota'] = 'Bạn chưa nhập mô tả';
                }
                if (empty($ngayxuatban)) {
                    $err['timexb'] = 'Bạn chưa nhập ngày xuất bản';
                }

                if (!$err) {
                    if ($img['name'] != "") {
                        $hinh = time() . "_" . $img['name'];
                        move_uploaded_file($img['tmp_name'], "../" . $img_path . $hinh);
                    }
                    update_sach($idsp, $tensach, $tacgia, $hinh, $nhaxuatban, $soluong, $gia,$giamgia, $mota, $ngayxuatban, $madanhmuc, $trangthai);
                    header("location: ?act=sanpham"); 
                }
            }
            $VIEW = "sanpham/edit.php";
        }
            
        break;

       // NGƯỜI DÙNG
    case 'nguoidung':
        if (isset($_GET['idnd'])) {
            $idnd = $_GET['idnd'];
            delete_nguoidung($idnd);
            header("Location: ?act=nguoidung");
        }
        if (isset($_POST['deleteall'])) {
            $idnd = $_POST['id'];
            delete_nguoidung_multi_item($idnd);
            header("Location: ?act=nguoidung");
        }
        if (isset($_POST['key'])) {
            $nguoidung = timkiem_nguoidung($_POST['key']);
        }
        $VIEW = "nguoidung/list.php";
        break;

    case 'addnguoidung':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $hoten = $_POST['hoten'];
            $email = $_POST['email'];
            $matkhau = $_POST['matkhau'];
            $sodienthoai = $_POST['sodienthoai'];
            $diachi = $_POST['diachi'];
            $gioitinh = $_POST['gioitinh'];
            $capbac = $_POST['capbac'];
            $trangthai = $_POST['trangthai'];
            $img = $_FILES['hinh'];
            $hinh = "default.jpg";

            $err = [];
            if (empty($hoten)) {
                $err['hoten'] = "Bạn chưa nhập họ tên"; 
            }
            if (empty($email)) {
                $err['email'] = "Bạn chưa nhập email"; 
            } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $err['email'] = "Sai định dạng email"; 
            }
            if (empty($matkhau)) {
                $err['matkhau'] = "Bạn chưa nhập mật khẩu"; 
            }
            $regex_phone = '/^0\d{9}$/';
            if (empty($sodienthoai)) {
                $err['sodienthoai'] = "Bạn chưa nhập số điện thoại"; 
            } else if (!preg_match($regex_phone,$sodienthoai)) {
                $err['sodienthoai'] = "Nhập sai định dạng số điện thoại"; 
            }

            if (!$err) {
                if (!empty($img['name'])) {
                    $hinh = $img['name'];
                    $target_dir = "../" . $img_path;
                    $target_file = $target_dir . basename($hinh);
                    move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);
                }
                insert_nguoidung_admin($email, $matkhau, $hoten, $sodienthoai, $diachi,$hinh,$gioitinh,$capbac,$trangthai);
                header("Location: ?act=nguoidung");
            }
        }
        $VIEW = "nguoidung/add.php";
        break;
    case 'editnguoidung':
        if (isset($_GET['idnd'])) {
            $idnd = $_GET['idnd'];
            $nd = load_one_nguoidung($idnd);
            extract($nd);
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $idnd = $_POST['idnd'];
                $hoten = $_POST['hoten'];
                $email = $_POST['email'];
                $matkhau = $_POST['matkhau'];
                $sodienthoai = $_POST['sodienthoai'];
                $diachi = $_POST['diachi'];
                $gioitinh = $_POST['gioitinh'];
                $capbac = $_POST['capbac'];
                $trangthai = $_POST['trangthai'];
                $img = $_FILES['hinh'];

                $err = [];
                if (empty($hoten)) {
                    $err['hoten'] = "Bạn chưa nhập họ tên"; 
                }
                if (empty($email)) {
                    $err['email'] = "Bạn chưa nhập email"; 
                } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $err['email'] = "Sai định dạng email"; 
                }
                if (empty($matkhau)) {
                    $err['matkhau'] = "Bạn chưa nhập mật khẩu"; 
                }
                $regex_phone = '/^0\d{9}$/';
                if (empty($sodienthoai)) {
                    $err['sodienthoai'] = "Bạn chưa nhập số điện thoại"; 
                } else if (!preg_match($regex_phone,$sodienthoai)) {
                    $err['sodienthoai'] = "Nhập sai định dạng số điện thoại"; 
                }

                if (!$err) {
                    if (!empty($img['name'])) {
                        $hinh = time() . '_' . $img['name'];
                        move_uploaded_file($img["tmp_name"], "../" . $img_path . $hinh);
                    }
                    update_nguoidung($idnd, $email, $matkhau, $hoten, $sodienthoai, $diachi, $hinh, $gioitinh, $capbac, $trangthai);
                    header("Location: ?act=nguoidung");
                }
            }
            $VIEW = "nguoidung/edit.php";
        }
        break;

    case 'binhluan':
        $binhluan = load_all_binhluan_sanpham();
        $VIEW = "binhluan/list.php";
        break;
    case 'chitietbinhluan':
        if (isset($_GET['masanpham'])) {
            $masanpham =$_GET['masanpham'];
            $blct = load_all_binhluan_chitiet($masanpham);
        }
        if (isset($_GET['maxoa'])) {
            $masanpham =$_GET['xoa'];
            deletet_binhluan($masanpham);
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            delete_binhluan_multi_item($id);
            header("Location: ?act=binhluan");
        }
        $VIEW = "binhluan/chitietbl.php";
        break;

    case 'donhang':
        $dsdh = load_all_bill();
        if (isset($_POST['updatebill'])) {
            $trangthai = $_POST['updatebill'];
            if (isset($_POST['id'])) {
                $madonhang = $_POST['id'];
                update_status_bill($madonhang,$trangthai);
                header('location: ?act=donhang');
            }
            
        }
        // if (isset($_POST['search'])) {
        //     $dsdh = load_one_bill();
        // }
        $VIEW = 'donhang/list.php';
        break;

    case 'chitietdonhang':
        if (isset($_GET['iddh'])) {
            $iddh = $_GET['iddh'];
            $dsspdh = load_detail_bill($iddh);
            $bill = load_one_bill($iddh);
            $VIEW = 'donhang/detail.php';
        }
        break;

    case 'thongke':
        $VIEW = 'thongke/list.php';
        break;
    case 'bieudo':
        $VIEW = 'thongke/bieudo.php';
        break;
    default:
        $check = false;
        $VIEW = "404.php";
        break;
}








if ($check) {
    include 'header.php';
    include 'aside.php';
}
include $VIEW;
if ($check) {
    include 'footer.php';
}

}else {
    include 'adminLogin.php';
}