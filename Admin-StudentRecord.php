<?php
include("config.php"); 
session_start();
 $_SESSION['DataRefresh'] = "false";
if(isset($_POST['btnRequest_search'])){

$col1 = $_POST['column'];
$txtSearch = $_POST['txtRequest_search'];

$Query = mysqli_query($dbc,"SELECT * FROM `student_list` WHERE $col1 LIKE '%$txtSearch%'");
    if(mysqli_num_rows($Query) > 0){
        //echo "<script>alert('data Found');</script>";
    }else{ $Query = mysqli_query($dbc,"SELECT * From student_list where 1 "); 
            echo "<script>alert('data not Found');</script>";
         }
}else
{
   $Query = mysqli_query($dbc,"SELECT * From student_list where  1");  
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Admin Student Record</title>
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

.tooltip {
  position: relative;
  display: inline-block;
  border-bottom: 1px dotted black;
}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 120px;
  background-color: black;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;
  
  /* Position the tooltip */
  position: absolute;
  z-index: 1;
  top: 100%;
  left: 50%;
  margin-left: -60px;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
}


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
<a class="form-control" style=" font-weight: bold;"  href="Admin-Dashboard.php"><span>&#9776; Dashboard </span></a>
													
<a  class="form-control" style=" font-weight: bold;" href="Admin-AddStudent.php"><span>&#9776; Add Student </span></a>
												
<a  class="form-control" style=" font-weight: bold;  background-color: seagreen; " href="Admin-StudentRecord.php"><span>&#9776; Student Record </span></a>
													
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

	<div style="text-align: -webkit-center;">
        <form method="POST" >
    
            <label >Search:</label>
            <input type="text" size="50"
            maxlength="50" class="form-control"
            id="_searchID" name="txtRequest_search"  placeholder="Enter content" style="width: 50%; text-align: center;" /> 
            
            <select class="form-control" name="column" style="padding-top: 0px;padding-right: 0px;padding-bottom: 0px;padding-left: 0px;" required>
                <option value="">Select Filter</option>
                <option value="IDnumber">ID Number</option>
                <option  value="Fname">First Name</option>
                <option value="Lname">Last Name</option>
        
            </select>
            
            <button  type="submit" class= 
            "btn btn-default" name="btnRequest_search"> 
            Search
            </button>
            
        </form>
        <hr>
    </div>
<hr>

<div class="container-fluid" style="width: 95%;" >
<center>
Results =<?php echo mysqli_num_rows($Query); ?>
</center>
<table  class="gridtable" id="tableMain"  >

                <thead>
                    <tr>
                        <th>IDnumber</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Middle Name</th>
                        <th>Gender</th>               
                        <th>Age</th>
                                                       
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
            echo '<td>'.$res['Gender'].'</td>';
            echo '<td hidden >'.$res['BOD'].'</td>';
            echo '<td>'.$res['Age'].'</td>';
            echo '<td  hidden >'.$res['Email'].'</td>';
            
            echo '<td  hidden >'.$res['Address'].'</td>';
            echo '<td hidden >'.$res['Contact'].'</td>';
            echo '<td  hidden >'.$res['Course'].'</td>';
             echo '<td hidden >'.$res['BirthCertificate'].'</td>';
             echo '<td hidden >'.$res['HighschoolDiploma'].'</td>';
             echo '<td hidden >'.$res['TOR'].'</td>';
             echo '<td hidden >'.$res['flieActualExt'].'</td>';

           

            
            echo '</tr>';


        }
?>             
          </tbody>
           
     </table>
</div>
	

</div>



					</section> <!----------------------------------------------->

					

				</div>	<!-- .tm-content -->							
				
			</div>	<!-- row -->	

		</div>


<footer class="footer-link">
					<p class="tm-copyright-text">Copyright &copy; 2021 ICAS Sucat Parañaque City Branch. 
                    
                    - Digital Document</p>
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



<?php  
                        $FullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                        //Approve=Succes
                        if(strpos($FullUrl,"StudentUpdate=Success")){
                            echo "<script type='text/javascript'>alert('Student Data has been Updated');</script> ";
                        }elseif(strpos($FullUrl,"DataDelete=Success")){
                            echo "<script type='text/javascript'>alert('Student Data Deleted');</script> ";
                        }
                        
                    ?>




