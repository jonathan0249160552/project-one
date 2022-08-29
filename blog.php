<?php

require_once 'assets/php/header.php'; // adding php file header
require 'links.php'; //adding php file links
// require 'user-admin/assets/php/post_config.php';  //adding php file post_configfiguration
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticeboard</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous"> -->
 
   
    <script type="text/javascript">
    // script for scroll top 
    $(document).ready(function(){ 
    $(window).scroll(function(){ 
        if ($(this).scrollTop() > 100) { 
            $('#scroll').fadeIn(); 
        } else { 
            $('#scroll').fadeOut(); 
        }

        // if ($(this).scrollTop() > 99) { 
        //     $('#comment_2').fadeIn(); 
        // } else { 
        //     $('#comment_2').fadeOut(); 
        // }

        if ($(this).scrollTop() > 100) { 
            $('#support-button').fadeIn(); 
            $('#post').fadeIn();
            // $('#close_com').fadeIn();
        } else { 
            $('#post').fadeOut(); 
            $('#support-button').fadeOut(); 
            // $('#close_com').fadeIn();

       
        } 
        
        $("#class_notice").click(function(e){
          $('#support-button').fadeOut(); 
          
            });

        $("#post").click(function(e){
              $('#close_com').show();
            });

        $("#close_com").click(function(e){
              $('#close_com').hide();
            });

            $("#times").click(function(e){
              $('#close_com').hide();
            });
        
        
        
        // if ($(this).scrollTop() > 100) { 
        //     $('#support-button').fadeIn(); 
        //     $('#post').fadeIn();
        // } else { 
        //     $('#post').fadeOut(); 
        //     $('#support-button').fadeOut(); 
        // } 
    }); 
    $('#scroll').click(function(){ 
        $("html, body").animate({ scrollTop: 0 }, 600); 
        return false; 
    }); 
});
</script>
 

 
</head>


<body id="go" class="main-layout" >
<!-- open comment menu  -->
<a id="support-button" class="" href="#comment_general_box"><img src="images/comments.png" width="25px" alt=""></a>
<a id="comment_2" class="" href="#comment_box"><img src="images/comments.png" width="25px" alt=""></a>
<!-- <a id="gen" class="" href="#comment_box"><img src="images/comments.png" width="25px" alt=""></a> -->
<a id="post" class="" onclick="openNav()"><img src="images/post.png" width="25px" alt=""></a>
<a href="javascript:void(0)" id="close_com" style="width: 50px;height: 50px;font-size:30%" class="closebtn " onclick="closeNav()"><h1 class="font-weight-bold text-white m-2   text-center" >&times;</h1></a>

<a href="javascript:void(0)" id="close_com_2" style="width: 50px;height: 50px;font-size:30%" class="closebtn " onclick="closeNav()"><h1 class="font-weight-bold text-white m-2 3  text-center"  >&times;</h1></a>
<style>

  
/* style for comment box */
  @import url('https://fonts.googleapis.com/css?family=Allura|Josefin+Sans');

*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}


.wrapper{
  margin-top: 10%;
}

.wrapper h1{
  font-family: 'Allura', cursive;
  font-size: 52px;
  margin-bottom: 60px;
  text-align: center;
}

.team{
  display: flex;
  justify-content: center;
  width: auto;
  text-align: center;
  flex-wrap: wrap;

}

.team .team_member{
  background: #fff;
  margin: 5px;
  margin-bottom: 80px;
  width: 300px;
  padding: 20px;
  line-height: 20px;
  color: #8e8b8b;  
  position: relative;
}

.team .team_member h3{
  color: #81c644;
  font-size: 18px;
  margin-top: 50px;
}

.team .team_member p.role{
  color: #ccc;
  margin: 12px 0;
  font-size: 12px;
  text-transform: uppercase;
}

.team .team_member .team_img{
  position: absolute;
  top: -50px;
  left: 50%;
  transform: translateX(-50%);
  width: 100px;
  height: 100px;
  border-radius: 50%;
  background: #fff;
}

.team .team_member .team_img img{
  width: 100px;
  height: 100px;
  padding: 10px;
}

</style>

<style>
  @import url('https://fonts.googleapis.com/css?family=Allura|Josefin+Sans');
</style> 

<style>



* {
	box-sizing: border-box !important;
}

html {
	scroll-behavior: smooth;
}


h1,h2,h3,h4,h5,h6 {
	letter-spacing: 0;
	font-weight: normal;
	position: relative;
	padding: 0 0 10px 0;
	font-weight: normal;
	line-height: normal;
	color: #111111;
	margin: 0
}

h1 {
	font-size: 24px
}

h2 {
	font-size: 22px
}

h3 {
	font-size: 18px
}

h4 {
	font-size: 16px
}

