
<?php 
	require_once 'links.php';
	require_once 'admin/conn.php';
?>

	
	<div class="col-md-12">
		<div class="alert alert-info" style="margin-top:100px;">File List</div>
		<div class="panel panel-default">
			<div class="panel-body alert-success" >
				
				<table id="table" class="table table-bordered">
					<thead>
						<tr>
							<th>Filename</th>
							<th>File Type</th>
							<th>Date Uploaded</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$query = mysqli_query($conn, "SELECT * FROM `student` WHERE `stud_id` = '$_SESSION[student]'") or die(mysqli_error());
							$fetch = mysqli_fetch_array($query);
							$stud_no = $fetch['stud_no'];
							$query1 = mysqli_query($conn, "SELECT * FROM `storage` WHERE `stud_no` = '$stud_no'") or die(mysqli_error());
							while($fetch1 = mysqli_fetch_array($query1)){
						?>
						<tr class="del_file<?php echo $fetch1['store_id']?>">
							<td><?php echo substr($fetch1['filename'], 0 ,30)."..."?></td>
							<td><?php echo $fetch1['file_type']?></td>
							<td><?php echo $fetch1['date_uploaded']?></td>
							<td><a href="download.php?store_id=<?php echo $fetch1['store_id']?>" class="btn btn-success"><span class="glyphicon glyphicon-download"></span> Download</a> | </td>
						</tr>
						<?php
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<div id = "footer">
	
	</div>

	
<?php include 'script.php'?>

