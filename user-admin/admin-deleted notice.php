<?php
require_once 'assets/php/admin-header.php';
require 'assets/php/post_config.php'; 

?>
<div class="row">
<div class="col-lg-12">
<div class="card m-2 border-dark">
<div class="card-header bg-dark text-center text-white lead">
        <h4 class="m-0 font-weight-bold">Total Deleted Notice </h4>
    </div>
    <div class="card-body">
        <div class="table-responsive" id="showAllUsers">
            <!-- <p class="text-center align-self-center lead">Please Wait...</p> -->

           
<!-- Start edit note modal  -->
<div class="modal fade" id="editNoteModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h4 class="modal-title text-light">Edit Note</h4>
                <button type="button" class="close text-light" data-dismiss="modal">&times;
                </button>
         </div>
         <div  class="modal-body">
         <form action="#" method="post" id="edit-note-form" class="px-3">
         <input type="hidden" name="id" id="id" >
         <div class="form-group">
                  <input type="text" name="title" placeholder="Title  " 
                  class="form-control-lg form-control rounded-0" required>
                </div>
                <div class="form-group">
                <input type="text" name="posted_by" placeholder="Post by" 
                  class="form-control-lg form-control rounded-0" required>
                </div>
                <div class="form-group">
                <input type="text" name="type" placeholder="Type" 
                  class="form-control-lg form-control rounded-0" >
                  
                </div>
                
                
                <div  class="form-group m-0">
                          <label for="profilePhoto" class="mt-2 btn btn-success btn-block font-weight-bold ">
                          <i class="fas fa-upload"></i>&nbsp;Upload Image</label><b>
                          <input style='height: 0px;width:0px; overflow:hidden;' type="file"  
                          name="image" class="mt-4 " 
                           id="profilePhoto">
                         
                          <a href="#"  class="mt-0 btn btn-primary deleteBtn btn-block 
                          font-weight-bold">Content of the body</a>
                       </div>

                  <div class="form-group">
                    <textarea type="text" name="body"  class="form-control-lg form-control 
                    rounded-0" placeholder="Message" rows="6" ></textarea>
                  </div>
         <div class="form-group">
         <input type="submit" name="editNote" id="editNoteBtn" value="Update Note" class="btn btn-info btn-block btn-lg">
         </div>
          </form>
            </div>
        </div>
    </div>
  
</div>
<div>
        </div>
    </div>
</div>
</div>
</div>
</div>
<!-- display deleted notice in Details modal  -->

<div class="modal fade" id="showDeletedNoticeModal">
    <div class="modal-dialog card-header modal-dialog-centered  " >
        <div class="modal-content">
            <div class="modal-header m-1 p-1 align-self-center">
               <h4 class="modal-title" id="getName"></h4>
               <button type="button" class="close" data-dismis="modal"></button> 
            </div>
            <div class="modal-body">
          
            <div class="card-deck">
            <div class="card align-self-center" id="image"></div>
                <div class="card border-primary">
      
                
                    <div class="card-body">
                    <p id="type"></p>
                    <p id="title"></p>
                   
                    <p id="body"></p>
                   
                    <p id="posted_by"></p>

                    <p id="created_at"></p>
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

  
<div class="modal fade" id="showDeletedNoticeModal2">
    <div class="modal-dialog card-header modal-dialog-centered  " >
        <div class="modal-content">
            <div class="modal-header m-1 p-1 align-self-center">
               <h4 class="modal-title" id="getName2"></h4>
               <button type="button" class="close" data-dismis="modal"></button> 
            </div>
            <div class="modal-body">
          
            <div class="card-deck">
            <div class="card align-self-center" id="image2"></div>
                <div class="card border-primary">
      
                
                    <div class="card-body">
                    <p id="type2"></p>
                    <p id="title2"></p>
                   
                    <p id="body2"></p>
                   
                    <p id="posted_by2"></p>

                    <p id="created_at2"></p>
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

      


//display deleted notice in detail ajax request

$("body").on("click",".NoticeDeletedDetailsIcon",function(e){
    e.preventDefault();
    feedDelbackdetails_id = $(this).attr('id');
  
            $.ajax({
                url:'assets/php/process.php',
                type:'post',
                data: {feedDelbackdetails_id: feedDelbackdetails_id},
                success:function(response){
                    
                    data = JSON.parse(response);
               
                    $("#id").html(data.id);
            $("#title").html('Title : '+ data.title);
            $("#type").html('Type : ' +data.type);
            $("#body").html( data.body);
            $("#image").html( data.image);
            $("#posted_by").html('Posted by :'+ data.posted_by);

            if(data.image != ''){
                     $("#image").html('<img src="assets/php/imagesuploadedf/'+ data.image+'" class="img-thumbnail img-fluid align-self-center" width="280px">');
                 }
                 else{
                    $("#image").html('<img src="assets/img/profile.PNG'+data.image+'" class="img-thumbnail img-fluid align-self-center" width="280px">');
                 }
        
        }
                
                
            });

        
        });
   

        
$("body").on("click",".NoticeDeletedDetailsIcon2",function(e){
    e.preventDefault();
    feedDelbackdetails_id = $(this).attr('id');
  
            $.ajax({
                url:'assets/php/process.php',
                type:'post',
                data: {feedDelbackdetails_id: feedDelbackdetails_id},
                success:function(response){
                    
                    data = JSON.parse(response);
               
                    $("#id").html(data.id);
            $("#title2").html('Title : '+ data.title);
            $("#type2").html('Type : ' +data.type);
            $("#body2").html( data.body);
            $("#image2").html( data.image);
            $("#posted_by2").html('Posted by :'+ data.posted_by);

            if(data.image != ''){
                     $("#image2").html('<img src="assets/php/imagesuploadedf/'+ data.image+'" class="img-thumbnail img-fluid align-self-center" width="280px">');
                 }
                 else{
                    $("#image2").html('<img src="assets/img/profile.PNG'+data.image+'" class="img-thumbnail img-fluid align-self-center" width="280px">');
                 }
        
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

     
         });



</script>


</body>
</html>
