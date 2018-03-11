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
     <img src="../images/biglogo.png" class="aktu">

    <h1 class="head-expanded">
    NOIDA INSTITUTE OF ENGINEERING AND TECHNOLOGY  
    </h1>

    

    <img src="../images/niet.png" class="aktu2">
    <h5 class="subhead-expanded">
      Accredited by NAAC (A Grade) CSE, ECE, ME, &amp; B.Pharm are NBA accredited 99th Rank by NIRF (2016)
    </h5>
    <h1 class="head-compressed">NIET, GR. NOIDA</h1>
    <center><div class="line_2"></div></center>

      <h3 class="head-expanded">Ebullience 2K18</h3>

      <h3 class="head-compressed">Ebullience 2K18</h3>
    <center><div class="line_2"></div></center> 
    <div class="menu-2">
        <a href="../index.php">HOME | </a>
        <a href="registrations.php">REGISTRATIONS | </a>
        <a href="login.php">Login | </a>
        <a href="forget-pwd.php">Forgot-Password | </a>
        <a href="co-ordinator-panel.php"> Console |</a>
        <a href="devpage.php">DEV PAGE  </a>
        
    </div>  
		<br>
    <div class="error" id="message">
    
    </div>
  
    <div id="timer" class="timer">
          
    </div>

    <div class="success hidden" id="message">
      Success MESSAGE
    </div>
    <!--<button class="event-linker-one" href="#"><p>Event Category 1</p></button>-->
<div id="myCarousel2" class="carousel" data-ride="carousel" data-interval="false" data-wrap="false">
  <div class="carousel-inner">
  
  <div class="item active" style="text-align: center;">
    <div class="event-cont">
      
        <button class="event-linker" type="button" data-target="#myCarousel2" data-slide-to="1">
            SCI-CHERADES<br><br>
        </button>
        <button class="event-linker" type="button" data-target="#myCarousel2" data-slide-to="2">
            INNOVATIVE PEN DOWN<br><br>
        </button>
        <button class="event-linker" type="button" data-target="#myCarousel2" data-slide-to="3">
            BEST OUT OF WASTE
        </button>
        <button class="event-linker" type="button" data-target="#myCarousel2" data-slide-to="4">
            GREETING CARD MAKING
            <br><br>
        </button>
        <button class="event-linker" type="button" data-target="#myCarousel2" data-slide-to="5">
            FIND IF YOU CAN<br><br><br>
        </button>
        <br>
        <button class="event-linker" type="button" data-target="#myCarousel2" data-slide-to="6">
            Counter strike 1.6
        </button>
        <button class="event-linker" type="button" data-target="#myCarousel2" data-slide-to="7">
            CAPTURE THE FLAG
        </button>
        <button class="event-linker" type="button" data-target="#myCarousel2" data-slide-to="8">
           <br>BLIND CODING
        </button>
        <button class="event-linker" type="button" data-target="#myCarousel2" data-slide-to="8">
            <br>ROBO WAR
        </button>
        <button class="event-linker" type="button" data-target="#myCarousel2" data-slide-to="9">
            TECHNICAL POSTER
        </button>
    </div>
  </div>

  <div class="item">
    <h3>SCI-CHERADES</h3>
    <div class="event_overview" style="height: 250px;overflow-y: scroll;">
    <ul>      
      <li style="color:rgba(24, 116, 205,1);font-weight: bolder; ">EVENT OVERVIEW</li>
      <li>The game will have 2 rounds.
      <li>Participants must come in pairs (2 participants)
      <li>Round 1: You have to pick up a chit from a box that will contain some basic science terminologies. You have the choice to decide whether who will enact and who will guess. The pair who guesses right will be proceeded to the second round.
      <li>Round 2 : This will contain a time duration of 2 mins and its again the same as round 1. Do not exceed the time limit.
      <li>Student Co-ordinator: Prashant Kumar Singh- (9415679329) | Ayushi Tiwari –(9307812257)
    </ul>
    </div>
    <center>
    <form action="registrations.php" method="POST">
      <button class="back" type="button" data-target="#myCarousel2" data-slide-to="0">&lt;</button>
      <input type="submit" name="submit" placeholder="Register" value="REGISTER" class="btn-sml" style="width: auto;">
      <button class="back" type="button" data-target="#myCarousel2" data-slide-to="2">&gt;</button>
    </form>
    </center>
  </div>

  <div class="item">
    <h3>INNOVATIVE PEN DOWN</h3>
    <div class="event_overview" style="height: 250px;overflow-y: scroll;">
    <ul>
      <li style="color:rgba(24, 116, 205,1);font-weight: bolder; ">EVENT OVERVIEW</li>
      <li>Topics: 1. What is heaven for you? 2. I want to hate___ but I can't. 3. Youth: Love or Career 4. No Expectation, no worries!! 5. Reality in the fake world
      <li>Fill the blank by place, person or anything. It's up to participant.  
      <li>World limit is 250-300 words and if it's a poem then it should not exceed 4 para. A4 size sheet required as per the registration. 
      <li>Participants must come with their respective pen.
    </ul>
    </div>
    <center>
    <form action="registrations.php" method="POST">
      <button class="back" type="button" data-target="#myCarousel2" data-slide-to="0">&lt;</button>
      <input type="submit" name="submit" placeholder="Register" value="REGISTER" class="btn-sml" style="width: auto;">
       <button class="back" type="button" data-target="#myCarousel2" data-slide-to="3">&gt;</button>
    </form>
  </center>
  </div>

  <div class="item">
    <h3>BEST OUT OF WASTE</h3>
    <div class="event_overview" style="height: 250px;overflow-y: scroll;">
    <ul>
      <li style="color:rgba(24, 116, 205,1);font-weight: bolder; ">EVENT OVERVIEW</li>
      
      <li>Time limit: 2hrs
      <li>Participants: 2-4
