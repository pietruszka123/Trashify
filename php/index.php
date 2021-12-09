<?php
require_once("header.php");
?>




<!-- container -->
<div class=" justify-center min-h-screen h-full w-screen gap-5 dark:bg-gray-800  text-pink-300 bg-gray-300  dark:text-gray-200 flex flex-wrap p-4">
    <!-- skaner -->
    <div class=" w-72 h-72 dark:bg-gray-700 dark:border-white border-4 rounded-2xl border-solid border-gray-600">
        <video id="video" class="fill-current h-full transform-mirror"></video>
        <input type="checkbox" value="Start" id="startvideo">
        <select id="sourceSelect" hidden>
        </select>
        <input type="text" id="codeInput">
        <input type="button" value="prześlij" id="submit">
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
<script src="scanner.js"></script>
<script src="index.js"></script>
</body>

</html>