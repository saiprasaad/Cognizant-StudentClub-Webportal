<?php
require 'dbconnect.php';
session_start();
$rno=$_SESSION['user'];
$res=mysqli_query($scon,"select * from login where RollNo='$rno'");
$row=mysqli_fetch_array($res);
$name=$row['username'];
$email=$row['email'];
$no=$row['phone'];
$path=$row['imagepath'];
$bio=$row['bio'];
?>
<!DOCTYPE html>
<html lang="en">
    <style>
        a{
            font-size: 20px;
        }
    </style>
           
<head>
	<title>Civic - CV Resume</title>
	<meta charset="UTF-8">
	<meta name="description" content="Civic - CV Resume">
	<meta name="keywords" content="resume, civic, onepage, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->   
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,400i,600,600i,700" rel="stylesheet">

	<link rel="stylesheet" href="css1/bootstrap.min.css"/>
	<link rel="stylesheet" href="css1/font-awesome.min.css"/>
	<link rel="stylesheet" href="css1/flaticon.css"/>
	<link rel="stylesheet" href="css1/owl.carousel.css"/>
	<link rel="stylesheet" href="css1/magnific-popup.css"/>
	<link rel="stylesheet" href="css1/style.css"/>
    

	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
    
	
	<div id="preloder">
		<div class="loader"></div>
	</div>
    <div id="wrapper">
    <header>
      <div class="top">
        
      </div>
      <div class="container-fluid">
          <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
              
  <!-- Brand/logo -->
  <a class="navbar-brand" href="#"><h4 style="color:white;">COGNIZANT CLUB</h4></a>
              <div class="mr-auto"></div>
  
  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item px-2">
      <a class="nav-link" href="index1.php">Home</a>
    </li>
    <li class="nav-item active px-2">
      <a class="nav-link" href="profile.php">Profile</a>
    </li>
    <li class="nav-item px-2">
      <a class="nav-link" href="activity.php">My Activites</a>
    </li>
      <li class="nav-item px-2">
      <a class="nav-link" href="logout.php">Logout</a>
    </li>
  </ul>
</nav>

      </div>
    </header>
    </div>
	
		<section class="hero-section spad">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xl-10 offset-xl-1">
					<div class="row">
						<div class="col-lg-8">
							<div class="hero-text">
								<h2 style="font-size:70px;"><?php echo strtoupper($name);?></h2>
								<p><?php echo $bio;?></p>
							</div>
							<div class="hero-info">
								<h2>General Info</h2>
								<ul>
									<li><span>User ID</span><?php echo $rno;?></li>
									<li><span>E-mail</span><?php echo $email;?></li>
									<li><span>Phone </span><?php echo $no;?></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-4">
							<figure class="hero-image">
								<img src="<?php echo $path; ?>" alt="5">
							</figure>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Hero section end -->

	<!-- Social links section start -->
	
	<!-- Footer section end -->


	<!--====== Javascripts & Jquery ======-->
    
	<script src="js1/jquery-2.1.4.min.js"></script>
	<script src="js1/bootstrap.min.js"></script>
	<script src="js1/owl.carousel.min.js"></script>
	<script src="js1/magnific-popup.min.js"></script>
	<script src="js1/circle-progress.min.js"></script>
	<script src="js1/main.js"></script>
</body>
</html>