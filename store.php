<?php
// session_start();

require 'assets/php/header_customer.php';
require_once 'assets/php/conn.php';

?>

<!Doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Crystal</title>
  <!-- Template CSS -->
  <link rel="stylesheet" href="store/assets/css/style-liberty.css">
  <!-- Template CSS -->
  <link href="http://fonts.googleapis.com/css?family=Oswald:300,400,500,600&amp;display=swap" rel="stylesheet">
  <link href="http://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,900&amp;display=swap" rel="stylesheet">
  <!-- Template CSS -->

<link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>


 <script src="assets/js/jquery.min.js"></script>

  <script type="text/javascript" src="assets/js/all.min.js"></script>


<meta name="robots" content="noindex">
<body>
<style>
* {
  box-sizing: border-box;
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
}


#w3lDemoBar.w3l-demo-bar {
  top: 0;
  right: 0;
  bottom: 0;
  z-index: 9999;
  padding: 40px 5px;
  padding-top:70px;
  margin-bottom: 70px;
  background: #0D1326;
  border-top-left-radius: 9px;
  border-bottom-left-radius: 9px;
}

#w3lDemoBar.w3l-demo-bar a {
  display: block;
  color: #e6ebff;
  text-decoration: none;
  line-height: 24px;
  opacity: .6;
  margin-bottom: 20px;
  text-align: center;
}

#w3lDemoBar.w3l-demo-bar span.w3l-icon {
  display: block;
}

#w3lDemoBar.w3l-demo-bar a:hover {
  opacity: 1;
}

#w3lDemoBar.w3l-demo-bar .w3l-icon svg {
  color: #e6ebff;
}
#w3lDemoBar.w3l-demo-bar .responsive-icons {
  margin-top: 30px;
  border-top: 1px solid #41414d;
  padding-top: 40px;
}
#w3lDemoBar.w3l-demo-bar .demo-btns {
  border-top: 1px solid #41414d;
  padding-top: 30px;
}
#w3lDemoBar.w3l-demo-bar .responsive-icons a span.fa {
  font-size: 26px;
}
#w3lDemoBar.w3l-demo-bar .no-margin-bottom{
  margin-bottom:0;
}
.toggle-right-sidebar span {
  background: #0D1326;
  width: 50px;
  height: 50px;
  line-height: 50px;
  text-align: center;
  color: #e6ebff;
  border-radius: 50px;
  font-size: 26px;
  cursor: pointer;
  opacity: .5;
}
.pull-right {
  float: right;
  position: fixed;
  right: 0px;
  top: 70px;
  width: 90px;
  z-index: 99999;
  text-align: center;
}
/* ============================================================
RIGHT SIDEBAR SECTION
============================================================ */

#right-sidebar {
  width: 90px;
  position: fixed;
  height: 100%;
  z-index: 1000;
  right: 0px;
  top: 0;
  margin-top: 60px;
  -webkit-transition: all .5s ease-in-out;
  -moz-transition: all .5s ease-in-out;
  -o-transition: all .5s ease-in-out;
  transition: all .5s ease-in-out;
  overflow-y: auto;
}


/* ============================================================
RIGHT SIDEBAR TOGGLE SECTION
============================================================ */

.hide-right-bar-notifications {
  margin-right: -300px !important;
  -webkit-transition: all .3s ease-in-out;
  -moz-transition: all .3s ease-in-out;
  -o-transition: all .3s ease-in-out;
  transition: all .3s ease-in-out;
}



@media (max-width: 992px) {
  #w3lDemoBar.w3l-demo-bar a.desktop-mode{
      display: none;

  }
}
@media (max-width: 767px) {
  #w3lDemoBar.w3l-demo-bar a.tablet-mode{
      display: none;

  }
}
@media (max-width: 568px) {
  #w3lDemoBar.w3l-demo-bar a.mobile-mode{
      display: none;
  }
  #w3lDemoBar.w3l-demo-bar .responsive-icons {
      margin-top: 0px;
      border-top: none;
      padding-top: 0px;
  }
  #right-sidebar,.pull-right {
      width: 90px;
  }
  #w3lDemoBar.w3l-demo-bar .no-margin-bottom-mobile{
      margin-bottom: 0;
  }
}
</style>

<div class="pull-right toggle-right-sidebar">
<!-- <span class="fa title-open-right-sidebar tooltipstered fa-angle-double-right"></span> -->
</div>

