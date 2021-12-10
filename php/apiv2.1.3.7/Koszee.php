<?php
$mysqli = new mysqli('localhost', 'root', '', 'smietnik');
if ($mysqli === false) {
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}

$sql = "SELECT * FROM trashcans WHERE 1;";

$data = json_decode(file_get_contents('php://input'), true);
$r = ["status" => false];
$result = $mysqli->query($sql);
if ($result !== false && $result->num_rows != 0) {
    $r["status"] = true;
    $r["data"] = [];
    while ($row = $result->fetch_assoc()) {
        array_push($r["data"], ["type" => $row["trashCanType"], "location" => json_decode($row["trashCanLocation"]), "trashCanAcceptance" => $row["trashCanAcceptance"]]);
    }
} else {
    $r["status"] = true;
    $r["data"] = [];
}
echo json_encode($r);
$mysqli->close();
