<?php
include('session.php');

require "head.php";
require "config.php";
$sql=mysqli_query($db,"select fname from faculty 
where username='$loggedin_session'");
$row=mysqli_fetch_array($sql,MYSQLI_ASSOC);
$nname=$row['fname'];
             $mysqli = new mysqli("localhost", "root", "", "practice");
                if($mysqli === false){
                  die("ERROR: Could not connect. " . $mysqli->connect_error);
                }
               $mark=$_POST['mark'];
                //$i=3;
               $date=$_POST['date'];
               $Present=$_POST['Present'];
               $Total=$_POST['Total'];
               $attendance=$_POST['attendance'];
               $sub=$_POST['sub'];
               $rollno=$_POST['rollno'];
               $Percentage=$_POST['Percentage'];
               $curdate=date('Y-m-d H:i:s');
              if($mark!=$attendance)
              {
                  // $s_no=$y;
                  // $rollno=$_POST['enrollment_no'.$y];
                  // $name=$_POST['fname'.$y];
                  // $attendance=$_POST['table_records'.$y];
                
                  // $Present_days=($_POST['Present'.$y]+$attendance);
                  // $Total_days=($_POST['Total'.$y]+1);
                  

                  $ssql = "update final_attendance set Attendance='$mark' , updated_on='$curdate' where Dates='$date' and Enrollment_No='$rollno' and Subject='$sub' ";

                  if ($mysqli->query($ssql) === TRUE) 
                  {
                       // echo "New record created successfully";
                  }
                  else 
                  {
                     echo "Error: " . $ssql . "<br>" . $mysqli->error;
                  }

                  if($mark)
                  {  
                  $Present=$Present + 1;
                  // $Total=$Total;
                  $Percentage=(($Present/$Total)*100);
                  }
                  else
                  {
                   $Present=$Present - 1;
                  // $Total=$Total;
                  $Percentage=(($Present/$Total)*100); 
                  }  
                  
                  $sssql = "select a.Total_days from final_attendance as a LEFT OUTER JOIN final_attendance as b ON a.Enrollment_No = b.Enrollment_No AND a.Dates < b.Dates WHERE b.Enrollment_No IS NULL AND a.Enrollment_No=$rollno limit 1";
                  if($results = $mysqli->query($sssql))
                  {
                    if($results->num_rows > 0)
                    {
                    if($rowss = $results->fetch_array())
                    {
                      // $Attendance=$rowss['a.Attendance'];
                    // $Present_days=$rowss['Present_days'];
                    $Total_days=$rowss['Total_days'];
                    // $Percentage=$rowss['Percentage'];
                  // echo '<td><input type="text" id="Attendance'.$id.'" value="'.$Attendance.'" readonly></td>';
                      
                    }
                    $results->free();
                    } 
                    else
                    {
                      echo "No records matching your query were found.";
                    }
                  }                  

                  $sssql = "update final_attendance 
                  set Present_days = '$Present',  
                  Percentage = '$Percentage' 
                  where Total_days='$Total_days' and Enrollment_No='$rollno' and Subject='$sub' ";

                 if ($mysqli->query($sssql) === TRUE) 
                  {
                       // echo "New record created successfully";
                  }
                  else 
                  {
                     echo "Error: " . $sssql . "<br>" . $mysqli->error;
                  }                   
              }
              else
              {
                  echo 'Your desired choice is already marked';
              }
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
                            
                            <li><a href="2ba.php">View Subject Attendance</a>
                            </li>
                            <li><a href="2bb.php">View Student Attendance</a>
                            </li>
							<li><a href="2bc.php">Modify Student Attendance</a>
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
                <h3>Home :: Professor-Home</h3>
              </div>

              
            </div>
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Previous Records > Modify Student Attendance</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>                 
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
					<center>
							<h2>
                Attendance Modified Successfully...
							</h2><br>
							<div>
								<input type="button" onclick="window.location='Professor_home.php'" class="btn btn-success" value="Home">
							</div>
					</center>
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
  </body>
</html>