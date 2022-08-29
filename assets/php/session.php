<?php
session_start();

require_once 'auth.php';
$cuser = new Auth();

if(!isset($_SESSION['user'])){
    header('location:academia_account.php');
    die;
    
if(!isset($_SESSION['index'])){
       header('location:academia_account.php');
        die;
    }
    
    
}


$cindex_number = $_SESSION['user'];

$data = $cuser->currentUser($cindex_number);
$id= 18;
$cid =$data['id'];
$cname= $data['name'];
$cemail= $data['email'];
$cpass= $data['password'];
$cphone = $data['phone'];
$cgender=$data['gender'];
$cdob= $data['dob'];
$cphoto=$data['photo'];
$created=$data['created_at'];
$verified=$data['verified'];
$cprogram=$data['program'];
$clevel=$data['level'];

$reg_on = date('d M Y',strtotime($created));

$fname = strtok($cname,"");

if($verified == 0){
  $verified = 'Not Verified!';
}
else{
  $verified = 'Verified';
}
?>
