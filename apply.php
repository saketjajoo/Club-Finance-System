<?php
session_start();

$servername="127.0.0.1";
$username="root";
$password="";
$dbname="club_finance";
$connect = new mysqli("$servername",$username,$password,$dbname);  

$regno=$_POST['regno'];
$name=$_POST['name'];
$amt=$_POST['amount'];
$reason=$_POST['reason'];
$status=$_POST['status'];

date_default_timezone_set('Asia/Kolkata');
$date=date("y-m-d");
$time=date('H:i:s');

$q1 = "INSERT INTO payments VALUES ('$regno' , '$name' , '$amt' , '$reason' , '$status' , '$date' , '$time')";

if ($connect->query($q1) === TRUE) 
{
	echo "
	<html>
	<link rel='stylesheet' href='apply_style.css'>
	</br></br>
	<center>
	<div id='add'>
		Your request is added successfully.
	</div>
	</center>
	</br></br></br></br>
	
	<center>
	<form id='cont' method='POST' action='main_page.php'>
		<input type='hidden' name='regno' value='$regno' id='regno'></input>
		<input type='hidden' name='name' value='$name' id='name'></input>
		<input type='submit' value='Continue' id='sub'/>
	</form>
	<script>
	var form = document.getElementById('cont');
	document.getElementById('sub').addEventListener('click', function () {form.submit();});
	</script>
	</center>
	</html>
	";	
}

else 
    echo "Error: " . $q1 . "<br>" . $connect->error;

?>