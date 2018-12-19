 <?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "catalogue";




// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$x=mysqli_real_escape_string($conn,$_POST["nom"]);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "DELETE FROM fonction WHERE nom LIKE '$x'";


?>
<html><br></html>
<?php
if ($conn->query($sql) === TRUE) {
    echo "Fonctionnalité supprimée";
} 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?> 
<html><br><br><a href="fonctionnalités.php">Retour</a></html>