<?php
require_once 'session.php';
// require 'action.php';




//handle new note
if(isset($_POST['action']) && $_POST['action']=='add_note'){
   $title =$cuser->test_input($_POST['title']);
   $note=$cuser->test_input($_POST['note']);
  
   $cuser->add_new_note($cid,$title,$note);
//    $cuser->notification($cid, 'admin','Note added');

}




//handle fetch all courses ajax request

if(isset($_POST['action']) && $_POST['action'] == 'display_course' ){
	$output='';
	$data = $cuser->fetchAllCourse($clevel,$cprogram);
	$path2 = 'assets/php/imagesuploadedf/';
	if($data){
		$output.= '<table class="table table-striped table-bordered text-center  ">
		<thead>
			<tr>
				<th>Action</th>
				<th>Course Name</th>	
				<th>Course Code</th>
				<th>Semester </th>
				<th>Credit Hours</th>
				<th>Program</th>
				<th>Level</th>
				<th>Date Uploaded</th>
				
			
			
			</tr>
		</thead>
		<tbody>';
		foreach ($data as $row){
			
			$output .='<tr >
			<td> <button class="btn text-danger deleteBtn" type="button" id="'.$row['id'].'">
			<span class="glyphicon glyphicon-trash"></span> Remove</button></td>
			<td>'.$row['Course_name'].'</td>
			<td>'.$row['course_code'].'</td>
			<td>'.$row['semester'].'</td>
			<td>'.$row['credit_hours'].'</td>
			<td>'.$row['program'].'</td>
			<td>'.$row['level'].'</td>
			<td>'.$cuser->timeInAgo($row['uploaded_date']).'</td>
			
			
		
		</tr>';
		}
			$output.= '</tbody>
					</table>';
					
					echo $output;


	}
	else{
		echo '<h4 class="text-center text-muted">:(No any new Course posted yet </h4>';
	}
}



//handle fetch all past question posted ajax request

if(isset($_POST['action']) && $_POST['action'] == 'display_past_question' ){
	$output='';
	$data = $cuser->fetchAllPatQuestion($clevel,$cprogram);
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
				<th>Credit Hours</th>
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
			<td>'.$row['credit_hours'].'</td>
			<td>'.$row['filename'].'</td>
			<td>'.$cuser->timeInAgo($row['uploaded_date']).'</td>
			
			
		
		</tr>';
		}
			$output.= '</tbody>
					</table>';
					
					echo $output;


	}
	else{
		echo '<h4 class="text-center text-muted">:(No any new Past Question posted yet </h4>';
	}
}




//handle fetch all course material  ajax request

if(isset($_POST['action']) && $_POST['action'] == 'display_course_materails' ){
	$output='';
	$data = $cuser->fetchAllCourseMaterials($clevel,$cprogram);
	$path2 = 'assets/php/imagesuploadedf/';
	if($data){
		$output.= '<table class="table table-striped table-bordered text-center  ">
		<thead>
			<tr>
			
				<th>Action</th>
				<th>Program </th>
				<th>Level</th>
				<th>Course Name</th>	
				<th>Course Code</th>
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
			<td>'.$row['program'].'</td>
			<td>'.$row['level'].'</td>
			<td>'.$row['Course_name'].'</td>
			<td>'.$row['Course_code'].'</td>
			<td>'.$row['level'].'</td>
			<td>'.$row['semester'].'</td>
			<td>'.$row['credit_hours'].'</td>
			<td>'.$row['filename'].'</td>
			<td>'.$cuser->timeInAgo($row['date_uploaded']).'</td>
			
			
			
		
		</tr>';
		}
			$output.= '</tbody>
					</table>';
					
					echo $output;


	}
	else{
		echo '<h4 class="text-center text-muted">:(No any new Course Materials posted yet </h4>';
	}
}

if(isset($_POST['Comment_details_id'])){
	$id = $_POST['Comment_details_id'];
	
	$data = $user->fetchAllCommentDetails($id);
	echo json_encode($data);
}




