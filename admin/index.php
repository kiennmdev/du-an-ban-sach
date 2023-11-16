<?php
session_start();
// if (isset($_POST['submit'])) {
//     $admin = $_POST['admin'];
//     $password = $_POST['pass'];
//     include '../model/pdo.php';
//     include '../model/taikhoan.php';
//     $dstk = loadAlltk();
//     foreach ($dstk as $tk) {
//         extract($tk);
//         if ($admin == $user && $password == $pass && $role == 0) {
//             $_SESSION['username'] = $admin;
//             $_SESSION['iduser'] = $id;
//             $_SESSION['role'] = $role;
//         }
//     }
// if (isset($_SESSION['username']) && $_SESSION['role'] == 0) {

require_once '../model/pdo.php';
require_once '../_global.php';
require_once '../model/danhmuc.php';
require_once '../model/sach.php';
include 'header.php';
$dsdm = load_all_danhmuc();
$dssp = load_all_sach();
// $dsthongke = null;

if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
            // Trang chủ
        case 'trangchu':
            include 'trangchu/trangchu.php';
            break;

            // Loại hàng
        case 'loaihang':
            if (isset($_GET['iddm'])) {
                $iddm = $_GET['iddm'];
                delete_danhmuc($iddm);
                header('location: ?act=loaihang');
            }
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $madanhmuc = $_POST['madanhmuc']; //đây là 1 mảng
                delete_multi_danhmuc($madanhmuc);
                header('location: ?act=loaihang');
            }
            include 'loaihang/loaihang.php';
            break;

        case 'sualoaihang':
            if (isset($_GET['iddm']) && $_GET['iddm'] > 0) {
                $iddm = $_GET['iddm'];
                $dm = load_one_danhmuc($iddm);
                extract($dm);
                if (isset($_POST['sualoaihang'])) {
                    $madanhmuc = $_POST['madanhmuc'];
                    $tendanhmuc = $_POST['tendanhmuc'];
                    $trangthai = $_POST['trangthai'];

                    if (empty($tendanhmuc)) {
                        $err['tenloaihang'] = 'Bạn chưa nhập tên loại hàng';
                    }
                    // if (empty($trangthai)) {
                    //     $err['trangthai'] = 'Bạn chưa chọn trạng thái';
                    // }
                    if (!$err) {
                        update_danhmuc($madanhmuc, $tendanhmuc, $trangthai);
                        header('location: ?act=loaihang');
                    }
                    
                   
                }
                include 'loaihang/sualoaihang.php';
            }
            break;
        case 'themloaihang':
            if (isset($_POST['themloaihang'])) {
                $tenloaihang = $_POST['tenloaihang'];
                $trangthai = $_POST['trangthai'];
                $err = [];
                if (empty($tenloaihang)) {
                    $err['tenloaihang'] = 'Bạn chưa nhập tên loại hàng';
                }
                // if (empty($trangthai)) {
                //     $err['trangthai'] = 'Bạn chưa chọn trạng thái';
                // }
                if (!$err) {
                    insert_danhmuc($tenloaihang, $trangthai);
                    header('location: ?act=loaihang');
                }
                
            }
            include 'loaihang/themloaihang.php';
            break;

            // Khách hàng
            // case 'khachhang':
            //     include 'khachhang/khachhang.php';
            //     break;
            // case 'suakhachhang':
            //     if (isset($_GET['idtk']) && $_GET['idtk'] > 0) {
            //         $idtk = $_GET['idtk'];
            //         $tk = loadOnetk($idtk);
            //         extract($tk);
            //         if (isset($_POST['suatk'])) {
            //             $tendn = $_POST['tendangnhap'];
            //             $mk = $_POST['matkhau'];
            //             $xacnhanmk = $_POST['xacnhanmatkhau'];
            //             $kichhoat = $_POST['kichhoat'];
            //             $vaitro = $_POST['vaitro'];
            //             $hoten = $_POST['hoten'];
            //             $email = $_POST['email'];
            //             $sdt = $_POST['sdt'];
            //             $diachi = $_POST['diachi'];
            //             $image = $_FILES['hinhanh'];
            //             $photo = $img;
            //             if ($mk == $xacnhanmk) {
            //                 if (!empty($image['name'])) {
            //                     $photo = time() . '_' . $image['name'];
            //                     move_uploaded_file($image['tmp_name'],'../' . $img_path . $photo);
            //                 }
            //                 edittaikhoan($tendn, $mk, $kichhoat, $vaitro, $hoten, $email, $sdt, $diachi, $photo, $idtk);
            //                 header('location: ?act=khachhang');
            //             }
            //         }
            //         include 'khachhang/suakhachhang.php';
            //     }
            //     break;
            // case 'themkhachhang':
            //     if (isset($_POST['themmoi'])) {
            //         $tendn = $_POST['tendangnhap'];
            //         $mk = $_POST['matkhau'];
            //         $xacnhanmk = $_POST['xacnhanmatkhau'];
            //         $kichhoat = $_POST['kichhoat'];
            //         $vaitro = $_POST['vaitro'];
            //         $hoten = $_POST['hoten'];
            //         $email = $_POST['email'];
            //         $sdt = $_POST['sdt'];
            //         $diachi = $_POST['diachi'];
            //         $image = $_FILES['hinhanh'];
            //         $photo = null;

            //         if ($mk == $xacnhanmk) {
            //             if (!empty($image['name'])) {
            //                 $photo = time() . '_' . $image['name'];
            //                 move_uploaded_file($image['tmp_name'],'../' . $img_path . $photo);
            //             }
            //             addtaikhoan($tendn, $mk, $kichhoat, $vaitro, $hoten, $email, $sdt, $diachi, $photo);
            //             header('location: ?act=khachhang');
            //         }
            //     }
            //     include 'khachhang/themkhachhang.php';
            //     break;
            // case 'xoakhachhang':
            //     if (isset($_GET['idtk']) && $_GET['idtk'] > 0) {
            //         $idtk = $_GET['idtk'];
            //         deltaikhoan($idtk);
            //     }
            //     header('location: ?act=khachhang');
            //     break;

            // Hàng hóa
        case 'hanghoa':
            if (isset($_GET['idsp']) && $_GET['idsp'] > 0) {
                $idsp = $_GET['idsp'];
                delete_sach($idsp);
                header('location: ?act=hanghoa');
            }
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $masach = $_POST['masach']; 
                delete_multi_item_sach($masach);
                header('location: ?act=hanghoa');
            }
            include 'hanghoa/hanghoa.php';
            break;

        case 'suahanghoa':
            if (isset($_GET['idsp']) && $_GET['idsp'] > 0) {
                $idsp = $_GET['idsp'];
                $sp = load_one_sach($idsp);
                extract($sp);
                if (isset($_POST['suahanghoa'])) {
                    $tensach = $_POST['tensach'];
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
                        update_sach($idsp, $tensach, $hinh, $nhaxuatban, $soluong, $gia, $mota, $ngayxuatban, $madanhmuc, $trangthai);
                        header("location: ?act=hanghoa");
                    }
                }
                include 'hanghoa/suahanghoa.php';
            }
            break;
        case 'themhanghoa':
            if (isset($_POST['themmoi'])) {
                $tensach = $_POST['tensach'];
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
                    insert_sach($tensach, $hinh, $nhaxuatban, $soluong, $gia, $mota, $ngayxuatban, $madanhmuc, $trangthai);
                    header("location: ?act=hanghoa");
                }
            }
            include 'hanghoa/themhanghoa.php';
            break;

            // Bình luận
            // case 'binhluan':
            //     $dsCmtOfPro = totalCmtOfPro();
            //     include 'binhluan/binhluan.php';
            //     break;
            // case 'chitietbl':
            //     if (isset($_GET['idsp']) && $_GET['idsp'] > 0) {
            //         $idsp = $_GET['idsp'];
            //         $dscmt = loadComment($idsp);
            //         include 'binhluan/chitietbl.php';
            //     }
            //     break;

            // case 'xoabinhluan':
            //     if (isset($_GET['idbl']) && $_GET['idbl'] > 0) {
            //         $idsp = $_GET['idsp'];
            //         $idbl = $_GET['idbl'];
            //         delCmt($idbl);
            //         $backlink = 'location: ?act=chitietbl&idsp=' . $idsp;
            //         header($backlink);
            //     }
            //     break;

            // case 'thongke':
            //     include 'thongke/list.php';
            //     break;

            // case 'bieudo':
            //         include 'thongke/bieudo.php';
            //     break;

            // default:
            //     include 'trangchu/trangchu.php';
            //     break;
    }
} else {
    include 'trangchu/trangchu.php';
}
include 'footer.php';
// }
// else {
//     include 'loginadmin.php';
// }
// }
