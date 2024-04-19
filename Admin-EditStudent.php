<?php
	include("config.php");
	session_start();
$ComboID = mysqli_query($dbc,"SELECT * From student_list where  1 "); 
if(isset($_POST['btnFetch'])){
$varID = $_POST['txtStudent_ID'];
$FetchData = mysqli_query($dbc,"SELECT * From student_list where  IDnumber = $varID "); 
$_SESSION['varID'] = $varID;
	if(mysqli_num_rows($FetchData) > 0){
		
	}else{
		$FetchData = mysqli_query($dbc,"SELECT * From student_list where  0 "); 
	}

}else{
	$FetchData = mysqli_query($dbc,"SELECT * From student_list where  0 "); 
}

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Admin Edit Student</title>
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
				
<a href="Admin-EditStudent.php"> <button type="button"  class="form-control" style="background-color: #41a241;font-size: larger;font-weight: bold;font-style: italic;" >Edit</button></a>
<a href="Admin-AddStudent.php"><button type="button"  >Add</button></a>
<a href="Admin-DeleteStudent.php"><button type="button" >Delete</button></a>
<div class="tm-bg-transparent-black tm-contact-box-pad">
							<div class="row mb-4">
								<div class="col-sm-12">
									<header><h2 class="tm-text-shadow"> Update information </h2></header>
								</div>
							</div>

<center>
	
	<form method="POST" enctype="multipart/form-data" class="contact-form">

<!-- <input type="text" id="ID_number" name="txtID_number" maxlength="100" size="44" placeholder="Please Enter ID Number to Edit/Update" style="background: transparent;border-color: white;color: white;font-weight: 300;border-radius: 0; text-align: center; "   required> <br> -->
 <!-- <button type="submit" name="btnFetchData"  style="width: 20%; color: cyan;   background: transparent;  ">Fetch Data</button> -->

<!--  <select name="txtStudent_ID" id="Student_ID"  style="padding-top: 0px;padding-right: 0px;padding-bottom: 0px;padding-left: 0px;" >
                                                   
                                                    <option value="">Please Select Student_ID</option>
                                                </select>  -->
<input type="text" name="txtStudent_ID" id="Student_ID" required></input>
<button type="submit" name="btnFetch" >Fetch Data</button>
</form> 

