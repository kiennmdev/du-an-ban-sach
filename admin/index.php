<?php
session_start();
require_once '../model/pdo.php';
require_once '../_global.php';
require_once '../model/danhmuc.php';
require_once '../model/sach.php';
require_once '../model/nguoidung.php';
require_once '../model/binhluan.php';
require_once '../model/bill.php';
$dsdm = load_all_danhmuc();
$dssp = load_all_sach();
$nguoidung = load_all_nguoidung();
if (isset($_SESSION['idtk'])) {
    $nd = load_one_nguoidung($_SESSION['idtk']);
}


$act = $_GET['act'] ?? '';
$check = true;
switch ($act) {
    case 'home':
        $VIEW = "home.php";
        break;

    case 'danhmuc':
        if (isset($_GET['iddm'])) {
            $iddm = $_GET['iddm'];
            delete_danhmuc($iddm);
            header('location: ?act=danhmuc');
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $madanhmuc = $_POST['id']; //đây là 1 mảng
            delete_multi_danhmuc($madanhmuc);
            header('location: ?act=danhmuc');
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
            // if (empty($trangthai)) {
            //     $err['trangthai'] = 'Bạn chưa chọn trạng thái';
            // }
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
                // if (empty($trangthai)) {
                //     $err['trangthai'] = 'Bạn chưa chọn trạng thái';
                // }
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
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $masach = $_POST['id']; 
            delete_multi_item_sach($masach);
            header('location: ?act=sanpham');
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
                insert_sach($tensach, $tacgia, $hinh, $nhaxuatban, $soluong, $gia, $mota, $ngayxuatban, $madanhmuc, $trangthai);
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
                // if (empty($img['name'])) {
                //     $err['img'] = 'Bạn chưa đăng ảnh bìa';
                // }
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
                    update_sach($idsp, $tensach, $tacgia, $hinh, $nhaxuatban, $soluong, $gia, $mota, $ngayxuatban, $madanhmuc, $trangthai);
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
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $idnd = $_POST['id'];
            delete_nguoidung_multi_item($idnd);
            header("Location: ?act=nguoidung");
        }
        $nguoidung = load_all_nguoidung();
        $VIEW = "nguoidung/list.php";
        break;
    case 'addnguoidung':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $hoten = $_POST['hoten'];
            $email = $_POST['email'];
            $matkhau = $_POST['matkhau'];
            $sodienthoai = $_POST['sodienthoai'];
            $diachi = $_POST['diachi'];
            $hinh = $_FILES['hinh']['name'];
            $target_dir = "../" . $img_path;
            $target_file = $target_dir . basename($_FILES['hinh']['name']);
            move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);
            $gioitinh = $_POST['gioitinh'];
            $capbac = $_POST['capbac'];
            $trangthai = $_POST['trangthai'];
            insert_nguoidung_admin($email, $matkhau, $hoten, $sodienthoai, $diachi,$hinh,$gioitinh,$capbac,$trangthai);
            header("Location: ?act=nguoidung");
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

                if (!empty($img['name'])) {
                    $hinh = time() . '_' . $img['name'];
                    move_uploaded_file($img["tmp_name"], "../" . $img_path . $hinh);
                }
               
                update_nguoidung($idnd, $email, $matkhau, $hoten, $sodienthoai, $diachi, $hinh, $gioitinh, $capbac, $trangthai);
                header("Location: ?act=nguoidung");
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
        $VIEW = 'donhang/list.php';
        break;

    case 'chitietdonhang':
        if (isset($_GET['iddh'])) {
            $iddh = $_GET['iddh'];
            $dsspdh = load_detail_bill($iddh);
            $VIEW = 'donhang/detail.php';
        }
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
