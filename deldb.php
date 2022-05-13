<?php
include 'changepassword.php';

    $muold=$_POST["usroldph"];
    $npold=$_POST["pssoldph"];
    $wbold=$_POST["weboldph"];
    $userin=$_POST["userinfoph"];
    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "passwordmanagement";  
    $conn = mysqli_connect($host, $user, $password, $db_name);  
    $sql = "DELETE FROM ".$userin." WHERE usernme='".$muold."'AND psswrd='".$npold."'AND website='".$wbold."';";
    $conn->query($sql) ;
    
        
    
    ?>