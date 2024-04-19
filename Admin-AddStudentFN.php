<?php

	require_once("config.php");
session_start();
$varstd_IDFF = $_SESSION['Student_ID_Autoload'];
if (isset($_POST['btnSubmit'])) {
	
	$varFname= $_POST['txtFname'];
	$varLname= $_POST['txtLname'];
	$varMname= $_POST['txtMname'];
	$varGender= $_POST['txtGender'];
	$varBOD= $_POST['txtBOD'];
	$varAge= $_POST['txtAge'];
	$varCourse= $_POST['txtCourse'];
	
	$varEmail= $_POST['txtEmail'];
	$varAddress= $_POST['txtAddress'];
	$varContact= $_POST['txtContact'];
	$varBirthCertificate= $_POST['txtBirthCertificate'];
	$varHighschoolDiploma= $_POST['txtHighschoolDiploma'];
	$varTOR= $_POST['txtTOR'];
	$varNameOfEncoder = $_SESSION['username'];

	$d = strtotime('+6 hour'); //add 6hr in time
	$varIDnumber = date("YmdHis",$d);
	$varRequest_date =  date("Y-m-d H:i:s",$d);


	$imgID = $varIDnumber;
	
	$fileName = $_FILES['txtFilePicture']['name'];
	//print_r($_FILES['file']);//die();
	$fileTmpName = $_FILES['txtFilePicture']['tmp_name'];
	$fileSize = $_FILES['txtFilePicture']['size'];
	$fileError = $_FILES['txtFilePicture']['error'];
	$fileType = $_FILES['txtFilePicture']['type'];
	

	$fileExt = explode('.', $fileName);
	$flieActualExt = strtolower(end($fileExt));

	$allowed = array('jpg','jpeg','png');
 
 	$img_Upload = 'false';

	if(in_array($flieActualExt, $allowed)){
		if($fileError === 0){

			if($fileSize < 5000000){  // 1MB  = 1000000
				//$fileNameNew = uniqid('', true).".".$flieActualExt;
				$fileNameNew = 	$imgID.".".$flieActualExt;
				$fileDestanation = 'webUploads/'.$fileNameNew;
				move_uploaded_file($fileTmpName, $fileDestanation);
				//header("Location: index.php?upload=success");
				$img_Upload = 'true';
				echo "$img_Upload";
			}else{	
				echo "<script>alert('Your File is too Big!');</script>";
				echo '<button type="button" class= "btn btn-default" name="backbtn" onclick="history.go(-1);"> 
						Go Back 
			</button>';
		exit();
			}
		}else
		{
			
		echo "<script>alert('There was an error uploading your file!');</script>";
		echo '<button type="button" class= "btn btn-default" name="backbtn" onclick="history.go(-1);"> 
						Go Back 
			</button>';
		exit();
		}
	}else{
		
	echo "<button type='button' class= 'btn btn-default' name='backbtn' style= background: orange' onclick='history.go(-1);'> 
						Go Back 
			</button>";
		if($fileName == ""){
			echo "<script>alert('Please Enter Picture Attachment file');</script>";
		}else{
	echo "<script>alert('you cannot upload files of this type!!!!!');</script>";
		}
		exit();
	}
		// uploading img End---------------------------

$query = "INSERT INTO `student_list`(`IDnumber`, `Fname`, `Lname`, `Mname`, `Gender`, `BOD`, `Age`, `Course`, `Email`, `Address`, `Contact`, `BirthCertificate`, `HighschoolDiploma`, `TOR`, `NameOfEncoder`, `flieActualExt`) VALUES ('$varIDnumber','$varFname','$varLname','$varMname','$varGender','$varBOD','$varAge','$varCourse','$varEmail','$varAddress','$varContact','$varBirthCertificate','$varHighschoolDiploma','$varTOR','$varNameOfEncoder','$flieActualExt')";
//echo $query;
$result = mysqli_query($dbc,$query);
if ($result) {
	header("location: Admin-Dashboard.php");
}else{
	echo "<script>alert('There was an error to the database');</script>";
		echo '<button type="button" class= "btn btn-default" name="backbtn" onclick="history.go(-1);"> 
						Go Back 
			</button>';
			 echo " -" . mysqli_error($dbc) . " -";
}


}//end of btn submit-----------------------------------------------


