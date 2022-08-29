<?php
require('check_conn.html');
require 'links.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css"/>
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.css"/>
   <link rel="stylesheet" href="assets/css/bootstrap.min.css"> 
   <title>Help</title>
</head>
<html>
<body>
<style>
/* Style the buttons that are used to open and close the accordion panel */
.accordion {
  background-color: #eee;
  /* color: ; */
  cursor: pointer;
  padding: 18px;
  width: 100%;
  text-align: left;
  border: none;
  outline: none;
  transition: 0.4s;
}

/* Add a background color to the button if it is clicked on (add the .active class with JS), and when you move the mouse over it (hover) */
.active, .accordion:hover {
  background-color: #ccc;
}

/* Style the accordion panel. Note: hidden by default */
.panel {
  padding: 0 18px;
  background-color: white;
  display: none;
  overflow: hidden;
}

</style>

<style>
.panel {
  padding: 0 18px;
  background-color: white;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
}

.accordion:after {
  content: '\02795'; /* Unicode character for "plus" sign (+) */
  font-size: 13px;
  color: #777;
  float: right;
  margin-left: 5px;
}

.active:after {
  content: "\2796"; /* Unicode character for "minus" sign (-) */
}


        #scroll {
    position:fixed;
    right:8%;
    bottom:20%;
    cursor:pointer;
    width:50px;
    height:50px;
    background-color:#3498db;
    text-indent:-9999px;
    display:none;
    -webkit-border-radius:60px;
    -moz-border-radius:60px;
    border-radius:60px;}

#scroll span {
    position:absolute;
    top:50%;
    left:50%;
    margin-left:-8px;
    margin-top:-12px;
    
    height:0;
    width:0;
    border:8px solid transparent;
    border-bottom-color:#ffffff;
}
#scroll:hover {
    background-color:#3b3938c4;
    opacity:1;filter:"alpha(opacity=100)";
    -ms-filter:"alpha(opacity=100)";
}
  </style>
    
	<nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
		<div class="container-fluid">
			<label  class="navbar-brand btn bg-info"> <a href="home.php" class="text-white sm-2">Home</a> </label>
      <label  class="navbar-brand btn bg-info"> <a href="store.php" class="text-white sm-2">Campus Store</a> </label>
      <!-- <label  class="navbar-brand btn bg-info"> <a href="home.php" class="text-white sm-2">Back</a> </label> -->
      <!-- <label  class="navbar-brand btn bg-info"> <a href="home.php" class="text-white sm-2">Back</a> </label> -->
		</div>
	</nav>
<div class="container">
<h3 class="text-center font-weight-bold text-primary m-1 mt-4">Send Complaints to our Team</h3>
  <div class="row justify-content-center">
  
    <div class="col-lg-8 mt-3">
    <button class="accordion alert-danger mt-3 ">Frequently asked questions on departments</button>
<div class="panel bg-light">


  <p class="mt-2 mb-2  alert-danger p-3"> I have searched through the available departments but 
 <strong> I can't find my department</strong> </p>
  <span class="font-weight-bold text-success ">Solution</span>
  <p class=" alert-info mt-2 p-3">Please contact your <span class="font-weight-bold">Class rep</span> to inform the team to include your department <span class="font-weight-bold">or with the contact form</span>
   below and enter the details of your department and send them to our team </p>
</div>

<button class="accordion alert-danger  ">Frequently asked questions on Programs</button>
<div class="panel bg-light">


  <p class="mt-2 mb-2  alert-danger p-3"> I have searched through the available departments but 
 <strong> I can't find my Program under my department</strong> </p>
  <span class="font-weight-bold text-success ">Solution</span>
  <p class=" alert-info mt-2 p-3">Please contact your <span class="font-weight-bold">Class rep</span> to inform the team to include your Program <span class="font-weight-bold">or use the contact form</span>
   below and enter the details of your department and send them to our team </p>
</div>


