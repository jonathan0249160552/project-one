<?php
session_start();

require_once 'auth_store.php';
$s_user = new Authenticate();



if(!isset($_SESSION['user'])){
  header('location:admin_login_store.php');

  die;

//   if(!isset($_SESSION['index'])){
//     header('location:index.php');
//      die;
//  }
 

}





$user_names = $_SESSION['user'];

$data = $s_user->current_admin_User($user_names);

$cid =$data['id'];
$cbusiness_code = $data['business_code'];
$cuser_names= $data['user_names'];
$cbusiness_name = $data['business_name'];
$cproduct_category = $data['product_category'];
$cname= $data['name'];
$cemail= $data['email'];
$cpass= $data['password'];
$cphone = $data['contact'];
$cgender=$data['gender'];

$cphoto=$data['photo'];
$created=$data['created_at'];
$verified=$data['email_verification'];
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




// $customer_user_names = $_SESSION['customer_user'];

// $data = $s_user->current_customer_User($user_names);

// $x_id =$data['id'];

// $x_user_names= $data['user_names'];
// $x_name= $data['name'];
// $x_email= $data['email'];
// $x_pass= $data['password'];
// $x_phone = $data['phone'];
// $x_gender=$data['gender'];


// $x_created=$data['created_at'];
// $verified=$data['verified'];
// $x_program=$data['program'];
// $x_level=$data['level'];

// $_reg_on = date('d M Y',strtotime($created));

// $_fname = strtok($cname,"");

// if($x_verified == 0){
//   $x_verified = 'Not Verified!';
// }
// else{
//   $x_verified = 'Verified';
// }



// ?>