<div id="right-sidebar" class="right-sidebar-notifcations nav-collapse">
<div class="bs-example bs-example-tabs right-sidebar-tab-notification" data-example-id="togglable-tabs">


    </div>
    <div class="right-sidebar-panel-content animated fadeInRight" tabindex="5003"
        style="overflow: hidden; outline: none;">
    </div>
</div>
</div>
</div>

<!--w3l-banner-slider-main-->
<section class="w3l-banner-slider-main">
	<div class="top-header-content">
		<header class="tophny-header">
			
			<div class="container-fluid">
				<div class="top-right-strip row">
			
			
			
					<a class="float-left text-white font-weight-bold" style="font-size: x-large;" > <span class="lohny" style="font-size: xx-large;">C</span>rystal</a>
						<!-- <li class="transmitvcart galssescart2 cart cart box_1"> -->

					
								
						
					
					<!--//right-->
				
				</div>
			</div>
			<!--/nav-->
			<nav class="">
			</nav>
			<!--//nav-->
		</header>
		
		<div class="bannerhny-content">

			<!--/banner-slider-->
			<div class="content-baner-inf">
				<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="6"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="7"></li>
					</ol>
					<div class="carousel-inner">
						<div class="carousel-item active">
							<div class="container">
								<div class="carousel-caption">
									<h3>Electrician
										<br>50% Off</h3>
									<a href="store/closet.html" class="shop-button btn">
										Order Now
									</a>

								</div>
							</div>
						</div>
						<div class="carousel-item item2">
							<div class="container">
								<div class="carousel-caption">
									<h3>Carpentry Service
										<br>60% Off</h3>
									<a href="store/closet.html" class="shop-button btn">
										Order Now
									</a>

								</div>
							</div>
						</div>
						<div class="carousel-item item3">
							<div class="container">
								<div class="carousel-caption">
									<h3>Plumbing
										<br>50% Off</h3>
									<a href="store/food.html" class="shop-button btn">
										Order Now
									</a>

								</div>
							</div>
						</div>
						<div class="carousel-item item4">
							<div class="container">
								<div class="carousel-caption">
									<h3>Tiling
										<br>60% Off</h3>
									<a href="store/closet.html" class="shop-button btn">
										Oder Now
									</a>
								</div>
							</div>
						</div>

						
					</div>
					<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>
			<!--//banner-slider-->
			<!--//banner-slider-->
			<div class="right-banner">
				<div class="right-1">
					<h4>
						Mechanical Services
						<br>25% Off</h4>
				</div>
			</div>

		</div>

</section>

<section class="w3l-grids-hny-2">
	
								<!-- <button class="top_transmitv_cart border mt-3  ml-3 btn text-dark float-right" type="submit" name="submit" value="">
									My Cart
									<span class="fa fa-shopping-cart"></span>
								</button> -->
	<!-- /content-6-section -->
	<div class="grids-hny-2-mian py-5">
		<div class="container py-lg-5">
				<div style="margin: 8px auto; display: block; text-align:center;">

<!---728x90--->

 
</div>
			<h3 class="hny-title mb-0 text-center">Select <span>Service</span></h3>
			<p class="mb-4 text-center">We have</p>
			<div style="margin: 8px auto; display: block; text-align:center;">

<!---728x90--->
 
