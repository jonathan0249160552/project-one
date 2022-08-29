<?php

require_once 'config.php';
class Auth extends Database {
// Register New User

public function register ($password,$username,$program,$level,$email,$phone,$f_name,$s_name) {
    $sql = "INSERT INTO admin_bsc_actu_sci (password,username,program,level,email,phone,f_name,s_name) VALUES (
    :password,:username,:program,:level,:email,:phone,:f_name,:s_name)";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([ 'password'=>$password,'username'=>$username,'program'=>$program,'level'=>$level,'email'=>$email,'phone'=>$phone,'f_name'=>$f_name,'s_name'=>$s_name]);
    return true;
}


public function register_program ($program) {
  $sql = "INSERT INTO program_table (program) VALUES (:program)";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute([ 'program'=>$program]);
  return true;
}




//edit noticeboard 

public function edit_noticeboard($id){
  $sql= "SELECT * FROM notice_board_bsc_actu_sci WHERE id = :id ";
  $stmt =$this->conn->prepare($sql);
  $stmt->execute(['id'=>$id]);

  $result = $stmt->fetch(PDO::FETCH_ASSOC);

  return $result;
}

 // update note of a user 
 public function update_notice($id,$title,$body,$posted_by,$type,$level,$program){
  $sql ="UPDATE notice_board_bsc_actu_sci SET title = :title,body=:body,posted_by = :posted_by,type= :type,:level,:program,created_at = NOW() 
  WHERE id=:id";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute(['id'=>$id,'title'=>$title,'body'=>$body,'posted_by'=>$posted_by,'type'=>$type,'level'=>$level,'program'=>$program]);
  return true;
}

//fetch all noticeboard users
public function fetchAllPost_detail_modal($id)
{
  $sql = "SELECT * FROM notice_board_bsc_actu_sci WHERE id=:id AND deleted IS NULL";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute(['id'=>$id]);
  $result = $stmt->fetch(PDO::FETCH_ASSOC);

  return $result;
}

//fetch all comments from database
public function fetchAllComment_detail_modal($id)
{
  $sql = "SELECT * FROM post_comments_bsc_actu_sci WHERE id=:id AND deleted IS NULL";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute(['id'=>$id]);
  $result = $stmt->fetch(PDO::FETCH_ASSOC);

  return $result;
}

//fetch all general comments from database
public function fetchAllGeneralComment_detail_modal($id)
{
  $sql = "SELECT * FROM general_comment WHERE id=:id AND deleted IS NULL";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute(['id'=>$id]);
  $result = $stmt->fetch(PDO::FETCH_ASSOC);

  return $result;
}

//fetch all noticeboard users form database
public function Notice_detail_modal($id)
{
  $sql = "SELECT * FROM notice_board_bsc_actu_sci WHERE id=:id AND deleted =1";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute(['id'=>$id]);
  $result = $stmt->fetch(PDO::FETCH_ASSOC);

  return $result;
}


// Check if user already registered vcode`

public function user_exist($username){
  $sql = "SELECT username FROM admin_bsc_actu_sci WHERE username = :username";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute(['username'=>$username]);
  $result = $stmt->fetch(PDO::FETCH_ASSOC);


  return $result;
  } 

  public function program_exist($program){
    $sql = "SELECT program from program_table WHERE program = :program ";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['program'=>$program]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
  
  
    return $result;
    } 

  //login existing user 
  public function login($username){
  $sql = "SELECT username,password FROM admin_bsc_actu_sci WHERE username = :username";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute(['username'=>$username]);
  $row = $stmt->fetch(PDO::FETCH_ASSOC);

  return $row;
  }  
 

    //Current User In Session
    public function currentUser($username){
      $sql ="SELECT * FROM  admin_bsc_actu_sci WHERE username =:username";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(['username'=>$username]);
      $row= $stmt->fetch(PDO::FETCH_ASSOC);

      return $row;
    }
  
   
  //count total number of rows

  public function totalCount($tablename)
  {
   $sql ="SELECT * FROM $tablename";
   $stmt = $this->conn->prepare($sql);
   $stmt->execute();
   $count =$stmt->rowCount();

   return $count;
  }

  //count total verified/unverified
  public function verified_users($status) 
  {
  $sql = "SELECT * FROM user_bsc_actu_sci WHERE verified = :status";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute(['status'=>$status]);
  $count= $stmt->rowCount();

  return $count;
  }

  //gender percentage

public function genderPer(){
  $sql = "SELECT gender, COUNT(*) AS number FROM user_bsc_actu_sci WHERE gender !=''
  GROUP BY gender ";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute();
  $result =$stmt->fetchAll(PDO::FETCH_ASSOC);

  return $result;
}
 
// Users verified/unverified percentage

public function verifiedPer(){
  $sql ="SELECT verified, COUNT(*) AS number user_bsc_actu_sci GROUP BY verified";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
}



// count app hits

