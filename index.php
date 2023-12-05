<?php
ob_start(); 
session_start(); 

require_once "model/pdo.php";
require_once "_global.php";
require_once "model/danhmuc.php";
require_once "model/sach.php";
require_once "model/nguoidung.php";
require_once "model/binhluan.php";
require_once "model/cart.php";
require_once "model/order.php";
require_once "model/bill.php";


$dsdm = load_all_danhmuc();
$top5tacgia = load_top5_author();
$top5nxb = load_top5_nxb();
$sachmoi = load_5_sach_moi();
$sachbanchay = load_5_sach_banchay();
$sachrand = load_all_sach_rand();
$dssp = load_all_sach();
if (isset($_SESSION['idtk']) && $_SESSION['idtk'] != '') {
    $nd = load_one_nguoidung($_SESSION['idtk']);
    extract($nd);
}
$view = "";
$sidebarbillcheck = false;
if (isset($_GET['act']) && $_GET['act'] != "") {
    $act = $_GET['act'];
    switch ($act) {
        case 'home':
            $view = "view/site/home.php";
            break;
        case 'danhsach':
            $title = "Danh mục";
            if (isset($_GET['iddm'])) {
                $iddm = $_GET['iddm'];
                $dssp = load_all_sach_madanhmuc($iddm);
                $dm = load_one_danhmuc($iddm);
                $title = $dm['tendanhmuc'];
            }
            if (isset($_GET['tacgia'])) {
                $tacgia = $_GET['tacgia'];
                $dssp = load_all_sach_tacgia($tacgia);
                $title = $tacgia;
            }
            if (isset($_GET['nxb'])) {
                $nxb = $_GET['nxb'];
                $dssp = load_all_sach_nhaxuatban($nxb);
                $title = $nxb;
            }
            if (isset($_GET['sachmoi'])) {
                $title = "Sách mới";
                $dssp = load_all_sach_moi();
            }
            if (isset($_GET['sachbanchay'])) {
                $title = "Sách bán chạy";
                $dssp = load_all_sach_banchay();
            }
            // if (isset($_GET['iddm'])||isset($_GET['tacgia'])||isset($_GET['nxb'])) {
            //     if (isset($_GET['iddm'])) {
            //         $ma = 'iddm';
            //         $giatri= $_GET['iddm'];
            //         // $dssp = load_all_sach_madanhmuc($iddm);
            //     }elseif (isset($_GET['tacgia'])) {
            //         $ma = 'tacgia';
            //         $giatri = $_GET['tacgia'];
            //         // $dssp = load_all_sach_tacgia($iddm);
            //     }elseif (isset($_GET['nxb'])) {
            //         $ma = 'nxb';
            //         $giatri = $_GET['nxb'];
            //         // $dssp = load_all_sach_nhaxuatban($iddm);
            //     }
            //     $dssp = load_all_sach_all($ma,$giatri);
            // } else {
                if (isset($_POST['search']) && ($_POST['search'] != "")) {
                    $tukhoa = $_POST['search']; 
                    $dssp = load_all_sach_timkiem($tukhoa);

                } else {
                    $tukhoa = "";
                }
            
            // }
            
            // if (isset($_GET['iddm'])||isset($_GET['tacgia'])||isset($_GET['nxb'])) {
            //     $giatriact = $_GET['iddm'] ?? $_GET['tacgia'] ?? $_GET['nxb'] ?? null;
            // }
            $view = "view/site/danhsach.php";
            break;
            case 'search':
                # code...
                break;
        case 'chitietsach':
            if (isset($_GET['idsp'])) {
                $idsp = $_GET['idsp'];
                tang_luot_xem($_GET['idsp']);
                $onesach = load_one_sach($idsp);
                extract($onesach);
                $spsameauthor = load_top5_sach_same_author($tacgia);
                $spsamedanhmuc = load_top5_sach_same_danhmuc($madanhmuc, $id);
                $listbinhluan = load_all_binhluan_chitiet_theosp($id);
                // echo '<pre>';
                // var_dump($listbinhluan);
                // die;
                if (isset($_POST['addbl'])) {
                    $noidung = $_POST['noidung'];
                    $masach = $_POST['masach'];
                    $manguoidung = $_SESSION['idtk'];
                    insert_binhluan($noidung, $manguoidung, $masach);
                    header('location: ?act=chitietsach&idsp=' . $idsp);
                }
            }
            
            $view = "view/site/chitietsach.php";
            break;
        case 'dangnhap':
            // $err ="";
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $email = $_POST['email'];
                $matkhau = $_POST['matkhau'];
                $checknd = check_nguoidung($email, $matkhau);
                if ($checknd) {
                    extract($checknd);
                    if ($trangthai == 1) {
                        $_SESSION['idtk'] = $id;
                        header('location: ?act=home');
                    } elseif ($trangthai == 0) {
                        $err = "Tài khoản của bạn đã bị khóa";
                    }
                } else {
                    $err = "Tài khoản sai thông tin hoặc không tồn tại";
                }
            }
            $view = "view/user/login.php";
            break;
        case 'dangky':
            $err=[];
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $hoten = $_POST['hoten'];
                $email = $_POST['email'];
                $matkhau = $_POST['matkhau'];
                $sodienthoai = $_POST['sodienthoai'];
                $diachi = $_POST['diachi'];
                $hinh = "default.jpg";
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
                    insert_nguoidung($email, $matkhau, $hoten, $sodienthoai, $diachi,$hinh);
                    header("Location: ?act=dangnhap");
                }
            }
            $view = "view/user/register.php";
            break;

        case 'dangxuat':
            unset($_SESSION['idtk']);
            header('Location: ?act=home');
            break;
        
        case 'doimatkhau':
            $err = "";
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $newpass = $_POST['matkhaumoi'];
                if (empty($newpass)) {
                    $err = "Mật khẩu không được để rỗng";
                }
                if ($err == "") {
                    change_password($_SESSION['idtk'],$newpass);
                    $thongbao = "Đổi mật khẩu thành công!";
                }
            }
            $sidebarbillcheck = true;
            $view = "./view/user/changePassword.php";
            break;
        
        case 'profile':
            $sidebarbillcheck = true;
            $view = "view/user/profile.php";
            break;

        case 'editprofile':
            if (isset($_SESSION['idtk'])) {
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $idtk = $_POST['idtk'];
                    $hotenmoi = $_POST['hoten'];
                    $diachimoi = $_POST['diachi'];
                    $imgmoi = $_FILES['hinh'];
                    $err=[];
                    if (empty($hotenmoi)) {
                        $err['hoten'] = "Bạn chưa nhập họ tên"; 
                    }
                    if (!$err) {
                        if (!empty($imgmoi['name'])) {
                            $hinh = time() . '_' . $imgmoi['name'];
                            move_uploaded_file($imgmoi["tmp_name"], "../" . $img_path . $hinh);
                        }
                        update_nguoidung_user($idtk,$hotenmoi,$diachimoi,$hinh);
                        header("Location: ?act=profile");
                    }
                }
                $sidebarbillcheck = true;
                $view = "view/user/editprofile.php";
            } else{
                header('location: ?act=dangnhap');
            }
            break;
        case 'recover':
            $view = "view/user/recover.php";
            break;

        case 'giohang':
            if (!isset($_SESSION['giohang'])) {
                $_SESSION['giohang'] =[];
            };

            if (isset($_POST['updatecart'])) {
                $idsp = $_POST['id'];
                $soluongsp = $_POST['soluong'];
                $convertcart = array_values($_SESSION['giohang']);
                // var_dump($convertcart);
                // die; 
                for($i = 0; $i < sizeof($convertcart);$i++){
                    for ($j=0; $j < sizeof($idsp); $j++) { 
                        if ($convertcart[$i]['masach'] == $idsp[$j]) {
                            $_SESSION['giohang'][$convertcart[$i]['masach']]['soluongmua'] = $soluongsp[$j];
                        }
                    }
                }
            }
            
            if (isset($_GET['delcart']) && $_GET['delcart'] == 1) {
                unset($_SESSION['giohang']);
                header('location: ?act=giohang');
            }

            if (isset($_GET['delspcart']) && $_GET['delspcart'] != "") {
                unset($_SESSION['giohang'][$_GET['delspcart']]);
                header('location: ?act=giohang');
            }

            if (isset($_GET['idsp'])) {
                $idsp = $_GET['idsp'];
                $soluongmua = 1;
                $sach = load_one_sach($idsp);
                extract($sach);
                add_to_cart($id,$tensach,$hinh,$gia,$giamgia,$soluongmua,$soluong);
            header('location: ?act=giohang');
            }
            
            $view = "view/cart_bill/giohang.php";
            break;
        case 'order':
            $check_err_order = [];
            $_SESSION['thongtinkhachhang'] = [];
            if (isset($_POST['order'])) {
                $_SESSION['thongtinkhachhang']['hoten'] = $_POST['hoten'];
                $_SESSION['thongtinkhachhang']['email'] = $_POST['email'];
                $_SESSION['thongtinkhachhang']['sodienthoai'] = $_POST['sodienthoai'];
                $_SESSION['thongtinkhachhang']['diachinhan'] = $_POST['diachinhan'];
                $_SESSION['thongtinkhachhang']['ghichu'] = $_POST['ghichu'];
                $_SESSION['thongtinkhachhang']['pttt'] = $_POST['payments'];

                if (empty($_SESSION['thongtinkhachhang']['hoten'])) {
                    $check_err_order['hoten'] = "Bạn chưa nhập tên người nhận hàng";
                }
                if (empty($_SESSION['thongtinkhachhang']['email'])) {
                    $check_err_order['email'] = "Bạn chưa nhập email";
                } else if (!filter_var($_SESSION['thongtinkhachhang']['email'],FILTER_VALIDATE_EMAIL)) {
                    $check_err_order['email'] = "Bạn nhập sai định dạng email";
                }
                $regex_phone = '/^0\d{9}$/';
                if (empty($_SESSION['thongtinkhachhang']['sodienthoai'])) {
                    $check_err_order['sodienthoai'] = "Bạn chưa nhập số điện thoại";
                } else if(!preg_match($regex_phone,$_SESSION['thongtinkhachhang']['sodienthoai'])) {
                    $check_err_order['sodienthoai'] = "Bạn nhập sai định dạng số điện thoại";
                }
                if (empty($_SESSION['thongtinkhachhang']['diachinhan'])) {
                    $check_err_order['diachinhan'] = "Bạn chưa nhập địa chỉ nhận";
                }
                if (!$check_err_order) {
                    header('location: ?act=bill');
                }
            }
            $view = "view/cart_bill/order.php";
            break;
        
        case 'bill':
            // if (isset($_POST['order'])) {
                $idtk = null;
                if (isset($_SESSION['idtk'])) {
                    $idtk = $_SESSION['idtk'];
                };
                $hoten = $_SESSION['thongtinkhachhang']['hoten'];
                $email = $_SESSION['thongtinkhachhang']['email'];
                $sodienthoai = $_SESSION['thongtinkhachhang']['sodienthoai'];
                $diachinhan = $_SESSION['thongtinkhachhang']['diachinhan'];
                $ghichu = $_SESSION['thongtinkhachhang']['ghichu'];
                $pttt = $_SESSION['thongtinkhachhang']['pttt'];
                $tongtien = tong_thanh_tien();

            //     if (empty($hoten)) {
            //         $check_err_order['hoten'] = "Bạn chưa nhập tên người nhận hàng";
            //     }
            //     if (empty($email)) {
            //         $check_err_order['email'] = "Bạn chưa nhập email";
            //     } else if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            //         $check_err_order['email'] = "Bạn nhập sai định dạng email";
            //     }
            //     $regex_phone = '/^0\d{9}$/';
            //     if (empty($sodienthoai)) {
            //         $check_err_order['sodienthoai'] = "Bạn chưa nhập số điện thoại";
            //     } else if(!preg_match($regex_phone,$sodienthoai)) {
            //         $check_err_order['sodienthoai'] = "Bạn nhập sai định dạng số điện thoại";
            //     }
            //     if (empty($diachinhan)) {
            //         $check_err_order['diachinhan'] = "Bạn chưa nhập địa chỉ nhận";
            //     }

                    $madon = add_to_order($idtk,$hoten,$email,$sodienthoai,$diachinhan,$tongtien,$pttt,$ghichu);
                    $convertcart = array_values($_SESSION['giohang']);
                    for($i = 0; $i < sizeof($convertcart);$i++){
                            extract($convertcart[$i]);
                            $dongia = $gia - $gia*$giamgia/100;
                            $thanhtien = $soluongmua*($gia - $gia*$giamgia);
                            add_to_order_detail($madon,$masach,$soluongmua,$dongia,$thanhtien);
                        }
                        $view = "view/cart_bill/bill.php";
            //}
            
            break;

        case 'managebill':
            if (isset($_SESSION['idtk'])) {
                $dsbill = load_all_bill_user($_SESSION['idtk']);
                if (isset($_GET['status']) && $_GET['status'] == 0) {
                    $dsbill = load_all_bill_user_status0($_SESSION['idtk']);
                }
                if (isset($_GET['status']) && $_GET['status'] == 1) {
                    $dsbill = load_all_bill_user_status1($_SESSION['idtk']);
                }
                if (isset($_GET['status']) && $_GET['status'] == 2) {
                    $dsbill = load_all_bill_user_status2($_SESSION['idtk']);
                }
                if (isset($_GET['status']) && $_GET['status'] == 3) {
                    $dsbill = load_all_bill_user_status3($_SESSION['idtk']);
                }
                if (isset($_GET['status']) && $_GET['status'] == 4) {
                    $dsbill = load_all_bill_user_status4($_SESSION['idtk']);
                }
                if (isset($_GET['cancel']) && ($_GET['cancel'] != "")) {
                    bill_cancel($_GET['cancel']);
                    header('location: ?act=managebill');
                }
                $sidebarbillcheck = true;
                $view = "./view/cart_bill/bill_manage.php";
            }else{
                header('location: ?act=dangnhap');
            }
            break;

        case 'detailbill':
            if (isset($_GET['mabill']) && $_GET['mabill'] != "") {
                $bill = load_one_bill($_GET['mabill']);
                $sidebarbillcheck = true;
                $dsspdh = load_detail_bill($_GET['mabill']);
                $view = "./view/cart_bill/bill_detail.php";
            }
            else {
                header('location: ?act=home');
            }
            break;
        
        case 'tracuudonhang':
            $regex_number = "/^\\d+$/";
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_POST['idbill']) && preg_match($regex_number,$_POST['idbill'])) {
                    $idbill = $_POST['idbill'];
                    $bill = load_one_bill($idbill);
                }
            }
            if (isset($_GET['mabill'])) {
                $dsspdh = load_detail_bill($_GET['mabill']);
                $idbill = $_GET['mabill'];
                $bill = load_one_bill($idbill);
            }
            $view = "./view/cart_bill/search_order.php";
            break;

        default:
            $view = "view/site/home.php";
            break;
    }
} else{
    $view = "view/site/home.php" ;
}


include "view/_header.php";
echo $html;
if (isset($_GET['act']) && $_GET['act'] == 'danhsach') {
    include "view/_sidebar.php";
}
if ($sidebarbillcheck) {
    include "view/_sidebarprofile.php";
}
include $view;
include "view/_footer.php";