//handle fetch all feedback  ajax request

if(isset($_POST['action']) && $_POST['action'] == 'show_feedbacks' ){
	$output='';
	$data = $cuser->fetchFeedback($clevel,$cprogram);
	// $path2 = 'assets/php/imagesuploadedf/';
	if($data){
		$output.= '<table class="table table-striped table-bordered text-center  ">
		<thead>
			<tr>
			<th>Action</th>
				<th>Subject</th>
				<th>Feedback</th>
				<th>Name</th>
				<th>Index Number</th>
				<th>E-Mail</th>
				
				<th>Sent On</th>
				
			</tr>
		</thead>
		<tbody>';
		foreach ($data as $row){
		
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
			<td>'.$subject.'</td>
			<td>'.$cuser->read_more(20,$feedback).'</td>
			<td>'.$row['name'].'</td>
			<td>'.$row['index_number'].'</td>
			<td>'.$row['email'].'</td>
			
			<td>'.$cuser->timeInAgo($row['created_at']).'</td>
		
	
		</tr>';
		}
			$output.= '</tbody>
					</table>';
					
					echo $output; 


	}
	else{
		echo '<h4 class="text-center text-muted">:(No any feedback yet </h4>';
	}
}
// handle display all notes fo a user

if(isset($_POST['action'])&& $_POST['action']=='display_notes'){
   $output='';

   $notes = $cuser->get_notes($cid);

   if($notes){
      $output .= ' <table class="table table-striped text-center">
      <thead>
      <tr>
      <th>#</th>
      <th style="font-size:18px">Title</th>
      <th style="font-size:18px">Note</th>
      <th style="font-size:18px">Action</th>
      </tr>
      </thead>
      <tbody>';

      foreach ($notes as $row){
         $output .= '<tr>
         <td style="font-size:18px">'.$row['id'].'</td>
         <td style="font-size:18px" class="" >'.$row['title'].'</td>
         <td style="font-size:18px">'.substr($row['note'],0,75).'...</td>
         <td>
         <a href="#" id="'.$row['id'].'" title="View Details" class="text-success infoBtn" >
         <i class="fas fa-info-circle fa-lg"></i></a>&nbsp;
 
         <a href="#" id="'.$row['id'].'" title="Edit Note" class="text-primary editBtn" >
         <i class="fas fa-edit fa-lg" data-toggle="modal" data-target="#editNoteModal"></i></a>&nbsp;
         
         <a href="#" id="'.$row['id'].'" title="Delete Note" 
         class="text-danger deleteBtn" ><i class="fas fa-trash-alt fa-lg"></i></a>
          </td>
         </tr>';
      }
      $output .= '</tbody></table>';
      echo $output;
   }
   else{
     echo '<h4 class="text-center text-dark">:( You have not written any note yet!
      Write your first note now!</h4>';
   }
}



// handle fetch all deleted users ajax request
if(isset($_POST['action']) && $_POST['action'] == 'fetchAllDeletedUsers' ){
	$output='';
	$data = $cuser->fetchAllDeletedUsers($clevel,$cprogram);
	$path = '../assets/php/';
	$message = '<p class=" text-danger font-weight-bold m-2">Not Verified</p>';
	if($data){
		$output.= '<table class="table table-striped table-bordered text-center  ">
		<thead>
			<tr>	
				<th>Action</th>
				<th>Action</th>
				<th>Id</th>
				<th>Image</th>
				<th>Name</th>
				<th>Index Number</th>
				<th>E-Mail</th>
				<th>Phone</th>
				<th>Gender</th>
				<th>Verified</th>
				<th>Registered On</th>
			</tr>
		</thead>
		<tbody>';
		foreach ($data as $row){
			$email_verification = $message.$row['verified'];
			$registered_On = $row['created_at'];
			$registered_On = date('d M Y',strtotime($registered_On));
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
			&nbspRestore<td></a> 

			<a href="#" id="'.$row['id'].'" 
			title="View Details" class="text-primary m-2 p-2 userDetailsDelIcon " data-toggle="modal" data-target="#showUserDeletedDetailsModal">
			<i class="fas fa-info-circle fa-lg"></i>&nbsp;&nbsp;</a>
			
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
		<td>'.$registered_On.'</td>
		
		</tr>';
		}
			$output.= '</tbody>
					</table>';
					
					echo $output;


	}
	else{
		echo '<h4 class="text-center text-muted">:(No any user is deleted yet </h4>';
	}
}

