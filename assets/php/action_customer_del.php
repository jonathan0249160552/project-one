<?php
require_once 'session_customer.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// require 'session_customer.php';
// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

require_once 'auth_customer.php';

$s_user = new Authenticate();



// handle login customer ajax request



 if(isset($_POST['action']) && $_POST['action']=='login_customer'){

        $user_names = $s_user->test_input($_POST['user_names']);
         $password = $s_user->test_input($_POST['pddfassword']);

        
         $loggedInUser = $s_user->login_customer($user_names);

         print_r($_POST);
        if ($loggedInUser != null) {

            if(password_verify($password,$loggedInUser['password'])){
                if(!empty($_POST['rem'])){
                    setcookie("user_names",$user_names,time()+(30*24*60*60),'/');
                    setcookie("password",$password ,time()+(30*24*60*60),'/');
                }
                else{
                    setcookie("user_names","",1,'/');
                    setcookie("password","",1,'/');
                }
                $_SESSION['user']= $user_names;
                echo $s_user->showMessage('success','Login successful!');
            }
            else{
                echo $s_user->showMessage('danger','Password is incorrect!');
            }
        }
        else{
            echo $s_user->showMessage('danger','User does not exist!');
        }

}
        


//  if(isset($_POST['action']) && $_POST['action'] == 'post_comment' ){

//         $business_code =$s_user->test_input($_POST['business_code']);
//         $business_name= $s_user->test_input($_POST['business_name']);
//         $product_id= $s_user->test_input($_POST['product_id']);
//         $product_name= $s_user->test_input($_POST['product_name']);
//         $comment = $s_user->test_input($_POST['comment']);
//         print_r($_POST);

//         $s_user->send_comment($x_id,$business_code,$business_name,$product_id,$product_name,$comment);

// }

 // fetch all product

 if(isset($_POST['action']) && $_POST['action'] == 'fetchAllProducts' ){
	$output='';
	$data = $s_user->fetchAllProduct();
	$path = 'assets/php/products/';
	if($data){
		$output.= '';
		foreach ($data as $row){
		
				$product_image = $path.$row['product_image'];
		
      
    
               // echo read_more(1,$notice_body);
			$output .='
            <div class="product-grid2 transmitv border rounded">
                <div class="product-image2">
                    
                        <img class="pic-1 img-fluid" src=" '.$product_image.' ">
                        <img class="pic-2 img-fluid" src=" '.$product_image.'">
                    
                    <ul class="social">
                        <li><a href="#c" data-tip="Quick View"><span
                                    class="fa fa-eye"></span></a></li>
  
                        <li><a href="#c" class="Cart_Btn" data-tip="Add to Cart"><span
                                    class="fa fa-shopping-bag"></span></a>
                        </li>
                    </ul>
                    <div class="transmitv single-item">
                        <form action="#" method="post">
                            <input type="hidden" name="cmd" value="_cart">
                            <input type="hidden" name="add" value="1">
                            <input type="hidden" name="transmitv_item" value="Women Maroon Top">
                            <input type="hidden" name="amount" value="'.$row['product_price'].'">
                            <button type="submit" class="transmitv-cart ptransmitv-cart add-to-cart">
                                Add to Cart
                            </button>
                        </form>
                    </div>
                </div>
                <div class="product-content">
                    <h3 class="title"><a href="#c"> '.$row['product_name'].'</a>
                    </h3>
                    <span class="price"><del>₵975.00</del>₵'.$row['product_price'].'</span>
                </div>
                <div class="mb-3 mr-2">
  
  
                    <a href="#c" class="ml-2">
                        <span class="fa fa-star" aria-hidden="true"></span>
                        <span class="fa fa-star" aria-hidden="true"></span>
                        <span class="fa fa-star" aria-hidden="true"></span>
                        <span class="fa fa-star-o" aria-hidden="true"></span>
                        <span class="fa fa-star-o"  aria-hidden="true"></span>
                        
                    </a>
                    <div class="float-right">
                    
                    <span class="fa fa-info-circle fa-lg" aria-hidden="true"></span>

                    <a href="#c" id="'.$row['id'].'" title="Comment Product" class="Comment_product" >
                    <span class="fa fa-comments fa-lg" aria-hidden="true" data-toggle="modal" data-target="#CommentModal"></span></a>

                    </div>
                </div>
            </div>
        </div>	';

             
		}
			
					
					echo $output;


	}
	else{
		echo '<h4 class="text-center font-weight-bold m-2 text-success">:( No New Product Posted yet </h4>';
	}
}


//  if(isset($_POST['action']) && $_POST['action'] == 'post_comment' ){

//         $business_code =$s_user->test_input($_POST['business_code']);
//         $business_name= $s_user->test_input($_POST['business_name']);
//         $product_id= $s_user->test_input($_POST['product_id']);
//         $product_name= $s_user->test_input($_POST['product_name']);
//         $comment = $s_user->test_input($_POST['comment']);
//         print_r($_POST);

//         $s_user->send_comment($x_id,$business_code,$business_name,$product_id,$product_name,$comment);

// }

// display product details
if(isset($_POST['product_details'])){
	$id= $_POST['product_details'];
// print_r($_POST);

	$data = $s_user->fetchAllProductByID($id);
	echo json_encode($data);
 }




?>