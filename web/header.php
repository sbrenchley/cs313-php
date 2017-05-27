<?php
session_start();
include 'config.php';

if (empty($_SESSION['username'])) {
    header('Location: login_page.php');
    exit;
}

?>
