<?php
    
    class Dealer
    {
        public $Username;
        public $Password;
        public $DealerName;
        public $Address;
        public $ContactNumber;
        public $EmailID;
        public $BusinessType;
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
    
    $passwordError = $dealercontactError = "";
    if(!empty($_POST["Password"]))
    {
        $state = true;
        if($_POST["Password"] != $_POST["cpassword"])
        {
            $state = false;
            $passwordError = "The passwords do not match!";
        }
        if(!preg_match("/^[6789]\d{9}$/",$_POST["ContactNumber"]))
        {
            $state = false;
            $dealercontactError = "Invalid contact number";
        }
        if(!preg_match("/@\w+\.\w+/",$_POST["EmailID"]))
        {
            $state = false;
            $emailidError = "Email id is invalid";
        }
        // if($state != false)
        // {
        //     $dealer = new Dealer();
        //     echo "Sending...";?>
        <!-- //     <form name='fr' action='register.php' method='POST'>
        //     <input type='hidden' name='username' value='<?php $dealer->Username?>'>
        //     <input type='hidden' name='password' value='<?php $dealer->Password?>'>
        //     <input type='hidden' name='dealerName' value='<?php $dealer->DealerName?>'>
        //     <input type='hidden' name='contactNumber' value='<?php $dealer->ContactNumber?>'>
        //     <input type='hidden' name='address' value='<?php $dealer->Address?>'>
        //     <input type='hidden' name='emailID' value='<?php $dealer->EmailID?>'>
        //     <input type = "submit" value= "Submit">
        //     </form> -->
        <!-- //     <!-- <script type='text/javascript'> -->
        <!-- //     document.fr.submit();
        //     </script> --><?php
        // }
    }
?>

<!DOCTYPE html>
    <html>
        <head>
            <link rel="stylesheet" href="default.css" type="text/css" />
        </head>
        <body>
            <center>
            <h1 >Register</h1><h2>Dealer</h2>
            <form class = "form-class" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method ="POST" >
            <table>
                    <tr>
                        <td>Username:</td>
                        <td><input type="text" name="Username" id="Username" required></td>
                    </tr>
                    <tr>
                        <td colspan = "3"><center><span id="UsernameError"></span></center></td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td><input type="password" name="Password" required></td>
                    </tr>
                    <tr>
                        <td>Confirm Password:</td>
                        <td><input type="password" name="cpassword" required></td>
                    </tr>
                    <tr>
                        <td colspan = "3"><center><span class="error"><?php echo $passwordError??"";?></span></center></td>
                    </tr>
                    <tr>
                        <td>Dealer name:</td>
                        <td><input type="text" name="DealerName" required></td>
                    </tr>
                    <tr>
                        <td>Dealer Contact:</td>
                        <td><input type="text" name="ContactNumber" required></td>
                    </tr>
                    <tr>
                        <td colspan = "3"><center><span class="error"><?php echo $dealercontactError??"";?></span></center></td>
                    </tr>
                    <tr>
                        <td>Dealer Address:</td>
                        <td><textarea name="Address" rows="10" cols="30" required></textarea></td>
                    </tr>
                    <tr>
                        <td>Email-id:</td>
                        <td><input type="text" name="EmailID" id="email" required></td>
                    </tr>
                    <tr>
                        <td colspan = "3"><center><span class="error"><?php echo $emailidError??"";?></span></center></td>
                    </tr>
                    <tr>
                        <td colspan = "3"><center><span id="EmailError"></span></center></td>
                    </tr>
                    <tr>
                        <td>Business Type:</td>
                        <td><select name="BusinessType" required>
                            <option value="Small">Small</option>
                            <option value="Intermediate">Intermediate</option>
                            <option value="Large">Large</option>
                        </select></td>
                    </tr>
                <tr ><td colspan = "3"><center><input type="submit" value = "Register"></center></td></tr>
            </form>
        </center>
        </body>
    </html>