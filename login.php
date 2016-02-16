<?php
#ob_start();

session_start();

if(isset($_SESSION['username']))
{
    header('Location:product.php');
    exit(0);
}
if(isset($_POST['uname']))
{
    $username = $_POST['uname'];
}
if(isset($_POST['password']))
{
    $password = $_POST['password'];
}
require_once 'database.php';
 
$username = mysql_real_escape_string($username);

$query = "SELECT id, username, password
        FROM users
        WHERE username = '$username';";
 
$result = mysql_query($query);
 
if(mysql_num_rows($result) == 0) // User not found. So, redirect to login_form again.
{
    header('Location: ulogin.php');
}
 
$userData = mysql_fetch_array($result, MYSQL_ASSOC);
$hash = hash('sha256',  $password);
//echo $hash;
echo "<br>";
//echo "from database" . $userData['password'];

if($hash != $userData['password']) // Incorrect password. So, redirect to login_form again.
{
    //echo "fial";
    header('Location: ulogin.php');
    
}else{ // Redirect to home page after successful login.
    echo "success";
        session_regenerate_id();
	#$_SESSION['sess_user_id'] = $userData['id'];
	$_SESSION['username'] = $userData['username'];
	session_write_close();
        header('Location: product.php');
}

?>