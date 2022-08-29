<?php
session_start();
unset($_SESSION['user']);
header('location:../../academia_account.php');
?>