<?php

$mysqli = new mysqli('localhost', 'root', '', 'smietnik');

$sql = "INSERT INTO products(`productCode`, `productInfo`) VALUES (?, ?)";
$data = json_decode(file_get_contents('php://input'), true);
//var_dump($data);
if ($stmt = $mysqli->prepare($sql)) {
    $stmt->bind_param("ss", $data["code"], $data["product"]["abbreviated_product_name"]);
    if ($stmt->execute()) {
        echo '{status:1}';
        $mysqli->close();
        die();
    }
}
$mysqli->close();
echo '{status:0}';