</div>
			<div class="welcome-grids row mt-5">
				<div class="col-lg-2 col-md-4 col-6  welcome-image">
						<div class="boxhny13">
								<a href="campus_services.php">
								<img src="store/assets/img/54.jpg" class="img-fluid h-100" alt="" />
								<div class="boxhny-content">
								<h3 class="title">All Services</h3>
								</div>
							</a>
						</div>
						<h4><a href="store/campus_services.php">Services</a></h4>

				</div>
				
				<div class="col-lg-2 col-md-4 col-6 welcome-image">
						<div class="boxhny13">
								<a href="campus_services.php">
								<img src="store/assets/img/9.jpg" class="img-fluid" alt="" />
								<div class="boxhny-content">
								<h3 class="title">Painting Service</h3>
								</div>
							</a>
						</div>
						<h4><a href="campus_services.php">
						Painting</a></h4>

					
				</div>
				<div class="col-lg-2 col-md-4 col-6 welcome-image">
						<div class="boxhny13">
								<a href="#URL">
								<img src="store/assets/img/10.jpg" class="img-fluid" alt="" />
								<div class="boxhny-content">
								<h3 class="title">Mason</h3>
								</div>
							</a>
						</div>
						<h4><a href="campus_services.php">Mason Service</a></h4>

				
				</div>
				<div class="col-lg-2 col-md-4 col-6 welcome-image">
						<div class="boxhny13">
								<a href="campus_services.php">
								<img src="store/assets/images/12.jpg" class="img-fluid" alt="" />
								<div class="boxhny-content">
								<h3 class="title">carpentry Service</h3>
								</div>
							</a>
						</div>
						<h4><a href="#">Carpentry</a></h4>

				</div>
				<div class="col-lg-2 col-md-4 col-6 welcome-image">
						<div class="boxhny13">
								<a href="campus_services.php">
								<img src="store/assets/img/19.jpg" class="img-fluid" alt="" />
								<div class="boxhny-content">
									<h3 class="title">Tailer</h3>
								</div>
							</a>
						</div>
						<h4><a href="campus_services.php">
						Tailer Service</a></h4>

					
				</div>
				<div class="col-lg-2 col-md-4 col-6 welcome-image">
						<div class="boxhny13">
								<a href="campus_services.php">
								<img src="store/assets/img/59.jpg" class="img-fluid" alt="" />
								<div class="boxhny-content">
									<h3 class="title">Mechanic</h3>
								</div>
							</a>
						</div>
						<h4><a href="campus_services.php">
								Mechanic</a></h4>

					
				</div>

				


			</div>

		</div>
	</div>
</section>
<!-- //content-6-section -->

<section class="w3l-content-w-photo-6">
	<!-- /specification-6-->
	  <div class="content-photo-6-mian py-5">
			 <div class="container py-lg-5">
					<div class="align-photo-6-inf-cols row">
						
						<div class="photo-6-inf-right col-lg-6">
								<h3 class="hny-title text-center text-left">All Unisex shoes <span>30% Discount</span></h3>
								<p>Visit our page to see amazing creations from our designers.</p>
								<a href="#store/closet.html" class="read-more  btn btn-block">
										Order Now
								</a>
						</div>
						<div class="photo-6-inf-left col-lg-6">
								<img  style="height: 470px;width: 100%;" src="store/assets/img/7.jpg" class="img-fluid border" alt="">
						</div>
					</div>
				 </div>
			 </div>
	 </section>
   <!-- //specification-6-->
     
<section class="w3l-video-6">
	<section class="w3l-video-6">
		<!-- /video-6-->
		<div class="video-66-info">
			<div class="container-fluid">
				<div class="video-grids-info row">
					<div class="video-gd-right col-lg-8">
						<div class="video-inner text-center">
									<!--popup-->
										<a class="play-button btn  popup-with-zoom-anim" href="#small-dialog">
												<span class="fa m-3 fa-play" aria-hidden="true"></span>
										</a>
										<div id="small-dialog" class="mfp-hide">
											<div class="search-top notify-popup">
													<iframe src="#" frameborder="0"
													allow="autoplay; fullscreen" allowfullscreen></iframe>
											</div>
										</div>
										<!--//popup-->
							  </div>
					  </div>
					<div class="video-gd-left col-lg-4 p-lg-5 p-4">
						<div class="p-xl-4 p-0 video-wrap">
							<h4 class="hny-title text-left">Get All Men and woman shoe Here <span>30% Discount</span>
							</h4>
							<p>Visit our page to see amazing creations from our designers.</p>
							<a href="store/closet.html" class="read-more btn btn-block">
								Order Now
							</a>
						</div>
					</div>
	
				</div>
			</div>
		</div>
	</section>
	<!-- //video-6-->
	
	<!-- /products-->
	<div class="ecom-contenthny py-5">
		<div class="container py-lg-5">
		<div style="margin: 8px auto; display: block; text-align:center;">

<!---728x90--->
 
