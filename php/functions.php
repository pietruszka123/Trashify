<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'smietnik');
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);


session_start();
if (isset($_COOKIE['token']) &&  $_COOKIE['token'] != "notSet" && isTokenValid($_COOKIE['token']) && $_SERVER['REQUEST_URI'] == '/Konkurs4/php/login.php') { //If the token is valid, then sends you to the index page (if already not somewhere else than login page)
    header("Location: index.php");
} else if (isset($_COOKIE['token']) &&  $_COOKIE['token'] != "notSet" && isTokenValid($_COOKIE['token'])) {;
} else { //If you don't have a cookie token then sets it to "notSet"
    setcookie("token", "notSet", 0, "/");
}



//Set cookie value if available
if (isset($_SESSION['token']) && isset($_SESSION['rememberMe'])) {
    setcookie("token", $_SESSION['token'], time() + (3600 * 24 * 31 * 12), "/");
} else if (isset($_SESSION['token']) && !isset($_SESSION['rememberMe'])) {
    setcookie("token", $_SESSION['token'], 0, "/");
}

//Dump these values
$_SESSION['token'] = NULL;
$_SESSION['rememberMe'] = NULL;





// Looks if the email given by the user is correct
function emailCorrect($email)
{
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

// Looks if the password given by the user is correct
function passwordCorrect($password)
{
    $correctness = preg_match('/^[a-zA-Z0-9]{3,64}$/', $password);

    if ($correctness == 1) {
        return true;
    } else {
        return false;
    }
}

// Generates a random token
function generateToken()
{
    $bytes = random_bytes(64);
    return bin2hex($bytes);
}

//Checks if the user token is still valid
function isTokenValid($cookie)
{
    global $mysqli;

    $sql = "SELECT id, token FROM `users` WHERE token = ?";

    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param("s", $cookie);
        if ($stmt->execute()) {
            $result = $stmt->get_result();

            if ($result->num_rows == 1) {
                return true;
            } else {
                return false;
            }
        }
    }
}


function checkIfProductExists($code)
{
    global $mysqli;
    $sql = "SELECT * FROM `products` WHERE productCode = ?";
    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param("s", $code);
        if ($stmt->execute()) {
            $stmt->store_result();
            if ($stmt->num_rows() != 0) {

                return true;
                $mysqli->close();
                die();
            } else {

                return false;
            }
        }
    }
}
function updateProduct($code, $productImage, $productJSON)
{
    global $mysqli;
    $sql = "UPDATE products SET productImage = ?, productInfo = ? WHERE productCode = ?";
    if ($stmt = $mysqli->prepare($sql)) {
        $n = null;
        $stmt->bind_param("bss", $n, $productJSON, $code);
        if (isset($productImage)) $stmt->send_long_data(0, $productImage);
        if ($stmt->execute()) {

            echo json_encode(["status" => true]);
            $mysqli->close();
        } else {
            echo json_encode(["status" => false]);
            $mysqli->close();
        }
    }
}
