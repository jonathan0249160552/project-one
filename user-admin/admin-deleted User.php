<?php
require_once 'assets/php/admin-header.php';
?>
<div class="row">
<div class="col-lg-12">
<div class="card my-2 border-danger">
<div class="card-header bg-danger text-center text-white lead">
        <h4 class="m-0 font-weight-bold">Total Deleted Users</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive" id="showAllDeletedUsers">
            <p class="text-center align-self-center lead">Please Wait...</p>
        </div>
    </div>
</div>

<div class="modal fade" id="showUserDeletedDetailsModal">
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
                    <p id="getIndex_number_del"></p>
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

<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
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
    $(document).ready(function(){
        // $("showAllUsers").DataTable();
        //fetchallusers
        fetchAllDeletedUsers();
        function fetchAllDeletedUsers(){
            $.ajax({
                url:'assets/php/process.php',
                method:'post',
                data:{action:'fetchAllDeletedUsers'},
                success:function(response){
                   $("#showAllDeletedUsers").html(response);
                   $("table").DataTable({
                     order:[0,'desc']
                 });
                   
                }
            });
        }
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

        


    // restore  a deleted user ajax request
    $("body").on("click",".restoreUserIcon",function(e){
            e.preventDefault();
            res_id = $(this).attr('id');
            Swal.fire({
                title:'Are you sure you want to restore this user ?',
                type:'warning',
                showCancelButton:true,
                confirmButtonColor:'#3085d6',
                cancelButtonColor:'#d33',
                timer:3000,
                confirmButtonText:'Yes, restore user'
            }).then((result)=> {
             if (result.value) {
                 $.ajax({
                url:'assets/php/process.php',
                method:'post',
                data:{res_id: res_id},
                success:function(response){
                    Swal.fire(
                        'Deleted',
                        'User Restored Successfully',
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

        
        </script>
     
</div>
<script type="text/javascript">
    $(document).ready(function(){
  
        //display user in detail ajax request
        $("body").on("click",".userDetailsDelIcon", function(e){
            e.preventDefault();
            del_user_details_id = $(this).attr('id');
            $.ajax({
                url:'assets/php/process.php',
                type:'post',
                data: {del_user_details_id: del_user_details_id},
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



</script>

</body>
</html>