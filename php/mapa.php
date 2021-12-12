<?php
require_once("header.php");
?>
<script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.9.0/build/ol.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.9.0/css/ol.css">
<style>
    .LocationBtn {
        top: 65px;
        left: .5em;
    }

    .ol-touch .LocationBtn {
        top: 80px;
    }
</style>
<!-- container -->


<div class="map w-72 h-0 sm:w-1/2 sm:pb-1/2 h-fit gap-4 dark:bg-gray-700 dark:border-white border-4 rounded-2xl border-solid flex flex-wrap border-gray-500 p-3">
    <h1 class="w-full text-3xl font-bold text-center text-pink-500">Mapa</h1>
    <h2 class="w-full text-xl font-bold text-center text-blue-500">(Lokalizacje śmietników)</h2>
    <div id="map" class="map w-full h-60 mapa">
        <p id="Loading" class="absolute -z-50">ŁADOWANIE...</p>

    </div>
    <?php
    if (isset($_GET["data"])) {
    ?>
        <input type="button" id="showAllBins" value="Pokaż wszystkie kosze">
    <?php
    }
    ?>
    <label for="add" class="flex w-full gap-4 text-center ite">
        <p class="select-none hover:cursor-pointer cursor-default font-bold ml-2 bg-gray-500 px-2 rounded-md">dodaj kosz</p>
        <input type="checkbox" id="add" class="hover:cursor-pointer cursor-default h-6 w-6 font-bold bg-gray-500" hidden>
    </label>
    <div id="AddBinCont" style="display: none;">
        <label class="flex w-full gap-4 items-center">
            <p class="font-bold bg-gray-500 p-1 rounded-md ml-2 px-3">Rodzaj kosza</p>
            <select id="type" class="bg-gray-500 font-bold p-1 rounded-md">
                <option value="mieszane" class="bg-black sm:w-15">mieszane</option>
                <option value="papier" class="bg-blue-800">papier</option>
                <option value="szklo" class="bg-black text-white">szkło</option>
                <option value="plastik" class="bg-yellow-300 text-black">metale i plastik</option>
                <option value="bio" class="bg-green-800">Biodegradowalne</option>
                <option value="baterie">baterie</option>
                <option value="leki " class="bg-red-700 focus:outline-none">
                    <p class="text-bold">Lerstwa +</p>
                </option>
            </select>
        </label>
        <input type="text" class="w-full h-10 p-3 m-2 bg-gray-500 text-white focus:outline-none rounded-md text-xl" placeholder="longitude" id="longitude" pattern="[0-9.]+">
        <input type=" text" id="latitude" pattern="[0-9.]+" placeholder="latitude" class="w-full h-10 p-3 m-2 bg-gray-500 text-white focus:outline-none rounded-md text-xl">
        <!-- obrazek<input type="file" id=""> -->

        <!-- dodatkowe informacje<textarea id="" cols="30" rows="10" required></textarea> -->
        <input type="button" value="Zapisz" id="save" class="w-fit mx-auto py-1/2 h-fit p-3 m-2 bg-gray-500 text-pink-300 font-bold focus:outline-none rounded-xl pb-4 text-xl">
    </div>
    <script src="./js/mapa.js"></script>
    <!-- stopka -->
</div>