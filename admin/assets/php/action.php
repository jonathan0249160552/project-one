<?php
session_start();


require_once 'auth.php';
require_once 'comment_auth.php';
$user = new Auth();
$user2 = new Authenticate();
if (isset($_POST['action'])&& $_POST['action']=='register'){
	$password = $user->test_input($_POST['password']);
	$username = $user->test_input($_POST['username']);
	$program = $user->test_input($_POST['program']);
	$level = $user->test_input($_POST['level']);

	$s_name = $user->test_input($_POST['s_name']);
	$f_name = $user->test_input($_POST['f_name']);
	$phone = $user->test_input($_POST['phone']);
	$email = $user->test_input($_POST['email']);

	$hpass = password_hash($password, PASSWORD_DEFAULT);
// print_r($_POST);
	if ($user->user_exist($username)) {
		echo $user->showMessage('warning', 'This User is already registered!');
	}
	else{
		if ($user->register($hpass,$username,$program,$level,$s_name,$f_name,$phone,$email)) {
		
			$SESSION['user']= $username;
			echo $user->showMessage('success', 'User registered Successfully !');
		}
		else{
			echo $user->showMessage('danger','Something went wrong! Please try again later! ');
		}
	}
}



if (isset($_POST['action'])&& $_POST['action']=='program'){

	$program = $user->test_input($_POST['program']);


	if ($user->program_exist($program)) {
		echo $user->showMessage('warning', 'This program already exist!');
	}
	else {
		try {
			$user->register_program($program) ;
		
			echo $user->showMessage('success', ' New program added successfully !!');
		
		} catch (exception $e) {
			echo $user->showMessage('danger', ' Operation failed please try again later');
		}
		
}
// }
// if (isset($_POST['action'])&& $_POST['action']=='register'){
// 	$password = $user->test_input($_POST['password']);
// 	$username = $user->test_input($_POST['username']);
// 	$program = $user->test_input($_POST['program']);
// 	$level = $user->test_input($_POST['level']);



// 	$hpass = password_hash($password, PASSWORD_DEFAULT);

// 	if ($user->user_exist($username)) {
// 		echo $user->showMessage('warning', 'This User is already registered!');
// 	}
// 	else{
// 		if ($user->register($hpass,$username,$program,$level)) {
// 			echo'register';
// 			$SESSION['user']= $username;
// 		}
// 		else{
// 			echo $user->showMessage('danger','Something went wrong! Please try again later! ');
// 		}
// 	}
// }
}

// handle login ajax request

if(isset($_POST['action']) && $_POST['action']=='login'){
$username = $user->test_input($_POST['username']);
$password = $user->test_input($_POST['password']);

$loggedInUser = $user->login($username);

if ($loggedInUser != null) {
    if(password_verify($password,$loggedInUser['password'])){
 
       
		$_SESSION['user']= $username;
		echo 'login';
    }
    else{
        echo $user->showMessage('danger','Password is incorrect!');
    }
}
else{
    echo $user->showMessage('danger','User does not exist!');
}


}

//
//handle fetch all users ajax request

