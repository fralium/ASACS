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
	
    <div  >
		<form method="post" action="">
			<table align="center" >
				<tr >
					<td width="500px" align="right" style="font-size:20px;padding:6px;">Search Client </td>
					<td width="500px" align="left" style="font-size:20px;padding:6px;"><input type="text" style="font-size:20px;padding:6px;" name="searchkey" placeholder="Enter ID or names" size="20" ></td>
				</tr>
				<tr align="center">
					<td  colspan="4"><br></td>
				</tr>
				<tr >
					<td width="500px" align="right" style="font-size:20px;padding:6px;">Extra Keywords</td>
					<td width="500px" align="left" style="font-size:20px;padding:6px;"><input type="text" style="font-size:20px;padding:6px;" name="extrakey" placeholder="State, Phone, etc" size="20" ></td>
				</tr>
				<tr align="center">
					<td  colspan="4"><br></td>
				</tr>
				<tr align="center">
					<td colspan="4"><input type="submit"  style="font-size:20px;padding:6px;" name="search" value="Search" ></td>
				</tr>
			</table>
		</form>
	</div>
	
	<div style="height: 50px; text-align:center;">
	
	</div>	
	
	<div>
		<?php 

			if (isset($_POST['search'])){

				echo "
					<table align='center' >
						<tr >
							<td width='100px' height='40px' align='center' valign='middle' bgcolor='#ebdf92' ><b>Clientid</b></td>
							<td width='120px' height='40px' align='center' valign='middle' bgcolor='#ebdf92' ><b>IDtype</b></td>
							<td width='120px' height='40px' align='center' valign='middle' bgcolor='#ebdf92' ><b>IDstate</b></td>
							<td width='100px' height='40px' align='center' valign='middle' bgcolor='#ebdf92' ><b>Phone</b></td>
							<td width='100px' height='40px' align='center' valign='middle' bgcolor='#ebdf92' ><b>Firstname</b></td>
							<td width='100px' height='40px' align='center' valign='middle' bgcolor='#ebdf92' ><b>Lastname</b></td>
							<td width='100px' height='40px' align='Center' valign='middle' bgcolor='#ebdf92' ><b>Detail</td>
						</tr>
					</table>
				";
					
				$searchkey = $_POST['searchkey'];
				$extrakey = $_POST['extrakey'];
				
				$sel = "select * from client where ClientID like '%$searchkey%' or Firstname like '%$searchkey%' or Lastname like '%$searchkey%' ";
				$run = mysqli_query($con, $sel);
				$check_customer = mysqli_num_rows($run); 
			
				if($check_customer==0){
					echo "<script>alert('Please try using different keywords!')</script>";
					exit();
				}
				else if ($check_customer>5){
					echo "<script>alert('Please try using different keywords more than 5 !')</script>";
					exit();
				}
				else {
					while ($row_cats=mysqli_fetch_array($run)){
			
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
										<td width='100px' height='40px' align='Center' valign='middle' bgcolor='#97c4c5' ><a href='clientdetail.php?client_id=$clientid'>Detail</a></td>
									</tr>
							</table>
						";
					}
				}
			}
		?>
	</div>

	
	<div >
		<table  align="center" >
			<tr >
				<td width="500px" height="100px" align="Center" valign="middle" >
					<h2 ><a href="addnewclient.php" style="text-decoration:none">Add new client</a></h2>
				</td>
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