//
//handle fetch all users ajax request

if(isset($_POST['action']) && $_POST['action'] == 'fetchAllUsers' ){
	$output='';
	$data = $cuser->fetchAllUsers($clevel,$cprogram);
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
				<th>Registered On</th>
			
			</tr>
		</thead>
		<tbody>';
		foreach ($data as $row){
			$email_verification = $message.$row['verified'];
			$registered_On = $row['created_at'];
			$registered_On = date('d M Y',strtotime($registered_On));
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
			<td>'.$registered_On.'</td>
		
		</tr>';
		}
			$output.= '</tbody>
					</table>';
					
					echo $output;


	}
	else{
		echo '<h4 class="text-center text-muted">:(No any user is registered yet </h4>';
	}
}

//handle display user in detail ajax request

if(isset($_POST['details_id'])){
	
	$cid= $_POST['details_id'];

	$data = $cuser->fetchUserDetailsByID($cid);
	echo json_encode($data);
}



if(isset($_POST['del_user_details_id'])){
	
	$cid = $_POST['del_user_details_id'];

	$data = $cuser->fetchAllDeletedUsersDetails($cid);
	echo json_encode($data);
}

	// handle check notification
	if(isset($_POST['action'])&& $_POST['action']=='checkNotification'){
		if($cuser->fetchNotification($clevel,$cprogram)){
        
			echo '<i class="fas fa-circle text-danger fa-sm"></i>';
		}
		else{
			echo'';
		}
	}

	
//        //handle fetch notification
// 	   if(isset($_POST['action']) && $_POST['action']=='fetchNotification'){
// 		$notification = $cuser->fetchNotification($clevel,$cprogram);
// 		$output = '';
// $type ="";
// 		if($notification){
// 		   foreach($notification as $row){
// 			  $output .= '  <div class="alert alert-dark" role="alert">
// 						  <button type="button" id=" '.$row['id'].' " class="close" data-dismiss="alert" aria-label="close">
// 						  <span aria-hidden="true">&times;</span>
// 						  </button>
// 						  <h4 class="alert-heading">New Notification</h4>
// 						  <p class="mb-0 lead">'.$row['message'].' by </p>
// 						  <hr class="my-2">
// 						  <p class="mb-0 float-left"><b> User E-Mail :  </b> </p>
// 						  <p class="mb-0 float-right">'.$cuser->timeInAgo($row['created_at']).'</p>
// 						  <div class="clearfix"></div>
// 					   </div>';
// 		   }
// 		   echo $output;
// 		}
// 		else{
// 		   echo '<h3 class="text-center text-dark mt-5">No any new notification</h3>';
// 		}
// 	 }

	 // restore deleted

	 if(isset($_POST['res_id'])){
		$cid =$_POST['res_id'];
		$cuser->userAction_Restore_user($cid);
	}
	

 //remove notification
 if(isset($_POST['notification_id'])){
	$cid = $_POST['notification_id'];
	$cuser->removeNotification($id);
 }

//handle delete user ajax request
if(isset($_POST['del_id'])){
	$cid =$_POST['del_id'];
	$cuser->userAction($cid,0);
}

// handle edit note of a user ajax request

if(isset($_POST['edit_id'])){
   $cid = $_POST['edit_id'];

   $row =$cuser->edit_note($cid);
   echo json_encode($row);
}

