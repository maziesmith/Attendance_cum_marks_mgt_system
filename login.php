<?php
include  "logincheck.php";
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
    <title>AMMS</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <!-- <div  id="login"> -->
            <div  id="login-st">
            <form action=""  method="POST"  id="signin"  id="reg">
              <?php
               $remarks  =  isset($_GET['remark_login'])  ?  $_GET['remark_login']  :  '';
                 if  ($remarks==null  and  $remarks=="")
              {
               echo  '<div  id="reg-head"  class="headrg"></div>';
                   }
                 if  ($remarks=='failed')
              {
               echo  '<div  id="reg-head-fail"  class="headrg">Login  Failed!,  Invalid  Credentials</div>';
                   }
              ?>
              <h1>AMMS</h1>
              <div  align="left"  id="tb-name">Username:</div>
              <div>
                <input type="text" name="username" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <td  class="tl-1"><div  align="left"  id="tb-name">Password:</div>
                <input name="password" type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <div  id="st" ><input  name="submit" class="btn btn-default submit" type="submit"  value="Login"  id="st-btn"/></div>
                
                <a class="reset_pass" href="#">Lost your password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Login Issues?
                  <a href="#signup" class="to_register"> Contact Administrator </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1> <i class="glyphicon glyphicon-education"></i> AMMS </h1>
                  <p>©2017 All Rights Reserved.</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="signup" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Contact Administrator</h1>
              <div>
                <input type="text" class="form-control" placeholder="Name" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="login.php">Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">No issues ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="glyphicon glyphicon-education"></i> AMMS </h1>
                  <p>©2017 All Rights Reserved.</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