</div>
			<h3 class="hny-title mb-0 text-center">Shop With <span>Us</span></h3>
			<p class="text-center">We Got all Your Favorites</p>
			
			<section class="w3l-post-grids-6">
				<!-- /post-grids-->
				<div class="post-6-mian py-5">
					<div class="container py-lg-5">
							<!-- <h3 class="hny-title text-center mb-0 ">Latest Blog <span>Posts</span></h3>
							<p class="mb-5 text-center">Handpicked Favourites just for you</p> -->
						<div class="post-hny-grids row mt-5">
							<div class="col-lg-3 col-md-6 grids5-info column-img" id="zoomIn">
								<a href="#">
									<figure>
										<img style="height: 250px;"  class="img-fluid" src="store/assets/img/77.jpg" alt="blog-image">
									</figure>
								</a>
			
								<div class="blog-thumbhny-caption">
									<ul class="blog-info-list">
										<li><a style="color: #ff7315;" class="font-weight-bold" href="#">Test test</a></li>
										<li class="date-post font-weight-bold">
											₵150</li>
									</ul>
									
									<h6>Testing Test <i class="float-right ml-2 fa fa-info-circle fa-lg"></i></h6>
								</div>
							</div>
							<div class="col-lg-3 col-md-6 grids5-info column-img" id="zoomIn">
								<a href="#">
									<figure>
										<img style="height: 250px;"  class="img-fluid" src="store/assets/img/5.jpg" alt="blog-image">
									</figure>
								</a>
								<div class="blog-thumbhny-caption">
									<ul class="blog-info-list">
										<li><a href="#">Order Now</a></li>
										<li class="date-post">
											<del>₵20</del>   ₵15</li>
									</ul>
									<h4><a href="#"> Mason Test</a></h4>
								</div>
							</div>
							<div class="col-lg-3 col-md-6 grids5-info column-img" id="zoomIn">
								<figure>
									<img style="height: 250px;"  class="img-fluid" src="store/assets/img/11.jpg" alt="blog-image">
								</figure>
								<div class="blog-thumbhny-caption">
									<ul class="blog-info-list">
										<li><a href="#admin">Order Now</a></li>
										<li class="date-post">
											<del>₵25</del>   ₵20</li>	</li>
									</ul>
									<h4><a href="#">Mason Service Test</a></h4>
								</div>
							</div>
			
							<div class="col-lg-3 col-md-6 grids5-info column-img" id="zoomIn">
								<figure>
									<img style="height: 250px;" class="img-fluid" src="store/assets/img/55.jpg" alt="blog-image">
								</figure>
								<div class="blog-thumbhny-caption">
									<ul class="blog-info-list">
										<li><a href="#">	Contact Me for Orders & Services</a></li>
										<li class="date-post">
										</li>
									</ul>
									<h4><a href="#">Chrisel Makeups & Wigs</a></h4>
								</div>
							</div>

							<div class="col-lg-3 mt-3  col-md-6 grids5-info column-img" id="zoomIn">
								<figure>
									<img style="height: 250px;" class="img-fluid" src="store/assets/img/12.jpg" alt="blog-image">
								</figure>
								<div class="blog-thumbhny-caption">
									<ul class="blog-info-list">
										<li><a href="#admin">Contact Me for Services</a></li>
										<li class="date-post">
										</li>
									</ul>
									<h4><a href="#">Jerry's Carpentry</a></h4>
								</div>
							</div>

							<div class="col-lg-3 mt-3  col-md-6 grids5-info column-img" id="zoomIn">
								<figure>
									<img style="height: 250px;" class="img-fluid" src="store/assets/img/17.jpg" alt="blog-image">
								</figure>
								<div class="blog-thumbhny-caption">
									<ul class="blog-info-list">
										<li><a href="#">Order Now</a></li>
										<li class="date-post">
											</li>
									</ul>
									<h4><a href="#">Monny's Closet</a></h4>
								</div>
							</div>

							<div class="col-lg-3 mt-3  col-md-6 grids5-info column-img" id="zoomIn">
								<figure>
									<img style="height: 250px;" class="img-fluid" src="store/assets/img/15.jpg" alt="blog-image">
								</figure>
								<div class="blog-thumbhny-caption">
									<ul class="blog-info-list">
										<li><a href="#">Contact Me For Services</a></li>
										<li class="date-post">
											</li>
									</ul>
									<h4><a href="#">Divine Interior Designer</a></h4>
								</div>
							</div>

							<div class="col-lg-3 mt-3  col-md-6 grids5-info column-img" id="zoomIn">
								<figure>
									<img style="height: 250px;" class="img-fluid" src="store/assets/img/16.jpg" alt="blog-image">
								</figure>
								<div class="blog-thumbhny-caption">
									<ul class="blog-info-list">
										<li><a href="#">Order Now</a></li>
										<li class="date-post">
											<del>₵7</del> ₵5</li>
									</ul>
									<h4><a href="#">Fey the Painter</a></h4>
								</div>
							</div>

							<div class="col-lg-3 mt-3  col-md-6 grids5-info column-img" id="zoomIn">
								<figure>
									<img style="height: 250px;" class="img-fluid" src="store/assets/img/18.jpg" alt="blog-image">
								</figure>
								<div class="blog-thumbhny-caption">
									<ul class="blog-info-list">
										<li><a href="#"> Order Now</a></li>
										<li class="date-post">
											</li>
									</ul>
									<h4><a href="#">D-Bee Baber</a></h4>
								</div>
							</div>

							<div class="col-lg-3 mt-3  col-md-6 grids5-info column-img" id="zoomIn">
								<figure>
									<img style="height: 250px;" class="img-fluid" src="store/assets/img/14.jpg" alt="blog-image">
								</figure>
								<div class="blog-thumbhny-caption">
									<ul class="blog-info-list">
										<li><a href="#">By admin</a></li>
										<li class="date-post">
											Aug 10, 2020</li>
									</ul>
									<h4><a href="store/accessories.html">Ghana's Dress Maker</a></h4>
								</div>
							</div>

							<div class="col-lg-3 mt-3  col-md-6 grids5-info column-img" id="zoomIn">
								<figure>
									<img style="height: 250px;" class="img-fluid" src="store/assets/img/15.jpg" alt="blog-image">
								</figure>
								<div class="blog-thumbhny-caption">
									<ul class="blog-info-list">
										<li><a href="#">Order Now</a></li>
										<li class="date-post">
										</li>
									</ul>
									<h4><a href="#">Design In</a></h4>
								</div>
							</div>

							<div class="col-lg-3 mt-3  col-md-6 grids5-info column-img" id="zoomIn">
								<figure>
									<img style="height: 250px;" class="img-fluid" src="store/assets/img/20.jpg" alt="blog-image">
								</figure>
								<div class="blog-thumbhny-caption">
									<ul class="blog-info-list">
										<li><a href="#">Contact for Me Orders</a></li>
										<li class="date-post">
											</li>
									</ul>
									<h4><a href="#">Cosmos Tiling</a></h4>
								</div>
							</div>

							<div class="col-lg-3 mt-3  col-md-6 grids5-info column-img" id="zoomIn">
								<figure>
									<img style="height: 250px;" class="img-fluid" src="store/assets/img/21.jpg" alt="blog-image">
								</figure>
								<div class="blog-thumbhny-caption">
									<ul class="blog-info-list">
										<li><a href="#">Contact for Orders ₵ Services</a></li>
										<li class="date-post">
											</li>
									</ul>
									<h4><a href="#">Dress Me Up</a></h4>
								</div>
							</div>

							<div class="col-lg-3 mt-3  col-md-6 grids5-info column-img" id="zoomIn">
								<figure>
									<img style="height: 250px;" class="img-fluid" src="store/assets/img/22.jpg" alt="blog-image">
								</figure>
								<div class="blog-thumbhny-caption">
									<ul class="blog-info-list">
										<li><a href="#">Contact Me For Orders & Services</a></li>
										<li class="date-post">
											</li>
									</ul>
									<h4><a href="#">Mark Shoe Consult</a></h4>
								</div>
							</div>

							<div class="col-lg-3 mt-3  col-md-6 grids5-info column-img" id="zoomIn">
								<figure>
									<img style="height: 250px;" class="img-fluid" src="store/assets/img/23.jpg" alt="blog-image">
								</figure>
								<div class="blog-thumbhny-caption">
									<ul class="blog-info-list">
										<li><a href="#">Contact Me For Orders & Services</a></li>
										<li class="date-post">
											</li>
									</ul>
									<h4><a href="#">Nany's Plumbing</a></h4>
								</div>
							</div>

							<div class="col-lg-3 mt-3  col-md-6 grids5-info column-img" id="zoomIn">
								<figure>
									<img style="height: 250px;" class="img-fluid" src="store/assets/img/24.jpg" alt="blog-image">
								</figure>
								<div class="blog-thumbhny-caption">
									<ul class="blog-info-list">
										<li><a href="#">Contact Me For Orders</a></li>
										<li class="date-post">
											</li>
									</ul>
									<h4><a href="#">Mason Test Two</a></h4>
								</div>
							</div>

							<div class="col-lg-3 mt-3  col-md-6 grids5-info column-img" id="zoomIn">
								<figure>
									<img style="height: 250px;" class="img-fluid" src="store/assets/img/25.jpg" alt="blog-image">
								</figure>
								<div class="blog-thumbhny-caption">
									<ul class="blog-info-list">
										<li><a href="#">Order Now</a></li>
										<li class="date-post">
											</li>
									</ul>
									<h4><a href="#">Test Test</a></h4>
								</div>
							</div>
							
							<div class="col-lg-3 mt-3  col-md-6 grids5-info column-img" id="zoomIn">
								<figure>
									<img style="height: 250px;" class="img-fluid" src="store/assets/img/16.jpg" alt="blog-image">
								</figure>
								<div class="blog-thumbhny-caption">
									<ul class="blog-info-list">
										<li><a href="#">Order Now</a></li>
										<li class="date-post">
											</li>
									</ul>
									<h4><a href="#">Testing Test</a></h4>
								</div>
							</div>

							
							<div class="col-lg-3 mt-3  col-md-6 grids5-info column-img" id="zoomIn">
								<figure>
									<img style="height: 250px;" class="img-fluid" src="store/assets/img/27.jpg" alt="blog-image">
								</figure>
								<div class="blog-thumbhny-caption">
									<ul class="blog-info-list">
										<li><a href="#">Order Now</a></li>
										<li class="date-post">
											</li>
									</ul>
									<h4><a href="#">Testing Me</a></h4>
								</div>
							</div>
			

							<div class="col-lg-3 mt-3  col-md-6 grids5-info column-img" id="zoomIn">
								<figure>
									<img style="height: 250px;" class="img-fluid" src="store/assets/img/28.jpg" alt="blog-image">
								</figure>
								<div class="blog-thumbhny-caption">
									<ul class="blog-info-list">
										<li><a href="#">Order Now</a></li>
										<li class="date-post">
											</li>
									</ul>
									<h4><a href="#">Test three</a></h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			
			
			
		</div>

		</div>
	</div>
	<div class="customers-sec-6-cintent py-5">
		<!-- /customers-->
			</div>

