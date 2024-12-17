<?php
header('Content-Type: application/json');


$jsonFile = 'animals.json';
$animals = json_decode(file_get_contents($jsonFile), true);

$filtered_animals = [];

$backgroundMap = [
    'savannah' => './img/savannah.webp',
    'ocean' => './img/ocean.webp',
    'forest' => './img/forest.webp',
    'antarctica' => './img/antarctica.webp',
];

foreach ($animals as $animal) {
    if(isset($_GET["habitat"]) && $_GET["habitat"] !== "") {
        if($backgroundMap[$_GET["habitat"]] == $animal["background"]) {
            $filtered_animals []= $animal;
        }
    } else {
        $filtered_animals []= $animal;
    }
    
}

echo json_encode($filtered_animals);