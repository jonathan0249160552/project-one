<?php
require_once 'assets/php/admin-header.php';
?>
<div class="row">
<div class="col-lg-12">
<div class="card my-2 border-info">
<div class="card-header bg-info text-center text-white lead">
        <h4 class="m-0 font-weight-bold">Total Comments Posted</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive" id="showAllUsers">
            <p class="text-center align-self-center lead">Please Wait...</p>
        </div>
    </div>
    
</div>


</div>

<!-- display Noticeboard in Details modal  -->

<div class="modal fade " id="CommentDetailsModal">
    <div class="modal-dialog modal-xl card-header modal-dialog-centered " >
        <div class="modal-content">
            <div class="modal-header m-1 p-1 align-self-center">
               <h4 class="modal-title font-weight-bold" id="getType"></h4>
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
</div>
</div>
</div>
</div>
</div>

<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript">
    $(document).ready(function(){
    // fecth all comment ajax request
        fetchAllUsers();
        function fetchAllUsers(){
            $.ajax({
                url:'assets/php/action.php',
                method:'post',
                data:{action:'fetchAllComments'},
                success:function(response){
                   $("#showAllUsers").html(response);
                   $("table").DataTable({
                     order:[0,'desc']
                 });

                 
                   
                }
            });
        }

        //display user in detail ajax request
        $("body").on("click",".userDetailsIcon_com", function(e){
            e.preventDefault();
            details_id_com = $(this).attr('id');
            $.ajax({
                url:'assets/php/action.php',
                type:'post',
                data: {details_id_com: details_id_com},
                success:function(response){
                    data = JSON.parse(response);
                    
                 $("#getName").text(data.name+''+'( ID: '+data.id+')');
                 $("#getTitle").text(' Title : '+data.title);
                 $("#getComment").text('comment : '+data.comment);
                 $("#getCreated_at").text('Posted at : '+data.created_at);
                
                 if(data.photo != ''){
                     $("#getImage").html('<img src="assets/php/'+data.photo+'" class="img-thumbnail img-fluid align-self-center" width="280px">');
                 }
                 else{
                    $("#getImage").html('<img src="assets/php/uploads/profile.png'+data.photo+'" class="img-thumbnail img-fluid align-self-center" width="280px">');
                 }
                }
            });

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


        //display noticeboard in detail ajax request
        $("body").on("click",".CommentDetailsIcon", function(e){
            e.preventDefault();
            Comment_details_id = $(this).attr('id');
          
            $.ajax({
                url:'assets/php/action.php',
                type:'post',
                data: {Comment_details_id: Comment_details_id},
                success:function(response){
                    // console.log(response);
                    // data = JSON.parse(response)
                    console.log(response);
                }
                
                
            }); 
            });

      // delete  a user ajax request
      $("body").on("click",".deleteUserIcon_com",function(e){
            e.preventDefault();
            del_id_com = $(this).attr('id');
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
                data:{del_id_com: del_id_com},
                success:function(response){
                    Swal.fire(
                        'Deleted',
                        'User deleted successfully',
                        'success'
                )
                window.setTimeout(function(){ 
                 location.reload();
                } ,3000)
                fetchAllUsers();
                }
                  });
               
            }
            })
        });

</script>



</body>
</html>
