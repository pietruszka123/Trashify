<?php
require_once("header.php");
?>



<!-- container -->

<!-- nagłówek -->
<label class="w-full flex flex-wrap justify-center place-items-start">
    <div>
        <h1 class="w-screen text-center py-4 text-3xl dark:text-pink-300 text-green-400 font-bold">Autorzy aplikacji</h1>
        <div class="w-4/5 mx-auto mb-4 h-px top-0 to-pink-400 bg-gradient-to-r from-blue-500"></div>
    </div>

</label>

<!-- element 1 -->
<div class="my-2 w-72 h-fit justify-center flex flex-wrap p-2 dark:bg-gray-600 bg-green-600 border-4 dark:border-gray-300 border-indigo-500 rounded-2xl">
    <h1 class="text-2xl justify-center flex w-full dark:text-pink-300 text-white">Marcin Czechowicz</h1>
    <p class="dark:text-pink-500 text-white font-semibold mb-2">(Baza danych i funkcje)</p>
    <div class="w-1/2">
        <label class="flex flex-row gap-0">
            <h1 class="w-max text-2xl text-blue-400 font-bold ">My</h1>
            <h1 class="w-max font-bold text-2xl text-yellow-600">SQL</h1>
        </label>
        <p class="w-full">

        <ul>
            <li class="text-white">- Stworzenie i zaprojektowanie bazy danych</li>
        </ul>
        <ul>
            <li class="text-white">- Tworzenie kwerend</li>
        </ul>
        </p>
    </div>
    <img src="img/mysql.png" alt="Mysql" class=" w-28 h-28 pb-2">
    <div class="w-full mx-2 h-px my-3 to-pink-400 bg-gradient-to-r from-blue-500"></div>
    <div class="w-1/2">
        <h1 class="w-full text-2xl text-purple-400 font-bold">PHP</h1>
        <p class="w-full">
        <ul>
            <li class="text-white">- Łączenie strony z bazą danych</li>
        </ul>
        <ul>
            <li class="text-white">- Funkcje backendowe</li>
        </ul>
        </p>
    </div>
    <img src="img/PHP-logo.png" alt="HTML i CSS" class=" w-28 h-28">
    <!-- element 2 -->
</div>
<div class="my-2 w-72 h-fit justify-center flex flex-wrap p-2 dark:bg-gray-600 bg-green-600 border-4 dark:border-gray-300 border-indigo-500 rounded-2xl">
    <h1 class="text-2xl justify-center flex text-white w-full">Piotr Pamuła</h1>
    <p class="dark:text-pink-500 w-full text-center font-bold mb-2 text-white">(Customizacje)</p><br>

    <div class="w-1/2">
        <h1 class="w-full text-2xl text-yellow-400 font-bold">JavaScript</h1>
        <p class="w-full">
        <ul>
            <li class="text-white">Skaner oraz przełącznik darkmode</li>
        </ul>
        </p>
    </div>
    <img src="img/JavaScript-logo.png" alt="HTML i CSS" class=" w-28 h-28  mb-2">
    <div class="w-full mx-2 h-px my-3 to-pink-400 bg-gradient-to-r from-blue-500"></div>
    <div class="w-1/2">
        <h1 class="w-full text-2xl text-purple-400 font-bold">PHP</h1>
        <p class="w-full">
        <ul>
            <li class="text-white">- Łączenie z bazą danych</li>
        </ul>
        <ul>
            <li class="text-white">- Funkcje</li>
        </ul>
        </p>
    </div>
    <img src="img/PHP-logo.png" alt="HTML i CSS" class=" w-28 h-28">

</div>
<!-- 3 element -->
<div class="my-2 w-72 h-fit justify-center flex flex-wrap p-2 dark:bg-gray-600 bg-green-600 border-4 dark:border-gray-300 border-indigo-500 rounded-2xl">
    <h1 class="text-2xl justify-center flex text-white w-ful">Sebastian Firlit</h1>
    <p class="dark:text-pink-500 text-white w-full text-center font-bold mb-2">(Design)</p><br>
    <div class="w-1/2">
        <h1 class="w-full text-2xl text-blue-500 font-bold">CSS</h1>
        <p class="w-full">

        <ul>
            <li class="text-white">- Dobór palety kolorów</li>
        </ul>
        <ul>
            <li class="text-white">- Układ Storny</li>
        </ul>
        </p>
    </div>
    <img src="img/css.png" alt="HTML i CSS" class=" w-28 h-28  mb-2">

    <div class="w-full mx-2 h-px my-3 to-pink-400 bg-gradient-to-r from-blue-500"></div>
    <div class="w-1/2">
        <h1 class="w-full text-2xl text-yellow-500 font-bold">HTML</h1>
        <p class="w-full">

        <ul>
            <li class="text-white">- Budowa strony</li>
        </ul>
        <ul>
            <li class="text-white">- Struktura strony</li>
        </ul>
        </p>
    </div>
    <img src="img/html.png" alt="HTML i CSS" class=" w-28 h-28">

</div>


<!-- stopka -->
<?php include_once('footer.php');
