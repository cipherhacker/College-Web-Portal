<?php

    session_start();
   include("../Login/Mysql_Config.php");

    $DM=0; 
  $DF=0; 
  $MES=0; 
  $INS=0; 
  $PC=0; 
  $BA=0; 
  
  $DM_2=0; 
  $DF_2=0; 
  $MES_2=0; 
  $INS_2=0; 
  $PC_2=0; 
  $BA_2=0; 
  
  $name1=$_SESSION['name'];
	
  $e1=$_SESSION['login_user'];
  
  $sql= "SELECT * FROM p_register WHERE email='$e1'";
  $result = mysqli_query($db,$sql);
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $name = $row['child_name'];
  $rolln = $row['child_roll'];
  
  $sql= "SELECT * FROM register WHERE rollno='$rolln'";
  $result = mysqli_query($db,$sql);
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $e = $row['email'];
  
  
   
   
      $sql = "SELECT * FROM unit1 WHERE email='$e' ";
	  
	   $sql2 = "SELECT * FROM unit2 WHERE email='$e' ";
	  
      $result = mysqli_query($db,$sql);
	  $result2 = mysqli_query($db,$sql2);
	  	  
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	  $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);

      
      
      $count = mysqli_num_rows($result);
	  $count2 = mysqli_num_rows($result2);
      if($count==1)
      {
          $_SESSION['DM']=$row['DM'];
          $DM=$_SESSION['DM'];  
        
        $_SESSION['DF']=$row['DF'];
          $DF=$_SESSION['DF'];  
        $_SESSION['MES']=$row['MES'];
          $MES=$_SESSION['MES'];  
        $_SESSION['INS']=$row['INS'];
          $INS=$_SESSION['INS'];  
        $_SESSION['PC']=$row['PC'];
          $PC=$_SESSION['PC'];
      $_SESSION['BA']=$row['BA'];
          $BA=$_SESSION['BA'];          
       

           $sql="select name from register where email='$e'"; 
            $result = mysqli_query($db,$sql);
           $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            $name=$row['name'];
			
			
	
        }
		
		    if($count2==1)
      {
          
          $DM_2=$row2['DM_2'];
		  $DF_2=$row2['DF_2'];
		  $MES_2=$row2['MES_2'];
		  $INS_2=$row2['INS_2'];
		  $PC_2=$row2['PC_2'];
		  $BA_2=$row2['BA_2'];
              
       

           $sql="select name from register where email='$e'"; 
            $result = mysqli_query($db,$sql);
           $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            $name=$row['name'];
			
			
	
        }
		
        else{

          echo "given number not present";
        }
    

?>


 <?php
 $sql1  = "select * from par_announce";
	  $result1 = mysqli_query($db,$sql1);
      
      
      $count1 = mysqli_num_rows($result1);
	  $i=0;
	  $lists = array();
	  $lista = array();
	  if($count1>0){
	  while ($row1=mysqli_fetch_array($result1)){
		  $lists[$i] = $row1['subject'];
		  $lista[$i] = $row1['announcement'];
		  $i++;
	  }
	  }
