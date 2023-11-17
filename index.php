<?php
require_once "model/pdo.php";
require_once "_global.php";
require_once "model/danhmuc.php";
require_once "model/sach.php";

$dsdm = load_all_danhmuc();
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
            }
            $view = "view/chitietsach.php";
            break;
        case 'dangnhap':
            $view = "view/user/login.php";
            break;
        case 'dangky':
            $view = "view/user/register.php";
            break;
        case 'recover':
            $view = "view/user/recover.php";
            break;
        default:
            $view = "view/home.php";
            break;
    }


include "view/_header.php";
if ($act == 'danhsach' || $act == 'chitietsach' || $act == 'dangnhap' || $act == 'dangky' || $act == 'recover') {
    include "view/_path.php";
}
echo $html;
include "view/_sidebar.php";
include $view;
include "view/_footer.php";