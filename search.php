

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Simple Personal</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen, projection, tv" />
<link rel="stylesheet" href="css/style-print.css" type="text/css" media="print" />
<script>
 
 
function search() {
  if (window.XMLHttpRequest) {
      var name = document.getElementsByName("sname")[0].value;
      //alert(name);
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
      //var a = xmlhttp.responseText.split("|") // Delimiter is a string
       /* for (var i = 0; i < a.length; i++)
        {
            //alert(a[i]);
            document.getElementById("pname").innerHTML = a[i];
            
             
        }*/
      
    }
  }
  xmlhttp.open("GET","searchproduct.php?query="+name,true);
  xmlhttp.send();
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
          <h2>Search Products </h2>
          <p>
              
              
             
                  <center>
                   
                      <input type="text" name="sname"><br><br>
                                  <input type="submit" name="product" id="product" value="Search Product" onclick="search()"><br>
                          </center>
                          
             
              <br>
                  
                  
 
              </br>
              <center>
              <div id="txtHint"> </div>
              </center>
                  </div>
                        
        
                      </body>
</html>

              
              
          </p>
          <br />
        </div>
      </div>
     
  </html>