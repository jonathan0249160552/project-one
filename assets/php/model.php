<?php
// require '../assets_store/php/action_cus.php';
require 'assets/php/header_customer.php';
// require 'links_s.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<!-- product comment and details start -->
<div class="modal card fade" id="CommentModal" style="background-color:rgba(0, 0, 0, 0);">
	<div class="modal-dialog modal-lg  modal-dialog-centered " >
       	<div class="modal-content">
        	<div class="">
           		<div class="modal-footer">
               		<button type="button" class="btn btn-primary" data-dismiss="modal" style="background-color: #ff7315;">Close</button>
           		</div>
            </div>
        <div class="modal-body">
            	<h4 class="  p-2 text-center font-weight-bold " id="" >Comment on Product</h4>
            <div class="  align-self-center" id="getGenImage" style="width: 100%;"></div>
            	<div class="card-deck">
					<div class="card m-2 " >
                   		<div class="card-body ">
								<p id="business_name_d" ></p>
								<p  id="product_name_d" ></p>
									<form action="#" method="post" id="product_comments_form">
										<div class="form-group">
											<textarea rows="6" cols="5" name="comment" id="comment" class="text-primary" style="width: 100%;"></textarea>
											<input type="" name="business_code" id="business_codes" value="" >
											<input type="" name="business_name" id="business_names" value="" >
											<input type="" name="product_name" id="products_name" value="" >
											<input type="" name ="product_id" id="products_id" value="">
										</div>
										<input type="submit" id="comment_btn" name="comment_btn" value="Post" class="font-weight-bold  btn  mb-4  " style="color:white;background:#ff7315; border-radius: 25px;width: 100%;"></div>
									</form>
							
                    	</div>
               	 	</div>
					<div class="mt-4 m-2">
						<div id="showAllComment" class="mt-4"></div>
					</div>
            </div>
        </div>
     </div>
</div>
<!-- product comment ends  -->



 <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<!-- <script src="assets_store/js/jquery-3.3.1.min.js"></script>  -->
<script src="assets_store/js/jquery-2.1.4.min.js"></script>
<!-- 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script> -->

<script type="text/javascript">
	$(document).ready(function(e){
	
        // display product details detail ajax request
	   $("body").on("click",".Comment_product", function(e){
            e.preventDefault();
            product_details = $(this).attr('id');

            // console.log(product_details);
            $.ajax({
				url:'assets/php/action_customer.php',
                type:'post',
                data: {product_details: product_details},
                success:function(response){

					// console.log(response);
                    data = JSON.parse(response);
					console.log(data);
					$("#business_code").val(data.business_code );
					$("#business_name").val(data.business_name );
					$("#product_name").val(data.product_name );
                 	$("#product_id").val(data.id );
					 $("#business_name_d").html('<p class="font-weight-bold border border-dark p-2  text-dark">'+data.business_name+' || <span>'+data.product_name+'</span></p>');

				}

            });

        });


	
  });

</script>
<!-- disable body scroll which navbar is in active -->
<script src="assets_store/js/bootstrap.min.js"></script>

</body>
</html>