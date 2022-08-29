<?php
	require_once 'assets/php/conn.php';
	
	if(ISSET($_POST['save_q'])){
		$course_name = $_POST['courseName'];
		$course_code = $_POST['CourseCode'];
		$program = $_POST['program'];
		$level = $_POST['level'];
		$semester = $_POST['semester'];
		$credit_hours = $_POST['credit_hours'];
		// $stud_no = $_POST['stud_no'];
		$file_name = $_FILES['file']['name'];
		$file_type = $_FILES['file']['type'];
		$file_temp = $_FILES['file']['tmp_name'];
		$location = "files/".$file_name;
	
		$date = date("Y-m-d, h:i A", strtotime("+8 HOURS"));
		if(move_uploaded_file($file_temp, $location)){
			mysqli_query($conn, "INSERT INTO `questions_bsc_actu_sci` VALUES('', '$course_name', '$course_code' ,'$program', '$level', '$semester', '$credit_hours', '$file_name' ,'$file_type',NULL,NULL)") or die(mysqli_error());
			header('location: admin-Past Questions.php');
		
		}
	}



?>