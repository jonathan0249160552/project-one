<?php
require_once 'assets/php/admin-header.php';
// require 'links.php';
 require 'assets/php/post_config.php';
 require_once 'assets/php/conn.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css"/>
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.css"/>
   <link rel="stylesheet" href="assets/css/bootstrap.min.css">  -->
   <title>MAIN ADMIN || NOTICEBOARD</title>
</head>
<html>

    
	
<div class="container">

  <div class=" justify-content-center">
  
         <div class="card  alert-light mb-5">
          <div class="card-header lead text-center bg-primary font-weight-bold text-white">POST ON NOTICEBOARD</div>
            <div class="card-body">
            <div class="">
              <h5 class="font-weight-bold text-dark">Please choose notice type</h5>
 <div class="card-body alert-info mt-2">
   <label for="general"class="font-weight-bold p-2 m-2">General Notice</label>

   <input type="radio"  class="general btn-radio" name="rate" id="rate" required>
   <label for="specific" class="font-weight-bold p-2 m-2">Specific Notice</label>
   <input type="radio" class="specific font-weight-bold" name="rate" id="rate">
   <script>
                              var rates=document.getElementsByName("rate");
            for (i = 0; i < rates.length; i++) {
            if (rates[i].checked) {
              console.log(rates[i].value);
              rate=rates[i].value;
              document.getElementById("rate").innerHTML = rate;
              alert(rate);
              
            }
          }
                          </script>
 <form method="post" action="" id="upload_form" enctype="multipart/form-data">
              <input type="hidden" name="size" value="1000000">
              <div id="redAlert"> </div>

              
              <div class="form-group">
                  <input type="text" name="title" placeholder="Title  " 
                  class="form-control-lg form-control rounded-0" required>
                </div>
                <div class="form-group">
                <input type="text" name="posted_by" placeholder="Post by" 
                  class="form-control-lg form-control rounded-0" required>
                </div>
                <label for="level" class="font-weight-bold text-dark mt-2 pt-2" style="font-size: large;">Select the Type </label>
                <div class="form-group">
              
                <select style="width: 100%;" class="mt-1 form-control rounded-0 " name="type" id="type">
                    <option value="ANNOUNCEMENT">Announcement</option>
                    <option value="NOTICE">Notice</option>
                    <option value="EVENT">Event</option>
                    <option value="PROGRAM">Program</option>
                    <option value="INFORMATION">Information</option>
                  </select>
                  
                  <label for="level" class="font-weight-bold text-dark mt-2 pt-2" style="font-size: large;">Select Level</label>
                  
                  <select style="width: 100%;" class="mt-1 form-control rounded-0 " name="level" id="level" required>
                    <option value="100">100</option>
                    <option value="200">200</option>
                    <option value="300">300</option>
                    <option value="400">400</option>
                  </select>
                
                </div>
                <div class="searchable">
                <label for="level" class="font-weight-bold text-dark mt-2 pt-2" style="font-size: large;">Select Program</label>
    <!-- <input type="text" class="" placeholder="Search Program..." id="program" name="program" readonly onkeyup="filterFunction(this,event)"> -->
    <select name="program" id="program" class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1">
                                                        <!-- <option>--Select Restaurant--</option> -->
                                                 <?php $ssql ="select * from program_table";
													$res=mysqli_query($conn, $ssql); 
													while($row=mysqli_fetch_array($res))  
													{
                                                       echo'
                                                        <option value="'.$row['program'].'">'.$row['program'].'</option>';;
													}  
                                                 
													?> 
													 </select>
    <ul>
    <!-- <ul>
        <li>Bsc. Civil Engineering   </li>
        <li>Bsc. Biological Science  </li>
        <li>Bsc. Medical Laboratory Science  </li>
        <li>Bsc. Nursing  </li>
        <li>Bsc. Chemical Science  </li>
        <li>Bsc. Statistics  </li>
        <li>Diploma Statistic  </li>
        <li>Bsc. Fire and Disaster Management  </li>
        <li>Bsc. Natural Resources Management  </li>
        <li>Diploma Natural Resource Management  </li>
        <li>Bsc. Hospitality Managemen It</li>
        <li>Diploma Hospitality Management  </li>
        <li>Bsc. Climate Change and Sustanability  </li>
        <li>Bsc. Planning and Sustainability  </li>
        <li>Diploma Geo-Information Science  </li>
        <li>Bsc. Enterpirce Management  </li>
        <li>Bsc. Fisheries and Aquaculture Nrm. Option  </li>
        <li>Bsc. Horticulture Agriculture  </li>
        <li>Bsc. Land Reclamation Restoration Nrm  </li>
        <li>Bsc. Mathematics  </li>
        <li>Bsc Social  Forestry Nrm  </li>
        <li>Bsc. Forest Resource Management Nrm  </li>
        <li>Diploma Fire and Disaster Management  </li>
        <li>Bsc. Petroleum Engineering  </li>
        <li>Bsc. Renewable Engineering  </li>
        <li>Bsc. Computer Science  </li>
        <li>Bsc. Information Techonology  </li>
        <li>Diploma Computer Science  </li> 
        <li>Diploma Information Technology  </li>
        <li>Bsc. Acturial Science  </li>
        <li>Diploma Insurance  </li>
        <li>Professional French  </li>
        <li>Bsc. Resource Enterprice and Entrepreneurship  </li>
        <li>Diploma Enterpirce Management  </li>
        <li>Bsc. Agribusiness  </li>
        <li>Diploma Envaromental Management  </li>
        <li>Bsc. Agriculture with Option in Crop Production Hoticulure  </li>
        <li>Diploma Agriculture  </li>
        <li>Bsc. Computer Engeering  </li>
        <li>Bsc. Electrical and Electronic Engineering  </li>
        <li>Bsc. Agriculture Engineering  </li>
        <li>Bsc. Mechanical Engineering  </li>
        <li>Bsc. Envirometnal Engeering  </li> -->
    </ul>
