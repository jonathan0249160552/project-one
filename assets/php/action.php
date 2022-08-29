<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

require_once 'auth.php';
// require_once 'auth2.php';
$user = new Auth();
// $user2 = new Auth2();


// register a user 

if (isset($_POST['action'])&& $_POST['action']=='register') { 
	$name = $user->test_input($_POST['name']);
	$email = $user->test_input($_POST['email']);
	$pass = $user->test_input($_POST['password']);
	$index_number = $user->test_input($_POST['index_number']);
    $program = $user->test_input($_POST['program']);
    $level= $user->test_input($_POST['level']);
    $message2 = "You do not";
	$hpass = password_hash($pass, PASSWORD_DEFAULT);
// print_r($_POST);
    if ($user->index_number_verification($index_number) ) {

        if ($user->verify_program($index_number,$program)) {
          
    
            if($user->verify_level($index_number,$level)){

                  if ($user->user_exist($index_number)) {
                            echo $user->showMessage('warning', 'This Index number is already registered!');
                    
                            
                    
                        }else if ($user->user_exist_email($email)) {
                            echo $user->showMessage('warning', 'This Email is already registered!');
                        }
                            else{
                                if ($user->register($name,$email,$hpass,$index_number,$program,$level)) {
                                    // echo'register';
                                    $SESSION['user']= $index_number;

                                    echo $user->showMessage('success', 'Registration Successful');
                                    echo $user->showMessage('primary', 'Please Processed the login Page');

                                }
                                else{
                                    echo $user->showMessage('danger','! Sorry Registration not Successful Please try again later! ');
                                }
                        }

            }else{
                echo $user->showMessage('danger',"You are do not in level ".$level);
            }
    
        
                      
            
            }else{

                echo $user->showMessage('danger',"You Do not offer ".$program );
            }
        
    }
        else {
    echo $user->showMessage('danger',"Invalid index Number or Index number do not exist" );
    }


}
// handle login ajax request

if(isset($_POST['action']) && $_POST['action']=='login'){
$index_number = $user->test_input($_POST['index_number2']);
$pass = $user->test_input($_POST['password']);

$loggedInUser = $user->login($index_number);

if ($loggedInUser != null) {
    if(password_verify($pass,$loggedInUser['password'])){
        if(!empty($_POST['rem'])){
            setcookie("index_number2",$index_number,time()+(30*24*60*60),'/');
            setcookie("password",$pass ,time()+(30*24*60*60),'/');
        }
        else{
            setcookie("index_number2","",1,'/');
            setcookie("password","",1,'/');
        }
        echo 'login';
        $_SESSION['user']= $index_number;
    }
    else{
        echo $user->showMessage('danger','Password is incorrect!');
    }
}
else{
    echo $user->showMessage('danger','User does not exist!');
}
}





//handle  problem
if(isset($_POST['action']) && $_POST['action']=='problem'){
    $feedback= $user->test_input($_POST['feedback']);
    $email=$user->test_input($_POST['email']);
    $name=$user->test_input($_POST['name']);
    $contact=$user->test_input($_POST['contact']);
    $index_number=$user->test_input($_POST['index_number']);

    
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
        $mail->addAddress('joeatsiegbi@gmail.com', 'KEEN');     // Add a recipient
        $mail->addAddress('jonathanatsiegbi@gmail.com', 'KEEN');               // Name is optional
       
    
         // Content
        $mail->isHTML(true);  
        $mail->Subject ='KEEN feedback';
        $mail->Body    =  ''.$name. ' is reporting an issue<br>'
        
        .'<b>Message:<b> '.$feedback."\n\n"
        .'<b>E-mail:<b> '.$email."\n\n"
        .'<b>Name:<b> '.$name."\n\n"
        .'<b>Contact:<b> '.$contact."\n\n"
        .'<b>Index Number:<b> '.$index_number."\n\n"; 
    
        
        $mail->send();
        echo $user->showMessage('success','Successfully sent we will send you a feedback with a solution </strong>');
    }
    
    catch(Exception $e){
        echo $user->showMessage('danger','Something went worng plase check your internet connection and try again later!');
    }


}


// handle forgot password ajax request
if(isset($_POST['action']) && $_POST['action']=='forgot'){
   $email = $user->test_input($_POST['email']);
    
  $user_found = $user->currentUser1($email);

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
        echo  'bye';
        unset($_SESSION['user']);
    }
}


//handle fetch all users ajax request

// if(isset($_POST['action']) && $_POST['action'] == 'fetch' ){
// 	$output='';
// 	$data = $user->fetchAll_Notice_db(1);
// 	$path = 'user-admin/assets/php/imagesuploadedf/';
// 	if($data){
// 		$output.= '';
// 		foreach ($data as $row){
// 			if($row['image']!=''){
// 				$photo = $path.$row['image'];
// 			}
// 			else{
// 				$photo ='assets/img/Va2.PNG';
// 			}
// 			$output .='<div  class="Lastestnews   blog">
//             <div class="container" >
//              <div class="row justify-content-center modal-body  ">
//                  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 margin  " >
                   
//                      <div class="news-box card" >
//                        <div class=" pt-1 pl-2 pr-2 text-center" style="background-color:#07021b">
//                        <h2 class="font-weight-bold text-white ">'.$row['type'].'</h2></div>
                       
//                       <div class="">   <figure><img id="popup" src="'.$photo
//                       .' " alt="img" style="width:100%;height:300px;"  /></figure></div>
//                          <h3>'.$row['title'].'</h3>
                       
//                          <p id="p">'.$row['body'].'  
//                                               <p  class="mb-0 float-left font-italic">By : '.$row['posted_by'].'</p> 
//                              <p class="mb-0 float-right  text-primary">Posted : '.$user->timeInAgo($row['created_at']).'</p>
//                              <div class="clearfix"> <a href="#" id="'.$row['id'].'" 
//                              title="View Details" class="text-primary float-left m-2 p-2 userDetailsIcon" data-toggle="modal" data-target="#showUserDetailsModal">View Details</a>
//         </div>
                             
//                           </div >
                     
//                  </div>
          
//              </div>
//           </div>
//           </div>
          
//              </div>';
// 		}
			
					
// 					echo $output;


// 	}
// 	else{
// 		echo '<h1 class="text-center font-weight-bold m-2 text-success">:( No New Notice yet </h1>';
// 	}
// }





 // post comment


 if(isset($_POST['post_comment_id'])){
	$id= $_POST['post_comment_id'];

	$data = $user->post_comment_modal($id);
	echo json_encode($data);
	
}
      

// fetch General Notice details by id

if(isset($_POST['general_details_id'])){
	$id= $_POST['general_details_id'];

	$data = $user->fetchGeneralNoticeDetailsByID($id);
	echo json_encode($data);
}

// fetch class Notice details by id

if(isset($_POST['details_id'])){
	$id= $_POST['details_id'];

	$data = $user->fetchNoticeDetailsByID($id);
	echo json_encode($data);
}
?>