<?php

//if(!isset($_POST['uname']) || !isset($_POST['password']) || !isset($_POST['email']) || !isset($_POST['address']))
//{
    session_start();

    $username = $_POST['uname'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    
    
    require ('database.php');

    $username = mysql_real_escape_string($username);
    $password = mysql_real_escape_string($password);
    $email = mysql_real_escape_string($email);
    $address = mysql_real_escape_string($address);
    
    $password = hash('sha256' , $password);
    $query = "INSERT INTO `users` (username, password,email,address) VALUES ('$username', '$password', '$email', '$address')";
    
    $result = mysql_query($query);
    if($result)
    {
   //    echo "User create Successful";
       session_regenerate_id();
       $_SESSION['username'] = $username;
       header('Location:ulogin.php');
     }
    else {
  //      echo 'Somthing wrong';
  header('Location:uregister.php');
        
    }
    
 
?>