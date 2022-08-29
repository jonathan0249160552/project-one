<?php
require_once 'assets/php/admin-header.php';
// require 'links.php';
 require 'assets/php/post_config.php';
?>
<div class="row card m-4 p-4 rounded">
  <h4 class="font-weight-bold text-center rounded">Post on Noticeboard</h4>
 <div class="card-body alert-info mt-2">
 <form method="post" action="" id="upload_form" enctype="multipart/form-data">
              <input type="hidden" name="size" value="1000000">
              <div id="redAlert"> </div>
              <label for="level" class="font-weight-bold">This Post is From</label>
              <input style="display: none;" type="text" name="level" id="program" value="<?=$clevel?>">
              <input style="display: none;" type="text" name="program" id="program" value="<?=$cprogram?>">
              <div class="form-group">
                  <input type="text" name="title" placeholder="Title  " 
                  class="form-control-lg form-control rounded-0" required>
                </div>
                <div class="form-group">
                <input type="text" id="posted_by"  name="posted_by" value="<?=$cf_name?> <?= $cs_name?>" placeholder="Post by" 
                  class="form-control-lg form-control rounded-0" required>
                </div>
                <div class="form-group">
                  <label for="type" class="font-weight-bold">Select Notice Type</label>
                  <select style="width: 100%;" class="mt-2 form-control rounded-0 " name="type" id="type" required>
                    <option value="ANNOUNCEMENT">Announcement</option>
                    <option value="NOTICE">Notice</option>
                    <option value="EVENT">Event</option>
                    <option value="PROGRAM">PROGRAM</option>
                    <option value="INFORMATION">Information</option>
                  </select>
                <!-- <input type="text" name="type" placeholder="Type" 
                  class="form-control-lg form-control rounded-0" > -->
                  
                </div>
                
                
                <div  class="form-group m-0">
                          <label for="profilePhoto" class="mt-2 btn btn-success btn-block font-weight-bold ">
                          <i class="fas fa-upload"></i>&nbsp;Upload Image</label><b>
                          <input style='height: 0px;width:0px; overflow:hidden;' type="file"  name="image" class="mt-4 " 
                           id="profilePhoto">
                         
                          <a href="#"  class="mt-0 btn btn-primary deleteBtn btn-block 
                          font-weight-bold">Content of the body</a>
                       </div>

                  <div class="form-group">
                    <textarea type="text" name="body"  class="form-control-lg form-control 
                    rounded-0" placeholder="Message" rows="6" ></textarea>
                  </div>
                
                    <div class="form-group"> 
                      <input type="submit" name="upload" id="send_upload"
                      value="Send" class="p-2 lead text-white font-weight-bolder rounded btn-primary 
                   btn-block">
                    </div>
              </form>
            </div>
</div>

