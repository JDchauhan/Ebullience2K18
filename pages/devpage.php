<?php
	if(!isset($_REQUEST["session"])){
		if(!isset($_SESSION)){
			session_start();
		}
	}else{
		if(!isset($_SESSION)){
			session_start(array($_REQUEST["session"]));
		}
	}
	$session_get = session_id();	
?>

<!DOCTYPE html>
<html>
<head>
	<title>AKTU Zonal Fest 2K18</title>

	<meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1, minimum-scale=1">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="description" content="NIET Zonal Techfest Website">
    
    <meta name="keywords" content="NIET, Zonal, Techfest, Ebullience, 2018, AKTU, Jagdish, Ashish">
    
    <meta name="author" content="Jagdish Singh, Ashish Gupta">

    <meta name="theme-color" content="#030710">

    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/style-extended.css">
	<!--<script>
		var countDownDate = new Date("Mar 22, 2018 09:30:00").getTime();
		var x = setInterval(function() {
  		var now = new Date().getTime();
  		var distance = countDownDate - now;
		var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  		var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  		var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  		var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  		document.getElementById("timer").innerHTML = days + "  days   " + hours + " hours "
  		+ minutes + " mins " + seconds + " secs ";
  		if (distance < 0) {
    	clearInterval(x);
    	document.getElementById("timer").innerHTML = "Get Set Go For The TechFest";
  		}
		}, 1000);
	</script>-->
  <style type="text/css">
    #timer
    {
      display: none !important;
    }
    @media screen and (max-width: 768px)
    {
      #timer
      {
        display: block !important;
      }
    }
  </style>
<body>
	<div id="overlayer">
		<div class='triangles'>
      		<div class='tri invert'></div>
      		<div class='tri invert'></div>
      		<div class='tri'></div>
      		<div class='tri invert'></div>
      		<div class='tri invert'></div>
      		<div class='tri'></div>
      		<div class='tri invert'></div>
      		<div class='tri'></div>
      		<div class='tri invert'></div>
    	</div>
	</div>

	<div class="last" style="background-color: #030710; height: 100%; width: 100%;position:absolute;z-index: -5">
		<!-- <div class="arc_reactor">
		
			<img src="images/1.png" class="one arc">
			<img src="images/2.png" class="two arc">
			<img src="images/3.png" class="three arc">
			<img src="images/4.png" class="four arc">
			<img src="images/5.png" class="five arc">
			<img src="images/6.png" class="six arc">
			<img src="images/8.png" class="seven arc">
			<img src="images/9.png" class="eight arc">
			<img src="images/10.png" class="nine arc">
		
		</div> -->

    	<canvas id="waves"></canvas>

	</div>
	<div id="skill" style="min-height: 100%; min-width: 100%; position: absolute;z-index: -3"></div>

	<div class="main-cont">
		 <div class="line"></div>
		<h1>
    DEVELOPER'S PAGE 
    </h1>
		<center><div class="line_2"></div></center>
    <h4>WE TURN COFFEE INTO CODE</h4>
    <center><div class="line_2"></div></center> 
      <div class="menu-2">
        <a href="../index.php">HOME | </a>
        <a href="events.php">EVENTS | </a>
        <a href="registrations.php">REGISTRATIONS | </a>
        <a href="co-ordinator-panel.php">CONSOLE</a>
    </div>
		<br>
    <div class="error" id="message">
    
    </div>
  
   <div id="timer" class="timer">
          
    </div>
    <div class="success hidden" id="message">
      Success MESSAGE
    </div>
    <div class="col-sm-12 dev-cont">
     <div class="row">
       <div class="col-sm-6">
        <div  class="content">
         <img src="../images/jagga.jpg" class="prof-pic"><br><br>
         <center><div class="line" style="width: 50%;"></div></center>
         <h4>JAGDISH SINGH</h4>
         Student of NIET 3rd Year (IT)
         <center><div class="line" style="width: 50%;"></div></center>
         <p style="color: #458B00">" THE BACKEND'S MIND "</p>
        <div class="social-links">
         <a target="_blank" href="https://github.com/JDchauhan"><i class="fab fa-github fa-2x"></i></a>
         <a target="_blank" href="https://www.facebook.com/JDchauhan97"><i class="fab fa-facebook-square fa-2x"></i></a>
         <a target="_blank" href="https://www.instagram.com/jdchauhan97"><i class="fab fa-instagram fa-2x"></i></a>
         <a target="_blank" href="https://www.linkedin.com/in/jdchauhan"><i class="fab fa-linkedin fa-2x"></i></a>
         <a target="_blank" href="https://www.twitter.com/jdchauhan97/"><i class="fab fa-twitter-square fa-2x"></i></a>
         <a target="_blank" href="https://t.me/JDchauhan"><i class="fab fa-telegram fa-2x"></i></a>
        </div>
        <a target="_blank" href="https://mail.google.com/mail/?view=cm&amp;fs=1&amp;to=jagdish.chauhan01.com" >
          <button class="btn-sml" style="width: auto;color:black;" >
          HIRE AS AN INTERN
          </button>
        </a>
      </div>
       </div>
       <div class="col-sm-6">
        <div class="content-2">
         <img src="../images/ashish.jpg" class="prof-pic">
         <br><br>
         <center><div class="line" style="width: 50%;"></div></center>
         <h4>ASHISH GUPTA</h4>
         Student of NIET 3rd Year (CSE)
         <center><div class="line" style="width: 50%;"></div></center>
         <p style="color: #458B00">" THE FRONTEND'S SOUL "</p>
         <div class="social-links">
         <a target="_blank" href="https://github.com/ashigupta007"><i class="fab fa-github fa-2x"></i></a>
         <a target="_blank" href="https://www.facebook.com/Ashugupta007"><i class="fab fa-facebook-square fa-2x"></i></a>
         <a target="_blank" href="https://www.instagram.com/mr_ashish__"><i class="fab fa-instagram fa-2x"></i></a>
         <a target="_blank" href="https://www.linkedin.com/in/https://www.linkedin.com/in/ashish-gupta-aa32bb129"><i class="fab fa-linkedin fa-2x"></i></a>
         <a target="_blank" href="https://www.twitter.com/AshishG31444945/"><i class="fab fa-twitter-square fa-2x"></i></a>
         <a target="_blank" href="https://t.me/Akgupta007"><i class="fab fa-telegram fa-2x"></i></a>
        </div>
        <a target="_blank" href="https://mail.google.com/mail/?view=cm&amp;fs=1&amp;to=love4css@gmail.com" >
          <button class="btn-sml" style="width: auto;color:black;" >
          HIRE AS AN INTERN
          </button>
        </a>
      </div>
       </div>
     </div>
    </div>

    <div class="menu">
           <a href="../index.php"><button><div class="btn-text">HOME</div></button></a><br><br><br>
           <a href="events.php"><button><div class="btn-text">EVENTS</div></button></a><br><br><br>
           <a href="registrations.php"><button><div class="btn-text">REGISTRATIONS</div></button></a><br><br><br>
           <a href="co-ordinator-panel.php"><button><div class="btn-text">CONSOLE</div></button></a><br><br><br>
      </div>

	</div>

</body>
	  <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">

    <script type="text/javascript" src="../js/jquery.particleground.js"></script>

    <script type="text/javascript" src="../js/sine-waves.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">

    <script type="text/javascript" src="../js/main.js"></script>

	<script>
		$(window).on('load',(function() {
  		$("#overlayer").delay(2000).fadeOut("slow");
		}));
	</script>

 
</html>
