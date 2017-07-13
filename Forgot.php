<?php
session_start();
include("db.php");
if(isset($_POST['fname']) && isset($_POST['pwd']) && isset($_POST['cpwd']) && isset($_POST['seq']) && isset($_POST['answer']))
{
		
	$username = mysql_real_escape_string($_POST['fname']);
	$qname = mysql_real_escape_string($_POST['seq']);
	$seqans = mysql_real_escape_string($_POST['answer']);
	$fpwd = md5(mysql_real_escape_string(($_POST['pwd'])));
	$fcpwd = md5(mysql_real_escape_string(($_POST['cpwd'])));
	if($fpwd == $fcpwd){
		$sql  = mysql_query("select * from tbl  where `uname`='$username' AND `seq`='$qname' AND `secqans`='$seqans'");
		$result = mysql_num_rows($sql);
	if ($result >= 1) {
		$sql = mysql_query("UPDATE tbl SET pwd = '$fpwd' WHERE uname ='$username'");
		$_SESSION['updated']="";
	}
	
	else {
		$_SESSION['INVALID']="";
	}
	}
else{
		$_SESSION['PNM']="";
}
	
	include "db.php";
}
?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Forgot</title>
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
  
  
  
      <link rel="stylesheet" href="assets/css/stylelog.css">

  
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
                  
                  <a class="navbar-brand" href="index.php"><h4 style="font-size:25px">TALK BOARD</h4></a>
                  
                </div>

                <div id="navbar" class="navbar-collapse collapse pull-right">

                  <ul class="nav navbar-nav">

                    <li><a href="index.php">HOME</a></li>
                    <li><a href="#">ABOUT</a></li>
                    <li><a href="#">CONTACT</a></li>
                    <li class="has-child"><a href="#">LOG IN</a>

                      <ul class="submenu">
                         <li class="submenu-item"><a href="login.php">Student</a></li>
                         <li class="submenu-item"><a href="Flogin.php">Faculty</a></li>
                      </ul>

                    </li>
					<li class="has-child"><a href="#">REGISTER</a>
						<ul class="submenu">
							<li class="submenu-item"><a href="Student registration.php">Student Registration</a></li>
							<li class="submenu-item"><a href="Faculty registration.php">Faculty Registration</a></li>
						</ul>
					
					</li>

                  </ul>

                </div> <!-- /#navbar -->

              </div> <!-- /.container -->
              
            </div> <!-- /.navbar-main -->


        </nav> 

    </header> <!-- /. main-header -->
<?php
	if(isset($_SESSION['updated']))
	{
			echo "<h3 style=color:red>Password Updated Successfully</h3>";
			unset($_SESSION['updated']);
	}
	if(isset($_SESSION['INVALID']))
	{
			echo "<center><h3 style=color:red>Invalid Details</h3></center>";
			unset($_SESSION['INVALID']);
	}
	if(isset($_SESSION['PNM']))
	{
			echo "<center><h3 style=color:red>Passwords are not matched</h3></center>";
			unset($_SESSION['PNM']);
	}
	?>
<body>
  <body>
<div class="containerlog">
	<section id="content">
		<form action="" method = "POST">
			<h1>Forgot</h1>
			<div>
				<input type="text" placeholder="Username" name="fname" required="" id="username" />
			</div>
			<div>
				<input type="password" placeholder="Password" name="pwd" required="" id="password" />
			</div>
			<div>
				<input type="password" placeholder="Confirm Password" name="cpwd" required="" id="password" />
			</div>
			<div>
            <select name="seq" id="seq" value="select">
									<option value="enter your hall ticket number">enter your hall ticket number</option>
									<option value="enter your pet name" >enter your pet name</option>
									<option value="enter your id number">enter your favorite branch</option>
									<option value="enter your native place">enter your native place</option>
								</select>
			</div>
			<br />
			<div>
				<input type="text" placeholder="Answer" name="answer" required="" id="username" />
			</div>
			<div>
				<input type="submit"  value="Update password" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="Student registration.html">Not have an account</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body> 
</body>

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
