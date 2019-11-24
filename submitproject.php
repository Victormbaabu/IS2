<?php

session_start();
require('dbconn.php');

// get logged in researcher's id
$loggedin = $_SESSION['researcher_id'];

date_default_timezone_set('Africa/Nairobi');
if (isset($_POST['submit'])){

    $new_project_id=$_POST['submission'];
    // set timezone to Nairobi Time because default is Europe
    date_default_timezone_set('Africa/Nairobi');
    $submission_date = date("Y-m-d H:i:s");
  	$p_attachment = rand(1000,100000)."-".$_FILES['file']['name'];
	$p_attachment_loc = $_FILES['file']['tmp_name'];
	$new_file_name = strtolower($p_attachment);
	$final_file=str_replace(' ','-',$new_file_name);
 	$folder="submissionsfolder/";
	if(move_uploaded_file($p_attachment_loc,$folder.$final_file))
		{
			$sql = "INSERT INTO submissions (project_id, researcher_id, submission_date, attachment)
                    VALUES ('$new_project_id', '$loggedin', '$submission_date', '$p_attachment')";          
            $sql2 = "UPDATE assigned_projects SET submitted = 1
                    WHERE project_id = $new_project_id";
			if ($conn->query($sql) && $conn->query($sql2)) 
				{
				    echo ("<br> <div class='col-md-4 col-md-offset-4'><div class='panel panel-success'><div class='panel-heading text-center'>Project Submitted Succesfully.</div></div></div>");
				}
			else{
					echo ("Project failed to add.". $conn->error);
                }
		}
}

?>


<!DOCTYPE html>
<html>
 <link rel="stylesheet" type="text/css" href="style.css">
<head>
	<title>Submit Project</title>

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
    <?php
    
        $sql3 = "SELECT assigned_projects.project_id, project.project_name 
            FROM assigned_projects 
            JOIN project 
            ON assigned_projects.project_id = project.project_id 
            WHERE assigned_projects.researcher_id = $loggedin AND assigned_projects.submitted = 0";

        $result3 = $conn->query($sql3);
        

        if ($result3) {


            // while ($row = $result3->fetch_assoc()) {
            //     $project_id = $row['project_id'];
            //     $project_name = $row['project_name'];
            // }
        
    
    ?>
	<h1 style="text-align: center; color: white;">FieldMaster</h1>
	<div class="container">
    <div class="row">
    	<div class="col-md-4 col-md-offset-4">
    		<div class="panel panel-default">
			  	<div class="panel-heading">
                <div class="panel-heading">
			    	<h3 class="panel-title" style="color: rgb(132, 227, 59); text-align:center; font-size: 23px;">Submit Project</h3>
			 	</div>
			  	<div class="panel-body">
			    	<form accept-charset="UTF-8" role="form"  method="POST" enctype="multipart/form-data">
                    <fieldset>
			    		<div class="form-group">
                            <select class="form-control" name="submission" style="height: 40px; border-color: rgb(132, 227, 59);">                                <?php
                                    while ($row = $result3->fetch_assoc()) {
                                        $project_id = $row['project_id'];
                                        $project_name = $row['project_name'];
                                        echo "<option value='".$project_id."'>" . $project_name. "</option>";
                                    }
                                ?>
                                <!-- <option value="2">Two</option>
                                <option value="3">Three</option>  -->
                            </select>
                        </div>
						<div class="form-group">
						  Upload Completion File:<br>
    						<input class="form-control" style="height: 40px; border-color: rgb(132, 227, 59);" type="file" name="file" id="fileToUpload" accept="application/pdf" required>
			    		</div>
			    		<!-- <div class="form-group">
			    		    <input class="form-control" placeholder="Project attachment" name="p_attachment" type="text" >
			    		</div> -->
			    		
			    		
			    		<input class="btn btn-lg btn-success btn-block" type="submit" name="submit" value="Submit Project" style="background: rgb(132, 227, 59); font-size: 17px; padding: 7px; border-color: green;">
			    		<!-- <input class="btn btn-lg btn-success btn-block" type="submit" name="submit" value="View All Projects" style="background: green;"> -->
			    		<a class="btn btn-lg btn-success btn-block" href="checkprojects.php" role="button" style="background: rgb(132, 227, 59); font-size: 17px; padding: 7px; border-color: green;">Back to Projects</a>
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
<?php
}
?>
</body>
</html>