<?php 
include("config.php");
session_start();

if(isset($_POST['btnRequest_search'])){
$col1 = $_POST['column'];
$txtSearch = $_POST['txtRequest_search'];
	
if ($col1 == "IDNumber") {
	if ($txtSearch == "") {
		 $Query = mysqli_query($dbc,"SELECT * From student_list where  0");
		 $Query1 = mysqli_query($dbc,"SELECT * From student_list where  0");
		 $Query2 = mysqli_query($dbc,"SELECT * From student_list where  0");
		 $QueryGrade = mysqli_query($dbc,"SELECT * From std_subject where  0"); 
	}else{
		$Query = mysqli_query($dbc,"SELECT * From student_list where IDnumber = $txtSearch  "); 
		$Query1 = mysqli_query($dbc,"SELECT * From student_list where IDnumber = $txtSearch  "); 
		$Query2 = mysqli_query($dbc,"SELECT * From student_list where IDnumber = $txtSearch  "); 
		$QueryGrade = mysqli_query($dbc,"SELECT * From std_subject where Student_ID = '$txtSearch'  ORDER BY `YearLevel` ASC "); 
	}


}else{
	if($col1 == "Student Master List"){
		// code...
		$Query = mysqli_query($dbc,"SELECT * From student_list where  1"); 
	}elseif($col1 == "Bachelor of Science in Information Technology"){
		// code...
		$Query = mysqli_query($dbc,"SELECT * From student_list where Course = '$col1'"); 
		if ($Query) {
			// code...
		}else{}

	}
	elseif($col1 == "Associates Information and Technology"){
		// code...
		$Query = mysqli_query($dbc,"SELECT * From student_list where Course = '$col1'"); 
	}
	elseif($col1 == "Associates in Hotel restaurant and services"){
		// code...
		$Query = mysqli_query($dbc,"SELECT * From student_list where Course = '$col1'"); 
	}
	elseif($col1 == "Bachelor of Science in Hotel restaurant and services"){
		// code...
		$Query = mysqli_query($dbc,"SELECT * From student_list where Course = '$col1'"); 
	}

}

}else{//btn search not click
$Query = mysqli_query($dbc,"SELECT * From student_list where  0");
$Query1 = mysqli_query($dbc,"SELECT * From student_list where  0");
$Query2 = mysqli_query($dbc,"SELECT * From student_list where  0");
$QueryGrade = mysqli_query($dbc,"SELECT * From std_subject where  0");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
 
     <!-- Site Metas -->
    <title>Digital Documentation Management System</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

   
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

	<!-- Sidebar -->
			<div id="tmSideBar" class="">
				<!-- <button id="tmMainNavToggle" class="menu-icon">&#9776;</button> -->

				<div class="inner">
								
					<nav hidden id="tmMainNav" class="tm-main-nav">
						<ul>
							<li>
								<a href="#intro" id="tmNavLink1" class="scrolly active" data-bg-img="constructive_bg_01.jpg" data-page="#tm-section-1">
									<span>Dashboard</span>
								</a>
							</li>
						
						</nav>
						</ul>
					
<center>
<div style="text-align: -webkit-center;">
        <form method="POST" >
    
            <label >Search:</label>
            <input type="text" size="50"
            maxlength="50" class="form-control"
            id="Request_searchID2"  name="txtRequest_search"  placeholder="Enter content" style="width: 50%; text-align: center;" /> 
            
            <select name="column" id="column" onchange="ChangeData1()" required style="width : 40%">
                <option value="">Select Filter</option>
            <optgroup label="Student Information">
                <option value="IDNumber">ID number</option>            
            </optgroup>
                <optgroup label="Database Table">                
                    <option value="Student Master List">Student Master List</option>                  
                </optgroup>
                <optgroup label="Search by Course">                
                    <option value="Bachelor of Science in Information Technology">Bachelor of Science in Information Technology</option>
                    <option value="Associates Information and Technology">Associates Information and Technology</option>
                    <option value="Associates in Hotel restaurant and services">Associates in Hotel restaurant and services</option>
                    <option value="Bachelor of Science in Hotel restaurant and services">Bachelor of Science in Hotel restaurant and services</option>                  
                </optgroup>
            </select>
            
            <button  type="submit" class= 
            "btn btn-default" name="btnRequest_search"> 
            Search
            </button>
            <br><br><br>
            <button  type="button" class= 
            "btn btn-default" name="ppp" onClick="window.print();"> 
            Print 
            </button>

            <button  type="button" class= 
            "btn btn-default" name="exit" onClick="btnExit();"> 
            Exit 
            </button>
            
        </form>
        <hr>
    </div>

</center>	
					</nav>
				</div>	

			
							
				</div>
			</div>	



<body>


<center>
<img id='Attach' style="width: 15%;" src="<?php while($res = mysqli_fetch_array($Query1)){echo 'webUploads/'.$res['IDnumber'].'.'.$res['flieActualExt'].'';} ?>" class="img-responsive img-rounded"/>
  </center>

<center>
<h1>Student Data</h1>
</center>
	<table  class="gridtable" id="tableMain" ondblclick="" >

                <thead>
                    <tr>
						<th>ID Number</th>
                        <th>Fname</th>
                        <th>Lname</th>
                        <th>Mname</th>
                        <th>Email</th>
                        <th>Address</th>
						<th>BOD</th>
                        <th>Contact#</th>
                        <th>Gender</th>
						<th>Age</th>
						<th>Course</th>
                    </tr>
                </thead>
          <tbody>
 <?php 
			  

		while($res = mysqli_fetch_array($Query)){
			echo '<tr>';
			echo '<td>'.$res['IDnumber'].'</td>';
			echo '<td>'.$res['Fname'].'</td>';
			echo '<td>'.$res['Lname'].'</td>';
			echo '<td>'.$res['Mname'].'</td>';
			echo '<td>'.$res['Email'].'</td>';
			echo '<td>'.$res['Address'].'</td>';
			echo '<td>'.$res['BOD'].'</td>';
			echo '<td>'.$res['Contact'].'</td>';
			echo '<td>'.$res['Gender'].'</td>';
			echo '<td>'.$res['Age'].'</td>';
			echo '<td>'.$res['Course'].'</td>';	
			echo '</tr>';

		}
			  
		
?>             
          </tbody>
     </table>



<?php 		
if(isset($_POST['btnRequest_search'])){
$col1 = $_POST['column'];
	if ($col1 == "IDNumber") {



echo '<center>
<h1>Credentials</h1>
</center>
	<table  class="gridtable" id="tableMain" ondblclick="" >

                <thead>
                    <tr>
						<th>BirthCertificate</th>
                        <th>HighschoolDiploma</th>
                        <th>Transcript of Record</th>
                    </tr>
                </thead>
          <tbody>';			
		while($res = mysqli_fetch_array($Query2)){
			echo '<tr>';
			echo '<td>'.$res['BirthCertificate'].'</td>';
			echo '<td>'.$res['HighschoolDiploma'].'</td>';
			echo '<td>'.$res['TOR'].'</td>';
	
			echo '</tr>';

		}
			  
		

echo " </tbody>
     </table>";



	}


}
	

?>







<?php 		
if(isset($_POST['btnRequest_search'])){
$col1 = $_POST['column'];
	if ($col1 == "IDNumber") {
		// code...
echo 
'<center>
<h1>Grade Records</h1>
</center>
	<table  class="gridtable" id="tableMain" ondblclick="" >

                <thead>
                    <tr>
						<th>YearLevel</th>
                        <th>Semester</th>
                        <th>SubjectCode</th>
                        <th>Subjectname</th>
                        <th>Prelim</th>
                        <th>Midterm</th>
						<th>Final</th>
                        <th>Average</th>
						<th>Status</th>
						<th>TeacherName</th>
                    </tr>
                </thead>
          <tbody>';

		while($res = mysqli_fetch_array($QueryGrade)){
			echo '<tr>';
			echo '<td>'.$res['YearLevel'].'</td>';
			echo '<td>'.$res['Semester'].'</td>';
			echo '<td>'.$res['SubjectCode'].'</td>';
			echo '<td>'.$res['Subject'].'</td>';
			echo '<td>'.$res['Prelim'].'</td>';
			echo '<td>'.$res['Midterm'].'</td>';
			echo '<td>'.$res['Final'].'</td>';
			echo '<td>'.$res['Average'].'</td>';
			echo '<td>'.$res['Status'].'</td>';
			echo '<td>'.$res['TeacherName'].'</td>';
		
			echo '</tr>';
		}
			  
		
         
   echo       " </tbody>
        </table>";


			}
}





?>



	
	</body>
	
<script src="js/bootstrap-3.4.1.js"></script>
<script type="text/javascript">
  function btnExit()
  {
	    window.location = "Admin-Dashboard.php";
  }
</script>


<script type="text/javascript">
document.getElementById("Request_searchID2").style.visibility="hidden";
function ChangeData1() {
var eID = document.getElementById("column");
var columnVal = eID.options[eID.selectedIndex].value;

if (columnVal == "List of Student Account" || columnVal == "Student Master List" || columnVal == "List of declined registration"
	|| columnVal == "Bachelor of Science in Information Technology"|| columnVal == "Associates Information and Technology"|| columnVal == "Associates in Hotel restaurant and services"
	|| columnVal == "Bachelor of Science in Hotel restaurant and services") {
    document.getElementById("Request_searchID2").style.visibility="hidden";
  
}else{
    document.getElementById("Request_searchID2").style.visibility="visible";
 
}


}
</script>


<script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-23581568-13');
    </script>



	    <hr class="hr1"> 

	
</body>
</html>