<li>The required waste material and stationary should be brought by participants.

<li>Wate material could be anything that would otherwise be thrown away.

<li>The material would be rejected if not found to be a waste material.

<li>No ready or semi finished material would be accepted from participant in competition.
<li>
Details:
Participants will be judged on creativity, utilization of resources, artistic composition and design, utility of product and overall presentation.

<li>NO MOBILE PHONES OR INTERNET MEANS WOULD BE ALLOWED AT THE TIME OF COMPETITION.
    </ul>
  </div>
    <center>
    <form action="registrations.php" method="POST">
      <button class="back" type="button" data-target="#myCarousel2" data-slide-to="0">&lt;</button>
      <input type="submit" name="submit" placeholder="Register" value="REGISTER" class="btn-sml" style="width: auto;">
       <button class="back" type="button" data-target="#myCarousel2" data-slide-to="4">&gt;</button>
    </form>
  </center>
  </div>

  <div class="item">
    <h3>CARD MAKING</h3>
    <div class"event_overview" style="height: 250px;overflow-y: scroll;">
    <ul>
      <li style="color:rgba(24, 116, 205,1);font-weight: bolder; ">EVENT OVERVIEW</li>
      <li>Time limit: 1hr

      <li>Participants: 2
      <li>Theme could be anything.

      <li>All stationary to be brought by participants.

      <li>Participants will be judged on creativity, utilization of resources, artistic composition and design, utility of product and overall presentation.

      <li>NO MOBILE PHONES OR INTERNET MEANS WOULD BE ALLOWED AT THE TIME OF COMPETITION.
    </ul>
  </div>
    <center>
    <form action="registrations.php" method="POST">
      <button class="back" type="button" data-target="#myCarousel2" data-slide-to="0">&lt;</button>
      <input type="submit" name="submit" placeholder="Register" value="REGISTER" class="btn-sml" style="width: auto;">
       <button class="back" type="button" data-target="#myCarousel2" data-slide-to="5">&gt;</button>
    </form>
  </center>
  </div>

  <div class="item">
    <h3>FIND IF YOU CAN</h3>
    <div class"event_overview" style="height: 250px;overflow-y: scroll;">
    <ul>
      <li style="color:rgba(24, 116, 205,1);font-weight: bolder; ">EVENT OVERVIEW</li>
      <li>Find the error if present or give the output of the code provided in C language.

<li>Code will be given.

