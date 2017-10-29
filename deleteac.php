<div id="code">
<div id="code-st">
<?php
include('session.php');
?>
<!DOCTYPE  html>
<html>
<head>
</head>
<body>
<div  id="contentbox"  >
<script  type="text/javascript">
function  countdown()  
{
var  i  =  document.getElementById('timecount');
if  (parseInt(i.innerHTML)<=1)  {
location.href  =  'login.php';
}
i.innerHTML  =  parseInt(i.innerHTML)-1;
}
setInterval(function(){  countdown();  },1000);
</script>
<?php
include  ('db.php');
$id=$loggedin_id;
$sql="DELETE  FROM  user_entries  WHERE id='$id'";
$result=mysqli_query($db,$sql);
if($result){
echo  "<div  align='center'>";
echo  "Account Deleted Successfully. You will be redirected to main page in <div id=\"timecount\">10</div> <u>seconds.</u>";
echo  "<p><a  href='login.php'  >Click  here</a>  to  go  back.</p>";
echo  "</div>";
//session_start();
}
elseif(!isset($loggedin_session)  ||  $loggedin_session==NULL)
{
header("Location:  login.php");
}
else  {
echo  "Unable  to  delete  Your  Account";
}
?>
<?php
//  close  connection
mysqli_close($db);
?>
</div>
</div>
</div>