<?php

require_once 'config.php';
class Auth extends Database {
// Register New User

public function register ($password,$username,$s_name,$f_name,$program,$level,$email,$phone,$index_number) {
    $sql = "INSERT INTO admin_bsc_actu_sci (password,username,s_name,f_name,program,level,email,phone,index_number) VALUES (:password,:username,:s_name,:f_name,:program,:level,:email,:phone,:index_number)";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([ 'password'=>$password,'username'=>$username,'s_name'=>$s_name,'f_name'=>$f_name,'program'=>$program,'level'=>$level,'email'=>$email,'phone'=>$phone,'index_number'=>$index_number]);
   
    return true;
}


  // verify User index number
  public function index_number_verification($index_number){
    $sql = "SELECT Index_number_verify FROM index_number_collections WHERE Index_number_verify = :Index_number_verify";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['Index_number_verify'=>$index_number]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
  
    return $result;
    } 


       // verify User program
       public function verify_program($index_number,$program)
       {
        $sql ="SELECT  * FROM index_number_collections WHERE index_number_verify=? AND program =?";
        $stmt = $this->conn->prepare($sql);
      
        $stmt->execute([$index_number,$program]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
       }


           // verify User level
public function verify_level($index_number,$level){
  $sql ="SELECT  * FROM index_number_collections WHERE index_number_verify=? AND student_level=?";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute([$index_number,$level]);
  $result = $stmt->fetch(PDO::FETCH_ASSOC);

  return $result;
  } 


// send_courses

public function send_courses ($CourseName,$CourseCode,$Semester,$CreditHours,$program,$Level) {
  $sql = "INSERT INTO all_courses_bsc_actu_sci (Course_name,course_code,semester,credit_hours,program,level) 
  VALUES (
  :Course_name,:course_code,:semester,:credit_hours,:program,:level)";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute([ 'Course_name'=>$CourseName,'course_code'=>$CourseCode,'semester'=>$Semester,
  'credit_hours'=>$CreditHours,'program'=>$program,'level'=>$Level]);
  return true;
}

// change admin password
public function change_password($pass,$id){
  $sql = "UPDATE admin_bsc_actu_sci SET password = :pass WHERE id = :id AND deleted !=0";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute(['pass'=>$pass,'id'=>$id]);
  return true;
}


  // update  profile of a user

  public function update_profile($id,$username,$level,$f_name,$s_name,$photo,$email,$gender,$age,$phone,){
    $sql ="UPDATE admin_bsc_actu_sci SET username=:username,level = :level,
  f_name =:f_name,s_name=:s_name, photo=:photo,email = :email,gender=:gender,age=:age,phone=:phone WHERE id =$id ";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['username'=>$username,'level'=>$level,'f_name'=>$f_name,'s_name'=>$s_name,'photo'=>$photo,
   'email'=>$email,'gender'=>$gender,'age'=>$age,'phone'=>$phone]);

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
 public function update_notice($id,$title,$body,$posted_by,$type){
  $sql ="UPDATE notice_board_bsc_actu_sci SET title = :title,body=:body,posted_by = :posted_by,type= :type,created_at = NOW() 
  WHERE id=:id";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute(['posted_by'=>$posted_by,'type'=>$type,'title'=>$title,'body'=>$body, 'id'=>$id]);
  return true;
}

//fetch all noticeboard users
public function fetchAllPost_detail_modal($id)
{
  $sql = "SELECT * FROM notice_board_bsc_actu_sci WHERE id=:id";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute(['id'=>$id]);
  $result = $stmt->fetch(PDO::FETCH_ASSOC);

  return $result;
}

//fetch all deleted noticeboard 
public function fetchDelNotice_Details($id)
{
  $sql = "SELECT * FROM notice_board_bsc_actu_sci WHERE id=:id ";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute(['id'=>$id]);
  $result = $stmt->fetch(PDO::FETCH_ASSOC);

  return $result;
}



//fetch all noticenoard users
// public function fetchAllPost($clevel,$cprogram)
// {
//   $sql = "SELECT * FROM notice_board_bsc_actu_sci WHERE level=? AND program=? AND deleted IS NULL";
//   $stmt = $this->conn->prepare($sql);
//   $stmt->execute([$clevel,$cprogram]);
//   $result = $stmt->fetch(PDO::FETCH_ASSOC);

//   return $result;
// }


// Check if user already registered vcode`

