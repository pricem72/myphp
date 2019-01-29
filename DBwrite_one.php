<?php
<?php
/*
 *
 * Created by PhpStorm.
 * User: mprice
 * Date: 17/12/2018
 * Time: 15:43
 */
?>
<?php
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
    <title>Web Database Development System</title>
</head>
<body>

Welcome           <?php echo $_POST["givenname"]; $givenname = $_POST["givenname"] ?> <br><br>
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

 <BR><BR>
<p>
    Notes:   <?php echo $_POST["notes"] ?>
</p>

<?php
$sql = "SELECT PersonID, FirstName, LastName, Address_1,Address_2, City,Postcode,Email,Gender,notes FROM persons";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["PersonID"]. " - Name: " . $row["FirstName"]. " " . $row["LastName"]. " ". "<BR>"."- Address: " . $row["Address_1"]. " " . $row["Address_2"].", ". $row["City"]." " . $row["Postcode"]. "<br>". "<hr>"."<BR>";
    }
} else {
    echo "0 results";
}
$sql = "INSERT INTO persons (FirstName, LastName, Address_1,Address_2, City,Postcode,Email,Gender,notes)
VALUES ($givenname, 'Doe','address1_data','address2_data','city_data','postcode',  'john@example.com','Gender_dat','notes_data')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>


</body>
</html>
