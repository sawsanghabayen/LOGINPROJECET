<?php 
require_once 'config.php';

session_start();
if(empty($_POST))
{
	exit;
}

if(empty($_POST['email'])||empty($_POST['password']))
{
	echo "You must enter all fields";
}


	if(ISSET($_POST['submit'])){
		$email = $_POST['email'];
		$password = $_POST['password'];
		//$username = $_POST['email'];

 
		$query = mysqli_query($conn, "SELECT * FROM `employees`
		 WHERE `ee_email` = '$email' AND `ee_pwd` = '$password'") or die("wrong query");
		$fetch = mysqli_fetch_array($query);
		$row = mysqli_num_rows($query);
 
		if($row > 0){
			$_SESSION['ee_id']=$fetch['ee_id'];
			$_SESSION['ee_fnm']=$fetch['ee_fnm'];
			$_SESSION['ee_lnm']=$fetch['ee_lnm'];

			echo "<script>alert('Login Successfully!')</script>";
			echo "<script>window.location='index.php'</script>";
		}else{
			echo "<script>alert('Invalid username or password')</script>";
			echo "<script>window.location='login.php'</script>";
		}
 
	}
	
	
 
?>