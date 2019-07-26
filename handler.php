<?php

if (file_exists("data.json")) {
    $handle = fopen('data.json', 'rb');
    $str = fread($handle, filesize('data.json'));
    fclose($handle);
    $data = json_decode($str,true);
}
else {
    $data = ['10' => 10,
        '5' => 20];
}


$banknote10 = $_POST["banknote10"] ? $_POST["banknote10"] :0;
$banknote5 = $_POST["banknote5"] ? $_POST["banknote5"] :0;

$err = '';
if (filter_var($banknote5, FILTER_VALIDATE_INT) == false && $banknote5 != '0') {
    $err = $err . "Введіть правильне значення для купюр по 5 грн<br>";
}
if (!filter_var($banknote10, FILTER_VALIDATE_INT ) && $banknote10 != '0') {
    $err = $err . "Введіть правильне значення для купюр по 10 грн<br>";
}
if ($err != '') {
    echo $err;
    echo '<a href="index.php">Back</a>';
    die();
}

$data['10'] -= $banknote10;
$data['5'] -= $banknote5;

$handle = fopen('data.json', 'wb');

$str = json_encode($data);
fwrite($handle, $str);
fclose($handle);

echo "<h3>З рахунку знято $banknote10 банкнот номіналом 10 грн та "
. "$banknote5 банкнот номіналом 5 грн</h3>";

include "table.php";
printTable($data);

?>




<br>
<a href="index.php">Back</a>
