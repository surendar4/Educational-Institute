<html>
<title>
	Admin | SRIT </title>
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
#echo "$id";
$psd=$_POST["password"];
$conn=mysqli_connect('localhost','root','ls@143','srit');
if(!$conn)
{
	die("error occured!!!!!!!!!<br>Please try again later");
}
$idlen=strlen($id);
#echo $idlen;
$option=$_POST["option"];
if($option=='Enter Faculty data')
{
	$today=date('Y-m-d');
  $regdno=time();
	$fname=$_POST["fname"];
	$dest=$_POST["dest"];
	$email=$_POST["email"];
	$branch=$_POST["branch"];

	$sql="INSERT INTO srit_fprofile(FID,NAME,DATE_OF_JOIN,DESTINATION,PASSWORD,BRANCH,EMAIL) values('$regdno','$fname','$today','$dest','1234','$branch','$email');";
	$result=mysqli_query($conn,$sql);
	
	echo "	<table width='75%' align='center'><tr><td width='50%'> 
<h3><ul class='drop'>
  <li><a  href='index.html'>&nbspHome&nbsp </a></li>
  <li><a href='#about'> About us&nbsp </a></li>
  <li><a class='active' href='admission.php'> Admissions&nbsp </a></li>
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
	echo "<center>";
	if($result)
	{
		#echo "Register Successfully<br><br>";
	
    $sql="select * from srit_fprofile where FID='$regdno';";
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result))
    {
      $yr=date('y');
      $srr_no=$row["faculty_sr_no"];
      $yr=$yr*100000+$srr_no;
      $regd="F$yr$branch";

      $sql="UPDATE srit_fprofile set FID='$regd' where faculty_sr_no=$srr_no;";
      $result=mysqli_query($conn,$sql);
      if($result)
      {
        echo "Registered Successfully with <font color='red'>FID: $regd <font color='black'><br>";
      }
    }



  }
	else
	{
		echo "<font color='red'> Error occured!!!<br><br>";
	}
	echo "</center>";
	echo "<center><h2>Admissions of SRIT</h2></center>";
echo "<CENTER><form action='admission.php' method='post'>
<input type='submit' value='Add Student' name='option'></form>";
echo "<form action='admission.php' method='post'>
<input type='text' name='sid' placeholder='SID of Student to Drop' REQUIRED><br>
<input type='submit' value='Drop Student' name='option'></form><br>";
echo "<form action='admission.php' method='post'>
<input type='submit' value='Add Faculty' name='option'></form>";
echo "<form action='admission.php' method='post'>
<input type='text' name='fid' placeholder='FID of Faculty to Drop' REQUIRED><br>
<input type='submit' value='Drop Faculty' name='option'></form><br>
<form action='admission.php' method='post'>
<input type='submit' value='Add Courses' name='option'><br>
</form>
</CENTER>";



}
else if($option=='Add Faculty')
{
	echo "	<table width='75%' align='center'><tr><td width='50%'> 
<h3><ul class='drop'>
  <li><a  href='index.html'>&nbspHome&nbsp </a></li>
  <li><a href='#about'> About us&nbsp </a></li>
  <li><a class='active' href='admission.php'> Admissions&nbsp </a></li>
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

	echo "<center><table><tr><td><fieldset><legend><h4>New Joining</h4></legend>
	<form action='admission.php' method='post'>
	
	Faculty Name:<br><input type='text' name='fname' placeholder='Faculty Name' REQUIRED><br>
	Destination :<br><input type='text' name='dest' placeholder='Destination' REQUIRED><br>
	Branch :<select name='branch'><option>CS</option><option>EE</option><option>EC</option><option>ME</option><option>CE</option> REQUIRED</select><br>
  Email :<br><input type='text' name='email' placeholder='Email' REQUIRED><br>
	<br>
	<input type='submit' value='Enter Faculty data' name='option'></fieldset></td></tr></table>";

}
else


if($option=='Enter Student data')
{
	$today=date('Y-m-d');

	$sname=$_POST["sname"];
	$fname=$_POST["fname"];
	$regdno=time();
  $email=$_POST["email"];
	$branch=$_POST["branch"];
	$sql="INSERT INTO srit_sprofile(SID,NAME,FNAME,JOINED_ON,CURRENT_SEM,CGPA,PASSWORD,BRANCH,email) values('$regdno','$sname','$fname','$today','W16',0,'abc','$branch','$email');";
	$result=mysqli_query($conn,$sql);
	
	echo "	<table width='75%' align='center'><tr><td width='50%'> 
<h3><ul class='drop'>
  <li><a  href='index.html'>&nbspHome&nbsp </a></li>
  <li><a href='#about'> About us&nbsp </a></li>
  <li><a class='active' href='admission.php'> Admissions&nbsp </a></li>
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
	echo "<center>";
	if($result)
	{
		#echo "Register Successfully<br><br>";
    $sql="select * from srit_sprofile where SID='$regdno';";
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result))
    {
      $srr_no=$row["stud_sr_no"];
    }
      $yr=date('y');
      
      $yr=$yr*100000+$srr_no;
      $regd="S$yr$branch";
      $sql="UPDATE srit_sprofile set SID='$regd' where stud_sr_no=$srr_no;";
      $result=mysqli_query($conn,$sql);



    if($result)
      {
        echo "Registered Successfully with <font color='red'>SID: $regd <font color='black'><br>";
      }
	}
	else
	{
		echo "<font color='red'> Error occured!!!<br><br>";
	}
	echo "</center>";
	echo "<center><h2>Admissions of SRIT</h2></center>";
