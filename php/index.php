<?php
require_once("header.php");
?>




<!-- container -->
<div class=" justify-center min-h-screen h-full w-screen gap-5 dark:bg-gray-800  text-pink-300 bg-gray-300  dark:text-gray-200 flex flex-wrap p-4">
    <!-- skaner -->
    <div class=" w-72 h-fit dark:bg-gray-700 dark:border-white border-4 rounded-2xl border-solid border-gray-600">
        <video id="video" class="fill-current bg-gray-600 mb-2 rounded-xl max-h-60 h-60 transform-mirror border-4 border-gray-400"></video>
        <label class="toggle" for="startvideo">
            <input class="toggle__input" name="" type="checkbox" id="startvideo">
            <div class="toggle__fill"></div>
        </label>
        <label class="flex flex-row gap-2 mb-2 justify-center items-center ">

            <select id="sourceSelect" hidden>
            </select>
            <input type="text" id="codeInput" class="bg-gray-500 text-white pl-3 rounded-xl">
            <button id="submit" class="text-white  justify-center items-center flex rounded"><i class="far fa-paper-plane"></i></button>
        </label>

    </div>
    <!-- Historia -->
    <div class="dark:bg-gray-700  border-4 border-solid dark:border-white rounded-2xl border-gray-600 w-72 h-80">

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
<script src="./js/scanner.js"></script>

</body>

</html>