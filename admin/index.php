<?php
require_once "../model/pdo.php";
require_once "../model/danhmuc.php";
require_once "../model/sach.php";


$act = $_GET["act"] ?? "";
switch ($act) {
    case 'danhmuc':
        $tittle = "Danh sách danh mục";
        if (isset($_COOKIE["thongbao"])) {
            $thongbao = $_COOKIE["thongbao"];
        }
        $danhmuc = load_all_danhmuc();
        $XEM= "danhmuc/list.php";
        break;
    case 'themdm':
        $tittle = "Thêm mới danh mục";
        if ($_SERVER['REQUEST_METHOD']=== "POST") {
            $tendanhmuc = $_POST['tendanhmuc'];
            $trangthai = $_POST["trangthai"] ?? 0;
            insert_danhmuc($tendanhmuc,$trangthai);
            setcookie("thongbao","Thêm mới thành công", time()+1);
            header("Location: ?act=danhmuc");
            die;
        }


        $XEM="danhmuc/insert.php";
        break;
    case '':
        # code...
        break;
    case '':
        # code...
        break;
    case '':
        # code...
        break;
    case '':
        # code...
        break;
    case '':
        # code...
        break;

    default:
        echo "<h1>404 FILE NOT FOUND</h1>";
}










include "header.php";
include $XEM;
include "footer.php";
?>
