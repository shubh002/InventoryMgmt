<!DOCTYPE html>
<html>
<head>
<title>Place Order</title>

</head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type = "text/css" href="./Dashboard.css">
 <script type="text/javascript" src="tooltip.js"></script>
<?php
$showPIdError=false;

$PId=$_REQUEST["PId"];

if(isset($_POST['submit']))
{

   placeOrder($PId);
}

function placeOrder($PId){
$e=validatePId($PId);
echo $e;
if($e!=0){
  $PId=$_REQUEST["PId"];




  $CType=$_POST["CType"];
  $PType=$_POST["PType"];
  $PCat=$_POST["PCat"];
  $Colour=$_POST["Colour"];
  $Size=$_POST["Size"];
  $Description=$_POST["Description"];
  $Qty=$_POST["Qty"];




$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "inventorymanage";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(!empty($_POST['submit']))
{
     $SQL = "INSERT INTO orderdetails (PId,CustomerType,OrderType,Category,Colour,Size,Description,Quantity) VALUES ('$PId','$PType','$CType','$PCat','$Colour','$Size','$Description','$Qty')";
     $result = mysqli_query($conn,$SQL);
}
if ($conn->query($SQL) === TRUE) {
    echo "New record created successfully";
    header('Location: http://localhost/InventoryManagementSystem/DealerDashboard.php');

} else {
    echo "Error: " . $SQL . "<br>" . $conn->error;
}

$conn->close();
exit();
}
else{
  header('Location: http://localhost/InventoryManagementSystem/DealerDashboard.php');
}


//else check what to print when PId is empty.

}
function validatePId($id){
echo $_POST["PId"];
  if ($id==='') {

    $showPIdError=true;
return 0;
   }
   else {
     $showPIdError=false;
return 1;
   }
}
$valid=0;
$processed=0;
$ErrorPId=$ErrorQty="";
if ($_SERVER['REQUEST_METHOD']== "POST" && $processed==1) {
   if (empty($_POST["PId"]) || !preg_match("/^[a-zA-Z0-9 ]{7}$/",$_POST["PId"])) {
echo"OK";
     $valid=0;
      $ErrorPId = "ProductId is required";
   }
   if (empty($_POST["Quantity"]) || $_POST["Quantity"]<0) {
     $valid=0;
      $ErrorQty = "Quantity should be greater than 0";
   }
   else {
     echo"NO";
   }

echo $valid;
if($valid){
 header('Location: TemporaryDisplay.php');
 exit();
  }
}
?>
<body style="background-color:#BBDEFB">

  <div class="w3-sidebar w3-bar-block w3-animate-left" style="display:none;z-index:5 " id="mySidebar">
    <button class="w3-bar-item w3-button w3-large" onclick="w3_close()">Close &times;</button>


    <span class="Welcome-msg">Welcome Archana</span>
  <a href="DealerDashboard.php" class="w3-bar-item w3-button " style="  margin:50px;
      margin-left:10px;
">Home</a>
    <a href="PlaceOrder1.php" class="w3-bar-item w3-button" style="  margin:50px;
      margin-left:10px;
">Place order</a>
    <a href="DetailChange.php" class="w3-bar-item w3-button" style="  margin:50px;
      margin-left:10px;
">Request detail change</a>
    <a href="TemporaryLogout.php" class="w3-bar-item w3-button" style="  margin:50px;
      margin-left:10px;
">Logout</a>
  </div>

  <div class="w3-overlay w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" id="myOverlay"></div>

  <div>
    <button class="w3-button w3-white w3-xxlarge" onclick="w3_open()">&#9776;</button>

    <div class="w3-container">
<h1 class="Heading" style="color:#283593; text-align:center;">Place Order</h1>
<form action="" id="DealerForm" method="POST" style="background-color:#E6E6FA;    width: 900px;
    height:850px;
    margin: 0 auto;

" >
<!--
<span class="SelectMethod" style="padding-left:150px;margin-top:150px;">
<input type="radio" name="SelectOption" id="SOptProduct"  checked>Order by product id
</span>
<span class="SelectMethod" style="padding-left:250px;padding-right:250px;">
<input type="radio" name="SelectOption" id="SOptSupplier" >Order by product description
</span>
-->
<br/>
<div style="margin:0 auto; padding-left:250px;padding-top:50px;padding-bottom:40px;">
<label for="PId">Product ID</label>
<span class="Details"style="padding-left:180px; padding-bottom:50px;" >
<input type="text" name="PId" id="PId" placeholder="Enter product ID" size="12" data-toggle="tooltip" title="Enter valid product id" autofocus  />
<span class = "error" style="color:red";>*Mandatory</span>
<span class="error" <?php if ($showPIdError===true){?>style="display:block"<?php } ?>></span>
</span >

