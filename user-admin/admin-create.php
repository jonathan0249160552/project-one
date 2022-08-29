<?php 

// require('check_conn.html');
 require_once 'assets/php/admin-header.php';
// require 'links.php';
require_once 'assets/php/conn.php';

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin | create</title>
   </script> 
    <!-- <link rel="stylesheet" href="assets/css/style.css" /> -->
  </head>
  <!-- <style type="text/css">
html,body{
    height:100%;
}
</style> -->
  <body class="alert-warning">
    <div class="container">
    
      <!-- Registration Form Start -->
      <div class="row justify-content-center h-100 wrapper" id="register-box" >
        <div class="col-lg-10 my-auto bg-success m-2 myShadow">
          <div class="row">
            <div class="col-lg-5 d-flex flex-column justify-content-center myColor p-4">
              <h1 class="text-center font-weight-bold text-white">Welcome Back!</h1>
              <hr class="my-4 bg-light myHr" />
              <p class="text-center font-weight-bolder text-light lead">Please provide new admin information</p>
              <!-- <a  href="../../admin-users.php" class="btn btn-outline-light btn-lg font-weight-bolder myLinkBtn align-self-center" id="back-link">Back</a> -->
            </div>
            <div class="col-lg-7 bg-white p-4">
              <h1 class="text-center font-weight-bold text-primary">Create Account</h1>
              <hr class="my-3" />
              <form action="#" method="post" enctype="multipart/form-data" class="px-3" id="register-form" >
               <div id="redAlert"> </div>
               <div class="input-group input-group-lg form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text rounded-0"><i class="far fa-user fa-lg fa-fw"></i></span>
                  </div>
                  <input type="text" id="index_number" name="index_number" class="form-control rounded-0" placeholder="Index Number" required />
                </div>

                <div class="input-group input-group-lg form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text rounded-0"><i class="far fa-user fa-lg fa-fw"></i></span>
                  </div>
                  <input type="text" id="name" name="username" class="form-control rounded-0" placeholder="User Name" required />
                </div>

                <div class="input-group input-group-lg form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text rounded-0"><i class="far fa-user fa-lg fa-fw"></i></span>
                  </div>
                  <input type="text" id="fusername" name="fusername" class="form-control rounded-0" placeholder="First Name" required />
                </div>

                <div class="input-group input-group-lg form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text rounded-0"><i class="far fa-user fa-lg fa-fw"></i></span>
                  </div>
                  <input type="text" id="susername" name="susername" class="form-control rounded-0" placeholder="Other Names" required />
                </div>

                <div class="input-group input-group-lg form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text rounded-0"><i class="far fa-user fa-lg fa-fw"></i></span>
                  </div>
                  <input type="email" id="email" name="email" class="form-control rounded-0" placeholder="E-mail" required />
                </div>
            
                <div class="input-group input-group-lg form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text rounded-0"><i class="far fa-user fa-lg fa-fw"></i></span>
                  </div>
                  <input type="number" id="phone" name="phone" class="form-control rounded-0" placeholder="Phone" required />
                </div>

                <div class="input-group input-group-lg form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text rounded-0"><i class="fas fa-key fa-lg fa-fw"></i></span>
                  </div>
                  <input type="password" id="rpassword" name="password" class="form-control rounded-0" minlength="8" placeholder="Password" required autocomplete="off" />
                </div>
                <div class="input-group input-group-lg form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text rounded-0"><i class="fas fa-key fa-lg fa-fw"></i></span>
                  </div>
                  <input type="password" id="cpassword" name="cpassword" class="form-control rounded-0" minlength="8" placeholder="Confirm Password" required autocomplete="OFF"/>
                </div>
                <div id="passError" class="text-danger font-weight-bold" ></div>
                <div class="form-group">
                  <div id="passError" class="text-danger font-weight-bolder"></div>
                </div>

              <input type="text" name="level" id="level" value="<?= $clevel?>" style="display:none">
              <input type="text" name="program" id="program" value="<?=$cprogram?>" style="display: none;">
               <div class="form-group">
                  <input type="submit" id="regsiter-btn" value="Sign Up" class=" p-2 lead text-white font-weight-bolder rounded btn-primary 
                   btn-block  " />
                </div>
                
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Registration Form End -->

     </div>
    <!-- jQuery CDN -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script> -->

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
          url:'assets/php/access.php ',
          method: 'post',
          data: $("#register-form").serialize()+'&action=register',
          success:function(response){
            $("#regsiter-btn").val('Sign Up');
            $("#register-form")[0].reset();
            if($.trim(response) === 'register'){ 
              // window.location = 'login.php';
              $("#redAlert").html( '<div class="alert text-center font-weight-bold alert-success">New User successfully Created !!!</div>');
            }
             else{
                $("#redAlert").html(response);
            }
          }
        });
      }
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
