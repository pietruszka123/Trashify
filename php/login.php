
<?php
require_once("functions.php");

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

userLogin();
require_once("header.php");
?>


<!-- formularz -->
<form method="POST" class="w-70 mt-28 h-fit dark:bg-gray-700 dark:border-white border-4 rounded-2xl border-solid border-gray-600 justify-center flex flex-wrap text-center p-4 ">
        <!-- nagłówek -->
    <h1 class="text-4xl font-bold pt-1 mb-2 text-pink-500">Zaloguj się</h1>

    <!-- dane urzytkownika -->
        <input type="email" id="email" name="email" class="w-full h-10 p-3 m-2 mb-0 bg-gray-500 text-white rounded-xl focus:outline-none text-xl" placeholder="Email">
        <input type="password" id="password" name="password" class="w-full h-10 p-3 m-2 bg-gray-500 text-white focus:outline-none rounded-xl text-xl" placeholder="Password" pattern="^[a-zA-Z0-9]{3,64}$">

<!-- remember me -->
        <label class="m-1 flex items-center gap-2">
        <label for="loginRemember" class="loginRememberMe text-2xl">Zapamiętaj mnie:</label>
            <input type="checkbox" id="rememberMe" name="rememberMe" class="text-pink-500 pt-3 loginRememberMeCheckBox w-5 h-5 " >
        </label>
<!-- wyślij -->
        <input type="submit" id="submit" name="submit" class="w-2/3 bg-gray-800 m-3 mt-4 p-3 text-2xl font-semibold" value="Zaloguj">

<p class=" text-xl">Nie masz jeszcze konta?</p>
<p class=" text-xl">Zarejestruj <a href="register.php" class="text-pink-500 underline font-bold">TERAZ!</a></p>
    </form>


<!-- stopka -->