</div>
<br/>
<span class="CustomerTypeLabel" style="width:50%;margin-auto;padding-left:250px;">
<label for="CType"> Customer</label>
</span>
<span class="CustomerTypeLabel" style="width:50%;margin-auto;padding-top:200px;padding-left:200px;">

<select name="CType" id="CType" title="Select customer type">
  <option value="Men">Men</option>
  <option value="Women">Women</option>
  <option value="Children">Children</option>
</select>
</span>

<div style="padding-top:60px;">
  <span style="padding-left:40px"><label>Type of order</label></span>
  <span class="OrderCategory" style="width:50%;padding-left:100px;margin-top:150px;">

<input type="radio" name="PType" id="Cloth"  value="Clothing" checked>Clothing
</span>
<span class="OrderCategory" style="width:50%;padding-left:200px;margin-top:150px;">

<input type="radio" name="PType" value="Footwear" id="Footwear">Footwear
</span>
</div>
<div style=" padding-top:50px;">
  <span class="OrderCategory" style="width:50%;padding-left:240px;margin-top:150px;">

<label>Category</label>
</span>
<span class="OrderCategory" style="width:50%;padding-left:200px;margin-top:150px;">

<select name="PCat" id="PCat" onChange="SelectOption(this)" title="Select category of product">
  <option value="Tshirts">Tshirts</option>
  <option value="Shirts">Shirts</option>
  <option value="Jeans">Jeans</option>
  <option value="Trousers">Trousers</option>
  <option value="Tops">Tops</option>
  <option value="Leggings">Leggings</option>
  <option value="Loafers">Loafers</option>
  <option value="Sneakers">Sneakers</option>
  <option value="Formal Shoes">Formal shoes</option>
  <option value="Sports shoes">Sports shoes</option>
  <option value="Ethnic footwear">Ethnic footwear</option>
</select>
</span>
</div>
<div style="padding-top:50px;">
  <span class="OrderColour" style="width:50%;padding-left:240px;margin-top:150px;">

  <label>Colour</label>
</span>
<span class="OrderColour" style="width:50%;padding-left:220px;margin-top:150px;">

<select name="Colour" id="Colour" title="Select colour of product">
<option value="Blue">Blue</option>
<option value="Black">Black</option>
<option value="Red">Red</option>
<option value="Purple">Purple</option>
</select>
</span>
</div>
<div style="padding-top:50px">
  <span class="OrderSize" style="width:50%;padding-left:240px;margin-top:150px;">
<label>Size</label>
</span>
<span class="OrderSize" style="width:50%;padding-left:240px;margin-top:150px;">

<select name="Size" id="Size" title="Select size of product">
<option value="XS">XS</option>
<option value="S">S</option>
<option value="M">M</option>
<option value="L">L</option>
<option value="XL">XL</option>
</select>
</span>
</div>
<div style="padding-top:50px">
  <span class="OrderDescription" style="width:50%;padding-left:240px;margin-top:150px;">
<label>Description</label>
</span>
<span class="OrderDescription" style="width:50%;padding-left:180px;margin-top:150px;">

<input type="textarea" rows=3 columns=20 name="Description" id="PDescription"  placeholder="Enter description of product" maxlength="140" title="Product's description can be maximum 140 characters long" />
</span>
</div>


<div style="padding-top:60px;">
<span class="OrderQty" style="width:50%;padding-left:240px;margin-top:150px;">
<label>Quantity</label>
</span>
<span class="OrderQty" style="width:50%;padding-left:200px;margin-top:150px;">

<input type="text" name="Qty" id="qty" size=18  placeholder="Quantity to order" title="Quantity of product should be greater than 0" pattern="^[1-9][0-9]*$"/>
</span>
<br/>
<div style="width:50%;margin-auto;padding-top:90px;padding-left:390px;">
<button type="submit" form="DealerForm" value="Place order" style="color:#283593;" name="submit" >Submit</button>
</div>
</form>

    </div>
  </div>


  <script>

  $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});

  function w3_open() {
      document.getElementById("mySidebar").style.display = "block";
      document.getElementById("myOverlay").style.display = "block";
  }
  function w3_close() {
      document.getElementById("mySidebar").style.display = "none";
      document.getElementById("myOverlay").style.display = "none";
  }
 function validateFields(){
    var pId=<?php echo validatePId(document.getElementById("PId").value);?> ;
if(pId===''){
    alert(pId);
return false;
}
return true;
  }
  </script>

  </body>
  </html>