echo "<CENTER><form action='admission.php' method='post'>
<input type='submit' value='Add Student' name='option'></form>";
echo "<form action='admission.php' method='post'>
<input type='text' name='sid' placeholder='SID of Student to Drop' REQUIRED><br>
<input type='submit' value='Drop Student' name='option'></form><br>";
echo "<form action='admission.php' method='post'>
<input type='submit' value='Add Faculty' name='option'></form>";
echo "<form action='admission.php' method='post'>
<input type='text' name='fid' placeholder='FID of Faculty to Drop' REQUIRED><br>
<input type='submit' value='Drop Faculty' name='option'></form><br>
<form action='admission.php' method='post'>
<input type='submit' value='Add Courses' name='option'><br>
</form>
</CENTER>";

}

else if($option=='Add Student')
{
	echo "	<table width='75%' align='center'><tr><td width='50%'> 
<h3><ul class='drop'>
  <li><a  href='index.html'>&nbspHome&nbsp </a></li>
  <li><a href='#about'> About us&nbsp </a></li>
  <li><a class='active' href='admission.php'> Admissions&nbsp </a></li>
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

	echo "<center><table><tr><td><fieldset><legend><h4>New Admissions</h4></legend>
  <div class='frm'>
	<form action='admission.php' method='post'>
	Student Name:<br><input type='text' name='sname'  placeholder='Student Name' REQUIRED><br>
	Father Name:<br><input type='text' name='fname' placeholder='Father Name' REQUIRED><br>
	Branch :<select name='branch'><option>CS</option><option>EE</option><option>EC</option><option>ME</option><option>CE</option> REQUIRED</select><br>
  Email:<br><input type='email' name='email' placeholder='Email' REQUIRED><br><br>
	<input type='submit' value='Enter Student data' name='option'></form></div> </td></tr></table></fieldset>";

}
else if ($option=="Drop Student")
{
  echo "  <table width='75%' align='center'><tr><td width='50%'> 
<h3><ul class='drop'>
  <li><a  href='index.html'>&nbspHome&nbsp </a></li>
  <li><a href='#about'> About us&nbsp </a></li>
  <li><a class='active' href='admission.php'> Admissions&nbsp </a></li>
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

  $sid=$_POST["sid"];
  $sql="delete from srit_sprofile where SID='$sid'";
  $result=mysqli_query($conn,$sql);
  if($result && strlen($sid)>0){
    echo "<center>Removed Successfully</center>"; 
  }
  else{
    echo "<center><font color='red'>Error occured or Invalid data entered please try later<br><font color='black'></center>";

  }
  echo "<center><h2>Admissions of SRIT</h2></center>";
echo "<CENTER><form action='admission.php' method='post'>
<input type='submit' value='Add Student' name='option'></form>";
echo "<form action='admission.php' method='post'>
<input type='text' name='sid' placeholder='SID of Student to Drop' REQUIRED><br>
<input type='submit' value='Drop Student' name='option'></form><br>";
echo "<form action='admission.php' method='post'>
<input type='submit' value='Add Faculty' name='option'></form>";
echo "<form action='admission.php' method='post'>
<input type='text' name='fid' placeholder='FID of Faculty to Drop' REQUIRED><br>
<input type='submit' value='Drop Faculty' name='option'></form><br>
<form action='admission.php' method='post'>
<input type='submit' value='Add Courses' name='option'><br>
</form>
</CENTER>";
}
else if ($option=="Drop Faculty")
{
  echo "  <table width='75%' align='center'><tr><td width='50%'> 
<h3><ul class='drop'>
  <li><a  href='index.html'>&nbspHome&nbsp </a></li>
  <li><a href='#about'> About us&nbsp </a></li>
  <li><a class='active' href='admission.php'> Admissions&nbsp </a></li>
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
  $fid=$_POST["fid"];
  $sql="delete from srit_fprofile where FID='$fid';";
  $result=mysqli_query($conn,$sql);
  if($result){
    echo "<center>Removed Successfully</center>"; 
  }
  else{
    echo "<center><font color='red'>Error occured or Invalid data entered please try later<br><font color='black'></center>";

  }
  echo "<center><h2>Admissions of SRIT</h2></center>";
echo "<CENTER><form action='admission.php' method='post'>
<input type='submit' value='Add Student' name='option'></form>";
echo "<form action='admission.php' method='post'>
<input type='text' name='sid' placeholder='SID of Student to Drop' REQUIRED><br>
<input type='submit' value='Drop Student' name='option'></form><br>";
echo "<form action='admission.php' method='post'>
<input type='submit' value='Add Faculty' name='option'></form>";
echo "<form action='admission.php' method='post'>
<input type='text' name='fid' placeholder='FID of Faculty to Drop' REQUIRED><br>
<input type='submit' value='Drop Faculty' name='option'></form><br>
<form action='admission.php' method='post'>
<input type='submit' value='Add Courses' name='option'><br>
</form>
</CENTER>";
}

