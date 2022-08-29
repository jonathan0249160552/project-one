<?php
session_start();

require_once 'auth_customer.php';
$s_user = new Authenticate();

      if(!isset($_SESSION['user'])){
      header('location:store_account.php');

      
      die;

  }



  





$x_user_names = $_SESSION['user'];

$data = $s_user->current_customer_User($x_user_names);

$x_id =$data['id'];

$x_user_names= $data['user_names'];
$x_name= $data['name'];
$x_email= $data['email'];
$x_pass= $data['password'];
$x_phone = $data['contact'];
$x_gender=$data['gender'];
$x_photo = $data['profile_pic'];

$x_created=$data['created_at'];
$x_verified=$data['email_verifcaton'];
$x_program=$data['program'];
$x_age=$data['age'];
$x_level=$data['level'];

$_reg_on = date('d M Y',strtotime($x_created));

$_fname = strtok($x_name,"");

if($x_verified == 0){
  $x_verified = 'Not Verified!';
}
else{
  $x_verified = 'Verified';
}



?>
