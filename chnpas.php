<?php
include 'changepassword.php';
    $mu=$_GET["userna"];
    $np=$_GET["newpassword"];
    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "passwordmanagement";  
    
    $conn = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  
    $sql = "UPDATE login SET PASSWORD='".$np."' WHERE USERNAME='".$mu."'";

    if ($conn->query($sql) === TRUE) {
      echo "Record updated successfully";
      header("Location: index.html");
      
    } else {
      echo "Error updating record: " . $conn->error;
    }
    
    $conn->close();
    ?>


?>  