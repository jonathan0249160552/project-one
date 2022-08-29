<?php
  // Create database connection
 
  $db = mysqli_connect("localhost", "root", "", "db_user_system");
//   if($db) {
//   //if connection has been established display connected.
//   echo "connected";
//   }
  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  	// Get image name
    $image = $_FILES['image']['name'];
    $filetmpname = $_FILES['image']['tmp_name'];
  	// Get text
  	$body = mysqli_real_escape_string($db, $_POST['body']);
      $posted_by = ($_POST['posted_by']);
      $type = ($_POST['type']);
      $title = ($_POST['title']);
      $level =($_POST['level']);
      $program = ($_POST['program']);

      
  	// image file directory
    // $target = "images/".basename($image);
    $folder = 'assets/php/imagesuploadedf/';
    //function for saving the uploaded images in a specific folder
    move_uploaded_file($filetmpname, $folder.$image);

  	$sql = "INSERT INTO notice_board_bsc_actu_sci (image,title,posted_by, body,type,message,level,program) VALUES ('$image','$title','$posted_by','$body','$type','New Notice Posted !!!','$level','$program' )";
   
  	// execute query
  	mysqli_query($db, $sql);

  	if (!empty($_POST['upload'])) {
          $msg =  '<div class="alert alert-success alert-dismissable" id="flash-msg">
          <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
          <h4 class"text-center"> <n/> Successfully Posted !!!</h4>
          </div>';
          echo $msg;
  	}else{
        $msg =  '<div class="alert alert-success alert-dismissable" id="flash-msg">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <h4> <n/> Sorry something went wrong please try again later</h4>
        </div>';
        echo $msg;
  	}
  }



  if(isset($_POST['del_id'])){
    $id =$_POST['del_id'];
    $data = userAction($id,0);

   
 
  }
  $result = mysqli_query($db, "SELECT * FROM notice_board_bsc_actu_sci WHERE deleted =1 ORDER BY created_at DESC");
//handle display user in detail ajax request


 
  function userAction($id,$val)
  {
    $sql = mysqli_query($db, "UPDATE notice_board_bsc_actu_sci SET deleted =$val WHERE Id = Id ");
  
  }

  // if(isset($_POST['updateNotice_image'])){
  //   $id = ($_POST['id']);
  //   $image = $_FILES['image']['name'];
  //   $filetmpname = $_FILES['image']['tmp_name'];
  //   $folder = 'assets/php/imagesuploadedf/';
    //function for saving the uploaded images in a specific folder
    // move_uploaded_file($filetmpname, $folder.$image);

    // $sql = "UPDATE  notice_board_bsc_actu_sci  SET image = '$image'   WHERE id  ='$id'";
    // $sql ="UPDATE notes_bsc_actu_sci SET title = :title,note=:note,updated_at = NOW() 
    // WHERE id=:id";
  // }

  function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


// display time in ago
 function timeInAgo($timestamp)
{
 date_default_timezone_set('Africa/Accra');
    $timestamp = strtotime($timestamp) ? strtotime($timestamp) : $timestamp;
    $time = time() - $timestamp;

    switch($time){
        // Seconds
        case $time <=60:
        return 'Just Now !';
        // Minute
        case $time >= 60 && $time < 3600:
        return(round($time/60)==1)?' a minute ago' : round($time/60). ' minutes ago';

        // hours
        case $time >= 3600 && $time < 86400:
        return(round($time/3600)==1)?' an hour ago' : round($time/3600). ' hours ago';

         // days
         case $time >= 86400 && $time < 604800:
         return(round($time/86400)==1)?' a day ago' : round($time/86400). ' days ago';

         // weeks
         case $time >= 604800 && $time < 2600640:
         return(round($time/604800)==1)?' a week ago' : round($time/604800). ' weeks ago';

         // months
         case $time >= 2600640 && $time < 31207680:
         return(round($time/2600640)==1)?' a month ago' : round($time/2600640). ' months ago';
        
         // years
         case $time >= 31207680;
            return(round($time/31207680)==1)?' a years ago' : round($time/31207680). ' years ago';

        
        }
}


?>
