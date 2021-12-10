<?php
require_once("header.php");
?>



<!-- container -->
<div class=" justify-around h-screen w-screen p-5 dark:bg-gray-800  text-pink-300 bg-gray-300 pl-0 dark:text-gray-200 flex flex-wrap gap-0">

    <div id="map">
        <script src="/api/MapScript" async></script>
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
<script src="./js/index.js"></script>
</body>

</html>