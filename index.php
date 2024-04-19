<?php  
						$FullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
						//Approve=Succes
						if(strpos($FullUrl,"ChangePass=Success")){
							echo "<script type='text/javascript'>alert('Please Re Login youre Account');</script> ";
						}
						
					?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Index</title>

	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">  <!-- Google web font "Open Sans" -->
	<link rel="stylesheet" href="css/fontawesome-all.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/magnific-popup.css"/>
	<link rel="stylesheet" type="text/css" href="slick/slick.css"/>
	<link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
	<link rel="stylesheet" href="css/tooplate-style.css">

	<script>
		var renderPage = true;

	if(navigator.userAgent.indexOf('MSIE')!==-1
		|| navigator.appVersion.indexOf('Trident/') > 0){
   		/* Microsoft Internet Explorer detected in. */
   		alert("Please view this in a modern browser such as Chrome or Microsoft Edge.");
   		renderPage = false;
	}
	</script>
	<?php include("AdminLoginStyle.php"); ?>
</head>

<body>
	<!-- Loader -->
	<div id="loader-wrapper">
		<div id="loader"></div>
		<div class="loader-section section-left"></div>
		<div class="loader-section section-right"></div>
	</div>
	
	<!-- Page Content -->
	<div class="container-fluid tm-main">
		<div class="row tm-main-row">

			<!-- Sidebar -->
			<div id="tmSideBar" class="col-xl-3 col-lg-4 col-md-12 col-sm-12 sidebar">

				<button id="tmMainNavToggle" class="menu-icon">&#9776;</button>

				<div class="inner">
					<nav id="tmMainNav" class="tm-main-nav">
						<ul>
							<li>
								<a href="#intro" id="tmNavLink1" class="scrolly active" data-bg-img="constructive_bg_01.jpg" data-page="#tm-section-1">
									<i class="fas fa-home tm-nav-fa-icon"></i>
									<span>Home</span>
								</a>
							</li>
							<li>
								<a hidden href="#products" id="tmNavLink2" class="scrolly" data-bg-img="constructive_bg_01.jpg" data-page="#tm-section-2" data-page-type="carousel">
									<i class="fas fa-map tm-nav-fa-icon"></i>
									<span>-----------</span>
								</a>
							</li>							
							<li>
								<a href="#company" class="scrolly" data-bg-img="constructive_bg_01.jpg" data-page="#tm-section-3">
									<i class="fas fa-users tm-nav-fa-icon"></i>
									<span>Administrator</span>
								</a>
							</li>
							<li>
								<a href="#contact" class="scrolly" data-bg-img="constructive_bg_01.jpg" data-page="#tm-section-4">
									<i class="fas fa-comments tm-nav-fa-icon"></i>
									<span>Contact Us</span>
								</a>
							</li>

						</ul>
					</nav>
				</div>
			</div>

			<div class="col-xl-9 col-lg-8 col-md-12 col-sm-12 tm-content">

					<!-- section 1 -->
					<section id="tm-section-1" class="tm-section">
						
						<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v11.0" nonce="R3QSilgp"></script>
		
<div class="fb-page" data-href="https://www.facebook.com/infotechcollegeofartsandsciences/photos/?ref=page_internal" data-tabs="timeline" data-width="500" data-height="900" data-small-header="false" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/infotechcollegeofartsandsciences/photos/?ref=page_internal" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/infotechcollegeofartsandsciences/photos/?ref=page_internal">Infotech College Of Arts And Sciences -  Sucat Branch</a></blockquote></div>

					</section>

					<!-- section 2 -->
					<section id="tm-section-2" class="tm-section tm-section-carousel">
						<div>
							<header class="mb-4"><h2 class="tm-text-shadow">Our Products</h2></header>		            
							<div class="tm-img-container">
								<div class="tm-img-slider">
									<a href="img/gallery-img-01.jpg" class="tm-slider-img"><img src="img/gallery-img-01-tn.jpg" alt="Image" class="img-fluid"></a>
									<a href="img/gallery-img-02.jpg" class="tm-slider-img"><img src="img/gallery-img-02-tn.jpg" alt="Image" class="img-fluid"></a>
									<a href="img/gallery-img-03.jpg" class="tm-slider-img"><img src="img/gallery-img-03-tn.jpg" alt="Image" class="img-fluid"></a>
									<a href="img/gallery-img-04.jpg" class="tm-slider-img"><img src="img/gallery-img-04-tn.jpg" alt="Image" class="img-fluid"></a>
									<a href="img/gallery-img-05.jpg" class="tm-slider-img"><img src="img/gallery-img-05-tn.jpg" alt="Image" class="img-fluid"></a>
									<a href="img/gallery-img-06.jpg" class="tm-slider-img"><img src="img/gallery-img-06-tn.jpg" alt="Image" class="img-fluid"></a>
								</div>
							</div>		            		          
						</div>       		          	
					</section>

					<!-- section 3 -->
					<section id="tm-section-3" class="tm-section">						
						<!-- <div class="row mb-4">
							<header class="col-xl-12"><h2 class="tm-text-shadow">Our Company</h2></header>		
						</div> -->
						<div class="container-fluid" style="width:100%">
										<?php include("AdminLogin.php"); ?>          		
						</div>						               
					</section>

					<!-- section 4 -->
					<section id="tm-section-4" class="tm-section">
						<div class="tm-bg-transparent-black tm-contact-box-pad">
							
<center style="    font-weight: bold;">
	
	web:		http://www.infotechcollege.ph/<br><br>
Contact no: 7717-2982<br><br>
Gmail:		infotechcollagesucat2020@gmail.com<br><br>
Facebook:	https://www.facebook.com/ICASSJBEvents/about<br><br>
Address:	8347 CAP Bldg. Dr. A. Santos Ave, San Antonio, Sucat, Parañaque City<br><br>

</center>


						</div>
					</section>					
				</div>	<!-- .tm-content -->	

				
			</div>	<!-- row -->			
		</div>
		</body>
		<div id="preload-01"></div>
		<div id="preload-02"></div>
		<div id="preload-03"></div>
		<div id="preload-04"></div>

		<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="js/jquery.magnific-popup.min.js"></script>
		<script type="text/javascript" src="js/jquery.backstretch.min.js"></script>
		<script type="text/javascript" src="slick/slick.min.js"></script> <!-- Slick Carousel -->
<?php include("setupCarousel.php"); ?>
		
	
	<footer class="footer-link">
					<p class="tm-copyright-text">Copyright &copy; ICAS Sucat Parañaque Branch
                      - DIGITAL GRADING MANAGEMENT SYSTEM</p>
				</footer>
</html>