<?php 
  if(!isset($_SESSION)){
    session_start();
  }
  if(isset($_SESSION['token']) && isset($_SESSION['login_status']) && $_SESSION['login_status']==true){

  }else{
      // remove all session variables
      session_unset(); 
      // destroy the session 
      session_destroy();
      header("Location: ../index.php");
  }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Ebullience 2K18</title>

	<meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1, minimum-scale=1">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="theme-color" content="#030710">

    <meta name="description" content="NIET Zonal Techfest Website">
    
    <meta name="keywords" content="NIET, Zonal, Techfest, Ebullience, 2018, AKTU, Jagdish, Ashish">
    
    <meta name="author" content="Jagdish Singh, Ashish Gupta">

    <link rel="stylesheet" type="text/css" href="../css/style.css">

    <link rel="stylesheet" type="text/css" href="../css/style-extended.css">

  <script>
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
	</script>
</head>

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

	<div class="last" style="background-color: #030710; height: 100%; width: 100%;position:absolute;z-index:-5">
		<canvas id="waves"></canvas>
	</div>

	<div id="skill" style="min-height: 100%; min-width: 100%; position: absolute;z-index: -3"></div>

	<div class="main-cont">
		 <div class="line"></div>
		<h1>ARK 2K18</h1>
		<center><div class="line_2"></div></center>
    <div class="menu-2">
      <a href="#">HOME</a>
      <a href="#">ABOUT</a>
      <a href="#">EVENTS</a>
      <a href="#">REGISTRATION</a>
      <a href="#">SCHEDULE</a>
    </div>
    <div class="navigator">
    	HOME | NAME OF STUDENT
    </div>
    <center><div class="line_2"></div></center>  
		<br>
    <div id="timer" class="timer">
          
    </div>

    <!--<button class="event-linker-one" href="#"><p>Event Category 1</p></button>-->
<div id="myCarousel2" class="carousel" data-ride="carousel" data-interval="false" data-wrap="false">
  <div class="carousel-inner">
  
  <div class="item active">
    <div class="event-cont">
      
        <button class="event-linker" type="button" data-target="#myCarousel2" data-slide-to="1">
            BUISNESS PLAN
        </button>
        <button class="event-linker" type="button" data-target="#myCarousel2" data-slide-to="2">
            BRIDGE KRITI
        </button>
        <button class="event-linker" type="button" data-target="#myCarousel2" data-slide-to="3">
            CHECK YOUR KNOWLEDGE
        </button>
        <button class="event-linker" type="button" data-target="#myCarousel2" data-slide-to="4">
            CODING CONTEST
        </button>
        <button class="event-linker" type="button" data-target="#myCarousel2" data-slide-to="5">
            DEBATE
        </button>
        <br>
        <button class="event-linker" type="button" data-target="#myCarousel2" data-slide-to="6">
            FRUGAL ENGINEERING
        </button>
        <button class="event-linker" type="button" data-target="#myCarousel2" data-slide-to="7">
            JUST A MINUTE
        </button>
        <button class="event-linker" type="button" data-target="#myCarousel2" data-slide-to="8">
            ROBO RACE
        </button>
        <button class="event-linker" type="button" data-target="#myCarousel2" data-slide-to="8">
            ROBO WAR
        </button>
        <button class="event-linker" type="button" data-target="#myCarousel2" data-slide-to="9">
            TECHNICAL POSTER
        </button>
    </div>
  </div>

  <div class="item">
    <h3>BUISNESS PLAN</h3>
    <ul>
      <li>Individual participant can take part</li>
      <li>Have to explore business ideas to run the Business.</li>
      <li>Topics will be given</li>
      <li>Means of communication will be English.</li>
      <li>Duration: 45 Minutes.</li>
      <li>The Judges decision will be final and binding to all.</li>
    </ul>
    <form action="../resources/api.php?action=event_registered&amp;id=1" method="POST">
      <input type="submit" name="submit" placeholder="Register" value="REGISTER" class="btn-sml" style="width: auto;">
    </form>
  </div>

  <div class="item">
    <h3>BRIDGE KRITI</h3>
    <ul>
      <li>Be a real builder, identify how the geometry affects the bridge design, functions and apply that knowledge to construct a model of a bridge using ice cream sticks. Bridge kriti provide a platform to young engineers to showcase their construction skills amidst several constraints. </li>

      <li>Each Team can have 2 members. Maximum two teams Design a Bridge of given specifications satisfying the stated constraints using popsicles (ice). </li>
      <li>Span length: 60-65 cm and 10 cm at both ends </li>
      <li>Height of the horizontal span: 11 cm (max.) from the ground </li>
      <li>Stick overlapping should not exceed 3 cm </li>
      <li>Crown of arch must be above horizontal span and its height should not exceed 25 cm.</li>
    </ul>
    <form action="../resources/api.php?action=event_registered&amp;id=2" method="POST">
      <input type="submit" name="submit" placeholder="Register" value="REGISTER" class="btn-sml" style="width: auto;">
    </form>
  </div>

  <div class="item">
    <h3>CHECK YOUR KNOWLEDGE</h3>

    <ul>
      <li>Questions will be of general awareness type</li>
      <li>Each college can send one team only</li>
      <li>Each team to have 2 members</li>
      <li>To answer question team will be given 10 second. </li>
      <li> Each question will carry 3 points for correct answer. </li>
      <li>For wrong answer no point will be given. No negative points will be awarded. </li>
      <li>Only ONE attempt for one question is permissible</li>
      <li> For no answer attempted, question will be passed to next team. It will be given chance to answer the question in 5 seconds and Ipoint for right answer will be awarded. </li>
      <li>There will be 5 to 10 rounds depending upon number of team participating and availability of team. </li>
      <li>The Judges decision will be final and binding to all. </li>
    </ul>

    <form action="" method="POST">
      <input type="submit" name="submit" placeholder="Register" value="REGISTER" class="btn-sml" style="width: auto;">
    </form>
  </div>

  <div class="item">
    <h3>CODING CONTEST</h3>
    <ul>
      <li></li>
    </ul>
  </div>

  <div class="item">
    
  </div>

  <div class="item">
    
  </div>

  <div class="item">
    
  </div>

</div>

</div>

    <div class="footer">
      <div class="line_3"></div>
        Designed And Developed By 

        <a class="author" target="_blank" href="https://github.com/ashigupta007"> Ashish Gupta </a>
        and
        <a class="author" target="_blank" href="https://github.com/JDchauhan"> Jagdish Singh </a>
      
      </div>

      <div class="menu">
           <a href="events.php"><button><div class="btn-text">EVENTS</div></button></a><br><br><br>
           <a href="../resources/api.php?action=logout"><button><div class="btn-text">LOGOUT</div></button></a><br><br><br>
      </div>
    </div>
</body>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

  <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
  
  <link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">  

  <script type="text/javascript" src="../js/jquery.particleground.js"></script>

  <script type="text/javascript" src="../js/sine-waves.js"></script>

  <script type="text/javascript" src="../js/main.js"></script>

</html>