<?php   

if(isset($_GET['query']))
{
    $query = $_GET['query'];
    include 'database.php';
    $find = strtoupper($query); 
    $find = strip_tags($query); 
    $find = trim ($query);
    
    if(empty($find))
    {
        //header('Location:search.php');
        exit(0);
        
    }
        
    $query = "SELECT pname,id,pdesc FROM product where pname LIKE '%$find%';";
    $data = mysql_query($query);
    
    
    echo "<h1> Search Result:</h1>";
    echo "<table border=1 width=500>";
         echo "<td>"; echo "Product Search:".$_GET['query']; echo "</td>";
    while($result = mysql_fetch_array( $data )) 
            {
            
               
                /* echo "<tr width='200'>";
                      echo "<td >" .$result['pname']. "</td>";
                      echo "<td>" .$result['id']. "</td>";
                      echo "</tr>";*/
                      
                      echo "<tr width='100'>";
                      
                      echo "<td>".$result['pname']."</td>";
                      $link = $result['id'];
                      echo "<td>" ; echo "<a href=view.php?id=$link>"; echo "View Product"; echo "</a>";
                      echo "</tr>";
                      
          
            } 
      //      echo "<td>"; echo "Product Search:".$_GET['query']; echo "</td>";
            echo "</table>"; 
        
          
}
else
{
    
    header('Location:search.php');
}

?>