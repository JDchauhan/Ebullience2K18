<?php

    /*
     *  Author: Jagdish Singh
     *  Github: https://github.com/JDchauhan
     */

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
                    echo "login success";       
                    //success: login success
                    
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
                //$email = $_SESSION["email"];
                $sql = "UPDATE Students SET password='$new_pass' WHERE email='$email'";
                $conn->exec($sql);
                
                echo "pass updated";
                //success: password updated
                
            }
        }




















        //url resolving GET 
        $possible_url = array("login","register","authenticate","forget_password", "reset_password");

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


            }
        }
        else{
           //Wrong link
        }
        $conn = null;
    }
	catch(PDOException $e) {
        //TODO:- exception mail to admin with timestamp and other required details
		echo "Error: " . $e->getMessage();
	}
?>
