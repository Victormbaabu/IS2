
<?php
session_start();
require('dbconn.php');
$id = $_GET['id'];
$loggedin = $_SESSION['researcher_id'];
$selectprojectname = "SELECT project_name FROM project WHERE project_id = '$id' ";
$selectedproject=$conn->query($selectprojectname);
while($row=$selectedproject->fetch_assoc()){
    $projo_name = $row['project_name'];
}

?>
<!DOCTYPE html>
<html>
<head>

	<title>Apply</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   
    <link rel="stylesheet" type="text/css" href="sidebar.css">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<style type="text/css">
    body {
			background-image: url("resach3.jpg");  
			background-size: 100%;
			background-repeat: no-repeat;
		}
		button {
			background-color:#black;
			color: black;
			padding: 14px 20px;
			display: inline-block;
			margin: 5px;
			border: none;
			cursor: pointer;
			width: 10%;

		}

	</style>

</head>

<body>
<h1 style="text-align: center; color: rgb(132, 227, 59);">Apply</h1>
	
	<div class="container">
    
<?php

if (isset($_POST['submit'])) {
		   
			$projo_pitch=$_POST["project_pitch"];
			
			$cv = rand(1000,100000)."-".$_FILES['file']['name'];

			$cv_loc = $_FILES['file']['tmp_name'];
			$new_file_name = strtolower($cv);
			$final_file=str_replace(' ','-',$new_file_name);
 			$folder="cvfolder/";
			 if(move_uploaded_file($cv_loc,$folder.$final_file))
			 {
				$query = "INSERT INTO project_application (researcher_id, project_id, project_pitch, cv) VALUES ('$loggedin','$id','$projo_pitch','$final_file')";

				if($conn->query($query)) {
					echo ("<br> <div class='col-md-4 col-md-offset-4'><div class='panel panel-success'><div class='panel-heading text-center'>Application Successful.</div></div></div>");
					header("Refresh: 2; url=checkprojects.php");

				}else {
					echo "Fail".$conn->error;
				}
			}
}


?>
<div class="row">
    	<div class="col-md-4 col-md-offset-4">
    		<div class="panel panel-default">
			  	<div class="panel-heading">
				  <div class="panel-heading">
			    	<h3 class="panel-title" style="color: rgb(132, 227, 59); text-align:center; font-size: 23px;">Project Title: <?php echo strtoupper($projo_name);?></h3>
			 	</div>

			  	<div class="panel-body">
			    	<form accept-charset="UTF-8" role="form"  method="POST" enctype="multipart/form-data">
                    <fieldset>
			    	  	<div class="form-group">
						  Upload your Proposal (Only PDF Accepted):<br>
    						<input class="form-control"  style="height: 40px; border-color: rgb(132, 227, 59);" type="file" name="file" id="fileToUpload" accept="application/pdf" required>
			    		</div>
			    		<div class="form-group">
			    			Your Pitch:<br>
				    		<div class="form-group">
                                <textarea class="form-control" style="border-color: rgb(132, 227, 59);" name="project_pitch" rows="10" id="pitch" required></textarea>
				    		</div>
				    	</div>		
			    		
			    		<input class="btn btn-lg btn-success btn-block" type="submit" name="submit" value="Post Application" style="background: rgb(132, 227, 59); font-size: 17px; padding: 7px; border-color: green;">
						<a class="btn btn-lg btn-success btn-block" href="checkprojects.php" role="button" style="background: rgb(132, 227, 59); font-size: 17px; padding: 7px; border-color: green;">View All Projects</a>

			    	</fieldset>
			      	</form>
                      <hr/>
                    
			    </div>
			</div>
		</div>
	</div>
</div>
</div>

</body>
</html>
