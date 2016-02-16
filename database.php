<?php
$con=mysqli_connect("localhost","root","sagar","ctf");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$sdb = mysql_select_db('ctf');
if(!$sdb)
{
        echo 'fail' .  mysql_error();
}



mysqli_close($con);
?>