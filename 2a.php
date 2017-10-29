<?php
include('session.php');

require "head.php";
require "config.php";
$sql=mysqli_query($db,"select fname from faculty 
where username='$loggedin_session'");
$row=mysqli_fetch_array($sql,MYSQLI_ASSOC);
$nname=$row['fname'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="images/favicon.ico" />
    <title>Professor Page </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <style type="text/css">
    input[type="text"],
select.form-control {
  background: transparent;
  border: none;
  border-bottom: 1px solid #000000;
  -webkit-box-shadow: none;
  box-shadow: none;
  border-radius: 0;
  width: 160px;
}

input[type="text"]:focus,
select.form-control:focus {
  -webkit-box-shadow: none;
  box-shadow: none;
}
    </style>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="Professor_home.php" class="site_title"><i class="glyphicon glyphicon-education"></i> <span>AMMS</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/user.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php  echo  $nname;  ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

              <div class="menu_section">
                <h3>Menu</h3>
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-sitemap"></i> Attendance <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="2a.php">Mark Attendance</a>
                        <li><a>Previous Records<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            
                            <li><a href="2ba.php">View Subject attendance</a>
                            </li>
                            <li><a href="2bb.php">View Student attendance</a>
                            </li>
							<li><a href="2bc.php">Modify Student attendance</a>
                            </li>
							<li><a href="2bd.php">View Defaulter</a>
                            </li>
                            </li>
              <li><a href="2be.php">Generate Report</a>
                            </li>
                          </ul>
                        </li>
                    </ul>
                  </li>
				<li><a><i class="fa fa-sitemap"></i> Marks <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="2c.php">Assign Marks</a>
                        <li><a>Previous Records<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            
                            <li><a href="2da.php">View Subject Marks</a>
                            </li>
                            <li><a href="2dc.php">Modify Student Marks</a>
                            </li>
                          </ul>
                        </li>
                        
                    </ul>
                  </li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <!-- <div class="sidebar-footer hidden-small">
              
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="logout.php">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div> -->
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/user.jpg" alt="">Professor
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Change Password</a></li>
                    
                    <li><a href="javascript:;">Help</a></li>
                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
				</li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">

          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Home :: Professor-Home<div class='col-md-11 col-md-offset-1'><div style="display:inline;" id='msg' class='msg'></div></h3>
              </div>

              
            </div>
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Select Date &amp; Subject</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>                 
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
					<form class="for-horizontal" method="post" action="2aa.php" id="f1">
						<table class="table">
              <tr>
                <th>Date:</th>
                <td>
                  <div class="form-group">
                    <select class="form-control" id="selectdate" name="selectdate">
                      <option value="">Select Date</option>
                      <option value="<?php echo $tdate = date('Y-m-d', strtotime(' -0 weekday')); ?>"><?php echo $tdate = date('d-m-Y', strtotime(' -0 weekday')); ?></option>
                      <option value="<?php echo $ydate = date('Y-m-d', strtotime('-1 weekday')); ?>"><?php echo $ydate = date('d-m-Y', strtotime('-1 weekday')); ?></option>
                      <option value="<?php echo $yydate = date('Y-m-d', strtotime('-2 weekday')); ?>"><?php echo $yydate = date('d-m-Y', strtotime('-2 weekday')); ?></option>
                      <option value="<?php echo $yyydate = date('Y-m-d', strtotime('-3 weekday')); ?>"><?php echo $yyydate = date('d-m-Y', strtotime('-3 weekday')); ?></option>
                      <option value="<?php echo $yyyydate = date('Y-m-d', strtotime('-4 weekday')); ?>"><?php echo $yyyydate = date('d-m-Y', strtotime('-4 weekday')); ?></option>
                    </select>
                  </div>
                </td>
              </tr> 
              <tr>
              <tr>
                <th>Day:</th>
                <td>
                  <div class="form-group">
                    <select class="form-control" id="Days" name="Days">
                      <option value="">Select Day</option>
                      <option value="Mon">Monday</option>
                      <option value="Tue">Tuesday</option>
                      <option value="Wed">Wednesday</option>
                      <option value="Thu">Thursday</option>
                      <option value="Fri">Friday</option>
                    </select>
                  </div>
                </td>
              </tr> 
							<tr>
								<th>Subject ID:</th>
								<td>
									<div class="form-group">
										<select class="form-control" id="sub_id" name="sub_id">
											<option value="">Select Subject</option>
										</select>
									</div>
								</td>
							</tr>
							<tr>
								<th>Lecture No.:</th>
								<td>
									<div class="form-group">
										<select class="form-control" id="lecture_no" name="lecture_no">
                      <option value="">Select Lecture No.</option>
										</select>
									</div>
								</td>
							</tr>
              <div class="btn-group btn-group-lg">
              <tr>
                <td>
                  <div class="btn-group btn-group-lg">
                  <center><input type="submit" class="btn btn-success" value="Submit" id="b1"></center>
                  </div>
                </td> 
              </tr>
            </div>
						</table>
					</form>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Copyright 2017 GBPEC.
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>


    <script >
$(document).ready(function() {
$("#b1").prop('disabled',true);
////////////////Days list box on Change////////////////////
$("#Days").change(function(){ // change function of listbox
$("#sub_id,#lecture_no").empty();// Remove the existing options 
$("#b1").prop('disabled',true); // Disable submit button
$("#msg").html('Just Wait ...'); // Message 
$("#msg").show(); // Display Message

$.post( "dropdown3ck.php", {"Days":$('#Days').val()},function(return_data,status){
$("#sub_id").append("<option value=''>Select Subject</option>");
$.each(return_data.sub_id, function(key,value){
$("#sub_id").append("<option value=" + value.sub_id +">"+value.sub_id +"</option>");
});

},"json");
setTimeout(function() { $("#msg").hide(); }, 2000);
});
///////////////////////////
////////////// Subject list box on change //////////////////////
$("#sub_id").change(function(){ // change function of listbox
$("#lecture_no").empty();  // Removes all options
$("#b1").prop('disabled',true);   // submit button is disabled
$("#msg").html('Just Wait ...'); // Message 
$("#msg").show();   // Display message 

$.post( "dropdown3ck.php", {"Days":$('#Days').val(), "sub_id":$('#sub_id').val()},function(return_data,status){

$("#lecture_no").append("<option value=''>Select Lecture</option>");
$.each(return_data.lecture_no, function(key,value){
$("#lecture_no").append("<option value=" + value.lecture_no +">"+value.lecture_no+"</option>");
});

},"json");
setTimeout(function() { $("#msg").hide(); }, 2000);
});
//////////Lecture no box on Change/////////////////
$("#lecture_no").change(function(){ // change function of listbox
if($('#lecture_no').val()>=0){
$("#b1").prop('disabled',false);

//$('#f1').attr('action', "2aa.php").submit();
}
});
//////////////////////////
});
</script>

  </body>
</html>