
<?php
	session_start();
	$error='';
 	 include("Mysql_Config.php");
 	if($_SERVER["REQUEST_METHOD"] == "POST") {
		
      // email and password sent from form 
		if(isset($_POST['signin']))
      {

		
      $Email = mysqli_real_escape_string($db,$_POST['email']);
      $Pass = mysqli_real_escape_string($db,$_POST['pass']); 
   
      $sql = "SELECT * FROM  admin WHERE email = '$Email' and pass = '$Pass'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $Email and $Pass, table row must be 1 row
		
      if($count == 1) {
         //session_register("Email");
         $_SESSION['login_user'] = $Email;
         $_SESSION['name'] = $row['name'];
		 //$_SESSION['rollno'] = $row['rollno'] ; 
	
	//if($Email==='admin@somaiya.edu'&&$Pass==='admin123')
		header("Location:../Homepage/main3.php");
      }else
	 {
        //for faculty
		$Email = mysqli_real_escape_string($db,$_POST['email']);
      $Pass = mysqli_real_escape_string($db,$_POST['pass']); 
   
      $sql = "SELECT * FROM  f_register WHERE email = '$Email' and pass = '$Pass'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      //$active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $Email and $Pass, table row must be 1 row
		
      if($count == 1) {
         //session_register("Email");
         $_SESSION['login_user'] = $Email;
         $_SESSION['name'] = $row['name'];
		 //$_SESSION['rollno'] = $row['rollno'] ; 
	
		//if($Email==='purnimaahirao@somaiya.edu'&&$Pass==='purnima123')
			 header("Location: ../Homepage/main2.php");
	}else
	 {
         //for students
		 $Email = mysqli_real_escape_string($db,$_POST['email']);
      $Pass = mysqli_real_escape_string($db,$_POST['pass']); 
   
      $sql = "SELECT * FROM  register WHERE email = '$Email' and pass = '$Pass'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $Email and $Pass, table row must be 1 row
		
      if($count == 1) {
         //session_register("Email");
         $_SESSION['login_user'] = $Email;
         $_SESSION['name'] = $row['name'];
		 $_SESSION['rollno'] = $row['rollno'] ; 
		
		header("Location: ../Homepage/main.php");
      }else
	 {
         //for parents
	$Email = mysqli_real_escape_string($db,$_POST['email']);
      $Pass = mysqli_real_escape_string($db,$_POST['pass']); 

   
      $sql = "SELECT * FROM  p_register WHERE email = '$Email' and pass = '$Pass'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $Email and $Pass, table row must be 1 row
		
      if($count == 1) {
         //session_register("Email");
         $_SESSION['login_user'] = $Email;
         $_SESSION['name'] = $row['name'];
		 //$_SESSION['rollno'] = $row['rollno'] ; 
		
		header("Location: ../Homepage/main4.php");
      }else
	 {
         $error = "Your Login Name or Password is invalid";
      	}
   }
      	}
   }

   if(isset($_POST['signup']))
   {
   	 
   	  $Name = mysqli_real_escape_string($db,$_POST['name']);
      $Rollno = mysqli_real_escape_string($db,$_POST['rollno']); 
	  $Email = mysqli_real_escape_string($db,$_POST['email1']);
      $Pass = mysqli_real_escape_string($db,$_POST['pass']);
	  $sql1="insert into register (Name,Email,Rollno,Password) values ('$Name','$Email','$Rollno','$Pass')";
     	   
     if (mysqli_query($db, $sql1)) {
      		
      		$_SESSION['login_user'] = $Email;
      		$_SESSION['name'] = $Name;
      		$_SESSION['rollno'] = $Rollno ;
    		header("Location: ../Homepage/main.php");
		}
		
	}
	
}
	}


 ?>


<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">

  <title>IntelBox Login/Register</title>
   <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js">
  </script>

<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.8/jquery.validate.min.js"></script>
  
   <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans:600'>
<link rel="stylesheet" href="./css/style.css">
<link rel="stylesheet" href="./css/ib_logo.css">
 <script type="text/javascript" src="valid.js"></script>

<style type="text/css">
  .error
  {
    color: red;
  }
  .valid {
    color:green;
}
</style>


  
  
</head>

<body>

	<div id="lg1">
      <img src="css/lg1.png" height="100px" width="120px" />
    </div>

	<h1 class="logo">
		<span class="word1">Intel</span>
		<span class="word2">Box</span>
    </h1>
  
 <div class="login-wrap">
<div class="login-html">
<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
		
 	
 	<div class="login-form">
	
 		
			<div class="sign-in-htm">

				<form id="signin_form" action="" method="post"> 
				<div class="group">
					<label for="email" class="label">Email</label>
					<input name="email" type="text" class="input" placeholder="Enter College Email ID">
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input name="pass" type="password" class="input" data-type="password">
				</div>
				<div class="group">
					<input id="check" type="checkbox" class="check" checked>
					<label for="check"><span class="icon"></span> Keep me Signed in</label>
				</div>
				<span style="color:red;"><?php echo "$error" ?></span> 
				<div class="group">
					<input type="submit" class="button" name="signin" value="Sign In">
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
					<a href="../Homepage/forgot-password.php">Forgot Password?</a>
				</div>
			</form>

			</div>

		

			<div class="sign-up-htm">

			<form id="signup_form" action="" method="post"> 
			    <div class="group">
					<label for="name" class="label">Name </label>
					<input name="name" type="text" class="input" placeholder="Enter your full name"/>
				</div>
				<div class="group">
					<label for="email" class="label">Email </label>
					<input name="email1" type="text" class="input" placeholder="Enter College Email ID"/>
				</div>
				<div class="group">
					<label for="rollno" class="label">Roll Number / Faculty ID</label>
					<input name="rollno" type="number" class="input" placeholder="Enter valid 10 digit phone number">
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="pass" name="pass" type="password" class="input" data-type="password">
				</div>
				<div class="group">
					<label for="repass" class="label">Repeat Password</label>
					<input id="repass" name="repass" type="password" class="input" data-type="password">
				</div>
				<div class="group">
					<input type="submit" class="button" name="signup" value="Sign Up">
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
					<label for="tab-1">Already Member?</label>
				</div>

				</form>
			</div>
		
	</div>
	
</div>
</div>
 


</body>

</html>
