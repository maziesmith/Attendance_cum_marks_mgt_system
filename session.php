<?php
include('db.php');
session_start();
$user_check=$_SESSION['login_user'];
$ses_sql=mysqli_query($db,"select username,id,type  from  user_entries  where  username='$user_check'");
$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
$loggedin_session=$row['username'];
$loggedin_id=$row['id'];
$loggedin_type=$row['type'];

if(!isset($loggedin_session)  ||  $loggedin_session==NULL)
{
echo  "Go  back";
header("Location:  login.php");
}


?>