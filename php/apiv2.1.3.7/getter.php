<?php

$mysqli = new mysqli('localhost', 'root', '', 'smietnik');

$sql = "SELECT * FROM products WHERE productCode = ?";

$data = json_decode(file_get_contents('php://input'), true);
$r = ["status" => false];
if ($stmt = $mysqli->prepare($sql)) {
    $stmt->bind_param("s", $data["productCode"]);
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        if (isset($row)) {
            $r["status"] = true;
            $r["data"] = $row;
        }
    }
}
echo json_encode($r);
