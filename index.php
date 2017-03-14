<!DOCTYPE>
<?php 
session_start();
$con = mysqli_connect("localhost","root","","cs6400_sp17_team071");
?>
<html>
<head>

    <meta charset="UTF-8">
    <title>ASACS</title>
	<link rel="stylesheet" href="styles/style.css" media="all" />
    
</head>


<body bgcolor="#E6E6FA">
	
	<div >
		<center>
		<img src="image/logo.png">
		
		</center>
	</div>
	
	<div style="height: 50px; text-align:center;">
	
	</div>
	
	<div >
		<form method="post" action="">
			<table align="center" >
				<tr align="center">
					<td  colspan="4"><br></td>
				</tr>
				<tr >
					<td width="500px" align="right" style="font-size:20px;padding:6px;">Username </td>
					<td width="500px"align="left"><input type="text" style="font-size:20px;padding:6px;" name="username" placeholder="Enter username" size="20" ></td>
				</tr>
				<tr align="center">
					<td  colspan="4"><br></td>
				</tr>
				<tr >
					<td width="500px" align="right" style="font-size:20px;padding:6px;">Password</td>
					<td width="500px" align="left"><input type="password" style="font-size:20px;padding:6px;" name="password" placeholder="Enter password" size="20" ></td>
					<td width="100px" align="left"><a href="index.php">User Report</a></td>
				</tr>
				<tr align="center">
					<td  colspan="4"><br></td>
				</tr>
				<tr align="center">
					<td colspan="4"><input type="submit"  style="font-size:20px;padding:6px;" name="login" value="Login" ></td>
				</tr>
			</table>
		</form>
	</div>
	
	<div >
	
	<div style="height: 100px; text-align:center;">
	
	</div>
		<center> 
			<p><b>Team 071</b></p>
			<p>~~~~~~~</p>
			<p><b>CS6400 Spring</b></p>
		</center>
	</div>
	
	
<?php 
	if (isset($_POST['login'])){

		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$sel = "select * from user where username='$username' AND password='$password'";
		
		$run = mysqli_query($con, $sel);
		
		$check_customer = mysqli_num_rows($run); 
		
		if($check_customer==0){
		
			echo "<script>alert('Password or email is incorrect, plz try again!')</script>";
			exit();
		}
		else {
			$_SESSION['username']=$username;		
			##echo "<script>alert('You logged in successfully, Thanks!')</script>";
			echo "<script>window.open('home.php','_self')</script>";
		}
	}

?>
</body>
</html>