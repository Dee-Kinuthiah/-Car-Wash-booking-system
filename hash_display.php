<html>
<head>
	<title>Admin insertion</title>
</head>
<body>
	<h1>Insert in Admin</h1>
	<form action='' method='post'>
		<label for='password'>Password</label>
		<input type='password' name='password' maxlength='16' value='password'/></br> 
		<input type='submit' value='Hash pswd' name='password'/>
	</form>
</body>
</html>
<?php
if (isset($_POST['password']) and ($_POST['password']=='Hash pswd')){
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
		$pass=mysqli_real_escape_string($mysql, $_POST['password']);
		$hash_pass=sha1($pass);
		//select Data from processing Table
		$query= "update login set password='$hash_pass' where id=1";
	 	echo "<script> alert('Password hashed successfully');</script>";

	 	mysql_close($mysql);
	 	header('Location:adminpanel.php');
	}
?>