h5 {
	font-size: 14px
}

h6 {
	font-size: 13px
}

*,
*::after,
*::before {
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
}

h1 a,h2 a,h3 a,h4 a,h5 a,h6 a {
	color: #212121;
	text-decoration: none!important;
	opacity: 1
}


p {
	margin: 0px;
	font-weight: 300;
	font-size: 15px;
	line-height: 24px;
}



img {
	max-width: 100%;
	height: auto;
}

:focus {
	outline: 0;
}



.title {
	text-align:center;
	padding-bottom: 60px;

}

.title h2 {
	font-size: 50px;
	line-height: 55px;
	color:#ffc221;
	font-weight: 500;
	text-transform: uppercase;
    margin-bottom: 27px;
    position: relative;
    padding-bottom: 8px;
}
.title h2:after {
	position: relative;
content: '';
top: 100%;
width: 110px;
height: 10px;
display: block;
margin: 0 auto;
background: #000;
}

.title span{
color:#070500;
font-size: 28px;
line-height: 28px;
margin-top: 20px;
}


.text-bg {position: inherit; text-align: left; }

.text-bg p {color: #030000;
  font-size: 17px; line-height: 28px;  padding-top: 40px; padding-bottom: 40px; display: inline-block;
 }
.img_bg i {float: left; display: flex; flex-wrap: wrap;}
.img_bg i img {width: 149px; height: 149px;}
.img_bg  span {color: #000; font-size: 28px; line-height: 28px; padding-left: 40px; padding-top: 41px;}
.img_bg .date {font-weight: normal; font-size: 16px; } 



.contact {
	margin-top: 50px;
}

.contact h3 {
	color: #fff;
	font-weight: 500;
	font-size: 28px;
    		line-height: 30px;
	padding-bottom: 30px;
	text-transform: uppercase;
}

.contact span {
	color: #fff;
	font-size: 17px;
	line-height: 27px;
}







/** Lastestnews **/
 .Lastestnews {
     padding:10px 0px;
     background: #fff;
}
.Lastestnews .titlepage {
     text-align: center;
     margin-bottom: 60px;
}
.Lastestnews .titlepage span {
     color: #060606;
     font-size: 17px;
     line-height: 23px;
}
 .Lastestnews .news-box {
     background:#fff;
     box-shadow: #ddd 0px 0px 8px 4px;
     margin-bottom: 30px;
}
 .Lastestnews .news-box figure {
     margin: 0;
}
 .Lastestnews .news-box figure img {
     width: 100%;
}
 .Lastestnews .news-box h3 {
     font-size: 22px;
     line-height: 24px;
     color: #060606;
     font-weight: 500;
     padding: 20px 20px 4px 20px;
}
 .Lastestnews .news-box span {
     color: #e61414;
     margin-left: 20px;
}
 .Lastestnews .news-box p{
     color: #7b7a7a;
     font-size:16px;
     line-height: 23px;
     padding: 7px 20px 20px 20px;
}
/** Lastestnews **/




</style>

<style>
body {font-family: Arial;}

/* Style the tab */
.tab {
  overflow: hidden;
  border: 2px solid #ccc;
  background-color: rgba(2, 0, 17, 0.192);
}

/* Style the buttons inside the tab */
.tab button {
  background-color: rgba(34, 17, 161, 0);
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: white
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  /* border: 1px solid ; */
  border-top: none;
}
</style>


<!-- end loader --> 
      <style>
   

        #scroll {
    position:fixed;
    right:10px;
    bottom:20%;
    cursor:pointer;
    width:50px;
    height:50px;
    background-color:#3498db;
    text-indent:-9999px;
    display:none;
    -webkit-border-radius:60px;
    -moz-border-radius:60px;
    border-radius:60px
}
#scroll span {
    position:absolute;
    top:50%;
    left:50%;
    margin-left:-8px;
    margin-top:-12px;
    
    height:0;
    width:0;
    border:8px solid transparent;
    border-bottom-color:#ffffff;
}
#scroll:hover {
    background-color:#3b3938c4;
    opacity:1;filter:"alpha(opacity=100)";
    -ms-filter:"alpha(opacity=100)";
}
    </style>

  <style>
   /* sytle for scroll button */

        #scroll {
    position:fixed;
    right:30px;
    bottom:20%;
    cursor:pointer;
    width:50px;
    height:50px;
    background-color:#3498db;
    text-indent:-9999px;
    display:none;
    -webkit-border-radius:60px;
    -moz-border-radius:60px;
    border-radius:60px
}
#scroll span {
    position:absolute;
    top:50%;
    left:50%;
    margin-left:-8px;
    margin-top:-12px;
    
    height:0;
    width:0;
    border:8px solid transparent;
    border-bottom-color:#ffffff;
}
#scroll:hover {
    background-color:#3b3938c4;
    opacity:1;filter:"alpha(opacity=100)";
    -ms-filter:"alpha(opacity=100)";
}

