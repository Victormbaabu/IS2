<?php
include ("dbconn.php");
if (isset($_POST['submit'])){
  
  $project_name=$_POST["project_name"];
  $new_project_name = strtoupper($project_name);
  $project_duration=$_POST["project_duration"];
  $p_description=$_POST["p_description"];
//   $p_attachment=$_POST["p_attachment"];
  	$project_id = " ";

  	$p_attachment = rand(1000,100000)."-".$_FILES['file']['name'];

	$p_attachment_loc = $_FILES['file']['tmp_name'];
	$new_file_name = strtolower($p_attachment);
	$final_file=str_replace(' ','-',$new_file_name);
 	$folder="projectsfolder/";
	if(move_uploaded_file($p_attachment_loc,$folder.$final_file))
		{
			$sql = "INSERT INTO project (project_name, project_duration)
					VALUES ('$new_project_name', '$project_duration')";

			if ($conn->query($sql) === TRUE) {
				$last_id = $conn->insert_id;
				$sql2 = "INSERT INTO project_description (p_description, p_attachment, project_id)
					VALUES ('$p_description', '$final_file', $last_id)";
				if ($conn->query($sql) && $conn->query($sql2)) 
				{
				echo ("<br> <div class='col-md-4 col-md-offset-4'><div class='panel panel-success'><div class='panel-heading text-center'>Project added succesfully.</div></div></div>");
				}
				else{
					echo ("Project failed to add.". $conn->error);
				}
			}
		}
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
	<style type="text/css">
		body {
			background-image: url("resach3.jpg");  
			background-size: 100%;
			background-repeat: no-repeat;
		}
	</style>
</head>
<body style="background-image: url('resach3.jpg')" >

	<h1 style="text-align: center; text-decoration-color: blue;">FieldMaster</h1>
	<div class="container">
    <div class="row">
    	<div class="col-md-4 col-md-offset-4">
    		<div class="panel panel-default">
			  	<div class="panel-heading">
                <div class="panel-heading">
			    	<h3 class="panel-title" style="color: rgb(132, 227, 59); text-align:center; font-size: 23px;">Add New Project</h3>
			 	</div>
			  	<div class="panel-body">
			    	<form accept-charset="UTF-8" role="form"  method="POST" enctype="multipart/form-data">
                    <fieldset>
			    	  	<!-- <div class="form-group">
			    		    <input class="form-control" placeholder="Project id" name="project_id" type="text" required>
			    		</div> -->
			    		<div class="form-group">
			    		    <input class="form-control" style="height: 40px; border-color: rgb(132, 227, 59);" placeholder="Project name" name="project_name" type="text" required>
			    		</div>
			    		<div class="form-group">
			    			Duration:<br>
			    			<input type="radio" name="project_duration" value="short_term" checked> Short-term<br>
							<input type="radio" name="project_duration" value="long_term"> Long-term<br>
			    		</div>
			    		<div class="form-group">
			    			<input class="form-control" style="height: 40px; border-color: rgb(132, 227, 59);" placeholder="Project description"  name="p_description" type="text" value="" required>
			    		</div>
						<div class="form-group">
						  Upload Project Requirements File:<br>
    						<input class="form-control" style="height: 40px; border-color: rgb(132, 227, 59);" type="file" name="file" id="fileToUpload" accept="application/pdf" required>
			    		</div>
			    		<!-- <div class="form-group">
			    		    <input class="form-control" placeholder="Project attachment" name="p_attachment" type="text" >
			    		</div> -->
			    		
			    		
			    		<input class="btn btn-lg btn-success btn-block" type="submit" name="submit" value="Add Project" style="background: rgb(132, 227, 59); font-size: 17px; padding: 7px; border-color: green;">
			    		<!-- <input class="btn btn-lg btn-success btn-block" type="submit" name="submit" value="View All Projects" style="background: green;"> -->
			    		<a class="btn btn-lg btn-success btn-block" href="viewprojects.php" role="button" style="background: rgb(132, 227, 59); font-size: 17px; padding: 7px; border-color: green;">View All Projects</a>
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