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
		<?php 
			if (isset($_GET['site_id'])){
	
				$siteid=$_GET['site_id'];
				$get_cats = "select * from site where SiteID='$siteid'";
				$run_cats = mysqli_query($con, $get_cats);
			
				echo "
					<table align='center' >
						<tr >
							<td width='100px' height='40px' align='center' valign='middle' bgcolor='#ebdf92' ><b>SiteID</b></td>
							<td width='200px' height='40px' align='center' valign='middle' bgcolor='#ebdf92' ><b>Facilityname</b></td>
							<td width='200px' height='40px' align='center' valign='middle' bgcolor='#ebdf92' ><b>Phone</b></td>
							<td width='150px' height='40px' align='center' valign='middle' bgcolor='#ebdf92' ><b>Street</b></td>
							<td width='150px' height='40px' align='center' valign='middle' bgcolor='#ebdf92' ><b>City</b></td>
							<td width='100px' height='40px' align='center' valign='middle' bgcolor='#ebdf92' ><b>State</b></td>
							<td width='100px' height='40px' align='Center' valign='middle' bgcolor='#ebdf92' ><b>Zipcode</td>
						</tr>
					</table>
					
				";
		
				while ($row_cats=mysqli_fetch_array($run_cats)){
				
					$siteid = $row_cats['SiteID']; 
					$facilityname = $row_cats['Facilityname'];
					$phone = $row_cats['Phone'];
					$street = $row_cats['Street'];
					$city = $row_cats['City'];		
					$state = $row_cats['State'];	
					$zipcode = $row_cats['Zipcode'];	
					
					
					echo "
						<div >
						<table align='center' >
							<tr >
								<td width='100px' height='40px' align='center' valign='middle' bgcolor='#97c4c5' >$siteid</td>
								<td width='200px' height='40px' align='center' valign='middle' bgcolor='#97c4c5' >$facilityname</td>
								<td width='200px' height='40px' align='center' valign='middle' bgcolor='#97c4c5' >$phone</td>
								<td width='150px' height='40px' align='center' valign='middle' bgcolor='#97c4c5' >$street</td>
								<td width='150px' height='40px' align='center' valign='middle' bgcolor='#97c4c5' >$city</td>
								<td width='100px' height='40px' align='center' valign='middle' bgcolor='#97c4c5' >$state</td>
								<td width='100px' height='40px' align='Center' valign='middle' bgcolor='#97c4c5' >$zipcode</td>
							</tr>
					</table>
				</div>
					";
		
				}
			}
		?>
	</div>
	
	<div style="height: 50px; text-align:center;">
	
	</div>
	
	<div >
		<?php
			if (isset($_GET['site_id'])){
			
				$siteid=$_GET['site_id'];
				$get_cats = "select * from site_services where SiteID='$siteid'";
				$run_cats = mysqli_query($con, $get_cats);
			
				echo "
					<div >
						<table align='center' >
							<tr >
								<td width='150px' height='40px' align='center' valign='middle' bgcolor='#ebdf92' ><b>SiteID</b></td>
								<td width='150px' height='40px' align='center' valign='middle' bgcolor='#ebdf92' ><b>ServiceID</b></td>
								<td width='150px' height='40px' align='center' valign='middle' bgcolor='#ebdf92' ><b>Sname</b></td>
								<td width='150px' height='40px' align='center' valign='middle' bgcolor='#ebdf92' ><b>Detail</b></td>
							</tr>
						</table>
					</div>
				";
		
				while ($row_cats=mysqli_fetch_array($run_cats)){
				
					$siteid = $row_cats['SiteID']; 
					$serviceid = $row_cats['ServiceID'];
					$sname = $row_cats['Sname'];
					
					echo "
						<div >
							<table align='center' >
								<tr >
									<td width='150px' height='40px' align='center' valign='middle' bgcolor='#97c4c5' ><b>$siteid</b></td>
									<td width='150px' height='40px' align='center' valign='middle' bgcolor='#97c4c5' ><b>$serviceid</b></td>
									<td width='150px' height='40px' align='center' valign='middle' bgcolor='#97c4c5' ><b>$sname</b></td>
									<td width='150px' height='40px' align='Center' valign='middle' bgcolor='#97c4c5' ><a href='siteservicedetail.php?site_id=$siteid&service_name=$sname'>Detail</a></td>
								</tr>
							</table>
						</div>
					";
				}
			}
		?>
	</div>
	
	<div >
		<table  align="center" >
			<tr >
				<td width="500px" height="100px" align="Center" valign="middle" >
					<h2 ><a href="home.php" style="text-decoration:none">Add a Service</a> </h2>
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