</section>
<!-- //products-->
<section class="w3l-content-5">
	<!-- /content-6-section -->
	<div class="content-5-main">
		<div class="container">
			<div class="content-info-in row">
				<div class="content-gd col-md-6 offset-lg-3 text-center">
					<h3 class="hny-title two">
						Tons of Products & Options to
						<span>change</span></h3>
					<p>Ea consequuntur illum facere aperiam sequi optio consectetur adipisicing elitFuga, suscipit totam
						animi consequatur saepe blanditiis.Lorem ipsum dolor sit amet,Ea consequuntur illum facere
						aperiam sequi optio consectetur adipisicing elit..</p>
					<a href="#" class="read-more-btn2 btn">
						Order Now
					</a>

				</div>

			</div>

		</div>
	</div>
</section>
<!-- //content-6-section -->
<section class="w3l-post-grids-6">
	<!-- /post-grids-->
	<div class="post-6-mian py-5">
		<div class="container py-lg-5">
				<h3 class="hny-title text-center mb-0 ">Latest Blog <span>Posts</span></h3>
				<p class="mb-5 text-center">Handpicked Favourites just for you</p>
			<div class="post-hny-grids row mt-5">
				<div class="col-lg-3 col-md-6 grids5-info column-img mb-4" id="zoomIn">
					<a href="#">
						<figure>
							<img style="height: 250px;"  class="img-fluid" src="store/assets/img/31.jpg" alt="blog-image">
						</figure>
					</a>

					<div class="blog-thumbhny-caption">
						<ul class="blog-info-list">
							<li><a href="#">By admin</a></li>
							<li class="date-post">
								Aug 10, 2020</li>
						</ul>
						<h4><a href="#">Still Testing</a></h4>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 grids5-info column-img mb-4" id="zoomIn">
					<a href="#">
						<figure>
							<img style="height: 250px;"  class="img-fluid" src="store/assets/img/34.jpg" alt="blog-image">
						</figure>
					</a>
					<div class="blog-thumbhny-caption">
						<ul class="blog-info-list">
							<li><a href="#">By admin</a></li>
							<li class="date-post">
								Order Now</li>
						</ul>
						<h4><a href="#">JC's Closet</a></h4>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 grids5-info column-img mb-4" id="zoomIn">
					<figure>
						<img style="height: 250px;"  class="img-fluid" src="store/assets/img/35.jpg" alt="blog-image">
					</figure>
					<div class="blog-thumbhny-caption">
						<ul class="blog-info-list">
							<li><a href="#">By admin</a></li>
							<li class="date-post">
								Order Now</li>
						</ul>
						<h4><a href="#">  Collections</a></h4>
					</div>
				</div>

				<div class="col-lg-3 col-md-6 grids5-info column-img" id="zoomIn">
					<figure>
						<img style="height: 250px;" class="img-fluid" src="store/assets/img/36.jpg" alt="blog-image">
					</figure>
					<div class="blog-thumbhny-caption">
						<ul class="blog-info-list">
							<li>Lorem, ipsum dolor sit amet</li>
							<li class="date-post">
								<a href="">Order Now</a></li>
						</ul>
						<h4><a href="#">Deco  Collections <span class="ml-4">20$</span></a> </h4>
					</div>
				</div>

			</div>
		</div>
	</div>
