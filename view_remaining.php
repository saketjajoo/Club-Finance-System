<?php
session_start();

$servername="127.0.0.1";
$username="root";
$password="";
$dbname="club_finance";
$connect = new mysqli("$servername",$username,$password,$dbname);  

$flag=0;
echo "<link rel='stylesheet' href='view_remaining_style.css'>";

$regno=$_POST['regno'];
$name=$_POST['name'];

$selectdata = "SELECT regno,name,amount FROM payments WHERE status='Pending'";
$query=mysqli_query($connect,$selectdata);

echo "<center><div id='view_rem'><table>";
	echo "<tr>
		<td><b>Registration Number</b></td>
		<td><b>Name</b></td>
		<td><b>Amount</b></td>
	</tr>";

while($row = mysqli_fetch_assoc($query))
{
	if($row['regno']=='')
	{
		$flag=1;
		break;
	}
	else
	{
		echo "<tr>
			<td align='center'>" .$row['regno']. "</td>
			<td align='center'>" .$row['name']. "</td>
			<td align='center'>" .$row['amount']. "</td>
			</tr>
		";
	}
}
echo "</table></div>";
if($flag==1)
{
	echo "
	<script>
	document.getElementById('view_rem').style.display='none';
	</script>
	";
	
	echo "
	</br></br></br>
	<h3>No values to display.</h3>
	";
}

echo "
	<form id='cont' method='POST' action='main_page.php'>
		<input type='hidden' name='regno' value='$regno' id='regno'></input>
		<input type='hidden' name='name' value='$name' id='name'></input>
		</br></br></br>
		<input type='submit' value='Continue' id='sub'/>
	</form>
	";	

?>