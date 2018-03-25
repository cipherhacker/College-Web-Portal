<?php
 include("../Login/Mysql_Config.php");
 $error='';
 if($_SERVER["REQUEST_METHOD"] == "POST") {
	 if(isset($_POST['create']))
      {
		  $Email = mysqli_real_escape_string($db,$_POST['email']);
			$Pass = mysqli_real_escape_string($db,$_POST['pass']); 
			$dept = mysqli_real_escape_string($db,$_POST['dept']);
      $name = mysqli_real_escape_string($db,$_POST['name']); 
	  $sql = "INSERT INTO f_register VALUES ('$name', '$Email', '$dept','$Pass')";

if ($db->query($sql) === TRUE) {
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}
	  
	  }
 }
?>