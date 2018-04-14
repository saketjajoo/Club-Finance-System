<?php
session_start();

$servername="127.0.0.1";
$username="root";
$password="";
$dbname="club_finance";
$connect = new mysqli("$servername",$username,$password,$dbname);  

$regno=$_POST['regno'];
$name=$_POST['name'];

$selectdata = "SELECT money FROM funds";
$query=mysqli_query($connect,$selectdata);

echo "
<style>
@import url('https://fonts.googleapis.com/css?family=Montserrat');

body
{
	background-color:grey;
	font-family: 'Montserrat', sans-serif;
	font-size:25px;
}
input#sub
{
	background-color:#cccccc;
	padding:10px;
	cursor:pointer;
	font-size:18px;
	border:none;
	border-bottom:2px solid black;
}
</style>
";
echo "</br></br></br></br>
<center><div id='head'>
The amount remaining with the club is : 
";

while($row = mysqli_fetch_assoc($query))
{
	echo "<b>Rs. ".$row['money']."</b></div></br></br>";
}

echo "
	<center><form id='cont' method='POST' action='main_page.php'>
		<input type='hidden' name='regno' value='$regno' id='regno'></input>
		<input type='hidden' name='name' value='$name' id='name'></input>
		<input type='submit' value='Go Back' id='sub'/>
	</form></center>
	";	

?>