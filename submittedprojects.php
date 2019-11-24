<!DOCTYPE html>
<html>

<?php

session_start();
require('dbconn.php');
// $id = $_GET['id'];
$loggedin = $_SESSION['role_id'];

if ($loggedin == 1){

			$sql = 
			"SELECT 
				project_application.project_pitch, project_application.assignment_status, project_application.application_id, project_application.cv, project_application.project_id, project_application.researcher_id,
				researcher.r_fname, researcher.r_lname, researcher.r_email, project.project_name 
			FROM 
			 	project_application
			JOIN 
				researcher 
			ON 
				project_application.researcher_id = researcher.researcher_id 
			JOIN 
				project 
			ON 
				project_application.project_id = project.project_id 
			WHERE
				project_application.assignment_status = 0"
			;
			
			
			
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
    	<a href="logout.php"><button type="button" style = "background-color: rgb(132, 227, 59)"> Logout</button></a>
		<a href="addprojects.php"><button type="button" style = "background-color: rgb(132, 227, 59)"> Add Project</button></a>
		<a href="applicationsmade.php"><button type="button" style = "background-color: rgb(132, 227, 59);"> Applications</button></a>
    	<a href="assigned.php"><button type="button" style = "background-color: rgb(132, 227, 59); width: 200px;"> Assigned Projects</button></a>
	</div>
	<hr>
		<h3 style = "color: rgb(132, 227, 59); text-align: center;">Project Applications:</h3>
	<hr>
    <table class="table table-inverse" border="1">
      <thead style = "color: rgb(132, 227, 59);">
    	<tr>
    		<th>SUBMISSION ID</th>
    		<th>RESEARCHER</th>
    		<th>PROJECT</th>
			<th>ATTACHMENT</th>
			<th>ACTION</th>
    		
    		
    	</tr>
      </thead>

    	<?php

	    	$submission_id = " ";
	    	$researcher_name = " ";
			$project_name = " ";	
			$attachment = " ";
			
			//   if ($result->num_rows >0) {
			  	# output data of each row
			if ($result) {
			  	while ($row = $result->fetch_assoc()) {
			  		$researcher_fname = $row['r_fname'];
					$researcher_lname = $row['r_lname'];
                    $researcher_email = $row['r_email'];
			  		$project_name = $row['project_name'];
					$attachment= $row['attachment'];
			  		
			  		?>

			  	  <tbody>
			  		<tr>
			  		<td><?php echo $submission_id ?></td>
			  		<td><?php echo $researcher_fname ." ". $researcher_lname ?></td>
			  		<td><?php echo $project_name ?></td>
					<td><a href="submissionsfolder/<?php echo $attachment ?>" target="_blank" style = "color: rgb(132, 227, 59);">View Submission     <i class="far fa-file-pdf" style="color:red; font-weight: 1px; font-size: 18px;"></i></a></td>
			  				  		
					  <td><a onclick="return confirm('Mark Complete')" 
					  href='markcomplete.php?project_id=<?php echo $row["project_id"]; ?>&researcher_id=<?php echo $row["researcher_id"]; ?>&researcher_fname=<?php echo $row["r_fname"]; ?>&researcher_lname=<?php echo $row["r_lname"]; ?>&project_name=<?php echo $row["project_name"]; ?>&researcher_email=<?php echo $row["r_email"]; ?>' style = "color: rgb(132, 227, 59);">
					  Mark Complete</a></td>
			  		</tr>
			  	  </tbody>
			  <?php
			  	}
			  }else{
				trigger_error('Invalid query: ' . $conn->error);
			  	echo "0 results";
			  }

    	?>


		<?php
}
else{
echo "Unauthorized access";
}
		?>
    </table>
	    	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>
</html>