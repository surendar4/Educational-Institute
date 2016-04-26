<!DOCTYPE HTML>
<html>
<head >
 <script src="myfile.js"></script> 
<link rel="stylesheet" href="myfile.css">
</head>
<title>
S.R Institute Of Technology | Warangal | Telangana
</title>
<?php session_start(); ?>

<?php
$_SESSION["id"]=0;
$_SESSION["aid"]=0;
$_SESSION["user"]=0;

?>
<body background="back1.jpg">
	
		<table width="90%" align="center" class="main"><tr><td width="100%" id="p2" >
      <center>

      <p id="p3"  align="center"><h2><br><a href="index.html">S.R Institute Of Technology,Warangal</h2>
      Kootigal,Maddur,Warangal,Telangana,506367<br><br><br><br>
      <!--<img src="camp.jpg" align="left" width="20%" height="25%">--><!--<img src="llogoo.png" align="left" width="12%" height="12%"><img src="cllg.jpg" align="center" width="90%" height="220px">--></a></p></td></tr></table>
    <!--</div> -->
    <!--<ul class="nav navbar-nav">-->
    <marquee behaviour="scroll"  direction="LEFT" scrollamount="4"><a href="index.html"> Welcome To S.R INSTITUTE OF TECHNOLOGY | WARANGAL | TELANGANA</a></marquee>
<marquee behaviour="scroll"  direction="RIGHT" scrollamount="4"><a href="index.html">Welcome To S.R INSTITUTE OF TECHNOLOGY | WARANGAL | TELANGANA</a></marquee>
    <table width="75%" align="center"><tr><td width="50%"> 
<h3><ul class="drop">
  <li><a class="active" href="#home">&nbspHome&nbsp </a></li>
  <li><a href="#about"> &nbspAbout us&nbsp </a></li>
  <li><a href="admission.php"> &nbspAdmissions&nbsp </a></li>
  <li><a href="#about"> &nbspAcademics &nbsp</a></li>
  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn" onclick="myFunction()">&nbsp Departments &nbsp</a>
    <div class="dropdown-content" id="myDropdown">
      <a href="cse.html">CSE</a>
      <a href="#">ECE</a>
      <a href="#">EEE</a><a href="#">ME</a><a href="#">CE</a><a href="#">CHEMICAL</a><a href="#">PE</a>
    </div>

  </li>
  <li><a href="events.html"> &nbspEvents&nbsp </a></li>
<li><a href="#about"> &nbspGallery&nbsp </a></li>
  <li><a href="#about"> &nbspContact us&nbsp</a></li>
</ul></h3>



	</td></tr></table>
	<table width="90%" align="center" ><tr><td bgcolor="silver" width="25%" >
		<h3>Main Menu</h3><h4><a href="#home.html">About us</a><br><a href="#home.html">Research and Consultancy</a><br><a href="#home.html">Facilities</a><br> <a href="#home.html">Hostels</a><br><a href="#home.html">Library</a><br><a href="#home.html">Workshops</a><br><a href="#home.html">Laboratories</a><br><a href="#home.html">Anti-Ragging</a><br></h4>
	</td><td width="50%"  ><h3>Announcements:</h3>
<!-- Announcements part-->
<p bgcolor="silver">
<ul class="ulist"> <li class="list"><a href="#home.html">Winter semester registration - 2016</a></li > <br><li class="list"><a href="#home.html">Notice regarding to Central Scholarships</a></li><br><li class="list"><a href="#home.html">Summer Internships</a></li><br><li class="list"><a href="#home.html">Hostel Dues of month feb-2016</a></li></ul></p>



	</td><td bgcolor="silver" width="25%"><h3>Login</h3>
	<fieldset><legend>Student login</legend><form action="student.php" method="post">
<input type="text" name="user" placeholder="Username" REQUIRED><br>
<input type="password" name="password" placeholder="Password" REQUIRED><br>
<!--<input type="submit" value="login">-->
<input type="submit"  align="center" value="login"/>
</form></fieldset><br><br><fieldset>
<legend>Faculty login</legend><form action="faculty.php" method="post">
<input type="text" name="user" placeholder="Username" REQUIRED><br>
<input type="password" name="password" placeholder="Password" REQUIRED><br>
<input type="submit"  align="center" value="login"></form>
  </fieldset></td></tr></table>

	<br>
</center>

</body>
</html>