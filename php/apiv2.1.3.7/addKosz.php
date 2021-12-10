<?php
$mysqli = new mysqli('localhost', 'root', '', 'smietnik');
if ($mysqli === false) {
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}

$data = json_decode(file_get_contents('php://input'), true);
//var_dump($data);

$json = json_encode($data["trashCanLocation"]);


$sql = "INSERT IGNORE INTO  `trashcans` (`trashCanType`, `trashCanLocation`,`trashCanAcceptance`) VALUES (?, ?,?);";
if ($stmt = $mysqli->prepare($sql)) {
    $stmt->bind_param("sss", $data["trashCanType"], $json, $data["trashCanAcceptance"]);
    if ($stmt->execute()) {

        echo '{status:true}';
        $mysqli->close();
        die();
    }
}
echo $mysqli->error;
$mysqli->close();
echo '{status:false}';
