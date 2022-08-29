<?php
require_once 'assets/php/header.php';
require 'links.php';
// require 'user-admin/assets/php/post_config.php'; 
// require_once 'user-admin/assets/php/conn.php';

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News</title>

 
<!-- <link rel="stylesheet" type="text/css" href="assets/css/main.css"> -->
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
      <!-- style css -->
      <!-- <link rel="stylesheet" href="assets/css/styles.css"> -->
      <!-- <link rel="stylesheet" href="assets/css/Post_styles.css"> -->
      <!-- Responsive-->
      <!-- <link rel="stylesheet" href="css/responsive.css"> -->
      <!-- fevicon -->
      <!-- <link rel="icon" href="images/fevicon.png" type="image/gif" /> -->
      <!-- Scrollbar Custom CSS -->
      <!-- <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css"> -->
      <!-- Tweaks for older IEs-->
      <!-- <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css"> -->
      <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen"> -->
<style>
  /* #table{ font-size: 20px;} */
  /* #table{font-size: 30px;} */
  
</style>
<style>
  .table  {
    /* font-family: Verdana, Geneva, Tahoma, sans-serif; */
    font-size: 50px;

    
}


.dataTables_wrapper { 
     /* font-family: Verdana, Geneva, Tahoma, sans-serif;  */
    font-size: 20px; 
    /* direction: rtl; */
    /* position: relative; */
    /* clear: both; */
    /* *zoom: 1; */
    /* zoom: 1; */
 } 
 .tbody{font-size: 50px;} 
</style>
  
 
</head>
<body class="bg-dark">

<div><h4 class="text-center m-2 p-2 card-header text-dark">Past Questions for <?=$cprogram?></h4></div>

   
 <div class="row">
   <div class="col-lg-12">
     <div class="card  border-success m-2">
       <div class="card-header bg-success text-white">
         <h4 class="m-0"></h4>
       </div>
       <div class="card-body ">
         <!-- table start  -->
         <div class="table-responsive" id="fetchAllPastQuestion">
         <!-- <table id="table" class="table table-bordered">
					
				  </table> -->
			
         </div> 
         </div>
     </div>
   
   </div>
 
 </div>  
 
   </div>
 
   <div><h4 class="text-center card-header p-2 text-dark">Course Materials for <?=$cprogram?></h4></div>
   
      
 <div class="row">
   <div class="col-lg-12">
     <div class="card  border-warning m-2">
       <div class="card-header bg-warning text-white">
         <h4 class="m-0"></h4>
       </div>
       <div class="card-body ">
       <div class="table-responsive" id="fetchAllCoureMaterail">
         <!-- <table id="table" class="table table-bordered">
					
				  </table> -->
			
         </div> 
         </div>
     </div>
   
   </div>
 
 </div>  
 <!-- table end -->
   </div>

   <div><h4 class="text-center card-header p-2 m-2  text-dark">All Courses under <?=$cprogram?></h4></div>
 
      
 <div class="row">
   <div class="col-lg-12">
     <div class="card  border-darnger m-2">
       <div class="card-header bg-danger text-white">
         <h4 class="m-0"></h4>
       </div>
       <div class="card-body "> 
         <!-- table start  -->
       
         <div class="table-responsive" id="fetchAllCourse">
         
				</table>
			
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
 
 </div>  
 <!-- start ends  -->
   </div>

<div class="">
  <!-- btttom navigation start  -->
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
    /* box-shadow: 0 2px 4px 0 rgba(0,0,0,.2); */
    /* shadow: 2px 2px 5px red; */
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
    font-size: 19.6px;
    color: black;
}
/* @media only screen and (max-width: 480px) {
  img {
    width: 100%;
  }
} */ 

    </style>
        </style>
        <nav class="nav mb-2">
        <a href="home.php" class="nav__link ">
        <!-- <i class="material-icons nav__icon"></i> -->
        <i class="nav__text"><i class="fas fa-bars fa-3x"></i></i>
        <!-- <span class="nav__text">Dashboard</span> -->
      </a>
      <a href="post.php" class="nav__link  nav__link--active ">
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
    <!-- buttom navigation ends  -->
    </div> 
   
<style> 
/* style for strcoll button  */
        #scroll {
    position:fixed;
    right:27px;
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

<script type="text/javascript">
    $(document).ready(function(){ 
      $("table").DataTable();
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


    

    displayQ();
      function displayQ(){
        $.ajax({
          url:'assets/php/process.php',
          method:'post',
          data:{action:'fetchAllPastQuestion'},
          success:function(response){
                $("#fetchAllPastQuestion").html(response);
                $("table").DataTable({
                // order:[0,'desc']
                });
            }
        });
      }

      displayCM();
      function displayCM(){
        $.ajax({
          url:'assets/php/process.php',
          method:'post',
          data:{action:'fetchAllCoureMaterail'},
          success:function(response){
                $("#fetchAllCoureMaterail").html(response);
                $("table").DataTable();
            }
        });
      }


      displayCourse();
      function displayCourse(){
        $.ajax({
          url:'assets/php/process.php',
          method:'post',
          data:{action:'fetchAllCourse'},
          success:function(response){
                $("#fetchAllCourse").html(response);
                $("table").DataTable();
            }
        });
      }

});





</script>

<a href="#" id="scroll" style="display: none;"><span></span></a>


<script>
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