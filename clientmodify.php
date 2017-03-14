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
						<form method='post' action=''>
							<table align='center' >
								<tr >
									<td width='100px' height='40px' align='center' valign='middle' bgcolor='#97c4c5' ><input type='text' name='mclientid' value='$clientid' size='10' readonly /></td>
									<td width='120px' height='40px' align='center' valign='middle' bgcolor='#97c4c5' ><input type='text' name='midtype' value='$idtype' size='10'/></td>
									<td width='120px' height='40px' align='center' valign='middle' bgcolor='#97c4c5' ><input type='text' name='midstate' value='$idstate' size='10'/></td>
									<td width='100px' height='40px' align='center' valign='middle' bgcolor='#97c4c5' ><input type='text' name='mphonenum' value='$phonenum' size='10'/></td>
									<td width='100px' height='40px' align='center' valign='middle' bgcolor='#97c4c5' ><input type='text' name='mfirstname' value='$firstname' size='10'/></td>
									<td width='100px' height='40px' align='center' valign='middle' bgcolor='#97c4c5' ><input type='text' name='mlastname' value='$lastname' size='10'/></td>
									<td width='100px' height='40px' align='Center' valign='middle' bgcolor='#97c4c5' ><input type='submit'  name='msave' value='Save' ></a></td>
								</tr>
							</table>
						</form>
					";
				}
						
				echo "
					<table align='center' >
						<tr >
							<td width='760px' height='200px' align='left' valign='middle'  >
								<ul>
									<li>ClientID can <b>not</b> be revised!</li>
									<li>IDtype is the VARCHAR type.</li>
									<li>IDstate is the VARCHAR type.</li>
									<li>Phone is the VARCHAR type.</li>
									<li>Firstname is the VARCHAR type.</li>
									<li>Lastname is the VARCHAR type.</li>
								</ul>
							</td>
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


<?php 
	
	//_POST was used here to receive the information from the above form using the method _POST
	if(isset($_POST['msave'])){ 
	 
	//getting the text data from the fields
		$client_mclientid = $_POST['mclientid'];
		$client_midtype= $_POST['midtype'];
		$client_midstate = $_POST['midstate'];
		$client_mphonenum = $_POST['mphonenum'];
		$client_mfirstname = $_POST['mfirstname'];
		$client_mlastname = $_POST['mlastname'];
		
		
	//Update the form data to mysql database 
		$update_client  = "UPDATE client set IDtype='$client_midtype', IDstate='$client_midstate', Phonenum='$client_mphonenum', Firstname='$client_mfirstname',Lastname='$client_mlastname' where ClientID='$client_mclientid'";
		$run_client = mysqli_query($con, $update_client);
		
	//Check whether the database update is successful or not
	//yes, then show a window message
		if($run_client){
			echo "<script>alert('Client Info Has been updated successfully!')</script>";
			echo "<script>window.open('clientdetail.php?client_id=$clientid','_self')</script>";
		}
	}
?>