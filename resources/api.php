<?php

    /*
     *  Author: Jagdish Singh
     *  Github: https://github.com/JDchauhan
     *  Email : jagdish.chauhan01@gmail.com
     */
        
    header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
    header("Pragma: no-cache"); // HTTP 1.0.
    header("Expires: 0"); // Proxies.

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
    
    

    try {

        require_once 'util/config.php';
        require_once 'util/mail_util.php';
        
        function guid(){
            //generates unique id and return it
            $uuid= "" . rand(1,10000) . time() . rand(1,10000);
            return $uuid;
        }

        function validater($value,$type,$len = NULL){
            /*
            * :$value:  value to check
            * :$type:   "int/email"   to check whether value is type of or not
            * :$len :   (functionality pending)if len is passed then also limit to its value
            *
            * return true/ false accordingly
            */

            if($type == "int"){
                //number
                if (filter_var($value, FILTER_VALIDATE_INT) === 0 || !filter_var($value, FILTER_VALIDATE_INT) === false) {
                    if(strlen((string)$value) == 10){
                        return true;
                    }else{
                        return false;
                    }   
                } else {
                    return false;
                }
            }else{
                //email
                if (!filter_var($value, FILTER_VALIDATE_EMAIL) === false) {
                    return true;
                } else {
                    return false;
                }
            }

        }

        function register(){
            /*
             * function used to register a new user through POST data
             */
            global $session_get;

            $name = trim($_POST["name"]);
            $branch = trim($_POST["branch"]);
            $year = $_POST["year"];
            $email = trim($_POST["email"]);
            $roll = (int)trim($_POST["roll_no"]);
            $mobile = (int)trim($_POST["mob_no"]);
            $pass = $_POST["pass"];
            $verification_token = guid();

            $err_form = "";
            $err_status = 0;

            if(!validater($mobile,"int")){
                $err_status = 1;
            }
            if(!validater($roll,"int")){
                $err_status = 1;
            }
            if(!validater($email,"email")){
                $err_status = 1;
            }
            if($name == "" || $branch == "" || $year == "" || $email == "" || $roll == "" || $mobile == "" || $pass == ""){
                $err_status = 1;
            }

            if($err_status){
                $_SESSION["msg"]["type"] = "error";
                $_SESSION["msg"]["head"] = "Registration Failed";
                $_SESSION["msg"]["body"] = "Please Provide all the details in correct format" ;
                $head = "Location: ../pages/registrations.php?session=" . $session_get;                     
                header($head);
            }else{
                $conn=connections();
                
                //check if user exists
                $statement = executedStatement("SELECT email , status FROM Students WHERE
                                                email='$email' ");
                $result = $statement->Fetch(PDO::FETCH_ASSOC);
                
                if($result && $result["status"] == 0){
                    //verification pending
                    //update data for user and send verification link

                    $sql = "UPDATE Students SET roll='$roll', name='$name', password='$pass', branch='$branch', year='$year', mobile='$mobile' , status=0  WHERE email='$email'";
                    $conn->exec($sql);
                    
                    //create Access_key for new registration-mail verification 
                    $sql = "UPDATE Access_key SET token='$verification_token' WHERE email='$email'AND service='new_registration' ";
                    $conn->exec($sql);
                    
                    //mail the new token
                    OTM($email, $roll, $name, $verification_token, "new_registration");

                    $_SESSION["msg"]["type"] = "success";
                    $_SESSION["msg"]["head"] = "Registration Successfull";
                    $_SESSION["msg"]["body"] = "Please verify your account by clicking on the link you recieved in your registered " .
                                                "email ID";
                    
                    $head = "Location: ../pages/login.php?session=" . $session_get;                     
                    header($head);

                }else if($result && $result["status"] == 1){
                    //user already exists
                    
                    $_SESSION["msg"]["type"] = "error";
                    $_SESSION["msg"]["head"] = "Registration Failed";
                    $_SESSION["msg"]["body"] = "This email id already exists. Please choose another";                
                    $head = "Location: ../pages/registrations.php?session=" . $session_get;
                    header($head);

                }else{
                    //fresh user
                    $sql = "INSERT INTO Students VALUES ('$roll', '$name', '$pass', '$branch', '$year', '$email', '$mobile', 0, NULL)"; 
                    $conn->exec($sql); 

                    $sql = "INSERT INTO Access_key VALUES ('$email', '$verification_token','new_registration')"; 
                    $conn->exec($sql);
                    
                    OTM($email, $roll, $name, $verification_token, "new_registration");//mail the new token
                    
                    $_SESSION["msg"]["type"] = "success";
                    $_SESSION["msg"]["head"] = "Registration Successfull";
                    $_SESSION["msg"]["body"] = "Please verify your account by clicking on the link you recieved in your registered " .
                                                "email ID";
                    
                    $head = "Location: ../pages/login.php?session=" . $session_get;
                    header($head);   
                }
            }
        }


        function login(){
            global $session_get;

            $email = trim($_POST["email"]); 
            $pass = $_POST["password"];

            $err_form = "";
            $err_status = 0;

            if(!validater($email,"email")){
                $err_form .= "invalid email <br/>";
                $err_status = 1;
            }
            if($email == "" ||  $pass == ""){
                $err_form .= "Please fill all the details <br/>";
                $err_status = 1;
            }

            if($err_status){
                $_SESSION["msg"]["type"] = "error";
                $_SESSION["msg"]["head"] = "Registration Failed";
                $_SESSION["msg"]["body"] = $err_form;
                $head = "Location: ../pages/login.php?session=" . $session_get;                     
                header($head);
            }else{
                $statement = executedStatement("SELECT roll, name, status, password, email, mobile, branch, year FROM
                                                Students WHERE email='$email' and password='$pass'");
                $result = $statement->Fetch(PDO::FETCH_ASSOC); 
                
                if($result){
                    if($result["status"]){
                        
                        $token = guid(); 
                        
                        $conn = connections();
                        
                        $sql = "UPDATE Students SET token='$token' WHERE email='$email'";
                        $conn->exec($sql);
                        
                        $_SESSION["roll"] = $result["roll"];
                        $_SESSION["name"] = $result["name"];
                        $_SESSION["email"] = $result["email"];
                        $_SESSION["mobile"] = $result["mobile"];
                        $_SESSION["branch"] = $result["branch"];
                        $_SESSION["year"] = $result["year"];
                        $_SESSION["login_status"] = true;
                        $_SESSION["token"] = $token;

                        $email = $_SESSION["email"];

                        $statement = executedStatement("SELECT event_id FROM Participation WHERE email='$email' ");
                        $result = $statement->FetchAll(PDO::FETCH_ASSOC); 
                        
                        if($result){
                            
                            //create binary table for event list
                            $j=0;
                            for( $i = 0; $i <31; $i++){
                                $event_ids[$i] = 0;
                            }
                            foreach($result as $k => $v){
                                $event_ids[$v["event_id"] - 1] = 1;
                            }
                            $_SESSION["event_participated"] = $event_ids;
                        }else{
                            unset($_SESSION["event_participated"]);
                        }
                        
                        $head = "Location: ../pages/home.php?session=" . $session_get;
                        header($head);  
                        
                    }else{
                        //verification pending
                        $_SESSION["msg"]["type"] = "error";
                        $_SESSION["msg"]["head"] = "Login Failed";
                        $_SESSION["msg"]["body"] = "Please verify your account by clicking on the link you recieved in your registered " . 
                                                    "email ID";
                        $head = "Location: ../pages/login.php?session=" . $session_get;
                        header($head);  
                    }
                    
                }else{
                    //incorrect user ID or password
                    $_SESSION["msg"]["type"] = "error";
                    $_SESSION["msg"]["head"] = "Login Failed";
                    $_SESSION["msg"]["body"] = "incorrect email ID and password";
                    
                    $head = "Location: ../pages/login.php?session=" . $session_get;
                    header($head);
                }
                
            }    
        }


        function authenticate($email, $token, $service){
            global $session_get;
            //check if the access_key exists
            $statement = executedStatement("SELECT email FROM Access_key WHERE email='$email' 
                                            AND token='$token' AND service='$service' ");
            $result = $statement->Fetch(PDO::FETCH_ASSOC); 
            
            
            if($result){
                //delete the access key
                $conn = connections();
                $sql = "DELETE FROM Access_key WHERE email='$email' AND token='$token' 
                        AND service='$service' ";
                $conn->exec($sql);
                //performs the service
                if($service=="new_registration"){
                    authenticate_newUser($email);
                }else if($service=="reset_password"){
                    $_SESSION["access_pass"] = true;
                    $head = "Location: ../pages/forget-pwd-step2.php?session=" . $session_get;
                    header($head);
                    
                }


            }else{
                //error: expired link
                $_SESSION["msg"]["type"] = "error";
                $_SESSION["msg"]["head"] = "Some error occured";
                $_SESSION["msg"]["body"] = "The link you have clicked has been expired";
                $head = "Location: ../pages/login.php?session=" . $session_get;
                header($head);
            }
        }

        function authenticate_newUser($email){
            global $session_get;
            //set new user as verified
            $conn = connections();
            $sql = "UPDATE Students SET status=1 WHERE email='$email'";
            $conn->exec($sql);

            $_SESSION["msg"]["type"] = "success";
            $_SESSION["msg"]["head"] = "Verification Successful";
            $_SESSION["msg"]["body"] = "You have been successfully verified";
            
            $head = "Location: ../pages/login.php?session=" . $session_get;
            header($head);
        
        }



        function forget_password(){
            global $session_get;
            $email = $_POST["email"];

            $statement = executedStatement("SELECT email, name, status  FROM Students
                                             WHERE email='$email' ");
            $result = $statement->Fetch(PDO::FETCH_ASSOC); 
            
            if($result){
                if($result["status"]==0){
                    //validation pending
                    $_SESSION["msg"]["type"] = "error";
                    $_SESSION["msg"]["head"] = "Login Failed";
                    $_SESSION["msg"]["body"] = "Please verify your account by clicking on the link you recieved in your " .
                                                "registered email ID";
                    
                    $head = "Location: ../pages/login.php?session=" . $session_get;
                    header($head);

                }else{
                    $email = $result["email"];
                    $name = $result["name"];
                    $verification_token=guid();
                    
                    $conn=connections();

                    $sql = "DELETE FROM Access_key WHERE email = '$email' AND service = 'reset_password' ";
                    $conn->exec($sql);

                    $sql = "INSERT INTO Access_key VALUES ('$email', '$verification_token','reset_password')"; 
                    $conn->exec($sql);

                    OTM($email, $roll, $name, $verification_token, "reset_password");
                    
                    $_SESSION["msg"]["type"] = "success";
                    $_SESSION["msg"]["head"] = "Reset Link sended";
                    $_SESSION["msg"]["body"] = "We have sended you a password reset link. Please click on the link to reset " . 
                                                "your passeword";
                    
                    $head = "Location: ../pages/login.php?session=" . $session_get;
                    header($head);

                }
            
            }else{
                //email id does not exists
                
                $_SESSION["msg"]["type"] = "error";
                $_SESSION["msg"]["head"] = "Email Id does not exists";
                $_SESSION["msg"]["body"] = "Please make sure you have entered a correct email ID. If you are trying to " .
                                            "register yourself then please fill this form";
                
                $head = "Location: ../pages/registrations.php?session=" . $session_get;
                header($head);
            }
        }


        function reset_password(){
            global $session_get;
            $new_pass = $_POST["password"];
            $new_pass1 = $_POST["password-2"];
            $pass_valid = filter_var($new_pass, FILTER_SANITIZE_STRING);
            
            if($new_pass == ""){
                //password blank
                $_SESSION["msg"]["type"] = "error";
                $_SESSION["msg"]["head"] = "Password Must not be empty";
                $_SESSION["msg"]["body"] = "please do not leave the password field blank";
                $head = "Location: ../pages/forget-pwd-step2.php?session=" . $session_get;
                header($head);
                return; 
                //navigate back
            }

            if($new_pass != $new_pass1){
                //password mismatch
                $_SESSION["msg"]["type"] = "error";
                $_SESSION["msg"]["head"] = "Password mismatch";
                $_SESSION["msg"]["body"] = "password and confirm password are diffrent";
                
                $head = "Location: ../pages/forget-pwd-step2.php?session=" . $session_get;
                header($head);
                return;
                //navigate back

            }else if($new_pass != $pass_valid){
                //invalid characters
                $_SESSION["msg"]["type"] = "error";
                $_SESSION["msg"]["head"] = "Invalid characters";
                $_SESSION["msg"]["body"] = "Your password may contain illegal characters or scripting tags";
                $head = "Location: ../pages/forget-pwd-step2.php?session=" . $session_get;
                header($head);
                return;
                //navigate back

            }else{
                $conn = connections(); 
                $email = $_SESSION["email"];
                $sql = "UPDATE Students SET password='$new_pass' WHERE email='$email'";
                $conn->exec($sql);
                //remove additional access
                unset($_SESSION["access_pass"]);
                //password updated successfully
                $_SESSION["msg"]["type"] = "success";
                $_SESSION["msg"]["head"] = "Password updated";
                $_SESSION["msg"]["body"] = "Your password have been successfully updated. Please login to continue.";
                
                $head = "Location: ../pages/login.php?session=" . $session_get;
                header($head);
                
            }
        }


        function logout(){
            global $session_get;

            $token=$_SESSION["token"];
            $conn=connections();
            $sql = "UPDATE Students SET token=NULL WHERE token='$token'";
            $conn->exec($sql);

            session_unset();
            session_destroy();
            session_start(array($session_get));
            //successfully logged out
            
            $_SESSION["msg"]["type"] = "success";
            $_SESSION["msg"]["head"] = "Log out Successfully";
            $_SESSION["msg"]["body"] = "You have been successfully logged out";
            
            $head = "Location: ../pages/login.php?session=" . $session_get;
            header($head);
        }

        function event_registered($id){
            global $session_get;
            $email = $_SESSION["email"];
            //check for access
            if(isset($_SESSION['token']) && isset($_SESSION['login_status']) && $_SESSION['login_status']==true){
                $conn=connections();
                //check if entry exists
                $statement = executedStatement("SELECT * FROM Participation WHERE email='$email' AND event_id='$id' ");
                $result = $statement->Fetch(PDO::FETCH_ASSOC);
                if($result){
                    $_SESSION["msg"]["type"] = "error";
                    $_SESSION["msg"]["head"] = "Already registered";
                    $_SESSION["msg"]["body"] = "You have been already registerd in the event";
                }else{
                    $sql = "INSERT INTO Participation VALUES ('$id', '$email')"; 
                    $conn->exec($sql);
                    //registeration successfull
                    
                    $_SESSION["msg"]["type"] = "success";
                    $_SESSION["msg"]["head"] = "Registration Successfull";
                    $_SESSION["msg"]["body"] = "You have been successfully registerd in the event";
                }
                $email = $_SESSION["email"];

                $statement = executedStatement("SELECT event_id FROM Participation WHERE email='$email' ");
                $result = $statement->FetchAll(PDO::FETCH_ASSOC); 
                
                if($result){
                    
                    //create binary table for event list
                    $j=0;
                    for( $i = 0; $i <31; $i++){
                        $event_ids[$i] = 0;
                    }
                    foreach($result as $k => $v){
                        $event_ids[$v["event_id"] - 1] = 1;
                    }
                    $_SESSION["event_participated"] = $event_ids;
                }else{
                    unset($_SESSION["event_participated"]);
                }
                    
                $head = "Location: ../pages/home.php?session=" . $session_get;
                header($head);
            

            }else{
                // remove all session variables
                session_unset(); 
                // destroy the session 
                session_destroy();
                $head = "Location: ../index.php?session=" . $session_get;
                header($head);
            }
        }

        function event_unregistered($id){
            global $session_get;
            $email = $_SESSION["email"];
            //check for access
            if(isset($_SESSION['token']) && isset($_SESSION['login_status']) && $_SESSION['login_status']==true){
                $conn=connections();

                $sql = "DELETE FROM Participation WHERE email='$email' AND event_id='$id' ";
                $conn->exec($sql);
                //registeration successfully cancelled
                
                $_SESSION["msg"]["type"] = "success";
                $_SESSION["msg"]["head"] = "Successfully Unregistered";
                $_SESSION["msg"]["body"] = "You have successfully removed yourself from this event";

                $email = $_SESSION["email"];

                $statement = executedStatement("SELECT event_id FROM Participation WHERE email='$email' ");
                $result = $statement->FetchAll(PDO::FETCH_ASSOC); 
                
                if($result){
                    
                    //create binary table for event list
                    $j=0;
                    for( $i = 0; $i <31; $i++){
                        $event_ids[$i] = 0;
                    }
                    foreach($result as $k => $v){
                        $event_ids[$v["event_id"] - 1] = 1;
                    }
                    $_SESSION["event_participated"] = $event_ids;
                }else{
                    unset($_SESSION["event_participated"]);
                }
                
                $head = "Location: ../pages/home.php?session=" . $session_get;
                header($head);

            }else{
                // remove all session variables
                session_unset(); 
                // destroy the session 
                session_destroy();
                $head = "Location: ../index.php?session=" . $session_get;
                header($head);
            }
        }

        function download_event_csv(){
            global $session_get;
            //for coordinators- enter their unique id and this function download their event participations
            $token = $_POST["token"];
            $statement = executedStatement("SELECT event, event_id  FROM Events WHERE
                                             token='$token' ");
            $result = $statement->Fetch(PDO::FETCH_ASSOC);

            if($result){
                $event_id = $result["event_id"];
                $event_name = $result["event"];
                
                
                $statement = executedStatement("SELECT DISTINCT Students.roll, Students.name, Students.branch, Students.year, Students.email,
                                                Students.mobile FROM Students INNER JOIN
                                                Participation ON Students.email = Participation.email WHERE
                                                Participation.event_id='$event_id' ");
                //construct file
                $filepath = "downloads/" . $event_id . ".csv";
                $result = $statement->FetchAll(PDO::FETCH_ASSOC);
                $file = fopen($filepath,"w");

                $arr[0] = ",," . $event_name  ;
                $arr[1] = "";
                $arr[2] = "Roll No, Name, Branch, Year, Email, Mobile"  ;
                $arr[3] = "";

                for($i=0; $i<sizeof($result); $i++ ){
                    $line = "" . $result[$i]["roll"] . ","  . $result[$i]["name"] .  ","  . $result[$i]["branch"] . 
                            ","  . $result[$i]["year"] . ","  . $result[$i]["email"] .  ","  . $result[$i]["mobile"];
                    $arr[$i + 4] = $line;   
                }
                foreach ($arr as $line){
                    fputcsv($file,explode(',',$line));
                }
                fclose($file); 
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: ' . filesize($filepath));
                flush(); // Flush system output buffer
                readfile($filepath);

            }else{
                
                $_SESSION["msg"]["type"] = "error";
                $_SESSION["msg"]["head"] = "Access Denied";
                $_SESSION["msg"]["body"] = "Please enter the correct key";
                
                $head = "Location: ../pages/co-ordinator-panel.php?session=" . $session_get;
                header($head);
            }

        }












        //url resolving GET 
        $possible_url = array("login","register","authenticate","forget_password", "reset_password",
                                "logout","event_registered","event_unregistered","download_event_csv");

        $value = "An error has occurred";

        if (isset($_GET["action"]) && in_array($_GET["action"], $possible_url)){
        
            switch ($_GET["action"]){
        
                case "register":
                        register();
                    break;

                case "login":
                    login();
                    break;
                
                case "authenticate":
                    authenticate($_REQUEST["email"], $_REQUEST["token"], $_REQUEST["service"]);
                    break;

                case "forget_password":
                    forget_password();
                    break;
                
                case "reset_password":
                    reset_password();
                    break;

                case "logout":
                    logout();
                break;

                case "event_registered":
                    event_registered($_REQUEST["id"]);
                break;

                case "event_unregistered":
                    event_unregistered($_REQUEST["id"]);
                break;

                case "download_event_csv":
                    download_event_csv();
                break;

                default:    
                    session_unset();
                    session_destroy();
                    session_start(array($session_get));
                    $_SESSION["msg"]["type"] = "success";
                    $_SESSION["msg"]["head"] = "Reset Link sended";
                    $_SESSION["msg"]["body"] = "We have sended you a password reset link. Please click on the link to reset " .
                                                "your passeword";
                    $head = "Location: ../index.php?session=" . $session_get;
                    header($head);
                    


            }
        }
        else{
            session_unset();
            session_destroy();
            $head = "Location: ../index.php?session=" . $session_get;
            header($head);
        }
        $conn = null;
    }
	catch(PDOException $e) {
        //TODO:- exception mail to admin with timestamp and other required details
		echo "Error: " . $e->getMessage();
	}
?>