#support-button {
position: fixed;
top: 15%;
right: 30px;
padding: 11px;
border-radius:60px;
z-index: 9999;
background-color:#3498db;
display:none;
}


#comment_2  {
position: fixed;
top: 15%;
right: 30px;
padding: 11px;
border-radius:60px;
z-index: 9999;
background-color:#3498db;
display:none;
}

#post {
position: fixed;
top: 30%;
right: 30px;
padding: 11px;
border-radius:60px;
z-index: 9999;
background-color:#3498db;
display:none;
}

#gen {
position: fixed;
top: 30%;
right: 30px;
padding: 11px;
border-radius:60px;
z-index: 9999;
background-color:#3498db;
display:none;
}


#close_com {
position: fixed;
top: 60%;
right: 30px;
/* padding: 5%; */
border-radius:60px;
/* margin-top:5%; */
z-index: 9999;
background-color:#3498db;
display:none;
}


#close_com_2 {
position: fixed;
top: 60%;
right: 30px;
/* padding: 5%; */
border-radius:60px;
/* margin-top:5%; */
z-index: 9999;
background-color:#3498db;
display:none;
}


#support-button:hover {
    background-color:#3b3938c4;
    opacity:1;filter:"alpha(opacity=100)";
    -ms-filter:"alpha(opacity=100)";
}
#comment_2:hover {
position: fixed;
top: 15%;
right: 30px;
padding: 11px;
border-radius:60px;
z-index: 9999;
background-color:#3498db;
display:none;
}
#post:hover {
    background-color:#3b3938c4;
    opacity:1;filter:"alpha(opacity=100)";
    -ms-filter:"alpha(opacity=100)";
    
}

#gen:hover {
    background-color:#3b3938c4;
    opacity:1;filter:"alpha(opacity=100)";
    -ms-filter:"alpha(opacity=100)";
    
}

#close_com:hover {
    background-color:#3b3938c4;
    opacity:1;filter:"alpha(opacity=100)";
    -ms-filter:"alpha(opacity=100)";
    
}

#comment_2:hover {
    background-color:#3b3938c4;
    opacity:1;filter:"alpha(opacity=100)";
    -ms-filter:"alpha(opacity=100)";
    
}

#close_com_2:hover {
    background-color:#3b3938c4;
    opacity:1;filter:"alpha(opacity=100)";
    -ms-filter:"alpha(opacity=100)";
    
}

#p {
font-size :19px;
}

  
    </style>

<h1 class="text-center line-height  btn-light p1-2 header text-bold"></h1>
<div><h1 class="text-center   bg-dark text-light p-2">NOTICE BOARD</h1></div>

<div class="tab">
  <button class="tablinks pl-2 ml-2" onclick="openCity(event, 'London')" id="defaultOpen">General Notice</button>
  <button class="tablinks" onclick="openCity(event, 'Paris')" id="class_notice">Class Notice</button>
  <!-- <button class="tablinks" onclick="openCity(event, 'Tokyo')">Tokyo</button> -->
</div>

<div id="London" class="tabcontent">

 <div class="" id="showAllNotice_Class">
            <p class="text-center font-weight-bold text-success align-self-center lead">Please Wait...</p>
            
        </div> 
</div>

<div id="Paris" class="tabcontent">

<div class="" id="showAllNotice">
            <p class="text-center font-weight-bold text-success align-self-center lead">Please Wait...</p>
            
        </div>
</div>
<!-- class notice details -->
  <div class="modal card fade bd-example-modal-xl" id="showUserDetailsModal">

    <div class="modal-dialog modal-xl  modal-dialog-centered " >
        <div class="modal-content">
        
            <div class="">
           
               <!-- <button type="button" class="close" data-dismis="modal"></button>  -->
            </div>
            <div class="modal-body">
            <p class="  p-2 text-center text-white" id="getType" style="background-color:#07021b"></p>
            <div class="  align-self-center" id="getImage" style="width: 100%;"></div>
            <div class="card-deck">
       
                <div class="card m-2 " >
                    <div class="card-body ">
                   
                    <p id="getTitle"></p>
                    <p id="getBody"></p>
                    <p id="getPostedBy"></p>
                    <p id="getTime"></p>
                   
                    </div>
                </div>
         
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
  </div>

  <!-- class notice details end -->



  <!-- general notice details start -->
  <div class="modal card fade bd-example-modal-xl" id="showUserGenDetailsModal">

    <div class="modal-dialog modal-xl  modal-dialog-centered " >
        <div class="modal-content">
        
            <div class="">
           
               <!-- <button type="button" class="close" data-dismis="modal"></button>  -->
            </div>
            <div class="modal-body">
            <p class="  p-2 text-center text-white" id="getGenType" style="background-color:#07021b"></p>
            <div class="  align-self-center" id="getGenImage" style="width: 100%;"></div>
            <div class="card-deck">
       
                <div class="card m-2 " >
                    <div class="card-body ">
                   
                    <p id="getGenTitle"></p>
                    <p id="getGenBody"></p>
                    <p id="getGenPostedBy"></p>
                    <p id="getGenTime"></p>
                   
                    </div>
                </div>
         
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
  </div>

