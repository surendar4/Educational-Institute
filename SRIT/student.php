<!DOCTYPE HTML>
<html>
<title>
	Student | SRIT </title>
	<?php session_start(); ?>
	<head>
<script src="myfile.js"></script> 
<link rel="stylesheet" href="myfile.css">
	</head>
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
    
<?php 
$id=$_POST["user"];
$psd=$_POST["password"];
$conn=mysqli_connect('localhost','root','ls@143','srit');
if(!$conn)
{
	die("error occured!!!!!!!!!<br>Please try again later");
}
if($_SESSION["id"]!=1)
{
	$sql="select * from srit_sprofile where SID='$id'";
	$result=mysqli_query($conn,$sql);
	while($row=mysqli_fetch_assoc($result))
	{
		$opsd=$row["PASSWORD"];
    $name=$row["NAME"];
	}
	//echo "$psd and $opsd ,$id<br>";
	if($psd==$opsd){

		#echo "Successfully loggedin";
		$_SESSION["id"]=1;
		$_SESSION["user"]=$id;
	echo "	<table width='75%' align='center'><tr><td width='50%'> 
<h3><ul class='drop'>
  <li><a class='active' href='index.html'>&nbspHome&nbsp </a></li>
  <li><a href='#about'> About us&nbsp </a></li>
  <li><a href='admission.php'> Admissions&nbsp </a></li>
  <li><a href='#about'> Academics &nbsp</a></li>
  <li class='dropdown'>
    <a href='javascript:void(0)' class='dropbtn' onclick='myFunction()''>Departments &nbsp</a>
    <div class='dropdown-content' id='myDropdown'>
      <a href='cse.html'>CSE</a>
      <a href='#'>ECE</a>
      <a href='#''>EEE</a><a href='#'>ME</a><a href='#'>CE</a><a href='#'>CHEMICAL</a><a href='#'>PE</a>
    </div>

  </li>
  <li><a href='events.html'> Events&nbsp </a></li>
<li><a href='#about'> &nbspGallery&nbsp </a></li>
  <li><a href='#about'> Contact us&nbsp</a></li>
  <li><a href='logout.php'> Logout&nbsp</a></li>
</ul></h3>



	</td></tr></table>";
  #echo "<center>Welcome $name</center>";
$sql1="select * from srit_sprofile where SID='$id'";
$result1=mysqli_query($conn,$sql1);
while($row=mysqli_fetch_assoc($result1))
{
  $name=$row['NAME'];
  $id=$row["SID"];
  $fname=$row["FNAME"];
  $curr_sem=$row["CURRENT_SEM"];
  $join=$row["JOINED_ON"];
  //$cg=$row["CGPA"];
  $email=$row["email"];
  $branch=$row["BRANCH"];
}
echo "<center>Welcome $name<Br></center>";

$option=$_POST["option"];
echo "<center><br><br>";
echo  "<input type='button' value='View Profile' onclick='profile()'> <br><br>";
echo  "<form action='regd_res_student.php' method='post'><input type='submit' Value='Course Registration' name='option'></form><br><br>";
#echo  "<input type='button' value='Results of Previous semesters' onclick='profile()'><br><br>";
echo  "<form action='regd_res_student.php' method='post'><input type='submit' Value='Results of Previous semesters' name='option'></form><br><br>";

#echo  "<input type='button' value='Attendance' onclick='profile()'><br><br>";

echo "</center>";

echo "<script> 


function profile(){
    alert('REGISTRATION NUMBER: $id \\n\\n NAME: $name \\n\\n FATHER NAME: $fname \\n\\n BRANCH : $branch \\n\\n EMAIL: $email\\n\\n CURRENT SEMESTER : $curr_sem \\n\\n');
}

</script>";





	}
	else
	{
		echo "<script>
		alert('Invalid login');
		</script>";
	echo "	<table width='75%' align='center'><tr><td width='50%'> 
<h3><ul class='drop'>
  <li><a class='active' href='index.html'>&nbspHome&nbsp </a></li>
  <li><a href='#about'> &nbspAbout us&nbsp </a></li>
  <li><a href='admission.php'> &nbspAdmissions&nbsp </a></li>
  <li><a href='#about'> &nbspAcademics &nbsp</a></li>
  <li class='dropdown'>
    <a href='javascript:void(0)' class='dropbtn' onclick='myFunction()''>&nbsp Departments &nbsp</a>
    <div class='dropdown-content' id='myDropdown'>
      <a href='cse.html'>CSE</a>
      <a href='#'>ECE</a>
      <a href='#''>EEE</a><a href='#'>ME</a><a href='#'>CE</a><a href='#'>CHEMICAL</a><a href='#'>PE</a>
    </div>

  </li>
  <li><a href='events.html'> &nbspEvents&nbsp </a></li>
<li><a href='#about'> &nbspGallery&nbsp </a></li>
  <li><a href='#about'> &nbspContact us&nbsp</a></li>
</ul></h3>



	</td></tr></table>";




		//echo "error in login<br>";
		#echo "<font color='red' size='3px' align ='right'>Invalid Username or Password to proceed please login ";
	echo "<table width='40%' align='center' ><tr><td width='60%'>
	<font color='red' size='3px' align ='right'>Invalid Username or Password to proceed please login <br><br>
	<fieldset><legend><font color='black' >Student login</legend><form action='student.php' method='post'>
<input type='text' name='user' placeholder='Username' REQUIRED><br>
<input type='password' name='password' placeholder='Password' REQUIRED><br>
<!--<input type='submit' value='login'>-->
<input type='submit'  align='center' value='login'/>
</form></fieldset><br></td></tr></table>";
	}
	//echo "connected";
}
else
{
	echo "	<table width='75%' align='center'><tr><td width='50%'> 
<h3><ul class='drop'>
  <li><a class='active' href='index.html'>Home&nbsp </a></li>
  <li><a href='#about'> About us&nbsp </a></li>
  <li><a href='admission.php'> Admissions&nbsp </a></li>
  <li><a href='#about'> Academics &nbsp</a></li>
  <li class='dropdown'>
    <a href='javascript:void(0)' class='dropbtn' onclick='myFunction()''>Departments &nbsp</a>
    <div class='dropdown-content' id='myDropdown'>
      <a href='cse.html'>CSE</a>
      <a href='#'>ECE</a>
      <a href='#''>EEE</a><a href='#'>ME</a><a href='#'>CE</a><a href='#'>CHEMICAL</a><a href='#'>PE</a>
    </div>

  </li>
  <li><a href='events.html'> Events&nbsp </a></li>
<li><a href='#about'> &nbspGallery&nbsp </a></li>
  <li><a href='#about'> Contact us&nbsp</a></li>
  <li><a href='logout.php'> Logout&nbsp</a></li>
</ul></h3>



	</td></tr></table>";
	/*echo "<center>";
echo "<form action='student.php' method='post'>
<input type='submit' value='Profile' name='option'></form><br>";
echo "<form action='student.php' method='post'>
<input type='submit' value='Pre Registration' name='option'></form> <br>";
echo "<form action='student.php' method='post'>
<input type='submit' value='Academic performance' name='option'></form> <br>";
echo "<form action='student.php' method='post'>
<input type='submit' value='Attendance' name='option'></form> <br>";
echo "</center>"; */

$id=$_SESSION["user"];
$sql1="select * from srit_sprofile where SID='$id'";
$result1=mysqli_query($conn,$sql1);
while($row=mysqli_fetch_assoc($result1))
{
	$name=$row['NAME'];
  $id=$row["SID"];
  $fname=$row["FNAME"];
  $curr_sem=$row["CURRENT_SEM"];
  $join=$row["JOINED_ON"];
  //$cg=$row["CGPA"];
  $email=$row["email"];
  $branch=$row["BRANCH"];
}
echo "<center>Welcome $name<Br></center>";

$option=$_POST["option"];
echo "<center><br><br>";
echo  "<input type='button' value='View Profile' onclick='profile()'> <br><br>";
echo  "<form action='regd_res_student.php' method='post'><input type='submit' Value='Course Registration' name='option'></form><br><br>";
#echo  "<input type='button' value='Results of Previous semesters' onclick='profile()'><br><br>";
echo  "<form action='regd_res_student.php' method='post'><input type='submit' Value='Results of Previous semesters' name='option'></form><br><br>";

#echo  "<input type='button' value='Attendance' onclick='profile()'><br><br>";

echo "</center>";

echo "<script> 


function profile(){
    alert('REGISTRATION NUMBER: $id \\n\\n NAME: $name \\n\\n FATHER NAME: $fname \\n\\n BRANCH : $branch \\n\\n EMAIL: $email\\n\\n CURRENT SEMESTER : $curr_sem \\n\\n');
}

</script>";

#echo "<form class='simple' action='student.php' method='post'>
#<input type='submit' value='nothing'>";
#echo "<form action='student.php' method='post'>
#<input type='submit' value='Profile' name='option'></form><br>";
#echo "<a href='student.php'>Profile</a><br><br><a href='student.php'>Pre Registration</a><br><br><a href='student.php'>Last semesters performance</a><br><br><a href='student.php'>Attendance</a><br><br><br><br>;";
/*echo "<table width='90%'><tr><td width='30%' bgcolor='silver'><br><br><form action='student.php' method='post'><input type='submit' value='Profile' name='option'></form> <br><br><form action='student.php' method='post'><input type='submit' value='Course Registration' name='option'></form><br><br><form action='student.php' method='post'><input type='submit' value='Performance of last semesters' name='option'></form><br><br><form action='student.php' method='post'><input type='submit' value='Attendance' name='option'></form><br><br><br><br></td><td width='60%'>

<!---#second column --->
</td><td width='20%'></td></tr></table>";
/*
if($option=='Profile')
{
  $sql2="select * from srit_sprofile where SID='$id'";
  $result2=mysqli_query($conn,$sql2);
while($row=mysqli_fetch_assoc($result2))
{
//  $fname=$row['FNAME'];
echo "<center>NAME:".$row["NAME"]."<br>FATHER'S NAME:".$row["FNAME"]."<br>DEPARTMENT:".$row["DEPT"]."<br>CURRENT SEMESTER:".$row["SEM"]."<br>CGPA:".$row["CGPA"]."<br>JOINED YEAR:".$row["JOINED_ON"]."<br></center>";
}
} */

}
mysqli_close($conn);

?>


	</html>