</section>
<!-- //post-grids-->
<section class="w3l-customers-sec-6">
	<div  class="customers-sec-6-cintent py-5">
		<!-- /customers-->
		<div class="container py-lg-5">
				<h3 class="hny-title text-center mb-0 ">Customers <span>Love</span></h3>
				<p class="mb-5 text-center">What People Say</p>
			<div class="row customerhny my-lg-5 my-4">
				<div class="col-md-12">
					<div id="customerhnyCarousel" class="carousel slide" data-ride="carousel">

						<ol class="carousel-indicators">
							<li data-target="#customerhnyCarousel" data-slide-to="0" class="active"></li>
							<li data-target="#customerhnyCarousel" data-slide-to="1"></li>
						</ol>
						<!-- Carousel items -->
						<div  class="carousel-inner">

							<div style="background-color: #f4f4f4;" class="carousel-item active">
								<div class="row">
									<div class="col-md-3 mb-4 bg-light  border">
										<div class="customer-info text-center">
											<div class="feedback-hny">
												<span class="fa fa-quote-left"></span>
												<p class="feedback-para">Lorem, ipsum dolor sit amet consectetur
													adipisicing elit. Labore rem, dicta assumenda mollitia molestias
													quas nihil quasis.</p>
											</div>
											<div class="feedback-review mt-4">
												<img src="store/assets/images/profile.png" class="img-fluid" alt="">
												<h5>Smith Roy</h5>

											</div>
										</div>
									</div>
									
								
								
								</div>
								<!--.row-->
							</div>
							<!--.item-->


						</div>
						<!--.carousel-inner-->
					</div>
					<!--.Carousel-->

				</div>
			</div>
		</div>
	</div>
