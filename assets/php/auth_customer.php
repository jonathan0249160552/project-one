<?php

require_once 'config.php';
class Authenticate extends Database {
// Register New User


public function notification($x_id,$message){
  $sql ="INSERT INTO customers_notification  (x_id,message) VALUES (:x_id,:message)";
 $stmt = $this->conn->prepare($sql);
  $stmt->execute(['x_id'=>$x_id,'message'=>$message]);
  return true;
}


// handle product comment to database
public function send_comment($uid,$business_code,$business_name,$product_id,$product_name,$comment)
{
  $sql ="INSERT INTO product_comment (uid,xid,comment,business_code,product_name,business_name) VALUES 
  (:uid,:xid,:comment,:business_code,:product_name,:business_name)";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute(['uid'=>$uid,'xid'=>$product_id,'comment'=>$comment,'business_code'=>$business_code,'product_name'=>$product_name,'business_name'=>$business_name]);
  

  return true;
  
}


// handle POST product rating star one to database
public function insert_rating ($rating_input,$rating_product_id,$user_id_1,$product_name,$business_name)
{
  $sql = "INSERT INTO product_rating (product_id,user_ids,rating_value,product_name,business_name) VALUES (:product_id,:user_ids,:rating_value,:product_name,:business_name)";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute(['product_id'=>$rating_product_id,'user_ids'=>$user_id_1,'rating_value'=>$rating_input,'product_name'=>$product_name,'business_name'=>$business_name]);
  

  return true;
  
}


// handle UPDATE product rating star one to database
public function post_rating ($rating_input,$rating_product_id,$user_id_1)
{
  $sql = "UPDATE product_rating SET product_id = :product_id,user_ids = :user_ids,rating_value=:rating_value WHERE product_id=$rating_product_id AND user_ids=$user_id_1 ";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute(['product_id'=>$rating_product_id,'user_ids'=>$user_id_1,'rating_value'=>$rating_input]);
  

  return true;
  
}


 // update  profile of a user

 public function update_profile($id,$age,$user_name,$email,$name,$gender,$phone,$photo,$program,$level){
  $sql ="UPDATE customer SET user_names = :user_names, name =:name,email=:email,contact=:contact, gender=:gender,age=:age,program=:program, level=:level,
   profile_pic=:profile_pic WHERE id=$id AND deleted IS NULL";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute(['user_names'=>$user_name,'email'=>$email,'name'=>$name,'contact'=>$phone,'gender'=>$gender,'age'=>$age,
  'program'=>$program,'level'=>$level,'profile_pic'=>$photo]);

  return true;
}


// handle all product rating star one to database
public function select_rating ($val1,$val2)
{
  $sql = "SELECT * FROM product_rating WHERE product_id= :product_id AND user_ids=:user_ids ";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute(['product_id'=>$val1,'user_ids'=>$val2]);
  $count =$stmt->rowCount();
  return $count;
  

  
}


// public function fetch_rating($id){
//   $sql = "SELECT SUM(rating_value) FROM product_rating WHERE product_id=$id ";
//   $stmt = $this->conn->prepare($sql);
//   $stmt->execute();
//   $result = $stmt->fetch(PDO::FETCH_NUM);


//   return $result;
//   } 

public function fetch_rating($id){
  $sql = "SELECT sum(rating_value) FROM product_rating WHERE product_id=?";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute([$id]);
  $sum = $stmt->fetchColumn();

  return $sum;
  }



// handle all product rating star one to database
public function notification_count ($x_id)
{
  $sql = "SELECT * FROM customers_notification WHERE x_id = :x_id";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute(['x_id'=>$x_id]);
  $count =$stmt->rowCount();
  return $count;
  
}


// search item

public function search_item($keyword){
  $sql = "SELECT * FROM `products` WHERE `product_name` LIKE ? OR `business_name` LIKE ?  ORDER BY id DESC";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute([$keyword,$keyword]);
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);


  return $result;
  } 



// handle admin chat to database
public function chat_admin($x_id,$message,$business_code,$product_id,$product_name)
{
  $sql ="INSERT INTO message_vendor (uid,message,business_code,product_id,product_name) VALUES 
  (:uid,:message,:business_code,:product_id,:product_name)";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute(['uid'=>$x_id,'message'=>$message,'business_code'=>$business_code,'product_id'=>$product_id,'product_name'=>$product_name]);
  

  return true;
  
}

// display admin chat

