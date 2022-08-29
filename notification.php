<?php 
require_once 'assets/php/header.php';
require_once 'links.php';
?>

<div class="container">
<h1 class="font-weight-bold border mt-5 p-3   text-white  mb-4 rounded text-center" style="font-size: 22px;font-weight:bolder">Notifications </h1>
  <div class="row justify-content-center my-2">
    <div class="col-lg-6 mt-4" id="showAllNotification">

    </div>
  </div>
</div>


</div>
<div class="background"></div>
<div class="">
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
        #scroll {
    position:fixed;
    right:10px;
    bottom:20%;
    cursor:pointer;
    width:50px;
    height:50px;
    background-color:#3498db;
    text-indent:-9999px;
    display:none;
    -webkit-border-radius:60px;
    -moz-border-radius:60px;
    border-radius:60px
}
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
    box-shadow: 0 2px 4px 0 rgba(0,0,0,.2);
    text-shadow: 0 2px 4px 0 rgba(0,0,0,.2);
    /* text-shadow: 2px 2px 4px #000000; */
}

.nav__link:hover {
    background-color: #eeeeee;
}

.nav__link--active {
   
  background-color: #eeeeee;
    box-shadow: 0 2px 4px 0 rgba(0,0,0,.2);
    text-shadow: 0 2px 4px 0 rgba(0,0,0,.2);
   /* text-shadow: 2px 2px 4px #000000; */
  
}

.nav__icon {
    font-size: 19.5px;
    color: black;
}


    
        </style>
    <nav class="nav">
    <a href="home.php" class="nav__link  ">
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
    </div>
    <a href="#" id="scroll" style="display: none;"><span></span></a>
<a href="#" id="scroll" style="display: none;"><span></span></a> 
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script> -->
<script type="text/javascript">
    $(document).ready(function(){ 
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
});
</script>
<script type="text/javascript">

$(document).ready(function(){

      //fetch notification of a user
      fetchNotification();
      function fetchNotification(){
        $.ajax({
          url:'assets/php/process.php',
          method:'post',
          data:{action:'fetchNotification'},
          success:function(response){
           $("#showAllNotification").html(response);
          
          }
        });
      }




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

    });
    // Remove notification
    $("body").on("click", ".close", function(e){
      e.preventDefault();
      notification_id =$(this).attr('id');

      $.ajax({
        url:'assets/php/process.php',
        method:'post',
        data:{notification_id: notification_id},
        success:function(response){
          checkNotification();
          fetchNotification();
        }
      })

    })

   
  </script>
  </body>
  </html>