<?php 
if(mysqli_num_rows($FetchData) > 0){
echo mysqli_num_rows($FetchData).'<br>';
echo $_SESSION['varID'].'<br>';
	while($res = mysqli_fetch_array($FetchData)){
	//	echo '<option value="'.$res['IDnumber'].'" >'.$res['IDnumber'].' - '.$res['Lname'].'</option>';  
		echo "Data found";

if($res['Gender'] == "Male"){
	$GenderFetch = '<option selected="selected" value="Male">Male</option> <option value="Female">Female</option>';
}else{
	$GenderFetch = '<option  value="Male">Male</option> <option selected="selected" value="Female">Female</option>';
}
echo $res['Course'];
if($res['Course'] == "Bachelor of Science in Information Technology"){
	$CourseFetch  = ' <option selected="selected" value="Bachelor of Science in Information Technology">Bachelor of Science in Information Technology</option> ';
}else{
	//$Course = '<option  value="Male">Male</option> <option selected="selected" value="Female">Female</option>';
}

if($res['BirthCertificate'] == "Yes"){
	$BirthCertificateFetch = '<option selected="selected" value="Yes">Yes</option><option value="No">No</option>  ';
}else{
	 $BirthCertificateFetch = '<option value="Yes">Yes</option><option  selected="selected" value="No">No</option>  ';
}

if($res['HighschoolDiploma'] == "Yes"){
	$HighschoolDiplomaFetch = '<option selected="selected" value="Yes">Yes</option><option value="No">No</option>  ';
}else{
	 $HighschoolDiplomaFetch = '<option value="Yes">Yes</option><option  selected="selected" value="No">No</option>  ';
}

if($res['TOR'] == "Yes"){
	$TORFetch = '<option selected="selected" value="Yes">Yes</option><option value="No">No</option>  ';
}else{
	 $TORFetch = '<option value="Yes">Yes</option><option  selected="selected" value="No">No</option>  ';
}



	echo '<div class="row mb-4" readonly>
								<div class="col-sm-12">
									<!-- <header><h2 class="tm-text-shadow">Contact Us</h2></header> -->
								</div>
							</div>
							<div class="row tm-page-4-content">
								<div class="col-md-6 col-sm-12 tm-contact-col">
									<div class="contact_message">
										
											<div class="form-group">
												<input type="text" id="Fname" name="txtFname" value="'.$res["Fname"].'" class="form-control" placeholder="First Name" required>
											</div>
											<div class="form-group">
												<input type="text" id="Lname" value="'.$res["Lname"].'"  name="txtLname" class="form-control" placeholder="Last Name" required>
											</div>
											<div class="form-group">
												<input type="text" id="Mname" value="'.$res["Mname"].'"  name="txtMname" class="form-control" placeholder="Middle Name" required>
											</div>
											<div class="form-group">
												Gender:
												<select  name="txtGender" id="Gender" class="form-control" style="padding-top: 0px;padding-right: 0px;padding-bottom: 0px;padding-left: 0px;" required>
                									<option value="">Please Select Gender</option>
               										'.$GenderFetch.'            
           										 </select>
											</div>
											<div class="form-group">
												Birth Date:
												<input type="date" id="BOD" name="txtBOD" value="'.$res["BOD"].'" class="form-control" required>
											</div>
											<div class="form-group">
												<input type="text" id="Age" name="txtAge" value="'.$res["Age"].'" class="form-control" placeholder="Age" required>
											</div>	

											<div class="form-group">
												Course:
												<select  name="txtCourse" id="Course" class="form-control" style="padding-top: 0px;padding-right: 0px;padding-bottom: 0px;padding-left: 0px;" required>
                									<option value="">Please Select Course</option>
               										'.$CourseFetch.'                 									      
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
												<input type="email" id="Email" name="txtEmail" value="'.$res["Email"].'" class="form-control" placeholder="Email" required>
											</div>

											<div class="form-group">
												<input type="text" id="Address" name="txtAddress" class="form-control" value="'.$res["Address"].'" placeholder="Address" required>
											</div>

											<div class="form-group">
												<input type="tel" 
													 class="form-control"
													 name="txtContact" id="Contact" onkeyup="addDash(this)" value="'.$res["Contact"].'"  placeholder="xxxx-xxxx-xxx" pattern="[0-9]{4}-[0-9]{4}-[0-9]{3}" maxlength="13" required /> 
													<small>Format: 1234-4566-234</small> 
											</div>
											<button type="submit" name="btnUpdate" class="btn tm-btn-submit tm-btn ml-auto">Update Data</button>
										
									</div>
								</div>
								<div class="col-md-6 col-sm-12 tm-contact-col">
									<div class="tm-address-box">
										<header><h2 class="tm-text-shadow">Credentials</h2></header>

										<div class="form-group">
												Birth Certificate:
												<select  name="txtBirthCertificate" id="BirthCertificate" class="form-control" style="padding-top: 0px;padding-right: 0px;padding-bottom: 0px;padding-left: 0px;" required>
                									<option value="">Please Select </option>
               										'.$BirthCertificateFetch.'           
           										 </select>
											</div>
											<div class="form-group">
												Highschool Diploma:
												<select  name="txtHighschoolDiploma" id="HighschoolDiploma" class="form-control" style="padding-top: 0px;padding-right: 0px;padding-bottom: 0px;padding-left: 0px;" required>
                									<option value="">Please Select </option>
               										'.$HighschoolDiplomaFetch.'         
           										 </select>
											</div>
											<div class="form-group">
												Transcript of Record:
												<select  name="txtTOR" id="TOR" class="form-control" style="padding-top: 0px;padding-right: 0px;padding-bottom: 0px;padding-left: 0px;" required>
                									<option value="">Please Select </option>
               										 '.$TORFetch.'            
           										 </select>
											</div>
									</div>
								</div>
							
							</div>
						</div>';	

 	}
}else{
	echo "Data NOT found";
}
?>




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