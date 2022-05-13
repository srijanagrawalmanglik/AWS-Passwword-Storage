<?php
include 'emailotp.php';
    $otp=$_POST["otpph"];
    if($otp==$result)
    {
        return TRUE;
    }
?>