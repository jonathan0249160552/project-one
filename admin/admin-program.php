<?php 

// require('check_conn.html');
 require_once 'assets/php/admin-header.php';
// require 'links.php';

// require_once 'assets/php/admin-header.php';
require_once 'assets/php/conn.php';

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin | Add Program</title>
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.css"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css"/> -->

 
      
       
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
      <div class="row justify-content-center wrapper" id="register-box" >
     

            <div class="col-lg-7 bg-white p-4">
              <h1 class="text-center font-weight-bold text-primary">Add new program</h1>
              <hr class="my-3" />
              <form action="#" method="post" class="px-3" id="program-form" >
               <div id="redAlert"> </div>
         
                <div class="input-group input-group-lg form-group">
                  <div class="input-group-prepend">
                 
                  </div>
                  <input type="text" id="program" name="program" class="form-control rounded-0" placeholder="Program" required />
                </div>
    
                <div class="form-group">
                  <div id="passError" class="text-danger font-weight-bolder"></div>
                </div>
                <div class="form-group">
                  <input type="submit" id="program-btn" value="Send" class=" p-2 lead text-white font-weight-bolder rounded btn-primary 
                   btn-block  " />
                </div>
               
              
                </div>
               
              </form>
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

      $("#program-btn").click(function(e){
  if($("#program-form")[0].checkValidity()){
    e.preventDefault();
 $("#program-btn").val('Please Wait...');
    $.ajax({
      url:'assets/php/action.php',
      method:'post',
      data: $("#program-form").serialize()+'&action=program',
      success:function(response){
     
        $("#redAlert").html(response);
        $("#program-btn").val('Send');
      }
    });
  }
});
});
   </script> 
  </body>
</html>
