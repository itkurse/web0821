<?php
// Wo befindet sich die Datenbank?
$host = "localhost";
$dbName = "personen";
$dbUser = "root";
$dbPassword = ""; 

// Verbindung zur Datenbank herstellen
$connection = new PDO("mysql:dbname=$dbName; host=$host", 
                        $dbUser, $dbPassword);
// Damit Exceptions ausgegeben werden
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>