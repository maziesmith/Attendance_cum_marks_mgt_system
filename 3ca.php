<?php
include('session.php');
include('db.php');

// $day = $_POST['day'];
// $month = $_POST['month'];
// $year = $_POST['year'];
$sub=$_POST['sub_id'];
$sql=mysqli_query($db,"select paper from subject 
where paper_code='$sub'");
$row=mysqli_fetch_array($sql,MYSQLI_ASSOC);
$le1=$row['paper'];

// $rollno=$_POST['rollno'];
// $date = mysql_real_escape_string("$day-$month-$year");
// $date = $_POST['Date'];
$sql=mysqli_query($db,"select branch,sem from lecture_subject 
where (sub_1='$sub' OR
       sub_2='$sub' OR
       sub_3='$sub' OR
       sub_4='$sub')");
$row=mysqli_fetch_array($sql,MYSQLI_ASSOC);
$branch=$row['branch'];
$sem=$row['sem'];

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
    <title>HOD Page </title>

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
              <a href="Hod_home.php" class="site_title"><i class="glyphicon glyphicon-education"></i> <span>AMMS</span></a>
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
                      <li><a href="3a.php">View Subject Attendance</a></li>
                      <li><a href="3b.php">View Student Attendance</a></li>
                      <li><a href="3c.php">View Defaulters</a></li>
                    </ul>
                  </li>
          <li><a><i class="fa fa-home"></i> Marks <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="3d.php">View Subject Marks</a></li>
                      <li><a href="3e.php">View Student Marks</a></li>
                    </ul>
                  </li>
          <li><a><i class="fa fa-home"></i> Time Table <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="3f.php">Update</a></li>
                    </ul>
                  </li>
          <li><a><i class="fa fa-home"></i> Student Area<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="3g.php">Add/Delete</a></li>
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
                    <img src="images/user.jpg" alt="">Hod
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
              <div class="title_left">
                <h3>Home :: Hod-Home</h3>
              </div>

              
            </div>
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>View Defaulters</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>                 
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table class="table">
                <tr>
                  <th>Subject ID: <?php echo $le1; ?></th>
                </tr>
              </table>
					<table class="table table-striped jambo_table">
						<thead>
								<tr>
									<th>S.No.</th>
                  <th>Roll No.</th>
                  <th>Name</th>
                  <!-- <th>Attendance</th> -->
                  <th>Present Days</th>
                  <th>Total Days</th>
                  <th>Percentage</th>
								</tr>
						</thead>
						<tbody>
								<?php
                $mysqli = new mysqli("localhost", "root", "", "practice");
                if($mysqli === false){
                  die("ERROR: Could not connect. " . $mysqli->connect_error);
                }
                $ssql = "select distinct Enrollment_No from final_attendance order by Dates desc ";
                  if($result = $mysqli->query($ssql))
                  {
                  if($result->num_rows > 0)
                  {
                  $counter=0;
                  while($row = $result->fetch_array())
                  {
                  
                  
                  $valu=$row["Enrollment_No"];
                  // $Attendance=$row["Attendance"];
                  
                  
                  // echo '<td><input type="text" style="width: 30px; text-align: center;" name="Attendance'.$id.'" value="'.$Attendance.'" readonly></td>';

                  $sssql = "select a.*
                  FROM final_attendance a
                  WHERE a.Subject='$sub' AND a.Enrollment_No='$valu' AND a.Dates = (SELECT MAX(b.Dates)
                      FROM final_attendance b
                      WHERE b.Enrollment_No = a.Enrollment_No AND b.Subject='$sub')";
                  if($results = $mysqli->query($sssql))
                  {
                  if($results->num_rows > 0)
                  {
                    if($rowss = $results->fetch_array())
                    {
                    $name=$rowss['Name'];
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
                  if($Percentage<=75)
                  {
                  echo "<tr class='even pointer'>";
                  $id=++$counter;
                  echo '<td><input type="text" style="width: 30px; text-align: center;" name="'.$id.'" value="'.$id.'" readonly></td>';
                  echo '<td><input type="text" style="width: 120px" name="Enrollment_No'.$id.'" value="'.$valu.'" readonly></td>';
                  echo '<td><input type="text" style="width: 120px" name="name'.$id.'" value="'.$name.'" readonly></td>';
                  echo '<td><input type="text" style="width: 30px; text-align: center;" name="Present'.$id.'" value="'.$Present_days.'" readonly></td>';  
                  echo '<td><input type="text" style="width: 30px; text-align: center;" name="Total'.$id.'" value="'.$Total_days.'" readonly></td>';
                  echo '<td><input type="text" style="width: 40px; text-align: center;" name="Percentage'.$id.'" value="'.$Percentage.'" readonly></td>';
                  echo "</tr>";
                    }
                  }
                  echo "<input type='hidden' name='totalstud' value='$id'>";
                  echo "</tbody></table>";
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
							<div class="alignment">
                <input type="button" onclick="window.location='Professor_home.php'" class="btn btn-success" value="Home">
              </div>
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