<button class="accordion alert-danger  ">Campus Store</button>
<div class="panel bg-light">


  <p class="mt-2 mb-2  alert-danger p-3">I am creating a business account for my business but there is a required field asking for business authentication code which i do not have</strong> </p>
  <span class="font-weight-bold text-success ">Solution</span>
  <p class=" alert-info mt-2 p-3">Please contact  <span class="font-weight-bold">our customer service</span> using the phone lines or email to get your business authentication code <span class="font-weight-bold">or use the contact form</span>
   below and enter your details respectively and send them to our team <a href="">Click Here</a> </p>
</div>

<button class="accordion alert-danger">Frequently asked questions e-mail</button>
<div class="panel bg-light">
<p class="mt-2 mb-2  alert-danger p-3"> 
  Am trying to verify my account am not receiving my e-mail verification.</p>
  <span class="font-weight-bold text-success ">Solution</span>
  <p class=" alert-info mt-2 p-3">Please go to the profile tap and check whether the email provided is the same as the one you have currently
  login if yes please refresh your mail box if it does not work then you need to grand the application permission to send e-mail to your account.
   You can do so by clicking the below link <a href="https://myaccount.google.com/u/2/lesssecureapps" style="overflow-x:hidden" class="">Click here</a>
</p>
  <p class="mt-2 mb-2  alert-danger p-3"> 
  I have forgotten my password and I tried to reset it using forgot password.
   I entered my registered e-mail. After clicking 
  the reset password button I get an alert that 
  something went worng please check your internet connection and try again later. 
  I have checked my internet connection
  everything is working fine.   </p>
  <span class="font-weight-bold text-success ">Solution</span>
  <p class=" alert-info mt-2 p-3">You need to grand the application permission to send
   e-mail to your account. You can do so  
  by clicking the link <a href="https://myaccount.google.com/u/2/lesssecureapps" class="">
  Click here</a>
</p>
</div>

<button class="accordion mb-3 alert-danger">Frequently asked questions login and registration</button>
<div class="panel bg-light">
  <p class="mt-2 mb-2  alert-danger p-3"> I just created an account. When I try to login an alert is displayed that
  <strong>user does not exist.</strong></p>
  <span class="font-weight-bold text-success ">Solution</span>
  <p class=" alert-info mt-2 p-3">Check your index number whether is correctly entered. You must also ensure that the entered index nuber
  is the same as the index number used for the registration
  index number is the same as the one that was use to create the account. 
  If you have tried the above solutions contact administrator
  using the contact form provided below for rectification.
  </p>
  <p class="mt-2 mb-2  alert-danger p-3">I have an account. I have been logging don't know what happened
   now when try to login there is an alert saying
  <strong>user does not exist.</strong></p>
  <span class="font-weight-bold text-success ">Solution</span>
  <p class=" alert-info mt-2 p-3">Check your index number whether is correctly entered. If it is correctly entered then please contact
  administrator for more details your account may have been deleted by administrator.
  </p>
  <p class="mt-2 mb-2  alert-danger p-3">I am a new user I have not registered any account but when try to 
  register a massage is display that 
  <strong>this index number is already registered.</strong></p>
  <span class="font-weight-bold text-success ">Solution</span>
  <p class=" alert-info mt-2 p-3">Check your index number whether is correctly entered. If it is correctly entered then please contact
  administrator to cross check your index number may have be registered by somebody.
  </p>

  <p class="mt-2 mb-2  alert-danger p-3">I am a new user I have not registered any account but when try to 
  register a massage is display that 
  <strong>I do not offer this program.</strong></p>
  <span class="font-weight-bold text-success ">Solution</span>
  <p class=" alert-info mt-2 p-3">Please note that <span class="font-weight-bold"> "I", "II", "III", "Iv"</span> represent the Level you are in. check whether you
    chose the right level. if it is still not working contact our team to help you out using the contact form below
  </p>
