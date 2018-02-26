<?php
    /*
     *  Author: Jagdish Singh
     *  Github: https://github.com/JDchauhan
     */

    function connections(){
        /*
        * Enter connection details here
        * $servername 
        * $username 
        * $password 
        * $dbname
        */ 
        
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }

    function executedStatement($query)
    {
        $conn=connections();
        $stmt = $conn->prepare($query); 
        $stmt->execute();
        return $stmt;
    }

?>