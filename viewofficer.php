<html>
<head>
  <title>View Contact </title>
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
$db_name="car";
$tbl_name="conctact";

mysql_connect("$host","$username","$password") or die("cannot connect");
mysql_select_db("$db_name")or die("cannot connect");

$sel= mysql_query("select * from $tbl_name");
echo"<table align='center' width='100%' border='0' cellpadding='3' cellspacing='2' bgcolor='gr'>
<caption><h3>CONACTAC INFORMATION</h3></caption>
<tr bgcolor='green'>
<th width='3%'> id</th>
<th width='10%'>First_Name</th>
<th width='15%'>Last_Name</th>
<th width='10%'>E-mail</th>
<th width='10%'>Message</th>
</tr>";

   while($row=mysql_fetch_array ($sel))
{
echo "<tr bgcolor='white'>";

echo  "<td width='3%'>".$row ['id']."</td>";
echo  "<td width='10%'>".$row ['fisrt_name']."</td>";
echo  "<td width='7%'>".$row ['last_name']."</td>";
echo  "<td width='10%'>".$row ['email_address']."</td>";
echo  "<td width='10%'>".$row ['message']. "</td>";

echo "</tr>";
}
echo"</table>";

?>

<br/>
			</td>
          </tr>
          <tr>
			<td align="center"><a href="adminpanel.php" target="_parent">Panel Admin <b>|</b></a>
			<a href="index.php" target="_parent">Log out</a></td>
		
          </tr>
          <tr>
            <td align='center' bgcolor='white' height='1'>
					&copy; 2014 
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					Copyright  Online Car wash Booking. All Rights Reserved
            </td>
          </tr>
	</table>
</body>
</head>
</html>