public function display_admin_chat($product_id,$uid){
  $sql = "SELECT * FROM message_vendor WHERE deleted IS NULL AND product_id=? AND uid=? ";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute([$product_id,$uid]);
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);


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



  // check if customer email exist

    public function customer_email_exist($email){
        $sql = "SELECT email  FROM customer WHERE email = :email AND  deleted IS NULL";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['email'=>$email]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
      
      
        return $result;
        } 



        //Current cutomer admin In Session
      public function current_customer_User($user_names){
            $sql ="SELECT * FROM  customer WHERE user_names =:user_names AND deleted IS NULL";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['user_names'=>$user_names]);
            $row= $stmt->fetch(PDO::FETCH_ASSOC);
      
            return $row;
          }
      

    
  //change password of a user

  public function change_password($pass,$x_id){
    $sql = "UPDATE customer SET password = :password WHERE id = $x_id AND deleted IS NULL";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['password'=>$pass]);
    return true;
  }


      
    public function customer_register ($user_names,$name,$contact,$location,$email,$gender,$program,$level,$password) {
        $sql = "INSERT INTO customer (user_names,name,contact,location,email,gender,program,level,password) 
        VALUES (:user_names,:name,:contact,:location,:email,:gender,:program,:level,:password)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['user_names'=>$user_names,'name'=>$name,
        'contact'=>$contact,'location'=>$location,'email'=>$email,'gender'=>$gender,'program'=>$program,'level'=>$level,'password'=>$password]);
       
        return true;
      }

          //login customer user 
  public function login_customer($user_names){
    $sql = "SELECT user_names,password FROM customer WHERE user_names = :user_names AND deleted IS NULL";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['user_names'=>$user_names]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
  
    return $row;
    } 





    public function fetchAllProductBySort($val){
      $sql = "SELECT * from products WHERE product_type=001 AND product_sort=$val AND product_deleted IS NULL ORDER BY id DESC";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    
      return $result;
    } 

    public function fetchAllProduct(){
      $sql = "SELECT * from products WHERE product_type=001 AND product_deleted IS NULL ORDER BY id DESC";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    
      return $result;
    } 


    
    public function rating($val){
      $sql = "SELECT * from product_rating WHERE  id=$val";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    
      return $result;
    } 



  public function fetchAllProductByID($id){
  $sql = "SELECT * FROM products WHERE id = :id AND product_deleted IS NULL";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute(['id'=>$id]);
  $result = $stmt->fetch(PDO::FETCH_ASSOC);

  return $result;
  } 


  public function fetchAllComments($val){
    $sql = "SELECT * FROM product_comment WHERE xid = $val AND comment_deleted IS NULL";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  
    return $result;
  }  

//  fetch all product comment form database
  
  public function fetchAllCommentsByID($id){
    $sql ="SELECT product_comment.id,product_comment.uid,product_comment.xid,product_comment.comment,
    product_comment.business_code,product_comment.business_name,
    product_comment.comment_created,product_comment.comment_deleted,products.id,products.uid,
    products.business_code,products.business_name FROM 
   
    product_comment INNER JOIN products ON product_comment.xid = products.id WHERE products.id=:id AND
    product_comment.comment_deleted IS NULL ORDER BY product_comment.id DESC LIMIT 20";
 
    $stmt =$this->conn->prepare($sql);
    $stmt->execute(['id'=>$id]);

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
  } 

  // fetch all product and packages and specification
    public function packages_specs($id)
   {
    $sql = "SELECT product_packages.packages,product_packages.pid,product_packages.type, FROM 
    product_packages INNER JOIN products ON product_packages.pid = products.id WHERE  
    products.id=$id AND products_packages.deleted IS NULL";

    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    return $result;
   }

  // fetch all product details and vender details from database 

  public function fetchAllProductInfo($id){
    $sql ="SELECT products.id,products.uid,products.product_name,
    products.product_price_one,products.product_price_two,products.business_code,
    products.product_info,products.product_description,products.product_category,products.product_image,products.product_image_two,products.product_image_three,
    products.product_key_features,products.specifications,products.product_deleted,vender_information.id,
    vender_information.business_code,vender_information.contact,vender_information.name,
    vender_information.email,vender_information.photo,vender_information.business_name,
    vender_information.product_category,vender_information.level,vender_information.program,
    vender_information.gender,vender_information.deleted,vender_information.created_at,
    products.business_code,products.business_name,vender_information.location FROM 
   
    products INNER JOIN vender_information ON products.uid = vender_information.id WHERE products.id=:id AND
    products.product_deleted IS NULL ORDER BY products.id DESC ";
 
    $stmt =$this->conn->prepare($sql);
    $stmt->execute(['id'=>$id]);

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;


  }

  
  // fetch all product details s from database 

  public function products()
  {
   $sql="SELECT * FROM products WHERE  products_deleted IS NULL";
   $stmt =$this->conn->prepare($sql);
   $stmt->execute();
   $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  }



    //Current User In Session
    public function currentUser($user_names){
      $sql ="SELECT * FROM  customer WHERE user_names =:user_names AND deleted IS NULL";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(['user_names'=>$user_names]);
      $row= $stmt->fetch(PDO::FETCH_ASSOC);

      return $row;
    }


    public function forgot_password($token,$email){
      $sql = "UPDATE customer SET token = :token, token_expire = DATE_ADD(NOW(),
      INTERVAL 10 MINUTE) WHERE email = :email";
  
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['token'=>$token,'email'=>$email]);
  
    return true;
    }
  
  


    



    
//fecth notification

public function fetchNotification($x_id){
  $sql= "SELECT * FROM customers_notification WHERE x_id = $x_id AND deleted is NULL ORDER BY id DESC";
  $stmt = $this->conn->prepare($sql);
  $stmt->execute();
 $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}


  //remove notification

  public function removeNotification($id){
    $sql = "DELETE FROM customers_notification WHERE id = $id  ";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return true;
  }
}





?>