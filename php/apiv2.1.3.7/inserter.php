<?php
include_once('../functions.php');
//$mysqli = new mysqli('localhost', 'root', '', 'smietnik');
//if ($mysqli === false) {
//    die("ERROR: Could not connect. " . $mysqli->connect_error);
//}

$data = json_decode(file_get_contents('php://input'), true);

$json = json_encode($data["productInfo"]);
if (isset($data["image"])) {
    $imageData = base64_decode($data["image"]);
} else {
    $imageData = null;
}
if (checkIfProductExists($data["productCode"])) {
    updateProduct($data["productCode"], $imageData, $json);
} else {
    $sql = "INSERT IGNORE INTO  `products` (`productCode`, `productInfo`,`productImage`) VALUES (?, ?, ?);";
    if ($stmt = $mysqli->prepare($sql)) {
        $n = null;
        $stmt->bind_param("ssb", $data["productCode"], $json, $n);
        $stmt->send_long_data(2, $imageData);
        if ($stmt->execute()) {
            echo json_encode(["status" => true]);
            $mysqli->close();
            die();
        }
    }
    $mysqli->close();
    echo json_encode(["status" => false]);
}


//