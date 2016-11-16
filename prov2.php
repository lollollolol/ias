<?php

$username = "provider2";
$password = "provider";
$host= "localhost";

try {
    $handler = new PDO("mysql:host=$host;dbname=produkty", $username, $password);
    // set the PDO error mode to exception
    $handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    echo "Connected successfully";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
   
$przechowalnia = $handler->query("SELECT * FROM trumny_wro");

$wyniktrumien = $przechowalnia->fetchAll(PDO::FETCH_ASSOC);

header("Content-type:application/json");
echo json_encode($wyniktrumien);

