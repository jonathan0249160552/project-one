<?php
require_once 'assets/php/admin-header.php';
require 'assets/php/post_config.php'; 

?>
<div class="row">
<div class="col-lg-12">
<div class="card m-2 border-dark">
<div class="card-header bg-dark text-center text-white lead">
        <h4 class="m-0">Total Deleted Notice </h4>
    </div>
    <div class="card-body">
        <div class="table-responsive" id="showAllUsers">
            <!-- <p class="text-center align-self-center lead">Please Wait...</p> -->

   
  
</div>
<div>
     
  <div class="modal fade " id="NoticeboardDetailsModal">
    <div class="modal-dialog modal-xl card-header modal-dialog-centered " >
        <div class="modal-content">
            <div class="modal-header m-1 p-1 align-self-center">
               <h4 class="modal-title" id="getType"></h4>
               <button type="button" class="close" data-dismis="modal"></button> 
            </div>
            <div class="modal-body">
            <div class="card-deck">
            <div class="card align-self-center" id="getImage"></div>
                <div class="card border-primary">
                    <div class="card-body">
                    <p id="getTitle"></p>
                    <p id="getBody"></p>
                   
                    <p id="getPosted_by"></p>

                    <p id="getCreated_at"></p>
                 
                    <p id="getProgram"></p>
                    <p id="getLevel"></p>
                    </div>
                </div>
         
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
  </div>   </div>
    </div>
</div>
</div>
</div>
</div>

<!-- foot area -->
</div>
</div>
</div>
<!-- <style>
    table{
  margin: 0 auto;
  width: 100%;
  clear: both;
  border-collapse: collapse;
  table-layout: fixed; 
  word-wrap:break-word; 
}
</style> -->

<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript">
    $(document).ready(function(){
        fetchAllDeletedPosted();
        function fetchAllDeletedPosted(){
            $.ajax({
                url:'assets/php/action.php',
                method:'post',
                data:{action:'fetchAllDeletedPost'},
                success:function(response){
                   $("#showAllUsers").html(response);
                   $("table").DataTable({
                     order:[0,'desc']
                 });
                   
                }
            });
        }


    // restore  a deleted notice ajax request
    $("body").on("click",".restoreNoticeIcon",function(e){
            e.preventDefault();
            res_id_notice = $(this).attr('id');
            Swal.fire({
                title:'Are you sure you want to restore this notice ?',
                type:'warning',
                showCancelButton:true,
                confirmButtonColor:'#3085d6',
                cancelButtonColor:'#d33',
                timer:3000,
                confirmButtonText:'Yes, restore user'
            }).then((result)=> {
             if (result.value) {
                 $.ajax({
                url:'assets/php/action.php',
                method:'post',
                data:{res_id_notice: res_id_notice},
                success:function(response){
                    Swal.fire(
                        'Restore',
                        'Notice restored successfully',
                        'success'
                )
                window.setTimeout(function(){ 
                 location.reload();
                } ,3000)
                fetchAllDeletedUsers();
                }
                  });
               
            }
            });
        });


        
        //display noticeboard in detail ajax request
        $("body").on("click",".NoticeboardDelDetailsIcon", function(e){
            e.preventDefault();
            Noticeboard_del_details_id = $(this).attr('id');
            $.ajax({
                url:'assets/php/action.php',
                type:'post',
                data: {Noticeboard_del_details_id: Noticeboard_del_details_id},
                success:function(response){
                    data = JSON.parse(response);
                    // $("#getImage").text(''+data.image);
                 $("#getType").text(''+data.type);
                 
               
                 $("#getTitle").text('Title : '+data.title);
                 $("#getBody").text('Message : '+data.body);
                 $("#getPosted_by").text('Posted By : '+data.posted_by);
                 $("#getCreated_at").text('Posted On : '+data.created_at);
                 $("#getCreated_at").text('Posted On : '+data.created_at);
                 $("#getProgram").text('Program : '+data.program);
                 $("#getLevel").text('Program : '+data.level);
                 $("#getImage").text(' : '+data.photo);
               
                 if(data.photo == ''){
                    $("#getImage").html('<img src="assets/img/va2.PNG" class=" img-fluid align-self-center" >');
			}
			else{
                $("#getImage").html('<img src="assets/php/imagesuploadedf/'+data.photo+'" class=" img-fluid align-self-center">');

			}
                 if(data.title == ''){
                     
                     $("#getTitle").html('Title : <span class="text-danger font-weight-bold">Empty</span>');
                 }
                 else{
                    $("#getTitle").text('Title : '+data.title+'');
                 }

                 if(data.type == ''){
                     
                     $("#getType").html('<span class="text-danger font-weight-bold">Empty</span>');
                 }
                 else{
                    $("#getType").text(''+data.type+'');
                 }


                 if(data.body == ''){
                     
                     $("#getBody").html('Message : <span class="text-danger font-weight-bold">Empty</span>');
                 }
                 else{
                    $("#getBody").text('Message : '+data.body+'');
                 }

                 if(data.posted_by == ''){
                     
                     $("#getPosted_by").html('Posted By : <span class="text-danger font-weight-bold">Empty</span>');
                 }
                 else{
                    $("#getPosted_by").text('Posted By : '+data.posted_by+'');
                 }
                 if(data.program == ''){
                     
                     $("#getProgram").html('Program : <span class="text-danger font-weight-bold">Empty</span>');
                 }
                 else{
                    $("#getProgram").text('Program : '+data.program+'');
                 }

                 if(data.level == ''){
                     
                     $("#getLevel").html('Level : <span class="text-danger font-weight-bold">Empty</span>');
                 }
                 else{
                    $("#getLevel").text('Level : '+data.level+'');
                 }

                }
                
                
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

     
         });

        });


</script>


</body>
</html>
