<?php

$host = 'localhost';
$db = 'acetrain';
$dbusername = 'root';
$dbpassword = '';

$dsn = "mysql:host=$host;dbname=$db";

try {
    // create a database connection with the configuration data
    $conn = new PDO($dsn, $dbusername, $dbpassword);
    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // display a message if connected to database successfully
    if ($conn) {
      //  echo "Connected to the <strong>$db</strong> database successfully!";
    }
} catch (PDOException $e) {
    echo "Database connection error";
    echo $e->getMessage();
}
?>
