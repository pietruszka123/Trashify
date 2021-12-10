<?php
$mysqli = new mysqli('localhost', 'root', '', 'smietnik');
if ($mysqli === false) {
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}

$data = json_decode(file_get_contents('php://input'), true);
//var_dump($data);

$json = json_encode($data["product"]);
$sql = "INSERT IGNORE INTO  `products` (`productCode`, `productInfo`) VALUES (?, ?);";
if ($stmt = $mysqli->prepare($sql)) {
    $stmt->bind_param("ss", $data["code"], $json);
    if ($stmt->execute()) {

        echo '{status:true}';
        $mysqli->close();
        die();
    }
}
echo $mysqli->error;
$mysqli->close();
echo '{status:false}';
