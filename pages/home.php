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

  if(isset($_SESSION['token']) && isset($_SESSION['login_status']) && $_SESSION['login_status']==true){

  }else{
      // remove all session variables
      session_unset(); 
      // destroy the session 
      session_destroy();
      header("Location: ../");
  }

//checking event registrations
  $i = 0;
  for($j = 0; $j < 31; $j++){
    $next = $j + 2;
    if($j == 24){
      $j = 25;
      $next = 27;
    }
    if($next == 25){
      $next = 27;
    }
    if($j == 30){
      $next = 1;
    }
    
    if(!(isset($_SESSION["event_participated"]) && $_SESSION["event_participated"][$j] == 1 )){
      $form_data[$j] = '<center><form action="../resources/api.php?action=event_registered&amp;id=' . ($j + 1) . '&amp;session=' .  $session_get . ' " method="POST">
                          <button class="back" type="button" data-target="#myCarousel2" data-slide-to="0">&lt;</button>
                          <input type="submit" name="submit" placeholder="Register" value="REGISTER" class="btn-sml" style="width: auto;">
                          <button class="back" type="button" data-target="#myCarousel2" data-slide-to="' . $next . '">&gt;</button>
                        </form></center>'  ;  
    } else{
      $form_data[$j] = '<center><form action="../resources/api.php?action=event_unregistered&amp;id=' . ($j + 1) . '&amp;session=' .  $session_get . ' " method="POST">
                          <button class="back" type="button" data-target="#myCarousel2" data-slide-to="0">&lt;</button>
                          <input type="submit" name="submit" placeholder="Unregister" value="UNREGISTER" class="btn-sml" style="width: auto;">
                          <button class="back" type="button" data-target="#myCarousel2" data-slide-to="' . $next . '">&gt;</button>
                        </form></center>'   ; 
    }
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
        <a href="../">HOME | </a>
        <a href="events.php">EVENTS | </a>
        <a href="devpage.php">DEV PAGE </a>
    </div>
    <div class="navigator">
    	HOME | <?php echo ucwords($_SESSION["name"]); ?>
    </div>
    <center><div class="line_2"></div></center>  
		<br>
    <div class="error" id="message">
    
    </div>
  
    <div id="timer" class="timer">
          
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
            AGAR ART<br><br>
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
        <button class="event-linker" type="button" data-target="#myCarousel2" data-slide-to="9">
            <br>CHEM-WAR
        </button>
        <button class="event-linker" type="button" data-target="#myCarousel2" data-slide-to="10">
            TIME GAME
        </button>
        <button class="event-linker" type="button" data-target="#myCarousel2" data-slide-to="11">
            THE MIND FIZZ
        </button>

        <button class="event-linker" type="button" data-target="#myCarousel2" data-slide-to="12">
            SCIENCE BREAKER
        </button>

        <button class="event-linker" type="button" data-target="#myCarousel2" data-slide-to="13">
            RoboTag
        </button>

        <button class="event-linker" type="button" data-target="#myCarousel2" data-slide-to="14">
            CAD Modelling
        </button>

        <button class="event-linker" type="button" data-target="#myCarousel2" data-slide-to="15">
            ROBO RACE
        </button>

        <button class="event-linker" type="button" data-target="#myCarousel2" data-slide-to="16">
            ROBO SOCCER
        </button>

        <button class="event-linker" type="button" data-target="#myCarousel2" data-slide-to="17">
            Water Rocketry 
        </button>

        <button class="event-linker" type="button" data-target="#myCarousel2" data-slide-to="18">
            VISION
        </button>

        <button class="event-linker" type="button" data-target="#myCarousel2" data-slide-to="19">
            PPDT
        </button>

        <button class="event-linker" type="button" data-target="#myCarousel2" data-slide-to="20">
          TECH APTI
        </button>

        <button class="event-linker" type="button" data-target="#myCarousel2" data-slide-to="21">
          PRASHNA BAAN
        </button>

        <button class="event-linker" type="button" data-target="#myCarousel2" data-slide-to="22">
           MODEL MANIA
        </button>

        <button class="event-linker" type="button" data-target="#myCarousel2" data-slide-to="23">
           KARYANEETI
        </button>

        <button class="event-linker" type="button" data-target="#myCarousel2" data-slide-to="24">
        STUBBORN IDEAS
        </button>

        <button class="event-linker" type="button" data-target="#myCarousel2" data-slide-to="27">
           3-D MACHINE MODEL
        </button>

        <button class="event-linker" type="button" data-target="#myCarousel2" data-slide-to="28">
           ELECTRIC COLLAGE
        </button>
        
        <button class="event-linker" type="button" data-target="#myCarousel2" data-slide-to="29">
          POETRY SLAM
        </button>

        <button class="event-linker" type="button" data-target="#myCarousel2" data-slide-to="30">
           BIO-TREASURE HUNT
        </button>

        <button class="event-linker" type="button" data-target="#myCarousel2" data-slide-to="31">
          GREEN CANVAS
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
      <li>Student Co-ordinator: Prerit (8077974510)
      <li>Date : 22-03-2018, Time : 1:00 PM

    </ul>
    </div>
    <?php
      echo $form_data[$i];
      $i++;
    ?>
  </div>

  <div class="item">
  <h3>Agar Art</h3>
    <div class="event_overview" style="height: 250px;overflow-y: scroll;">
    <ul>
      <li style="color:rgba(24, 116, 205,1);font-weight: bolder; ">EVENT OVERVIEW</li>
      <li> Team of two members.  
      <li> They will have to make any theme based art on the petri plate using different colours. 
      <li> Date : 23-08-18, Time : 1:00 PM  
      
      <li>Student Co-ordinator: Prerit (8077974510) | Aritri Sarkar</ul>
    </div>
    <?php
      echo $form_data[$i];
      $i++;
    ?>
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
    
<li>Date : 23-03-18, Time : 1:00 PM
    </ul>
  </div>
    
    <?php
      echo $form_data[$i];
      $i++;
    ?>
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

      <li>Date : 22-03-18, Time : 2:00 PM
        </ul>
  </div>
    <?php
      echo $form_data[$i];
      $i++;
    ?>
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
    
<li>Date : 24-03-18, Time : 10:00 AM
    </ul>
  </div>
      <?php
      echo $form_data[$i];
      $i++;
    ?>
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

<li>Banned weapons will be bullpup and creg 552 and sheild as well .
<li>Systems would be provided by the college  and  participants are allowed to bring their headphones and mouse only .
<li>Student Co-ordinator: Karan Khera (9971909521).
<li>Date : 23-03-18, Time : 10:00 AM 

</ul>
  </div>
      <?php
      echo $form_data[$i];
      $i++;
    ?>
  </div>


  <div class="item">
  <h3>CAPTURE THE FLAG</h3>
  <div class"event_overview" style="height: 250px;overflow-y: scroll;">
  <ul>
    <li style="color:rgba(2 4, 116, 205,1);font-weight: bolder; ">EVENT OVERVIEW</li>
    <li> Participants will be using a platform for the event.
    <li> Questions based on Web and Programming Will be there and Participants Need to find the flag by solving the questions.
    <li>Participant solving maximum Questions Over a fixed time will win.
    <li>Student Co-ordinator: Ashish Gupta (8527769723).
    <li>Date : 24-03-18, Time : 12:30 PM

  </ul>
  </div>  <?php
      echo $form_data[$i];
      $i++;
    ?>
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
    <li>Student Co-ordinator: Ashish Gupta (8527769723).
    <li>Date : 23-03-18, Time : 1:30 PM
</ul>
  </div>
    <?php
      echo $form_data[$i];
      $i++;
    ?>
  </div>


  <div class="item">
  <h3>Chem-War</h3>
      <div class"event_overview" style="height: 250px;overflow-y: scroll;">
      <ul>
        <li style="color:rgba(24, 116, 205,1);font-weight: bolder; ">EVENT OVERVIEW</li>
        <li>Chemwars is a event that combines strategy with knowledge. It requires you to merge practical thinking and decision making with theoretical knowledge of chemistry.

<li>1st round -
Elementary round consisting of 20 questions that will be judged. Maximum scoring team will go to next round. 

<li>2nd round -

<li>It will be a fun interactive round.

"Beat the time be the winner"

<li>Use of cell phones and other electronic gadgets is not permitted unless if a powerup involving them are chosen.

<li>Teams will lose points if the answer is not given in the allotted time frame(time-keeper will be present)

   <li>The Team should have only 2 participants.
   <li>Venue :- 001 B 

    <li>Coordinators: 
    Shubhangi Verma 8299290730 | Anu Sharma

<li>Date : 23-03-18, Time : 2:00 PM
      </ul>
  </div>
    <?php
      echo $form_data[$i];
      $i++;
    ?>
  </div>


  <div class="item">
  <h3> Time Game </h3>
        <div class="event_overview" style="height: 250px;overflow-y: scroll;">
        <ul>
<li style="color:rgba(24, 116, 205,1);font-weight: bolder; ">EVENT OVERVIEW</li>
<li>Time game is a event all about how fast you can beat the clock. 

<li>
We will give one Task to each team. The task should be completed within a given time. 

<li>Task :- You have to find 10 Chemical Component's formula within given time from the bowl.
The team have to be fast and accurate to be the Winner 

<li>Use of cell phones and other electronic gadgets is not permitted unless if a powerup involving them are chosen.

<li>Correct answer and time, both factors will be counted to declare the winner. 

<li>The Team should have only 2 participants.
Venue :- 001 B

<li>Coordinators : 

Aman Varshney  9811823830 |

Aditya Gupta 7011615837

<li>Date: 23-03-18, Time : 11:30 AM

</ul>

  </div>
    <?php
      echo $form_data[$i];
      $i++;
    ?>
  </div>


  <div class="item">
  <h3> THE MIND FIZZ </h3>
        <div class="event_overview" style="height: 250px;overflow-y: scroll;">
        <ul>
<li style="color:rgba(24, 116, 205,1);font-weight: bolder; ">EVENT OVERVIEW</li>

<li>Team Size: 2 or 3

<li>There are 3 rounds

<li>ROUND 1: (Brain Teaser)

In this round Questions will be asked related to common sense, puzzles and riddles.

<li>All 3 members can contribute and solve questions.

<li>ROUND 2: (Let Me Know )

In this round Questions will be asked related to music, songs, dialogues and movie names.

Only 2 members can contribute in this round

<li>ROUND 3: (Can You See Me)

In this round some Fun Game will be conducted between the participants.

All 3 members can contribute in this round

<li>STUDENT COORDINATORS : 
 MOHAMMAD FAHAD (9639647747) | HIMANSHU SAHRAWAT (7906666056)
 <li> Time : 12:30 PM, 22 March 2018


</ul>

  </div>
    <?php
      echo $form_data[$i];
      $i++;
    ?>
  </div>


  <div class="item">
  <h3> SCIENCE BREAKER </h3>
        <div class="event_overview" style="height: 250px;overflow-y: scroll;">
        <ul>
<li style="color:rgba(24, 116, 205,1);font-weight: bolder; ">EVENT OVERVIEW</li>

<li>Team Size: 2 or 3

<li>ROUND 1: (General Tech Quiz)

In the First Round of this Event, A test will be conducted which consists of General Technical Question based on First Year knowledge. Questions are of Objective type and some Fill in the Blanks type.

<li>ROUND 2: (Think and Create a Model)

For the Second Round Participants brings their own material and Design any Working as well as Non-Working Model during the event timing, based on the given Themes and Give proper Explanation to the Judges.

<li>THEMES FOR SECOND ROUND<br>

A-Renewable Energy<br>

B-Electricity<br>

C-Scientific Law<br>

D-Latest Technology<br>

E-Others (make your own idea)<br>


<li>Present your model which shows your theme.

<li>The decision of Judges will be Final.

<li>Any Argument or Misbehavior with Coordinators and Judges will lead to Disqualify the Team.

<li>STUDENTS COORDINATOR : SHABAN (8826105538) | PRAGYA SHIVHARE

<li> Date : 24-03-18, Time : 11:00 AM

</ul>

  </div>
    <?php
      echo $form_data[$i];
      $i++;
    ?>
  </div>


  <div class="item">
  <h3> RoboTag </h3>
        <div class="event_overview" style="height: 250px;overflow-y: scroll;">
        <ul>
<li style="color:rgba(24, 116, 205,1);font-weight: bolder; ">EVENT OVERVIEW</li>

	<li>In this competition the participants have to bring their bot which is capable to lift a cube of 3.5*3.5*3.5 cm from random places to destined location. The team which scores the most will be the winner.
	<li>Participants should carry their I-cards.
	<li>Weight limit of bot -6kg.
	<li>Dimensions -35cm*35cm*35cm.
	<li>Voltage supply –up to 12 volts.
	<li>Bot can be wired or wireless.
	<li>No weapon should be there on bot.
	<li>Electricity supply of 220volts,50hz will be provided, participants should carry their own adaptors.
	 Misbehaviour of participants will lead to disqualification from competition.

</ul>

  </div>
    <?php
      echo $form_data[$i];
      $i++;
    ?>
  </div>


  <div class="item">
  <h3> CAD MODELLING </h3>
        <div class="event_overview" style="height: 250px;overflow-y: scroll;">
        <ul>
<li style="color:rgba(24, 116, 205,1);font-weight: bolder; ">EVENT OVERVIEW</li>

	<li>This event is to test the drafting and designing skills of the engineering students. In this event there are two rounds. In first round participants has to sketch the given sketch while in second round they are required to do solid modeling. For this competition participants are requires to bring their laptops for better working. They can use CATIA, SolidWorks or AutoCAD. 

	<li>1st round – 2d sketching
	<li>Time allotted – 30 min 
<li>2nd round - Assembly (3D modeling)
	<li>Time allotted – 1 hr. 
	<li>Bring your own laptops with required software installed
	<li>Bring your college ID card
	<li>Report 15 min before given time
	<li>Gaurav Malik (9015819151) | Abhay Verma	(9554708201)
  <li> Date : 24-03-18, Time : 12:30 PM


</ul>

  </div>
    <?php
      echo $form_data[$i];
      $i++;
    ?>
  </div>


  <div class="item">
  <h3>ROBO RACE</h3>
  <div class"event_overview" style="height: 240px;overflow-y: scroll;">
  <ul>
    <li style="color:rgba(24, 116, 205,1);font-weight: bolder; ">EVENT OVERVIEW</li>
<li>Design a manually controlled ROBOT that has capacity to cover maximum distance in shortest
possible time, challenging the hurdles and be one of the best opponents. <li>The maximum dimension of
the robot can be 35 x 35 cm (I x b).
<li>The robot may be wired or wireless.
<li>The length of the wire (for wired bots) should be long enough to cover the whole track and wire should
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
<li> Date : 22-03-18, Time : 11:00 AM
<li> Ground
<li> Co-ordinators : Ravi Pratap Singh (9718929490)
  </ul>
  </div>
  <?php
      echo $form_data[$i];
      $i++;
    ?>
  </div>


  <div class="item">
  <h3> Robo Soccer </h3>
        <div class="event_overview" style="height: 250px;overflow-y: scroll;">
        <ul>
<li style="color:rgba(24, 116, 205,1);font-weight: bolder; ">EVENT OVERVIEW</li>

	<li>Similar to real soccer the participants’ bot will be playing the soccer. There will be 10-20 balls on the field, the one bot is allowed to do goal while other saves the goal. Team which scores the highest will be the winner. 

	<li>Participants should carry their I-cards.
	<li>Weight limit of bot -6kg.
	<li>Dimensions -35cm*35cm*35cm.
	<li>Voltage supply –up to 12 volts.
	<li>Bot can be wired or wireless.
	<li>No weapon should be there on bot.
	<li>Electricity supply of 220volts,50hz will be provided, participants should carry their own adaptors.
	<li>Misbehaviour of participants will lead to disqualification from competition.
  <li> Date : 24-03-18, Time : 10:00 AM
  <li>Co-ordinator: Himanshu Yadav (8218640230) | Ankur Yadav (9871470046)



</ul>

  </div>
    <?php
      echo $form_data[$i];
      $i++;
    ?>
  </div>


  <div class="item">
  <h3> Water Rocketry  </h3>
        <div class="event_overview" style="height: 250px;overflow-y: scroll;">
        <ul>
<li style="color:rgba(24, 116, 205,1);font-weight: bolder; ">EVENT OVERVIEW</li>

	<li>In this competition participants have to bring their rocket formed by the water bottle filled with water. The pump will be provided by us. The rocket covering the longest distance will be the winner.

	<li>Participants should carry their I-cards.
	<li>Max 2.5liter bottle can be used for making rocket.
	<li>Launcher will be provided.
	<li>Build quality and distance achieved will be the judging criteria.
	<li>Misbehaviour of participants will lead to disqualification from competition.
  <li>Date : 23-03-18, Time : 1:30 PM
  <li>Co-ordinators : Ankit Tripathi (9650575205)



</ul>

  </div>
    <?php
      echo $form_data[$i];
      $i++;
    ?>
  </div>


  <div class="item">
  <h3> VISION</h3>
        <div class="event_overview" style="height: 250px;overflow-y: scroll;">
        <ul>
<li style="color:rgba(24, 116, 205,1);font-weight: bolder; ">EVENT OVERVIEW</li>

<li>Theme - Open Theme
<li>No explicit contents.
<li>Only 2 Photos with captions.
<li>No plagiarism allowed, disqualified if found.
<li>Submission with max likes, shares and based on judgement wins.
<li>Last submission date - 20 March 2018
<li>Minimal Editing Allowed.
<li>No watermarks.
<li>Winner will be awarded with certificates.


</ul>

  </div>
    <?php
      echo $form_data[$i];
      $i++;
    ?>
  </div>


  <div class="item">
  <h3> Picture Perception and Discussion Test </h3>
        <div class="event_overview" style="height: 250px;overflow-y: scroll;">
        <ul>
<li style="color:rgba(24, 116, 205,1);font-weight: bolder; ">EVENT OVERVIEW</li>

<li>PPDT consists of story writing and discussion. Participants will be shown a picture, later they have to write a story based on the picture & will discuss about what they have seen. 
<li>As described PPDT is short of “Picture Perception and Description Test”, Participants will be shown a random picture on which they have to write a story in a brief amount of time then each participant have to take part in a group discussion where they will discuss their stories with each other and make a conclusion.

<li>During PPDT a bit hazy or blurred picture is shown to the participants for about a minute.
<li>In about next ten minutes participants have to write down the details that have noticed in the picture & make a story
<li>After that all the participants will discuss their story whatever they percept about the picture (for 15minutes).
 Each participant has to show the properties of an efficient speaker in a group.

<li>Cordinator: Vinayak Sharma(9208003024) | Ajeet Yadav (9654655862)
<li> Date : 23-03-18, Time : 10:00 AM


</ul>

  </div>
    <?php
      echo $form_data[$i];
      $i++;
    ?>
  </div>


  <div class="item">
  <h3> Tech Apti </h3>
        <div class="event_overview" style="height: 250px;overflow-y: scroll;">
        <ul>
<li style="color:rgba(24, 116, 205,1);font-weight: bolder; ">EVENT OVERVIEW</li>

<li>An aptitude test is any type of assessment that evaluates the talent, ability and potential to perform a certain task, with no prior knowledge and/or training.
    

<li>Aptitude test is to measure a person’s ability to acquire their work-related cognitive capacity; the tests assume that people differ in their special abilities and that these differences can be useful in predicting future achievements. This test consists:
  <li> Duration of the test is 30 minutes.
  <li> Questions paper consists of 20 objective questions.
  <li> Each question is allotted 4 marks for correct response.
  <li> ¼ marks will be deducted for indicating incorrect response of each question.
  <li> No deduction for not attempted questions.
  <li> Conclusions: Aptitude test is specially designed to find out how easily and how well we can do something or to assess our logical reasoning or thinking performance
  <li> Coordinator : Kuldeep Singh (9990439858)  | Vinayak Sharma (9208003024)
  <li> Date : 23-03-18, Time : 1:30 PM


</ul>

</div>
    <?php
      echo $form_data[$i];
      $i++;
    ?>
  </div>


  <div class="item">
  <h3>Prashna Baan</h3>
    <div class"event_overview" style="height: 250px;overflow-y: scroll;">
    <ul>
      <li style="color:rgba(24, 116, 205,1);font-weight: bolder; ">EVENT OVERVIEW</li>
      <li>Time limit: 1hr

      <li>Participants: 2
      <li> GK Questions will be asked.
      <li>Level by level questions will become difficult.
      <li> A game of 3 rounds

      <li>Student Co-ordinator: Prerit (8077974510) | Vasudha
      <li> Date : 22-03-18, Time : 11:00 AM
    </ul>
  </div>
    <?php
      echo $form_data[$i];
      $i++;
    ?>
  </div>


  <div class="item">
  <h3>MODEL MANIA</h3>
    <div class"event_overview" style="height: 250px;overflow-y: scroll;">
    <ul>
      <li style="color:rgba(24, 116, 205,1);font-weight: bolder; ">EVENT OVERVIEW</li>
      <li style="color:rgba(24, 116, 205,1);font-weight: bolder; ">EVENT OVERVIEW</li>
      <li>A team shall consist minimum 2 and maximum 5 members.
      <li>The model should be engineering based only.
      <li>The model may be working or non-working.
      <li>Each group must make the model before the event date and only must
present on the date of event.
      <li>Every member of the group must explain the model to the judge.
      <li>Mode of explanation should be English only.
      <li> Priyanshu Garg (9205026533) | Raghvendra Tripathi | Mini Gupta
      <li> Date : 22-03-18, Time : 2:30 PM
    </ul>
  </div>
    <?php
      echo $form_data[$i];
      $i++;
    ?>
  </div>


  <div class="item">
  <h3>KARYANEETI</h3>
    <div class"event_overview" style="height: 250px;overflow-y: scroll;">
    <ul>
      <li style="color:rgba(24, 116, 205,1);font-weight: bolder; ">EVENT OVERVIEW</li>
      <li>4 member in each group.

<li> 1 member is blind fold

<li>There is a track (zig zag)

<li>3 member guiding the track and 1 member have to cross it.

<li>At the end of the track colored balls are placed .

<li>Blind fold member collect the maximum balls and place it at starting point.
<li>Co-ordinators: Shujat Abbas (9897669154)
<li> Date : 23-03-18, Time : 11:30 AM
    </ul>
  </div>
  
    <?php
      echo $form_data[$i];
      $i++;
    ?>
  </div>


  <div class="item">
    <h3> STUBBORN IDEAS</h3>
    <div class"event_overview" style="height: 250px;overflow-y: scroll;">
    <ul>
      <li style="color:rgba(24, 116, 205,1);font-weight: bolder; ">EVENT OVERVIEW</li>
      
      <li>Stubborn ideas help you to show a dogged determination through your sketches, designs and your artworks. The pictures could speak itself, we will make them share their words with the public.

      <li>COORDINATORS- Rajat Pundir (Cse 3 Year) | Spriha Srivastava (Cse 3 Year)

      <li>The artwork can be on any topic or theme.

      <li>There can be any 2D or 3D artwork.

      <li>It should not be printed or traced.
    </ul>
  </div>

    <?php
      echo $form_data[$i];
      $i++;
    ?>
  </div>


  <div class="item">
  
    <?php
      echo $form_data[$i];
      $i++;
    ?>
  </div>


  <div class="item">
    <?php
      echo $form_data[$i];
      $i++;
    ?>
  </div>


  <div class="item">
  <h3>3-D MACHINE MODEL</h3>
    <div class"event_overview" style="height: 250px;overflow-y: scroll;">
    <ul>
      <li style="color:rgba(24, 116, 205,1);font-weight: bolder; ">EVENT OVERVIEW</li>
      
      <li>This event consists of presentation of working/non-working model showcasing.

      <li>The event is a team event and in every team 2 members are allowed.

<li>For this the participants have to prepare a model and one page write-up which has to be presented during the final presentation.

<li>The team will get scores on the basis of presentation skills for their model.

<li>If any team member is found in any undisciplinary action, the team will get debarred from the event.

<li>The judges score will be final and unchanged

<li> Date : 23-03-18, Time : 2:00 PM
<li> Venue : 211 B-Block

<li>Co-ordinators: Disha Dwivedi (9582795041)

    </ul>
  </div>
    <?php
      echo $form_data[$i];
      $i++;
    ?>
  </div>


  <div class="item">
  <h3>ELECTRIC COLLAGE</h3>
    <div class"event_overview" style="height: 250px;overflow-y: scroll;">
    <ul>
      <li style="color:rgba(24, 116, 205,1);font-weight: bolder; ">EVENT OVERVIEW</li>
      
      <li>This event consist of two rounds-Treasure Hunt and Creative Designing.

<li>The event is a team event and in every team 2 members are allowed.

<li>In the first round, the participants have to hunt drobo raown the hidden components and this round will be elimination round.

<li>The second round is mains round in which the participants have to design something creative, either working or non-working but mewningful with the given components.

<li>The team will get scores on the basis of their design presentation and explanation.

<li>If any team member is found in any undisciplinary action, the team will get debarred from the event.
<li> Date : 24-03-18, Time : 10:00 AM
<li> Venue : 308 B and 310 B
<li>Co-ordinator : Manish Bhardwaj (8800970331)
    </ul>
  </div>
    <?php
      echo $form_data[$i];
      $i++;
    ?>
  </div>


  <div class="item">
  <h3>POETRY SLAM</h3>
    <div class"event_overview" style="height: 250px;overflow-y: scroll;">
    <ul>
      <li style="color:rgba(24, 116, 205,1);font-weight: bolder; ">EVENT OVERVIEW</li>
     <li>Participants have to submit their poem through email to nietchronicle.nc@gmail.com after registering on the website . Deadline for submitting the poems is 22nd March 2018.

      <li>Participants may submit ONE entry only. Submission of multiple entries shall lead to disqualification.

      <li> Participation will take place individually.

      <li>The event is multilingual in nature: participants may submit their pieces in their desired languages i.e. English, Hindi and Urdu.

      <li> Plagiarism will not be tolerated and shall lead to disqualification.

      <li>The time for the recitation should not exceed 7 minutes.

      <li>Venue: B-block auditorium
    </ul>
  </div>
    
    <?php
      echo $form_data[$i];
      $i++;
    ?>
  </div>



  <div class="item">
  <h3>BIO-TRESURE HUNT</h3>
    <div class"event_overview" style="height: 250px;overflow-y: scroll;">
    <ul>
      <li style="color:rgba(24, 116, 205,1);font-weight: bolder; ">EVENT OVERVIEW</li>
      <li>A biotechnological (basic) level based treasure hunt
inside the campus.
<li>Coordinator- Prerit Gupta, Sugandha
Katiyar, Akanksha Singh, Shivangi Singh</li>
    <li> Date : 23-03-18, Time : 10:00 AM
    </ul>
  </div>
    <?php
      echo $form_data[$i];
      $i++;
    ?>
  </div>



  <div class="item">
  <h3>GREEN CANVAS</h3>
    <div class"event_overview" style="height: 250px;overflow-y: scroll;">
    <ul>
      <li style="color:rgba(24, 116, 205,1);font-weight: bolder; ">EVENT OVERVIEW</li>
      <li>A poster is a graphically based approach to presenting research. In presenting
your research with a poster, you should aim to use the poster as a means for
generating active discussion of the research.
      <li>Limit the text to about one-fourth of the poster space, and use "visuals"
(graphs, photographs, schematics, maps, etc.) to tell your "story".

      <li>The entire poster must be mounted on a 40" x 60" foam-core board. The poster
does not necessarily have to fill the entire working area.
      <li> The board must be oriented in the "landscape" position (long dimension is
horizontal).
      <li> A banner displaying your poster title, name, and department (or class, if
appropriate) should be positioned at top-center of the board (see Figure 1).
      <li>Make it obvious to the viewer how to progressively view the poster. The poster
generally should read from left to right, and top to bottom. 
      <li>Numbering the individuals panels, or connecting them with arrows is a standard "guidance
system" (see Figure 1).Leave some open space in the design. An open layout is
less tiring to the eye and mind.  
<li> Rahul Kumar (8287351493) | Shristy Singh | Vivek Kumar Sharma
<li> Date : 24-03-18, Time : 11:00 AM
    </ul>
  </div>
  
    <?php
      echo $form_data[$i];
      $i++;
    ?>
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
           <a href="../"><button><div class="btn-text">HOME</div></button></a><br><br><br>
           <a href="../resources/api.php?action=logout&amp;session=<?php echo $session_get; ?>"><button><div class="btn-text">LOGOUT</div></button></a><br><br><br>
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

  <?php 
		if(isset($_SESSION["msg"])){
			if($_SESSION["msg"]["type"] == "error"){
				echo '<script>document.getElementById("message").className="";
						document.getElementById("message").className="error";
						document.getElementById("message").innerHTML="<b>' 
							. $_SESSION["msg"]["head"] . '</b><br/>'
							. $_SESSION["msg"]["body"] . '";
					</script>';
			}else if($_SESSION["msg"]["type"] == "success"){
				echo '<script>document.getElementById("message").className="";
						document.getElementById("message").className="success";
						document.getElementById("message").innerHTML="<b>' 
							. $_SESSION["msg"]["head"] . '</b><br/>'
							. $_SESSION["msg"]["body"] . '";
					</script>';
			}
			unset($_SESSION["msg"]);
		}
		
	?>

</html>