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

    <meta name="description" content="NIET Zonal Techfest Website">
    
    <meta name="keywords" content="NIET, Zonal, Techfest, Ebullience, 2018, AKTU, Jagdish, Ashish">
    
    <meta name="author" content="Jagdish Singh, Ashish Gupta">

    <meta name="theme-color" content="#030710">

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
        <a href="../">HOME | </a>
        <a href="events.php">EVENTS | </a>
        <a href="registrations.php">REGISTRATIONS | </a>
        <a href="forget-pwd.php">FORGOT PASSWORD | </a> 
        <a href="co-ordinator-panel.php">CONSOLE |</a>
        <a href="devpage.php">DEV PAGE </a>
        
    </div>
    <div class="navigator">
    	LOGIN
    </div>
    
    <center><div class="line_2"></div></center>  
    <br>
    <div class="error" id="message">
    
    </div>

    <div id="timer" class="timer">
          
    </div>

      <form action="../resources/api.php?action=login&amp;session=<?php echo $session_get;?>" method="POST" style="margin-top: 50px;">

      <input type="text" name="email" placeholder="Email" class="txt-sml" style="margin-top: 10px;"><br>
      <input type="password" name="password" placeholder="Password" class="txt-sml"><br>
      <input type="submit" name="submit" placeholder="Login" value="Login" class="btn-sml">

      </form>


    <div class="footer">
      <div class="line_3"></div>
      Designed And Developed By 

      <a class="author" target="_blank" href="https://github.com/ashigupta007"> Ashish Gupta </a>
      and
      <a class="author" target="_blank" href="https://github.com/JDchauhan"> Jagdish Singh </a>
    
    </div>

    <div class="menu">
      <a href="../"><button><div class="btn-text">HOME</div></button></a><br><br><br>
      <a href="events.php"><button><div class="btn-text">EVENTS</div></button></a><br><br><br>
      <a href="registrations.php"><button><div class="btn-text">REGISTRATIONS</div></button></a><br><br><br>
      <a href="forget-pwd.php"><button><div class="btn-text" style="font-size: 13px;">FORGET PASSWORD</div></button></a><br><br><br>
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

    <script type="text/javascript" src="../js/jquery.particleground.js"></script>

    <script type="text/javascript" src="../js/sine-waves.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">

    <script type="text/javascript" src="../js/main.js"></script>

  <script>
    $(window).on('load',(function() {
      $("#overlayer").delay(2000).fadeOut("slow");
    }));
  </script>

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