<?php
// admin_database.php - PHP script to connect to the MySQL database

$host = 'localhost';          // Hostname of the database server
$dbname = 'UserDB';           // Database name
$username = 'root';           // Database username
$password = '';               // Database password

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    error_log("Connection failed: " . $e->getMessage());
    die();
}
?>
