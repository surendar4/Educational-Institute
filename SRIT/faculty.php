<!DOCTYPE HTML>
<html>
<title>
	Faculty | SRIT </title>
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

echo "<center><table width='75%' align='center'><tr><td width='50%'> 
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
	//$id=$_SESSION["user"];
	$id=$_POST["user"];
	$psd=$_POST["password"];
	if(!$conn)
	{
		die("error occured!!!!!!!!!<br>Please try again later");
	}
	
	 if($_SESSION["id"]!=1)
	{

		$sql="select * from srit_fprofile where FID='$id'";
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
		echo "<input type='button' value='View Profile' onclick='profile()'>";
		echo "<br><br><form action='faculty.php' method='post'>
<input type='Submit' Value='My Courses' name='option'></form>";
echo "<br><br><form action='faculty.php' method='post'>
<input type='Submit' Value='Enroll Students' name='option'></form>";
echo "<br><br><form action='faculty.php' method='post'>
<input type='Submit' Value='Grades' name='option'></form>";

} 
else{


		echo "<table width='40%' align='center' ><tr><td width='60%'>
		<font color='red' size='3px' align ='right'>Invalid Username or Password to proceed please login <br><br>
		<fieldset><legend><font color='black' >Student login</legend><form action='faculty.php' method='post'>
		<input type='text' name='user' placeholder='Username' REQUIRED><br>
		<input type='password' name='password' placeholder='Password' REQUIRED><br>
<!--<input type='submit' value='login'>-->
		<input type='submit'  align='center' value='login'/>
		</form></fieldset><br></td></tr></table>";
	}
} 
	else
	{
		$id=$_SESSION["user"];
		$sql1="select * from srit_fprofile where FID='$id'";
$result1=mysqli_query($conn,$sql1);
while($row=mysqli_fetch_assoc($result1))
{
	$name=$row['NAME'];
	//$branch=$row['BRANCH'];
	$doj=$row['DATE_OF_JOIN'];
	$dest=$row['DESTINATION'];
	$today=date('Y-m-d');
	$email=$row["EMAIL"];
	$branch=$row["BRANCH"];
	#echo $today;
	$datetime1 = new DateTime("$today");

$datetime2 = new DateTime("$doj");

$difference = $datetime1->diff($datetime2);
$expy=$difference->y;
$expm=$difference->m;

	echo "<center>Welcome $name<br><br>";
}
$option=$_POST["option"];


#echo "<BR>PRE REGISTRATION FOR THE SEMESTER WINTER 2016<BR><BR></CENTER>";
echo "<input type='button' value='View Profile' onclick='profile()'>";
echo "<br><br><form action='faculty.php' method='post'>
<input type='Submit' Value='My Courses' name='option'></form>";
if($option=='My Courses')
{
	//echo "<br>my courses";
	$sqlmc="select * from srit_courses where FID='$id'";
	$resultmc=mysqli_query($conn,$sqlmc);
	echo  "<table align='center'><tr><th>COURSE ID</th><th>COURSE NAME</th><th>CREDITS</th></tr>";
	while($row=mysqli_fetch_assoc($resultmc))
	{
		echo "<tr><td>".$row['CID']."</td><td>".$row['NAME']."</td><td>".$row['CREDITS']."</td></tr>";
	}
}
echo "<br><br><form action='faculty.php' method='post'>
<input type='Submit' Value='Enroll Students' name='option'></form>";
if($option=='Enroll Students')
{
 $sqles="select distinct srit_sprofile.NAME,srit_courses.CID,CGPA,srit_pre_reg.sr_no from srit_pre_reg ,srit_courses,srit_sprofile where srit_sprofile.SID=srit_pre_reg.SID and srit_courses.CID=srit_pre_reg.CID and srit_courses.FID='$id' and srit_pre_reg.status!='Enrolled' ;";
 $resultes=mysqli_query($conn,$sqles);
 $i=0;
 echo "<table><tr><th>Sr.no</th><th>STUDENT NAME</th><th>COURSE CODE</th><th>CGPA</th></tr>";
 echo "<form action='faculty.php' method='post'>";
 while($row=mysqli_fetch_assoc($resultes))
 {
 	$i++;
 	$sr=$row["sr_no"];
echo "<tr><td>".$i."</td><td>".$row["NAME"]."</td><td>".$row["CID"]."</td><td>".$row["CGPA"]."</td><td><input type='checkbox' value='$sr' name='sr_no[]'></td></tr><br>";
 }
 echo "</table><br><br><center><input type='submit' value='Enroll' name='option'></center></form>";

}
echo "<br><br><form action='faculty.php' method='post'>
<input type='Submit' Value='Grades' name='option'></form>";
	if($option=='Grades')
	{
		#echo "<br>Grades";
	
		$sql="select distinct SID,srit_pre_reg.CID , srit_pre_reg.sr_no from srit_pre_reg,srit_courses where srit_courses.CID=srit_courses.CID and status='Enrolled' and srit_courses.FID='$id' group by CID;";
		$result=mysqli_query($conn,$sql);
		echo "<table><tr><th>CID</th><th>SID</th><th>Grade</th></tr>";
		while($row=mysqli_fetch_assoc($result))
		{
			$srrr=$row["sr_no"];
			echo "<tr><br><form action='faculty.php' method='post'><td>".$row["CID"]."</td><td>".$row["SID"]."</td><td><select name='grade'><option>A</option><option>B</option><option>C</option><option>D</option><option>E</option><option>F</option></select><input type='checkbox' value='$srrr' name='srrr' required>Confim</td><td><input type='submit' value='Enter Grade' name='option'></td></form></tr>";
		}

	}
	if($option=='Enter Grade')
	{
		echo "<br><center>";
		
		$srr=$_POST["srrr"];
		$grade=$_POST["grade"];
	#	$grade=$_POST[]
		$sql="select * from srit_pre_reg where sr_no=$srr";
		$result=mysqli_query($conn,$sql);
		while($row=mysqli_fetch_assoc($result)){
			$sid=$row["SID"];
			$cid=$row["CID"];
			$sem=$row["SEM"];
		}
		$sqlg="INSERT into srit_reg_course values('$sid','$cid','$sem','$grade'); ";
		$resq=mysqli_query($conn,$sqlg);
		if($resq){
			$sql="delete from srit_pre_reg where sr_no=$srr;";
			$result=mysqli_query($conn,$sql);
			if($result){
				echo "Successfully Grade Updated<br>";
			}
			else{
				echo "error occured";
			}
		}
		echo "</center>";

	}


	if($option=='Enroll') {
	
	#echo "ready to enroll<br>";
	# code...
		$sr_no=$_POST["sr_no"];
	$length=count($sr_no);
			#echo $length;
			for($i=0;$i<$length;$i++)
			{
				$sno=$sr_no[$i];
				#echo $sno;
				$sqlenl="update srit_pre_reg set status='Enrolled' where sr_no=$sno";
				$resultenl=mysqli_query($conn,$sqlenl);
				if(!$resultenl)
				{
					echo "ERROR OCCURRED!!!!!!!!!!<br>Try again later<br>";
				}
			}
			#echo  "$courses[0] and $courses[1]";
			echo "registered";
		

		}

echo "<script> 


function profile(){
    alert('REGISTRATION NUMBER: $id \\n\\n NAME: $name \\n\\n DESTINATION: $dest \\n\\n BRANCH : $branch \\n\\n EMAIL: $email \\n\\n DATE_OF_JOIN :$doj\\n\\n EXPERIANCE : $expy years $expm months');
}

</script>";

		
}
echo "</center>";
mysqli_close($conn);
?>

    </body>
    </html>