<?php
// logout.php

// Kiểm tra session tồn tại chưa trước khi gọi
if (session_status() == PHP_SESSION_NONE) {
    ob_start(); // Bắt đầu đệm đầu ra
    session_start(); // Bắt đầu session
}

// Hủy tất cả các biến phiên
$_SESSION = array();

// Hủy cookie nếu tồn tại


// Hủy phiên làm việc
session_destroy();

header("Location: index.php");
exit();
