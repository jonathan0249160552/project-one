<?php
require_once 'assets/php/admin-header.php';
?>
<div class="row">
<div class="col-lg-12">
<div class="card my-2 border-info">


<div class="card-header bg-info text-center text-white lead">
        <h4 class="m-0">Total General Comments Posted</h4>
    </div>
    <div class="card-body">
        <div class="table table-responsive" id="showAllGeneralComment">
            <p class="text-center align-self-center lead">Please Wait...</p>
        </div>
    </div>
</div>
<!-- general comment detail modal  -->
<div class="modal fade " id="CommentGenDetailsModal">
    <div class="modal-dialog modal-xl card-header modal-dialog-centered " >
        <div class="modal-content">
            <div class="modal-header m-1 p-1 align-self-center">
            <p id="getName"></p>
               <button type="button" class="close" data-dismis="modal"></button> 
            </div>
            <div class="modal-body">
            <div class="card-deck">
            <p id="getImage"></p>
                <div class="card border-primary">
                    <div class="card-body">
                    <p id="getTitle"></p>
                    <p id="getComment"></p>
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
</div>
</div>
</div>
</div>

<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript">
    $(document).ready(function(){
   
        // fetch all general comment ajax request
 
         fetchAllGeneralComment();
        function fetchAllGeneralComment(){
            $.ajax({
                url:'assets/php/action.php',
                method:'post',
                data:{action:'fetchAllGeneralComments'},
                success:function(response){
                   $("#showAllGeneralComment").html(response);
                   $("table").DataTable({
                  
                 });

                 
                   
                }
            });
        }

        //display user in detail ajax request
        $("body").on("click",".CommentGenDetailsIcon", function(e){
            e.preventDefault();
            general_comment_detail = $(this).attr('id');
            $.ajax({
                url:'assets/php/action.php',
                type:'post',
                data: {general_comment_detail: general_comment_detail},
                success:function(response){
                    data = JSON.parse(response);
          
                 $("#getTitle").text(' Title : '+data.title);
                 $("#getComment").text('Comment : '+data.comments);
                 $("#getCreated_at").text('Posted at : '+data.created_at);
                 $("#getProgram").text('Program : '+data.program);
                 $("#getLevel").text('Level : '+data.level);
               
              
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
            });
            
        });
</script>


</body>
</html>
