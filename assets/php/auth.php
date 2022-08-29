<?php

require_once 'config.php';
class Auth extends Database {
// Register New User

public function register ($name,$email,$password,$index_number,$program,$level) {
    $sql = "INSERT INTO user_bsc_actu_sci (name,email,password,index_number,program,level) VALUES (:name,:email,
    :pass,:index_number,:program,:level)";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([ 'name'=>$name,'email'=>$email,'pass'=>$password,
    'index_number'=>$index_number,'program'=>$program,'level'=>$level]);
   
    return true;
}




//fetch all Notice 
public function fetchAll_Notice_db($clevel,$cprogram)
{
  $sql = "SELECT * FROM notice_board_bsc_actu_sci WHERE deleted IS NULL AND level=? AND program=?  ORDER BY created_at DESC";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute([$clevel,$cprogram]);
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

  return $result;
}

//fetch all Notice 
public function fetchAll_Notice()
{
  $sql = "SELECT * FROM notice_board_bsc_actu_sci WHERE deleted IS NULL  ORDER BY created_at DESC";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

  return $result;
}



//fetch all General Notice 
public function fetchAll_GeneralNotice_db()
{
  $sql = "SELECT * FROM notice_board_bsc_actu_sci WHERE deleted IS NULL AND level=''  ORDER BY created_at DESC";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

  return $result;
}


//fectch Notice details by id
public function fetchNoticeDetailsByID($id){
  $sql ="SELECT * FROM notice_board_bsc_actu_sci WHERE id = :id AND deleted  IS NULL";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute(['id'=>$id]);
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  return $result;
}

// //  fetch all General notice detail by 

public function fetchGeneralNoticeDetailsByID($id){
  $sql ="SELECT * FROM notice_board_bsc_actu_sci WHERE id = :id AND deleted  IS NULL";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute(['id'=>$id]);
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  return $result;
}

//fetch  general comment details by id
public function fetchCommentDetailsByID($id){
  $sql ="SELECT * FROM general_comment WHERE id = :id AND deleted  IS NULL";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute(['id'=>$id]);
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  return $result;
}
 
 

//fetch all commments
// public function fetchComments($id){
//   $sql ="SELECT * FROM post_comments_bsc_actu_sci WHERE id = :id AND deleted  IS NULL";
//   $stmt = $this->conn->prepare($sql);
//   $stmt->execute(['id'=>$id]);
//   $result = $stmt->fetch(PDO::FETCH_ASSOC);
//   return $result;
// }
 



// Check if user already registered vcode`

public function user_exist($index_number){
  $sql = "SELECT index_number FROM user_bsc_actu_sci WHERE index_number = :index_number";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute(['index_number'=>$index_number]);
  $result = $stmt->fetch(PDO::FETCH_ASSOC);


  return $result;
  } 
  // 
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




  // check if email exist in database

  public function user_exist_email($email){
    $sql = "SELECT email FROM user_bsc_actu_sci WHERE email = :email";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['email'=>$email]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
  
  
    return $result;
    } 

// check if email  exist in database

public function user_exist_email_store($email){
  $sql = "SELECT email FROM vender_information WHERE email = :email";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute(['email'=>$email]);
  $result = $stmt->fetch(PDO::FETCH_ASSOC);


  return $result;
  } 


  //login existing user 
  public function login($index_number){
  $sql = "SELECT index_number,password FROM user_bsc_actu_sci WHERE index_number = :index_number AND deleted IS NULL";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute(['index_number'=>$index_number]);
  $row = $stmt->fetch(PDO::FETCH_ASSOC);

  return $row;
  }  
 

    //Current User In Session
    public function currentUser($index_number){
      $sql ="SELECT * FROM  user_bsc_actu_sci WHERE index_number =:index_number AND deleted IS NULL";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(['index_number'=>$index_number]);
      $row= $stmt->fetch(PDO::FETCH_ASSOC);

      return $row;
    }


    //Current User In Session business
    public function currentUser_Name($user_names){
      $sql ="SELECT * FROM  vender_information WHERE user_names =:user_names<? AND deleted IS NULL";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(['user_names'=>$user_names]);
      $row= $stmt->fetch(PDO::FETCH_ASSOC);

      return $row;
    }

  

    
    //Current User In Session
    public function currentComment($id){
      $sql ="SELECT * FROM  general_comment WHERE id =:general_comment AND deleted IS NULL";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(['id'=>$id]);
      $row= $stmt->fetch(PDO::FETCH_ASSOC);

      return $row;
    }
    //Current User In Session
    public function currentUser1($email){
      $sql ="SELECT * FROM  user_bsc_actu_sci WHERE email =:email AND deleted IS NULL";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(['email'=>$email]);
      $row= $stmt->fetch(PDO::FETCH_ASSOC);

      return $row;
    }

    
