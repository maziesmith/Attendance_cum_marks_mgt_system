<?php
$mysql_hostname  =  "localhost";
$mysql_user  =  "root";
$mysql_password  =  "";
$mysql_database  =  "practice";
$db  =  mysqli_connect($mysql_hostname,$mysql_user,$mysql_password,$mysql_database);
if($db)
{
}
else
{
	echo mysqli_error($db);
}
?>