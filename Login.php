<?php
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "inventorymanagerdb";

// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);
// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// } 

// $sql = "select Type from login where Username = '".$_POST["Username"]."' and Password = '".$_POST["Password"]."'";
// $Result = $conn->query($sql);
$username = "root";
$password = "";
$host = "localhost";

$connector = mysqli_connect($host,$username,$password)
    or die("Unable to connect");
  echo "Connections are made successfully";
$selected = mysqli_select_db($connector,"inventorymanagerdb")
  or die("Unable to connect");

//execute the SQL query and return records
$result = mysqli_query($connector,"select Type from login where Username = '".$_POST["Username"]."' and Password = '".$_POST["Password"]."'");
while( $row = mysqli_fetch_assoc( $result ) ){
    $type = $row['Type'];
    echo $type;
    if($type == 1)
    {
        header("Location: ./Dealer/DealerDashboard.php"); 
    }
    else if($type == 2)
    {
        header("Location: ./Supplier/Index.php"); 
    }
    else if ($type == 3)
    {
        header("Location: ./Admin/Index.php");
    }
}
// header("Location: RegisterDealer.php");
$connector->close();
?> 