if(isset($_POST['action']) && $_POST['action'] == 'fetchAllUsers' ){
	$output='';
	$data = $user->fetchAllUsers();
	$path = '../assets/php/';
	$message = '<p class=" text-danger font-weight-bold m-2">Not Verified</p>';
	if($data){
		$output.= '<table class="table table-striped table-bordered text-center  ">
		<thead>
			<tr>
				<th>Id</th>
				<th>Action</th>
				<th>Image</th>
				<th>Name</th>
				<th>Index Number</th>
				<th>E-Mail</th>
				<th>Phone</th>
				<th>Gender</th>
				<th>E-mail Verification</th>
				<th>Program</th>
				<th>Level</th>
				<th>Registered On</th>
			</tr>
		</thead>
		<tbody>';
		foreach ($data as $row){
			$email_verification = $message.$row['verified'];
			$registered_on = $row['created_at'];
			$registered_on = date('d M Y',strtotime($registered_on));
			if($row['photo']!=''){
				$uphoto = $path.$row['photo'];
			}
			else{
				$uphoto ='assets/img/profile.png';
			}

			if($row['verified'] == 0)
			{
				$email_verification = $message;
			}
		
			else if ($row['verified'] == 1) {
				$email_verification = 	 '<p class=" text-success font-weight-bold m-2"> Verified</p>';
			}

			if($row['phone']== null)
			{
			$phone ='<p class=" text-muted font-weight-bold m-2">Empty</p>' ;
			}
		
			else  {
				$phone = 	$row['phone'] ;
			}
			if($row['gender']== null)
			{
			$gender ='<p class=" text-muted font-weight-bold m-2">Empty</p>' ;
			}
		
			else  {
				$gender = 	$row['gender'] ;
			}

			$output .='<tr >
			<td>'.$row['id'].'</td>
			<td>
			<a href="#" id="'.$row['id'].'" 
			title="View Details" class="text-primary userDetailsIcon" data-toggle="modal" data-target="#showUserDetailsModal">
			<i class="fas fa-info-circle fa-lg"></i>&nbsp;&nbsp;</a>
			
			<a href="#" id="'.$row['id'].'" 
			title="Delete User" class="text-danger deleteUserIcon">
			<i class="fas fa-trash-alt fa-lg"></i>&nbsp;&nbsp;</a>
			</td>
			<td> <img src="'.$uphoto.'" class="rounded-circle img-thumbnail img-fluid " 
			width="50px"></td>
			<td>'.$row['name'].'</td>
			<td>'.$row['index_number'].'</td>
			<td>'.$row['email'].'</td>
			<td>'.$phone.'</td>
			<td>'.$gender.'</td>
			<td>'.$email_verification.'</td>
			<td>'.$row['program'].'</td>
			<td>'.$row['level'].'</td>
			<td>'.$registered_on.'</td>
		
		</tr>';
		}
			$output.= '</tbody>
					</table>';
					
					echo $output;


	}
	else{
		echo '<h3 class="text-center text-muted">:(No any user is registered yet </h3>';
	}
}



//handle fetch all admins ajax request

if(isset($_POST['action']) && $_POST['action'] == 'fetchAllAdminUsers' ){
	$output='';
	$data = $user->fetchAllAdminUsers();
	$path = '../assets/php/';
	$message = '<p class=" text-danger font-weight-bold m-2">Not Verified</p>';
	if($data){
		$output.= '<table class="table table-striped table-bordered text-center  ">
		<thead>
			<tr>
				<th>Id</th>
				<th>Action</th>
				<th>Image</th>
				<th>First Name</th>
				<th>SurName</th>
				<th>User Name</th>
				<th>Index Number</th>
				<th>E-Mail</th>
				<th>Phone</th>
				<th>Gender</th>
			
				<th>Program</th>
				<th>Level</th>
				<th>Registered On</th>
			</tr>
		</thead>
		<tbody>';
		foreach ($data as $row){
			// $email_verification = $message.$row['verified'];
			$registered_on = $row['created_at'];
			$registered_on = date('d M Y',strtotime($registered_on));
			if($row['photo']!=''){
				$uphoto = $path.$row['photo'];
			}
			else{
				$uphoto ='assets/img/profile.png';
			}

			// if($row['verified'] == 0)
			// {
			// 	$email_verification = $message;
			// }
		
			// else if ($row['verified'] == 1) {
			// 	$email_verification = 	 '<p class=" text-success font-weight-bold m-2"> Verified</p>';
			// }

			if($row['phone']== null)
			{
			$phone ='<p class=" text-muted font-weight-bold m-2">Empty</p>' ;
			}
		
			else  {
				$phone = 	$row['phone'] ;
			}


			if($row['index_number']== null)
			{
			$index_number ='<p class=" text-muted font-weight-bold m-2">Empty</p>' ;
			}
		
			else  {
				$index_number = 	$row['index_number'] ;
			}


			if($row['gender']== null)
			{
			$gender ='<p class=" text-muted font-weight-bold m-2">Empty</p>' ;
			}
		
			else  {
				$gender = 	$row['gender'] ;
			}

			if($row['f_name']== null)
			{
			$f_name ='<p class=" text-muted font-weight-bold m-2">Empty</p>' ;
			}
		
			else  {
				$f_name = 	$row['f_name'] ;
			}

			if($row['s_name']== null)
			{
			$s_name ='<p class=" text-muted font-weight-bold m-2">Empty</p>' ;
			}
		
			else  {
				$s_name = 	$row['s_name'] ;
			}

			$output .='<tr >
			<td>'.$row['id'].'</td>
			<td>
			<a href="#" id="'.$row['id'].'" 
			title="View Details" class="text-primary userAdminDetailsIcon" data-toggle="modal" data-target="#showAdminUserDetailsModal">
			<i class="fas fa-info-circle fa-lg"></i>&nbsp;&nbsp;</a>
			
			<a href="#" id="'.$row['id'].'" 
			title="Delete User" class="text-danger deleteAdminUserIcon">
			<i class="fas fa-trash-alt fa-lg"></i>&nbsp;&nbsp;</a>
			</td>
			<td> <img src="'.$uphoto.'" class="rounded-circle img-thumbnail img-fluid " 
			width="50px"></td>
			<td>'.$row['f_name'].'</td>
			<td>'.$row['s_name'].'</td>
			<td>'.$row['username'].'</td>
			<td>'.$index_number.'</td>
			<td>'.$row['email'].'</td>
			<td>'.$phone.'</td>
			<td>'.$gender.'</td>
		
			<td>'.$row['program'].'</td>
			<td>'.$row['level'].'</td>
			<td>'.$registered_on.'</td>
		
		</tr>';
		}
			$output.= '</tbody>
					</table>';
					
					echo $output;


	}
	else{
		echo '<h3 class="text-center text-muted">:(No any user is registered yet </h3>';
	}
}


