<?php

$mysqli = new mysqli('localhost', 'root', '', 'smietnik');



$data = json_decode(file_get_contents('php://input'), true);
if ($data["productCode"] == "random") {
    GetRANDOM();
} else {
    Get();
}
$mysqli->close();

function GetRANDOM()
{
    global $mysqli;
    $sql = "SELECT * FROM products ORDER BY RAND() LIMIT 1";
    $r = ["status" => false];
    if ($stmt = $mysqli->prepare($sql)) {
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            if (isset($row)) {
                $r["status"] = true;
                $r["data"] =  $row;
                $r["data"]["productInfo"] = json_decode($row["productInfo"]);
            }
        }
    }
    echo json_encode($r);
}
function Get()
{
    global $mysqli;
    global $data;
    $sql = "SELECT * FROM products WHERE productCode = ?";
    $r = ["status" => false];
    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param("s", $data["productCode"]);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            if (isset($row)) {
                $r["status"] = true;
                $r["data"] =  $row;
                unset($r["data"]["productImage"]);
                $r["data"]["productInfo"] = json_decode($row["productInfo"]);
                $r["data"]["image"] = base64_encode($row["productImage"]);
            }
        }
    }
    echo json_encode($r);
}
