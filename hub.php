
<?php
//$provider1 = file_get_contents("http://localhost/provider1");
//
//$tablicawynp1 = json_decode($provider1, true);
//
//var_dump($tablicawynp1);
//
//echo $_GET["sortby"];




// take data from providers
$provider1Response = file_get_contents('http://localhost//provider1');
$provider2Response = file_get_contents('http://localhost//provider2');
$provider3Response = file_get_contents('http://localhost//provider3');
$provider4Response = file_get_contents('http://localhost//provider4');

// parse data from JSON to arrays
$p1_products =  json_decode($provider1Response, true);
$p2_products = json_decode($provider2Response, true);
$p3_products = json_decode($provider3Response, true);
$p4_products = json_decode($provider4Response, true);

// transform arrays with data and merge it
$items = array_merge(convertP1_Products($p1_products), convertP2_Products($p2_products), convertP3_Products($p3_products), convertP4_Products($p4_products));

//// make some random order in response
//shuffle($items);

//// show response in JSON
//header('Content-Type: application/json');
//echo json_encode($items);

// tutaj musze posortowac
usort($items, 'compare');


 
// show response in JSON
header('Content-Type: application/json');
echo json_encode($items);

//funcja porownania
function compare($a, $b) {
  return strcasecmp($a[$_GET["nazwa"]], $b[$_GET["nazwa"]]);
}


function convertP1_Products($p1_products){
    $result = [];
    foreach ($p1_products as $p1_product){
        $item = [      
        	'ID' => $p1_product['ID'],
            'NAME' => $p1_product['NAZWA'],
            'SIZE' => $p1_product['WYMIARY'],
            'COLOR' => $p1_product['KOLOR'],
            'MATERIAL' => $p1_product['MATERIAL'],
            'PRICE' => $p1_product['CENA'],
            'typ' => 'COFFIN'
        ];
        array_push($result, $item);
    }
    return $result;
}

function convertP2_Products($p2_products){
    $result = [];
    foreach ($p2_products as $p2_product){
        $item = [
        	'ID' => $p2_product['PROD_ID'],
            'NAME' => $p2_product['NAZW_PROD'],
            'SIZE' => $p2_product['ROZMIAR'],
            'COLOR' => $p2_product['BARWA'],
            'MATERIAL' => $p2_product['NAZW_MATERIALU'],
            'PRICE' => $p2_product['CENA'],
            'typ' => 'COFFIN'
        ];
        array_push($result, $item);
    }
    return $result;
    
}    
    
    function convertP3_Products($p3_products){
    $result = [];
    foreach ($p3_products as $p3_product){
        $item = [
        	'ID' => $p3_product['ID'],
            'NAME' => $p3_product['NAZWA'],
            'SIZE' => $p3_product['POJEMNOSC'],
            'COLOR' => $p3_product['KOLOR'],
            'MATERIAL' => 'CERAMIKA',
            'PRICE' => $p3_product['CENA'],
            'typ' => 'URN'
        ];
        array_push($result, $item);
    }
    return $result;
    
}    
    
    function convertP4_Products($p4_products){
    $result = [];
    foreach ($p4_products as $p4_product){
        $item = [
        	'ID' => $p4_product['ID_PROD'],
            'NAME' => $p4_product['NAZWA_PROD'],
            'SIZE' => $p4_product['WYMIARY'],
            'COLOR' => $p4_product['KOLOR'],
            'MATERIAL' => $p4_product['MATERIAL'],
            'PRICE' => $p4_product['CENA'],
            'typ' => 'URN'
        ];
        array_push($result, $item);
    }
    return $result;
}
