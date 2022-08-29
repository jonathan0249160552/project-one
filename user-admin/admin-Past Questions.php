
<!DOCTYPE html>
<?php 
require_once 'assets/php/admin-header.php';
require_once 'assets/php/conn.php';
require_once 'links.php';
?>
<html lang="en">
	<head>
	
		<meta charset = "utf-8" />
		<!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
		<!-- <link rel="stylesheet" type="text/css" href="admin/css/bootstrap.css" /> -->
		<link rel="stylesheet" type="text/css" href="admin/css/jquery.dataTables.css" />
		<!-- <link rel="stylesheet" type="text/css" href="admin/css/style.css" /> -->
	</head>

<body>
<!-- <nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
		<div class="container-fluid">
			<label class="navbar-brand">School File Management System</label>
		</div>
	</nav> -->
	
	<div class="row">
   <div class="col-lg-12">
     <div class="card  border border-dark m-2">
       <div class="card-header border alert-light  text-dark">
	   <div class="border-dark"><h4 class="float-right font-weight-bold navbar-brand border border-dark rounded  p-1" id="popup"> || Add</h4></div>
         <h5 class="header float-center  font-weight-bold">Past Questions for <?=$cprogram?></h5>
       </div>
       <div class="card-body ">

         <!-- table start  -->
         <div class="table-responsive" id="showPast_Question" >
         
         </div> 
         </div>
		 </div>
   
   </div>
 
 </div>  
 
   </div>
 
     </div>
   
   </div>
 
 </div>  

 
<div class="modal bg-dark  fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="m-2 text-center header" id="title-pop">Please Fill the Form to Upload a Past Question</h5> 
      </div>
      <div class="modal-body">
	  <div class="" >
		

		<form method="POST" enctype="multipart/form-data" action="save_questions.php">
		
		
					<label for="profilePhoto" class=" btn  btn-block btn-primary  font-weight-bold " >Add  File | eg. PDF,Document,PPT etc </label>
					<button  class="btn-block btn btn-success " name="save_q"><i class="fas fa-upload"></i>&nbsp;<b>Upload File</b></button>
					 <!-- <button  class="btn  btn-info  font-wieght-bold btn-sm"><b>Back</b></button> -->
					<input style='height: 0px;width:px; overflow:hidden;' type="file" size="4"  name="file" class="mt-4 " 
							   id="profilePhoto" required>
						<br />
            <label for="credit_hours" class="font-weight-bold text-primary" style="font-size: large;">Course Name</label>
						<input type="text" name="courseName" placeholder=" enter course name" 
						  class="form-control-lg form-control mb-4 rounded-0" required>
              <label for="credit_hours" class="font-weight-bold text-primary" style="font-size: large;">  Course Code</label>
						  <input type="text" name="CourseCode" placeholder=" enter course code " 
						  class="form-control-lg form-control mb-4 rounded-0" required>

              <input type="text" style="display: none;" name="program" value="<?=$cprogram ?>"  
						  class="form-control-lg form-control mb-4 rounded-0" required>

              <input type="text" style="display: none;" name="level" value="<?=$clevel ?>"  
						  class="form-control-lg form-control mb-4 rounded-0" required>
              <label for="semester" class="font-weight-bold text-primary" style="font-size: large;">Choose Semester</label>
                  <select style="width: 100%;" class="mt-2 mb-4 form-control rounded-0 "  name="semester" id="semester"required>
                    <option value="First">First</option>
                    <option value="Second">Second</option>
                  </select>
                   
        <label for="credit_hours" class="font-weight-bold text-primary" style="font-size: large;">Choose Credit Hours</label>
                  <select style="width: 100%;" class="mt-2 mb-4 form-control rounded-0 "  name="credit_hours" id="credit_hours"required>
                    <option value="2">2</option>
                    <option value="2">3</option>
                    <option value="2">4</option>
                    <option value="2">5</option>
                    <option value="2">6</option>
                  </select>
					</form>
		
					
				</div>

      </div>
      <div class="modal-footer">
     
      <a type="button" class="btn btn-primary text-white font-weight-bold" data-dismiss="modal">Close</a>
     
      </div>
    </div>
  </div>
