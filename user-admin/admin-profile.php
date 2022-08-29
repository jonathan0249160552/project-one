<?php 
require_once 'assets/php/admin-header.php';
require_once 'links.php'
?>

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
                      #0275d8;"><b>Name : </b><?= $cf_name; " " ?> <?= $cs_name; " " ?></p>

                       <?php if($cindex_number == null): ?>
                      <p class="card-text text-dark p-2 pl-2 m-1 rounded " style="border:1px solid
                    #0275d8;"><b> Index Number : <span class="text-danger">Empty</span> </b>
                       <?php else: ?>
                        <p class="card-text text-dark p-2 m-1 rounded" style="border:1px solid
                        #0275d8;"><b>Index Number : </b><?= $cindex_number;?></p>

                      <?php endif; ?>   
                       <?php if($cemail == null): ?>
                      <p class="card-text text-dark p-2 pl-2 m-1 rounded " style="border:1px solid
                    #0275d8;"><b> Email : <span class="text-danger">Empty</span> </b>
                       <?php else: ?>
                        <p class="card-text text-dark p-2 m-1 rounded" style="border:1px solid
                        #0275d8;"><b>Email : </b><?= $cemail;?></p>

                      <?php endif; ?>   

                      <?php if($cprogram == null): ?>
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
                        <p class="card-text text-dark p-2 m-2 rounded" style="border:1px solid #0275d8">
                        <b>Level : </b><?= $clevel;?> </p>
                        <?php endif; ?>  

                      <?php if($cgender  == null): ?>
                      <p class="card-text text-dark p-2 pl-2 m-1 rounded " style="border:1px solid
                    #0275d8;"><b> Gender : <span class="text-danger">Empty</span> </b>
                       <?php else: ?>
                        <p class="card-text text-dark p-2 m-1 rounded " style="border:1px solid
                    #0275d8;"><b>Gender : </b><?=$cgender; ?></p>

                      <?php endif; ?>

                    <?php if($cage  == null): ?>
                      <p class="card-text text-dark p-2 pl-2 m-1 rounded " style="border:1px solid
                    #0275d8;"><b> Age : <span class="text-danger">Empty</span> </b>
                       <?php else: ?>
                        <p class="card-text text-dark p-2 m-1 rounded " style="border:1px solid
                    #0275d8;"><b>Age : </b><?=$cage; ?></p>


                  
                    

                      <?php endif; ?>
                 
                      <?php if($cphone  == null): ?>
                      <p class="card-text text-dark p-2 pl-2 m-1 rounded " style="border:1px solid
                    #0275d8;"><b> Phone : <span class="text-danger">Empty</span> </b>
                       <?php else: ?>
                        <p class="card-text text-dark p-2 m-1 rounded " style="border:1px solid
                    #0275d8;"><b>Phone : </b><?=$cphone; ?></p>

                      <?php endif; ?>
                  

                    <p class="card-text text-dark p-2 m-1 rounded " style="border:1px solid
                    #0275d8;"><b>Registered On : </b><?= $creg; ?></p>

                      
                    </p>

                  </div>  
                </div>
         
              </div>
              </div>
            
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
                    <div class="float-center m-3 p-3">
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
                  <form action="" method="post" id="update_profile" class="px-3 mt-2" enctype="multipart/form-data">
                       <input type="hidden" name="oldimage" value="<?= $cphoto; ?>"> 
                       <div  class="form-group m-0">
                          <label for="profilePhoto" class="mt-2 btn text-white btn-primary  btn-block font-weight-bold " >
                          <i class="fas fa-upload"></i>&nbsp;Upload Profile Image</label><b>
                          <input style='height: 0px;width:0px; overflow:hidden;' type="file"  name="image" class="mt-4 " 
                           id="profilePhoto">
                   
                       </div>

                       <div class="form-group m-1">
                          <label for="name" class="m-1 font-weight-bold text-primary">User Name</label>
                          <input type="text" name="username" id="username" placeholder="Name" class="form-control"
                          value=" <?= $cusername; " " ?>">
                       </div>

                       <div class="form-group m-1">
                          <label for="name" class="m-1 font-weight-bold text-primary">Surname</label>
                          <input type="text" name="s_name" id="s_name" placeholder="Name" class="form-control"
                          value=" <?= $cs_name; " " ?>">
                       </div>
                       
                       <div class="form-group m-1">
                          <label for="name" class="m-1 font-weight-bold text-primary">First Name</label>
                          <input type="text" name="f_name" id="f_name" placeholder="Name" class="form-control"
                          value="<?= $cf_name; " " ?> ">
                       </div>

                       <div class="form-group m-2">
                          <label for="gender" class="m-1 font-weight-bold text-primary">Gender</label>
                          <select name="gender" id="gender" class="form-control">
                          
                            <option value="Male" >Male</option>
                            <option value="Female"  >Female</option>
                          </select>
                       </div>

                       <div class="form-group m-2">
                          <label for="phone" class="m-1 font-weight-bold text-primary">Phone</label>
                          <input type="tel" id="phone" oninput="javascript: if (this.value.length > this.maxLength)
                           this.value = this.value.slice(0, this.maxLength);"
                           type = "number"maxlength = "10" placeholder="Phone" name="phone"  id="phone" value="<?= $cphone; ?>" 
                          class="form-control">
                       </div>

                       <div class="form-group m-2">
                          <label for="dob" class="m-1 font-weight-bold text-primary">Age</label>
                          <input type="number" id="age"  name="age" value="<?= $cage; ?>" 
                          class="form-control">
                       </div>

                       <div class="form-group m-2">
                          <label for="email" class="m-1 font-weight-bold text-primary">Email</label>
                          <input type="email" id="email"  name="email" value="<?= $cemail; ?>" 
                          class="form-control">
                       </div>



                       <div class="form-group m-2">
                         <label for="level" class="m-1 font-weight-bold text-primary">Level</label>
                         <select style="width: 100%;" class="p-2 form-control rounded-0 " name="level" id="level">
                           <option value="100">100</option>
                           <option value="200">200</option>
                           <option value="300">300</option>
                           <option value="400">400</option>
                         </select>
                       </div>

                              <div class="form-group m-2">
                                <!-- <label for="program">Update Program</label> -->

       <div class="searchable">
     <!-- <input type="text" placeholder="Search Program..."  name="program"    id="program"  onkeyup="filterFunction(this,event)"> -->
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
                          <input type="submit" name="" value="Update Profile" class="btn btn-primary  btn-block font-weight-bold" id="">
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
  
      <!-- <h3 class="text-center text-muted mt-5">Please Verify  
      Your E-Mail First to Edit Profile and Change Password</h3>
       -->

<script type="text/javascript">

$("#update_profile").submit(function(e){
    e.preventDefault();

    $.ajax({
      url:'assets/php/process.php',
      method:'post',
      processData:false,
      contentType:false,
      cache:false,
      data: new FormData(this),
      success:function(response){
        // console.log(response);
        Swal.fire({
				 icon: 'success',
				 type:'success',
				 title: 'Profile updated successfully',
                //  timer:3000,
				 closeOnConfirm: false
				 })
       location.reload();
    }
  })
})


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
