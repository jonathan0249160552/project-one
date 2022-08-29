<?php
require_once 'assets/php/admin-header.php';
require 'assets/php/post_config.php'; 
require_once 'assets/php/conn.php';
?>
<div class="row">
<div class="col-lg-12">
<div class="card m-2 border-info">
<div class="card-header bg-info text-center text-white lead">
        <h4 class="m-0">Total Posts on Notice Board </h4>
    </div>
    <div class="card-body">
        <div class="table-responsive" id="showAllUsers">
            <!-- <p class="text-center align-self-center lead">Please Wait...</p> -->

           
        </div>
    </div>
</div>
</div>
</div>
</div>


<!-- Start edit notice modal  -->
<div class="modal fade text-white" id="editNoticeModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h4 class="modal-title text-white">Edit notice</h4>
                <button type="button" class="close text-danger" data-dismiss="modal">&times;
                </button>
         </div>
         <div  class="modal-body">
         <form action="#" method="post" id="edit-notice-form" class="px-3">
         <input type="hidden" name="id" id="id" >
         <div class="form-group">
                  <input type="text" name="title" id="title" placeholder="Title  " 
                  class="form-control-lg form-control rounded-0" required>
                </div>
                <div class="form-group">
                <input type="text" name="posted_by" id="posted_by" placeholder="Posted By" 
                  class="form-control-lg form-control rounded-0" required>
                </div>
                <div class="form-group">
                <input type="text" name="type" id="type" placeholder="Type" 
                  class="form-control-lg form-control mt-3 rounded-0" >
                  
                  <select name="program" id="program" class="form-control custom-select" placeholder="Choose a Program" tabindex="1">
                                                        <!-- <option>Select Program</option> -->
                                                 <?php $ssql ="select * from program_table";
													$res=mysqli_query($conn, $ssql); 
													while($row=mysqli_fetch_array($res))  
													{
                                                       echo'
                                                        <option value="'.$row['program'].'">'.$row['program'].'</option>';;
													}  
                                                 
													?> 
													 </select>
                                                     <select style="width: 100%;" placeholder="level" class="mt-2 form-control rounded-0 " name="level" id="level" required>
                    <option value="100">100</option>
                    <option value="200">200</option>
                    <option value="300">300</option>
                    <option value="400">400</option>
                  </select>
                </div>

<!--                 
              <div  class="form-group ">
                          <label for="profilePhoto" class="mt-2  btn btn-success btn-block font-weight-bold ">
                          <i class="fas fa-upload"></i>&nbsp;Change Only Image</label><b>
                          <input style='height: 0px;width:0px; overflow:hidden;' type="file"  
                          name="image" class="mt-4 " 
                           id="profilePhoto">
                           </div> -->
                
               

       
                          <a href="#"  class="mt-0 btn btn-primary  btn-block 
                          font-weight-bold">Content of the body</a>
                     

                  <div class="form-group">
                    <textarea type="text" name="body" id="body"  class="form-control-lg form-control 
                    rounded-0" placeholder="Message" rows="6" ></textarea>
                  </div>
         <div class="form-group">
         <input type="submit" name="updatenotice" id="updatenoticeBtn" value="Update notice" class="btn-block lead btn-info  btn-lg">
         </div>
          </form>




          <!-- <form action="#" method="POST" id="change_image_form">
              
              
              <div  class="form-group ">
                          <label for="profilePhoto" class="mt-2  btn btn-success btn-block font-weight-bold ">
                          <i class="fas fa-upload"></i>&nbsp;Change Only Image</label><b>
                          <input style='height: 0px;width:0px; overflow:hidden;' type="file"  
                          name="image" class="mt-4 " 
                           id="profilePhoto">
                           </div>
              
              <div class="form-group">
              <input type="submit" name="updateNotice_image" id="updateImage_ImageBtn" value="Update Iamge" class="btn-block lead btn-info  btn-lg">
              </div>
              </form> -->
            </div>

            
        </div>
    </div>
  
</div>
<div>


<!-- display Noticeboard in Details modal  -->

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
  </div>
<!-- foot area -->
</div>
</div>
</div>

