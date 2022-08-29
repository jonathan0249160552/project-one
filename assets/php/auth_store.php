<?php

require_once 'config_store.php';
class Authenticate extends Database {
// Register New User


public function notification($uid,$type){
  $sql ="INSERT INTO notification_admin(uid,type) VALUES (:uid,:type)";
 $stmt = $this->conn->prepare($sql);
  $stmt->execute(['uid'=>$uid,'type'=>$type]);
  return true;
}

// upload product
public function upload_product($uid,$product_name,$product_price,$business_name,$business_code,$product_info,$product_description,$product_category,$newImage){
  $sql ="INSERT INTO products (uid,product_name,product_price,business_name,business_code,product_info,product_description,product_category,product_image) VALUES 

  (:uid,:product_name,:product_price,:business_name,:business_code,:product_info,:product_description,:product_category,:product_image)";
 $stmt = $this->conn->prepare($sql);

  $stmt->execute(['uid'=>$uid, 'product_name'=>$product_name,'product_price'=>$product_price,'business_name'=>$business_name,'business_code'=>$business_code,
  'product_info'=>$product_info,'product_description'=>$product_description,'product_category'=>$product_category,'product_image'=>$newImage]);
  return true;
}


// Check if user already registered`

public function code_used($business_code){
    $sql = "SELECT business_code FROM vender_information WHERE business_code = :business_code AND  deleted IS NULL";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['business_code'=>$business_code]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
  
  
    return $result;
  } 



// Check if user name for admin already registered`

public function user_exist($user_names){
    $sql = "SELECT user_names  FROM vender_information WHERE user_names = :user_names AND  deleted IS NULL";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['user_names'=>$user_names]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
  
  
    return $result;
    } 



// Check if use name fo customer already registered`

public function user_name_exist($user_names){
    $sql = "SELECT user_names  FROM customer WHERE user_names = :user_names AND  deleted IS NULL";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['user_names'=>$user_names]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
  
  
    return $result;
    } 


// Check if admin email already registered`

public function email_exist($email){
    $sql = "SELECT email  FROM vender_information WHERE email = :email AND  deleted IS NULL";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['email'=>$email]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
  
  
    return $result;
    } 

 
       
    // Check if business name already registered`

    public function business_name_exist($business_name){
    $sql = "SELECT business_name  FROM vender_information WHERE business_name = :business_name AND  deleted IS NULL";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['business_name'=>$business_name]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
  
  
    return $result;
    } 


      //Current User admin In Session
      public function current_admin_User($user_names){
        $sql ="SELECT * FROM  vender_information WHERE user_names =:user_names AND deleted IS NULL";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['user_names'=>$user_names]);
        $row= $stmt->fetch(PDO::FETCH_ASSOC);
  
        return $row;
      }
  


    // verify User business code
public function business_code_verification($business_code){
    $sql = "SELECT * FROM business_code_table WHERE business_code = :business_code AND deleted IS NULL";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['business_code'=>$business_code]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
  
    return $result;
    } 
  
// register the business admin
    public function business_register ($business_code,$user_names,$name,$contact,$location,$email,$gender,$program,$level,$business_name,$product_category,$password) {
        $sql = "INSERT INTO vender_information (business_code,user_names,name,contact,location,email,gender,program,level,business_name,product_category,password) 
        VALUES (:business_code,:user_names,:name,:contact,:location,:email,:gender,:program,:level,:business_name,:product_category,:password)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([ 'business_code'=>$business_code,'user_names'=>$user_names,'name'=>$name,
        'contact'=>$contact,'location'=>$location,'email'=>$email,'gender'=>$gender,'program'=>$program,'level'=>$level,
        'business_name'=>$business_name,'product_category'=>$product_category,'password'=>$password]);
       
        return true;
      }
      
      
  
      

       //login admin user 
  public function login_admin($user_names){
    $sql = "SELECT user_names,password FROM vender_information WHERE user_names = :user_names AND deleted IS NULL";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['user_names'=>$user_names]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
  
    return $row;
    } 




    
    // fetch all product 

public function fetchAllProduct(){
  $sql = "SELECT *  FROM products WHERE  product_deleted IS NULL";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);


  return $result;

} 



// public function fetchAllProductByID($id){
//   $sql = "SELECT * FROM products WHERE id = :id AND product_deleted IS NULL";
//   $stmt = $this->conn->prepare($sql);
//   $stmt->execute(['id'=>$id]);
//   $result = $stmt->fetch(PDO::FETCH_ASSOC);

//   return $result;
//   }   



  

}



?>