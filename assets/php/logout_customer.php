<?php
session_start();
unset($_SESSION['user']);
header('location:../../store_account.php');
?>