public function user_exist($username){
  $sql = "SELECT username FROM admin_bsc_actu_sci WHERE username = :username";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute(['username'=>$username]);
  $result = $stmt->fetch(PDO::FETCH_ASSOC);


  return $result;
  } 

  //login existing user 
  public function login($username){
  $sql = "SELECT username,password FROM admin_bsc_actu_sci WHERE username = :username AND deleted IS NULL";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute(['username'=>$username]);
  $row = $stmt->fetch(PDO::FETCH_ASSOC);

  return $row;
  }  
 

    //Current User In Session
    public function currentUser($username){
      $sql ="SELECT * FROM  admin_bsc_actu_sci WHERE username =:username AND deleted IS NULL";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(['username'=>$username]);
      $row= $stmt->fetch(PDO::FETCH_ASSOC);

      return $row;
    }
  
   
  //count total number of rows

  public function totalCount($clevel,$cprogram)
  {
   $sql ="SELECT  * FROM user_bsc_actu_sci WHERE level=? AND program =?";
   $stmt = $this->conn->prepare($sql);
   $stmt->execute([$clevel,$cprogram]);
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
public function fetchAllUsers($clevel,$cprogram)
{
  $sql = "SELECT * FROM user_bsc_actu_sci  WHERE deleted IS NULL AND level=? AND program=? ";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute([$clevel,$cprogram]);
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

  return $result;
}


//fetch all registered users
public function fetchAllDeletedUsers($clevel,$cprogram)
{
  $sql = "SELECT * FROM user_bsc_actu_sci  WHERE deleted IS NOT NULL AND level=? AND program=? ";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute([$clevel,$cprogram]);
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

  return $result;
}



//fetch all  past question from db
public function fetchAllPatQuestion($clevel,$cprogram)
{
  $sql = "SELECT * FROM questions_bsc_actu_sci  WHERE deleted IS NULL AND level=? AND program=?  ORDER BY ID DESC";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute([$clevel,$cprogram]);
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

  return $result;
}

//fetch all  course material  from db
public function fetchAllCourseMaterials($clevel,$cprogram)
{
  $sql = "SELECT * FROM course_materials_bsc_actu_sci  WHERE deleted IS NULL AND level=? AND program=? ORDER BY ID DESC";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute([$clevel,$cprogram]);
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

  return $result;
}

//fetch all course  users
public function fetchAllCourse($clevel,$cprogram)
{
  $sql = "SELECT * FROM all_courses_bsc_actu_sci  WHERE deleted IS NULL AND level=? AND program=? ORDER BY ID DESC ";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute([$clevel,$cprogram]);
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


public function fetchAllDeletedUsersDetails($id)
{
  $sql = "SELECT * FROM user_bsc_actu_sci  WHERE id = :id AND deleted IS NOT NULL ";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute(['id'=>$id]);
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

  return $result;
}


//fectch feedback details by id
public function fetchfeedbackDetailsByID($id){
  $sql="SELECT * FROM feedback_bsc_actu_sci WHERE id = :id  AND replied IS NULL ";
  $stmt = $this->conn->prepare($sql,);
  $stmt->execute(['id'=>$id]);
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  return $result;
}


// fectch feedback details by id
// public function fetchfeedbackDetailsByID($id){
//   $sql ="SELECT feedback_bsc_actu_sci.id,feedback_bsc_actu_sci.subject,
//   feedback_bsc_actu_sci.feedback,feedback_bsc_actu_sci.created_at,feedback_bsc_actu_sci.level,feedback_bsc_actu_sci.program,feedback_bsc_actu_sci.uid,user_bsc_actu_sci.name,
//   user_bsc_actu_sci.email,user_bsc_actu_sci.index_number  FROM feedback_bsc_actu_sci INNER JOIN user_bsc_actu_sci ON feedback_bsc_actu_sci.uid = user_bsc_actu_sci.id
//   WHERE replied IS NULL AND feedback_bsc_actu_sci.id=:id AND feedback_bsc_actu_sci.uid=:uid ORDER BY feedback_bsc_actu_sci.id DESC";
//   $stmt = $this->conn->prepare($sql);
//   $stmt->execute(['id'=>$id]);
//   $result = $stmt->fetch(PDO::FETCH_ASSOC);
//   return $result;
// }


//fectch comments details by id
public function fetchUserCommentByID($id){
  $sql ="SELECT feedback_bsc_actu_sci.id,feedback_bsc_actu_sci.subject,
  feedback_bsc_actu_sci.feedback,feedback_bsc_actu_sci.created_at,feedback_bsc_actu_sci.uid,user_bsc_actu_sci.name,feedback_bsc_actu_sci.title,feedback_bsc_actu_sci.comment,
  user_bsc_actu_sci.email,user_bsc_actu_sci.index_number,user_bsc_actu_sci.photo  FROM feedback_bsc_actu_sci INNER JOIN user_bsc_actu_sci ON feedback_bsc_actu_sci.uid = user_bsc_actu_sci.id
  WHERE comment_deleted =1 AND comment !='' ORDER BY feedback_bsc_actu_sci.id DESC";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute(['id'=>$id]);
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  return $result;
}


//fectch user's comment by id
public function fetchAllComment($cprogram,$clevel){
  $sql ="SELECT post_comments_bsc_actu_sci.id,post_comments_bsc_actu_sci.title,
  post_comments_bsc_actu_sci.created_at,post_comments_bsc_actu_sci.comments,post_comments_bsc_actu_sci.uid,user_bsc_actu_sci.name,post_comments_bsc_actu_sci.title,
  user_bsc_actu_sci.email,user_bsc_actu_sci.index_number,user_bsc_actu_sci.photo  FROM post_comments_bsc_actu_sci 
  INNER JOIN user_bsc_actu_sci ON post_comments_bsc_actu_sci.uid = user_bsc_actu_sci.id
  WHERE post_comments_bsc_actu_sci.deleted IS NULL AND post_comments_bsc_actu_sci.program=? AND post_comments_bsc_actu_sci.level=? ORDER BY post_comments_bsc_actu_sci.id DESC";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute([$cprogram,$clevel]);
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}
//delete a user

public function userAction($id,$val)
{

  $sql = "UPDATE user_bsc_actu_sci SET deleted =$val WHERE id = :id";
  $stmt =$this->conn->prepare($sql);
  $stmt->execute(['id'=>$id]);

  return true;
}

// restore deleted user

public function userAction_Restore_user($cid)
{

  $sql = "UPDATE user_bsc_actu_sci SET deleted = NULL WHERE id=:id";
  $stmt =$this->conn->prepare($sql);
  $stmt->execute(['id'=>$cid]);

  return true;
}

//delete a Past Question file

public function delete_past_Question($id,$val)
{

  $sql = "UPDATE questions_bsc_actu_sci SET deleted =$val WHERE id = :id";
  $stmt =$this->conn->prepare($sql);
  $stmt->execute(['id'=>$id]);

  return true;
}

//delete a course  file
public function delete_course($id,$val)
{

  $sql = "UPDATE all_courses_bsc_actu_sci SET deleted =$val WHERE id = :id";
  $stmt =$this->conn->prepare($sql);
  $stmt->execute(['id'=>$id]);

  return true;
}

//delete a course Material file
public function del_id_course_material($id,$val)
{

  $sql = "UPDATE course_materials_bsc_actu_sci SET deleted =$val WHERE id = :id";
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
public function fetchFeedback($clevel,$cprogram){
  $sql ="SELECT feedback_bsc_actu_sci.id,feedback_bsc_actu_sci.subject,
  feedback_bsc_actu_sci.feedback,feedback_bsc_actu_sci.created_at,feedback_bsc_actu_sci.level,feedback_bsc_actu_sci.program,feedback_bsc_actu_sci.uid,user_bsc_actu_sci.name,
  user_bsc_actu_sci.email,user_bsc_actu_sci.index_number  FROM feedback_bsc_actu_sci INNER JOIN user_bsc_actu_sci ON feedback_bsc_actu_sci.uid = user_bsc_actu_sci.id
  WHERE replied IS NULL AND feedback_bsc_actu_sci.level=? AND feedback_bsc_actu_sci.program=? ORDER BY feedback_bsc_actu_sci.id DESC";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute([$clevel,$cprogram]);
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $result;


}



// Reply to User
public function replyFeedback($uid, $message,$program,$level){
$sql = "INSERT INTO  notification_bsc_actu_sci (uid, type, message,program,level) VALUES (:uid,'user',:message,:program,:level)";
$stmt = $this->conn->prepare($sql);
$stmt->execute(['uid'=>$uid,'message'=>$message,'program'=>$program,'level'=>$level]);
return true;
}



// set feedback replied
public function feedbackReplied($fid){
$sql = "UPDATE feedback_bsc_actu_sci SET replied = 1 WHERE id = :fid ";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute(['fid'=>$fid]);
  return true;   

}

  
  //fetch notification
  public function fetchNotification($clevel,$cprogram)
  {
  //  $sql = "SELECT * from notification_bsc_actu_sci where deleted IS NULL AND level=? AND program=? ";


  $sql ="SELECT notification_admin.id,notification_admin.type,notification_admin.subject,notification_admin.created_at,notification_admin.level,notification_admin.program,notification_admin.uid,user_bsc_actu_sci.name,
  user_bsc_actu_sci.email,user_bsc_actu_sci.index_number  FROM notification_admin INNER JOIN user_bsc_actu_sci ON notification_admin.uid = user_bsc_actu_sci.id
  WHERE notification_admin.deleted IS NULL AND notification_admin.level=? AND notification_admin.program=? ORDER BY notification_admin.id DESC";
  $stmt = $this->conn->prepare($sql);
  //  $stmt->execute([$clevel,$cprogram]);
   $stmt->execute([$clevel,$cprogram]);
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
 public function exportAllusers($clevel,$cprogram)
 {
  $sql = "SELECT * FROM user_bsc_actu_sci WHERE level=? AND program=? ";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute([$clevel,$cprogram]);
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $result;
 }

}


 ?>
