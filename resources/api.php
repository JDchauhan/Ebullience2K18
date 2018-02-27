<?php

    /*
     *  Author: Jagdish Singh
     *  Github: https://github.com/JDchauhan
     */

    if(!isset($_SESSION)){
        session_start();
    }

    try {

        require_once 'util/config.php';
        require_once 'util/mail_util.php';
            
        header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
        header("Pragma: no-cache"); // HTTP 1.0.
        header("Expires: 0"); // Proxies.

        function guid(){
            $uuid= "" . rand(1,10000) . time() . rand(1,10000);
            return $uuid;
        }


        function register(){
            /*
             * function used to register a new user through POST data
             */
            $name=$_POST["name"];
            $clg=$_POST["clg_name"]; 
            $email=$_POST["email"];
            $roll=$_POST["roll_no"];
            $mobile=$_POST["mob_no"];
            $pass=$_POST["pass"];
            $verification_token = guid();

            $conn=connections();
            
            //check if user exists
            $statement = executedStatement("SELECT email , status FROM Students WHERE
                                             email='$email' ");
            $result = $statement->Fetch(PDO::FETCH_ASSOC);
            
            if($result && $result["status"] == 0){
                //verification pending
                //update data for user and send verification link

                $sql = "UPDATE Students SET roll='$roll', name='$name', password='$pass', mobile='$mobile', college='$clg', status=0  WHERE email='$email'";
                $conn->exec($sql);
                
                //create Access_key for new registration-mail verification 
                $sql = "UPDATE Access_key SET token='$verification_token' WHERE email='$email'AND service='new_registration' ";
                $conn->exec($sql);
                
                //mail the new token
                OTM($email, $roll, $name, $verification_token, "new_registration");

                //alert: please verify your account
                echo "verification required register";
                
            }else if($result && $result["status"] == 1){
                //user already exists
                
                //error: email id already registered
                echo "fail register";

            }else{
                //fresh user
                $sql = "INSERT INTO Students VALUES ('$roll', '$name', '$pass', '$email', '$mobile', '$clg', 0, NULL)"; 
                $conn->exec($sql); 

                $sql = "INSERT INTO Access_key VALUES ('$email', '$verification_token','new_registration')"; 
                $conn->exec($sql);
                
                OTM($email, $roll, $name, $verification_token, "new_registration");//mail the new token
                
                //alert: Registration successfull
                echo "success register fresh";
            
            }
        }


        function login(){
            $email=$_POST["email"]; 
            $pass=$_POST["password"];

            $statement = executedStatement("SELECT roll, name, status, password, email, mobile, college FROM
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
                    $_SESSION["college"] = $result["college"];
                    $_SESSION["login_status"] = true;
                    $_SESSION["token"] = $token;
                    
                    

                    header("Location: ../pages/home.php");
                    
                }else{
                    echo "verification pend login";
                    //error: verification pending
                }
                
            }else{
                echo "incorrect cred login";
                //error: invalid user id or password
            }
        
        }


        function authenticate($email, $token, $service){
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
                    //success: navigate to change password with authenticated access
                    header("Location: ../pages/forget-pwd-step2.php");
                    
                }


            }else{
                //error: expired link
            }
        }

        function authenticate_newUser($email){
            $conn = connections();
            $sql = "UPDATE Students SET status=1 WHERE email='$email'";
            $conn->exec($sql);
            //success: show success message
            header("Location: ../index.php");
        
        }



        function forget_password(){
            $email = $_POST["email"];

            $statement = executedStatement("SELECT email, name, status  FROM Students
                                             WHERE email='$email' ");
            $result = $statement->Fetch(PDO::FETCH_ASSOC); 
            
            if($result){
                if($result["status"]==0){
                    //error: validation pending

                }else{
                    $email = $result["email"];
                    $name = $result["name"];
                    $verification_token=guid();
                    
                    $conn=connections();

                    $sql = "DELETE FROM Access_key WHERE email = '$email' AND service = 'reset_password' ";
                    $conn->exec($sql);

                    $sql = "INSERT INTO Access_key VALUES ('$email', '$verification_token','reset_password')"; 
                    $conn->exec($sql);

                    OTM($email, $email, $name, $verification_token, "reset_password");
                    //message: password reset link sended
                    echo "link sended"; 
                }
            
            }else{
                echo "email id not exist forget";
                //error: email id does not exists
            }
        }


        function reset_password(){
            //todo:recieve email in session
            $new_pass = $_POST["password"];
            $new_pass1 = $_POST["password-2"];
            $pass_valid = filter_var($new_pass, FILTER_SANITIZE_STRING);
            if($new_pass != $new_pass1){
                echo "pass mismatch";
                //error: password mismatch
                //navigate back

            }else if($new_pass != $pass_valid){
                //error: invalid characters
                echo "error invalid chars";
                //navigate back

            }else{
                $conn = connections();
                //todo:recieve email in 
                $email = $_SESSION["email"];
                $sql = "UPDATE Students SET password='$new_pass' WHERE email='$email'";
                $conn->exec($sql);
                
                echo "pass updated";
                //success: password updated
                
            }
        }


        function logout(){
            $token=$_SESSION["token"];
            $conn=connections();
            $sql = "UPDATE Students SET token=NULL WHERE token='$token'";
            $conn->exec($sql);

            session_unset();
            session_destroy();
            session_start();
            //success: give logout success message
            header("Location: ../index.php");
        }

        function event_registered($id){
            $email = $_SESSION["email"];
            //check for access
            if(isset($_SESSION['token']) && isset($_SESSION['login_status']) && $_SESSION['login_status']==true){
                $conn=connections();

                $sql = "INSERT INTO Participation VALUES ('$id', '$email')"; 
                $conn->exec($sql);
                //success: registeration successfull

                header("Location: ../pages/home.php");

            }else{
                // remove all session variables
                session_unset(); 
                // destroy the session 
                session_destroy();
                header("Location: ../index.php");
            }
        }

        function event_unregistered($id){
            $email = $_SESSION["email"];
            //check for access
            if(isset($_SESSION['token']) && isset($_SESSION['login_status']) && $_SESSION['login_status']==true){
                $conn=connections();

                $sql = "DELETE FROM Participation WHERE email='$email' AND event_id='$id' ";
                $conn->exec($sql);
                //success: registeration successfully cancelled

                header("Location: ../pages/home.php");

            }else{
                // remove all session variables
                session_unset(); 
                // destroy the session 
                session_destroy();
                header("Location: ../index.php");
            }
        }

        function download_event_csv(){
            $token = $_POST["token"];
            $statement = executedStatement("SELECT event, event_id  FROM Events WHERE
                                             token='$token' ");
            $result = $statement->Fetch(PDO::FETCH_ASSOC);

            if($result){
                $event_id = $result["event_id"];
                $event_name = $result["event"];
                
                
                $statement = executedStatement("SELECT Students.roll, Students.name, Students.college, Students.email,
                                                Students.mobile FROM Students INNER JOIN
                                                Participation ON Students.email = Participation.email WHERE
                                                Participation.event_id='$event_id' ");
                //construct file
                $filepath = "downloads/" . $event_id . ".csv";
                $result = $statement->FetchAll(PDO::FETCH_ASSOC);
                $file = fopen($filepath,"w");

                $arr[0] = ",," . $event_name  ;
                $arr[1] = "";
                $arr[2] = "Roll No, Name, College, Email, Mobile"  ;
                $arr[3] = "";

                for($i=0; $i<sizeof($result); $i++ ){
                    $line = "" . $result[$i]["roll"] . ","  . $result[$i]["name"] .  ","  . $result[$i]["college"] . 
                            ","  . $result[$i]["email"] .  ","  . $result[$i]["mobile"];
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
                //error: access denied
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


            }
        }
        else{
            session_unset();
            session_destroy();
            header("Location: ../index.php");
        }
        $conn = null;
    }
	catch(PDOException $e) {
        //TODO:- exception mail to admin with timestamp and other required details
		echo "Error: " . $e->getMessage();
	}
?>
