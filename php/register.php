<?php
require_once("header.php");
?>



<!-- container -->
<div class=" justify-around h-screen w-screen p-5 dark:bg-gray-800  text-pink-300 bg-gray-300  dark:text-gray-200 flex flex-wrap gap-0">

    <!-- Historia -->
    <div class="dark:bg-gray-700  border-4 border-solid dark:border-white rounded-2xl border-gray-600 w-40 h-72">

    </div>
    <!-- skaner -->
    <div class="w-28 h-28 dark:bg-gray-700 dark:border-white border-4 rounded-2xl border-solid border-gray-600">
        <video id="video" class="fill-current h-full"></video>
        <input type="checkbox" value="Start" id="startvideo">
        <select id="sourceSelect" hidden>
        </select>
        <input type="text" id="codeInput">
        <input type="button" value="prześlij" id="submit">
    </div>
</div>
<script src="./js/index.js"></script>
<!-- stopkaa -->
<?php include_once('footer.php');