// post comment modal
public function post_comment_modal($id){
  $sql= "SELECT * FROM general_comment WHERE id = :id ";
  $stmt =$this->conn->prepare($sql);
  $stmt->execute(['id'=>$id]);

  $result = $stmt->fetch(PDO::FETCH_ASSOC);

  return $result;
}

   //fetch all posts
   public function fetchAllPost($id){
    $sql ="SELECT * FROM  notice_board_bsc_actu_sci WHERE deleted IS NULL";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['id'=>$id]);
    $row= $stmt->fetch(PDO::FETCH_ASSOC);
    // fetchNotice_Details
    return $row;
  }

    //fetch all posts deatails
    public function fetchNotice_Details($id){
      $sql ="SELECT * FROM  notice_board_bsc_actu_sci WHERE deleted IS NULL AND id=:id";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(['id'=>$id]);
      $row= $stmt->fetch(PDO::FETCH_ASSOC);
      // 
      return $row;
    }
    // 
  // forgot password

  public function forgot_password($token,$email){
    $sql = "UPDATE user_bsc_actu_sci SET token = :token, token_expire = DATE_ADD(NOW(),
    INTERVAL 10 MINUTE) WHERE email = :email";

  $stmt = $this->conn->prepare($sql);
  $stmt->execute(['token'=>$token,'email'=>$email]);

  return true;
  }

  //Reset Password user auth

  public function reset_pass_auth($email, $token){
  $sql = "SELECT id FROM  user_bsc_actu_sci WHERE email = :email AND token = :token AND
  token !=''  AND token_expire > NOW() AND deleted != 0";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute(['email'=>$email, 'token'=>$token]);

  $row = $stmt->fetch(PDO::FETCH_ASSOC);

  return $row;
  }

  //update new password

  public function update_new_pass($pass,$email){
    $sql = "UPDATE user_bsc_actu_sci SET token = '', password = :pass WHERE email =
    :email AND  deleted != 0";

    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['pass'=>$pass, 'email'=>$email]);
    return true; 
  }
  
  // add new note

  public function add_new_note($uid,$title,$note){
    $sql= "INSERT INTO notes_bsc_actu_sci(uid,title,note) VALUES (:uid,:title,:note)";
    $stmt= $this->conn->prepare($sql);
    $stmt->execute(['uid'=>$uid, 'title'=>$title,'note'=>$note]);
    return true; 
    
  }


    //send feedback to admin 
    public function send_feedback($uid,$subject,$feedback,$level,$program){
      $sql = "INSERT INTO feedback_bsc_actu_sci (uid,subject,feedback,level,program) VALUES (:uid,:subject,:feedback,:level,:program)";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(['uid'=>$uid,'subject'=>$subject,'feedback'=>$feedback,'level'=>$level,'program'=>$program]);
      return true;
    }

  // fetch all notes of a user

  public function get_notes($uid){
    $sql= "SELECT * FROM  notes_bsc_actu_sci WHERE uid = :uid";
    $stmt= $this->conn->prepare($sql);
    $stmt->execute(['uid'=>$uid]);

    $result= $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

  

  //edit note of a user

  public function edit_note($id){
    $sql= "SELECT * FROM notes_bsc_actu_sci WHERE id = :id ";
    $stmt =$this->conn->prepare($sql);
    $stmt->execute(['id'=>$id]);

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
  }


  // general post comment

  public function NoticeGeneral($id){
    // $sql ="SELECT notice_board_bsc_actu_sci.id,notice_board_bsc_actu_sci.uid,notice_board_bsc_actu_sci.created_at,
    // notice_board_bsc_actu_sci.title,notice_board_bsc_actu_sci.comments,user_bsc_actu_sci.name,
    // user_bsc_actu_sci.email,user_bsc_actu_sci.index_number,user_bsc_actu_sci.photo  FROM notice_board_bsc_actu_sci INNER JOIN user_bsc_actu_sci ON notice_board_bsc_actu_sci.uid = user_bsc_actu_sci.id
    // WHERE notice_board_bsc_actu_sci.deleted IS NULL  ORDER BY notice_board_bsc_actu_sci.id DESC";
    $sql="SELECT * FROM notice_board_bsc_actu_sci WHERE id=:id";
    $stmt =$this->conn->prepare($sql);
    $stmt->execute(['id'=>$id]);

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
  }

   // fetch class post comment

   public function postCommentClass($id){
    // $sql ="SELECT post_comments_bsc_actu_sci.id,post_comments_bsc_actu_sci.uid,post_comments_bsc_actu_sci.created_at,
    // post_comments_bsc_actu_sci.title,post_comments_bsc_actu_sci.comments,user_bsc_actu_sci.name,
    // user_bsc_actu_sci.email,user_bsc_actu_sci.index_number,user_bsc_actu_sci.photo  FROM post_comments_bsc_actu_sci INNER JOIN user_bsc_actu_sci ON post_comments_bsc_actu_sci.uid = user_bsc_actu_sci.id
    // WHERE post_comments_bsc_actu_sci.deleted IS NULL  ORDER BY post_comments_bsc_actu_sci.id DESC";
       $sql="SELECT * FROM notice_board_bsc_actu_sci WHERE id=:id";
    $stmt =$this->conn->prepare($sql);
    $stmt->execute(['id'=>$id]);

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
  }



  // update note of a user 
  public function update_note($id,$title,$note){
    $sql ="UPDATE notes_bsc_actu_sci SET title = :title,note=:note,updated_at = NOW() 
    WHERE id=:id";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['title'=>$title,'note'=>$note, 'id'=>$id]);
    return true;
  }
  // delete note form database
  public function delete_note($id){
    $sql = "DELETE FROM notes_bsc_actu_sci WHERE id=:id";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['id'=>$id]);
    return true;
  }

   

  // update  profile of a user

  public function update_profile($name,$gender,$dob,$phone,$photo,$id,$program,$level){
    $sql ="UPDATE user_bsc_actu_sci SET name =:name, gender=:gender,dob=:dob, 
    phone=:phone, photo=:photo,program=:program,level=:level WHERE id =:id ";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['name'=>$name,'gender'=>$gender,'dob'=>$dob,'phone'=>$phone,
    'photo'=>$photo,'id'=>$id,'program'=>$program,'level'=>$level]);

    return true;
  }
 
  //change password of a user

  public function change_password($pass,$id){
    $sql = "UPDATE user_bsc_actu_sci SET password = :pass WHERE id = :id AND deleted !=0";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['pass'=>$pass,'id'=>$id]);
    return true;
  }

  //verify E-mail a user 
  public function verify_email($email){
    $sql = "UPDATE user_bsc_actu_sci SET verified = 1 WHERE email =:email AND deleted !=0";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['email'=>$email]);
    return true;
  }


