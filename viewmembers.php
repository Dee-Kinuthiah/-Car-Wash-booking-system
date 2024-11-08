<html>
<head>
  <title>View Members </title>
   <link rel="stylesheet" media="screen" href="login.css" >
</head>
<body>
	<table align='center' border='0' bgcolor='green' width='1200' cellpadding='8' cellspacing='0' height='200'>
          <tr>
            <td bgcolor='#999999' valign='center'>

<?php
$host="localhost";
$username="root";
$password="";
$db_name="carsystem";
$tbl_name="members";

$conn = new mysqli($host, $username, $password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sel = $conn->query("SELECT * FROM $tbl_name");

echo"<table align='center' width='100%' border='0' cellpadding='3' cellspacing='2' bgcolor='green'>
<caption><h3>MEMBERS  INFORMATION</h3></caption>
<tr bgcolor='green'>
<th width='3%'>Id</th>
<th width='10%'>First Name</th>
<th width='10%'>Last Name</th>
<th width='10%'>Email</th>
<th width='10%'>salt</th>
<th width='10%'>password</th>
</tr>";

while($row = $sel->fetch_assoc()) {
    echo "<tr bgcolor='white'>";
    echo  "<td width='3%'>".$row ['id']."</td>";
    echo  "<td width='3%'>".$row ['fname']."</td>";
    echo  "<td width='10%'>".$row ['lname']."</td>";
    echo  "<td width='7%'>".$row ['email']."</td>";
    echo  "<td width='10%'>".$row ['salt']."</td>";
    echo  "<td width='7%'>".$row ['password']."</td>";

    echo "</tr>";
}
echo"</table>";

$conn->close();
?>

<br/>
			</td>
          </tr>
          <tr>
			<td align="center"><a href="adminpanel.php" target="_parent">Panel Admin <b>|</b></a>
	
			<a href="index.php" target="_parent">Log out</a></td>
		
          </tr>
          <tr>
            <td align='center' bgcolor='#3a4c38' height='1'>
					&copy; 2014 
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					Copyright  Online Car wash Booking. All Rights Reserved
            </td>
          </tr>
	</table>
</body>
</html>