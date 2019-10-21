
<?php
require('dbconn.php');
$id = $_GET['id'];
// $did = $_GET['description_id'];

if (isset($_POST['submit'])) {

		    $projo_name=$_POST["projo_name"];
	        $projo_duration=$_POST["project_duration"];
	        $projo_description=$_POST["p_description"];
	        $projo_attachment=$_POST["p_attachment"];
	        $form_project_id = $_POST["form_project_id"];
				
			$query = "UPDATE project set project_name = '$projo_name',  project_duration = '$projo_duration' WHERE project_id='$form_project_id'";
			$query2 = "UPDATE project_description set  p_description = '$projo_description', p_attachment = '$projo_attachment' WHERE project_id = '$form_project_id'";

			if($conn->query($query) && $conn->query($query2)) {
				echo ("<br> <div class='col-md-4 col-md-offset-4'><div class='panel panel-success'><div class='panel-heading text-center'>Project updated succesfully.</div></div></div>");
				// header("location:viewprojects.php");

			}else {
				echo "Fail".$conn->error;
			}
}

//querydata
$sql = "SELECT * from project where project_id='$id'";
$sql2 = "SELECT * from project_description where project_id='$id'";


// $sql = "SELECT project.project_id, project.project_name, project.project_duration, project_description.p_description, project_description.p_attachment, project_description.project_id, project_description.description_id FROM project JOIN project_description ON project.project_id = project_description.project_id ORDER BY project_description.project_id DESC";

// $sql = "SELECT * from project_description where description_id=$did";
$res=$conn->query($sql);
$res2=$conn->query($sql2);


$projo_id = " ";
	    	$projo_name = " ";
			$projo_duration = " ";
			$des_id = " ";
			$project_description = " ";
			$project_attachment = " ";
			$des_id = " ";


if ($res->num_rows>0) {

if ($res2->num_rows>0) {

	while($row=$res->fetch_assoc()){
			// require('dbconn.php');
			// $id = $_GET['project_id'];
			// $did = $_GET['description_id'];
			$projo_id = $row['project_id'];
			$projo_name = $row['project_name'];
			$projo_duration = $row['project_duration'];
		

			while($row=$res2->fetch_assoc()){
				// require('dbconn.php');
				// $id = $_GET['project_id'];
				// $did = $_GET['description_id'];
				$projo_id = $row['project_id'];
				$project_description = $row['p_description'];
				$project_attachment = $row['p_attachment'];
?>
<!DOCTYPE html>
<html>
<head>

	<title>Update project details</title>
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
    <div class="row">
    	<div class="col-md-4 col-md-offset-4">
    		<div class="panel panel-default">
			  	<div class="panel-heading">
                <div class="panel-heading">
			    	<h3 class="panel-title">Update project</h3>
			 	</div>
			  	<div class="panel-body">
			    	<form accept-charset="UTF-8" role="form"  method="POST">
                    <fieldset>
			    	  	<!-- <div class="form-group">
			    		    <input class="form-control" placeholder="Project id" name="project_id" type="text" required>
			    		</div> -->
			    		<div class="form-group">
			    			Project ID:<br>
				    		<div class="form-group">
				    		    <input class="form-control" name="form_project_id" type="text" value="<?php echo $projo_id ?>" readonly>
				    		</div>
				    	</div>

			    		<div class="form-group">
			    		    <input class="form-control" placeholder="Project name" name="projo_name" type="text" value="<?php echo $projo_name ?>" required>
			    		</div>
			    		<div class="form-group">
			    			Duration:<br>
			    			<input type="radio" name="project_duration" value="short_term" required> Short-term<br>
							<input type="radio" name="project_duration" value="long_term" required> Long-term<br>
			    		</div>
			    		
			    		<div class="form-group">
			    			<input class="form-control" placeholder="Project description" name="p_description" type="text" value="<?php echo $project_description ?>" required>
			    		</div>
			    		<div class="form-group">
			    		    <input class="form-control" placeholder="Project attachment" name="p_attachment" type="text" value="<?php echo $project_attachment ?>">
			    		</div>
			    		
			    		
			    		<input class="btn btn-lg btn-success btn-block" type="submit" name="submit" value="Update Project" style="background: green;">
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
<?php
			}
		}
	}
}

?>
</body>
</html>
