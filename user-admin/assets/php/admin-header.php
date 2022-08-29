<?php
require_once 'assets/php/session.php';
// session_start();
require 'links.php';

require_once 'check_conn.html';
// if(!isset($_SESSION['user'])){
//     header('Location:index.php'); 
//    exit();
 
  
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <title>| Admin Panel  </title>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  
   <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.js"></script>
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.css"/>

   <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.css"/> -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css"/>
    <!-- <link rel="stylesheet" type="text/css" href="assets/css/style.css"> -->
 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/js/bootstrap.bundle.min.js"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twistter-bootstrap/4.5.3/js/bootstrap.min.js"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" defer></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  <style>
  .table.dataTable  {
    /* font-family: Verdana, Geneva, Tahoma, sans-serif; */
    font-size: 20px;

    
}


.dataTables_wrapper {
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    font-size: 20px;
    /* direction: rtl; */
    position: relative;
    clear: both;
    *zoom: 1;
    zoom: 1;
}
</style>
  <style>
    /* The side navigation menu */
.sidenav {
  height: 100%; /* 100% Full-height */
  width: 0; /* 0 width - change this with JavaScript */
  position: fixed; /* Stay in place */
  z-index: 1; /* Stay on top */
  top: 0; /* Stay at the top */
  left: 0;
  background-color: #343a40;
  overflow-x: hidden; /* Disable horizontal scroll */
  padding-top: 35px; /* Place content 60px from the top */
  transition: 0.5s; /* 0.5 second transition effect to slide in the sidenav */
  /* overflow: hidden; */
}/* 0.5 second transition effect to slide in the sidenav */


/* The navigation menu links */
.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 17.5px;
  color: #343a40;
  display: block;
  font-weight: bold;
  overflow: hidden;
  transition: 0.3s;
  margin: 10px;
}


/* When you mouse over the navigation links, change their color */
.sidenav a:hover {
  color: white;
}
.sidenav a:active {
  color: black;
}

/* Position and style the close button (top right corner) */
.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
  color: white;
}

/* Style page content - use this if you want to push the page content to the right when you open the side navigation */
#main {
  transition: margin-left .5s;
  padding: 20px;
}
.admin-link:hover{
     background-color:#212529;
     text-decoration: none;
  }
  .nav-active{
     background-color:black;
     text-decoration: none;
  }
  .admin-link{
     background-color: #343a40;
  }
/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 10px;}
}
html, body {
    max-width: 100%;
    overflow-x: hidden;
}
  </style>
</head>
<body class="bg-light" >

<div id="mySidenav" class="sidenav ">
  <a href="javascript:void(0)" class=" btn  btn-primary m-2 pl-2" onclick="closeNav()">Close</a>
  <h4 class="text-white text-center  m-2 col">Admin Panel</h4>
            <div class="list-group list-group-flush">
            <a href="admin-dashboard.php" class="list-group-item text-white
            admin-link <?=(basename($_SERVER['PHP_SELF'])== 'admin-dashboard.php')?"nav-active":""; ?>"><i class="fas fa-chart-pie"></i>&nbsp;&nbsp;Dashboard</a>

            <a href="admin-users.php" class="list-group-item text-white
            admin-link <?=(basename($_SERVER['PHP_SELF'])== 'admin-users.php')?"nav-active":""; ?>"></i><i class="fas fa-user-friends"></i>&nbsp;&nbsp;Users</a>
         
           
            </div>

            <a href="admin-feedback.php" class="list-group-item text-white
            admin-link <?=(basename($_SERVER['PHP_SELF'])== 'admin-feedback.php')?"nav-active":""; ?>"></i><i class="fas fa-comment"></i>&nbsp;&nbsp;Feedback </a>

            <a href="admin-notification.php" class="list-group-item text-white
            admin-link <?=(basename($_SERVER['PHP_SELF'])== 'admin-notification.php')?"nav-active":""; ?>"></i><i class="fas fa-bell"></i>&nbsp;&nbsp;Notification&nbsp; <span id="checkNotification"></span></a>

            <a href="admin-deleted User.php" class="list-group-item text-white
            admin-link <?=(basename($_SERVER['PHP_SELF'])== 'admin-deleteuser.php')?"nav-active":""; ?>"></i><i class="fas fa-user-slash"></i>&nbsp;&nbsp;Deleted Users</a>
            
            <a href="admin-allposts.php" class="list-group-item text-white
            admin-link"><i class="fa fa-clipboard"></i>&nbsp;&nbsp;Noticeboard </a>

            



            <a href="admin-deleted notice.php" class="list-group-item text-white
            admin-link"><i class="fa fa-calendar-times"></i>&nbsp;&nbsp;Deleted Notice</a>

            <a href="admin-upload.php" class="list-group-item text-white
            admin-link"><i class="fa fa-upload"></i>&nbsp;&nbsp;Upload Notice</a>

            <a href="admin-comment.php" class="list-group-item text-white
            admin-link"><i class="fas fa-comments"></i>&nbsp;&nbsp;All Comments </a>
            <a href="admin-profile.php" class="list-group-item text-white
            admin-link"><i class="fas fa-id-card"></i>&nbsp;&nbsp;Profile</a>

            
            <a href="assets/php/action.php?export=excel" class="list-group-item text-white
            admin-link"><i class="fa fa-table"></i>&nbsp;&nbsp;Export Users</a>

</div>


         
         <div class="row ml-0 mr-0">
           
            <div class=" col-lg-12  bg-dark m-1 pt-2 justify-content-between d-flex">
              
               <a href="#" onclick="openNav()" class="text-white" id="open-nav"><h3><i class="fas fa-bars"></i></h3></a>
               <h4 class="text-white "></h4>
               
               <a href="assets/php/logout.php" class="text-white font-weight-bold mt-1">Welcome<span class="font-weight-bold ml-2 mr-3"><?=$cf_name ?></span><i class="fas fa-sign-out-alt"></i> &nbsp;Logout </a>
            
            </div>
            
     
            </div>

<div>
  
</div>

<div class="row ml-2 mt-2">
  <div class="col">
  <a href="admin-Past Questions.php" class="text-white btn btn-block btn-primary  font-weight-bold "><i class="fas fa-upload"></i>&nbsp; Past Questions</a>  
  <a href="admin-create.php" class="text-white font-weight-bold btn btn-success btn-block " ><i class="fas fa-plus"></i>&nbsp; New Administrator</a>   
           
  </div>

  <div class="col  mr-3 ">
  <a href="admin-Upload Courses.php" class="text-white btn btn-block btn-danger  font-weight-bold "><i class="fas fa-upload"></i>&nbsp; Add New Courses</a>

  <a href="admin-Course Materials.php" class="text-white btn btn-block btn-info font-weight-bold "><i class="fas fa-upload"></i>&nbsp;Course Materials</a>

  </div>
</div>

<hr class="bg-dark " style="height: 5px; border-radius:50%">
<script>
/* Set the width of the side navigation to 250px */
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

/* Set the width of the side navigation to 0 */
function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
</body>
</html>