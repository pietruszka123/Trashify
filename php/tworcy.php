<?php
require_once("header.php");
?>



<!-- container -->

    <!-- nagłówek -->
    <label class="w-full flex flex-wrap justify-center place-items-start">
        <div>
            <h1 class="w-screen text-center py-4 text-3xl">Autorzy aplikacji</h1>
            <div class="w-full mx-2 h-px top-0 to-pink-400 bg-gradient-to-r from-blue-500"></div>
        </div>

    </label>

<!-- element 1 -->
    <div class="my-2 w-72 h-fit justify-center flex flex-wrap p-2 bg-gray-600 border-4 border-gray-300 rounded-2xl">
        <h1 class="text-2xl justify-center flex w-full">Marcin Czechowicz</h1>
        <p class="text-pink-500 font-semibold mb-2">(Baza danych i funkje)</p>
        <div class="w-1/2">
            <label class="flex flex-row gap-0"><h1 class="w-max text-2xl text-blue-400 font-bold ">My</h1><h1 class="w-max font-bold text-2xl text-yellow-600">SQL</h1>
            </label>
            <p class="w-full">
            
            <ul>
                <li>- Stworzenie i zaprojektowanie bazy danych</li>
            </ul>
            <ul>
                <li>- System logowanie/rejestracji</li>
            </ul>
            </p>
        </div>
        <img src="img/mysql.png" alt="Mysql" class=" w-28 h-28 pb-2">
        <div class="w-full mx-2 h-px my-3 to-pink-400 bg-gradient-to-r from-blue-500"></div>
        <div class="w-1/2">
            <h1 class="w-full text-2xl text-purple-400 font-bold">PHP</h1>
            <p class="w-full">
                <ul>
                    <li>- Łączenie z bazą danych</li>
                </ul>
                <ul>
                    <li>- Funkcje</li>
                </ul>
                </p>
        </div>
        <img src="img/PHP-logo.png" alt="HTML i CSS" class=" w-28 h-28">
<!-- element 2 -->
    </div>
    <div class="my-2 w-72 h-fit justify-center flex flex-wrap p-2 bg-gray-600 border-4  border-gray-300 rounded-2xl">
        <h1 class="text-2xl justify-center flex w-full">Piotr Pamuła</h1>
        <p class="text-pink-500 w-full text-center font-bold mb-2">(Customizacje)</p><br>

        <div class="w-1/2">
            <h1 class="w-full text-2xl text-yellow-400 font-bold">JavaScript</h1>
            <p class="w-full">
            <ul>
                <li>Skaner oraz przełącznik darkmode</li>
            </ul>
            </p>
        </div>
        <img src="img/JavaScript-logo.png" alt="HTML i CSS" class=" w-28 h-28  mb-2">
        <div class="w-full mx-2 h-px my-3 to-pink-400 bg-gradient-to-r from-blue-500"></div>
        <div class="w-1/2">
        <h1 class="w-full text-2xl text-purple-400 font-bold">PHP</h1>
            <p class="w-full">
                <ul>
                    <li>- Łączenie z bazą danych</li>
                </ul>
                <ul>
                    <li>- Funkcje</li>
                </ul>
                </p>
        </div>
        <img src="img/PHP-logo.png" alt="HTML i CSS" class=" w-28 h-28">

    </div>
    <!-- 3 element -->
    <div class=" my-2 w-72 h-fit justify-center flex flex-wrap p-2 bg-gray-600 border-4 border-gray-300 rounded-2xl">
        <h1 class="text-2xl justify-center flex w-full">Sebastian Firlit</h1>
        <p class="text-pink-500 w-full text-center font-bold mb-2">(Design)</p><br>
        <div class="w-1/2">
            <h1 class="w-full text-2xl text-blue-500 font-bold">CSS</h1>
            <p class="w-full">
            
            <ul>
                <li>- Dobór palety kolorów</li>
            </ul>
            <ul>
                <li>- Układ Storny</li>
            </ul>
            </p>
        </div>
        <img src="img/css.png" alt="HTML i CSS" class=" w-28 h-28  mb-2">

        <div class="w-full mx-2 h-px my-3 to-pink-400 bg-gradient-to-r from-blue-500"></div>
        <div class="w-1/2">
            <h1 class="w-full text-2xl text-yellow-500 font-bold">HTML</h1>
            <p class="w-full">
            
                <ul>
                    <li>- Budowa strony</li>
                </ul>
                <ul>
                    <li>- Struktura strony</li>
                </ul>
                </p>
        </div>
        <img src="img/html.png" alt="HTML i CSS" class=" w-28 h-28">

    </div>


<!-- stopka -->
<?php include_once('footer.php');