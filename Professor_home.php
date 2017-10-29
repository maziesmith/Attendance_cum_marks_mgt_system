<?php
include('session.php');
$sql=mysqli_query($db,"select  from lecture_subject 
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
$name=$row['fname'];
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
    <title>Professor Home Page </title>

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
    <style>
      .clock {
width: 300px;
margin: 0 auto;
padding: 30px;
color: #000;background:#FFF;
}
.clock ul {
width: 250px;
margin: 0 auto;
padding: 0;
list-style: none;
text-align: center
}

.clock ul li {
display: inline;
font-size: 3em;
text-align: center;
font-family: "Arial", Helvetica, sans-serif;
text-shadow: #000000, #000000, #000000
}
#Date { 
font-family: 'Arial', Helvetica, sans-serif;
font-size: 26px;
text-align: center;
text-shadow: #000000, #000000;
padding-bottom: 40px;
}

#point {
position: relative;
-moz-animation: mymove 1s ease infinite;
-webkit-animation: mymove 1s ease infinite;
padding-left: 10px;
padding-right: 10px
}
@-webkit-keyframes mymove 
{
0% {opacity:1.0; text-shadow:0 0 20px #00c6ff;}
50% {opacity:0; text-shadow:none; }
100% {opacity:1.0; text-shadow:0 0 20px #00c6ff; } 
}

@-moz-keyframes mymove 
{
0% {opacity:1.0; text-shadow:0 0 20px #00c6ff;}
50% {opacity:0; text-shadow:none; }
100% {opacity:1.0; text-shadow:0 0 20px #00c6ff; } 
}
.bgimg {
    background-image: url('../img/back.jpg');
    margin-left: 10px;
     margin-right: 10px;
}
/*.pad{
  margin-left: 3px;
  margin-right: 3px;
}*/
</style>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="" class="site_title"><i class="glyphicon glyphicon-education"></i> <span>AMMS</span></a>
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
            <!-- <div class="sidebar-footer pull-right hidden-small">
              
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

            <div class="row bgimg">
              <br>
              <div class="col-md-12 col-sm-12 col-xs-12">
<!-- <br><br> -->
                <div class="x_panel">
                <!--   <div class="x_title">
                    <h2></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>                 
                    </ul>
                    <div class="clearfix"></div>
                  </div> -->
                  <div class="x_content">
                  
                  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
// Making 2 variable month and day
var monthNames = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ]; 
var dayNames= ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]

// make single object
var newDate = new Date();
// make current time
newDate.setDate(newDate.getDate());
// setting date and time
$('#Date').html(dayNames[newDate.getDay()] + " " + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + ' ' + newDate.getFullYear());

setInterval( function() {
// Create a newDate() object and extract the seconds of the current time on the visitor's
var seconds = new Date().getSeconds();
// Add a leading zero to seconds value
$("#sec").html(( seconds < 10 ? "0" : "" ) + seconds);
},1000);

setInterval( function() {
// Create a newDate() object and extract the minutes of the current time on the visitor's
var minutes = new Date().getMinutes();
// Add a leading zero to the minutes value
$("#min").html(( minutes < 10 ? "0" : "" ) + minutes);
},1000);

setInterval( function() {
// Create a newDate() object and extract the hours of the current time on the visitor's
var hours = new Date().getHours();
// Add a leading zero to the hours value
$("#hours").html(( hours < 10 ? "0" : "" ) + hours);
}, 1000); 
});
</script>
<div class="clock">
<div id="Date"></div>
<ul>
<li id="hours"></li>
<li id="point">:</li>
<li id="min"></li>
<li id="point">:</li>
<li id="sec"></li>
</ul>
</div>

                    <!-- <img src="images/welcome.jpg" style="align:center;width:100%;height:100%;"> -->
<?php
include('db.php');
$sql="SELECT  *  FROM  user_entries  where  id=$loggedin_id";
$result=mysqli_query($db,$sql);
?>
<?php
while($rows=mysqli_fetch_array($result)){
?>
<div  id="signup">
<div  id="signup-st">
<form  action=""  method="POST"  id="signin"  id="reg">
<!-- <div  id="reg-head"  class="headrg">Your  Profile</div> -->
<!-- <table  border="0"  align="center"  cellpadding="2"  cellspacing="0">
<tr  id="lg-1">
<td  class="tl-1"><div  align="left"  id="tb-name">Reg id:</div></td>
<td  class="tl-4"><?php  echo  $rows['id'];  ?></td>
<td  class="tl-1"><div  align="left"  id="tb-name">Attendance</div></td>
<td  class="tl-1"><div  align="centre"  id="tb-name"><a href="">Mark class attendance</a></div></td>
<td  class="tl-1"><div  align="centre"  id="tb-name"><a href="">Previous Records</a></div></td>
<td></td>
<td  class="tl-1"><div  align="left"  id="tb-name">Marks</div></td>
<td  class="tl-1"><div  align="centre"  id="tb-name"><a href="">Assign Marks</a></div></td>
<td  class="tl-1"><div  align="centre"  id="tb-name"><a href="">Previous Records</a></div></td>
</tr>
<tr  id="lg-1">

</tr>
<tr  id="lg-1">

</tr>
</table>
<div  id="reg-bottom"  class="btmrg"></div>
</form> -->
</div>
</div>
<div  id="login">
<div  id="login-sg">
</div>
</div>
<?php
//  close  while  loop
}
?>
</div>
</div>
</div>
<?php
//  close  connection;
mysqli_close($db);
?>

					
                    <!-- <div class="col-md-12">

                      <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Home</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Profile</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Profile</a>
                          </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                          <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                            <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher
                              synth. Cosby sweater eu banh mi, qui irure terr.</p>
                          </div>
                          <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                            <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo
                              booth letterpress, commodo enim craft beer mlkshk aliquip</p>
                          </div>
                          <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                            <p>xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui
                              photo booth letterpress, commodo enim craft beer mlkshk </p>
                          </div>
                        </div>
                      </div>

                    </div> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
        <!-- footer content -->
        <footer>
          <div class="pull-right">Copyright 2017 GBPEC.
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