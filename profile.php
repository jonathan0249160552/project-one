<?php 
require_once 'assets/php/header.php';
require_once 'links.php'
?>

  <div id="nav" class="nav">
        <style>
            body {
    margin: 0 0 55px 0;
    
}

#nav {
    position: fixed;
    bottom: 0;
    width: 100%;
    height: 55px;
    box-shadow: 0 0 3px rgba(0, 0, 0, 0.2);
    background-color: white;
    display: flex;
    overflow-x: auto;
}

.nav__link {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    flex-grow: 1;
    min-width: 50px;
    overflow: hidden;
    white-space: nowrap;
    font-family: sans-serif;
    font-size: 13px;
    color: #444444;
    text-decoration: none;
    -webkit-tap-highlight-color: transparent;
    transition: background-color 0.1s ease-in-out;
    box-shadow: 0 2px 4px 0 rgba(0,0,0,.2);
    text-shadow: 0 2px 4px 0 rgba(0,0,0,.2)
    
}

.nav__link:hover {
    background-color: #eeeeee;
}


.nav__icon {
  
    color: black;
}


    </style>
  
  <style>
      div.searchable {
    width: 100%;
  
}

.searchable input {
    width: 100%;
    height: 50px;
    font-size: 18px;
    padding: 10px;
    -webkit-box-sizing: border-box; /* Safari/Chrome, other WebKit */
    -moz-box-sizing: border-box; /* Firefox, other Gecko */
    box-sizing: border-box; /* Opera/IE 8+ */
    display: block;
    font-weight: 400;
    line-height: 1.6;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    background: url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 4 5'%3E%3Cpath fill='%23343a40' d='M2 0L0 2h4zm0 5L0 3h4z'/%3E%3C/svg%3E") no-repeat right .75rem center/8px 10px;
}

.searchable ul {
    display: none;
    list-style-type: none;
    background-color: #fff;
    border-radius: 0 0 5px 5px;
    border: 1px solid #add8e6;
    border-top: none;
    max-height: 180px;
    margin: 0;
    overflow-y: scroll;
    overflow-x: hidden;
    padding: 0;
}

.searchable ul li {
    padding: 7px 9px;
    border-bottom: 1px solid #e1e1e1;
    cursor: pointer;
    color: #6e6e6e;
}

