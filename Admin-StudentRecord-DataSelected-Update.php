<?php
include("config.php"); 
session_start();
$varstd_IDFF = $_SESSION['Student_ID_Autoload'];
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
    $FetchData = mysqli_query($dbc,"SELECT * From student_list where  IDnumber = $varstd_IDFF "); 
}


//------------------------------------------------------------------------------------------------------------
$QuerySubject = mysqli_query($dbc,"SELECT * From std_subject where  0 "); 

if (isset($_POST['btnRefresh'])) {
    // code...
    $varstd_ID = $_POST['std_ID1'];  
    $QuerySubject = mysqli_query($dbc,"SELECT * From std_subject where  Student_ID ='$varstd_ID' ORDER BY `std_subject`.`YearLevel` ASC "); 
}
if(isset($_POST['btnFetchData'])){
    $QuerySubject = mysqli_query($dbc,"SELECT * From std_subject where  Student_ID ='".$_POST['std_ID2']."' ORDER BY `std_subject`.`YearLevel` ASC ");
     
   
}

if (isset($_POST['btnUpdateGrades'])) {
    // code...

$varstd_ID = $_SESSION['ID_Fetch'];
$vartxtSubjectCode =$_SESSION['txtSubjectCode_Fetch'];
$vartxtSubjectName = $_POST['txtSubjectName_Fetch'];
$vartxtPrelim = $_POST['txtPrelim_Fetch'];
$vartxtMidterm = $_POST['txtMidterm_Fetch'];
$vartxtFinal = $_POST['txtFinal_Fetch'];

$varAverage;
$varStatus;

if($vartxtPrelim == ""){
    $vartxtPrelim = 0;
}
if($vartxtMidterm == ""){
    $vartxtMidterm = 0;
}
if($vartxtFinal == ""){
    $vartxtFinal = 0;
}

if($vartxtPrelim == 0 || $vartxtMidterm == 0 || $vartxtFinal == 0){
    $varAverage = "TBA";
    $varStatus = "TBA";
}else{
     $varAverage = ($vartxtPrelim * 0.25) + ($vartxtMidterm * 0.25) + ($vartxtFinal * 0.50) ;
     if($varAverage >= 74.5 ){
        $varStatus = "Passed";
    }else{
        $varStatus =  "Failed";
    }
}



$QuerySubjectUpdate = "UPDATE `std_subject` SET `Subject`='$vartxtSubjectName',`Prelim`='$vartxtPrelim',`Midterm`='$vartxtMidterm',`Final`='$vartxtFinal',`Average`='$varAverage',`Status`='$varStatus' WHERE `Student_ID`='$varstd_ID ' And `SubjectCode`='$vartxtSubjectCode'";

$QuerySubjectUpdate = mysqli_query($dbc,$QuerySubjectUpdate); 
$QuerySubject = mysqli_query($dbc,"SELECT * From std_subject where  Student_ID ='$varstd_ID' ORDER BY `std_subject`.`YearLevel` ASC "); 
}

if (isset($_POST['btnAddGrades'])) {
// code...
$varstd_ID = $_POST['std_ID'];  
$vartxtYearLevel = $_POST['txtYearLevel'];
$vartxtSemester = $_POST['txtSemester'];
$vartxtSubjectCode = $_POST['txtSubjectCode'];
$vartxtSubjectName = $_POST['txtSubjectName'];
$vartxtTeacherName = $_POST['txtTeacherName'];
$vartxtPrelim = $_POST['txtPrelim'];
$vartxtMidterm = $_POST['txtMidterm'];
$vartxtFinal = $_POST['txtFinal'];
$varAverage;
$varStatus;

if($vartxtPrelim == ""){
    $vartxtPrelim = 0;
}
if($vartxtMidterm == ""){
    $vartxtMidterm = 0;
}
if($vartxtFinal == ""){
    $vartxtFinal = 0;
}

if($vartxtPrelim == 0 || $vartxtMidterm == 0 || $vartxtFinal == 0){
    $varAverage = "TBA";
    $varStatus = "TBA";
}else{
     $varAverage = ($vartxtPrelim * 0.25) + ($vartxtMidterm * 0.25) + ($vartxtFinal * 0.50) ;
     if($varAverage >= 74.5 ){
        $varStatus = "Passed";
    }else{
        $varStatus =  "Failed";
    }
}



$QuerySubject = "INSERT INTO `std_subject`(`Student_ID`, `YearLevel`, `Semester`, `SubjectCode`, `Subject`, `Prelim`, `Midterm`, `Final`, `Average`, `Status`, `TeacherName`) VALUES ('$varstd_ID','$vartxtYearLevel','$vartxtSemester','$vartxtSubjectCode','$vartxtSubjectName','$vartxtPrelim','$vartxtMidterm','$vartxtFinal','$varAverage','$varStatus','$vartxtTeacherName')";
$result = mysqli_query($dbc,$QuerySubject);
if($result){
    //  echo "INSERT Success";
     $QuerySubject = mysqli_query($dbc,"SELECT * From std_subject where  Student_ID ='$varstd_ID' ORDER BY `std_subject`.`YearLevel` ASC "); 

}
 echo ' <script> document.getElementById("SubjectCode").focus(); </script>';
//echo $QuerySubject;

  //  echo "<script>alert('btnGrades Click ');</script>";
// echo "$varStudent_ID $varGrade $varSemester $varSection $varPrelim $varMidterm $varFinal" ;
}


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Admin Student Record - Send Grades</title>
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
	

