<html>
<head>
<title>BOOKING</title>
</head>
<body>
<table border="0" bgcolor="#FFFFFF" align="center" width="54%">
<tr bgcolor="#FF0000">
<td align="center" bgcolor="#CCFF99">
<font size="5">
<a href="index.php">Home</a> 
</font>
</td>
</tr>
<tr>
<td>
<form action="processticket.php" method="post">
<table bgcolor="white" height="431" border="0" align="center" width="50%">
<td width="34%" bgcolor="#FFFFFF"><b>Name:</b></td>
<td width="66%" bgcolor="#FFFFFF"><input type="text" name="Name" /></td>
</tr>
<tr><td bgcolor="#FFFFFF"><b>Service Type:</b></td>
        <td> <select name="Service_Type">
        <option>Hand Wash</option>
		<option>Dulexe Wash</option>
		<option>Detailing Wash</option></select></td></tr>

<tr>
<td bgcolor="#FFFFFF"><b>Car Reg:</b></td>
<td bgcolor="#FFFFFF"><input type="text" name="Car_Reg" /></td>
</tr>
<tr><td bgcolor="#FFFFFF"><b>Price:</b></td>
        <td> <select name="Price">
        <option value="500">500 KESH</option>
		<option value="1000" selected="selected">1000 KESH</option>
		<option value="1500">1500 KESH</option>
		<option value="2500">2500 KESH</option>
		<option value="3000">3000 KESH</option></select></td></tr>


				<div style="display: inline-block;">
				<tr>
					<td>
						<label for="uemail" class="label"><b> Booking Date </b></label>
					</td>
					<td style="margin: 0; padding: 0;">
						<select id="lMonth" name="lMonth" class="reg_fields" style="margin: 0 0 0 -5px; height: 36px; padding: display:block;">
							<option selected="selected" value="01">January</option>
							<option value="02">February</option>
							<option value="03">March</option>
							<option value="04">April</option>
							<option value="05">May</option>
							<option value="06">June</option>
							<option value="07">July</option>
							<option value="08">August</option>
							<option value="09">September</option>
							<option value="10">October</option>
							<option value="11">November</option>
							<option value="12">December</option>
						</select>
					</td>
					
						<td ><b><input type="text" id="txtDay" name="txtDay" style="width: 40px; height: 36px; margin-left:-100px;" value="DD" class="reg_fields"/></b></td>
						<td><b><input type="text" id="txtYear" name="txtYear" style="width: 60px; height: 36px; margin-left:-50px" value="YYYY" class="reg_fields"/></b></td>
					
					</tr>
				</div>
			</div>
              <tr>
             <td ><strong><b>Comments</b></strong></td>
             <td bgcolor="#FFFFFF"><font size="4">
           <textarea cols="17" rows="4" name="Comments"></textarea>
	           </tr>

      <td height="26" bgcolor="#FFFFFF" align="center"><input type="submit" value="BOOK" /></td>
 </tr>
</table>
</form>
</td>
</tr>
<tr>
<td height="21" colspan="2" align="center" bgcolor="#CCFF99">&copy; Dee'nga Online CARWASH</td>
</tr>
</table>
</body>
</html>