
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

  <style>
  body {
    margin: 0;
}

#liste{
    list-style-type: none;
    margin: 0;
    padding:1px;
    width: 20%;
    background-color: #f1f1f1;
    position: fixed;
    height: 100%;
    overflow: auto;
	position:relative;
}

li a {
    display: block;
    color: #000;
    padding: 14.5px 16px;
    text-decoration: none;


}

li a.active {
    background-color:green;
    color: white;

}

li a:hover:not(.active) {
    background-color:green;
    color: white;
}
input[type='submit']{
fontsize:18px;
background-color:blue;
width:300px;
height:50px;

}
  </style>
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
					<li class="has-child"><a href="#">username</a>
						<ul class="submenu">
							<li class="submenu-item"><a href="update student password.php">change password</a></li>
							<li class="submenu-item"><a href="update profile student.php">update profile</a></li>
							<li class="submenu-item"><a href="#">Log out</a></li>
						</ul>
					
					</li>

                  </ul>

                </div> <!-- /#navbar -->

              </div> <!-- /.container -->
              
            </div> <!-- /.navbar-main -->


        </nav> 

    </header> <!-- /. main-header -->
	<div id=catog>
	
		<ul id="liste">
		<li><h2><a href="input.htm" target="frame1" width="100" height="300">StartDiscussion</a></h2></li>
		<li><a class="active" href="#" target="frame1" width="100" height="300">category</a></li>
		<li><a  href="#" >All discussions</a></li>
		<li><a  href="#" >Aptitude</a></li>
		<li><a   href="#">General knowledge</a></li>
		<li><a   href="#"> Funny questions</a></li>
		<li><a   href="#">English</a></li>
		<li><a  href="#"> Technical doubts</a></li>
		<li><a href="#"> Gate</a></li>
		<li><a href="#">Post To Faculty</a></li>

		<li><a href="logout.php">Logout</a></li>
		</ul>	
</div>


	 
        <div class="footer-top">
            
        </div>

        <div class="footer-bottom" style="padding-bottom:0">
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
