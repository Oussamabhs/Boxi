 <?php
$servername = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "e-shop";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbuser, $dbpassword);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}


?> 
