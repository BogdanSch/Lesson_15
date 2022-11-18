<?php
header("Content-Type: text/html; charset=utf-8");
require("./simplehtmldom/simple_html_dom.php");

$foxtrot = file_get_html('https://www.foxtrot.com.ua/ru/shop/mobilnye_telefony_smartfon.html'); 

$names = [];
$prices = [];
$names_parse = $foxtrot->find(".card__body a.card__title");
$price_parse = $foxtrot->find(".card__price .card-price");

if(count($foxtrot->find(".card__body a.card__title"))){
    foreach ($names_parse as $a_value) {
        $names[] = $a_value->innertext;
    }
}
if(count($foxtrot->find(".card__price .card-price"))){
    foreach ($price_parse as $c_value) {
        trim($c_value);
        $prices[] = ((explode("₴", $c_value->innertext)[0]));
    }
}
function write_csv($phones){
    $fp = fopen ('phones.csv' , 'w'); 
    foreach ($phones as $fields) { 
        fputcsv ($fp , $fields); 
    } 
    fclose ($fp);
}
function sort_prices($a, $b){
    // print $a[1];
    return $a[1] <=> $b[1];
}

$phones = [];
for ($i=0; $i < count($names); $i++) { 
    array_push($phones, [$names[$i], $prices[$i]]);
}

uasort($phones, "sort_prices");
write_csv($phones);