// handle update notes of a user ajax request
if(isset($_POST['action']) && $_POST['action']== 'update_note'){
   $id = $cuser->test_input($_POST['id']);
   $title = $cuser->test_input($_POST['title']);
   $note = $cuser->test_input($_POST['note']);

   $cuser->update_note($id,$title,$note,$clevel,$cprogram);
   // $cuser->notification($cid, 'admin','Note updated',$clevel,$cprogram);
}

// handle detele a note of a user ajax Requesst
if(isset($_POST['del_id'])){
   $id = $_POST['del_id'];
   // $cuser->notification($cid, 'admin','Note deleted');
   $cuser->delete_note($id);
}

//fetch all feedback
if(isset($_POST['feedbackdetails_id'])){
	$id= $_POST['feedbackdetails_id'];

	$data = $cuser->fetchfeedbackDetailsByID($id);
	echo json_encode($data);
}

//handle delete user ajax request
if(isset($_POST['del_id'])){
	$cid =$_POST['del_id'];
	$cuser->userAction($cid,0);
}


//handle delete user ajax request
if(isset($_POST['del_id_past_question'])){
	$cid =$_POST['del_id_past_question'];
	$cuser->delete_past_Question($cid,1);
}

// handle deleted use details



//handle delete course ajax request


//handle delete course material ajax request
if(isset($_POST['del_id_course_material'])){
	$cid =$_POST['del_id_course_material'];
	$cuser->del_id_course_material($cid,1);
}

// //handle reply feedback to user ajax request
// if(isset($_POST['message'])){
// 	$uid = $_POST['uid'];
// 	$message = $user->test_input($_POST['message']);
// 	$fid = $_POST['fid'];
// 	$user->replyFeedback($uid, $message);
// 	$user->feedbackReplied($fid);
// print_r($_POST);
// }  

// fetch deleted feedback details by id
if(isset($_POST['feedDelbackdetails_id'])){
	$id= $_POST['feedDelbackdetails_id'];

	$row = $cuser->fetchDelNotice_Details($id);
	echo json_encode($row);
}

if(isset($_POST['info_id'])){
   $id = $_POST['info_id'];

   $row =$cuser->edit_note($id);
   echo json_encode($row);
}

// handle profile update Ajax Request 
if(isset($_FILES['image'])){
	$f_name = $cuser->test_input($_POST['f_name']);
	$s_name = $cuser->test_input($_POST['s_name']);
	$gender = $cuser->test_input($_POST['gender']);
	$age = $cuser->test_input($_POST['age']);
	$phone = $cuser->test_input($_POST['phone']);
	//  $program = $cuser->test_input($_POST['program']);
	 $level = $cuser->test_input($_POST['level']);
	 $username = $cuser->test_input($_POST['username']);
	 $email = $cuser->test_input($_POST['email']);
	
  
	$oldImage = $_POST['oldimage']; 
	$folder ='imagesuploadedf/';
  
	if(isset($_FILES['image']['name']) && ($_FILES['image']['name'] !="")){
	 $newImage = $folder.$_FILES['image']['name'];
	 move_uploaded_file($_FILES['image']['tmp_name'],$newImage);
  
	 if($oldImage != null){
		unlink($oldImage);
	 }
	}
	else{
	   $newImage= $oldImage;
	}
	$cuser->update_profile($cid,$username,$level,$f_name,$s_name,$newImage,$email,$gender,$age,$phone);
  //   $cuser->notification($cid, 'admin','Profile updated');
  }
  

// change password
if(isset($_POST['action']) && $_POST['action']== 'change_pass'){
    $currentPass = $_POST['curpass'];
    $newPass= $_POST['newpass'];
    $cnewPass = $_POST['cnewpass'];

    $hnewPass = Password_hash($newPass,PASSWORD_DEFAULT);

    if($newPass != $cnewPass){
       echo $cuser->showMessage('danger','Password did not match!');
    }
    else{
       if(password_verify($currentPass,$cpass)){
          $cuser->change_password($hnewPass,$cid);
          echo $cuser->showMessage('success','Password Change Successfully!');
         //  $cuser->notification($cid, 'admin','Password change');

       }
       else{
          echo $cuser->showMessage('danger','Current Password is Wrong!');
       }
    }
}

