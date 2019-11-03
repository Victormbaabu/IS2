<!DOCTYPE html>
<html>
   <?php
			
session_start();
require('dbconn.php');
// $id = $_GET['id'];
$loggedin = $_SESSION['role_id'];

if ($loggedin == 1){

			$sql = "SELECT assigned_projects.project_id, assigned_projects.researcher_id, project.project_id, project.project_name,  
                    project.assignment_status, project_description.p_description, 
                    project_description.project_id, project_application.project_id, project_application.cv, researcher.researcher_id, researcher.r_fname, 
                    researcher.r_lname, researcher.r_email 
                    FROM assigned_projects 
                    JOIN project
                    ON assigned_projects.project_id = project.project_id 
                    JOIN project_description 
                    ON assigned_projects.project_id = project_description.project_id
                    JOIN researcher
                    ON assigned_projects.researcher_id  = researcher.researcher_id 
					JOIN project_application 
					ON assigned_projects.project_id = project_application.project_id
                    -- only select assigned projects:
                    WHERE project.assignment_status = '1' 
					-- ORDER BY assigned_projects.project_id DESC
					";

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
    
    <div class="button_container">
        <a class="active" href="index.html"><button type="button" style = "background-color: rgb(132, 227, 59);">Home</button> </a>
    	<a href="logout.php"><button type="button" style = "background-color: rgb(132, 227, 59)"> Logout</button></a>
		<a href="addprojects.php"><button type="button" style = "background-color: rgb(132, 227, 59)"> Add Project</button></a>
		<a href="applicationsmade.php"><button type="button" style = "background-color: rgb(132, 227, 59);"> Applications</button></a>
    	<a href="assigned.php"><button type="button" style = "background-color: rgb(132, 227, 59); width: 200px;"> Assigned Projects</button></a>
    </div>
<hr>
	<h3 style = "color: rgb(132, 227, 59); text-align: center;">Ongoing Projects:</h3>
<hr>

    <table class="table table-inverse" border="1">
      <thead style = "color: rgb(132, 227, 59);">
    	<tr>
    		<th>PROJECT ID</th>
    		<th>PROJECT TITLE</th>
            <th>PROJECT DESCRIPTION</th>
    		<th>ASSIGNED RESEARCHER</th>
            <th>RESEARCHER EMAIL</th>
            <th>RESEARCHER PROPOSAL</th>
            <th>CLOSE</th>
    		
    	</tr>
      </thead>

    	<?php

	    	$projo_id = " ";
	    	$projo_name = " ";
			// $projo_duration = " ";
            $researcher_fname = " ";
            $researcher_lname = " ";
            $researcher_email = " ";
			$project_description = " ";
			$project_attachment = " ";
			
			  if ($result) {
			  	# output data of each row

			  	while ($row = $result->fetch_assoc()) {
			  		$projo_id = $row['project_id'];
			  		$projo_name = $row['project_name'];
			  		// $projo_duration = $row['project_duration'];
                    $researcher_fname = $row['r_fname'];
                    $researcher_lname = $row['r_lname'];
                    $researcher_email = $row['r_email'];
			  		$project_description = $row['p_description'];
			  		$project_attachment = $row['cv'];

			  		?>

			  	  <tbody>
			  		<tr>
			  		<td>#<?php echo $projo_id ?></td>
			  		<td><?php echo $projo_name ?></td>
                    <td><?php echo $project_description ?></td>
                    <td><?php echo $researcher_fname.' '.$researcher_lname ?></td>
                    <td><?php echo $researcher_email ?></td>
			  		<td><a href="cvfolder/<?php echo $project_attachment ?>" target="_blank" style = "color: rgb(132, 227, 59);">Proposal <i class="far fa-file-pdf" style="color:red; font-weight: 1px; font-size: 18px;"></i></a></td>
			  		
			  		<td><a onclick="return confirm('Mark as Complete')" href='completed.php?id=<?php echo $row["project_id"]; ?>' style = "color: rgb(132, 227, 59);">Mark Complete</a></td>
			  		

			  	
			  		</tr>
			  	  </tbody>
			  <?php
			  	}
			  }else{
				trigger_error('Invalid query: ' . $conn->error);
              }
            }else{
                echo "Not allowed";
            }

    	?>
    </table>
	    	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>
</html>