<?php
header("Content-Type: text/html; charset=utf-8");
require("./simplehtmldom/simple_html_dom.php");

$foxtrot = file_get_html('https://www.foxtrot.com.ua/ru/shop/noutbuki.html'); 

$names = [];
$links = [];
$names_parse = $foxtrot->find(".card__body a.card__title");
$price_parse = $foxtrot->find(".card__price");

if(count($foxtrot->find(".card__body a.card__title"))){
    foreach ($names_parse as $a_value) {
        $names[] = $a_value->innertext;
        $links[] = $a_value->href;
    }
}

// print_r($names);
// print_r($links);

echo "<ul>";
for ($i=0; $i < count($names); $i++) { 
    echo "<li><strong>Name: </strong><a href='{$links[$i]}'>{$names[$i]}</a></li>\n";
}
echo "</ul>";