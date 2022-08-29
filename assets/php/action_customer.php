<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

require_once 'auth_customer.php';
// require_once 'auth2.php';
$user = new Authenticate();
// $user2 = new Auth2();


// register a user 

if (isset($_POST['action'])&& $_POST['action']=='customer_register')
 { 
    
        $user_names = $user->test_input($_POST['x_user_name']);
        $name = $user->test_input($_POST['x_name']);
        $contact = $user->test_input($_POST['x_contact']);
        $location = $user->test_input($_POST['x_location']);
        $email = $user->test_input($_POST['x_email']);
        $gender= $user->test_input($_POST['x_gender']);
        $program = $user->test_input($_POST['x_program']);
        $level= $user->test_input($_POST['x_level']);
        $pass = $user->test_input($_POST['x_password']);
        $password = password_hash($pass, PASSWORD_DEFAULT);
        $t_g = $user->test_input($_POST['t_g']);
        // print_r($_POST);

if ($t_g= null) {
    echo $user->showMessage('warning', 'Accept our terms and condition!');
}
else {
        if ($user->user_name_exist($user_names)) {
           
            echo $user->showMessage('warning', 'You can not use this user name its already taken by someone!');
    
            
        }else if ($user->customer_email_exist($email)) 
         
        {
        
            echo $user->showMessage('warning', 'This email is already registered!');

        }
            
       
            
        else {
                if ($user->customer_register($user_names,$name,$contact,$location,$email,$gender,$program,$level,$password)) 
                
                {
                    try{
                        $mail->isSMTP();
                        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                        $mail->Username   = Database::USERNAME;                     // SMTP username
                        $mail->Password   = Database::PASSWORD;                               // SMTP password
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                        $mail->Port       = 587; 
                
                        //Recipients
                        $mail->setFrom(Database::USERNAME,'KEEN');
                        $mail->addAddress($email); 
                
                         // Content
                        $mail->isHTML(true);  
                        $mail->Subject = 'E-mail Verification';
                        $mail->Body    = '<h3>Click the below link to verify your E-Mail.<br><a
                        href="http://localhost/user/verify-email.php?email='.$email.'">
                     Click here
                        </a><br>Regards from<br>KEEN !!!</h3>'; 
                        
                        $mail->send();
                        echo $user->showMessage('success','E-Mail verification link sent successfully. <strong>Please check your e-mail!</strong>');
                    }
                    catch(Exception $e){
                        // echo $e;
                        
                      echo   $user->showMessage('danger','Verification link not sent please login and verify your email!');
                    }

                    echo $user->showMessage('success', 'Registration Successful');
                    
                    $SESSION ['user'] = $user_names;
                } else
                    {
                        echo $user->showMessage ('danger','Sorry Registration Failed, Please Try Again Later');
                    
                    }
            }

    }
   
}   
// handle login ajax request

if(isset($_POST['action']) && $_POST['action']=='login'){
$user_names = $user->test_input($_POST['user_names']);
$pass = $user->test_input($_POST['password']);

$loggedInUser = $user->login_customer($user_names);

if ($loggedInUser != null) {
    if(password_verify($pass,$loggedInUser['password'])){
        if(!empty($_POST['rem'])){
            setcookie("user_names",$user_names,time()+(30*24*60*60),'/');
            setcookie("password",$pass ,time()+(30*24*60*60),'/');
        }
        else{
            setcookie("user_names","",1,'/');
            setcookie("password","",1,'/');
        }
        echo 'login';
        $_SESSION['user']= $user_names;
    }
    else{
        echo $user->showMessage('danger','Password is incorrect!');
    }
}
else{
    echo $user->showMessage('danger','User does not exist!');
}
}





// handle forgot password ajax request
if(isset($_POST['action']) && $_POST['action']=='f_password'){
    $email = $user->test_input($_POST['forgot_password_email']);
     
   $user_found = $user->customer_email_exist($email);
 
   if($user_found != null){
     $token = uniqid();
     $token = str_shuffle($token);
     //$token = openssl_random_pseudo_bytes(16);
     //$token = bin2hex($token)
     $user->forgot_password($token,$email);
 
     try{
         $mail->isSMTP();
         $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
         $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
         $mail->Username   = Database::USERNAME;                     // SMTP username
         $mail->Password   = Database::PASSWORD;                               // SMTP password
         $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
         $mail->Port       = 587; 
 
         //Recipients
         $mail->setFrom(Database::USERNAME,'KEEN');
         $mail->addAddress($email); 
 
          // Content
         $mail->isHTML(true);  
         $mail->Subject = 'Reset Password';
         $mail->Body    = '<h3>Click the below link to reset your password.<br><a
         href="http://localhost/user/reset-pass.php?email='.$email.'
         &token='.$token.'">Click here</a><br>Regards from <br>K E E N </h3>'; 
         
         $mail->send();
         echo $user->showMessage('success','We have sent to a password reset link to your e-mail. <strong>Please check your e-mail</strong>');
     }
     catch(Exception $e){
         echo $user->showMessage('danger','Something went worng plase try again later!');
     }
 
   }
   else{
       echo $user->showMessage('info','This e-mail is not registered!');
   }
 }


