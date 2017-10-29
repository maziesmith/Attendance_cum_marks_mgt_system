<div id="code">
<div id="code-st">
<?php
include("db.php");
session_start();
if($_SERVER["REQUEST_METHOD"]  ==  "POST")
{
$username=mysqli_real_escape_string($db,$_POST['username']);
$password=mysqli_real_escape_string($db,$_POST['password']);
$result  =  mysqli_query($db,"SELECT  *  FROM  user_entries");
$c_rows  =  mysqli_num_rows($result);
if  ($c_rows!=$username)  {
header("location:  login.php?remark_login=failed");
}
$sql="SELECT * FROM  user_entries  WHERE  username='$username' and password='$password'";
$result=mysqli_query($db,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$count=mysqli_num_rows($result);

if($count==1)
{	
$_SESSION['login_user']=$row['username'];
$_SESSION['login_user_type']=$row['type'];
$_SESSION['sess_user_id'] = $row['id'];
		
if($_SESSION['login_user_type'] == "Student")
{
	header("location:  Student_home.php");
}
else if ($_SESSION['login_user_type'] == "Professor")
{
	header("location:  Professor_home.php");
}
else if ($_SESSION['login_user_type'] == "HOD")
{
	header("location: Hod_home.php");
}
else
{
	header("location: Principal_home.php");
}
}
}
?>