<!-- general notice details end  -->


<!-- display class comment modal -->
  <div class="modal  fade " id="showUserCommentsClassModal">
  <!-- showUserDetailsModal -->
    <div class="modal-dialog  modal-dialog-centered " >
        <div class="modal-content">
        
            <div class="">
       
            </div>
            <div class="modal-body">
            <p class="  p-2 text-center text-white" id="getType" style="background-color:#07021b"></p>
            <!-- <div class="  align-self-center" id="getImage" style="width: 100%;"></div> -->
            <div class="card-deck">
       
                <div class="card m-2 " >
                    <div class="card-body ">
                    <div class="card-body">
              <form action="#"method="post" class="px-4" id="post_class_comments_form">
              <input type="hidden" name="class_id" id="class_id" >
                <div class="form-group">
                  <input type="text" style="display: none;" name="class_post_title" id="class_post_title" placeholder="class"
                  class="form-control-lg form-control rounded-0" required>
                
                  <input type="text" name="level" style="display: none;" id="level" value="<?=$clevel?>">
                  <input type="text" name="program" style="display: none;" id="program" value="<?=$cprogram?>">
                </div>
                  <div class="form-group">
                    <textarea name="class_post_comment"  id="class_post_comment" class="form-control-lg form-control 
                    rounded-0" placeholder="Write Your Comment Here..." rows="8" required></textarea>
                  </div>
                    <div class="form-group">
                      <input type="submit" name="class_comBtn" id="class_comBtn"
                      value="Post Comment" class="btn btn-primary btn-block btn-lg rounded-0">
                    </div>
              </form>
            </div>
                   
                    </div>
                </div>
         
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
  </div>
<!-- // end class comment box -->



<!-- // display general comment modal -->

<div class="modal  fade " id="showUserGenCommentsModal">

    <div class="modal-dialog modal-sm  modal-dialog-centered " >
        <div class="modal-content">
        
            <div class="modal-body">
            <p class="  p-2 text-center text-white" id="getType" ></p>
            <!-- <div class="  align-self-center" id="getImage" style="width: 100%;"></div> -->
            <div class="card-deck">
       
                <div class=" m-2 " >
                    <div class="card-body ">
                                
                            <form action="#"method="post" class="px-4" id="post_General_comment_form">
                            <input type="hidden" name="id" id="id" >
                              <div class="form-group">
                                <input type="text" style="display: none;"  name="gen_post_title" id="gen_post_title" placeholder="general"
                                class="form-control-lg form-control rounded-0" required>
                            
                                <input type="text" name="level" style="display: none;" id="level" value="<?=$clevel?>">
                                <input type="text" name="program" style="display: none;" id="program" value="<?=$cprogram?>">
                              </div>
                                <div class="form-group">
                                  <textarea name="gen_post_comment"  id="gen_post_comments" class="form-control-lg form-control 
                                  rounded-0" placeholder="Comment ..." rows="8" required></textarea>
                                </div>
                                  <div class="form-group">
                                    <input type="submit" name="gen_commentsBtn" id="gen_commentsBtn"
                                    value="Post" class="btn btn-primary btn-block btn-lg rounded-0">
                                  </div>
                            </form>
                      </div>
                </div>
         
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
  </div>
<!-- //end general comment modal -->

<!-- comment box  for class notice -->

<!-- general comment box start -->
<div class="container" id="comment_box" style="display: none;">
  <div class="row justify-content-center">
    <div class="col-lg-8 mt-3">
      <?php if($verified =='Verified'): ?>
        <div class="card border-primary">
          <div class="card-header lead text-center bg-primary text-white">
            Post Anonymous Message</div>
            <div class="card-body">
              <form action="#"method="post" class="px-4" id="comments_class_ano_form">
                <div class="form-group">
                  <input type="text" name="class_ano_post_title" id="class_ano_post_title" placeholder="Write Your Subject" 
                  class="form-control-lg form-control rounded-0" required>
                  <input type="text" name="program" id="program" value="<?=$cprogram?>" style="display:none">
                  <input type="text" name="level" id="level" value="<?=$clevel?>" style="display: none;">
                  <input type="text" name="anonymous" id="anonymous" value="1" style="display: none;">
                </div>
                
                  <div class="form-group">
                    <textarea name="class_ano_post_body"  id="class_ano_post_body" class="form-control-lg form-control 
                    rounded-0" placeholder=" Comment Here..." rows="8" required></textarea>
                  </div>
                    <div class="form-group">
                      <input type="submit" name="comments_class_ano_Btn" id="comments_class_ano_Btn"
                      value="Post Comment"   class="btn btn-primary btn-block btn-lg rounded-0">
                    </div>
              </form>
            </div>
        </div>
      <?php else: ?>
      <h3 class="text-center text-muted mb-2 mt-5">Please Verify  
      Your E-Mail First to be able to Post Comments</h3>
      <?php endif; ?>
    </div>
  </div>