<style>




            .container{
                margin:0 auto;
                width:95%;
                overflow:auto;
            }
            table.gridtable {
                margin:0 auto;
                width:95%;
                overflow:auto;
                font-family: helvetica,arial,sans-serif;
                font-size:14px;
                color:#ffffff;;
                border-width: 1px;
                border-color: #666666;
                border-collapse: collapse;
                text-align: center;
            } 
            table.gridtable th {
                border-width: 1px;
                padding: 8px;
                border-style: solid;
                border-color: #666666;
                background-color: #607d8b;;
            }
            table.gridtable td {
                border-width: 1px;
                padding: 8px;
                border-style: solid;
                border-color: #666666;
            }
            a.bb1 {
                text-decoration: none;
            }
            tr:hover {background-color: #2e8b57; ;cursor: pointer;

            }
            }
        </style>



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
<a class="form-control" style=" font-weight: bold;"  href="Admin-StudentRecord-DataSelected.php"><span>&#9776; Student Information </span></a>

<a  class="form-control" style=" font-weight: bold; background-color: seagreen;" href="Admin-StudentRecord-DataSelected-Update.php"><span> Update Information </span></a>

<?php 
    if($_SESSION['AdminLevel'] == "superuser"){
        echo '<a  class="form-control" style=" font-weight: bold;" href="Admin-StudentRecord-DataSelected-Delete.php"><span> Delete Information </span></a>';
    }else{

    }
 ?>
													
<a  class="form-control" style=" font-weight: bold;  " href="Admin-StudentRecord-DataSelected-AUDGrades.php"><span>Add/Update/Delete Grades</span></a>													
<a  class="form-control" style=" font-weight: bold;  " href="Admin-StudentRecord-DataSelected-SendGrades.php"><span>Send Grades</span></a>

<a  class="form-control" style=" font-weight: bold;  background-color: darkred; " href="Admin-StudentRecord.php"><span>Exit Student Record </span></a>
					
				</div>
			</div>

			<div class="col-xl-9 col-lg-8 col-md-12 col-sm-12 tm-content">

					<!-- section 1 dashborar -->
					<section id="tm-section-1" class="tm-section tm-section-carousel">
						<div class="container-fluid" style="width: 100%;">
							

<div hidden class="tm-bg-transparent-black tm-contact-box-pad">



                            <div class="row mb-4">
                                <div class="col-sm-12">
                                    <!-- <header><h2 class="tm-text-shadow">Contact Us</h2></header> -->
                                </div>
                            </div>
                            <div class="row tm-page-4-content">
                                <div class="col-md-6 col-sm-12 tm-contact-col">
                                    <div class="contact_message">
                                     
 <div >                                      
     <h2 style="color: #8bc34a;" id="IDnumber" name="IDnumber"></h2>
    First name : <span id="Fname"></span><br> 
    Last name : <span id="Lname"></span><br> 
    Middle name : <span id="Mname"></span><br> 
    Gender : <span id="Gender"></span><br> 
    Birth Date : <span id="BOD"></span><br> 
    Age : <span id="Age"></span><br>
    <h2 style="color:  #8bc34a;" >  <strong>  Contact Information </strong> </h2>
    Email : <span id="Email"></span><br> 
    Address : <span id="Address"></span><br> 
    Contact : <span id="Contact"></span><br>
    Course : <span id="Course"></span><br>          

  
</div>                                       
                                        
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 tm-contact-col">
                                    <div class="tm-address-box">
     <h2 style="color:  #8bc34a;" >  <strong>  Credentials </strong> </h2>
            BirthCertificate : <span id="BirthCertificate"></span><br> 
    HighschoolDiploma : <span id="HighschoolDiploma"></span><br> 
    Transcript of Record : <span id="TOR"></span><br>
    File ext: <span id="flieActualExt"></span><br> 

                                        <header><h2 class="tm-text-shadow">Profile Picture</h2></header>

                                        <img id='Attach' style="    width: -webkit-fill-available;" alt="" class="img-responsive img-rounded"/>
                                       
                                    </div>
                                </div>
                      
                            </div>
                        </div>


