<?php
session_start();

require_once 'auth.php';
$cuser = new Auth();

if(!isset($_SESSION['user'])){
    header('location:index.php');
    die;
    
if(!isset($_SESSION['index'])){
       header('location:index.php');
        die;
    }
    
    
}


$username = $_SESSION['user'];

$data = $cuser->currentUser($username);

$cid =$data['id'];
// $cuid =$data['uid'];
$cf_name=$data['s_name'];
$cs_name=$data['f_name'];
$cusername=$data['username'];
$cprogram =$data['program'];
$cindex_number =$data['index_number'];
$cphoto =$data['photo'];
$cage =$data['age'];
$cemail =$data['email'];
$cgender =$data['gender'];
$clevel=$data['level'];
$cphone =$data['phone'];
$cpass =$data['password'];
$created =$data['created_at'];
$creg = date('d M Y',strtotime($created));

// $fname = strtok($cname,"");

// if($verified == 0){
//   $verified = 'Not Verified!';
// }
// else{
//   $verified = 'Verified';
// }
?>