// cheking user is logged in or not
if(isset($_POST['action'])&& $_POST['action']== 'checkUser'){
    if(!$user->currentUser($_SESSION['user'])){
        // echo  'bye';
        unset($_SESSION['user']);
    }
}



    //   handle fetch notification
    //   if(isset($_POST['action']) && $_POST['action']=='fetchComment'){
    //     $data = $user->fetchAllProductComment();
    //     $output = '';

    //     if($data){
    //        foreach($data as $row){
    //           $output .= '<div class="alert m-2 border  shadow">
    //           <button type="button" id="" class="close float-right" data-dismiss="alert" aria-label="close">
    //           <span aria-hidden="true">&times;</span>
    //           </button>
    //           <h4 class="alert-heading ">New Comment</h4>
    //           <p class="mb-0 alert-secondary rounded  p-2" style="color: black;"></p>
    //           <hr class="my-2">
         
    //           <p class="mb-0 float-right"></p>
    //           <div class="clearfix"></div>
    //        </div>
           
    //   </div> ';
    //        }
    //        echo $output;
    //     }
    //     else{
    //        echo '<h4 class="text-center text-dark mt-5">No any new comments</h4>';
    //     }
    //  }


        
    
        
     
      //handle product details
      if(isset($_POST['action']) && $_POST['action']=='fetchProductInfo'){
        $data = $user->fetchAllProductInfo($id);
        $output = '';
        $store_location = "";
        $label = "";
        if($data){
           foreach($data as $row){
           
          
            if($store_location== null){
              $store_location ="";
              $label = "";
            }else {
            $label ='<label class="font-weight-bold" >Store Location </label>';
          
            $store_location= $row['location']; 

            }

              $output .= '<div">
              
              <h5>Service </h5>           
              <p  style=" border-left-style: solid;
              border-width: 5px;border-color:#ff7315;" class="p-3 text-dark"> '.$row['product_info'].' 
              </p>
              </div>
 
                  <h5>Service Information</h5>           
               <p class="p-3 text-dark" style=" border-left-style: solid;
               border-width: 5px;border-color:#ff7315"> '.$row['product_info'].' 
               </p>
 
               <h5>Service Description</h5>           
               <p class="p-3 text-dark" style=" border-left-style: solid;
               border-width: 5px;border-color:#ff7315"> '.$row['product_info'].' 
               </p>
 
               </div>
 
               
                 </div>';
           }
           echo $output;
        }
        
     }  


     
      //handle vender details
      if(isset($_POST['action']) && $_POST['action']=='fetchVenderInfo'){
        $data = $user->fetchAllProductInfo($id);
        $output = '';
        $store_location = "";
        $label = "";
        if($data){
           foreach($data as $row){
           
          
            if($store_location== null){
              $store_location ="";
              $label = "";
            }else {
            $label ='<label class="font-weight-bold" >Store Location </label>';
          
            $store_location= $row['location']; 

            }

              $output .= '	<div>
              <hr>
            <h5 class="mt-3 mb-3">About the Vendor</h5> 
              <label class="font-weight-bold" >Name </label>
              <span>'.$row['name'].'</span> <br>

              <label class="font-weight-bold" >Business Name </label>
              <span>'.$row['business_name'].'</span><br>

              <label class="font-weight-bold" >Contact </label>
              <span>'.$row['contact'].'</span><br>

              <label class="font-weight-bold" >Email </label>
              <span>'.$row['email'].'</span><br>
           

              '.$label.'
    
              <span>'.$store_location.'</span>
              </div>';
           }
           echo $output;
        }
        
     }  


    

     // display product details
if(isset($_POST['product_details'])){
	$id= $_POST['product_details'];
// print_r($_POST);

	$data = $user->fetchAllProductByID($id);
	echo json_encode($data);
 }


 if(isset($_POST['product_comments'])){
	$id= $_POST['product_comments'];
    // print_r($_POST);

	$data = $user->fetchAllCommentsByID($id);

    
	echo json_encode($data);
 }

 if(isset($_POST['vendor_details'])){
	$id= $_POST['vendor_details'];
    // print_r($_POST);

	$data = $user->fetchAllProductInfo($id);
	echo json_encode($data);
 }
?>
  


