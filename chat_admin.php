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
<div style="background-color:rgba(0, 0, 0, 0);">
	<div class="modal-dialog modal-lg  modal-dialog-centered " >
       	<div class="modal-content">
        	<div class="">
           		<div class="modal-footer">
               		<a href="campus_services.php" class="btn">x</a>
           		</div>
           	</div>
				<div class="modal-body">
						<h4 class="  p-2 text-center font-weight-bold  mb-3 " id="" >Chat the Admin of this Service</h4>
							<p class="business_name_d" ></p>
							<p  class="product_name_d" ></p>
					<div class="card-deck">
							<div class="card m-2 bg-light" >
				<div class="card-body m-2 shadow bg-light">
					
				 <p style=" border-left-style: solid;
             border-width: 5px;border-color:#ff7315;border-radius: round;" class="text-dark m-1 mt-2 p-2 bg-white">Hii am Mavis i deal in shoes, cloths and other body accessories. 
				Please contact me or chat me for anything of that sort. I looking forward to meeting you. thank you !! </p></div>

					
				<div class="">
								<section class="chat-area">
								<header>
								<?php 
								
								
									
							if(isset($_POST['btn_chat'])){
								// print_r($_POST);
								// echo "friend";
								$id = $_POST['insert'];
								$business_name =$_POST['business_name'];
								$business_code =$_POST['business_code'];
								$product_id =$_POST['product_id'];
								$data = $s_user->display_admin_chat($id,$x_id);
								$output = '<img class="rounded-circle" src="assets/img/marie.jpg" alt="">
								<div class="details">
								
								  <span>'.$business_name.'</span>
								  <p class="text-success">online</p>
								  
								</div>
							  </header>
							  <div class="chat-box">';
							
								if($data){
								   foreach($data as $row){
									   if($row['status']==0){
									  $output .= '<div class="chat outgoing">
													<div class="details">
														<p>'. $row['message'] .'</p>
													</div>
													</div>';
								   }elseif($row['status']==1){
									$output .= '<div class="chat incoming">
								   
									<div class="details">
										<p>'. $row['message'] .'</p>
									</div>
									</div>';
								}
								}
								   echo $output;
								}else {
								echo '<center><small class="text-center text-dark lead">No chat yet</small></center>';
								}
							   
							   }		
																
									
									?>
								</div>
								<form  method="POST" action="#" id="chat_form" class="typing-area">
									

									<input type="hidden" name="business_code" class="business_code" value="<?=$business_code?>" required >
									<input type="hidden" name ="product_id" class="product_id" value="<?=$id?>" required>
									<input type="hidden" name="product_name" class="product_name" value="<?=$business_name?>" required>
									<input type="hidden" name="user_id"  value="<?=$x_id?>" required>
									
									<div style="width:100% ;" class=" input-group-xl form-group">
										
									<div class="input-group-prepend">
										
									<input type="text" id="message" name="message" class="form-control rounded-0" placeholder="Type a message here..." autocomplete="off" required>
									<input id="btn_chat" style="width:10%;color:#ff7315" type="submit" value="Send">	
									<!-- <span class="input-group-text rounded-0"><i class="far fa-id-card "></i></span> -->
										
									</div>
									
									</div>	
										
								</form>
									
   						 </section>
  </div>
               	 	</div>
					
            </div>
        </div>
     </div>
</div>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="assets_store/js/jquery-3.3.1.min.js"></script>
<script src="assets_store/js/jquery-2.1.4.min.js"></script>

 <script>
	  $("#btn_chat").click(function(e){
    if ($("#chat_form")[0].checkValidity()){
      e.preventDefault();
     {
     
        $.ajax({
          url:'assets/php/process_customer.php ',
          method: 'post',
          data: $("#chat_form").serialize()+'&action=post_chats',
          success:function(response){
            console.log(response);
			$("#chat_form")[0].reset();
			location.reload();
          }
        });
      }
    }
  });
</script> 
</body>
</html>