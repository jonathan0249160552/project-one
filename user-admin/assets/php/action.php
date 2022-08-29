<?php
// session_start();

require_once 'session.php';
require_once 'auth.php';
require_once 'comment_auth.php';
$user = new Auth();
$user2 = new Authenticate();
//handle fetch all users ajax request

if(isset($_POST['action']) && $_POST['action'] == 'fetchAllComments' ){
	$output='';
	$data = $user->fetchAllComment($cprogram,$clevel);
	$path = '../assets/php/';
	if($data){
		$output.= '<table class="table table-striped table-bordered text-center  ">
		<thead>
			<tr>
			<th>Action</th>
				<th>Id</th>
				<th>Image</th>
				<th>Title</th>
				<th> Comments</th>
				<th>From</th>
				<th>Posted on</th>
			
			</tr>
		</thead>
		<tbody>';
		foreach ($data as $row){
			if($row['photo']!=''){
				$uphoto = $path.$row['photo'];
			}
			else{
				$uphoto ='assets/img/profile.png';
			}
			$comment= $row['comments'];
			$output .='<tr >
			<td>
			
			<a href="#" id="'.$row['id'].'" 
			title="Delete User" class="text-danger deleteUserIcon_com">
			<i class="fas fa-trash-alt fa-lg"></i>&nbsp;&nbsp;</a>
			</td>
			<td>'.$row['id'].'</td>
			<td> <img src="'.$uphoto.'" class="rounded-circle img-thumbnail img-fluid " 
			width="50px"></td>
			<td>'.$row['title'].'</td>
			<td><a href="#" id="'.$row['id'].'" 
			
			title="View Details" class="text-dark CommentDetailsIcon" data-toggle="modal" data-target="#CommentDetailsIcon">'.$cuser->read_more(10,$comment).'&nbsp;<i class="fas text-primary fa-chevron-circle-down"></i></a></td>
			 
			<td>'.$row['name'].'</td>
			<td>'.$user->timeInAgo($row['created_at']).'</td>
			
		
		</tr>';
		}
			$output.= '</tbody>
					</table>';
					
					echo $output;


	}
	else{
		echo '<h3 class="text-center text-muted">:(No any comment is posted yet </h3>';
	}
}


//handle fetch all notice posted ajax request

if(isset($_POST['action']) && $_POST['action'] == 'fetchAllPost' ){
	$output='';
	$data = $user2->fetchAllPost($clevel,$cprogram);
	$path2 = 'assets/php/imagesuploadedf/';
	if($data){
		$output.= '<table class="table table-striped table-bordered text-center  ">
		<thead>
			<tr>
			<th>Action</th>
			<th>Action</th>
				<th>Id</th>
				<th>Image</th>
				<th>Title</th>
				<th> Posted by</th>
				<th>Message</th>
				<th>Type</th>
				<th>Posted On</th>
			
			</tr>
		</thead>
		<tbody>';
		foreach ($data as $row){
			if($row['image']!=''){
				$uphoto = $path2.$row['image'];
			}
			else{
				$uphoto ='assets/img/Va3.JPG';
			}

			if($row['title'] == null)
			{
				$title = 	 '<p class=" text-success font-weight-bold m-2"> Empty</p>';
			}
		
			else {
				$title = $row['title'];
			}

			if($row['posted_by']== null)
			{
			$posted_by ='<p class=" text-muted font-weight-bold m-2">Empty</p>' ;
			}
		
			else  {
				$posted_by = 	$row['posted_by'] ;
			}
			if($row['body']== null)
			{
			$body ='<p class=" text-muted font-weight-bold m-2">Empty</p>' ;
			}
		
			else  {
				$body = 	$row['body'] ;
			}

			if($row['type']== null)
			{
			$type ='<p class=" text-muted font-weight-bold m-2">Empty</p>' ;
			}
		
			else  {
				$type = 	$row['type'] ;
			}

			if($row['created_at']== null)
			{
			$created_at ='<p class=" text-muted font-weight-bold m-2">Empty</p>' ;
			}
		
			else  {
				$created_at = 	$user->timeInAgo($row['created_at']) ;
			}
			$notice = $row['body'] ; 
			$output .='<tr >
			<td>
		
			<a href="#" id="'.$row['id'].'" title="Edit Notice" class="text-primary  editNoticeBtn" >
			<i class="fas fa-edit fa-lg" data-toggle="modal" data-target="#editNoticeModal"></i></a>&nbsp;
			
			<a href="#" id="'.$row['id'].'" 
			title="View Details" class="text-primary  NoticeboardDetailsIcon" data-toggle="modal" data-target="#NoticeboardDetailsModal">
			<i class="fas fa-info-circle fa-lg"></i></a>
			</td>
			<td>
			<a href="#" id="'.$row['id'].'" 
			title="Delete User" class="text-danger  deleteUserIconPost">
			<i class="fas fa-trash-alt fa-lg"></i>&nbsp;&nbsp;</a>


			</td>
			<td>'.$row['id'].'</td>
			<td> <img src="'.$uphoto.'" class="rounded-circle img-thumbnail img-fluid " 
			width="50px"></td>
			<td>'.$title.'</td>
			<td>'.$posted_by.'</td>
			<td><a href="#" id="'.$row['id'].'" 
			title="View Details" class="text-dark NoticeboardDetailsIcon2" data-toggle="modal" data-target="#NoticeboardDetailsModal2">'.$cuser->read_more(10,$notice).'&nbsp;<i class="fas text-primary fa-chevron-circle-down"></i></a></td>
			 
			<td>'.$type.'</td>
			<td>'.$created_at.'</td>
			
		
		</tr>';
		}
			$output.= '</tbody>
					</table>';
					
					echo $output;


	}
	else{
		echo '<h3 class="text-center text-muted">:(No any new Notice is posted yet </h3>';
	}
}



