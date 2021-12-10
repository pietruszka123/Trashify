<?php
require_once("header.php");
?>
<script>
    let map;

    function initMap() {
        map = new google.maps.Map(document.getElementById("map"), {
            center: {
                lat: -34.397,
                lng: 150.644
            },
            zoom: 8,
        });
    }
</script>


<!-- container -->
<div class=" justify-around h-screen w-screen p-5 dark:bg-gray-800  text-pink-300 bg-gray-300 pl-0 dark:text-gray-200 flex flex-wrap gap-0">

    <div id="map">
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA_qeyK1I3H1OzVty6WmMbtUQMI0JwWxdw&callback=initMap&v=weekly" async></script>
    </div>


</div>
<script src="./js/index.js"></script>
<!-- stopka -->
<?php include_once('footer.php');
