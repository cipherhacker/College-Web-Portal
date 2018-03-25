<?php
 include("../Login/Mysql_Config.php");
 $error='';
 if($_SERVER["REQUEST_METHOD"] == "POST") {
	 if(isset($_POST['create']))
      {
		  $Email = mysqli_real_escape_string($db,$_POST['email']);
			$Pass = mysqli_real_escape_string($db,$_POST['pass']); 
			$rollno = mysqli_real_escape_string($db,$_POST['rollno']);
      $name = mysqli_real_escape_string($db,$_POST['name']); 
	  $sql = "INSERT INTO register VALUES ('$name', '$Email', '$rollno','$Pass')";

if ($db->query($sql) === TRUE) {
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}
	  
	  }
 }
?>