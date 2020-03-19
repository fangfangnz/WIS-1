<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head >
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style.css">
<style>
header
{
    background-color:#a35750;
}
body {
  
  background: #F8F8FF;
}
.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 25%;
}
.sidenav {
  height: 100%;
  width: 200px;
  position: fixed;
  z-index: 1;
  top: 0px;
  left: 0px;
  background-color: #111;
  overflow-x: hidden;
  padding-top: 100px;
}

.sidenav a {
  padding: 12px 8px 6px 16px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.main {
  margin-left: 200px; /* Same as the width of the sidenav */
  font-size: 23px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.sub-title{
	color: white;
	background: #5F9EA0;
	text-align: center;
	border: 1px solid #B0C4DE;

  border-radius: 10px 10px 10px 10px;
  padding: 20px;
}
.add-btn {
  padding: 15px;
  font-size: 15px;
  width: 200px;
  color: white;
  background: #5F9EA0;
  border: none;
  border-radius: 5px;
 pa
}
.display-content{
  width: 50%;
  margin: 50px auto 0px;
  color: white;
  background: #5F9EA0;
 
  border: 1px solid #B0C4DE;
  border-bottom: none;
  border-radius: 10px 10px 0px 0px;
  padding: 20px;	
}
</style>
</head>
<body>

<header>

<img src="logo.jpg" alt="Trulli" width="300" height="200" class="center" >
</header>
<div class="sidenav">
  <a href="home.php">Home</a>
  <a href="courses.php">Courses</a>
  <a href="home.php?logout='1'" style="color: red;">logout</a> 
</div>

<div class="main">
	
	<div class="sub-title" >
	<h3 id="courses" class="left" text-align="center">Six Months Certificates!</h3>
	</div>
	<br>

	<div class="header">
  	<h4>Certificate In IT</h4>
    </div>
	<br>
	
	<div class="header">
  	<h4>Certificate In Business</h4>
    </div>
	<br>
	
	<div class="sub-title">
	<h3 id="courses" class="left">One Year Diploma Programmes!</h3>
	</div>
	<br>

	<div class="header">
  	<h4>Diploma In IT Level 5</h4>
    </div>
	<br>
	<div class="header">
  	<h4>Diploma In IT Level 6</h4>
    </div>
	<br>
	
	<div class="header">
  	<h4>Diploma In Business Level 5</h4>
    </div>
	<br>
	<div class="header">
  	<h4>Diploma In Business Level 6</h4>
    </div>
	<br>
	
	
 
</div>
  
</body>
</html> 