<?php
//use display:none instead of is else....

session_start();

$servername="127.0.0.1";
$username="root";
$password="";
$dbname="club_finance";
$connect = new mysqli("$servername",$username,$password,$dbname);  

$regno=$_POST['regno'];
$name=$_POST['name'];

if($regno=='16bci0105')
{
	echo "
	<html>
	
	<head>
	<title>WELCOME $regno! </title>
	<link rel='stylesheet' href='main_page_style.css'>
	</head>
	
	<body>
	<center>
	<div id='head'>
		<h1>Welcome to roboVITics Finance Portal</h1>
	</div>
	</center>
	
	</br></br>
	<center>
	<div id='hello'>
		Hello, $name  <span id='regno'>($regno)</span> 🙂
	</div>
	</br></br>
	</center>
	
	<center>
	<div id='menu'>
		<nav>
			<ul id='links' style='list-style:none;'>
				<li><a href='main_page.php#apply'>Apply for Reimbursement</a></li>
				<li><a href='main_page.php#view_remaining'>View Members yet to be Reimbursed</a></li>
				<li><a href='main_page.php#reimburse'>Reimburse Now</a></li>
				<li><a href='main_page.php#view_funds'>View Club Funds</a></li>
				<li><a href='main_page.php#uploadqr'>Upload PAYTM QR Code</a></li>
				<li><a href='main_page.php#logout'>Logout</a></li>
			</ul>
		</nav>
	</div>
	</center>
	
	<center>
	</br></br></br></br>
	<div id='apply'>
		<div id='apply_head'>
			<h2>Apply for Reimbursement</h2>
		</div>
		<div id='inputs' class='resize_fit_center'>
			<form id='apply' action='apply.php' method='POST'>
				<input type='text' value='$regno' name='regno' id='regno' readonly/></br>
				<input type='text' value='$name' name='name' id='name' readonly/></br>
				<input type='text' placeholder='Amount' name='amount' id='amount' required/></br>
				<input type='text' placeholder='Reason' name='reason' id='reason' required/></br>
				<!--<input type='file' name='bill_pic' accept='image/*' id='bill_pic'/></br>-->
				<input type='text' value='Pending' name='status' readonly id='pending' required/></br>
				<button type='submit' value='Submit' id='submit' name='submit'>Submit</button>
				</br></br></br></br>
			</form>
		</div>
	</div>
	</br></br>
	</center>
	
	<center>
	<div id='view_remaining'>
		<div id='view_remaining_head'></br>
			<h2>Members Yet to be Reimbursed</h2>
		</div>
		<form id='view_remaining' action='view_remaining.php' method='POST'>
			<input type='hidden' name='regno' value='$regno' id='view_remaining_regno'></input>
			<input type='hidden' name='name' value='$name' id='view_remaining_name'></input>
			</br></br>
			<input type='submit' value='Click Here to view the Members' id='view_remaining_submit' name='submit'></input>
		</form>
	</div>
	</center>
	</br></br>
	
	<center>
	<div id='reimburse'>
		<div id='reimburse_head'>
			<h2>Reimburse the Money</h2>
		</div>
		<form id='reimburse' action='reimburse.php' method='POST'>
			<input type='hidden' name='regno' value='$regno' id='regno'></input>
				<input type='text' name='reimb_regno' id='reimb_regno' placeholder='Registration Number' required></input>
			<input type='hidden' name='name' value='$name' id='name'></input>
			</br></br></br>
			<input type='submit' value='Reimburse Now' id='reimburse_submit' name='submit'></input>
		</form>
	</div>
	</center>
	</br></br>
	
	<center>
	<div id='view_funds'></br>
		<div id='view_funds_head'>
			<h2>View Club Funds</h2></br></br>
		</div>
		<form id='view_funds' action='view_funds.php' method='POST'>
			<input type='hidden' name='regno' value='$regno' id='regno'></input>
			<input type='hidden' name='name' value='$name' id='name'></input>
			<input type='submit' value='₹ View Club Funds ₹' id='view_funds_submit' name='submit'></input>
		</form>
	</div>
	</center>
	</br></br>
	
	
	<center>
	<div id='uploadqr'>
		<div id='uploadqr_head'>
			<h2>Upload PAYTM QR Code for faster Payout</h2>
		</div>
		<div id='inputs' class='resize_fit_center'>
			<form id='uploadq' action='uplaodqrcode.php' method='POST' enctype='multipart/form-data'>
				</br></br>
				<label for='file'>Upload QR Code Image : </label>
				<input type='file' name='file' id='file' required>
				<input type='hidden' name='regno' value='$regno' id='regno'></input>
				<input type='hidden' name='name' value='$name' id='name'></input>
				</br></br>
				<button type='submit' value='Submit' id='submit' name='submit'>Submit</button>
				</br></br></br></br>
			</form>
		</div>
	</div>
	</br></br>
	</center>
	
	
	<center>
	<div id='logout'></br></br>
		<div id='logout_head'>
			<h2>Logout</h2>
		</div>
		<form id='logout' action='logout.php' method='POST'>
			<input type='submit' value='Logout Now' id='logout_submit' name='submit'></input>
		</form>
	</div>
	</center>
	
	</body>
	
	</br>
	<footer>
	<div id='madeby'>Add any footer<span id='copyrights'> © Copyrights (2017 - till date)</span></div>
	</footer>
	
	</html>
	";
}

