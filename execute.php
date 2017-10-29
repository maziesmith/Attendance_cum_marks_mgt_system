<?php
session_start();
include('db.php');
$username=$_POST['username'];
 
$result  =  mysqli_query($db,"SELECT  *  FROM  user_entries  WHERE  username='$username'");
$num_rows  =  mysqli_num_rows($result);
 
if  ($num_rows)  {
header("location:  login.php?remarks=failed");
}
else
{
$username=$_POST['username'];
$password=$_POST['password'];
mysqli_query($db,"INSERT  INTO  user_entries(username,  password)VALUES("'$username',  '$password')");
header("location:  login.php?remarks=success");
}
?>