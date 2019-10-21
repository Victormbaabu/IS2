<?php
if (isset($_POST['submit'])){
  include ("dbconn.php");

  $project_id=$_POST["project_id"];
  $project_name=$_POST["project_name"];
  $project_duration=$_POST["project_duration"];
  $p_description=$_POST["p_description"];
  $p_attachment=$_POST["p_attachment"];
 
  
 $sql = "INSERT INTO project (project_id, product_name, project_duration,)
        VALUES ('$project_id','$project_name', '$project_duration')";

 $sql = "INSERT INTO project_description (p_desccription, p_attachment, project_id)
        VALUES ('$p_desccription', 'p_attachment', project_id)";

   if ($conn->query($sql)) {
   echo ("<br> Project added succesfully.");
  }
  else{
   echo ("Project failed to add.". $conn->error);
  }
}
?>

<!DOCTYPE html>
<html>
   
<head>
 
  
    <style type="text/css">
    body {
    background-image: url("resach.jpg");
    background-repeat: no-repeat;
    background-image: (width: 100%, height: 100%);
                    
    
}
    button {
      background-color:blue;
      color: grey;
      padding: 14px 20px;
      display: inline-block;
      margin: 5px;
      border: none;
      cursor: pointer;
      width: 15%;

    }
    

  </style>
</head>
<body>
    
    <div class="button_container">
      <a href="login.php"><button type="button">Login</button></a>
      <a href="logout.php"><button type="button"> Logout</button></a>
    </div>
</body>
</html>
