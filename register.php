<?php

class Dealer
{
    public $username;
    public $password;
    public $dealerName;
    public $address;
    public $contactNumber;
    public $emailID;
    public $businessType;
    public function Dealer()
    {
        foreach($_POST as $key=>$data)
        {
            $this->$key = $data;
        }
    }
    public function getStringForDB()
    {
        return "'$this->username','$this->password', '$this->dealerName','$this->address','$this->contactNumber','$this->emailID','$this->businessType'";
    }
};

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inventorymanagerdb";

$NewEntry = new Dealer();
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "insert into dealers (Username, Password, DealerName, Address, ContactNumber, EmailID, BusinessType )
values (".$NewEntry->getStringForDB().")";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?> 