<?php
	require_once 'assets/php/conn.php';
	if(ISSET($_POST['store_id'])){
		$store_id = $_POST['store_id'];
		$query = mysqli_query($conn, "UPDATE  `all_courses` SET  `deleted`= 1 WHERE `store_id` = '$store_id'") or die(mysqli_error());
		$fetch  = mysqli_fetch_array($query);
		$filename = $fetch['filename'];
		$stud_no = $fetch['stud_no'];
		if(unlink("files/".$stud_no."/".$filename)){
			mysqli_query($conn, "UPDATE  `all_courses` SET  `deleted`= 1 WHERE `store_id` = '$store_id'") or die(mysqli_error());
		}
	}



	
	// UPDATE `storage` SET `Course_name`=[value-1],`Course_code`=[value-2],`store_id`=[value-3],`filename`=[value-4],`file_type`=[value-5],`date_uploaded`=[value-6],`stud_no`=[value-7],`deleted`=[value-8] WHERE 1
?>