</div>
<!-- comment box end -->


<!-- general comment box start -->
<div class="container" id="comment_general_box">
  <div class="row justify-content-center">
    <div class="col-lg-8 mt-3">
      <?php if($verified =='Verified'): ?>
        <div class="card border-primary">
          <div class="card-header lead text-center bg-dark text-white">
            Post Anonymous Message</div>
            <div class="card-body">
              <form action="#"method="post" class="px-4" id="comments_gen_ano_form">
                <div class="form-group">
                  <input type="text" name="gen_ano_post_title" id="gen_ano_post_title" placeholder="Write Your Subject" 
                  class="form-control-lg form-control rounded-0" required>
                  <input type="text" name="program" id="program" value="<?=$cprogram?>" style="display:none">
                  <input type="text" name="level" id="level" value="<?=$clevel?>" style="display: none;">
                  <input type="text" name="anonymous" id="anonymous" value="1" style="display: none;">
                </div>
                
                  <div class="form-group">
                    <textarea name="gen_ano_post_body"  id="gen_ano_post_body" class="form-control-lg form-control 
                    rounded-0" placeholder="Write Your Comment Here..." rows="8" required></textarea>
                  </div>
                    <div class="form-group">
                      <input type="submit" name="comments_gen_ano_Btn" id="comments_gen_ano_Btn"
                      value="Post Comment" class="btn btn-primary btn-block btn-lg rounded-0">
                    </div>
              </form>
            </div>
        </div>
      <?php else: ?>
      <h3 class="text-center text-muted mb-2 mt-5">Please Verify  
      Your E-Mail First to be able to Post Comments</h3>
      <?php endif; ?>
    </div>
  </div> 
</div> 
<!-- general comment box end -->




<a href="#" id="scroll" style="display: none;"><span></span></a>


<div class="">
<style>
    /* The side navigation menu */
.sidenav {
  height: 100%; /* 100% Full-height */
  width: 0; /* 0 width - change this with JavaScript */
  position: fixed; /* Stay in place */
  z-index: 1; /* Stay on top */
  top: 0; /* Stay at the top */
  left: 0;
  background-color: #343a40;
  overflow-x: hidden; /* Disable horizontal scroll */
  padding-top: 30px; /* Place content 60px from the top */
  transition: 0.5s; /* 0.5 second transition effect to slide in the sidenav */
 
}/* 0.5 second transition effect to slide in the sidenav */


/* The navigation menu links */
.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 16.5px;
  color: #343a40;
  display: block;
 
  transition: 0.3s;
}


/* When you mouse over the navigation links, change their color */
.sidenav a:hover {
  color: #f1f1f1;
}
.sidenav a:active {
  color: black;
}

/* Position and style the close button (top right corner) */
.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

/* Style page content - use this if you want to push the page content to the right when you open the side navigation */
#main {
  transition: margin-left .5s;
  padding: 20px;
}
.admin-link:hover{
     background-color:#212529;
     text-decoration: none;
  }
  .nav-active{
     background-color:black;
     text-decoration: none;
  }
  .admin-link{
     background-color: #343a40;
  }
/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 10px;}
}
 body {
    max-width: 100%;
    overflow-x: hidden;
}
  </style>
        <style>
            body {
    margin: 0 0 55px 0;
}


.nav {
    position: fixed;
    bottom: 0;
    width: 100%;
    height: 55px;
    box-shadow: 0 0 3px rgba(0, 0, 0, 0.2);
    background-color: white;
    display: flex;
    overflow-x: auto;
    /* box-shadow: 0 2px 4px 0 rgba(0,0,0,.2); */
    /* shadow: 2px 2px 5px red; */
}

.nav__link {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    flex-grow: 1;
    min-width: 50px;
    overflow: hidden;
    white-space: nowrap;
    font-family: sans-serif;
    font-size: 13px;
    color: #444444;
    text-decoration: none;
    -webkit-tap-highlight-color: transparent;
    transition: background-color 0.1s ease-in-out;
    box-shadow: 0 2px 4px 0 rgba(0,0,0,.2);
    text-shadow: 0 2px 4px 0 rgba(0,0,0,.2);
    /* text-shadow: 2px 2px 4px #000000; */
}