</section>
<!-- //customers-->
<section class="w3l-subscription-6">
	
		</div>
</section>
<!-- //customers-6-->


  <section class="w3l-footer-22">
      <!-- footer-22 -->
      <div class="footer-hny py-5">
          <div class="container py-lg-5">
              <div class="text-txt row">
                  <div class="left-side col-lg-4">
                      <h3><a class="logo-footer" href="#">
                         <span class="lohny">C</span>rystal</a></h3>
                      <!-- if logo is image enable this   
                                    <a class="navbar-brand" href="#index.html">
                                        <img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
                                    </a> -->
                      <p>Lorem ipsum dolor sit amet,Ea consequuntur illum facere aperiam sequi optio consectetur.Vivamus
                          a ligula quam. Ut blandit eu leo non suscipit. </p>
                      <ul class="social-footerhny mt-lg-5 mt-4">

                          <li><a class="facebook" href="#"><span class="fa fa-facebook" aria-hidden="true"></span></a>
                          </li>
                          <li><a class="twitter" href="#"><span class="fa fa-twitter" aria-hidden="true"></span></a>
                          </li>
                          <li><a class="google" href="#"><span class="fa fa-google-plus" aria-hidden="true"></span></a>
                          </li>
                          <li><a class="instagram" href="#"><span class="fa fa-instagram" aria-hidden="true"></span></a>
                          </li>
                      </ul>
                  </div>

                  <div class="right-side col-lg-8 pl-lg-5">
                  
                      <div class="sub-columns">
                          <div class="sub-one-left">
                              <h6>Useful Links</h6>
                              <div class="footer-hny-ul">
                                  <ul>
                                      <li><a href="../home.php">Home</a></li>
                                      <li><a href="#">About</a></li>
                                      <li><a href="#">Blog</a></li>
                                      <li><a href="#">Contact</a></li>
                                  </ul>
                                  <ul>
                                      <li><a href="#">Careers</a></li>
                                      <li><a href="#">Privacy Policy</a></li>
                                      <li><a href="#">Terms and Conditions</a></li>
                                      <li><a href="#">Support</a></li>
                                  </ul>
                              </div>

                          </div>
                          <div class="sub-two-right">
                              <h6 class="text-center">Our Store </h6>
                              <p class="mb-5  text-*-center">Our Store is Virtually Located on Your Phone. We are with you Every Where You go</p>

                              <!-- <h6>We accept:</h6> -->
                              <!-- <ul>
                                  <li><a class="pay-method" href="#"><span class="fa fa-cc-visa"
                                              aria-hidden="true"></span></a>
                                  </li>
                                  <li><a class="pay-method" href="#"><span class="fa fa-cc-mastercard"
                                              aria-hidden="true"></span></a>
                                  </li>
                                  <li><a class="pay-method" href="#"><span class="fa fa-cc-paypal"
                                              aria-hidden="true"></span></a>
                                  </li>
                                  <li><a class="pay-method" href="#"><span class="fa fa-cc-amex"
                                              aria-hidden="true"></span></a>
                                  </li>
                              </ul> -->
                          </div>
                      </div>
                  </div>
              </div>
              <div class="below-section row">
                  <div class="columns col-lg-6">
                      <ul class="jst-link">
                          <li><a href="#">Privacy Policy </a> </li>
                          <li><a href="#">Term of Service</a></li>
                          <li><a href="#">Customer Care</a> </li>
                      </ul>
                  </div>
                  <div class="columns col-lg-6 text-lg-right">
                    <p><a href="" target="_blank">
                              </a>
                      </p>
                  </div>
                  <button onclick="topFunction()" id="movetop" title="Go to top">
                      <span class="fa fa-angle-double-up"></span>
                  </button>
              </div>
          </div>
      </div>

	  
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){

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
	  
      $("#c_login").click(function () {
		$(".customer_account_login_box").show();
		$(".create_customer_account_box").hide();
		$("#c_login").hide();
  });

  $("#c_create").click(function () {
  
    $(".create_customer_account_box").show();

	$(".customer_account_login_box").hide();
	// $(".user_btn").hide();
  });



  $(".close_all").click(function () {
    $(".form_box").hide();
	$("#user_btn").show();
  });
  $(".open_form_box").click(function () {
	$(".form_box").show();

	$("#user_btn").hide();
  });

 


});



