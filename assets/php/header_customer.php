<?php
require_once 'session_customer.php';
require_once 'conn.php';
// require 'links_s.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css"/>
    <!-- <link rel="stylesheet" href="assets/css/bootstrap.min.css"> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"></script> -->
</head>
<body onload="">
    
  <nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand border p-2 rounded  "  href="logout.php">C R Y S T A L</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link text-white <?= (basename($_SERVER['PHP_SELF']) == "home.php")?
       "active":""; ?>" href="store.php"><span class="fa fa-home" aria-hidden="true"></span>&nbsp;Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white "  href="customer_profile.php"><span class="fa fa-user-circle" aria-hidden="true"></span>&nbsp;Profile</a>

      </li>
      
      <li class="nav-item">
        <a class="nav-link text-white  <?= (basename($_SERVER['PHP_SELF']) == "notification.php")?
       "active":""; ?>" href="notification_customer.php"><span class="fa fa-bell" aria-hidden="true"></span>&nbsp;Notification&nbsp;<span id="checkNotification"></span></a>
      </li>
      


    

      <li class= "nav-item dropdown">
      <a href= "#" class = "nav-link dropdown-toggle text-white" id="navbardrop"
      data-toggle= "dropdown"><span class="fa fa-shopping-cart" aria-hidden="true"></span>&nbsp;services</a><div class="dropdown-menu ml-2">

      <a href="campus_services.php" class="dropdown-item  ">Carpenter</span>&nbsp;</a>

      <a href="store.php" class="dropdown-item  ">Electrician</span>&nbsp;</a>

      <a href="" class="dropdown-item  ">Tailer</span>&nbsp;</a>

      <a href="store.php" class="dropdown-item  ">Tiler</span>
      <a href="store.php" class="dropdown-item  ">Mason</span>
      <a href="store.php" class="dropdown-item  ">Hair Dresser</span>
      <a href="store.php" class="dropdown-item  ">Barber</span>
      <a href="store.php" class="dropdown-item  ">Mechanic</span>&nbsp;</a>
      <a href="store.php" class="dropdown-item  ">Interior Designer</span>&nbsp;</a>
      <a href="store.php" class="dropdown-item  ">Cobbler</span>&nbsp;</a>
      <a href="store.php" class="dropdown-item  ">Plumber</span>&nbsp;</a>
      </div>
      </li>

      
      <li class= "nav-item dropdown">
      <a href= "#" class = "nav-link dropdown-toggle text-white" id="navbardrop"data-toggle= "dropdown"><i class = "fas fa-user-cog "></i>&nbsp;Hi! <?= $_fname;?></a>
      <div class="dropdown-menu ml-2">
      <a href="help.php" class="dropdown-item"><span class="fa fa-question-circle" aria-hidden="true"></span>&nbsp;&nbsp;Help </a>
      <a href="assets/php/logout_customer.php" class="dropdown-item"><i class="fas fa-sign-out "></i></span>
      &nbsp;Logout</a>
      </div>
      
      </li>
    </ul>
    
  </div>

</nav>
            
     
        </div>
        </div>
        
    </div>
</div>
</div>
        </div>
    </div>
    <style>
        /* Style the buttons that are used to open and close the accordion panel */
.accordion {
  background-color: #ff7315;
  color: white;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  text-align: left;
  border: none;
  outline: none;
  transition: 0.4s;
}

/* Add a background color to the button if it is clicked on (add the .active class with JS), and when you move the mouse over it (hover) */
.active, .accordion:hover {
    background-color: #ff7315;
}

/* Style the accordion panel. Note: hidden by default */
.panel {
  /* padding: 0 18px; */
  /* background-color: white; */
  display: none;
  overflow: hidden;
}
    </style>


<!-- <script src="assets/js/javaScript.js"></script> -->

<script>
  function notifyMe() {
    if (!window.Notification) {
        console.log('Browser does not support notifications.');
    } else {
        // check if permission is already granted
        if (Notification.permission === 'granted') {
            // show notification here
            var notify = new Notification('Hi <?=$_fname?>!', {
                body: 'You have a notification',
                icon: 'https://bit.ly/2DYqRrh',
            });
        } else {
            // request permission from user
            Notification.requestPermission().then(function (p) {
                if (p === 'granted') {
                    // show notification here
                    var notify = new Notification('Hi <?=$_fname?> !', {
                        body: 'Please allow KEEN to show you notification',
                        icon: 'https://bit.ly/2DYqRrh',
                    });
                } else {
                    // show notification here
                    var notify = new Notification('', {
                        body: 'Notification access denied',
                        icon: 'https://bit.ly/2DYqRrh',
                    });
                }
            }).catch(function (err) {
                console.error(err);
            });
        }
    }
}
</script>
</body>
</html>
