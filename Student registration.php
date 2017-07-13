<?php
session_start();
include("db.php");
if(isset($_POST['uname']) && isset($_POST['pwd']) && isset($_POST['cpwd']) && isset($_POST['gender']) && isset($_POST['year']) && isset($_POST['dob']) && isset($_POST['email']) && isset($_POST['pno']) && isset($_POST['secq']) && isset($_POST['ans']))
{
	
	$uname=mysql_real_escape_string($_POST['uname']);
	$password=md5(mysql_real_escape_string($_POST['pwd']));
	$pass=md5(mysql_real_escape_string($_POST['cpwd']));
	$gender=mysql_real_escape_string($_POST['gender']);
	$year=mysql_real_escape_string($_POST['year']);
	$dob=mysql_real_escape_string($_POST['dob']);
	$email=mysql_real_escape_string($_POST['email']);
	$phno=mysql_real_escape_string($_POST['pno']);
	$secq=mysql_real_escape_string($_POST['secq']);
	$ans=mysql_real_escape_string($_POST['ans']);
	$r=mysql_query("select * from tbl where `uname`='$uname'");
	$c=mysql_num_rows($r);
	if($c > 0)
	{
		$_SESSION['ALREADY']="";
	}
	else{
		
		if($password == $pass){
		$filename = $_FILES['File']['name'];
			   if($filename=="")
				{	
						$_SESSION['NOFILE']="";
				}
				else
				{
												
					$tmpname  = $_FILES['File']['tmp_name'];
					$filesize = $_FILES['File']['size'];
					$filetype = $_FILES['File']['type'];
					$fp = fopen($tmpname, 'r');
					$file = fread($fp, filesize($tmpname));
					$file = addslashes($file);
					fclose($fp);
																
					$fileName = $_FILES['File']['name'];
					$tmpName  = $_FILES['File']['tmp_name'];
					$fileSize = $_FILES['File']['size'];
					$fileType = $_FILES['File']['type'];
					$uploadDir = 'images/';
					$temp = explode(".",$_FILES['File']['name']);
					$extension = end($temp);
					$path="images/";
					$date = date("h-i:sa");
					$filename=basename($_FILES["File"]["name"]);
					$filename =  $date . (string) strrchr($filename, '.');
					$filename = md5($date) . '.jpg';															
					$fil=mysql_query("SELECT * FROM `tbl` WHERE photo='$filename'");
						if($fileType=="image/jpeg" || $fileType=="image/png" || $fileType=="image/jpg" || $fileType=="image/JPEG" || $fileType=="image/PNG" || $fileType=="image/JPG")
						{			
								if(mysql_num_rows($fil)<1)
								{	
									$filePath = $uploadDir . $filename;
									$result = move_uploaded_file($_FILES["File"]["tmp_name"],$path . $filename);
									if (!$result) 
									{
										$_SESSION['ERROR']="";			
										exit;
									}
									$r = mysql_query("INSERT INTO `tbl`( `uname`, `pwd`, `gender`, `year`, `dob`, `email`,`phno`,`seq`,`secqans`,`photo`) VALUES ('$uname','$password','$gender','$year','$dob','$email','$phno','$secq','$ans','$filename')");
										$_SESSION['SUCC']="";									
									}
								else
								{
									$_SESSION['ALR']="";
								}
						}
						else{
							$_SESSION['SEL']="";
						}
				}
			}
			else{
			$_SESSION['PNM']="";
		}
		}
		
	}
?>