</div>
        <div class="card  alert-primary mb-5">
          <div class="card-header lead text-center bg-primary text-white">Report an issue to Team</div>
            <div class="card-body">
              <form action="#"method="post" class="px-4" id="feedback-form">
              <div id="redAlert"> </div>
              <div class="form-group">
                  <input type="email" name="email" placeholder="E-Mail  " 
                  class="form-control-lg form-control rounded-0" required>
                </div>
                <div class="form-group">
                <input type="text" name="index_number" placeholder="Index number" 
                  class="form-control-lg form-control rounded-0" required>
                </div>
                <div class="form-group">
                <input type="text" name="name" placeholder="Full Name  " 
                  class="form-control-lg form-control rounded-0" required>
              
                </div>

                  <div class="form-group">
                <input type="number" name="contact" placeholder="Contact" 
                  class="form-control-lg form-control rounded-0" required>
                  </div>

                  <div class="form-group">
                    <textarea type="text" name="feedback"  class="form-control-lg form-control 
                    rounded-0" placeholder="Write Your issue Here..." rows="6" required></textarea>
                  </div>
                    <div class="form-group">
                      <input type="submit" name="feedbackBtn" id="feedbackBtn"
                      value="Send" class="btn btn-primary btn-block btn-lg rounded-0">
                    </div>
              </form>
            </div>
            <a href="#" id="scroll" style="display: none;"><span></span></a>
        </div>  

        <div class="card  alert-primary mb-5">
          <div class="card-header lead text-center bg-primary text-white">Contact Our Customer Service</div>
            <div class="card-body">
              <form action="#"method="post" class="px-4" id="feedback-form">
              <div id="redAlert"> </div>

              <div class="form-group">
                  <input type="text" name="email" placeholder="Your Business Name  " 
                  class="form-control-lg form-control rounded-0" required>
                </div>
                

              <div class="form-group">
                  <input type="email" name="email" placeholder="E-Mail  " 
                  class="form-control-lg form-control rounded-0" required>
                </div>
                
                <div class="form-group">
                <input type="text" name="name" placeholder="Full Name  " 
                  class="form-control-lg form-control rounded-0" required>
              
                </div>

                  <div class="form-group">
                <input type="number" name="contact" placeholder="Contact" 
                  class="form-control-lg form-control rounded-0" required>
                  </div>

                  <div class="form-group">
                    <textarea type="text" name="feedback"  class="form-control-lg form-control 
                    rounded-0" placeholder="Write Your Complaints" rows="6" required></textarea>
                  </div>
                    <div class="form-group">
                      <input type="submit" name="feedbackBtn" id="feedbackBtn"
                      value="Submit" class="btn btn-primary btn-block btn-lg rounded-0">
                    </div>
              </form>
            </div>
            <a href="#" id="scroll" style="display: none;"><span></span></a>
        </div>  

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript">
  //handle help
    $("#feedbackBtn").click(function(e){
  if($("#feedback-form")[0].checkValidity()){
    e.preventDefault();

    $("#feedbackBtn").val('Please Wait...');
    $.ajax({
      url:'assets/php/action.php',
      method:'post',
      data: $("#feedback-form").serialize()+'&action=problem',
      success:function(response){
        
        $("#feedbackBtn").val('Send');
        $("#redAlert").html(response);
         
      }
    });
  }
});
//handle accordion

var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    /* Toggle between adding and removing the "active" class,
    to highlight the button that controls the panel */
    this.classList.toggle("active");

    /* Toggle between hiding and showing the active panel */
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
// handle accordion button
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    }
  });
}

// hadle scroll
$(window).scroll(function(){ 
        if ($(this).scrollTop() > 100) { 
            $('#scroll').fadeIn(); 
        } else { 
            $('#scroll').fadeOut(); 
        } 
    }); 
    $('#scroll').click(function(){ 
        $("html, body").animate({ scrollTop: 0 }, 600); 
        return false; 
    }); 
    </script> 
    



</body>
</html>