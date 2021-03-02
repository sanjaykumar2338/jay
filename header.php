<?php
session_start();
if (!isset($_SESSION['userid'])) {
    header('Location: ' . 'login.php');
    exit;
}
include('includes/config.php');
require 'includes/class.phpmailer.php';
?>

