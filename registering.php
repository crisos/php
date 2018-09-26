<!DOCTYPE html>
<html>
<body>

Registering <br>
<?php
echo "Printing the received datas <br>";
echo "Your login : " .$_POST["login"]. "<br>";
echo 'Your password : ' .$_POST["pwd"]. "<br>";

$servername = "localhost";
$username = "root";
$password = "";
$data_base = "logintest";
// Create connection
$conn = new mysqli($servername, $username, $password, $data_base);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
echo "<br>";

/*$sql = "INSERT INTO login ($_POST["login"], lastname, email)
VALUES ('John', 'Doe', 'john@example.com')";*/

/*$sql = "INSERT INTO login 
		VALUES (\""
		.$_POST["login"]).
		"\", \""
		.$_POST["pwd"].
		"\")";*/
$sql = "INSERT INTO login 
		VALUES (\""
		.$_POST["login"].
		"\",\""
		.$_POST["pwd"].
		"\")";
echo $sql;
echo "<br>";
//$sql = "INSERT INTO login (PK_LOGIN, AT_PWD) VALUES (".mysqli_escape_string($_POST["login"]).", ".mysqli_escape_string($_POST["pwd"]).")";
//$sql = "INSERT INTO login (PK_LOGIN, AT_PWD) VALUES (\"myLogin\", \"myPwd\")";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
	
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

</body>
</html>