else if ($option=="Add Courses")
{
  echo "  <table width='75%' align='center'><tr><td width='50%'> 
<h3><ul class='drop'>
  <li><a  href='index.html'>&nbspHome&nbsp </a></li>
  <li><a href='#about'> About us&nbsp </a></li>
  <li><a class='active' href='admission.php'> Admissions&nbsp </a></li>
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
  $sqlf="select * from srit_fprofile";
  $resultf=mysqli_query($conn,$sqlf);

  echo "<center><h2>Add Courses</h2><br>";
  echo "<table><tr><td><fieldset><legend>Add Courses</legend><form action='admission.php' method='post'>
 Course Name:<br> <input type='text' name='cname' placeholder='Course Name' REQUIRED><br>
  Branch :<select name='branch'><option>CS</option><option>EE</option><option>EC</option><option>ME</option><option>CE</option> REQUIRED</select><br>
  Faculty :<select name='fid'>";

  while($row=mysqli_fetch_assoc($resultf)){
  
  $fidd=$row["FID"];
    #echo " Faculty :<br><input type='text' name='fid' placeholder='Faculty' REQUIRED><br>";
  echo "<option> $fidd</option>";
  }
    echo "</select><br>Slot :<select name='slot'><option>A </option><option>B </option><option>C </option><option>D </option><option>E </option> <option>F </option></select><br>
    Credits :<select name='credits'><option>0 </option><option>1 </option><option>2 </option><option>3 </option><option>4 </option> <option>5 </option></select><br>
    <br><input type='Submit' value='Register Course' name='option'></form></fieldset></td></tr></table><br></center>
    ";

  }
  else if ($option=="Register Course")
{
  echo "  <table width='75%' align='center'><tr><td width='50%'> 
<h3><ul class='drop'>
  <li><a  href='index.html'>&nbspHome&nbsp </a></li>
  <li><a href='#about'> About us&nbsp </a></li>
  <li><a class='active' href='admission.php'> Admissions&nbsp </a></li>
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
  
  $cname=$_POST["cname"];
  $branch=$_POST["branch"];
  $fid=$_POST["fid"];
  $slot=$_POST["slot"];
  $regd=time();
  $credits=$_POST["credits"];
  $sqlc="Insert into srit_courses(CID,NAME,FID,CREDITS,slot) values('$regd','$cname','$fid',$credits,'$slot');";
  $resultc=mysqli_query($conn,$sqlc);
  if($resultc){
    $sql="select course_sr_no from srit_courses where CID='$regd'";
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result)){
      $srr=$row["course_sr_no"];
      $regd=date('y')*1000+$srr;
      $regd="C$regd$branch";
      $sql="Update srit_courses set CID='$regd' where course_sr_no=$srr;";
      $result=mysqli_query($conn,$sql);
      if($result){
        echo "<center>Successfully registered with <font color='red'> CID : $regd <font color='black'></center><br>";
      }
      else{
         echo "<center><font color='red'> Error occured<font color='black'></center>";
      }
    }
  }
  else{
         echo "<center><font color='red'> Error occured<font color='black'></center>";
      }
      echo "<center><h2>Admissions of SRIT</h2></center>";
echo "<CENTER><form action='admission.php' method='post'>
<input type='submit' value='Add Student' name='option'></form>";
echo "<form action='admission.php' method='post'>
<input type='text' name='sid' placeholder='SID of Student to Drop' REQUIRED><br>
<input type='submit' value='Drop Student' name='option'></form><br>";
echo "<form action='admission.php' method='post'>
<input type='submit' value='Add Faculty' name='option'></form>";
echo "<form action='admission.php' method='post'>
<input type='text' name='fid' placeholder='FID of Faculty to Drop' REQUIRED><br>
<input type='submit' value='Drop Faculty' name='option'></form><br>
<form action='admission.php' method='post'>
<input type='submit' value='Add Courses' name='option'><br>
</form>
</CENTER>";


  }