?>     			  
      



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>IntelBox Homepage</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<!--Piechart-->
<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);
google.charts.setOnLoadCallback(drawChart2);
// Draw the chart and set the chart values
function drawChart() {
    var DM=<?php echo $DM; ?>;
	   var DF=<?php echo $DF; ?>;
	    var MES=<?php echo $MES; ?>;
		 var INS=<?php echo $INS; ?>;
		  var PC=<?php echo $PC; ?>;
		  var BA=<?php echo $BA; ?>;
  var data = google.visualization.arrayToDataTable([
  ['Subject', 'Marks'],
  ['DM', DM],
  ['DF', DF],
  ['MES', MES],
  ['INS', INS],
  ['PC', PC],
  ['BA', BA]
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Unit Test 1', 'width':550, 'height':400};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}

function drawChart2() {
    var DM_2=<?php echo $DM_2; ?>;
	   var DF_2=<?php echo $DF_2; ?>;
	    var MES_2=<?php echo $MES_2; ?>;
		 var INS_2=<?php echo $INS_2; ?>;
		  var PC_2=<?php echo $PC_2; ?>;
		  var BA_2=<?php echo $BA_2; ?>;
  var data = google.visualization.arrayToDataTable([
  ['Subject', 'Marks'],
  ['DM', DM_2],
  ['DF', DF_2],
  ['MES', MES_2],
  ['INS', INS_2],
  ['PC', PC_2],
  ['BA', BA_2]
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Unit Test 2', 'width':550, 'height':400};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart2'));
  chart.draw(data, options);
}

</script>



<style>

#ChartGpa {
    overflow:auto;
}

.content-wrapper{
	
	overflow:scroll;
}

</style
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <div class="navbar-brand">
      <img src="css/lg1.png"  height="40px" width="50px"/>
      <span style="color: #dc006c;  z-index: 10;">INTEL</span>
      <span style="left: -4px;">BOX</span>
    </div>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>	
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="main4.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
		
		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Attendance Map">
          <a class="nav-link" href="attendance_main4.php">
            <i class="fa fa-pencil-square-o"></i>
            <span class="nav-link-text">Attendance Map</span>
          </a>
        </li>
        
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-user"></i>
            <span class="d-lg-none">Profile
              
            <span class="indicator text-primary d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header">Parents</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item">
              <strong>Email:</strong>
             
              <div class="dropdown-message small"><?php echo "".$_SESSION['login_user']."" ?></div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item">
              <strong>Roll No.</strong>
              
              <div class="dropdown-message small"><?php echo "".$_SESSION['rollno']."" ?></div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item">
              <strong>Class</strong>
             
              <div class="dropdown-message small">TE-IT-A1</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">View all details</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-bell"></i>
            <span class="d-lg-none">Alerts
              <span class="badge badge-pill badge-warning">6 New</span>
            </span>
            <span class="indicator text-warning d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">New Alerts:</h6>
            <div class="dropdown-divider"></div>
            <?php 
			for($i=0;$i<$count1;$i++){
            echo "<a class='dropdown-item'>";
              echo "<span class='text-success'>";
                echo "<strong>";
                  echo "<i class='fa fa-long-arrow-up fa-fw'></i>".$lista[$i]."</strong>";
              echo "</span>";
              echo "<div class='dropdown-message small'>".$lista[$i]."</div>";
			  
            echo "</a>";
            echo "<div class='dropdown-divider'></div>";
			
			}
			?>
            <a class="dropdown-item small" href="#">View all alerts</a>
          </div>
        </li>
        <!--<li class="nav-item">
          <form class="form-inline my-2 my-lg-0 mr-lg-2">
            <div class="input-group">
              <input class="form-control" type="text" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-primary" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </form>
        </li>-->
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid" style="width: 60rem;">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>
    
      <!-- GPA Chart-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-area-chart"></i> GPA Chart</div>
        <div class="card-body">
          <canvas id="ChartGpa" width="900" height="350"></canvas>
        </div>
        <div class="card-footer small text-muted">You can update this info by going in 'Fill Details' Tab.</div>
      </div>
       
         <div class="row">
        <div class="col-lg-8">
          <!-- PIE CHART ANALYSIS-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-pie-chart"></i> Pie Chart Analysis</div>
            <div class="card-body">
			<div id="piechart"></div>
			
            </div>
            <div class="card-footer small text-muted">You can update this info by going in 'Fill Details' Tab.</div>
          </div>
		  </div>
		 </div>
		  
		  
		      <!-- GPA Chart-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-area-chart"></i> GPA Chart2</div>
        <div class="card-body">
          <canvas id="ChartGpa2" width="900" height="350"></canvas>
        </div>
        <div class="card-footer small text-muted">You can update this info by going in 'Fill Details' Tab.</div>
      </div>
       
         <div class="row">
        <div class="col-lg-8">
          <!-- PIE CHART ANALYSIS-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-pie-chart"></i> Pie Chart Analysis 2</div>
            <div class="card-body">
			<div id="piechart2"></div>
			
            </div>
            <div class="card-footer small text-muted">You can update this info by going in 'Fill Details' Tab.</div>
          </div>
		  </div>
		 </div>
		  
        
		  
		  
         
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © IntelBox 2017</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="..\Login\session.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
	
   <!-- CHART JS -->
    <script type="text/javascript" src=".\js\chart.js"></script> 
    <script type="text/javascript">
      var DM=<?php echo $DM; ?>;
	   var DF=<?php echo $DF; ?>;
	    var MES=<?php echo $MES; ?>;
		 var INS=<?php echo $INS; ?>;
		  var PC=<?php echo $PC; ?>;
			var BA=<?php echo $BA; ?>;
	  console.log(DM);
      //var name=<?php echo $name; ?>;
      var canvas = document.getElementById("ChartGpa");
      var settings = {
          "backgroundColor": "",
          "chartColor": "",
          "chartLinesColor": "",
          "textColor": ""
          };

      var data = {
        "xName": "Subject",
        "yName": "Marks",
        "cols": ["DM","DF","MES","INS","PC","BA"],
        "data": [{ "name": '<?php echo "$name" ?>', "values": [DM,DF,MES,INS,PC,BA] }]
        };

      chartify(canvas, data, settings);   
    </script>
	
	    <script type="text/javascript">
      var DM_2=<?php echo $DM_2; ?>;
	   var DF_2=<?php echo $DF_2; ?>;
	    var MES_2=<?php echo $MES_2; ?>;
		 var INS_2=<?php echo $INS_2; ?>;
		  var PC_2=<?php echo $PC_2; ?>;
			var BA_2=<?php echo $BA_2; ?>;
	  console.log(DM);
      //var name=<?php echo $name; ?>;
      var canvas = document.getElementById("ChartGpa2");
      var settings = {
          "backgroundColor": "",
          "chartColor": "",
          "chartLinesColor": "",
          "textColor": ""
          };

      var data = {
        "xName": "Subject",
        "yName": "Marks",
        "cols": ["DM","DF","MES","INS","PC","BA"],
        "data": [{ "name": '<?php echo "$name" ?>', "values": [DM_2,DF_2,MES_2,INS_2,PC_2,BA_2] }]
        };

      chartify(canvas, data, settings);   
    </script>
	
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
   <!-- <script src="js/sb-admin-charts.min.js"></script>-->

	
</div>
</body>
</html>
