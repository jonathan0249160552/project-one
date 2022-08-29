<?php
require_once 'assets/php/admin-header.php';
?>
<div class="row">
<div class="col-lg-12">
<div class="card my-2 border-danger">
<div class="card-header bg-danger text-center text-white lead">
        <h4 class="m-0">Total Deleted Users</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive" id="showAllDeletedUsers">
            <p class="text-center align-self-center lead">Please Wait...</p>
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
                url:'assets/php/action.php',
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
                url:'assets/php/action.php',
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
                url:'assets/php/action.php',
                method:'post',
                data:{res_id: res_id},
                success:function(response){
                    Swal.fire(
                        'Deleted',
                        'User restored successfully',
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
</body>
</html>