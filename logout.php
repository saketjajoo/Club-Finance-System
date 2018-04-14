<?php
session_start();

$servername="127.0.0.1";
$username="root";
$password="";
$dbname="club_finance";
$connect = new mysqli("$servername",$username,$password,$dbname);  

session_destroy();
echo "
<script>
alert('Logout Successful.');
window.location.href = 'login.html';
</script>
";

?>