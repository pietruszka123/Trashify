<?php

$mysqli = new mysqli('localhost', 'root', '', 'smietnik');

$sql = "SELECT * FROM products WHERE productCode = ?";

if ($stmt = $mysqli->prepare($sql)) {
    $stmt->bind_param("s", $productCode);
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
    }
}
