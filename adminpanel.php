<?php
	session_start();
	if (!(isset($_SESSION['admin']) and ($_SESSION['admin']==1))){
		header('Location:index.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Administrator control pannel</title>
   <link rel="stylesheet" media="screen" href="login.css" >
</head>
<body>
	<table align='center' border='0' bgcolor='#3a4c38' width='920' cellpadding='10' cellspacing='0' height='55'>
          
		  <tr>
            <td colspan='5'width='0.5' height='0.1'><img src='ad2.jpg'></td>
          </tr>
		  <tr>
            <td colspan="7" bgcolor="#yellow" height="1" align="left">
		      <h1><font size="5">
	           <a href="index.php">Home</a> | 
              			   
		        <a href="search-form.php">Search </a> |
		        
		        </font></h1>
            </td>
			 </td>
		 
            <td height='1' colspan='3' align='right' bgcolor="#3a4c38"></td>
			
          </tr>
		 
          <tr>
		 
            <td width='4%' bgcolor='#3a4c38' valign='top'>
<h3 align='center'  title='You should be online'>&nbsp;</h3></td>

            <td width='71%' valign='top' bgcolor="#FFFFFF">

<p align='center'>
 

<h3 align='center'>&nbsp;</h3>
<br/>
<h3 align='center'>ABOUT OUR SERVICES </h3>
<P align='justify'><font face='Arial, Helvetica, sans-serif'>The system enable an Administrator to provide services to users nd here the administrator can 
	add and upload information, update, delete, view the record added. The administrator can also change his account for more security.
</font></p>

		<br>
			</td>
            <td width='25%' bgcolor='white'  valign='top'>
			
	
<table border='0' align='center'>
<tr>
<td width="252" height="252" bgcolor="#3a4c38">
<h3>  Admin Management : </h3>

<ul>
	
	<li><a href='viewmembers.php'><b>View members</b></a></li>
		<br>
	<li><a href='viewticket.php'><b>Booked Tickets</b></a></li>
		<br>
	<li><a href='viewcontact.php'><b>View Contact</b></a></li>
		<br>
    <li>
    	<form action='' method='post'>
   	 		<input type='submit' value='logout' name='logout' />
   		 </form>
    </li>
</ul>
</td>
</tr>
</table>


			
			</td>
          </tr>
          <tr>
            <td colspan='3' align='center' bgcolor='#3a4c38' height='1'>
					&copy; <strong>
                &nbsp; Copyright 2024 Dee'nga Car wash Booking. All Rights Reserved</strong></td>

          </tr>
	</table>
</body>
</head>
</html>

<?php
	//the session admin is destroyed when he logs out
	if (isset($_POST['logout']) and ($_POST['logout']=='logout')){
		unset ($_SESSION['admin']);
		header('Location:index.php');
	}
?>