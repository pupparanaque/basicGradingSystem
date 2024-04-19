<?php
	include("config.php");
	session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Admin Add Student</title>
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
<a class="form-control" style=" font-weight: bold;"  href="Admin-Dashboard.php"><span>&#9776; Dashboard </span></a>
													
<a  class="form-control" style=" font-weight: bold; background-color: seagreen;" href="Admin-AddStudent.php"><span>&#9776; Add Student </span></a>
												
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
		<div hidden>					
<a href="Admin-AddStudent.php"> <button type="button"  class="form-control" style="background-color: #41a241;font-size: larger;font-weight: bold;font-style: italic;" >Add</button></a>
<a href="Admin-EditStudent.php"><button type="button"  >Edit</button></a>
<a href="Admin-DeleteStudent.php"><button type="button" >Delete</button></a>

</div>
<div class="tm-bg-transparent-black tm-contact-box-pad">
							<div class="row mb-4">
								<div class="col-sm-12">
									<!-- <header><h2 class="tm-text-shadow">Contact Us</h2></header> -->
								</div>
							</div>
							<div class="row tm-page-4-content">
								<div class="col-md-6 col-sm-12 tm-contact-col">
									<div class="contact_message">
										<form action="Admin-AddStudentFN.php" method="POST" enctype="multipart/form-data" class="contact-form">
											<div class="form-group">
												<input type="text" id="Fname" name="txtFname" class="form-control" placeholder="First Name" required>
											</div>
											<div class="form-group">
												<input type="text" id="Lname" name="txtLname" class="form-control" placeholder="Last Name" required>
											</div>
											<div class="form-group">
												<input type="text" id="Mname" name="txtMname" class="form-control" placeholder="Middle Name" required>
											</div>
											<div class="form-group">
												Gender:
												<select  name="txtGender" id="Gender" class="form-control" style="padding-top: 0px;padding-right: 0px;padding-bottom: 0px;padding-left: 0px;" required>
                									<option value="">Please Select Gender</option>
               										 <option value="Male">Male</option>
                 									<option value="Female">Female</option>             
           										 </select>
											</div>
											<div class="form-group">
												Birth Date:
												<input type="date" id="BOD" name="txtBOD" class="form-control" required>
											</div>
											<div class="form-group">
												<input type="text" id="Age" name="txtAge" class="form-control" placeholder="Age" required>
											</div>	

											<div class="form-group">
												Course:
												<select  name="txtCourse" id="Course" class="form-control" style="padding-top: 0px;padding-right: 0px;padding-bottom: 0px;padding-left: 0px;" required>
                									<option value="">Please Select Course</option>
               										 <option value="Bachelor of Science in Information Technology">Bachelor of Science in Information Technology</option>
                   									 <option value="Associates Information and Technology">Associates Information and Technology</option>
                   									 <option value="Associates in Hotel restaurant and services">Associates in Hotel restaurant and services</option>
                   									 <option value="Bachelor of Science in Hotel restaurant and services">Bachelor of Science in Hotel restaurant and services</option>                      									      
           										 </select>
											</div>	

											<div class="form-group">
												Picture Attactment:
												<input type="file" 
												 class="form-control"
												id="FilePicture" name="txtFilePicture"  required/> 
												<small>Format: .jpeg | .jpg | .png | Maximum size: 5MB</small>	
											</div>		

																		
											
											<header><h2 class="tm-text-shadow">Contact Details</h2></header>

											<div class="form-group">
												<input type="email" id="Email" name="txtEmail" class="form-control" placeholder="Email" required>
											</div>

											<div class="form-group">
												<input type="text" id="Address" name="txtAddress" class="form-control" placeholder="Address" required>
											</div>

											<div class="form-group">
												<input type="tel" 
													 class="form-control"
													 name="txtContact" id="Contact" onkeyup="addDash(this)"  placeholder="xxxx-xxxx-xxx" pattern="[0-9]{4}-[0-9]{4}-[0-9]{3}" maxlength="13" required /> 
													<small>Format: 1234-4566-234</small> 
											</div>
											<button type="submit" name="btnSubmit" class="btn tm-btn-submit tm-btn ml-auto">Submit</button>
										
									</div>
								</div>
								<div class="col-md-6 col-sm-12 tm-contact-col">
									<div class="tm-address-box">
										<header><h2 class="tm-text-shadow">Credentials</h2></header>

										<div class="form-group">
												Birth Certificate:
												<select  name="txtBirthCertificate" id="BirthCertificate" class="form-control" style="padding-top: 0px;padding-right: 0px;padding-bottom: 0px;padding-left: 0px;" required>
                									<option value="">Please Select </option>
               										 <option value="Yes">Yes</option>
                 									<option value="No">No</option>             
           										 </select>
											</div>
											<div class="form-group">
												Highschool Diploma:
												<select  name="txtHighschoolDiploma" id="HighschoolDiploma" class="form-control" style="padding-top: 0px;padding-right: 0px;padding-bottom: 0px;padding-left: 0px;" required>
                									<option value="">Please Select </option>
               										 <option value="Yes">Yes</option>
                 									<option value="No">No</option>             
           										 </select>
											</div>
											<div class="form-group">
												Transcript of Record:
												<select  name="txtTOR" id="TOR" class="form-control" style="padding-top: 0px;padding-right: 0px;padding-bottom: 0px;padding-left: 0px;" required>
                									<option value="">Please Select </option>
               										 <option value="Yes">Yes</option>
                 									<option value="No">No</option>             
           										 </select>
											</div>
									</div>
								</div>
								</form>
							</div>
						</div>
</div>

<script>
    function addDash (element) {		
		
        let ele = document.getElementById(element.id);
        ele = ele.value.split('-').join('');    // Remove dash (-) if mistakenly entered.
		
        let finalVal = ele.match(/.{1,4}/g).join('-');
		document.getElementById(element.id).value = finalVal;
		
		
    }
</script>

						</div>
					</section> <!----------------------------------------------->

					

				</div>	<!-- .tm-content -->							
				
			</div>	<!-- row -->	

		</div>
<footer class="footer-link">
					<p class="tm-copyright-text">Copyright &copy; 2021 ICAS Sucat Parañaque City Branch. 
                    
                    - DIGITAL GRADING MANAGEMENT SYSTEM</p>
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