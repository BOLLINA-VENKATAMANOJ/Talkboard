<?php
	session_start();
	include("db.php");

	if(isset($_POST['fname']) && isset($_POST['pname'])) {
		$uname = mysql_real_escape_string($_POST['fname']);
		$pwd = md5(mysql_real_escape_string($_POST['pname']));
		$sql = mysql_query("SELECT * FROM tbl WHERE `uname` ='$uname' AND `pwd` ='$pwd'");
		$r=mysql_num_rows($sql);
		if ($r >= 1) {
			$_SESSION['userId']= $uname;
			header("location:index.php");
		}
		else {
				$_SESSION['INVALID']="";
		}
		
	}
?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login form</title>
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

                    <li><a href="index.html">HOME</a></li>
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
	if(isset($_SESSION['INVALID']))
	{
		echo "<center><h3 style=color:red>**  Invalid Details  **</h3></center>";
		unset($_SESSION['INVALID']);
	}
	?>

<body>
  <body>
<div class="containerlog">
	<section id="content">
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
			<h1>Login Form</h1>
			<div>
				<input type="text" placeholder="Username" name="fname" required="" id="username" />
			</div>
			<div>
				<input type="password" placeholder="Password" name="pname" required="" id="password" />
			</div>
			<div>
				<input type="submit" value="Log in" />
				<a href="Forgot.php"><h5>Lost your password ?</h5></a>
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="Student registration.php">Not have an account</a>
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
