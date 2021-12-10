<?php
require_once("header.php");
?>




    <!-- skaner -->
    <div class=" w-80 h-fit dark:bg-gray-700 dark:border-white border-4 rounded-2xl border-solid border-gray-600">
        <video id="video" class="fill-current bg-gray-600 mb-2 rounded-xl max-h-60 h-60 border-4 border-gray-400"></video>
        <label class="toggle" for="startvideo">
            <input class="toggle__input" name="" type="checkbox" id="startvideo">
            <div class="toggle__fill"></div>
        </label>
        <label class="flex flex-row mb-2 justify-center items-center flex-wrap">

            <select class="bg-gray-500 text-white px-3 rounded-xl mx-5" id="sourceSelect" hidden></select>
            <input type="text" id="codeInput" class="bg-gray-500 mx-2 text-white pl-3 rounded-xl">
            <button id="submit" class="p-2 text-white  justify-center items-center flex rounded"><i class="far fa-paper-plane"></i></button>
        </label>

    </div>
    <!-- Historia -->
    <div class="dark:bg-gray-700  border-4 border-solid dark:border-white rounded-2xl border-gray-600 w-72 h-80">



    <script src="./js/scanner.js"></script>
    <!-- stopka -->
</div>
<?php include_once('footer.php');
