
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
     <div class="card  border-primary m-2">
       <div class="card-header bg-info text-white">
	   <div class="border-dark"><h4 class="float-right font-weight-bold navbar-brand border p-2 rounded  p-1" id="popup"> || Add Past Questions</h4></div>
         <h4 class="ml-4 header font-wieght-bold">All Past Questions </h4>
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
        <h5 class="m-2  header" id="title-pop">Please Fill the Form to Upload a Past Question</h5> 
        
      </div>
      <div class="modal-body">
	  <div class=" " >
		

		<form method="POST" enctype="multipart/form-data" action="save_questions.php">
		
		
					<label for="profilePhoto" class=" btn  btn-block btn-primary  font-weight-bold " >Add  File | eg. PDF,Doc,PPT etc </label>
					<button  class="btn-block btn mt-2 btn-success " name="save_q"><i class="fas fa-upload"></i>&nbsp;<b>Upload File</b></button>
					 <!-- <button  class="btn  btn-info  font-wieght-bold btn-sm"><b>Back</b></button> -->
					<input style='display:none' type="file" size="4"  name="file" class="mt-4 " 
							   id="profilePhoto" required>
						<br />
						<input type="text" name="courseName" placeholder=" enter course name" 
						  class="form-control-lg form-control mb-2 rounded-0" required>

						  <input type="text" name="CourseCode" placeholder=" enter course code " 
						  class="form-control-lg form-control rounded-0 mb-2" required>
              
              <div class="searchable">
    <!-- <input type="text" class="" placeholder="Search Program..." id="program" name="program" readonly onkeyup="filterFunction(this,event)"> -->
                        <select name="program" id="program" class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" required>
                                                        <!-- <option>--Select Restaurant--</option> -->
                                                 <?php $ssql ="select * from program_table";
													$res=mysqli_query($conn, $ssql); 
													while($row=mysqli_fetch_array($res))  
													{
                                                       echo'<option value="'.$row['program'].'">'.$row['program'].'</option>';;
													}  
                                                 
													?> 
													 </select>
  
</div>
               </div>                
                <div class="input-group input-group-lg form-group">
                  <div class="input-group-prepend">
                    <!-- <span class="input-group-text rounded-0"><i class="far fa-id-card fa-lg fa-fw"></i></span> -->
                  </div>
                  <select style="width: 100%;" class="mt-2 form-control rounded-0 " name="level" id="level" required>
                    <option value="100">100</option>
                    <option value="200">200</option>
                    <option value="300">300</option>
                    <option value="400">400</option>
                  </select>
                  <label for="semester" class="font-weight-bold text-primary">Choose Semester</label>
                  <select style="width: 100%;" class="mt-2 form-control rounded-0 "  name="semester" id="semester"required>
                    <option value="First">First</option>
                    <option value="Second">Second</option>
                   
                  </select>
                    <label for="credit_hours" class="font-weight-bold text-primary">Choose Credit Hours</label>
                  <select style="width: 100%;" class="mt-2 form-control rounded-0 " name="credit_hours" id="credit_hours"required>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="6">6</option>
                   
                  </select>
                </div>
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
					<!-- <center><h4 class="text-danger">Are you sure you want to logout?</h4></center> -->
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
					<!-- <center><h4 class="text-danger">Are you sure you want to remove this file?</h4></center> -->
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
           url:'assets/php/action.php',
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
                url:'assets/php/action.php',
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


<script>
     function filterFunction(that, event) {
    let container, input, filter, li, input_val;
    container = $(that).closest(".searchable");
    input_val = container.find("input").val().toUpperCase();

    if (["ArrowDown", "ArrowUp", "Enter"].indexOf(event.key) != -1) {
        keyControl(event, container)
    } else {
        li = container.find("ul li");
        li.each(function (i, obj) {
            if ($(this).text().toUpperCase().indexOf(input_val) > -1) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });

        container.find("ul li").removeClass("selected");
        setTimeout(function () {
            container.find("ul li:visible").first().addClass("selected");
        }, 100)
    }
}

function keyControl(e, container) {
    if (e.key == "ArrowDown") {

        if (container.find("ul li").hasClass("selected")) {
            if (container.find("ul li:visible").index(container.find("ul li.selected")) + 1 < container.find("ul li:visible").length) {
                container.find("ul li.selected").removeClass("selected").nextAll().not('[style*="display: none"]').first().addClass("selected");
            }

        } else {
            container.find("ul li:first-child").addClass("selected");
        }

    } else if (e.key == "ArrowUp") {

        if (container.find("ul li:visible").index(container.find("ul li.selected")) > 0) {
            container.find("ul li.selected").removeClass("selected").prevAll().not('[style*="display: none"]').first().addClass("selected");
        }
    } else if (e.key == "Enter") {
        container.find("input").val(container.find("ul li.selected").text()).blur();
        onSelect(container.find("ul li.selected").text())
    }

    container.find("ul li.selected")[0].scrollIntoView({
        behavior: "smooth",
    });
}

function onSelect(val) {
    // alert(val)
}

$(".searchable input").focus(function () {
    $(this).closest(".searchable").find("ul").show();
    $(this).closest(".searchable").find("ul li").show();
});
$(".searchable input").blur(function () {
    let that = this;
    setTimeout(function () {
        $(that).closest(".searchable").find("ul").hide();
    }, 300);
});

$(document).on('click', '.searchable ul li', function () {
    $(this).closest(".searchable").find("input").val($(this).text()).blur();
    onSelect($(this).text())
});

$(".searchable ul li").hover(function () {
    $(this).closest(".searchable").find("ul li.selected").removeClass("selected");
    $(this).addClass("selected");
});
   </script>
      <style>
      div.searchable {
    width: 100%;
    ;
    /* margin: 0 15px; */
}

.searchable input {
    width: 100%;
    height: 50px;
    font-size: 18px;
    padding: 10px;
    -webkit-box-sizing: border-box; /* Safari/Chrome, other WebKit */
    -moz-box-sizing: border-box; /* Firefox, other Gecko */
    box-sizing: border-box; /* Opera/IE 8+ */
    display: block;
    font-weight: 400;
    line-height: 1.6;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    background: url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 4 5'%3E%3Cpath fill='%23343a40' d='M2 0L0 2h4zm0 5L0 3h4z'/%3E%3C/svg%3E") no-repeat right .75rem center/8px 10px;
}

.searchable ul {
    display: none;
    list-style-type: none;
    background-color: #fff;
    border-radius: 0 0 5px 5px;
    border: 1px solid #add8e6;
    border-top: none;
    max-height: 180px;
    margin: 0;
    overflow-y: scroll;
    overflow-x: hidden;
    padding: 0;
}

.searchable ul li {
    padding: 7px 9px;
    border-bottom: 1px solid #e1e1e1;
    cursor: pointer;
    color: #6e6e6e;
}

.searchable ul li.selected {
    background-color: #e8e8e8;
    color: #333;
}
    </style>
</body>
</html>