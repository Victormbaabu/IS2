 <?php
  
 include("dbconn.php");
//get values passed from form in login.php
 // isset($_POST['submit'])
 // if (isset($_POST['email'])&&$_POST['password']){
 if (isset($_POST['submit'])){
	 $r_email = $_POST['r_email'];
	 $r_password = $_POST['r_password'];

	//to prevent mysql injection
	 // $r_email = stripcslashes($r_email);
	 // $r_password = stripcslashes($r_password);
	 // $r_email = mysql_real_escape_string($r_email);
	 // $r_password = mysql_real_escape_string($r_password);

 $result = mysqli_query($conn, "SELECT * FROM researcher WHERE r_email ='$r_email' AND r_password = '$r_password' ")
 	or die("failed to query database". mysqli_error($conn));
 if ($result){
 	if (mysqli_num_rows($result) >0){
 		while($row = mysqli_fetch_array($result)) {
		 //db data selection
			 $dbresearcher_id = $row['researcher_id'];
			 $dbr_name = $row['r_fname'];
			 $dbr_email = $row['r_email'];
			 $dbr_password = $row['r_password'];
			 $dbproject_id = $row['project_id'];
		}


	session_start();

	$_SESSION['researcher_id']= $dbresearcher_id;
	$_SESSION['r_name']= $dbr_name;
	$_SESSION['r_email']= $dbr_email;
	$_SESSION['r_password']= $dbr_password;
	$_SESSION['project_id']= $dbproject_id;

	if($r_email==$dbr_email && $r_password==$dbr_password){
		echo "Youre in!!";
		header('location:checkprojects.php');
	}

	 // if ($row){

	 	
	 // 	echo "login succesful  welcome" .$row["username"];
	 // 	header("location:home.php");
	}else{
	 	echo "Wrong credentials";
	 	header("location:loginr.php");
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
<style type="text/css">
	body {
    background-image: url("resach.jpg");
    
                    
    
}
</style>

</head>

<body>
	<h1 style="text-align: center; text-decoration-color: black;">FieldMaster</h1>

	<div class="container">
    <div class="row">
    	<div class="col-md-4 col-md-offset-4">
    		<div class="panel panel-default">
			  	<div class="panel-heading">
                <div class="panel-heading">
			    	<h3 class="panel-title">Researcher Login page</h3>
			 	</div>
			  	<div class="panel-body">
			    	<form accept-charset="UTF-8" role="form" method="POST">
                    <fieldset>
			    	  	<div class="form-group">
			    		    <input class="form-control" placeholder="email" name="r_email" type="text" required>
			    		</div>
			    		</div>
			    		

			    		<div class="form-group">
			    			<input class="form-control" placeholder="Password" name="r_password" type="password" value="" required>
			    		</div>
			    		
			    		<input class="btn btn-lg btn-success btn-block" type="submit" name="submit" value="Login" style="background: cyan;">
			    		<a href="login.php" class="btn btn-lg btn-success btn-block" role="button" style="background: cyan;">Manager Login Area</a>
			    	</fieldset>
			      	</form>
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