else
{
	echo "
	<html>
	
	<head>
	<title>WELCOME $regno! </title>
	<link rel='stylesheet' href='main_page_style.css'>
	</head>
	
	<body>
	<center>
	<div id='head'>
		<h1>Welcome to roboVITics Finance Portal</h1>
	</div>
	</center>
	
	</br></br>
	<center>
	<div id='hello'>
		Hello, $name  <span id='regno'>($regno)</span> 😃
	</div>
	</br></br>
	</center>
	
	<center>
	<div id='menu'>
		<nav>
			<ul id='links' style='list-style:none;'>
				<li><a href='main_page.php#apply'>Apply for Reimbursement</a></li>
				<li><a href='main_page.php#view_funds'>View Club Funds</a></li>
				<li><a href='main_page.php#uploadqr'>Upload PAYTM QR Code</a></li>
				<li><a href='main_page.php#logout'>Logout</a></li>
			</ul>
		</nav>
	</div>
	</center>
	
	<center>
	</br></br></br></br>
	<div id='apply'>
		<div id='apply_head'>
			<h2>Apply for Reimbursement</h2>
		</div>
		<div id='inputs' class='resize_fit_center'>
			<form id='apply' action='apply.php' method='POST'>
				<input type='text' value='$regno' name='regno' id='regno' readonly/></br>
				<input type='text' value='$name' name='name' id='name' readonly/></br>
				<input type='text' placeholder='Amount' name='amount' id='amount' required/></br>
				<input type='text' placeholder='Reason' name='reason' id='reason' required/></br>
				<!--<input type='file' name='bill_pic' accept='image/*' id='bill_pic'/></br>-->
				<input type='text' value='Pending' name='status' readonly id='pending' required/></br>
				<button type='submit' value='Submit' id='submit' name='submit'>Submit</button>
				</br></br></br></br>
			</form>
		</div>
	</div>
	</br></br>
	</center>
	
	<center>
	<div id='view_funds'></br>
		<div id='view_funds_head'>
			<h2>View Club Funds</h2></br></br>
		</div>
		<form id='view_funds' action='view_funds.php' method='POST'>
			<input type='hidden' name='regno' value='$regno' id='regno'></input>
			<input type='hidden' name='name' value='$name' id='name'></input>
			<input type='submit' value='₹ View Club Funds ₹' id='view_funds_submit' name='submit'></input>
		</form>
	</div>
	</center>
	</br></br>
	
	
	<center>
	</br></br></br></br>
	<div id='uploadqr'>
		<div id='uploadqr_head'>
			<h2>Upload PAYTM QR Code for faster Payout</h2>
		</div>
		<div id='inputs' class='resize_fit_center'>
			<form id='uploadq' action='uplaodqrcode.php' method='POST' enctype='multipart/form-data'>
				</br></br>
				<label for='file'>Upload QR Code Image : </label>
				<input type='file' name='file' id='file'>
				<input type='hidden' name='regno' value='$regno' id='regno'></input>
				<input type='hidden' name='name' value='$name' id='name'></input>
				</br></br>
				<button type='submit' value='Submit' id='submit' name='submit'>Submit</button>
				</br></br></br></br>
			</form>
		</div>
	</div>
	</br></br>
	</center>
	
	<center>
	<div id='logout'></br></br>
		<div id='logout_head'>
			<h2>Logout</h2>
		</div>
		<form id='logout' action='logout.php' method='POST'>
			<input type='submit' value='Logout Now' id='logout_submit' name='submit'></input>
		</form>
	</div>
	</center>
	
	</body>
	
	</br>
	<footer>
	<div id='madeby'>Add any footer<span id='copyrights'> © Copyrights (2017 - till date)</span></div>
	</footer>
	
	</html>
	";
}

?>