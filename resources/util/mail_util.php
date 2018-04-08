<?php

function OTM($email, $roll, $name, $verification_token, $services){
    $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://".  $_SERVER[HTTP_HOST] . "/resources" ;

    if($roll == NULL){
        $roll = "";
    }else{
        $roll = "Roll No.: <b>" . $roll . "</b><br />";
    }

    $to = $email;
    $subject = "Ebullience 2K18 Verification Link";

    //dynamic part of message
    $dyn_message1 = "" ;
    $dyn_message2 = "" ;

    if($services == "new_registration"){
        $dyn_message1 = "Please verify that this is your account by navigation to the following link:-<br />";
        $dyn_message2 = "Click here to verify that this is your account</a><br />" ;
    
    }else if($services == "reset_password"){
        $dyn_message1 = "Please click here to change your password:-<br />";
        $dyn_message2 = "Click here to reset your password</a><br />" ;
    }


    //basic part of message
    $message = "
    <html>
        <head>
            <title>Ebullience 2K18 Verification Link</title>
        </head>
        <body>
            <p>
                Dear <b>" . $name . "</b>, <br />
                You have registered in the <b>Ebullience 2K18</b> with the following credentials:<br />
                " . $roll . " 
                Email-ID: <b>" . $email . "</b><br />
                Name: <b>" . $name . "</b><br />" . $dyn_message1 .
                "<a href='" . $actual_link . "/api.php?action=authenticate&token=" . $verification_token .
                "&email=" . $email . "&service=" . $services . "'>" . $dyn_message2 . 
                "If this request is not made by you do not worry. We'll not activate the account untill requested by you <br />
                Thanks<br /><br />
                Warm Regards<br />
                Cloudy Vault Team<br /><br />
                This is a system generated mail. Please Do not reply to the mail. If you have some query feel free to contact us at
                <i><a href='https://mail.google.com/mail/?view=cm&fs=1&to=jagdish.chauhan01.com'> jagdish.chauhan01@gmail.com</a></i>
            </p>    
        </body>
    </html>
    ";
    
    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    
    $headers .= 'From: <no-reply@niet.co.in>' . "\r\n";

    mail($to,$subject,$message,$headers);

}

?>