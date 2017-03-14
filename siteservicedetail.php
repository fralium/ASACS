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
	
			$siteid=$_GET['site_id'];
			$get_cats = "select * from site where SiteID='$siteid'";
			$run_cats = mysqli_query($con, $get_cats);
		
			echo "
				<table align='center' >
					<tr >
						<td width='100px' height='40px' align='center' valign='middle' bgcolor='#ebdf92' ><b>Site ID</b></td>
						<td width='200px' height='40px' align='center' valign='middle' bgcolor='#ebdf92' ><b>Facility name</b></td>
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
				
				";
			}
		?>
	</div>
	
	
	<div style="height: 50px; text-align:center;">
	
	</div>
	
	<div >
		<?php
			
			$siteid = $_GET['site_id'];
			$servicename = $_GET['service_name'];
			$get_cats = "select * from site_services where SiteID='$siteid' AND Sname='$servicename'";
	
			$run_cats = mysqli_query($con, $get_cats);
			$row_cats = mysqli_fetch_array($run_cats);	
			
			$siteid = $row_cats['SiteID']; 
			$serviceid = $row_cats['ServiceID'];
			$sname = $row_cats['Sname'];
		
			if ($servicename == "Shelter"){
				
				// Acquiring bunk Infor 
				$get_bunk = "select * from bunk where ServiceID='$serviceid' ";
				$run_bunk = mysqli_query($con, $get_bunk);
			
				echo "
					<table align='center' >
						<tr >
							<td width='150px' height='40px' align='center' valign='middle' bgcolor='#ebdf92' ><b>Site ID</b></td>
							<td width='150px' height='40px' align='center' valign='middle' bgcolor='#ebdf92' ><b>Service ID</b></td>
							<td width='150px' height='40px' align='center' valign='middle' bgcolor='#ebdf92' ><b>Service name</b></td>
							<td width='150px' height='40px' align='center' valign='middle' bgcolor='#ebdf92' ><b>Bunk ID</b></td>
							<td width='150px' height='40px' align='center' valign='middle' bgcolor='#ebdf92' ><b>Bunk Num</b></td>
							<td width='150px' height='40px' align='center' valign='middle' bgcolor='#ebdf92' ><b>Bunk Type</b></td>
						</tr>
					</table>
				";
			
				while ($row_bunk = mysqli_fetch_array($run_bunk)){
	
					$bunkid = $row_bunk['BunkID']; 
					$bunknum = $row_bunk['Bunknum'];
					$bunktype = $row_bunk['Bunktype'];
		
					echo "
						<table align='center' >
							<tr >
								<td width='150px' height='40px' align='center' valign='middle' bgcolor='#97c4c5' ><b>$siteid</b></td>
								<td width='150px' height='40px' align='center' valign='middle' bgcolor='#97c4c5' ><b>$serviceid</b></td>
								<td width='150px' height='40px' align='center' valign='middle' bgcolor='#97c4c5' ><b>$servicename</b></td>
								<td width='150px' height='40px' align='center' valign='middle' bgcolor='#97c4c5' ><b>$bunkid</b></td>
								<td width='150px' height='40px' align='center' valign='middle' bgcolor='#97c4c5' ><b>$bunknum</b></td>
								<td width='150px' height='40px' align='center' valign='middle' bgcolor='#97c4c5' ><b>$bunktype</b></td>
							</tr>
						</table>				
					";
				}
				
				echo "
					<div style='height: 50px; text-align:center;'>
	
					</div>
				";
				
				// Acquiring Room Infor from Shelter
				$get_room = "select * from room where ServiceID='$serviceid' ";
				$run_room = mysqli_query($con, $get_room);
			
				echo "
					<table align='center' >
						<tr >
							<td width='150px' height='40px' align='center' valign='middle' bgcolor='#ebdf92' ><b>Site ID</b></td>
							<td width='150px' height='40px' align='center' valign='middle' bgcolor='#ebdf92' ><b>Service ID</b></td>
							<td width='150px' height='40px' align='center' valign='middle' bgcolor='#ebdf92' ><b>Service name</b></td>
							<td width='150px' height='40px' align='center' valign='middle' bgcolor='#ebdf92' ><b>Room ID</b></td>
							<td width='150px' height='40px' align='center' valign='middle' bgcolor='#ebdf92' ><b>Room Num</b></td>
							
						</tr>
					</table>
				";
			
				while ($row_room = mysqli_fetch_array($run_room)){
	
					$roomid = $row_room['RoomID']; 
					$roomnum = $row_room['Roomnum'];

					echo "
						<table align='center' >
							<tr >
								<td width='150px' height='40px' align='center' valign='middle' bgcolor='#97c4c5' ><b>$siteid</b></td>
								<td width='150px' height='40px' align='center' valign='middle' bgcolor='#97c4c5' ><b>$serviceid</b></td>
								<td width='150px' height='40px' align='center' valign='middle' bgcolor='#97c4c5' ><b>$servicename</b></td>
								<td width='150px' height='40px' align='center' valign='middle' bgcolor='#97c4c5' ><b>$roomid</b></td>
								<td width='150px' height='40px' align='center' valign='middle' bgcolor='#97c4c5' ><b>$roomnum</b></td>
							</tr>
						</table>				
					";
				}
				} else if ($servicename == "Soup Kitchen"){
				
				$get_soup = "select * from soupkitchen where ServiceID='$serviceid' ";
				$run_soup = mysqli_query($con, $get_soup);
			
				echo "
					<table align='center' >
						<tr >
							<td width='150px' height='40px' align='center' valign='middle' bgcolor='#ebdf92' ><b>SiteID</b></td>
							<td width='150px' height='40px' align='center' valign='middle' bgcolor='#ebdf92' ><b>ServiceID</b></td>
							<td width='150px' height='40px' align='center' valign='middle' bgcolor='#ebdf92' ><b>Sname</b></td>
							<td width='150px' height='40px' align='center' valign='middle' bgcolor='#ebdf92' ><b>Seat Available</b></td>
							<td width='150px' height='40px' align='center' valign='middle' bgcolor='#ebdf92' ><b>Total Seats</b></td>
						</tr>
					</table>
				";
			
				while ($row_soup = mysqli_fetch_array($run_soup)){
	
					$seatavail = $row_soup['Seatavail']; 
					$totalseat = $row_soup['Totalseat'];
							
					echo "
						<table align='center' >
							<tr >
								<td width='150px' height='40px' align='center' valign='middle' bgcolor='#97c4c5' ><b>$siteid</b></td>
								<td width='150px' height='40px' align='center' valign='middle' bgcolor='#97c4c5' ><b>$serviceid</b></td>
								<td width='150px' height='40px' align='center' valign='middle' bgcolor='#97c4c5' ><b>$servicename</b></td>
								<td width='150px' height='40px' align='center' valign='middle' bgcolor='#97c4c5' ><b>$seatavail</b></td>
								<td width='150px' height='40px' align='center' valign='middle' bgcolor='#97c4c5' ><b>$totalseat</b></td>
							</tr>
						</table>				
					";
					
				} 
			} else if ($servicename == "Food Bank"){
				
				$get_bank = "select * from foodbank where ServiceID='$serviceid' ";
				$run_bank = mysqli_query($con, $get_bank);
			
				echo "
					<table align='center' >
						<tr >
							<td width='150px' height='40px' align='center' valign='middle' bgcolor='#ebdf92' ><b>SiteID</b></td>
							<td width='150px' height='40px' align='center' valign='middle' bgcolor='#ebdf92' ><b>ServiceID</b></td>
							<td width='150px' height='40px' align='center' valign='middle' bgcolor='#ebdf92' ><b>Sname</b></td>
							
						</tr>
					</table>
				";
			
				while ($row_bank = mysqli_fetch_array($run_bank)){
	
											
					echo "
						<table align='center' >
							<tr >
								<td width='150px' height='40px' align='center' valign='middle' bgcolor='#97c4c5' ><b>$siteid</b></td>
								<td width='150px' height='40px' align='center' valign='middle' bgcolor='#97c4c5' ><b>$serviceid</b></td>
								<td width='150px' height='40px' align='center' valign='middle' bgcolor='#97c4c5' ><b>$servicename</b></td>
								
							</tr>
						</table>				
					";
					
				} 
			}
		?>
	</div>
	
	<div >
		<table  align="center" >
			<tr >
				<td width="500px" height="100px" align="center" valign="middle" >
					<h2 ><a href="site.php" style="text-decoration:none">Site</a> </h2>
				</td>
				<td width="500px" height="100px" align="Center" valign="middle" >
					<h2 ><a href="home.php" style="text-decoration:none">HOME</a> </h2>
				</td>
			</tr>
		</table>
	</div>

</body>

</html>