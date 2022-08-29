<?php
// session_start();

require 'assets/php/header_customer.php';
require_once 'assets/php/conn.php';
require 'links.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store || Customer Profile</title>
    <link rel="stylesheet" href="store/assets/css/style-liberty.css">
    
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body >
      
 <script src="assets/js/jquery.min.js"></script>

<script type="text/javascript" src="assets/js/all.min.js"></script>      
  <!-- general notice details start -->
  <div  class="" style="width:100%" id="ProfileModal" style="background-color:rgba(0, 0, 0, 0);">


    <div class="modal-content">
    
        <div class="">
       
        </div>
        <div class="modal-body">
        <div class="" >
    <div class="row justify-content-center " >
      <div class="col-lg-10">
        <div class="card rounded-0 mt-3 " style="border-color: #ff7315;">
          <div class="card-header " style="border-color: #ff7315;">
            <ul class="nav nav-tabs card-header-tabs">
              <li class="nav-item">
                <a href="#profile" class="nav-link active font-weight-bold" 
                data-toggle="tab">Profile</a>
              </li>
              <li class="nav-item">
            
                <a href="#editProfile" class="nav-link  font-weight-bold" 
                data-toggle="tab">Edit Profile</a>
              </li>
              <li class="nav-item font-weight-bold text-white">
                <a href="#changePass" class="nav-link  " 
                data-toggle="tab">Change Password</a>
              </li>
            </ul>
          </div>
           
          <div class="card-body">
            <div class="tab-content">
          
              <!-- profile tab content start -->
              <div style="background-color: white;" class="tab-pane container  active" id="profile">
           
              <div  class="card-deck">
              <div class=" img-thumbnail img-fluid align-self-center">
                          <img src="<?= 'assets/php/'.$x_photo;?>" class="img-thumbnail border-danger  align-self-center 
                          img-fluid" width="408px">
                        </div>
                  <div class="card  ">
                    <div class="card-header  text-white text-center font-weight-bold lead" style="border:1px solid;background-color:#ff7315;"><i class="fas fa-id-card-alt"></i>
                    User ID : <?= $x_id; ?>
                    </div>
                    <div class="card-body">
                    <p class="card-text text-dark p-2 m-1 rounded " style="border:1px solid
                      #ff7315;"><b>Name : </b><?= $_fname; ?></p>

                      <p class="card-text text-dark p-2 m-1 rounded " style="border:1px solid
                      #ff7315;"><b>E-Mail : </b><?= $x_email; ?></p>

                  

                      <?php if($x_phone  == null): ?>
                      <p class="card-text text-dark p-2 pl-2 m-1 rounded " style="border:1px solid
                    #ff7315;"><b> Contact : <span class="text-danger">Empty</span> </b>
                       <?php else: ?>
                        <p class="card-text text-dark p-2 m-1 rounded" style="border:1px solid
                        #ff7315;"><b>Contact : </b><?= $x_phone;?></p>

                      <?php endif; ?>   

                      <?php if($x_gender  == null): ?>
                      <p class="card-text text-dark p-2 pl-2 m-1 rounded " style="border:1px solid
                    #ff7315;"><b> Gender : <span class="text-danger">Empty</span> </b>
                       <?php else: ?>
                        <p class="card-text text-dark p-2 m-1 rounded" style="border:1px solid;border-color:#ff7315;">
                        <b>Gender : </b><?= $x_gender;?> </p>
                        <?php endif; ?>  

                        <?php if($x_age  == null): ?>
                      <p class="card-text text-dark p-2 pl-2 m-1 rounded " style="border:1px solid
                    #ff7315;"><b> Age : <span class="text-danger">Empty</span> </b>
                       <?php else: ?>
                        <p class="card-text text-dark p-2 m-1 rounded" style="border:1px solid;border-color:#ff7315;">
                        <b>Age : </b><?= $x_age;?> </p>
                        <?php endif; ?>  
                 
                     

                    <p class="card-text text-dark p-2 m-1 rounded " style="border:1px solid
                    #ff7315;"><b>Registered On : </b><?= $_reg_on; ?></p>
                     <div id="verifyEmailAlert"></div>  
                    <p class="card-text text-dark p-2 m-1 rounded " style="border:1px solid
                    #ff7315;"><b>E-Mail  : </b><span class="text-primary font-weight-bold"><?= $x_verified; ?></span>
                      <?php if($x_verified == 'Not Verified!'): ?>
                      <a href="#" id="verify_email" class="m-2 font-weight-bold text-success">Verify 
                      Now</a>
                      <?php endif; ?>    
                    </p>

                  </div>  
                </div>
         
              </div>
              </div>
             
                         <!-- change password tab content start -->
              <div style="background-color: white;" class="tab-pane container" id="changePass">
                <div id="changepassAlert"></div>
                <div class="card-deck">
                <div class=" img-thumbnail img-fluid align-self-center align-self-center">
                          <img src="assets/img/2.jpg" class="img-thumbnail border-danger img-thumbnail  align-self-center align-self-center
                          img-fluid" width="408px">
                        </div>
                  <div class="card " style="border-color: #ff7315;">
                  <div class="card-header  text-white text-center font-weight-bold " style="background-color:#ff7315">
                    Change Password
                  </div>
                  <form action="#" method="post" class="px-3 mt-2" 
                  id="change-pass-form">
                    <div class="form-group">
                    <label for="cnewpass">Enter new Password</label>
                      <input type="password" name="curpass" placeholder="Current Password" class="form-control form-control-lg" id="curpass"
                      require minleght="8" autocomplete="off">
                    </div>
                         
                    <div class="form-group">
                      
                      <input type="password" autocomplete="off" name="newpass" placeholder="New Password" class="form-control form-control-lg" id="newpass"
                      require minleght="8">
                    </div>

                    <div class="form-group">
                      
                      <input type="password" autocomplete="off" name="cnewpass" placeholder="Confirm Password" class="form-control form-control-lg" id="cnewpass"
                      require minleght="8">
                    </div>
                    <div class="form-group">
                            <p id="changepassError" class="text-danger"></p>
                          </div>
                    <div class="form-group">
                      <input type="submit" name="changepass" value="Change Password"
                       class="btn  btn-block btn-lg text-white " id="changePassBtn" style="background-color: #ff7315;">

                    </div>

                  </form>
                  </div>
                        
                </div>
              </div>
 
              <!-- change password tab content end -->
                          <style>
                          .img{object-fit: contain}
                          </style>
                <!-- edit profile tab content start -->
              <div style="background-color: white;" class="tab-pane container fade" id="editProfile">
              <div class="card-deck">
                <div class=" border-primary img-thumbnail img-fluid align-self-center align-self-center">
                <?php if(!$x_photo): ?>
                        <img src="assets/img/profile.png" class="img-thumbnail img-fluid align-self-center"
                        width="408px">
                      <?php else: ?>
                        <img src="<?= 'assets/php/'.$x_photo;?>" class= "border-primary img-thumbnail img-fluid" width="408px">
                      <?php endif; ?>
                </div>
                  <div class="card " style="border-color: #ff7315;">  
                    <form action="" method="post" id="update_profile" class="px-3 mt-2" enctype="multipart/form-data">
                       <input type="hidden" name="oldimage" value="<?= $x_photo; ?>"> 
                       <div  class="form-group m-0">
                          <label for="profilePhoto" class="mt-2 btn text-white  btn-block font-weight-bold " style="background-color: #ff7315;">
                          <i class="fas fa-upload"></i>&nbsp;Upload Profile Image</label><b>
                          <input style='height: 0px;width:0px; overflow:hidden;' type="file"  name="image" class="mt-4 " 
                           id="profilePhoto">
                   
                          <!-- <a href="#" id="deleteUserPic" class="mt-0 btn btn-danger  btn-block font-weight-bold">
                          <i class="fas fa-user-times"></i>&nbsp;Delete Profile Picture</a> -->
                       </div>

                       <div class="form-group m-1">
                          <label for="name" class="m-1">User Name</label>
                          <input type="text" name="user_name" id="user_name" placeholder="User Name" class="form-control"
                          value="<?= $x_user_names; ?>">
                          <input type="hidden" name="id" value="<?= $x_id; ?>">
                       </div>

                       <div class="form-group m-1">
                          <label for="name" class="m-1">Name</label>
                          <input type="text" name="name" id="name" placeholder="Name" class="form-control"
                          value="<?= $x_name; ?>">
                       </div>

                       <div class="form-group m-1">
                          <label for="name" class="m-1">E-mail</label>
                          <input type="text" name="email" id="email"  class="form-control"
                          value="<?= $x_email; ?>">
                       </div>

                       <div class="form-group m-1">
                          <label for="name" class="m-1">Age</label>
                          <input type="text" name="age" id="age"  class="form-control"
                          value="<?= $x_age; ?>">
                       </div>


                       <div class="form-group m-2">
                          <label for="gender" class="m-1">Gender</label>
                          <select name="gender" id="gender" class="form-control">
                            <option value="" disabled <?php if($x_gender== null){echo
                            'selected';} ?>>Gender</option>
                            <option value="Male" <?php if($x_gender== 'Male'){echo
                            'selected';} ?> >Male</option>
                            <option value="Female" <?php if($x_gender== 'Female'){echo
                            'selected';} ?> >Female</option>
                          </select>
                       </div>

                       <div class="form-group m-2">
                          <label for="phone" class="m-1">Phone</label>
                          <input type="tel" id="phone" oninput="javascript: if (this.value.length > this.maxLength)
                           this.value = this.value.slice(0, this.maxLength);"
                           type = "number"maxlength = "10" placeholder="Phone" name="phone" value="<?= $x_phone; ?>" 
                          class="form-control">
                       </div>

            
                       

                              </div>

                       <div class="form-group mt-4">
                          <input type="submit" name="" value="Update Profile" class="btn text-white  btn-block font-weight-bold" id="profileUpdateBtn" style="background-color:#ff7315">
                       </div>
                    </form>
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

  
// check  notification 
checkNotification();
      function checkNotification(){
        $.ajax({
          url:'assets/php/customer_process.php',
          method:'post',
          data:{action:'checkNotification'},
          success:function(response){
          $("#checkNotification").html(response);
          }
        });
      }
