<?php
session_start();
include("db.php");
if(isset($_SESSION['userId']) or isset($_SESSION['flogin']))
{
		if(isset($_REQUEST['ID']))
		{
			$sno=$_REQUEST['ID'];
			$fl=$_SESSION['flogin'];
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Answer Faculty</title>
  <meta charset="utf-8">
        <title>TALK BOARD</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootsrap -->
        <link rel="stylesheet" href="assets/css/css/bootstrap.min.css">

        <!-- Font awesome -->
        <link rel="stylesheet" href="assets/css//css/font-awesome.min.css">

        <!-- Owl carousel -->
        <link rel="stylesheet" href="assets/css/css/owl.carousel.css">

        <!-- Template main Css -->
        <link rel="stylesheet" href="assets/css/css/style.css">
        
        <!-- Modernizr -->
      <script src="assets/js/modernizr-2.6.2.min.js"></script>
  
  
  
      <link rel="stylesheet" href="assets/css/css/stylelog.css">

 <style>
  body {
    margin: 0;
}

#liste{
    margin: 0;
    padding:1px;
    width: 18%;
    background-color: #f1f1f1;
    position: fixed;
    height: 100%;
	list-style-type:none;
    overflow: auto;
	position:relative;
	float:left;
	display:block;
	
}
#section
{
	width:1050px;
	background:lightblue;
    float:left;
	display:block;
    padding:30px;
}

li a {
    display: block;
    color: #000;
    padding: 16px 16px;


}

li a.active {
    background-color:green;
    color: white;

}

li a:hover:not(.active) {
    background-color:green;
    color: white;
	text-decoration:none;
}
a:active {
color:blue;
}
}
table{
width:1000px;
counter-reset: rowNumber;
}
table tr {
    counter-increment: rowNumber;
}

table tr td:first-child::before {
    content: counter(rowNumber);
    min-width: 1em;
    margin-right: 0.5em;
}
td{
font-size:16px;
padding:10px
}

 tr {
    border-bottom: 1px solid black;
    border-top: 0px solid black;
    border-collapse: collapse;
	padding-bottom:50px;
}
button {
  background:LawnGreen ;
	border-radius: 30px;
	box-shadow: 0 1px 0 rgba(255,255,255,0.8) inset;
border: 1px solid #D69E31;
color: #85592e;
cursor: pointer;
float: right;
font: bold 11px Helvetica, Arial, sans-serif;
height: 25px;

position: relative;
text-shadow: 0px 1px 0px rgba(255, 255, 255, 0.5);
width: 100px;
}
button:hover {
  background: lightsalmon;
}​

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
	<div id=catog>
	
		<ul id="liste">
		<li><h3><a class="active" width="100" height="300">Category</a></h3></li>
		<li><a  href="Logic Questions.php">Logic Questions</a></li>
		<li><a href="About Acadamics.php" >About Acadamics</a></li>
		<li><a  href="Aptitude.php" >Aptitude</a></li>
		<li><a   href="General Knowledge.php">General knowledge</a></li>
		<li><a   href="Funny Questions.php"> Funny questions</a></li>
		<li><a   href="English.php">English</a></li>
		<li><a  href="Technical doubts.php"> Technical doubts</a></li>
		<li><a href="Gate.php"> Gate</a></li>
		<li><a href="Post to Faculty.php">Post To Faculty</a></li>
		</ul>
</div>

<div id="section">
	<script>
		var table = document.getElementsByTagName('table')[0],
		rows = table.getElementsByTagName('tr'),
		text = 'textContent' in document ? 'textContent' : 'innerText';

		for (var i = 0, len = rows.length; i < len; i++){
		rows[i].children[0][text] = i+ ': ' + rows[i].children[0][text];
		}
		function add_field() 
		{
			document.write( '<input type="text" name="pet">' );
		};
		function addRow()
		{
		tabBody=document.getElementById("inputtable");
		input=document.createElement("textarea");
		input.name = "post";
		input.maxLength = "5000";
		input.cols = "120";
		input.rows = "3";
		tabBody.appendChild(input);
		button=document.createElement("button");
		button.name="submit";
		button.innerHTML="POST"
		button.type="submit";
		tabBody.appendChild(button);
		}
	</script>
		<div id=qestion>
		<?php
	
			$f=mysql_query("select * from `fact` where `s.no`='$sno'");
			$co=mysql_num_rows($f);
			if($co >= 1)
			{
				while($re=mysql_fetch_array($f))
				{
					$q=$re['question'];
					
		
		?>
		<table border="0">
		
		<legend style="color:darkblue;padding:2px;"><?php echo $re['question']?></legend>
				<?php
					$re=mysql_query("select * from `answerfact` where `question`='$q'");
					$cou=mysql_num_rows($re);
					if($cou >= 1)
					{
						while($fe=mysql_fetch_array($re))
						{
							$flag=$fe['flag'];
							
				?>
				<?php
				if($flag == 0)
				{
				?>
				<tr><td><span style="color:darkorchid;"><?php echo $fe['ID'] ?></span><br><?php echo $fe['answer'];?></td></tr><?php }
				else{
				?>
				<tr><td><span style="color:green;"><?php echo $fe['ID'] ?></span><br><p style="color:deeppink;font-size:20px"><?php echo $fe['answer']?></p></td></tr>
				
				<?php
				}
				}
				}
				}
				}
				
				?>
				
		</table>
	<?php
			if(isset($_POST['post']))
			{
				$post=mysql_real_escape_string($_POST['post']);
				if(isset($_SESSION['flogin']))
				{
				
				$re=mysql_query("insert into `answerfact` (`question`,`ID`,`answer`,`flag`) VALUES ('$q','$id','$post','1')");
			}
			else{
			$re=mysql_query("insert into `answerfact` (`question`,`ID`,`answer`) VALUES ('$q','$id','$post')");
			
			}
				
			}
		?>

	<form name="" action="" method="POST">
	
			<div id="inputtable"></div><br/>
			<input type="button" style="
			background:-webkit-linear-gradient(top, rgba(254,193,81,1) 0%,rgba(254,231,154,1) 100%);
			border-radius: 15px;
			box-shadow: 0 1px 0 rgba(255,255,255,0.8) inset;
			border: 1px solid #D69E31;
			color: #85592e;
			font-size:10px;
			cursor: pointer;
			float: left;
			font: bold 12px Helvetica, Arial, sans-serif;
			height: 25px;

			position: relative;	
			text-shadow: 0px 1px 0px rgba(255, 255, 255, 0.5);
			width: 125px;
			align:left;
			float:left;
			button:hover {
			background: lightsalmon;
			}
			"
			value="Post A Answer" onclick="addRow();" /><br/>
</form>

</div>
</div>

	 
        <div class="footer-top">
            
        </div>

        <div class="footer-bottom"  style="padding-bottom:0">
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
}

?>