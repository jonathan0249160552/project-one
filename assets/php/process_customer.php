<?php
require_once 'session_customer.php';
// require 'user-admin/assets/php/action.php';
require_once 'conn_2.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

$auto_complete;
 if(isset($_POST['action']) && $_POST['action'] == 'post_comment' ){

        $business_code =$s_user->test_input($_POST['business_code']);
        $business_name= $s_user->test_input($_POST['business_name']);
        $product_id= $s_user->test_input($_POST['product_id']);
        $product_name= $s_user->test_input($_POST['product_name']);
        $comment = $s_user->test_input($_POST['comment']);
    

        $s_user->send_comment($x_id,$business_code,$business_name,$product_id,$product_name,$comment);

        }


        // product rating one
        if(isset($_POST['action']) && $_POST['action'] == 'product_rating_one' ){

        
            $rating_input_1= $s_user->test_input($_POST['rating_input_1']);
            $rating_product_id= $s_user->test_input($_POST['product_id']);
            $user_id_1 = $s_user->test_input($_POST['user_id_1']);
            $product_name = $s_user->test_input($_POST['product_name']);
            $business_name = $s_user->test_input($_POST['business_name']);
               
            
                if ($s_user->select_rating($rating_product_id,$user_id_1) == null) {
                    
                    $s_user->insert_rating($rating_input_1,$rating_product_id,$user_id_1,$product_name,$business_name);

                }else {
                    $s_user->post_rating($rating_input_1,$rating_product_id,$user_id_1);
                }

            }


           

                // product rating two
                if(isset($_POST['action']) && $_POST['action'] == 'product_rating_two' ){

                        
                    
                    $rating_input_2= $s_user->test_input($_POST['rating_input_2']);
                    $rating_product_id= $s_user->test_input($_POST['product_id_2']);
                    $user_id_2 = $s_user->test_input($_POST['user_id_2']);
                    $product_name_2 = $s_user->test_input($_POST['product_name_2']);
                    $business_name_2 = $s_user->test_input($_POST['business_name_2']);
                    // print_r($_POST);
                    
                if ($s_user->select_rating($rating_product_id,$user_id_2) == null) {
                    
                    $s_user->insert_rating($rating_input_2,$rating_product_id,$user_id_2,$product_name_2,$business_name_2);

                }else {
                    $s_user->post_rating($rating_input_2,$rating_product_id,$user_id_2);
                }
                    }

                     // product rating three
                if(isset($_POST['action']) && $_POST['action'] == 'product_rating_three' ){

                        
                    
                    $rating_input_3= $s_user->test_input($_POST['rating_input_3']);
                    $rating_product_id= $s_user->test_input($_POST['product_id_3']);
                    $user_id_3 = $s_user->test_input($_POST['user_id_3']);
                    $product_name_3 = $s_user->test_input($_POST['product_name_3']);
                    $business_name_3 = $s_user->test_input($_POST['business_name_3']);
                    
                if ($s_user->select_rating($rating_product_id,$user_id_3) == null) {
                    
                    $s_user->insert_rating($rating_input_3,$rating_product_id,$user_id_3,$product_name_3,$business_name_3);

                }else {
                    $s_user->post_rating($rating_input_3,$rating_product_id,$user_id_3);
                }
                    }

                         // product rating four
                if(isset($_POST['action']) && $_POST['action'] == 'product_rating_four' ){

                        
                    
                    $rating_input_4= $s_user->test_input($_POST['rating_input_4']);
                    $rating_product_id= $s_user->test_input($_POST['product_id_4']);
                    $user_id_4 = $s_user->test_input($_POST['user_id_4']);
                    $product_name_4 = $s_user->test_input($_POST['product_name_4']);
                    $business_name_4 = $s_user->test_input($_POST['business_name_4']);
                    
                if ($s_user->select_rating($rating_product_id,$user_id_4) == null) {
                    
                    $s_user->insert_rating($rating_input_4,$rating_product_id,$user_id_4,$product_name_4,$business_name_4);

                }else {
                    $s_user->post_rating($rating_input_4,$rating_product_id,$user_id_4);
                }
                    }

                    
                         // product rating five
                if(isset($_POST['action']) && $_POST['action'] == 'product_rating_five' ){

                        
                    
                    $rating_input_5= $s_user->test_input($_POST['rating_input_5']);
                    $rating_product_id= $s_user->test_input($_POST['product_id_5']);
                    $user_id_5 = $s_user->test_input($_POST['user_id_5']);
                    $product_name_5 = $s_user->test_input($_POST['product_name_5']);
                    $business_name_5 = $s_user->test_input($_POST['business_name_5']);
                    
                if ($s_user->select_rating($rating_product_id,$user_id_5) == null) {
                    
                    $s_user->insert_rating($rating_input_5,$rating_product_id,$user_id_5,$product_name_5,$business_name_5);
               
                }else {
                    $s_user->post_rating($rating_input_5,$rating_product_id,$user_id_5);
                }


             }


          // chat 

if(isset($_POST['action'])&& $_POST['action']== 'post_chats'){

    $message = $s_user->test_input($_POST['message']);
    $business_code = $s_user->test_input($_POST['business_code']);
    $product_id = $s_user->test_input($_POST['product_id']);
    $product_name = $s_user->test_input($_POST['product_name']);
    $x_id = $s_user->test_input($_POST['user_id']);

    $s_user->chat_admin($x_id,$message,$business_code,$product_id,$product_name);
 
 }



 

      

// handle profile update Ajax Request 
if(isset($_FILES['image'])){
    $name = $s_user->test_input($_POST['name']);
    $email = $s_user->test_input($_POST['email']);
    $gender = $s_user->test_input($_POST['gender']);
    $user_name = $s_user->test_input($_POST['user_name']);
    $phone = $s_user->test_input($_POST['phone']);
     $program = $s_user->test_input($_POST['program']);
     $level = $s_user->test_input($_POST['level']);
     $age = $s_user->test_input($_POST['age']);
     $id = $s_user->test_input($_POST['id']);
    print_r($_POST);
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
    $s_user->update_profile($id,$age,$user_name,$email,$name,$gender,$phone,$newImage,$program,$level);

  }

// change password
if(isset($_POST['action']) && $_POST['action']== 'change_pass'){
    $currentPass = $_POST['curpass'];
    $newPass= $_POST['newpass'];
    $cnewPass = $_POST['cnewpass'];

    $hnewPass = Password_hash($newPass,PASSWORD_DEFAULT);
    // print_r($_POST);
    if($newPass != $cnewPass){
       echo $s_user->showMessage('danger','Pasvfgxsword did not match!');
    }
    else{
       if(password_verify($currentPass,$x_pass)){
          $s_user->change_password($hnewPass,$x_id);
          echo $s_user->showMessage('success','Password Change Successfully!');
          $s_user->notification($x_id,'Password change');
            
       }
       else{
          echo $s_user->showMessage('danger','Current Password is Wrong!');
       }
    }
}

 // search suggestions

