<?php
require_once 'assets/php/admin-header.php';
?>
<div class="row">
<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-8 mt-3">
     
        <div class="card border-primary">
          <div class="card-header lead text-center bg-primary text-white">
            Send Feed to Admin!</div>
            <div class="card-body">
              <form action="#"method="post" class="px-4" id="feedback-form">
                
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
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#feedbackBtn").click(function(e){
      if($("#feedback-form")[0].checkValidity()){
        e.preventDefault();

        $(this).val('Please Wait...');
        $.ajax({
          url:'assets/php/action.php',
          method:'post',
          data:$("#feedback-form").serialize()+'&action=feedback',
          success:function(response){
            console.log(response)
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
</script>
  </body>
  </html>
