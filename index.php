<?php
session_start();
	include("db.php");

?>
<html class="no-js">
    <head>
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
                  
                  <a class="navbar-brand" href="index.php"><h4 style="font-size:25px">TALK BOARD&nbsp;<sub style="font-style:italic;font-size:14px"> Let's discuss with the campus</sub></h4></a>
                  
                </div>

                <div id="navbar" class="navbar-collapse collapse pull-right">

                  <ul class="nav navbar-nav">

                    <li><a href="index.php">HOME</a></li>
                    <li><a href="About.php">ABOUT</a></li>
                    <li><a href="Contact.PHP">CONTACT</a></li>
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
							<li class="submenu-item"><a href="update student password.php">change password</a></li>
							<li class="submenu-item"><a href="update profile student.php">update profile</a></li>
							<li class="submenu-item"><a href="logout.php">Log out</a></li>
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
							<li class="submenu-item"><a href="update faculty password.php">change password</a></li>
							<li class="submenu-item"><a href="update profile faculty.php">update profile</a></li>
							<li class="submenu-item"><a href="logout.php">Log out</a></li>
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


  <!-- Carousel
    ================================================== -->
   <div id="homeCarousel" class="carousel slide carousel-home" data-ride="carousel">

          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#homeCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#homeCarousel" data-slide-to="1"></li>
            <li data-target="#homeCarousel" data-slide-to="2"></li>
          </ol>

          <div class="carousel-inner" role="listbox">

            <div class="item active">

              <img src="assets/images/slider/home-slider-1.jpg" style="height:550;width=1900" alt="">

              <div class="container">

                <div class="carousel-caption">

                  <h2 class="carousel-title bounceInDown animated slow">The aim of argument,or of discussion,should not be victory,but progress</h2>
                  <h4 class="carousel-subtitle bounceInUp animated slow ">Joseph Joubert</h4>
				   <a href="Logic Questions.php" class="btn btn-lg btn-secondary hidden-xs bounceInUp animated" >Start Discussion</a>

                </div> <!-- /.carousel-caption -->

              </div>

            </div> <!-- /.item -->


            <div class="item">

              <img src="assets/images/slider/home-slider-2.jpg" alt="">

              <div class="container">

                <div class="carousel-caption">

                  <h2 class="carousel-title bounceInDown animated slow">A new word is like a fresh seed sown on the ground of the discussion</h2>
                  <h4 class="carousel-subtitle bounceInUp animated slow">Ludwig Wittgenstein</h4>
                  <a href="Logic Questions.php" class="btn btn-lg btn-secondary hidden-xs bounceInUp animated" >Start Discussion</a>

                </div> <!-- /.carousel-caption -->

              </div>

            </div> <!-- /.item -->




            <div class="item ">

              <img src="assets/images/slider/home-slider-3.jpg" alt="">

              <div class="container">

                <div class="carousel-caption">

                  <h2 class="carousel-title bounceInDown animated slow" >If there is anything in the universe that can't stand discussion,let it crack.</h2>
                  <h4 class="carousel-subtitle bounceInUp animated slow">Wendell phillips.</h4>
                  <a href="Logic Questions.php" class="btn btn-lg btn-secondary hidden-xs bounceInUp animated slow" >Start Discussion</a>

                </div> <!-- /.carousel-caption -->

              </div>

            </div> <!-- /.item -->

          </div>

          <a class="left carousel-control" href="#homeCarousel" role="button" data-slide="prev">
            <span class="fa fa-angle-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>

          <a class="right carousel-control" href="#homeCarousel" role="button" data-slide="next">
            <span class="fa fa-angle-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>

    </div><!-- /.carousel -->

    


    <footer class="main-footer">

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