//handle fetch all users ajax request


if(isset($_POST['action']) && $_POST['action'] == 'fetchAllComments' ){
	$output='';
	$data = $user->fetchAllComment();
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

			$comment = $row['comments'];
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
			<td><p id="'.$row['id'].'" 
			title="View Details" class="text-dark CommentDetailsIcon" data-toggle="modal" data-target="#CommentDetailsModal">'.$user->read_more(10,$comment).'&nbsp;<i class="fas text-primary fa-chevron-circle-down"></i></p></td>
			
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



if(isset($_POST['action']) && $_POST['action'] == 'fetchAllGeneralComments' ){
	$output='';
	$data = $user->fetchAllGeneralComment();
	$path = '../assets/php/';
	if($data){
		$output.= '<table class="table tables table-striped table-bordered text-center  ">
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

			$comment = $row['comments'];
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
			<td><p id="'.$row['id'].'" 
			title="View Details" class="text-dark CommentGenDetailsIcon" data-toggle="modal" data-target="#CommentGenDetailsModal">'.$user->read_more(10,$comment).'&nbsp;<i class="fas text-primary fa-chevron-circle-down"></i></p></td>
			
			<td>'.$row['name'].'</td>
			<td>'.$user->timeInAgo($row['created_at']).'</td>
			
		
		</tr>';
		}
			$output.= '</tbody>
					</table>';
					
					echo $output;


	}


}
//handle fetch all notice posted ajax request

