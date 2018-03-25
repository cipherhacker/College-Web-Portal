<?php
  session_start();
  
  include("../Login/Mysql_Config.php");
	
	if(isset($_POST['upload-file'])){
		if(isset($_FILES['file'])){
		$name = $_FILES['file']['name'];
		$size = $_FILES['file']['size'];
		$type = $_FILES['file']['type'];
		$tmp = $_FILES['file']['tmp_name'];
		$file = 'uploads/'.$_FILES['file']['name'];

		$move = move_uploaded_file($tmp,$file);
            
    $sql = "delete from uploadsa;";
         $db->query($sql);

		$sql = "INSERT INTO uploadsa (path) VALUES ('$file')";

		if (mysqli_query($db,$sql)) {
	      echo "record added successfully";
	    } else {
	      echo "Error: ";
	    }
	}
}


		
if(isset($_POST['upload-data'])){
	
	 include('PHPExcel-1.8/Classes/PHPExcel/IOFactory.php');
	 
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "intelbox1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
	$path = "";
    
	 $sql = "select path from uploadsa;";
	 $result = $conn->query($sql);
	
	 
	if ($result->num_rows == 1) {
	     
		$row = $result->fetch_assoc();
		$inputFileName = $row['path'];
		
		echo $row['path'];
	  
	  try {
	    $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
	    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
	    $objPHPExcel = $objReader->load($inputFileName);
	} catch(Exception $e) {
	    die('Error loading file"'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
	}

	$objWorksheet = $objPHPExcel->getSheet(0); 
	$highestRow = $objWorksheet->getHighestRow(); 
	$highestColumn = $objWorksheet->getHighestColumn();

	 $headingsArray = $objWorksheet->rangeToArray('A1:'.$highestColumn.'1',null, true, true, true);
	  $headingsArray = $headingsArray[1];
	  $r = -1;
	  $namedDataArray = array();
	  for ($row = 2; $row <= $highestRow; ++$row) {
	  $dataRow = $objWorksheet->rangeToArray('A'.$row.':'.$highestColumn.$row,null, true, true, true);
	  if ((isset($dataRow[$row]['A'])) && ($dataRow[$row]['A'] > '')) {
	       ++$r;
	  foreach($headingsArray as $columnKey => $columnHeading){
	      $namedDataArray[$r][$columnHeading] = $dataRow[$row][$columnKey];
	    }
	  }
	}
        
        
        $dbMapping = array(
	    'col1' => 'week1',
	     'col2' => 'week2',
		  'col3' => 'week3',
		   'col4' => 'week4',
			   'col5' => 'rollno',
        'col6' => 'email'
	);
        
        
        $sql = "delete from weekly_attd;";
         $conn->query($sql);

	foreach($namedDataArray as $key=>$value){
	  $week1 = $value[$dbMapping['col1']];
	  $week2 = $value[$dbMapping['col2']];
	  $week3 = $value[$dbMapping['col3']];
	  $week4 = $value[$dbMapping['col4']];
	  $rollno = $value[$dbMapping['col5']];
	  
        
	 $sql = "INSERT INTO weekly_attd values('$week1','$week2','$week3','$week4','$rollno');";



	   if ($conn->query($sql)=== TRUE) {
		   echo "hello";
	    } else {
	      echo  "Error: " . $sql . "<br>" . $conn->error;
	    }
	

	}
 
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
  <title>IntelBox Upload Page</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    
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
          <a class="nav-link" href="main2.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
      
        
		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Fill Details">
          <a class="nav-link" href="details_form2.php">
            <i class="fa fa-pencil-square-o"></i>
            <span class="nav-link-text">Upload Sheet</span>
          </a>
        </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Fill Details">
          <a class="nav-link" href="attendance_details_form2.php">
            <i class="fa fa-pencil-square-o"></i>
            <span class="nav-link-text">Attendence Upload Sheet</span>
          </a>
        </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Fill Details">
          <a class="nav-link" href="attendence_main2.php">
            <i class="fa fa-pencil-square-o"></i>
            <span class="nav-link-text">Attendence map</span>
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
            <h6 class="dropdown-header">Faculty:</h6>
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
             
              <div class="dropdown-message small">Sub:</div>
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
          <div class="dropdown-menu" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">New Alerts:</h6>
            <div class="dropdown-divider"></div>
           
            
            
            <a class="dropdown-item">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
              <div class="dropdown-message small">no notification</div>
            </a>
            <div class="dropdown-divider"></div>
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
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Upload Excel Sheet</li>
      </ol>
    <br><form class="form-wrapper"  enctype="multipart/form-data" method="post"><br><br><input type="file" name="file"><br><br><br><input type="submit" name="upload-file" value="Upload Excel Sheet"><br><br>
        <br>
        <br><input type="submit" name="upload-data" value="Upload Data"></form>
	<span><?php $error;?></span>
	<br><br>
    
    
         
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
            <a class="btn btn-primary" href="..\Login\index.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
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
