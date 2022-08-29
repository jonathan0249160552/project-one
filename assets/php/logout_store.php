<?php
session_start();
unset($_SESSION['user']);
header('location:../../admin_login_store.php');
?>