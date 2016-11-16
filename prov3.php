<?php

$adres = "localhost";

// polacznie z baza
try {
$pdo = new PDO("mysql:host=".$adres.";dbname=provider3", "provider3", "provider");

$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//echo "udalo sie polaczyc z baza";
}

 catch (
	 PDOException $wyjatek) 
 {
 	echo "nie udalo sie polaczyc z baza";
 	
 }

//$pdo->query("select * from trumny");

$przechdane = $pdo->query("select * from urna");
//var_dump($przechdane);
$wyniktrumien = $przechdane->fetchAll(PDO::FETCH_ASSOC);
 
// var_dump($wyniktrumien);

header('Content-Type: application/json');
echo json_encode($wyniktrumien);