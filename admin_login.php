<?php 
session_start();
	include('conn.php');
	
	$valid_email="";
	if(isset($_POST['SUBMIT']) && $_POST['SUBMIT']=='Login')
	{
		$admin_email=$_POST['admin_email'];
		$psw=$_POST['psw'];
		
		$sel="SELECT * FROM admin_login WHERE admin_email='$admin_email'";
		$res=mysql_query($sel) or mysql_error();
		$fet=mysql_fetch_array($res);
		$row=mysql_num_rows($res);
		if($row>0)
		{
			if($psw==$fet['psw'])
			{
				echo "session = ".$_SESSION['admin_email']=$email;
				
				echo "<script>alert('Logged In');
					window.location='adminpanel.php'
				</script>";		
			}
			else
			{	
				$valid_email=$admin_email;
				echo "<script>alert('Password is Incorrect');
				</script>";
			}
		}
		else
		{
			echo "<script>alert('Access Denied');
			</script>";
		}
		
	}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Dee'nga Car wash</title>
<style type="text/css">
	.button
	{
		margin-right:50px;
		height:30px;
		width:100px;
		background-color:#0000FF;
		color:#999999;
		border:#999999 solid 2px;
		border-radius:10px;
	}
	</style>
</head>

<body>
	<form name="frn_login"  method="post">
		<table width="553" height="279" border="1" align="center" rules="groups">
			<tr bgcolor="#0000FF">
				<th height="52" colspan="2" bgcolor="#339900" style="color:blue"><h1>Admin Login</h1></th>
			</tr>
			<tr>
				<td colspan="2"><?php echo $_SESSION['msg'];?></td>
			</tr>
			<tr>
				<td width="149" height="51"><b><u>E</u></b>mail</td>
				<td width="388"><input type="text" name="admin_email" value="<?php if(isset($valid_email)) echo $valid_email; ?>"/></td>
			</tr>
			<tr>
				<td height="66"><b><u>P</u></b>assword</td>
				<td><input type="password" name="psw" /></td>
			</tr>
			
			<tr>
            <td colspan="2" align="center" bgcolor="#339900"><a href="index.php"><strong>Home page</strong></a>
		  </tr>
				<td height="44" colspan="2" align="center"><input type="submit" name="SUBMIT" value="Login" class="button" /></td>
				
		</table>
	</form>
</body>
</html>
<?php 

?>