</div>
<hr>


<div class="tm-bg-transparent-black tm-contact-box-pad" hidden>
    <center><h2 style="color:  #8bc34a;" >  <strong>  Import Grades </strong> </h2></center>
<br>

    <center>
<form method="POST">    
<input hidden type="text"  id="std_ID" name="std_ID">  
 <select name="txtYearLevel" id="YearLevel" class="form-control" style="padding-top: 0px;padding-right: 0px;padding-bottom: 0px;padding-left: 0px; width: 70%;" required="">
                                                    <option value="">Please Select YearLevel </option>
                                                     <option value="1st Year">First Year </option>
                                                        <option value="2nd Year">Second Year</option>
                                                        <option value="3rd Year">Third Year</option>
                                                          <option value="4th Year">Fourth Year</option>

                                                             
                                                 </select>  
 <select name="txtSemester" id="Semester" class="form-control" style="padding-top: 0px;padding-right: 0px;padding-bottom: 0px;padding-left: 0px; width: 70%;" required="">
                                                    <option value="">Please Select Semester</option>
                                                     <option value="1st">First Semester</option>
                                                     <option value="2nd">Second Semester</option>
                                                     <option value="3rd">Third Semester</option>                                                        
</select>                                                   
<br>  
<input type="text" id="SubjectCode" name="txtSubjectCode" maxlength="100" size="10" placeholder="SubjectCode" style="background: transparent;border-color: white;color: white;font-weight: 300;border-radius: 0;"  required>
  <input type="text" id="SubjectName" name="txtSubjectName" maxlength="100" size="10" placeholder="SubjectName" style="background: transparent;border-color: white;color: white;font-weight: 300;border-radius: 0;"  required>
  <input type="text" id="TeacherName" name="txtTeacherName" maxlength="100" size="12" placeholder="TeacherName" style="background: transparent;border-color: white;color: white;font-weight: 300;border-radius: 0;"  required>
        <br>
         <input type="text" id="Prelim" name="txtPrelim" maxlength="2" size="6" placeholder="Prelim" style="background: transparent;border-color: white;color: white;font-weight: 300;border-radius: 0;"  required>
         <input type="text" id="Midterm" name="txtMidterm" maxlength="2" size="6" placeholder="Midterm" style="background: transparent;border-color: white;color: white;font-weight: 300;border-radius: 0;"  >
         <input type="text" id="Final" name="txtFinal" maxlength="2" size="6" placeholder="Final" style="background: transparent;border-color: white;color: white;font-weight: 300;border-radius: 0;"  >
         <hr>
         <button type="submit" name="btnAddGrades" class="form-control" style="width: 30%;">Add Grades</button>
</form>         
     </center>                           

</div>

<hr>

<div class="tm-bg-transparent-black tm-contact-box-pad" hidden>
    <center><h2 style="color:  #8bc34a;" >  <strong> Edit/Update Grades </strong> </h2></center>

 <center>
<form method="POST">    
<input hidden type="text"  id="std_ID2" name="std_ID2"> 
<input type="text" id="SubjectCode22" name="txtSubjectCode" maxlength="100" size="15" placeholder="SubjectCode" style="background: transparent;border-color: white;color: white;font-weight: 300;border-radius: 0;"  required> <br>
 <button type="submit" name="btnFetchData"  style="width: 20%; color: cyan;   background: transparent;  ">Fetch Data</button>
</form>   
<br>  

<br>

<?php
        
