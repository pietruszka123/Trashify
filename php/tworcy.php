<?php
require_once("header.php");
?>



<!-- container -->
<div class=" justify-center min-h-screen h-fit pb-6 w-screen dark:bg-gray-800  text-pink-300 bg-gray-300 pl-0 dark:text-gray-200 flex flex-wrap gap-4">

    <!-- nagłówek -->
    <label class="w-full flex flex-wrap justify-center place-items-start">
        <h1 class="w-screen text-center text-xl">Autorzy aplikacji<div class="w-full mx-2 h-px top-0 to-pink-400 bg-gradient-to-r from-blue-500">
        </h1>


    </label>

<!-- element 1 -->
    <div class=" w-72 h-fit justify-center flex flex-wrap p-2 bg-gray-600 border-4 gap-3 border-gray-300 rounded-2xl">
        <h1 class="text-2xl justify-center gap-1 flex w-full">Marcin Czechowicz</h1>
        <div class="w-1/2">
            <h1 class="w-full text-2xl text-blue-500 font-bold">MySql</h1>
            <p class="w-full">
            <p>(Główny designer)</p>
            <ul>
                <li>Dobór kolorów</li>
            </ul>
            <ul>
                <li>Układ Storny</li>
            </ul>
            </p>
        </div>
        <img src="img/mysql.png" alt="Mysql" class=" w-28 h-28">

        <div class="w-1/2">
            <h1 class="w-full text-2xl text-yellow-500 font-bold">PHP</h1>
            <p class="w-full">
            <h2>(Projektant)</p>
                <ul>
                    <li cl>Budowa strony</li>
                </ul>
                <ul>
                    <li>Struktura strony</li>
                </ul>
                </p>
        </div>
        <img src="img/html.png" alt="HTML i CSS" class=" w-28 h-28">
<!-- element 2 -->
    </div>
    <div class=" w-72 h-fit justify-center flex flex-wrap p-2 bg-gray-600 border-4 gap-3 border-gray-300 rounded-2xl">
        <h1 class="text-2xl justify-center gap-1 flex w-full">Piotr Pamuła</h1>
        <div class="w-1/2">
            <h1 class="w-full text-2xl text-blue-500 font-bold">CSS</h1>
            <p class="w-full">
            <p>(Główny designer)</p>
            <ul>
                <li>Dobór kolorów</li>
            </ul>
            <ul>
                <li>Układ Storny</li>
            </ul>
            </p>
        </div>
        <img src="img/css.png" alt="HTML i CSS" class=" w-28 h-28">

        <div class="w-1/2">
            <h1 class="w-full text-2xl text-yellow-500 font-bold">HTML</h1>
            <p class="w-full">
            <h2>(Projektant)</p>
                <ul>
                    <li cl>Budowa strony</li>
                </ul>
                <ul>
                    <li>Struktura strony</li>
                </ul>
                </p>
        </div>
        <img src="img/html.png" alt="HTML i CSS" class=" w-28 h-28">

    </div>
    <!-- 3 element -->
    <div class=" w-72 h-fit justify-center flex flex-wrap p-2 bg-gray-600 border-4 gap-3 border-gray-300 rounded-2xl">
        <h1 class="text-2xl justify-center gap-1 flex w-full">Sebastian Firlit</h1>
        <div class="w-1/2">
            <h1 class="w-full text-2xl text-blue-500 font-bold">CSS</h1>
            <p class="w-full">
            <p>(Główny designer)</p>
            <ul>
                <li>Dobór kolorów</li>
            </ul>
            <ul>
                <li>Układ Storny</li>
            </ul>
            </p>
        </div>
        <img src="img/css.png" alt="HTML i CSS" class=" w-28 h-28">

        <div class="w-1/2">
            <h1 class="w-full text-2xl text-yellow-500 font-bold">HTML</h1>
            <p class="w-full">
            
                <ul>
                    <li cl>Budowa strony</li>
                </ul>
                <ul>
                    <li>Struktura strony</li>
                </ul>
                </p>
        </div>
        <img src="img/html.png" alt="HTML i CSS" class=" w-28 h-28">

    </div>

</div>
<!-- stopka -->
<footer class="relative bottom-0 h-32 dark:text-gray-100 text-pink-300 bg-indigo-800 dark:bg-gray-900 flex justify-center align-bottom">
    <span class="gap-2 absolute bottom-3">
        <a href="">O recyklingu </a>|
        <a href="">Artykóły </a>|
        <a href="">Autorzy </a>|
        <a href="">Blog </a>
    </span>

</footer>
<script src="scanner.js"></script>
<script src="index.js"></script>
</body>

</html>
<style>
    ul {
        list-style: none
    }

    li::before {
        content: "• ";
        color: white

    }
</style>