//handle fetch all Deleted Notice ajax requesr

if(isset($_POST['action']) && $_POST['action'] == 'fetchAllDeletedPost' ){
	$output='';
	$data = $user2->fetchAllDeletedPost($clevel,$cprogram);
	$path2 = 'assets/php/imagesuploadedf/';
	if($data){
		$output.= '<table class="table table-striped table-bordered text-center  ">
		<thead>
			<tr>
			<th>Action</th>
				<th>Id</th>
				<th>Image</th>
				<th>Title</th>
				<th> Posted by</th>
				<th>Message</th>
				<th>Type</th>
				<th>Posted </th>
				
			</tr>
		</thead>
		<tbody>';
		foreach ($data as $row){
			if($row['image']!=''){
				$uphoto = $path2.$row['image'];
			}
			else{
				$uphoto ='assets/img/Va3.JPG';
			}	if($row['title'] == null)
			{
				$title = 	 '<p class=" text-success font-weight-bold m-2"> Empty</p>';
			}
		
			else {
				$title = $row['title'];
			}

			if($row['posted_by']== null)
			{
			$posted_by ='<p class=" text-muted font-weight-bold m-2">Empty</p>' ;
			}
		
			else  {
				$posted_by = 	$row['posted_by'] ;
			}
			if($row['body']== null)
			{
			$body ='<p class=" text-muted font-weight-bold m-2">Empty</p>' ;
			}
		
			else  {
				$body = 	$row['body'] ;
			}

			if($row['type']== null)
			{
			$type ='<p class=" text-muted font-weight-bold m-2">Empty</p>' ;
			}
		
			else  {
				$type = 	$row['type'] ;
			}

			if($row['created_at']== null)
			{
			$created_at ='<p class=" text-muted font-weight-bold m-2">Empty</p>' ;
			}
		
			else  {
				$created_at = 	$user->timeInAgo($row['created_at']) ;
			}
			$output .='<tr >
			<td>
		
			<a href="#" id="'.$row['id'].'" 
			title="Restore User" class="text-primary restoreNoticeIcon"><i class="fas fa-reply fa-lg"></i>
			&nbsp
			</a>

				<a href="#" id="'.$row['id'].'" 
			title="View Details" class="text-primary NoticeDeletedDetailsIcon" data-toggle="modal" data-target="#showDeletedNoticeModal">
			<i class="fas fa-info-circle fa-lg"></i></a>
			</td>
			<td>'.$row['id'].'</td>
			<td> <img src="'.$uphoto.'" class="rounded-circle img-thumbnail img-fluid " 
			width="50px"></td>
			<td>'.$title.'</td>
			<td>'.$posted_by.'</td>
			<td><a href="#" id="'.$row['id'].'" 
		title="View Details" class="text-dark NoticeDeletedDetailsIcon2" data-toggle="modal" data-target="#showDeletedNoticeModal2"> '.$cuser->read_more(10,$body).'
		&nbsp;<i class="fas text-primary fa-chevron-circle-down"></i></a></td>
			<td>'.$type.'</td>
			<td>'.$created_at.'</td>
			
		
		</tr>';
		}
			$output.= '</tbody>
					</table>';
					
					echo $output;


	}
	else{
		echo '<h3 class="text-center text-muted">:(No any new Notice is deleted yet </h3>';
	}
}










