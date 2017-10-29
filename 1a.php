<?php
include('session.php');

$sql=mysqli_query($db,"select fname, branch, sem from student_entries 
where enrollment_no='$loggedin_session'");
$row=mysqli_fetch_array($sql,MYSQLI_ASSOC);
$nname=$row['fname'];
$branch=$row['branch'];
$sem=$row['sem'];
$rollno=$loggedin_session;
$sql=mysqli_query($db,"select lec1,lec2,lec3,lec4 from lecture_subject where branch='$branch' and sem='$sem'");
$row=mysqli_fetch_array($sql,MYSQLI_ASSOC);
$lec1=$row['lec1'];
$lec2=$row['lec2'];
$lec3=$row['lec3'];
$lec4=$row['lec4'];

// $sql=mysqli_query($db,"select branch, sem from student_entries 
// where enrollment_no='$loggedin_session'");
// $row=mysqli_fetch_array($sql,MYSQLI_ASSOC);
// $nname=$row['fname'];
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
    <title>Student Page </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="javascript:location.reload();" class="site_title"><i class="glyphicon glyphicon-education"></i> <span>AMMS</span></a>
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
                  <li><a><i class="fa fa-home"></i> Attendance <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="1a.php">View Attendance</a></li>
                      
                    </ul>
                  </li>
				  <li><a><i class="fa fa-home"></i> Marks <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="1b.php">View Marks</a></li>
                      
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
                    <img src="images/user.jpg" alt="">Student
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="2e.php"> Change Password</a></li>
                    
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
              <!-- <div class="title_left">
                <h3>Home :: Student-Home</h3>
              </div> -->
            </div>
            
            <div class="clearfix"></div>
            <?php
                $mysqli = new mysqli("localhost", "root", "", "practice");
                if($mysqli === false)
                {
                  die("ERROR: Could not connect. " . $mysqli->connect_error);
                }
                $counter=0;
                $ssql = "select distinct Subject from final_attendance where Enrollment_No='$rollno' ";
                  if($result = $mysqli->query($ssql))
                  {
                  if($result->num_rows > 0)
                  {
                  
                  while($row = $result->fetch_array())
                  {
                  
                  
                  $subj=$row["Subject"];
                  // $Attendance=$row["Attendance"];
                  
                  
                  // echo '<td><input type="text" style="width: 30px; text-align: center;" name="Attendance'.$id.'" value="'.$Attendance.'" readonly></td>';

                  $sssql = "select a.*
                  FROM final_attendance a
                  WHERE a.Subject='$subj' AND a.Enrollment_No='$rollno' AND a.Dates = (SELECT MAX(b.Dates)
                      FROM final_attendance b
                      WHERE b.Enrollment_No = a.Enrollment_No AND b.Subject='$subj')";
                  if($results = $mysqli->query($sssql))
                  {
                  if($results->num_rows > 0)
                  {
                    if($rowss = $results->fetch_array())
                    {
                    // $name=$rowss['Name'];
                    $Present_days=$rowss['Present_days'];
                    $Total_days=$rowss['Total_days'];
                    $Percentage=$rowss['Percentage'];
                  // echo '<td><input type="text" id="Attendance'.$id.'" value="'.$Attendance.'" readonly></td>';
                      
                    }
                  $results->free();
                  } else
                  {
                    echo "No records matching your query were found.";
                  }
                  }
                  else
                  {
                  echo "ERROR: Could not able to execute $sssql. " . $mysqli->error;
                  }
                  
                  // echo "<tr class='even pointer'>";
                  $id=++$counter;
                  $ssssql=mysqli_query($db,"select paper from subject 
                  where paper_code='$subj'");
                  $rowsss=mysqli_fetch_array($ssssql,MYSQLI_ASSOC);
                  $subje=$rowsss['paper'];
                  ${'Subject' . $id} = $subje;
                  ${'Present' . $id} = $Present_days;
                  ${'Total' . $id} = $Total_days;
                  ${'Percentage' . $id} = $Percentage;
                  // // echo '<td><input type="text" style="width: 30px; text-align: center;" name="'.$id.'" value="'.$id.'" readonly></td>';
                  // echo '<td><input type="text" style="width: 120px" name="Enrollment_No'.$id.'" value="'.$valu.'" readonly></td>';
                  // echo '<td><input type="text" style="width: 120px" name="name'.$id.'" value="'.$name.'" readonly></td>';
                  // echo '<td><input type="text" style="width: 30px; text-align: center;" name="Present'.$id.'" value="'.$Present_days.'" readonly></td>';  
                  // echo '<td><input type="text" style="width: 30px; text-align: center;" name="Total'.$id.'" value="'.$Total_days.'" readonly></td>';
                  // echo '<td><input type="text" style="width: 40px; text-align: center;" name="Percentage'.$id.'" value="'.$Percentage.'" readonly></td>';
                  // echo "</tr>";
                    
                  }
                  // echo "<input type='hidden' name='totalstud' value='$id'>";
                  // echo "</tbody></table>";
                  $result->free();
                  } else
                  {
                    echo "No records matching your query were found.";
                  }
                  }
                  else
                  {
                  echo "ERROR: Could not able to execute $ssql. " . $mysqli->error;
                  }
                  $mysqli->close();
                  ?>
            <div class="col-md-12 col-sm-12 col-xs-12 widget widget_tally_box">
                        <div class="x_panel fixed_height_290">
                          <div class="x_title">
                            <h2>Your Attendance</h2>
                            <ul class="nav navbar-right">
                              <!-- <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>
                               -->
                            </ul>
                            <div class="clearfix"></div>
                          </div>
                          <div class="x_content">

                            <div style="text-align: center; margin-bottom: 17px">
                              <ul class="verticle_bars list-inline">
                                <li>
                                  <div class="progress vertical progress_wide bottom"><?php echo $Total1; ?>
                                    <div class="progress-bar progress-bar-info" role="progressbar" data-transitiongoal="<?php echo $Percentage1; ?>"><?php echo $Present1; ?></div>
                                  </div>
                                </li>
                                <li>
                                  <div class="progress vertical progress_wide bottom"><?php echo $Total2; ?>
                                    <div class="progress-bar progress-bar-success" role="progressbar" data-transitiongoal="<?php echo $Percentage2; ?>"><?php echo $Present2; ?></div>
                                  </div>
                                </li>
                                <li>
                                  <div class="progress vertical progress_wide bottom"><?php echo $Total3; ?>
                                    <div class="progress-bar progress-bar-dark" role="progressbar" data-transitiongoal="<?php echo $Percentage3; ?>"><?php echo $Present3; ?></div>
                                  </div>
                                </li>
                                <li>
                                  <div class="progress vertical progress_wide bottom"><?php echo $Total4; ?>
                                    <div class="progress-bar progress-bar-gray" role="progressbar" data-transitiongoal="<?php echo $Percentage4; ?>"><?php echo $Present4; ?></div>
                                  </div>
                                </li>
                              </ul>
                            </div>
                            <div class="divider"></div>

                            <ul class="legend list-unstyled">
                              <li>
                                <p>
                                  <span class="icon"><i class="fa fa-square blue"></i></span> <span class="name"><?php echo $Subject1; ?></span>
                                </p>
                              </li>
                              <li>
                                <p>
                                  <span class="icon"><i class="fa fa-square green"></i></span> <span class="name"><?php echo $Subject2; ?></span>
                                </p>
                              </li>
                              <li>
                                <p>
                                  <span class="icon"><i class="fa fa-square dark"></i></span> <span class="name"><?php echo $Subject3; ?></span>
                                </p>
                              </li>
                              <li>
                                <p>
                                  <span class="icon"><i class="fa fa-square grey"></i></span> <span class="name"><?php echo $Subject4; ?></span>
                                </p>
                              </li>
                            </ul>

                          </div>
                        </div>
                        <br><br>
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
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- jQuery Sparklines -->
    <script src="../vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- easy-pie-chart -->
    <script src="../vendors/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  </body>
</html>