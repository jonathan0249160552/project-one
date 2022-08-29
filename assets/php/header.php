<?php
require_once 'assets/php/session.php';
require('check_conn.html');
// require_once('top.html');
// require 'links.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale= 1.0" />
    

    <title><?= ucfirst(basename($_SERVER['PHP_SELF'],'.php'));?>|KEEN</title>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css"/> 
    <!-- Fontawesome CSS CDN -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.23/datatables.min.css"/>

    <!-- <link rel="stylesheet" type="text/css" href="assets/css/sweetalert2.min"/> -->
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   <!-- <link rel="stylesheet" href="assets/css/bootstrap.min.css"> -->
   <style type="text/css">
    @import url("https://fonts.googleapis.com/css?family=Maven+Pro:400,500,600,700,800,900&display=swap");
     *{
         font-family:'Maven Pro',sans-serif;

     } 

     
    </style>
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

  </head>

  <body class="">
  <nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand border p-2 rounded  "  href="index.php">K E E N</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link <?= (basename($_SERVER['PHP_SELF']) == "home.php")?
       "active":""; ?>" href="home.php"><i class="fas fa-home"></i>&nbsp;Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= (basename($_SERVER['PHP_SELF']) == "profile.php")?
       "active":""; ?>" href="profile.php"><i class="fas fa-user-circle"></i>&nbsp;Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= (basename($_SERVER['PHP_SELF']) == "feedback.php")?
       "active":""; ?>" href="feedback.php"><i class="fas fa-comment-dots"></i>&nbsp;Feedback</a>
      </li>
      <li class="nav-item">
        <a class="nav-link  <?= (basename($_SERVER['PHP_SELF']) == "notification.php")?
       "active":""; ?>" href="notification.php"><i class="fas fa-bell"></i>&nbsp;Notification&nbsp;<span id="checkNotification"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link  <?= (basename($_SERVER['PHP_SELF']) == "notification.php")?
       "active":""; ?>" href="gps.php"><i class="fas fa-map-pin"></i>&nbsp;Campus Navigation&nbsp;<span id="checkNotification"></span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link  <?= (basename($_SERVER['PHP_SELF']) == "notification.php")?
       "active":""; ?>" href="hostel.php"><i class="fas fa-hotel"></i>&nbsp;Book a Hostel&nbsp;<span id="checkNotification"></span></a>
      </li>

      <li class= "nav-item dropdown">
      <a href= "#" class = "nav-link dropdown-toggle" id="navbardrop"
      data-toggle= "dropdown">
      <i class = "fas fa-user "></i>&nbsp;Society and Cliques
      </a>
      <div class="dropdown-menu ml-2">
      <a href="#" class="dropdown-item font-weight-bold text-success"><i class="fas fa-sign-in-alt "></i>&nbsp;&nbsp;UENR Religious Society </a>
      <a href="assets/php/logout_k.php" id= "business_s"class=" dropdown-item font-weight-bold text-success"> <i class="fas fa-sign-in-alt"></i>
      &nbsp;UENR Business Society </a>

      <a href="assets/php/logout_k.php" class="dropdown-item font-weight-bold text-success"> <i class="fas fa-sign-in-alt"></i>
      &nbsp;UENR Debators clubs </a>

      <a href="assets/php/logout_k.php" class="dropdown-item font-weight-bold text-success"> <i class="fas fa-sign-in-alt"></i>
      &nbsp;UENR Jama Group </a>

      <a href="assets/php/logout_k.php" class="dropdown-item font-weight-bold text-success"> <i class="fas fa-sign-in-alt"></i>
      &nbsp;UENR Business Society </a>
      </div>
      </li>

      
      <li class= "nav-item dropdown">
      <a href= "#" class = "nav-link dropdown-toggle" id="navbardrop"
      data-toggle= "dropdown">
      <i class = "fas fa-user-cog "></i>&nbsp;Hi! <?= $fname;?>
      </a>
      <div class="dropdown-menu ml-2">
      <a href="help.php" class="dropdown-item"><i class="far fa-question-circle"></i>&nbsp;&nbsp;Help </a>
      <a href="assets/php/logout.php" class="dropdown-item"> <i class="fas fa-sign-out-alt"></i>
      &nbsp;Logout</a>
      
      </li>
    </ul>
    
  </div>

</nav>

<!-- <a href="#" id="scroll" style="display: none;"><span></span></a> -->

<script type="text/javascript">
    $(document).ready(function(){
      $("#business_s").click(function () {
        <?php
// session_start();
// unset($_SESSION['user']);
// header('location:../../index.php');
?>
  });




 


});

</script>
</body>
</html>
