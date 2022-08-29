<?php
require_once 'db_conn.php';
class Authenticate extends CommentDatabase {

//fetch all registered users
public function fetchAllPost($clevel,$cprogram)
{
  $sql = "SELECT * FROM notice_board_bsc_actu_sci WHERE deleted IS NULL AND level=? AND program=?";
  $stmt = $this->conn2->prepare($sql);
  $stmt->execute([$clevel,$cprogram]);
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

  return $result;
}

public function fetchAllDeletedPost($clevel,$cprogram)
{
  $sql = "SELECT * FROM notice_board_bsc_actu_sci WHERE deleted IS NOT NULL AND level=? AND program=?";
  $stmt = $this->conn2->prepare($sql);
  $stmt->execute([$clevel,$cprogram]);
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

  return $result;
}



// fetch comment details by id

public function fetchAllComment($id)
{
  $sql = "SELECT * FROM post_comments_bsc_actu_sci WHERE id =:id  AND deleted IS NULL ";
  $stmt = $this->conn2->prepare($sql);
  $stmt->execute(['id'=>$id]);
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

  return $result;
}


// Insert notification

  public function notification($type,$message){
    $sql ="INSERT INTO notification_bsc_actu_sci( type,message) VALUES (:type, :message)";
 
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([ 'type'=>$type, 'message'=>$message]);
    return true;
  }


//delete a user 
    
public function userActionRestore($id)
{

  $sql = "UPDATE notice_board_bsc_actu_sci SET deleted = NULL WHERE id = :id";
  $stmt =$this->conn2->prepare($sql);
  $stmt->execute(['id'=>$id]);

  return true;
}

public function userActionDeleted($id)
{

  $sql = "UPDATE notice_board_bsc_actu_sci SET deleted =1 WHERE id = :id";
  $stmt =$this->conn2->prepare($sql);
  $stmt->execute(['id'=>$id]);

  return true;
}

}

?>