<!DOCTYPE>
<?php 
	session_start();
	$con = mysqli_connect("localhost","root","","cs6400_sp17_team071");
?>
<html>

<head>

    <meta charset="UTF-8">
    <title>ASACS</title>
	
</head>

<body bgcolor="#fafbfd">

	<div >
		<center>
		<img src="image/logo.png">
		
		</center>
	</div>

	<div style="height: 50px; text-align:center;">
	
	</div>
	
	<div style="height: 100px; text-align:center;">
		<?php 
			if(!isset($_SESSION['username'])){
				session_destroy();
				echo "<script>window.open('index.php','_self')</script>";
			}
			else {
				echo "
					<div >
						<table align='center' >
							<tr >
								<td style='text-align: center;width:500px; height:50px;font-size:30px;padding:6px; background-color: #ebdf92; vertical-align: middle;' > Current User:   " .$_SESSION['username']. "</td>
								<td style='text-align: center;width:500px; height:50px;font-size:30px;padding:6px; background-color: #ebdf92; vertical-align: middle;' > <a href='logout.php' >Logout</a></td>
							</tr>
						</table>
					</div>
				";
				
			}
		?>
	</div>
	
	<div >
		<table align="center" >
			<tr >
				<td style="text-align: center;width:500px; height:100px;font-size:30px;padding:6px; background-color: #97c4c5; vertical-align: middle;"> <a href="user.php">Account Info</a></td>
				<td style="text-align: center;width:500px; height:100px;font-size:30px;padding:6px; background-color: #97c4c5;  vertical-align: middle;"> <a href="report.php">Report</a></td>
			</tr>
			<tr >
				<td style="text-align: center;width:500px; height:100px;font-size:30px;padding:6px; background-color: #97c4c5;  vertical-align: middle;"> <a href="site.php">Site Info</a></td>
				<td style="text-align: center;width:500px; height:100px;font-size:30px;padding:6px; background-color: #97c4c5;  vertical-align: middle;"> <a href="client.php">Client Info</a></td>
			</tr>
		</table>
	</div>
	
	<div >
		<table  align="center" >
		<tr >
			<td width="500px" height="100px" align="Center" valign="middle" >
				<h2 ><a href="home.php" style="text-decoration:none">HOME</a> </h2>
			</td>
		</tr>
	</table>
	</div>

	


</body>

</html>