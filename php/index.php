<?php
require_once("header.php");
?>




<!-- skaner -->
<div class="my-3 w-80 h-fit dark:bg-gray-700 dark:border-white border-4 rounded-2xl border-solid border-gray-600">
    <!-- kamera -->
    <video id="video" class="fill-current bg-gray-600 mb-2 rounded-xl max-h-60 h-60 border-4 border-gray-400"></video>
    <div class="flex justify-center gap-4">
        <!-- włącznik -->
        <label class="toggle" for="startvideo">

            <input class="toggle__input" type="checkbox" id="startvideo">
            <div class="toggle__fill"></div>
        </label>
        <!-- wybór kamerki -->
        <select class="w-1/2 bg-gray-500 h-8 py-4 focus:outline-none text-white rounded-xl" id="sourceSelect">

        </select>
    </div>
    <!-- ręczny skan -->
    <label class="flex flex-row mb-2 justify-center items-center flex-wrap">

        <!-- wpisywanie kodu  pattern="^[0-9]*$" -->
        <input type="text" id="codeInput" class="bg-gray-500 mx-2 text-white h-8 w-48 focus:outline-none text-xl pl-3 rounded-md">
        <button id="submit" class="p-1 text-white bg-pink-500 text-xl justify-center flex rounded"><i class="far fa-paper-plane"></i></button>
    </label>

</div>
<!-- informacje o produkcie -->
<div id="productInfoEdit" class="relative my-3 flex flex-wrap gap-2 dark:bg-gray-700 p-4 border-4 border-solid dark:border-white rounded-2xl border-gray-600 w-72 h-fit" style="display: none;">
    <!-- NAZWA -->
    <input type="text" id="ProductnameE" class="w-full mb-2 bg-gray-500 text-white h-6 focus:outline-none text-md rounded-md pl-2">

    <img id="ProductImageE" class=" h-60 w-60 justify-self-center rounded-tr-2xl mb-2 rounded-bl-2xl" src="" alt="">
    <input type="file" id="productImageEA" class="bg-gray-500 text-white" accept="image/png, image/gif, image/jpeg" />
    <!-- kod produktu(takie male) -->
    <label class="mt-2 w-full my-auto">
        <p class="inline text-s text-gray-300  font-semibold w-1/5 mt-2 p-2">kod: </p>
        <input type="text" id="productInfoCodeE" class="inline text-s bg-gray-500 mx-2 pl-2 w-3/5 text-white h-5 focus:outline-none py-2  rounded-md">
    </label>
    <!-- MATERIAL OPAKOWANIA -->
    <h2 class="text-gray-300 font-semibold text-lg">Materiał opakowania: </h2>
    <input type="text" id="packagingTypeE" class="w-full bg-gray-500 text-white h-6 focus:outline-none text-md rounded-md pl-2">
    <!-- SPOSOB RECYKLINGU -->
    <h2 class="text-gray-300 font-semibold text-lg">Sposób recyklingu:</h2>
    <textarea id="recyclingE" class="w-full bg-gray-500 text-white h-7 focus:outline-none text-md rounded-md mb-2 pl-2"></textarea>
    <label class="flex w-full gap-4 items-center">
        <p class="font-bold">Rodzaj kosza</p>
        <select id="Rec" class="bg-gray-500 font-bold p-1 w-28 rounded-md">
            <option value="mieszane" class="bg-blue-400 sm:w-15 px-1 py-0.5">mieszane</option>
            <option value="papier" class="bg-blue-800 px-1 py-0.5">papier</option>
            <option value="szklo" class="bg-black text-white px-1 py-0.5">szkło</option>
            <option value="plastik" class="bg-yellow-300 text-black px-1 py-0.5">metale i plastik</option>
            <option value="bio" class="bg-green-800 px-1 py-0.5">Biodegradowalne</option>
            <option value="baterie">baterie</option>
            <option value="leki " class="bg-red-700 focus:outline-none px-1 py-0.5">Lerstwa +</option>
        </select>
    </label>
    <button id="cancelChanges" class="bg-gray-500 rounded-md w-fit h-fit p-2 text-red-500 font-bold mt-4 mx-auto">Anuluj</button>
    <button id="saveChanges" class="bg-gray-500 rounded-md w-fit h-fit p-2 text-gray-200 font-bold mt-4 mx-auto">Zapisz zmiany</button>
</div>




<div id="productInfo" class="relative my-3 flex flex-wrap gap-0 dark:bg-gray-700 p-4 border-4 border-solid dark:border-white rounded-2xl border-gray-600 w-72 h-fit">
    <!-- ZDJECIE -->
    <!-- NAZWA -->
    <h1 class="text-xl font-semibold mb-3 w-full text-center" id="Productname"></h1>
    <img id="ProductImage" class="w-1/2 mr-2 h-1/2 rounded-tr-xl rounded-bl-2xl text-center" src="" alt="Obraz sięnie załadował">
    <!-- kod produktu(takie male) -->
    <label class="w-1/3">
        <p class="inline text-xs text-gray-400 ">kod: </p>
        <p class="inline text-xs text-gray-400" id="productInfoCode"></p>

        <!-- MATERIAL OPAKOWANIA -->
        <h2 class="w-full font-semibold -mb-1">Materiał opakowania: </h2>
        <h2 class="text-sm w-full text-gray-300" id="packagingType"></h2>
        <!-- SPOSOB RECYKLINGU -->
        <h2 class="font-semibold w-full -mb-1">Sposób recyklingu:</h2>
        <h2 class="text-sm w-full text-gray-300 mb-12" id="recycling"></h2>
    </label>
    <button class="bg-gray-500 rounded-md w-fit h-fit p-2 text-gray-200 font-bold absolute left-0 bottom-0 bold rounded-tr-xl rounded-bl-xl" id="clossetBin">Znajdz najbliszy kosz</button>
    <button class="absolute right-0 bottom-0 bg-pink-500   w-fit h-fit p-2 text-gray-200 font-bold rounded-tl-xl rounded-br-xl " id="editProduct">Edytuj</button>
</div>

<!-- Historia -->
<!-- <div class=" my-3 dark:bg-gray-700 p-4 border-4 border-solid dark:border-white rounded-2xl border-gray-600 w-80 h-fit">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio porro sequi blanditiis reiciendis voluptates quis autem et voluptatem nisi sit tempore ipsum velit voluptate ullam, perferendis hic exercitationem quam incidunt?
</div> -->
<script src="./js/scanner.js"></script>
<!-- stopka -->
</div>
<?php include_once('footer.php');