if(isset($_POST['action'])&& $_POST['action']== 'suggestion'){

    $keyword = $s_user->test_input($_POST['search']);

    $s_user->search_item($keyword);
    $keyword =array( 
        "%".$keyword."%",
         $keyword."%",
        "%".$keyword,
        $keyword,
        "_".$keyword,
        $keyword."_",
        "_".$keyword."_"

);

    $data_s = $s_user->search_item($keyword[0],$keyword[1],$keyword[2],$keyword[3],$keyword[4],$keyword[5],$keyword[6]);
    $output='';
    if($data_s){
        $output.= '';
        foreach($data_s as $row){

           $output= '
           <hr></li>
           <li><p id="" onclick="changeValue(this)" class="items">'.$row['product_name'].'</p></li>
           <li><p id="" onclick="changeValue(this)" class="items">'.$row['business_name'].'</p></li>
           <script>
                function changeValue(o){
                    document.getElementById("m_search").value=o.innerHTML;
                    $("#auto_suggest").fadeOut();
                    }
        </script>

         
           ';
        }

        	
					echo $output;
    }else{
        echo '<li><span id="" class="items lead muted">Suggestions</span></li>
        <hr>';
    }
}

 // search 
 if(isset($_POST['action'])&& $_POST['action']== 'search'){

    $keyword = $s_user->test_input($_POST['search']);

    $s_user->search_item($keyword);
    $keyword =array( 
        "%".$keyword."%",
         $keyword,
        "%".$keyword."%",
        $keyword,
        "_".$keyword,
        $keyword."_",
        "_".$keyword."_"

);
    $data = $s_user->search_item($keyword[0],$keyword[1],$keyword[2],$keyword[3],$keyword[4],$keyword[5],$keyword[6]);
   
    $output='';
    $path = 'assets/php/products/';
    $display_rating='';
    
    
	if($data){
		$output.= '';
        
         $display_rating;
		foreach ($data as $row){
                $id=$row['id'];
				$product_image = $path.$row['product_image'];
                $discount= ['discount'];
                $price_1 = $row['product_price_one'];
                    $price_2 = $row['product_price_two'];
                    $to = "to";
                    $cide="₵";
               
                
                      if ($price_2 == null){
                        $to ="";
                        $price_2="";
                        $cide="";
                       
                } else{
                    $price_1;
                    $price_2 ;
                    $to ;
                    $cide;
                }

               

                if(($s_user->fetch_rating($id)>=1.0) && ($s_user->fetch_rating($id)<=20.0)){
                    $display_rating =' <div style="flex">
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;"  data-toggle="modal" data-target="#R1" class="fa fa-star  ml-4" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="2" data-toggle="modal" data-target="#R2" class="fa fa-star-o Comment_product "  aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="3" data-toggle="modal" data-target="#R3" class="fa fa-star-o Comment_product " aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="4" data-toggle="modal" data-target="#R4" class="fa fa-star-o Comment_product" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                           <span style="color: #ff7315;" id="5" data-toggle="modal" data-target="#R5" class="fa fa-star-o Comment_product"  aria-hidden="true"></span></a>
                           
                        ';
                }elseif (($s_user->fetch_rating($id)>=21.0) && ($s_user->fetch_rating($id)<=50.0)){
                    $display_rating =' <div style="flex">
                    <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;"  data-toggle="modal" data-target="#R1" class="fa fa-star  ml-4" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="2" data-toggle="modal" data-target="#R2" class="fa fa-star Comment_product "  aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="3" data-toggle="modal" data-target="#R3" class="fa fa-star-o Comment_product " aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="4" data-toggle="modal" data-target="#R4" class="fa fa-star-o Comment_product" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                           <span style="color: #ff7315;" id="5" data-toggle="modal" data-target="#R5" class="fa fa-star-o Comment_product"  aria-hidden="true"></span></a>
                           
                ';
                }elseif (($s_user->fetch_rating($id)>=51.0) && ($s_user->fetch_rating($id)<=70.0)) {
                    $display_rating =' <div style="flex">
                    <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;"  data-toggle="modal" data-target="#R1" class="fa fa-star  ml-4" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="2" data-toggle="modal" data-target="#R2" class="fa fa-star Comment_product "  aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="3" data-toggle="modal" data-target="#R3" class="fa fa-star Comment_product " aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="4" data-toggle="modal" data-target="#R4" class="fa fa-star-o Comment_product" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                           <span style="color: #ff7315;" id="5" data-toggle="modal" data-target="#R5" class="fa fa-star-o Comment_product"  aria-hidden="true"></span></a>
                           
                ';
                }elseif (($s_user->fetch_rating($id)>=71.0) && ($s_user->fetch_rating($id)<=100.0)) {
                    $display_rating =' <div style="flex">
                    <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;"  data-toggle="modal" data-target="#R1" class="fa fa-star  ml-4" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="2" data-toggle="modal" data-target="#R2" class="fa fa-star Comment_product "  aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="3" data-toggle="modal" data-target="#R3" class="fa fa-star Comment_product " aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="4" data-toggle="modal" data-target="#R4" class="fa fa-star Comment_product" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                           <span style="color: #ff7315;" id="5" data-toggle="modal" data-target="#R5" class="fa fa-star-o Comment_product"  aria-hidden="true"></span></a>
                           
                ';
                }elseif ($s_user->fetch_rating($id)>=101.0) {
                    $display_rating =' <div style="flex">
                    <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;"  data-toggle="modal" data-target="#R1" class="fa fa-star  ml-4" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="2" data-toggle="modal" data-target="#R2" class="fa fa-star Comment_product "  aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="3" data-toggle="modal" data-target="#R3" class="fa fa-star Comment_product " aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="4" data-toggle="modal" data-target="#R4" class="fa fa-star Comment_product" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                           <span style="color: #ff7315;" id="5" data-toggle="modal" data-target="#R5" class="fa fa-star Comment_product"  aria-hidden="true"></span></a>
                           
                ';
                }else{
                    $display_rating =' <div style="flex">
                    <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;"  data-toggle="modal" data-target="#R1" class="fa fa-star-o  ml-4" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="2" data-toggle="modal" data-target="#R2" class="fa fa-star-o Comment_product "  aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="3" data-toggle="modal" data-target="#R3" class="fa fa-star-o Comment_product " aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="4" data-toggle="modal" data-target="#R4" class="fa fa-star-o Comment_product" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                           <span style="color: #ff7315;" id="5" data-toggle="modal" data-target="#R5" class="fa fa-star-o Comment_product"  aria-hidden="true"></span></a>
                           
                ';}
			$output .='
            

            <div class=" mb-4 product-grid2 transmitv border rounded">
                <div class="product-image2">
                    
                        <img class=" my_product_img img-fluid"  src=" '.$product_image.' ">
                            
                   

                    <div class="transmitv single-item">
                        <form action="#" method="post">
                            <input type="hidden" name="cmd" value="_cart">
                            <input type="hidden" name="add" value="1">
                          
                       
                            <a href="order.php" class="transmitv-cart ptransmitv-cart add-to-cart">
                             Order  a  Service 
                            </a>
                        </form> 
                    </div>
                </div>
                <div class="product-content">
                    <h4 style="color: #ff7315;" class=" lead"> '.$row['product_name'].'</h4>
                    
                   
                    
                    <div class="  " style="display:block"> 
                    <span  class="  border border-dark p-1 bg-dark text-white ">Price ₵'.$price_1.' '.$to.' '.$cide.''.$price_2.'</span>
                    <span  class=" border border-success p-1  bg-success text-white ">50% OFF  </span>
                   
                    </div>
                </div>
                <div class="mb-3 mr-2">
  
                        '.$display_rating.'
                     
                    
                    
                    
                     
          
                
                    <div style="display:flex" class="float-right mr-4">
                    
                    <form action="chat_admin.php" method="post" id="chat_form">
                   
                    <input  type="hidden" id="'.$row['id'].'" class="mr-2 " name="insert" value="'.$row['id'].'"   />
                   
                    <input type="hidden" name="business_name" value="'.$row['business_name'].'">
                    <input type="hidden" name="business_code" value="'.$row['business_code'].'">
                    <input type="hidden" name="product_id" value="'.$row['id'].'">
                    
                    <button type="submit" class="btn mr-2 p-0" name="btn_chat" ><span class="fa fa-comment fa-lg"></span></button>
                    </form>

                 
                    <a href="#c" id="'.$row['id'].'" title="Product Details" class="mr-2 vendor_details " >
                    <span class="fa fa-info-circle fa-lg" aria-hidden="true" data-toggle="modal" data-target="#ProductInfoModal"></span></a>

                   
                    <div>
                    
                    
                    <form action="comment.php" method="get" id="comment_form">
                   
                    <input  type="hidden" id="'.$row['id'].'" class="mr-2 " name="val" value="'.$row['id'].'"   />
                   
                    <input type="hidden" name="business_name" value="'.$row['business_name'].'">
                    <input type="hidden" name="business_code" value="'.$row['business_code'].'">
                    <input type="hidden" name="product_name" value="'.$row['product_name'].'">
                    
               
                    <button type="submit" class="btn mr-2 p-0" name="btn_comment" ><span class="fa fa-comments fa-lg"></span></button>
                    </form>

                    
                    </div>
            
                    
                    </div>
                    

                        </div>

                  
                </div>
            </div>
        </div>	';

             
		}
        // <a href="#c" id="'.$row['id'].'" title="Message Comment" class="Comment_product" >
        // <span class="fa fa-comments fa-lg" aria-hidden="true" data-toggle="modal" data-target="#CommentModal"></span></a>
					
					echo $output;


	}
	else{
        
		echo '<script>document.getElementById("NoResult").innerHTML = "No Results Found"</script>';
        echo '<script>$("#NoResult").show().delay(3000).fadeOut();</script>';
        
	}
 }


 
     
 // fetch all product

 if(isset($_POST['action']) && $_POST['action'] == 'fetchAllProducts' ){
	$output='';
	$data = $s_user->fetchAllProduct();
    // $data_2 =$s_user->fetchAllCommentsByID($val);
	$path = 'assets/php/products/';
    $display_rating='';
    
    
	if($data){
    
		$output.= '';
     
         $display_rating;
		foreach ($data as $row){
                $id=$row['id'];
				$product_image = $path.$row['product_image'];
               
                $price_1 = $row['product_price_one'];
                    $price_2 = $row['product_price_two'];
                    $to = "to";
                    $cide="₵";
                
                      if ($price_2 == null){
                        $to ="";
                        $price_2="";
                        $cide="";
                       
                } else{
                    $price_1;
                    $price_2 ;
                    $to ;
                    $cide;
                }

            
            if(($s_user->fetch_rating($id)>=1.0) && ($s_user->fetch_rating($id)<=20.0)){
                $display_rating =' <div style="flex">
                        <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                        <span style="color: #ff7315;"  data-toggle="modal" data-target="#R1" class="fa fa-star  ml-4" aria-hidden="true"></span></a>
                        <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                        <span style="color: #ff7315;" id="2" data-toggle="modal" data-target="#R2" class="fa fa-star-o Comment_product "  aria-hidden="true"></span></a>
                        <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                        <span style="color: #ff7315;" id="3" data-toggle="modal" data-target="#R3" class="fa fa-star-o Comment_product " aria-hidden="true"></span></a>
                        <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                        <span style="color: #ff7315;" id="4" data-toggle="modal" data-target="#R4" class="fa fa-star-o Comment_product" aria-hidden="true"></span></a>
                        <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                       <span style="color: #ff7315;" id="5" data-toggle="modal" data-target="#R5" class="fa fa-star-o Comment_product"  aria-hidden="true"></span></a>
                       
                    ';
            }elseif (($s_user->fetch_rating($id)>=21.0) && ($s_user->fetch_rating($id)<=50.0)){
                $display_rating =' <div style="flex">
                <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                        <span style="color: #ff7315;"  data-toggle="modal" data-target="#R1" class="fa fa-star  ml-4" aria-hidden="true"></span></a>
                        <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                        <span style="color: #ff7315;" id="2" data-toggle="modal" data-target="#R2" class="fa fa-star Comment_product "  aria-hidden="true"></span></a>
                        <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                        <span style="color: #ff7315;" id="3" data-toggle="modal" data-target="#R3" class="fa fa-star-o Comment_product " aria-hidden="true"></span></a>
                        <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                        <span style="color: #ff7315;" id="4" data-toggle="modal" data-target="#R4" class="fa fa-star-o Comment_product" aria-hidden="true"></span></a>
                        <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                       <span style="color: #ff7315;" id="5" data-toggle="modal" data-target="#R5" class="fa fa-star-o Comment_product"  aria-hidden="true"></span></a>
                       
            ';
            }elseif (($s_user->fetch_rating($id)>=51.0) && ($s_user->fetch_rating($id)<=70.0)) {
                $display_rating =' <div style="flex">
                <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                        <span style="color: #ff7315;"  data-toggle="modal" data-target="#R1" class="fa fa-star  ml-4" aria-hidden="true"></span></a>
                        <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                        <span style="color: #ff7315;" id="2" data-toggle="modal" data-target="#R2" class="fa fa-star Comment_product "  aria-hidden="true"></span></a>
                        <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                        <span style="color: #ff7315;" id="3" data-toggle="modal" data-target="#R3" class="fa fa-star Comment_product " aria-hidden="true"></span></a>
                        <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                        <span style="color: #ff7315;" id="4" data-toggle="modal" data-target="#R4" class="fa fa-star-o Comment_product" aria-hidden="true"></span></a>
                        <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                       <span style="color: #ff7315;" id="5" data-toggle="modal" data-target="#R5" class="fa fa-star-o Comment_product"  aria-hidden="true"></span></a>
                       
            ';
            }elseif (($s_user->fetch_rating($id)>=71.0) && ($s_user->fetch_rating($id)<=100.0)) {
                $display_rating =' <div style="flex">
                <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                        <span style="color: #ff7315;"  data-toggle="modal" data-target="#R1" class="fa fa-star  ml-4" aria-hidden="true"></span></a>
                        <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                        <span style="color: #ff7315;" id="2" data-toggle="modal" data-target="#R2" class="fa fa-star Comment_product "  aria-hidden="true"></span></a>
                        <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                        <span style="color: #ff7315;" id="3" data-toggle="modal" data-target="#R3" class="fa fa-star Comment_product " aria-hidden="true"></span></a>
                        <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                        <span style="color: #ff7315;" id="4" data-toggle="modal" data-target="#R4" class="fa fa-star Comment_product" aria-hidden="true"></span></a>
                        <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                       <span style="color: #ff7315;" id="5" data-toggle="modal" data-target="#R5" class="fa fa-star-o Comment_product"  aria-hidden="true"></span></a>
                       
            ';
            }elseif ($s_user->fetch_rating($id)>=101.0) {
                $display_rating =' <div style="flex">
                <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                        <span style="color: #ff7315;"  data-toggle="modal" data-target="#R1" class="fa fa-star  ml-4" aria-hidden="true"></span></a>
                        <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                        <span style="color: #ff7315;" id="2" data-toggle="modal" data-target="#R2" class="fa fa-star Comment_product "  aria-hidden="true"></span></a>
                        <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                        <span style="color: #ff7315;" id="3" data-toggle="modal" data-target="#R3" class="fa fa-star Comment_product " aria-hidden="true"></span></a>
                        <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                        <span style="color: #ff7315;" id="4" data-toggle="modal" data-target="#R4" class="fa fa-star Comment_product" aria-hidden="true"></span></a>
                        <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                       <span style="color: #ff7315;" id="5" data-toggle="modal" data-target="#R5" class="fa fa-star Comment_product"  aria-hidden="true"></span></a>
                       
            ';
            }else{
                $display_rating =' <div style="flex">
                <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                        <span style="color: #ff7315;"  data-toggle="modal" data-target="#R1" class="fa fa-star-o  ml-4" aria-hidden="true"></span></a>
                        <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                        <span style="color: #ff7315;" id="2" data-toggle="modal" data-target="#R2" class="fa fa-star-o Comment_product "  aria-hidden="true"></span></a>
                        <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                        <span style="color: #ff7315;" id="3" data-toggle="modal" data-target="#R3" class="fa fa-star-o Comment_product " aria-hidden="true"></span></a>
                        <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                        <span style="color: #ff7315;" id="4" data-toggle="modal" data-target="#R4" class="fa fa-star-o Comment_product" aria-hidden="true"></span></a>
                        <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                       <span style="color: #ff7315;" id="5" data-toggle="modal" data-target="#R5" class="fa fa-star-o Comment_product"  aria-hidden="true"></span></a>
                       
            ';
            }
			$output .='
         

        

            <div class=" mb-4 product-grid2  border rounded">
                <div class="product-image2">
                    
                        <img class="" height="50px"  src=" '.$product_image.' ">
                           
                   

                    <div class="transmitv single-item">
                       
                            <input type="hidden" name="cmd" value="_cart">
                            <input type="hidden" name="add" value="1">
                          
                       
                            <form action="order.php" method="get">
                            
                            <input type="hidden" name="product_image" value="'.$row['product_image'].'">
                            <input type="hidden" name="product_name" value="'.$row['product_name'].'">
                            <input type="hidden" name="business_name" value="'.$row['business_name'].'">
                            <input type="hidden" name="business_code" value="'.$row['business_code'].'">
                            <input type="hidden" name="product_price_one" value="'.$row['product_price_one'].'">
                            <input type="hidden" name="product_price_two" value="'.$row['product_price_two'].'">
                            <input type="hidden" name="discount" value="'.$row['discount'].'">
                            <input type="hidden" name="product_id" value="'.$row['id'].'">
                            
                            
                            <input type="submit" class="transmitv-cart ptransmitv-cart add-to-cart" name="btn_order" value="Order Now">
                            
                           
                            </form>
                      
                    </div>
                </div>
                <div class="product-content">
                    <h4 style="color: #ff7315;" class=" lead"> '.$row['product_name'].'</h4>
                    
                   
                    
                    <div class="  " style="display:block"> 
                        <span  class="  border border-dark p-1 bg-dark text-white ">Price ₵'.$price_1.' '.$to.' '.$cide.''.$price_2.'</span>
                    <span  class=" border border-success p-1  bg-success text-white ">50% OFF  </span>
              
                    </div>
                </div>
                <div class="mb-3 mr-2">
  
                        '.$display_rating.'
                     
                    
                    
                    
                     
          
                
                    <div style="display:flex" class="float-right mr-4">
                    
                    <form action="chat_admin.php" method="post" id="chat_form">
                   
                    <input  type="hidden" id="'.$row['id'].'" class="mr-2 " name="insert" value="'.$row['id'].'"   />
                   
                    <input type="hidden" name="business_name" value="'.$row['business_name'].'">
                    <input type="hidden" name="business_code" value="'.$row['business_code'].'">
                    <input type="hidden" name="product_id" value="'.$row['id'].'">
                    
                    <button type="submit" class="btn mr-2 p-0" name="btn_chat" ><span class="fa fa-comment fa-lg"></span></button>
                    </form>

                 
                    <a href="#c" id="'.$row['id'].'" title="Product Details" class="mr-2 vendor_details " >
                    <span class="fa fa-info-circle fa-lg" aria-hidden="true" data-toggle="modal" data-target="#ProductInfoModal"></span></a>

                   
                    <div>
                    
                    
                    <form action="comment.php" method="get" id="comment_form">
                   
                    <input  type="hidden" id="'.$row['id'].'" class="mr-2 " name="val" value="'.$row['id'].'"   />
                   
                    <input type="hidden" name="business_name" value="'.$row['business_name'].'">
                    <input type="hidden" name="business_code" value="'.$row['business_code'].'">
                    <input type="hidden" name="product_name" value="'.$row['product_name'].'">
                    
               
                    <button type="submit" class="btn mr-2 p-0" name="btn_comment" ><span class="fa fa-comments fa-lg"></span></button>
                    </form>

                    
                    </div>
            
                    
                    </div>
                    

                        </div>

                  
                </div>
            </div>
        </div>	
        
             
        <div style="display:none;" id="OrderModal">
        <div class="modal-footer">
        <input type="" name="product_name" value="'.$row['product_name'].'">
        </div>
 </div>      
        ';

           
		}
        // <a href="#c" id="'.$row['id'].'" title="Message Comment" class="Comment_product" >
        // <span class="fa fa-comments fa-lg" aria-hidden="true" data-toggle="modal" data-target="#CommentModal"></span></a>
					
					echo $output;

                    // echo $show_order_modal;
	}
	else{
		echo '<h5 class="text-center font-weight-bold m-2 ">No New Product Posted yet </h5>';
	}



}


   
 // fetch all product by sorting

 if(isset($_POST['action']) && $_POST['action'] == 'fetchAllProductSortBy_01' ){
	$output='';
	$data = $s_user->fetchAllProductBySort(01);
    // $data_2 =$s_user->fetchAllCommentsByID($val);
	$path = 'assets/php/products/';
    $display_rating='';
    
    
	if($data){
		$output.= '';
         $ssql ="select * from product_rating";
         $display_rating;
		foreach ($data as $row){
                $id=$row['id'];
				$product_image = $path.$row['product_image'];
                $price_1 = $row['product_price_one'];
                    $price_2 = $row['product_price_two'];
                    $to = "to";
                    $cide="₵";
                
                      if ($price_2 == null){
                        $to ="";
                        $price_2="";
                        $cide="";
                       
                } else{
                    $price_1;
                    $price_2 ;
                    $to ;
                    $cide;
                }
                if(($s_user->fetch_rating($id)>=1.0) && ($s_user->fetch_rating($id)<=20.0)){
                    $display_rating =' <div style="flex">
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;"  data-toggle="modal" data-target="#R1" class="fa fa-star  ml-4" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="2" data-toggle="modal" data-target="#R2" class="fa fa-star-o Comment_product "  aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="3" data-toggle="modal" data-target="#R3" class="fa fa-star-o Comment_product " aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="4" data-toggle="modal" data-target="#R4" class="fa fa-star-o Comment_product" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                           <span style="color: #ff7315;" id="5" data-toggle="modal" data-target="#R5" class="fa fa-star-o Comment_product"  aria-hidden="true"></span></a>
                           
                        ';
                }elseif (($s_user->fetch_rating($id)>=21.0) && ($s_user->fetch_rating($id)<=50.0)){
                    $display_rating =' <div style="flex">
                    <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;"  data-toggle="modal" data-target="#R1" class="fa fa-star  ml-4" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="2" data-toggle="modal" data-target="#R2" class="fa fa-star Comment_product "  aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="3" data-toggle="modal" data-target="#R3" class="fa fa-star-o Comment_product " aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="4" data-toggle="modal" data-target="#R4" class="fa fa-star-o Comment_product" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                           <span style="color: #ff7315;" id="5" data-toggle="modal" data-target="#R5" class="fa fa-star-o Comment_product"  aria-hidden="true"></span></a>
                           
                ';
                }elseif (($s_user->fetch_rating($id)>=51.0) && ($s_user->fetch_rating($id)<=70.0)) {
                    $display_rating =' <div style="flex">
                    <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;"  data-toggle="modal" data-target="#R1" class="fa fa-star  ml-4" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="2" data-toggle="modal" data-target="#R2" class="fa fa-star Comment_product "  aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="3" data-toggle="modal" data-target="#R3" class="fa fa-star Comment_product " aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="4" data-toggle="modal" data-target="#R4" class="fa fa-star-o Comment_product" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                           <span style="color: #ff7315;" id="5" data-toggle="modal" data-target="#R5" class="fa fa-star-o Comment_product"  aria-hidden="true"></span></a>
                           
                ';
                }elseif (($s_user->fetch_rating($id)>=71.0) && ($s_user->fetch_rating($id)<=100.0)) {
                    $display_rating =' <div style="flex">
                    <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;"  data-toggle="modal" data-target="#R1" class="fa fa-star  ml-4" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="2" data-toggle="modal" data-target="#R2" class="fa fa-star Comment_product "  aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="3" data-toggle="modal" data-target="#R3" class="fa fa-star Comment_product " aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="4" data-toggle="modal" data-target="#R4" class="fa fa-star Comment_product" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                           <span style="color: #ff7315;" id="5" data-toggle="modal" data-target="#R5" class="fa fa-star-o Comment_product"  aria-hidden="true"></span></a>
                           
                ';
                }elseif ($s_user->fetch_rating($id)>=101.0) {
                    $display_rating =' <div style="flex">
                    <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;"  data-toggle="modal" data-target="#R1" class="fa fa-star  ml-4" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="2" data-toggle="modal" data-target="#R2" class="fa fa-star Comment_product "  aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="3" data-toggle="modal" data-target="#R3" class="fa fa-star Comment_product " aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="4" data-toggle="modal" data-target="#R4" class="fa fa-star Comment_product" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                           <span style="color: #ff7315;" id="5" data-toggle="modal" data-target="#R5" class="fa fa-star Comment_product"  aria-hidden="true"></span></a>
                           
                ';
                }else{
                    $display_rating =' <div style="flex">
                    <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;"  data-toggle="modal" data-target="#R1" class="fa fa-star-o  ml-4" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="2" data-toggle="modal" data-target="#R2" class="fa fa-star-o Comment_product "  aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="3" data-toggle="modal" data-target="#R3" class="fa fa-star-o Comment_product " aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="4" data-toggle="modal" data-target="#R4" class="fa fa-star-o Comment_product" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                           <span style="color: #ff7315;" id="5" data-toggle="modal" data-target="#R5" class="fa fa-star-o Comment_product"  aria-hidden="true"></span></a>
                           
                ';}
			$output .='
            

            <div class=" mb-4 product-grid2  border rounded">
                <div class="product-image2">
                    
                        <img class=" my_product_img img-fluid"  src=" '.$product_image.' ">
                            
                   

                    <div class="transmitv single-item">
                        <form action="#" method="post">
                            <input type="hidden" name="cmd" value="_cart">
                            <input type="hidden" name="add" value="1">
                          
                       
                            <a href="order.php" class="transmitv-cart ptransmitv-cart add-to-cart">
                             Order  a  Service
                            </a>
                        </form> 
                    </div>
                </div>
                <div class="product-content">
                    <h4 style="color: #ff7315;" class=" lead"> '.$row['product_name'].'</h4>
                    
                   
                    
                    <div class="  " style="display:block"> 
                        <span  class="  border border-dark p-1 bg-dark text-white ">Price ₵'.$price_1.' '.$to.' '.$cide.''.$price_2.'</span>
                    <span  class=" border border-success p-1  bg-success text-white ">50% OFF  </span>
              
                    </div>
                </div>
                <div class="mb-3 mr-2">
  
                        '.$display_rating.'
                     
                    
                    
                    
                     
          
                
                    <div style="display:flex" class="float-right mr-4">
                    
                    <form action="chat_admin.php" method="post" id="chat_form">
                   
                    <input  type="hidden" id="'.$row['id'].'" class="mr-2 " name="insert" value="'.$row['id'].'"   />
                   
                    <input type="hidden" name="business_name" value="'.$row['business_name'].'">
                    <input type="hidden" name="business_code" value="'.$row['business_code'].'">
                    <input type="hidden" name="product_id" value="'.$row['id'].'">
                    
                    <button type="submit" class="btn mr-2 p-0" name="btn_chat" ><span class="fa fa-comment fa-lg"></span></button>
                    </form>

                 
                    <a href="#c" id="'.$row['id'].'" title="Product Details" class="mr-2 vendor_details " >
                    <span class="fa fa-info-circle fa-lg" aria-hidden="true" data-toggle="modal" data-target="#ProductInfoModal"></span></a>

                   
                    <div>
                    
                    
                    <form action="comment.php" method="get" id="comment_form">
                   
                    <input  type="hidden" id="'.$row['id'].'" class="mr-2 " name="val" value="'.$row['id'].'"   />
                   
                    <input type="hidden" name="business_name" value="'.$row['business_name'].'">
                    <input type="hidden" name="business_code" value="'.$row['business_code'].'">
                    <input type="hidden" name="product_name" value="'.$row['product_name'].'">
                    
               
                    <button type="submit" class="btn mr-2 p-0" name="btn_comment" ><span class="fa fa-comments fa-lg"></span></button>
                    </form>

                    
                    </div>
            
                    
                    </div>
                    

                        </div>

                  
                </div>
            </div>
        </div>	';

             
		}
        // <a href="#c" id="'.$row['id'].'" title="Message Comment" class="Comment_product" >
        // <span class="fa fa-comments fa-lg" aria-hidden="true" data-toggle="modal" data-target="#CommentModal"></span></a>
					
					echo $output;


	}
	else{
		echo '<h5 class="text-center font-weight-bold m-2 "> No New Product Posted yet </h5>';
	}



}


   
 // fetch all product by sorting

 if(isset($_POST['action']) && $_POST['action'] == 'fetchAllProductSortBy_07' ){
	$output='';
	$data = $s_user->fetchAllProductBySort(07);
    // $data_2 =$s_user->fetchAllCommentsByID($val);
	$path = 'assets/php/products/';
    $display_rating='';
    
    
	if($data){
		$output.= '';
         $ssql ="select * from product_rating";
         $display_rating;
		foreach ($data as $row){
                $id=$row['id'];
				$product_image = $path.$row['product_image'];
                $price_1 = $row['product_price_one'];
                    $price_2 = $row['product_price_two'];
                    $to = "to";
                    $cide="₵";
                
                      if ($price_2 == null){
                        $to ="";
                        $price_2="";
                        $cide="";
                        
                } else{
                    $price_1;
                    $price_2 ;
                    $to ;
                    $cide;
                }
                if(($s_user->fetch_rating($id)>=1.0) && ($s_user->fetch_rating($id)<=20.0)){
                    $display_rating =' <div style="flex">
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;"  data-toggle="modal" data-target="#R1" class="fa fa-star  ml-4" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="2" data-toggle="modal" data-target="#R2" class="fa fa-star-o Comment_product "  aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="3" data-toggle="modal" data-target="#R3" class="fa fa-star-o Comment_product " aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="4" data-toggle="modal" data-target="#R4" class="fa fa-star-o Comment_product" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                           <span style="color: #ff7315;" id="5" data-toggle="modal" data-target="#R5" class="fa fa-star-o Comment_product"  aria-hidden="true"></span></a>
                           
                        ';
                }elseif (($s_user->fetch_rating($id)>=21.0) && ($s_user->fetch_rating($id)<=50.0)){
                    $display_rating =' <div style="flex">
                    <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;"  data-toggle="modal" data-target="#R1" class="fa fa-star  ml-4" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="2" data-toggle="modal" data-target="#R2" class="fa fa-star Comment_product "  aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="3" data-toggle="modal" data-target="#R3" class="fa fa-star-o Comment_product " aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="4" data-toggle="modal" data-target="#R4" class="fa fa-star-o Comment_product" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                           <span style="color: #ff7315;" id="5" data-toggle="modal" data-target="#R5" class="fa fa-star-o Comment_product"  aria-hidden="true"></span></a>
                           
                ';
                }elseif (($s_user->fetch_rating($id)>=51.0) && ($s_user->fetch_rating($id)<=70.0)) {
                    $display_rating =' <div style="flex">
                    <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;"  data-toggle="modal" data-target="#R1" class="fa fa-star  ml-4" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="2" data-toggle="modal" data-target="#R2" class="fa fa-star Comment_product "  aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="3" data-toggle="modal" data-target="#R3" class="fa fa-star Comment_product " aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="4" data-toggle="modal" data-target="#R4" class="fa fa-star-o Comment_product" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                           <span style="color: #ff7315;" id="5" data-toggle="modal" data-target="#R5" class="fa fa-star-o Comment_product"  aria-hidden="true"></span></a>
                           
                ';
                }elseif (($s_user->fetch_rating($id)>=71.0) && ($s_user->fetch_rating($id)<=100.0)) {
                    $display_rating =' <div style="flex">
                    <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;"  data-toggle="modal" data-target="#R1" class="fa fa-star  ml-4" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="2" data-toggle="modal" data-target="#R2" class="fa fa-star Comment_product "  aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="3" data-toggle="modal" data-target="#R3" class="fa fa-star Comment_product " aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="4" data-toggle="modal" data-target="#R4" class="fa fa-star Comment_product" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                           <span style="color: #ff7315;" id="5" data-toggle="modal" data-target="#R5" class="fa fa-star-o Comment_product"  aria-hidden="true"></span></a>
                           
                ';
                }elseif ($s_user->fetch_rating($id)>=101.0) {
                    $display_rating =' <div style="flex">
                    <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;"  data-toggle="modal" data-target="#R1" class="fa fa-star  ml-4" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="2" data-toggle="modal" data-target="#R2" class="fa fa-star Comment_product "  aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="3" data-toggle="modal" data-target="#R3" class="fa fa-star Comment_product " aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="4" data-toggle="modal" data-target="#R4" class="fa fa-star Comment_product" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                           <span style="color: #ff7315;" id="5" data-toggle="modal" data-target="#R5" class="fa fa-star Comment_product"  aria-hidden="true"></span></a>
                           
                ';
                }else{
                    $display_rating =' <div style="flex">
                    <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;"  data-toggle="modal" data-target="#R1" class="fa fa-star-o  ml-4" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="2" data-toggle="modal" data-target="#R2" class="fa fa-star-o Comment_product "  aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="3" data-toggle="modal" data-target="#R3" class="fa fa-star-o Comment_product " aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="4" data-toggle="modal" data-target="#R4" class="fa fa-star-o Comment_product" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                           <span style="color: #ff7315;" id="5" data-toggle="modal" data-target="#R5" class="fa fa-star-o Comment_product"  aria-hidden="true"></span></a>
                           
                ';}
    
			$output .='
            

            <div class=" mb-4 product-grid2  border rounded">
                <div class="product-image2">
                    
                        <img class=" my_product_img img-fluid"  src=" '.$product_image.' ">
                            
                   

                    <div class="transmitv single-item">
                        <form action="#" method="post">
                            <input type="hidden" name="cmd" value="_cart">
                            <input type="hidden" name="add" value="1">
                          
                       
                            <a href="order.php" class="transmitv-cart ptransmitv-cart add-to-cart">
                             Order  a  Service
                            </a>
                        </form> 
                    </div>
                </div>
                <div class="product-content">
                    <h4 style="color: #ff7315;" class=" lead"> '.$row['product_name'].'</h4>
                    
                   
                    
                    <div class="  " style="display:block"> 
                        <span  class="  border border-dark p-1 bg-dark text-white ">Price ₵'.$price_1.' '.$to.' '.$cide.''.$price_2.'</span>
                    <span  class=" border border-success p-1  bg-success text-white ">50% OFF  </span>
              
                    </div>
                </div>
                <div class="mb-3 mr-2">
  
                        '.$display_rating.'
                     
                    
                    
                    
                     
          
                
                    <div style="display:flex" class="float-right mr-4">
                    
                    <form action="chat_admin.php" method="post" id="chat_form">
                   
                    <input  type="hidden" id="'.$row['id'].'" class="mr-2 " name="insert" value="'.$row['id'].'"   />
                   
                    <input type="hidden" name="business_name" value="'.$row['business_name'].'">
                    <input type="hidden" name="business_code" value="'.$row['business_code'].'">
                    <input type="hidden" name="product_id" value="'.$row['id'].'">
                    
                    <button type="submit" class="btn mr-2 p-0" name="btn_chat" ><span class="fa fa-comment fa-lg"></span></button>
                    </form>

                 
                    <a href="#c" id="'.$row['id'].'" title="Product Details" class="mr-2 vendor_details " >
                    <span class="fa fa-info-circle fa-lg" aria-hidden="true" data-toggle="modal" data-target="#ProductInfoModal"></span></a>

                   
                    <div>
                    
                    
                    <form action="comment.php" method="get" id="comment_form">
                   
                    <input  type="hidden" id="'.$row['id'].'" class="mr-2 " name="val" value="'.$row['id'].'"   />
                   
                    <input type="hidden" name="business_name" value="'.$row['business_name'].'">
                    <input type="hidden" name="business_code" value="'.$row['business_code'].'">
                    <input type="hidden" name="product_name" value="'.$row['product_name'].'">
                    
               
                    <button type="submit" class="btn mr-2 p-0" name="btn_comment" ><span class="fa fa-comments fa-lg"></span></button>
                    </form>

                    
                    </div>
            
                    
                    </div>
                    

                        </div>

                  
                </div>
            </div>
        </div>	';

             
		}
        // <a href="#c" id="'.$row['id'].'" title="Message Comment" class="Comment_product" >
        // <span class="fa fa-comments fa-lg" aria-hidden="true" data-toggle="modal" data-target="#CommentModal"></span></a>
					
					echo $output;


	}
	else{
		echo '<h5 class="text-center font-weight-bold m-2">No New Product Posted yet </h5>';
	}



}


 // fetch all product by sorting

 if(isset($_POST['action']) && $_POST['action'] == 'fetchAllProductSortBy_03' ){
	$output='';
	$data = $s_user->fetchAllProductBySort(03);
    // $data_2 =$s_user->fetchAllCommentsByID($val);
	$path = 'assets/php/products/';
    $display_rating='';
    
    
	if($data){
		$output.= '';
         $ssql ="select * from product_rating";
         $display_rating;
		foreach ($data as $row){
                $id=$row['id'];
				$product_image = $path.$row['product_image'];
                $price_1 = $row['product_price_one'];
                    $price_2 = $row['product_price_two'];
                    $to = "to";
                    $cide="₵";
                
                      if ($price_2 == null){
                        $to ="";
                        $price_2="";
                        $cide="";
                        
                } else{
                    $price_1;
                    $price_2 ;
                    $to ;
                    $cide;
                }
                if(($s_user->fetch_rating($id)>=1.0) && ($s_user->fetch_rating($id)<=20.0)){
                    $display_rating =' <div style="flex">
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;"  data-toggle="modal" data-target="#R1" class="fa fa-star  ml-4" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="2" data-toggle="modal" data-target="#R2" class="fa fa-star-o Comment_product "  aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="3" data-toggle="modal" data-target="#R3" class="fa fa-star-o Comment_product " aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="4" data-toggle="modal" data-target="#R4" class="fa fa-star-o Comment_product" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                           <span style="color: #ff7315;" id="5" data-toggle="modal" data-target="#R5" class="fa fa-star-o Comment_product"  aria-hidden="true"></span></a>
                           
                        ';
                }elseif (($s_user->fetch_rating($id)>=21.0) && ($s_user->fetch_rating($id)<=50.0)){
                    $display_rating =' <div style="flex">
                    <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;"  data-toggle="modal" data-target="#R1" class="fa fa-star  ml-4" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="2" data-toggle="modal" data-target="#R2" class="fa fa-star Comment_product "  aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="3" data-toggle="modal" data-target="#R3" class="fa fa-star-o Comment_product " aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="4" data-toggle="modal" data-target="#R4" class="fa fa-star-o Comment_product" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                           <span style="color: #ff7315;" id="5" data-toggle="modal" data-target="#R5" class="fa fa-star-o Comment_product"  aria-hidden="true"></span></a>
                           
                ';
                }elseif (($s_user->fetch_rating($id)>=51.0) && ($s_user->fetch_rating($id)<=70.0)) {
                    $display_rating =' <div style="flex">
                    <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;"  data-toggle="modal" data-target="#R1" class="fa fa-star  ml-4" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="2" data-toggle="modal" data-target="#R2" class="fa fa-star Comment_product "  aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="3" data-toggle="modal" data-target="#R3" class="fa fa-star Comment_product " aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="4" data-toggle="modal" data-target="#R4" class="fa fa-star-o Comment_product" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                           <span style="color: #ff7315;" id="5" data-toggle="modal" data-target="#R5" class="fa fa-star-o Comment_product"  aria-hidden="true"></span></a>
                           
                ';
                }elseif (($s_user->fetch_rating($id)>=71.0) && ($s_user->fetch_rating($id)<=100.0)) {
                    $display_rating =' <div style="flex">
                    <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;"  data-toggle="modal" data-target="#R1" class="fa fa-star  ml-4" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="2" data-toggle="modal" data-target="#R2" class="fa fa-star Comment_product "  aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="3" data-toggle="modal" data-target="#R3" class="fa fa-star Comment_product " aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="4" data-toggle="modal" data-target="#R4" class="fa fa-star Comment_product" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                           <span style="color: #ff7315;" id="5" data-toggle="modal" data-target="#R5" class="fa fa-star-o Comment_product"  aria-hidden="true"></span></a>
                           
                ';
                }elseif ($s_user->fetch_rating($id)>=101.0) {
                    $display_rating =' <div style="flex">
                    <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;"  data-toggle="modal" data-target="#R1" class="fa fa-star  ml-4" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="2" data-toggle="modal" data-target="#R2" class="fa fa-star Comment_product "  aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="3" data-toggle="modal" data-target="#R3" class="fa fa-star Comment_product " aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="4" data-toggle="modal" data-target="#R4" class="fa fa-star Comment_product" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                           <span style="color: #ff7315;" id="5" data-toggle="modal" data-target="#R5" class="fa fa-star Comment_product"  aria-hidden="true"></span></a>
                           
                ';
                }else{
                    $display_rating =' <div style="flex">
                    <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;"  data-toggle="modal" data-target="#R1" class="fa fa-star-o  ml-4" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="2" data-toggle="modal" data-target="#R2" class="fa fa-star-o Comment_product "  aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="3" data-toggle="modal" data-target="#R3" class="fa fa-star-o Comment_product " aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="4" data-toggle="modal" data-target="#R4" class="fa fa-star-o Comment_product" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                           <span style="color: #ff7315;" id="5" data-toggle="modal" data-target="#R5" class="fa fa-star-o Comment_product"  aria-hidden="true"></span></a>
                           
                ';}
    
			$output .='
            

            <div class=" mb-4 product-grid2  border rounded">
                <div class="product-image2">
                    
                        <img class=" my_product_img img-fluid"  src=" '.$product_image.' ">
                            
                   

                    <div class="transmitv single-item">
                        <form action="#" method="post">
                            <input type="hidden" name="cmd" value="_cart">
                            <input type="hidden" name="add" value="1">
                          
                       
                            <a href="order.php" class="transmitv-cart ptransmitv-cart add-to-cart">
                             Order  a  Service
                            </a>
                        </form> 
                    </div>
                </div>
                <div class="product-content">
                    <h4 style="color: #ff7315;" class=" lead"> '.$row['product_name'].'</h4>
                    
                   
                    
                    <div class="  " style="display:block"> 
                        <span  class="  border border-dark p-1 bg-dark text-white ">Price ₵'.$price_1.' '.$to.' '.$cide.''.$price_2.'</span>
                    <span  class=" border border-success p-1  bg-success text-white ">50% OFF  </span>
              
                    </div>
                </div>
                <div class="mb-3 mr-2">
  
                        '.$display_rating.'
                     
                    
                    
                    
                     
          
                
                    <div style="display:flex" class="float-right mr-4">
                    
                    <form action="chat_admin.php" method="post" id="chat_form">
                   
                    <input  type="hidden" id="'.$row['id'].'" class="mr-2 " name="insert" value="'.$row['id'].'"   />
                   
                    <input type="hidden" name="business_name" value="'.$row['business_name'].'">
                    <input type="hidden" name="business_code" value="'.$row['business_code'].'">
                    <input type="hidden" name="product_id" value="'.$row['id'].'">
                    
                    <button type="submit" class="btn mr-2 p-0" name="btn_chat" ><span class="fa fa-comment fa-lg"></span></button>
                    </form>

                 
                    <a href="#c" id="'.$row['id'].'" title="Product Details" class="mr-2 vendor_details " >
                    <span class="fa fa-info-circle fa-lg" aria-hidden="true" data-toggle="modal" data-target="#ProductInfoModal"></span></a>

                   
                    <div>
                    
                    
                    <form action="comment.php" method="get" id="comment_form">
                   
                    <input  type="hidden" id="'.$row['id'].'" class="mr-2 " name="val" value="'.$row['id'].'"   />
                   
                    <input type="hidden" name="business_name" value="'.$row['business_name'].'">
                    <input type="hidden" name="business_code" value="'.$row['business_code'].'">
                    <input type="hidden" name="product_name" value="'.$row['product_name'].'">
                    
               
                    <button type="submit" class="btn mr-2 p-0" name="btn_comment" ><span class="fa fa-comments fa-lg"></span></button>
                    </form>

                    
                    </div>
            
                    
                    </div>
                    

                        </div>

                  
                </div>
            </div>
        </div>	';

             
		}
        // <a href="#c" id="'.$row['id'].'" title="Message Comment" class="Comment_product" >
        // <span class="fa fa-comments fa-lg" aria-hidden="true" data-toggle="modal" data-target="#CommentModal"></span></a>
					
					echo $output;


	}
	else{
		echo '<h5 class="text-center font-weight-bold m-2">No New Product Posted yet </h5>';
	}



}


 // fetch all product by sorting

 if(isset($_POST['action']) && $_POST['action'] == 'fetchAllProductSortBy_04' ){
	$output='';
	$data = $s_user->fetchAllProductBySort(04);
    // $data_2 =$s_user->fetchAllCommentsByID($val);
	$path = 'assets/php/products/';
    $display_rating='';
    
    
	if($data){
		$output.= '';
         $ssql ="select * from product_rating";
         $display_rating;
		foreach ($data as $row){
                $id=$row['id'];
				$product_image = $path.$row['product_image'];
                $price_1 = $row['product_price_one'];
                    $price_2 = $row['product_price_two'];
                    $to = "to";
                    $cide="₵";
                
                      if ($price_2 == null){
                        $to ="";
                        $price_2="";
                        $cide="";
                        
                } else{
                    $price_1;
                    $price_2 ;
                    $to ;
                    $cide;
                }
                if(($s_user->fetch_rating($id)>=1.0) && ($s_user->fetch_rating($id)<=20.0)){
                    $display_rating =' <div style="flex">
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;"  data-toggle="modal" data-target="#R1" class="fa fa-star  ml-4" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="2" data-toggle="modal" data-target="#R2" class="fa fa-star-o Comment_product "  aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="3" data-toggle="modal" data-target="#R3" class="fa fa-star-o Comment_product " aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="4" data-toggle="modal" data-target="#R4" class="fa fa-star-o Comment_product" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                           <span style="color: #ff7315;" id="5" data-toggle="modal" data-target="#R5" class="fa fa-star-o Comment_product"  aria-hidden="true"></span></a>
                           
                        ';
                }elseif (($s_user->fetch_rating($id)>=21.0) && ($s_user->fetch_rating($id)<=50.0)){
                    $display_rating =' <div style="flex">
                    <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;"  data-toggle="modal" data-target="#R1" class="fa fa-star  ml-4" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="2" data-toggle="modal" data-target="#R2" class="fa fa-star Comment_product "  aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="3" data-toggle="modal" data-target="#R3" class="fa fa-star-o Comment_product " aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="4" data-toggle="modal" data-target="#R4" class="fa fa-star-o Comment_product" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                           <span style="color: #ff7315;" id="5" data-toggle="modal" data-target="#R5" class="fa fa-star-o Comment_product"  aria-hidden="true"></span></a>
                           
                ';
                }elseif (($s_user->fetch_rating($id)>=51.0) && ($s_user->fetch_rating($id)<=70.0)) {
                    $display_rating =' <div style="flex">
                    <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;"  data-toggle="modal" data-target="#R1" class="fa fa-star  ml-4" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="2" data-toggle="modal" data-target="#R2" class="fa fa-star Comment_product "  aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="3" data-toggle="modal" data-target="#R3" class="fa fa-star Comment_product " aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="4" data-toggle="modal" data-target="#R4" class="fa fa-star-o Comment_product" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                           <span style="color: #ff7315;" id="5" data-toggle="modal" data-target="#R5" class="fa fa-star-o Comment_product"  aria-hidden="true"></span></a>
                           
                ';
                }elseif (($s_user->fetch_rating($id)>=71.0) && ($s_user->fetch_rating($id)<=100.0)) {
                    $display_rating =' <div style="flex">
                    <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;"  data-toggle="modal" data-target="#R1" class="fa fa-star  ml-4" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="2" data-toggle="modal" data-target="#R2" class="fa fa-star Comment_product "  aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="3" data-toggle="modal" data-target="#R3" class="fa fa-star Comment_product " aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="4" data-toggle="modal" data-target="#R4" class="fa fa-star Comment_product" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                           <span style="color: #ff7315;" id="5" data-toggle="modal" data-target="#R5" class="fa fa-star-o Comment_product"  aria-hidden="true"></span></a>
                           
                ';
                }elseif ($s_user->fetch_rating($id)>=101.0) {
                    $display_rating =' <div style="flex">
                    <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;"  data-toggle="modal" data-target="#R1" class="fa fa-star  ml-4" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="2" data-toggle="modal" data-target="#R2" class="fa fa-star Comment_product "  aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="3" data-toggle="modal" data-target="#R3" class="fa fa-star Comment_product " aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="4" data-toggle="modal" data-target="#R4" class="fa fa-star Comment_product" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                           <span style="color: #ff7315;" id="5" data-toggle="modal" data-target="#R5" class="fa fa-star Comment_product"  aria-hidden="true"></span></a>
                           
                ';
                }else{
                    $display_rating =' <div style="flex">
                    <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;"  data-toggle="modal" data-target="#R1" class="fa fa-star-o  ml-4" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="2" data-toggle="modal" data-target="#R2" class="fa fa-star-o Comment_product "  aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="3" data-toggle="modal" data-target="#R3" class="fa fa-star-o Comment_product " aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="4" data-toggle="modal" data-target="#R4" class="fa fa-star-o Comment_product" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                           <span style="color: #ff7315;" id="5" data-toggle="modal" data-target="#R5" class="fa fa-star-o Comment_product"  aria-hidden="true"></span></a>
                           
                ';}
    
			$output .='
            

            <div class=" mb-4 product-grid2  border rounded">
                <div class="product-image2">
                    
                        <img class=" my_product_img img-fluid"  src=" '.$product_image.' ">
                            
                   

                    <div class="transmitv single-item">
                        <form action="#" method="post">
                            <input type="hidden" name="cmd" value="_cart">
                            <input type="hidden" name="add" value="1">
                          
                       
                            <a href="order.php" class="transmitv-cart ptransmitv-cart add-to-cart">
                             Order  a  Service
                            </a>
                        </form> 
                    </div>
                </div>
                <div class="product-content">
                    <h4 style="color: #ff7315;" class=" lead"> '.$row['product_name'].'</h4>
                    
                   
                    
                    <div class="  " style="display:block"> 
                        <span  class="  border border-dark p-1 bg-dark text-white ">Price ₵'.$price_1.' '.$to.' '.$cide.''.$price_2.'</span>
                    <span  class=" border border-success p-1  bg-success text-white ">50% OFF  </span>
              
                    </div>
                </div>
                <div class="mb-3 mr-2">
  
                        '.$display_rating.'
                     
                    
                    
                    
                     
          
                
                    <div style="display:flex" class="float-right mr-4">
                    
                    <form action="chat_admin.php" method="post" id="chat_form">
                   
                    <input  type="hidden" id="'.$row['id'].'" class="mr-2 " name="insert" value="'.$row['id'].'"   />
                   
                    <input type="hidden" name="business_name" value="'.$row['business_name'].'">
                    <input type="hidden" name="business_code" value="'.$row['business_code'].'">
                    <input type="hidden" name="product_id" value="'.$row['id'].'">
                    
                    <button type="submit" class="btn mr-2 p-0" name="btn_chat" ><span class="fa fa-comment fa-lg"></span></button>
                    </form>

                 
                    <a href="#c" id="'.$row['id'].'" title="Product Details" class="mr-2 vendor_details " >
                    <span class="fa fa-info-circle fa-lg" aria-hidden="true" data-toggle="modal" data-target="#ProductInfoModal"></span></a>

                   
                    <div>
                    
                    
                    <form action="comment.php" method="get" id="comment_form">
                   
                    <input  type="hidden" id="'.$row['id'].'" class="mr-2 " name="val" value="'.$row['id'].'"   />
                   
                    <input type="hidden" name="business_name" value="'.$row['business_name'].'">
                    <input type="hidden" name="business_code" value="'.$row['business_code'].'">
                    <input type="hidden" name="product_name" value="'.$row['product_name'].'">
                    
               
                    <button type="submit" class="btn mr-2 p-0" name="btn_comment" ><span class="fa fa-comments fa-lg"></span></button>
                    </form>

                    
                    </div>
            
                    
                    </div>
                    

                        </div>

                  
                </div>
            </div>
        </div>	';

             
		}
        // <a href="#c" id="'.$row['id'].'" title="Message Comment" class="Comment_product" >
        // <span class="fa fa-comments fa-lg" aria-hidden="true" data-toggle="modal" data-target="#CommentModal"></span></a>
					
					echo $output;


	}
	else{
		echo '<h5 class="text-center font-weight-bold m-2">No New Product Posted yet </h5>';
	}



}



 // fetch all product by sorting

 if(isset($_POST['action']) && $_POST['action'] == 'fetchAllProductSortBy_05' ){
	$output='';
	$data = $s_user->fetchAllProductBySort(05);
    // $data_2 =$s_user->fetchAllCommentsByID($val);
	$path = 'assets/php/products/';
    $display_rating='';
    
    
	if($data){
		$output.= '';
         $ssql ="select * from product_rating";
         $display_rating;
		foreach ($data as $row){
                $id=$row['id'];
				$product_image = $path.$row['product_image'];
                $price_1 = $row['product_price_one'];
                    $price_2 = $row['product_price_two'];
                    $to = "to";
                    $cide="₵";
                
                      if ($price_2 == null){
                        $to ="";
                        $price_2="";
                        $cide="";
                        
                } else{
                    $price_1;
                    $price_2 ;
                    $to ;
                    $cide;
                }
                if(($s_user->fetch_rating($id)>=1.0) && ($s_user->fetch_rating($id)<=20.0)){
                    $display_rating =' <div style="flex">
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;"  data-toggle="modal" data-target="#R1" class="fa fa-star  ml-4" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="2" data-toggle="modal" data-target="#R2" class="fa fa-star-o Comment_product "  aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="3" data-toggle="modal" data-target="#R3" class="fa fa-star-o Comment_product " aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="4" data-toggle="modal" data-target="#R4" class="fa fa-star-o Comment_product" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                           <span style="color: #ff7315;" id="5" data-toggle="modal" data-target="#R5" class="fa fa-star-o Comment_product"  aria-hidden="true"></span></a>
                           
                        ';
                }elseif (($s_user->fetch_rating($id)>=21.0) && ($s_user->fetch_rating($id)<=50.0)){
                    $display_rating =' <div style="flex">
                    <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;"  data-toggle="modal" data-target="#R1" class="fa fa-star  ml-4" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="2" data-toggle="modal" data-target="#R2" class="fa fa-star Comment_product "  aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="3" data-toggle="modal" data-target="#R3" class="fa fa-star-o Comment_product " aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="4" data-toggle="modal" data-target="#R4" class="fa fa-star-o Comment_product" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                           <span style="color: #ff7315;" id="5" data-toggle="modal" data-target="#R5" class="fa fa-star-o Comment_product"  aria-hidden="true"></span></a>
                           
                ';
                }elseif (($s_user->fetch_rating($id)>=51.0) && ($s_user->fetch_rating($id)<=70.0)) {
                    $display_rating =' <div style="flex">
                    <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;"  data-toggle="modal" data-target="#R1" class="fa fa-star  ml-4" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="2" data-toggle="modal" data-target="#R2" class="fa fa-star Comment_product "  aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="3" data-toggle="modal" data-target="#R3" class="fa fa-star Comment_product " aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="4" data-toggle="modal" data-target="#R4" class="fa fa-star-o Comment_product" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                           <span style="color: #ff7315;" id="5" data-toggle="modal" data-target="#R5" class="fa fa-star-o Comment_product"  aria-hidden="true"></span></a>
                           
                ';
                }elseif (($s_user->fetch_rating($id)>=71.0) && ($s_user->fetch_rating($id)<=100.0)) {
                    $display_rating =' <div style="flex">
                    <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;"  data-toggle="modal" data-target="#R1" class="fa fa-star  ml-4" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="2" data-toggle="modal" data-target="#R2" class="fa fa-star Comment_product "  aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="3" data-toggle="modal" data-target="#R3" class="fa fa-star Comment_product " aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="4" data-toggle="modal" data-target="#R4" class="fa fa-star Comment_product" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                           <span style="color: #ff7315;" id="5" data-toggle="modal" data-target="#R5" class="fa fa-star-o Comment_product"  aria-hidden="true"></span></a>
                           
                ';
                }elseif ($s_user->fetch_rating($id)>=101.0) {
                    $display_rating =' <div style="flex">
                    <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;"  data-toggle="modal" data-target="#R1" class="fa fa-star  ml-4" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="2" data-toggle="modal" data-target="#R2" class="fa fa-star Comment_product "  aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="3" data-toggle="modal" data-target="#R3" class="fa fa-star Comment_product " aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="4" data-toggle="modal" data-target="#R4" class="fa fa-star Comment_product" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                           <span style="color: #ff7315;" id="5" data-toggle="modal" data-target="#R5" class="fa fa-star Comment_product"  aria-hidden="true"></span></a>
                           
                ';
                }else{
                    $display_rating =' <div style="flex">
                    <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;"  data-toggle="modal" data-target="#R1" class="fa fa-star-o  ml-4" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="2" data-toggle="modal" data-target="#R2" class="fa fa-star-o Comment_product "  aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="3" data-toggle="modal" data-target="#R3" class="fa fa-star-o Comment_product " aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="4" data-toggle="modal" data-target="#R4" class="fa fa-star-o Comment_product" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                           <span style="color: #ff7315;" id="5" data-toggle="modal" data-target="#R5" class="fa fa-star-o Comment_product"  aria-hidden="true"></span></a>
                           
                ';}
    
			$output .='
            

            <div class=" mb-4 product-grid2  border rounded">
                <div class="product-image2">
                    
                        <img class=" my_product_img img-fluid"  src=" '.$product_image.' ">
                            
                   

                    <div class="transmitv single-item">
                        <form action="#" method="post">
                            <input type="hidden" name="cmd" value="_cart">
                            <input type="hidden" name="add" value="1">
                          
                       
                            <a href="order.php" class="transmitv-cart ptransmitv-cart add-to-cart">
                             Order  a  Service
                            </a>
                        </form> 
                    </div>
                </div>
                <div class="product-content">
                    <h4 style="color: #ff7315;" class=" lead"> '.$row['product_name'].'</h4>
                    
                   
                    
                    <div class="  " style="display:block"> 
                        <span  class="  border border-dark p-1 bg-dark text-white ">Price ₵'.$price_1.' '.$to.' '.$cide.''.$price_2.'</span>
                    <span  class=" border border-success p-1  bg-success text-white ">50% OFF  </span>
              
                    </div>
                </div>
                <div class="mb-3 mr-2">
  
                        '.$display_rating.'
                     
                    
                    
                    
                     
          
                
                    <div style="display:flex" class="float-right mr-4">
                    
                    <form action="chat_admin.php" method="post" id="chat_form">
                   
                    <input  type="hidden" id="'.$row['id'].'" class="mr-2 " name="insert" value="'.$row['id'].'"   />
                   
                    <input type="hidden" name="business_name" value="'.$row['business_name'].'">
                    <input type="hidden" name="business_code" value="'.$row['business_code'].'">
                    <input type="hidden" name="product_id" value="'.$row['id'].'">
                    
                    <button type="submit" class="btn mr-2 p-0" name="btn_chat" ><span class="fa fa-comment fa-lg"></span></button>
                    </form>

                 
                    <a href="#c" id="'.$row['id'].'" title="Product Details" class="mr-2 vendor_details " >
                    <span class="fa fa-info-circle fa-lg" aria-hidden="true" data-toggle="modal" data-target="#ProductInfoModal"></span></a>

                   
                    <div>
                    
                    
                    <form action="comment.php" method="get" id="comment_form">
                   
                    <input  type="hidden" id="'.$row['id'].'" class="mr-2 " name="val" value="'.$row['id'].'"   />
                   
                    <input type="hidden" name="business_name" value="'.$row['business_name'].'">
                    <input type="hidden" name="business_code" value="'.$row['business_code'].'">
                    <input type="hidden" name="product_name" value="'.$row['product_name'].'">
                    
               
                    <button type="submit" class="btn mr-2 p-0" name="btn_comment" ><span class="fa fa-comments fa-lg"></span></button>
                    </form>

                    
                    </div>
            
                    
                    </div>
                    

                        </div>

                  
                </div>
            </div>
        </div>	';

             
		}
        // <a href="#c" id="'.$row['id'].'" title="Message Comment" class="Comment_product" >
        // <span class="fa fa-comments fa-lg" aria-hidden="true" data-toggle="modal" data-target="#CommentModal"></span></a>
					
					echo $output;


	}
	else{
		echo '<h5 class="text-center font-weight-bold m-2">No New Product Posted yet </h5>';
	}



}

 // fetch all product by sorting

 if(isset($_POST['action']) && $_POST['action'] == 'fetchAllProductSortBy_06' ){
	$output='';
	$data = $s_user->fetchAllProductBySort(06);
    // $data_2 =$s_user->fetchAllCommentsByID($val);
	$path = 'assets/php/products/';
    $display_rating='';
    
    
	if($data){
		$output.= '';
         $ssql ="select * from product_rating";
         $display_rating;
		foreach ($data as $row){
                $id=$row['id'];
				$product_image = $path.$row['product_image'];
                $price_1 = $row['product_price_one'];
                    $price_2 = $row['product_price_two'];
                    $to = "to";
                    $cide="₵";
                
                      if ($price_2 == null){
                        $to ="";
                        $price_2="";
                        $cide="";
                        
                } else{
                    $price_1;
                    $price_2 ;
                    $to ;
                    $cide;
                }
                if(($s_user->fetch_rating($id)>=1.0) && ($s_user->fetch_rating($id)<=20.0)){
                    $display_rating =' <div style="flex">
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;"  data-toggle="modal" data-target="#R1" class="fa fa-star  ml-4" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="2" data-toggle="modal" data-target="#R2" class="fa fa-star-o Comment_product "  aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="3" data-toggle="modal" data-target="#R3" class="fa fa-star-o Comment_product " aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="4" data-toggle="modal" data-target="#R4" class="fa fa-star-o Comment_product" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                           <span style="color: #ff7315;" id="5" data-toggle="modal" data-target="#R5" class="fa fa-star-o Comment_product"  aria-hidden="true"></span></a>
                           
                        ';
                }elseif (($s_user->fetch_rating($id)>=21.0) && ($s_user->fetch_rating($id)<=50.0)){
                    $display_rating =' <div style="flex">
                    <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;"  data-toggle="modal" data-target="#R1" class="fa fa-star  ml-4" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="2" data-toggle="modal" data-target="#R2" class="fa fa-star Comment_product "  aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="3" data-toggle="modal" data-target="#R3" class="fa fa-star-o Comment_product " aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="4" data-toggle="modal" data-target="#R4" class="fa fa-star-o Comment_product" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                           <span style="color: #ff7315;" id="5" data-toggle="modal" data-target="#R5" class="fa fa-star-o Comment_product"  aria-hidden="true"></span></a>
                           
                ';
                }elseif (($s_user->fetch_rating($id)>=51.0) && ($s_user->fetch_rating($id)<=70.0)) {
                    $display_rating =' <div style="flex">
                    <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;"  data-toggle="modal" data-target="#R1" class="fa fa-star  ml-4" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="2" data-toggle="modal" data-target="#R2" class="fa fa-star Comment_product "  aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="3" data-toggle="modal" data-target="#R3" class="fa fa-star Comment_product " aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="4" data-toggle="modal" data-target="#R4" class="fa fa-star-o Comment_product" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                           <span style="color: #ff7315;" id="5" data-toggle="modal" data-target="#R5" class="fa fa-star-o Comment_product"  aria-hidden="true"></span></a>
                           
                ';
                }elseif (($s_user->fetch_rating($id)>=71.0) && ($s_user->fetch_rating($id)<=100.0)) {
                    $display_rating =' <div style="flex">
                    <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;"  data-toggle="modal" data-target="#R1" class="fa fa-star  ml-4" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="2" data-toggle="modal" data-target="#R2" class="fa fa-star Comment_product "  aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="3" data-toggle="modal" data-target="#R3" class="fa fa-star Comment_product " aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="4" data-toggle="modal" data-target="#R4" class="fa fa-star Comment_product" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                           <span style="color: #ff7315;" id="5" data-toggle="modal" data-target="#R5" class="fa fa-star-o Comment_product"  aria-hidden="true"></span></a>
                           
                ';
                }elseif ($s_user->fetch_rating($id)>=101.0) {
                    $display_rating =' <div style="flex">
                    <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;"  data-toggle="modal" data-target="#R1" class="fa fa-star  ml-4" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="2" data-toggle="modal" data-target="#R2" class="fa fa-star Comment_product "  aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="3" data-toggle="modal" data-target="#R3" class="fa fa-star Comment_product " aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="4" data-toggle="modal" data-target="#R4" class="fa fa-star Comment_product" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                           <span style="color: #ff7315;" id="5" data-toggle="modal" data-target="#R5" class="fa fa-star Comment_product"  aria-hidden="true"></span></a>
                           
                ';
                }else{
                    $display_rating =' <div style="flex">
                    <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;"  data-toggle="modal" data-target="#R1" class="fa fa-star-o  ml-4" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="2" data-toggle="modal" data-target="#R2" class="fa fa-star-o Comment_product "  aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="3" data-toggle="modal" data-target="#R3" class="fa fa-star-o Comment_product " aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="4" data-toggle="modal" data-target="#R4" class="fa fa-star-o Comment_product" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                           <span style="color: #ff7315;" id="5" data-toggle="modal" data-target="#R5" class="fa fa-star-o Comment_product"  aria-hidden="true"></span></a>
                           
                ';}
			$output .='
            

            <div class=" mb-4 product-grid2  border rounded">
                <div class="product-image2">
                    
                        <img class=" my_product_img img-fluid"  src=" '.$product_image.' ">
                            
                   

                    <div class="transmitv single-item">
                        <form action="#" method="post">
                            <input type="hidden" name="cmd" value="_cart">
                            <input type="hidden" name="add" value="1">
                          
                       
                            <a href="order.php" class="transmitv-cart ptransmitv-cart add-to-cart">
                             Order  a  Service
                            </a>
                        </form> 
                    </div>
                </div>
                <div class="product-content">
                    <h4 style="color: #ff7315;" class=" lead"> '.$row['product_name'].'</h4>
                    
                   
                    
                    <div class="  " style="display:block"> 
                        <span  class="  border border-dark p-1 bg-dark text-white ">Price ₵'.$price_1.' '.$to.' '.$cide.''.$price_2.'</span>
                    <span  class=" border border-success p-1  bg-success text-white ">50% OFF  </span>
              
                    </div>
                </div>
                <div class="mb-3 mr-2">
  
                        '.$display_rating.'
                     
                    
                    
                    
                     
          
                
                    <div style="display:flex" class="float-right mr-4">
                    
                    <form action="chat_admin.php" method="post" id="chat_form">
                   
                    <input  type="hidden" id="'.$row['id'].'" class="mr-2 " name="insert" value="'.$row['id'].'"   />
                   
                    <input type="hidden" name="business_name" value="'.$row['business_name'].'">
                    <input type="hidden" name="business_code" value="'.$row['business_code'].'">
                    <input type="hidden" name="product_id" value="'.$row['id'].'">
                    
                    <button type="submit" class="btn mr-2 p-0" name="btn_chat" ><span class="fa fa-comment fa-lg"></span></button>
                    </form>

                 
                    <a href="#c" id="'.$row['id'].'" title="Product Details" class="mr-2 vendor_details " >
                    <span class="fa fa-info-circle fa-lg" aria-hidden="true" data-toggle="modal" data-target="#ProductInfoModal"></span></a>

                   
                    <div>
                    
                    
                    <form action="comment.php" method="get" id="comment_form">
                   
                    <input  type="hidden" id="'.$row['id'].'" class="mr-2 " name="val" value="'.$row['id'].'"   />
                   
                    <input type="hidden" name="business_name" value="'.$row['business_name'].'">
                    <input type="hidden" name="business_code" value="'.$row['business_code'].'">
                    <input type="hidden" name="product_name" value="'.$row['product_name'].'">
                    
               
                    <button type="submit" class="btn mr-2 p-0" name="btn_comment" ><span class="fa fa-comments fa-lg"></span></button>
                    </form>

                    
                    </div>
            
                    
                    </div>
                    

                        </div>

                  
                </div>
            </div>
        </div>	';

             
		}
        // <a href="#c" id="'.$row['id'].'" title="Message Comment" class="Comment_product" >
        // <span class="fa fa-comments fa-lg" aria-hidden="true" data-toggle="modal" data-target="#CommentModal"></span></a>
					
					echo $output;


	}
	else{
		echo '<h5 class="text-center font-weight-bold m-2">No New Product Posted yet </h5>';
	}



}


 // fetch all product by sorting

 if(isset($_POST['action']) && $_POST['action'] == 'fetchAllProductSortBy_08' ){
	$output='';
	$data = $s_user->fetchAllProductBySort(8);
    // $data_2 =$s_user->fetchAllCommentsByID($val);
	$path = 'assets/php/products/';
    $display_rating='';
    
    
	if($data){
		$output.= '';
         $ssql ="select * from product_rating";
         $display_rating;
		foreach ($data as $row){
                $id=$row['id'];
				$product_image = $path.$row['product_image'];
                $price_1 = $row['product_price_one'];
                    $price_2 = $row['product_price_two'];
                    $to = "to";
                    $cide="₵";
                
                      if ($price_2 == null){
                        $to ="";
                        $price_2="";
                        $cide="";
                        
                } else{
                    $price_1;
                    $price_2 ;
                    $to ;
                    $cide;
                }
                if(($s_user->fetch_rating($id)>=1.0) && ($s_user->fetch_rating($id)<=20.0)){
                    $display_rating =' <div style="flex">
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;"  data-toggle="modal" data-target="#R1" class="fa fa-star  ml-4" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="2" data-toggle="modal" data-target="#R2" class="fa fa-star-o Comment_product "  aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="3" data-toggle="modal" data-target="#R3" class="fa fa-star-o Comment_product " aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="4" data-toggle="modal" data-target="#R4" class="fa fa-star-o Comment_product" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                           <span style="color: #ff7315;" id="5" data-toggle="modal" data-target="#R5" class="fa fa-star-o Comment_product"  aria-hidden="true"></span></a>
                           
                        ';
                }elseif (($s_user->fetch_rating($id)>=21.0) && ($s_user->fetch_rating($id)<=50.0)){
                    $display_rating =' <div style="flex">
                    <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;"  data-toggle="modal" data-target="#R1" class="fa fa-star  ml-4" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="2" data-toggle="modal" data-target="#R2" class="fa fa-star Comment_product "  aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="3" data-toggle="modal" data-target="#R3" class="fa fa-star-o Comment_product " aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="4" data-toggle="modal" data-target="#R4" class="fa fa-star-o Comment_product" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                           <span style="color: #ff7315;" id="5" data-toggle="modal" data-target="#R5" class="fa fa-star-o Comment_product"  aria-hidden="true"></span></a>
                           
                ';
                }elseif (($s_user->fetch_rating($id)>=51.0) && ($s_user->fetch_rating($id)<=70.0)) {
                    $display_rating =' <div style="flex">
                    <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;"  data-toggle="modal" data-target="#R1" class="fa fa-star  ml-4" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="2" data-toggle="modal" data-target="#R2" class="fa fa-star Comment_product "  aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="3" data-toggle="modal" data-target="#R3" class="fa fa-star Comment_product " aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="4" data-toggle="modal" data-target="#R4" class="fa fa-star-o Comment_product" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                           <span style="color: #ff7315;" id="5" data-toggle="modal" data-target="#R5" class="fa fa-star-o Comment_product"  aria-hidden="true"></span></a>
                           
                ';
                }elseif (($s_user->fetch_rating($id)>=71.0) && ($s_user->fetch_rating($id)<=100.0)) {
                    $display_rating =' <div style="flex">
                    <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;"  data-toggle="modal" data-target="#R1" class="fa fa-star  ml-4" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="2" data-toggle="modal" data-target="#R2" class="fa fa-star Comment_product "  aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="3" data-toggle="modal" data-target="#R3" class="fa fa-star Comment_product " aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="4" data-toggle="modal" data-target="#R4" class="fa fa-star Comment_product" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                           <span style="color: #ff7315;" id="5" data-toggle="modal" data-target="#R5" class="fa fa-star-o Comment_product"  aria-hidden="true"></span></a>
                           
                ';
                }elseif ($s_user->fetch_rating($id)>=101.0) {
                    $display_rating =' <div style="flex">
                    <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;"  data-toggle="modal" data-target="#R1" class="fa fa-star  ml-4" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="2" data-toggle="modal" data-target="#R2" class="fa fa-star Comment_product "  aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="3" data-toggle="modal" data-target="#R3" class="fa fa-star Comment_product " aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="4" data-toggle="modal" data-target="#R4" class="fa fa-star Comment_product" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                           <span style="color: #ff7315;" id="5" data-toggle="modal" data-target="#R5" class="fa fa-star Comment_product"  aria-hidden="true"></span></a>
                           
                ';
                }else{
                    $display_rating =' <div style="flex">
                    <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;"  data-toggle="modal" data-target="#R1" class="fa fa-star-o  ml-4" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="2" data-toggle="modal" data-target="#R2" class="fa fa-star-o Comment_product "  aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="3" data-toggle="modal" data-target="#R3" class="fa fa-star-o Comment_product " aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="4" data-toggle="modal" data-target="#R4" class="fa fa-star-o Comment_product" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                           <span style="color: #ff7315;" id="5" data-toggle="modal" data-target="#R5" class="fa fa-star-o Comment_product"  aria-hidden="true"></span></a>
                           
                ';}
    
			$output .='
            

            <div class=" mb-4 product-grid2  border rounded">
                <div class="product-image2">
                    
                        <img class=" my_product_img img-fluid"  src=" '.$product_image.' ">
                            
                   

                    <div class="transmitv single-item">
                        <form action="#" method="post">
                            <input type="hidden" name="cmd" value="_cart">
                            <input type="hidden" name="add" value="1">
                          
                       
                            <a href="order.php" class="transmitv-cart ptransmitv-cart add-to-cart">
                             Order  a  Service
                            </a>
                        </form> 
                    </div>
                </div>
                <div class="product-content">
                    <h4 style="color: #ff7315;" class=" lead"> '.$row['product_name'].'</h4>
                    
                   
                    
                    <div class="  " style="display:block"> 
                        <span  class="  border border-dark p-1 bg-dark text-white ">Price ₵'.$price_1.' '.$to.' '.$cide.''.$price_2.'</span>
                    <span  class=" border border-success p-1  bg-success text-white ">50% OFF  </span>
              
                    </div>
                </div>
                <div class="mb-3 mr-2">
  
                        '.$display_rating.'
                     
                    
                    
                    
                     
          
                
                    <div style="display:flex" class="float-right mr-4">
                    
                    <form action="chat_admin.php" method="post" id="chat_form">
                   
                    <input  type="hidden" id="'.$row['id'].'" class="mr-2 " name="insert" value="'.$row['id'].'"   />
                   
                    <input type="hidden" name="business_name" value="'.$row['business_name'].'">
                    <input type="hidden" name="business_code" value="'.$row['business_code'].'">
                    <input type="hidden" name="product_id" value="'.$row['id'].'">
                    
                    <button type="submit" class="btn mr-2 p-0" name="btn_chat" ><span class="fa fa-comment fa-lg"></span></button>
                    </form>

                 
                    <a href="#c" id="'.$row['id'].'" title="Product Details" class="mr-2 vendor_details " >
                    <span class="fa fa-info-circle fa-lg" aria-hidden="true" data-toggle="modal" data-target="#ProductInfoModal"></span></a>

                   
                    <div>
                    
                    
                    <form action="comment.php" method="get" id="comment_form">
                   
                    <input  type="hidden" id="'.$row['id'].'" class="mr-2 " name="val" value="'.$row['id'].'"   />
                   
                    <input type="hidden" name="business_name" value="'.$row['business_name'].'">
                    <input type="hidden" name="business_code" value="'.$row['business_code'].'">
                    <input type="hidden" name="product_name" value="'.$row['product_name'].'">
                    
               
                    <button type="submit" class="btn mr-2 p-0" name="btn_comment" ><span class="fa fa-comments fa-lg"></span></button>
                    </form>

                    
                    </div>
            
                    
                    </div>
                    

                        </div>

                  
                </div>
            </div>
        </div>	';

             
		}
        // <a href="#c" id="'.$row['id'].'" title="Message Comment" class="Comment_product" >
        // <span class="fa fa-comments fa-lg" aria-hidden="true" data-toggle="modal" data-target="#CommentModal"></span></a>
					
					echo $output;


	}
	else{
		echo '<h5 class="text-center font-weight-bold m-2">No New Product Posted yet </h5>';
	}



}


 // fetch all product by sorting

 if(isset($_POST['action']) && $_POST['action'] == 'fetchAllProductSortBy_02' ){
	$output='';
	$data = $s_user->fetchAllProductBySort(02);
    // $data_2 =$s_user->fetchAllCommentsByID($val);
	$path = 'assets/php/products/';
    $display_rating='';
    
    
	if($data){
		$output.= '';
         $ssql ="select * from product_rating";
         $display_rating;
		foreach ($data as $row){
                $id=$row['id'];
				$product_image = $path.$row['product_image'];
                $price_1 = $row['product_price_one'];
                    $price_2 = $row['product_price_two'];
                    $to = "to";
                    $cide="₵";
                
                      if ($price_2 == null){
                        $to ="";
                        $price_2="";
                        $cide="";
                        
                } else{
                    $price_1;
                    $price_2 ;
                    $to ;
                    $cide;
                } if(($s_user->fetch_rating($id)>=1.0) && ($s_user->fetch_rating($id)<=20.0)){
                    $display_rating =' <div style="flex">
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;"  data-toggle="modal" data-target="#R1" class="fa fa-star  ml-4" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="2" data-toggle="modal" data-target="#R2" class="fa fa-star-o Comment_product "  aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="3" data-toggle="modal" data-target="#R3" class="fa fa-star-o Comment_product " aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="4" data-toggle="modal" data-target="#R4" class="fa fa-star-o Comment_product" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                           <span style="color: #ff7315;" id="5" data-toggle="modal" data-target="#R5" class="fa fa-star-o Comment_product"  aria-hidden="true"></span></a>
                           
                        ';
                }elseif (($s_user->fetch_rating($id)>=21.0) && ($s_user->fetch_rating($id)<=50.0)){
                    $display_rating =' <div style="flex">
                    <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;"  data-toggle="modal" data-target="#R1" class="fa fa-star  ml-4" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="2" data-toggle="modal" data-target="#R2" class="fa fa-star Comment_product "  aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="3" data-toggle="modal" data-target="#R3" class="fa fa-star-o Comment_product " aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="4" data-toggle="modal" data-target="#R4" class="fa fa-star-o Comment_product" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                           <span style="color: #ff7315;" id="5" data-toggle="modal" data-target="#R5" class="fa fa-star-o Comment_product"  aria-hidden="true"></span></a>
                           
                ';
                }elseif (($s_user->fetch_rating($id)>=51.0) && ($s_user->fetch_rating($id)<=70.0)) {
                    $display_rating =' <div style="flex">
                    <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;"  data-toggle="modal" data-target="#R1" class="fa fa-star  ml-4" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="2" data-toggle="modal" data-target="#R2" class="fa fa-star Comment_product "  aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="3" data-toggle="modal" data-target="#R3" class="fa fa-star Comment_product " aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="4" data-toggle="modal" data-target="#R4" class="fa fa-star-o Comment_product" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                           <span style="color: #ff7315;" id="5" data-toggle="modal" data-target="#R5" class="fa fa-star-o Comment_product"  aria-hidden="true"></span></a>
                           
                ';
                }elseif (($s_user->fetch_rating($id)>=71.0) && ($s_user->fetch_rating($id)<=100.0)) {
                    $display_rating =' <div style="flex">
                    <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;"  data-toggle="modal" data-target="#R1" class="fa fa-star  ml-4" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="2" data-toggle="modal" data-target="#R2" class="fa fa-star Comment_product "  aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="3" data-toggle="modal" data-target="#R3" class="fa fa-star Comment_product " aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="4" data-toggle="modal" data-target="#R4" class="fa fa-star Comment_product" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                           <span style="color: #ff7315;" id="5" data-toggle="modal" data-target="#R5" class="fa fa-star-o Comment_product"  aria-hidden="true"></span></a>
                           
                ';
                }elseif ($s_user->fetch_rating($id)>=101.0) {
                    $display_rating =' <div style="flex">
                    <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;"  data-toggle="modal" data-target="#R1" class="fa fa-star  ml-4" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="2" data-toggle="modal" data-target="#R2" class="fa fa-star Comment_product "  aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="3" data-toggle="modal" data-target="#R3" class="fa fa-star Comment_product " aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="4" data-toggle="modal" data-target="#R4" class="fa fa-star Comment_product" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                           <span style="color: #ff7315;" id="5" data-toggle="modal" data-target="#R5" class="fa fa-star Comment_product"  aria-hidden="true"></span></a>
                           
                ';
                }else{
                    $display_rating =' <div style="flex">
                    <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;"  data-toggle="modal" data-target="#R1" class="fa fa-star-o  ml-4" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="2" data-toggle="modal" data-target="#R2" class="fa fa-star-o Comment_product "  aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="3" data-toggle="modal" data-target="#R3" class="fa fa-star-o Comment_product " aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                            <span style="color: #ff7315;" id="4" data-toggle="modal" data-target="#R4" class="fa fa-star-o Comment_product" aria-hidden="true"></span></a>
                            <a href="#c" id="'.$row['id'].'" title="Product Details" class="Comment_product " >
                           <span style="color: #ff7315;" id="5" data-toggle="modal" data-target="#R5" class="fa fa-star-o Comment_product"  aria-hidden="true"></span></a>
                           
                ';}
    
			$output .='
            

            <div class=" mb-4 product-grid2  border rounded">
                <div class="product-image2">
                    
                        <img class=" my_product_img img-fluid"  src=" '.$product_image.' ">
                            
                   

                    <div class="transmitv single-item">
                        <form action="#" method="post">
                            <input type="hidden" name="cmd" value="_cart">
                            <input type="hidden" name="add" value="1">
                          
                       
                            <a href="order.php" class="transmitv-cart ptransmitv-cart add-to-cart">
                             Order  a  Service
                            </a>
                        </form> 
                    </div>
                </div>
                <div class="product-content">
                    <h4 style="color: #ff7315;" class=" lead"> '.$row['product_name'].'</h4>
                    
                   
                    
                    <div class="  " style="display:block"> 
                        <span  class="  border border-dark p-1 bg-dark text-white ">Price ₵'.$price_1.' '.$to.' '.$cide.''.$price_2.'</span>
                    <span  class=" border border-success p-1  bg-success text-white ">50% OFF  </span>
              
                    </div>
                </div>
                <div class="mb-3 mr-2">
  
                        '.$display_rating.'
                     
                    
                    
                    
                     
          
                
                    <div style="display:flex" class="float-right mr-4">
                    
                    <form action="chat_admin.php" method="post" id="chat_form">
                   
                    <input  type="hidden" id="'.$row['id'].'" class="mr-2 " name="insert" value="'.$row['id'].'"   />
                   
                    <input type="hidden" name="business_name" value="'.$row['business_name'].'">
                    <input type="hidden" name="business_code" value="'.$row['business_code'].'">
                    <input type="hidden" name="product_id" value="'.$row['id'].'">
                    
                    <button type="submit" class="btn mr-2 p-0" name="btn_chat" ><span class="fa fa-comment fa-lg"></span></button>
                    </form>

                 
                    <a href="#c" id="'.$row['id'].'" title="Product Details" class="mr-2 vendor_details " >
                    <span class="fa fa-info-circle fa-lg" aria-hidden="true" data-toggle="modal" data-target="#ProductInfoModal"></span></a>

                   
                    <div>
                    
                    
                    <form action="comment.php" method="get" id="comment_form">
                   
                    <input  type="hidden" id="'.$row['id'].'" class="mr-2 " name="val" value="'.$row['id'].'"   />
                   
                    <input type="hidden" name="business_name" value="'.$row['business_name'].'">
                    <input type="hidden" name="business_code" value="'.$row['business_code'].'">
                    <input type="hidden" name="product_name" value="'.$row['product_name'].'">
                    
               
                    <button type="submit" class="btn mr-2 p-0" name="btn_comment" ><span class="fa fa-comments fa-lg"></span></button>
                    </form>

                    
                    </div>
            
                    
                    </div>
                    

                        </div>

                  
                </div>
            </div>
        </div>	';

             
		}
        // <a href="#c" id="'.$row['id'].'" title="Message Comment" class="Comment_product" >
        // <span class="fa fa-comments fa-lg" aria-hidden="true" data-toggle="modal" data-target="#CommentModal"></span></a>
					
					echo $output;


	}
	else{
		echo '<h5 class="text-center font-weight-bold m-2">No New Product Posted yet </h5>';
	}



}




 //handle fetch notification
 if(isset($_POST['action']) && $_POST['action']=='fetchNotification'){
    $notification = $s_user->fetchNotification($x_id);
    $output = '';

    if($notification){
       foreach($notification as $row){
          $output .= '  <div class="alert m-2 border bg-light border-dark shadow">
                      <button type="button" id=" '.$row['id'].' " class="close" data-dismiss="alert" aria-label="close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                      <h4 class="alert-heading">New Notification</h4>
                      <p class="mb-0 lead">'.$row['message'].'</p>
                      <hr class="my-2">
                   
                      <p class="mb-0 float-right">'.$s_user->timeInAgo($row['created_at']).'</p>
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
    if($s_user->fetchNotification($x_id)){
       echo '<i class="fas fa-circle fa-sm text-danger"></i>'; 
    }
    else{
      echo ''; 
    }
 }

 //remove notification
 if(isset($_POST['notification_id'])){
    $id = $_POST['notification_id'];
    $s_user->removeNotification($id);
 }


?>
