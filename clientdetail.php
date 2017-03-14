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
		
	<div>
		<?php 
			if (isset($_GET['client_id'])){

				echo "
					<table align='center' >
						<tr >
							<td width='100px' height='40px' align='center' valign='middle' bgcolor='#ebdf92' ><b>Clientid</b></td>
							<td width='120px' height='40px' align='center' valign='middle' bgcolor='#ebdf92' ><b>IDtype</b></td>
							<td width='120px' height='40px' align='center' valign='middle' bgcolor='#ebdf92' ><b>IDstate</b></td>
							<td width='100px' height='40px' align='center' valign='middle' bgcolor='#ebdf92' ><b>Phone</b></td>
							<td width='100px' height='40px' align='center' valign='middle' bgcolor='#ebdf92' ><b>Firstname</b></td>
							<td width='100px' height='40px' align='center' valign='middle' bgcolor='#ebdf92' ><b>Lastname</b></td>
							<td width='100px' height='40px' align='center' valign='middle' bgcolor='#ebdf92' ><b>Action</b></td>
							
						</tr>
					</table>
				";
					
				$clientid=$_GET['client_id'];
				$get_cats = "select * from client where ClientID='$clientid'";
				$run_cats = mysqli_query($con, $get_cats);
							
				while ($row_cats=mysqli_fetch_array($run_cats)){
				
					$clientid = $row_cats['ClientID']; 
					$idtype = $row_cats['IDtype'];
					$idstate = $row_cats['IDstate'];
					$phonenum = $row_cats['Phonenum'];
					$firstname = $row_cats['Firstname'];		
					$lastname = $row_cats['Lastname'];	
						
					echo "
						<table align='center' >
							<tr >
								<td width='100px' height='40px' align='center' valign='middle' bgcolor='#97c4c5' >$clientid</td>
								<td width='120px' height='40px' align='center' valign='middle' bgcolor='#97c4c5' >$idtype</td>
								<td width='120px' height='40px' align='center' valign='middle' bgcolor='#97c4c5' >$idstate</td>
								<td width='100px' height='40px' align='center' valign='middle' bgcolor='#97c4c5' >$phonenum</td>
								<td width='100px' height='40px' align='center' valign='middle' bgcolor='#97c4c5' >$firstname</td>
								<td width='100px' height='40px' align='center' valign='middle' bgcolor='#97c4c5' >$lastname</td>
								<td width='100px' height='40px' align='Center' valign='middle' bgcolor='#97c4c5' ><a href='clientmodify.php?client_id=$clientid'>Modify</a></td>
							</tr>					
						</table>
					";
				}
			}
		?>
	<div>
	

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