<?php
	require_once 'assets/php/conn.php';
	


	if(ISSET($_POST['save_c'])){
		$course_name = $_POST['courseName'];
		$course_code = $_POST['courseCode'];
		$program = $_POST['program'];
		$level = $_POST['level'];
		$semester = $_POST['semester'];
		$credit_hours = $_POST['credit_hours'];
		// $stud_no = $_POST['id'];
		// $date = date("Y-m-d, h:i A", strtotime("+8 HOURS"));
	
		
			mysqli_query($conn, "INSERT INTO `all_courses_bsc_actu_sci` VALUES( '', '$course_name', '$course_code' , 
            '$semester','$credit_hours', '$program', '$level',NULL,NULL)") or die(mysqli_error());
			header('location: admin-Upload Courses.php');
		
	}

    
	
	
?>