</div> 

 	<div class="col-md-4 " style="position: absolute;">
		<!-- <div class=" " >
		

<form method="POST" enctype="multipart/form-data" action="save_questions.php">


			<label for="profilePhoto" class="  btn btn-primary  font-weight-bold " >Add File </label>
			<button  class="btn btn-success btn-sm" name="save_q"><i class="fas fa-upload"></i>&nbsp;<b>Upload File</b></button>
			 <button  class="btn  btn-info  font-wieght-bold btn-sm"><b>Back</b></button>
			<input style='height: 0px;width:px; overflow:hidden;' type="file" size="4"  name="file" class="mt-4 " 
					   id="profilePhoto" required>
				<br />
				<input type="text" name="courseName" placeholder="Course Name" 
                  class="form-control-lg form-control mb-4 rounded-0" required>
				  <input type="text" name="CourseCode" placeholder="Course Code " 
                  class="form-control-lg form-control rounded-0" required>
			</form>

			
		</div> -->
	</div>
</div>
</div>
	
	
	<div class="modal fade" id="modal_confirm" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title">System</h3>
				</div>
				<div class="modal-body">
					<center><h4 class="text-danger">Are you sure you want to logout?</h4></center>
				</div>
				<div class="modal-footer">
					<a type="button" class="btn btn-success" data-dismiss="modal">Cancel</a>
					<a href="logout.php" class="btn btn-danger">Logout</a>
				</div>
			</div>
		</div>
	</div>
	 <div class="modal fade" id="modal_remove" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header bg-danger">
					<h3 class="modal-title  text-white">Deletion Alert !!!</h3>
				</div>
				<div class="modal-body">
					<center><h4 class="text-danger">Are you sure you want to remove this file?</h4></center>
				</div>
				<div class="modal-footer">
					<a type="button" class="btn btn-block text-white font-weight-bold btn-success" data-dismiss="modal">No</a>
					<button type="button" class="btn btn-block text-white font-weight-bold btn-danger" id="btn_yes">Yes</button>
				</div>
			</div>
		</div>
	</div> -
	<?php include 'script.php'?>
<script type="text/javascript">
$(document).ready(function(){

	displayAllPastQuestion();
    //display all past question from database
    function displayAllPastQuestion(){
        $.ajax({
           url:'assets/php/process.php',
           method:'post',
            data:{action:'display_past_question'},
            success:function(response){
                $("#showPast_Question").html(response);
                $("table").DataTable({
                order:[0,'desc']
                });
            }
     });
    }
  });


 // delete past question from database of a user ajax request
 $("body").on("click",".deleteBtn",function(e){
            e.preventDefault();
            del_id_past_question = $(this).attr('id');
            Swal.fire({
                title:'Are you sure?',
                text: "You won't be able to revert this! ",
                type:'warning',
                showCancelButton:true,
                confirmButtonColor:'#3085d6',
                cancelButtonColor:'#d33',
                confirmButtonText:'Yes, delete it',
				timer:3000
            }).then((result)=> {
             if (result.value) {
                 $.ajax({
                url:'assets/php/process.php',
                method:'post',
                data:{del_id_past_question: del_id_past_question},
                success:function(response){
                    Swal.fire(
                        'Deleted',
                        'File deleted successfully',
                        'success'
                )
				window.setTimeout(function(){ 
                 location.reload();
                } ,3000)
                }
                  });
               
            }
            })
        });

 // popup image onclick function
 $('#popup').click(function() {
        var src = $(this).attr('src');
        var title = $(this).attr('title');
        $('#popup-img').attr('src',src);
        $('#title-pop').attr('title',title);
        $('#staticBackdrop').modal('show');
		
      });
</script>	

</body>
</html>