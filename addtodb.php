<?php
include 'changepassword.php';
    $mu=$_POST["usrph"];
    $np=$_POST["pssph"];
    $wb=$_POST["webph"];
    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "passwordmanagement";  
    $userin=$_POST["userinfoph"];
    $conn = mysqli_connect($host, $user, $password, $db_name);  
    if($mu!="" && $np!="" && $wb!="")
    {
        $sql = "INSERT into ".$userin." VALUES ('". $mu ."','". $np."','". $wb ."')";
        $conn->query($sql) ;
        $conn->close();
    }
        
    
    ?>