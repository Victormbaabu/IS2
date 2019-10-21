
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

</head>

<body background="images/bg.jpg">
	<br>
	<br>
	<br>
	<br>
	<br>
	<div class="container">
    
<?php

if (isset($_POST['submit'])) {
		   
            $projo_pitch=$_POST["project_pitch"];
            
			$query = "INSERT INTO project_application (researcher_id, project_id, project_pitch) VALUES ('$loggedin','$id','$projo_pitch')";
			// $query2 = "UPDATE project_description set  p_description = '$projo_description', p_attachment = '$projo_attachment' WHERE project_id = '$form_project_id'";

			if($conn->query($query)) {
				echo ("<br> <div class='col-md-4 col-md-offset-4'><div class='panel panel-success'><div class='panel-heading text-center'>Pitch posted succesfully.</div></div></div>");
				header("Refresh: 1; url=checkprojects.php");

			}else {
				echo "Fail".$conn->error;
			}
}


?>
<div class="row">
    	<div class="col-md-4 col-md-offset-4">
    		<div class="panel panel-default">
			  	<div class="panel-heading">
                <div class="panel-heading">
			    	<h3 class="panel-title">Project Title: <?php echo ($projo_name);?></h3>
			 	</div>

			  	<div class="panel-body">
			    	<form accept-charset="UTF-8" role="form"  method="POST">
                    <fieldset>
			    	  	<!-- <div class="form-group">
			    		    <input class="form-control" placeholder="Project id" name="project_id" type="text" required>
			    		</div> -->
			    		<div class="form-group">
			    			Your Pitch:<br>
				    		<div class="form-group">
                                <textarea class="form-control"name="project_pitch" rows="10" id="pitch" required></textarea>
				    		</div>
				    	</div>		
			    		
			    		<input class="btn btn-lg btn-success btn-block" type="submit" name="submit" value="Post Application" style="background: green;">
						<a class="btn btn-lg btn-success btn-block" href="viewprojects.php" role="button" style="background: green;">View All Projects</a>

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
