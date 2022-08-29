<?php 
session_start();
require('check_conn.html');
// require 'links.php';
if (isset($_SESSION['user'])) {
  header('location:admin-dashboard.php');
}


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin | login</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.css"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css"/>
    <!-- Fontawesome CSS CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.23/datatables.min.css"/>


       <!-- Including Bootstrap CSS -->    
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="assets/css/mdb.min.css">
     <link rel="stylesheet" type="text/css" href="assets/css/sweetalert2.min"/>
    <!-- Your custom styles (optional) -->
    <!-- <link rel="stylesheet" href="assets/css/styles.css"> -->
       <!-- Including Bootstrap CSS -->    
        <!-- jQuery -->
 <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="assets/js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="assets/js/mdb.min.js"></script>

    <!-- <script src="assets/js/jquery.min.js"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/js/bootstrap.bundle.min.js"></script>

  <!-- <script src="assets/js/bootstrap.min.js"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/js/bootstrap.min.js"></script>

  <script type="text/javascript" src="assets/js/all.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"></script>

  <script type="text/javascript" src="assets/js/datatables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
   <script src="assets/js/sweetalert2.all.min.js"></script>
      
       
    </script> 
    <link rel="stylesheet" href="assets/css/styles.css" />
  </head>
  <style type="text/css">
html,body{
    height:100%;
}
</style>
  <body class="bg-info">
    <div class="container">
    <div class="container h-100">
      <!-- Login Form Start -->
      <div class="row h-100 align-items-center justify-content-center" id="login-box">
        <div class="col-lg-10 my-auto  myShadow" style="background-color: red;">
          <div class="row">
            <div class="col-lg-7 bg-white p-4">
              <h2 class="text-center font-weight-bold text-primary">Sign in to Account</h2>
              <hr class="my-3" />
              <form action="#" method="post" class="px-3" id="login-form">
              <div id="loginAlert"> </div>
              <div class="input-group input-group-lg form-group">
                  <div class="input-group-prepend">
                  <span class="input-group-text rounded-0"> <i class="far fa-id-card fa-lg fa-fw"></i></span>
                  </div>
                  <input type="text" id="username" name="username" class="form-control rounded-0"   maxlength="10" size="10" placeholder="Index Number " required 
                   value="<?php if(isset($_COOKIE['username'])){echo $_COOKIE['username'];} ?>" />
                </div>
                
                <div class="input-group input-group-lg form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text rounded-0"><i class="fas fa-key fa-lg fa-fw"></i></span>
                  </div>
                  <input type="password" id="password" name="password" class="form-control rounded-0" minlength="8" placeholder="Password" required autocomplete="off" 
                  value="<?php if(isset($_COOKIE['password'])){echo $_COOKIE['password'];} ?>"/>
                </div>
            
 
                
                  <input type="submit" id="login-btn" value="Sign In" class=" p-2 lead text-white font-weight-bolder rounded btn-primary 
                   btn-block  " />
                
              </form>
            </div>
            <div class="col-lg-5 d-flex flex-column justify-content-center myColor p-4">
              <h1 class="text-center font-weight-bold text-white">Welcome Main Admin!</h1>
              <hr class="my-3 bg-light myHr" />
              <p class="text-center font-weight-bolder text-light lead">Please enter your login details to login!</p>
              <a href="../academia_account.php" class="btn btn-outline-light btn-lg font-weight-bolder myLinkBtn align-self-center" id="back-link">Back</a>
            </div>
            
          </div>
        </div>
      </div>
      <!-- Login Form End -->
     
    <!-- jQuery CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script>

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


  // Register Ajax request   
  $("#regsiter-btn").click(function(e){
    if ($("#register-form")[0].checkValidity()){
      e.preventDefault();
      $("#regsiter-btn").val('Please Wait...');
      if($("#rpassword").val() != $("#cpassword").val()){
       $("#passError").text('* Password did not matched!');
       $("#regsiter-btn").val('Sign Up');
      }
      else{
        $("#passError").text(' ');
        $.ajax({
          url:'assets/php/action.php ',
          method: 'post',
          data: $("#register-form").serialize()+'&action=register',
          success:function(response){
            $("#regsiter-btn").val('Sign Up');
            //if(response === 'register' ){}
            if($.trim(response) === 'register'){ 
              window.location = 'index.php';
             
            }
             else{
                $("#redAlert").html(response);
            }
          }
        });
      }
    }
  });
//login ajax request

$("#login-btn").click(function(e){
  if($("#login-form")[0].checkValidity()){
    e.preventDefault();

    $("#login-btn").val('Please Wait...');
    $.ajax({
      url:'assets/php/action.php',
      method:'post',
      data: $("#login-form").serialize()+'&action=login',
      success:function(response){
    
        $("#login-btn").val('Sign In');
        // if(response ==='login'){
        //   window.location='admin-dashboard.php'; 
        // }
        if($.trim(response) === 'login'){ 
              window.location = 'admin-dashboard.php';
             
            }
        else { $("#loginAlert").html(response);
        }
      }
    });
  }
});

// forgot password ajax request
$("#forgot-btn").click(function(e){
  if($("#forgot-form")[0].checkValidity()){
    e.preventDefault();
 $("#forgot-btn").val('Please Wait...');
    $.ajax({
      url:'assets/php/action.php',
      method:'post',
      data: $("#forgot-form").serialize()+'&action=forgot',
      success:function(response){
        $("#forgot-btn").val('Reset Password');
        $("#forgot-form")[0].reset();
        $("#forgotAlert").html(response);
      
      }
    });
  }
});

});
   </script> 
  </body>
</html>