// profile update ajax request
$("#update_profile").submit(function(e){
    e.preventDefault();

    $.ajax({
      url:'assets/php/process_customer.php',
      method:'post',
      processData:false,
      contentType:false,
      cache:false,
      data: new FormData(this),
      success:function(response){
        console.log(response);
        Swal.fire({
				 icon: 'success',
				 type:'success',
				 title: 'Profile updated successfully',
                //  timer:3000,
				 closeOnConfirm: false
				 })
       location.reload();
      }



    });
});

$('#scroll').click(function(){ 
         
    }); 
  // change Password Ajax Request
  $("#changePassBtn").click(function(e){
  if($("#change-pass-form")[0].checkValidity()){
    e.preventDefault();
    $("#changePassBtn").val('Please Wait...');
    if($("#newpass").val() != $("#cnewpass").val()){
      $("#changepassError").text('* Password did not match!');
      $("#changePassBtn").val('Change Password');
    }
    else{
      $.ajax({
        url:'assets/php/process_customer.php',
        method:'post',
        data: $("#change-pass-form").serialize()+'&action=change_pass',
        success:function(response){
          // console.log(response);
          $("#changepassAlert").html(response);
          $("#changePassBtn").val('Change Password');
          $("#changepassError").text('');
          $("#change-pass-form")[0].reset();
          alert('Password Change !!')
        }
      });
    }
  }
});

 // Remove notification
 $("#deleteUserPic").click(function(e){
      e.preventDefault();
      profilePic_id =$(this).attr('id');

      $.ajax({
        url:'assets/php/customer_process.php',
        method:'post',
        data:{profilePic_id: profilePic_id},
        success:function(response){
       
        }
      })

    })
// verify email ajax request

$("#verify_email").click(function(e){
  e.preventDefault();
  $(this).text('Please Wait...');

  $.ajax({
    url:'assets/php/process_customer.php',
    method:'post',
    data: {action:'verify_email'},
    success:function(response){
      $("#verifyEmailAlert").html(response);
      $("#verify_email").text('Verify Now');
    }
  })
})

});

</script>

<script src="assets/js/javaScript.js"></script>
</body>
</html>