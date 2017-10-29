<?php
include('session.php');
include('db.php');
$id=$loggedin_session;

$sql=mysqli_query($db,"select sub_1,sub_2,sub_3,sub_4 from lecture_subject");
$coun=0;
while($row=mysqli_fetch_array($sql,MYSQLI_ASSOC))
{
  ++$coun;
${'lec1' . $coun} = $row['sub_1'];
${'lec2' . $coun} = $row['sub_2'];
${'lec3' . $coun} = $row['sub_3'];
${'lec4' . $coun} = $row['sub_4'];
}

$sql=mysqli_query($db,"select fname from faculty 
where username='$loggedin_session'");
$row=mysqli_fetch_array($sql,MYSQLI_ASSOC);
$name=$row['fname'];

for($i=1;$i<=$coun;++$i)
{
$sql=mysqli_query($db,"select paper from subject 
where paper_code='${'lec1' . $i}'");
$row=mysqli_fetch_array($sql,MYSQLI_ASSOC);
${'le1' . $i}=$row['paper'];

$sql=mysqli_query($db,"select paper from subject 
where paper_code='${'lec2' . $i}'");
$row=mysqli_fetch_array($sql,MYSQLI_ASSOC);
${'le2' . $i}=$row['paper'];

$sql=mysqli_query($db,"select paper from subject 
where paper_code='${'lec3' . $i}'");
$row=mysqli_fetch_array($sql,MYSQLI_ASSOC);
${'le3' . $i}=$row['paper'];

$sql=mysqli_query($db,"select paper from subject 
where paper_code='${'lec4' . $i}'");
$row=mysqli_fetch_array($sql,MYSQLI_ASSOC);
${'le4' . $i}=$row['paper'];
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
    <title>Principal Page </title>

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
              <a href="Principal_home.php" class="site_title"><i class="glyphicon glyphicon-education"></i> <span>AMMS</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/user.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php  echo  $name;  ?></h2>
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
                      <li><a href="4a.php">View Subject Attendance</a></li>
                      <li><a href="4b.php">View Student Attendance</a></li>
                      <li><a href="4c.php">View Defaulters</a></li>
                    </ul>
                  </li>
          <li><a><i class="fa fa-home"></i> Marks <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="4d.php">View Subject Marks</a></li>
                      <li><a href="4e.php">View Student Marks</a></li>
                    </ul>
                  </li>
          <li><a><i class="fa fa-home"></i> Student Area<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="4f.php">Details</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-home"></i> Faculty Area<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="4g.php">Details</a></li>
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
                    <img src="images/user.jpg" alt="">Principal
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
                <h3>Home :: Principal-Home</h3>
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
					<form class="form-inline" role="form" method="POST" action="4ca.php">
							<table class="table">
								<tr>
                  <th>Subject: </th>
                  <td>
                  <div class="form-group">
                  <?php 
                  echo '<select class="form-control" name="sub_id" style="width: 300px">';
                  for($i=1;$i<=$coun;++$i)
                  {
                    echo "<option value='${'lec1' . $i}'> ${'le1' . $i} </option>";
                    echo "<option value='${'lec2' . $i}'> ${'le2' . $i} </option>";
                    echo "<option value='${'lec3' . $i}'> ${'le3' . $i} </option>";
                    echo "<option value='${'lec4' . $i}'> ${'le4' . $i} </option>";
                  }     
                   echo '</select>';
                   ?>
                    </div>
                  </td>
                </tr>
							</table>
							<div class="alignment">
								<input type="submit" class="btn btn-success" value="Go">
							</div>
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
  </body>
</html>