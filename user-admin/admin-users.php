<?php
require_once 'assets/php/admin-header.php';
?>
<div class="row m-1">
<div class="col-lg-12">
<div class="card my-2 border-info">
<div class="card-header bg-info text-center text-white lead">
        <h5 class="m-0 font-weight-bold">Total Regsitered Users of <?=$cprogram?></h5>
    </div>
    <div class="card-body">
        <div class="table-responsive" id="showAllUsers">
            <p class="text-center align-self-center lead">Please Wait...</p>
        </div>
  <div class="modal fade" id="showUserDetailsModal">
    <div class="modal-dialog card-header modal-dialog-centered  " >
        <div class="modal-content">
            <div class="modal-header m-1 p-1 align-self-center">
               <h4 class="modal-title" id="getName"></h4>
               <button type="button" class="close" data-dismis="modal"></button> 
            </div>
            <div class="modal-body">
            <div class="card card-content img-thumbnail border-primary img-thumbnail align-self-center mb-2" id="getImage"></div>
            <div class="card-deck">
         
                <div class="card border-primary">
      
                
                    <div class="card-body">
                    <p id="getEmail"></p>
                    <p id="getIndex_number"></p>
                    <p id="getPhone"></p>
                    <p id="getDob"></p>
                    <p id="getGender"></p>
                    <p id="getCreated"></p>
                    <p id="getVerified"></p>
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
<!-- display User's in Details modal  -->

<!-- foot area -->
</div>
</div>
</div>


<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript">
    $(document).ready(function(){
        // $("showAllUsers").DataTable();
        //fetchallusers
        fetchAllUsers();
        function fetchAllUsers(){
            $.ajax({
                url:'assets/php/process.php',
                method:'post',
                data:{action:'fetchAllUsers'},
                success:function(response){
                   $("#showAllUsers").html(response);
                   $("table").DataTable({
                     order:[0,'desc']
                 });
                   
                }
            });
        }

        //display user in detail ajax request
        $("body").on("click",".userDetailsIcon", function(e){
            e.preventDefault();
            details_id = $(this).attr('id');
            $.ajax({
                url:'assets/php/process.php',
                type:'post',
                data: {details_id: details_id},
                success:function(response){
                    data = JSON.parse(response);
                    console.log(data);
                 $("#getName").text(data.name+''+' (ID:'+data.id+')');
                 $("#getIndex_number").text('Index Number : '+data.index_number);
                 $("#getEmail").text('Email : '+data.email);
                 $("#getPhone").text('Phone : '+data.phone);
                 $("#getGender").text('Gender : '+data.gender);
                 $("#getDob").text('Date of birth : '+data.dob)
                 $("#getCreated").text('Joined On : '+data.created_at);
                 $("#getVerified").text('Email : '+data.verified);
                 
                 if(data.phone == ''){
                     
                     $("#getPhone").html('Phone : <span class="text-danger font-weight-bold">Empty</span>');
                 }
                 else{
                    $("#getPhone").text('Phone : '+data.phone+'');
                 }

                 if(data.gender == ''){
                     
                     $("#getGender").html('Gender : <span class="text-danger font-weight-bold">Empty</span>');
                 }
                 else{
                    $("#getGender").text('Gender : '+data.gender+'');
                 }

                 if(data.dob == ''){
                     
                     $("#getDob").html('Phone : <span class="text-danger font-weight-bold">Empty</span>');
                 }
                 else{
                    $("#getDob").text('Date of birth : '+data.dob+'');
                 }

                 if(data.verified == 0){
                     
                     $("#getVerified").html('Email Verification : <span class="text-danger font-weight-bold">Not Verified</span>');
                 }
                 else if(data.verified = '1'){
                    $("#getVerified").html('Email Verification : <span class="text-success font-weight-bold">Verified</span>');
                 }

                 if(data.photo != ''){
                     $("#getImage").html('<img src="../assets/php/'+data.photo+'" class="img-thumbnail img-fluid align-self-center" width="280px">');
                 }
                 else{
                    $("#getImage").html('<img src="assets/img/profile.PNG'+data.photo+'" class="img-thumbnail img-fluid align-self-center" width="280px">');
                 }
                 
                }
            });

        });

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

      // delete  a user ajax request
      $("body").on("click",".deleteUserIcon",function(e){
            e.preventDefault();
            del_id = $(this).attr('id');
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
                url:'assets/php/process.php',
                method:'post',
                data:{del_id: del_id},
                success:function(response){
                    Swal.fire(
                        'Deleted',
                        'User Deleted Successfully',
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
