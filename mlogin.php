<?php

            session_start();
            include 'database.php';
     
             if(($_GET['merchant'] == "login"))
             {
                 $name = $_POST['mname'];
                 $password = $_POST['password'];
                 $username = mysql_real_escape_string($name);
                 $hash = hash('sha256',  $password);
                 //echo $username;
                 //echo $hash;
                $query = "SELECT * FROM merchant WHERE mname='$username' and mpassword='$password';";
 
                $result = mysql_query($query);
               // echo $result;
                if(mysql_num_rows($result) == 0) // User not found. So, redirect to login_form again.
                {
                       
                    header('Location:merchant.php');
                }

                else
                {
                       
                        $row = mysql_fetch_array($result);
                        $mid = $row['id'];
                       $_SESSION['mid'] = $mid;
                       $_SESSION['mname'] = $username;
                        header('Location:merchantadd.php?mid='.$mid);                }
             }
 else {
     
                 header('Location:merchant.php');
     
 }

              ?>
