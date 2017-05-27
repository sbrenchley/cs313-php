<?php
session_start();
include 'config.php';

if (empty($_SESSION['login_user'])) {
    header('Location: login_page.php');
    exit;
}

?>
