<?php
ob_start(); // Bắt đầu đệm đầu ra
session_start(); // Bắt đầu session

require_once "model/pdo.php";
require_once "_global.php";
require_once "model/danhmuc.php";
require_once "model/sach.php";
require_once "model/nguoidung.php";
require_once "model/binhluan.php";


$dsdm = load_all_danhmuc();
$top5tacgia = load_top5_author();
$top5nxb = load_top5_nxb();
$sachmoi = load_all_sach_moi();
$sachbanchay = load_all_sach_banchay();
$sachrand = load_all_sach_rand();
$dssp = 0;
$act = $_GET['act'] ?? "";
$view = "";
switch ($act) {
    case 'home':
        $view = "view/home.php";
        break;
    case 'danhsach':
        if (isset($_GET['iddm'])) {
            $iddm = $_GET['iddm'];
            $dssp = load_all_sach_madanhmuc($iddm);
        }
        $view = "view/danhsach.php";
        break;
    case 'chitietsach':
        if (isset($_GET['idsp'])) {
            $idsp = $_GET['idsp'];
            $sp = load_one_sach($idsp);
            extract($sp);
            $spsameauthor = load_top5_sach_same_author($tacgia);
            $spsamedanhmuc = load_top5_sach_same_danhmuc($madanhmuc, $id);
            $listbinhluan = load_all_binhluan_chitiet_theosp($id);
        }
        $view = "view/chitietsach.php";
        break;
    case 'dangnhap':
        // $err ="";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST['email'];
            $matkhau = $_POST['matkhau'];
            // $remember = isset($_POST['remember']) ? $_POST['remember'] : false;
            $checknd = check_nguoidung($email, $matkhau);
            if ($checknd) {
                extract($checknd);
                if ($trangthai == 1) {
                    $_SESSION['idtk'] = $id;
                    $_SESSION['avatar'] = $hinh;
                    $_SESSION['username'] = $hoten;
                    $_SESSION['phone'] = $sodienthoai;
                    $_SESSION['assdres'] = $diachi;
                    $_SESSION['role'] = $capbac;
                    $_SESSION['user'] = $checknd;
                    header('location: ?act=home');
                } elseif ($trangthai == 0) {
                    $err = "Tài khoản của bạn đã bị khóa mõm";
                }
            } else {
                $err = "Tài khoản sai thông tin hoặc không tồn tại";
            }
        }
        $view = "view/user/login.php";
        break;
    case 'dangky':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $hoten = $_POST['hoten'];
            $email = $_POST['email'];
            $matkhau = $_POST['matkhau'];
            $sodienthoai = $_POST['sodienthoai'];
            $diachi = $_POST['diachi'];
            insert_nguoidung($email, $matkhau, $hoten, $sodienthoai, $diachi);
            header("Location: ?act=home");
        }
        $view = "view/user/register.php";
        break;
    case 'dangxuat':
        session_unset();
        header('Location: ?act=home');
        break;
    case 'profile':
        // if (isset($_POST['logout'])) {
        //     if (isset($_COOKIE['user_email']) && isset($_COOKIE['user_password'])) {
        //         setcookie('user_email', '', time() - 3600 * 24 * 30, "/");
        //         setcookie('user_password', '', time() - 3600 * 24 * 30, "/");
        //     }
        // }
        // if (isset($_SESSION['idtk'])) {
        //     $nd = load_one_nguoidung($_SESSION['idtk']);
        //     extract($nd);
        //     if ($_SESSION['idtk'] == 0) {
        //         header("Location: admin1/index.php");
        //     }
        // }
        // else {
        //     header("Location: ?act=dangnhap"); 
        // }
        
        $view = "view/user/profile.php";
        break;

    case 'editprofile':
        if (isset($_SESSION['idtk'])) {
            $idtk = $_SESSION['idtk'];
            $nd = load_one_nguoidung($idtk);
            extract($nd);
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $idtk = $_POST['idtk'];
                $hoten = $_POST['hoten'];
                $sodienthoai = $_POST['sdt'];
                $diachi = $_POST['diachi'];
                $img = $_FILES['hinh'];

                if (!empty($img['name'])) {
                    $hinh = time() . '_' . $img['name'];
                    move_uploaded_file($img["tmp_name"], "../" . $img_path . $hinh);
                }
                update_nguoidung_user($idtk,$hoten,$sodienthoai,$diachi,$hinh);
                $_SESSION['idtk'] = $id;
                    $_SESSION['avatar'] = $hinh;
                    $_SESSION['username'] = $hoten;
                    $_SESSION['phone'] = $sodienthoai;
                    $_SESSION['assdres'] = $diachi;
                    $_SESSION['role'] = $capbac;
                header("Location: ?act=profile");
            }
        }
        $view = "view/user/editprofile.php";
        break;
    case 'recover':
        $view = "view/user/recover.php";
        break;

    case 'giohang':
        if (!isset($_SESSION['giohang'])) {
            $_SESSION['giohang'] =[];
        }; 
        function add_to_cart($masach,$tensach,$hinh,$gia){
            $sach = [
                'masach' => $masach,
                'tensach' => $tensach,
                'hinh' => $hinh,
                'gia' => $gia,
                // 'giamgia' => $giamgia,
                // 'soluong' => $soluong,
                // 'thanhtien' => $gia
            ];
            // if (!isset($_SESSION['giohang'][$masach])) {
            //     $_SESSION['giohang'][$masach] = $sach;
            // } else {
            //     $_SESSION['giohang'][$masach]['soluong'] += 1;
            // }
            return $sach;
        }
        if (isset($_POST['addcart']) && $_POST['addcart']) {
            
            $masach = $_POST['masach'];
            $tensach = $_POST['tensach'];
            $hinh = $_POST['hinh'];
            $gia = $_POST['gia'];
            
            $sach = add_to_cart($masach,$tensach,$hinh,$gia);
            if (!isset($_SESSION['giohang'][$masach])) {
                $_SESSION['giohang'][$masach] =$sach;
            }
            else {
                $_SESSION['giohang'][$masach]['soluong'] += 1;
            }
        }
        $view = "view/user/giohang.php";
        break;
    case 'thanhtoan':
        $view = "view/user/dathangthanhcong.php";
        break;
    default:
        $view = "view/home.php";
        break;
}


include "view/_header.php";
echo $html;
include "view/_sidebar.php";
include $view;
include "view/_footer.php";
