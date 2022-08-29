

	$(document).ready(function(e){

        // check  notification 
        checkNotification();
       function checkNotification(){
         $.ajax({
           url:'assets/php/process_customer.php',
           method:'post',
           data:{action:'checkNotification'},
           success:function(response){
           $("#checkNotification").html(response);
           }
         });
       }
 
 
       // $("#SSRTA").click(function(e){
       //   $("#SRT01").hide();
       //   $("#SRT02").hide();
       //   $("#SRT03").hide();
       //   $("#SRT04").hide();
       //   $("#SRT05").hide();
       //   $("#SRT06").hide();
       //   $("#SRT07").hide();
       //   $("#SRT08").hide();
       // });
 
 
       $("#SSRT01").click(function(e){
         $('#SRT01').show();
         $('#SSRTA').hide()
         // $("#SRT02").hide();
         // $("#SRT03").hide();
         // $("#SRT04").hide();
         // $("#SRT05").hide();
         // $("#SRT06").hide();
         // $("#SRT07").hide();
         // $("#SRT08").hide();
       });
 
       
         // /fetch  products 
         fetchProducts();
       function fetchProducts(){
         $.ajax({
           url:'assets/php/process_customer.php',
           method:'post',
           data:{action:'fetchAllProducts'},
           success:function(response){
             //   console.log(response);
            $(".showAllProducts").html(response);
           
           }
         });
       }
 
       $('#m_search').on("input",function (e) {
         fetchProducts();
   
       });
 
 
           // /fetch  products by sort number one
         fetchProductsBySort_01();
       function fetchProductsBySort_01(){
         $.ajax({
           url:'assets/php/process_customer.php',
           method:'post',
           data:{action:'fetchAllProductSortBy_01'},
           success:function(response){
             //   console.log(response);
            $(".showAllProducts_01").html(response);
           
           }
         });
       }
 
     
            // /fetch  products by sort number two
         fetchProductsBySort_02();
       function fetchProductsBySort_02(){
         $.ajax({
           url:'assets/php/process_customer.php',
           method:'post',
           data:{action:'fetchAllProductSortBy_02'},
           success:function(response){
             //   console.log(response);
            $(".showAllProducts_02").html(response);
           
           }
         });
       }
 
     
 
            // /fetch  products by sort number three
         fetchProductsBySort_03();
       function fetchProductsBySort_03(){
         $.ajax({
           url:'assets/php/process_customer.php',
           method:'post',
           data:{action:'fetchAllProductSortBy_03'},
           success:function(response){
             //   console.log(response);
            $(".showAllProducts_03").html(response);
           
           }
         });
       }
 
 
            // /fetch  products by sort number four
         fetchProductsBySort_04();
       function fetchProductsBySort_04(){
         $.ajax({
           url:'assets/php/process_customer.php',
           method:'post',
           data:{action:'fetchAllProductSortBy_04'},
           success:function(response){
             //   console.log(response);
            $(".showAllProducts_04").html(response);
           
           }
         });
       }
 
 
              // /fetch  products by sort number five
         fetchProductsBySort_05();
       function fetchProductsBySort_05(){
         $.ajax({
           url:'assets/php/process_customer.php',
           method:'post',
           data:{action:'fetchAllProductSortBy_05'},
           success:function(response){
             //   console.log(response);
            $(".showAllProducts_05").html(response);
           
           }
         });
       }
 
 
              // /fetch  products by sort number six
         fetchProductsBySort_06();
       function fetchProductsBySort_06(){
         $.ajax({
           url:'assets/php/process_customer.php',
           method:'post',
           data:{action:'fetchAllProductSortBy_06'},
           success:function(response){
             //   console.log(response);
            $(".showAllProducts_06").html(response);
           
           }
         });
       }
 
 
              // /fetch  products by sort number seven
         fetchProductsBySort_07();
       function fetchProductsBySort_07(){
         $.ajax({
           url:'assets/php/process_customer.php',
           method:'post',
           data:{action:'fetchAllProductSortBy_07'},
           success:function(response){
             //   console.log(response);
            $(".showAllProducts_07").html(response);
           
           }
         });
       }
 
 
              // /fetch  products by sort number eight
         fetchProductsBySort_08();
       function fetchProductsBySort_08(){
         $.ajax({
           url:'assets/php/process_customer.php',
           method:'post',
           data:{action:'fetchAllProductSortBy_08'},
           success:function(response){
             //   console.log(response);
            $(".showAllProducts_08").html(response);
           
           }
         });
       }
 
 
         // 	fetchProducts();
       // function fetchProducts(){
       //   $.ajax({
       //     url:'assets/php/process_customer.php',
       //     method:'post',
       //     data:{action:'search'},
       //     success:function(response){
             // //   console.log(response);
       //      $(".showAllProducts").html(response);
           
       //     }
       //   });
       // }
 
 
       // search button
 
 $("#search_btn").click(function(e){
   
   if($("#search_form")[0].checkValidity()){
     e.preventDefault();
 
     $.ajax({
       url:'assets/php/process_customer.php',
       method:'post',
       data: $("#search_form").serialize()+'&action=search',
       success:function(response){
         console.log(response);
         $(".showAllProducts").html(response);
         
       }
     });
   }
 });
 
 
     })
   
 
 
 
 
     
   
     // /fetch  products comment 
     fetchComments();
       function fetchComments(){
         $.ajax({
           url:'assets/php/action_customer.php',
           method:'post',
           async:false,
           data:{action:'fetchComment'},
           success:function(response){
             //   console.log(response);
            $("#showAllComment").html(response);
           
           }
         });
       }
 
 
     
 
        //display vendor  detail ajax request
        $("body").on("click",".vendor_details", function(e){
             e.preventDefault();
             vendor_details = $(this).attr('id');
 
             // console.log(vendor_details);
             $.ajax({
                     url:'assets/php/action_customer.php',
                 type:'post',
                 data: {vendor_details: vendor_details},
                 success:function(response){
                           // console.log(response);
                     data = JSON.parse(response);
                           // console.log(data);
                   // $(".business_code").html(data.business_code );
                   $(".business_name_2").html('<h4>About '+data.business_name+' Services</h4>' );
                   $(".product_name").html(data.product_name );
                   $('.product_price_one').html(data.product_price_one);
                   $('.product_price_two').html(data.product_price_two);
                   $('.product_info').html(data.product_info);
                   $('product_description').html(data.product_description);
                   $('.product_category').html(data.product_category);
                   $('.product_image').html('<div class"card"> <img  src="assets/php/products/'+data.product_image+'" height=""  width="100%"></div>');
                   $('.product_image_two').html('<div class"card"> <img  src="assets/php/products/'+data.product_image_two+'" height=""  width="100%"></div>');
                   $('.product_image_three').html('<div class"card"> <img  src="assets/php/products/'+data.product_image_three+'" height=""  width="100%"></div>');
                   $('.vendor_image').html('<img src="assets/php/products/'+data.photo+'" class="img-fluid rounded-circle "  height="75px" width="50px">');
                   $('.product_key_features').val(data.product_key_features);
                   $('.specification').html(data.specification);
                   $('.product_policy').html(data.product_policy);
                      $(".product_id").val(data.id );
                    $(".vendor_contact").html(data.contact );
                   // $(".vendor_program").html(data.program );
                   $(".vender_contact").html(data.vender_contact );
                   $(".vendor_location").html(data.location );
                   $(".vendor_email").html(data.email );
                   $(".vender_contact").val(data.vender_contact );
               
                           //  $(".business_name_d").html('<p class="font-weight-bold border rounded m-2 mt-5  bg-white  text-dark"><span class="border rounded p-2 bg-dark text-white">'+data.business_name+'</span></p>');
                 //  $(".business_name_d").html('<p class="font-weight-bold border rounded m-2 mt-5  bg-white  text-dark"><span class="border rounded p-2 bg-dark text-white">'+data.business_name+'</span> || <span class="p-2">'+data.product_name+'</span></p>');
 
                 if((data.product_price_one)==null){
                   ''
                 }else {  $('.product_price_one').html('<h6>Price : Ranges from '+data.product_price_one+'</h6>');}
 
                 if((data.product_price_two)==null){
                     ''
                 }else{
                   $('.product_price_two').html( 'to' ,data.product_price_two);
                 }
                         }
 
             });
 
         });
 
        //display product  detail ajax request
        $("body").on("click",".Comment_product", function(e){
             e.preventDefault();
             product_details = $(this).attr('id');
 
             $.ajax({
                 url:'assets/php/action_customer.php',
                 type:'post',
                 data: {product_details: product_details},
                 success:function(response){
                   data = JSON.parse(response);
                   $(".business_code").val(data.business_code );
                   $(".business_name").val(data.business_name );
                   $('.product_price_one').val(data.product_price_one);
                   $(".product_name").val(data.product_name );
                      $(".product_id").val(data.id );
                  
                             $(".business_name_d").html('<p class="font-weight-bold border rounded m-2 mt-5  bg-white  text-dark"><span class="border rounded p-2 bg-dark text-white">'+data.product_name+'</span></p>');
 
                 }
 
             });
 
         });
 
 
      
 
 
         
 
 
 
       // product rating one
         $("#rating_1").click(function(e){
     if ($("#form_rating_1")[0].checkValidity()){
       e.preventDefault();
      {
    
         $.ajax({
           url:'assets/php/process_customer.php ',
           method: 'post',
           data: $("#form_rating_1").serialize()+'&action=product_rating_one',
           success:function(response){
             // console.log(response);
             Swal.fire({
              title:'Rated !!',
              type:'success'
            });
           }
         });
       }
     }
   });
 
 
       // product rating two
         $("#rating_2").click(function(e){
     if ($("#form_rating_2")[0].checkValidity()){
       e.preventDefault();
      {
    
         $.ajax({
           url:'assets/php/process_customer.php ',
           method: 'post',
           data: $("#form_rating_2").serialize()+'&action=product_rating_two',
           success:function(response){
             // console.log(response);
             Swal.fire({
              title:'Rated !!',
              type:'success'
            });
           }
         });
       }
     }
   });
 
 
 
   // product rating three
   $("#rating_3").click(function(e){
     if ($("#form_rating_3")[0].checkValidity()){
       e.preventDefault();
      {
    
         $.ajax({
           url:'assets/php/process_customer.php ',
           method: 'post',
           data: $("#form_rating_3").serialize()+'&action=product_rating_three',
           success:function(response){
             // console.log(response);
             Swal.fire({
              title:'Rated !!',
              type:'success'
            });
           }
         });
       }
     }
   });
 
 
 // product rating four
 $("#rating_4").click(function(e){
     if ($("#form_rating_4")[0].checkValidity()){
       e.preventDefault();
      {
    
         $.ajax({
           url:'assets/php/process_customer.php ',
           method: 'post',
           data: $("#form_rating_4").serialize()+'&action=product_rating_four',
           success:function(response){
             // console.log(response);
             Swal.fire({
              title:'Rated !!',
              type:'success'
            });
           }
         });
       }
     }
   });
 
 
   // product rating five
   $("#rating_5").click(function(e){
     if ($("#form_rating_5")[0].checkValidity()){
       e.preventDefault();
      {
    
         $.ajax({
           url:'assets/php/process_customer.php ',
           method: 'post',
           data: $("#form_rating_5").serialize()+'&action=product_rating_five',
           success:function(response){
             // console.log(response);
             Swal.fire({
              title:'Rated !!',
              type:'success'
            });
            $("#R5")[0].hide()
           }
         });
       }
     }
   });
 
 
 
 
 
 //   chat admin
 
 $("#chat_btn").click(function(e){
   if($("#chat_form")[0].checkValidity()){
     e.preventDefault();
 
     $.ajax({
       url:'assets/php/process_customer.php',
       method:'post',
       data: $("#chat_form").serialize()+'&action=chat',
       success:function(response){
         // console.log(response);
       }
     });
   }
 });
 
 
 if($("#sort_service_form")[0].checkValidity()){
     e.preventDefault();
 
     $.ajax({
       url:'assets/php/process_customer.php',
       method:'post',
       data: $("#search_form").serialize()+'&action=sort_services',
       success:function(response){
         console.log(response);
         $(".showAllProducts").html(response);
         
       }
     });
   }
 
 
   $("#search_btn").click(function(e){
   
   if($("#search_form")[0].checkValidity()){
     e.preventDefault();
 
     $.ajax({
       url:'assets/php/process_customer.php',
       method:'post',
       data: $("#search_form").serialize()+'&action=search',
       success:function(response){
         // console.log(response);
         $(".showAllProducts").html(response);
         
       }
     });
   }
 });
 
 
 
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
  }
  
  // Close the dropdown if the user clicks outside of it
  window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
      var dropdowns = document.getElementsByClassName("dropdown-content");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  }

    // accordion 
    var acc = document.getElementsByClassName("accordion");
    var i;
    
    for (i = 0; i < acc.length; i++) {
      acc[i].addEventListener("click", function() {
        /* Toggle between adding and removing the "active" class,
        to highlight the button that controls the panel */
        this.classList.toggle("active");
    
        /* Toggle between hiding and showing the active panel */
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
          panel.style.display = "none";
        } else {
          panel.style.display = "block";
        }
      });
    }


    $(function () {
        $('.navbar-toggler').click(function () {
          $('body').toggleClass('noscroll');
        })
      });



      $(document).ready(function () {
        $(".button-log a").click(function () {
            $(".overlay-login").fadeToggle(200);
            $(this).toggleClass('btn-open').toggleClass('btn-close');
        });
    });
    $('.overlay-close1').on('click', function () {
        $(".overlay-login").fadeToggle(200);
        $(".button-log a").toggleClass('btn-open').toggleClass('btn-close');
        open = false;
    });


    
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 5000); // Change image every 2 seconds
}

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () {
    scrollFunction()
};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("movetop").style.display = "block";
    } else {
        document.getElementById("movetop").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}