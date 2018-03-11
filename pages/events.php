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

      <h3 class="head-expanded">Dr. APJ ABDUL KALAM TECHNICAL UNIVERSITY</h3>

      <h3 class="head-compressed">AKTU ZONAL FEST</h3>
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
            BUSINESS PLAN<br><br>
        </button>
        <button class="event-linker" type="button" data-target="#myCarousel2" data-slide-to="2">
            BRIDGE KRITI<br><br>
        </button>
        <button class="event-linker" type="button" data-target="#myCarousel2" data-slide-to="3">
            CHECK YOUR KNOWLEDGE
        </button>
        <button class="event-linker" type="button" data-target="#myCarousel2" data-slide-to="4">
            CODING CONTEST
            <br><br>
        </button>
        <button class="event-linker" type="button" data-target="#myCarousel2" data-slide-to="5">
            DEBATE<br><br><br>
        </button>
        <br>
        <button class="event-linker" type="button" data-target="#myCarousel2" data-slide-to="6">
            FRUGAL ENGINEERING
        </button>
        <button class="event-linker" type="button" data-target="#myCarousel2" data-slide-to="7">
            JUST A MINUTE
        </button>
        <button class="event-linker" type="button" data-target="#myCarousel2" data-slide-to="8">
           <br> ROBO RACE
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
    <h3>BUSINESS PLAN</h3>
    <div class"event_overview" style="height: 250px;overflow-y: scroll;">
    <ul>      
      <li style="color:rgba(24, 116, 205,1);font-weight: bolder; ">EVENT OVERVIEW</li>
      <li>Individual participant can take part</li>
      <li>Have to explore business ideas to run the Business.</li>
      <li>Topics will be given</li>
      <li>Means of communication will be English.</li>
      <li>Duration: 45 Minutes.</li>
      <li>The Judges decision will be final and binding to all.</li>
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
    <h3>BRIDGE KRITI</h3>
    <div class"event_overview" style="height: 250px;overflow-y: scroll;">
    <ul>
      <li style="color:rgba(24, 116, 205,1);font-weight: bolder; ">EVENT OVERVIEW</li>
      <li>Be a real builder, identify how the geometry affects the bridge design, functions and apply that knowledge to construct a model of a bridge using ice cream sticks. Bridge kriti provide a platform to young engineers to showcase their construction skills amidst several constraints. </li>

      <li>Each Team can have 2 members. Maximum two teams Design a Bridge of given specifications satisfying the stated constraints using popsicles (ice). </li>
      <li>Span length: 60-65 cm and 10 cm at both ends </li>
      <li>Height of the horizontal span: 11 cm (max.) from the ground </li>
      <li>Stick overlapping should not exceed 3 cm </li>
      <li>Crown of arch must be above horizontal span and its height should not exceed 25 cm.</li>
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
    <h3>CHECK YOUR KNOWLEDGE</h3>
    <div class"event_overview" style="height: 250px;overflow-y: scroll;">
    <ul>
      <li style="color:rgba(24, 116, 205,1);font-weight: bolder; ">EVENT OVERVIEW</li>
      <li>Questions will be of general awareness type</li>
      <li>Each college can send one team only</li>
      <li>Each team to have 2 members</li>
      <li>To answer question team will be given 10 second. </li>
      <li> Each question will carry 3 points for correct answer. </li>
      <li>For wrong answer no point will be given. No negative points will be awarded. </li>
      <li>Only ONE attempt for one question is permissible</li>
      <li> For no answer attempted, question will be passed to next team. It will be given chance to answer the question in 5 seconds and  4 point for right answer will be awarded. </li>
      <li>There will be 5 to 10 rounds depending upon number of team participating and availability of team. </li>
      <li>The Judges decision will be final and binding to all. </li>
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
    <h3>CODING CONTEST</h3>
    <div class"event_overview" style="height: 250px;overflow-y: scroll;">
    <ul>
      <li style="color:rgba(24, 116, 205,1);font-weight: bolder; ">EVENT OVERVIEW</li>
      <li>There will be two rounds in the contest</li>

      <li>Round A:</li>

      <li>Each team would be given 5 problems.</li>

      <li>The participants need to code the given problems in C/C++ statements.</li>

      <li>Duration: 45 Minutes.</li>

      <li>Round B:</li>

      <li>Each team would be given 5 problems.</li>

      <li>The participants need to code the given problems in JAVA/.NET statements.</li>
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
    <h3>DEBATE (ENGLISH AND HINDI)</h3>
    <div class"event_overview" style="height: 250px;overflow-y: scroll;">
    <ul>
      <li style="color:rgba(24, 116, 205,1);font-weight: bolder; ">EVENT OVERVIEW</li>
