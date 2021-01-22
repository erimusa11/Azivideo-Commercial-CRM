<?php
session_start();
include '../../../functions.php';
if (!isset($_SESSION['users_id']) || ($_SESSION['user_livel'] != 2)) {
    header('Location: ../../../index.php');
}
logout();
?>