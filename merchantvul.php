<?php

session_start();
if(!isset($_SESSION['mid']))
{
    
    header('Location:merchant.php');
    
}
if (empty($_POST))

{
    header('Location:merchantadd.php');
}
$name = mysql_real_escape_string($_POST['pname']);
$name = strip_tags($name);
$desc = mysql_real_escape_string($_POST['pdesc']);
$price = mysql_real_escape_string($_POST['pprice']);

$allowedTypes = array("jpg","png");
$info = new SplFileInfo($_FILES['photo']['name']);
$ext = $info->getExtension();
$extname = strtolower($ext);
//echo $extname;
if (!in_array($extname, $allowedTypes))
{
        
    //$err[] = "Invalid File Extenestion";
    $a = $_SESSION['mid'];
    header('Location:merchantadd.php?mid='.$a);
    exit(0);
    
}

include 'database.php';
$id = $_SESSION['mid'];
$mname = $_SESSION['mname'];

if($_FILES['photo']['name'])
{
	//if no errors...
	if(!$_FILES['photo']['error'])
	{
            
            
                //now is the time to modify the future file name and validate the file
                $pname = $_FILES['photo']['name'];
                $ename = explode('.', $pname);
                $photoname = md5($ename[0]);
                $photoext = $ename[1];
                $fname = $photoname.".".$photoext;
                move_uploaded_file($_FILES['photo']['tmp_name'], 'pictures/'.$fname);
               
        }
}
$query = "insert into product(mname,pname,pdesc,pprice,pphoto,pext) values('$mname','$name','$desc','$price','$photoname','$photoext')";
    
$result = mysql_query($query);
    
if(!$result)
{
    echo "something went wrong";
    
}
 else {
     
    header('Location:product.php');
     
 }

 
?>