</script>



<script>
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
      </script>
      <!-- /move top -->
  </section>


  

<div id = "v-w3layouts"></div><script>(function(v,d,o,ai){ai=d.createElement('script');ai.defer=true;ai.async=true;ai.src=v.location.protocol+o;d.head.appendChild(ai);})(window, document, '../../../../../../../a.vdo.ai/core/v-w3layouts/vdo.ai.js');</script>
	</body>

  
</html>

<script src="assets/js/jquery-3.3.1.min.js"></script>
<script src="assets/js/jquery-2.1.4.min.js"></script>
<!--/login-->
<script>
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
  </script>
<!--//login-->
<script>
// optional
		$('#customerhnyCarousel').carousel({
				interval: 5000
    });
  </script>
 <!-- cart-js -->
 <script src="assets/js/minicart.js"></script>
 <script>
     transmitv.render();

     transmitv.cart.on('transmitv_checkout', function (evt) {
         var items, len, i;

         if (this.subtotal() > 0) {
             items = this.items();

             for (i = 0, len = items.length; i < len; i++) {}
         }
     });
 </script>
 
<!--//search-bar-->
<!-- disable body scroll which navbar is in active -->

<!-- <script>
  $(function () {
    $('.navbar-toggler').click(function () {
      $('body').toggleClass('noscroll');
    })
  });
</script> -->
<!-- disable body scroll which navbar is in active -->
<script src="assets/js/bootstrap.min.js"></script>

