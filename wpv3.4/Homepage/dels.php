<?php
 include("../Login/Mysql_Config.php");
 $error='';
 if($_SERVER["REQUEST_METHOD"] == "POST") {
	 if(isset($_POST['update']))
      {
      $name = mysqli_real_escape_string($db,$_POST['name']); 
	  $sql = "DELETE FROM `register` WHERE name='$name'";

if ($db->query($sql) === TRUE) {
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}
	  
	  }
 }
?>