<li> Participants will have to Dry Run as there will be no IDE.

<li> Debug the code.

<li> If there is error, give the reason and remove it.

<li> Give the output of the code.

<li> No internet access.

<li> It is not MCQ , so luck can’t be tested.

<li> Manual will be provided at the time of event.

<li>Team size - 1 member

<li>Duration – 1 hour

<li>Skills required – C language.

<li>Students coordinators

 Shamsher Alam (IT) (8860994540) | Suraj (IT) (9113730080)
    </ul>
  </div>
    <center>
    <form action="registrations.php" method="POST">
      <button class="back" type="button" data-target="#myCarousel2" data-slide-to="0">&lt;</button>
      <input type="submit" name="submit" placeholder="Register" value="REGISTER" class="btn-sml" style="width: auto;">
       <button class="back" type="button" data-target="#myCarousel2" data-slide-to="6">&gt;</button>
    </form>
  </center>
    
  </div>

  <div class="item">
      <h3>Counter strike 1.6</h3>
      <div class"event_overview" style="height: 250px;overflow-y: scroll;">
<ul>
  <li style="color:rgba(24, 116, 205,1);font-weight: bolder; ">EVENT OVERVIEW</li>
<li>A team cab be of max 4 players .
<li>Round time :2 mins  and number of rounds that each team has to play would b decided spontaneously
<li>Maps included would be
de_nuke | 
de_dust2 | 
de_inferno | 
de_aztec | 
de_train | 

<li>Banned weapons will be bullpup and creg 552 and sheild as well .
<li>Systems would be provided by the collg  and  participants are allowed to bring their headphones and mouse only .
<li>Each Team Registration Price is 200 Rupees.
<li>1st Event Winner Will Get 800 Rupees as Prize.

</ul>
  </div>
    <center>
    <form action="registrations.php" method="POST">
      <button class="back" type="button" data-target="#myCarousel2" data-slide-to="0">&lt;</button>
      <input type="submit" name="submit" placeholder="Register" value="REGISTER" class="btn-sml" style="width: auto;">
       <button class="back" type="button" data-target="#myCarousel2" data-slide-to="7">&gt;</button>
    </form>
  </center>
    
  </div>

<div class="item">

  <h3>CAPTURE THE FLAG</h3>
  <div class"event_overview" style="height: 250px;overflow-y: scroll;">
  <ul>
    <li style="color:rgba(24, 116, 205,1);font-weight: bolder; ">EVENT OVERVIEW</li>
    <li> Participants will be using a platform for the event.
    <li> Questions based on Web and Programming Will be there and Participants Need to find the flag by solving the questions.
    <li>Participant solving maximum Questions Over a fixed time will win.
    <li>Student Co-ordinator: Ashish Gupta (8527769723).
  </ul>
  </div>
<center>
<form action="registrations.php" method="POST">
  <button class="back" type="button" data-target="#myCarousel2" data-slide-to="0">&lt;</button>
  <input type="submit" name="submit" placeholder="Register" value="REGISTER" class="btn-sml" style="width: auto;">
   <button class="back" type="button" data-target="#myCarousel2" data-slide-to="8">&gt;</button>
</form>
</center>

</div>


<div class="item">
  <h3>BLIND CODING</h3>
  <div class"event_overview" style="height: 250px;overflow-y: scroll;">
  <ul>
    <li style="color:rgba(24, 116, 205,1);font-weight: bolder; ">EVENT OVERVIEW</li>
    <li>Individual Event
    <li>The compiler provided will be TURBO C
    <li>Consists of two rounds
    <li>The Judges decision is final
    <li>Participants have to correct the errors on paper and type the code with MONITOR SWITCHED OFF
  </ul>
  </div>
<center>
<form action="registrations.php" method="POST">
  <button class="back" type="button" data-target="#myCarousel2" data-slide-to="0">&lt;</button>
  <input type="submit" name="submit" placeholder="Register" value="REGISTER" class="btn-sml" style="width: auto;">
   <button class="back" type="button" data-target="#myCarousel2" data-slide-to="9">&gt;</button>
</form>
</center>

