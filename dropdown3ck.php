<?php
include('session.php');
?>
<?php

require "config.php"; // connection details

//require "../../include/z_db1_demo.php"; // Database Connection 




// error_reporting(0);// With this no error reporting will be there

//////////

/////////////////////////////////////////////////////////////////////////////
$Teacher=$loggedin_session;
$Days=$_POST['Days'];// 
$subid=$_POST['sub_id']; /// Subject Id 
// $lecture_no=$_POST['lecture_no'];

// $Days='Mon'; // To check you can use this
// $sub_id='etcs-402';

///////////// Validate the inputs ////////////

// Checking country variable ///

// if((strlen($Days)) > 0 and (!ctype_alpha($Days))){ 

// echo "Data Error";

// exit;

// }

// // Checking state variable (with space ) ///



// if ((strlen($sub_id)) > 0 and is_numeric($sub_id) === false) {

// echo "Data Error";

// exit;

// }



/////////// end of input validation //////

if(strlen($Days) > 0){
// echo $Days;
$q_country="select sub_id from time_table where Days = :Days and Teacher= :Teacher ";
}


// echo $q_country;

$sth = $dbo->prepare($q_country);
$sth->bindParam(':Days',$Days,PDO::PARAM_STR, 15);
$sth->bindParam(':Teacher',$Teacher,PDO::PARAM_STR, 15);

$sth->execute();


$subid = $sth->fetchAll(PDO::FETCH_ASSOC);
// echo '<pre>'.$sub_id.'</pre>';
//print_r($state);
// if(strlen($sub_id) > 0)
// {

$q_state="select lecture_no from time_table where sub_id = :sub_id and Days = :Days ";

// }

$sth = $dbo->prepare($q_state);
$sth->bindParam(':sub_id',$_POST['sub_id'],PDO::PARAM_STR, 15);
// $sth->bindParam(':Teacher',$Teacher,PDO::PARAM_STR, 15);
$sth->bindParam(':Days',$Days,PDO::PARAM_STR, 15);

$sth->execute();

$lectureno = $sth->fetchAll(PDO::FETCH_ASSOC);

// echo '<pre>'.$lecture_no.'</pre>';

$main = array('sub_id'=>$subid,'lecture_no'=>$lectureno,'value'=>array("sub_id1"=>"$subid1","lecture_no1"=>"$lectureno1"));
// echo $lecture_no;
// echo $Days;
// echo $sub_id;

echo json_encode($main); 

////////////End of script /////////////////////////////////////////////////////////////////////////////////

?>