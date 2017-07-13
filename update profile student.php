<?php
session_start();
include("db.php");
if(isset($_SESSION['userId']))
{
	$id=$_SESSION['userId'];
if((isset($_POST['email']) && isset($_POST['pno'])))
{
	$email=mysql_real_escape_string($_POST['email']);
	$phno=mysql_real_escape_string($_POST['pno']);
	$filename = $_FILES['File']['name'];
			   if($filename=="")
				{	
						$_SESSION['NOFILE']="";
						$r = mysql_query("update `tbl` SET `email`='$email',`phno`='$phno' where `uname`='$id'");
									
									
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
									
									$r = mysql_query("update `tbl` SET `email`='$email',`phno`='$phno',`photo`='$filename' where `uname`='$id'");
									
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
			if(isset($_SESSION['ALREADY']))
			{
				echo "<center><h3 style=color:red;font-size:20px>**  You have already registered **</h3></center>";
				unset($_SESSION['ALREADY']);
			}
			if(isset($_SESSION['NOFILE']))
			{
				echo "<center><h3 style=color:green;font-size:20px>updated successfully</h3></center>";
				unset($_SESSION['NOFILE']);
			}
			if(isset($_SESSION['ERROR']))
			{
				echo "<center><h3 style=color:red;font-size:20px>** Error while uploading **</h3></center>";
				unset($_SESSION['ERROR']);
			}
			if(isset($_SESSION['SUCC']))
			{
				echo "<center><h3 style=color:green;font-size:20px>Updated successfully</h3></center>";
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
	<?php
	$id=$_SESSION['userId'];
	$f=mysql_query("select * from `tbl` where `uname`='$id'");
	$n=mysql_num_rows($f);
	if($n >= 1)
	{
		while($fetch=mysql_fetch_array($f))
		{


	?>
				

					<h2 class="title-style-2">STUDENT PROFILE UPDATE<span class="title-under"></span></h2><br>

					<form method="POST" action="" enctype="multipart/form-data" role="form">
						
						<div class="form-group col-md-6">
						<div class="form-group">
                            <input type="name" value="<?php echo $fetch['uname']?>"class="form-control" placeholder="User name( College Id )*" disabled="">
                        </div>
						<div class="form-group">
                            <input type="email" name="email" value="<?php echo $fetch['email']?>" class="form-control" placeholder="email*">
                        </div>
						
						<div class="form-group">
	                            Update Gender:&nbsp;&nbsp;<input type="text" name="gender" value="<?php echo $fetch['gender']?>" class="form-control" disabled>
	                        </div>
						<div class="form-group">
						year:&nbsp;
						<input type="text" name="year" value="<?php echo $fetch['year']?>" class="form-control" disabled>
						</div>
						<div class="form-group">
                        Date of Birth:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="date" name="dob" value="<?php echo $fetch['dob']?>" disabled>
                        </div>
						<div class="form-group">
                            Mobile Number:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="tel" class="form-control" name="pno" maxlength="10" value="<?php echo $fetch['phno']?>">
                        </div>
							 <div class="form-group">
                            <input type="submit" class="btn btn-primary pull-right" value="Update">
                        </div>
							</div>
							<div class="form-group col-md-6" style="padding-left:10em">
	                            <img src="images/<?php echo $fetch['photo'];?>" name="File" width="150" height="150">
	                    </div>
						<div class="form-group col-md-6"  style="padding-left:10em">
	                           Change your profile picture:&nbsp;&nbsp;&nbsp;<input type="file" name="File"  >
	                        </div>
                        

                        <div class="clearfix"></div>
	<br />
		<br />
		<?php
		}
		}
		?>
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
<?php
}
else
{
	header("location:login.php");
}
?>