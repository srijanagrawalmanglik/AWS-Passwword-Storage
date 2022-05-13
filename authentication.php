<?php      
    
    include('connection.php');  
    $type = $_POST['custId'];
    $username = $_POST['user'];  
    $password = $_POST['pass'];  
    session_start();
    $_SESSION['userna']=$username;
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);  
        $count;

        if($type=="login")
        {
            
            $sql = "SELECT * FROM login where USERNAME = '".$username."'";  
            $result = mysqli_query($con, $sql);  
            $row = mysqli_fetch_array($result);  
            
            if($username!=$row['USERNAME'] || $password!=$row['PASSWORD'])
            {
                header("Location: incorrect.php");
            }
        }
        else if($type=="signup")
        {
            $email = $_POST['email'];
            $sql = "INSERT INTO login (USERNAME , EMAIL , PASSWORD) VALUES ('". $username ."','". $email ."','". $password ."')"; 
            $result = mysqli_query($con, $sql);
            $sql12 = "SELECT * FROM login where USERNAME = '".$username."'";
            $result1 = mysqli_query($con, $sql12);
            $row = mysqli_fetch_array($result1); 
            $sql2 = "CREATE TABLE ".$username."( usernme varchar(255) ,psswrd varchar(255), website varchar(255));";
            $con->query($sql2);
            
        }

            $sql3 = "SELECT * FROM ".$username." ORDER BY website;";
            $result3 = mysqli_query($con, $sql3);
            $con->query($sql3);

        
        
                    ?>
                

                        <!DOCTYPE html>
<html ng-app="myApp">

<head>
    <title>SECURE IT</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.7/angular.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.7/angular-route.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script type="JavaScript">
          document.querySelector("#page").addEventListener('click', (e, checkbox = document.querySelector('input'))=>{ 
            if(checkbox.checked) { checkbox.checked = false; e.stopPropagation(); }
          });

          document.getElementById("add1").addEventlistener("click",function()
          {
              alert("hello");
          })
    </script>
</head>

