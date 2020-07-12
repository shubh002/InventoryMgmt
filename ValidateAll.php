
<?php

$host = 'localhost';
$user = 'root';
$pass = '';

mysql_connect($host, $user, $pass);

mysql_select_db('inventorymanagerdb');

if(isset($_POST['Username']))
{
 $name=$_POST['Username'];

 $checkdata=" SELECT Username FROM dealers WHERE Username='$name' ";

 $query=mysql_query($checkdata);

 if(mysql_num_rows($query)>0)
 {
  echo "User Name Already Exist";
 }
 else
 {
  echo "OK";
 }
 exit();
}

if(isset($_POST['EmailID']))
{
 $emailId=$_POST['EmailID'];

 $checkdata=" SELECT EmailID FROM dealer WHERE EmailID='$emailId' ";

 $query=mysql_query($checkdata);

 if(mysql_num_rows($query)>0)
 {
  echo "Email Already Exist";
 }
 else
 {
  echo "OK";
 }
 exit();
}
?>