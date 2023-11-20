<?php
// logout.php

// Kiểm tra session tồn tại chưa trước khi gọi
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Hủy tất cả các biến phiên
$_SESSION = array();

// Hủy cookie nếu tồn tại
if (isset($_COOKIE['user_email']) && isset($_COOKIE['user_password'])) {
    setcookie('user_email', '', time() - 3600 * 24 * 30, "/");
    setcookie('user_password', '', time() - 3600 * 24 * 30, "/");
}

// Hủy phiên làm việc
session_destroy();

header("Location: index.php");
exit();