.searchable ul li.selected {
    background-color: #e8e8e8;
    color: #333;
}
    </style>
  
    <nav id="nav" class="nav">
    <a href="home.php" class="nav__link nav">
        <i class="material-icons nav__icon"></i>
        <span class="nav__text"><i class="fas fa-bars fa-3x"></i></span>
        
      </a>
      <a href="post.php" class="nav__link ">
        <i class="material-icons nav__icon"></i>
        <span class="nav__text"><i class="fas fa-book fa-3x"></i></span>
      </a>
      <a href="gpa.php" class="nav__link">
      <i class="material-icons nav__icon"></i>
      <span class="nav__text"><i class="fas fa-graduation-cap fa-3x"></i></span>

      <a href="blog.php" class="nav__link">
        <i class="material-icons nav__icon"></i>
        <span class="nav__text"><i class="far fa-calendar-check fa-3x"></i></span>
      </a>
      
   
    </nav>
    </div> 
    
      
   
    <div class="" >
    <div class="row justify-content-center " >
      <div class="col-lg-10">
        <div class="card rounded-0 mt-3 border-primary">
          <div class="card-header border-primary">
            <ul class="nav nav-tabs card-header-tabs">
              <li class="nav-item">
                <a href="#profile" class="nav-link active font-weight-bold" 
                data-toggle="tab">Profile</a>
              </li>
              <li class="nav-item">
            
                <a href="#editProfile" class="nav-link  font-weight-bold" 
                data-toggle="tab">Edit Profile</a>
              </li>
              <li class="nav-item">
                <a href="#changePass" class="nav-link  font-weight-bold" 
                data-toggle="tab">Change Password</a>
              </li>
            </ul>
          </div>
           
          <div class="card-body">
            <div class="tab-content">
          
              <!-- profile tab content start -->
              <div class="tab-pane container  active" id="profile">
              <div id="verifyEmailAlert"></div>  
              <div class="card-deck">
                 <div class="card card-content img-thumbnail border-primary img-thumbnail  align-self-center align-self-center
                          img-fluid">
                 <?php if(!$cphoto): ?>
                        <img src="assets/img/profile.png" class="img-thumbnail img-fluid"
                        width="408px">
                      <?php else: ?>
                        <img src="<?= 'assets/php/'.$cphoto;?>" class="img-thumbnail img-fluid align-self-center">
                      <?php endif; ?>
                 </div>
                  <div class="card  border-primary">
                    <div class="card-header bg-primary text-white text-center font-weight-bold lead"><i class="fas fa-id-card-alt"></i>
                    User ID : <?= $cid; ?>
                    </div>
                    <div class="card-body">
                    <p class="card-text text-dark p-2 m-1 rounded " style="border:1px solid
                      #0275d8;"><b>Name : </b><?= $cname; ?></p>

                      <p class="card-text text-dark p-2 m-1 rounded " style="border:1px solid
                      #0275d8;"><b>Index Number : </b><?= $cindex_number; ?></p>

                    <p class="card-text text-dark p-2 m-1 rounded " style="border:1px solid
                    #0275d8;"><b>E-Mail : </b><?= $cemail; ?></p>

                      <?php if($cprogram  == null): ?>
                      <p class="card-text text-dark p-2 pl-2 m-1 rounded " style="border:1px solid
                    #0275d8;"><b> Program : <span class="text-danger">Empty</span> </b>
                       <?php else: ?>
                        <p class="card-text text-dark p-2 m-1 rounded" style="border:1px solid
                        #0275d8;"><b>Program : </b><?= $cprogram;?></p>

                      <?php endif; ?>   

                      <?php if($clevel  == null): ?>
                      <p class="card-text text-dark p-2 pl-2 m-1 rounded " style="border:1px solid
                    #0275d8;"><b> Level : <span class="text-danger">Empty</span> </b>
                       <?php else: ?>
                        <p class="card-text text-dark p-2 m-1 rounded" style="border:1px solid #0275d8">
                        <b>Level : </b><?= $clevel;?> </p>
                        <?php endif; ?>  

                      <?php if($cgender  == null): ?>
                      <p class="card-text text-dark p-2 pl-2 m-1 rounded " style="border:1px solid
                    #0275d8;"><b> Gender : <span class="text-danger">Empty</span> </b>
                       <?php else: ?>
                        <p class="card-text text-dark p-2 m-1 rounded " style="border:1px solid
                    #0275d8;"><b>Gender : </b><?=$cgender; ?></p>

                      <?php endif; ?>

                    <?php if($cdob  == null): ?>
                      <p class="card-text text-dark p-2 pl-2 m-1 rounded " style="border:1px solid
                    #0275d8;"><b> Date of Birth : <span class="text-danger">Empty</span> </b>
                       <?php else: ?>
                        <p class="card-text text-dark p-2 m-1 rounded " style="border:1px solid
                    #0275d8;"><b>Date of Birth : </b><?=$cdob; ?></p>

                      <?php endif; ?>
                 
                      <?php if($cphone  == null): ?>
                      <p class="card-text text-dark p-2 pl-2 m-1 rounded " style="border:1px solid
                    #0275d8;"><b> Phone : <span class="text-danger">Empty</span> </b>
                       <?php else: ?>
                        <p class="card-text text-dark p-2 m-1 rounded " style="border:1px solid
                    #0275d8;"><b>Phone : </b><?=$cphone; ?></p>

                      <?php endif; ?>
                  

                    <p class="card-text text-dark p-2 m-1 rounded " style="border:1px solid
                    #0275d8;"><b>Registered On : </b><?= $reg_on; ?></p>

                    <p class="card-text text-dark p-2 m-1 rounded " style="border:1px solid
                    #0275d8;"><b>E-Mail  : </b><span class="text-primary font-weight-bold"><?= $verified; ?></span>
                      <?php if($verified == 'Not Verified!'): ?>
                      <a href="#" id="verify-email" class="m-2 font-weight-bold">Verify 
                      Now</a>
                      <?php endif; ?>    
                    </p>

                  </div>  
                </div>
         
              </div>
              </div>
              <?php if($verified =='Verified'): ?>
                         <!-- change password tab content start -->
              <div class="tab-pane container" id="changePass">
                <div id="changepassAlert"></div>
                <div class="card-deck">
                <div class=" img-thumbnail img-fluid align-self-center align-self-center">
                          <img src="assets/img/2.jpg" class="img-thumbnail border-danger img-thumbnail  align-self-center align-self-center
                          img-fluid" width="408px">
                        </div>
                  <div class="card border-sucess">
                  <div class="card-header bg-success text-white text-center-lead ">
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
                       class="btn btn-success btn-block btn-lg " id="changePassBtn">

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
              <div class="tab-pane container fade" id="editProfile">
              <div class="card-deck">
                <div class=" border-primary img-thumbnail img-fluid align-self-center align-self-center">
                <?php if(!$cphoto): ?>
                        <img src="assets/img/profile.png" class="img-thumbnail img-fluid align-self-center"
                        width="408px">
                      <?php else: ?>
                        <img src="<?= 'assets/php/'.$cphoto;?>" class= "border-primary img-thumbnail img-fluid" width="408px">
                      <?php endif; ?>
                </div>
                  <div class="card border-primary">  
                    <form action="" method="post" class="px-3 mt-2" enctype="multipart/form-data" 
                    id="profile-update-form">
                       <input type="hidden" name="oldimage" value="<?= $cphoto; ?>"> 
                       <div  class="form-group m-0">
                          <label for="profilePhoto" class="mt-2 btn btn-primary btn-block font-weight-bold ">
                          <i class="fas fa-upload"></i>Upload Profile Image</label><b>
                          <input style='height: 0px;width:0px; overflow:hidden;' type="file"  name="image" class="mt-4 " 
                           id="profilePhoto">
                   
                          <!-- <a href="#" id="deleteUserPic" class="mt-0 btn btn-danger  btn-block font-weight-bold">
                          <i class="fas fa-user-times"></i>&nbsp;Delete Profile Picture</a> -->
                       </div>

                       <div class="form-group m-1">
                          <label for="name" class="m-1"></label>
                          <input type="text" name="name" id="name" placeholder="Name" class="form-control"
                          value="<?= $cname; ?>">
                       </div>

                       <div class="form-group m-2">
                          <label for="gender" class="m-1"></label>
                          <select name="gender" id="gender" class="form-control">
                            <option value="" disabled <?php if($cgender== null){echo
                            'selected';} ?>>Gender</option>
                            <option value="Male" <?php if($cgender== 'Male'){echo
                            'selected';} ?> >Male</option>
                            <option value="Female" <?php if($cgender== 'Female'){echo
                            'selected';} ?> >Female</option>
                          </select>
                       </div>

                       <div class="form-group m-2">
                          <label for="phone" class="m-1"></label>
                          <input type="tel" id="phone" oninput="javascript: if (this.value.length > this.maxLength)
                           this.value = this.value.slice(0, this.maxLength);"
                           type = "number"maxlength = "10" placeholder="Phone" name="phone" value="<?= $cphone; ?>" 
                          class="form-control">
                       </div>

                       <div class="form-group m-2">
                          <label for="dob" class="m-1">Date of Birth</label>
                          <input type="date" id="dob"  name="dob" value="<?= $cdob; ?>" 
                          class="form-control">
                       </div>

                       <div class="form-group m-2">
                         <label for="level" class="m-1">Level</label>
                         <select style="width: 100%;" class="p-2 form-control rounded-0 " name="level" id="level">
                           <option value="100">100</option>
                           <option value="200">200</option>
                           <option value="300">300</option>
                           <option value="400">400</option>
                         </select>
                       </div>

                              <div class="form-group m-2">
                                <label for="program_code">Update Program</label>

       <div class="searchable">
     <input type="text" placeholder="Search Program..."  name="program"  required  id="program"  onkeyup="filterFunction(this,event)">
    <ul>
    <li>Bsc. Civil Engineering   </li>
        <li>Bsc. Biological Science  </li>
        <li>Bsc. Medical Laboratory Science  </li>
        <li>Bsc. Nursing  </li>
        <li>Bsc. Chemical Science  </li>
        <li>Bsc. Statistics  </li>
        <li>Diploma Statistic  </li>
        <li>Bsc. Fire and Disaster Management  </li>
        <li>Bsc. Natural Resources Management  </li>
        <li>Diploma Natural Resource Management  </li>
        <li>Bsc. Hospitality Managemen It</li>
        <li>Diploma Hospitality Management  </li>
        <li>Bsc. Climate Change and Sustanability  </li>
        <li>Bsc. Planning and Sustainability  </li>
        <li>Diploma Geo-Information Science  </li>
        <li>Bsc. Enterpirce Management  </li>
        <li>Bsc. Fisheries and Aquaculture Nrm. Option  </li>
        <li>Bsc. Horticulture Agriculture  </li>
        <li>Bsc. Land Reclamation Restoration Nrm  </li>
        <li>Bsc. Mathematics  </li>
        <li>Bsc Social  Forestry Nrm  </li>
        <li>Bsc. Forest Resource Management Nrm  </li>
        <li>Diploma Fire and Disaster Management  </li>
        <li>Bsc. Petroleum Engineering  </li>
        <li>Bsc. Renewable Engineering  </li>
        <li>Bsc. Computer Science  </li>
        <li>Bsc. Information Techonology  </li>
        <li>Diploma Computer Science  </li> 
        <li>Diploma Information Technology  </li>
        <li>Bsc. Acturial Science  </li>
        <li>Diploma Insurance  </li>
        <li>Professional French  </li>
        <li>Bsc. Resource Enterprice and Entrepreneurship  </li>
        <li>Diploma Enterpirce Management  </li>
        <li>Bsc. Agribusiness  </li>
        <li>Diploma Envaromental Management  </li>
        <li>Bsc. Agriculture with Option in Crop Production Hoticulure  </li>
        <li>Diploma Agriculture  </li>
        <li>Bsc. Computer Engeering  </li>
        <li>Bsc. Electrical and Electronic Engineering  </li>
        <li>Bsc. Agriculture Engineering  </li>
        <li>Bsc. Mechanical Engineering  </li>
        <li>Bsc. Envirometnal Engeering  </li>

        
        
        

    </ul>