//fetch all post of users
public function fetchPost(){
  $sql ="SELECT feedback_bsc_actu_sci.id,feedback_bsc_actu_sci.subject,
  feedback_bsc_actu_sci.feedback,feedback_bsc_actu_sci.created_at,feedback_bsc_actu_sci.uid,user_bsc_actu_sci.name,feedback_bsc_actu_sci.title,feedback_bsc_actu_sci.comment,
  user_bsc_actu_sci.email,user_bsc_actu_sci.index_number,user_bsc_actu_sci.photo  FROM feedback_bsc_actu_sci INNER JOIN user_bsc_actu_sci ON feedback_bsc_actu_sci.uid = user_bsc_actu_sci.id
  WHERE comment_deleted =1 AND comment !='' ORDER BY feedback_bsc_actu_sci.id DESC";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $result;


}

//fetch all class comment  of users
public function fetchComments($clevel,$cprogram){

  $sql ="SELECT post_comments_bsc_actu_sci.id,post_comments_bsc_actu_sci.uid,post_comments_bsc_actu_sci.created_at,
  post_comments_bsc_actu_sci.title,post_comments_bsc_actu_sci.comments,user_bsc_actu_sci.name,
  user_bsc_actu_sci.email,user_bsc_actu_sci.index_number,user_bsc_actu_sci.photo  FROM post_comments_bsc_actu_sci INNER JOIN user_bsc_actu_sci ON post_comments_bsc_actu_sci.uid = user_bsc_actu_sci.id
  WHERE post_comments_bsc_actu_sci.deleted IS NULL AND post_comments_bsc_actu_sci.anonymous IS NOT NULL  AND  post_comments_bsc_actu_sci.level=? AND post_comments_bsc_actu_sci.program=? ORDER BY post_comments_bsc_actu_sci.id DESC";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute([$clevel,$cprogram]);
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $result;


}



