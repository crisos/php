<!DOCTYPE html>
<html>
<body>

Trying to log <br>
<?php
echo "On login : " .$_POST["login"]. "<br>";
echo 'With password : ' .$_POST["pwd"]. "<br>";

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

$sql = "SELECT *
		FROM login
		WHERE PK_LOGIN='".$_POST["login"]."'";
echo $sql."<br>";
$result = $conn->query($sql);

$row=array("PK_LOGIN","AT_PWD");
if ($result->num_rows > 0) {
    // output data of each row
    //while($row = $result->fetch_assoc()) {
	$row = $result->fetch_assoc();
        echo "login: " . $row["PK_LOGIN"]. " - pwd: " . $row["AT_PWD"]. "<br>";
    //}
} else {
    echo "0 results";
}

//if ( strcmp(\"$_POST["login"]\", \"$row["PK_LOGIN"]\")==0 && strcmp(\"$_POST["pwd"]\", \"$row["AT_PWD"]\")==0 ) {
if ( !empty($row) && $_POST["login"] == $row["PK_LOGIN"] && $_POST["pwd"] == $row["AT_PWD"] ) {
	echo " Successfully connected ! ";
} else {
	echo " Something is wrong BABAY ;)";
}
/*$a = "test";
$b = "test";
if ( $a == $b ){
	echo " Successfully connected ! ";
} else {
	echo " Something is wrong BABAY ;)";
}*/
	
$conn->close();

?>

</body>
</html>