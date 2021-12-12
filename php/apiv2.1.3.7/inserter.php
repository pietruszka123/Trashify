<?php
$mysqli = new mysqli('localhost', 'root', '', 'smietnik');
if ($mysqli === false) {
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}

$data = json_decode(file_get_contents('php://input'), true);
//var_dump($data);

$json = json_encode($data["productInfo"]);
if (isset($data["image"])) {
    $imageData = base64_decode($data["image"]);
} else {
    $imageData = null;
}
file_put_contents('test.png', $imageData);
//$imageData = $mysqli->escape_string($imageData);
$json = "test";
$sql = "INSERT IGNORE INTO  `products` (`productCode`, `productInfo`) VALUES (?, ?);";
if ($stmt = $mysqli->prepare($sql)) {
    $stmt->bind_param("ss", $data["ProductCode"], $json);
    //chce zobaczyc jak sql wyglada;

    //INSERT IGNORE INTO `products` (`productCode`, `productInfo`,`productImage`) VALUES (?, ?, ?);
    // ale czy dane sie dobrze wpisuja
    //nie da się zobaczyć wszystko jest po stronie mysql
    //powinno sie pokazac w inserter.php
    // ale nwm jak tam dane przekazujesz

    //Column count doesn't match value count at row 1
    echo $sql;
    if ($stmt->execute()) {
        echo json_encode(["status" => true]);
        $mysqli->close();
        die();
    }
}
echo $mysqli->error;
$mysqli->close();
echo json_encode(["status" => false]);
/*  z neta i tu jest get contents zamiast put contents
<?php
	$dbh = mysqli_connect("localhost", "user");
	mysqli_select_db($dbh, "test");
	$data = file_get_contents("testimage.jpg");
	// This is important to avoid a ' to accidentally close a string
	$data = mysqli_real_escape_string($dbh, $data);
	mysqli_query($dbh, "INSERT INTO testblob(data) VALUES ('$data')");
?>
*/