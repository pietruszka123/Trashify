<?php

$mysqli = new mysqli('localhost', 'root', '', 'smietnik');

$sql = "INSERT INTO products(`productCode`, `productInfo`) VALUES (?, ?)";
var_dump($_POST);
if ($stmt = $mysqli->prepare($sql)) {
    $stmt->bind_param("ss", $productCode, $productInfo);
    if ($stmt->execute()) {
        echo '{status:1}';
        $mysqli->close();
        die();
    }
}
$mysqli->close();
echo '{status:1}';