//fetch all anonymous class comment  of users
public function fetchClassAnonymousComments($clevel,$cprogram){

  $sql ="SELECT post_comments_bsc_actu_sci.id,post_comments_bsc_actu_sci.uid,post_comments_bsc_actu_sci.created_at,
  post_comments_bsc_actu_sci.title,post_comments_bsc_actu_sci.comments,user_bsc_actu_sci.name,
  user_bsc_actu_sci.email,user_bsc_actu_sci.index_number,user_bsc_actu_sci.photo  FROM post_comments_bsc_actu_sci INNER JOIN user_bsc_actu_sci ON post_comments_bsc_actu_sci.uid = user_bsc_actu_sci.id
  WHERE post_comments_bsc_actu_sci.deleted IS NULL AND post_comments_bsc_actu_sci.anonymous IS NULL AND  post_comments_bsc_actu_sci.level=? AND post_comments_bsc_actu_sci.program=? ORDER BY post_comments_bsc_actu_sci.id DESC";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute([$clevel,$cprogram]);
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $result;


}


//fetch all general comment of users
public function fetchGeneralComments(){

  $sql ="SELECT general_comment.id,general_comment.uid,general_comment.created_at,
  general_comment.title,general_comment.comments,user_bsc_actu_sci.name,
  user_bsc_actu_sci.email,user_bsc_actu_sci.index_number,user_bsc_actu_sci.photo  FROM general_comment INNER JOIN user_bsc_actu_sci ON general_comment.uid = user_bsc_actu_sci.id
  WHERE general_comment.deleted IS NULL AND general_comment.anonymous IS NULL   ORDER BY general_comment.id DESC";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $result;


}



//fetch all general anonymous comment of users
public function fetchGeneralAnonymousComments(){

  $sql ="SELECT general_comment.id,general_comment.uid,general_comment.created_at,
  general_comment.title,general_comment.comments,user_bsc_actu_sci.name,
  user_bsc_actu_sci.email,user_bsc_actu_sci.index_number,user_bsc_actu_sci.photo  FROM general_comment INNER JOIN user_bsc_actu_sci ON general_comment.uid = user_bsc_actu_sci.id
  WHERE general_comment.deleted IS NULL AND general_comment.anonymous ='1'  ORDER BY general_comment.id DESC";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $result;


}






//fetch all registered users
public function fetchAllUsers($val)
{
  $sql = "SELECT * FROM user_bsc_actu_sci WHERE deleted != $val";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

  return $result;
}
  

//fetch all past questions 
// public function fetchAllPastQuestion($level,$program)
// {
//  $sql = "SELECT *  FROM questions_bsc_actu_sci   WHERE deleted IS NULL AND level = '$level' AND program = $program";
//   $stmt = $this->conn->prepare($sql);
//  $stmt->execute(['level'=>$level,'program'=>$program]);
//  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

