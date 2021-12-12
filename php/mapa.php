<?php
require_once("header.php");
?>
<script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.9.0/build/ol.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.9.0/css/ol.css">
<link rel="stylesheet" href="./css.scss">
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


<div class="map w-80 h-0 sm:w-1/2 sm:pb-1/2 h-fit gap-2 dark:bg-gray-700 dark:border-white border-4 rounded-2xl border-solid flex flex-wrap border-gray-500 p-3 relative">
<!-- nagłówek -->   
<h1 class="w-full text-3xl font-bold text-center text-pink-500">Mapa</h1>
    <h2 class="w-full text-lg font-bold text-center text-blue-500">(Lokalizacje śmietników)</h2>
    <!-- przycisk info -->
    <button data-modal-target="#modal"><i class="fas fa-info-circle absolute top-2 right-2"></i></button>
    <div class="modal bg-gray-600" id="modal">
        <div class="modal-header">
            <div class="title">Jak używać mapy?</div>
            <button data-close-button class="close-button">&times;</button>
        </div>
        <div class="modal-body">
            <h2 class="text-2xl">1. Na czym polega działanie mapy</h2>
            <p>Mapa służy do zlokalizowania najbliższych kontenerów na śmieci danego rodzaju, w twojej okolicy</p>
            <h2 class="text-2xl">2. Dodawanie koszy</h2>
            <p>Aby dodać lokalizacje kontenera :</p>

            <ol class="px-6 py-3" style="list-style-type: decimal;">
                <li> Kliknij przycisk "Dodaj kosz +"</li>
                <li> Wybierz rodzaj kontenera który chcesz dodać</li>
                <li> Zaznacz myszką na mapie lokalizacje kosza</li>
                <li> "Zapisz"</li>
            </ol>
        </div>
    </div>
    <div id="overlay"></div>

    <!-- mapa -->
    <div id="map" class="map w-full h-60 mapa">
        <p id="Loading" class="absolute -z-50 top-1/4 left-1/4 translate-x-1/2">ŁADOWANIE...</p>

    </div>
    <?php
    if (isset($_GET["data"])) {
    ?>
        <input type="button" id="showAllBins" class="font-bold bg-gray-500 p-1 rounded-md ml-2 px-3" value="Pokaż wszystkie kosze">
    <?php
    }
    ?>
    <label for="add" class="flex w-full gap- text-center flex-wrap">
        <p class="select-none hover:cursor-pointer cursor-default font-bold ml-2 bg-gray-500 px-4 rounded-md h-fit w-30">Dodaj kosz +</p><br>
        <div class="w-full flex justify-center bg-gray-600 mt-4">
            <input type="checkbox" id="add" class="hover:cursor-pointer cursor-default h-6 w-6 font-bold bg-gray-500" hidden>
    </label>

    <!-- dodanie kosza -->
    <div id="AddBinCont" class="flex flex-wrap w-80" style="display: none;">
        <label class="flex w-full gap-2 items-center">
            <p class="font-bold ml-3 w-full">Rodzaj kosza:</p>
            <select id="type" class="bg-gray-500 font-bold p-1 rounded-md w-28 mt-4">
                <option value="mieszane" class="bg-black ">mieszane</option>
                <option value="papier" class="bg-blue-800">papier</option>
                <option value="szklo" class="bg-black text-white">szkło</option>
                <option value="plastik" class="bg-yellow-300 text-black">metale i plastik</option>
                <option value="bio" class="bg-green-800">Biodegradowalne</option>
                <option value="baterie">baterie</option>
                <option value="leki" class="bg-red-700 focus:outline-none">
                    <p class="text-bold">Lerstwa +</p>
                </option>
            </select>
        </label>
        <input type="text" class="w-full h-10 p-3 m-2 bg-gray-500 text-white focus:outline-none rounded-md text-xl" placeholder="longitude" id="longitude" pattern="[0-9.]+">
        <input type="text" id="latitude" pattern="[0-9.]+" placeholder="latitude" class="w-full h-10 p-3 m-2 bg-gray-500 text-white focus:outline-none rounded-md text-xl">
        <!-- obrazek<input type="file" id=""> -->

        <!-- dodatkowe informacje<textarea id="" cols="30" rows="10" required></textarea> -->
        <button id="save" class="w-fit mx-auto py-1/2 h-fit p-3 m-2 bg-gray-500 text-pink-300 font-bold focus:outline-none rounded-xl pb-4 text-xl">Zapisz</button>
    </div>
</div>
<script src="./js/testy.js"></script>
<script src="./js/mapa.js"></script>
<!-- stopka -->
</div>