<script>

            //add event listener to table rows
            let thetable = document.getElementById('tableMain').getElementsByTagName('tbody')[0]; 
            for (let i = 0; i < thetable.rows.length; i++)
                {
                    thetable.rows[i].ondblclick = function()
                    {
                        TableRowClick(this);

                    };
                }                       
    
         function TableRowClick(therow) {
//                let msg = therow.cells[0].innerHTML+'*'row.cells[1].innerHTML+'*'+therow.cells[2].innerHTML+'*'+therow.cells[3].innerHTML+'*'+therow.cells[4].innerHTML+'*'+therow.cells[5].innerHTML+'*'+therow.cells[6].innerHTML+'*'+therow.cells[7].innerHTML+'*'+therow.cells[8].innerHTML+'*'+therow.cells[9].innerHTML+'*'+therow.cells[10].innerHTML+'*'+therow.cells[11].innerHTML+'*'+therow.cells[12].innerHTML;
//                alert(msg);
            //Passvalue(msg);
           Passvalue1(therow.cells[0].innerHTML,therow.cells[1].innerHTML,therow.cells[2].innerHTML,therow.cells[3].innerHTML,therow.cells[4].innerHTML,therow.cells[5].innerHTML,therow.cells[6].innerHTML,therow.cells[7].innerHTML,therow.cells[8].innerHTML,therow.cells[9].innerHTML,therow.cells[10].innerHTML,therow.cells[11].innerHTML,therow.cells[12].innerHTML,therow.cells[13].innerHTML,therow.cells[14].innerHTML);
            window.location = "Admin-StudentRecord-DataSelected.php";

            };
     
        </script>


<script>
function Passvalue1(IDnumber,Fname,Lname,Mname,Gender,BOD,Age,Email,Address,Contact,Course,BirthCertificate,HighschoolDiploma,TOR,flieActualExt){
      // var Firstname = data1 ;
        //var Firstname = document.getElementById("txt").value;
        localStorage.setItem("LS_IDnumber", IDnumber); 
        localStorage.setItem("LS_Fname", Fname);
        localStorage.setItem("LS_Lname", Lname);
        localStorage.setItem("LS_Mname", Mname);
        localStorage.setItem("LS_Gender", Gender);
        localStorage.setItem("LS_BOD", BOD);
        localStorage.setItem("LS_Age", Age);
        localStorage.setItem("LS_Email", Email);
        localStorage.setItem("LS_Address", Address);
        localStorage.setItem("LS_Contact", Contact);
        localStorage.setItem("LS_Course", Course);
        localStorage.setItem("LS_BirthCertificate", BirthCertificate);
        localStorage.setItem("LS_HighschoolDiploma", HighschoolDiploma);
        localStorage.setItem("LS_TOR", TOR);
        localStorage.setItem("LS_flieActualExt", flieActualExt);


        sessionStorage.setItem("LS_IDnumber", IDnumber); 
        sessionStorage.setItem("LS_Fname", Fname);
        sessionStorage.setItem("LS_Lname", Lname);
        sessionStorage.setItem("LS_Mname", Mname);
        sessionStorage.setItem("LS_Gender", Gender);
        sessionStorage.setItem("LS_BOD", BOD);
        sessionStorage.setItem("LS_Age", Age);
        sessionStorage.setItem("LS_Email", Email);
        sessionStorage.setItem("LS_Address", Address);
        sessionStorage.setItem("LS_Contact", Contact);
        sessionStorage.setItem("LS_Course", Course);
        sessionStorage.setItem("LS_BirthCertificate", BirthCertificate);
        sessionStorage.setItem("LS_HighschoolDiploma", HighschoolDiploma);
        sessionStorage.setItem("LS_TOR", TOR);
        sessionStorage.setItem("LS_flieActualExt", flieActualExt);

        <?php $_SESSION['DataRefresh'] = "false"; ?>

        return 0;
        }
</script>




	</body>
</html>