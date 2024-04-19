<?php

function alert($msg) {
    	echo "<script type='text/javascript'>
			alert('$msg');
			</script>";
}
session_start();

require_once("config.php");
if(isset($_POST['btnLogin'])){
	$login = $_POST['username'];
	$password = $_POST['password'];
	$adminlevel = $_POST['AdminLevel'];
	$query = "SELECT * From adminuser where (username='$login' And password='$password' And auth_level= '$adminlevel')";
	$result = mysqli_query($dbc,$query);
	$numRows =mysqli_num_rows($result);
	if($numRows == 1){
		$_SESSION['username'] = $login;
		$_SESSION['password'] = $password;
		$_SESSION['AdminLevel'] = $adminlevel;
		//echo "Succes Login!!";	
		header("Location: Admin-Dashboard.php");
	}else{
		//header("Location: Admin.html");
		//alert("Failed Login!!");
echo "<script>alert('Failed Login!!!');</script>";
		echo '<button type="button" class= "btn btn-default" name="backbtn" onclick="history.go(-1);"> 
						Go Back 
			</button>';
		exit();

	}
}
?>