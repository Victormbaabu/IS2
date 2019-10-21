<!DOCTYPE html>
<html>
<head>


<?php
require('dbconn.php');
$id = $_GET['id'];
//querydata
$sql = "SELECT * from product where product_id=$id";
$res=$conn->query($sql);

if ($res->num_rows>0) {
	while($row=$res->fetch_assoc()){
?>
<?php
		require('dbconn.php');
		$id = $_GET['id'];
		
		if (isset($_POST['submit'])) {

	    
	    $pname = $_POST['name'];
		$pid = $_POST['pid'];
		$ptype = $_POST['type'];
		$pamount = $_POST['amount'];
		$eid = $_POST['eid'];
			
		$query = "UPDATE product set product_name = '$pname',  product_id = '$pid', product_type = '$ptype', product_amount = '$pamount', employee_id = '$eid' where product_id='$id'";

		if($conn->query($query)) {
			echo "Updated successfully";
			header("location:viewproducts.php");

		}else {
			echo "Fail".$conn->error;
		}

		}

		?>

	<title>Update Employee Details</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   
    <link rel="stylesheet" type="text/css" href="sidebar.css">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body background="images/bg.jpg">

	<div class="container">
    <div class="row">
    	<div class="col-md-4 col-md-offset-4">
    		<div class="panel panel-default">
			  	<div class="panel-heading">
                <div class="panel-heading">
			    	<h3 class="panel-title">A project</h3>
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
			    		
			    	</fieldset>
			      	</form>
                      <hr/>
                    
			    </div>
			</div>
		</div>
	</div>
</div>
</div>

</body>
</html>
<?php
}
}
?>