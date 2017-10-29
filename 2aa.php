<?php
include('session.php');
include('db.php');
$subject=$_POST['sub_id'];
$lecture=$_POST['lecture_no'];
$date=$_POST['selectdate'];

$sql=mysqli_query($db,"select branch,sem from lecture_subject 
where (sub_1='$subject' OR
       sub_2='$subject' OR
       sub_3='$subject' OR
       sub_4='$subject')");
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
      input[type="text"] {
                            outline-style: none;
                        }
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
                    <h2>Attendance > Mark Attendance</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>                 
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
				  <div class="table-responsive">
					
						<form class="for-horizontal" method="POST" action="2ab.php">
              <table class="table">
            <?php
                echo "<tr>";
                echo '<th>Subject ID: <input type="text" style="width: 70px; text-align: center;" name="sub_id" value="'.$subject.'" readonly></th>';
                echo '<th>Date: <input type="text" name="selectdate" style="width: 80px; text-align: center;" value="'.$date.'" readonly></th>';
                echo '<th>Lecture No: <input type="text" style="width: 30px; text-align: center;" name="lecture_no" value="'.$lecture.'" readonly></th>';
                echo '<th>Branch: <input type="text" style="width: 50px; text-align: center;" name="branch" value="'.$branch.'" readonly></th>';
                echo '<th>Sem: <input type="text" style="width: 30px; text-align: center;" name="sem" value="'.$sem.'" readonly></th>';
                echo "</tr>";
              ?>
              </table>

							<table class="table table-striped jambo_table bulk_action">
							<thead>
								<tr class="headings">
									<th class="column-title">S. No.</th>
									<th class="column-title">Roll No.</th>
									<th class="column-title">Name</th>
                  <th class="column-title">Present</th>
                  <th class="column-title">Total</th>

									<th class="bulk-actions" colspan="3">
										<a class="antoo" style="color:#fff; font-weight:500;">Students Selected ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
									</th>
									<th><input type="checkbox" id="check-all" class="flat"></th>
								</tr>
							</thead>
							<tbody>
								<?php
                $mysqli = new mysqli("localhost", "root", "", "practice");
                if($mysqli === false){
                  die("ERROR: Could not connect. " . $mysqli->connect_error);
                }
                $ssql = "select enrollment_no, fname from student_entries where branch='$branch' and sem='$sem'";
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
                  // $name=$row["fname"];
                  echo '<td><input type="text" name="'.$id.'" style="width: 30px; text-align: center;" value="'.$id.'" readonly></td>';
                  echo '<td><input type="text" style="width: 120px" name="enrollment_no'.$id.'" value="'.$row["enrollment_no"].'" readonly></td>';
                  echo '<td><input type="text" style="width: 120px" name="fname'.$id.'" value="'.$row["fname"].'" readonly></td>';

                  $sssql = "select a.*
                  FROM final_attendance a
                  WHERE a.Subject='$subject' AND a.Enrollment_No='$valu' AND a.Dates = (SELECT MAX(b.Dates)
                      FROM final_attendance b
                      WHERE b.Enrollment_No = a.Enrollment_No AND b.Subject='$subject')";
                  if($results = $mysqli->query($sssql))
                  {
                  if($results->num_rows > 0)
                  {
                    if($rowss = $results->fetch_array())
                    {
                      // $Attendance=$rowss['a.Attendance'];
                    $Present_days=$rowss['Present_days'];
                    $Total_days=$rowss['Total_days'];
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
                  echo '<td><input type="text" name="Present'.$id.'" style="width: 30px; text-align: center;" value="'.$Present_days.'" readonly></td>';  
                  echo '<td><input type="text" style="width: 30px; text-align: center;" name="Total'.$id.'" value="'.$Total_days.'" readonly></td>';
                  echo '<td class="a-center"><input type="checkbox" name="table_records'.$id.'" class="flat" value="1"></td>';
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
								<input type="submit" name="dp" id="dp" class="btn btn-success">
							</div>
						</form>

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
	<!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  </body>
</html>