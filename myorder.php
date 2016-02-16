<?php
session_start();
if(!isset($_SESSION['username']))
{
    echo "You must login to view your orders";
    
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Simple Personal</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen, projection, tv" />
<link rel="stylesheet" href="css/style-print.css" type="text/css" media="print" />

</head>
<body>


<div id="wrapper">
 <div id="right">
 <p>search</p>
 </div>
  <div class="title">
    <div class="title-top">
      <div class="title-left">
        <div class="title-right">
          <div class="title-bottom">
            <div class="title-top-left">
              <div class="title-bottom-left">
                <div class="title-top-right">
                  <div class="title-bottom-right">
                    <h1><a href="http://localhost">Vulnerable Application</h1>
                    <p>An E-Commerce application</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  
  <hr class="noscreen" />
  <div class="content">
    <div class="column-left">
      <h3>MENU</h3>
      <a href="#skip-menu" class="hidden">Skip menu</a>
      <ul class="menu">
       <li><a href="#" class="active">Home</a></li>
        <li><a href="product.php">Product</a></li>
		<li><a href="search.php">Search Product</a></li>
        <li><a href="merchant.php">Merchant Login</a></li>
        <li><a href="myorder.php">My Order</a></li>
        <li class="last"><a href="#">Contact</a></li>
      </ul>
    </div>
    <div id="skip-menu"></div>
    <div class="column-right">
      <div class="box">
        <div class="box-top"></div>
        <div class="box-in">
          <h2>My Order: </h2>
          <p>
               
              <?php
              
              require_once 'database.php';
              if(!isset($_SERVER['usernme']))
              {
                  header('Location:ulogin.php');
                  exit(0);
              }
              $name = $_SESSION['username'];
              
              $query = "select * from orders where username='$name';";
              
              $result = mysql_query($query);
              if(mysql_num_rows($result) == 0)
            {
              echo "You didn't buy anything.";
            }
            else
            {
                
              //  echo "<table class=\"gridtable\" border=\"1\" style=\"width:100%\">";
                echo "<table border=\"1\" style=\"width:100%\">";
                echo "<th>Name</th>";
                echo "<th>Product Name</th>";
                echo "<th>Order Status</th>";
                //echo "<th>Merchant Name</th>";
                while($row = mysql_fetch_array($result))
                {
                //echo $row;
             echo "<tr>";
              echo "<td width='150'>".$row['username']."</td>";
              echo "<td width='150'>" .$row['pname']. "</td>";
             // echo "<td width = 30>Order Status </td>";
              echo "<td width='150'> Success </td>";
              echo "</tr>";
                }
            }
            echo "</table>";
              ?>
              </br>
              <br>
                  
                  
              </br>
                  </div>
                        
        
                      </body>
</html>

              
              
         