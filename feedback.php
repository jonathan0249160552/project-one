<?php 
require_once 'assets/php/header.php';
require 'links.php';
?>
<!-- send feedback to admin start -->
<div class="container mt-5">
  <div class="row justify-content-center mt-5">
    <div class="col-lg-8 mt-5 ">
      <?php if($verified =='Verified'): ?>
        <div class="card border-primary">
          <div class="card-header lead text-center bg-primary text-white">
            Send Feed to Admin!</div>
            <div class="card-body">
              <form action="#"method="post" class="px-4" id="feedback-form">
                <div class="form-group">
                  <input type="text" name="subject" placeholder="Write Your Subject" 
                  class="form-control-lg form-control rounded-0" >
                  <input style="display: none;" type="text" id="level" name="level" value="<?=$clevel?>"> 
                  <input style="display: none;" type="text" name="program" id="program" value="<?=$cprogram?>">
                </div>
                  <div class="form-group">
                    <textarea name="feedback"  class="form-control-lg form-control 
                    rounded-0" placeholder="Write Your Feedback Here..." rows="8" required></textarea>
                  </div>
                    <div class="form-group">
                      <input type="submit" name="feedbackBtn" id="feedbackBtn"
                      value="Send Feedback" class="btn btn-primary btn-block btn-lg rounded-0">
                    </div>
              </form>
            </div>
        </div>
      <?php else: ?>
      <h1 class="text-center text-white mt-3">Verify 
      Your E-Mail to Send Feedback to Admin</h1>
      <?php endif; ?>
    </div>
  </div>
</div>
<style>
  .background{
  position: absolute;
  top: 0;
  left: 0;
  height: 500px;
  width: 100%;
  background: linear-gradient(45deg, #65c4db, #050757);
  clip-path: polygon(0 0, 100% 0, 100% 100%, 0 80%);
  z-index: -1000;
}
</style>
<div class="background"></div>
<!-- send feedback to admin start end  -->
<div class="">
  <!--  buttom navigation start -->
        <style>
            body {
    margin: 0 0 55px 0;
}

.nav {
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
}

.nav__link:hover {
    background-color: #eeeeee;
}



.nav__icon {
    font-size: 19.5px;
    color: black;
}


    </style>
        </style>
    <nav class="nav">
    <a href="home.php" class="nav__link ">
        <!-- <i class="material-icons nav__icon"></i> -->
        <i class="nav__text"><i class="fas fa-bars fa-3x"></i></i>
        <!-- <span class="nav__text">Dashboard</span> -->
      </a>
      <a href="post.php" class="nav__link  ">
        <i class="material-icons nav__icon"><i class="fas fa-book fa-2x"></i></i>
   
        <!-- <span class="nav__text">Academia</span> -->
      </a>
      <a href="gpa.php" class="nav__link">
        <i class="material-icons nav__icon"><i class="fas fa-graduation-cap fa-2x"></i></i>
        
        <!-- <span class="nav__text">Academia</span> -->
      </a>
      <a href="blog.php" class="nav__link">
        <i class="material-icons nav__icon"><i class="far fa-calendar-check fa-2x"></i></i>
        <!-- <span class="nav__text">Notice board</span> -->
      
    </nav>
    <!-- buttom navigation stop -->
    </div> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script type="text/javascript">
// feedback ajax Request
  $(document).ready(function(){
    $("#feedbackBtn").click(function(e){
      if($("#feedback-form")[0].checkValidity()){
        e.preventDefault();

        $(this).val('Please Wait...');
        $.ajax({
          url:'assets/php/process.php',
          method:'post',
          data:$("#feedback-form").serialize()+'&action=feedback',
          success:function(response){
      //  console.log(response);
           $("#feedback-form")[0].reset();
           $("#feedbackBtn").val('Send Feedback');
           Swal.fire({
             title:'Feedback Successfully sent to the Admin!',
             type:'success'
           });
          }
        });
      }

    });
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
  </body>
  </html>
