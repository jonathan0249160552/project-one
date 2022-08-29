<?php
require_once 'assets/php/admin-header.php';
require_once 'assets/php/auth.php';


$count = new Auth();
?>
<body id="body">
    

<div class="m-2">

<!-- admin dashboard start  -->
<div class="row ">
    <div class="col-lg-12">
    <div class="card-deck mt-3 text-light text-center font-weight-bold">
            <div class="card bg-primary">
                <div class="card-header text-white"> Total Users</div>
            
            <div class="card-body">
            <h1 class="display-4 text-white">
            <?=
            $count->totalcount('user_bsc_actu_sci');
            ?>
            </h1>
            </div>
            </div>

            <div class="card bg-secondary">
                <div class="card-header text-white"> Total Admins</div>
            
            <div class="card-body">
            <h1 class="display-4 text-white">
            <?=
            $count->totalcount('admin_bsc_actu_sci');
            ?>
            </h1>
            </div>
            </div>


            <div class="card bg-success">
                <div class="card-header text-white"> Verified Users</div>
            
            <div class="card-body">
            <h1 class="display-4 text-white">
            <?= $count->verified_users(1); ?>
            </h1>
            </div>
            </div>


            <div class="card bg-warning">
                <div class="card-header text-white"> Unverified Users</div>
            
            <div class="card-body">
            <h1 class="display-4 text-white">
            <?= $count->verified_users(0); ?>
            </h1>
            </div>
            </div>

            <div class="card bg-danger">
                <div class="card-header text-white"> Number of Visits</div>
            
            <div class="card-body">
            <h1 class="display-4 text-white">
            <?php $data = $count->site_hits(); echo $data['hits'];?>
            </h1>
            </div>
            </div>
        </div>
    </div>
</div>

<div class="row">

    <div id="1" class="col-lg-12">
        <div class="card-deck mt-3 text-light text-center font-weight-bold">
            
            
            <div class="card bg-info">
                <div class="card-header text-white">Total Feedback</div>
                    <div class="card-body">
                        <h1 class="display-4 text-white">
                        <?= $count->totalcount('feedback_bsc_actu_sci'); ?>  
                        </h1>
                    
                </div>
            </div>

            <div class="card bg-secondary">
                <div class="card-header text-white">Total Notification</div>
                    <div class="card-body">
                        <h1 class="display-4 text-white">
                        <?= $count->totalcount('notification_bsc_actu_sci'); ?>  
                        </h1>
                    
                </div>
            </div>
        
        </div>
    </div>


</div>


<!-- footer area -->
<div class="row">
    <div class="col-lg-12 justify-content-center">
        <div class="card-deck my-3">
            <div class="card border-success">
              
                    <div class="card-header bg-success text-center text-white lead">
                        Male/Female User's Percentage
                    </div>
                    <div id="piechart" style="width: 500px; height: 500px;"></div>
                
            </div>

            <div class="card border-info">
              
              <div class="card-header bg-info text-center text-white lead">
                  Verified/Unverified User's Percentage
              </div>
              <div id="" style="width: 800px; height: 500px;"></div>
          
      </div>
        </div>
    </div>
    
</div>
<!-- admin dashboard end -->
</div>
<a href="#body" id="scroll" style="display: none;"><span></span></a>
<style>
        #scroll {
    position:fixed;
    right:30px;
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

</div>
</div>
</div>

  
     <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
      //check notification
      checkNofication();
        function checkNofication(){
            $.ajax({
                url:'assets/php/action.php',
                method:'post',
                data:{action: 'checkNotification'},
                success:function(response){
                   $("#checkNotification").html(response)
                }
            });
        }
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Gender','Number'],
            <?php
            $gender = $count->genderPer();
            foreach($gender as $row){
                echo "['".$row['gender']."', ".$row['number']."],";
            }

  ?>
        ]);

        var options = {
         is3D:false
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }

      
    </script>
 

</body>
</html>

