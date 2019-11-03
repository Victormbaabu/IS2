<!DOCTYPE html>
<html>

<?php
 
session_start();
require('dbconn.php');
// $id = $_GET['id'];
$loggedin = $_SESSION['role_id'];
$project_id = $_GET['project_id'];
$researcher_id = $_GET['researcher_id'];
$project_name = $_GET['project_name'];
$researcher_fname = $_GET['researcher_fname'];
$researcher_lname = $_GET['researcher_lname'];
$researcher_email = $_GET['researcher_email'];

if ($loggedin == 1){ 

	if (isset($_POST['confirm'])){
            
			$sql1 = 
			"INSERT INTO assigned_projects 
				(project_id, researcher_id)
			 VALUES
				 ($project_id, $researcher_id)";
			$sql2 = 
			"UPDATE project_application SET 
				 assignment_status = 1
			 WHERE
				 project_id  = $project_id";

			$sql3 = 
			"UPDATE project SET 
				 assignment_status = 1
			 WHERE
				 project_id  = $project_id";
		
			if($conn->query($sql1) &&  $conn->query($sql2) && $conn->query($sql3) ) {
				// if($conn->multi_query($sql)) {
					echo ("<br> <div class='col-md-4 col-md-offset-4'><div class='panel panel-success'><div class='panel-heading text-center'>Assigned Successfully.</div></div></div>");
					header("Refresh: 2; url=applicationsmade.php");
	
				}else {
					echo "Fail".$conn->error;
				}
			
		}
	
			

    ?>
<head>
	<title>Assign This Project</title>

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

<h1 style="text-align: center; color: rgb(132, 227, 59);">Confirm Assignment</h1>
	
	<div class="container">
		
	<div class="row">
    	<div class="col-md-4 col-md-offset-4">
    		<div class="panel panel-default">
			  	<div class="panel-heading">
				  <div class="panel-heading">
			    	<h3 class="panel-title" style="color: rgb(132, 227, 59); text-align:center; font-size: 23px;">Project Title: <?php echo strtoupper($project_name);?></h3>
			 	</div>

			  	<div class="panel-body">
			    	<form accept-charset="UTF-8" role="form"  method="POST">
						<fieldset>
							<div class="form-group">
								<span style="color: rgb(132, 227, 59);">Researcher Full Name:</span><br>
								<input class="form-control"  style="height: 40px; border-color: rgb(132, 227, 59);" type="text" value="<?php echo strtoupper($researcher_fname.' '.$researcher_lname);?>" readonly>
							</div>
							<div class="form-group">
								<span style="color: rgb(132, 227, 59);">Researcher Email:</span><br>
								<input class="form-control"  style="height: 40px; border-color: rgb(132, 227, 59);" type="text" value="<?php echo ($researcher_email);?>" readonly>
							</div>
							
							<input class="btn btn-lg btn-success btn-block" type="submit" name="confirm" value="Confirm Assignment" style="background: rgb(132, 227, 59); font-size: 17px; padding: 7px; border-color: green;">
							<a class="btn btn-lg btn-success btn-block" href="applicationsmade.php" role="button" style="background: rgb(132, 227, 59); font-size: 17px; padding: 7px; border-color: green;">Cancel Assignment</a>

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
			  else{
				echo ("Unauthorized Access");
			}		  

    	?>
    </table>
	    	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>
</html>