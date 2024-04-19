<?php
	include("config.php");
	session_start();
$ComboID = mysqli_query($dbc,"SELECT * From student_list where  1 "); 

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Admin Delete Student</title>
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
			
<a href="Admin-DeleteStudent.php"> <button type="button"  class="form-control" style="background-color: #41a241;font-size: larger;font-weight: bold;font-style: italic;" >DELETE</button></a>
<a href="Admin-AddStudent.php"><button type="button"  >Add</button></a>
<a href="Admin-EditStudent.php"><button type="button" >Edit</button></a>
<div class="tm-bg-transparent-black tm-contact-box-pad">
							<div class="row mb-4">
								<div class="col-sm-12">
									<header><h2 class="tm-text-shadow"> Delete information </h2></header>
								</div>
							</div>

<center>
	
<form action="Admin-AddStudentFN.php" method="POST" enctype="multipart/form-data" class="contact-form">

<!-- <input type="text" id="ID_number" name="txtID_number" maxlength="100" size="44" placeholder="Please Enter ID Number to Edit/Update" style="background: transparent;border-color: white;color: white;font-weight: 300;border-radius: 0; text-align: center; "   required> <br> -->
 <!-- <button type="submit" name="btnFetchData"  style="width: 20%; color: cyan;   background: transparent;  ">Fetch Data</button> -->

 <select name="txtStudent_ID" id="Student_ID"  style="padding-top: 0px;padding-right: 0px;padding-bottom: 0px;padding-left: 0px;" required>
                                                   
                                                    <option value="">Please Select Student_ID</option>
<?php 
	while($res = mysqli_fetch_array($ComboID)){

		echo '<option value="'.$res['IDnumber'].'" >'.$res['IDnumber'].' - '.$res['Lname'].'</option>';  
		

 }
?>
</select> 

<br>
	
<button type="submit" name="btnStudentDelete" class="btn tm-btn-submit tm-btn">Delete</button>

</div>

</form> 
<br>
</center>




							


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
                    
                    - Digital Documentation Management System</p>
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