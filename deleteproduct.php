<?php
session_start();
if($_GET['csrftoken'] != $_SESSION['nonce'])
{
   header('Location:merchant.php');
    //echo "error";
    exit(0);
}
if(!isset($_SESSION['mid']))
{
    header('Location:merchant.php');
    exit(0);
}
if(empty($_GET))
{
   header('Location:merchant.php');
    exit(0);
}

$id = $_GET['pid'];
$name = $_GET['mname'];
include 'database.php';

    $query = "Delete from product where id='$id' and mname='$name';";

 mysql_query($query) or die (mysql_errno());
 $querym = "Delete from comments where pid='$id';";
 mysql_query($querym) or die(mysql_errno());
 $mid = $_SESSION['mid'];

header('Location:merchantadd.php?mid='.$mid);


?>