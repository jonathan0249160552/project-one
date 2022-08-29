<?php
require_once 'session.php';
// require 'user-admin/assets/php/action.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

//handle new note
if(isset($_POST['action']) && $_POST['action']=='add_note'){
   $title =$cuser->test_input($_POST['title']);
   $note=$cuser->test_input($_POST['note']);
  
   $cuser->add_new_note($cid,$title,$note);
   // $cuser->notification($cid, 'admin','Note added');

}


//handle past Question 

if(isset($_POST['action']) && $_POST['action'] == 'fetchAllPastQuestion' ){
	$output='';
	$data = $cuser->fetchAllPastQuestion($clevel,$cprogram);
	$path = '../assets/php/';
	if($data){
		$output.= '<table class="table table-striped table-bordered text-center  ">
		<thead>
			<tr>
         <th class="">Action</th>
         <th class="">Course Name</th>
         <th class="">Course Code</th>
         <th class="">File Name</th>
          <th class="">File Type</th>
         <th class="">Date Uploaded</th>
			</tr>
		</thead>
		<tbody>';
		foreach ($data as $row){
		
			$output .='<tr >
         <td class=" "><a class="btn font-weight-bold text-success" href="user-admin/download_questions.php?id=' .$row['id']. 'class="btn font-weight-bold text-success"><span class="glyphicon glyphicon-download"></span> Download</a>
			<td>'.$row['Course_name'].'</td>
			<td>'.$row['Course_code'].'</td>
			<td>'.substr($row['filename'],0 , 30).  '</td>
         <td>'.$row['file_type'].'</td>
			<td>'.$cuser->timeInAgo($row['uploaded_date']).'</td>
   
		
		</tr>';
		}
			$output.= '</tbody>
					</table>';
					
					echo $output;


	}
	else{
		echo '<h4 class="text-center text-muted">:(No Past Question Posted for '.$cprogram.' yet</h4>';
	}
}

//handle course materials

if(isset($_POST['action']) && $_POST['action'] == 'fetchAllCoureMaterail' ){
	$output='';
	$data = $cuser->fetchAllCourseMaterail($clevel,$cprogram);
	$path = '../assets/php/';
	if($data){
		$output.= '<table class="table table-striped table-bordered text-center  ">
		<thead>
			<tr>
         <th class="">Action</th>
         <th class="">Course Name</th>
         <th class="">Course Code</th>
         <th class="">File Name</th>
          <th class="">File Type</th>
         <th class="">Date Uploaded</th>
			</tr>
		</thead>
		<tbody>';
		foreach ($data as $row){
		
			$output .='<tr >
         <td class=" "><a class="btn font-weight-bold text-success" href="user-admin/download.php?id=' .$row['id']. 'class="btn font-weight-bold text-success"><span class="glyphicon glyphicon-download"></span> Download</a>
			<td>'.$row['Course_name'].'</td>
			<td>'.$row['Course_code'].'</td>
			<td>'.substr($row['filename'],0 , 30).  '</td>
         <td>'.$row['file_type'].'</td>
			<td>'.$cuser->timeInAgo($row['date_uploaded']).'</td>
   
		
		</tr>';
		}
			$output.= '</tbody>
					</table>';
					
					echo $output;


	}
	else{
		echo '<h4 class="text-center text-muted">:(No Course Materials for '.$cprogram.' posted yet </h4>';
	}
}



//handle all course 

