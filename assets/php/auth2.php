<?php

require_once 'config2.php';
class Auth2 extends Database2 {
// Register New User

//fetch all Notice users
public function fetchAll_Notice_db($val)
{
  $sql = "SELECT * FROM uploadedimage WHERE deleted = $val ORDER BY created_at DESC";
  $stmt = $this->conn2->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

  return $result;
}

//fectch Notice details by id
public function fetchNoticeDetailsByID($id){
  $sql ="SELECT * FROM uploadedimage WHERE id = :id AND deleted =1";
  $stmt = $this->conn2->prepare($sql);
  $stmt->execute(['id'=>$id]);
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  return $result;
}
 

public function userAction2($id,$val)
{

  $sql = "UPDATE user_bsc_actu_sci SET deleted =$val WHERE id = :id";
  $stmt =$this->conn->prepare($sql);
  $stmt->execute(['id'=>$id]);

  return true;
}
}


?>