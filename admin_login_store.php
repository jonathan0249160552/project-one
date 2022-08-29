<?php
session_start();
require('check_conn.html');

if (isset($_SESSION['user'])) {
//   header('location:store/campus_services.php');
  header('location:dashboard.php');
} 


require_once 'assets/php/conn.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KEEN || Store || Admin Page</title>
    <link rel="stylesheet" href="store/assets/css/style-liberty.css">
  <!-- Template CSS -->
  <link href="http://fonts.googleapis.com/css?family=Oswald:300,400,500,600&amp;display=swap" rel="stylesheet">
  <link href="http://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,900&amp;display=swap" rel="stylesheet">
  <!-- Template CSS -->

<link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>

<script src="../../../../../../../m.servedby-buysellads.com/monetization.js" type="text/javascript"></script>

 <script src="assets/js/jquery.min.js"></script>

  <script type="text/javascript" src="assets/js/all.min.js"></script>

<script async src='../../../../../../js/autotrack.js'></script>

<script src="../../../../../../../m.servedby-buysellads.com/monetization.js" type="text/javascript"></script>
<body>
    <div class="container">
        <div class="section">
        <a class="navbar-brand border  pr-2 pl-2 rounded m-4  "  href="index.php">K E E N || Admin || Store</a>
            <div class=" col col-lg-12 clearfix">
                <div class="card m-4 p-4">
               
			<div class="container-fluid">
				<div class="top-right-strip row">
				
			
			
					<a class="float-left text-primary font-weight-bold" style="font-size: x-large;" > Campus <span class="lohny" style="font-size: xx-large;">S</span>tore</a>
						
									</div>
									
								
							</div>
							<a href="help.php" class="text-primary font-weight-bold mt-4">Help?</a>
						
                            <div id="account_login_box" class="account_login_box" >
							
							<h5 class="text-center font-weight-bold text-primary mb-4 mt-4">Login into Business Account</h5>
								<form action="" method="post" id="business_account_login_form">
									<div class="form-group">
											<p class="login-texthny mb-2">User Name</p>
											<input type="text" class="form-control" name="user_name" id="user_name"
												placeholder="" required>
									</div>
	
	
										<div class="form-group">
											<p class="login-texthny mb-2">Email</p>
											<input type="text" class="form-control" name="email" id="email"
												placeholder="" required>
										</div>
	
										<div class="form-group">
											<p class="login-texthny mb-2">Password</p>
											<input type="password" class="form-control" name="password" id="password"
											value="<?php if(isset($_COOKIE['password'])){echo $_COOKIE['password'];} ?>"	placeholder="" required>
										</div>
										
										
	
										<div id="redAlert"></div>
										<div id="loginAlert"> </div>
										<input type="submit" id="business_sign_in" name="business_sign_in" value="Sign In" class="font-weight-bold form-control btn mb-4" style="color:white;background:#ff7315; border-radius: 25px;padding: 5px;width: 100%;">
								</form>
							</div>
						 <!-- business account start -->
							<div class="create_business_account_box font-weight-bold text-primary"  style="display: none;">
							<h5 class="text-center mb-4 mt-4 font-weight-bold text-primary">Create Business Account</h5>
						
								<!--/login-form-->
								<form action="#" method="post" id="create_business_account_form">

								<div class="form-group">
										<p class="login-texthny mb-2">Business Authentication Code</p>
										<input type="text" class="form-control" name="business_code" id="business_code"
											placeholder="" required>
									</div>

									<div class="form-group">
										<p class="login-texthny mb-2">User Name</p>
										<input type="text" class="form-control" name="c_user_name" id="c_user_name"
											placeholder="" required>
									</div>

								
								<div class="form-group">
										<p class="login-texthny mb-2">Full Name</p>
										<input type="text" class="form-control" name="c_name" id="c_name"
											placeholder="" required>
									</div>

				
									
								<div class="form-group">
										<p class="login-texthny mb-2">Contact</p>
										<input type="tel" id="c_contact" oninput="javascript: if (this.value.length > this.maxLength)
                           this.value = this.value.slice(0, this.maxLength);"
                           type = "number"maxlength = "10" name="c_contact" required> 
								</div>

								<div class="form-group">
										<p class="login-texthny mb-2">Place or Residence</p>
										<input type="text" class="form-control" maxlength="100"  size="100" name="c_location" id="c_location"
											placeholder="" required>
								</div>



									<div class="form-group">
										<p class="login-texthny mb-2">Email address</p>
										<input type="email" class="form-control" name="c_email" id="c_email"
											aria-describedby="emailHelp" placeholder="" required>
										<small id="emailHelp" class="form-text text-muted">We'll never share your email
											with anyone else.</small>
									</div>

								
									<div class="form-group">
										<p class="login-texthny mb-2">Gender</p>
											
										<select name="c_gender" class="form-control p-2 custom-select"  id="c_gender" required>
											<option value="male">Male</option>
											<option value="female">Female</option>
										</select>

									</div>
									
									<div class="form-group">
										<p class="login-texthny mb-2">Program</p>
										<select name="c_program" id="c_program" class="form-control p-2 custom-select"  tabindex="1" required>
                                                        <!-- <option>--Select Restaurant--</option> -->
                                                 <?php $ssql ="select * from program_table";
													$res=mysqli_query($conn, $ssql); 
													while($row=mysqli_fetch_array($res))  
													{
                                                       echo'
                                                        <option value="'.$row['program'].'">'.$row['program'].'</option>';
													}  
                                                 
													?> 
													 </select>
									</div>


									<div class="form-group">
										<p class="login-texthny mb-2">Level</p>
										<select style="width:100%" class="form-control p-2 custom-select " name="c_level" id="c_level" required>
											<option value="100">100</option>
											<option value="200">200</option>
											<option value="300">300</option>
											<option value="400">400</option>
										</select>
															</div>


									<div class="form-group">
										<p class="login-texthny mb-2">Business Name</p>
										<input type="text" class="form-control" name="c_business_name" id="c_business_name"
											placeholder="" required>
									</div>


									<div class="form-group">
										<p class="login-texthny mb-2">Product Category</p>
										
										<select style="width:100%" class="mt-2  mb-2 form-control rounded-0 " name="c_product_category" id="c_product_category" required>
												<option value="CS001">Campus Services</option>
												<option value="FD002">Food</option>
												<option value="HB001">Health and Beauty</option>
												<option value="CBA003">Cloths and Body Accessories</option>
												<option value="GDA004">Gadgets  and Device Accessories</option>
												<option value="MM005">MultiMedia</option>
										</select>
										
									</div>


									<div class="form-group">
										<p class="login-texthny mb-2">Password</p>
										<input type="password" class="form-control" name="c_password"  id="c_password"
											placeholder="" required>
									</div>


									<div class="form-group">
										<p class="login-texthny mb-2">Confirm Password</p>
										<input type="password" class="form-control" name="c_confirm_password" id="c_confirm_password"
											placeholder="" required>
									</div>

									
									
									<div class="form-check mb-2">
									<div class="userhny-check">
											<label class="check-remember container">
												<input type="checkbox" name="terms_condition_c" class="form-check" required> <span
													class="checkmark"></span>
												<p class="privacy-policy">Agree to Terms & Condition
												</p>
											</label>
											<div class="clearfix"></div>
										</div>
										<div id="redAlert"></div>
									</div>
								
								

									<input type="submit" id="business_sign_up" name="business_sign_up" value="Sign Up" class="font-weight-bold form-control btn mb-4" style="color:white;background:#ff7315; border-radius: 25px;padding: 5px;width: 100%;">
								</form>
                                                    
							</div>

							<div class="float-right"><a  href="#" id="c_login" class=" font-weight-bold btn text-primary m-1" style="display: none;">Sign In </i></a>
									<a href="#" id="c_create" class=" font-weight-bold btn text-primary m-1"> Sign Up </a>
								</div>
	
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

    <script src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
      $("#c_login").click(function () {
		$(".account_login_box").show();
		$(".create_business_account_box").hide();
        $("#c_create").show()
        $("#c_login").hide()
  });

  $("#c_create").click(function () {
  
    $(".account_login_box").hide();
    $("#c_login").show()
    $("#c_create").hide()
	$(".create_business_account_box").show();
	// $(".user_btn").hide();
  });






  // Register Ajax request   
  $("#business_sign_up").click(function(e){
    if ($("#create_business_account_form")[0].checkValidity()){
      e.preventDefault();
      $("#business_sign_up").val('Please Wait...');
      if($("#c_password").val() != $("#c_confirm_password").val()){
       $("#passError").text('* Password did not matched!');
       $("#business_sign_up").val('Sign Up');
      }
      else{
        $("#passError").text(' ');
        $.ajax({
          url:'assets/php/action_store.php ',
          method: 'post',
          data: $("#create_business_account_form").serialize()+'&action=business_register',
          success:function(response){
            $("#business_sign_up").val('Sign Up');
            $("#redAlert").html(response);
    		window.setTimeout(function(){ 
				$(".account_login_box").show();
				$(".create_business_account_box").hide();
                } ,3000)
          }
        });
      }
    }
  });



 
//login admin ajax request

$("#business_sign_in").click(function(e){
  if($("#business_account_login_form")[0].checkValidity()){
    e.preventDefault();

    $("#business_sign_in").val('Please Wait...');
    $.ajax({
      url:'assets/php/action_store.php',
      method:'post',
      data: $("#business_account_login_form").serialize()+'&action=login_admin',
      success:function(response){
    
        $("#business_sign_in").val('Sign In');
		$("#loginAlert").html(response);
        console.log(response);
		window.location='dashboard.php';
		
      }
    });
  }
});




});
</script>

</body>
</html>