<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<form method="post" action="handler.php">
    10: <br>
    <input type="text" value="1" name="banknote10">
    <br>
    5: <br>
    <input type="text" value="1" name="banknote5">
    <br>
    <input type="submit" value="Give me money">
</form>
<?php
if (file_exists("data.json")) {
    $handle = fopen('data.json', 'rb');
    $str = fread($handle, filesize('data.json'));
    fclose($handle);
    $data = json_decode($str, true);
}

include "table.php";
printTable($data);
?>



</body>
</html>