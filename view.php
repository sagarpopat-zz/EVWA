

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Simple Personal</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen, projection, tv" />
<link rel="stylesheet" href="css/style-print.css" type="text/css" media="print" />
<script>
    
    function validateForm()
            {
                var iChars = "!`@#$%^&*()+=-[]\\\';,./{}|\":<>?~_";   
                var data = document.getElementById("cname").value;
                for (var i = 0; i < data.length; i++)
                {      
                    if (iChars.indexOf(data.charAt(i)) != -1)
                    {    
                    alert ("Your string has special characters. \nThese are not allowed.");
                    document.getElementById("cname").value = "";
                    return false; 
                    } 
                }
            }
  
</script>
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
          <h2>Available Products </h2>
          <p>
              <?php
              
             if(!isset($_GET['id']))
             {
                 header('Location:product.php');
             }
            $conn = mysql_connect("localhost","root","sagar");
            mysql_select_db('ctf', $conn);
            $id = $_GET['id'];
            $query = "SELECT * FROM product where id = '$id';";
            $result = mysql_query($query);
            //$injection = mysql_query($result);
            if(mysql_num_rows($result) == 0)
            {
              die('Could not get data: ' . mysql_error());
            }
            else
            {
                
                echo "<table class=\"gridtable\" border=\"1\" style=\"width:100%\">";
                $row = mysql_fetch_array($result);
                //echo $row;
                $_SESSION['pname'] = $row['pname'];
               $a = $row['pphoto'];
               
               $e = $row['pext'];

              echo "<br>";
              echo "<tr>";
              echo "<td>Product Image </td>";
              echo "<td width='150'> <img src=pictures/$a.$e height='100' width='150'> </img> </td>";
              echo "</tr>";
              echo "<tr>";
              echo "<td>Product Name </td>";
              echo "<td width='150'>" .$row['pname']. "</td>";
              echo "</tr>";
               echo "<tr>";
              echo "<td width = 30>Product Description </td>";
              echo "<td width='150'>" .$row['pdesc']. "</td>";
              echo "</tr>";
               echo "<tr>";
              echo "<td>Merchant Name </td>";
              echo "<td width='150'>" . $row['mname']. "</td>";
              echo "</tr>";
               echo "<tr>";
              echo "<td>Product Price </td>";
              echo "<td width='150'>" .$row['pprice']. "</td>";
              echo "</tr>";

            //echo "<td>" "<a href=#> "</td>";
              //echo "<td>" .$row['pphoto']. "</td>";


            }
            echo "</table>";



            mysql_close($conn);
            ?>
              <form name="buy" action="buy.php" method="POST">
                   <input type="hidden" value ="<?php echo $a; ?>" name="id">
                       <input type='hidden' value="<?php echo $_SESSION['pname']; ?>" name="pname">
              <center> <input type="submit" value="Buy Now"> </centeer>
                      </form>
              
              <br>
              <hr>
                  <BR>
                      <br>
                  <h2> Comments </h2>
                 
                  <form name="comment" action="comments.php?action=add" method="POST" onsubmit="return validateForm()">
                  <table class="gridtable"> 
                      <input type='hidden' name="pid" value="<?php echo $_GET['id']; ?>">
                      <tr>
                      <td> Name: </td>
                      <td> <input type="text" name="cname"></input></td>
                      </tr>
                      <tr>
                          <td>Email address : </td>
                          <td> <input type="text" name="cemail"></input></td>
            
                      </tr>
                      <tr>
                          <td>Comment : </td>
                          <td> <textarea name="ccomment" width="100"></textarea></td>
            
                      </tr>
                      
                  </table>
                      <center> <input type="submit" value="comment" name="comment"> </center><br><hr>
                  </form
                  
                  <table>
                    <?php

                  
                    include 'd.php';

                    $result=mysqli_query($con,"SELECT cname,ccomment FROM comments where pid=$id");

                    echo "<table class=\"gridtable\" border=\"1\" style=\"width:50%\">";
                    while($row = mysqli_fetch_array($result)) {
                 
                      echo "<tr width='200'>";
                      echo "<td >" .$row['cname']. "</td>";
                      echo "<td>" .$row['ccomment']. "</td>";
                      echo "</tr>";
                      
                    
                    }
                    echo "</table>";

                    mysqli_close($con);
                    ?>
                      
                      <tr> 
                          <td></td>
                      </tr>
                      <tr>
                          <td></td>
                          
                      </tr>
                      
                          
                  </table>
                  </div>
        
                      </body>
</html>

              
              
          </p>
          <br />
        </div>
      </div>
     
</html>