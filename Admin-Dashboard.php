<?php
	include("config.php");
	session_start();

	$studentlistTotal = mysqli_query($dbc,"SELECT * From student_list where  1 "); 
	$Female = mysqli_query($dbc,"SELECT * From student_list where  Gender = 'Female' "); 
	$Male = mysqli_query($dbc,"SELECT * From student_list where  Gender = 'Male' "); 
	$stdSubject = mysqli_query($dbc,"SELECT * From std_subject where  1 "); 

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Admin Dashboard</title>
<!--

Template 2102 Constructive

http://www.tooplate.com/view/2102-constructive

-->
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
								
					<nav hidden id="tmMainNav" class="tm-main-nav">
						<ul>
							<li>
								<a href="#intro" id="tmNavLink1" class="scrolly active" data-bg-img="constructive_bg_01.jpg" data-page="#tm-section-1">
									<span>Dashboard</span>
								</a>
							</li>
							
							
						</ul>
								
					</nav>

<center>

<h6 style='font-size: 20px;         border-color: white;' >&#129333; <?php echo $_SESSION['username']; ?></h6>
<h6 style='font-size: 20px;     border-color: cyan; '>&#9983; <?php echo $_SESSION['AdminLevel']; ?></h6>

</center>
<br>
<br>

<a class="form-control" style=" font-weight: bold; background-color: seagreen;"  href="Admin-Dashboard.php"><span>&#9776; Dashboard </span></a>
													
<a  class="form-control" style=" font-weight: bold; " href="Admin-AddStudent.php"><span>&#9776; Add Student </span></a>
												
<a  class="form-control" style=" font-weight: bold;" href="Admin-StudentRecord.php"><span>&#9776; Student Record </span></a>
													
<a  class="form-control" style=" font-weight: bold;" href="Admin-PrintRecord.php"><span>&#9776; Print Records </span></a>

<a  class="form-control" style=" font-weight: bold;" href="Admin-ChangePassword.php"><span>&#9776; Change Password </span></a>



<?php 

if ($_SESSION['AdminLevel'] == "superuser") {
	echo '<a  class="form-control" style=" font-weight: bold;" href="Admin-CreateAccount.php"><span>&#9776; Create Account </span></a>';
}else{

}

 ?>			

<a  class="form-control" style=" font-weight: bold;" href="index.php"><span>&#9776; Logout </span></a>			
			
							
				</div>
			</div>

			<div class="col-xl-9 col-lg-8 col-md-12 col-sm-12 tm-content">

					<!-- section 1 dashborar -->
					<section id="tm-section-1" class="tm-section tm-section-carousel">
						<div class="container-fluid" style="width: 100%;">
							

<div class="tm-bg-transparent-black tm-contact-box-pad">
							<div class="row mb-4">
								<div class="col-sm-12">
									<!-- <header><h2 class="tm-text-shadow">Contact Us</h2></header> -->
								</div>
							</div>
							<div class="row tm-page-4-content">
								<div class="col-md-6 col-sm-12 tm-contact-col">
									<div class="contact_message">
									<!-- 	data -->
									<center>
	<div class="form-control" style="border: 0px;">
	<span style=' font-size: 14px;  font-weight: bold;' >Student Master List</span><br>
	<span style="font-size: 50px;">💾</span><br>
	<span style=' font-size: 40px; ;  font-weight: bold;' >  <?php echo mysqli_num_rows($studentlistTotal); ?></span>
	</div><br><br>
	<div class="form-control" style="border: 0px;">
	<span style=' font-size: 15px;  font-weight: bold;' >Male Student</span><br>
	<span style="font-size: 50px;">🤵‍♂️</span><br>
	<span style=' font-size: 40px; ;  font-weight: bold;' >  <?php echo mysqli_num_rows($Male); ?></span>
	</div>
</center>	

									</div>
								</div>
								<div class="col-md-6 col-sm-12 tm-contact-col">
									<div class="tm-address-box">
										<!-- <header><h2 class="tm-text-shadow">Credentials</h2></header> -->

										<center>
	<div class="form-control" style="border: 0px;">
	<span style=' font-size: 14px;  font-weight: bold;' >Total Grades Encoded</span><br>
	<span style="font-size: 50px;">📚</span><br>
	<span style=' font-size: 40px; ;  font-weight: bold;' >  <?php echo mysqli_num_rows($stdSubject); ?></span>
	</div><br>
	<div class="form-control" style="border: 0px;">
	<span style=' font-size: 15px;  font-weight: bold;' >Female Student</span><br>
	<span style="font-size: 50px;">👩‍⚖️&#9792;</span><br>
	<span style=' font-size: 40px; ;  font-weight: bold;' >  <?php echo mysqli_num_rows($Female); ?></span>
	</div>
</center>	
									
									</div>
								</div>
							
							</div>
						</div>
</div>


						</div>
					</section> <!----------------------------------------------->

					

				</div>	<!-- .tm-content -->							
				
			</div>	<!-- row -->	

		</div>
<footer class="footer-link">
					<p class="tm-copyright-text">Copyright &copy; 2021 ICAS Sucat Parañaque City Branch. 
                    
                    -DIGITAL GRADING MANAGEMENT SYSTEM</p>
				</footer>	

		<div id="preload-01"></div>
		<div id="preload-02"></div>
		<div id="preload-03"></div>
		<div id="preload-04"></div>

		<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="js/jquery.magnific-popup.min.js"></script>
		<script type="text/javascript" src="js/jquery.backstretch.min.js"></script>
		<script type="text/javascript" src="slick/slick.min.js"></script> <!-- Slick Carousel -->

		<?php include("setupCarousel.php"); ?>
	</body>
</html>