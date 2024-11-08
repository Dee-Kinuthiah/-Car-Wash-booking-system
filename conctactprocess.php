
<?php
//set up for mysql Connection
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
//test if the connection is established successfully then it will proceed in next process else it will throw an error message
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}

//we specify here the Database name we are using
mysql_select_db('car');
$f_name=mysql_real_escape_string($_POST['f_name']);
$l_name=mysql_real_escape_string($_POST['l_name']);
$e_address=mysql_real_escape_string($_POST['e_address']);
$msg=mysql_real_escape_string($_POST['msg']);

//Protecting form submitting an empty data

if (!$first_name || !$last_name || !$email_address || !$message )
	{
	echo'<body bgcolor="green">';
	echo'<center>';
	echo "<h2>Please enter the required details</h2>";
	echo "<br/>";
	echo "<br/>";
	echo "<font size='5'>"."Click" . "<a href='contact.php'>"."  ". "here"  . "</a>"  . "  " . "to contact"."</font>";
	echo'</center>';
	echo'</body>';

	exit;
	}

//It wiil insert a row to our comment_details`
$sql = "INSERT INTO  `car`.`contact` (`first_name`, `last_name`, `email_address`, `message` ) 
	VALUES ('{$f_name}','{$l_name}','{$e_address}', '{$msg}');";
//we are using mysql_query function. it returns a resource on true else False on error
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not enter data: ' . mysql_error());
}
?>
					<script type="text/javascript">
						alert("New Record is Added thank you");
						window.location = "contact.php";
					</script>
					<?php
//close of connection
mysql_close($conn);
?>