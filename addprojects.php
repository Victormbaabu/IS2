<?php
include ("dbconn.php");
if (isset($_POST['submit'])){
  
  $project_name=$_POST["project_name"];
  $project_duration=$_POST["project_duration"];
  $p_description=$_POST["p_description"];
  $p_attachment=$_POST["p_attachment"];
  $project_id = " ";
  
 $sql = "INSERT INTO project (project_name, project_duration)
        VALUES ('$project_name', '$project_duration')";

if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    $sql2 = "INSERT INTO project_description (p_description, p_attachment, project_id)
        VALUES ('$p_description', '$p_attachment', $last_id)";
    if ($conn->query($sql) && $conn->query($sql2)) {
	   echo ("<br> <div class='col-md-4 col-md-offset-4'><div class='panel panel-success'><div class='panel-heading text-center'>Project added succesfully.</div></div></div>");
	}
	else{
		echo ("Project failed to add.". $conn->error);
	}

}

 // $project_id = "SELECT MAX(project_id) from project";


//  $dbproject_id  = mysqli_query($conn, "SELECT  MAX(project_id) FROM project") or die("failed to query database". mysqli_error($conn));

//  if ($dbproject_id){
//  	if (mysqli_num_rows($dbproject_id) >0){
//  		while($row = mysqli_fetch_array($dbproject_id)) {
// 		 //db data selection
// 			 $project_id = $row['project_id'];
// 		}
// 	}
// }

// session_start();
// $_SESSION['project_id']= $project_id;

 
   
}
?>


<!DOCTYPE html>
<html>
 <link rel="stylesheet" type="text/css" href="style.css">
<head>
	<title>add products form</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   
    <link rel="stylesheet" type="text/css" href="sidebar.css">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		
	</script>

</head>
<body style="background-image: url('resach.jpg')">
	<h1 style="text-align: center; text-decoration-color: blue;">FieldMaster</h1>
	<div class="container">
    <div class="row">
    	<div class="col-md-4 col-md-offset-4">
    		<div class="panel panel-default">
			  	<div class="panel-heading">
                <div class="panel-heading">
			    	<h3 class="panel-title">Add new project</h3>
			 	</div>
			  	<div class="panel-body">
			    	<form accept-charset="UTF-8" role="form"  method="POST">
                    <fieldset>
			    	  	<!-- <div class="form-group">
			    		    <input class="form-control" placeholder="Project id" name="project_id" type="text" required>
			    		</div> -->
			    		<div class="form-group">
			    		    <input class="form-control" placeholder="Project name" name="project_name" type="text" required>
			    		</div>
			    		<div class="form-group">
			    			Duration:<br>
			    			<input type="radio" name="project_duration" value="short_term" checked> Short-term<br>
							<input type="radio" name="project_duration" value="long_term"> Long-term<br>
			    		</div>
			    		<div class="form-group">
			    			<input class="form-control" placeholder="Project description" name="p_description" type="text" value="" required>
			    		</div>
			    		<div class="form-group">
			    		    <input class="form-control" placeholder="Project attachment" name="p_attachment" type="text" >
			    		</div>
			    		
			    		
			    		<input class="btn btn-lg btn-success btn-block" type="submit" name="submit" value="Add Project" style="background: green;">
			    		<!-- <input class="btn btn-lg btn-success btn-block" type="submit" name="submit" value="View All Projects" style="background: green;"> -->
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
</div>
</body>
</html>