//handle delete Post ajax request
if(isset($_POST['deleteUserIconPost'])){
	$id =$_POST['deleteUserIconPost'];
	$user2->userActionDeleted($id);
}

//handle restore deleted user ajax request


if(isset($_POST['res_id'])){
	$id =$_POST['res_id'];
	$user2->userAction2($id);
}

//handle fetch all feedback of users ajax reqeust
if(isset($_POST['action']) && $_POST['action'] == 'fetchAllFeedback' ){
	$output='';
	$feedback = $user->fetchFeedback($clevel,$cprogram);

	if($feedback){
		$output.= '<table class="table table-striped table-bordered text-center  ">
		<thead>
			<tr>
			<th>Action</th>
				<th>FID</th>
				<th>UID</th>
				<th>Name</th>
				<th>Index Number</th>
				<th>E-Mail</th>
				<th>Subject</th>
				<th>Feedback</th>
				<th>Sent On</th>
				
			</tr>
		</thead>
		<tbody>';
		foreach ($feedback as $row){
		
			if($row['subject']== null)
			{
			$subject ='<p class=" text-muted font-weight-bold m-2">No Subject</p>' ;
			}
		
			else  {
				$subject = 	$row['subject'] ;
			}
			if($row['feedback']== null)
			{
			$feedback ='<p class=" text-muted font-weight-bold m-2">No feedback</p>' ;
			}
		
			else  {
				$feedback = 	$row['feedback'] ;
			}

		$output .='<tr>
		<td>

		<a href="#" fid="'.$row['id'].'" id="'.$row['uid'].'" 
		title="Reply" class="text-primary
		replyFeedbackIcon" data-toggle="modal" data-target="#showReplyModal"><i class="fas fa-reply fa-lg"></i>
		</a> | 
		<a href="#" id="'.$row['id'].'" 
			title="View Details" class="text-primary feedbackDetailsIcon" data-toggle="modal" data-target="#feedbackDetailsModal">
			<i class="fas fa-info-circle fa-lg"></i></a>
		</td>
			<td>'.$row['id'].'</td>
			<td>'.$row['uid'].'</td>
			<td>'.$row['name'].'</td>
			<td>'.$row['index_number'].'</td>
			<td>'.$row['email'].'</td>
			<td>'.$subject.'</td>
			<td><a href="#" id="'.$row['id'].'" 
			title="View Details" class="text-dark NoticeboardDetailsIcon2" data-toggle="modal" data-target="#NoticeboardDetailsModal2">'.$cuser->read_more(10,$feedback).'&nbsp;<i class="fas text-primary fa-chevron-circle-down"></i></a></td>
			<td>'.$user->timeInAgo($row['created_at']).'</td>
		
	
		</tr>';
		}
			$output.= '</tbody>
					</table>';
					
					echo $output; 


	}
	else{
		echo '<h3 class="text-center text-muted">:(No any feedback yet </h3>';
	}
}



//handle delete notice
if(isset($_POST['del_id_notice'])){
	$id =$_POST['del_id_notice'];
	$user2->userActionDeleted($id);
}


//handle delete notice
if(isset($_POST['res_id_notice'])){
	$id =$_POST['res_id_notice'];
	$user2->userActionRestore($id);
}


//handle delete comment ajax request
if(isset($_POST['del_id_com'])){
	$id =$_POST['del_id_com'];
	$user->commentAction($id,0);
}


  // handle send feedback to admin ajax Request

  if(isset($_POST['action']) && $_POST['action'] =='feedback'){
         
	
	$feedback= $user->test_input($_POST['feedback']);

	// $user->message_to_all($feedback);
	
 }