public function site_hits() {
$sql ="SELECT hits FROM visitors_bsc_actu_sci";
$stmt = $this->conn->prepare($sql);
$stmt->execute();
$count = $stmt->fetch(PDO::FETCH_ASSOC);
 
return $count;
}



//fetch all registered users
public function fetchAllUsers()
{
  $sql = "SELECT * FROM user_bsc_actu_sci  WHERE deleted IS NULL ";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

  return $result;
}


//fetch all registered admin
public function fetchAllAdminUsers()
{
  $sql = "SELECT * FROM admin_bsc_actu_sci  WHERE deleted IS NULL ";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

  return $result;
}

//fetch all programs
public function fetchAllProgram()
{
  $sql = "SELECT * FROM program_table ";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

  return $result;
}


public function userAction2($id)
{

  $sql = "UPDATE user_bsc_actu_sci SET deleted =NULL WHERE id = :id";
  $stmt =$this->conn->prepare($sql);
  $stmt->execute(['id'=>$id]);

  return true;
}


public function userActionAdminRestore($id)
{

  $sql = "UPDATE admin_bsc_actu_sci SET deleted =NULL WHERE id = :id";
  $stmt =$this->conn->prepare($sql);
  $stmt->execute(['id'=>$id]);

  return true;
}


public function userActionAdmin($id)
{

  $sql = "UPDATE admin_bsc_actu_sci SET deleted = 1 WHERE id = :id";
  $stmt =$this->conn->prepare($sql);
  $stmt->execute(['id'=>$id]);

  return true;
}


public function fetchAllDeletedUsers()
{
  $sql = "SELECT * FROM user_bsc_actu_sci  WHERE deleted=1 ";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

  return $result;
}


public function fetchAllDeletedUsersAdmin()
{
  $sql = "SELECT * FROM admin_bsc_actu_sci  WHERE deleted = 1 ";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

  return $result;
}


//fetch all  past question from db
public function fetchAllPatQuestion()
{
  $sql = "SELECT * FROM questions_bsc_actu_sci  WHERE deleted  IS NULL ORDER BY ID DESC ";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

  return $result;
}

//fetch all  course material  from db
public function fetchAllCourseMaterials()
{
  $sql = "SELECT * FROM course_materials_bsc_actu_sci  WHERE deleted IS NULL ORDER BY ID DESC ";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

  return $result;
}

//fetch all course  users
public function fetchAllCourse()
{
  $sql = "SELECT * FROM all_courses_bsc_actu_sci  WHERE deleted  IS NULL ORDER BY ID DESC ";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

  return $result;
}




//fectch user's details by id
public function fetchUserDetailsByID($id){
  $sql ="SELECT * FROM user_bsc_actu_sci WHERE id =:id AND deleted IS NULL";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute(['id'=>$id]);
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  return $result;
}

//fectch user's details by id
public function fetchAdminUserDetailsByID($id){
  $sql ="SELECT * FROM admin_bsc_actu_sci WHERE id =:id AND deleted IS NULL";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute(['id'=>$id]);
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  return $result;
}


//fectch feedback details by id
public function fetchfeedbackDetailsByID($id){
  $sql="SELECT * FROM feedback_bsc_actu_sci WHERE id = :id  AND replied IS NULL";
  $stmt = $this->conn->prepare($sql,);
  $stmt->execute(['id'=>$id]);
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  return $result;
}


//fectch feedback details by id
// public function fetchfeedbackDetailsByID($id){
//   $sql ="SELECT feedback_bsc_actu_sci.id,feedback_bsc_actu_sci.subject,
//   feedback_bsc_actu_sci.feedback,feedback_bsc_actu_sci.created_at,feedback_bsc_actu_sci.uid,user_bsc_actu_sci.name,
//   user_bsc_actu_sci.email,user_bsc_actu_sci.index_number  FROM feedback_bsc_actu_sci INNER JOIN user_bsc_actu_sci ON feedback_bsc_actu_sci.uid = user_bsc_actu_sci.id
//   WHERE replied !=1 ORDER BY feedback_bsc_actu_sci.id DESC";
//   $stmt = $this->conn->prepare($sql);
//   $stmt->execute(['id'=>$id]);
//   $result = $stmt->fetch(PDO::FETCH_ASSOC);
//   return $result;
// }


