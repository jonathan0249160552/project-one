<?php
	require_once 'assets/php/conn.php';
	if(ISSET($_REQUEST['id'])){
		$id = $_REQUEST['id'];
		
		$query = mysqli_query($conn, "SELECT * FROM `questions_bsc_actu_sci` WHERE `id` = '$id'") or die(mysqli_error());
		$fetch  = mysqli_fetch_array($query);
		$filename = $fetch['filename'];
		// $stud_no = $fetch['stud_no'];
		header("Content-Disposition: attachment; filename=".$filename);
		header("Content-Type: application/octet-stream;");
		readfile("../user-admin/files/".$filename);
	}
?>