<li>No. of Participant — Individual Participation (Either Male or Female).</li>

<li>Topic for the debate will be given on day of the event .</li>

<li>Participation: (either "for" or "against" the given topic to be decided by lot on the given date)</li>

<li>Each participant shall be given 3 minutes to speak on the given topic and 5 minute shall be given to
answer the audience / judges questions /interjections.</li>

<li>Judging Criteria; (i) Content coverage - 5 marks; (ii) Debating skills shown - 10 marks; (iii)Convenience argument skills - 5 marks.</li>
<li>The Judges decision will be final and binding to all.</li>
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
      <h3>FRUGAL ENGINEERING</h3>
      <div class"event_overview" style="height: 250px;overflow-y: scroll;">
<ul>
  <li style="color:rgba(24, 116, 205,1);font-weight: bolder; ">EVENT OVERVIEW</li>
<li>Participation can be as individual or group containing not more than 2 members.
<li>Item to be made can be of any nature, may be civil, mechanical,electrical etc. or of general use.
<li>Scrap material has to be brought by group itself.
<li>Materials to decorate and customize should be made out of the scrap provided.
<li>Use of colours or any other decorative items are prohibited.
<li>Participants need to bring adhesives, tapes, scissors and cutting tools themselves.
<li>Participants would be given 1 hour to make something useful.
<li>After 45 minutes there will be a bell indicating that only 15 minutes are left.
<li>Participants need to explain the concepts of what they have made.
<li>The Judges decision will be final and binding to all.

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

  <h3>JUST A MINUTE</h3>
  <div class"event_overview" style="height: 250px;overflow-y: scroll;">
  <ul>
    <li style="color:rgba(24, 116, 205,1);font-weight: bolder; ">EVENT OVERVIEW</li>
<li>Participation can be only as an individual.
<li>Each participant will be given 3 minutes to speak extempore on a theme picked up by him/her by draw
of lots.
<li>Total duration would include 1 minute thinking time and 2 minute presentation time.
<li>The language of speech should be English only.
<li>A bell would be sounded after 1 minute indicting the speaker to conclude his/her speech and next
speaker to come up.
<li>Use of Hindi or any offensive words is strictly prohibited.
<li>Each speaker will be judged on his/her Content, appropriateness of Language, delivery and diction.
<li>The Judges decision will be final and binding to all.
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
  <h3>ROBO RACE</h3>
  <div class"event_overview" style="height: 250px;overflow-y: scroll;">
  <ul>
    <li style="color:rgba(24, 116, 205,1);font-weight: bolder; ">EVENT OVERVIEW</li>
<li>Design a manually controlled ROBOT that has capacity to cover maximum distance in shortest
possible time, challenging the hurdles and be one of the best opponents. <li>The maximum dimension of
the robot can be 35 x 35 cm (I x b).
<li>The robot may be wired or wireless.
<li>The length of the wire (for wired hots) should be long enough to cover the whole track and wire should
remain slack during the complete run.
<li>Max weight must not exceed 6 kg.
<li>The power supply will be provided maximum up to 12Volt.
<li>Ready made toys car are not allowed.
<li>This is a racing event, so fastest and most balanced robot will win.
<li>Each team can have maximum four (4) members.
<li>Each member of the team must contain the identity card of the Institute.
<li>The robot should not damage the arena.
<li>The robot must not leave behind any of its parts during the run; else it will result in disqualification.
<li>Unethical behavior could lead to disqualification
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