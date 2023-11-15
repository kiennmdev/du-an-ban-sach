<?php
require_once "model/pdo.php";
require_once "_global.php";

$act = $_GET['act'] ?? "";
$view = "";
    switch ($act) {
        case 'home':
            $view = "view/home.php";
            break;
        case 'danhsach':
            $view = "view/danhsach.php";
            break;
        case 'chitietsach':
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