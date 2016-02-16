<?php
session_start();
//echo $_SESSION['mid'];
//echo S_SESSION['']
if (!isset($_SESSION['mid']))
{
    header('Location:merchant.php');
}   
if ($_SESSION['mid'] != $_GET['mid'])
{
    echo "fail";
    session_destroy();
    header('Location:merchant.php');
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
            
          <h2>Add product: </h2>
          <p>
              <center>
           
                      <?php 
                      //session_start();
                      
                     $nonce = hash("md5",rand().time().rand());
                     $_SESSION['nonce'] = $nonce;
                      include 'database.php';
                     $id = $_GET['mid'];
                     $mname = $_SESSION['mname'];
                     
                      $query = "select id,pname,pdesc from product where mname='$mname';";
 
                $result = mysql_query($query);
                
                echo "<table border=\"1\" style=\"width:100%\">";
                echo "<th>Product Name</th>";
                echo "<th>Prodcut Description</th>";
                echo "<th>Delete</th>";
          
      //     echo $row['pname'];
                while($row = mysql_fetch_array($result))
                  
                {
              //      $name = $row['pname'];
                //    $des = $row['pdesc'];
                    //  echo $row['pname'];
                    echo "<br>";
                    echo "<tr>";
                    echo "<td>" .$row['pname']. "</td>";
                    echo "<td>" .$row['pdesc']. "</td>";
                    $i = $row['id'];
                    echo "<td><a href=deleteproduct.php?pid=$i&mname=$mname&csrftoken=$nonce> &nbsp &nbsp Delete Product </a> </td>"; 
                  //echo "<td>" "<a href=#> "</td>";
                    //echo "<td>" .$row['pphoto']. "</td>";

                     echo "</tr>";
}
echo "</table>";
                            
                
                      ?>
              </center>
              <form name="mlogin" method="post" action="merchantvul.php" enctype="multipart/form-data">
                  <center>                  <table class="gridtable" border="1">
                          <h3><p><b>Welcome <?php echo $_SESSION['mname']; ?></b></p></h3>
                          <tr>
                      <td>Product Name: </td>
                      <td> <input type="text" name="pname">
                              </tr>
                          <tr>
                      <td> Product Description : </td>
                      <td> <input type="text" name="pdesc">
                  </tr>
                       
                       <tr>
                      <td> Price: </td>
                      <td> <input type="text" name="pprice">
                  </tr>
                       <tr>
                      <td> Photo: </td>
                      <td> <input type="file" name="photo">
                  </tr>
                          <input type="hidden" name="csrftoken" value="<?php echo $nonce; ?>">                             
                          
                      </table>
                      <center><input type="submit" value="login"></center>
              </form>
              </br>
                  </div>
                        
        
                      </body>
</html>

              
              
          </p>
          <br />    
        </div>
      </div>
     
</html