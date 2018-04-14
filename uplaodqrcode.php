<?php

session_start();

$servername="127.0.0.1";
$username="root";
$password="";
$dbname="club_finance";
$connect = new mysqli("$servername",$username,$password,$dbname);  

	$file = $_FILES['file'];
	$file_name = $file['name'];
	$file_type = $file ['type'];
	$file_size = $file ['size'];
	$file_path = $file ['tmp_name'];
	
	$regno = $_POST['regno'];
	$name = $_POST['name'];
	
	$flag=0;

	$selectdata = "SELECT regno FROM qrcodes";
	$query=mysqli_query($connect,$selectdata);	
	
	echo "
		<style>
		body
		{
			background-color:grey;
			font-family: 'Montserrat', sans-serif;
			font-size:25px;
		}
		</style>
		";
		
		
	while($row = mysqli_fetch_assoc($query))
	{
		$temp = $row['regno'];
		if($temp==$regno)
		{
			$flag=1;
			break;
		}
		else
		{
			$flag=0;
		}
	}
	
	
	if($flag==0)
	{
		if($file_name!="" && ($file_type="image/jpeg"||$file_type="image/png"||$file_type="image/gif"||$file_type="image/jpg")&& $file_size<=2014400)
			if(move_uploaded_file ($file_path,'images/'.$file_name))
				$q2 = mysqli_query($connect,"insert into qrcodes(regno,photo) values ('$regno','$file_name')");
 
			if($q2==true)
			{
				echo "File Uploaded";
				echo "
					<center><form id='cont' method='POST' action='main_page.php'>
						<input type='hidden' name='regno' value='$regno' id='regno'></input>
						<input type='hidden' name='name' value='$name' id='name'></input>
						<input type='submit' value='Go Back' id='sub'/>
					</form></center>
					";	
			}
			else
			{
				echo "
					<center><form id='cont' method='POST' action='main_page.php'>
						<input type='hidden' name='regno' value='$regno' id='regno'></input>
						<input type='hidden' name='name' value='$name' id='name'></input>
						<input type='submit' value='Go Back' id='sub'/>
					</form></center>
					";	
			}
	}
	else
	{
		
		echo "
		<style>
			h2
			{
				position:relative;
				margin-top:15%;
			}
			input#sub
			{
				background-color:grey;
				padding:10px;
				cursor:pointer;
				font-size:18px;
				border:none;
				border-bottom:2px solid black;
			}
	
			input#sub:hover
			{
				transition:all ease 0.3s;
				background-color:grey;
				padding:10px;
				cursor:pointer;
				font-size:18px;
				border:2px solid black;
			}
		</style>
		<h2>You have uploaded a QR Code earlier. You cannot upload it again.</h2>
		";
		
		
		echo "
					<center><form id='cont' method='POST' action='main_page.php'>
						<input type='hidden' name='regno' value='$regno' id='regno'></input>
						<input type='hidden' name='name' value='$name' id='name'></input>
						<input type='submit' value='Go Back' id='sub'/>
					</form></center>
					";	
	}
?>