</div>
                              </div>

                       <div class="form-group mt-4">
                          <input type="submit" name="profile_update" value="Update Profile" class="btn btn-primary  btn-block font-weight-bold" id="profileUpdateBtn">
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
  <?php else: ?>
      <h3 class="text-center text-muted mt-5">Please Verify  
      Your E-Mail First to Edit Profile and Change Password</h3>
      <?php endif; ?>

<script type="text/javascript">
$(document).ready(function(){
// profile update ajax request
$("#profile-update-form").submit(function(e){
    e.preventDefault();

    $.ajax({
      url:'assets/php/process.php',
      method:'post',
      processData:false,
      contentType:false,
      cache:false,
      data: new FormData(this),
      success:function(response){
        Swal.fire({
				 icon: 'success',
				 type:'success',
				 title: 'Profile updated successfully',
                 timer:3000,
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
        url:'assets/php/process.php',
        method:'post',
        data: $("#change-pass-form").serialize()+'&action=change_pass',
        success:function(response){
          $("#changepassAlert").html(response);
          $("#changePassBtn").val('Change Password');
          $("#changepassError").text('');
          $("#change-pass-form")[0].reset();
          notifyMe();
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
        url:'assets/php/process.php',
        method:'post',
        data:{profilePic_id: profilePic_id},
        success:function(response){
       
        }
      })

    })
// verify email ajax request

$("#verify-email").click(function(e){
  e.preventDefault();
  $(this).text('Please Wait...');

  $.ajax({
    url:'assets/php/process.php',
    method:'post',
    data: {action:'verify_email'},
    success:function(response){
      $("#verifyEmailAlert").html(response);
      $("#verify-email").text('Verify Now');
    }
  })
})

});

// check  notification 
checkNotification();
      function checkNotification(){
        $.ajax({
          url:'assets/php/process.php',
          method:'post',
          data:{action:'checkNotification'},
          success:function(response){
          $("#checkNotification").html(response);
          }
        });
      }
</script>


<script>
     function filterFunction(that, event) {
    let container, input, filter, li, input_val;
    container = $(that).closest(".searchable");
    input_val = container.find("input").val().toUpperCase();

    if (["ArrowDown", "ArrowUp", "Enter"].indexOf(event.key) != -1) {
        keyControl(event, container)
    } else {
        li = container.find("ul li");
        li.each(function (i, obj) {
            if ($(this).text().toUpperCase().indexOf(input_val) > -1) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });

        container.find("ul li").removeClass("selected");
        setTimeout(function () {
            container.find("ul li:visible").first().addClass("selected");
        }, 100)
    }
}

function keyControl(e, container) {
    if (e.key == "ArrowDown") {

        if (container.find("ul li").hasClass("selected")) {
            if (container.find("ul li:visible").index(container.find("ul li.selected")) + 1 < container.find("ul li:visible").length) {
                container.find("ul li.selected").removeClass("selected").nextAll().not('[style*="display: none"]').first().addClass("selected");
            }

        } else {
            container.find("ul li:first-child").addClass("selected");
        }

    } else if (e.key == "ArrowUp") {

        if (container.find("ul li:visible").index(container.find("ul li.selected")) > 0) {
            container.find("ul li.selected").removeClass("selected").prevAll().not('[style*="display: none"]').first().addClass("selected");
        }
    } else if (e.key == "Enter") {
        container.find("input").val(container.find("ul li.selected").text()).blur();
        onSelect(container.find("ul li.selected").text())
    }

    container.find("ul li.selected")[0].scrollIntoView({
        behavior: "smooth",
    });
}

function onSelect(val) {
    // alert(val)
}

$(".searchable input").focus(function () {
    $(this).closest(".searchable").find("ul").show();
    $(this).closest(".searchable").find("ul li").show();
});
$(".searchable input").blur(function () {
    let that = this;
    setTimeout(function () {
        $(that).closest(".searchable").find("ul").hide();
    }, 300);
});

$(document).on('click', '.searchable ul li', function () {
    $(this).closest(".searchable").find("input").val($(this).text()).blur();
    onSelect($(this).text())
});

$(".searchable ul li").hover(function () {
    $(this).closest(".searchable").find("ul li.selected").removeClass("selected");
    $(this).addClass("selected");
});
   </script>

</body>
</html>
