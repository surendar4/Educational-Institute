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
$courses=$_POST["course"];


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

	#$conn=mysqli_connect('localhost','b130834cs','Vali@8254','db_b130834cs');
	$conn=mysqli_connect('localhost','root','ls@143','srit');
	$option=$_POST["option"];
	$id=$_SESSION["user"];
	if(!$conn)
	{
		die("error occured!!!!!!!!!<br>Please try again later");
	}
	if($_SESSION["id"]!=1)
	{
		echo "<table width='40%' align='center' ><tr><td width='60%'>
		<font color='red' size='3px' align ='right'>Invalid Username or Password to proceed please login <br><br>
		<fieldset><legend><font color='black' >Student login</legend><form action='student.php' method='post'>
		<input type='text' name='user' placeholder='Username' REQUIRED><br>
		<input type='password' name='password' placeholder='Password' REQUIRED><br>
<!--<input type='submit' value='login'>-->
		<input type='submit'  align='center' value='login'/>
		</form></fieldset><br></td></tr></table>";
	}
	else
	{
		$sql1="select * from srit_sprofile where SID='$id'";
$result1=mysqli_query($conn,$sql1);
while($row=mysqli_fetch_assoc($result1))
{
	$name=$row['NAME'];
	$branch=$row['BRANCH'];
	echo "<center>Welcome $name<br><br>";
}

		if($option == 'Course Registration')
		{
			echo "<BR>PRE REGISTRATION FOR THE SEMESTER WINTER 2016<BR><BR></CENTER>";

			echo  "<table align='center'><tr><th>COURSE ID</th><th>COURSE NAME</th><th>CREDITS</th><th>SLOT</th><th>FACULTY</th></tr>";
			$sql="select * from srit_courses where CID not IN(select CID from srit_pre_reg where SID='$id') AND CID not IN(select CID from srit_reg_course where SID='$id') AND CID LIKE '%$branch'";
			#$sql="select srit_fprofile.NAME,srit_courses.CID,srit_courses.NAME,srit_courses.CREDITS from srit_courses AND srit_fprofile where CID not IN(select CID from srit_pre_reg where SID='$id') AND CID LIKE '%$branch' AND srit_fprofile.FID=srit_courses.FID";
			$result=mysqli_query($conn,$sql);
			echo "<form action='regd_res_student.php' method='post'>";
			while($row=mysqli_fetch_assoc($result)){
				$CID=$row["CID"];
				echo "<tr><td><input type='checkbox' name='course[]' value='$CID'>".$row['CID']."</td><td>".$row['NAME']."</td><td>".$row['CREDITS']."</td><td>".$row['slot']."</td><td>".$row['FID']."</td></tr>";

			}
			echo "</table>";
			echo "<center><br><input type='submit' value='Register' name='option'></form><br><br><a href='student.php'>Back</a></center>";
		}
		else if($option=='Results of Previous semesters')
		{
			echo "<table align='center' <tr><th>COURSE ID</th><th>COURSE NAME</th><th>GRADE</th><th>SEMESTER</th></tr>";
			$sql="select * from srit_reg_course where SID='$id' group by SEM";
			$result=mysqli_query($conn,$sql);
			while($row=mysqli_fetch_assoc($result)){
			#	echo ""
				$cid=$row["CID"];
				$sqlr="select * from srit_courses where CID='$cid'";
			$resultr=mysqli_query($conn,$sqlr);
			while($rowr=mysqli_fetch_assoc($resultr))
			{
				$namee=$rowr["NAME"];
			}
				echo "<tr><td>".$row['CID']."</td><td>$namee</td><td>".$row['GRADE']."</td><td>".$row['SEM']."</td></tr>";
			}
			
			echo "</table>";
		echo "<center><br><br><a href='student.php'>Back</a></center>";
		}
		else if($option=='Register')
		{
			$length=count($courses);
			#echo $length;
			for($i=0;$i<$length;$i++)
			{
				$cid=$courses[$i];
				$sqlreg="INSERT INTO  srit_pre_reg(SID,CID,SEM,status) values('$id','$cid','W16','requested')";
				$resultreg=mysqli_query($conn,$sqlreg);
				if(!$resultreg)
				{
					echo "ERROR OCCURRED!!!!!!!!!!<br>Try again later<br>";
				}
			}
			#echo  "$courses[0] and $courses[1]";
			echo "registered";
			echo "<center><br><br><a href='student.php'>Back</a></center>";
		}
		

	}

?>

    </body>
    </html>