.nav__link:hover {
    background-color: #eeeeee;
}

.nav__link--active {
    background-color: #eeeeee;
    box-shadow: 0 2px 4px 0 rgba(0,0,0,.2);
    text-shadow: 0 2px 4px 0 rgba(0,0,0,.2);
   /* text-shadow: 2px 2px 4px #000000; */
}

.nav__icon {
    font-size: 19.6px;
    color: black;
}

#more {display: none;}

    </style>
        </style>
        <nav class="nav mb-2">
        <a href="home.php" class="nav__link  nav__link--active">
        <!-- <i class="material-icons nav__icon"></i> -->
        <i class="nav__text"><i class="fas fa-bars fa-3x"></i></i>
        <!-- <span class="nav__text">Dashboard</span> -->
      </a>
      <a href="post.php" class="nav__link  ">
        <i class="material-icons nav__icon"><i class="fas fa-book fa-2x"></i></i>
   
        <!-- <span class="nav__text">Academia</span> -->
      </a>
      <a href="gpa.php" class="nav__link">
        <i class="material-icons nav__icon"><i class="fas fa-graduation-cap fa-2x"></i></i>
        
        <!-- <span class="nav__text">Academia</span> -->
      </a>
      <a href="blog.php" class="nav__link">
        <i class="material-icons nav__icon"><i class="far fa-calendar-check fa-2x"></i></i>
        <!-- <span class="nav__text">Notice board</span> -->
      
    
    </nav>
    </div> 

    </div> 
  

<div  id="mySidenav" class="sidenav ">
  <a  class="closebtn text-light p-1 m-1" id="times" onclick="closeNav()">&times;</a>
  <!-- <h3 class="text-light text-center p-2 bg-info mt-2 col">Comments</h3> -->
            <div class="list-group p-2  list-group-flush">
 <style>
   .com{
    font-family: 'Allura', cursive;
  font-size: 30px;
  margin-bottom: 60px;
  margin-top: 30px;
  text-align: center;

}
.pimg{
  width:250px;
  height:250px;
}
   
 </style>
            <h3 class="com  text-light">Comments</h3>
            <div style="display: none;" id="showAllComments">

            </div>         

            <div id="showAllGeneralComments">

            </div>  

            <div id="showAllGeneralAnonymousComments">

            </div>  

</div>



</div>
</div>

<script>
/* Set the width of the side navigation to 250px */
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

/* Set the width of the side navigation to 0 */
function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>

<!-- 
<button onclick="myFunction()" id="myBtn">Read more</button> -->

<!-- <script>
function myFunction() {
  var dots = document.getElementById("dots");
  var moreText = document.getElementById("more");
  var btnText = document.getElementById("myBtn");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Read more"; 
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Read less"; 
    moreText.style.display = "inline";
  }
}
</script> -->

