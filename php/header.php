<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'smietnik');
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);



/* 
if (isset($_COOKIE['token']) &&  $_COOKIE['token'] != "notSet" && isTokenValid($_COOKIE['token']) && $_SERVER['REQUEST_URI'] == 'login.php')
{ //If the token is valid, then sends you to the index page (if already not somewhere else than login page)
    header("Location: index.php");
}
else if (isset($_COOKIE['token']) &&  $_COOKIE['token'] != "notSet" && isTokenValid($_COOKIE['token']))
{
    ;
}
else if ($_SERVER['REQUEST_URI'] != '/login.php')
{ //If you don't have a cookie token then sets it to "notSet" and sends you to the login page if you're not there
    setcookie("token", "notSet", 0, "/");
    header("Location: login.php");
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
$_SESSION['rememberMe'] = NULL; */
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css.scss">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" integrity="sha256-46r060N2LrChLLb5zowXQ72/iKKNiw/lAmygmHExk/o=" crossorigin="anonymous" />

    <title>Recycling Duter</title>
    <script src="./js/barcodeScanner.js"></script>
</head>

<body class="p-0 m-0 min-h-screen overflow-x-hidden">
    <header class="dark:bg-gray-900 dark:text-green-100 text-pink-300 bg-indigo-800 h-16 w-full items-center overflow-hidden flex gap-2">
        <!-- paprotka -->
        <svg class="h-16 w-16 " style="transform: scaleY(-1) rotate(180deg);" viewBox="0 0 1182 1182" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;">
            <g transform="matrix(0.437044,-1.49586,1.49586,0.437044,-93.123,1641.41)">
                <g transform="matrix(4.16667,0,0,4.16667,-606.319,-813.773)">
                    <path d="M263.6,266C266.4,264.7 268.4,262 268.6,258.7C268.9,253.9 265.2,251.2 260.5,250.9C257.1,250.7 252.9,253.5 250.2,255.2C240.6,261.4 233.1,263 227.9,264.1C226,264.5 224.1,264.9 222.1,264.9C222.2,265 248,274.4 263.6,266Z" style="fill:rgb(59,130,246);fill-rule:nonzero;" />
                </g>
                <g transform="matrix(4.16667,0,0,4.16667,-606.319,-813.773)">
                    <path d="M363.6,278.1C364.6,275.2 364,271.8 361.7,269.5C358.4,266 353.9,266.9 350.5,270.1C348.1,272.4 347.2,277.5 346.7,280.6C344.7,291.8 340.7,298.4 338,302.9C337,304.5 335.9,306.2 334.6,307.7C334.6,307.7 359.1,295.2 363.6,278.1Z" style="fill:rgb(59,130,246);fill-rule:nonzero;" />
                </g>
                <g transform="matrix(4.16667,0,0,4.16667,-606.319,-813.773)">
                    <path d="M401.7,261.3C402.8,258.4 402.3,255.1 400.1,252.6C397,249 392.4,249.7 388.9,252.9C386.4,255.1 385.4,260.2 384.7,263.2C382.3,274.4 378.1,280.8 375.2,285.2C374.2,286.8 373,288.5 371.7,289.9C371.7,289.9 396.5,278.3 401.7,261.3Z" style="fill:rgb(59,130,246);fill-rule:nonzero;" />
                </g>
                <g transform="matrix(4.16667,0,0,4.16667,-606.319,-813.773)">
                    <path d="M225.2,266.5C226.8,268.4 228.4,270.4 229.9,272.4C233.3,276.8 236.4,281.4 239.3,286.1C241,289 242.6,291.9 243.9,294.9C245.1,297.7 245.8,300.6 246.3,303.6C246.8,306.3 246.9,309.2 245.7,311.8C243.4,316.4 238.5,317.5 234,314.9C232.2,313.9 228.8,309.7 229.8,304C234.1,280.6 225.2,266.5 225.2,266.5Z" style="fill:rgb(59,130,246);fill-rule:nonzero;" />
                </g>
                <g transform="matrix(4.16667,0,0,4.16667,-606.319,-813.773)">
                    <path d="M254.4,292.3C256.5,293.7 258.6,295.2 260.6,296.7C265.1,300 269.4,303.5 273.4,307.3C275.8,309.6 278.2,311.9 280.3,314.5C282.2,316.8 283.7,319.5 285,322.2C286.2,324.7 287.1,327.4 286.6,330.2C285.7,335.3 281.2,337.7 276.2,336.4C274.2,335.9 269.8,332.8 269.1,327.1C266.9,303.4 254.4,292.3 254.4,292.3Z" style="fill:rgb(59,130,246);fill-rule:nonzero;" />
                </g>
                <g transform="matrix(4.16667,0,0,4.16667,-606.319,-813.773)">
                    <path d="M289.4,307C291.9,307.4 294.3,308 296.8,308.6C302.2,309.9 307.5,311.4 312.7,313.3C315.8,314.4 318.9,315.7 321.9,317.2C324.6,318.6 327,320.4 329.2,322.4C331.3,324.2 333.2,326.4 333.9,329.1C335.1,334.1 331.9,338.1 326.8,338.9C324.8,339.2 319.5,338.1 316.6,333.1C305.2,312.3 289.4,307 289.4,307Z" style="fill:rgb(59,130,246);fill-rule:nonzero;" />
                </g>
                <g transform="matrix(4.16667,0,0,4.16667,-606.319,-813.773)">
                    <path d="M328.5,307.3C331,307 333.5,306.8 336,306.7C341.5,306.4 347.1,306.3 352.6,306.6C355.9,306.8 359.2,307.1 362.5,307.7C365.5,308.3 368.3,309.3 371,310.6C373.5,311.7 376,313.2 377.4,315.7C380,320.2 378.1,324.9 373.5,327.1C371.6,328 366.3,328.5 362.1,324.5C345.2,307.8 328.5,307.3 328.5,307.3Z" style="fill:rgb(59,130,246);fill-rule:nonzero;" />
                </g>
                <g transform="matrix(4.16667,0,0,4.16667,-606.319,-813.773)">
                    <path d="M255.5,293.3C258,293.3 270.2,299.8 290.5,290.8C293.3,289.6 296,288.4 298.6,286.8C301,285.3 303.2,283.5 304.3,280.9C306.3,276.1 303.8,271.7 298.9,270.1C296.9,269.5 292.1,270.4 288.8,275.1C273.9,296.4 254,293.1 255.5,293.3Z" style="fill:rgb(59,130,246);fill-rule:nonzero;" />
                </g>
                <g transform="matrix(4.16667,0,0,4.16667,-606.319,-813.773)">
                    <path d="M189.7,239.1C192.2,239.2 203.9,246.6 224.8,239C227.6,238 230.5,237 233.1,235.6C235.6,234.3 237.9,232.6 239.2,230.1C241.5,225.5 239.3,220.9 234.5,219C232.6,218.2 227.7,218.8 224.1,223.3C207.9,243.4 188.2,238.8 189.7,239.1Z" style="fill:rgb(59,130,246);fill-rule:nonzero;" />
                </g>
                <g transform="matrix(4.16667,0,0,4.16667,-606.319,-813.773)">
                    <path d="M404.3,292.3C407.1,295.1 407.2,299.6 404.4,302.5C401.7,305.3 397.4,305.4 394.5,302.9C374.7,290.1 361.2,297.7 361.2,297.7C361.9,297.3 362.5,296.6 363.2,296.1C365,294.8 366.8,293.6 368.7,292.6C374.5,289.5 380.9,287.5 387.5,287.5C390.5,287.5 393.4,288 396.2,288.8C398.9,289.6 402.4,290.4 404.3,292.3Z" style="fill:rgb(59,130,246);fill-rule:nonzero;" />
                </g>
                <g transform="matrix(4.16667,0,0,4.16667,-606.319,-813.773)">
                    <path d="M331.7,279.3C331.3,275.4 327.7,272.5 323.8,272.9C320,273.3 317.2,276.6 317.4,280.4C315.2,303.9 300.8,309.8 300.8,309.8C301.8,309.4 303.1,309.3 304.1,309C306.9,308.2 309.6,307.1 312.1,305.8C319.6,302 326,296 329.3,288.1C330.5,285.5 332,282.2 331.7,279.3Z" style="fill:rgb(59,130,246);fill-rule:nonzero;" />
                </g>
                <g transform="matrix(4.16667,0,0,4.16667,-606.319,-813.773)">
                    <path d="M378.1,280.9C350,307.4 308.6,313.7 273.5,299.4C261.6,294.5 250.9,287.2 241.4,278.5C232.2,270.1 224.2,260.5 215,252.2C199.9,238.5 179.6,226.6 158.6,226.5C134.7,226.4 108,242.7 97.6,264.4C96.2,267.3 100.5,269.8 101.9,266.9C112,245.7 138.7,229.9 162.1,231.6C185.3,233.3 205.5,249.2 221,265.2C236.6,281.3 252.1,296.3 273.3,304.7C285.6,309.6 298.7,312.3 312,312.2C337.3,312 363.2,301.8 381.6,284.4C384,282.2 380.4,278.7 378.1,280.9Z" style="fill:rgb(59,130,246);fill-rule:nonzero;" />
                </g>
            </g>
        </svg>

        <h1 class="text-2xl py-0.5 float-left">Trash dooter</h1>
        <!-- 
        
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="-40 -40 80 80" class="h-16 w-16 py-1 yin">
            <circle r="39" fill="#fff" />
            <path fill="#4bb748" d="M0,38a38,38 0 0 1 0,-76a19,19 0 0 1 0,38a19,19 0 0 0 0,38" />
            <circle r="5" cy="19" fill="#4bb748" />
            <circle r="5" cy="-19" fill="#fff" />
        </svg> -->

        <!-- nav bar -->
        <nav class="block relative w-max bg-transparent z-10 ml-auto mt-2 mr-5 ">
            <div class="openMenu"><i class="fa fa-bars dark:text-white "></i></div>
            <ul class="mainMenu m-3 rounded-2xl dark:bg-gray-900 bg-g1 flex flex-wrap gap-2 px-2">
                <!-- darkmode switch -->
                <div class="flex flex-row">
                    <button class=" self-end mb-2 mt-2 ml-3 w-12 h-6 md:w-12 md:h-6 rounded-2xl mr-3 bg-white flex transition duration-300 focus:outline-none shadow" onclick="toggleTheme()">
                        <div id="switch-toggle" class="w-6 h-6 md:w-7 flex self-center md:h-7 relative rounded-full transition duration-500 transform bg-pink-500 -translate-x-2 p-1 text-white ">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </div>
                    </button>
                    <div class="closeMenu z-10 flex justify-self-end">

                        <i class="fa fa-times"></i>
                    </div>
                </div>
                <?php
                    $URI = $_SERVER['REQUEST_URI'];
                    $beg = "/";//'/Konkurs4/php/';
                ?>
                <li class="flex justify-center rounded-3xl"><a href="index.php" class=" text-weight-bold w-full text-center dark:hover:bg-pink-400 <?php if ($beg . 'index.php' == $URI) { echo 'dark:text-pink-400 dark:hover:bg-blue-500  bg-blue-500 dark:bg-white border-2 dark:hover:text-white border-pink-400'; } ?>">Home</a></li>
                <li class="flex justify-center rounded-3xl"><a href="mapa.php" class=" text-weight-bold w-full text-center dark:hover:bg-pink-400 <?php if ($beg . 'mapa.php' == $URI) { echo 'dark:text-pink-400 dark:hover:bg-blue-500  bg-blue-500 dark:bg-white border-2 dark:hover:text-white border-pink-400'; } ?>" >Mapa</a></li>
                <li class="flex justify-center rounded-3xl"><a href="blog.php" class=" text-weight-bold w-full text-center dark:hover:bg-pink-400 <?php if ($beg . 'blog.php' == $URI) { echo 'dark:text-pink-400 dark:hover:bg-blue-500  bg-blue-500 dark:bg-white border-2 dark:hover:text-white border-pink-400'; } ?>">Blog</a></li>
                <li class="flex justify-center rounded-3xl"><a href="informacje.php" class=" text-weight-bold w-full text-center dark:hover:bg-pink-400 <?php if ($beg . 'informacje.php' == $URI) { echo 'dark:text-pink-400 dark:hover:bg-blue-500  bg-blue-500 dark:bg-white border-2 dark:hover:text-white border-pink-400'; } ?>">Info</a></li>
                <li class="flex justify-center rounded-3xl"><a href="tworcy.php" class=" text-weight-bold w-full text-center dark:hover:bg-pink-400 <?php if ($beg . 'tworcy.php' == $URI) { echo 'dark:text-pink-400 dark:hover:bg-blue-500  bg-blue-500 dark:bg-white border-2 dark:hover:text-white border-pink-400'; } ?>">Twórcy</a></li>
                <li class="flex justify-center rounded-3xl"><a href="" class=" text-weight-bold w-full text-center dark:hover:bg-pink-400 <?php if ($beg . '.php' == $URI) { echo 'dark:text-pink-400 dark:hover:bg-blue-500  bg-blue-500 dark:bg-white border-2 dark:hover:text-white border-pink-400'; } ?>">wyloguj</a></li>


                <script src="./js/index.js"></script>


            </ul>
        </nav>
        <!-- paprotka -->
        <svg class="h-16 w-16 absolute right-0 z-0" viewBox="0 0 1182 1182" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;">
            <g transform="matrix(0.437044,-1.49586,1.49586,0.437044,-93.123,1641.41)">
                <g transform="matrix(4.16667,0,0,4.16667,-606.319,-813.773)">
                    <path d="M263.6,266C266.4,264.7 268.4,262 268.6,258.7C268.9,253.9 265.2,251.2 260.5,250.9C257.1,250.7 252.9,253.5 250.2,255.2C240.6,261.4 233.1,263 227.9,264.1C226,264.5 224.1,264.9 222.1,264.9C222.2,265 248,274.4 263.6,266Z" style="fill:#f472b6;fill-rule:nonzero;" />
                </g>
                <g transform="matrix(4.16667,0,0,4.16667,-606.319,-813.773)">
                    <path d="M363.6,278.1C364.6,275.2 364,271.8 361.7,269.5C358.4,266 353.9,266.9 350.5,270.1C348.1,272.4 347.2,277.5 346.7,280.6C344.7,291.8 340.7,298.4 338,302.9C337,304.5 335.9,306.2 334.6,307.7C334.6,307.7 359.1,295.2 363.6,278.1Z" style="fill:#f472b6;fill-rule:nonzero;" />
                </g>
                <g transform="matrix(4.16667,0,0,4.16667,-606.319,-813.773)">
                    <path d="M401.7,261.3C402.8,258.4 402.3,255.1 400.1,252.6C397,249 392.4,249.7 388.9,252.9C386.4,255.1 385.4,260.2 384.7,263.2C382.3,274.4 378.1,280.8 375.2,285.2C374.2,286.8 373,288.5 371.7,289.9C371.7,289.9 396.5,278.3 401.7,261.3Z" style="fill:#f472b6;fill-rule:nonzero;" />
                </g>
                <g transform="matrix(4.16667,0,0,4.16667,-606.319,-813.773)">
                    <path d="M225.2,266.5C226.8,268.4 228.4,270.4 229.9,272.4C233.3,276.8 236.4,281.4 239.3,286.1C241,289 242.6,291.9 243.9,294.9C245.1,297.7 245.8,300.6 246.3,303.6C246.8,306.3 246.9,309.2 245.7,311.8C243.4,316.4 238.5,317.5 234,314.9C232.2,313.9 228.8,309.7 229.8,304C234.1,280.6 225.2,266.5 225.2,266.5Z" style="fill:#f472b6;fill-rule:nonzero;" />
                </g>
                <g transform="matrix(4.16667,0,0,4.16667,-606.319,-813.773)">
                    <path d="M254.4,292.3C256.5,293.7 258.6,295.2 260.6,296.7C265.1,300 269.4,303.5 273.4,307.3C275.8,309.6 278.2,311.9 280.3,314.5C282.2,316.8 283.7,319.5 285,322.2C286.2,324.7 287.1,327.4 286.6,330.2C285.7,335.3 281.2,337.7 276.2,336.4C274.2,335.9 269.8,332.8 269.1,327.1C266.9,303.4 254.4,292.3 254.4,292.3Z" style="fill:#f472b6;fill-rule:nonzero;" />
                </g>
                <g transform="matrix(4.16667,0,0,4.16667,-606.319,-813.773)">
                    <path d="M289.4,307C291.9,307.4 294.3,308 296.8,308.6C302.2,309.9 307.5,311.4 312.7,313.3C315.8,314.4 318.9,315.7 321.9,317.2C324.6,318.6 327,320.4 329.2,322.4C331.3,324.2 333.2,326.4 333.9,329.1C335.1,334.1 331.9,338.1 326.8,338.9C324.8,339.2 319.5,338.1 316.6,333.1C305.2,312.3 289.4,307 289.4,307Z" style="fill:#f472b6;fill-rule:nonzero;" />
                </g>
                <g transform="matrix(4.16667,0,0,4.16667,-606.319,-813.773)">
                    <path d="M328.5,307.3C331,307 333.5,306.8 336,306.7C341.5,306.4 347.1,306.3 352.6,306.6C355.9,306.8 359.2,307.1 362.5,307.7C365.5,308.3 368.3,309.3 371,310.6C373.5,311.7 376,313.2 377.4,315.7C380,320.2 378.1,324.9 373.5,327.1C371.6,328 366.3,328.5 362.1,324.5C345.2,307.8 328.5,307.3 328.5,307.3Z" style="fill:#f472b6;fill-rule:nonzero;" />
                </g>
                <g transform="matrix(4.16667,0,0,4.16667,-606.319,-813.773)">
                    <path d="M255.5,293.3C258,293.3 270.2,299.8 290.5,290.8C293.3,289.6 296,288.4 298.6,286.8C301,285.3 303.2,283.5 304.3,280.9C306.3,276.1 303.8,271.7 298.9,270.1C296.9,269.5 292.1,270.4 288.8,275.1C273.9,296.4 254,293.1 255.5,293.3Z" style="fill:#f472b6;fill-rule:nonzero;" />
                </g>
                <g transform="matrix(4.16667,0,0,4.16667,-606.319,-813.773)">
                    <path d="M189.7,239.1C192.2,239.2 203.9,246.6 224.8,239C227.6,238 230.5,237 233.1,235.6C235.6,234.3 237.9,232.6 239.2,230.1C241.5,225.5 239.3,220.9 234.5,219C232.6,218.2 227.7,218.8 224.1,223.3C207.9,243.4 188.2,238.8 189.7,239.1Z" style="fill:#f472b6;fill-rule:nonzero;" />
                </g>
                <g transform="matrix(4.16667,0,0,4.16667,-606.319,-813.773)">
                    <path d="M404.3,292.3C407.1,295.1 407.2,299.6 404.4,302.5C401.7,305.3 397.4,305.4 394.5,302.9C374.7,290.1 361.2,297.7 361.2,297.7C361.9,297.3 362.5,296.6 363.2,296.1C365,294.8 366.8,293.6 368.7,292.6C374.5,289.5 380.9,287.5 387.5,287.5C390.5,287.5 393.4,288 396.2,288.8C398.9,289.6 402.4,290.4 404.3,292.3Z" style="fill:#f472b6;fill-rule:nonzero;" />
                </g>
                <g transform="matrix(4.16667,0,0,4.16667,-606.319,-813.773)">
                    <path d="M331.7,279.3C331.3,275.4 327.7,272.5 323.8,272.9C320,273.3 317.2,276.6 317.4,280.4C315.2,303.9 300.8,309.8 300.8,309.8C301.8,309.4 303.1,309.3 304.1,309C306.9,308.2 309.6,307.1 312.1,305.8C319.6,302 326,296 329.3,288.1C330.5,285.5 332,282.2 331.7,279.3Z" style="fill:#f472b6;fill-rule:nonzero;" />
                </g>
                <g transform="matrix(4.16667,0,0,4.16667,-606.319,-813.773)">
                    <path d="M378.1,280.9C350,307.4 308.6,313.7 273.5,299.4C261.6,294.5 250.9,287.2 241.4,278.5C232.2,270.1 224.2,260.5 215,252.2C199.9,238.5 179.6,226.6 158.6,226.5C134.7,226.4 108,242.7 97.6,264.4C96.2,267.3 100.5,269.8 101.9,266.9C112,245.7 138.7,229.9 162.1,231.6C185.3,233.3 205.5,249.2 221,265.2C236.6,281.3 252.1,296.3 273.3,304.7C285.6,309.6 298.7,312.3 312,312.2C337.3,312 363.2,301.8 381.6,284.4C384,282.2 380.4,278.7 378.1,280.9Z" style="fill:#f472b6;fill-rule:nonzero;" />
                </g>
            </g>
        </svg>
    </header>
    <!-- gradientowa linia -->
    <div class="w-100% h-1 top-0 to-pink-400 bg-gradient-to-r from-blue-500"></div>
    <div class=" justify-around h-screen w-screen p-5 dark:bg-gray-800  text-pink-300 bg-gray-300  dark:text-gray-200 flex flex-wrap">