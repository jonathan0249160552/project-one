<?php
session_start();
require 'links.php';

require_once 'check_conn.html';
if(!isset($_SESSION['user'])){
    header('Location:index.php'); 
   exit();
 
  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <?php
$title = basename($_SERVER['PHP_SELF'],'.php');
$title =explode('-',$title);
$title = ucfirst($title[1]);


   ?>
   <title><?= $title; ?> | Main Admin Panel  </title>
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
         
            <a href="admin-registered users.php" class="list-group-item text-white admin-link"><i class="fa fa-user"></i>&nbsp;&nbsp; Admins </a>
           
            <a href="admin-deleted User.php" class="list-group-item text-white
            admin-link <?=(basename($_SERVER['PHP_SELF'])== 'admin-deleteuser.php')?"nav-active":""; ?>"></i><i class="fas fa-user-slash"></i>&nbsp;&nbsp;Deleted Users</a>
          

            <a href="admin-deleted admin user.php" class="list-group-item text-white
            admin-link"><i class="fa fa-user-slash"></i>&nbsp;&nbsp;Deleted Admin </a> 
          </div>

            <a href="admin-feedback.php" class="list-group-item text-white
            admin-link <?=(basename($_SERVER['PHP_SELF'])== 'admin-feedback.php')?"nav-active":""; ?>"></i><i class="fas fa-comment"></i>&nbsp;&nbsp;Feedback </a>

            <a href="admin-notification.php" class="list-group-item text-white
            admin-link <?=(basename($_SERVER['PHP_SELF'])== 'admin-notification.php')?"nav-active":""; ?>"></i><i class="fas fa-bell"></i>&nbsp;&nbsp;Notification&nbsp; <span id="checkNotification"></span></a>

          
           <a href="admin-allposts.php" class="list-group-item text-white
            admin-link"><i class="fa fa-clipboard"></i>&nbsp;&nbsp;Noticeboard </a>

            <a href="admin-deleted notice.php" class="list-group-item text-white
            admin-link"><i class="fa fa-calendar-times"></i>&nbsp;&nbsp;Deleted Notice</a>

            <a href="admin-upload.php" class="list-group-item text-white
            admin-link"><i class="fa fa-upload"></i>&nbsp;&nbsp;Upload Notice</a>

            <a href="admin-comment.php" class="list-group-item text-white
            admin-link"><i class="fas fa-comments"></i>&nbsp;&nbsp;Comments </a>

            <a href="admin-comment general.php" class="list-group-item text-white
            admin-link"><i class="fas fa-comments"></i>&nbsp;&nbsp;General Comments </a>

            <a href="admin-comment general.php" class="list-group-item text-white
            admin-link"><i class="fas fa-comments"></i>&nbsp;&nbsp;Send Message </a>

            <a href="admin-comment general.php" class="list-group-item text-white
            admin-link"><i class="fas fa-shopping-cart"></i>&nbsp;&nbsp; Upload Product</a>

            <a href="admin-comment general.php" class="list-group-item text-white
            admin-link"><i class="fas fa-shopping-cart"></i>&nbsp;&nbsp;Products</a>

            <a href="admin-comment general.php" class="list-group-item text-white
            admin-link"><i class="fas fa-shopping-cart"></i>&nbsp;&nbsp;Deleted Products</a>

            <a href="assets/php/action.php?export=excel" class="list-group-item text-white
            admin-link"><i class="fa fa-table"></i>&nbsp;&nbsp;Export Users</a>

</div>

<div class="col ">
         
         <div class="row ">
           
            <div class=" col-lg-12  bg-dark m-1 pt-2 justify-content-between d-flex">
              
               <a href="#" onclick="openNav()" class="text-white" id="open-nav"><h3><i class="fas fa-bars"></i></h3></a>
               <h4 class="text-white "><?= $title;?></h4>
               
               <a href="assets/php/logout.php" class="text-white  mt-1"><i class="fas fa-sign-out-alt"></i>&nbsp;Logout</a>
            
            </div>
            
<div class="m-2">

 <div class="col-lg-12">
 <div class="row">
  </div>

 <!-- <a href="admin-Course Materials.php" class="text-white btn bnt-block btn-dark font-weight-bold ml-2 mb-2 mt-1 float-right"><i class="fas fa-upload"></i>&nbsp;  Materials</a> -->
</div>        

<div class="col-lg-12">
  

  
</div>
<div class=" m-2">
           

</div>      

            

</div>

</div> 

<!-- admin dashboard start  -->
<div class="row ">
    <div class="col-lg-12">
    <div class="card-deck mt-3 text-white text-center font-weight-bold">
            <div class="card border-success ">
              
                <!-- <div class="card-header"> Total Users</div> -->
                <a href="admin-create.php" class="text-white btn btn-success bnt-block font-weight-bold m-2 "><i class="fas fa-plus"></i>&nbsp;Add new Administrator</a>   
            <div class="card-body">
            <h1 class="display-4">
            </h1>
            </div>
            </div>

            <div class="card border-info ">
                <!-- <div class="card-header"> Verified Users</div> -->
                <a href="admin-Past Questions.php" class="text-white btn bnt-block btn-info font-weight-bold m-2"><i class="fas fa-upload"></i>&nbsp; Past Questions</a>  

            <div class="card-body">
            <h1 class="display-4">
     
            </h1>
            </div>
            </div>


            <div class="card border-danger">
                <!-- <div class="card-header"> Unverified Users</div> -->
                <a href="admin-Upload Courses.php" class="text-white btn btn-danger bnt-block font-weight-bold m-2"><i class="fas fa-upload"></i>&nbsp; Courses</a>
 
            <div class="card-body">
            <h1 class="display-4">
       
            </h1>
            </div>
            </div>

            
            <div class="card border-warning ">
            <a href="admin-Course Materials.php" class="text-white btn bnt-block btn-warning font-weight-bold m-2"><i class="fas fa-upload"></i>&nbsp;Upload Course Materials</a>

           
            </div>

            <div class="card border-info ">
            <a href="admin-program.php" class="text-white btn bnt-block btn-info font-weight-bold m-2"><i class="fas fa-upload"></i>&nbsp;Add New Program</a>

           
            </div>
        </div>
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