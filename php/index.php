<?php
require_once("header.php");
?>




<!-- skaner -->
<div class=" w-80 h-fit dark:bg-gray-700 dark:border-white border-4 rounded-2xl border-solid border-gray-600">
    <!-- kamera -->
    <video id="video" class="fill-current bg-gray-600 mb-2 rounded-xl max-h-60 h-60 border-4 border-gray-400"></video>

    <!-- włącznik -->
    <label class="toggle" for="startvideo">

        <input class="toggle__input" name="" type="checkbox" id="startvideo">
        <div class="toggle__fill"></div>

        
        <!-- wybór kamerki -->
        <select class="bg-gray-500 h-8 p-4 focus:outline-none text-white rounded-xl mx-5" id="sourceSelect" hidden></select>
    </label>

    <!-- ręczny skan -->
    <label class="flex flex-row mb-2 justify-center items-center flex-wrap">

        <!-- wpisywanie kodu -->
        <input type="text" id="codeInput" class="bg-gray-500 mx-2 text-white h-8 w-48 focus:outline-none text-xl pl-3 rounded-xl">
        <button id="submit" class="p-1 text-white bg-pink-500 text-xl justify-center flex rounded"><i class="far fa-paper-plane"></i></button>
    </label>

</div>
<!-- Historia -->
<div class="dark:bg-gray-700 p-4 border-4 border-solid dark:border-white rounded-2xl border-gray-600 w-80 h-fit">
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio porro sequi blanditiis reiciendis voluptates quis autem et voluptatem nisi sit tempore ipsum velit voluptate ullam, perferendis hic exercitationem quam incidunt?
</div>

<!-- Kalendarz -->
<div class="dark:bg-gray-700 p-4 border-4 border-solid dark:border-white rounded-2xl border-gray-600 w-80 h-fit">
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio porro sequi blanditiis reiciendis voluptates quis autem et voluptatem nisi sit tempore ipsum velit voluptate ullam, perferendis hic exercitationem quam incidunt?
</div>
<script src="./js/scanner.js"></script>
<!-- stopka -->
</div>
<?php include_once('footer.php');