if(isset($_POST['btnFetchData'])){

$varstd_ID = $_POST['std_ID2'];  
$vartxtSubjectCode = $_POST['txtSubjectCode'];  
$_SESSION['ID_Fetch'] = $varstd_ID;
$_SESSION['txtSubjectCode_Fetch'] = $vartxtSubjectCode;


$result1 = mysqli_query($dbc,"SELECT * From std_subject where   Student_ID='$varstd_ID' And SubjectCode='$vartxtSubjectCode' "); 

if(mysqli_num_rows($result1) >= 1){

 while($res = mysqli_fetch_array($result1)){


  $vartxtSubjectCode  = $res['SubjectCode'];
  $vartxtSubjectName  = $res['Subject'];
  $vartxtPrelim  = $res['Prelim'];
  $vartxtMidterm  = $res['Midterm'];
  $vartxtFinal  = $res['Final'];

 }

 if($vartxtPrelim == 0){
    $vartxtPrelim ="";
 }
 if($vartxtMidterm == 0){
    $vartxtMidterm ="";
 }
  if($vartxtFinal == 0){
    $vartxtFinal ="";
 }


    echo '
<form method="POST">
<input type="text" id="SubjectName_Fetch" name="txtSubjectName_Fetch" maxlength="100" value="'.$vartxtSubjectName.'" size="10" placeholder="SubjectName" style="background: transparent;border-color: white;color: white;font-weight: 300;border-radius: 0;"  required>

        <br>
         <input type="text" id="Prelim_Fetch" name="txtPrelim_Fetch" maxlength="2" size="6" value="'.$vartxtPrelim.'" placeholder="Prelim" style="background: transparent;border-color: white;color: white;font-weight: 300;border-radius: 0;"  required>
         <input type="text" id="Midterm_Fetch" name="txtMidterm_Fetch" maxlength="2" size="6" value="'.$vartxtMidterm.'" placeholder="Midterm" style="background: transparent;border-color: white;color: white;font-weight: 300;border-radius: 0;"  >
         <input type="text" id="Final_Fetch" name="txtFinal_Fetch" maxlength="2" size="6" value="'.$vartxtFinal.'" placeholder="Final" style="background: transparent;border-color: white;color: white;font-weight: 300;border-radius: 0;"  >
         <hr>
         <button type="submit" name="btnUpdateGrades" class="form-control" style="width: 30%;">Update Grades</button>
</form>
';

echo ' <script> document.getElementById("Midterm_Fetch").focus(); </script>';
}else{

    echo '<center> <h1> Data Not found </h1></center>';
    echo ' <script> document.getElementById("SubjectCode22").focus(); </script>';

    }
}

?>
      


     </center>    
</div>

<hr>

<div  class="tm-bg-transparent-black tm-contact-box-pad" hidden>
<center><h2 style="color:  #8bc34a;" >  <strong> Subject Record </strong> </h2></center>

    <div class="container-fluid" style="width: 95%;" >
<center>



Results =<?php echo mysqli_num_rows($QuerySubject); ?>
</center>
<table  class="gridtable" id="tableMain"  >

                <thead>
                    <tr>
                        <th>SubjectCode</th>
                        <th>YearLevel</th>          
                        <th>Semester</th>               
                        <th>Subject</th>
                        <th>Prelim</th>
                        <th>Midterm</th>
                        <th>Final</th>               
                        <th>Average</th>
                        <th>Status</th>
                        <th>TeacherName </th>
                    </tr>
                </thead>

  
          <tbody>       
 <?php 


        while($res = mysqli_fetch_array($QuerySubject)){
            echo '<tr>';
            echo '<td>'.$res['SubjectCode'].'</td>';            
            echo '<td  >'.$res['YearLevel'].'</td>';
            echo '<td  >'.$res['Semester'].'</td>';
            echo '<td>'.$res['Subject'].'</td>';
            echo '<td  >'.$res['Prelim'].'</td>';
            echo '<td>'.$res['Midterm'].'</td>';
            echo '<td  >'.$res['Final'].'</td>';                        
            echo '<td   >'.$res['Average'].'</td>';
            echo '<td  >'.$res['Status'].'</td>'; 
             echo '<td  >'.$res['TeacherName'].'</td>';  
            echo '<td hidden >'.$res['Student_ID'].'</td>';         
            echo '</tr>';


        }
?>             
          </tbody>
           
     </table>
     <form method="POST">
        <input hidden type="text"  id="std_ID1" name="std_ID1">  
     <button type="submit" name="btnRefresh" id="btnRefresh"  style="width: 20%; color: cyan;   background: transparent;  ">Refresh</button>
     </form>
</div>

</div>




<div  class="tm-bg-transparent-black tm-contact-box-pad" hidden>
    <hr>
    <center><h2 style="color:  #8bc34a;" >  <strong> Send Grades </strong> </h2></center>
<br>

    <center>
<form method="POST">    
    <input hidden  type="text"  id="std_name_Send" name="std_name_Send">  
<input hidden type="text"  id="std_ID_Send" name="std_ID_Send">  
<input hidden type="text"  id="std_email_send" name="std_email_send" readonly>
 <select name="txtYearLevel_Send" id="YearLevel_Send" class="form-control" style="padding-top: 0px;padding-right: 0px;padding-bottom: 0px;padding-left: 0px; width: 70%;" required="">
                                                    <option value="">Please Select YearLevel </option>
                                                     <option value="1st Year">First Year </option>
                                                        <option value="2nd Year">Second Year</option>
                                                        <option value="3rd Year">Third Year</option>
                                                          <option value="4th Year">Fourth Year</option>

                                                             
                                                 </select>  
 <select name="txtSemester_Send" id="Semester_Send" class="form-control" style="padding-top: 0px;padding-right: 0px;padding-bottom: 0px;padding-left: 0px; width: 70%;" required="">
                                                    <option value="">Please Select Semester</option>
                                                     <option value="1st">First Semester</option>
                                                     <option value="2nd">Second Semester</option>
                                                     <option value="3rd">Third Semester</option>                                                        
