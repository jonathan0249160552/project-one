
<!DOCTYPE html>
<?php 
require_once 'assets/php/admin-header.php';
require_once 'assets/php/conn.php';
require_once 'links.php';
?>
<html lang="en">
	<head>
	
		<meta charset = "utf-8" />
	
	</head>

<body>

	
	<div class="row">
   <div class="col-lg-12">
     <div class="card  border border-dark m-2">
       <div class="card-header  text-dark">
	   <div class="border-dark"><h4 class="float-right font-weight-bold navbar-brand border text-danger border-danger  rounded  p-1" id="popup"> || Add</h4></div>
         <h5 class=" header "> Courses for <?=$cprogram?></h5>
		 
       </div>
       <div class="card-body ">

         <!-- table start  -->
         <div class="table table-responsive" id="show_course" >
       
			
         </div> 
         </div>
		 </div>
   
   </div>
 
 </div>  
 
   </div>
 
     </div>
   
   </div>
 
 </div>  


  

 	<div class="col-md-4 " style="position: absolute;">

	</div>
</div>
</div> 
	

	

	

<div class="modal bg-dark  fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="">
	  <h5 class="m-2 text-center border border-rounded m-2 p-2  font-weight-bold text-primary " id="title-pop">Please Fill the Form to Upload a course</h5> 

        
      </div>
      <div class="modal-body">
	  <div class=" " >
		

<form action="#" method="POST" id="upload_courses_form"  >


			
<label for="Course_name" class="font-weight-bold text-primary" style="font-size: large;">Course Name</label>
				<input type="text" name="Course_name" placeholder="enter course name" class="form-control-lg form-control mb-4 text-center rounded-0" required>
        <label for="credit_hours" class="font-weight-bold text-primary" style="font-size: large;">Course Code</label>
				  <input type="text" name="course_code" placeholder="enter course code " class="form-control-lg mb-4 form-control text-center rounded-0" required>
          <label for="credit_hours" class="font-weight-bold text-primary" style="font-size: large;">Choose Semester</label>
                  <select style="width: 100%;" class="mb-2 form-control rounded-0 "  name="semester" id="semester"required>
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
          <input type="text" style="display: none;" name="program"value="<?=$cprogram?>" class="form-control-lg mb-4 text-center form-control rounded-0" required>
				  <input type="number" style="display: none;" name="level" value="<?=$clevel?>" placeholder="Enter Level" class="form-control-lg form-control mb-4 text-center rounded-0" required>
          <input type="submit" name="save_courses" id="saveCoursesBtn" value="Upload Course" class="btn  btn-info  font-weight-bold  ">
			</form>

			
		</div>

      </div>
      <div class="modal-footer">
     
      <a type="button" class="btn btn-primary text-white font-weight-bold" data-dismiss="modal">Close</a>
     
      </div>
    </div>
  </div>
</div> 


<?php include 'script.php'?>



<script type="text/javascript">
$(document).ready(function(){
  $("#saveCoursesBtn").click(function(e){
      if($("#upload_courses_form")[0].checkValidity()){
        e.preventDefault();

        $(this).val('Please Wait...');
        $.ajax({
          url:'assets/php/action.php',
          method:'post',
          data:$("#upload_courses_form").serialize()+'&action=courses_upload',
          success:function(response){
       
           $("#upload_courses_form")[0].reset();
           $("#saveCoursesBtn").val('Upload Course');
           Swal.fire({
             title:'Course Uploaded Successfully!',
             type:'success',
             timer:3000
           });
            window.setTimeout(function(){ 
                 location.reload();
                } ,3000)
          }
        });
      }

    });
  });

  
	displayAllcourse();
    //display all past question from database
    function displayAllcourse(){
        $.ajax({
           url:'assets/php/process.php',
           method:'post',
            data:{action:'display_course'},
            success:function(response){
                $("#show_course").html(response);
               
            
            }
     });
    }
  


 // delete past question from database of a user ajax request
 $("body").on("click",".deleteBtn",function(e){
            e.preventDefault();
            del_id_course= $(this).attr('id');
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
                data:{del_id_course: del_id_course},
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