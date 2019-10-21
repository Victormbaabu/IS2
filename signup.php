<?php

include ('dbconn.php');
if (isset($_POST['submit'])){


  $m_fname=$_POST["fname"];
  $m_lname=$_POST["lname"];
  $m_email=$_POST["email"];
  $m_password=$_POST["password"];
  $role_id=$_POST["role_id"];
  $r_fname=$_POST["fname"];
  $r_lname=$_POST["lname"];
  $r_email=$_POST["email"];
  $r_password=$_POST["password"];



 if($_POST['role_id'] == "1"){

	// $sql = "INSERT INTO manager (m_fname,m_lname,role_id, m_email, m_password)
	//     VALUES ('$m_fname','$m_lname','$role_id', '$m_email', '$m_password')";

	$sql = "INSERT INTO manager (m_fname,m_lname, m_email, m_password)
	    VALUES ('$m_fname','$m_lname', '$m_email', '$m_password')";


	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully";
	    header("location: login.php");
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

}

if($_POST['role_id'] == "2"){
	 $sql = "INSERT INTO researcher (r_fname, r_lname, r_email, r_password)
        VALUES ('$r_fname','$r_lname', '$r_email', '$r_password')";
        if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header("location: loginr.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}



}
}




?>



 <!DOCTYPE html>
<html>
 <link rel="stylesheet" type="text/css" href="style.css">
<head>
	<title>login form</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   
    <link rel="stylesheet" type="text/css" href="sidebar.css">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body>
	<h1 style="text-align: center; text-decoration-color: black;">FieldMaster</h1>
	<div class="container">
    <div class="row">
    	<div class="col-md-4 col-md-offset-4">
    		<div class="panel panel-default">
			  	<div class="panel-heading">
                <div class="panel-heading">
			    	<h3 class="panel-title">sign up</h3>
			 	</div>
			  	<div class="panel-body">
			    	<form accept-charset="UTF-8"  method= "post" role="form" action="">
                    <fieldset>
			    	  	<div class="form-group">
			    		    <input class="form-control" placeholder="Enter Firstname" name="fname" type="text" required="" pattern="[A-Za-z]{2,}" title="A name can only contain lettersl">
			    		</div>
			    			<div class="form-group">
			    		    <input class="form-control" placeholder="enter lastname" name="lname" type="text" required="" pattern="[A-Za-z]{2,}" title="A name can only contain lettersl">
			    		</div>
			    		<div class="form-group">
			    			Role:<br>
			 
							<input type="radio" name="role_id" value="1"> Manager<br>
							<input type="radio" name="role_id" value="2"> Researcher<br>
						
			    		</div>

			    		<div class="form-group">
			    		    <input class="form-control" placeholder="enter email" name="email" type="email" required="" pattern="[^ @]*@[^ @]*" title="Must contain at least 4 letters">
			    		</div>

			    		<div class="form-group">
			    		    <input class="form-control" placeholder="enter password" name="password" type="password" required="" pattern="[A-Za-z0-9]{4,}" title="Must contain only uppercase, lowercase or numbers">
			    		</div>
			    		<!-- <div class="form-group">
			    		    <input class="form-control" placeholder="confirm password" name="confirmpassword" type="password" required="" pattern="[A-Za-z0-9]{4,}" title="Must contain only uppercase, lowercase or numbers">
			    		</div> -->
			    		
			    		<input class="btn btn-lg btn-success btn-block" type="submit" name="submit" style="background: cyan;">
			    	</fieldset>
			      	</form>
			      	</div>
			      	</div>
			      	</div>
			      	</div>
			      	</div>
			      	</div>
			      	</body>
			      	</html>
			      