//fectch user's comment by id
public function fetchAllComment(){
  $sql ="SELECT post_comments_bsc_actu_sci.id,post_comments_bsc_actu_sci.title,
  post_comments_bsc_actu_sci.created_at,post_comments_bsc_actu_sci.comments,post_comments_bsc_actu_sci.uid,user_bsc_actu_sci.name,post_comments_bsc_actu_sci.title,
  user_bsc_actu_sci.email,user_bsc_actu_sci.index_number,user_bsc_actu_sci.photo  FROM post_comments_bsc_actu_sci 
  INNER JOIN user_bsc_actu_sci ON post_comments_bsc_actu_sci.uid = user_bsc_actu_sci.id
  WHERE post_comments_bsc_actu_sci.deleted IS NULL ORDER BY post_comments_bsc_actu_sci.id DESC";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}



//fectch user's comment by id
public function fetchAllGeneralComment(){
  $sql ="SELECT general_comment.id,general_comment.title,
  general_comment.created_at,general_comment.comments,general_comment.uid,user_bsc_actu_sci.name,general_comment.title,
  user_bsc_actu_sci.email,user_bsc_actu_sci.index_number,user_bsc_actu_sci.photo  FROM general_comment 
  INNER JOIN user_bsc_actu_sci ON general_comment.uid = user_bsc_actu_sci.id
  WHERE general_comment.deleted IS NULL ORDER BY general_comment.id DESC";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}

//delete a user

public function userAction($id)
{

  $sql = "UPDATE user_bsc_actu_sci SET deleted =1 WHERE id = :id";
  $stmt =$this->conn->prepare($sql);
  $stmt->execute(['id'=>$id]);

  return true;
}

public function userAction_Res($id)
{

  $sql = "UPDATE user_bsc_actu_sci SET deleted = NULL WHERE id = :id";
  $stmt =$this->conn->prepare($sql);
  $stmt->execute(['id'=>$id]);

  return true;
}


//delete a Past Question file

public function delete_past_Question($id)
{

  $sql = "UPDATE questions_bsc_actu_sci SET deleted =1 WHERE id = :id";
  $stmt =$this->conn->prepare($sql);
  $stmt->execute(['id'=>$id]);

  return true;
}

//delete a course  file
public function delete_course($id)
{

  $sql = "UPDATE all_courses_bsc_actu_sci SET deleted =1 WHERE id = :id";
  $stmt =$this->conn->prepare($sql);
  $stmt->execute(['id'=>$id]);

  return true;
}

//delete a course Material file
public function del_id_course_material($id)
{

  $sql = "UPDATE course_materials_bsc_actu_sci SET deleted =1 WHERE id = :id";
  $stmt =$this->conn->prepare($sql);
  $stmt->execute(['id'=>$id]);

  return true;
}

//delete a comment

public function commentAction($id,$val)
{

  $sql = "UPDATE post_comments_bsc_actu_sci SET deleted =$val WHERE id = :id";
  $stmt =$this->conn->prepare($sql);
  $stmt->execute(['id'=>$id]);

  return true;
}
//fetch all feedback of users
public function fetchFeedback(){
  $sql ="SELECT feedback_bsc_actu_sci.id,feedback_bsc_actu_sci.subject,
  feedback_bsc_actu_sci.feedback,feedback_bsc_actu_sci.created_at,feedback_bsc_actu_sci.uid,user_bsc_actu_sci.name,
  user_bsc_actu_sci.email,user_bsc_actu_sci.index_number,user_bsc_actu_sci.program,user_bsc_actu_sci.level  FROM feedback_bsc_actu_sci INNER JOIN user_bsc_actu_sci ON feedback_bsc_actu_sci.uid = user_bsc_actu_sci.id
  WHERE replied IS NULL ORDER BY feedback_bsc_actu_sci.id DESC";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $result;


}

// Reply to User
public function replyFeedback($uid, $message){
$sql = "INSERT INTO  notification_bsc_actu_sci (uid, type, message) VALUES (:uid,'user',:message)";
$stmt = $this->conn->prepare($sql);
$stmt->execute(['uid'=>$uid,'message'=>$message]);
return true;
}



// set feedback replied
public function feedbackReplied($fid){
  $sql = "UPDATE feedback_bsc_actu_sci SET replied = 1 WHERE id=:fid";
  
  $stmt = $this->conn->prepare($sql);
  $stmt->execute(['fid'=>$fid]);
  return true;


}

  
  //fetch notification
  public function fetchNotification()
  {
  //  $sql = "SELECT * from notification_bsc_actu_sci where deleted IS NULL AND level=? AND program=? ";


  $sql ="SELECT notification_admin.id,notification_admin.type,notification_admin.subject,notification_admin.created_at,notification_admin.level,notification_admin.program,notification_admin.uid,user_bsc_actu_sci.name,
  user_bsc_actu_sci.email,user_bsc_actu_sci.index_number  FROM notification_admin INNER JOIN user_bsc_actu_sci ON notification_admin.uid = user_bsc_actu_sci.id
  WHERE notification_admin.deleted IS NULL ORDER BY notification_admin.id DESC";
  $stmt = $this->conn->prepare($sql);
  //  $stmt->execute([$clevel,$cprogram]);
   $stmt->execute();
   $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   return $result;
  }
   //remove notification

   public function removeNotification($id){
    $sql = "DELETE FROM notification_admin WHERE id = :id";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['id'=>$id]);
    return true;
  }

   // fetch all users from database
 public function exportAllusers()
 {
  $sql = "SELECT * FROM user_bsc_actu_sci";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $result;
 }

}


 ?>
