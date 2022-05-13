<?php
include 'changepassword.php';
    $mu=$_POST["usrnewph"];
    $np=$_POST["pssnewph"];
    $wb=$_POST["webnewph"];
    $muold=$_POST["usroldph"];
    $npold=$_POST["pssoldph"];
    $wbold=$_POST["weboldph"];
    $userin=$_POST["userinfoph"];
    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "passwordmanagement";  
    $conn = mysqli_connect($host, $user, $password, $db_name);  
    if($mu!="" && $np!="" && $wb!="")
    {
        $sql = "UPDATE ".$userin." SET usernme='".$mu."',psswrd='".$np."', website='".$wb."'  WHERE usernme='".$muold."'AND psswrd='".$npold."'AND website='".$wbold."'";
        $conn->query($sql) ;
        $conn->close();
    }
        
    
    ?>