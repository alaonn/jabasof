 <?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "catalogue";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    
  
}
$x=mysqli_real_escape_string($conn,$_POST["nom"]);
$y=mysqli_real_escape_string($conn,$_POST["description"]);

$check = "SELECT * from fonction where nom LIKE '$x'";
$result = $conn->query($check);


if (!$result) {
    trigger_error('Invalid query: ' . $conn->error);
}

if($result->num_rows < 1)
{
    $x=mysqli_real_escape_string($conn,$_POST["nom"]);
    $y=mysqli_real_escape_string($conn,$_POST["description"]);
    $sql = "INSERT INTO fonction (nom, description)
    VALUES ('{$x}', '{$y}')";
    if ($conn->query($sql) === TRUE) {
        echo "Fonctionnalité ajoutée";
    }
        else {
            echo"Fonctionnalité non ajoutée";
        }
    }

else if($result->num_rows >= 1) {
         echo"Fonctionnalité déjà ajoutée, entrer un nom différent";
    }
    




$conn->close();
?> 

<html><br><br><a href="fonctionnalités.php">Retour</a></html>