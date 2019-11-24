<!DOCTYPE html>
<html>
   <?php

   			
session_start();
require('dbconn.php');
// $id = $_GET['id'];
$loggedin = $_SESSION['role_id'];
$loggedin_id = $_SESSION['researcher_id'];

if ($loggedin == 2 || $loggedin == 2){
			$sql = "SELECT project.project_id, project.project_name, project.project_duration,
			 	project.assignment_status, project_description.p_description, 
			 	project_description.p_attachment, project_description.project_id, 
				project_description.description_id, project_application.researcher_id, project_application.project_id   
			FROM project 
			JOIN project_application 
			ON project.project_id = project_application.project_id 
			JOIN project_description 
			ON project.project_id = project_description.project_id 
			-- only select unassigned projects:
			WHERE project.assignment_status = 0 
			ORDER BY project_description.project_id DESC";

			$result = $conn->query($sql);
    ?>
<head>
	<title>View Projects</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
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
    <h1></h1>
    <div class="button_container">
		<a class="active" href="index.html"><button type="button" style = "background-color: rgb(132, 227, 59);">Home</button> </a>
		<a href="logout.php"><button type="button" style = "background-color: rgb(132, 227, 59);"> Logout</button></a>
		<a class="active" href="submitproject.php"><button type="button" style = "background-color: rgb(132, 227, 59); width: 200px;">Submit A Project</button> </a>
		<!-- <a href="logout.php"><button type="button" style = "background-color: rgb(132, 227, 59);"> Logout</button></a>		 -->
	</div>
	
	<hr>
		<h3 style = "color: rgb(132, 227, 59); text-align: center;">Unassigned Projects:</h3>
	<hr>

    <table class="table table-inverse" border="1">
      <thead style = "color: rgb(132, 227, 59);">
    	<tr>
    		<th>PROJECT ID</th>
    		<th>PROJECT TITLE</th>
    		<th>PROJECT DURATION</th>
    		<th>PROJECT DESCRIPTION</th>
    		<th>PROJECT ATTACHMENT</th>
    		
    	</tr>
      </thead>

    	<?php

			$projo_id = " ";
			$researcher_id = " ";
	    	$projo_name = " ";
			$projo_duration = " ";
			$des_id = " ";
			$project_description = " ";
			$project_attachment = " ";
			  if ($result->num_rows >0) {
			  	# output data of each row

			  	while ($row = $result->fetch_assoc()) {

						$projo_id = $row['project_id'];
						$projo_name = $row['project_name'];
						$projo_duration = $row['project_duration'];
						$des_id = $row['description_id'];
						$project_description = $row['p_description'];
						$project_attachment = $row['p_attachment'];
						$researcher_id = $row['researcher_id'];
					

						if ($loggedin_id != $researcher_id){
							
			  		?>

			  	  <tbody>
			  		<tr>
			  		<td>#<?php echo $projo_id ?></td>
			  		<td><?php echo $projo_name ?></td>
			  		<td><?php echo $projo_duration ?></td>
			  		<td><?php echo $project_description ?></td>
			  		<td><a href="projectsfolder/<?php echo $project_attachment ?>" target="_blank" style = "color: rgb(132, 227, 59);">Read Requirements <i class="far fa-file-pdf" style="color:red; font-weight: 1px; font-size: 18px;"></i></a></td>
			  		
			  		<td><a onclick="return confirm('apply for project')" href='application.php?id=<?php echo $row["project_id"]; ?>' style = "color: rgb(132, 227, 59);">Apply</a></td>
			  		

			  	
			  		</tr>
			  	  </tbody>
			  <?php
				  }
			}
			  }else{
			  	echo "0 results";
			  }
			}

    	?>
    </table>
	    	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>
</html>