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


<div class="map w-80 h-full sm:w-1/2 sm:pb-1/2 h-fit gap-2 dark:bg-gray-700 bg-green-500 dark:border-white border-indigo-500 border-4 rounded-2xl border-solid flex flex-wrap p-3 relative">
    <!-- nagłówek -->
    <h1 class="w-full text-3xl font-bold text-center dark:text-pink-500 text-white">Mapa</h1>
    <h2 class="w-full text-lg font-bold text-center dark:text-blue-500 text-white">(Lokalizacje śmietników)</h2>
    <!-- przycisk info -->
    <button data-modal-target="#modal"><i class="fas fa-info-circle text-3xl text-white absolute top-2 right-2"></i></button>
    <div class="modal bg-green-500 overflow-y-scroll" id="modal">
        <div class="modal-header">
            <div class="text-xl text-white font-bold py-0">Jak używać mapy?</div>
            <button data-close-button class="close-button text-white">&times;</button>
        </div>
        <div class="modal-body">
            <h2 class="text-2xl text-white">1. Na czym polega działanie mapy?</h2>
            <p class="mb-2 text-base text-white">Mapa służy do zlokalizowania najbliższych kontenerów na śmieci danego rodzaju, w twojej okolicy</p>
            <h2 class="text-2xl text-white">2. Dodawanie koszy</h2>
            <p class="text-white">Aby dodać lokalizacje kontenera :</p>

            <ol class="pl-6 pt-1" style="list-style-type: decimal;">
                <li class=" text-sm text-white"> Kliknij przycisk "Dodaj kosz +"</li>
                <li class="text-sm text-white"> Wybierz rodzaj kontenera który chcesz dodać</li>
                <li class="text-sm text-white"> Zaznacz myszką na mapie lokalizacje kosza</li>
                <li class="text-sm text-white"> "Zapisz"</li>
            </ol>
        </div>
    </div>
    <div id="overlay"></div>

    <!-- mapa -->
    <div id="map" class="map w-full h-72 mapa">
        <p id="Loading" class="absolute -z-50 text-white top-1/4 left-1/4 translate-x-1/2">ŁADOWANIE...</p>

    </div>
    <?php
    if (isset($_GET["data"])) {
    ?>
        <input type="button" id="showAllBins" class="font-bold dark:bg-gray-500 bg-indigo-600 p-1 rounded-md ml-2 px-3" value="Pokaż wszystkie kosze">
    <?php
    }
    ?>
    <label for="add" class="flex text-center flex-col gap-2">
        <p class="select-none hover:cursor-pointer cursor-default font-bold ml-2 dark:bg-gray-500 bg-indigo-600 text-white px-4 rounded-md h-fit w-36">Dodaj kosz +</p>
        <div class=" w-fit mx-auto flex justify-center dark:bg-gray-700 bg-green-500 text-left p-1 rounded-md">
            <input type="checkbox" id="add" class="hover:cursor-pointer cursor-default h-6 w-6 font-bold bg-gray-500" hidden>


            <!-- dodanie kosza -->
            <div id="AddBinCont" class="flex flex-wrap w-fit" style="display: none;">
                <label class="flex w-full gap-2 items-center">
                    <p class="font-bold w-full text-white">Rodzaj kosza:</p>
                    <select id="type" class="focus:outline-none bg-white font-bold p-1 rounded-md w-28 m-2 text-green-500">
                        <option value="mieszane" class="bg-black focus:outline-none text-white">mieszane</option>
                        <option value="papier" class="bg-blue-800 focus:outline-none">papier</option>
                        <option value="szklo" class="bg-blue-400 focus:outline-none">szkło</option>
                        <option value="plastik" class="bg-yellow-300 focus:outline-none text-black">metale i plastik</option>
                        <option value="bio" class="bg-green-800 focus:outline-none">Biodegradowalne</option>
                        <option value="baterie" class="focus:outline-none">baterie</option>
                        <option value="leki" class="bg-red-700 focus:outline-none">
                            <p class="text-bold focus:outline-none">Lerstwa +</p>
                        </option>
                    </select>
                </label>
                <input type="text" class="w-full h-10 p-3 m-2 dark:bg-gray-500 dark:text-white bg-white text-black focus:outline-none rounded-md text-xl" placeholder="longitude" id="longitude" pattern="[0-9.]+">
                <input type="text" id="latitude" pattern="[0-9.]+" placeholder="latitude" class="w-full h-10 p-3 m-2 dark:bg-gray-500 dark:text-white bg-white text-black focus:outline-none rounded-md text-xl">
                <!-- obrazek<input type="file" id=""> -->

                <!-- dodatkowe informacje<textarea id="" cols="30" rows="10" required></textarea> -->
                <button id="save" class="w-fit mx-auto py-1/2 h-fit p-3 m-2 dark:bg-gray-500 dark:text-white bg-white text-green-500 font-bold focus:outline-none rounded-xl pb-4 text-xl">Zapisz</button>
            </div>
        </div>
    </label>
</div>
<!-- <script src="./js/testy.js"></script> -->
<script src="./js/mapa.js"></script>
<!-- stopka -->
<!-- </div> -->