<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <title>Student Registration</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

     
        <!-- Bootsrap -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">

        <!-- Font awesome -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">

        <!-- Template main Css -->
        <link rel="stylesheet" href="assets/css/style.css">
        
        <!-- Modernizr -->
        <script src="assets/js/modernizr-2.6.2.min.js"></script>


    </head>
    <body>
    <!-- NAVBAR
    ================================================== -->

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
	<div class="page-heading text-center">

		<div class="container zoomIn animated">
			
			<h1 class="page-title" style="color:paleturquoise">STUDENT REGISTRATION FORM<span class="title-under"></span></h1>
			
		</div>

	</div>
	
		<?php
			if(isset($_SESSION['ALREADY']))
			{
				echo "<center><h3 style=color:red;font-size:20px>**  You have already registered **</h3></center>";
				unset($_SESSION['ALREADY']);
			}
			if(isset($_SESSION['NOFILE']))
			{
				echo "<center><h3 style=color:red;font-size:20px>** No file selected **</h3></center>";
				unset($_SESSION['NOFILE']);
			}
			if(isset($_SESSION['ERROR']))
			{
				echo "<center><h3 style=color:red;font-size:20px>** Error while uploading **</h3></center>";
				unset($_SESSION['ERROR']);
			}
			if(isset($_SESSION['SUCC']))
			{
				echo "<center><h3 style=color:green;font-size:20px>Register successfully</h3></center>";
				unset($_SESSION['SUCC']);
			}
			if(isset($_SESSION['ALR']))
			{
				echo "<center><h3 style=color:red;font-size:20px>** Already have a file **</h3></center>";
				unset($_SESSION['ALR']);
			}
			
			if(isset($_SESSION['SEL']))
			{
				echo "<center><h3 style=color:red;font-size:20px>** Select an image **</h3></center>";
				unset($_SESSION['ALR']);
			}
			if(isset($_SESSION['PNM']))
			{
				echo "<center><h3 style=color:red;font-size:20px>** Passwords are not matched **</h3></center>";
				unset($_SESSION['PNM']);
			}
		?>


	<div class="main-container fadeIn animated">

		<div class="container">

			<div class="row">

				<div class="col-md-7 col-sm-12 col-form">

					<h2 class="title-style-2">REGISTRATION FORM <span class="title-under"></span></h2>

					<form method="POST" action="" enctype="multipart/form-data" role="form">
						<div class="form-group">
                            <input type="name" name="uname" class="form-control" placeholder="User name( College Id )*" required>
                        </div>
						<div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="email*" required>
                        </div>
						<div class="row">

							<div class="form-group col-md-6">
	                            <input type="password" name="pwd" class="form-control" placeholder="Password*" required>
	                        </div>

	                         <div class="form-group col-md-6">
	                            <input type="password" name="cpwd" class="form-control" placeholder="Confirm your password*" required>
	                        </div>
							
						</div>
						<div class="form-group">
	                            Gender:&nbsp;&nbsp;<input type="radio" name="gender">&nbsp;&nbsp;Male&nbsp;&nbsp;
	                            <input type="radio" name="gender">&nbsp;&nbsp;Female
	                        </div>
						<div class="form-group">
						Select your present year:&nbsp;
						<input type="radio" name="year" value="E4" checked >&nbsp;E4&nbsp;
                                <input type="radio" name="year" value="E3">&nbsp;E3&nbsp;
                                <input type="radio" name="year" value="E2">&nbsp;E2&nbsp;
                                <input type="radio" name="year" value="E1">&nbsp;E1&nbsp;
						</div>
						<div class="form-group">
                            Enter your Date of Birth:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="date" name="dob" required>
                        </div>
						<div class="form-group">
                            Mobile Number:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="tel" name="pno" maxlength="10" placeholder="ph no*">
                        </div>
						
						<div class="form-group">
                          Security Question:
                          <select name="secq" value="select">
									<option value="enter your hall ticket number">enter your hall ticket number</option>
									<option value="enter your pet name" >enter your pet name</option>
									<option value="enter your id number">enter your favorite branch</option>
									<option value="enter your native place">enter your native place</option>
								</select>
                        </div>
						
                        <div class="form-group">
                            <textarea name="ans" rows="3" class="form-control" placeholder="Answer*" required></textarea>
                        </div>
						<div class="form-group">
						Upload your profile picture:&nbsp;&nbsp;&nbsp;<input type="file" name="File" required >
                        </div>	
                         <div class="form-group">
                            <input type="submit" class="btn btn-primary pull-right" value="Submit">
							<button type="reset" class="btn btn-primary pull-right">Reset</button>
                        </div>

                        <div class="clearfix"></div>

					</form>

				</div>
					
					
				</div>

			</div> <!-- /.row -->


		</div>
		


	</div>


    <footer class="main-footer">


        </div>

        <div class="footer-bottom">

            <div class="container text-right">
                	copyright &copy; rgukt.in
            </div>
        </div>
        
    </footer>




       
        
        <!-- jQuery -->
        <script>window.jQuery || document.write('<script src="assets/js/jquery-1.11.1.min.js"><\/script>')</script>

        <!-- Bootsrap javascript file -->
        <script src="assets/js/bootstrap.min.js"></script>


        <!-- Google map  -->
        <script src="http://maps.google.com/maps/api/js?sensor=false&amp;libraries=places" type="text/javascript"></script>


        <!-- Template main javascript -->
        <script src="assets/js/main.js"></script>
    </body>
</html>
