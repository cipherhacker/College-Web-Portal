  <?php
	 session_start();
	 include("../Login/Mysql_Config.php");
  
  function check(){
     
      $Email = mysqli_real_escape_string($db,$_POST['email']);
      $Pass = mysqli_real_escape_string($db,$_POST['password']); 
   
      $sql = "SELECT * FROM  register WHERE Email = '$Email' and Password = '$Pass'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
     
      // If result matched $Email and $Pass, table row must be 1 row
    
      if($count == 1) {
         //session_register("Email");
         
      }else {
         $error = "Your Login Name or Password is invalid";

      }
   }

?>

<?php
 $sql1  = "select * from stud_announce";
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
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link type="text/css" rel="stylesheet" href=".\css\mycss.css">

<script>
$(document).ready(function(){
  $(".form-wrapper .button").click(function(){
    var button = $(this);
    var currentSection = button.parents(".section");
    var currentSectionIndex = currentSection.index();
    var headerSection = $('.steps li').eq(currentSectionIndex);
    currentSection.removeClass("is-active").next().addClass("is-active");
    headerSection.removeClass("is-active").next().addClass("is-active");

    $(".form-wrapper").submit(function(e) {
      e.preventDefault();
    });

    if(currentSectionIndex === 3){
      $(document).find(".form-wrapper .section").first().addClass("is-active");
      $(document).find(".steps li").first().addClass("is-active");
    }
  });
});

</script>
<script>
$(document).ready(function() {
$('.hideContent').hide();
$(document).on("change", "select.dropdownHideContent", function(){ 
	displaySelectContent($(this).attr("id"));
});

$("select.dropdownHideContent").each(function(){
	var selectID = $(this).attr("id");
    if($("#"+selectID).val()) {
		displaySelectContent($("#"+selectID).attr("id"));
	};	
});
function displaySelectContent(chkID)
	{
		var optionID = $("option:selected","#"+chkID).attr('id');  
		$('[id^="'+chkID+'-"]').hide('slow');
		$('#'+chkID+'-'+optionID).show('slow');
	};
 
}); 
</script>
  
 <script>
var room = 1;
function education_fields() {
 
    room++;
    var objTo = document.getElementById('education_fields')
    var divtest = document.createElement("div");
	divtest.setAttribute("class", "form-group removeclass"+room);
	var rdiv = 'removeclass'+room;
    divtest.innerHTML = '<div class="col-sm-3 nopadding"><div class="form-group"> <input type="date" class="form-control" id="ex_date" name="ex_date[]" value=""></div></div><div class="col-sm-3 nopadding"><div class="form-group"> <textarea class="form-control" id="ex_details" name="ex_details[]" rows="5" cols="40">Enter Details</textarea></div></div><div class="input-group-btn"> <button class="btn btn-danger" type="button" onclick="remove_education_fields('+ room +');"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button></div></div></div></div><div class="clear"></div>';
    
    objTo.appendChild(divtest)
}
   function remove_education_fields(rid) {
	   $('.removeclass'+rid).remove();
   }
</script> 
  
  
    
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
          <a class="nav-link" href="main.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Timeline">
          <a class="nav-link" href="timeline.php">
            <i class="fa fa-tasks"></i>
            <span class="nav-link-text">Timeline</span>
          </a>
        </li>
        
		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Fill Details">
          <a class="nav-link" href="details_form.php">
            <i class="fa fa-pencil-square-o"></i>
            <span class="nav-link-text">Fill Details</span>
          </a>
        </li>
		
			<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Attendance Map">
          <a class="nav-link" href="attendance_main.php">
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
          <div class="dropdown-menu" aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header">User:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item">
              <strong>Email:</strong>
             
              <div class="dropdown-message small"><?php echo $_SESSION['login_user']; ?></div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item">
              <strong>Roll No.</strong>
              
              <div class="dropdown-message small"><?php echo $_SESSION['rollno']; ?></div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item">
              <strong>Class</strong>
             
              <div class="dropdown-message small">IT</div>
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
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Upload Excel Sheet</li>
      </ol>
    <br>
	
	      <!-- Area Chart Example-->
     <div class="container">
    <div class="wrapper">
          <h3>Experience Details</h3>
<div class="panel panel-default">
  <div class="panel-heading">Enter your experience date and respective details.</div>
  <div class="panel-heading">Click on green/red mark to add/remove the fields respectively</div><br><br>
  <div class="panel-body">
  
  <div id="education_fields">
          
        </div>
       <div class="col-sm-3 nopadding">
  <div class="form-group">
    <input type="date" class="form-control" id="ex_date" name="ex_date[]" value="">
  </div>
</div>


<div class="col-sm-3 nopadding">
  <div class="form-group">
    <div class="input-group">
      <textarea class="form-control" id="ex_details" name="ex_details[]" rows="5" cols="40">Enter Details</textarea>
      
      <div class="input-group-btn">
        <button class="btn btn-success" type="button"  onclick="education_fields();"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </button>
      </div>
    </div>
  </div>
  <form><input type="submit" value="Submit Form"></form>
</div>
</div>
</div>
<br>
<br>	
          
	<br><br> </div></div>
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
