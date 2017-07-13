<?php
session_start();
include('db.php');
if(isset($_SESSION['userId']))
	
{
	$id=$_SESSION['userId'];
if((isset($_POST['new']) && isset($_POST['cnew']) && isset($_POST['current'])))
{
	$cpwd=md5(mysql_real_escape_string($_POST['current']));
	$new=md5(mysql_real_escape_string($_POST['new']));
	$cnew=md5(mysql_real_escape_string($_POST['cnew']));
	$r=mysql_query("select * from `tbl` where `pwd`='$cpwd'");
	$c=mysql_num_rows($r);
	if($c >= 1)
	{
	
	
	
		if("$new==$cnew")
		{
				$r = mysql_query("update `tbl` set `pwd`='$new' where `uname`='$id'");
				$_SESSION['SUCC']="";
		}
		else
		{
			$_SESSION['PNM']="";
			
		}
	}
	else{
	
			$_SESSION['NOT']="";
	}
}

?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Change password</title>
  <style>
  body {
  background:#2c3e50;
}

.updat{
  position:relative;
  width:380px;
  height:400px;
  margin:80px auto;
  text-align:center;
  background:#1F76BD;
  padding:40px;
  -webkit-border-radius:20px 0 0 0;
     -moz-border-radius:20px 0 0 0;
          border-radius:20px 0 0 0;
  -webkit-box-shadow: 0px 1px 0px #ad392d, inset 0px 1px 0px white;
     -moz-box-shadow: 0px 1px 0px #ad392d, inset 0px 1px 0px white;
          box-shadow: 0px 1px 0px #ad392d, inset 0px 1px 0px white;
  box-shadow: 20px 20px 20px;
}

#heead{
  font-family: 'Source Sans Pro', sans-serif;
  font-size:2em;
  font-weight:300;
  margin-bottom:25px;
  color:white;
  text-shadow:0px 0px 0px white;
}

input {
  display:block;
  width:315px;
  padding:14px;
  -webkit-border-radius:6px;
     -moz-border-radius:6px;
          border-radius:6px;
  border:1;
  margin-bottom:12px;
  color:#7f8c8d;
  font-weight:600;
  font-size:16px;
}

input:focus {
  background:#fafafa;
}



a, a:visited {
  text-decoration:none;
  color:#7f8c8d;
  font-weight:400;
  text-shadow:px px 0px white;
  -webkit-transition: all .3s ease-in-out;
     -moz-transition: all .3s ease-in-out;
          transition: all .3s ease-in-out;
}

.buttonm {
  position:relative;
  float:left;
  width:145px;
  margin-top:10px;
  background:#3498db;
  color:#fff;
  font-weight:400;
  text-shadow:0px 0px 0px #2d7baf;
  box-shadow:0px 0px 0px #2d7baf;
  -webkit-transition: all .3s ease-in-out;
     -moz-transition: all .3s ease-in-out;
          transition: all .3s ease-in-out;
}

  
  </style>
  <meta charset="utf-8">
        <title>TALK BOARD</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootsrap -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">

        <!-- Font awesome -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">

        <!-- Owl carousel -->
        <link rel="stylesheet" href="assets/css/owl.carousel.css">

        <!-- Template main Css -->
        <link rel="stylesheet" href="assets/css/style.css">
        
        <!-- Modernizr -->
      <script src="assets/js/modernizr-2.6.2.min.js"></script>
  
  
  
