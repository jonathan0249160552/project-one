<?php
require_once 'assets/php/auth.php';
require 'links.php';
$user = new Auth();

$msg ='';
if(isset($_GET['email']) && isset($_GET['token'])){
    $email = $user->test_input($_GET['email']);
    $token = $user->test_input($_GET['token']);

    $auth_user = $user->reset_pass_auth($email,$token);
    if($auth_user !=null){
        if(isset($_POST['submit'])){
            $newpass = $_POST['pass'];
            $cnewpass = $_POST['cpass'];
            $hnewpass = password_hash($newpass,PASSWORD_DEFAULT);

            if($newpass == $cnewpass){
                $user->update_new_pass($hnewpass, $email);
                $msg = ' <p class="text-success font-weight-bold">Password Successfully Changed !!!</p><br><a href="index.php"> Login
                Here!</a>';

            }
            else{
                $msg = '* Password did not matched!';
            }
        }
    }
    else{
        header('location:index.php');
        exit();
    }
}
else{
    header('location:index.php');
        exit();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reset password</title>
    <!-- Bootstrap 4 CSS CDN -->  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"/>
    <!-- Fontawesome CSS CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css"/>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
     
       
    </script> 
    <link rel="stylesheet" href="assets/css/style.css" />
  </head>
  <body class="bg-info">
    <div class="container">
      <!-- change password Form Start -->
      <div class="row justify-content-center wrapper" >
        <div class="col-lg-10 my-auto myShadow">
          <div class="row">
          <div class="col-lg-5 d-flex flex-column justify-content-center  p-4" id="forgot-box" style="display: none; background-color: #040731" >
              <h1 class="text-center font-weight-bold text-white">Reset Password here!</h1>
              <hr class="my-3 bg-light myHr" />
              <button class="btn btn-outline-light btn-lg font-weight-bolder myLinkBtn align-self-center" id="back-link" onclick="window.location.href='index.php'" >Back </button>
              <script>
              </script>
            </div>
            <div class="col-lg-7 bg-white p-4">
              <h1 class="text-center font-weight-bold text-primary">Enter new Password here!</h1>
              <hr class="my-3" />
              <form action="#" method="post" class="px-3"  id="forgot-form">
              <div class ="text-center lead my-2"><?= $msg;?></div>
                <div class="input-group input-group-lg form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text rounded-0"><i class="fas fa-key fa-lg fa-fw"></i></span>
                  </div>
                  <input type="password"  name="pass" class="form-control rounded-0" minlength="8" placeholder="New Password" required autocomplete="off" />
                </div>
                <div class="input-group input-group-lg form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text rounded-0"><i class="fas fa-key fa-lg fa-fw"></i></span>
                  </div>
                  <input type="password"  name="cpass" class="form-control rounded-0" minlength="8" placeholder="Confirm New Password" required autocomplete="off" />
                </div>
               
                <div class="form-group">
                  <input type="submit" name="submit" value="Reset Password" class="btn btn-primary btn-lg btn-block myBtn" />
                </div>
              </form>
            </div>
            
          </div>
        </div>
      </div>
      </div>
      <script type="text/javascript">
    $(document).ready(function(){
      $("#register-link").click(function () {
    $("#login-box").hide();
    $("#register-box").show();
  });
  $("#login-link").click(function () {
    $("#login-box").show();
    $("#register-box").hide();
  });
  $("#forgot-link").click(function () {
    $("#login-box").hide();
    $("#forgot-box").show();
  });
  $("#back-link").click(function () {
    $("#login-box").show();
    $("#forgot-box").hide();
    });
});
   </script>
      </body>
      </html>
