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

// $date = mysql_real_escape_string("$day-$month-$year");
$fromdate = $_POST['FromDate'];
$todate = $_POST['ToDate'];
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
                <h3>Home :: Professor-Home</h3>
              </div>

              
            </div>
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Previous Records > Generate Reports</h2>
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
                  <th>From: <?php echo date("d-m-Y", strtotime($fromdate)); ?></th>
                  <th>To: <?php echo date("d-m-Y", strtotime($todate)); ?></th>
								</tr>
							</table>
						<table class="table table-striped jambo_table bulk_action">
							<thead>
								<tr class="headings">
									<th class="column-title">S.No.</th>
									<th class="column-title">Enrollment Number</th>
									<th class="column-title">Name</th>
                  <?php
                  $mysqli = new mysqli("localhost", "root", "", "practice");
                  if($mysqli === false)
                  {
                  die("ERROR: Could not connect. " . $mysqli->connect_error);
                  }

                  $ssssql = "select distinct Dates from final_attendance where Subject='$sub' AND Dates between '".$fromdate."' AND '".$todate."' ";
                  if($resultss = $mysqli->query($ssssql))
                  {
                  if($resultss->num_rows > 0)
                  {
                    
                    while($rows = $resultss->fetch_array())
                    {
                      $date=$rows['Dates'];
                    // $Present_days=$rowss['Present_days'];
                    // $Total_days=$rowss['Total_days'];
                      echo '<th>';
                  // echo '<input type="text" style="width: 80px; text-align: center;" value="'.$date.'" readonly>';
                      echo date("d-m-Y", strtotime($date));
                    echo '</th>';  
                    }
                    
                  $resultss->free();
                  } else
                  {
                    echo "No records matching your query were found.";
                  }
                  }
                  ?>
<!--                   <th class="column-title">Attendance</th>
                  <th class="column-title">Present Days</th>
                  <th class="column-title">Total Days</th> -->
								</tr>
							</thead>
							<tbody>
								<?php
                $mysqli = new mysqli("localhost", "root", "", "practice");
                if($mysqli === false){
                  die("ERROR: Could not connect. " . $mysqli->connect_error);
                }
                $ssql = "select enrollment_no, fname from student_entries where branch='$branch' AND sem='$sem' ";
                  if($result = $mysqli->query($ssql))
                  {
                  if($result->num_rows > 0)
                  {
                  $counter=0;
                  while($row = $result->fetch_array())
                  {
                  echo "<tr class='even pointer'>";
                  $id=++$counter;
                  $valu=$row["enrollment_no"];
                  // $Attendance=$row["Attendance"];
                  echo '<td><input type="text" style="width: 30px; text-align: center;" name="'.$id.'" value="'.$id.'" readonly></td>';
                  echo '<td><input type="text" style="width: 120px; text-align: center;" name="Enrollment_No'.$id.'" value="'.$row["enrollment_no"].'" readonly></td>';
                  echo '<td><input type="text" style="width: 120px;" name="name'.$id.'" value="'.$row["fname"].'" readonly></td>';
                  // echo '<td><input type="text" style="width: 30px; text-align: center;" name="Attendance'.$id.'" value="'.$Attendance.'" readonly></td>';

                  $sssql = "select Dates, Attendance from final_attendance where Subject='$sub' AND Enrollment_No='$valu' AND Dates between '".$fromdate."' AND '".$todate."' ";
                  if($results = $mysqli->query($sssql))
                  {
                  if($results->num_rows > 0)
                  {
                    while($rowss = $results->fetch_array())
                    {
                      $counters=0;
                      $ids=++$counters;
                      $Attendance=$rowss['Attendance'];
                    // $Present_days=$rowss['Present_days'];
                    // $Total_days=$rowss['Total_days'];
                      if($Attendance==0){
                      $colorz='#FFcccc'; 
                      $colorzz='#000000';
                    }
                    else{
                      $colorz='#ccFFcc';
                      $colorzz='#000000'; 
                    }
                    echo '<td>';
                  echo '<input type="text" id="Attendance'.$id.$ids.'" style="width: 30px; text-align: center; background: '.$colorz.' ; color: '.$colorzz.'; " value="'.$Attendance.'" readonly>';
                  // echo '<script>
                  // function changeColor()
                  // {
                  //    if(document.getElementById("#Attendance'.$id.$ids.'")==0)
                  //     {
                  //       document.getElementById("#Attendance'.$id.$ids.'").style.background="red";
                  //     }
                  //     else
                  //     {
                  //       document.getElementById("#Attendance'.$id.$ids.'").style.background="green";
                  //     }
                  // }
                  //     </script>';
                    echo '</td>';  
                  
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
                  // echo '<td><input type="text" style="width: 30px; text-align: center;" name="Present'.$id.'" value="'.$Present_days.'" readonly></td>';  
                  // echo '<td><input type="text" style="width: 30px; text-align: center;" name="Total'.$id.'" value="'.$Total_days.'" readonly></td>';

                  echo "</tr>";
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
								<button type="button" class="btn btn-success">Print</button>
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