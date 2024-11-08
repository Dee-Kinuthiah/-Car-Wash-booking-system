$(document).ready(function(){
	var is_validEmail = true; //this variable is for email validation only
	$('#signup').click(function(){	
		/*if the email valid then and not yet taken then validate
		  the other required information*/
		if (is_validEmail == true){
			if(Validate() == false){
				return false;
			}		
		}else{
			return false;
		}
	});
	
	$('#uemail').blur(function(){
			/*This code will check the email is still available.
			  We can check the email through ajax request*/
			$.get('registration_bll.php', 'chktype=1&regemail=' + $('#uemail').val(), processData).error('ouch');
			function processData(data) {
				if (data=='true') {
					//email is existing
					is_validEmail = false;
					$('#validation_msg').html('<ul><li>Email is already taken.</li></ul>');
				}else{
					is_validEmail = true;
					$('#validation_msg').html('');				
				}
			}// end processData			
		return false;
	});
	
	//This code is to erase the water mark "DD" if focus on txtDay
	$('#txtDay').focus(function(){
		if ($.trim($(this).val()) == 'DD'){
			$(this).val('');
		}	
	})
	
	//This code is to put the water mark "DD" if we didn't assign value to txtDay
	$('#txtDay').blur(function(){
		if ($.trim($(this).val()) == ''){
			$(this).val('DD');
		}else{
			if(isNumber($(this).val())){
				if($.trim($(this).val()).length == 1){
					$(this).val('0' + $(this).val());
				}
			}
		}
	})
	
	function isNumber(n) {
		return !isNaN(parseFloat(n)) && isFinite(n);
	}
	
	//Same purpose with txtDay
	$('#txtYear').focus(function(){
		if ($.trim($(this).val()) == 'YYYY'){
			$(this).val('');
		}		
	})
	
	//Same purpose with txtDay
	$('#txtYear').blur(function(){
		if ($.trim($(this).val()) == ''){
			$(this).val('YYYY');
		}
	})

	//Validate function
	function Validate()
	{
		is_valid = true;
		
		/*I used this variable to construct a list (ul)
		  of error meage that will be insert to error div*/
		var val_msg ='<ul>';  
		/* */
		//Check first name if empty
		if($('#fname').val() == ''){
			is_valid = false;
			val_msg = val_msg + '<li>First Name is required.</li>';
		}
		
		//Check last name if empty
		if($('#lname').val() == ''){
			is_valid = false;
			val_msg = val_msg + '<li>Last Name is required.</li>';
		}
		
		//Check email if empty
		if($('#uemail').val() == ''){
			is_valid = false;
			val_msg = val_msg + '<li>Email is required.</li>';
		}else{
			//validate the format of email
			if(isValidEmailAddress($('#uemail').val()) == false){
				is_valid = false;
				val_msg = val_msg + '<li>Invalid email address.</li>';
			}
		}
		
		//Check the password if empty
		if($('#upassword').val() == ''){
			is_valid = false;
			val_msg = val_msg + '<li>Password is required.</li>';
		}else{
			//Check the number of characters required for a password
			if($('#upassword').val().length < 8 || $('#upassword').val().length > 16){
				is_valid = false;
				val_msg = val_msg + '<li>Password must be 8 to 16 characters.</li>';
			}		
		}
		
		//Check confirm password if it's empty
		if($('#conf_pass').val() == ''){
			is_valid = false;
			val_msg = val_msg + '<li>Confirm password is required.</li>';
		}else{
			//Check confirm password if it's equal to password
			if($('#conf_pass').val() != $('#upassword').val()){
				is_valid = false;
				val_msg = val_msg + '<li>Password does not match.</li>';
			}			
		}
		
		//Check birth date day if it has a value
		if($('#txtDay').val() == 'DD' && $('#txtYear').val() == 'YYYY'){
			is_valid = false;
			val_msg = val_msg + '<li>Birth Date is required.</li>';
		}else{
			var sday = '';
			/*The reuired date format is 2 digit (DD) so if the user 
			  assigned single digit then add 0 ex.(01)*/
			if ($.trim($('#txtDay').val()).length < 2){
				sday = '0' + $.trim($('#txtDay').val());
			}else{
				sday = $.trim($('#txtDay').val());
			}
			
			//Combine month day year to create birth date
			var bday = $('#lMonth').val() + '/' + sday + '/' + $.trim($('#txtYear').val());
			var errmsg = '';
			
			//Check the format of birth date
			errmsg = checkdate(bday);
			if($.trim(errmsg) != ''){
				is_valid = false;
				val_msg = val_msg + '<li>' + errmsg + '</li>';
			}else{
				bday = new Date(bday);
				var dNow = new Date();
				if (bday > dNow){
					is_valid = false;
					val_msg = val_msg + '<li>Future birth date is not acceptable.</li>';					
				}
			}
		}
		
		val_msg = val_msg + '</ul>';
		
		if (is_valid == false){
			$('#validation_msg').html('');
			$('#validation_msg').html(val_msg);
		}
		return is_valid;
	}
	
	function isValidEmailAddress(emailAddress) {
		var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
		return pattern.test(emailAddress);
	};

	function checkdate(input){
		var validformat=/\b\d{1,2}[\/-]\d{1,2}[\/-]\d{4}\b/;
 
		var msg = '';
		if (!validformat.test(input))
			msg = "Date is invalid.";
		else{ 
			//Detailed check for valid date ranges
			var monthfield=input.split("/")[0]
			var dayfield=input.split("/")[1]
			var yearfield=input.split("/")[2]
			var dayobj = new Date(yearfield, monthfield-1, dayfield)
			if ((dayobj.getMonth()+1!=monthfield)||(dayobj.getDate()!=dayfield)||(dayobj.getFullYear()!=yearfield)){
				msg = "Invalid Day, Month, or Year range detected.";
			}
		}

		return msg;
	}
});