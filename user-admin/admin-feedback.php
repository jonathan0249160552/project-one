<?php
require_once 'assets/php/admin-header.php';
require_once 'assets/php/conn.php';
require_once 'links.php';;
?>
<div class="row">
<div class="col-lg-12">
<div class="card my-2 border-warning">
<div class="card-header bg-warning text-center text-white lead">
        <h5 class="m-0 font-weight-bold">Total Feedback From Users <?=$cprogram?></h5>
    </div>
    <div class="card-body">
        <div class="table-responsive" id="showAllFeedbacks">
            <p class="text-center align-self-center lead">Please Wait...</p>
        </div>

        <div class="table-responsive" id="show_feedbacks" >
        
			
        </div>
    </div>
</div>
</div>
</div>

<!-- display feedback in Details modal start  -->

<div class="modal fade" id="feedbackDetailsModal">
    <div class="modal-dialog card-header modal-dialog-centered  " >
        <div class="modal-content">
            <div class="modal-header m-1 p-1 align-self-center">
               <h4 class="modal-title" id="getName"></h4>
               <button type="button" class="close" data-dismis="modal"></button> 
            </div>
            <div class="modal-body">
          
            <div class="card-deck">
         
                <div class="card border-primary">
      
                
                    <div class="card-body">
                    <p id="getEmail"></p>
                    <p id="getIndex_number"></p>
                    <p id="getSubject"></p>
                    <p id="getfeedback"></p>
                    <p id="getVerified"></p>
                    <p id="getSentOn"></p>
                    </div>
                </div>
         
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
  </div>
<!-- display feedback in Details modal end  -->



<!-- reply feedback modal -->
<div class="modal fade" id="showReplyModal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title font-weight-bold">Reply This Feedback From </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
        <form action="#" method="post" class="px-2" id="feedback-reply-form">
            <div class="form-group">
                <textarea name="message"  id="message" cols="50"class="form-control"  rows="10" placeholder="Write your message here..." required></textarea>
            <input type="text" id="program" name="program" value="<?=$cprogram?>" style="display:none">
            <input type="text" id="level" name="level" value="<?=$clevel?>" style="display: none;">
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Send Reply" class="btn btn-primary btn-block" id="feedbackReplyBtn">
            </div>
        </form>
        </div>
    </div>
  </div>  
  <a href="#" id="scroll" style="display: none;"><span></span></a>
</div>


<!-- reply feedback modal end -->

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
<!-- 
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script> -->
<script type="text/javascript">

$(document).ready(function(){

    //fetch all feedback ajax request
    fetchAllFeedback();
        function fetchAllFeedback(){
            $.ajax({
                url:'assets/php/process.php',
                method:'post',
                data:{action:'fetchAllFeedback'},
                success:function(response){
                   $("#showAllFeedbacks").html(response);
                 $("table").DataTable({
                     order:[0,'desc']
                 });
                   
                }
            });
                }
        //get the current selected id
        var uid;
        var fid;
        $("body").on("click",".replyFeedbackIcon",function(e){
            uid = $(this).attr('id');
            fid = $(this).attr('fid');
        //   console.log(uid);
        //   console.log(fid);
    }); 

  //check notification
  checkNofication();
        function checkNofication(){
            $.ajax({
                url:'assets/php/process.php',
                method:'post',
                data:{action: 'checkNotification'},
                success:function(response){
                   $("#checkNotification").html(response)
                }
            });
            }

    //send feedback reply to the user ajax request
    $("#feedbackReplyBtn").click(function(e){
        if($("#feedback-reply-form")[0].checkValidity()){
        let message = $("#message").val();
        let program = $("#program").val();
        let level = $("#level").val();
        e.preventDefault();
        $("#feedbackReplyBtn").val('Please Wait...');
    $.ajax({
            url: 'assets/php/action.php',
            method:'post',
            data: { uid:uid,message: message,fid: fid,program:program,level:level},
           success:function(response){
               console.log(response);
            $("#feedbackReplyBtn").val('Send Reply');
            $("#showReplyModal").modal('hide');
            $("#feedback-reply-form")[0].reset();
            Swal.fire({
				 icon: 'success',
				 type:'success',
				 title: 'Reply sent successfully to user!',
              
				 closeOnConfirm: false
				 });
                 window.setTimeout(function(){ 
                 location.reload();
                } ,3000)
                displayAllFeeds();
           }
        });
    }
});

});

</script>


<?php include 'script.php'?>
<script type="text/javascript">
$(document).ready(function(){
	displayAllFeeds();
    //display all past question from database
    function displayAllFeeds(){
        $.ajax({
           url:'assets/php/process.php',
           method:'post',
            data:{action:'show_feedbacks'},
            success:function(response){
                $("#show_feedbacks").html(response);
                $("table").DataTable({
                // order:[0,'desc']
                });
            }
     });
    }
  });



//display feedback in detail ajax request
$("body").on("click",".feedbackDetailsIcon", function(e){
            e.preventDefault();
            feedbackdetails_id = $(this).attr('id');
            $.ajax({
                url:'assets/php/process.php',
                type:'post',
                data: {feedbackdetails_id: feedbackdetails_id},
                success:function(response){
                    data = JSON.parse(response);

                //   $("#index_number").text('Email : '+data.index_number);
                //     $("#getEmail").text('Email : '+data.email);
                 $("#getSubject").text('Subject : '+data.subject);
                 $("#getfeedback").text('Feedback : '+data.feedback);
                 $("#getSentOn").text('Sent On : '+data.created_at);
                 
              
                 if(data.subject == ''){
                     
                     $("#getSubject").html('Subject : <span class="text-danger font-weight-bold">Empty</span>');
                 }
                 else{
                    $("#getSubject").text('Subject : '+data.subject+'');
                 }

                 if(data.feedback == ''){
                     
                     $("#getfeedback").html('Feedback : <span class="text-danger font-weight-bold">Empty</span>');
                 }
                 else{
                    $("#getfeedback").text('Feedback : '+data.feedback+'');
                 }

                }
                
                
            });

        

    });


</script>	

</body>
</html>