// display all comment 
    
      if(isset($_POST['action']) && $_POST['action']=='fetchAllPost'){
         $feedback = $cuser->fetchAllPost($clevel,$cprogram);
         $path = 'assets/php/';
         $output = '';
        
        
         if($feedback){
            foreach($feedback as $row){
               if($row['photo']!=''){
                  $uphoto = $path.$row['photo'];
               }
               else{
               	$uphoto ='assets/img/profile.png';
               }
               $output .= '  
               <div class="pb-5">
              
                <div class="team  img-fluid ">
                  <div class="team_member rounded mt-4 card">
                    <div class="team_img">
                    <img src="'.$uphoto.'" class="rounded-circle m   align-self-center" width="250px" alt="">
                    </div><h3>'.$row['name'].'</h3>
                    <p class="">'.$row['title'].'</p>
                      <p>'.$row['comment'].'</p>
                 
                    <small class="text-muted pt-5">Posted '.$cuser->timeInAgo($row['created_at']).'</small>
                    </div> 
                    </div>
                    
                    
                    </div>	
              ';
            }
            echo $output;
         }
         else{
            echo '<h4 class="text-center text-white mb-2">No any new Comments</h4>';
         }
      }

      

      // handle send feedback to admin ajax Request

      if(isset($_POST['action']) && $_POST['action'] =='feedback'){
         
         $subject = $cuser->test_input($_POST['subject']);
         $feedback= $cuser->test_input($_POST['feedback']);

        //  $cuser->send_feedback($subject,$feedback,$cid);
        //  $cuser->notification($cid, 'admin','Feedback written');
         
      }

      if(isset($_POST['action']) && $_POST['action'] =='comment'){
         
         $subject = $cuser->test_input($_POST['title']);
         $feedback= $cuser->test_input($_POST['comment']);

        //  $cuser->send_comment($subject,$feedback,$cid,$clevel,$cprogram);
         $cuser->notification($cid, 'admin','Comment posted',$clevel,$cprogram);
      }


      //handle fetch notification
      if(isset($_POST['action']) && $_POST['action']=='fetchNotification'){
         $notification = $cuser->fetchNotification($clevel,$cprogram);
         $output = '';

         if($notification){
            foreach($notification as $row){
               $output .= '  <div class="alert m-2 border bg-white border-dark shadow" role="alert">
                           <button type="button" id=" '.$row['id'].' " class="close" data-dismiss="alert" aria-label="close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                           <h4 class="alert-heading">New Notification</h4>
						   <p class="mb-0  alert-primary p-2  rounded">'.$row['type'].'</p>
						   <p class="mb-0 alert-success rounded p-2 ">'.$row['subject'].'</p>
                        
                           <hr class="my-2">
                           <p class="mb-0 float-left">From '.$row['name'].'</p>
                           <p class="mb-0 float-right text-secondary">'.$cuser->timeInAgo($row['created_at']).'</p>
                           <div class="clearfix"></div>
                        </div>';
            }
            echo $output;
         }
         else{
            echo '<h4 class="text-center text-dark mt-5">No any new notification</h4>';
         }
      }

  
   
      //check notification
      if(isset($_POST['action']) && $_POST['action']=='checkNotification'){
         if($cuser->fetchNotification($cprogram,$clevel)){
            echo '<i class="fas fa-circle fa-sm text-danger"></i>'; 
         }
         else{
           echo ''; 
         }
      }

      //remove notification
      if(isset($_POST['notification_id'])){
         $id = $_POST['notification_id'];
         $cuser->removeNotification($id);
      }

   
    
	
?>    