<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript">
    $(document).ready(function(){
        fetchAllPosted();
        function fetchAllPosted(){
            $.ajax({
                url:'assets/php/action.php',
                method:'post',
                data:{action:'fetchAllPost'},
                success:function(response){
                   $("#showAllUsers").html(response);
                   $("table").DataTable({
                     order:[0,'desc']
                 });
                   
                }
            });
        }


 //edit notice of a user ajax request
 $("body").on("click",".editNoticeBtn",function(e){
            e.preventDefault();
            edit_notice_id = $(this).attr('id');
        $.ajax({
            url:'assets/php/action.php',
            method:'post',
            data:{edit_notice_id:edit_notice_id},
            success:function(response){
            data= JSON.parse(response);
            $("#id").val(data.id);
            $("#title").val(data.title);
            $("#type").val(data.type);
            $("#body").val(data.body);
            $("#image").val(data.image);
            $("#posted_by").val(data.posted_by);
            $("#program").val(data.program);
            $("#level").val(data.level);
            // $("#created_at").val(data.created_at);
            }
        });

        });

        // update notice of a user ajax request
        $("#updatenoticeBtn").click(function(e){
        if($("#edit-notice-form")[0].checkValidity()){
            e.preventDefault();

            $.ajax({
                url:'assets/php/action.php',
                method:'post',
                data:$("#edit-notice-form").serialize()+"&action=update_notice",
                success:function(response){
                    console.log(response);
                    Swal.fire({
				 icon: 'success',
				 type:'success',
				 title: 'Notice updated successfully',
                 timer:3000,
				 closeOnConfirm: false
				 });
                 window.setTimeout(function(){ 
                //  location.reload();
                } ,3000)
                    $("#edit-notice-form")[0].reset();
                    $("#editnoticeModal").modal('hide');
                    displayAllnotices();
                }
            });
        }
        });


      // delete  a notice ajax request
      $("body").on("click",".deleteUserIconPost",function(e){
            e.preventDefault();
            deleteUserIconPost = $(this).attr('id');
            Swal.fire({
                title:'Are you sure?',
                text: "You won't be able to revert this! ",
                type:'warning',
                showCancelButton:true,
                confirmButtonColor:'#3085d6',
                cancelButtonColor:'#d33',
                timer:3000,
                confirmButtonText:'Yes, delete it'
            }).then((result)=> {
             if (result.value) {
                 $.ajax({
                url:'assets/php/action.php',
                method:'post',
                data:{deleteUserIconPost: deleteUserIconPost},
                success:function(response){
                    Swal.fire(
                        'Deleted',
                        'Notice deleted successfully',
                        'success'
                )
                window.setTimeout(function(){ 
                 location.reload();
                } ,3000)
                fetchAllPosted();
                }
                  });
               
            }
            })
        });


        // delete post of a user ajax request
        $("body").on("click",".deleteBtn",function(e){
            e.preventDefault();
            del_id = $(this).attr('id');
            Swal.fire({
                title:'Are you sure?',
                text: "You won't be able to revert this! ",
                type:'warning',
                showCancelButton:true,
                confirmButtonColor:'#3085d6',
                cancelButtonColor:'#d33',
                confirmButtonText:'Yes, delete it'
            }).then((result)=> {
             if (result.value) {
                 $.ajax({
                url:'assets/php/process.php',
                method:'post',
                data:{del_id: del_id},
                success:function(response){
                    Swal.fire(
                        'Deleted',
                        'notice deleted successfully',
                        'success'
                )
                displayAllnotices();
                }
                  });
               
            }
            })
        });


        //display noticeboard in detail ajax request
        $("body").on("click",".NoticeboardDetailsIcon", function(e){
            e.preventDefault();
            Noticeboard_details_id = $(this).attr('id');
            $.ajax({
                url:'assets/php/action.php',
                type:'post',
                data: {Noticeboard_details_id: Noticeboard_details_id},
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
                 if(data.image == ''){
                    $("#getImage").html('<img src="assets/img/va2.PNG" class=" img-fluid align-self-center" >');
			}
			else{
                $("#getImage").html('<img src="assets/php/imagesuploadedf/'+data.image+'" class=" img-fluid align-self-center">');

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
