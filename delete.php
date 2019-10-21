<?php
   require 'dbconn.php';

   $id = $_GET['id'];

   if(isset($id)){

   	//$sql = "Delete from detail_s where project_id = '$id'";
      $sql = "DELETE FROM project WHERE project.project_id = '$id'";
   	if ($conn->query ($sql)) {
   		header("location:viewprojects.php");
   	}else{
   		echo "<script>alert('<?php echo 'Error'.$conn->error; ?>' ); location.href'viewprojects.php'</script>";
   	}
   	if ($conn->query($sql)) {
   		header("location:viewprojects.php");
   	}
   }
?>