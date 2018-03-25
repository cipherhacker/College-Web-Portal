<?php
 include("../Login/Mysql_Config.php");
 $error='';
 if($_SERVER["REQUEST_METHOD"] == "POST") {
	 if(isset($_POST['update']))
      {
		  $Email = mysqli_real_escape_string($db,$_POST['email']);
			$Pass = mysqli_real_escape_string($db,$_POST['pass']); 
			$dept = mysqli_real_escape_string($db,$_POST['dept']);
      $name = mysqli_real_escape_string($db,$_POST['name']); 
	  $sql = "UPDATE `f_register` SET `name`='$name',`email`='$Email',`dept`='$dept',`pass`='$Pass' WHERE name='$name'";

if ($db->query($sql) === TRUE) {
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}
	  
	  }
 }
?>