</select>                                                   
<br>  

         <hr>
         <button type="submit" name="btnSend_Prelim"  style="background: transparent;border-color: white;color: white;">Send Prelim </button>
         <button type="submit" name="btnSend_Midterm"  style="background: transparent;border-color: white;color: white;">Send Midterm </button>
         <button type="submit" name="btnSend_Final"  style="background: transparent;border-color: white;color: white;">Send Final </button><br><br>
         <button type="submit" name="btnSend_All"  style="background: transparent;border-color: white;color: white;">Send All (Prelim/Midtermk/Final) </button>
     
</form>         
     </center>                           

</div>
<?php 
    
    if (isset($_POST['btnSend_Prelim'])) {
        // code...
        $varname = $_POST['std_name_Send'];  
     $varEmail = $_POST['std_email_send']; 
    $varstd_ID = $_POST['std_ID_Send'];  
    $vartxtYearLevel = $_POST['txtYearLevel_Send']; 
    $vartxtSemester = $_POST['txtSemester_Send']; 
    $QueryPrelim = mysqli_query($dbc,"SELECT * From std_subject where  Student_ID ='$varstd_ID' and YearLevel ='$vartxtYearLevel' and Semester ='$vartxtSemester' "); 

$num = 0;
$PrelimData2;
        while($res = mysqli_fetch_array($QueryPrelim)){
//$PrelimData = 'SubjectCode = '.$res['SubjectCode'].' YearLevel = '.$res['YearLevel'].' Semester = '.$res['Semester'].' SubjectName = '.$res['Subject'].' Prelim = '.$res['Prelim'];
$PrelimArray[$num] = '<p> SubjectCode = '.$res['SubjectCode'].' YearLevel = '.$res['YearLevel'].' Semester = '.$res['Semester'].' SubjectName = '.$res['Subject'].' Prelim = '.$res['Prelim'].'</p>';
$num = $num + 1;
}

echo "<br>";
for ($i=0; $i < $num; $i++) { 
    // code...
    if($i==0){
        $PrelimData2 = $PrelimArray[$i];
    }else{
         $PrelimData2 .= $PrelimArray[$i];
    }

}
//echo '>'.$PrelimData2.'<-data';


//Start Email Sender-----------------------------------------------------
$fromEmail = 'ICAS Sucat Parañaque Branch';
$subjectName = 'Student Prelim Grades';
$yourName = $varname;
$STDID = $varstd_ID;

$toEmail = $varEmail;
 
//$message = $_POST['message'];
    
$to = $toEmail;
$subject = $subjectName;
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: '.$fromEmail.'<'.$fromEmail.'>' . "\r\n".'Reply-To: '.$fromEmail."\r\n" . 'X-Mailer: PHP/' . phpversion();
$message = 
'
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    </head>
<style>
    .container{
                margin:0 auto;
                width:95%;
                overflow:auto;
            }
</style>


<body>
    <span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;"></span>
<div>

<br/>
<br/>
Hi! '.$yourName.'<br/>
                 <br/>
 
<br/>
<br/>
 <br/>
<hr>
    <p>'.$PrelimData2.'</p>
<hr>
<br/>
-----
<br/>
<br>
Thank you and Keep safe.
<br>
<br>
</div>
<div class="container">

        Best Regards,<br/>
        '.$fromEmail.' - Digital Documentation Management System
</div>
</body>
</html>
';
    $result = @mail($to, $subject, $message, $headers);
                
//end of email sender-------------------------------

    }//btn Prelome

    if (isset($_POST['btnSend_Midterm'])) {
        // code...


        // code...
        $varname = $_POST['std_name_Send']; 
     $varEmail = $_POST['std_email_send']; 
    $varstd_ID = $_POST['std_ID_Send'];  
    $vartxtYearLevel = $_POST['txtYearLevel_Send']; 
    $vartxtSemester = $_POST['txtSemester_Send']; 
    $QueryPrelim = mysqli_query($dbc,"SELECT * From std_subject where  Student_ID ='$varstd_ID' and YearLevel ='$vartxtYearLevel' and Semester ='$vartxtSemester' "); 

$num = 0;
$MidtermData;
        while($res = mysqli_fetch_array($QueryPrelim)){
//$PrelimData = 'SubjectCode = '.$res['SubjectCode'].' YearLevel = '.$res['YearLevel'].' Semester = '.$res['Semester'].' SubjectName = '.$res['Subject'].' Prelim = '.$res['Prelim'];
$MidtermArray[$num] = '<p> SubjectCode = '.$res['SubjectCode'].' YearLevel = '.$res['YearLevel'].' Semester = '.$res['Semester'].' SubjectName = '.$res['Subject'].' Midterm = '.$res['Midterm'].'</p>';
$num = $num + 1;
}

echo "<br>";
for ($i=0; $i < $num; $i++) { 
    // code...
    if($i==0){
        $MidtermData = $MidtermArray[$i];
    }else{
         $MidtermData .= $MidtermArray[$i];
    }

}
//echo '>'.$MidtermData.'<-data';


//Start Email Sender-----------------------------------------------------
$fromEmail = 'ICAS Sucat Parañaque Branch';
$subjectName = 'Student Midterm Grades';
$yourName = $varname;
$STDID = $varstd_ID;

$toEmail = $varEmail;
 
//$message = $_POST['message'];
    
$to = $toEmail;
$subject = $subjectName;
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: '.$fromEmail.'<'.$fromEmail.'>' . "\r\n".'Reply-To: '.$fromEmail."\r\n" . 'X-Mailer: PHP/' . phpversion();
$message = 
'
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    </head>
<style>
    .container{
                margin:0 auto;
                width:95%;
                overflow:auto;
            }
</style>


<body>
    <span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;"></span>
<div>

<br/>
<br/>
Hi! '.$yourName.'<br/>
                 <br/>

<br/>
<br/>
 <br/>
<hr>
    <p>'.$MidtermData.'</p>
<hr>
<br/>
-----
<br/>
<br>
Thank you and Keep safe.
<br>
<br>
</div>
<div class="container">

        Best Regards,<br/>
        '.$fromEmail.' -  Digital Documentation Management System
</div>
</body>
</html>
';
    $result = @mail($to, $subject, $message, $headers);
                
//end of email sender-------------------------------




    }

    if (isset($_POST['btnSend_Final'])) {
        // code...


        // code...


        // code...
        $varname = $_POST['std_name_Send']; 
     $varEmail = $_POST['std_email_send']; 
    $varstd_ID = $_POST['std_ID_Send'];  
    $vartxtYearLevel = $_POST['txtYearLevel_Send']; 
    $vartxtSemester = $_POST['txtSemester_Send']; 
    $QueryPrelim = mysqli_query($dbc,"SELECT * From std_subject where  Student_ID ='$varstd_ID' and YearLevel ='$vartxtYearLevel' and Semester ='$vartxtSemester' "); 

$num = 0;
$FinalData;
        while($res = mysqli_fetch_array($QueryPrelim)){
//$PrelimData = 'SubjectCode = '.$res['SubjectCode'].' YearLevel = '.$res['YearLevel'].' Semester = '.$res['Semester'].' SubjectName = '.$res['Subject'].' Prelim = '.$res['Prelim'];
$FinalArray[$num] = '<p> SubjectCode = '.$res['SubjectCode'].' YearLevel = '.$res['YearLevel'].' Semester = '.$res['Semester'].' SubjectName = '.$res['Subject'].' Final = '.$res['Final'].'</p>';
$num = $num + 1;
}

echo "<br>";
for ($i=0; $i < $num; $i++) { 
    // code...
    if($i==0){
        $FinalData = $FinalArray[$i];
    }else{
         $FinalData .= $FinalArray[$i];
    }

}
//echo '>'.$FinalData.'<-data';


//Start Email Sender-----------------------------------------------------
$fromEmail = 'ICAS Sucat Parañaque Branch';
$subjectName = 'Student Final Grades';
$yourName = $varname;
$STDID = $varstd_ID;

$toEmail = $varEmail;
 
//$message = $_POST['message'];
    
$to = $toEmail;
$subject = $subjectName;
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: '.$fromEmail.'<'.$fromEmail.'>' . "\r\n".'Reply-To: '.$fromEmail."\r\n" . 'X-Mailer: PHP/' . phpversion();
$message = 
'
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    </head>
<style>
    .container{
                margin:0 auto;
                width:95%;
                overflow:auto;
            }
</style>


<body>
    <span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;"></span>
<div>

<br/>
<br/>
Hi! '.$yourName.'<br/>
                 <br/>

<br/>
<br/>
 <br/>
<hr>
    <p>'.$FinalData.'</p>
<hr>
<br/>
-----
<br/>
<br>
Thank you and Keep safe.
<br>
<br>
</div>
<div class="container">

        Best Regards,<br/>
        '.$fromEmail.' -  Digital Documentation Management System
</div>
</body>
</html>
';
    $result = @mail($to, $subject, $message, $headers);
                
//end of email sender-------------------------------

    }

    if (isset($_POST['btnSend_All'])) {
        
        // code...


        // code...


        // code...
        $varname = $_POST['std_name_Send']; 
     $varEmail = $_POST['std_email_send']; 
    $varstd_ID = $_POST['std_ID_Send'];  
    $vartxtYearLevel = $_POST['txtYearLevel_Send']; 
    $vartxtSemester = $_POST['txtSemester_Send']; 
    $QueryPrelim = mysqli_query($dbc,"SELECT * From std_subject where  Student_ID ='$varstd_ID' and YearLevel ='$vartxtYearLevel' and Semester ='$vartxtSemester' "); 

$num = 0;
$AllGrades;
        while($res = mysqli_fetch_array($QueryPrelim)){
//$PrelimData = 'SubjectCode = '.$res['SubjectCode'].' YearLevel = '.$res['YearLevel'].' Semester = '.$res['Semester'].' SubjectName = '.$res['Subject'].' Prelim = '.$res['Prelim'];
$AllGradesArray[$num] = '<p> SubjectCode = '.$res['SubjectCode'].' YearLevel = '.$res['YearLevel'].' Semester = '.$res['Semester'].' SubjectName = '.$res['Subject'].' Prelim = '.$res['Prelim'].' Midterm = '.$res['Midterm'].' Final = '.$res['Final'].' Average = '.$res['Average'].' Status = '.$res['Status'].'</p>';
$num = $num + 1;
}

echo "<br>";
for ($i=0; $i < $num; $i++) { 
    // code...
    if($i==0){
        $AllGrades = $AllGradesArray[$i];
    }else{
         $AllGrades .= $AllGradesArray[$i];
    }

}
//echo '>'.$AllGrades.'<-data';


//Start Email Sender-----------------------------------------------------
$fromEmail = 'ICAS Sucat Parañaque Branch';
$subjectName = 'Student Prelim, Midterm ,Final Grades';
$yourName = $varname;
$STDID = $varstd_ID;

$toEmail = $varEmail;
 
//$message = $_POST['message'];
    
$to = $toEmail;
$subject = $subjectName;
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: '.$fromEmail.'<'.$fromEmail.'>' . "\r\n".'Reply-To: '.$fromEmail."\r\n" . 'X-Mailer: PHP/' . phpversion();
$message = 
'
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    </head>
<style>
    .container{
                margin:0 auto;
                width:95%;
                overflow:auto;
            }
</style>


<body>
    <span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;"></span>
<div>

<br/>
<br/>
Hi! '.$yourName.'<br/>
                 <br/>

<br/>
<br/>
 <br/>
<hr>
    <p>'.$AllGrades.'</p>
<hr>
<br/>
-----
<br/>
<br>
Thank you and Keep safe.
<br>
<br>
</div>
<div class="container">

        Best Regards,<br/>
        '.$fromEmail.' -  Digital Documentation Management System
</div>
</body>
</html>
';
    $result = @mail($to, $subject, $message, $headers);
                
//end of email sender-------------------------------

    }