//   return $result;
// }
  
public function fetchAllPastQuestion($clevel,$cprogram)
{
    $sql = "SELECT * FROM questions_bsc_actu_sci WHERE deleted IS NULL AND level =? AND program =?;";

    $stmt = $this->conn->prepare($sql);
    $stmt->execute([$clevel, $cprogram]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}


public function fetchAllCourseMaterail($clevel,$cprogram)
{
    $sql = "SELECT * FROM course_materials_bsc_actu_sci WHERE deleted IS NULL AND level =? AND program =?;";

    $stmt = $this->conn->prepare($sql);
    $stmt->execute([$clevel, $cprogram]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}


public function fetchAllCourse($clevel,$cprogram)
{
    $sql = "SELECT * FROM all_courses_bsc_actu_sci WHERE deleted IS NULL AND level =? AND program =?;";

    $stmt = $this->conn->prepare($sql);
    $stmt->execute([$clevel, $cprogram]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}



  //send  general comment 
  public function send_general_comment($uid,$title,$comments,$cprogram,$clevel){
    $sql = "INSERT INTO general_comment (uid,title,comments,level,program) VALUES (:uid,:title,:comments,:level,:program)";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['uid'=>$uid,'title'=>$title,'comments'=>$comments,'program'=>$cprogram,'level'=>$clevel]);
    return true;
  }


  

  //send  class comment 
  public function send_class_comment($uid,$title,$comments,$cprogram,$clevel,$anonymous){
    $sql = "INSERT INTO post_comments_bsc_actu_sci (uid,title,comments,level,program,anonymous) VALUES (:uid,:title,:comments,:level,:program,:anonymous)";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['uid'=>$uid,'title'=>$title,'comments'=>$comments,'program'=>$cprogram,'level'=>$clevel,'anonymous'=>$anonymous]);
    return true;
  }

 //send general anonymous comment 
 public function send_general_ano_comment($uid,$title,$comments,$cprogram,$clevel,$anonymous){
  $sql = "INSERT INTO general_comment (uid,title,comments,level,program,anonymous) VALUES (:uid,:title,:comments,:level,:program,:anonymous)";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute(['uid'=>$uid,'title'=>$title,'comments'=>$comments,'program'=>$cprogram,'level'=>$clevel,'anonymous'=>$anonymous]);
  return true;
}


  //send  class anonymous comment 
  public function send_class_ano_comment($uid,$title,$comments,$cprogram,$clevel){
    $sql = "INSERT INTO post_comments_bsc_actu_sci (uid,title,comments,level,program) VALUES (:uid,:title,:comments,:level,:program)";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['uid'=>$uid,'title'=>$title,'comments'=>$comments,'program'=>$cprogram,'level'=>$clevel]);
    return true;
  }

 // Insert notification

 public function notification($uid,$type,$subject,$program,$level){
   $sql ="INSERT INTO notification_admin(uid,type,subject,program,level) VALUES (:uid,:type,:subject,:program,:level)";
  $stmt = $this->conn->prepare($sql);
   $stmt->execute(['uid'=>$uid,'type'=>$type,'subject'=>$subject,'program'=>$program,'level'=>$level]);
   return true;
 }


 
//fecth notification

public function fetchNotification($uid){
  $sql= "SELECT * FROM notification_bsc_actu_sci WHERE uid = :uid AND type = 'user' ORDER BY id DESC";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute(['uid'=>$uid]);

  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}


  //remove notification

  public function removeNotification($id){
    $sql = "DELETE FROM notification_bsc_actu_sci WHERE id = :id AND type = 'user' ";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['id'=>$id]);
    return true;
  }

  
   //remove profile picture

   public function removeProfilePic($id){
    $sql = "DELETE FROM user_bsc_actu_sci WHERE id = :id AND photo = :photo ";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['id'=>$id]);
    return true;
  }
 
  
}

 ?>