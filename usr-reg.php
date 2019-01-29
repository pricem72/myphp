<?php
/*
 *
 * Created by PhpStorm.
 * User: mprice
 * Date: 17/12/2018
 * Time: 15:43
 */

$servername = "localhost";
$username = "test";
$password = "test";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    echo "<h1>system error</h1>";
}
echo "Connected successfully";
echo "<br><br>";
?>
<html>
<head>
    <title>Web Database System</title>
</head>




User record created for   <?php echo $_POST["givenname"];  ?> <br><br>
Name:             <?php echo $_POST["givenname"]; echo " "; echo $_POST["familyname"];?> <BR>
E-mail:           <?php echo $_POST["email"];?> <br>
Address line 1:   <?php echo $_POST["add1"];?> <BR>
Address line 2:   <?php echo $_POST["add2"];?> <BR>
City:             <?php echo $_POST["city"];?> <BR>
Postcode:         <?php echo $_POST["pcode"];?> <BR>
E-Mail:           <?php echo $_POST["email"];?> <BR>
Gender:           <?php if ( $_POST["gender1"]== "f") { echo "female"; }
                    elseif ( $_POST["gender1"]== "m") { echo "male"; }
                    else if ( $_POST["gender1"]== "o") { echo "Other"; };?> <BR>
Notes             <?php echo $_POST["notes"];?> <BR>
<?php
/*
 *
 *assign inputs to varribles
 *
*/
$givenname = $_POST["givenname"];
$familyname = $_POST["familyname"];
$emailadd = $_POST["email"];
$address1 = $_POST["add1"];
$address2 = $_POST["add2"];
$city = $_POST["city"];
$pcode = $_POST["pcode"];
if ( $_POST["gender1"]== "f") { $Gender = "Female"; }
elseif ( $_POST["gender1"]== "m") { $Gender = "Male"; }
else if ( $_POST["gender1"]== "o") { $Gender = "Other"; };
$noteblob = $_POST["notes"];?>
 <BR><BR>
<p>
    Notes:   <?php echo $noteblob ?>
</p>

<?php
$sql = "INSERT INTO persons (FirstName, LastName, Address_1,Address_2, City,Postcode,Email,Gender,notes)
VALUES ('$givenname', '$familyname','$address1','$address2','$city','$pcode',  '$emailadd','$Gender','$noteblob')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>


</body>
</html>