?>










<div class="tm-bg-transparent-black tm-contact-box-pad">
                            <div class="row mb-4">
                                <div class="col-sm-12">
                                    <header><h2 class="tm-text-shadow"> Update information </h2></header>
                                </div>
                            </div>

<center>
    
    <form method="POST" enctype="multipart/form-data" class="contact-form" hidden>

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
//echo mysqli_num_rows($FetchData).'<br>';
echo '<strong>'.$varstd_IDFF.'</strong><br>';
    while($res = mysqli_fetch_array($FetchData)){
    //  echo '<option value="'.$res['IDnumber'].'" >'.$res['IDnumber'].' - '.$res['Lname'].'</option>';  
       // echo "Data found";

if($res['Gender'] == "Male"){
    $GenderFetch = '<option selected="selected" value="Male">Male</option> <option value="Female">Female</option>';
}else{
    $GenderFetch = '<option  value="Male">Male</option> <option selected="selected" value="Female">Female</option>';
}
//echo $res['Course'];
if($res['Course'] == "Bachelor of Science in Information Technology"){
    $CourseFetch  = ' <option selected="selected" value="Bachelor of Science in Information Technology">Bachelor of Science in Information Technology</option> 
                    <option value="Associates Information and Technology">Associates Information and Technology</option>
                    <option value="Associates in Hotel restaurant and services">Associates in Hotel restaurant and services</option>
                    <option value="Bachelor of Science in Hotel restaurant and services">Bachelor of Science in Hotel restaurant and services</option>     ';

}elseif($res['Course'] == "Associates Information and Technology"){
    $CourseFetch  = ' <option value="Bachelor of Science in Information Technology">Bachelor of Science in Information Technology</option> 
                    <option selected="selected"  value="Associates Information and Technology">Associates Information and Technology</option>
                    <option value="Associates in Hotel restaurant and services">Associates in Hotel restaurant and services</option>
                    <option value="Bachelor of Science in Hotel restaurant and services">Bachelor of Science in Hotel restaurant and services</option>     ';

}elseif($res['Course'] == "Associates in Hotel restaurant and services"){
    $CourseFetch  = ' <option value="Bachelor of Science in Information Technology">Bachelor of Science in Information Technology</option> 
                    <option   value="Associates Information and Technology">Associates Information and Technology</option>
                    <option selected="selected" value="Associates in Hotel restaurant and services">Associates in Hotel restaurant and services</option>
                    <option value="Bachelor of Science in Hotel restaurant and services">Bachelor of Science in Hotel restaurant and services</option>     ';

}elseif($res['Course'] == "Bachelor of Science in Hotel restaurant and services"){
    $CourseFetch  = ' <option value="Bachelor of Science in Information Technology">Bachelor of Science in Information Technology</option> 
                    <option   value="Associates Information and Technology">Associates Information and Technology</option>
                    <option value="Associates in Hotel restaurant and services">Associates in Hotel restaurant and services</option>
                    <option selected="selected" value="Bachelor of Science in Hotel restaurant and services">Bachelor of Science in Hotel restaurant and services</option>     ';

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
                                        <form method="POST" action="Admin-AddStudentFN.php" enctype="multipart/form-data">
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
                                                id="FilePicture" name="txtFilePicture" /> 
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
                            </form>
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


    </body>


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







<script>
   document.getElementById("IDnumber").innerHTML = localStorage.getItem("LS_IDnumber",IDnumber);
    document.getElementById("Fname").innerHTML = localStorage.getItem("LS_Fname", Fname);
    document.getElementById("Lname").innerHTML = localStorage.getItem("LS_Lname", Lname);
    document.getElementById("Mname").innerHTML = localStorage.getItem("LS_Mname", Mname);
    document.getElementById("Gender").innerHTML = localStorage.getItem("LS_Gender", Gender);
    document.getElementById("BOD").innerHTML = localStorage.getItem("LS_BOD", BOD);
    document.getElementById("Age").innerHTML = localStorage.getItem("LS_Age", Age);
    document.getElementById("Email").innerHTML = localStorage.getItem("LS_Email", Email);
    document.getElementById("Address").innerHTML = localStorage.getItem("LS_Address", Address);
    document.getElementById("Contact").innerHTML = localStorage.getItem("LS_Contact", Contact);
    document.getElementById("Course").innerHTML = localStorage.getItem("LS_Course", Course);

     document.getElementById("BirthCertificate").innerHTML =   localStorage.getItem("LS_BirthCertificate", BirthCertificate);
     document.getElementById("HighschoolDiploma").innerHTML =   localStorage.getItem("LS_HighschoolDiploma", HighschoolDiploma);
     document.getElementById("TOR").innerHTML =   localStorage.getItem("LS_TOR", TOR);
     document.getElementById("flieActualExt").innerHTML =   localStorage.getItem("LS_flieActualExt", flieActualExt);


</script>
<script>
    document.getElementById("std_ID").value = localStorage.getItem("LS_IDnumber",IDnumber);
    document.getElementById("std_ID1").value = localStorage.getItem("LS_IDnumber",IDnumber);
    document.getElementById("std_ID2").value = localStorage.getItem("LS_IDnumber",IDnumber);
    document.getElementById("std_ID_Send").value = localStorage.getItem("LS_IDnumber",IDnumber);
    document.getElementById("std_name_Send").value = localStorage.getItem("LS_Fname", Fname);
    document.getElementById("std_email_send").value = localStorage.getItem("LS_Email", Email);


  //  document.getElementById('btnRefresh').click();

 <?php
  if($_SESSION['DataRefresh'] == "false"){    
     $_SESSION['DataRefresh'] = "true";
    echo "document.getElementById('btnRefresh').click();";
  }else{

  }


?>

</script>

<script>
    let locationIMG = 'webUploads/' + localStorage.getItem('LS_IDnumber') +'.'+ localStorage.getItem('LS_flieActualExt');
    
    if(localStorage.getItem('LS_flieActualExt') == ""){
        locationIMG = "webUploads/noattach.jpg";
       }else{
       
       }
    
    document.getElementById("Attach").src = locationIMG;
</script>


	</body>
</html>