<script type="text/javascript">

  $(document).ready(function(){


    $("#defaultOpen").click(function(e){
      $('#comment_box').hide();
      $('#comment_general_box').show();
      $('#showAllComments').hide();
      $('#showAllGeneralComments').show();
      openNav()
    });

    $("#class_notice").click(function(e){
      $('#comment_general_box').hide();
      $('#showAllGeneralComments').hide();
      $('#comment_box').show();
      $('#showAllComments').show();
      $('#close_com').hide();
      // $('#close_com').hide();
      $('#close_com_2').hide();
     $('#support-button').hide();
      // $('comment_general_box').hide();
      $('comment_2').show();
    openNav()
    });

   

// read more button click for noticeboard
    $("body").on("click",".read_more",function(e){
      
      details = $(this).attr('id');
      
      $(this).hide();

      $(".read_less").show();
      // console.log(details);
      
      
     
   
  });

    // read less button click
    $("body").on("click",".read_less",function(e){
      // $('.read_less').hide();
      //
   
      details = $(this).attr('id');
      
      $(this).hide();
      $('.read_more').show();

        });


        $('#popup').click(function() {
        var src = $(this).attr('src');
        var title = $(this).attr('title');
        $('#popup-img').attr('src',src);
        $('#title-pop').attr('title',title);
        $('#staticBackdrop').modal('show');
		
      });
    


        
// read more button click for comment
    $("body").on("click",".com_read_more",function(e){
      $('.com_read_more').hide();
      $('.com_read_less').show();
   

        });


        // read less button click
    $("body").on("click",".com_read_less",function(e){
      $('.com_read_less').hide();
      $('.com_read_more').show();
   

        });

      //post a general comment for noticeboard fetch jax request
      $("body").on("click",".General_commentBtn",function(e){
            e.preventDefault();
            commentGeneral_id = $(this).attr('id');
        $.ajax({
            url:'assets/php/process.php',
            method:'post',
            data:{commentGeneral_id:commentGeneral_id},
            success:function(response){
        
            data = JSON.parse(response);
          
            $("#id").val(data.id);
            $("#gen_post_title").val(data.title);
            // $(".showUserGenCommentsModal").hide();
          //    Swal.fire({
          //    title:'Comment Posted',
          //    type:'success'
          //  });
            }
        });

        });

        // post a class comment for noticeboard fetch jax request
      $("body").on("click",".CommentClassBtn",function(e){
            e.preventDefault();
            commentClass_id = $(this).attr('id');
      
        $.ajax({
            url:'assets/php/process.php',
            method:'post',
            data:{commentClass_id:commentClass_id},
            success:function(response){
            data = JSON.parse(response);
            $("#class_id").val(data.id);
            $("#class_post_title").val(data.title);
     
            
            }
        });

        });

        
// post general comment for noticeboard posts
    $("#gen_commentsBtn").click(function(e){
      if($("#post_General_comment_form")[0].checkValidity()){
        e.preventDefault();

        $(this).val('Please Wait...');
        $.ajax({
          url:'assets/php/process.php',
          method:'post',
          data:$("#post_General_comment_form").serialize()+'&action=post_general_comments',
          success:function(response){
    
           $("#post_General_comment_form")[0].reset();
           $("#gen_commentsBtn").val('Post Comment');
           
           Swal.fire({
             title:'Comment Posted',
             type:'success'
           });
           fetchComments();
           fetchGeneralComments();
          }
        });
         
      }

  
    });



// post class comment for noticeboard posts
$("#class_comBtn").click(function(e){
      if($("#post_class_comments_form")[0].checkValidity()){
        e.preventDefault();

        $(this).val('Please Wait...');
        $.ajax({
          url:'assets/php/process.php',
          method:'post',
          data:$("#post_class_comments_form").serialize()+'&action=post_class_comments',
          success:function(response){
      //  console.log(response);
           $("#post_class_comments_form")[0].reset();
           $("#class_comBtn").val('Post Comment');
           Swal.fire({
             title:'Comment Posted',
             type:'success',
             time:2000,
           });
           fetchComments();
           fetchGeneralComments();
           
          }
        });
      }

  
    });



  // open side nav after comments posted
  openNav()
    function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  $('#close_com_2').show();

  
  $('#close_com_2').click(function(e){
    $('#close_com_2').hide();
    
  });

  $('#times').click(function(e){
    $('#close_com_2').hide();
    $('#close_com').hide();
  });
}
    





  // post general anonymous comment 
$("#comments_gen_ano_Btn").click(function(e){
      if($("#comments_gen_ano_form")[0].checkValidity()){
        e.preventDefault();

        $(this).val('Please Wait...');
        $.ajax({
          url:'assets/php/process.php',
          method:'post',
          data:$("#comments_gen_ano_form").serialize()+'&action=gen_ano_comment',
          success:function(response){
     
           $("#comments_gen_ano_form")[0].reset();
           $("#comments_gen_ano_Btn").val('Post Comment');
           Swal.fire({
             title:'Comment Posted',
             type:'success'
           });
           fetchGeneralAnonymousComments();
          }
        });
        
      }

    });



      // post class anonymous comment 
$("#comments_class_ano_Btn").click(function(e){
      if($("#comments_class_ano_form")[0].checkValidity()){
        e.preventDefault();

        $(this).val('Please Wait...');
        $.ajax({
          url:'assets/php/process.php',
          method:'post',
          data:$("#comments_class_ano_form").serialize()+'&action=class_post_ano_comment',
          success:function(response){
     
           $("#comments_class_ano_form")[0].reset();
           $("#comments_class_ano_Btn").val('Post Comment');
           Swal.fire({
             title:'Comment Posted',
             type:'success'
           });
           fetchComments();
           fetchGeneralComments();
           fetchGeneralAnonymousComments();
          }
        });
      }

    });




  //fetch all class notice
  fetchAllNotices();
        function fetchAllNotices(){
            $.ajax({
                url:'assets/php/process.php',
                method:'post',
                data:{action:'fetch'},
                success:function(response){
                   $("#showAllNotice").html(response);
                //    $("table").DataTable({
                //      order:[0,'desc']
                //  });
                   
                }
            });
        }
  
        

        
  //fetch all class general notice
  fetchAllGeneralNotice();
        function fetchAllGeneralNotice(){
            $.ajax({
                url:'assets/php/process.php',
                method:'post',
                data:{action:'FetchAllGeneralNotice'},
                success:function(response){
                   $("#showAllNotice_Class").html(response);
                //    $("table").DataTable({
                //      order:[0,'desc']
                //  });
                   
                }
            });
        }
        

       
  //fetch general comments of a user
  fetchGeneralComments();
      function fetchGeneralComments(){
        $.ajax({
          url:'assets/php/process.php',
          method:'post',
          data:{action:'fetchGeneralComments'},
          success:function(response){
           $("#showAllGeneralComments").html(response);
          
          }
        });
      }

    //fetch general anonymous comments of a user
  fetchGeneralAnonymousComments();
      function fetchGeneralAnonymousComments(){
        $.ajax({
          url:'assets/php/process.php',
          method:'post',
          data:{action:'fetchGeneralAnonymousComments'},
          success:function(response){
           $("#showAllGeneralAnonymousComments").html(response);
          
          }
        });
      }
 
 

  //fetch  class comments of a user
  fetchComments();
      function fetchComments(){
        $.ajax({
          url:'assets/php/process.php',
          method:'post',
          data:{action:'fetchAllComments'},
          success:function(response){
           $("#showAllComments").html(response);
          
          }
        });
      }

  // check  notification 
  checkNotification();
      function checkNotification(){
        $.ajax({
          url:'assets/php/process.php',
          method:'post',
          data:{action:'checkNotification'},
          success:function(response){
          $("#checkNotification").html(response);
          }
        });
      }

    

        //display General Notice in detail ajax request
        $("body").on("click",".Gen_view_detailBtn", function(e){
            e.preventDefault();
            general_details_id = $(this).attr('id');
            
            $.ajax({
                url:'assets/php/action.php',
                type:'post',
                data: {general_details_id: general_details_id},
                success:function(response){
                    data = JSON.parse(response);
                 $("#getGenType").html('<span class="text-white  font-weight-bold" style="font-size:20px;">'+data.type +'</span>');
                 $("#getGenTitle").html('<hr class="bg-success" style="height: 5px;border-radius:50%;"><span class="  font-weight-bold" style = "font-size:25px;">'+data.title +' </span>');
                 $("#getGenBody").html('<p class="text-dark mt-3 ">'+data.body+'. This massege was posted by <span class="font-italic font-weight-bold text-dark"> '+data.posted_by +'</span> on <span class="font-italic alert-primary text-dark pl-2 pr-2">'+data.created_at+'</span> </p> <hr class="bg-success" style="height: 5px;border-radius:50%;"> ');
                //  $("#getPostedBy").text('Posted By : '+data.posted_by);
                //  $("#getTime").text('Posted at :'+data.created_at)
               
                
                 if(data.image != ''){
                     $("#getGenImage").html('<img src="user-admin/assets/php/imagesuploadedf/'+data.image+'" class="  align-self-center" height="100%" width="100%">');
                 }
                 else{
                    $("#getGenImage").html('<img src="assets/img/va2.PNG'+data.image+'" class="img-thumbnail img-fluid align-self-center" height="500px" width="100%">');
                 }
                }
            });

        });

        //display class Notice in detail ajax request
        $("body").on("click",".userDetailsIcon", function(e){
            e.preventDefault();
            details_id = $(this).attr('id');
            
            $.ajax({
                url:'assets/php/action.php',
                type:'post',
                data: {details_id: details_id},
                success:function(response){
                    data = JSON.parse(response);
                 $("#getType").html('<span class="text-white  font-weight-bold" style="font-size:20px;">'+data.type +'</span>');
                 $("#getTitle").html('<hr class="bg-success" style="height: 5px;border-radius:50%;"><span class="  font-weight-bold" style = "font-size:25px;">'+data.title +' </span>');
                 $("#getBody").html('<p class="text-dark mt-3 ">'+data.body+'. This massege was posted by <span class="font-italic font-weight-bold text-dark"> '+data.posted_by +'</span> on <span class="font-italic alert-primary text-dark pl-2 pr-2">'+data.created_at+'</span> </p> <hr class="bg-success" style="height: 5px;border-radius:50%;"> ');
                //  $("#getPostedBy").text('Posted By : '+data.posted_by);
                //  $("#getTime").text('Posted at :'+data.created_at)
               
                
                 if(data.image != ''){
                     $("#getImage").html('<img src="user-admin/assets/php/imagesuploadedf/'+data.image+'" class="  align-self-center" height="100%" width="100%">');
                 }
                 else{
                    $("#getImage").html('<img src="assets/img/va2.PNG'+data.image+'" class="img-thumbnail img-fluid align-self-center" height="500px" width="100%">');
                 }
                }
            });
          });

        });

  
      
</script>



<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>

<script>
  const readId = document.querySelectorAll(".read_more");
  for(const idData of readId){
    alert("hello")
  }





</script>
</body>
</html>