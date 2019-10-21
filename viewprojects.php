<!DOCTYPE html>
<html>
   <?php
			require "dbconn.php";

			$sql = "SELECT project.project_id, project.project_name, project.project_duration, project_description.p_description, project_description.p_attachment, project_description.project_id, project_description.description_id FROM project JOIN project_description ON project.project_id = project_description.project_id ORDER BY project_description.project_id DESC";

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
    	<a href="applicationsmade.php"><button type="button"> Applications</button></a>
    	
    </div>
    <table class="table table-inverse" border="1">
      <thead>
    	<tr>
    		<th>project id</th>
    		<th>project name</th>
    		<th>project duration</th>
    		<th>description id</th>
    		<th>project description</th>
    		<th>project attachment</th>
    		
    	</tr>
      </thead>

    	<?php

	    	$projo_id = " ";
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
			  	

			  		?>

			  	  <tbody>
			  		<tr>
			  		<td><?php echo $projo_id ?></td>
			  		<td><?php echo $projo_name ?></td>
			  		<td><?php echo $projo_duration ?></td>
			  		<td><?php echo $des_id ?></td>
			  		<td><?php echo $project_description ?></td>
			  		<td><?php echo $project_attachment ?></td>
			  		
			  		<td><a onclick="return confirm('delete project')" href='delete.php?id=<?php echo $row["project_id"]; ?>'>Delete</a></td>
			  		<td><a onclick="return confirm('update project')" href='update1.php?id=<?php echo $row["project_id"]; ?>'>Update</a></td>

			  	
			  		</tr>
			  	  </tbody>
			  <?php
			  	}
			  }else{
			  	echo "0 results";
			  }

    	?>
    </table>
	    	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>
</html>