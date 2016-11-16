<?php


//$zmienna = "nowy";
//
//echo $zmienna;
//
//var_dump($zmienna);
//
//$tablica = [2,3,1,4,"tablica"];
//
//var_dump($tablica);

$adres = "localhost";
//$tekst = " ma kota";
//
//echo "ala".$tekst." ";

// polacznie z baza
try {
$pdo = new PDO("mysql:host=".$adres.";dbname=trumna", "provider1", "provider");

$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//echo "udalo sie polaczyc z baza";
}

 catch (
	 PDOException $wyjatek) 
 {
 	echo "nie udalo sie polaczyc z baza";
 	
 }

//$pdo->query("select * from trumny");

$przechdane = $pdo->query("select * from trumny");
//var_dump($przechdane);
$wyniktrumien = $przechdane->fetchAll(PDO::FETCH_ASSOC);
 
// var_dump($wyniktrumien);

header('Content-Type: application/json');
echo json_encode($wyniktrumien);








