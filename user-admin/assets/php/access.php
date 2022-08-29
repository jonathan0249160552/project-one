<?php
session_start();

// require_once 'session.php';
require_once 'auth.php';
require_once 'comment_auth.php';
$user = new Auth();
$user2 = new Authenticate();
if (isset($_POST['action'])&& $_POST['action']=='register'){
	$password = $user->test_input($_POST['password']);
	$username = $user->test_input($_POST['username']);
	$s_name = $user->test_input($_POST['susername']);
	$f_name = $user->test_input($_POST['fusername']);
	$program = $user->test_input($_POST['program']);
	$level = $user->test_input($_POST['level']);
	$email = $user->test_input($_POST['email']);
	$phone = $user->test_input($_POST['phone']);
	$index_number = $user->test_input($_POST['index_number']);
	// print_r($_POST);
	$hpass = password_hash($password, PASSWORD_DEFAULT);

	

	if ($user->index_number_verification($index_number) ) {

        if ($user->verify_program($index_number,$program)) {
          
    
            if($user->verify_level($index_number,$level)){

                  if ($user->user_exist($index_number)) {
                            echo $user->showMessage('warning', 'This Index number is already registered!');
                    
                            
                    
                        }else if  ($user->user_exist($username)) {
                            echo $user->showMessage('success', 'User Name taken Successfully!');
                        }
                            else{
								if ($user->register($hpass,$username,$s_name,$f_name,$program,$level,$email,$phone,$index_number)) {
                                    // echo'register';
									$SESSION['user']= $username;

                                    echo $user->showMessage('success', 'Registration Successful');
                                    // echo $user->showMessage('primary', 'Please Processed the login Page');

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
$username = $user->test_input($_POST['username']);
$password = $user->test_input($_POST['password']);

$loggedInUser = $user->login($username);

if ($loggedInUser != null) {
    if(password_verify($password,$loggedInUser['password'])){
 
       
		$_SESSION['user']= $username;
		echo 'login';
    }
    else{
        echo $user->showMessage('danger','Password is incorrect!');
    }
}
else{
    echo $user->showMessage('danger','User does not exist!');
}


}
?>



