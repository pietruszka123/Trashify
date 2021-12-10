<?php
require_once("header.php");
?>



<!-- container -->
<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'smietnik');
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);




if (isset($_COOKIE['token']) &&  $_COOKIE['token'] != "notSet" && isTokenValid($_COOKIE['token']) && $_SERVER['REQUEST_URI'] == 'login.php')
{ //If the token is valid, then sends you to the index page (if already not somewhere else than login page)
    //header("Location: index.php");
}
else if (isset($_COOKIE['token']) &&  $_COOKIE['token'] != "notSet" && isTokenValid($_COOKIE['token']))
{;
}
else if ($_SERVER['REQUEST_URI'] != 'login.php')
{ //If you don't have a cookie token then sets it to "notSet" and sends you to the login page if you're not there
    // setcookie("token", "notSet", 0, "/");
    // header("Location: login.php");
}
else
{ //If you don't have a cookie token then sets it to "notSet"
    setcookie("token", "notSet", 0, "/");
}



//Set cookie value if available
if (isset($_SESSION['token']) && isset($_SESSION['rememberMe']))
{
    setcookie("token", $_SESSION['token'], time() + (3600 * 24 * 31 * 12), "/");
}
else if (isset($_SESSION['token']) && !isset($_SESSION['rememberMe']))
{
    setcookie("token", $_SESSION['token'], 0, "/");
}

//Dump these values
$_SESSION['token'] = NULL;
$_SESSION['rememberMe'] = NULL;
// Logs in the user
function userLogin()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        global $mysqli;

        if (isset($_POST['rememberMe']))
        {
            $_SESSION['rememberMe'] = 1;
        }

        if (emailCorrect($_POST['email']) && passwordCorrect($_POST['password']))
        { //Checks if the input is correct
            $sql = "SELECT `users`.`id`, `users`.`password` FROM `users` WHERE `users`.`email` = ?";

            if ($stmt = $mysqli->prepare($sql))
            { //Searches for the user id and password
                $stmt->bind_param("s", $_POST['email']);
                if ($stmt->execute())
                {
                    $result = $stmt->get_result();
                    if ($result->num_rows != 0)
                    {
                        $row = $result->fetch_assoc();

                        if ($row['password'] == $_POST['password'])
                        { //Checks if the password given by the user is correct
                            $userId = $row['id'];
                            $sql = "SELECT `users`.`token` FROM `users` WHERE `users`.`id` = $userId";

                            $result = $mysqli->query($sql);
                            $row = $result->fetch_assoc();

                            if (isset($row['token']) && $row['token'] != NULL)
                            { //Checks if the the token is still valid and logs in the user
                                $_SESSION['token'] = $row['token'];
                            }
                            else
                            {
                                $token = generateToken();
                                $_SESSION['token'] = $token;

                                $sql = "UPDATE `users` SET `users`.`token` = '$token' WHERE `users`.`id` = $userId";
                                $mysqli->query($sql); //Updates the token
                            }

                            header("Location: index.php");
                        }
                        else
                        {
                            echo 'Wrong email or password';
                        }
                    }
                    else
                    {
                        echo 'ERROR: SF3';
                    }
                }
                else
                {
                    echo 'ERROR: SF2';
                }
            }
            else
            {
                echo 'ERROR: SF1';
            }
        }
        else
        {
            echo 'Wrong email or password';
        }
    }
}
//Checks if the user token is still valid
function isTokenValid($cookie)
{
    global $mysqli;

    $sql = "SELECT id, token FROM `users` WHERE token = ?";

    if ($stmt = $mysqli->prepare($sql))
    {
        $stmt->bind_param("s", $cookie);
        if ($stmt->execute())
        {
            $result = $stmt->get_result();

            if ($result->num_rows == 1)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }
}

// Looks if the email given by the user is correct
function emailCorrect($email)
{
    if (filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        return true;
    }
    else
    {
        return false;
    }
}

// Looks if the password given by the user is correct
function passwordCorrect($password)
{
    $correctness = preg_match('/^[a-zA-Z0-9]{3,64}$/', $password);

    if ($correctness == 1)
    {
        return true;
    }
    else
    {
        return false;
    }
}

// Generates a random token
function generateToken()
{
    $bytes = random_bytes(64);
    return bin2hex($bytes);
}

userLogin();
?>


<div class="w-72 h-fit dark:bg-gray-700 dark:border-white border-4 rounded-2xl border-solid border-gray-600 justify-center flex flex-wrap text-center p-3">
   
    <form method="POST">
    <h1 class="text-3xl pt-1">Zaloguj się</h1>
        <input type="email" id="email" name="email" class="w-10/12 p-2 m-6 bg-gray-500 text-white rounded-xl" placeholder="Email"><br>
        <input type="password" id="password" name="password" class="w-10/12 p-2 m-6 bg-gray-500 text-white rounded-xl" placeholder="Password" pattern="^[a-zA-Z0-9]{3,64}$"><br>



        <label for="loginRemember" class="loginRememberMe">Zapamiętaj mnie:</label>
            <input type="checkbox" id="rememberMe" name="rememberMe" class="loginRememberMeCheckBox">
        

        <input type="submit" id="submit" name="submit" class="w-1/2" value="Zaloguj">


    </form>
</div>

<?php
include_once('footer.php');
?>















<!-- stopka -->
<script src="index.js"></script>
<?php include_once('footer.php');
