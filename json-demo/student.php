<?php

$h = fopen("student.json","r+"); // відкриваємо файл на запис та читання
$content = fread($h, filesize("student.json")); // зчитує вміст всього файлу
$student = json_decode($content); // декодує вміст файлу
print_r($student);  // виводить на екран як об'єкт
echo $student->firstName; // виводить на екран властивість firstName