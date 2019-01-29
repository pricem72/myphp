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
}
echo "Connected successfully";
echo "<br><br>";


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
$conn->close();
?>
