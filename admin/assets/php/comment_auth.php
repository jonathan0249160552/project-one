<?php
require_once 'db_conn.php';
class Authenticate extends CommentDatabase {

//fetch all registered users
public function fetchAllPost()
{
  $sql = "SELECT * FROM notice_board_bsc_actu_sci WHERE deleted IS NULL ORDER BY ID DESC";
  $stmt = $this->conn2->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

  return $result;
}


//fetch all registered users
public function fetchAllPostDel()
{
  $sql = "SELECT * FROM notice_board_bsc_actu_sci WHERE deleted IS NOT NULL";
  $stmt = $this->conn2->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

  return $result;
}


// Isert notification

  public function notification($type,$message){
    $sql ="INSERT INTO notification_bsc_actu_sci( type,message) VALUES (:type, :message)";
 
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([ 'type'=>$type, 'message'=>$message]);
    return true;
  }


//delete a user 
    
public function userAction2($id)
{

  $sql = "UPDATE notice_board_bsc_actu_sci SET deleted=1 WHERE id = :id";
  $stmt =$this->conn2->prepare($sql);
  $stmt->execute(['id'=>$id]);

  return true;
}

public function userActionRes($id)
{

  $sql = "UPDATE notice_board_bsc_actu_sci SET deleted=NULL WHERE id = :id";
  $stmt =$this->conn2->prepare($sql);
  $stmt->execute(['id'=>$id]);

  return true;
}

public function userActionRestore($id)
{

  $sql = "UPDATE notice_board_bsc_actu_sci SET deleted =NULL WHERE id = :id";
  $stmt =$this->conn2->prepare($sql);
  $stmt->execute(['id'=>$id]);

  return true;
}

}

?>