<body>



    <script type="text/ng-template" id="dashboard.php" >
    <link rel="stylesheet" href="stuhome.css">
            <div id=wrapper>
                <input type=checkbox> 
                <div id=menu>
                <i><a class="#dashboard" href="#dashboard" style="float: right;color:orange; font-size:29px;"><img src="HOdownload.png" style="background-size: cover;" height="35px" width="45px"></a></i>
                <i><a href="#dbmanage" style="float: right;color:orange; font-size:29px;"><img src="DBdownload.png" style="background-size: cover;" height="35px" width="45px"></a></i>
                
                <i><a href="#changepassword" style="float: right;color:orange; font-size:29px;"><img src="CPdownload.png" style="background-size: cover;" height="50px" width="45px"></a></i>
                <i><a href="https://www.instagram.com/" style="float: right;color:orange; font-size:29px;"><img src="IGdownload.png" style="background-size: cover;" height="40px" width="40px"></a></i>
                <i><a href="https://www.facebook.com/" style="float: right;color:orange; font-size:29px;"><img src="FBdownload.png" style="background-size: cover;" height="45px" width="45px"></a></i>
                <i><a href="https://www.linkedin.com/" style="float: right;color:orange; font-size:29px;"><img src="LIdownload.png" style="background-size: cover;" height="35px" width="37px"></a></i>
                <i><a href="https://www.twitter.com/" style="float: right;color:orange; font-size:29px;"><img src="TWdownload.png" style="background-size: cover;" height="40px" width="45px"></a></i>
                <i><a href="logoutend.php" style="float: right;color:orange; font-size:29px;"><img src="LGdownload.png" style="background-size: cover;" height="40px" width="40px"></a></i>
                </div>
                <div id=page>
                    <div class="back">
                            <label style="color:white;font-size:36px; margin-left:40%; margin-top:10px">Secure IT</label>   
                        <hr class="new1">
                        <div style=" color:white;font-size:20px ;padding-left: 10px; padding-right: 10px; padding-top: 5px; padding-bottom: 5px;">
                        SecureIT is a program that houses all your passwords, as well as other information, in one convenient location with one master password.
                        <br><br>
                        <ul type="square">
                            <li>
                                In Secure IT we are implementing the password management system in the form of a web application as it is more storage efficient for a website as compared to a standalone software or a mobile application.
                            </li>
                            <br>
                            <li>
                                This application will allow the users to store various passwords along with other login details such as their email id. To protect the details of user from being accessed without proper authorization, an authentication system will be setup and the details will be encrypted, which can be accessed by the user after authentication.
                            </li>
                            <br>
                            <li>
                                Additional emphasis on UI/UX of the website to provide userfriendly experiencesecurity is also added if it seems feasible.
                            </li>
                        </div>
                    </div>
                </div>
            </div>
    </script>

    


    <script type="text/ng-template" id="dbmanage.php">
    <link rel="stylesheet" href="stuhome.css">
    <style>
        input[type=text],
        input[type=Password],
        input[type=url]{
            width: 18%;
            padding: 7px 15px;
            display: inline-block;
            border: 5px solidc;
            border-radius: 4px;
            box-sizing: border-box;
            opacity: 0.9;
        }

        input[type=submit] {
            background-color: rgb(66, 66, 66);
            width: 17%;
            color: white;
            padding: 7px 10px;
            border: 50px;
            border-color: #ffffff;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #302f2f;
        }
        ::-webkit-scrollbar {
            width: 0px; /* remove scrollbar space /
            background: transparent; / optional: just make scrollbar invisible /
        }
        / optional: show position indicator in red */
        ::-webkit-scrollbar-thumb {
            background: #FF0000;
        }
    </style>
    <div id=wrapper >
        <input type=checkbox>
        <div id=menu>
            <i><a class="#dashboard" href="#dashboard" style="float: right;color:orange; font-size:29px;"><img src="HOdownload.png" style="background-size: cover;" height="35px" width="45px"></a></i>
            <i><a href="#dbmanage" style="float: right;color:orange; font-size:29px;"><img src="DBdownload.png" style="background-size: cover;" height="35px" width="45px"></a></i>
            
            <i><a href="#changepassword" style="float: right;color:orange; font-size:29px;"><img src="CPdownload.png" style="background-size: cover;" height="50px" width="45px"></a></i>
            <i><a href="https://www.instagram.com/" style="float: right;color:orange; font-size:29px;"><img src="IGdownload.png" style="background-size: cover;" height="40px" width="40px"></a></i>
            <i><a href="https://www.facebook.com/" style="float: right;color:orange; font-size:29px;"><img src="FBdownload.png" style="background-size: cover;" height="45px" width="45px"></a></i>
            <i><a href="https://www.linkedin.com/" style="float: right;color:orange; font-size:29px;"><img src="LIdownload.png" style="background-size: cover;" height="35px" width="37px"></a></i>
            <i><a href="https://www.twitter.com/" style="float: right;color:orange; font-size:29px;"><img src="TWdownload.png" style="background-size: cover;" height="40px" width="45px"></a></i>
            <i><a href="logoutend.php" style="float: right;color:orange; font-size:29px;"><img src="LGdownload.png" style="background-size: cover;" height="40px" width="40px"></a></i>
        </div>
        <div id=page style="overflow:scroll;overflow-x:hidden;overflow-y:scroll;">
            <div class="back" >
                <div class="topnav"  >
                    <br>
                    <label style="color:white;font-size:36px; margin-left:40%; margin-top:10px">Secure IT</label>
                </div>
                <hr class="new1">
                <div id="dbshow" >
                    <div class="dbshows" style="padding-left: 10px; padding-right: 10px; padding-top: 5px; padding-bottom: 20px;">
                    <form  name="dbchange" method="POST">
                        <table width="100%" height="100%" cellspacing="1" cellpadding="1">
                            <?php  
                                $i=0;
                                $sql5 = "SELECT * FROM ".$username.";";
                                $result5 = mysqli_query($con, $sql5);
                                while ($row5 = mysqli_fetch_assoc($result5)) {
                                    
                            ?>
                            <tr style="">
                                <td style="padding: 16px;"><?php echo "<label></label><input type='text' name='usr".$i."' id='usr".$i."' value=".$row5['usernme']."  style='float: left;'>"; ?></td>
                                <td style="padding: 16px;"><?php echo "<label></label><input type='text' name='pss".$i."' id='pss".$i."' value=".$row5['psswrd']."  style='float: left;'>"; ?></td>
                                <td style="padding: 16px;"><?php echo "<label></label><input type='url' name='web".$i."' id='web".$i."' value=".$row5['website']."  style='float: left;'>"; ?></td>
                                <td style="padding: 16px;"><label></label><input type="submit" name="<?php echo "add".$i; ?>" id="<?php echo "add".$i; ?>" value="UPDATE" onclick="myFunction(<?php echo $i; ?>,'<?php echo $row5['usernme']; ?>','<?php echo $row5['psswrd']; ?>','<?php echo $row5['website']; ?>','<?php echo $username;?>')"></td>
                                <td style="padding: 16px;"><label></label><input type="submit" name=del" id="del" value="DELETE" onclick="deldb('<?php echo $row5['usernme']; ?>','<?php echo $row5['psswrd']; ?>','<?php echo $row5['website']; ?>','<?php echo $username;?>')"></td>
                            </tr>
                                <?php
                                        $i++;
                                    }
                                ?>
                            <tr>
                                <td style="padding: 16px;"><label></label><input type="text" name="usr" placeholder="USERNAME" id='usr' style="float: left;"></td>
                                <td style="padding: 16px;"><label></label><input type="text" name="pss" placeholder="PASSWORD" id='pss' style="float: left;"></td>
                                <td style="padding: 16px;"><label></label><input type="url" name="web" placeholder="WEBSITE" id='web' style="float: left;"></td>
                                <td style="padding: 16px;"><label></label><input type="submit" name="addnew" id="addnew" value="ADD" onclick="adddb('<?php echo $username;?>')"></td>
                            </tr>
                        </table>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    </script>
    <script>
function myFunction(j,usrold,pssold,webold,userinfo) {
    var usrn = "usr";
    var pssn = "pss";
    var webn = "web";
    var resusr = usrn.concat(j);
    var respss = pssn.concat(j);
    var resweb = webn.concat(j);
    var usrnew=document.getElementById(resusr).value;
    var pssnew=document.getElementById(respss).value;
    var webnew=document.getElementById(resweb).value;
    if(usrnew.length == ""  && pssnew.length == "" && webnew.length == "" )
    {
        alert("Please Enter the Data Fields")
    }
    else if(usrnew.length == ""  || pssnew.length == "" || webnew.length == "")
    {
        alert("Please Enter all the Data Fields");
    } else {
        var data = {
            usrnewph: usrnew,
            pssnewph: pssnew,
            webnewph: webnew,
            usroldph: usrold,
            pssoldph : pssold,
            weboldph : webold,
            userinfoph : userinfo
        };
        $.post("updatetodb.php", data);
        $.ajax({url:"updatetodb.php", success:function(result){
            alert("The Value has been Updated to the database");
        }
    })
    location.reload(); 
    }
}
function adddb(userinfo) {
    var usr = document.dbchange.usr.value;
    var pss = document.dbchange.pss.value;
    var website = document.dbchange.web.value;
    if(usr.length == ""  && pss.length == "" && website.length == "" )
    {
        alert("Please Enter the Data Fields")
    }
    else if(usr.length == ""  || pss.length == "" || website.length == "")
    {
        alert("Please Enter all the Data Fields");
    } else {
        var data = {
            usrph: usr,
            pssph: pss,
            webph: website,
            userinfoph : userinfo
        };
        $.post("addtodb.php", data);
        $.ajax({url:"addtodb.php", success:function(result){
            alert("The Value has been added to the database");
        }
    })
    location.reload(); 
    }
    
}

function deldb(usrold,pssold,webold,userinfo)
{
        var data = {
            usroldph: usrold,
            pssoldph : pssold,
            weboldph : webold,
            userinfoph : userinfo
        };
        $.post("deldb.php", data);
        $.ajax({url:"deldb.php", success:function(result){
            alert("The Value has been Deleted from the database");
        }
    })
    location.reload(); 
}


</script>


    






    <script type="text/ng-template" id="changepassword.php">
    <style>
        input[type=text],
        input[type=Password]{
            width: 18%;
            padding: 7px 15px;
            display: inline-block;
            border: 5px solidc;
            border-radius: 4px;
            box-sizing: border-box;
            opacity: 0.9;
        }

        input[type=submit] {
            background-color: rgb(66, 66, 66);
            width: 17%;
            color: white;
            padding: 7px 10px;
            border: 50px;
            border-color: #ffffff;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #302f2f;
        }
    </style>
    <link rel="stylesheet" href="stuhome.css">
            <div id=wrapper>
                <input type=checkbox> 
                <div id=menu>
                <i><a class="#dashboard" href="#dashboard" style="float: right;color:orange; font-size:29px;"><img src="HOdownload.png" style="background-size: cover;" height="35px" width="45px"></a></i>
                <i><a href="#dbmanage" style="float: right;color:orange; font-size:29px;"><img src="DBdownload.png" style="background-size: cover;" height="35px" width="45px"></a></i>
                
                <i><a href="#changepassword" style="float: right;color:orange; font-size:29px;"><img src="CPdownload.png" style="background-size: cover;" height="50px" width="45px"></a></i>
                <i><a href="https://www.instagram.com/" style="float: right;color:orange; font-size:29px;"><img src="IGdownload.png" style="background-size: cover;" height="40px" width="40px"></a></i>
                <i><a href="https://www.facebook.com/" style="float: right;color:orange; font-size:29px;"><img src="FBdownload.png" style="background-size: cover;" height="45px" width="45px"></a></i>
                <i><a href="https://www.linkedin.com/" style="float: right;color:orange; font-size:29px;"><img src="LIdownload.png" style="background-size: cover;" height="35px" width="37px"></a></i>
                <i><a href="https://www.twitter.com/" style="float: right;color:orange; font-size:29px;"><img src="TWdownload.png" style="background-size: cover;" height="40px" width="45px"></a></i>
                <i><a href="logoutend.php" style="float: right;color:orange; font-size:29px;"><img src="LGdownload.png" style="background-size: cover;" height="40px" width="40px"></a></i>
                </div>
                <div id=page>
                    <div class="back">
                        <div class="topnav">
                            <br>
                            <label style="color:white;font-size:36px; margin-left:40%; margin-top:10px">Secure IT</label>
                            
                            
        
                        </div>
                        <hr class="new1">
                        <div style="padding-left: 10px; padding-right: 10px; padding-top: 5px; padding-bottom: 5px;">

                                <form name="chngpsswrd" action="chnpas.php" onsubmit="return chpss()" method="GET">
                                    <input type="text" id="userna" name="userna" value="<?php echo $username; ?>" readonly style="width:90%; margin-left:15px;">
                                    <br><br><br>
                                    <input type="password" id="currpassword" name="currpassword" placeholder="Current Password" style="width:90%; margin-left:15px;">
                                    <br><br><br>
                                    <input type="password" id="newpassword" name="newpassword" placeholder="New Password" style="width:90%; margin-left:15px;">
                                    <br><br><br>
                                    <input type="password" id="renewpassword" name="renewpassword" placeholder="Re-enter New Password" style="width:90%; margin-left:15px;">
                                    <br><br><br>
                                    <input type="submit" name="psswrdchange" class="psswrdchange" style="margin-left:78px;">
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        
    </script>
<script>
            function chpss()
        {
            var mypass = <?php echo json_encode($password); ?>;
            var oldpass= document.getElementById("currpassword").value;
            var newpass= document.getElementById("newpassword").value; 
            var renewpass= document.getElementById("renewpassword").value;
            if(oldpass!="" && newpass!="" && renewpass!="")
            {
                if(oldpass==mypass)
                {
                    if(newpass==renewpass)
                    {
                        location.replace("chnpas.php");
                    }
                    else
                    {
                        alert("!!!!!!!!!!!!!!!!!Re-enter the new password correctly.!!!!!!!!!!!!!!!!!");
                        return false;
                    }
                    
                }
                else
                {
                    alert("!!!!!!!!!!!!!!!!!    Invalid Credentials    !!!!!!!!!!!!!!!!!");
                    return false;
                }
                
            }
            else if(oldpass=="" && newpass=="" && renewpass=="")
            {
                alert("PLZ PROVIDE THE CEDENTIALS");
                return false;
            }
            else{
                alert("PLZ PROVIDE ALL THE CEDENTIALS");
                return false;
            }
        }
    </script>
















    <div ng-view></div>
    <script>
        var app = angular.module('myApp', []);
        var app = angular.module('myApp', ['ngRoute']);
        app.config(function($routeProvider) {
            $routeProvider

                .when('/', {
                templateUrl: 'dashboard.php',
                controller: 'dashboardController'
            })

            .when('/dashboard', {
                templateUrl: 'dashboard.php',
                controller: 'dashboardController'
            })

            .when('/dbmanage', {
                templateUrl: 'dbmanage.php',
                controller: 'dbmanageController'
            })

            .when('/passgen', {
                templateUrl: 'passgen.php',
                controller: 'passgenController'
            })

            .when('/changepassword', {
                templateUrl: 'changepassword.php',
                controller: 'changepasswordController'
            })


            .when('/logoutend', {
                templateUrl: 'logoutend.php',
                controller: 'logoutendController'
            })


            .otherwise({
                redirectTo: '/'
            });
        });
        app.controller('dashboardController', function($scope) {
            $scope.message = '';
        });

        app.controller('dashboardController', function($scope) {
            $scope.message = 'SecureIT THE ULTIMATE PASSWORD MANAGEMENT SYSTEM';
        });

        app.controller('dbmanageController', function($scope) {
            $scope.message = 'SecureIT THE ULTIMATE PASSWORD MANAGEMENT SYSTEM';
        });

        app.controller('passgenController', function($scope) {
            $scope.message = 'SecureIT THE ULTIMATE PASSWORD MANAGEMENT SYSTEM';
        });

        app.controller('changepasswordController', function($scope) {
            $scope.message = 'SecureIT THE ULTIMATE PASSWORD MANAGEMENT SYSTEM';
        });

        app.controller('logoutendController', function($scope) {
            $scope.message = 'SecureIT THE ULTIMATE PASSWORD MANAGEMENT SYSTEM';
        });

    </script>
</body>

</html>