if(isset($_POST['action']) && $_POST['action'] == 'fetchAllCourse' ){
	$output='';
	$data = $cuser->fetchAllCourse($clevel,$cprogram);
	$path = '../assets/php/';
	if($data){
		$output.= '<table class="table table-striped table-bordered text-center  ">
		<thead>
			<tr>
         <th class="">Course Name</th>
         <th class="">Course Code</th>
         <th class="">Level</th>
         <th class=""> Semester</th>
          <th class="">Credit Hours</th>
         <th class="">Date Uploaded</th>
			</tr>
		</thead>
		<tbody>';
		foreach ($data as $row){
	
			$output .='<tr >

			<td>'.$row['Course_name'].'</td>
			<td>'.$row['course_code'].'</td>
         <td>'.$row['level'].'</td>
         <td>'.$row['semester'].'</td>
         <td>'.$row['credit_hours'].'</td>
         
      
			<td>'.$cuser->timeInAgo($row['uploaded_date']).'</td>
   
		
		</tr>';
		}
			$output.= '</tbody>
					</table>';
					
					echo $output;


	}
	else{
      
		echo '<h4 class="text-center text-muted">:(No Courses posted for '.$cprogram.' yet </h4>';
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



//handle fetch all class notice  ajax request

if(isset($_POST['action']) && $_POST['action'] == 'fetch' ){
	$output='';
	$data = $cuser->fetchAll_Notice_db($clevel,$cprogram);
	$path = 'user-admin/assets/php/imagesuploadedf/';
	if($data){
		$output.= '';
		foreach ($data as $row){
			if($row['image']!=''){
				$photo = $path.$row['image'];
			}
			else{
				$photo ='assets/img/Va2.PNG';
			}
         $notice_body = $row['body'];
			$output .='<div  class="Lastestnews   blog">
            <div class="container" >
             <div class="row justify-content-center modal-body  ">
                 <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 margin  " >
                   
                     <div class="news-box card" >
                       <div class=" pt-1 pl-2 pr-2 text-center" style="background-color:#07021b">
                       <h2 class="font-weight-bold text-white ">'.$row['type'].'</h2></div>
                       
                      <div class="">   <figure><img id="popup" src="'.$photo
                      .' " alt="img" style="width:100%;height:300px;"  /></figure></div>
                         <h3>'.$row['title'].'</h3>

                         <p id="p" class="read_more" style="ali" >'.$cuser->read_more(30,$notice_body).'...<span class="text-primary">Read More</span></p><p id="p" class="read_less " style="display:none">'.$cuser->read_more(9000,$notice_body).'<span class="text-primary">Read Less</span></p>
                         
                         <p  class="mb-0 float-left font-italic">By : '.$row['posted_by'].'</p> 
                            


<div class="clearfix"> <a href="#" id="'.$row['id'].'" 
                             title="View Details" class="text-primary m-2 p-2 float-left fa-lg  userDetailsIcon" data-toggle="modal" data-target="#showUserDetailsModal"><i class="fas fa-info-circle fa-lg"></i></a>
                             <a href="#" id="'.$row['id'].'" 
                             title="Posted Comments" style="font: size 30px;" class="text-primary float-left pt-2 mt-2 fa-lg CommentClassBtn" data-toggle="modal"  
                             data-target="#showUserCommentsClassModal">
                             <i class="fas fa-comments fa-lg text-success "></i>&nbsp;&nbsp;</a>

                             <a   style="font: size 30px;" class="text-primary float-left pt-2 mt-2 fa-lg " > <i class="fas text-info fa-clock fa-lg"></i>&nbsp; '.$cuser->timeInAgo($row['created_at']).'</a>

        </div>
                             
                          </div >
                     
                 </div>
          
             </div>
          </div>
          </div>
          
             </div>';
		}
			
					
					echo $output;


	}
	else{
		echo '<h4 class="text-center font-weight-bold m-2 text-dark">:( No New Notice yet </h4>';
	}
}



// handle fetch all general notice

if(isset($_POST['action']) && $_POST['action'] == 'FetchAllGeneralNotice' ){
	$output='';
	$data = $cuser->fetchAll_GeneralNotice_db();
	$path = 'user-admin/assets/php/imagesuploadedf/';
	if($data){
		$output.= '';
		foreach ($data as $row){
			if($row['image']!=''){
				$photo = $path.$row['image'];
			}
			else{
				$photo ='assets/img/Va2.PNG';
			}
         $notice_body = $row['body'];
      
    
               // echo read_more(1,$notice_body);
			$output .='<div  class="Lastestnews   blog">
            <div class="container" >
             <div class="row justify-content-center modal-body  ">
                 <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 margin  " >
                   
                     <div class="news-box card" >
                       <div class=" pt-1 pl-2 pr-2 text-center" style="background-color:#07021b">
                       <h2 class="font-weight-bold text-white ">'.$row['type'].'</h2></div>
                       
                      <div class="card">   <figure><img id="popup" src="'.$photo.' " alt="img" style="width:100%;height:300px;"  /></figure></div>
                         <h3>'.$row['title'].'</h3>
                       <p id=" '.$row['id'].' " class="read_more" >'.$cuser->read_more(30,$notice_body).'...<span class="text-primary">Read More</span></p>
                       <p id=" '.$row['id'].' class="read_less " style="display:none">'.$cuser->read_more(9000,$notice_body).'<span class="text-primary">Read Less</span></p>

                         <p  class="mb-0 float-left font-italic">By : '.$row['posted_by'].'</p> 
  
                             <div class="clearfix"> <a href="#" id="'.$row['id'].'" 
                             title="View Details" class="text-primary m-2 p-2 float-left fa-lg  Gen_view_detailBtn" data-toggle="modal" data-target="#showUserGenDetailsModal"><i class="fas fa-info-circle fa-lg"></i></a>
                             <a href="#" id="'.$row['id'].'" 
                             title="Posted Comments" style="font: size 30px;" class="text-primary float-left pt-2 mt-2 fa-lg General_commentBtn" data-toggle="modal"  
                             data-target="#showUserGenCommentsModal">
                             <i class="fas fa-comments fa-lg text-success "></i>&nbsp;&nbsp;</a>

                             <a   style="font: size 30px;" class="text-primary float-left pt-2 mt-2 fa-lg " > <i class="fas text-info fa-clock fa-lg"></i>&nbsp; '.$cuser->timeInAgo($row['created_at']).'</a>

        </div>
                             
                          </div >
                     
                 </div>
          
             </div>
          </div>
          </div>
          
             </div>';

             
		}
			
					
					echo $output;


	}
	else{
		echo '<h4 class="text-center font-weight-bold m-2 text-success">:( No New Notice yet </h4>';
	}
}


// handle edit note of a user ajax request

if(isset($_POST['edit_id'])){
   $id = $_POST['edit_id'];

   $row =$cuser->edit_note($id);
   echo json_encode($row);
}

// general post comment handle ajax request

if(isset($_POST['commentGeneral_id'])){
	$id = $_POST['commentGeneral_id'];

	$row =$cuser->NoticeGeneral($id);
 
	echo json_encode($row);
 }



 
// class post comment handle ajax request

if(isset($_POST['commentClass_id'])){
	$id = $_POST['commentClass_id'];
  
	$row =$cuser->postCommentClass($id);
  
	echo json_encode($row);
   // print_r($_POST); 
 }


 


// handle update notes of a user ajax request
if(isset($_POST['action']) && $_POST['action']== 'update_note'){
   $id = $cuser->test_input($_POST['id']);
   $title = $cuser->test_input($_POST['title']);
   $note = $cuser->test_input($_POST['note']);

   $cuser->update_note($id,$title,$note);
   // $cuser->notification($cid, 'admin','Note updated');
}

// handle detele a note of a user ajax Requesst
if(isset($_POST['del_id'])){
   $id = $_POST['del_id'];
   // $cuser->notification($cid, 'admin','Note deleted');
   $cuser->delete_note($id);
}




if(isset($_POST['info_id'])){
   $id = $_POST['info_id'];

   $row =$cuser->edit_note($id);
   echo json_encode($row);
}

// handle profile update Ajax Request 
if(isset($_FILES['image'])){
  $name = $cuser->test_input($_POST['name']);
  $gender = $cuser->test_input($_POST['gender']);
  $dob = $cuser->test_input($_POST['dob']);
  $phone = $cuser->test_input($_POST['phone']);
   $program = $cuser->test_input($_POST['program']);
   $level = $cuser->test_input($_POST['level']);

  $oldImage = $_POST['oldimage']; 
  $folder ='uploads/';

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
  $cuser->update_profile($name,$gender,$dob,$phone,$newImage,$cid,$program,$level);
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

      // handle verify email ajax request
      if(isset($_POST['action']) && $_POST['action']=='verify_email'){
         try{
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = Database::USERNAME;                     // SMTP username
            $mail->Password   = Database::PASSWORD;                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587; 
    
            //Recipients
            $mail->setFrom(Database::USERNAME,'KEEN');
            $mail->addAddress($cemail); 
    
             // Content
            $mail->isHTML(true);  
            $mail->Subject = 'E-mail Verification';
            $mail->Body    = '<h3>Click the below link to verify your E-Mail.<br><a
            href="http://localhost/user/verify-email.php?email='.$cemail.'">
         Click here
            </a><br>Regards from<br>KEEN !!!</h3>'; 
            
            $mail->send();
            echo $cuser->showMessage('success','E-Mail verification link sent successfully. <strong>Please check your e-mail!</strong>');
        }
        catch(Exception $e){
            // echo $e;
            
          echo   $cuser->showMessage('danger','Something went wrong please try again later!');
        }
    
      }
// fetch all class comments

      if(isset($_POST['action']) && $_POST['action']=='fetchAllComments'){
         $feedback = $cuser->fetchComments($clevel,$cprogram);
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
               $notice_body = $row['comments'];

               $output .= '  
               <div class="pb-5">
              
                <div class="team  img-fluid ">
                  <div class="team_member rounded mt-4 card">
                    <div class="team_img">
                    <img src="'.$uphoto.'" class="rounded-circle m   align-self-center" width="250px" alt="">
                    </div><h3>'.$row['name'].'</h3>
                    <p id="p" class="text-dark font-weight-bold  ">'.$row['title'].'</p>
                    <p id="p" class="com_read_more " >'.$cuser->read_more(15,$notice_body).'...<small class="text-primary">&nbsp;<i class="fas fa-chevron-circle-down"></i></small></p><p id="p" class="com_read_less " style="display:none">'.$cuser->read_more(9000,$notice_body).'&nbsp;<small class="text-primary">&nbsp;<i class="fas fa-chevron-circle-up"></i></small></p></p>
                 
                    <small class="text-primary font-weight-bold  pt-5">Posted '.$cuser->timeInAgo($row['created_at']).'</small>
                    </div> 
                    </div>
                    
                    
                    </div>	
              ';
            }
            echo $output;
         }
         else{
            // echo '<h4 class="text-center text-white mb-2">No any new Comments</h4>';
         }
      }



      // fetch all class anonymous comments

      if(isset($_POST['action']) && $_POST['action']=='fetchAllComments'){
         $feedback = $cuser->fetchClassAnonymousComments($clevel,$cprogram);
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

               $notice_body =$row['comments'];
               $output .= '
                 
               <div class="pb-5">
              
                <div class="team  img-fluid ">
                  <div class="team_member rounded mt-4 card">
                    <div class="team_img">
                    <img src="assets/img/profile.png" class="rounded-circle m   align-self-center" width="250px" alt="">
                    </div><h3>Anonymous</h3>
                    <p id="p" class="text-dark font-weight-bold  ">'.$row['title'].'</p>
                    <p id="p" class="com_read_more " >'.$cuser->read_more(15,$notice_body).'...<small class="text-primary">&nbsp;<i class="fas fa-chevron-circle-down"></i></small></p><p id="p" class="com_read_less " style="display:none">'.$cuser->read_more(9000,$notice_body).'&nbsp;<small class="text-primary">&nbsp;<i class="fas fa-chevron-circle-up"></i></small></p></p>
                 
                    <small class="text-primary font-weight-bold  pt-5">Posted '.$cuser->timeInAgo($row['created_at']).'</small>
                    </div> 
                    </div>
                    
                    
                    </div>	
              ';
            }
            echo $output;
         }
         
      }


      // fetch all general comments
      if(isset($_POST['action']) && $_POST['action']=='fetchGeneralComments'){
         $feedback = $cuser->fetchGeneralComments();
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
               $notice_body = $row['comments'];
               $output .= '  
               <div class="pb-5">
              
                <div class="team  img-fluid ">
                  <div class="team_member rounded mt-4 card">
                    <div class="team_img">
                    <img src="'.$uphoto.'" class="rounded-circle align-self-center" width="250px" alt="">
                    </div><h3>'.$row['name'].'</h3>
                    <p id="p" class="text-dark font-weight-bold  ">'.$row['title'].'</p>
                    
                    <p id="p" class="com_read_more" >'.$cuser->read_more(15,$notice_body).'...<small class="text-primary">&nbsp;<i class="fas fa-chevron-circle-down"></i></small></p><p id="p" class="com_read_less " style="display:none">'.$cuser->read_more(9000,$notice_body).'&nbsp;<small class="text-primary">&nbsp;<i class="fas fa-chevron-circle-up"></i></small></p></p>
                         
                 
                    <small class="text-primary font-weight-bold pt-5">Posted '.$cuser->timeInAgo($row['created_at']).'</small>
                    </div> 
                    </div>
                    
                    
                    </div>	
              ';
            }
            echo $output;
         }
         else{
            echo '<h4 class="text-center text-white mb-2">No any new Comments from General Notice</h4>';
         }
      }



       // fetch all general anonymous comments
       if(isset($_POST['action']) && $_POST['action']=='fetchGeneralComments'){
         $feedback = $cuser->fetchGeneralAnonymousComments();
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

               $notice_body = $row['comments'];
               $output .= '  
               <div class="pb-5">
              
                <div class="team  img-fluid ">
                  <div class="team_member rounded mt-4 card">
                    <div class="team_img">
                    <img src="assets/img/profile.png" class="rounded-circle m   align-self-center" width="250px" alt="">
                    </div><h3>Anonymous</h3>
                    <h5 class="text-dark font-weight-bold ">'.$row['title'].'</h5>
                    
                  
                    <p id="p" class="com_read_more " >'.$cuser->read_more(15,$notice_body).'...<small class="text-primary">&nbsp;<i class="fas fa-chevron-circle-down"></i></small></p><p id="p" class="com_read_less " style="display:none">'.$cuser->read_more(9000,$notice_body).'&nbsp;<small class="text-primary">&nbsp;<i class="fas fa-chevron-circle-up"></i></small></p></p>
                 
                    <small class="text-primary font-weight-bold pt-5">Posted '.$cuser->timeInAgo($row['created_at']).'</small>
                    </div> 
                    </div>
                    
                    
                    </div>	
              ';
            }
            echo $output;
         }
        
      }


      // handle send feedback to admin ajax Request

      if(isset($_POST['action']) && $_POST['action'] =='feedback'){
         
         $subject = $cuser->test_input($_POST['subject']);
         $feedback= $cuser->test_input($_POST['feedback']);
         $level = $cuser->test_input(($_POST['level']));
         $program =$cuser->test_input(($_POST['program']));
          $cuser->send_feedback($cid,$subject,$feedback,$level,$program);
         $cuser->notification($cid,$subject,$type,$program,$level);
         
          
      }



    // post  general comments
    if(isset($_POST['action']) && $_POST['action'] =='post_general_comments'){
      $type = 'General Comment Posted';
      $title = $cuser->test_input($_POST['gen_post_title']);
      $comments= $cuser->test_input($_POST['gen_post_comment']);
  
      $cprogram= $cuser->test_input($_POST['program']);
      $clevel= $cuser->test_input($_POST['level']);
      $cuser->send_general_comment($cid,$title,$comments,$cprogram,$clevel);
      $cuser->notification($cid,$type,$title,$cprogram,$clevel);

   }

 

     // post  class comments
     if(isset($_POST['action']) && $_POST['action'] =='post_class_comments'){
      $type = 'Class Comment Posted';
      $title = $cuser->test_input($_POST['class_post_title']);
      $comments= $cuser->test_input($_POST['class_post_comment']);
     $anonymous = '1';
      $cprogram= $cuser->test_input($_POST['program']);
      $clevel= $cuser->test_input($_POST['level']);
      $cuser->send_class_comment($cid,$title,$comments,$cprogram,$clevel,$anonymous);
      $cuser->notification($cid,$type,$title,$cprogram,$clevel);
    
   }




  // post general anonymous  comments
  if(isset($_POST['action']) && $_POST['action'] =='gen_ano_comment'){
   $type = 'Anonymous General Comment Posted';
   // $id = $cuser->test_input(($_POST['id']));
   $title = $cuser->test_input($_POST['gen_ano_post_title']);
   $comments= $cuser->test_input($_POST['gen_ano_post_body']);
   $anonymous = $cuser->test_input($_POST['anonymous']);
   $cprogram= $cuser->test_input($_POST['program']);
   $clevel= $cuser->test_input($_POST['level']);
   $cuser->send_general_ano_comment($cid,$title,$comments,$cprogram,$clevel,$anonymous);
   $cuser->notification($cid,$type,$title,$cprogram,$clevel);

}





  // post class anonymous  comments
  if(isset($_POST['action']) && $_POST['action'] =='class_post_ano_comment'){
   $type = 'Anonymous Class Comment Posted';
   
   $title = $cuser->test_input($_POST['class_ano_post_title']);
   $comments= $cuser->test_input($_POST['class_ano_post_body']);

   $cprogram= $cuser->test_input($_POST['program']);
   $clevel= $cuser->test_input($_POST['level']);
   $cuser->send_class_ano_comment($cid,$title,$comments,$cprogram,$clevel);
   $cuser->notification($cid,$type,$title,$cprogram,$clevel);

  
}



      //handle fetch notification
      if(isset($_POST['action']) && $_POST['action']=='fetchNotification'){
         $notification = $cuser->fetchNotification($cid);
         $output = '';

         if($notification){
            foreach($notification as $row){
               $output .= '  <div class="alert m-2 border border-dark shadow">
                           <button type="button" id=" '.$row['id'].' " class="close" data-dismiss="alert" aria-label="close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                           <h4 class="alert-heading">New Notification</h4>
                           <p class="mb-0 lead">'.$row['message'].'</p>
                           <hr class="my-2">
                           <p class="mb-0 float-left">Reply of feedback from Admin</p>
                           <p class="mb-0 float-right">'.$cuser->timeInAgo($row['created_at']).'</p>
                           <div class="clearfix"></div>
                        </div>
                        
                        
                        
                        ';
            }
            echo $output;
         }
         else{
            echo '<h4 class="text-center text-dark mt-5">No any new notification</h4>';
         }
      }

  
   
      //check notification
      if(isset($_POST['action']) && $_POST['action']=='checkNotification'){
         if($cuser->fetchNotification($cid)){
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
