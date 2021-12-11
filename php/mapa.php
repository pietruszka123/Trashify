<?php
require_once("header.php");
?>
<script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.9.0/build/ol.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.9.0/css/ol.css">

<!-- container -->

<div id="map" class="map w-full h-80">

</div>
<input type="checkbox" id="add">
longitude<input type="text" id="longitude" pattern="[0-9.]+">latitude<input type=" text" id="latitude" pattern="[0-9.]+">
<!-- obrazek<input type="file" id=""> -->
<select id="type">
    <option value="kosz">kosz</option>
</select>
<!-- dodatkowe informacje<textarea id="" cols="30" rows="10" required></textarea> -->
<input type="button" value="Zapisz" id="save">
<script src="./js/mapa.js"></script>
<!-- stopka -->
<?php include_once('footer.php');
