<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "multiuserlogin";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
if(isset($_POST["save"]))
{
	$user =$_POST["user"];
	$pass =$_POST["pass"];
	
	
$sql = "INSERT INTO multiuserlogin (username, password,usertype)
VALUES ('$user', '$pass', 'user')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}

$conn->close();

?>
<form  method="post">
	Username<input type="text" name="user"><br>
	Password<input type="text" name="pass"><br>
	<input type="submit" name="save" value="Submit">
	</button>
</form>

