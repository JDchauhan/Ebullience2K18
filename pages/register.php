<?php
session_start();
$name=$_POST['name'];
$clg=$_POST['clg_name'];
$email=$_POST['email'];
$roll=$_POST['roll_no'];
$mobno=$_POST['mobno'];
$pass=$_POST['pass'];

$otp=rand(10000,99999);
$_SESSION['otp']=$otp;
$state=0;

if (isset($_POST['submit'])) 
{
	require("db_connect.php");

	$conn=mysqli_connect($servername,$username,$password,$dbname);

	$query='INSERT INTO login (name,clg,email,rollno, mobno,pass, hash, state) VALUES ('.$name.','.$clg.'.'.$email.','.$roll.','.$mobno.','.$pass.','.$hash.','.$state.')';

	if(mysqli_query($query,$conn))
	{

		header("location:verify.php");	
	}
	else
	{
		header("location:error.php");
	}

?>