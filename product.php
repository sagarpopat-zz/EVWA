

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
          <h2>Available Products </h2>
          <p>
              <?php
$con=mysqli_connect("localhost","root","sagar","ctf");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM product");

echo "<table border=\"1\" style=\"width:100%\">";
echo "<th>Product Photo</th>";
echo "<th>Prodcut Name</th>";
echo "<th>Price</th>";
echo "<th>Merchant Name</th>";
while($row = mysqli_fetch_array($result)) {
  //echo $row['pname'] . " " . $row['id'];
   $a = $row['pphoto'];
   $b = $row['pext'];
   $id = $row['id'];
   if ($b == "php")
   {
       $a = "You_are_on_right_track";
       $b = "hint_is_md5_;-)";
   }
  //echo "<br>";
  echo "<tr>";
  echo "<td width='150'> <img src=pictures/$a.$b height='100' width='150'> </img> </td>";
  echo "<td>" .$row['pname']. "</td>";
  echo "<td>" .$row['pprice']. "</td>";
  echo "<td>" .$row['mname']. "</td>";
  echo "<td><a href=view.php?id=$id> &nbsp &nbsp View Product </a> </td>"; 
//echo "<td>" "<a href=#> "</td>";
  //echo "<td>" .$row['pphoto']. "</td>";
  
   echo "</tr>";
}
echo "</table>";

mysqli_close($con);
?>

</body>
</html>

              
              
          </p>
          <br />
        </div>
      </div>
      <div class="box-bottom">
        <hr class="noscreen" />
        <div class="footer-info-left"><a href="http://all-free-download.com/free-website-templates/">My personal website</a>, 2008. All rights reserved.</div>
        <div class="footer-info-right"><a href="http://www.mantisatemplates.com/">Mantis-a templates</a></div>
      </div>
    </div>
    <div class="cleaner">&nbsp;</div>
  </div>
</div>
<div align=center>This template  downloaded form <a href='http://all-free-download.com/free-website-templates/'>free website templates</a></div></body>
</html>