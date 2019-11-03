<!DOCTYPE html>
<html>
   <?php
            require "dbconn.php";
            
            $project_id = $_GET['project_id'];
            $researcher_id = $_GET['researcher_id'];
            echo "PROJECT ID ASSIGNED: ".$project_id;
            echo "RESEARCHER ID ASSIGNED: ".$researcher_id;

			$sql = 
			"SELECT 
				project_application.project_pitch, project_application.application_id, project_application.project_id, project_application.researcher_id,
				researcher.r_fname, researcher.r_lname, project.project_name 
			FROM 
			 	project_application
			JOIN 
				researcher 
			ON 
				project_application.researcher_id = researcher.researcher_id 
			JOIN 
				project 
			ON 
				project_application.project_id = project.project_id";
			
			
			$result = $conn->query($sql);
    ?>
<head>
	<title>View Projects</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <style type="text/css">
    body {
			background-image: ("resach.jpg");
			
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
    <a class="active" href="home.php"><button type="button">Home</button> </a>
    	<a href="logout.php"><button type="button"> Logout</button></a>
    	<a href="addprojects.php"><button type="button"> Add Project</button></a>
    	<a href="addprojects.php"><button type="button"> Applications</button></a>
    	
    </div>
    <table class="table table-inverse" border="1">
      <thead>
    	<tr>
    		<th>APPLICATION ID</th>
    		<th>RESEARCHER</th>
    		<th>PROJECT</th>
    		<th>PITCH</th>
			<th>ACTION</th>
    		
    		
    	</tr>
      </thead>

    	<?php

	    	$application_id = " ";
	    	$researcher_name = " "; 
			$project_name = " ";	
			$pitch = " ";
			
			//   if ($result->num_rows >0) {
			  	# output data of each row
			if ($result) {
			  	while ($row = $result->fetch_assoc()) {
			  		$application_id = $row['application_id'];
					$researcher_fname = $row['r_fname'];
					$researcher_lname = $row['r_lname'];
			  		$project_name = $row['project_name'];
					$pitch = $row['project_pitch'];
					$cv = $row['cv'];
					
			  		
			  		?>

			  	  <tbody>
			  		<tr>
			  		<td><?php echo $application_id ?></td>
			  		<td><?php echo $researcher_fname ." ". $researcher_lname ?></td>
			  		<td><?php echo $project_name ?></td>
			  		<td><?php echo $pitch ?></td>
			  				  		
			  		<td><a onclick="return confirm('assign project')" href='assign.php?project_id=<?php echo $row["project_id"]; ?>&researcher_id=<?php echo $row["researcher_id"]; ?>'>Assign</a></td>

			  		</tr>
			  	  </tbody>
			  <?php
			  	}
			  }else{
				trigger_error('Invalid query: ' . $conn->error);
			  	echo "0 results";
			  }

    	?>
    </table>
	    	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>
</html>