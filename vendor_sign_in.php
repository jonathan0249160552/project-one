
<?php 
session_start();
require('check_conn.html');
if (isset($_SESSION['user'])) {
  header('location:store.php');
}

// require_once 'assets/php/conn.php';
require 'links_s.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KEEN || Store</title>
    <link rel="stylesheet" href="store/assets/css/style-liberty.css">
	
  <!-- Template CSS -->
  <link href="http://fonts.googleapis.com/css?family=Oswald:300,400,500,600&amp;display=swap" rel="stylesheet">
  <link href="http://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,900&amp;display=swap" rel="stylesheet">
  <!-- Template CSS -->

<link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>

<!-- <script src="../../../../../../../m.servedby-buysellads.com/monetization.js" type="text/javascript"></script> -->

 <!-- <script src="assets/js/jquery.min.js"></script> -->

  <!-- <script type="text/javascript" src="assets/js/all.min.js"></script> -->

<!-- <script async src='../../../../../../js/autotrack.js'></script> -->

<!-- <script src="../../../../../../../m.servedby-buysellads.com/monetization.js" type="text/javascript"></script> -->
<body>
    <div class="container">
        <div class="section">
<center>
<a class="navbar-brand border  pr-2 pl-2 rounded m-4  "  href="index.html"><i class="fas fa-sign-out-alt"></i>&nbsp;K E E N | Home</a>
</center>
            <div class=" col col-lg-12 clearfix">
                <div class="card  p-4">
               
			<div class="container-fluid">
				<div class="top-right-strip row">
				
			
			
					<a class="float-left text-primary font-weight-bold" style="font-size: x-large;" > Campus <span class="lohny" style="font-size: xx-large;">S</span>tore</a>
						
									</div>
									
								
							</div>
							<a href="help.php" class="text-primary font-weight-bold mt-4">Help?</a>
						
                            
							
	
							<!-- customer account login start -->
	
							<div id="" class="customer_account_login_box">
								<!-- <a href="#contact" class="login"> Login</a> -->
								<h5 class="text-center mb-4 mt-4">Login into Business Account</h5>
								<form action="" method="post" id="customer_account_login_form">
								<div class="form-group">
											<p class="login-texthny mb-2">User Name</p>
											<input type="text" class="form-control" value="<?php if(isset($_COOKIE['user_names'])){echo $_COOKIE['user_names'];} ?>" name="user_names" id="user_names"
												placeholder="" required>
										</div>
	
	
								
										<div class="form-group">
											<p class="login-texthny mb-2">Password</p>
											<input type="password" value="<?php if(isset($_COOKIE['password'])){echo $_COOKIE['password'];} ?>" class="form-control" name="password" id="password"
												placeholder="" required>
										</div>

										
										<div class="form-check mb-2">
										<div class="userhny-check" style="display:flex ;">
											<label for="customCheck" class="check-remember container">Remember me
											</label>
											<input type="checkbox" name="rem" id="customCheck" <?php if(isset($_COOKIE['user_names'])) { ?> checked <?php } ?>  class="form-check"> <span
													class="checkmark"></span>
											<div class="clearfix"></div>
										</div>
										<!-- <div class="redAlert"></div> -->
									</div>
										
										<div id="loginAlert"> </div>
												
										<input type="submit" id="customer_sign_in" name="customer_sign_in" value="Sign In" class="font-weight-bold form-control btn mb-4" style="color:white;background:#ff7315; border-radius: 25px;padding: 5px;width: 100%;">
	
								</form>
							
							<!-- business account login end  -->				


							</div>
													
												<div class=" " id="forgot_password_box" style="display: none;">
												<div class="">
												<button type="submit" id="close_fp_box" class="btn btn-primary float-right">x</button>
												</div>
													<label for="forgot_password" class="font-weight-bold text-muted">Enter your email address associated with this account 
															to send you a password reset link
															<hr>
														</label>
															
														<form action="" id="f_p_form" method="post">
														<div class="form-group">
														<input type="email" class="form-control mb-3 mt-3"  placeholder="e-mail" name="forgot_password_email" id="forgot_password_email">
														
														</div>
													<div class="form-group">
														<div id="forgotAlert">

														</div>
													<input type="submit" id="f_p_email_btn" name="f_p_email_btn" value="Reset Password" class="font-weight-bold form-control btn mb-4" style="color:white;background:#ff7315; border-radius: 25px;padding: 5px;width: 100%;">
	
													</div>
													</form>
													
													</div>
	
									<div style="display:flex ;">
									<a href="sign_up_vendor.html" class=" font-weight-bold  text-primary mr-4"> Sign Up </a>
									<a href="#" id="f_password" class=" font-weight-bold float-right text-primary ">Forgot Password?</a>
									</div>
								</div>
							
						</div>
					
				</div>
			</div>
                </div>
            </div>
        </div>
    </div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script>

	<script type="text/javascript">
  $(document).ready(function(){
  // Register Ajax request   
  $("#customer_sign_up").click(function(e){
    if ($("#create_customer_account_form")[0].checkValidity()){
      e.preventDefault();
      $("#customer_sign_up").val('Please Wait...');
      if($("#x_password").val() != $("#x_confirm_password").val()){
       $("#passError").text('* Password did not matched!');
       $("#customer_sign_up").val('Sign Up');
      }
      else{
        $("#passError").text(' ');
        $.ajax({
          url:'assets/php/action_customer.php ',
          method: 'post',
          data: $("#create_customer_account_form").serialize()+'&action=customer_register',
          success:function(response){
            $("#customer_sign_up").val('Sign Up');
            $("#redAlert").html(response);
    		// console.log(response);
          }
        });
      }
    }
  });


$("#c_login").click(function () {
		$(".customer_account_login_box").show();
		$(".create_customer_account_box").hide();
        $("#c_create").show()
        $("#c_login").hide()
  });

  $("#c_create").click(function () {
  
    $(".customer_account_login_box").hide();
    $("#c_login").show()
    $("#c_create").hide()
	$(".create_customer_account_box").show();
	// $(".user_btn").hide();
  });

  $("#f_password").click(function(){
	$(".customer_account_login_box").hide();
		$(".create_customer_account_box").hide();
        $("#c_create").hide()
        $("#c_login").hide()
		$("#forgot_password_box").show();
		$("#f_password").hide();
  })

  $("#close_fp_box").click(function(){
	$(".customer_account_login_box").show();
		$(".create_customer_account_box").hide();
        $("#c_create").show()
        $("#c_login").hide()
	$("#forgot_password_box").hide();
	$("#f_password").show();
	// $(".user_btn").hide();
  })

  $(".close_all").click(function () {
    $(".form_box").hide();
	$("#user_btn").show();
  });
  $(".open_form_box").click(function () {
	$(".form_box").show();

	$("#user_btn").hide();
  });

 



$("#customer_sign_in").click(function(e){
  if($("#customer_account_login_form")[0].checkValidity()){
    e.preventDefault();

    $("#customer_sign_in").val('Please Wait...');
    $.ajax({
      url:'assets/php/action_customer.php',
      method:'post',
      data: $("#customer_account_login_form").serialize()+'&action=login',
      success:function(response){
    
        $("#customer_sign_in").val('Sign In');
        if(response ==='login'){
          window.location='store.php'; 
		 
        }
        else { $("#loginAlert").html(response);
        }
		window.setTimeout(function(){ 
                 location.reload();
                } ,1000)
      }
    });
  }
});

$("#f_p_email_btn").click(function(e){
  if($("#f_p_form")[0].checkValidity()){
    e.preventDefault();

    $("#f_p_email_btn").val('Please Wait...');
    $.ajax({
      url:'assets/php/action_customer.php',
      method:'post',
      data: $("#f_p_form").serialize()+'&action=f_password',
      success:function(response){
        $("#f_p_email_btn").val('Reset Password');
        $("#f_p_form")[0].reset();
        $("#forgotAlert").html(response);
      
      
      }
    });
  }
});

  });



</script>


</body>
</html>