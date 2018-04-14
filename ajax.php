<?php

session_start();

$servername="127.0.0.1";
$username="root";
$password="";
$dbname="club_finance";
$connect = new mysqli("$servername",$username,$password,$dbname);  



$a = array();
$i=0;
$q = $_GET["reimb_regno"];

$sql = "select * from payments where regno like '$q%' and status='Pending' ";
$result = mysqli_query($connect,$sql);
while($row = mysqli_fetch_assoc($result))
{
	$a[$i] = $row['regno'];
	$i=$i+1;
}

$i=0;
$hint = array();

// lookup all hints from array if $q is different from ""
if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    foreach($a as $name) {
        if (stristr($q, substr($name, 0, $len))) {
            if ($hint[$i] === "") {
                $hint[$i] = $name;
				$i=$i+1;
            } else {
                $hint[$i] .= "$name";
				$i+=1;
            }
        }
    }
}

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "no suggestion" : $hint;
?>