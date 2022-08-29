<?php
require_once 'assets/php/admin-header.php';
// include 'top.html'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
<div class="row justify-content-center my-2">
<div class="col-lg-6 mt-4" id="showNotification">

</div>
   
<a href="#" id="scroll" style="display: none;"><span></span></a>
</div>
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
<script>
   
   $(document).ready(function(){
        //fetch notification
        fetchNotification();
        function fetchNotification(){
            $.ajax({
                url:'assets/php/action.php',
                method: 'post',
                data:{action:'fetchNotification'},
                success:function(response){
                    console.log(response);
                   $("#showNotification").html(response);
                }
            });
       
        }
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
        //Remove notification
         // Remove notification
    $("body").on("click", ".close", function(e){
      e.preventDefault();
      notification_id =$(this).attr('id');

      $.ajax({
        url:'assets/php/action.php',
        method:'post',
        data:{notification_id: notification_id},
        success:function(response){
          checkNotification();
          fetchNotification();
        }
      })

    })
    });
    
</script>
 
</body>
</html>

    

