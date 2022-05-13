<?php
include 'changepassword.php';
    $id=$_POST["idph"];
    $ps=$_POST["psph"];
    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "passwordmanagement";  
    $conn = mysqli_connect($host, $user, $password, $db_name);  
    if($id!="" && $ps!="")
    {
        $sql = "SELECT EMAIL FROM login WHERE USERNAME='".$id."'";
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result); 
        if($username!=$row['USERNAME'] || !password_verify($password,$row['PASSWORD']))
        {
            $n = 6;
            $generator = "1357902468";
            $result = "";
            for ($i = 1; $i <= $n; $i++) {
                $result .= substr($generator, (rand() % (strlen($generator))), 1);
            }
            $to = $row['EMAIL'];
            $subject = "This is subject";
         
            $message = "<b>Hi tebate,Please enter the OTP mentioned below to verify your email. It is only valid for 5 minutes.</b>";
            $message .= "<h1>".$result."</h1>";
            $message .= "<br>Please don't share your otp with anyone. If this wasn’t you, contact our support team at help@secureit.com<br>";
            $header = "From:tebate20@gmail.com \r\n";
            $header .= "Cc:afgh@somedomain.com \r\n";
            $header .= "MIME-Version: 1.0\r\n";
            $header .= "Content-type: text/html\r\n";
            $retval = mail ($to,$subject,$message,$header);
        }
    }
        $conn->close();
        
    
    ?>