<?php
session_start();
include 'config.php';

if (empty($_SESSION['login_user'])) {
    header('Location: login_page.php');
    exit;
}

?>


<!-- secret: 1LxMZh0Ff2rHqwQdhoMPzlCgAr8 -->
<!-- brenchley_saved_posts web app CXR7MyVIXCoN7A -->
