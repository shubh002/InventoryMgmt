<!DOCTYPE html>
    <html>
        <head>
            <link rel="stylesheet" href="default.css" type="text/css" />
            <!-- <script type = "text/javascript">
        var check = function() {
            if (document.getElementById('Password').value != null && document.getElementById('Password').value == document.getElementById('cpassword').value) {
              document.getElementById('error').style.color = 'green';
              document.getElementById('error').innerHTML = 'Matching';
            } else {
              document.getElementById('error').style.color = 'red';
              document.getElementById('error').innerHTML = 'Does not match';
            }
          }
          </script> -->
        </head>
        <body>
            <a href = "./Registrations/RegisterDealer.php">Register-Dealer</a>
            <a href = "./Registrations/RegisterSupplier.php">Register-Supplier</a>
            <center>
            <?php# require_once("../Shared/LoginShared.php") ?>
            <?php require_once("./Shared/All.php")?>
            <?php require_once("./Shared/All.php")?>
            <div class="Transparent">
            <p class="Header2">Login</p>
            <form class = "form-class" action="Login.php" method ="POST" >
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
                        <td><input type="password" name="Password" id="Password" required></td>
                    </tr>
                    <tr>
                        <td></td><td><span id="error" class="error"><?php echo $passwordError??"";?></span></td>
                    </tr>
                    
                <tr ><td colspan = "3"><br><br><center><input type="submit" value = "Login" width = "25px"></center></td></tr>
            </form>
        </center>
        </div>
        </body>
    </html>