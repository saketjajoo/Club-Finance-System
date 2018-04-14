<?php
session_start();

$servername="127.0.0.1";
$username="root";
$password="";
$dbname="club_finance";
$connect = new mysqli("$servername",$username,$password,$dbname);  
$new_connect = new mysqli("$servername",$username,$password,$dbname);

$regno=$_POST['regno'];
$reimb_regno=$_POST['reimb_regno'];
$name=$_POST['name'];

echo "<link rel='stylesheet' href='reimburse_style.css'>";

date_default_timezone_set('Asia/Kolkata');
$date=date("y-m-d");
$time=date('H:i:s');

$selectdata = "SELECT name,amount,status FROM payments WHERE regno='" . $_POST['reimb_regno'] . "' AND status='Pending'";
$funds_avai = "SELECT money FROM funds";


$query=mysqli_query($connect,$selectdata);
$fun=mysqli_query($connect,$funds_avai);

$flag=0;

echo "<center><div id='reimburse'><table>";
	echo "<tr>
		<td><b>Name</b></td>
		<td><b>Amount</b></td>
		<td><b>Status</b></td>
	</tr>";

	
while($row = mysqli_fetch_assoc($query))
{
	echo "<center><tr>";
	$money_tobe_reimb = $row['amount'];
	if($row['name']=="")
	{
		$flag=1;
		break;
	}
	echo "<td>" .$row['name']. "</td>";
	echo "<td>" .$row['amount']. "</td>";
	echo "<td>" .$row['status']. "</td></center>";
	
	
	while($funds_row = mysqli_fetch_assoc($fun))
	{
		$funds_available = $funds_row['money'];
	}
	
	

	if($row['status']==='Pending')
	{	
		if($row['amount']<=$funds_available)
		{
			$remaining = $funds_available - $money_tobe_reimb;
			$done = 'Done';

			$status_alter_query="UPDATE `payments` SET `status`='Done',`date`='$date',`time`='$time' WHERE `regno`='$reimb_regno' AND `amount`='$money_tobe_reimb';";
			$hello=mysqli_query($connect,$status_alter_query);
			if($connect->query($hello) === TRUE)
				echo "<br>"."Member status has been updated successfully.";	

			$funds_alter_query = "UPDATE funds SET money = $remaining;";			
			$q1=mysqli_query($connect,$funds_alter_query);
			if ($connect->query($q1) === TRUE)
				echo "<br>"."Club funds have been updated successfully.";

					
			
			echo "Club Funds remaining after the reimnursement : Rs. ".$remaining."</br></br>";			
			
			echo "</br></br>
				<form id='cont' method='POST' action='main_page.php'>
					<input type='hidden' name='regno' value='$regno' id='regno'></input>
					<input type='hidden' name='name' value='$name' id='name'></input>
					<input type='submit' value='Reimburse Now' id='sub'/>
				</form>
				";
		}
		else
		{
			echo "Since the club does not have enough funds, try again later.";
			echo "
				<form id='cont' method='POST' action='main_page.php'>
					<input type='hidden' name='regno' value='$regno' id='regno'></input>
					<input type='hidden' name='name' value='$name' id='name'></input>
					<input type='submit' value='Reimburse Now' id='sub'/>
				</form>
				";
		}
	}	
	else
	{
		
		
		echo "
				<form id='cont' method='POST' action='main_page.php'>
					<input type='hidden' name='regno' value='$regno' id='regno'></input>
					<input type='hidden' name='name' value='$name' id='name'></input>
					<input type='submit' value='Reimburse Now' id='sub'/>
				</form>
				";
	}
}	

if($flag==1)
{
	echo "
	<script>
	document.getElementById('reimburse').style.display='none';
	</script>
	";
	echo "
				<form id='cont' method='POST' action='main_page.php'>
					<input type='hidden' name='regno' value='$regno' id='regno'></input>
					<input type='hidden' name='name' value='$name' id='name'></input>
					<input type='submit' value='Reimburse Now' id='sub'/>
				</form>
				";
}
?>