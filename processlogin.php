<?php
session_start();
$username=$_POST['Username'];
$password=$_POST['Password'];
//$password=sha1($password);

//Connect to Database.
$mysql=mysqli_connect('localhost','root',''); 
if(!$mysql)
{
echo 'Can not Connect';
exit;
}
//Select database to use
$select=mysqli_select_db($mysql,'car');
if(!$select)
{
die('Cannot Connect:'.mysqli_error());
exit;
}

//select Data from processing Table
$query="select * from login where Username='$username' and password='$password'";
$result=mysqli_query($mysql,$query);
if(!$result)
{
echo 'Wrong Username or Password <br/>';
echo 'Please Enter Correct Username and Password';
exit;
}
$row=mysqli_fetch_row($result);
$count=$row[0];
if($count>0)
{
$_SESSION['admin']=1;
header("location:adminpanel.php");
echo "Logged in.";

}
else
{
	echo'<body bgcolor="silver">';
	echo'<center>';
	echo "<center></h1>Access Denied Verify your username and password</h1></center>"."<br />";
			echo "<center></h6>Please wait while you are redirected in 3 seconds</h6></center>"."<br />";
			header('Refresh: 3; url=login.php');
	echo'</center>';
	echo'</body>';
}


?>