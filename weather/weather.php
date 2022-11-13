<?php
$city = "Kiev";
$w_decode;

if(isset($_GET['SUBMIT'])){
    $city = $_GET['city'];
    $weather_city = file_get_contents('https://api.openweathermap.org/data/2.5/weather?q='.$city.'&APPID=fada024d74ea8c82c596e30e55e3f9d1&units=metric');
    $w_decode = json_decode($weather_city);
}

// function convert_to_celsius($fahrenheit){
//     echo $fahrenheit;
//     return round(($fahrenheit - 32) / 1.8, 1);
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather</title>
</head>
<body>
    <h1>Get the weather wherever you want</h1>
    <form method="GET" action="<?= $_SERVER['PHP_SELF']?>"/>
        Введіть інтересуюче місто: <input type="text" name="city"/><br/>
        <input type="submit" name="SUBMIT" value="Підтвердити"/>
     </form>
    <h2>
        <?php 
        if(isset($_GET['SUBMIT'])){
            echo "In country {$w_decode->sys->country}: <br>";
            echo "The temperature is ".($w_decode->main->temp)."C<br>";
            echo "The weather status is {$w_decode->weather[0]->main}<br>";
            echo "The pressure is {$w_decode->main->pressure} PA<br>";
            echo "The wind speed is {$w_decode->wind->speed} miles per hour<br>";
        }
        ?>
    </h2>
</body>
</html>