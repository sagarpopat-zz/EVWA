<?php

if(!isset($pname))
{
    header('Location:myorder.php');
}
session_start();
//echo $_SESSION['username'];
if(!isset($_SESSION['username']))
{
    header('Location:ulogin.php');
   
    exit(0);
    
}
else
{
    require_once 'database.php';
    $name = $_SESSION['username'];
    $pname = $_POST['pname'];
    $proname = mysql_real_escape_string($pname);
    $query = "INSERT INTO `orders` (username, pname) VALUES ('$name', '$proname')";
    
    $result = mysql_query($query);
    if($result)
    {
        echo $_POST['pname'];
        echo "s";
        
        
    }else
        {
        echo 'f';   
        }
    }
    //header('Location:order.php');

?>