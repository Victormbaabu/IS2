 <?php

 include("dbconn.php");
//get values passed from form in login.php
 if (isset($_POST['submit'])){
	 $m_email = $_POST['m_email'];
	 $m_password = $_POST['m_password'];

	//to prevent mysql injection
	 // $m_email = stripcslashes($m_email);
	 // $m_password = stripcslashes($m_password);
	 // $m_email = mysql_real_escape_string($m_email);
	 // $m_password = mysql_real_escape_string($m_password);

	 //connect to the server and select database 
	 // mysql_connect("localhost","root","");
	 // mysql_select_db("research");

	 //query database for user
	 $result = mysqli_query($conn, "SELECT * FROM manager WHERE m_email ='$m_email' AND m_password = '$m_password' ")
	 	or die("failed to query database". mysqli_error($conn));
	 if ($result){
	 	if (mysqli_num_rows($result) >0){
	 		while($row = mysqli_fetch_array($result)) {
	 //db data selection
			 $manager_id = $row['manager_id'];
			 $dbm_fname = $row['m_fname'];
			 $dbm_lname = $row['m_lame'];
			 $dbm_email = $row['m_email'];
			 $dbm_password = $row['m_password'];
			 $role_id = $row['role_id'];
	}


 session_start();

 $_SESSION['manager_id']= $manager_id;
 $_SESSION['m_fname']= $dbm_fname;
 $_SESSION['m_lname']= $dbm_lname;
 $_SESSION['m_email']= $dbm_email;
 $_SESSION['m_password']= $dbm_password;
 $_SESSION['role_id']= $role_id;


if($m_email==$dbm_email && $m_password==$dbm_password){
		header('location:viewprojects.php');
	} 
 
 // if ($row){

 	
 // 	echo "login succesful  welcome" .$row["username"];
 // 	header("location:home.php");
 else{
 	echo "Wrong credentials";
 	header("location:login.php");
  }
 }
}
}
 ?>

 <!DOCTYPE html>
<html>
 <link rel="stylesheet" type="text/css" href="style.css">
<head>
	<title>Manager Login</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   	
    <link rel="stylesheet" type="text/css" href="sidebar.css">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
	body {
    background-image: url("resach3.jpg");
	background-repeat: no-repeat;
	background-size: 100%;
  
}
</style>

</head>

<body>
	<h1 style="text-align: center; color: white;">FieldMaster</h1>

	<div class="container">
    <div class="row">
    	<div class="col-md-4 col-md-offset-4">
    		<div class="panel panel-default">
			  	<div class="panel-heading">
                <div class="panel-heading">
			    	<h3 class="panel-title" style="color: rgb(132, 227, 59); text-align:center; font-size: 23px;"><b>Manager Login</b></h3>
			 	</div>
			  	<div class="panel-body">
			    	<form accept-charset="UTF-8" role="form" method="POST">
                    <fieldset>
			    	  	<div class="form-group">
			    		    <input class="form-control" style="height: 40px; border-color: rgb(132, 227, 59);" placeholder="Email" name="m_email" type="email" required>
			    		</div>
			    		<div class="form-group">
			    			<input class="form-control" style="height: 40px; border-color: rgb(132, 227, 59);"  placeholder="Password" name="m_password" type="password" required>
			    		</div>
			    		
			    		<input class="btn btn-lg btn-success btn-block" type="submit" name="submit" value="Login" style="background: rgb(132, 227, 59); font-size: 17px; padding: 7px; border-color: green;">
			    	</fieldset>
			      	</form>
					  <hr>
					  <a href="index.html" class="btn btn-lg btn-success btn-block" role="button" style="background: rgb(132, 227, 59); font-size: 17px; padding: 7px; border-color: green;"><< Back Home</a>
                      <hr/>
                    
			    </div>
                </div>
                </div>
			</div>
		</div>
	</div>
</div>
</body>
</html>