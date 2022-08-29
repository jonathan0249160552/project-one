<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// require 'session_store.php';
// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

require_once 'auth_store.php';

$s_user = new Authenticate();

if (isset($_POST['action'])&& $_POST['action']=='business_register')
 { 
    $business_code = $s_user->test_input($_POST['business_code']);
    $user_names = $s_user->test_input($_POST['c_user_name']);
	$name = $s_user->test_input($_POST['c_name']);
	$contact = $s_user->test_input($_POST['c_contact']);
    $location = $s_user->test_input($_POST['c_location']);
    $email = $s_user->test_input($_POST['c_email']);
    $gender= $s_user->test_input($_POST['c_gender']);
    $program = $s_user->test_input($_POST['c_program']);
    $level= $s_user->test_input($_POST['c_level']);
    $business_name= $s_user->test_input($_POST['c_business_name']);
    $product_category= $s_user->test_input($_POST['c_product_category']);
    $pass = $s_user->test_input($_POST['c_password']);
    $terms_condition =$s_user->test_input($_POST['terms_condition_c']);

	$password = password_hash($pass, PASSWORD_DEFAULT);

    if($terms_condition== 0) {
        
        echo $s_user->showMessage('warning', 'Please agree to terms and condition!');
    } else{
    if ($s_user->business_code_verification($business_code) ) {
        
        if ($s_user->code_used($business_code)) {
           
            echo $s_user->showMessage('warning', 'This Authentication code has already been used!');
    
            
        }else if ($s_user->user_exist($user_names)) 
         
        {
        
            echo $s_user->showMessage('warning', 'This user name is already registered!');

        }
            
        else if ($s_user->email_exist($email))
        
        {
             
            
            echo $s_user->showMessage('warning', 'This email is already registered!');
        
            
        }

        else if ($s_user->business_name_exist($business_name))
        
        {
             
            
            echo $s_user->showMessage('warning', 'This business name is already registered!');
        
            
        }
            
        else {
                if ($s_user->business_register($business_code,$user_names,$name,$contact,$location,$email,$gender,
                $program,$level,$business_name,$product_category,$password)) 
                
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
                        echo $s_user->showMessage('success','E-Mail verification link sent successfully. <strong>Please check your e-mail!</strong>');
                    }
                    catch(Exception $e){
                        // echo $e;
                        
                      echo   $s_user->showMessage('danger','Verification link not send please try again later!');
                    }
                    echo $s_user->showMessage('success', 'Registration Successful');
                    
                    $SESSION['user']= $user_names;
                } else
                    {
                        echo $s_user->showMessage ('danger','Sorry Registration Failed, Please Try Again Later');
                    
                    }
            }

    }else{
        echo$s_user->showMessage('danger','Invalid Authentication Code');
    }
}
}

// handle login admin ajax request

if(isset($_POST['action']) && $_POST['action']=='login_admin'){
    $user_names = $s_user->test_input($_POST['user_name']);
    $password = $s_user->test_input($_POST['password']);
    $email = $s_user->test_input($_POST['email']);
    // print_r(($_POST));
    $loggedInUser = $s_user->login_admin($user_names);



    if ($loggedInUser != null) {

                if ($s_user->email_exist($email)) 
                
                {
                    if(password_verify($password,$loggedInUser['password'])){
                        if(!empty($_POST['rem'])){
                            setcookie("user_name",$user_names,time()+(30*24*60*60),'/');
                            setcookie("password",$password ,time()+(30*24*60*60),'/');
                        }
                        else{
                            setcookie("user_name","",1,'/');
                            setcookie("password","",1,'/');
                        }
                        // echo 'login';
                        $_SESSION['user']= $user_names;
                        echo $s_user->showMessage('success','Login successful!');
                   echo 'login';
                    }
                    else{
                        echo $s_user->showMessage('danger','Password is incorrect!');
                    }


            } else {  echo $s_user->showMessage('danger','User E-mail not exist!');}


    }
    else{
        echo $s_user->showMessage('danger','User name does not exist!');
    }
    }


   
// cheking user is logged in or not
if(isset($_POST['action'])&& $_POST['action']== 'checkUser'){
    if(!$s_user->current_customer_User($_SESSION['user'])){
        echo  'bye';
        unset($_SESSION['user']);
    }
}


    
// handle product upload Ajax Request 
if(isset($_FILES['image'])){
         $business_code = $s_user->test_input($_POST['business_code']);
        $product_name = $s_user->test_input($_POST['product_name']);
        $product_price = $s_user->test_input($_POST['product_price']);
        $business_name = $s_user->test_input($_POST['business_name']);
        $product_info = $s_user->test_input($_POST['product_info']);
         $des_product = $s_user->test_input($_POST['product_description']);
         $product_category = $s_user->test_input($_POST['product_category']);
//   print_r($_POST);
    $oldImage = $_POST['oldimage']; 
    $folder ='products/';
  
    if(isset($_FILES['image']['name']) && ($_FILES['image']['name'] !="")){
     $newImage = $folder.$_FILES['image']['name'];
     move_uploaded_file($_FILES['image']['tmp_name'],$newImage);
  
     if($oldImage != null){
        unlink($oldImage);
     }
    }
    else{
       $newImage= $oldImage;
    }
    $s_user->upload_product($cid,$product_name,$product_price,$business_name,$business_code,$product_info,$des_product,$product_category,$newImage);
  //   $cuser->notification($cid, 'admin','Profile updated');
  }


 // fetch all product

?>