</div>
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
            <a href="#" id="scroll" style="display: none;"><span></span></a>
        </div>  

        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/js/bootstrap.bundle.min.js"></script> -->
  <script type="text/javascript">
      $(document).ready(function(){
        $(".general").click(function () {
    $("#program").hide();
    $("#level").hide();
   
  });
  $(".specific").click(function () {
    $("#program").show();
    $("#level").show();
  });
});
  </script> 
    


<script>
     function filterFunction(that, event) {
    let container, input, filter, li, input_val;
    container = $(that).closest(".searchable");
    input_val = container.find("input").val().toUpperCase();

    if (["ArrowDown", "ArrowUp", "Enter"].indexOf(event.key) != -1) {
        keyControl(event, container)
    } else {
        li = container.find("ul li");
        li.each(function (i, obj) {
            if ($(this).text().toUpperCase().indexOf(input_val) > -1) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });

        container.find("ul li").removeClass("selected");
        setTimeout(function () {
            container.find("ul li:visible").first().addClass("selected");
        }, 100)
    }
}

function keyControl(e, container) {
    if (e.key == "ArrowDown") {

        if (container.find("ul li").hasClass("selected")) {
            if (container.find("ul li:visible").index(container.find("ul li.selected")) + 1 < container.find("ul li:visible").length) {
                container.find("ul li.selected").removeClass("selected").nextAll().not('[style*="display: none"]').first().addClass("selected");
            }

        } else {
            container.find("ul li:first-child").addClass("selected");
        }

    } else if (e.key == "ArrowUp") {

        if (container.find("ul li:visible").index(container.find("ul li.selected")) > 0) {
            container.find("ul li.selected").removeClass("selected").prevAll().not('[style*="display: none"]').first().addClass("selected");
        }
    } else if (e.key == "Enter") {
        container.find("input").val(container.find("ul li.selected").text()).blur();
        onSelect(container.find("ul li.selected").text())
    }

    container.find("ul li.selected")[0].scrollIntoView({
        behavior: "smooth",
    });
}

function onSelect(val) {
    // alert(val)
}

$(".searchable input").focus(function () {
    $(this).closest(".searchable").find("ul").show();
    $(this).closest(".searchable").find("ul li").show();
});
$(".searchable input").blur(function () {
    let that = this;
    setTimeout(function () {
        $(that).closest(".searchable").find("ul").hide();
    }, 300);
});

$(document).on('click', '.searchable ul li', function () {
    $(this).closest(".searchable").find("input").val($(this).text()).blur();
    onSelect($(this).text())
});

$(".searchable ul li").hover(function () {
    $(this).closest(".searchable").find("ul li.selected").removeClass("selected");
    $(this).addClass("selected");
});
   </script>
      <style>
      div.searchable {
    width: 100%;
    ;
    /* margin: 0 15px; */
}

.searchable input {
    width: 100%;
    height: 50px;
    font-size: 18px;
    padding: 10px;
    -webkit-box-sizing: border-box; /* Safari/Chrome, other WebKit */
    -moz-box-sizing: border-box; /* Firefox, other Gecko */
    box-sizing: border-box; /* Opera/IE 8+ */
    display: block;
    font-weight: 400;
    line-height: 1.6;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    background: url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 4 5'%3E%3Cpath fill='%23343a40' d='M2 0L0 2h4zm0 5L0 3h4z'/%3E%3C/svg%3E") no-repeat right .75rem center/8px 10px;
}

.searchable ul {
    display: none;
    list-style-type: none;
    background-color: #fff;
    border-radius: 0 0 5px 5px;
    border: 1px solid #add8e6;
    border-top: none;
    max-height: 180px;
    margin: 0;
    overflow-y: scroll;
    overflow-x: hidden;
    padding: 0;
}

.searchable ul li {
    padding: 7px 9px;
    border-bottom: 1px solid #e1e1e1;
    cursor: pointer;
    color: #6e6e6e;
}

.searchable ul li.selected {
    background-color: #e8e8e8;
    color: #333;
}
    </style>

</body>
</html>