//handle fetch notification ajax Request




// handle export all users into excel
if(isset($_GET['export']) && $_GET['export']== 'excel'){
	header("Content-Type:application/xls");
	header("Content-Disposition: attachment; filename=users.xls");
	header("Pragma:no-cache");
	header("Expires: 0");

	$data = $user->exportAllusers($clevel,$cprogram);
	echo '<table border="1" align=center>';
	echo '<tr>
	<th>#</th>
	<th>Name</th>
	<th>Index-Number</th>
	<th>E-Mail</th>
	<th>Phone</th>
	<th>Gender</th>
	<th>DOB</th>
	<th>Joined ON</th>
	<th>Verified</th>
	<th>Deleted</th>
	</tr>';
	foreach ($data as $row ){
		echo '<tr>
		<td>'.$row['id'].'</td>
		<td>'.$row['name'].'</td>
		<td>'.$row['index_number'].'</td>
		<td>'.$row['email'].'</td>
		<td>'.$row['phone'].'</td>
		<td>'.$row['gender'].'</td>
		<td>'.$row['dob'].'</td>
		<td>'.$row['created_at'].'</td>
		<td>'.$row['verified'].'</td>
		<td>'.$row['deleted'].'</td>
		</tr>'; 
	}
	echo '	</table>';

}

// handle profile update Ajax Request 
if(isset($_POST['action']) && $_POST['action']== 'update_profile'){
	$f_name = $cuser->test_input($_POST['f_name']);
	$s_name = $cuser->test_input($_POST['s_name']);
	$gender = $cuser->test_input($_POST['gender']);
	$dob = $cuser->test_input($_POST['dob']);
	$phone = $cuser->test_input($_POST['phone']);
	$email = $cuser->test_input($_POST['email']);
  //    $program= $cuser->test_input($_POST['program']);
	 $index_number = $cuser->test_input($_POST['index_number']);
	 $level = $cuser->test_input($_POST['level']);
  
	
  //   }
	$user->update_profile($id,$f_name,$s_name,$gender,$dob,$phone,$email,$level,$index_number);
  //   $cuser->notification($cid, 'admin','Profile updated');
  print_r($_POST);
  
  }


// fetch feedback details by id

if(isset($_POST['feedbackdetails_id'])){
	$id = $_POST['feedbackdetails_id'];

	$data = $user->fetchNotice_Details($id);
	echo json_encode($data);
}


if(isset($_POST['Comment_details_id'])){
	$id = $_POST['Comment_details_id'];
	
	$data = $user2->fetchAllComment($id);
	echo json_encode($data);
}


// fetch feedback details by id

if(isset($_POST['Noticeboard_details_id'])){
	$id= $_POST['Noticeboard_details_id'];

	$data = $user->fetchAllPost_detail_modal($id);
	echo json_encode($data);
	
}

/// edit noticeboard
if(isset($_POST['edit_notice_id'])){
	$id = $_POST['edit_notice_id'];
 
	$row =$user->edit_noticeboard($id);
	echo json_encode($row);
 }

// handle update notice  ajax request
if(isset($_POST['action']) && $_POST['action']== 'update_notice'){
	$id = $user->test_input($_POST['id']);
	$title = $user->test_input($_POST['title']);
	$body = $user->test_input($_POST['body']);
	$posted_by = $user->test_input($_POST['posted_by']);
	$type = $user->test_input($_POST['type']);
	// $image = $user->test_input($_POST['image']);
	// $image = $_POST['image']['name'];
	//   $filetmpname = $_POST['image']['tmp_name'];

	//   $folder = 'imagesuploadedf/'.basename($image);
	//   move_uploaded_file($filetmpname, $folder.$image);
	$user->update_notice($id,$title,$body,$posted_by,$type);
	// $user->notification($cid, 'admin','Note updated');
 }

//handle reply feedback to user ajax request
if(isset($_POST['message'])){
	$uid = $_POST['uid'];
	$message = $user->test_input($_POST['message']);
	$program = $user->test_input($_POST['program']);
	$level = $user->test_input($_POST['level']);
	$fid = $_POST['fid'];
	$user->replyFeedback($uid, $message,$program,$level);
	$user->feedbackReplied($fid);
print_r($_POST);
}  


?>



