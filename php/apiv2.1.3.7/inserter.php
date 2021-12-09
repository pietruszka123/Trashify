<?php

$mysqli = new mysqli('localhost', 'root', '', 'smietnik');
if ($mysqli === false) {
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}

$data = json_decode(file_get_contents('php://input'), true);
//var_dump($data);
$a = "a";
$b = "b";
$sql = "INSERT INTO `products` (`productCode`, `productInfo`) VALUES (?, ?)";
if ($stmt = $mysqli->prepare($sql)) {
    //$stmt->bind_param("ss", $data["code"], $data["product"]["abbreviated_product_name"]);
    $stmt->bind_param("ss", $a, $b);
    if ($stmt->execute()) {

        echo '{status:1}';
        $mysqli->close();
        die();
    }
}
echo $mysqli->error;
$mysqli->close();
echo '{status:0}';
