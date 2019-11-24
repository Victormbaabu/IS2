<html> 

<?php

if(isset($_POST["submit"]))  
    { 
     $subject=$_POST['subject'];
     $tr = $_POST['tr'];
     echo $subject;
     echo $tr;
     
     echo date_default_timezone_get();
     $submission_date = date("Y-m-d H:i:s");
     echo $submission_date;
}
   
?>

	<body> 
		<form method = "post" action = "test.php"> 
			<h4>SELECT SUJECTS</h4> 
			<!--Using multiple to select multiple value-->
			<select name = "subject" multiple size = 6> 
				<option value = "english">ENGLISH</option> 
				<option value = "maths">MATHS</option> 
				<option value = "computer">COMPUTER</option> 
				<option value = "physics">PHYSICS</option> 
				<option value = "chemistry">CHEMISTRY</option> 
				<option value = "hindi">HINDI</option> 
			</select> 
            <input type = "text" name = "tr">
			<input type = "submit" name = "submit" value = submit> 
		</form> 
	</body> 