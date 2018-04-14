<?php

session_start();

$servername="127.0.0.1";
$username="root";
$password="";
$dbname="club_finance";
$connect = new mysqli("$servername",$username,$password,$dbname);  

$regno=$_POST['regno'];
$pwd=$_POST['password'];

$q1 = "SELECT * FROM login WHERE regno='".$regno."'";  
$connect->query($q1);
$result = mysqli_query($connect,$q1);
$row = mysqli_fetch_array($result); 

$name = $row['name'];

if($row['password']===$pwd)
{
	echo "<html>
		  <head>
		  <link rel='stylesheet' href='login_auth_style.css'>
		  </head>
			<body>
			<form action='main_page.php' method='POST'>
			<input type='hidden' name='regno' value='$regno' id='regno'></input>
			<input type='hidden' name='name' value='$name' id='name'></input>
			<center><br><br><br><br><br><br><br><br><br><br><h1>You have successfully logged in.</center></br></br></br></br>
			<center><button type='submit' id='submit' name='submit'>Continue</h1></button></center>
			</form>
			</body>
		  </html>";
}

else
{
	echo '<script type="text/javascript">'; 
	echo 'alert("Invalid Credentials. Please try again.");'; 
	echo 'window.location.href = "login.html";';
	echo '</script>';
}

?>

