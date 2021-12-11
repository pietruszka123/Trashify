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


<div class="map w-72 h-0 sm:w-1/2 sm:pb-1/2 h-fit dark:bg-gray-700 dark:border-white border-4 rounded-2xl border-solid flex flex-wrap border-gray-600 p-3">
    <h1 class="w-full text-3xl font-bold text-center text-pink-500">Mapa</h1>
    <h2 class="w-full text-xl font-bold text-center text-blue-500">(Lokalizacje śmietników)</h2>
    <div id="map" class="map w-full h-60 mapa">
        <p id="Loading" class="absolute -z-50">ŁADOWANIE...</p>

    </div>
    <input type="checkbox" id="add">
    <input type="text" class="w-full h-10 p-3 m-2 bg-gray-500 text-white focus:outline-none rounded-xl text-xl" placeholder="longitude" id="longitude" pattern="[0-9.]+">
    <input type=" text" id="latitude" pattern="[0-9.]+" placeholder="latitude" class="w-full h-10 p-3 m-2 bg-gray-500 text-white focus:outline-none rounded-xl text-xl">
    <!-- obrazek<input type="file" id=""> -->
    <select id="type" class="bg-gray-400 p-1 rounded-md">
        <option value="mieszane" class="bg-black">mieszane</option>
        <option value="papier" class="bg-blue-800">papier</option>
        <option value="szklo" class="bg-green-600 text-black">szkło</option>
        <option value="plastik" class="bg-yellow-300 text-black">metale i plastik</option>
        <option value="bio" class="bg-yellow-900">Biodegradowalne</option>

    </select>
    <!-- dodatkowe informacje<textarea id="" cols="30" rows="10" required></textarea> -->
    <input type="button" value="Zapisz" id="save" class="w-full h-10 p-3 m-2 bg-gray-500 text-white focus:outline-none rounded-xl pb-4 text-xl">
    <script src="./js/mapa.js"></script>
    <!-- stopka -->
</div>