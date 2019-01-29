<?php
/*
 *
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

<?php
$request =  $_POST["familyname"];
$sql = "SELECT PersonID, FirstName, LastName, Address_1,Address_2, City,Postcode,Email,Gender,notes
FROM persons where LastName = '$request' ";


$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["PersonID"]. " - Name: " . $row["FirstName"]. " " . $row["LastName"]. " ".
        "<BR>"."- Address: " . $row["Address_1"]. " " . $row["Address_2"].", ". $row["City"]." " .
         $row["Postcode"]. "<br>". "Email : ". $row["Email"]."<p>"."<p>";
         echo "Notes:" . $row["notes"] . "<br><hr>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>


</body>
</html>
