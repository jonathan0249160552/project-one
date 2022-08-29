
   
 <div class="row">
   <div class="col-lg-12">
     <div class="card  border-success m-2">
       <div class="card-header bg-success text-white">
         <h4 class="m-0"></h4>
       </div>
       <div class="card-body ">
         <!-- table start  -->
         <div class="table-responsive" >
         <table id="table" class="table table-bordered">
					<thead>
						<tr>
            <th class="">Course Name</th>
							<th class="">Course Code</th>
							<th class="">File Name</th>
							<th class="">File Type</th>
							<th class="">Date Uploaded</th>
							<th class="">Action</th>
						</tr>
					</thead>
          <tbody>
					<?php  
							$query = mysqli_query($conn, "SELECT * FROM `questions_bsc_actu_sci` ") or die(mysqli_error());
							$fetch = mysqli_fetch_array($query);
							// $stud_no = $fetch['stud_no'];
							$query1 = mysqli_query($conn, "SELECT * FROM `questions_bsc_actu_sci` WHERE deleted = 0   ") or die(mysqli_error());
							while($fetch1 = mysqli_fetch_array($query1)){
						?>
						<tr class="del_file  <?php echo $fetch1['id']?>">
						<td class=" "><?php echo $fetch1['Course_name']?></td>
							<td class=""><?php echo $fetch1['Course_code']?></td>
							<td class=""><?php echo substr($fetch1['filename'], 0 ,30)."..."?></td>
							<td class=""><?php echo $fetch1['file_type']?></td>
							<td class=""><?php echo $fetch1['uploaded_date']?></td>
							<td class=" "><a href="user-admin/download_questions.php?id=<?php echo $fetch1['id']?>" class="btn font-weight-bold text-success"><span class="glyphicon glyphicon-download"></span> Download</a>
							 		</tr>
						<?php
							}
						?>
					</tbody>
				  </table>
			
         </div> 
         </div>
     </div>
   
   </div>
 
 </div>  
 
   </div>