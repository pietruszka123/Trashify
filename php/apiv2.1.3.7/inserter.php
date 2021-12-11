<?php
$mysqli = new mysqli('localhost', 'root', '', 'smietnik');
if ($mysqli === false) {
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}

$data = json_decode(file_get_contents('php://input'), true);
//var_dump($data);

$json = json_encode($data["productInfo"]);
$sql = "INSERT IGNORE INTO  `products` (`productCode`, `productInfo`) VALUES (?, ?);";
if ($stmt = $mysqli->prepare($sql)) {
    $stmt->bind_param("ss", $data["ProductCode"], $json);
    if ($stmt->execute()) {

        echo json_encode(["status" => true]);
        $mysqli->close();
        die();
    }
}
echo $mysqli->error;
$mysqli->close();
echo json_encode(["status" => false]);