</div>


  <div class="item">
      <h3>ROBO WAR</h3>
      <div class"event_overview" style="height: 250px;overflow-y: scroll;">
      <ul>
<li style="color:rgba(24, 116, 205,1);font-weight: bolder; ">EVENT OVERVIEW</li>
<li> Design and construct a remote controlled robot capable of fighting a one on one tournament.
<li>A robot is declared victorious if its opponent is immobilized.
<li>A robot will be declared immobile if it cannot display linear motion of at least one inch in a timed
period of 30 seconds. A bot with one side of its drive train disabled will not be counted out if it can
demonstrate some degree of controlled movement. In case both the robots remain mobile after the end
of the round then the winner will be decided subjectively.
 <li>A robot that is deemed unsafe by the judges after the match has begun will be disqualified and therefore
declared the loser. The match will be immediately halted and the opponent will be awarded a win.
<li>If a robot is thrown out of the arena the match will stop immediately and the robot still inside the arena
will automatically be declared as the winner.
 <li>Robots cannot win by pinning or lifting their opponents. Organizers will allow pinning or lifting for a
maximum of 20 seconds per pin/lift then the attacker robot will be instructed to release the opponent. If,
after being instructed to do so, the attacker is able to release but does not, their robot may be
disqualified. 
<li>If two or more robots become entangled or a crushing or gripping weapon is employed and
becomes trapped within another robot, then the competitors should make the time keeper aware, the
fight should be stopped and the robots separated by the safest means.
The Judges decision will be final and binding to all.
      </ul>
  </div>
    <center>
    <form action="registrations.php" method="POST">
      <button class="back" type="button" data-target="#myCarousel2" data-slide-to="0">&lt;</button>
      <input type="submit" name="submit" placeholder="Register" value="REGISTER" class="btn-sml" style="width: auto;">
       <button class="back" type="button" data-target="#myCarousel2" data-slide-to="1">&gt;</button>
    </form>
  </center>
    
  </div>

  <div class="item">
        <h3> TECHNICAL POSTER</h3>
        <div class"event_overview" style="height: 250px;overflow-y: scroll;">
        <ul>
<li style="color:rgba(24, 116, 205,1);font-weight: bolder; ">EVENT OVERVIEW</li>
<li>Participation can be as an individual or in a group of 2.
Is Each poster should include a topic/title across the top.
<li>The font Size should be at last 18 point, in bold printing to be seen easily.
<li>The poster must NOT be a commercial/product sales poster.
<li>Any poster that is deemed to be a commercial advertisement will be disqualified.
<li>Participants will have to explain their concept to the judge in the end.
<li>Is Use of tapes, adhesives and scissors are allowed.
<li> No participant would be allowed to bring any other item other than to be used for drawing.
<li> There will be a bell after 45 minutes indicating the participant or group to wind up the work.
<li> The poster base would be provided to you of standard chart paper size.
<li> Name of participants should be mentioned . No copying material would be allowed.
<li> Using cell phone other than call receiving, will disqualify the participant.
<li>The Judges decision will be final and binding to all.</ul>

  </div>
    <center>
    <form action="registrations.php" method="POST">
      <button class="back" type="button" data-target="#myCarousel2" data-slide-to="0">&lt;</button>
      <input type="submit" name="submit" placeholder="Register" value="REGISTER" class="btn-sml" style="width: auto;">
       <button class="back" type="button" data-target="#myCarousel2" data-slide-to="1">&gt;</button>
    </form>
  </center>
    
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
           <a href="../index.php"><button><div class="btn-text">HOME</div></button></a><br><br><br>
           <a href="registrations.php"><button><div class="btn-text">REGISTRATIONS</div></button></a><br><br><br>
           <a href="login.php"><button><div class="btn-text">LOGIN</div></button></a><br><br><br>
           <a href="forget-pwd.php"><button><div class="btn-text" style="font-size: 13px">FORGOT-PASSWORD</div></button></a><br><br><br>
           <a href="co-ordinator-panel.php"><button><div class="btn-text">CONSOLE</div></button></a><br><br><br>
           <a href="devpage.php"><button><div class="btn-text">DEV PAGE</div></button></a><br><br><br>
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