else if($_SESSION["aid"]!=1 && $idlen!=0)
{
	$sql="select * from admin where username='$id'";

	$result=mysqli_query($conn,$sql);
	while($row=mysqli_fetch_assoc($result))
	{
		$opsd=$row["password"];
   // $name=$row["NAME"];
	}
	//echo "$psd and $opsd ,$id<br>";
	if($psd==$opsd){

		#echo "Successfully loggedin";
		$_SESSION["aid"]=1;
		$_SESSION["user"]=$id;
	echo "	<table width='75%' align='center'><tr><td width='50%'> 
<h3><ul class='drop'>
  <li><a href='index.html'>&nbspHome&nbsp </a></li>
  <li><a href='#about'> About us&nbsp </a></li>
  <li><a class='active' href='admission.php'> Admissions&nbsp </a></li>
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

	echo "<center><h2>Admissions of SRIT</h2></center>";
echo "<CENTER><form action='admission.php' method='post'>
<input type='submit' value='Add Student' name='option'></form>";
echo "<form action='admission.php' method='post'>
<input type='text' name='sid' placeholder='SID of Student to Drop' REQUIRED><br>
<input type='submit' value='Drop Student' name='option'></form><br>";
echo "<form action='admission.php' method='post'>
<input type='submit' value='Add Faculty' name='option'></form>";
echo "<form action='admission.php' method='post'>
<input type='text' name='fid' placeholder='FID of Faculty to Drop' REQUIRED><br>
<input type='submit' value='Drop Faculty' name='option'></form><br>
<form action='admission.php' method='post'>
<input type='submit' value='Add Courses' name='option'><br>
</form>
</CENTER>";
}
else
{
	echo "	<table width='75%' align='center'><tr><td width='50%'> 
<h3><ul class='drop'>
  <li><a  href='index.html'>&nbspHome&nbsp </a></li>
  <li><a href='#about'> &nbspAbout us&nbsp </a></li>
  <li><a class='active' href='admission.php'> &nbspAdmissions&nbsp </a></li>
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
	<fieldset><legend><font color='black' >Admin login</legend><form action='admission.php' method='post'>
<input type='text' name='user' placeholder='Username' REQUIRED><br>
<input type='password' name='password' placeholder='Password' REQUIRED><br>
<!--<input type='submit' value='login'>-->
<input type='submit'  align='center' value='login'/>
</form></fieldset><br></td></tr></table>";
	
}
}
else if($idlen==0 && $_SESSION["aid"]!=1)
{
	echo "	<table width='75%' align='center'><tr><td width='50%'> 
<h3><ul class='drop'>
  <li><a  href='index.html'>&nbspHome&nbsp </a></li>
  <li><a href='#about'> About us&nbsp </a></li>
  <li><a class='active' href='admission.php'> Admissions&nbsp </a></li>
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
</ul></h3>



	</td></tr></table>";
	echo "<table width='40%' align='center' ><tr><td width='60%'>
	<font color='red' size='3px' align ='right'>Invalid Username or Password to proceed please login <br><br>
	<fieldset><legend><font color='black' >Admin login</legend><form action='admission.php' method='post'>
<input type='text' name='user' placeholder='Username' REQUIRED><br>
<input type='password' name='password' placeholder='Password' REQUIRED><br>
<!--<input type='submit' value='login'>-->
<input type='submit'  align='center' value='login'/>
</form></fieldset><br></td></tr></table>";

}

else
{
	echo "	<table width='75%' align='center'><tr><td width='50%'> 
<h3><ul class='drop'>
  <li><a  href='index.html'>&nbspHome&nbsp </a></li>
  <li><a href='#about'> About us&nbsp </a></li>
  <li><a  class='active' href='admission.php'> Admissions&nbsp </a></li>
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
#echo "already loggedin";
  echo "<br><center><h2>Admissions of SRIT</h2></center>";
echo "<CENTER><form action='admission.php' method='post'>
<input type='submit' value='Add Student' name='option'></form>";
echo "<form action='admission.php' method='post'>
<input type='text' name='sid' placeholder='SID of Student to Drop' REQUIRED><br>
<input type='submit' value='Drop Student' name='option'></form><br>";
echo "<form action='admission.php' method='post'>
<input type='submit' value='Add Faculty' name='option'></form>";
echo "<form action='admission.php' method='post'>
<input type='text' name='fid' placeholder='FID of Faculty to Drop' REQUIRED><br>
<input type='submit' value='Drop Faculty' name='option'></form><br>
<form action='admission.php' method='post'>
<input type='submit' value='Add Courses' name='option'><br>
</form>
</CENTER>";



}
?>

</body>
</html>
