<?php
require_once 'assets/php/session_customer.php';
 require 'links_s.php';		  
												

		

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
  <div>
    

<!-- product comment and details start -->

					
                        <?php 
    
    if(isset($_POST['comment_btn']) ){

        $business_code =$s_user->test_input($_POST['business_code']);
        $business_name= $s_user->test_input($_POST['business_name']);
        $product_id= $s_user->test_input($_POST['product_id']);
        $product_name= $s_user->test_input($_POST['product_name']);
        $comment = $s_user->test_input($_POST['comment']);
    

        $s_user->send_comment($x_id,$business_code,$business_name,$product_id,$product_name,$comment);

        }
		
                        if(isset($_GET['btn_comment'])){
                            $id = ($_GET['val']);
                            $business_name = ($_GET['business_name']);
                            $business_code = ($_GET['business_code']);
                            $product_name = ($_GET['product_name']);

                            echo '
                            <div class=" card " id="CommentModal" style="background-color:rgba(0, 0, 0, 0);">
                                <div class="modal-dialog modal-lg  modal-dialog-centered " >
                                       <div class="modal-content">
                                        <div class="">
                                               <div class="modal-footer">
                                                   <a type="button" href="campus_services.php" class="btn btn-primary" data-dismiss="modal" style="background-color: #ff7315;">X</a>
                                               </div>
                                        </div>
                                    <div class="modal-body">
                                            <h4 class="  p-2 text-center font-weight-bold " id="" >Comment on Product</h4>
                            
                                
                                            <div class="card-deck">
                                                <div class="card m-2 bg-light " >
                                                       <div class="card-body ">
                                                            <p class="business_name_d" ></p>
                                                            
                                                                <form  action="#" method="post" id="product_comments_form">
                                                                    <div class="form-group">
                                                                        <textarea rows="6" cols="5" name="comment" id="comment" class="text-dark  text-center p-4" style="width: 100%;" required></textarea>
                                                                        <input type="hidden" name="business_code" class="business_code" value="'.$business_code.'" required >
                                                                         <input type="hidden" name="business_name" class="business_name" value="'.$business_name.'" required >
                                                                         <input type="hidden" name="product_name" class="product_name" value="'.$product_name.'" required>
                                                                         <input type="hidden" name ="product_id" class="product_id" value="'.$id.'" required>
                                     
                                                  
                                                                    </div>
                                                                    <input type="submit" id="comment_btn" name="comment_btn" value="Post" class="font-weight-bold  btn  mb-4  " style="color:white;background:#ff7315; border-radius: 25px;width: 100%;"></div>
                                                                </form>
                                                        
                                                    </div>
                                                    </div>
                                                <div class="mt-4 m-2">
                                                    <div class="comment_box" class="mt-4"></div>
                             
                                                </div>
                                        </div>
                                    </div>
                                 </div>
                            </div>';
                            // echo $business_name;
                            // echo $business_code;
                            // echo $product_name;
                            $output='';
                        	$data = $s_user->fetchAllComments($id);

                            if($data){
                                $output .='';
                                foreach($data as $row){
                                  $output .='
                                  <div class="alert border m-4 shadow">
                                      <button type="button" id="" class="close float-right" data-dismiss="alert" aria-label="close">
                                          <span aria-hidden="true">&times;</span></button>
                                          <h4 class="alert-heading ">New Comment</h4>
                                          <p class="mb-0 alert-secondary rounded  p-2" style="color: black;">'.$row['comment'].'</p>
                                          <hr class="my-2"><p class="mb-0 float-right"></p><div class="clearfix">
                              
                                          </div>
                                      </div>
                                  </div>';
                                
                             }
                            
                        }else{
                            // echo "<h1>no comments</h1>";
                        }
                          echo $output;
                    }
              
            
            ?>
					</div>
            </div>
        </div>
    
     </div>
</div>
<!-- product comment ends  -->


<!-- product comment and details start -->

  </div>  
  
  <script>
         

		// post comment Ajax request   
		$("#comment_btn").click(function(e){
    if ($("#product_comments_form")[0].checkValidity()){
      e.preventDefault();
     {
        $("#passError").text(' ');
        $.ajax({
          url:'assets/php/process_customer.php ',
          method: 'post',
          data: $("#product_comments_form").serialize()+'&action=post_comment',
          success:function(response){
            // console.log(response);
            $("#product_comments_form")[0].reset();
			Swal.fire({
             title:'Comment Posted',
             type:'success'
           });
          //  fetchComments();
          
          }
        });
      }
    }
    
  });
  </script>
</body>
</html>