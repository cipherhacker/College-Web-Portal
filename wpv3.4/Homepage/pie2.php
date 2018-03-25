<?php
session_start();
   include("../Login/Mysql_Config.php");

    if(isset($_POST['rollno']))
    {
  $sem1=0; 
  $sem2=0; 
  $sem3=0; 
  $sem4=0; 
  $sem5=0; 
  $sem6=0; 
  $sem7=0; 
  $sem8=0; 
  $r=$_POST['rollno']; 
      $sql = "SELECT * FROM sem WHERE rollno='$r' ";
      $result = mysqli_query($db,$sql);
	  	  
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

      
      
      $count = mysqli_num_rows($result);
      if($count==1)
      {
          $_SESSION['sem1']=$row['sem1'];
          $sem1=$_SESSION['sem1'];  
        
        $_SESSION['sem2']=$row['sem2'];
          $sem2=$_SESSION['sem2'];  
        $_SESSION['sem3']=$row['sem3'];
          $sem3=$_SESSION['sem3'];  
        $_SESSION['sem4']=$row['sem4'];
          $sem4=$_SESSION['sem4'];  
        $_SESSION['sem5']=$row['sem5'];
          $sem5=$_SESSION['sem5'];
      $_SESSION['sem6']=$row['sem6'];
          $sem6=$_SESSION['sem6'];          
        $_SESSION['sem7']=$row['sem7'];
          $sem7=$_SESSION['sem7'];  
        $_SESSION['sem8']=$row['sem8'];
          $sem8=$_SESSION['sem8'];

           $sql="select name from register where rollno='$r'"; 
            $result = mysqli_query($db,$sql);
           $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            $name=$row['name'];
			
			

        }
        else{

          echo "given number not present";
        }
    }

?>


<!DOCTYPE html>
<html lang="en-US">
<body>

<h1>My Web Page</h1>

<div id="piechart"></div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Subject', 'Marks'],
  ['DM', <?php echo $sem1 ?>],
  ['PC', 22],
  ['INS', 24],
  ['MES', 12],
  ['DF', 28]
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Unit Test1', 'width':550, 'height':400};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>

</body>
</html>