</head>
<body>

     <header class="main-header">
        
    
        <nav class="navbar navbar-static-top">
            <div class="navbar-top">
              </div>

            </div>

            <div class="navbar-main">
              
              <div class="container">

                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">

                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>

                  </button>
                  
                  <a class="navbar-brand" href="index.php"><h4 style="font-size:25px;color:black">TALK BOARD</h4></a>
                  
                </div>

                <div id="navbar" class="navbar-collapse collapse pull-right">

                  <ul class="nav navbar-nav">

                    <li><a href="index.php" style="color:Black">HOME</a></li>
                    <li><a href="#">ABOUT</a></li>
                    <li><a href="#">CONTACT</a></li>
					<?php
					if(!(isset($_SESSION['userId']) or isset($_SESSION['flogin'])))
						{
					?>
                    <li class="has-child"><a href="#">LOG IN</a>
					
                      <ul class="submenu">
                         <li class="submenu-item"><a href="login.php">Student</a></li>
                         <li class="submenu-item"><a href="Flogin.php">Faculty</a></li>
                      </ul>

                    </li>
					<?php
					}
					?>
					<?php
						if(!(isset($_SESSION['userId']) or isset($_SESSION['flogin'])))
						{
					?>
					<li class="has-child"><a href="#">REGISTER</a>
						<ul class="submenu">
							<li class="submenu-item"><a href="Student registration.php">Student Registration</a></li>
							<li class="submenu-item"><a href="Faculty registration.php">Faculty Registration</a></li>
						</ul>
					
					</li>
					<?php
					}
					
					?>
					<?php
					
						if(isset($_SESSION['userId']))
						{
							$id=$_SESSION['userId'];
					?>
					<li class="has-child"><a href="#"><?php echo $id ?></a>
						<ul class="submenu">
							<li class="submenu-item"><a href="update student password.php" style="color:black">change password</a></li>
							<li class="submenu-item"><a href="update profile student.php" style="color:black">update profile</a></li>
							<li class="submenu-item"><a href="logout.php" style="color:black">Log out</a></li>
						</ul>
					
					</li>
					<?php
					}
					?>
					<?php
						if(isset($_SESSION['flogin']))
						{
							$id=$_SESSION['flogin'];
						?>
						<li class="has-child"><a href="#"><?php echo $id ?></a>
						<ul class="submenu">
							<li class="submenu-item"><a href="update faculty password.php" style="color:black">change password</a></li>
							<li class="submenu-item"><a href="update profile faculty.php" style="color:black">update profile</a></li>
							<li class="submenu-item"><a href="logout.php" style="color:black">Log out</a></li>
						</ul>
					
					</li>
						
						<?php
						}
						?>
                  </ul>

                </div> <!-- /#navbar -->

              </div> <!-- /.container -->
              
            </div> <!-- /.navbar-main -->


        </nav> 

    </header> <!-- /. main-header -->
		
		
		<?php
			if(isset($_SESSION['NOT']))
			{
				echo "<center><h3 style=color:red;font-size:20px>**  current password is wrong **</h3></center>";
				unset($_SESSION['NOT']);
			}
			if(isset($_SESSION['SUCC']))
			{
				echo "<center><h3 style=color:green;font-size:20px>Password Updated successfully</h3></center>";
				unset($_SESSION['SUCC']);
			}
			if(isset($_SESSION['PNM']))
			{
				echo "<center><h3 style=color:red;font-size:20px>** Passwords are not matched **</h3></center>";
				unset($_SESSION['PNM']);
			}
		?>

		
<form method="POST" action="" class="updat" enctype="multipart/form-data" role="form">
  <h4 id="heead"> Update Password </h4>
  <input class="nameu" type="password" name="current" placeholder="Enter current password"/>
  <input class="pw" type="password" name="new"  placeholder="Enter new password"/>
   <input class="pw" type="password" name="cnew" placeholder="Confirm your Password"/>

  <input class="buttonm" type="submit" value="Update"/>
</form>
		</div>
		
		
        <div class="footer-top">
            
        </div>

        <div class="footer-bottom">

            <div class="container text-right">
			 copyright &copy; rgukt.in
            </div>
        </div>
        
    </footer> <!-- main-footer -->
    <!--  Scripts
    ================================================== -->

    <!-- jQuery -->
    <script>window.jQuery || document.write('<script src="assets/js/jquery-1.11.1.min.js"><\/script>')</script>

    <!-- Bootsrap javascript file -->
    <script src="assets/js/bootstrap.min.js"></script>
    
    <!-- owl carouseljavascript file -->
    <script src="assets/js/owl.carousel.min.js"></script>

    <!-- Template main javascript -->
    <script src="assets/js/main.js"></script>


    </body>
</html>
<?php
}
else
{
	header("location:login.php");
}

?>