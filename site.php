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
	
			$sessionname=$_SESSION['username'];
			$get_cats = "select * from site";
			$run_cats = mysqli_query($con, $get_cats);
		
			echo "
				<table align='center' >
					<tr >
						<td width='100px' height='40px' align='center' valign='middle' bgcolor='#ebdf92' ><b>SiteID</b></td>
						<td width='150px' height='40px' align='center' valign='middle' bgcolor='#ebdf92' ><b>Facilityname</b></td>
						<td width='150px' height='40px' align='center' valign='middle' bgcolor='#ebdf92' ><b>Phone</b></td>
						<td width='100px' height='40px' align='center' valign='middle' bgcolor='#ebdf92' ><b>Street</b></td>
						<td width='150px' height='40px' align='center' valign='middle' bgcolor='#ebdf92' ><b>City</b></td>
						<td width='100px' height='40px' align='center' valign='middle' bgcolor='#ebdf92' ><b>State</b></td>
						<td width='100px' height='40px' align='Center' valign='middle' bgcolor='#ebdf92' ><b>Zipcode</b></td>
						<td width='150px' height='40px' align='Center' valign='middle' bgcolor='#ebdf92' ><b>Detail</b></td>
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
				<table align='center' >
					<tr >
						<td width='100px' height='40px' align='center' valign='middle' bgcolor='#97c4c5' >$siteid</td>
						<td width='150px' height='40px' align='center' valign='middle' bgcolor='#97c4c5' >$facilityname</td>
						<td width='150px' height='40px' align='center' valign='middle' bgcolor='#97c4c5' >$phone</td>
						<td width='100px' height='40px' align='center' valign='middle' bgcolor='#97c4c5' >$street</td>
						<td width='150px' height='40px' align='center' valign='middle' bgcolor='#97c4c5' >$city</td>
						<td width='100px' height='40px' align='center' valign='middle' bgcolor='#97c4c5' >$state</td>
						<td width='100px' height='40px' align='Center' valign='middle' bgcolor='#97c4c5' >$zipcode</td>
						<td width='150px' height='40px' align='Center' valign='middle' bgcolor='#97c4c5' ><a href='sitedetail.php?site_id=$siteid'>Detail</a></td>
					</tr>
				</table>
			";
			}
		?>
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