if (isset($_POST['btnUpdate'])) {
	
	$varFname= $_POST['txtFname'];
	$varLname= $_POST['txtLname'];
	$varMname= $_POST['txtMname'];
	$varGender= $_POST['txtGender'];
	$varBOD= $_POST['txtBOD'];
	$varAge= $_POST['txtAge'];
	$varCourse= $_POST['txtCourse'];
	
	$varEmail= $_POST['txtEmail'];
	$varAddress= $_POST['txtAddress'];
	$varContact= $_POST['txtContact'];
	$varBirthCertificate= $_POST['txtBirthCertificate'];
	$varHighschoolDiploma= $_POST['txtHighschoolDiploma'];
	$varTOR= $_POST['txtTOR'];
	$varNameOfEncoder = $_SESSION['username'];

	$d = strtotime('+6 hour'); //add 6hr in time
	$varIDnumber = $varstd_IDFF;
	$varRequest_date =  date("Y-m-d H:i:s",$d);


	$imgID = $varIDnumber;
	$fileName = $_FILES['txtFilePicture']['name'];
	//print_r($_FILES['file']);//die();
	$fileTmpName = $_FILES['txtFilePicture']['tmp_name'];
	$fileSize = $_FILES['txtFilePicture']['size'];
	$fileError = $_FILES['txtFilePicture']['error'];
	$fileType = $_FILES['txtFilePicture']['type'];
	$fileExt = explode('.', $fileName);
	$flieActualExt = strtolower(end($fileExt));
	$allowed = array('jpg','jpeg','png');
 
 	$img_Upload = 'false';


if($fileName == ""){

	$query = "UPDATE `student_list` SET `Fname`='$varFname',`Lname`='$varLname',`Mname`='$varMname',`Gender`='$varGender',`BOD`='$varBOD',`Age`='$varAge',`Course`='$varCourse',`Email`='$varEmail',`Address`='$varAddress',`Contact`='$varContact',`BirthCertificate`='$varBirthCertificate',`HighschoolDiploma`='$varHighschoolDiploma',`TOR`='$varTOR',`NameOfEncoder`='$varNameOfEncoder' WHERE `IDnumber`='$varIDnumber'";

}else{

	if(in_array($flieActualExt, $allowed)){
		if($fileError === 0){

			if($fileSize < 5000000){  // 1MB  = 1000000
				//$fileNameNew = uniqid('', true).".".$flieActualExt;
				$fileNameNew = 	$imgID.".".$flieActualExt;
				$fileDestanation = 'webUploads/'.$fileNameNew;
				move_uploaded_file($fileTmpName, $fileDestanation);
				//header("Location: index.php?upload=success");
				$img_Upload = 'true';
				echo "$img_Upload";
			}else{	
				echo "<script>alert('Your File is too Big!');</script>";
				echo '<button type="button" class= "btn btn-default" name="backbtn" onclick="history.go(-1);"> 
						Go Back 
			</button>';
		exit();
			}
		}else
		{
			
		echo "<script>alert('There was an error uploading your file!');</script>";
		echo '<button type="button" class= "btn btn-default" name="backbtn" onclick="history.go(-1);"> 
						Go Back 
			</button>';
		exit();
		}
	}else{
		
	echo "<button type='button' class= 'btn btn-default' name='backbtn' style= background: orange' onclick='history.go(-1);'> 
						Go Back 
			</button>";
		if($fileName == ""){
			//echo "<script>alert('Please Enter Picture Attachment file');</script>";
		}else{
	echo "<script>alert('you cannot upload files of this type!!!!!');</script>";
		}
		exit();
	}
		// uploading img End---------------------------

$query = "UPDATE `student_list` SET `Fname`='$varFname',`Lname`='$varLname',`Mname`='$varMname',`Gender`='$varGender',`BOD`='$varBOD',`Age`='$varAge',`Course`='$varCourse',`Email`='$varEmail',`Address`='$varAddress',`Contact`='$varContact',`BirthCertificate`='$varBirthCertificate',`HighschoolDiploma`='$varHighschoolDiploma',`TOR`='$varTOR',`NameOfEncoder`='$varNameOfEncoder',`flieActualExt`='$flieActualExt' WHERE `IDnumber`='$varIDnumber'";
}
echo $query;
//die();
//echo $query;
$result = mysqli_query($dbc,$query);
if ($result) {

if($fileName == ""){

}else{echo '<script>  localStorage.setItem("LS_flieActualExt", "'.$flieActualExt.'"); </script>';}

	echo '<script>
			localStorage.setItem("LS_IDnumber", "'.$varIDnumber.'"); 
	        localStorage.setItem("LS_Fname", "'.$varFname.'");
	        localStorage.setItem("LS_Lname", "'.$varLname.'");
	        localStorage.setItem("LS_Mname", "'.$varMname.'");
	        localStorage.setItem("LS_Gender", "'.$varGender.'");
	        localStorage.setItem("LS_BOD", "'.$varBOD.'");
	        localStorage.setItem("LS_Age", "'.$varAge.'");
	        localStorage.setItem("LS_Email", "'.$varEmail.'");
	        localStorage.setItem("LS_Address", "'.$varAddress.'");
	        localStorage.setItem("LS_Contact", "'.$varContact.'");
	        localStorage.setItem("LS_Course", "'.$varCourse.'");
	        localStorage.setItem("LS_TOR", "'.$varTOR.'");
	        localStorage.setItem("LS_BirthCertificate", "'.$varBirthCertificate.'");
	        localStorage.setItem("LS_HighschoolDiploma", "'.$varHighschoolDiploma.'");
		</script>';

//die();
	header("location: Admin-StudentRecord.php?StudentUpdate=Success"); 
}else{
	echo "<script>alert('There was an error to the database');</script>";
		echo '<button type="button" class= "btn btn-default" name="backbtn" onclick="history.go(-1);"> 
						Go Back 
			</button>';
}


}//end of btn Update



if (isset($_POST['btnStudentDelete'])) {
$varIDnumber = $_POST['txtStudent_ID'];
$query = "DELETE FROM `student_list` WHERE `IDnumber`='$varIDnumber'";

echo $query;
$result = mysqli_query($dbc,$query);
if ($result) {

	header("location: Admin-StudentRecord.php?StudentDelete=Success"); 
}else{
	echo "<script>alert('There was an error to the database');</script>";
		echo '<button type="button" class= "btn btn-default" name="backbtn" onclick="history.go(-1);"> 
						Go Back 
			</button>';
}


}//end of btn Delete



?>