if(isset($_POST['action']) && $_POST['action'] == 'fetchAllPost' ){
	$output='';
	$data = $user2->fetchAllPost();
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
				<th>Posted On</th>
				<th>Program</th>
				<th>Level</th>
			
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

			if($row['program']== null)
			{
			$program ='<p class=" text-muted font-weight-bold m-2">Empty</p>' ;
			}
		
			else  {
				$program = 	$row['program'] ;
			}

			if($row['level']== null)
			{
			$level ='<p class=" text-muted font-weight-bold m-2">Empty</p>' ;
			}
		
			else  {
				$level = 	$row['level'] ;
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
		
			<a href="#" id="'.$row['id'].'" title="Edit Notice" class="text-primary editNoticeBtn" >
			<i class="fas fa-edit fa-lg" data-toggle="modal" data-target="#editNoticeModal"></i></a>&nbsp;
			
			<a href="#" id="'.$row['id'].'" 
			title="View Details" class="text-primary NoticeboardDetailsIcon" data-toggle="modal" data-target="#NoticeboardDetailsModal">
			<i class="fas fa-info-circle fa-lg"></i></a>
			
			<a href="#" id="'.$row['id'].'" 
			title="Delete User" class="text-danger deleteUserIconPost">
			<i class="fas fa-trash-alt fa-lg"></i>&nbsp;&nbsp;</a>


			</td>
			<td>'.$row['id'].'</td>
			<td> <img src="'.$uphoto.'" class="rounded-circle img-thumbnail img-fluid " 
			width="50px"></td>
			<td>'.$title.'</td>
			<td>'.$posted_by.'</td>
			<td><p id="'.$row['id'].'" 
			title="View Details" class="text-dark NoticeboardDetailsIcon" data-toggle="modal" data-target="#NoticeboardDetailsModal">'.$user->read_more(10,$body).'&nbsp;<i class="fas text-primary fa-chevron-circle-down"></i></p></td>
			<td>'.$type.'</td>
			<td>'.$created_at.'</td>
			<td>'.$program.'</td>
			<td>'.$level.'</td>
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




//handle fetch all past question posted ajax request

if(isset($_POST['action']) && $_POST['action'] == 'display_past_question' ){
	$output='';
	$data = $user->fetchAllPatQuestion();
	$path2 = 'assets/php/imagesuploadedf/';
	if($data){
		$output.= '<table class="table table-striped table-bordered text-center  ">
		<thead>
			<tr>
				<th>Action</th>
				<th>Action</th>
				<th>Course Name</th>	
				<th>Course Code</th>
				<th>Program</th>
				<th>Level</th>
				<th>Semester</th>
				<th>File Name </th>
				<th>Date Uploaded</th>
				
			
			
			</tr>
		</thead>
		<tbody>';
		foreach ($data as $row){
			
			$output .='<tr >
			<td> <button class="btn text-danger deleteBtn" type="button" id="'.$row['id'].'">
			<span class="glyphicon glyphicon-trash"></span> Remove</button></td>
         <td class=" "><a class="btn font-weight-bold text-success" href="download_questions.php?id=' .$row['id']. 'class="btn font-weight-bold text-success">
         <span class="glyphicon glyphicon-download"></span> Download</a>
			<td>'.$row['Course_name'].'</td>
			<td>'.$row['Course_code'].'</td>
			<td>'.$row['program'].'</td>
			<td>'.$row['level'].'</td>
			<td>'.$row['semester'].'</td>
			<td>'.$row['filename'].'</td>
			<td>'.$user->timeInAgo($row['uploaded_date']).'</td>
			
			
		
		</tr>';
		}
			$output.= '</tbody>
					</table>';
					
					echo $output;


	}
	else{
		echo '<h3 class="text-center text-muted">:(No any new Past Question posted yet </h3>';
	}
}



//handle fetch all course material  ajax request

if(isset($_POST['action']) && $_POST['action'] == 'display_course_materails' ){
	$output='';
	$data = $user->fetchAllCourseMaterials();
	$path2 = 'assets/php/imagesuploadedf/';
	if($data){
		$output.= '<table class="table table-striped table-bordered text-center  ">
		<thead>
			<tr>
			
				<th>Action</th>
				<th>Course Name</th>	
				<th>Course Code</th>
				<th>Program</th>
				<th>Level</th>
				<th>Semester</th>
				<th>Credit Hours</th>
				<th>File Name </th>
				<th>Date Uploaded</th>
				
			
			
			</tr>
		</thead>
		<tbody>';
		foreach ($data as $row){
			
			$output .='<tr >
					<td> <button class="btn text-danger deleteButton" type="button" id="'.$row['id'].'">
			<span class="glyphicon glyphicon-trash"></span> Remove</button><a class="btn font-weight-bold text-success" href="download.php?id=' .$row['id']. 'class="btn font-weight-bold text-success">
         <span class="glyphicon glyphicon-download"></span> Download</a></td>
			<td>'.$row['Course_name'].'</td>
			<td>'.$row['Course_code'].'</td>
			<td>'.$row['program'].'</td>
			<td>'.$row['level'].'</td>
			<td>'.$row['semester'].'</td>
			<td>'.$row['credit_hours'].'</td>
			<td>'.$row['filename'].'</td>
			<td>'.$user->timeInAgo($row['date_uploaded']).'</td>
			
			
		
		</tr>';
		}
			$output.= '</tbody>
					</table>';
					
					echo $output;


	}
	else{
		echo '<h3 class="text-center text-muted">:(No any new Course Materials posted yet </h3>';
	}
}

// handle fetch all program ajax request
if(isset($_POST['action'])&& $_POST['action']=='displayProgram')
{
	$output='';
	$data=$user->fetchAllProgram();

	if($data){
		$output.='';

		foreach($data as $row){
			$output.='<li>'.$row['programs'].'</li>';
		}
	}else {
		echo '<h3 class="text-center text-muted">:No programs </h3>';
	}
}

//handle fetch all courses ajax request

if(isset($_POST['action']) && $_POST['action'] == 'display_course' ){
	$output='';
	$data = $user->fetchAllCourse();
	$path2 = 'assets/php/imagesuploadedf/';
	if($data){
		$output.= '<table class="table table-striped table-bordered text-center  ">
		<thead>
			<tr><th>Action</th>
				
				<th>Course Name</th>	
				<th>Course Code</th>
				<th>Program </th>
				<th>Level </th>
				<th>Semester</th>
				<th>Credit Hours </th>
				<th>Date Uploaded</th>
				
			
			
			</tr>
		</thead>
		<tbody>';
		foreach ($data as $row){
			
			$output .='<td> <button class="btn text-danger deleteBtn" type="button" id="'.$row['id'].'">
			<span class="glyphicon glyphicon-trash"></span> Remove</button></td>
        
			<td>'.$row['Course_name'].'</td>
			<td>'.$row['course_code'].'</td>
			<td>'.$row['program'].'</td>
			<td>'.$row['level'].'</td>
			<td>'.$row['semester'].'</td>
			<td>'.$row['credit_hours'].'</td>
			<td>'.$user->timeInAgo($row['uploaded_date']).'</td>
			
			
		
		</tr>';
		}
			$output.= '</tbody>
					</table>';
					
					echo $output;


	}
	else{
		echo '<h3 class="text-center text-muted">:(No any new Course posted yet </h3>';
	}
}


//handle fetch all Deleted Notice ajax requesr

if(isset($_POST['action']) && $_POST['action'] == 'fetchAllDeletedPost' ){
	$output='';
	$data = $user2->fetchAllPostDel();
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
				<th>program</th>
				<th>Level</th>
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

			
			if($row['level']== null)
			{
			$level ='<p class=" text-muted font-weight-bold m-2">Empty</p>' ;
			}
		
			else  {
				$level = 	$row['level'] ;
			}
			if($row['program']== null)
			{
			$program ='<p class=" text-muted font-weight-bold m-2">Empty</p>' ;
			}
		
			else  {
				$program = 	$row['program'] ;
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
			
			</a>

				<a href="#" id="'.$row['id'].'" 
			title="View Details" class="text-primary NoticeboardDelDetailsIcon" data-toggle="modal" data-target="#NoticeboardDetailsModal">
			<i class="fas fa-info-circle fa-lg"></i></a>
			</td>
			
			<td>'.$row['id'].'</td>

			<td> <img src="'.$uphoto.'" class="rounded-circle img-thumbnail img-fluid " 
			width="50px">
			</td>
			
			<td>'.$title.'</td>
			<td>'.$posted_by.'</td>
				
			
			
			<td>
				
			<p id="'.$row['id'].'" 
				title="View Details" class="text-dark NoticeboardDelDetailsIcon" data-toggle="modal" data-target="#NoticeboardDetailsModal">'.$user->read_more(10,$body).'&nbsp;<i class="fas text-primary fa-chevron-circle-down"></i></p>
			</td>
			<td>'.$type.'</td>
			<td>'.$program.'</td>
			
			<td>'.$level.'</td>
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

//handle display user in detail ajax request

if(isset($_POST['details_id'])){
	$id= $_POST['details_id'];

	$data = $user->fetchUserDetailsByID($id);
	echo json_encode($data);
}

if(isset($_POST['admin_details_id'])){
	$id= $_POST['admin_details_id'];

	$data = $user->fetchAdminUserDetailsByID($id);
	echo json_encode($data);
}


//handle delete user ajax request
if(isset($_POST['del_id'])){
	$id =$_POST['del_id'];
	$user->userAction($id,0);
}

//handle delete admin ajax request
if(isset($_POST['admin_del_id'])){
	$id =$_POST['admin_del_id'];
	$user->userActionAdmin($id);
}

//handle delete notice
if(isset($_POST['res_id_notice'])){
	$id =$_POST['res_id_notice'];
	$user2->userActionRestore($id);
}


//handle delete user ajax request
if(isset($_POST['del_id_past_question'])){
	$id =$_POST['del_id_past_question'];
	$user->delete_past_Question($id,1);
}

//handle delete course ajax request
if(isset($_POST['del_id_course'])){
	$id =$_POST['del_id_course'];
	$user->delete_course($id,1);
}


//handle delete course material ajax request
if(isset($_POST['del_id_course_material'])){
	$id =$_POST['del_id_course_material'];
	$user->del_id_course_material($id,1);
}



//handle delete Post ajax request
if(isset($_POST['deleteUserIconPost'])){
	$id =$_POST['deleteUserIconPost'];
	$user2->userAction2($id,0);
}

//handle delete Post ajax request
if(isset($_POST['deleteUserIconPost'])){
	$id =$_POST['deleteUserIconPost'];
	$user2->userActionDel($id,0);
}


// handle fetch all deleted users ajax request
if(isset($_POST['action']) && $_POST['action'] == 'fetchAllDeletedUsers' ){
	$output='';
	$data = $user->fetchAllDeletedUsers();
	$path = '../assets/php/';
	$message = '<p class=" text-danger font-weight-bold m-2">Not Verified</p>';
	if($data){
		$output.= '<table class="table table-striped table-bordered text-center  ">
		<thead>
			<tr>	
				<th>Action</th>
				<th>Id</th>
				<th>Image</th>
				<th>Name</th>
				<th>Index Number</th>
				<th>E-Mail</th>
				<th>Phone</th>
				<th>Gender</th>
				<th>Verified</th>
				<th>Program</th>
				<th>Level</th>
		
			</tr>
		</thead>
		<tbody>';
		foreach ($data as $row){
			$email_verification = $message.$row['verified'];
			if($row['photo']!=''){
				$uphoto = $path.$row['photo'];
			}
			else{
				$uphoto ='assets/img/profile.png';
			}
			
			if($row['verified'] == 0)
			{
				$email_verification = $message;
			}
		
			else if ($row['verified'] == 1) {
				$email_verification = 	 '<p class=" text-success font-weight-bold m-2"> Verified</p>';
			}

			if($row['phone']== null)
			{
			$phone ='<p class=" text-muted font-weight-bold m-2">Empty</p>' ;
			}
		
			else  {
				$phone = 	$row['phone'] ;
			}
			if($row['gender']== null)
			{
			$gender ='<p class=" text-muted font-weight-bold m-2">Empty</p>' ;
			}
		
			else  {
				$gender = 	$row['gender'] ;
			}

			
			$output .='<tr >
			<td>
			<a href="#" id="'.$row['id'].'" 
			title="Restore User" class="text-dark  restoreUserIcon"><i class="fas fa-reply fa-lg"></i>
			&nbspRestore
			</a>
			</td>
			<td>'.$row['id'].'</td>
			<td> <img src="'.$uphoto.'" class="rounded-circle img-thumbnail img-fluid " 
			width="50px"></td>
			<td>'.$row['name'].'</td>
			<td>'.$row['index_number'].'</td>
			<td>'.$row['email'].'</td>
			<td>'.$phone.'</td>
			<td>'.$gender.'</td>
			<td>'.$email_verification.'</td>
			<td>'.$row['program'].'</td>
			<td>'.$row['level'].'</td>

		
		</tr>';
		}
			$output.= '</tbody>
					</table>';
					
					echo $output;


	}
	else{
		echo '<h3 class="text-center text-muted">:(No any user is deleted yet </h3>';
	}
}





// handle fetch all deleted users ajax request
if(isset($_POST['action']) && $_POST['action'] == 'fetchAllDeletedAdminUsers' ){
	$output='';
	$data = $user->fetchAllDeletedUsersAdmin();
	$path = '../assets/php/';
	
	if($data){
		$output.= '<table class="table table-striped table-bordered text-center  ">
		<thead>
			<tr>	
				<th>Action</th>
				<th>Id</th>
				<th>Image</th>
				<th>User Name</th>
				<th>First Name</th>
				<th>Other Name</th>
				<th>Index Number</th>
				
				<th>Phone</th>
				<th>Gender</th>
	
				<th>Program</th>
				<th>Level</th>
				<th>Registered</th>
			</tr>
		</thead>
		<tbody>';
		foreach ($data as $row){
			$registered_on = $row ['created_at'];
		$registered_on = date('d M Y',strtotime($registered_on));
			if($row['photo']!=''){
				$uphoto = $path.$row['photo'];
			}
			else{
				$uphoto ='assets/img/profile.png';
			}
			
			
			if($row['phone']== null)
			{
			$phone ='<p class=" text-muted font-weight-bold m-2">Empty</p>' ;
			}
		
			else  {
				$phone = 	$row['phone'] ;
			}
			if($row['gender']== null)
			{
			$gender ='<p class=" text-muted font-weight-bold m-2">Empty</p>' ;
			}
		
			else  {
				$gender = 	$row['gender'] ;
			}

			if($row['index_number'] == null){

					$index_number='<p class="text-muted font-weight-bold m-2">Empty</p>';
			}
			else{
					$index_number =  $row['index_number']; 
					
			}

			
			
			$output .='<tr >
			<td>
			<a href="#" id="'.$row['id'].'" 
			title="Restore User" class="text-dark  restoreAdminUserIcon"><i class="fas fa-reply fa-lg"></i>
			&nbspRestore
			</a>
			</td>
			<td>'.$row['id'].'</td>
			<td> <img src="'.$uphoto.'" class="rounded-circle img-thumbnail img-fluid " 
			width="50px"></td>
			<td>'.$row['username'].'</td>
			<td>'.$row['f_name'].'</td>
			<td>'.$row['s_name'].'</td>
			<td>'.$index_number.'</td>
		
			<td>'.$phone.'</td>
			<td>'.$gender.'</td>
			<td>'.$row['program'].'</td>
			<td>'.$row['level'].'</td>
			<td>'.$registered_on.'</td>
		
		</tr>';

		}
			$output.= '</tbody>
					</table>';
					
					echo $output;


	}
	else{
		echo '<h3 class="text-center text-muted">:(No any admin is deleted yet </h3>';
	}
}

//handle restore deleted user ajax request

if(isset($_POST['res_id'])){
	$id =$_POST['res_id'];
	$user->userAction2($id);
}


if(isset($_POST['admin_res_id'])){
	$id =$_POST['admin_res_id'];
	$user->userActionAdminRestore($id);
}

// if(isset($_POST['res_id'])){
// 	$id =$_POST['res_id'];
// 	$user->userActionRes($id);
// }

//handle fetch all feedback of users ajax reqeust
if(isset($_POST['action']) && $_POST['action'] == 'fetchAllFeedback' ){
	$output='';
	$feedback = $user->fetchFeedback();

	if($feedback){
		$output.= '<table class="table table-striped table-bordered text-center  ">
		<thead>
			<tr>
			<th>Action</th>
				<th>FID</th>
				<th>UID</th>
				<th>Name</th>
				<th>Program</th>
				<th>Level</th>
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
			<td>'.$row['program'].'</td>
			<td>'.$row['level'].'</td>
			<td>'.$row['index_number'].'</td>
			<td>'.$row['email'].'</td>
			<td>'.$subject.'</td>
			<td><a href="#" id="'.$row['id'].'" 
			title="View Details" class="text-dark feedbackDetailsIcon" data-toggle="modal" data-target="#feedbackDetailsModal">'.$user->read_more(10,$feedback).'&nbsp;<i class="fas text-primary fa-chevron-circle-down"></i></a></td>
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
//handle reply feedback to user ajax request
if(isset($_POST['message'])){
	$uid = $_POST['uid'];
	$message = $user->test_input($_POST['message']);
	$fid = $_POST['fid'];
	$user->replyFeedback($uid, $message);
	$user->feedbackReplied($fid);

}




//handle delete user ajax request
if(isset($_POST['del_id'])){
	$id =$_POST['del_id'];
	$user->userAction($id,0);
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



      //handle fetch notification
      if(isset($_POST['action']) && $_POST['action']=='fetchNotification'){
		$notification = $user->fetchNotification();
		$output = '';

		if($notification){
		   foreach($notification as $row){
			   $subject = $row['subject'];
			  $output .= '   <div class="alert m-2 border bg-white border-dark shadow" role="alert">
			  <button type="button" id=" '.$row['id'].' " class="close" data-dismiss="alert" aria-label="close">
			  <span aria-hidden="true">&times;</span>
			  </button>
			  <h4 class="alert-heading">New Notification</h4>
			  <p class="mb-0  alert-primary p-2  rounded">'.$row['type'].'</p>
			  <p class="mb-0 alert-success rounded p-2 ">'.$user->read_more(20,$subject).'</p>
		   
			  <hr class="my-2">
			  <p class="mb-0 float-left">From '.$row['name'].'</p>
			  <p class="mb-0 float-right text-secondary">'.$user->timeInAgo($row['created_at']).'</p>
			  <div class="clearfix"></div>
		   </div>';
		   }
		   echo $output;
		}
		else{
		   echo '<h3 class="text-center text-dark mt-5">No any new notification</h3>';
		}
	 }

	// handle check notification
	if(isset($_POST['action'])&& $_POST['action']=='checkNotification'){
		if($user->fetchNotification()){
			echo '<i class="fas fa-circle text-danger fa-sm"></i>';
		}
		else{
			echo'';
		}
	}
 //remove notification
 if(isset($_POST['notification_id'])){
	$id = $_POST['notification_id'];
	$user->removeNotification($id);
 }

// handle export all users into excel
if(isset($_GET['export']) && $_GET['export']== 'excel'){
	header("Content-Type:application/xls");
	header("Content-Disposition: attachment; filename=users.xls");
	header("Pragma:no-cache");
	header("Expires: 0");

	$data = $user->exportAllusers();
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


// fetch feedback details by id ajax request

if(isset($_POST['feedbackdetails_id'])){
	$id= $_POST['feedbackdetails_id'];

	$data = $user->fetchfeedbackDetailsByID($id);
	echo json_encode($data);
}

// handle fetch notice details by id ajax request

if(isset($_POST['Noticeboard_details_id'])){
	$id= $_POST['Noticeboard_details_id'];

	$data = $user->fetchAllPost_detail_modal($id);
	echo json_encode($data);
	
}

// handle fetch comment details by id ajax request
if(isset($_POST['comment_detail'])){
	$id= $_POST['comment_detail'];

	$data = $user->fetchAllComment_detail_modal($id);
	echo json_encode($data);
	
}

// handle fetch general comment details by id ajax request
if(isset($_POST['general_comment_detail'])){
	$id= $_POST['general_comment_detail'];

	$data = $user->fetchAllGeneralComment_detail_modal($id);
	echo json_encode($data);
	
	
}


// handle fetch general comment details by id ajax request
if(isset($_POST['gen_comment_detail'])){
	$id= $_POST['gen_comment_detail'];

	$data = $user->fetchAllComment_detail_modal($id);
	echo json_encode($data);
	
}

// handle fetch deleted notice details by id ajax request

if(isset($_POST['Noticeboard_del_details_id'])){
	$id= $_POST['Noticeboard_del_details_id'];

	$data = $user->Notice_detail_modal($id);
	echo json_encode($data);
	
}

/// handle edit noticeboard ajax request
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
	$level = $user->test_input($_POST['level']);
	$program = $user->test_input($_POST['program']);
	// $image = $user->test_input($_POST['image']);
	// $image = $_POST['image']['name'];
	//   $filetmpname = $_POST['image']['tmp_name'];

	//   $folder = 'imagesuploadedf/'.basename($image);
	//   move_uploaded_file($filetmpname, $folder.$image);
	$user->update_notice($id,$title,$body,$posted_by,$type,$level,$program);
	// print_r($_POST);
	// $cuser->notification($cid, 'admin','Note updated');
 }

 // handle update notice  ajax request
if(isset($_POST['action']) && $_POST['action']== 'post_comment'){
	$id = $user->test_input($_POST['id']);
	$title = $user->test_input($_POST['post_title']);
	$body = $user->test_input($_POST['post_title']);
	

	// $user->update_notice($id,$title,$body);

 }



?>



