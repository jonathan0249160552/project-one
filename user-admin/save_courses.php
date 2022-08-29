<?php
	require_once 'assets/php/conn.php';
	


	if(ISSET($_POST['save_c'])){
		$course_name = $_POST['courseName'];
		$course_code = $_POST['courseCode'];
		$level = $_POST['level'];
		$semester = $_POST['semester'];
		$program = $_POST['program'];
		// $stud_no = $_POST['id'];
	
		$credit_hours = $_POST['credit_hours'];
		// $date = date("Y-m-d, h:i A", strtotime("+8 HOURS"));
	
		
			mysqli_query($conn, "INSERT INTO `all_courses_bsc_actu_sci` VALUES( '', '$course_name', '$course_code' , 
            '$level','$semester', '$date',NULL,NULL)") or die(mysqli_error());
			header('location: admin-Upload Courses.php');
		
	}

    
	
	
?>